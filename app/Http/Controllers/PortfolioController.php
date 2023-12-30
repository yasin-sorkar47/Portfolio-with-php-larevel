<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    public function index (){
    $portfolios = Portfolio::with(['category' => function ($query) {
        $query->select(['id','name', 'slug']);
    }])
    ->get();

        return view('back.portfolio.index', compact('portfolios'));
    }

    public function create (){
        $categories = Category::all();
        return view('back.portfolio.create', compact('categories'));
    }

    public function store (Request $request){
        $request->validate([
            'title' => 'required|max:256',
            'subtitle' => 'required|max:256',
            'category_id' => 'required',
            'image' => 'required|mimes:png,jpg|max:2024',
            'details' => 'required',
        ], [
            'category_id.required' => 'The category field is required.'
        ]);

        $portfolio = new Portfolio();

        $portfolio->title = $request->title;
        $portfolio->slug = Str::slug($request->title) . '-' . rand(111,999);
        $portfolio->subtitle = $request->subtitle;
        $portfolio->category_id = $request->category_id;
        $portfolio->image = upload_customImage (PORTFOLIO_IMAGE_PATH, $request->image, null );
        $portfolio->image_alt = $request->image_alt;
        $portfolio->details = $request->details;

        $portfolio->save();
        return redirect()->route('back.portfolio.index')->with("success", "It has been added");

    }

    public function edit ($slug){
        $categories = Category::all();
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
        return view('back.portfolio.edit', compact('portfolio','categories'));
    }

    public function update (Request $request, $slug){
        $request->validate([
            'title' => 'required|max:256',
            'subtitle' => 'required|max:256',
            'category_id' => 'required',
            'image' => 'nullable|mimes:png,jpg|max:2024',
            'details' => 'required',
        ], [
            'category_id.required' => 'The category field is required.'
        ]);

        $portfolio =  Portfolio::where('slug', $slug)->firstOrFail();

        $portfolio->title = $request->title;
        $portfolio->slug = Str::slug($request->title) . '-' . rand(111,999);
        $portfolio->subtitle = $request->subtitle;
        $portfolio->category_id = $request->category_id;
        $portfolio->image_alt = $request->image_alt;
        $portfolio->details = $request->details;

        if($request->hasFile('image')){
            $portfolio->image = upload_customImage (PORTFOLIO_IMAGE_PATH, $request->image, $portfolio->image );
        }
        
        $portfolio->save();
        return redirect()->route('back.portfolio.index')->with("success", "It has been added");

    }

    public function delete (Request $request){
        $portfolio =  Portfolio::where('slug', $request->slug )->firstOrFail();
        unlink(public_path($portfolio->image));
        $portfolio->delete();
        return redirect()->route('back.portfolio.index')->with("success", "It has been added");
    }
}
