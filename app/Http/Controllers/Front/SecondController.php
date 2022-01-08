<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;


class SecondController extends Controller
{
    public function showString(){
        return "static string";
    }
}
