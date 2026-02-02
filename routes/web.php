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

// Study Rooms
Route::get('/room/pomodoro', function() {
    return view('pages.room-pomodoro');
})->name('room.pomodoro');

Route::get('/room/deep-work', function() {
    return view('components.study-room', [
        'method' => 'Deep Work',
        'duration' => 90 * 60,
        'methodColor' => '#384D95',
        'timerGradient' => 'from-[#384D95] to-[#2a3a6a]',
        'emoji' => '🧠'
    ]);
})->name('room.deep-work');

Route::get('/room/ultradian', function() {
    return view('components.study-room', [
        'method' => 'Ultradian',
        'duration' => 50 * 60,
        'methodColor' => '#E63E88',
        'timerGradient' => 'from-[#E63E88] to-[#d42d74]',
        'emoji' => '⚡'
    ]);
})->name('room.ultradian');

Route::get('/room/marathon', function() {
    return view('components.study-room', [
        'method' => 'Marathon',
        'duration' => 120 * 60,
        'methodColor' => '#384D95',
        'timerGradient' => 'from-[#384D95] to-[#2a3a6a]',
        'emoji' => '🏃'
    ]);
})->name('room.marathon');

Route::get('/room/power-hour', function() {
    return view('components.study-room', [
        'method' => 'Power Hour',
        'duration' => 60 * 60,
        'methodColor' => '#E63E88',
        'timerGradient' => 'from-[#E63E88] to-[#d42d74]',
        'emoji' => '💪'
    ]);
})->name('room.power-hour');

Route::get('/room/study-block', function() {
    return view('components.study-room', [
        'method' => 'Study Block',
        'duration' => 180 * 60,
        'methodColor' => '#384D95',
        'timerGradient' => 'from-[#384D95] to-[#2a3a6a]',
        'emoji' => '📚'
    ]);
})->name('room.study-block');

