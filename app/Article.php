<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'info';

    protected $fillable = [

        'publish',
        'text',
        'title',
        'keywords',
        'description',
        'category_id',
        'pic_preview',
        'views',
        'url',
        'see_also',
        'published_at',
        'widget_type',

    ];


}
