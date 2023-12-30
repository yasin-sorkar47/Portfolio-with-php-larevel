<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class technologyController extends Controller
{
    public function index (){
        $technologies = Technology::all();

        return view('back.technology.index', compact('technologies'));
    }

    public function create (){
        return view('back.technology.create');
    }

    public function store (Request $request) {
        $request->validate([
            "title" => "required|max:256",
            "image" => "required|image|mimes:png,jpg|max:2024",
        ]);

        $technologies = new Technology();
        
        $technologies->title = $request->title;
        $technologies->image_alt = $request->image_alt;
        $technologies->image = upload_customImage (TECHNOLOGY_IMAGE_PATH, $request->image, null );

        $technologies->save();

        return redirect()->route('back.technology.index');
    }

    public function edit ($id){
        $technologies = Technology::where('id', $id)->firstOrFail();

        return view('back.technology.edit', compact('technologies'));
    }

    public function update (Request $request, $id) {
        $request->validate([
            "title" => "required|max:256",
            "image" => "nullable|image|mimes:png,jpg|max:2024",
        ]);

        $technologies = Technology::where('id', $id)->firstOrFail();
        
        $technologies->title = $request->title;
        $technologies->image_alt = $request->image_alt;

        if( $request->hasFile('image')){
            $technologies->image = upload_customImage (TECHNOLOGY_IMAGE_PATH, $request->image, $technologies->image );
        }

        $technologies->save();

        return redirect()->route('back.technology.index');
    }

    public function delete (Request $request){
        $technologies = Technology::where('id', $request->id )->firstOrFail();
        $technologies->delete();
        return redirect()->route('back.technology.index');
    }

}
