@extends('layouts.main')
@section('content')
<div class="grid grid-cols-12 gap-4 p-6 h-screen">
    
    <div class="col-span-8 bg-beige rounded-3xl relative overflow-hidden flex items-center justify-center">
        <div class="text-center">
            <p class="mb-4">Mode: {{ request('method', 'General') }}</p>
            <div class="text-6xl font-mono" id="timer">25:00</div>
            <p class="mt-4 text-sm">Lampu meja menyala jika timer jalan...</p>
        </div>
    </div>

    <div class="col-span-4 space-y-4 overflow-y-auto">
        
        <div class="p-4 bg-white rounded-2xl shadow-sm border border-beige">
            <h4 class="font-bold mb-2 italic">🎵 Lo-fi Radio</h4>
            <input type="text" id="musicUrl" class="w-full p-2 text-xs border rounded-md mb-2" placeholder="Paste link YouTube/Spotify...">
            <button onclick="playMusic()" class="text-xs bg-wine text-white px-3 py-1 rounded">Play</button>
        </div>

        <div class="p-4 bg-white rounded-2xl shadow-sm border border-beige">
            <h4 class="font-bold mb-2 italic">🎮 Break Games</h4>
            <div class="grid grid-cols-3 gap-2">
                <button class="text-[10px] p-2 bg-beige rounded">Sudoku</button>
                <button class="text-[10px] p-2 bg-beige rounded">TicTacToe</button>
                <button class="text-[10px] p-2 bg-beige rounded">Breathing</button>
            </div>
        </div>

        <div class="p-4 bg-white rounded-2xl shadow-sm border border-beige">
            <h4 class="font-bold mb-2 italic">📝 Rencana Hari Ini</h4>
            <div id="todoList" class="text-sm space-y-2 mb-4">
                </div>
            <input type="text" id="todoInput" class="w-full p-2 text-sm border-b focus:outline-none" placeholder="Tambah tugas...">
        </div>

    </div>
</div>

<script>
    // Logika Sederhana To-Do List
    const input = document.getElementById('todoInput');
    input.addEventListener('keypress', (e) => {
        if(e.key === 'Enter' && input.value !== "") {
            const item = document.createElement('div');
            item.innerHTML = `<input type="checkbox"> ${input.value}`;
            document.getElementById('todoList').appendChild(item);
            input.value = "";
        }
    });

    // Logika Musik Sederhana
    function playMusic() {
        const url = document.getElementById('musicUrl').value;
        alert('Memutar musik dari: ' + url);
        // Di sini bisa ditambahkan logika Embed Iframe otomatis
    }
</script>
@endsection