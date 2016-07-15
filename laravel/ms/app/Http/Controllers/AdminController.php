<?php

namespace App\Http\Controllers;

class AdminController extends Controller{
    public function index(){
       // echo "The Method is called from".__CLASS__;
        return view('test');
    }
    public function postindex(){
        echo "This is post method index";
    }
    
    public function abc($name){
        echo "Abc method is ". $name;
    }
    
    public  function efg($name, $age=50){
        echo "My name is ". $name."<br>";
        echo "My age is ".$age;
    }
}