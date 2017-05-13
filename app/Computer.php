<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
	

    public function spec(){
    	return $this->hasOne('App\Spec');
    }

    protected $fillable = ['status'];
}
