<?php

namespace App\Http\Controllers;

use App\Advert;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $advert = DB::table('adverts')->paginate(6);
        return view('home', [
            'adverts'=>$advert
        ]);
    }
}
