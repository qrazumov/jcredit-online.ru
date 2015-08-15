<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{



    public function index(){


        return view('admin.index', [

            

        ]);

    }

    public function addArticle(){


        $category = \DB::table('categories')->select('id', 'title')->where('type', 'articles')->where('publish', '1')->get();

        foreach ($category as $v) {

            $allArticle[$v->title] = \DB::table('info')->select('id', 'title')->where('publish', '1')->where('category_id', $v->id)->get();

        }

        return view('admin.article.add', [

            'category' => $category,
            'allArticle' => $allArticle,

        ]);
    }

    public function listArticle(){


        $data = \DB::table('info')->paginate(100);

        // получаем все данные для отображения
        $data = \DB::table('info')
            ->join('categories', 'info.category_id', '=', 'categories.id')
            ->select('info.*', 'categories.title as categoryTitle')
            ->paginate(100);

        return view('admin.article.list', [

            'data' => $data,

        ]);

    }

    public function editArticle($id){

        $category = \DB::table('categories')->select('id', 'title')->where('type', 'articles')->where('publish', '1')->get();

        $categoryId = \DB::table('info')->select('category_id')->where('id', $id)->get()[0]->category_id;

        foreach ($category as $v) {


            if($v->id == $categoryId){
                $v->selected = 'selected';
                break;
            }

        }

        $data = \DB::table('info')->where('id', $id)->get()[0];

        foreach ($category as $v) {

            $allArticle[$v->title] = \DB::table('info')->select('id', 'title')->where('publish', '1')->where('category_id', $v->id)->get();

        }


        return view('admin.article.edit', [

            'data' => $data,
            'category' => $category,
            'allArticle' => $allArticle,

        ]);

    }


    public function addNew(){


        $category = \DB::table('categories')->select('id', 'title')->where('type', 'news')->where('publish', '1')->get();

        foreach ($category as $v) {

            $allArticle[$v->title] = \DB::table('news')->select('id', 'title')->where('publish', '1')->where('category_id', $v->id)->get();

        }

        return view('admin.new.add', [

            'category' => $category,
            'allArticle' => $allArticle,

        ]);
    }

    public function listNew(){


        $data = \DB::table('news')->paginate(100);

        // получаем все данные для отображения
        $data = \DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as categoryTitle')
            ->paginate(100);

        return view('admin.new.list', [

            'data' => $data,

        ]);

    }

    public function editNew($id){

        $category = \DB::table('categories')->select('id', 'title')->where('type', 'news')->where('publish', '1')->get();

        $categoryId = \DB::table('news')->select('category_id')->where('id', $id)->get()[0]->category_id;

        foreach ($category as $v) {


            if($v->id == $categoryId){
                $v->selected = 'selected';
                break;
            }

        }

        $data = \DB::table('news')->where('id', $id)->get()[0];

        foreach ($category as $v) {

            $allArticle[$v->title] = \DB::table('news')->select('id', 'title')->where('publish', '1')->where('category_id', $v->id)->get();

        }


        return view('admin.new.edit', [

            'data' => $data,
            'category' => $category,
            'allArticle' => $allArticle,

        ]);

    }

    public function category(){


        $data = \DB::table('categories')->get();



        return view('admin.category', [

            'data' => $data,

        ]);

    }

    public function getLogin(){




        return view('auth.login', [



        ]);

    }

    public function getRegister(){



        return view('auth.register', [



        ]);

    }


}
