@extends('layouts.main')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[80vh] text-center px-6">
    <div class="relative w-full max-w-4xl bg-beige h-96 rounded-[40px] shadow-inner flex items-center justify-center overflow-hidden mb-8">
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#7e6961 1px, transparent 1px); background-size: 20px 20px;"></div>
        <p class="text-muted-brown italic">Bayangkan di sini ada meja-meja 3D dengan lampu hangat...</p>
        
        <a href="/app" class="absolute bottom-10 bg-white px-8 py-3 rounded-full shadow-lg hover:scale-105 transition-transform font-bold text-wine">
            Pilih Meja Belajarmu
        </a>
    </div>

    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Zonera</h1>
    <p class="max-w-xl text-lg">Ruang belajar virtual yang tenang untuk fokus yang lebih maksimal.</p>
</div>
@endsection