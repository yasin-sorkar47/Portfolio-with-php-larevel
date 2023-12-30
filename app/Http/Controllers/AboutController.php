<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AboutController extends Controller
{


    public function index () {

        $aboutItems = About::all();

        return view('back.about.index', compact('aboutItems'));
    }

    public function create () {
        return view('back.about.create');
    }

    public function store (Request $request) {
        $request->validate([
            'title' => 'required|max:256',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg|max:2024'
        ]);

        $aboutItems = new About();

        $aboutItems->title = $request->title;
        $aboutItems->slug = Str::slug($request->title);
        $aboutItems->description = $request->description;
        $aboutItems->image = upload_customImage (ABOUT_IMAGE_PATH, $request->image, null);
        

        $aboutItems->save();

        return redirect()->route('back.about.index')->with("success", "It has been added");
    }

    public function edit ($slug) {
        $aboutItems = About::where('slug', $slug)->firstOrFail();
        return view('back.about.edit', compact('aboutItems'));
    }

    public function update (Request $request, $slug) {

       
        $request->validate([
            'title' => 'required|max:256',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpg|max:2024'
        ]);

       $aboutItems = About::where('slug', $slug)->firstOrFail();

        $aboutItems->title = $request->title;
        $aboutItems->slug = Str::slug($request->title);
        $aboutItems->description = $request->description;

        if($request->hasFile('image')){
        $aboutItems->image = upload_customImage(ABOUT_IMAGE_PATH, $request->image, $aboutItems->image);
        }
        
        $aboutItems->save();

        return redirect()->route('back.about.index')->with("success", "It has been added");

    }

    public function delete (Request $request) {

        $aboutItems = About::where('slug', $request->slug)->firstOrFail();
        
        unlink(public_path($aboutItems->image));

        $aboutItems->delete();

        return redirect()->route('back.about.index')->with("success", "It has been added");
        
    }
}
