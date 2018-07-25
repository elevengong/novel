<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebStatic extends Model
{
    protected $table = 'webstatic';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['static_name','static'];
}
