<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        return view('lacak', ['data' => null,  'error' => null]);
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
            'api_key' => '5134c3b8eb0863e1de1c945c1d3a351b7615bdb60ae5c4ed4d5836608c52f088',
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
            return view('lacak', ['data' => null,'error' => 'Resi Tidak Ditemukan!']);
        }

        // return view main dengan result yg didapat

        return view('lacak', ['data' => $response['data'], 'error' => null]);
    }
}
