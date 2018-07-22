<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FriendLink extends Model
{
    protected $table = 'friendlink';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['web','webname','status','priority'];
}
