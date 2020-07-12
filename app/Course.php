<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table='courses';
    protected $fillable=[
      'user_id','nsu_id','course', 'section','class_start','class_end'
    ];
    public function users()
    {
      return $this->belongsTo('App\User');
    }  
    public function order()
    {
      return $this->belongsTo('App\Order');
    }
}
