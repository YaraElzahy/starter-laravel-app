<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Routing\Controller as BaseController;

class MyController extends Controller
{
    // AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function showName(){
        return "Yara Elzahy 2";
    }
    public function getIndex(){
        // Method 1: passing a single variable
        // "with" passes data with variable name 'name' and value 'Yara Elzahy', which will be passed to view (welcome.blade)
        return view('welcome') -> with('name','Aurora Elzahy');

        // Method 2: passing multiple variables
        // return view('welcome') -> with(['name' => 'Yara Elzahy', 'age' => 23]);

        // Method 3: better solution for large projects is to store data in an array like a dict
        // $data = [];
        // $data['age'] = 23;
        // $data['name'] = 'Yara Elzahy';
        // return view('welcome', $data);

        // Method 4: pass as an object
        // $obj = new \stdClass();
        // $obj -> name = 'Yara Elzahy';
        // $obj -> age = 23;
        // $obj -> gender = 'female';

        // return view('welcome', compact('obj'));

    }
}
