<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view("Frontend.modules.index");
    }

    public function single(){
        return view("Frontend.modules.single");
    }
    
}
