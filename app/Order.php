<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table= 'orders';

    public function user()
     {
       return $this->belongsTo('App\User');
    }
    public function course()
    {
      return $this->hasMany('App\Course');
    }
}