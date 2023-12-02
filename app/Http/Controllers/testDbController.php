<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testDbController extends Controller
{
    public function getData(){
      //return $data= DB::table('categories')->find(4);
      return $data= DB::table('categories')->count();

      
    }
}
