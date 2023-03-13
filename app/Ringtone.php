<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ringtone extends Model
{
    public $timestamps=false;
    protected $primaryKey='id';
    protected $table='ringtone';
    
}
