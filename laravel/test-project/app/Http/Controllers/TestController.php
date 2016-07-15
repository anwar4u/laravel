<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
   public function getIndex(){
       $data=["Anwar", "Rakib", "Sharif", "Rajib", "Rana"];
       $info="I am from ".__CLASS__;
       //return view('nimbuzz', compact('data', 'info'));
       return view("nimbuzz")->with(["infos"=>$info])->withData($data);
   }
}
