<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('pages.home'); });
Route::get('/about', function () { return view('pages.about'); });
Route::get('/library', function () { return view('pages.library'); });
Route::get('/gallery', function () { return view('pages.gallery'); });
Route::get('/contact', function () { return view('pages.contact'); });
Route::get('/app', function () { return view('pages.app'); });

