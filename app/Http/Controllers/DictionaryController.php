<?php

namespace App\Http\Controllers;

use App\DescriptionCategory;
use App\Dictionary;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DictionaryController extends Controller
{
    /**
     * Главная страница словаря
     * с пагинацией
     *
     * @return Response
     */
    public function index(Dictionary $dictionary, DescriptionCategory $descriptionCategory)
    {
        // принимаем термины, разбитые по n блоков
        $paginateTerms = $dictionary->getPaginateTerms(5);

        $terms = $dictionary->transform($paginateTerms);

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('dictionary');

        return view('dictionary.indexDictionary', [

            'terms' => $terms,
            'pagination' => $paginateTerms,
            'descriptionCategory' => $descriptionCategory,

        ]);
    }

    /**
     * Вывод терминов по буквам
     *
     * @return Response
     */
    public function letter($letter, Dictionary $dictionary, DescriptionCategory $descriptionCategory){

        // если не одна буква юникода, то отвечаем 404 ошибкой
        if(!preg_match('/^\\w{1}$/u', $letter)){
           abort(404);
        }

        $paginateTerms = $dictionary->getPaginateTermOnLetter(5, $letter);

        $terms =  $dictionary->transform($paginateTerms);

        // признак, чтоб скрыть таблицу с буквами
        $isLetter = true;

        $descriptionCategory = $descriptionCategory->getDescriptionCategory('dictionary');

        return view('dictionary.indexDictionary', [

            'terms' => $terms,
            'pagination' => $paginateTerms,
            'isLetter' => $isLetter,
            'letter' => $letter,
            'descriptionCategory' => $descriptionCategory,

        ]);



    }

}
