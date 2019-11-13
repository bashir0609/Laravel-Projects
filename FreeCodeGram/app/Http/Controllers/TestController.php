<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestController extends Controller
{
    public function index(Test $test)
    {
        $tests = Test::all();
        return view('test.index', compact('tests'));
    }
    public function create()
    {
        return view('test.create');
    }
    public function store(Test $test)
    {
        request()->validate([
            'title' => 'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);
        
        if (request()->hasFile('image')) {  //check the file present or not
            $image = request()->file('image'); //get the file
            $name = "//what every you want concatenate".'.'.$image->getClientOriginalExtension(); //get the  file extention
            $destinationPath = public_path('/uploads'); //public path folder dir
            $image->move($destinationPath, $name);  //mve to destination you mentioned 
            $image->save(); //
        }

        return redirect('/test');
    }
    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);
    }
    private function storeImage($test)
    {
        if (request()->hasFile('image')) {  //check the file present or not
            $image = request()->file('image'); //get the file
            $name = "//what every you want concatenate".'.'.$image->getClientOriginalExtension(); //get the  file extention
            $destinationPath = public_path('/uploads'); //public path folder dir
            $image->move($destinationPath, $name);  //mve to destination you mentioned 
            $image->save(); //
        }
    }
}
