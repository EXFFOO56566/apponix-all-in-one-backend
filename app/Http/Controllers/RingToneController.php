<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ringtone;

class RingToneController extends Controller
{
    //~~~~~~~~~~ API ringtone list ~~~~~~~~~~~~~
    public function ringtoneList()
    {

        $ringtone_data = Ringtone::all();
        if ($ringtone_data->isEmpty()) {
            return json_encode(["status" => 400, "message" => "No Data Found"]);
        } else {
            return json_encode(["status" => 200, "message" => "success", "data" => $ringtone_data]);
        }
    }


    //~~~~~~~~~~ add ringtone ~~~~~~~~~~~~~
    public function AddRingtoneData(Request $req)
    {

        $access = session()->get('access');
        if ($access == 'true') {


            // $this->validate($req, [

            //     'category_name' => 'required',
            //     'category_icon' => 'mimes:jpeg,jpg,png,gif,jfif|required'

            // ]);

            $ringtones = new Ringtone();

            $ringtones->ring_name = $req->ring_name;


            $ring = $req->file('ringtone');
            $new_file = time() . rand(1, 1000) . "." . $ring->getClientOriginalExtension();
            $ring->move("public/ringtone", $new_file);

            $ringtones->ringtone = $new_file;

            if ($ringtones->save()) {
                return redirect('AddRingtone')->with("success", "Insert Success");
            } else {
                return redirect('AddRingtone')->with("fail", "Inser fail");
            }
        } else {
            return redirect('AddRingtone')->with('access_msg', 'You are not Authorized');
        }
    }

    //~~~~~~~ ringtone table ~~~~~~~~~~~~~~~~~~~~~~~
    public function ringtoneTable()
    {
        $ringtone_data = Ringtone::all();
        return view('ringtone/ringtone_table', ['ringtone_data' => $ringtone_data]);
    }
    //~~~~~~~~~~~ show update ringtone data ~~~~~~~
    public function showUpdateRingtoneData($id)
    {

        $ringtone_data = Ringtone::find($id);
        return view('ringtone/update_ringtone', ['ringtone_data' => $ringtone_data]);
    }
    //~~~~~~~~~ update Ringtone data ~~~~~~~~~~~~~~~~
    public function updateRingtoneData(Request $req)
    {
        $access = session()->get('access');
        if ($access == 'true') {
            $ringtones = Ringtone::find($req->id);

            $ringtones->ring_name = $req->ring_name;
            $deleteRing = $ringtones->ringtone;

            if ($req->file('ringtone')) {

                $ring = $req->file('ringtone');
                $new_file = time() . rand(1, 1000) . "." . $ring->getClientOriginalExtension();
                $ring->move("public/ringtone/", $new_file);
                $ringtones->ringtone = $new_file;


                $path ="public/ringtone/" . $deleteRing;
                if (file_exists($path)) {
                    unlink($path);
                }
               
               
            }
            if ($ringtones->save()) {
                return back()->with("success", "Insert Success");
            } else {

                return back()->with("fail", "Insert fail");
            }
        } else {
            return back()->with('access_msg', 'You are not Authorized');
        }
    }

    //~~~~~~~~~~~ delete ringtone ~~~~~~~~~~~~~~
    public function ringtoneDelete($id)
    {
        $access = session()->get('access');
        if ($access == 'true') {

            $ringtone = Ringtone::find($id);

            $path ="public/ringtone/" . $ringtone->ringtone;
            if (file_exists($path)) {
                unlink($path);
            }
           


            if ($ringtone->delete()) {
                return back()->with("success", "Delete Success");
            } else {
                return back()->with("fail", "Delete fail");
            }
        } else {
            return back()->with('access_msg', 'You are not Authorized');
        }
    }
}
