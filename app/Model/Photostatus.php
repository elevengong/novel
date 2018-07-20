<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photostatus extends Model
{
    protected $table = 'photostatus';
    protected $primaryKey = 'novel_id';
    public $timestamps = false;
    protected $fillable = ['novel_id','photo','status'];
}
