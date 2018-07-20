<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    protected $table = 'novel';
    protected $primaryKey = 'n_id';
    public $timestamps = false;
    protected $fillable = ['c_id','novel_name','novel_name_pinyin','initial','postdate','lastupdate','author_id','novel_intro','lastchapter_id','lastchapter'];
}
