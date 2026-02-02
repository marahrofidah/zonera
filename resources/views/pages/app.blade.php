@extends('layouts.main')

@section('content')
<div class="grid grid-cols-12 gap-8 p-8 h-screen pb-32">
    
    <div id="main-room-bg" class="col-span-8 bg-white rounded-[40px] relative flex items-center justify-center border-4 border-[#384D95] shadow-xl transition-all duration-700" style="background-image: url('/images/default-room.jpg'); background-size: cover;">
        <div class="bg-white/40 backdrop-blur-md p-12 rounded-3xl text-center">
            <h2 class="text-6xl font-mono font-bold text-[#384D95]" id="timer">25:00</h2>
            <p class="text-sm mt-3 uppercase tracking-widest text-[#384D95]">Sesi Fokus Sedang Berjalan</p>
        </div>
    </div>

    <div class="col-span-4 space-y-4">
        
        <div class="p-6 bg-white rounded-3xl border-2 border-[#384D95] shadow-md">
            <h4 class="font-bold mb-4 italic text-lg text-[#E63E88]">🎵 Music Stream</h4>
            <input type="text" id="musicInput" class="w-full p-3 text-sm border-2 border-[#384D95] rounded-xl mb-3" placeholder="Paste link YouTube/Spotify/Soundcloud...">
            <button onclick="loadMusic()" class="w-full py-3 bg-[#E63E88] hover:bg-[#384D95] text-white rounded-xl text-sm font-bold transition-all duration-300">Pasang Musik</button>
            <div id="musicContainer" class="mt-3 hidden">
                <p class="text-sm text-center italic text-[#384D95]">Memutar musik dari link...</p>
            </div>
        </div>

        <div class="p-6 bg-white rounded-3xl border-2 border-[#384D95] shadow-md">
            <h4 class="font-bold mb-4 italic text-lg text-[#E63E88]">🎮 Break Games</h4>
            <div class="grid grid-cols-3 gap-3">
                <button onclick="playGame('sudoku')" class="p-3 bg-[#E63E88]/10 border-2 border-[#E63E88] text-[#384D95] rounded-xl text-sm font-bold hover:bg-[#E63E88] hover:text-white transition-all duration-300">SUDOKU</button>
                <button onclick="playGame('tictactoe')" class="p-3 bg-[#384D95]/10 border-2 border-[#384D95] text-[#384D95] rounded-xl text-sm font-bold hover:bg-[#384D95] hover:text-white transition-all duration-300">TIC-TAC-TOE</button>
                <button onclick="playGame('breath')" class="p-3 bg-[#E63E88]/10 border-2 border-[#E63E88] text-[#384D95] rounded-xl text-sm font-bold hover:bg-[#E63E88] hover:text-white transition-all duration-300">BREATHING</button>
            </div>
        </div>

        <div class="p-6 bg-white rounded-3xl border-2 border-[#384D95] shadow-md">
            <h4 class="font-bold mb-4 italic text-lg text-[#E63E88]">📝 To-Do List</h4>
            <div id="todoItems" class="space-y-3 max-h-40 overflow-y-auto mb-4"></div>
            <input type="text" id="todoTask" class="w-full bg-transparent border-b-2 border-[#384D95] p-2 text-sm focus:outline-none text-[#384D95]" placeholder="Apa yang ingin dipelajari?">
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
            div.className = "flex items-center gap-3 p-2 bg-[#E63E88]/5 rounded-lg text-sm text-[#384D95]";
            div.innerHTML = `<input type="checkbox" class="accent-[#E63E88]"> <span>${todoInput.value}</span>`;
            document.getElementById('todoItems').appendChild(div);
            todoInput.value = "";
        }
    });
</script>
@endsection