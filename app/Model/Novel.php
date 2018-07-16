<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    protected $table = 'novel';
    protected $primaryKey = 'n_id';
    public $timestamps = false;
}
