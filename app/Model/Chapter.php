<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapter';
    protected $primaryKey = 'chapter_id';
    public $timestamps = false;

    protected $fillable = ['chapter_name','chapter_order','pre_chapter_id','next_chapter_id','novel_id','novel_name','updatetime','createtime'];
}
