<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function time(){
    	return $this->hasOne('App\student_time', 'student_id', 'student_id');
    }
}
