<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


class SecondAdminController extends Controller
{
    public function __construct(){
        $this -> middleware('auth') -> except('showString2'); // authentication will be applied on all methods inside controller
    }
    
    public function showString0(){
        return "static string0";
    }

    public function showString1(){
        return "static string1";
    }

    public function showString2(){
        return "static string2";
    }

    public function showString3(){
        return "static string3";
    }
}
