<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Routing\Controller as BaseController;

class UserController extends Controller
{
    // AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function showUserName(){
        return "Yara Elzahy";
    }
}
