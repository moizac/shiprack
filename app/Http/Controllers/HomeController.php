<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        return view('lacak', ['data' => null]);
    }

    public function lacak(Request $request)
    {
        // validasi inputan
        $request->validate([
            'no_resi' => 'required',
            'kurir' => 'required',
        ]);

        $data =  $request->all();

       
        // buat request
        $url = "https://api.binderbyte.com/v1/track";

        
        $query_fields = [
            'api_key' => 'ca9ace13f59f71ab89598882e96cdcd14bba8770b72567dec39aea97669df8f6',
            'courier' => $data['kurir'],
            'awb' => $data['no_resi'],
        ];
        
        $curl = curl_init($url . '?' . http_build_query($query_fields));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


        //parse json
        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        //cek status code  
        
        if(!isset($response)){
            return abort(404);
          
        }

        // return view main dengan result yg didapat

        return view('lacak', ['data' => $response['data']]);
    }
}
