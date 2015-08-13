<?php

namespace App\Http\Controllers;

use App\Bank;
use App\DescriptionCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BanksController extends Controller
{
    /**
     * Отображаем главную страницу со списком
     * банков
     *
     * @param DescriptionCategory $descriptionCategory
     * @param Bank $bank
     * @return \Illuminate\View\View
     */
    public function index(DescriptionCategory $descriptionCategory, Bank $bank){

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('bank');

        $banks = $bank->getPaginateBank(5);

        return view('banks.indexBanks', [

            'descriptionCategory' => $descriptionCategory,
            'banks' => $banks,

        ]);

    }

    /**
     * Отображаем конкретный банк по url
     *
     * @param $id
     * @param Bank $bank
     * @return \Illuminate\View\View
     */
    public function getOnId($id, Bank $bank){

        $bankInfo = $bank->getBankInfo($id); //доделать

        return view('banks.bankPost', [

            'bank' => $bankInfo,

        ]);

    }
}
