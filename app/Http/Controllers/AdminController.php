<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
   // ~~~~~~~~~~api Admin data ~~~~~~~~~~~~~
   public function showAdminData(){
       $admin_data=Admin::where('access',"true")->get();
       $batch = array("status" => 200, "message" => "success", "data" => $admin_data);
       return json_encode($batch);
       } 
}
