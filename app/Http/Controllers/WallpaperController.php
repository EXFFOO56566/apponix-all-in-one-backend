<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallpaper;

class WallpaperController extends Controller
{
    //~~~~~~~~~~ API wallpaper list ~~~~~~~~~~~~~
    public function wallpaperList()
    {

        $wallpaper_data = Wallpaper::all();
        if ($wallpaper_data->isEmpty()) {
            return json_encode(["status" => 400, "message" => "No Data Found"]);
        } else {
            return json_encode(["status" => 200, "message" => "success", "data" => $wallpaper_data]);
        }
    }
    //~~~~~~~~ add new image wallpaper ~~~~~~~~~~~~~~~~~
    public function addWallpaperData(Request $req)
    {

        $access = session()->get('access');
        if ($access == 'true') {

            $wallpapers = new Wallpaper;

            $pic = $req->file('image');
            $new_file = time() . rand(1, 1000) . "." . $pic->getClientOriginalExtension();
            $pic->move("public/img", $new_file);

            $wallpapers->image = $new_file;

            if ($wallpapers->save()) {
                return back()->with("success", "Insert Success");
            } else {
                return back()->with("fail", "Inser fail");
            }
        } else {
            return back()->with('access_msg', 'You are not Authorized');
        }
    }

    //~~~~~~~~~~ show wallpaper table ~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function wallpaperTable()
    {
        $wallpapers = Wallpaper::all();

        return view("wallpaper/wallpaper_table", ["wallpapers" => $wallpapers]);
    }
    //~~~~~~~~ show wallpaper update data ~~~~~~~~~~~
    public function showWallpaperUpdate($id)
    {
        $wallpaper_data = Wallpaper::find($id);
        return view('wallpaper/update_wallpaper', ['wallpaper_data' => $wallpaper_data]);
    }
    //~~~~~~~~~~~~ update wallpaper ~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function updateWallpaperData(Request $req)
    {
        $access = session()->get('access');
        if ($access == 'true') {
            $wallpapers = Wallpaper::find($req->id);

            $deletewallpaper = $wallpapers->image;

            if ($req->file('image')) {

                $pic = $req->file('image');
                $new_file = time() . rand(1, 1000) . "." . $pic->getClientOriginalExtension();
                $pic->move("public/img/", $new_file);
                $wallpapers->image = $new_file;

                $path = "public/img/" . $deletewallpaper;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            if ($wallpapers->save()) {
                return back()->with("success", "Insert Success");
            } else {

                return back()->with("fail", "Insert fail");
            }
        } else {
            return back()->with('access_msg', 'You are not Authorized');
        }
    }
    //~~~~~~~~~~~~~~ delete wallpaper ~~~~~~~~~~~~
    public function wallpaperDelete($id)
    {

        $access = session()->get('access');
        if ($access == 'true') {
            $wallpaper = Wallpaper::find($id);

            $path = "public/img/" . $wallpaper->image;
            if (file_exists($path)) {
                unlink($path);
            }



            if ($wallpaper->delete()) {
                return back()->with("success", "Delete Success");
            } else {
                return back()->with("fail", "Delete fail");
            }
        } else {
            return back()->with('access_msg', 'You are not Authorized');
        }
    }
}
