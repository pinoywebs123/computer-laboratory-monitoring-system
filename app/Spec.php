<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    protected $fillable = ['processor', 'motherboard', 'ram', 'hdd','keyboard','mouse'];
}
