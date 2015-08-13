<?php

namespace App\Http\Controllers;

use App\Category;
use App\DescriptionCategory;
use App\Facades\Widget;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewController extends Controller
{
    protected $title = 'Новости финансово-экономической сферы ';

    /*
     * обрезаем текст полной новости до 200 символов
     * и ставим точку после последнего пробела
     */
    protected function get200Text($data){

        foreach ($data as $v) {
            $v->text = mb_substr($v->text, 0, 200, 'UTF-8');
            $num = mb_strrpos($v->text, ' ', 'UTF-8');
            $v->text = mb_substr($v->text, 0, $num, 'UTF-8');
            $v->text .='.';
        }

    }

    /**
     * Отображаем индексную страницу категорий новостей
     * здесь отображается лента всех новостей
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function index(DescriptionCategory $descriptionCategory){

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('news');

        $data = \DB::table('news')->where('publish', '1')->orderBy('id', 'desc')->paginate(10);

        $this->title .= $this->getTitlePagination();

        // обрезаем 200 символов текста новости
        $this->get200Text($data);

        return view('news.list', [

            'descriptionCategory' => $descriptionCategory,
            'data' => $data,
            'title' => $this->title,

        ]);



    }

    /**
     * Отображаем пагинацией все новости в конкретной категории
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function categoryId($id){


        try{
            $data = \DB::table('news')->where('category_id', $id)->where('publish', '1')->orderBy('id', 'desc')->paginate(10);
            $categoryTitle = Category::select('title')->where('id', $id)->where('publish', 1)->get()[0]->title;
        }catch (\ErrorException $e){
            abort(404);
        }

        // обрезаем 200 символов текста новости
        $this->get200Text($data);

        $this->title .= ': ' . $categoryTitle . $this->getTitlePagination();

        return view('news.list', [

            'title' => $this->title,
            'data' => $data,
            'categoryTitle' => $categoryTitle,

        ]);

    }

    /**
     * Отображение конкретной новости
     *
     * @param $url
     * @return \Illuminate\View\View
     */
    public function _new($url){
        // получаем информацию о статьие по урлу
        $data = \DB::table('news')->where('url', $url)->get()[0];

        // определяем, какой категории она принадлежит
        $categoryData = \DB::table('categories')->select('title', 'id')->where('id', $data->category_id)->get()[0];

        // получаем массив с id похожими статьями
        $seeAlso = json_decode($data->see_also);

        // получаем эти статьи из базы
        $seeAlsoArticles = \DB::table('news')->whereIn('id', $seeAlso)->get();
        // добавляем в $data как свойство
        $data->seeAlso = $seeAlsoArticles;

        // инкрементируем поле views
        \DB::table('news')->increment('views');

        $meta = [];
        $meta['title'] = $data->title;

        return view('news.new', [

            'data' => $data,
            'categoryData' => $categoryData,
            'meta' => $meta,

        ]);

    }
}
