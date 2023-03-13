<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Category;
use App\App;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
  //~~~~~~~~~~~~~~ ADMIN LOGIN ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  function loginAdmin(Request $req)
  {

    $username = $req->username;
    $password = base64_encode($req->password);

    $data = Admin::Where('username', $username)->Where('password', $password)->first();


    if (!empty($data)) {
      if ($data['access'] == "true") {

        $server_api = Http::post('https://dev.digicean.com/api/clientpackagechk', [
          "key" => $data->app_key,
          "package" => $data->package
        ]);
        $api = json_decode($server_api);
        if ($data['app_key'] == null or $data['package'] == null) {

          return view('login/key_auth', ['username' => $username]);
        } else {
          if ($api->message == "not same") {
            return view('login/key_auth', ['username' => $username]);
          }
        }
      }

      session()->put('access', $data->access);
      session()->put('admin_id', $data->id);

      $req->session()->put('admin', $req->input());


      return redirect('home');
    } else {

      return redirect('')->with('message', 'Invalid Username or Password ');
    }
  }

  // ~~~~~~~~~~~~~~~~~~~ key auth  `~~~~~~~~~~~~~~~~~
  public function keyAuth(Request $req)
  {

    $key = $req->all();

    //echo $data;
    $server_api = Http::post('https://dev.digicean.com/api/clientpackagechk', [
      "key" => $key['app_key'],
      "package" => $key['package']
    ]);
    $api = json_decode($server_api);

    // if ($api->message == "not same") {

    //   return redirect('')->with('message', 'Invalid key or Package ');
    // } else 
    if ($api->message == "success") {

      $admin = Admin::where('username', $req->username)->first();
      $admin->app_key = $key['app_key'];
      $admin->package = $key['package'];
      if ($admin->save()) {
        session()->put('access', $admin->access);
        session()->put('admin_id', $admin->id);
        session()->put('admin', $admin);
        return redirect('home');
      }
    } else {

      return redirect('')->with('message', 'Invalid key or Package ');
    }
  }


  //~~~~~~~~~~~~~~~~~~~~~~LOG OUT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  function logout()
  {
    session()->forget('admin');

    //session()->forget()->all();
    return redirect('/');
  }

  //~~~~~~~~~~~~~~~~~  HOME ~~~~~~~~~~~~~~~~~~~~~~~~~~~
  function home()
  {

    $categories = count(Category::all());
    $apps = count(App::all());


    if (session()->has('admin')) {
      return view('home', compact('categories', 'apps'));
    } else {
      return redirect('/');
    }
  }

  //~~~~~~~~~~~~~~~~~~~~  FORM ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  public function form()
  {

    if (session()->has('admin')) {
      return redirect('home');
    } else {
      return view('login/login_form');
    }
  }

  //~~~~~~~~~~~~~~~~~~~~~ CHANGE PASSWORD ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  

  public function changePassword(Request $req)
  {
    $access = session()->get('access');
    if ($access == 'true') {


      $admin_id = session()->get('admin_id');
      //dd($admin_id);

      $admin = Admin::find($admin_id);
      $old_password = base64_decode($admin->password);

      if ($req->old_pass == $old_password) {

        $password = $req->password;
        $cpassword = $req->cpassword;

        if ($password == $cpassword) {
          $admin->password = base64_encode($req->password);
          $admin->save();
        } else {
          return redirect('ChangeAdminPassword')->with('c_pass', 'Conform password not match');
        }
      } else {
        return redirect('ChangeAdminPassword')->with('old_pass', 'invalid Old Password');
      }
      if ($admin->save()) {
        return redirect('ChangeAdminPassword')->with('success', 'password changed successfully');
      } else {
        return redirect('ChangeAdminPassword')->with('fail', 'password changed Failed');
      }
    } else {
      return redirect('ChangeAdminPassword')->with('access_msg', 'You are not Authorized');
    }
  }
}
