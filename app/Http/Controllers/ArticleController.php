<?php

namespace App\Http\Controllers;

use App\Category;
use App\DescriptionCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpParser\Error;

class ArticleController extends Controller
{
    protected $title = 'Статьи в помощь заемщику в категории: ';

    /**
     * Отображаем индексную страницу категорий статей
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function index(DescriptionCategory $descriptionCategory){

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('info');



        return view('articles.indexArticles', [

            'descriptionCategory' => $descriptionCategory,

        ]);

        

    }

    /**
     * Отображаем пагинацией все статьи в конкретной категории
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function categoryId($id){

        // почему-то не работает upd:заработало. спасибо stackoverflow!
        //$data = Category::find($id)->articles()->where('publish', '1')->paginate(5);

        try{
            $data = \DB::table('info')->where('category_id', $id)->where('publish', '1')->where('published_at', '<=', Carbon::now())->orderBy('id', 'desc')->select('title', 'url')->paginate(10);
            $categoryTitle = Category::select('title')->where('id', $id)->where('publish', 1)->get()[0]->title;
        }catch (\ErrorException $e){
            abort(404);
        }

        $this->title .= $categoryTitle . $this->getTitlePagination();

        return view('articles.list', [

            'title' => $this->title,
            'data' => $data,
            'categoryTitle' => $categoryTitle,

        ]);

    }

    /**
     * Отображение конкретной статьи
     *
     * @param $url
     * @return \Illuminate\View\View
     */
    public function article($url){
        // получаем информацию о статьие по урлу
        try{
            $data = \DB::table('info')->where('url', $url)->where('published_at', '<=', Carbon::now())->where('publish', '1')->get()[0];
        }catch (\ErrorException $e){
            abort(404);
        }


        // определяем, какой категории она принадлежит
        $categoryData = \DB::table('categories')->select('title', 'id')->where('id', $data->category_id)->get()[0];

        // получаем массив с id похожими статьями
        $seeAlso = json_decode($data->see_also);

        // получаем эти статьи из базы
        $seeAlsoArticles = \DB::table('info')->whereIn('id', $seeAlso)->get();
        // добавляем в $data как свойство
        $data->seeAlso = $seeAlsoArticles;

        // инкрементируем поле views
        \DB::table('info')->increment('views');

        $meta = [];
        $meta['title'] = $data->title;
        $meta['keywords'] = $data->keywords;
        $meta['description'] = $data->description;

        return view('articles.article', [

            'data' => $data,
            'categoryData' => $categoryData,
            'meta' => $meta,

        ]);

    }
}
