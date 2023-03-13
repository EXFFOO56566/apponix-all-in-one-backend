<?php

use App\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\RingToneController;
use App\Http\Controllers\WallpaperController;
use App\Http\Controllers\NotificationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  if (session()->has('data')) {
    return redirect('home');
  } else {

    return redirect('form');
  }
  //return view('table');
});
//Route::view("table", "table");
Route::get("/", "LoginController@form");
Route::get("home", "LoginController@home");

Route::post("loginAdmin", "LoginController@loginAdmin");
Route::get('logout', 'LoginController@logout');
Route::post("keyAuth", 'LoginController@keyAuth');
//~~~~~~~~~~~  MIDDLEWARE  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Route::group(['middleware' => 'LoginAdmin'], function () {

  // $access = session()->get('access');

  //~~~~~~~~~~ CATEGORY  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  Route::get('category_table', 'CategoryController@showCategoryTable');
  Route::view("add_category", "category/add_category");
  Route::post("addCategory", "CategoryController@addCategory");
  Route::get('CatDelete{category_id}', "CategoryController@deleteCategory");
  Route::get("CatUpdate{category_id}", "CategoryController@showUpdateCategoryData");
  Route::post("updateCategory", "CategoryController@updateCategory");

  //~~~~~~~~~~~~~~~ APP ~~~~~~~~~~~~~~~~~~~~~~~~~~~
  Route::get("addApp", function () {
    $data = Category::all();
    if ($data) {
      return view("app/add_app", ['categories' => $data]);
    } else {
      return view('error');
    }
  });
  Route::post('addNewApp', 'AppController@addNewApp');
  Route::get('app_table', 'AppController@showAppTable');
  Route::get('AppDelete{app_id}', "AppController@deleteApp");
  Route::get("AppUpdate{app_id}", "AppController@showUpdateAppData");
  Route::post("updateApp", 'AppController@updateApp');

  //~~~~~~~~~~~~~~~~~~ ADVERTISE ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  Route::get('show_ad', 'AdvertiseController@showAdvertiseData');
  Route::get("AdUpdate{ad_id}", 'AdvertiseController@showUpdateAdData');
  Route::post("updateAd", 'AdvertiseController@updateAd');
  //~~~~~~~~~~~~~~ADMIN ~~~~~~~~~~~~~~`
  Route::view('ChangeAdminPassword', 'login/change_pass');
  Route::post('changePassword', 'LoginController@changePassword');
  
  //~~~~~~~~~~~ Ringtone ~~~~~~~~~~~~~~~~~~~
  Route::view('AddRingtone','ringtone/add_ringtone');
  Route::post('AddRingtoneData','RingToneController@AddRingtoneData');  
  Route::get('RingtoneTable','RingToneController@ringtoneTable');
  Route::get('RingtoneUpdate{id}','RingToneController@showUpdateRingtoneData');
  Route::post('UpdateRingtoneData','RingToneController@updateRingtoneData');
  Route::get('RingtoneDelete{id}','RingToneController@ringtoneDelete');
  //~~~~~~~~~~ wallpaper ~~~~~~~~~~
  Route::view('AddWallpaper','wallpaper/add_wallpaper');
  Route::post('AddWallpaperData','WallpaperController@addWallpaperData');
  Route::get('WallpaperTable','WallpaperController@wallpaperTable');
  Route::get('WallpaperUpdate{id}','WallpaperController@showWallpaperUpdate');
  Route::post('UpdateWallpaperData','WallpaperController@updateWallpaperData');
  Route::get('WallpaperDelete{id}','WallpaperController@wallpaperDelete');

//~~~~~~~ Notification ~~~~~~~~~~~~~~~~

  Route::post("/pushNotification",'NotificationController@pushnotification');
});
