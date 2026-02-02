@extends('layouts.main')

@section('content')
<canvas id="interactive-bg" class="fixed inset-0 -z-10"></canvas>

<main class="min-h-screen p-6 pb-32">
    <div class="max-w-7xl mx-auto">
        <!-- Header Info -->
        <div class="grid grid-cols-4 gap-4 mb-8 z-10 relative">
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-4 border-2 border-[#384D95] shadow-lg">
                <p class="text-xs font-bold text-[#384D95] opacity-60">🧠 Metode</p>
                <p class="text-lg font-black text-[#384D95]">Deep Work</p>
            </div>
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-4 border-2 border-[#384D95] shadow-lg">
                <p class="text-xs font-bold text-[#384D95] opacity-60">⏰ Waktu</p>
                <p id="currentTime" class="text-2xl font-black text-[#E63E88] font-mono">00:00:00</p>
            </div>
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-4 border-2 border-[#384D95] shadow-lg">
                <p class="text-xs font-bold text-[#384D95] opacity-60">📅 Tanggal</p>
                <p id="currentDate" class="text-lg font-black text-[#384D95]">Senin, 15 Jan</p>
            </div>
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-4 border-2 border-[#384D95] shadow-lg">
                <p class="text-xs font-bold text-[#384D95] opacity-60">⏱ Durasi</p>
                <p class="text-lg font-black text-[#384D95]">90 Menit</p>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 z-10 relative">
            <!-- Main Room - Meja Selection dengan Perspective 3D -->
            <div class="lg:col-span-2">
                <!-- Timer Display -->
                <div id="timerSection" class="hidden bg-gradient-to-br from-[#384D95] to-[#2a3a6a] rounded-3xl p-8 text-white mb-8 shadow-2xl border-4 border-white text-center">
                    <p class="text-sm opacity-80 mb-2 font-semibold">SESI DEEP WORK SEDANG BERJALAN</p>
                    <h2 id="mainTimer" class="text-7xl font-black font-mono mb-4">90:00</h2>
                    <div class="flex gap-4 justify-center">
                        <button id="pauseBtn" class="px-8 py-3 bg-white/20 hover:bg-white/30 rounded-xl font-bold transition-all">⏸ Jeda</button>
                        <button id="stopBtn" class="px-8 py-3 bg-white/20 hover:bg-white/30 rounded-xl font-bold transition-all">⏹ Hentikan</button>
                        <button id="pinBtn" class="px-8 py-3 bg-white/20 hover:bg-white/30 rounded-xl font-bold transition-all">📌 Pin</button>
                    </div>
                </div>

                <!-- Meja Selection (9 Grid) - Perspective 3D -->
                <div id="mejaSection" class="bg-white/90 backdrop-blur-sm rounded-3xl p-8 border-2 border-[#384D95] shadow-lg" style="perspective: 1200px;">
                    <h3 class="text-2xl font-black text-[#384D95] mb-6">Ruangan Deep Work 🧠</h3>
                    <div class="grid grid-cols-3 gap-6" style="transform-style: preserve-3d;">
                        <!-- Meja 1 -->
                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#384D95]/20 to-[#384D95]/10 border-3 border-[#384D95] shadow-lg text-center transition-all duration-500" data-meja="1" style="transform: rotateY(-15deg) rotateX(5deg); transform-style: preserve-3d;">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 1</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>

                        <!-- Meja 2 -->
                        <div class="meja-item meja-terisi cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#FF6519]/20 to-[#FFB84D]/10 border-3 border-[#FF6519] shadow-lg text-center" data-meja="2" style="transform: rotateY(0deg); transform-style: preserve-3d;">
                            <p class="text-3xl mb-2">👤</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 2</p>
                            <p class="text-xs text-[#384D95] opacity-70">Ada Orang</p>
                        </div>

                        <!-- Meja 3 -->
                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#A492D4]/20 to-[#8B7BC4]/10 border-3 border-[#A492D4] shadow-lg text-center transition-all duration-500" data-meja="3" style="transform: rotateY(15deg) rotateX(5deg); transform-style: preserve-3d;">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 3</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>

                        <!-- Meja 4 -->
                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#384D95]/20 to-[#384D95]/10 border-3 border-[#384D95] shadow-lg text-center transition-all duration-500" data-meja="4" style="transform: rotateY(-15deg); transform-style: preserve-3d;">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 4</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>

                        <!-- Meja 5 -->
                        <div class="meja-item meja-terisi cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#FF6519]/20 to-[#FFB84D]/10 border-3 border-[#FF6519] shadow-lg text-center" data-meja="5" style="transform: rotateY(0deg); transform-style: preserve-3d;">
                            <p class="text-3xl mb-2">👤</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 5</p>
                            <p class="text-xs text-[#384D95] opacity-70">Ada Orang</p>
                        </div>

                        <!-- Meja 6 -->
                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#A492D4]/20 to-[#8B7BC4]/10 border-3 border-[#A492D4] shadow-lg text-center transition-all duration-500" data-meja="6" style="transform: rotateY(15deg); transform-style: preserve-3d;">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 6</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>

                        <!-- Meja 7 -->
                        <div class="meja-item meja-terisi cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#FF6519]/20 to-[#FFB84D]/10 border-3 border-[#FF6519] shadow-lg text-center" data-meja="7" style="transform: rotateY(-15deg) rotateX(-5deg); transform-style: preserve-3d;">
                            <p class="text-3xl mb-2">👤</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 7</p>
                            <p class="text-xs text-[#384D95] opacity-70">Ada Orang</p>
                        </div>

                        <!-- Meja 8 -->
                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#384D95]/20 to-[#384D95]/10 border-3 border-[#384D95] shadow-lg text-center transition-all duration-500" data-meja="8" style="transform: rotateY(0deg) rotateX(-5deg); transform-style: preserve-3d;">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 8</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>

                        <!-- Meja 9 -->
                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#A492D4]/20 to-[#8B7BC4]/10 border-3 border-[#A492D4] shadow-lg text-center transition-all duration-500" data-meja="9" style="transform: rotateY(15deg) rotateX(-5deg); transform-style: preserve-3d;">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 9</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="space-y-6">
                <!-- Music Player -->
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 border-2 border-[#384D95] shadow-lg">
                    <h4 class="text-lg font-black text-[#384D95] mb-4">🎵 Music</h4>
                    
                    <!-- Quick Playlists -->
                    <div class="mb-4">
                        <p class="text-xs font-bold text-[#384D95] mb-2">⚡ Quick Playlists:</p>
                        <div class="grid grid-cols-3 gap-2">
                            <button onclick="playQuickPlaylist('focus')" class="p-2 bg-[#384D95]/20 border-2 border-[#384D95] text-[#384D95] rounded-lg text-xs font-bold hover:bg-[#384D95] hover:text-white transition-all">🧠 Focus</button>
                            <button onclick="playQuickPlaylist('chill')" class="p-2 bg-[#A492D4]/20 border-2 border-[#A492D4] text-[#384D95] rounded-lg text-xs font-bold hover:bg-[#A492D4] hover:text-white transition-all">😌 Chill</button>
                            <button onclick="playQuickPlaylist('nature')" class="p-2 bg-[#384D95]/20 border-2 border-[#384D95] text-[#384D95] rounded-lg text-xs font-bold hover:bg-[#384D95] hover:text-white transition-all">🌿 Nature</button>
                        </div>
                    </div>

                    <!-- OR Divider -->
                    <div class="flex items-center gap-2 mb-4">
                        <div class="flex-1 h-px bg-[#384D95]/20"></div>
                        <span class="text-xs text-[#384D95] opacity-50 font-bold">ATAU</span>
                        <div class="flex-1 h-px bg-[#384D95]/20"></div>
                    </div>

                    <!-- Custom Link -->
                    <p class="text-xs font-bold text-[#384D95] mb-2">🔗 Link Sendiri:</p>
                    <input type="text" id="musicInput" placeholder="Paste link musik di sini..." class="w-full p-2 border-2 border-[#384D95] rounded-lg text-xs mb-3 focus:outline-none focus:ring-2 focus:ring-[#384D95]">
                    <button onclick="loadMusic()" class="w-full p-2 bg-[#384D95] text-white rounded-lg text-xs font-bold hover:bg-[#2a3a6a] transition-all mb-3">Putar Musik</button>
                    
                    <audio id="audioPlayer" controls style="width: 100%; height: 40px;"></audio>
                    
                    <!-- Track Navigation -->
                    <div id="playlistControls" class="hidden mt-3 flex gap-2">
                        <button onclick="previousTrack()" class="flex-1 p-2 bg-[#384D95]/20 border-2 border-[#384D95] text-[#384D95] rounded-lg text-xs font-bold hover:bg-[#384D95] hover:text-white transition-all">⏮ Prev</button>
                        <button onclick="nextTrack()" class="flex-1 p-2 bg-[#384D95]/20 border-2 border-[#384D95] text-[#384D95] rounded-lg text-xs font-bold hover:bg-[#384D95] hover:text-white transition-all">Next ⏭</button>
                    </div>

                    <div id="musicStatus" class="mt-2 text-xs text-[#384D95] text-center opacity-70">
                        <p class="mb-2">📱 Sumber: MP3, SoundCloud, Spotify</p>
                    </div>
                </div>

                <!-- Games -->
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 border-2 border-[#384D95] shadow-lg">
                    <h4 class="text-lg font-black text-[#384D95] mb-4">🎮 Games</h4>
                    <button onclick="startGame('memory')" class="w-full p-2 bg-[#384D95]/10 border-2 border-[#384D95] text-[#384D95] rounded-lg text-xs font-bold hover:bg-[#384D95] hover:text-white transition-all mb-2">🧠 Memory Match</button>
                    <button onclick="startGame('snake')" class="w-full p-2 bg-[#384D95]/10 border-2 border-[#384D95] text-[#384D95] rounded-lg text-xs font-bold hover:bg-[#384D95] hover:text-white transition-all mb-2">🐍 Snake Game</button>
                    <button onclick="startGame('quiz')" class="w-full p-2 bg-[#384D95]/10 border-2 border-[#384D95] text-[#384D95] rounded-lg text-xs font-bold hover:bg-[#384D95] hover:text-white transition-all">❓ Quick Quiz</button>
                </div>

                <!-- To-Do List -->
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 border-2 border-[#384D95] shadow-lg">
                    <h4 class="text-lg font-black text-[#384D95] mb-4">📝 To-Do</h4>
                    <div id="todoList" class="space-y-2 mb-3 max-h-32 overflow-y-auto"></div>
                    <div class="flex gap-2">
                        <input type="text" id="todoInput" placeholder="Tulis task..." class="flex-1 p-2 border-2 border-[#384D95] rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-[#384D95]">
                        <button onclick="addTodo()" class="p-2 bg-[#384D95] text-white rounded-lg font-bold hover:bg-[#2a3a6a] transition-all">+</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Game Modal -->
<div id="gameModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 backdrop-blur-sm p-4">
    <div class="bg-white rounded-3xl w-full max-w-5xl max-h-[95vh] shadow-2xl flex flex-col">
        <div class="flex justify-between items-center p-6 border-b-2 border-[#384D95]/10">
            <h2 id="gameTitle" class="text-3xl font-black text-[#384D95]">Game Title</h2>
            <button onclick="closeGame()" class="text-4xl font-bold text-[#384D95] hover:scale-125 transition-all duration-200">✕</button>
        </div>
        <div id="gameContent" class="flex-1 overflow-hidden p-6 flex items-center justify-center"></div>
    </div>
</div>

<!-- Floating Timer Widget -->
<div id="floatingTimer">
    <button class="close-btn" onclick="hideFloatingTimer()">✕</button>
    <div class="timer-content">
        <div class="timer-info">⏱ Deep Work</div>
        <div class="timer-time" id="floatingTimerDisplay">90:00</div>
        <div class="timer-controls">
            <button onclick="pauseTimer()">⏸</button>
            <button onclick="stopTimer()">⏹</button>
            <button onclick="backToRoom()">↩</button>
        </div>
    </div>
</div>

<style>
    #interactive-bg {
        cursor: pointer;
        pointer-events: auto;
        display: block;
    }

    @keyframes bounce-soft {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .animate-bounce-soft {
        animation: bounce-soft 2s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(5deg); }
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    .feature-card {
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .feature-card:hover {
        transform: translateY(-8px);
    }

    @keyframes counterUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-number {
        animation: counterUp 0.8s ease-out;
    }

    .cta-button {
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
    }

    .cta-button-primary {
        background: linear-gradient(135deg, #E63E88 0%, #d42d74 100%);
    }

    .cta-button-primary:hover {
        transform: translateY(-6px) scale(1.1);
        box-shadow: 0 16px 32px rgba(230, 62, 136, 0.5);
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .bg-gradient-to-r {
        animation: gradientShift 3s ease infinite;
        background-size: 200% 200%;
    }

    @keyframes fadeInScale {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.02); }
    }

    @keyframes breatheIn {
        0% { transform: scale(1); opacity: 0.6; }
        50% { transform: scale(1.2); opacity: 1; }
        100% { transform: scale(1); opacity: 0.6; }
    }

    .meja-item {
        animation: fadeInScale 0.4s ease-out;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .meja-item:hover:not(.meja-terisi) {
        transform: rotateY(0deg) rotateX(0deg) scale(1.08) !important;
    }

    .meja-selected {
        animation: pulse 0.6s ease-out;
        background: linear-gradient(135deg, #E63E88 0%, #d42d74 100%) !important;
        color: white !important;
        border-color: white !important;
        transform: rotateY(0deg) rotateX(0deg) scale(1.1) !important;
    }

    .meja-selected p {
        color: white !important;
    }

    #gameModal.show {
        display: flex !important;
        animation: fadeInScale 0.3s ease-out;
    }

    #gameModal.show .bg-white {
        animation: fadeInScale 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .memory-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
        padding: 0;
        width: 100%;
        max-width: 100%;
    }

    .memory-card {
        aspect-ratio: 1;
        background: linear-gradient(135deg, #E63E88, #d42d74);
        border-radius: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        font-weight: bold;
        transition: all 0.3s ease;
        border: 3px solid white;
        min-width: 0;
    }

    .memory-card:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 20px rgba(230, 62, 136, 0.4);
    }

    .memory-card.flipped {
        background: linear-gradient(135deg, #384D95, #2a3a6a);
        pointer-events: none;
    }

    .memory-card.matched {
        opacity: 0.5;
        pointer-events: none;
    }

    .breathing-circle {
        animation: breatheIn 4s infinite;
    }

    .game-2048-tile {
        background: linear-gradient(135deg, #E63E88, #d42d74);
        border-radius: 8px;
        padding: 16px;
        text-align: center;
        font-weight: bold;
        color: white;
        user-select: none;
    }

    /* Floating Timer Widget */
    #floatingTimer {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 9999;
        background: linear-gradient(135deg, #E63E88 0%, #d42d74 100%);
        border-radius: 20px;
        padding: 16px 24px;
        color: white;
        box-shadow: 0 8px 32px rgba(230, 62, 136, 0.4);
        border: 2px solid white;
        min-width: 200px;
        animation: slideInUp 0.4s ease-out;
        cursor: move;
        display: none;
    }

    #floatingTimer.show {
        display: block;
    }

    #floatingTimer.pinned {
        position: fixed !important;
    }

    #floatingTimer .timer-content {
        text-align: center;
    }

    #floatingTimer .timer-time {
        font-size: 28px;
        font-weight: black;
        font-family: monospace;
        margin: 8px 0;
    }

    #floatingTimer .timer-info {
        font-size: 12px;
        opacity: 0.9;
        margin-bottom: 8px;
    }

    #floatingTimer .timer-controls {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    #floatingTimer button {
        padding: 6px 12px;
        background: white/30;
        border: none;
        color: white;
        border-radius: 8px;
        font-size: 11px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.2s;
    }

    #floatingTimer button:hover {
        background: white/50;
        transform: scale(1.05);
    }

    #floatingTimer .close-btn {
        position: absolute;
        top: 8px;
        right: 8px;
        background: white/30 !important;
        width: 24px;
        height: 24px;
        padding: 0 !important;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    #floatingTimer .close-btn:hover {
        background: white/50 !important;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideOutDown {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(30px);
        }
    }

    #floatingTimer.hide {
        animation: slideOutDown 0.3s ease-out forwards;
    }
</style>

<script>
    const DURATION = 90 * 60; // 90 menit untuk Deep Work
    const METHOD_NAME = 'Deep Work';
    const METHOD_COLOR = '#384D95';
    const TIMER_COLOR = 'from-[#384D95] to-[#2a3a6a]';

    // ===== TIME & DATE =====
    function updateTimeDate() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('currentTime').textContent = `${hours}:${minutes}:${seconds}`;

        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        const dayName = days[now.getDay()];
        const date = now.getDate();
        const month = months[now.getMonth()];
        document.getElementById('currentDate').textContent = `${dayName}, ${date} ${month}`;
    }
    updateTimeDate();
    setInterval(updateTimeDate, 1000);

    // ===== FLOATING TIMER WIDGET =====
    const floatingTimer = document.getElementById('floatingTimer');

    let floatingTimerPinned = localStorage.getItem('floatingTimerPinned') === 'true';
    let floatingTimerPosition = JSON.parse(localStorage.getItem('floatingTimerPosition') || '{"x": 30, "y": 30}');
    let timerStartTime = localStorage.getItem('timerStartTime');
    let timerDuration = parseInt(localStorage.getItem('timerDuration') || '1500');

    function showFloatingTimer() {
        if (!floatingTimer) return;
        floatingTimer.classList.add('show');
        if (floatingTimerPinned) {
            floatingTimer.classList.add('pinned');
            floatingTimer.style.bottom = floatingTimerPosition.y + 'px';
            floatingTimer.style.right = floatingTimerPosition.x + 'px';
        }
        updateFloatingTimerDisplay();
    }

    function hideFloatingTimer() {
        if (!floatingTimer) return;
        floatingTimer.classList.remove('show');
        floatingTimer.classList.add('hide');
        setTimeout(() => {
            floatingTimer.classList.remove('hide');
        }, 300);
    }

    function updateFloatingTimerDisplay() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        const display = document.getElementById('floatingTimerDisplay');
        if (display) {
            display.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }
    }

    function restoreTimerFromStorage() {
        const startTime = localStorage.getItem('timerStartTime');
        const duration = parseInt(localStorage.getItem('timerDuration') || '1500');
        const isRunning = localStorage.getItem('timerRunning') === 'true';
        
        if (startTime && isRunning) {
            const elapsed = Math.floor((Date.now() - parseInt(startTime)) / 1000);
            timeRemaining = Math.max(0, duration - elapsed);
            
            if (timeRemaining > 0) {
                isRunning = true;
                showFloatingTimer();
                document.getElementById('pinBtn').style.display = 'inline-block';
                startTimerInterval();
            } else {
                // Timer sudah selesai
                clearTimerStorage();
                hideFloatingTimer();
            }
        }
    }

    function startTimerInterval() {
        if (timerInterval) clearInterval(timerInterval);
        
        timerInterval = setInterval(() => {
            timeRemaining--;
            window.globalTimeRemaining = timeRemaining;
            
            updateTimerDisplay();
            if (window.updateFloatingTimerDisplay) {
                window.updateFloatingTimerDisplay();
            }
            
            localStorage.setItem('globalTimeRemaining', timeRemaining);
            
            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                isRunning = false;
                alert('⏰ Sesi Pomodoro selesai! Istirahat 5 menit yuk! 🎉');
                resetTimer();
                if (window.hideFloatingTimer) {
                    window.hideFloatingTimer();
                }
            }
        }, 1000);
    }

    function clearTimerStorage() {
        localStorage.removeItem('timerStartTime');
        localStorage.removeItem('timerRunning');
        localStorage.removeItem('timerDuration');
    }

    function pinFloatingTimer() {
        floatingTimerPinned = !floatingTimerPinned;
        localStorage.setItem('floatingTimerPinned', floatingTimerPinned);
        
        if (floatingTimerPinned) {
            floatingTimer.classList.add('pinned');
            document.getElementById('pinBtn').textContent = '📌 Unpop';
            document.getElementById('pinBtn').style.background = 'rgba(255,255,255,0.4)';
        } else {
            floatingTimer.classList.remove('pinned');
            document.getElementById('pinBtn').textContent = '📌 Pin';
            document.getElementById('pinBtn').style.background = 'rgba(255,255,255,0.2)';
        }
    }

    function backToRoom() {
        // Scroll kembali ke halaman room-pomodoro
        const mejaSection = document.querySelector('#mejaSection');
        if (mejaSection) {
            mejaSection.scrollIntoView({ behavior: 'smooth' });
            console.log('✅ Back to room');
        }
    }

    function saveFloatingTimerPosition() {
        floatingTimerPosition = {
            x: parseInt(floatingTimer.style.right),
            y: parseInt(floatingTimer.style.bottom)
        };
        localStorage.setItem('floatingTimerPosition', JSON.stringify(floatingTimerPosition));
    }

    // Drag functionality untuk floating timer
    let isDragging = false;
    let dragOffsetX = 0;
    let dragOffsetY = 0;

    floatingTimer.addEventListener('mousedown', (e) => {
        if (e.target.tagName === 'BUTTON' || e.target.closest('button')) return;
        isDragging = true;
        dragOffsetX = e.clientX - floatingTimer.getBoundingClientRect().right;
        dragOffsetY = e.clientY - floatingTimer.getBoundingClientRect().bottom;
    });

    document.addEventListener('mousemove', (e) => {
        if (isDragging && floatingTimerPinned) {
            const newX = window.innerWidth - e.clientX - dragOffsetX;
            const newY = window.innerHeight - e.clientY - dragOffsetY;
            
            floatingTimer.style.right = Math.max(10, Math.min(newX, window.innerWidth - 220)) + 'px';
            floatingTimer.style.bottom = Math.max(10, Math.min(newY, window.innerHeight - 180)) + 'px';
        }
    });

    document.addEventListener('mouseup', () => {
        if (isDragging) {
            isDragging = false;
            saveFloatingTimerPosition();
        }
    });

    // ===== TIMER (SYNC WITH GLOBAL) =====
    const selectedDuration = 90 * 60; // 90 menit
    let timeRemaining = selectedDuration;
    let timerInterval = null;
    let isRunning = false;

    function startTimer() {
        if (isRunning) return;
        isRunning = true;
        
        // Set global timer
        window.globalTimeRemaining = selectedDuration;
        window.globalTimerDuration = selectedDuration;
        window.globalTimerRunning = true;
        
        localStorage.setItem('globalTimeRemaining', selectedDuration);
        localStorage.setItem('globalTimerDuration', selectedDuration);
        localStorage.setItem('globalTimerRunning', 'true');
        
        // Show floating timer
        if (window.showFloatingTimer) {
            window.showFloatingTimer();
        }
        
        document.getElementById('pinBtn').style.display = 'inline-block';
        
        startLocalTimerInterval();
    }

    function startLocalTimerInterval() {
        if (timerInterval) clearInterval(timerInterval);
        
        timerInterval = setInterval(() => {
            timeRemaining--;
            window.globalTimeRemaining = timeRemaining;
            
            updateTimerDisplay();
            if (window.updateFloatingTimerDisplay) {
                window.updateFloatingTimerDisplay();
            }
            
            localStorage.setItem('globalTimeRemaining', timeRemaining);
            
            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                isRunning = false;
                alert('⏰ Sesi Pomodoro selesai! Istirahat 5 menit yuk! 🎉');
                resetTimer();
                if (window.hideFloatingTimer) {
                    window.hideFloatingTimer();
                }
            }
        }, 1000);
    }

    function updateTimerDisplay() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        const mainTimer = document.getElementById('mainTimer');
        if (mainTimer) {
            mainTimer.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }
    }

    function pauseTimer() {
        if (isRunning) {
            clearInterval(timerInterval);
            isRunning = false;
            window.globalTimerRunning = false;
            document.getElementById('pauseBtn').textContent = '▶ Lanjut';
            localStorage.setItem('globalTimerRunning', 'false');
        } else {
            isRunning = true;
            window.globalTimerRunning = true;
            document.getElementById('pauseBtn').textContent = '⏸ Jeda';
            localStorage.setItem('globalTimerRunning', 'true');
            startLocalTimerInterval();
        }
    }

    function stopTimer() {
        clearInterval(timerInterval);
        isRunning = false;
        resetTimer();
        if (window.hideFloatingTimer) {
            window.hideFloatingTimer();
        }
    }

    function resetTimer() {
        document.getElementById('timerSection').classList.add('hidden');
        document.getElementById('mejaSection').classList.remove('hidden');
        document.getElementById('pauseBtn').textContent = '⏸ Jeda';
        timeRemaining = selectedDuration;
        document.getElementById('pinBtn').style.display = 'none';
        
        // Clear global timer
        localStorage.removeItem('globalTimeRemaining');
        localStorage.removeItem('globalTimerRunning');
        localStorage.removeItem('globalTimerDuration');
    }

    // ===== MEJA SELECTION =====
    document.querySelectorAll('.meja-item').forEach(meja => {
        meja.addEventListener('click', () => {
            if (!meja.classList.contains('meja-terisi')) {
                document.querySelectorAll('.meja-item').forEach(m => m.classList.remove('meja-selected'));
                meja.classList.add('meja-selected');
                setTimeout(() => {
                    document.getElementById('mejaSection').classList.add('hidden');
                    document.getElementById('timerSection').classList.remove('hidden');
                    startTimer();
                }, 300);
            }
        });
    });

    const pauseBtnEl = document.getElementById('pauseBtn');
    const stopBtnEl = document.getElementById('stopBtn');
    const pinBtnEl = document.getElementById('pinBtn');
    
    if (pauseBtnEl) pauseBtnEl.addEventListener('click', pauseTimer);
    if (stopBtnEl) stopBtnEl.addEventListener('click', stopTimer);
    if (pinBtnEl) pinBtnEl.addEventListener('click', () => {
        window.pinFloatingTimer();
    });

    // ===== GAMES =====
    let memoryCards = [];
    let memoryMatched = 0;

    function startGame(game) {
        const modal = document.getElementById('gameModal');
        const content = document.getElementById('gameContent');
        const title = document.getElementById('gameTitle');

        if (game === 'memory') {
            title.textContent = '🧠 Memory Match Game';
            content.innerHTML = createMemoryGame();
            initMemoryGame();
        } else if (game === 'snake') {
            title.textContent = '🐍 Snake Game';
            content.innerHTML = createSnakeGame();
            setTimeout(() => initSnakeGame(), 100);
        } else if (game === 'quiz') {
            title.textContent = '❓ Quick Quiz';
            content.innerHTML = createQuizGame();
        }

        modal.classList.add('show');
    }

    function closeGame() {
        document.getElementById('gameModal').classList.remove('show');
    }

    // ===== SCORE SYSTEM =====
    let userScore = JSON.parse(localStorage.getItem('userScore')) || { total: 0, games: {} };

    function addScore(gameName, points) {
        userScore.total += points;
        if (!userScore.games[gameName]) {
            userScore.games[gameName] = 0;
        }
        userScore.games[gameName] += points;
        localStorage.setItem('userScore', JSON.stringify(userScore));
        console.log(`✅ Added ${points} points for ${gameName}. Total: ${userScore.total}`);
    }

    function showScorePopup(gameName, points) {
        const modal = document.getElementById('gameModal');
        const content = document.getElementById('gameContent');
        const title = document.getElementById('gameTitle');

        title.textContent = '🎉 Game Over!';
        content.innerHTML = `
            <div class="w-full flex flex-col items-center justify-center gap-6 max-h-full overflow-y-auto px-4">
                <p class="text-6xl flex-shrink-0">🎊</p>
                <div class="text-center flex-shrink-0">
                    <h3 class="text-4xl font-black text-[#E63E88] mb-2">${points} Poin!</h3>
                    <p class="text-xl text-[#384D95] font-bold">Total: <span class="text-2xl text-[#E63E88]">${userScore.total}</span></p>
                </div>
                <div class="bg-[#384D95]/10 p-4 rounded-xl border-2 border-[#384D95] flex-shrink-0">
                    <p class="text-sm text-[#384D95] font-semibold">💡 Tukar skor dengan badge di profile!</p>
                </div>
                <div class="flex gap-3 justify-center flex-shrink-0 w-full">
                    <button onclick="viewProfile()" class="px-6 py-2 bg-[#E63E88] text-white rounded-lg font-bold hover:bg-[#d42d74] transition-all text-sm hover:scale-105">👤 Profile</button>
                    <button onclick="closeGame()" class="px-6 py-2 bg-[#384D95] text-white rounded-lg font-bold hover:bg-[#2a3a6a] transition-all text-sm hover:scale-105">Kembali</button>
                </div>
            </div>
        `;

        modal.classList.add('show');
    }

    function viewProfile() {
        window.location.href = '/profile';
    }

    // Memory Match Game
    function createMemoryGame() {
        const emojis = ['🍎', '🍎', '🍊', '🍊', '🍋', '🍋', '🍌', '🍌', '🍇', '🍇', '🍓', '🍓', '🥝', '🥝', '🍑', '🍑'];
        memoryCards = emojis.sort(() => Math.random() - 0.5);
        memoryMatched = 0;
        
        let html = '<div class="w-full flex flex-col items-center justify-center gap-4">';
        html += '<div class="memory-grid w-full" style="max-width: 400px;">';
        memoryCards.forEach((emoji, idx) => {
            html += `<div class="memory-card" data-index="${idx}" onclick="flipMemoryCard(${idx})">?</div>`;
        });
        html += '</div>';
        html += '<div class="text-center space-y-2 mt-4">';
        html += '<p class="text-base text-[#384D95] font-semibold">Cocokkan pasangan emoji! 🎯</p>';
        html += `<p class="text-sm text-[#384D95] opacity-70">Matched: <span id="matchCount" class="font-black text-[#E63E88]">0</span>/${memoryCards.length/2}</p>`;
        html += '</div></div>';
        
        return html;
    }

    function initMemoryGame() {
        document.querySelectorAll('.memory-card').forEach(card => {
            card.textContent = '?';
            card.classList.remove('flipped', 'matched');
        });
    }

    let firstCard = null;
    let secondCard = null;
    let lockBoard = false;

    function flipMemoryCard(index) {
        if (lockBoard) return;
        
        const card = document.querySelectorAll('.memory-card')[index];
        if (card.classList.contains('flipped') || card.classList.contains('matched')) return;

        card.textContent = memoryCards[index];
        card.classList.add('flipped');

        if (!firstCard) {
            firstCard = { index, element: card };
        } else {
            secondCard = { index, element: card };
            lockBoard = true;

            if (memoryCards[firstCard.index] === memoryCards[secondCard.index]) {
                memoryMatched++;
                firstCard.element.classList.add('matched');
                secondCard.element.classList.add('matched');
                document.getElementById('matchCount').textContent = memoryMatched;
                
                if (memoryMatched === memoryCards.length / 2) {
                    const points = memoryMatched * 10; // 10 poin per pasangan
                    addScore('memory', points);
                    setTimeout(() => showScorePopup('Memory Match', points), 500);
                }
                
                firstCard = null;
                secondCard = null;
                lockBoard = false;
            } else {
                setTimeout(() => {
                    firstCard.element.textContent = '?';
                    secondCard.element.textContent = '?';
                    firstCard.element.classList.remove('flipped');
                    secondCard.element.classList.remove('flipped');
                    firstCard = null;
                    secondCard = null;
                    lockBoard = false;
                }, 1000);
            }
        }
    }

    // Snake Game
    let snakeGame = {
        grid: 20,
        snake: [{x: 10, y: 10}],
        food: {x: 15, y: 15},
        direction: {x: 1, y: 0},
        nextDirection: {x: 1, y: 0},
        score: 0,
        gameRunning: true
    };

    function createSnakeGame() {
        return `
            <div class="w-full flex flex-col items-center justify-center gap-6 max-h-full">
                <div class="flex justify-center flex-shrink-0">
                    <canvas id="snakeCanvas" width="350" height="350" style="background: #000; border-radius: 12px; border: 3px solid #384D95; display: block; max-width: 100%;"></canvas>
                </div>
                <div class="space-y-2 flex-shrink-0">
                    <p class="text-xl font-black text-[#E63E88]">Score: <span id="snakeScore" class="text-2xl">0</span></p>
                    <p class="text-sm text-[#384D95] font-semibold">Arrow Keys / WASD</p>
                    <p class="text-xs text-[#384D95] opacity-70">Kumpulkan makanan tanpa tabrakan!</p>
                </div>
                <button onclick="closeGame()" class="flex-shrink-0 px-6 py-2 bg-[#384D95] text-white rounded-lg font-bold hover:bg-[#2a3a6a] transition-all text-sm">Keluar</button>
            </div>
        `;
    }

    function initSnakeGame() {
        const canvas = document.getElementById('snakeCanvas');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        const cellSize = canvas.width / snakeGame.grid;

        snakeGame = {
            grid: 20,
            snake: [{x: 10, y: 10}],
            food: {x: 15, y: 15},
            direction: {x: 1, y: 0},
            nextDirection: {x: 1, y: 0},
            score: 0,
            gameRunning: true
        };

        function drawSnake() {
            snakeGame.snake.forEach((segment, index) => {
                ctx.fillStyle = index === 0 ? '#E63E88' : '#E63E88cc';
                ctx.fillRect(segment.x * cellSize, segment.y * cellSize, cellSize - 1, cellSize - 1);
            });
        }

        function drawFood() {
            ctx.fillStyle = '#FFD700';
            ctx.beginPath();
            ctx.arc(snakeGame.food.x * cellSize + cellSize / 2, snakeGame.food.y * cellSize + cellSize / 2, cellSize / 2 - 2, 0, Math.PI * 2);
            ctx.fill();
        }

        function update() {
            snakeGame.direction = snakeGame.nextDirection;
            const head = {...snakeGame.snake[0]};
            head.x += snakeGame.direction.x;
            head.y += snakeGame.direction.y;

            // Bounce dari walls
            if (head.x < 0) head.x = snakeGame.grid - 1;
            if (head.x >= snakeGame.grid) head.x = 0;
            if (head.y < 0) head.y = snakeGame.grid - 1;
            if (head.y >= snakeGame.grid) head.y = 0;

            // Check collision dengan diri sendiri
            for (let segment of snakeGame.snake) {
                if (head.x === segment.x && head.y === segment.y) {
                    snakeGame.gameRunning = false;
                    const points = snakeGame.score * 15;
                    addScore('snake', points);
                    showScorePopup('Snake Game', points);
                    return;
                }
            }

            snakeGame.snake.unshift(head);

            // Check makanan
            if (head.x === snakeGame.food.x && head.y === snakeGame.food.y) {
                snakeGame.score++;
                document.getElementById('snakeScore').textContent = snakeGame.score;
                snakeGame.food = {
                    x: Math.floor(Math.random() * snakeGame.grid),
                    y: Math.floor(Math.random() * snakeGame.grid)
                };
            } else {
                snakeGame.snake.pop();
            }
        }

        function gameLoop() {
            ctx.fillStyle = '#000';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            if (snakeGame.gameRunning) {
                update();
            }

            drawSnake();
            drawFood();

            setTimeout(gameLoop, 100);
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowUp' || e.key === 'w' || e.key === 'W') snakeGame.nextDirection = {x: 0, y: -1};
            if (e.key === 'ArrowDown' || e.key === 's' || e.key === 'S') snakeGame.nextDirection = {x: 0, y: 1};
            if (e.key === 'ArrowLeft' || e.key === 'a' || e.key === 'A') snakeGame.nextDirection = {x: -1, y: 0};
            if (e.key === 'ArrowRight' || e.key === 'd' || e.key === 'D') snakeGame.nextDirection = {x: 1, y: 0};
        });

        gameLoop();
    }

    // Quick Quiz Game
    const quizQuestions = [
        { question: 'Berapa 5 + 3?', options: ['7', '8', '9', '10'], correct: 1 },
        { question: 'Ibu kota Indonesia?', options: ['Bandung', 'Jakarta', 'Surabaya', 'Medan'], correct: 1 },
        { question: 'Berapa 10 × 2?', options: ['15', '20', '25', '30'], correct: 1 },
        { question: 'Siapa presiden pertama Indonesia?', options: ['Soekarno', 'Soeharto', 'Habibie', 'Megawati'], correct: 0 },
        { question: 'Berapa 100 ÷ 4?', options: ['20', '25', '30', '35'], correct: 1 }
    ];

    let currentQuestion = 0;
    let quizScore = 0;

    function createQuizGame() {
        const q = quizQuestions[currentQuestion];
        let html = `
            <div class="w-full flex flex-col items-center justify-center gap-4 max-h-full">
                <div class="bg-[#384D95]/10 px-6 py-2 rounded-lg flex-shrink-0">
                    <p class="text-xs text-[#384D95] font-bold">Pertanyaan ${currentQuestion + 1}/${quizQuestions.length}</p>
                </div>
                <h3 class="text-xl font-black text-[#384D95] text-center flex-shrink-0 px-4">${q.question}</h3>
                <div class="space-y-2 w-full px-4 flex-1 overflow-y-auto">
        `;
        
        q.options.forEach((option, idx) => {
            html += `
                <button onclick="answerQuiz(${idx})" class="w-full p-3 bg-[#E63E88]/10 border-2 border-[#E63E88] text-[#384D95] rounded-lg font-bold hover:bg-[#E63E88] hover:text-white transition-all text-sm hover:scale-10">
                    ${String.fromCharCode(65 + idx)}) ${option}
                </button>
            `;
        });
        
        html += `
                </div>
                <div class="bg-[#384D95]/10 px-6 py-2 rounded-lg flex-shrink-0 w-full text-center">
                    <p class="text-xs text-[#384D95] font-bold">Score: <span class="text-sm text-[#E63E88] font-black">${quizScore}/${quizQuestions.length}</span></p>
                </div>
            </div>
        `;
        return html;
    }

    function answerQuiz(answer) {
        const q = quizQuestions[currentQuestion];
        if (answer === q.correct) {
            quizScore++;
        }

        currentQuestion++;
        if (currentQuestion >= quizQuestions.length) {
            const points = quizScore * 20; // 20 poin per jawaban benar
            addScore('quiz', points);
            currentQuestion = 0;
            showScorePopup('Quick Quiz', points);
            quizScore = 0;
            return;
        }

        const modal = document.getElementById('gameModal');
        const content = document.getElementById('gameContent');
        content.innerHTML = createQuizGame();
    }

    // ===== MUSIC PLAYER (ENHANCED) =====
    const audioPlayer = document.getElementById('audioPlayer');
    
    // Quick Playlists Database - EDIT LINK DI SINI
    const quickPlaylists = {
        focus: [
            '/music/Focus (1).mp3', // Ganti dengan link MP3 kamu di sini
            '/music/Focus (2).mp3', // Ganti dengan link MP3 kamu di sini
            '/music/Focus (3).mp3'  // Ganti dengan link MP3 kamu di sini
        ],
        chill: [
            '/music/Chill (1).mp3', // Ganti dengan link MP3 kamu di sini
            '/music/Chill (2).mp3', // Ganti dengan link MP3 kamu di sini
            '/music/Chill (3).mp3'  // Ganti dengan link MP3 kamu di sini
        ],
        nature: [
            '/music/Nature (1).mp3', // Ganti dengan link MP3 kamu di sini
            '/music/Nature (2).mp3', // Ganti dengan link MP3 kamu di sini
            '/music/Nature (3).mp3'  // Ganti dengan link MP3 kamu di sini
        ]
    };

    let currentPlaylistIndex = 0;
    let currentPlaylistType = null;

    function playQuickPlaylist(type) {
        currentPlaylistType = type;
        currentPlaylistIndex = 0;
        showPlaylistControls();
        playPlaylistTrack();
    }

    function playPlaylistTrack() {
        if (!currentPlaylistType || !quickPlaylists[currentPlaylistType]) return;
        
        const playlist = quickPlaylists[currentPlaylistType];
        const trackUrl = playlist[currentPlaylistIndex];
        
        // Validasi jika link belum diganti
        if (trackUrl.includes('GANTI_LINK') || !trackUrl.trim()) {
            updateMusicStatus('❌ Link musik belum dikonfigurasi. Periksa path file musik!');
            console.warn(`Track URL tidak valid: ${trackUrl}`);
            return;
        }
        
        console.log(`Loading track: ${trackUrl}`);
        audioPlayer.src = trackUrl;
        audioPlayer.crossOrigin = 'anonymous';
        
        const playlistNames = {
            focus: '🧠 Focus',
            chill: '😌 Chill',
            nature: '🌿 Nature'
        };
        
        updateMusicStatus(`⏳ Loading ${playlistNames[currentPlaylistType]} - Track ${currentPlaylistIndex + 1}/${playlist.length}...`);
        
        // Try to play
        const playPromise = audioPlayer.play();
        
        if (playPromise !== undefined) {
            playPromise
                .then(() => {
                    console.log('✅ Audio playing successfully');
                    updateMusicStatus(`▶️ ${playlistNames[currentPlaylistType]} - Track ${currentPlaylistIndex + 1}/${playlist.length}`);
                })
                .catch(err => {
                    console.error('Playback error:', err);
                    updateMusicStatus(`❌ Error: ${err.message}. Coba track berikutnya...`);
                    // Try next track
                    nextTrack();
                });
        }
    }

    function nextTrack() {
        if (!currentPlaylistType) return;
        
        const playlist = quickPlaylists[currentPlaylistType];
        currentPlaylistIndex = (currentPlaylistIndex + 1) % playlist.length;
        playPlaylistTrack();
        console.log(`⏭ Skipped to track ${currentPlaylistIndex + 1}`);
    }

    function previousTrack() {
        if (!currentPlaylistType) return;
        
        const playlist = quickPlaylists[currentPlaylistType];
        currentPlaylistIndex = (currentPlaylistIndex - 1 + playlist.length) % playlist.length;
        playPlaylistTrack();
        console.log(`⏮ Skipped to track ${currentPlaylistIndex + 1}`);
    }

    function showPlaylistControls() {
        document.getElementById('playlistControls').classList.remove('hidden');
    }

    function hidePlaylistControls() {
        document.getElementById('playlistControls').classList.add('hidden');
    }

    // Event: Audio can play
    audioPlayer.addEventListener('canplay', () => {
        console.log('✅ Audio ready to play');
        updateMusicStatus(`▶️ Playing...`);
    });

    // Auto play next track when current ends
    audioPlayer.addEventListener('ended', () => {
        console.log('Track ended, playing next...');
        if (currentPlaylistType) {
            nextTrack();
        }
    });

    // Handle errors
    audioPlayer.addEventListener('error', (e) => {
        console.error('Audio error:', e);
        console.error('Error code:', audioPlayer.error?.code);
        console.error('Error message:', audioPlayer.error?.message);
        
        const errorMessages = {
            1: 'ABORTED - Playback was aborted',
            2: 'NETWORK - Network error',
            3: 'DECODE - Audio decode error',
            4: 'SRC_NOT_SUPPORTED - Source not supported'
        };
        
        const errorMsg = errorMessages[audioPlayer.error?.code] || 'Unknown error';
        updateMusicStatus(`❌ Gagal memuat. Periksa path file musik!`);
    });

    function loadMusic() {
        const link = document.getElementById('musicInput').value.trim();
        currentPlaylistType = null; // Reset playlist mode
        hidePlaylistControls();
        
        if (!link) {
            alert('⚠️ Masukkan link musik terlebih dahulu!');
            return;
        }

        // Deteksi tipe sumber
        let finalUrl = link;
        let source = '';

        // YouTube Music / YouTube
        if (link.includes('youtu.be') || link.includes('youtube.com')) {
            source = 'YouTube';
            const videoId = extractYouTubeId(link);
            if (!videoId) {
                alert('❌ Link YouTube tidak valid!');
                return;
            }
            showYouTubePlayer(videoId);
            return;
        }

        // Spotify
        if (link.includes('spotify.com')) {
            source = 'Spotify';
            const trackId = extractSpotifyId(link);
            if (!trackId) {
                alert('❌ Link Spotify tidak valid!');
                return;
            }
            showSpotifyPlayer(trackId);
            return;
        }

        // SoundCloud
        if (link.includes('soundcloud.com')) {
            source = 'SoundCloud';
            loadSoundCloud(link);
            return;
        }

        // Direct MP3 URL
        if (link.endsWith('.mp3') || link.includes('mp3')) {
            source = 'MP3 Direct';
            finalUrl = link;
        }

        // Default attempt
        audioPlayer.src = finalUrl;
        audioPlayer.crossOrigin = 'anonymous';
        
        updateMusicStatus('⏳ Loading...');

        // Play dengan delay
        const playHandler = () => {
            updateMusicStatus(`▶️ Playing (${source})`);
            audioPlayer.removeEventListener('canplay', playHandler);
        };

        audioPlayer.addEventListener('canplay', playHandler);

        // Force play
        setTimeout(() => {
            audioPlayer.play().catch(err => {
                console.error('Playback error:', err);
                updateMusicStatus('❌ Gagal memutar. Pastikan format MP3 dan URL valid.');
            });
        }, 500);
    }

    function extractYouTubeId(url) {
        const patterns = [
            /(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\n?#]+)/,
            /youtube\.com\/embed\/([^&\n?#]+)/,
        ];
        
        for (let pattern of patterns) {
            const match = url.match(pattern);
            if (match) return match[1];
        }
        return null;
    }

    function extractSpotifyId(url) {
        const match = url.match(/spotify\.com\/track\/([a-zA-Z0-9]+)/);
        return match ? match[1] : null;
    }

    function showYouTubePlayer(videoId) {
        const modal = document.getElementById('gameModal');
        const content = document.getElementById('gameContent');
        const title = document.getElementById('gameTitle');

        title.textContent = '🎬 YouTube Player';
        content.innerHTML = `
            <div class="text-center">
                <iframe width="100%" height="300" src="https://www.youtube.com/embed/${videoId}" 
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen style="border-radius: 8px;"></iframe>
                <p class="text-sm text-[#384D95] font-semibold mt-4">▶️ Lagu sedang diputar di YouTube</p>
                <button onclick="closeGame()" class="mt-4 px-6 py-2 bg-[#384D95] text-white rounded-lg font-bold">Tutup</button>
            </div>
        `;

        modal.classList.add('show');
        updateMusicStatus('▶️ YouTube sedang diputar');
    }

    function showSpotifyPlayer(trackId) {
        const modal = document.getElementById('gameModal');
        const content = document.getElementById('gameContent');
        const title = document.getElementById('gameTitle');

        title.textContent = '🎵 Spotify Player';
        content.innerHTML = `
            <div class="text-center">
                <iframe src="https://open.spotify.com/embed/track/${trackId}" width="100%" height="352" 
                    frameborder="0" allowtransparency="true" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                    style="border-radius: 8px;"></iframe>
                <button onclick="closeGame()" class="mt-4 px-6 py-2 bg-[#384D95] text-white rounded-lg font-bold">Tutup</button>
            </div>
        `;

        modal.classList.add('show');
        updateMusicStatus('▶️ Spotify sedang diputar');
    }

    function loadSoundCloud(url) {
        const modal = document.getElementById('gameModal');
        const content = document.getElementById('gameContent');
        const title = document.getElementById('gameTitle');

        title.textContent = '☁️ SoundCloud Player';
        content.innerHTML = `
            <div class="text-center">
                <iframe width="100%" height="300" scrolling="no" frameborder="no" 
                    src="https://w.soundcloud.com/player/?url=${encodeURIComponent(url)}&color=%23384D95&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"
                    style="border-radius: 8px;"></iframe>
                <button onclick="closeGame()" class="mt-4 px-6 py-2 bg-[#384D95] text-white rounded-lg font-bold">Tutup</button>
            </div>
        `;

        modal.classList.add('show');
        updateMusicStatus('▶️ SoundCloud sedang diputar');
    }

    function updateMusicStatus(message) {
        const statusEl = document.getElementById('musicStatus');
        statusEl.innerHTML = `<p>${message}</p>`;
        console.log(`Status: ${message}`);
    }
    
    audioPlayer.onplay = () => {
        console.log('Audio play event triggered');
        if (!currentPlaylistType) {
            updateMusicStatus('▶️ Musik sedang diputar');
        }
    };

    audioPlayer.onpause = () => {
        if (!currentPlaylistType) {
            updateMusicStatus('⏸ Dijeda');
        }
    };

    audioPlayer.onended = () => {
        console.log('Audio ended');
        if (!currentPlaylistType) {
            updateMusicStatus('✓ Selesai');
        }
    };

    audioPlayer.onerror = (e) => {
        console.error('Audio error event:', e);
        console.error('Error code:', audioPlayer.error?.code);
        console.error('Error message:', audioPlayer.error?.message);
        
        const errorMessages = {
            1: 'ABORTED - Playback was aborted',
            2: 'NETWORK - Network error',
            3: 'DECODE - Audio decode error',
            4: 'SRC_NOT_SUPPORTED - Source not supported'
        };
        
        const errorMsg = errorMessages[audioPlayer.error?.code] || 'Unknown error';
        updateMusicStatus(`❌ Gagal memuat. Periksa path file musik!`);
    };

    // ===== TO-DO LIST =====
    let todos = JSON.parse(localStorage.getItem('todos')) || [];

    function renderTodos() {
        const list = document.getElementById('todoList');
        list.innerHTML = '';
        
        if (todos.length === 0) {
            list.innerHTML = '<p class="text-xs text-[#384D95] opacity-50 text-center py-4">Belum ada tasks</p>';
            return;
        }

        todos.forEach(todo => {
            const item = document.createElement('div');
            item.className = 'flex items-center gap-2 p-2 bg-[#384D95]/10 rounded-lg hover:bg-[#384D95]/20 transition-all';
            item.innerHTML = `
                <input type="checkbox" ${todo.done ? 'checked' : ''} onchange="toggleTodo(${todo.id})" class="w-4 h-4 accent-[#E63E88] cursor-pointer">
                <span class="flex-1 text-xs text-[#384D95] ${todo.done ? 'line-through opacity-50' : ''}">${escapeHtml(todo.text)}</span>
                <button onclick="deleteTodo(${todo.id})" class="text-xs text-red-500 font-bold hover:text-red-700">✕</button>
            `;
            list.appendChild(item);
        });
    }

    function addTodo() {
        const input = document.getElementById('todoInput');
        const text = input.value.trim();

        if (!text) {
            return; // Silently fail
        }

        if (text.length > 50) {
            alert('Task terlalu panjang (max 50 karakter)');
            return;
        }

        todos.push({
            id: Date.now(),
            text: text,
            done: false
        });

        localStorage.setItem('todos', JSON.stringify(todos));
        input.value = '';
        renderTodos();
    }

    function toggleTodo(id) {
        todos = todos.map(t => t.id === id ? {...t, done: !t.done} : t);
        localStorage.setItem('todos', JSON.stringify(todos));
        renderTodos();
    }

    function deleteTodo(id) {
        todos = todos.filter(t => t.id !== id);
        localStorage.setItem('todos', JSON.stringify(todos));
        renderTodos();
    }

    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, m => map[m]);
    }

    document.getElementById('todoInput').addEventListener('keypress', (e) => {
        if (e.key === 'Enter') addTodo();
    });

    document.querySelector('button[onclick="addTodo()"]').addEventListener('click', addTodo);

    // Initial render
    renderTodos();

    // Canvas background
    const canvas = document.getElementById('interactive-bg');
    const ctx = canvas.getContext('2d');
    const colors = ['#FFFFFF', '#E63E88', '#384D95', '#F0F0F5'];

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    class LiquidBlob {
        constructor(offsetX = 0, offsetY = 0) {
            this.x = canvas.width / 2 + offsetX;
            this.y = canvas.height / 2 + offsetY;
            this.targetX = canvas.width / 2 + offsetX;
            this.targetY = canvas.height / 2 + offsetY;
            this.baseRadius = 25 + Math.random() * 20;
            this.radius = this.baseRadius;
            this.color = colors[Math.floor(Math.random() * colors.length)];
            this.wobbleAmount = 0;
            this.wobbleSpeed = Math.random() * 0.05 + 0.02;
        }

        update(mouseX, mouseY) {
            this.targetX = mouseX;
            this.targetY = mouseY;
            
            const dx = this.targetX - this.x;
            const dy = this.targetY - this.y;
            
            const distance = Math.sqrt(dx * dx + dy * dy);
            const easing = Math.min(distance * 0.001, 0.25);
            
            this.x += dx * easing;
            this.y += dy * easing;

            this.wobbleAmount += this.wobbleSpeed;
            this.radius = this.baseRadius + Math.sin(this.wobbleAmount) * 15;
        }

        draw() {
            ctx.globalAlpha = 0.4;
            ctx.fillStyle = this.color;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius * 1.2, 0, Math.PI * 2);
            ctx.fill();
            
            ctx.globalAlpha = 0.6;
            ctx.fillStyle = this.color;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fill();
            
            ctx.globalAlpha = 1;
        }
    }

    class Particle {
        constructor(x, y) {
            this.x = x || Math.random() * canvas.width;
            this.y = y || Math.random() * canvas.height;
            this.vx = (Math.random() - 0.5) * 2;
            this.vy = (Math.random() - 0.5) * 2;
            this.radius = Math.random() * 3 + 1;
            this.color = colors[Math.floor(Math.random() * colors.length)];
            this.life = 1;
            this.decay = Math.random() * 0.01 + 0.003;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;
            this.life -= this.decay;
            
            if (this.x < 0 || this.x > canvas.width) this.vx *= -1;
            if (this.y < 0 || this.y > canvas.height) this.vy *= -1;
            
            this.x = Math.max(0, Math.min(canvas.width, this.x));
            this.y = Math.max(0, Math.min(canvas.height, this.y));
        }

        draw() {
            ctx.globalAlpha = this.life * 0.7;
            ctx.fillStyle = this.color;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    let liquidBlobs = [];
    let particles = [];

    for (let i = 0; i < 6; i++) {
        const offsetX = (Math.random() - 0.5) * 600;
        const offsetY = (Math.random() - 0.5) * 600;
        liquidBlobs.push(new LiquidBlob(offsetX, offsetY));
    }

    for (let i = 0; i < 30; i++) {
        particles.push(new Particle());
    }

    let mouseX = canvas.width / 2;
    let mouseY = canvas.height / 2;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        
        if (Math.random() > 0.7) {
            for (let i = 0; i < 2; i++) {
                const p = new Particle(mouseX + (Math.random() - 0.5) * 30, mouseY + (Math.random() - 0.5) * 30);
                particles.push(p);
            }
        }
    });

    document.addEventListener('touchmove', (e) => {
        const touch = e.touches[0];
        mouseX = touch.clientX;
        mouseY = touch.clientY;
    });

    document.addEventListener('click', (e) => {
        for (let i = 0; i < 30; i++) {
            const angle = (Math.PI * 2 * i) / 30;
            const p = new Particle(e.clientX, e.clientY);
            p.vx = Math.cos(angle) * 5;
            p.vy = Math.sin(angle) * 5;
            p.radius = Math.random() * 4 + 2;
            particles.push(p);
        }
    });

    function drawBackground() {
        const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
        gradient.addColorStop(0, '#FAFBFF');
        gradient.addColorStop(0.5, '#F5F7FF');
        gradient.addColorStop(1, '#FAFBFF');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }

    function drawDecorations() {
        ctx.globalAlpha = 0.15;
        ctx.strokeStyle = '#E63E88';
        ctx.lineWidth = 2.5;
        
        const time = Date.now() * 0.0002;
        for (let i = 0; i < 5; i++) {
            const x = canvas.width * (0.2 + Math.sin(time + i) * 0.3);
            const y = canvas.height * (0.3 + Math.cos(time * 1.2 + i) * 0.3);
            const radius = 150 + Math.sin(time + i *