<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertise;

use function PHPSTORM_META\map;

class AdvertiseController extends Controller
{
    //~~~~~~~~~~~~~~ SHOW ADDVERTISE DATA ~~~~~~~~~~~~~~~~~~~
    function showAdvertiseData()
    {
        $advertise = Advertise::all();
        return view('advertise/show_ad')->with(['advertise' => $advertise]);
    }

    //~~~~~~~~~~~~~~~~~~~~ SHOW UPDATE DATA ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    function showUpdateAdData($ad_id)
    {

        $data = Advertise::find($ad_id);

        return view("advertise/update_ad", ['updatedata' => $data]);
    }

    //~~~~~~~~~~~~~~~~  UPDATE ADVERTISE ~~~~~~~~~~~~~~~~~~~~~~~~~
    function updateAd(Request $req)
    {
        $access = session()->get('access');
        if ($access == 'true') {


            $ads = Advertise::find($req->ad_id);

            $ads->banner = $req->banner;
            $ads->native = $req->native;
            $ads->inter = $req->inter;

            if ($req->status == null) {
                $status = false;
            } else {
                $status = true;
            }
            $ads->status = json_encode($status) ;

            if ($ads->save()) {
                return redirect('show_ad')->with("success", "Insert Success");
            } else {
                return redirect('show_ad')->with("fail", "Insert fail");
            }
        } else {
            //return redirect('show_ad')->alert()->success('Title','Lorem Lorem Lorem');
            return redirect('show_ad')->with('access_msg', 'You are not Authorized');
        }
    }
    //~~~~~~~~~~~~~~~~~~~ API SHOW ALL DATA ~~~~~~~~~~~~~~~~~~~~~~~~
    public function showAllAdd()
    {
        $data = Advertise::all();

        $batch = array("status" => 200, "message" => "success", "data" => $data);


        return json_encode($batch) ;
    }
}
