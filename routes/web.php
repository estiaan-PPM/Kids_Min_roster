<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kid;



Route::get('/', function () {
    return view('home');
});

Route::get('/3-6', function () {
    return view('A', [
        'kids' => Kid::all()       
    ]);
});

Route::get('/3-6/{name}', function($name){
    $kid = Kid::find($name);

    return view('kid', ['kid' => $kid]);
});

Route::get('/7-10', function () {
    return view('B');
});

Route::get('/11-13', function () {
    return view('C');
});
