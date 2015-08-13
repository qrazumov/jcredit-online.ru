<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $fillable = [
        'name',
        'active',
        'object_data',
    ];

    /**
     * Получаем объект со всеми виджетами
     * всех позиций
     *
     * @return mixed
     */
    public function getAllWidgets(){

        $data = \DB::table('widgets')->get();

        // процесс компоновки объект
        for($i = 0; $i < count($data); $i++){

            $obj[$data[$i]->name_location]['active'] = $data[$i]->active;
                for($j = 0; $j < count((array) json_decode($data[$i]->object_data)); $j++){
                    $obj[$data[$i]->name_location]['types'] = json_decode($data[$i]->object_data);
                }


        }

        return $obj;

    }

}
