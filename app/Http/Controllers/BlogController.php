<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index (){

        $blogs = Blog::all();

        return view('back.blog.index', compact('blogs'));
    }

    public function create (){
        return view('back.blog.create');
    }

    public function store (Request $request) {
        $request->validate([
            "title" => "required|max:256",
            "description" => "required|max:256",
            "image" => "required|image|mimes:png,jpg|max:2024"
        ]);

        $blogs = new Blog();

        $blogs->title = $request->title;
        $blogs->slug = Str::slug($request->title);
        $blogs->description = $request->description;
        $blogs->image_alt = $request->image_alt;
        $blogs->keyword = $request->keyword;
        $blogs->head_script = $request->head_script;
        $blogs->body_script = $request->body_script;
        $blogs->custom_html = $request->custom_html;
        $blogs->custom_css = $request->custom_css;
        $blogs->custom_js = $request->custom_js;
        $blogs->image = upload_customImage (BLOG_IMAGE_PATH, $request->image, null );

        $blogs->save();

        return redirect()->route('back.blog.index')->with("success", "It has been added");

    }

    public function edit ($slug){

        $blogs = Blog::where('slug', $slug)->firstOrFail();

        return view('back.blog.edit', compact('blogs'));
    }

    public function update (Request $request, $slug){
        $request->validate([
            "title" => "required|max:256",
            "description" => "required|max:256",
            'image' => 'nullable|image|mimes:png,jpg|max:2024'
        ]);

        
        $blogs = Blog::where('slug', $slug)->firstOrFail();

        $blogs->title = $request->title;
        $blogs->slug = Str::slug($request->title);
        $blogs->description = $request->description;
        $blogs->image_alt = $request->image_alt;
        $blogs->keyword = $request->keyword;
        $blogs->head_script = $request->head_script;
        $blogs->body_script = $request->body_script;
        $blogs->custom_html = $request->custom_html;
        $blogs->custom_css = $request->custom_css;
        $blogs->custom_js = $request->custom_js;

        if($request->hasFile('image')){
            $blogs->image = upload_customImage(BLOG_IMAGE_PATH, $request->image, $blogs->image);
        }

        $blogs->save();

        return redirect()->route('back.blog.index')->with("success", "It has been added");

    }

    public function delete (Request $request){
        $blogs = Blog::where('slug', $request->slug )->firstOrFail();
        unlink(public_path($blogs->image));
        $blogs->delete();
        return redirect()->route('back.blog.index')->with("success", "It has been added");
        
    }
}
