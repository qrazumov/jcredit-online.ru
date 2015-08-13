<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _New extends Model
{
    protected $table = 'news';

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

    ];
}
