<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Colors\Rgb\Channels\Red;

class UserController extends Controller
{

    public function index () {
        $users = User::all();
        return view('back.user.index', compact('users'));
    }

    public function create (){
        return view('back.user.create');
    }

    public function store (Request $request){
        
        $request->validate([
            "name" => "required|max:256",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
            "confirm_password" => "required|same:password"
        ]);
        
        $users = new User();

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        
        return redirect()->route('back.user.index')->with('success', 'added has been successfully');
    }

    public function edit ($id){
        $users = User::where('id', $id)->firstOrFail();
        return view('back.user.edit', compact('users'));
    }

    public function update (Request $request, $id){
        $request->validate([
            "name" => "required|max:256",
            "password" => "required|min:6",
            "confirm_password" => "required|same:password"
        ]);
        
        $users = User::where('id', $id)->firstOrFail();

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        
        $users->save();

        if(Auth::user()->email === $users->email){
            Auth::logout();
        }

        return redirect()->route('back.user.index')->with('success', 'added has been successfully');

    }

    public function delete (Request $request){
        $users = User::where('id', $request->id)->firstOrFail();
        $users->delete();
        // if(Auth::user()->email === $users->email){
        //     Auth::logout();
        // }
        return redirect()->route('back.user.index')->with('success', 'added has been successfully');
        
    }

}
