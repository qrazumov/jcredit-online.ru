<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

 /**
 * Класс для отображения таблицы офферов в статьях
 *
 */
class AdsInArticleController extends Controller
{


    public function nal(){


        // получаем все данные для отображения
        $data = \DB::table('offers_nal')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')
            // ->join('banks', 'offers_nal.bank_id', '=', 'banks.id')
            // ->select('offers_nal.*', 'banks.pic_bank')
            ->get();


      return view('promo.adsBlock.nal', [

        'data' => $data,

        ]);

    }

    public function card(){


        // получаем все данные для отображения
        $data = \DB::table('offers_card')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')
            // ->join('banks', 'offers_card.bank_id', '=', 'banks.id')
            // ->select('offers_card.*', 'banks.pic_bank')
            ->get();


      return view('promo.adsBlock.card', [

        'data' => $data,

        ]);

    } 
    
    public function micro(){


        // получаем все данные для отображения
        $data = \DB::table('offers_micro')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')
            // ->join('banks', 'offers_micro.bank_id', '=', 'banks.id')
            // ->select('offers_micro.*', 'banks.pic_bank')
            ->get();

        foreach ($data as $d) {
            // добавляем метод снятия денег
            $d->removal_types = json_decode(\DB::table('offers_micro')->select('removal_types')->where('id', '=', $d->id)->get()[0]->removal_types);
        }            


      return view('promo.adsBlock.micro', [

        'data' => $data,

        ]);

    }  

    public function hold(){


        // получаем все данные для отображения
        $data = \DB::table('offers_hold')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')
            // ->join('banks', 'offers_hold.bank_id', '=', 'banks.id')
            // ->select('offers_hold.*', 'banks.pic_bank')
            ->get();
       

      return view('promo.adsBlock.hold', [

        'data' => $data,

        ]);

    }

    public function auto(){


        // получаем все данные для отображения
        $data = \DB::table('offers_auto')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')
            // ->join('banks', 'offers_auto.bank_id', '=', 'banks.id')
            // ->select('offers_auto.*', 'banks.pic_bank')
            ->get();
       

      return view('promo.adsBlock.auto', [

        'data' => $data,

        ]);

    }    

    public function mort(){


        // получаем все данные для отображения
        $data = \DB::table('offers_mort')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')
            // ->join('banks', 'offers_mort.bank_id', '=', 'banks.id')
            // ->select('offers_mort.*', 'banks.pic_bank')
            ->get();
       

      return view('promo.adsBlock.mort', [

        'data' => $data,

        ]);

    }    
    

    public function biz(){


        // получаем все данные для отображения
        $data = \DB::table('offers_biz')->where('publish_promo', '=', 1)->orderBy('priority', 'asc')
            // ->join('banks', 'offers_biz.bank_id', '=', 'banks.id')
            // ->select('offers_biz.*', 'banks.pic_bank')
            ->get();
       

      return view('promo.adsBlock.biz', [

        'data' => $data,

        ]);

    }    
    
          
       

   
}
