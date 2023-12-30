<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function create () {
        return view('back.social.create');
    }

    public function store (Request $request){
        $request->validate([
            "label" => "required|max:256",
            "element" => "required|max:256",
            "url" => "required|max:256",
        ]);

        $socials = new Social();

        $socials->label = $request->label;
        $socials->element = $request->element;
        $socials->url = $request->url;

        $socials->save();

        return redirect()->route('back.social.create')->with('success', 'it has been added');
    }
}
