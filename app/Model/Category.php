<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'c_id';
    public $timestamps = false;

    protected $fillable = ['c_name','c_name_pinyin','c_keyword','c_description','show','priority'];
}
