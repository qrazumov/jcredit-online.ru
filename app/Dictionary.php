<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $table = 'dictionary';

    protected $fillable = [
        'title',
        'text',
    ];

    /**
     * Возвращает объект с терминами, разбитыми
     * на блоки по $countPage страниц
     *
     * @return mixed
     */
    public function getPaginateTerms($countPage){

        return Dictionary::paginate($countPage);

    }

    /**
     * Преобразуем объект eloquent orm в
     * вид, который нужен для корренктого
     * вывода терминов
     *
     * @param $paginateTerms
     * @return array
     */
    public function transform($paginateTerms){

        $arr = []; // промежуточное состояние массива
        for($i = 0; $i < count($paginateTerms); $i++){

            $arr[$i]['id'] = $paginateTerms[$i]->id;
            $arr[$i]['title'] = $paginateTerms[$i]->title;
            $arr[$i]['text'] = $paginateTerms[$i]->text;

        }

        // формируем трехмерный массив для вывода текста термина
        $terms = [];
        for ($i = 0; $i < count($arr); $i ++) {
            $one_letter = mb_substr($arr[$i]['title'], 0, 1, 'utf-8'); // получили 1-ю букву термина
            $one_letter = mb_convert_case($one_letter, MB_CASE_UPPER, "UTF-8"); // переводим букву в верхний регистр
            $terms[$one_letter][$i]['title'] = $arr[$i]['title']; // записываем заголовок термина
            $terms[$one_letter][$i]['text'] = $arr[$i]['text']; // записываем текст термина
        }

        return $terms;

    }

    /**
     * Разбивает термины по блокам для пагинации,
     * также выбирает термины, начинающиеся с
     * буквы $letter
     *
     * @param int $countPage
     * @param string $letter
     * @return mixed
     */
    public function getPaginateTermOnLetter($countPage = 5, $letter = 'А'){

        return Dictionary::where('title', 'like', $letter . '%')->paginate($countPage);

    }

}
