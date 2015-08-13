<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DescriptionCategory extends Model
{
    protected $table = 'description_category';

    public function getDescriptionCategory($page){

        return \DB::table('description_category')->where('category', '=', $page)->first();

    }
}
