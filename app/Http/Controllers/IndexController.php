<?php

namespace App\Http\Controllers;

use App\DescriptionCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Отображение главной страницы сайта
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function index(DescriptionCategory $descriptionCategory){

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('index');


        // получаем все данные для отображения
        $data = \DB::table('offers_nal')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')
            ->join('banks', 'offers_nal.bank_id', '=', 'banks.id')
            ->select('offers_nal.*', 'banks.pic_bank')
            ->get();

        $articles = \DB::table('info')->where('publish', '1')->take(6)->orderBy('id', 'desc')->get();
        $news = \DB::table('news')->where('publish', '1')->take(6)->orderBy('id', 'desc')->get();



        $offers = [];

        $offers['nal'] = \DB::table('offers_nal')->where('offers_nal.publish', '=', '1')->orderBy('id', 'desc')->take('1')
            ->join('banks', 'offers_nal.bank_id', '=', 'banks.id')
            ->select('offers_nal.*', 'banks.pic_bank')
            ->get()[0];

        $offers['card'] = \DB::table('offers_card')->where('offers_card.publish', '=', 1)->orderBy('id', 'desc')->take('1')
            ->join('banks', 'offers_card.bank_id', '=', 'banks.id')
            ->select('offers_card.*', 'banks.pic_bank')
            ->get()[0];

        $offers['micro'] = \DB::table('offers_micro')->where('offers_micro.publish', '=', 1)->orderBy('id', 'desc')->take('1')
            ->join('banks', 'offers_micro.bank_id', '=', 'banks.id')
            ->select('offers_micro.*', 'banks.pic_bank')
            ->get()[0];

        $offers['hold'] = \DB::table('offers_hold')->where('offers_hold.publish', '=', 1)->orderBy('id', 'desc')->take('1')
            ->join('banks', 'offers_hold.bank_id', '=', 'banks.id')
            ->select('offers_hold.*', 'banks.pic_bank')
            ->get()[0];

        $offers['mort'] = \DB::table('offers_mort')->where('offers_mort.publish', '=', 1)->orderBy('id', 'desc')->take('1')
            ->join('banks', 'offers_mort.bank_id', '=', 'banks.id')
            ->select('offers_mort.*', 'banks.pic_bank')
            ->get()[0];

        $offers['auto'] = \DB::table('offers_auto')->where('offers_auto.publish', '=', 1)->orderBy('id', 'desc')->take('1')
            ->join('banks', 'offers_auto.bank_id', '=', 'banks.id')
            ->select('offers_auto.*', 'banks.pic_bank')
            ->get()[0];


        $banks = \DB::table('banks')->where('publish', 1)->orderBy('id', 'desc')->take(8)->get();

        foreach ($banks as $v) {
            $v->text = mb_substr($v->text, 0, 100, 'UTF-8');
            $num = mb_strrpos($v->text, ' ', 'UTF-8');
            $v->text = mb_substr($v->text, 0, $num, 'UTF-8');
            $v->text .='...';
        }







        return view('index', [
            'descriptionCategory' => $descriptionCategory,
            'data' => $data,
            'articles' => $articles,
            'news' => $news,
            'offers' => $offers,
            'banks' => $banks,
        ]);

    }

    /**
     * Отображение кредитного калькулятора
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function calc(DescriptionCategory $descriptionCategory){

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('calc');

        return view('services.calc', [

            'descriptionCategory' => $descriptionCategory,

        ]);

    }

    /**
     * Отображение сервиса теста на кредитоспособность
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function solvency(DescriptionCategory $descriptionCategory){

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('solvency');

        return view('services.solvency', [

            'descriptionCategory' => $descriptionCategory,

        ]);

    }

    /**
     * Отображение сервиса ответов на вопросы
     *
     * @param DescriptionCategory $descriptionCategory
     * @return \Illuminate\View\View
     */
    public function question(DescriptionCategory $descriptionCategory){

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('questions');

        return view('services.questions', [

            'descriptionCategory' => $descriptionCategory,

        ]);

    }

    public function search(){


        return view('services.search', []);

    }
}
