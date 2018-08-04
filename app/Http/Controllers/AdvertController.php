<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use DB;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advert = DB::table('adverts')->paginate(6);
		
		return view('profile.index', [
			'advert' => $advert
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $advert = $request->all();
        
        $request->validate([
            'title' => 'required|max:255',
            'poster' => 'required|mimes:jpeg',
            'description' => 'required',
            'author' => 'required|max:255',
        ]);
        
		if (! empty($advert['poster'])) {
			$file = $request->file('poster');
            $hash = md5(microtime());
            $fileName = $hash . $file->getClientOriginalName();
			$file->move('uploads/poster', $fileName);
			$advert['poster'] = $fileName;
		}
        
		Advert::create($advert);
		return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        return view('profile.edit', [
                    'advert' => $advert
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advert $advert)
    {
        $request->validate([
            'title' => 'required|max:255',
            'poster' => 'mimes:jpeg,jpg',
            'description' => 'required',
            'author' => 'required|max:255',
        ]);
        
        $data = $request->all();
        $path = public_path('uploads/poster/');
        $fullpath = $path . $advert->poster;
        
		if (! empty($data['poster'])) {
			$file = $request->file('poster');
            $hash = md5(microtime());
            $fileName = $hash . $file->getClientOriginalName();
			$file->move('uploads/poster', $fileName);
			$data['poster'] = $fileName;
            if (File::isFile($fullpath)) {
               File::delete($fullpath);
           }
		}
        
		$advert->update($data);
		return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advert $advert)
    {
        if (! empty($advert)) {
          $path = public_path('uploads/poster/');
          $fullpath = $path . $advert->poster;
          $advert->delete();
        
        if (File::isFile($fullpath)) {
               File::delete($fullpath);
           }
       }
       return redirect()->route('profile.index');
    }
}
