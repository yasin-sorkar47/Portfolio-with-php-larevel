<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index () {

        $services = Service::all();

        return view('back.services.index', compact('services'));
    }

    public function create() {
        return view('back.services.create');
    }

    public function store (Request $request) {
        $request->validate([
            "title" => "required|max:256",
            "description" => "required",
            "subtitle" => "required|max:256",
            "tag" => "required|max:256",
            "details" => "required",
            'image' => 'required|image|mimes:png,jpg|max:2024',
            'image_alt' => 'nullable|max:256'
        ]);

        $services = new Service();

        $services->title = $request->title;
        $services->slug = Str::slug($request->title);
        $services->description = $request->description;
        $services->subtitle = $request->subtitle;
        $services->tag = $request->tag;
        $services->details = $request->details;
        $services->image_alt = $request->image_alt;
        $services->image = upload_customImage (SERVICE_IMAGE_PATH, $request->image, null );

        $services->save();

        return redirect()->route('back.service.index')->with("success", "It has been added");

    }

    public function edit ($slug){
        $services = Service::where('slug', $slug)->firstOrFail();
        return view('back.services.edit', compact('services'));
    }

    public function update (Request $request, $slug) {
        $request->validate([
            "title" => "required|max:256",
            "description" => "required",
            "subtitle" => "required|max:256",
            "tag" => "required|max:256",
            "details" => "required",
            'image' => 'nullable|image|mimes:png,jpg|max:2024',
            'image_alt' => 'nullable|max:256'
        ]);

        $services = Service::where('slug', $slug)->firstOrFail();

        $services->title = $request->title;
        $services->slug = Str::slug($request->title);
        $services->description = $request->description;
        $services->subtitle = $request->subtitle;
        $services->tag = $request->tag;
        $services->details = $request->details;
        $services->image_alt = $request->image_alt;

        if($request->hasFile('image')){
            $services->image = upload_customImage (SERVICE_IMAGE_PATH, $request->image, $services->image );
        }

        $services->save();

        return redirect()->route('back.service.index')->with("success", "It has been added");
  
    }

    public function delete (Request $request){
        $services = Service::where('slug', $request->slug)->firstOrFail();
        unlink(public_path($services->image));
        $services->delete();
        return redirect()->route('back.service.index')->with("success", "It has been delete");
    }
}
