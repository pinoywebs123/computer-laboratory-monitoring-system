<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_log extends Model
{
    public function student(){
    	return $this->belongsTo('App\Student', 'student_id', 'barcode');
    }
    public function staff(){
    	return $this->belongsTo('App\User', 'staff_id', 'id');
    }
    public function computer(){
    	return $this->belongsTo('App\Computer');
    }
   

    protected $fillable = ['end', 'status'];
}
