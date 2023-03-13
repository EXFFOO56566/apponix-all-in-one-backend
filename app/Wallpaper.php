<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{
    public $timestamps=false;
    protected $primaryKey='id';
    protected $table='wallpaper';
}
