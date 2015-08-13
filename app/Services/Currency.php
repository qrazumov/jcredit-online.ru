<?php
/**
 * Created by PhpStorm.
 * User: razumov
 * Date: 20.07.2015
 * Time: 2:36
 */

namespace App\Services;


class Currency {

    /**
     * Возвращает массив с курсами валют,
     * парсит xml документ с сайта центробанка России
     *
     * @return array
     */
    protected function getCurrencyArray(){

        $current_date = time(); // текущие время в unix формате

        $day = date("d", $current_date);
        $month =  date("m", $current_date);
        $year =  date("Y", $current_date);

        // формируем следующий день
        $last_day = $day + 1;
        if ($day < 10) {
            $last_day = "0".$last_day;
        }

        // если текущий день месяца - последний
        if($day == strftime("%d", mktime(0, 0, 0, $month, 0, $year))){
            $last_day = "01";
        }

        // по евро на сегодня завтра
        $url_euro = "http://www.cbr.ru/scripts/XML_dynamic.asp?date_req1=".$day."/".$month."/".$year."&date_req2=".$last_day."/".$month."/".$year."&VAL_NM_RQ=R01239";

        // по доллару на сегодня и завтра
        $url_dollar = "http://www.cbr.ru/scripts/XML_dynamic.asp?date_req1=".$day."/".$month."/".$year."&date_req2=".$last_day."/".$month."/".$year."&VAL_NM_RQ=R01235";

        $euro = file_get_contents($url_euro);
        $dollar = file_get_contents($url_dollar);


        // создаем объект для работы с xml
        $xml_euro = new \SimpleXMLElement($euro);
        $xml_dollar = new \SimpleXMLElement($dollar);

        // если на сегодня-завтра не установлен курс
        if(!isset($xml_euro->Record) || !isset($xml_dollar->Record)){

            return [
                'dollar' => 0,
                'euro' => 0,

            ];

        }

        // узнаем курс валют  на сегодня
        $current_dollar = $xml_dollar->Record[0]->Value;
        $current_euro = $xml_euro->Record[0]->Value;


        $current_dollar = preg_replace("/([0-9]{2})(,)([0-9]{4})/", "\${1}.\$3" , $current_dollar);
        $current_euro = preg_replace("/([0-9]{2})(,)([0-9]{4})/", "\${1}.\$3" , $current_euro);

        // записываем новый курс в бд

        return [
            'dollar' => (float) $current_dollar,
            'euro' => (float) $current_euro,
        ];

    }

    /**
     * Если текущая дата на сервере и в бд совпадают,
     * то выводим текущий курс из бд,
     * иначе пробуем получить новый, записываем
     * его в бд(нули, если не установлен),
     * и выводим новый курс
     *
     * @return array
     */
    public function getCurrency(){

        $currentDayFromDBUnix = \DB::table('quote')->select('date')->orderBy('id', 'desc')->first()->date;
        $currentDay = date("j", time()); // день текущий из бд
        $currentDayFromDB = date("j", $currentDayFromDBUnix); // день текущий

        if($currentDay == $currentDayFromDB){
            return $this->getCurrencyFromDB();

        }else{
            $this->setCurrency();
            return $this->getCurrencyFromDB();
        }
    }

    /**
     * Записываем новый курс валют
     * в базу данных
     *
     * @return void
     */
    protected function setCurrency(){

        $currencyArray = $this->getCurrencyArray();

        \DB::table('quote')->insert([
            'dollar' => $currencyArray['dollar'],
            'euro' => $currencyArray['euro'],
            'date' => time(),
        ]);
    }

    /**
     * Получаем все данные по курсам из бд
     *
     * @return array
     */
    protected function getCurrencyFromDB(){

        $currency = \DB::table('quote')->select(['dollar', 'euro', 'date'])->orderBy('id', 'desc')->where('dollar', '!=', 0)->take(2)->get();
        $diffDollar = round($currency[0]->dollar - $currency[1]->dollar, 4);
        $diffEuro = round($currency[0]->euro - $currency[1]->euro, 4);

        return [
            'dollar' => $currency[0]->dollar,
            'euro' => $currency[0]->euro,
            'pDollar' => $currency[1]->dollar,
            'pEuro' => $currency[1]->euro,
            'diffDollar' => $diffDollar,
            'diffEuro' => $diffEuro,
            'dateD' => date('d', $currency[0]->date),
            'dateM' => date('m', $currency[0]->date),
            'pDateD' => date('d', $currency[1]->date),
            'pDateM' => date('m', $currency[1]->date),
        ];

    }

} 