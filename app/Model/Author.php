<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';
    protected $primaryKey = 'author_id';
    //public $timestamps = false;
    protected $fillable = ['author','author_pinyin','author_cover_path','author_cover_path','author_intro','author_keyword','author_description','status'];

}
