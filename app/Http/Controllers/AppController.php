<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App;
use App\Category;

class AppController extends Controller
{
    //~~~~~~~~~~~~~~ ADD NEW APP ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function addNewApp(Request $req)
    {
        $access = session()->get('access');
        if ($access == 'true') {


            $this->validate(
                $req,
                [
                    'app_name' => 'required',
                    'app_url' => 'required',
                    'category_id' => 'required',
                    'app_icon' => 'mimes:jpeg,jpg,png,gif,jfif|required',
                    'category_id' => 'required',

                ]
            );

            $apps = new App;

            $apps->app_name = $req->app_name;
            $apps->app_url = $req->app_url;
            $apps->category_id = $req->category_id;
            if ($req->top == null) {
                $top = "false";
            } else {
                $top = "true";
            }

            $apps->top = $top;

            $pic = $req->file('app_icon');
            $new_file = time() . rand(1, 1000) . "." . $pic->getClientOriginalExtension();
            $pic->move("public/img", $new_file);

            $apps->app_icon = $new_file;

            if ($apps->save()) {
                return redirect('addApp')->with("success", "Insert Success");
            } else {
                return redirect('addApp')->with("fail", "Inser fail");
            }
        } else {
            return redirect('addApp')->with('access_msg', 'You are not Authorized');
        }
    }

    //~~~~~~~~~~~~~~~~~~~~~~~~ SHOW APP TABLE ~~~~~~~~~~~~~~~~~~~~~~~~~

    public function showAppTable()
    {

        $apps = App::all();
        $categories = Category::all();

        return view("app/app_table", ["apps" => $apps, "categories" => $categories]);
    }

    //~~~~~~~~~~~~~~~~~~~~~~~~~ DELETE APP ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function deleteApp($app_id)
    {
        $access = session()->get('access');
        if ($access == 'true') {


            $apps = App::find($app_id);

            $path = "public/img/" . $apps->app_icon;
            if (file_exists($path)) {
                unlink($path);
            }




            if ($apps->delete()) {
                return redirect('app_table')->with("success", "Delete Success");
            } else {
                return redirect('app_table')->with("fail", "Delete fail");
            }
        } else {
            return redirect('app_table')->with('access_msg', 'You are not Authorized');
        }
    }

    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~ DISPLAY UPDATE DATA ~~~~~~~~~~~~~~~~~~~~~~~~~
    function showUpdateAppData($app_id)
    {
        $categories = Category::all();
        $data = App::find($app_id);

        return view("app/update_app", ['updatedata' => $data, 'categories' => $categories]);
    }

    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ UPDATE APP ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    public function updateApp(Request $req)
    {

        $access = session()->get('access');
        if ($access == 'true') {

            // dd($req->app_id);
            $apps = App::find($req->app_id);


            $apps->app_name = $req->app_name;
            $apps->app_url = $req->app_url;

            $deleteIcon = $apps->app_icon;


            if ($req->file('app_icon')) {

                $pic = $req->file('app_icon');
                $new_file = time() . rand(1, 1000) . "." . $pic->getClientOriginalExtension();
                $pic->move("public/img/", $new_file);
                $apps->app_icon = $new_file;

                $path = "public/img/" . $deleteIcon;
                if (file_exists($path)) {
                    unlink($path);
                }

                
            }
            if ($req->top == null) {
                $top = "false";
            } else {
                $top = "true";
            }


            $apps->top = $top;

            if ($apps->save()) {
                return redirect('app_table')->with("success", "Insert Success");
            } else {
                return redirect('app_table')->with("fail", "Insert fail");
            }
        } else {
            return redirect('app_table')->with('access_msg', 'You are not Authorized');
        }
    }
    //~~~~~~~~~~~API TOP APP ~~~~~~~~~~~~~~~~~~~~~
    public function topApp()
    {
        $data = App::where('top', "true")->get();
        foreach ($data as  $app) {
            $apps[] = array(
                "app_name" => "$app->app_name",
                "app_icon" => "$app->app_icon",
                "app_url" => "$app->app_url",
                "top" => "$app->top"
            );
        }
        $batch = array("message" => "success", "status" => 200, "data" => $apps);

        return json_encode($batch);
    }
}
