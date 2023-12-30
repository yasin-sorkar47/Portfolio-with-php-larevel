<?php

namespace App\Http\Controllers;

use App\Models\Appearance;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    public function create (){
        $ami = Appearance::all();
       
        return view('back.appearance.create', compact('ami'));
    }

    public function store (Request $request){
        $ami = Appearance::all();
        $request->validate([
            "title" => "required|max:256",
            "number" => "required",
            "main_logo" => "required|mimes:png,jpg|image|max:2024",
            "footer_logo" => "required|mimes:png,jpg|image|max:2024",
            "favicon" => "required|mimes:png,jpg|image|max:2024",
        ]);

        $appearance = new Appearance();

        $appearance->title = $request->title;
        $appearance->description = $request->description;
        $appearance->keyword = $request->keyword;
        $appearance->head_script = $request->head_script;
        $appearance->body_script = $request->body_script;
        $appearance->number = $request->number;

        if($ami->count() === 0 ){
            $appearance->main_logo = upload_customImage (MAIN_LOGO_IMAGE_PATH, $request->main_logo, null );
            $appearance->footer_logo = upload_customImage (FOOTER_LOGO_IMAGE_PATH, $request->footer_logo, null );
            $appearance->favicon = upload_customImage (FAVICON_IMAGE_PATH, $request->favicon, null );
            $appearance->save();
        }

        if($ami->count() === 1 ){
            $appearance->main_logo = upload_customImage (MAIN_LOGO_IMAGE_PATH, $request->main_logo, $appearance->main_logo );
            $appearance->footer_logo = upload_customImage (FOOTER_LOGO_IMAGE_PATH, $request->footer_logo, $appearance->footer_logo );
            $appearance->favicon = upload_customImage (FAVICON_IMAGE_PATH, $request->favicon, $appearance->favicon );
            // $appearance->save();
            return $appearance;
        }
}
}