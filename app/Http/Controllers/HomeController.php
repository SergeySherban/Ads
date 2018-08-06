<?php

namespace App\Http\Controllers;

use App\Advert;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $advert = Advert::orderBy('created_at', 'desc')->paginate(6);
        return view('home', [
            'adverts'=>$advert
        ]);
    }
    
    public function show($id)
    {
        $advert = Advert::find($id);
        return view('show', [
            'adverts' => $advert
        ]);
    }
}
