<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function create()
    {
        $name = session('name');

        return view('data', ['name' => $name]);
    }

    public function store(Request $request)
    {
        // Str::of..->title() will convert null value to ""
        $name = Str::of($request->name)->title();
    
        session(['name' => $name]);

        return back();
    }
}
