<?php

namespace App\Http\Controllers;

use App\DescriptionCategory;
use App\OffersMicro;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PromoController extends Controller
{
    /**
     * Отображение промо страницы с кредитами наличными
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function nal(DescriptionCategory $descriptionCategory){

        $meta = [];
        $meta['title'] = 'Заявка на потребительский кредит онлайн';
        $meta['keywords'] = 'потребительский кредит онлайн, заявка на кредит наличными онлайн, кредит онлайн';
        $meta['description'] = 'Оформите заявку на потребительский кредит онлайн с минимальной процентной ставкой от 14% и только в надежных банках.';

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('nal');

        // получаем те офферы, которые опубликованы
        $data = \DB::table('offers_nal')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')->get();

        return view('promo.nal', [

            'descriptionCategory' => $descriptionCategory,
            'meta' => $meta,
            'data' => $data,

        ]);

    }

    /**
     * Отображение промо страницы с микрозаймами
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function micro(DescriptionCategory $descriptionCategory){

        $meta = [];
        $meta['title'] = 'Микрозаймы онлайн - самые низкие ставки от 0%';
        $meta['keywords'] = 'Оформить заявку на микрозайм онлайн, микрозайм онлайн, заявка на микрозайм';
        $meta['description'] = 'Оформите микрозай онлайн с минимальной процентной ставкой от 0% в день! эксклюзивно на jCredit-Online.ru';

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('micro');

        // получаем те офферы, которые опубликованы
        $data = \DB::table('offers_micro')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')->get();


        foreach ($data as $d) {
            // добавляем метод снятия денег
            $d->removal_types = json_decode(\DB::table('offers_micro')->select('removal_types')->where('id', '=', $d->id)->get()[0]->removal_types);
        }

        return view('promo.micro', [

            'descriptionCategory' => $descriptionCategory,
            'data' => $data,
            'meta' => $meta,

        ]);

    }


    /**
     * Отображает сраницу редиректа на рекламную ссылку
	 * тест
     *
     * @param $id
     * @param $type
     * @return \Illuminate\View\View
     */
    public function go($id, $type){

         $type_asscos = array(
            'm' => 'offers_micro',
            'n' => 'offers_nal',
            'i' => 'offers_mort',
            'a' => 'offers_auto',
            'c' => 'offers_card',
            'h' => 'offers_hold',
            'b' => 'offers_biz',
        );

        $table = '';

        foreach($type_asscos as $k => $v){
            if( $k == $type){
                $table = $v;
                break;
            }

        }

        try{
            $link = \DB::table($table)->select('affiliate_link')->where('id', $id)->get()[0]->affiliate_link;

            if(count($link) == 0){
                abort(404);
            }
        }catch (\ErrorException $e){
            abort(404);
        }

        return view('go', [

            'link' => $link,

        ]);

    }

    /**
     * Отображение промо страницы с кредитными картами
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function card(DescriptionCategory $descriptionCategory){

        $meta = [];
        $meta['title'] = 'Оформить заявку на кредитную карту онлайн';
        $meta['keywords'] = 'Оформить заявку на кредитную карту онлайн, кредитная карта онлайн, заявка на кредитную карту';
        $meta['description'] = 'Оформите заявку на кредитную карту онлайн с минимальной процентной ставкой от 19% эксклюзивно на jCredit-Online.ru';

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('card');

        // получаем те офферы, которые опубликованы
        $data = \DB::table('offers_card')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')->get();

        return view('promo.card', [

            'descriptionCategory' => $descriptionCategory,
            'meta' => $meta,
            'data' => $data,

        ]);

    }

    /**
     * Отображение промо страницы с ипотечным кредитом
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function mort(DescriptionCategory $descriptionCategory){

        $meta = [];
        $meta['title'] = 'Оформить заявку на ипотеку онлайн';
        $meta['keywords'] = 'Оформите заявку на ипотеку онлайн с минимальной процентной ставкой от 9% эксклюзивно на jCredit-Online.ru';
        $meta['description'] = 'Оформить заявку на ипотеку онлайн, ипотека онлайн, заявка на ипотеку';

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('mort');

        // получаем те офферы, которые опубликованы
        $data = \DB::table('offers_mort')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')->get();

        return view('promo.mort', [

            'descriptionCategory' => $descriptionCategory,
            'meta' => $meta,
            'data' => $data,

        ]);

    }

    /**
     * Отображение промо страницы с автокредитами
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function auto(DescriptionCategory $descriptionCategory){

        $meta = [];
        $meta['title'] = 'Оформить заявку на автокредит онлайн';
        $meta['keywords'] = 'Оформить заявку на автокредит онлайн, автокредит онлайн, заявка на автокредит';
        $meta['description'] = 'Оформите заявку на автокредит онлайн с минимальной процентной ставкой от 10% и первноначальным взносом от 0% эксклюзивно на jCredit-Online.ru';

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('auto');

        // получаем те офферы, которые опубликованы
        $data = \DB::table('offers_auto')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')->get();

        return view('promo.auto', [

            'descriptionCategory' => $descriptionCategory,
            'meta' => $meta,
            'data' => $data,

        ]);

    }

    /**
     * Отображение промо страницы с вкладами
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function hold(DescriptionCategory $descriptionCategory){

        $meta = [];
        $meta['title'] = 'Вклад в банк под проценты онлайн';
        $meta['keywords'] = 'Вклад в банк под проценты онлайн, вклады в банк, ставки по вкладам';
        $meta['description'] = 'Откройте вклад онлайн до 20% годовых в рублях и до 10% валюте эксклюзивно на jCredit-Online.ru';

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('hold');

        // получаем те офферы, которые опубликованы
        $data = \DB::table('offers_hold')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')->get();

        return view('promo.hold', [

            'descriptionCategory' => $descriptionCategory,
            'meta' => $meta,
            'data' => $data,

        ]);

    }

    /**
     * Отображение промо страницы с бизнес кредитами
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function business(DescriptionCategory $descriptionCategory){

        $meta = [];
        $meta['title'] = 'Заявка на кредит для малого бизнеса';
        $meta['keywords'] = 'заявка на кредит для малого бизнеса, кредит для малого бизнеса, кредит на развитие бизнеса';
        $meta['description'] = 'Оформите заявку на кредит для малого бизнеса от 6-10% годовых эксклюзивно на jCredit-Online.ru';

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('biz');

        // получаем те офферы, которые опубликованы
        $data = \DB::table('offers_biz')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')->get();

        return view('promo.business', [

            'descriptionCategory' => $descriptionCategory,
            'meta' => $meta,
            'data' => $data,

        ]);

    }
}
