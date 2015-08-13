<?php

namespace App\Http\Controllers;

use App\DescriptionCategory;
use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OffersController extends Controller
{

    protected $titlePagination;     
    protected $page; 


    /** 
     * Вернет тип урла и таблицу для кредитных
     * предложений
     *
     * @param $category
     * @return array
     */
    protected function getTitleAndTable($category){

        // соответствие url'у и таблице 
        $complianceArray = [
            'nal' => ['offers_nal', 'Кредиты наличными'],
            'cart' => ['offers_card', 'Кредитные карты'],
            'mort' => ['offers_mort', 'Ипотека'],
            'micro' => ['offers_micro', 'Микрозаймы'],
            'hold' => ['offers_hold', 'Вклады'],
            'auto' => ['offers_auto', 'Автокредиты'],
        ];

        $table = '';
        $titleType = '';

        // определяем какуя таблица нужна для выборки и title
        foreach($complianceArray as $k => $v){

            if($category == $k){
                $table = $v[0];
                $titleType = $v[1];
                break;
            }

        }

        $title = 'Кредитные предложения банков в категории: ' . $titleType . $this->getTitlePagination();

        return [
            'title' => $title,
            'table' => $table,
        ];
    }

    /**
     * Добавляем в выборку url каждого кредитного предложения
     *
     * @param $data
     * @param $table
     * @return mixed
     */
    protected function insertIntoDataUrlOffers($data, $table){

        // добавляем в выборку url каждого кредитного предложения
        foreach($data as $k => $v){

            $v->urlOffer = \DB::table($table)->select('url')->where('id', '=', $v->id)->get()[0]->url;

            if($table == 'offers_micro'){

                //Выбираем не повторяющиеся типы получения микрозаймов
                // Похоже на костыль, но работает
                // UPD: костыль устранен
                $v->removalTypes = json_decode(\DB::table('offers_micro')->select('removal_types')->where('id', '=', $v->id)->get()[0]->removal_types);
            }


        }
        return $data;
    }

    /**
     * если по каким-то причинам пришел пустой ответ на запрос
     * возвращаем 404 ошибку
     *
     * @param $data
     */
    protected function isEmptyData($data){
        // если по каким-то причинам пришел пустой ответ на запрос
        // возвращаем 404 ошибку
        if(count($data) == 0){
            abort(404);
        }
    }

/////////////////////////////////////////////////////////////////////////////////////

    /**
     * Отображает все кредитные предложения
     * по конкретной категориии для конкретного
     * банка
     *
     * @param $bankId
     * @param $category
     * @return \Illuminate\View\View
     */
    public function listBankCategoryOffer($bankUrl, $category){

        $table = $this->getTitleAndTable($category)['table'];
		
        // находим id банка по url
        $bankId = \DB::table('banks')->select('id')->where('url', '=', $bankUrl)->get()[0]->id;
		
        $bankTitle = \DB::table('banks')->select('title')->where('url', '=', $bankUrl)->get()[0]->title;
		
        $title = $this->getTitleAndTable($category)['title'] . ' | Банк: ' . $bankTitle;

        // получаем все данные для отображения
        $data = \DB::table($table)->where('bank_id', '=', $bankId)->where($table . '.publish', '1')->orderBy('id', 'desc') // tag::иземенено
            ->join('banks', $table . '.bank_id', '=', 'banks.id')
            ->select($table . '.*', 'banks.url', 'banks.pic_bank')
            ->paginate(5);

        // если по каким-то причинам пришел пустой ответ на запрос
        // возвращаем 404 ошибку
        $this->isEmptyData($data);

        // добавляем в выборку url каждого кредитного предложения
        $data = $this->insertIntoDataUrlOffers($data, $table);

        return view('offers.type.' . $category, [

            'data' => $data,
            'title' => $title,

        ]);


    }

    /**
     * Отображает индексную страницу с категориями
     * кредитных предложений
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function index(DescriptionCategory $descriptionCategory){

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('offers');

        return view('offers.indexOffers', [

            'descriptionCategory' => $descriptionCategory,

        ]);

    }

    /**
     * Отображает список кредитных предложений
     * конкретной категории
     *
     * @param $category
     * @return \Illuminate\View\View
     */
    public function category($category){

        $title = $this->getTitleAndTable($category)['title'];

        $table = $this->getTitleAndTable($category)['table'];

        /**
         * получаем объект всех кредитных предложений
         * по конкретной категории + url банка и name картинки банка,
         * того банка, чье кредитное предложение и
         * разбиваем на блоки для пагинации
         */
        $data = \DB::table($table)
            ->join('banks', $table . '.bank_id', '=', 'banks.id')->where($table . '.publish', '1')->orderBy('id', 'desc')
            ->select($table . '.*', 'banks.url', 'banks.pic_bank')
            ->paginate(5);

        // если по каким-то причинам пришел пустой ответ на запрос
        // возвращаем 404 ошибку
        $this->isEmptyData($data);

        // добавляем в выборку url каждого кредитного предложения
        $data = $this->insertIntoDataUrlOffers($data, $table);

        return view('offers.type.' . $category, [

            'data' => $data,
            'title' => $title,

        ]);

    }

    /**
     * Отображаем полный текст и параметры
     * конкретного кредитного предложения
     *
     * @param $url
     * @return \Illuminate\View\View
     */
    public function getOnUrl($url){



        $TablesArray = [
            'offers_nal',
            'offers_card',
            'offers_mort',
            'offers_micro',
            'offers_hold',
            'offers_auto',
        ];

        $i = 0;
        $count = count($TablesArray);

        foreach($TablesArray as $t){

            $data = \DB::table($t)->where('url', '=', $url)->get();

            if(count($data) != 0){
                $offerType = $t;
                break;

            }else{

                $i = $i + 1;

                // костыль, если битый адрес --git

                if($i == $count){
                    abort(404);
                }

                continue;
            }




        }

        // доводим до ума данные, которые нужно передать в шаблон
        $data = $data[0];
        $bankId = $data->bank_id;
        $data->pic_bank = \DB::table('banks')->select('pic_bank')->where('id', '=', $bankId)->get()[0]->pic_bank;
        $data->urlBank = \DB::table('banks')->select('url')->where('id', '=', $bankId)->get()[0]->url;

        if($offerType == 'offers_micro'){

            $data->removalTypes = json_decode(\DB::table($offerType)->select('removal_types')->where('id', '=', $data->id)->get()[0]->removal_types);

        }

        // вычленяем из 'offers_cart' => 'card'
        $offerType = preg_replace("/([\\w]+)_([\\w]+)/", "\$2", $offerType);

        Debugbar::info($data);

        return view('offers.post.' . $offerType, [

            'data' => $data,


        ]);

    }
}
