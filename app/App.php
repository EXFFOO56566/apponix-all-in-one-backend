<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $table="app";
    protected $primaryKey="app_id";
    public $timestamps=false;
}
