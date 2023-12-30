<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function index (){

        $addresses = Address::all();

        return view('back.address.index', compact('addresses'));
    }

    public function create (){
        return view('back.address.create');
    }

    public function store (Request $request) {
        $request->validate([
            "phone" => "required|max:256",
            "email" => "required|email",
            "address" => "required|max:256"
        ]);

        $address = new Address();

        $address->phone = $request->phone;
        $address->email = $request->email;
        $address->address = $request->address;

        $address->save();

        return redirect()->route('back.address.index')->with("success", "It has been added");

    }

    public function edit ($id){
        $address = Address::where('id', $id)->firstOrFail();

        return view('back.address.edit', compact('address'));
    }

    public function update (Request $request, $id){
        $request->validate([
            "phone" => "required|max:256",
            "email" => "required|email",
            "address" => "required|max:256"
        ]);

        $address = Address::where('id', $id)->firstOrFail();

        $address->phone = $request->phone;
        $address->email = $request->email;
        $address->address = $request->address;

        $address->save();

        return redirect()->route('back.address.index')->with("success", "It has been added");
    }

    public function delete (Request $request){
        $address = Address::where('id', $request->id )->firstOrFail();
        $address->delete();
        return redirect()->route('back.address.index')->with("success", "It has been added");
    }
}
