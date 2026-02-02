@extends('layouts.main')

@section('content')
<div class="grid grid-cols-12 gap-6 p-6 h-screen pb-24">
    
    <div id="main-room-bg" class="col-span-8 bg-beige rounded-[40px] relative flex items-center justify-center border-4 border-white shadow-xl transition-all duration-700" style="background-image: url('/images/default-room.jpg'); background-size: cover;">
        <div class="bg-white/30 backdrop-blur-md p-8 rounded-2xl text-center">
            <h2 class="text-4xl font-mono font-bold" id="timer">25:00</h2>
            <p class="text-xs mt-2 uppercase tracking-widest">Sesi Fokus Sedang Berjalan</p>
        </div>
    </div>

    <div class="col-span-4 space-y-4">
        
        <div class="p-5 bg-white rounded-3xl border border-beige shadow-sm">
            <h4 class="font-bold mb-3 italic">🎵 Music Stream</h4>
            <input type="text" id="musicInput" class="w-full p-2 text-xs border rounded-lg mb-2" placeholder="Paste link YouTube/Spotify/Soundcloud...">
            <button onclick="loadMusic()" class="w-full py-2 bg-wine text-white rounded-lg text-xs font-bold hover:opacity-90">Pasang Musik</button>
            <div id="musicContainer" class="mt-3 hidden">
                <p class="text-[10px] text-center italic">Memutar musik dari link...</p>
            </div>
        </div>

        <div class="p-5 bg-white rounded-3xl border border-beige shadow-sm">
            <h4 class="font-bold mb-3 italic">🎮 Break Games</h4>
            <div class="grid grid-cols-3 gap-2">
                <button onclick="playGame('sudoku')" class="p-2 bg-beige rounded-xl text-[10px] hover:bg-wine hover:text-white transition">SUDOKU</button>
                <button onclick="playGame('tictactoe')" class="p-2 bg-beige rounded-xl text-[10px] hover:bg-wine hover:text-white transition">TIC-TAC-TOE</button>
                <button onclick="playGame('breath')" class="p-2 bg-beige rounded-xl text-[10px] hover:bg-wine hover:text-white transition">BREATHING</button>
            </div>
        </div>

        <div class="p-5 bg-white rounded-3xl border border-beige shadow-sm">
            <h4 class="font-bold mb-3 italic">📝 To-Do List</h4>
            <div id="todoItems" class="space-y-2 max-h-32 overflow-y-auto mb-3"></div>
            <input type="text" id="todoTask" class="w-full bg-transparent border-b border-beige p-1 text-sm focus:outline-none" placeholder="Apa yang ingin dipelajari?">
        </div>

    </div>
</div>

<script>
    // Fungsi Load Musik
    function loadMusic() {
        const link = document.getElementById('musicInput').value;
        if(link) {
            document.getElementById('musicContainer').classList.remove('hidden');
            alert("Musik Berhasil Terhubung! (Pastikan link yang dimasukkan mendukung embed)");
        }
    }

    // Fungsi Simple Game Alert (Sebagai Contoh)
    function playGame(type) {
        alert("Membuka game " + type + "... (Kamu bisa isi dengan iframe game html5 gratis)");
    }

    // To-Do List Logic
    const todoInput = document.getElementById('todoTask');
    todoInput.addEventListener('keypress', (e) => {
        if(e.key === 'Enter' && todoInput.value !== "") {
            const div = document.createElement('div');
            div.className = "flex items-center gap-2 text-sm";
            div.innerHTML = `<input type="checkbox" class="accent-wine"> <span>${todoInput.value}</span>`;
            document.getElementById('todoItems').appendChild(div);
            todoInput.value = "";
        }
    });
</script>
@endsection