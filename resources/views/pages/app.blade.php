@extends('layouts.main')

@section('content')
<canvas id="interactive-bg" class="fixed inset-0 -z-10"></canvas>

<main class="min-h-screen p-6 pb-32">
    <div class="max-w-7xl mx-auto">
        <!-- Header Info -->
        <div class="grid grid-cols-3 gap-4 mb-8 z-10 relative">
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-4 border-2 border-[#384D95] shadow-lg">
                <p class="text-xs font-bold text-[#384D95] opacity-60">⏰ Waktu</p>
                <p id="currentTime" class="text-2xl font-black text-[#E63E88] font-mono">00:00:00</p>
            </div>
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-4 border-2 border-[#384D95] shadow-lg">
                <p class="text-xs font-bold text-[#384D95] opacity-60">📅 Tanggal</p>
                <p id="currentDate" class="text-lg font-black text-[#384D95]">Senin, 15 Jan 2024</p>
            </div>
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-4 border-2 border-[#384D95] shadow-lg">
                <p class="text-xs font-bold text-[#384D95] opacity-60">🎯 Metode Aktif</p>
                <p id="activeMethod" class="text-lg font-black text-[#E63E88]">Pilih Meja</p>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 z-10 relative">
            <!-- Main Room & Meja Selection -->
            <div class="lg:col-span-2">
                <!-- Timer Display -->
                <div id="timerSection" class="hidden bg-gradient-to-br from-[#E63E88] to-[#d42d74] rounded-3xl p-8 text-white mb-8 shadow-2xl border-4 border-white text-center">
                    <p class="text-sm opacity-80 mb-2 font-semibold">SESI FOKUS SEDANG BERJALAN</p>
                    <h2 id="mainTimer" class="text-7xl font-black font-mono mb-4">25:00</h2>
                    <div class="flex gap-4 justify-center">
                        <button id="pauseBtn" class="px-8 py-3 bg-white/20 hover:bg-white/30 rounded-xl font-bold transition-all">⏸ Jeda</button>
                        <button id="stopBtn" class="px-8 py-3 bg-white/20 hover:bg-white/30 rounded-xl font-bold transition-all">⏹ Hentikan</button>
                    </div>
                </div>

                <!-- Meja Selection (9 Grid) -->
                <div id="mejaSection" class="bg-white/90 backdrop-blur-sm rounded-3xl p-8 border-2 border-[#384D95] shadow-lg">
                    <h3 class="text-2xl font-black text-[#384D95] mb-6">Pilih Meja Belajarmu 🪑</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#C2E841]/20 to-[#A8D730]/10 border-3 border-[#C2E841] hover:shadow-lg hover:scale-105 transition-all text-center" data-meja="1">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 1</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>

                        <div class="meja-item meja-terisi cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#FF6519]/20 to-[#FFB84D]/10 border-3 border-[#FF6519] hover:shadow-lg transition-all text-center" data-meja="2">
                            <p class="text-3xl mb-2">👤</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 2</p>
                            <p class="text-xs text-[#384D95] opacity-70">Ada Orang</p>
                        </div>

                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#A492D4]/20 to-[#8B7BC4]/10 border-3 border-[#A492D4] hover:shadow-lg hover:scale-105 transition-all text-center" data-meja="3">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 3</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>

                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#C2E841]/20 to-[#A8D730]/10 border-3 border-[#C2E841] hover:shadow-lg hover:scale-105 transition-all text-center" data-meja="4">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 4</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>

                        <div class="meja-item meja-terisi cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#FF6519]/20 to-[#FFB84D]/10 border-3 border-[#FF6519] hover:shadow-lg transition-all text-center" data-meja="5">
                            <p class="text-3xl mb-2">👤</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 5</p>
                            <p class="text-xs text-[#384D95] opacity-70">Ada Orang</p>
                        </div>

                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#C2E841]/20 to-[#A8D730]/10 border-3 border-[#C2E841] hover:shadow-lg hover:scale-105 transition-all text-center" data-meja="6">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 6</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>

                        <div class="meja-item meja-terisi cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#FF6519]/20 to-[#FFB84D]/10 border-3 border-[#FF6519] hover:shadow-lg transition-all text-center" data-meja="7">
                            <p class="text-3xl mb-2">👤</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 7</p>
                            <p class="text-xs text-[#384D95] opacity-70">Ada Orang</p>
                        </div>

                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#A492D4]/20 to-[#8B7BC4]/10 border-3 border-[#A492D4] hover:shadow-lg hover:scale-105 transition-all text-center" data-meja="8">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 8</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>

                        <div class="meja-item meja-kosong cursor-pointer rounded-2xl p-6 bg-gradient-to-br from-[#C2E841]/20 to-[#A8D730]/10 border-3 border-[#C2E841] hover:shadow-lg hover:scale-105 transition-all text-center" data-meja="9">
                            <p class="text-3xl mb-2">🪑</p>
                            <p class="font-black text-[#384D95] text-sm">Meja 9</p>
                            <p class="text-xs text-[#384D95] opacity-70">Kosong</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="space-y-6">
                <!-- Metode Selection -->
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 border-2 border-[#384D95] shadow-lg">
                    <h4 class="text-lg font-black text-[#E63E88] mb-4">⏱ Pilih Metode</h4>
                    <div class="space-y-2">
                        <button onclick="selectMethod('pomodoro', 25)" class="w-full p-3 bg-[#E63E88]/10 border-2 border-[#E63E88] text-[#384D95] rounded-xl text-sm font-bold hover:bg-[#E63E88] hover:text-white transition-all">🍅 Pomodoro (25m)</button>
                        <button onclick="selectMethod('deep-work', 90)" class="w-full p-3 bg-[#384D95]/10 border-2 border-[#384D95] text-[#384D95] rounded-xl text-sm font-bold hover:bg-[#384D95] hover:text-white transition-all">🧠 Deep Work (90m)</button>
                        <button onclick="selectMethod('ultradian', 50)" class="w-full p-3 bg-[#A492D4]/10 border-2 border-[#A492D4] text-[#384D95] rounded-xl text-sm font-bold hover:bg-[#A492D4] hover:text-white transition-all">⚡ Ultradian (50m)</button>
                        <button onclick="selectMethod('marathon', 120)" class="w-full p-3 bg-[#FF6519]/10 border-2 border-[#FF6519] text-[#384D95] rounded-xl text-sm font-bold hover:bg-[#FF6519] hover:text-white transition-all">🏃 Marathon (120m)</button>
                        <button onclick="selectMethod('power-hour', 60)" class="w-full p-3 bg-[#C2E841]/10 border-2 border-[#C2E841] text-[#384D95] rounded-xl text-sm font-bold hover:bg-[#C2E841] hover:text-white transition-all">💪 Power Hour (60m)</button>
                        <button onclick="selectMethod('study-block', 180)" class="w-full p-3 bg-[#FFB84D]/10 border-2 border-[#FFB84D] text-[#384D95] rounded-xl text-sm font-bold hover:bg-[#FFB84D] hover:text-white transition-all">📚 Study Block (180m)</button>
                    </div>
                </div>

                <!-- Music Player -->
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 border-2 border-[#384D95] shadow-lg">
                    <h4 class="text-lg font-black text-[#E63E88] mb-4">🎵 Music</h4>
                    <input type="text" id="musicInput" placeholder="Link YouTube/Spotify..." class="w-full p-2 border-2 border-[#384D95] rounded-lg text-xs mb-3 focus:outline-none focus:ring-2 focus:ring-[#E63E88]">
                    <button onclick="loadMusic()" class="w-full p-2 bg-[#E63E88] text-white rounded-lg text-xs font-bold hover:bg-[#d42d74] transition-all">Putar Musik</button>
                    <div id="musicStatus" class="mt-3 text-xs text-[#384D95] text-center opacity-70">Musik siap dimainkan</div>
                </div>

                <!-- Games -->
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 border-2 border-[#384D95] shadow-lg">
                    <h4 class="text-lg font-black text-[#E63E88] mb-4">🎮 Games</h4>
                    <button onclick="startGame('memory')" class="w-full p-2 bg-[#E63E88]/10 border-2 border-[#E63E88] text-[#384D95] rounded-lg text-xs font-bold hover:bg-[#E63E88] hover:text-white transition-all mb-2">Memory Match</button>
                    <button onclick="startGame('2048')" class="w-full p-2 bg-[#384D95]/10 border-2 border-[#384D95] text-[#384D95] rounded-lg text-xs font-bold hover:bg-[#384D95] hover:text-white transition-all mb-2">2048 Game</button>
                    <button onclick="startGame('breathing')" class="w-full p-2 bg-[#A492D4]/10 border-2 border-[#A492D4] text-[#384D95] rounded-lg text-xs font-bold hover:bg-[#A492D4] hover:text-white transition-all">Breathing</button>
                </div>

                <!-- To-Do List -->
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 border-2 border-[#384D95] shadow-lg">
                    <h4 class="text-lg font-black text-[#E63E88] mb-4">📝 To-Do</h4>
                    <div id="todoList" class="space-y-2 mb-3 max-h-32 overflow-y-auto"></div>
                    <div class="flex gap-2">
                        <input type="text" id="todoInput" placeholder="Tulis task..." class="flex-1 p-2 border-2 border-[#384D95] rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-[#E63E88]">
                        <button onclick="addTodo()" class="p-2 bg-[#E63E88] text-white rounded-lg font-bold hover:bg-[#d42d74] transition-all">+</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Game Modal -->
<div id="gameModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 backdrop-blur-sm">
    <div class="bg-white rounded-3xl p-8 max-w-2xl w-full mx-4 max-h-96 overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <h2 id="gameTitle" class="text-2xl font-black text-[#384D95]">Game Title</h2>
            <button onclick="closeGame()" class="text-2xl font-bold text-[#E63E88]">✕</button>
        </div>
        <div id="gameContent" class="min-h-48"></div>
    </div>
</div>

<style>
    @keyframes fadeInScale {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.02); }
    }

    .meja-item {
        animation: fadeInScale 0.4s ease-out;
    }

    .meja-selected {
        animation: pulse 0.6s ease-out;
        background: linear-gradient(135deg, #E63E88 0%, #d42d74 100%) !important;
        color: white !important;
        border-color: white !important;
    }

    .meja-selected p {
        color: white !important;
    }

    #gameModal.show {
        display: flex !important;
        animation: fadeInScale 0.3s ease-out;
    }

    .memory-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 8px;
    }

    .memory-card {
        aspect-ratio: 1;
        background: linear-gradient(135deg, #E63E88, #d42d74);
        border-radius: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .memory-card:hover {
        transform: scale(1.05);
    }

    .memory-card.flipped {
        background: linear-gradient(135deg, #384D95, #2a3a6a);
    }
</style>

<script>
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
        const year = now.getFullYear();
        document.getElementById('currentDate').textContent = `${dayName}, ${date} ${month} ${year}`;
    }
    updateTimeDate();
    setInterval(updateTimeDate, 1000);

    // ===== METODE & TIMER =====
    let selectedMethod = null;
    let selectedDuration = 0;
    let timeRemaining = 0;
    let timerInterval = null;
    let isRunning = false;

    const methodNames = {
        'pomodoro': '🍅 Pomodoro',
        'deep-work': '🧠 Deep Work',
        'ultradian': '⚡ Ultradian',
        'marathon': '🏃 Marathon',
        'power-hour': '💪 Power Hour',
        'study-block': '📚 Study Block'
    };

    function selectMethod(method, duration) {
        selectedMethod = method;
        selectedDuration = duration * 60;
        document.getElementById('activeMethod').textContent = methodNames[method];
        alert(`${methodNames[method]} dipilih! Sekarang pilih meja kosong untuk memulai.`);
    }

    function startTimer() {
        if (isRunning) return;
        isRunning = true;
        timeRemaining = selectedDuration;
        
        timerInterval = setInterval(() => {
            timeRemaining--;
            updateTimerDisplay();
            
            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                isRunning = false;
                alert('⏰ Waktu sesi selesai! Istirahat dulu yuk! 🎉');
                resetTimer();
            }
        }, 1000);
    }

    function updateTimerDisplay() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        document.getElementById('mainTimer').textContent = 
            `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }

    function pauseTimer() {
        if (isRunning) {
            clearInterval(timerInterval);
            isRunning = false;
            document.getElementById('pauseBtn').textContent = '▶ Lanjut';
        } else {
            startTimer();
            document.getElementById('pauseBtn').textContent = '⏸ Jeda';
        }
    }

    function stopTimer() {
        clearInterval(timerInterval);
        isRunning = false;
        resetTimer();
    }

    function resetTimer() {
        document.getElementById('timerSection').classList.add('hidden');
        document.getElementById('mejaSection').classList.remove('hidden');
        selectedMethod = null;
        document.getElementById('activeMethod').textContent = 'Pilih Meja';
    }

    // ===== MEJA SELECTION =====
    document.querySelectorAll('.meja-item').forEach(meja => {
        meja.addEventListener('click', () => {
            if (!meja.classList.contains('meja-terisi') && selectedMethod) {
                document.querySelectorAll('.meja-item').forEach(m => m.classList.remove('meja-selected'));
                meja.classList.add('meja-selected');
                document.getElementById('mejaSection').classList.add('hidden');
                document.getElementById('timerSection').classList.remove('hidden');
                startTimer();
            }
        });
    });

    document.getElementById('pauseBtn').addEventListener('click', pauseTimer);
    document.getElementById('stopBtn').addEventListener('click', stopTimer);

    // ===== MUSIC PLAYER =====
    function loadMusic() {
        const link = document.getElementById('musicInput').value;
        if (link) {
            document.getElementById('musicStatus').textContent = '🎵 Musik sedang diputar...';
        }
    }

    // ===== GAMES =====
    function startGame(game) {
        const modal = document.getElementById('gameModal');
        const content = document.getElementById('gameContent');
        const title = document.getElementById('gameTitle');

        if (game === 'memory') {
            title.textContent = '🧠 Memory Match Game';
            content.innerHTML = createMemoryGame();
        } else if (game === '2048') {
            title.textContent = '🎮 2048 Game';
            content.innerHTML = create2048Game();
        } else if (game === 'breathing') {
            title.textContent = '🌬 Breathing Exercise';
            content.innerHTML = createBreathingGame();
        }

        modal.classList.add('show');
    }

    function closeGame() {
        document.getElementById('gameModal').classList.remove('show');
    }

    // Memory Match Game
    function createMemoryGame() {
        const emojis = ['🍎', '🍎', '🍊', '🍊', '🍋', '🍋', '🍌', '🍌'];
        let shuffled = emojis.sort(() => Math.random() - 0.5);
        let html = '<div class="memory-grid">';
        
        shuffled.forEach((emoji, idx) => {
            html += `<div class="memory-card" onclick="flipCard(this, '${emoji}')">${emoji}</div>`;
        });
        
        html += '</div><p class="text-center mt-4 text-sm text-[#384D95] font-semibold">Cocokkan pasangan emoji! 🎯</p>';
        return html;
    }

    function flipCard(el, emoji) {
        if (!el.classList.contains('flipped')) {
            el.textContent = emoji;
            el.classList.add('flipped');
        }
    }

    // 2048 Game
    function create2048Game() {
        return `
            <div class="grid grid-cols-4 gap-2 mb-4">
                <div class="bg-[#E63E88] text-white p-6 rounded-lg text-center font-black text-2xl">2</div>
                <div class="bg-[#384D95] text-white p-6 rounded-lg text-center font-black text-2xl">4</div>
                <div class="bg-[#A492D4] text-white p-6 rounded-lg text-center font-black text-2xl">8</div>
                <div class="bg-[#FF6519] text-white p-6 rounded-lg text-center font-black text-2xl">16</div>
            </div>
            <p class="text-center text-sm text-[#384D95] font-semibold">Gunakan arrow keys untuk geser tiles! 🎮</p>
            <p class="text-center text-xs text-[#384D95] opacity-70 mt-2">Gabungkan tiles untuk mencapai 2048!</p>
        `;
    }

    // Breathing Exercise
    function createBreathingGame() {
        return `
            <div class="text-center">
                <div class="w-40 h-40 mx-auto mb-6 bg-gradient-to-br from-[#E63E88] to-[#d42d74] rounded-full flex items-center justify-center text-4xl animate-pulse">
                    💨
                </div>
                <h3 class="text-xl font-black text-[#384D95] mb-3">Latihan Pernapasan</h3>
                <p id="breathingText" class="text-lg font-bold text-[#E63E88] mb-4">Tarik napas... (4 detik)</p>
                <button onclick="closeGame()" class="px-6 py-2 bg-[#384D95] text-white rounded-lg font-bold">Selesai</button>
            </div>
        `;
    }

    // ===== TO-DO LIST =====
    let todos = [];

    function addTodo() {
        const input = document.getElementById('todoInput');
        if (input.value.trim()) {
            todos.push({
                id: Date.now(),
                text: input.value,
                done: false
            });
            input.value = '';
            renderTodos();
        }
    }

    function renderTodos() {
        const list = document.getElementById('todoList');
        list.innerHTML = '';
        todos.forEach(todo => {
            const item = document.createElement('div');
            item.className = 'flex items-center gap-2 p-2 bg-[#384D95]/10 rounded-lg';
            item.innerHTML = `
                <input type="checkbox" ${todo.done ? 'checked' : ''} onchange="toggleTodo(${todo.id})" class="w-4 h-4 accent-[#E63E88]">
                <span class="flex-1 text-xs text-[#384D95] ${todo.done ? 'line-through opacity-50' : ''}">${todo.text}</span>
                <button onclick="deleteTodo(${todo.id})" class="text-xs text-red-500 font-bold">✕</button>
            `;
            list.appendChild(item);
        });
    }

    function toggleTodo(id) {
        todos = todos.map(t => t.id === id ? {...t, done: !t.done} : t);
        renderTodos();
    }

    function deleteTodo(id) {
        todos = todos.filter(t => t.id !== id);
        renderTodos();
    }

    document.getElementById('todoInput').addEventListener('keypress', (e) => {
        if (e.key === 'Enter') addTodo();
    });

    // Canvas background (dari file asli)
    const canvas = document.getElementById('interactive-bg');
    const ctx = canvas.getContext('2d');
    const colors = ['#FFFFFF', '#E63E88', '#384D95', '#F0F0F5'];

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    // Interactive Canvas Background dengan Cursor Following Effect
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

    // Particle untuk effect
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
        
        if (Math.random() > 0.7) {
            for (let i = 0; i < 2; i++) {
                const p = new Particle(mouseX + (Math.random() - 0.5) * 30, mouseY + (Math.random() - 0.5) * 30);
                particles.push(p);
            }
        }
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
            const radius = 150 + Math.sin(time + i * 2) * 80;
            ctx.beginPath();
            ctx.arc(x, y, radius, 0, Math.PI * 2);
            ctx.stroke();
        }
        ctx.globalAlpha = 1;
    }

    function animate() {
        drawBackground();
        drawDecorations();

        liquidBlobs.forEach(blob => {
            blob.update(mouseX, mouseY);
            blob.draw();
        });

        for (let i = particles.length - 1; i >= 0; i--) {
            particles[i].update();
            particles[i].draw();

            if (particles[i].life <= 0) {
                particles.splice(i, 1);
            }
        }

        ctx.globalAlpha = 0.05;
        ctx.strokeStyle = '#E63E88';
        ctx.lineWidth = 1;
        for (let i = 0; i < liquidBlobs.length; i++) {
            for (let j = i + 1; j < liquidBlobs.length; j++) {
                const dx = liquidBlobs[i].x - liquidBlobs[j].x;
                const dy = liquidBlobs[i].y - liquidBlobs[j].y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 250) {
                    ctx.beginPath();
                    ctx.moveTo(liquidBlobs[i].x, liquidBlobs[i].y);
                    ctx.lineTo(liquidBlobs[j].x, liquidBlobs[j].y);
                    ctx.stroke();
                }
            }
        }
        ctx.globalAlpha = 1;

        requestAnimationFrame(animate);
    }

    animate();
</script>

@endsection