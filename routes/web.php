<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('pages.home'); });
Route::get('/about', function () { return view('pages.about'); });
Route::get('/library', function () { return view('pages.library'); });
Route::get('/gallery', function () { return view('pages.gallery'); });
Route::get('/contact', function () { return view('pages.contact'); })->name('contact');
Route::get('/app', function () { return view('pages.app'); });
Route::get('/calendar', function () {
    return view('pages.calendar');
})->name('calendar');
Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile');
Route::get('/room/pomodoro', function () {
    return view('pages.room-pomodoro');
})->name('room.pomodoro');
Route::get('/room/deep-work', function () {
    return view('pages.room-deep-work');
})->name('room.deep-work');
Route::get('/room/ultradian', function () {
    return view('pages.room-ultradian');
})->name('room.ultradian');
Route::get('/room/marathon', function () {
    return view('pages.room-marathon');
})->name('room.marathon');
Route::get('/room/power-hour', function () {
    return view('pages.room-power-hour');
})->name('room.power-hour');
Route::get('/room/study-block', function () {
    return view('pages.room-study-block');
})->name('room.study-block');

