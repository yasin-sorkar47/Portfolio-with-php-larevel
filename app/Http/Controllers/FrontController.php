<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use App\Models\Technology;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index (){

        $sliders = Slider::all();
        $about = About::all();
        $technologies = Technology::all();


        return view('welcome',
         compact('sliders',
                 'about',
                 'technologies'                 
        ));
    }
}
