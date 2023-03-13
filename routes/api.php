<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\RingToneController;
use App\Http\Controllers\WallpaperController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//~~ CATEGORY
Route::get("categoryData", "CategoryController@listCategory");
Route::post("searchCategory", "CategoryController@searchCategory");
//~~ ADVERTISE
Route::get('showAllAdd', 'AdvertiseController@showAllAdd');
// ~~~~ APP
Route::get('topApp', 'AppController@topApp');
//~~~RINGTONE
Route::get('RingtoneList', 'RingToneController@ringtoneList');
//~~~WALLPAPER
Route::get('WallpaperList', 'WallpaperController@wallpaperList');
//~~~~~ Admin 
Route::get('ShowAdmin','AdminController@showAdminData');