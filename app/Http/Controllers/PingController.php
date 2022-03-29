<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PingController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function ping(Request $request)
    {
        //dd($request->input('url'));
        $url = $request->input('url'); // IP address you'd like to ping.
        exec("ping -c 1 " . $url . " | head -n 2 | tail -n 1 | awk '{print $7}'", $ping_time);
               
       // dd($ping_time);
        if (array_key_exists(0, $ping_time)) {
            print $ping_time[0]; // First item in array, since exec returns an array.
           
           // return redirect($url);
        }else return view('404');
       
    }
}
