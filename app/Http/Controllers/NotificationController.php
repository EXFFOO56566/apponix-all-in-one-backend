<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class NotificationController extends Controller
{
    //~~~~~ push notification ~~~~~~~~~~
    
    public function pushnotification(Request $req)
    {   
        
        $pic = $req->file('image');
        $new_file = time() . rand(1, 1000) . "." . $pic->getClientOriginalExtension();
        $pic->move("public/img", $new_file);

        
        //$firebaseToken ="eSIumsYITBGBVRVhI5-GCi:APA91bETCKRlaiq5R0sl-Vd3qRWjyFv9mtKJDw0ogR9xWPJf1-fy6cE1PZLbOYmC3iJAFndd5mfk0MNP-WO86mtwqZ3_ezHfjw84oLD_XFnqSw8pjZGZf14nS3z_mptXMzOnIdqgP4Ud";

        $SERVER_API_KEY = 'AAAAiM8D9lM:APA91bE4Uj9AVh8PVDVQ7b3REEPGT_FhWkttUx_Tv6wLWFw6oXI_lDoS_7nD7RQYYflZlW7cL7WvT-XxfNIkb3E7nhemFSPLybId_8-xQPsuNoLINswlqTTdUoKZFYPU0MiuJYOdiORA';

        $data = [
          //  "to" => $firebaseToken,
           // "topic" => "APPONIX",
            "to" => '/topics/'."APPONIX",
            "notification" => [
                "title" =>$req->title,
                "body" => $req->body,
                "image" =>"public/img/$new_file",
            ]
        ];
        $dataString = json_encode($data);
       
      
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        
        return back()->with('success','success');
        //dd($response);
    }
}
