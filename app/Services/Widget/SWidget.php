<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 07.08.2015
 * Time: 13:09
 */

namespace App\Services\Widget;


class SWidget {

//    // синглтон
//    protected static $instance;
//
//    private function __construct(){
//
//    }
//
//    public static function getInstance(){
//
//        if(self::$instance === null){
//
//            self::$instance = new self;
//
//            return self::$instance;
//
//        }
//
//        return self::$instance;
//
//    }
//    // \ синглтон

    public function adTopContent(){



        return view('widgets.topContent.html', [



        ]);

    }

    public function offerTopContent(){

        $offers = [];

        // получаем те офферы, которые опубликованы

        $offers['offers_nal'] = \DB::table('offers_nal')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')->take(3)
            ->join('banks', 'offers_nal.bank_id', '=', 'banks.id')
            ->select('offers_nal.*', 'banks.pic_bank')
            ->get();

        // получаем те офферы, которые опубликованы
        $offers['offers_micro'] = \DB::table('offers_micro')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')->take(3)->get();



        return view('widgets.topContent.offers', [

            'offers' => $offers,

        ]);

    }

    /**
     * Виджет рекламы для низа контента
     *
     * @param $type
     * @return \Illuminate\View\View
     */
    public function adBottomContent(){



        return view('widgets.bottomContent.html', [



        ]);

    }

    /**
     * Виджет рекламы для правого сайтбара
     *
     * @param $type
     * @return \Illuminate\View\View
     */
    public function adRightSidebar(){



        return view('widgets.rightSidebar.html', [



        ]);

    }

    /**
     * Виджет офферов для правого сайтбара
     *
     * @param $type
     * @return \Illuminate\View\View
     */
    public function offerRSidebar(){

        $offers = [];

        // получаем те офферы, которые опубликованы

        $offers['offers_nal'] = \DB::table('offers_nal')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')->take(5)
            ->join('banks', 'offers_nal.bank_id', '=', 'banks.id')
            ->select('offers_nal.*', 'banks.title')
            ->get();

        // получаем те офферы, которые опубликованы
        $offers['offers_micro'] = \DB::table('offers_micro')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')->take(5)
            ->join('banks', 'offers_micro.bank_id', '=', 'banks.id')
            ->select('offers_micro.*', 'banks.title')
            ->get();

        return view('widgets.rightSidebar.offers', [

            'offers' => $offers,

        ]);

    }

    /**
     * Виджет категорий для правого сайтбара
     *
     * @param $type
     * @return \Illuminate\View\View
     */
    public function categoryRightSidebar($type){


        switch($type){

            case "news":
                $data = \DB::table('categories')->where('publish', '1')->where('type', 'news')->get();
                return view('widgets.rightSidebar.categoryNews', ['data' => $data]);
                break;

            case "articles":
                $data = \DB::table('categories')->where('publish', '1')->where('type', 'articles')->get();
                return view('widgets.rightSidebar.categoryArticles', ['data' => $data]);
                break;

        }



    }

    public function testMethod(){}


























} 