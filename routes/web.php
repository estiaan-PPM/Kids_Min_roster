<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kid;



Route::get('/', function () {
    return view('home');
});

Route::get('/3-6', function () {
    $kids = Kid::where('age_group', '3-6')->get();

    return view('A', [
        'kids' => $kids      
    ]);
});

Route::get('/3-6/{name}', function($name){
    // dd($name);
    $kid = Kid::where('name', $name)->first();
    $guard = $kid->guardian;
    //dd($guard);
    return view('kid', ['kid' => $kid, 'guard' => $guard]);
});

Route::get('/7-10', function () {
    $kids = Kid::where('age_group', '7-10')->get();

    return view('B', [
        'kids' => $kids      
    ]);
});

Route::get('/7-10/{name}', function($name){
    // dd($name);
    $kid = Kid::where('name', $name)->first();
    $guard = $kid->guardian;
    //dd($guard);
    return view('kid', ['kid' => $kid, 'guard' => $guard]);
});

Route::get('/11-13', function () {
    $kids = Kid::where('age_group', '11-13')->get();

    return view('C', [
        'kids' => $kids      
    ]);
});

Route::get('/11-13/{name}', function($name){
    // dd($name);
    $kid = Kid::where('name', $name)->first();
    $guard = $kid->guardian;
    //dd($guard);
    return view('kid', ['kid' => $kid, 'guard' => $guard]);
});
