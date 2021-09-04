<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
//    public $timestamps = false;
    protected $table = 'Items';
    protected $fillable = [
        'id',
        'users_id',
        'sort_id',
        'title',
        'content',
        'deadline',
    ];
}
