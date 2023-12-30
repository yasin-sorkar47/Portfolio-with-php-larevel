<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index (){
        $sliders = Slider::all();
        // return $sliders;

        return view('back.sliders.index', compact("sliders"));
    }

    public function create (){
        return view('back.sliders.create');
    }

    public function store (Request $request){
        $request->validate([
            'getting' => 'required|max:256',
            'title' => 'required|max:256',
            'subtitle' => 'required|max:256',
            'description' => 'required',
            'project' => 'required|max:256',
            'experience' => 'required|max:256',
            'image' => 'required|image|mimes:png,jpg|max:2024'
        ]);

        $sliders = new Slider();

        $sliders->getting = $request->getting;
        $sliders->title = $request->title;
        $sliders->subtitle = $request->subtitle;
        $sliders->description = $request->description;
        $sliders->project = $request->project;
        $sliders->experience = $request->experience;
        $sliders->image_alt = $request->image_alt;

        $sliders->image = upload_customImage (SLIDER_IMAGE_PATH, $request->image, null);

        $sliders->save();

        return redirect()->route('back.slider.index')->with("success", "It has been added");
    }

    public function edit ($id){
        $slider = Slider::where('id', $id)->firstOrFail();

        return view('back.sliders.edit', compact('slider'));
    }

    public function update (Request $request, $id){
                
        $request->validate([
            'getting' => 'required|max:256',
            'title' => 'required|max:256',
            'subtitle' => 'required|max:256',
            'description' => 'required',
            'project' => 'required|max:256',
            'experience' => 'required|max:256',
            'image' => 'nullable|image|mimes:png,jpg|max:2024'
        ]);

        $sliders = Slider::where('id', $request->id)->firstOrFail();

        $sliders->getting = $request->getting;
        $sliders->title = $request->title;
        $sliders->subtitle = $request->subtitle;
        $sliders->description = $request->description;
        $sliders->project = $request->project;
        $sliders->experience = $request->experience;
        $sliders->image_alt = $request->image_alt;

        if($request->hasFile('image')){
            $sliders->image = upload_customImage (SLIDER_IMAGE_PATH, $request->image, $sliders->image );
        }

        $sliders->save();

        return redirect()->route('back.slider.index')->with("success", "It has been added");
    }

    public function delete(Request $request) {
        $slider = Slider::where('id', $request->id)->firstOrFail();
        unlink(public_path($slider->image));
        $slider->delete();
        return redirect()->route('back.slider.index')->with("success", "It has been deleted");
    }
}
