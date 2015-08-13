<?php

namespace App\Services;

abstract class Translit {


    static public function translit($str){
        $alfavit = array(
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'e',
            'ж' => 'j',
            'з' => 'z',
            'и' => 'i',
            'й' => 'i',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'c',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'sh',
            'ы' => 'i',
            'ь' => '',
            'ъ' => '',
            'э' => 'e',
            'ю' => 'u',
            'я' => 'ya'
        );

        $str = preg_replace("/[ ]/iu", "_", $str);
        $str = preg_replace("/[^a-zA-Zа-яА-Я0-9_]/iu", "", $str);
        $str = preg_replace("/[_]{2}/iu", "_", $str);
        $str = mb_convert_case($str, MB_CASE_LOWER,"UTF-8");

        foreach ($alfavit as $k => $v){
            $str = preg_replace("/$k/iu", $v, $str);
        }
        return $str;
    }

}
