@extends('layouts.main')
@section('content')
<div class="max-w-6xl mx-auto p-10">
    <h2 class="text-3xl font-bold mb-6">Pilih Metode Fokusmu</h2>
    
    <div class="mb-8 flex gap-4">
        <button class="px-4 py-2 bg-beige rounded-lg">Semua</button>
        <button class="px-4 py-2 border border-beige rounded-lg">Pendek (25m)</button>
        <button class="px-4 py-2 border border-beige rounded-lg">Maraton (2jam+)</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="isometric-card bg-white p-6 border-2 border-beige">
            <div class="h-40 bg-beige rounded-md mb-4 flex items-center justify-center text-5xl">⏲️</div>
            <h3 class="text-xl font-bold">Pomodoro</h3>
            <p class="text-sm mb-4">25 menit fokus, 5 menit istirahat.</p>
            <a href="/app?method=pomodoro" class="text-wine font-bold text-sm underline">Pilih & Masuk Kamar →</a>
        </div>
        </div>
</div>
@endsection