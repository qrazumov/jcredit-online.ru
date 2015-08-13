<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bank extends Model
{
    /**
     * Получаем информацию по банкам с количеством
     * кредитных предложений, разбитыми на блоки
     * пагинации
     *
     * @param int $countPage
     * @return mixed
     */
    public function getPaginateBank($countPage = 10){

        // выводить только опубликованные записи(publish = 1)
        $banks = Bank::select(['id', 'title', 'pic_bank', 'url', 'rank', 'site'])->where('publish', '=', '1')->orderBy('id', 'desc')->paginate($countPage);

        foreach ($banks as $bank) {
            $bank->countOffersNal = \DB::table('offers_nal')->where('bank_id', '=', $bank->id)->count('id');
            $bank->countOffersCard = \DB::table('offers_card')->where('bank_id', '=', $bank->id)->count('id');
            $bank->countOffersMicro = \DB::table('offers_micro')->where('bank_id', '=', $bank->id)->count('id');
            $bank->countOffersMort = \DB::table('offers_mort')->where('bank_id', '=', $bank->id)->count('id');
            $bank->countOffersAuto = \DB::table('offers_auto')->where('bank_id', '=', $bank->id)->count('id');
            $bank->countOffersHold = \DB::table('offers_hold')->where('bank_id', '=', $bank->id)->count('id');
        }

        return $banks;
    }

    /**
     * Вернет объект с информацией по конкретному банку,
     * также содержит количество кредитных предложений по банку
     *
     * @param $id
     * @return array|static[]
     */
    public function getBankInfo($id){

        /**
         * если пользователь прописал руками
         * неверный url, то вернет 404 ошибку
         */
        try{
            $bankInfo = \DB::table('banks')->where('url', '=', $id)->get()[0];
        }catch (\ErrorException $e){
            abort(404);
        }

        $bankInfo->countOffersNal = \DB::table('offers_nal')->where('bank_id', '=', $bankInfo->id)->count('id');
        $bankInfo->countOffersCard = \DB::table('offers_card')->where('bank_id', '=', $bankInfo->id)->count('id');
        $bankInfo->countOffersMicro = \DB::table('offers_micro')->where('bank_id', '=', $bankInfo->id)->count('id');
        $bankInfo->countOffersMort = \DB::table('offers_mort')->where('bank_id', '=', $bankInfo->id)->count('id');
        $bankInfo->countOffersAuto = \DB::table('offers_auto')->where('bank_id', '=', $bankInfo->id)->count('id');
        $bankInfo->countOffersHold = \DB::table('offers_hold')->where('bank_id', '=', $bankInfo->id)->count('id');

        return $bankInfo;

    }

}
