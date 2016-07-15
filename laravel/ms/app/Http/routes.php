<?php

Route::get("/", "IndexController@index");

Route::get("/userlist", "IndexController@userlist")->name('userlist');

Route::get("/deleteuser/{id?}", "IndexController@getDeleteUser")->name('deleteuser');

//Route::post("adduser", "IndexController@home")->name("adduser");

Route::post("adduser", "IndexController@adduser")->name('adduser');

/*
Route::post('home', array(
    'as' => 'home', 
    'uses'=>"IndexController@home"
));

Route::get("admin", function () {
    return "I am from admin url.";
});

Route::get("/admins", "AdminController@index");

Route::post("/adminss", "AdminController@postindex");

Route::get("/user/{name}", "AdminController@abc");

Route::get("users/{name}/{age?}", "AdminController@efg");

Route::get("userss/{name?}/{address?}", function($name = '', $address = '') {
    echo "My Name is " . $name . "<br>";
    echo "My Address is " . $address;
})->where(["address" => "[0-9]+"]);
*/