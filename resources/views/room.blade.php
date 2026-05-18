@extends('layouts.app')

@section('title', 'Ruang Belajar Virtual - Zonera')

@section('content')
<div style="padding: 0 2rem;">
    <h1 style="margin-bottom: 1.5rem; text-align: center;">Ruang Belajar Virtual Anda</h1>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; margin-bottom: 2rem;">
        <!-- Main Study Room Area -->
        <div>
            <!-- Study Room Grid -->
            <div class="study-room fade-in-up">
                <div class="room-desks-grid">
                    <div class="desk-card" onclick="selectDesk(this, 1)">
                        <div style="font-size: 2rem; margin-bottom: 8px;">📚</div>
                        <p>Meja 1</p>
                    </div>
                    <div class="desk-card" onclick="selectDesk(this, 2)">
                        <div style="font-size: 2rem; margin-bottom: 8px;">🎯</div>
                        <p>Meja 2</p>
                    </div>
                    <div class="desk-card occupied">
                        <div class="avatar-mini"></div>
                        <div class="desk-lamp-small"></div>
                        <p style="font-size: 0.75rem;">Sedang Belajar</p>
                    </div>
                    <div class="desk-card" onclick="selectDesk(this, 3)">
                        <div style="font-size: 2rem; margin-bottom: 8px;">☕</div>
                        <p>Meja 4</p>
                    </div>
                    <div class="desk-card" onclick="selectDesk(this, 5)">
                        <div style="font-size: 2rem; margin-bottom: 8px;">🌊</div>
                        <p>Meja 5</p>
                    </div>
                    <div class="desk-card" onclick="selectDesk(this, 6)">
                        <div style="font-size: 2rem; margin-bottom: 8px;">🌙</div>
                        <p>Meja 6</p>
                    </div>
                </div>
            </div>

            <!-- Selected Desk Info -->
            <div id="desk-info" style="display: none; background-color: var(--surface-secondary); border-radius: 12px; padding: 1.5rem; margin-top: 2rem; border: 2px solid var(--accent-dark);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h2 id="selected-desk-name" style="color: var(--accent-dark); margin: 0; font-size: 1.5rem;"></h2>
                    <button onclick="deselectDesk()" class="btn btn-outline" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">Ganti Meja</button>
                </div>
                <p id="selected-desk-vibe" style="color: var(--text-secondary); margin-bottom: 1rem;"></p>
                <div style="display: flex; gap: 12px;">
                    <button class="btn btn-dark" onclick="startStudySession()">Mulai Belajar</button>
                </div>
            </div>
        </div>

        <!-- Sidebar Controls -->
        <div>
            <!-- Method Selection -->
            <div class="card" style="margin-bottom: 1.5rem;">
                <h3 style="margin-bottom: 1rem; color: var(--accent-dark);">📚 Metode Belajar</h3>
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <button class="method-btn" onclick="setMethod('pomodoro', this)">Pomodoro (25/5)</button>
                    <button class="method-btn" onclick="setMethod('flowtime', this)">Flowtime</button>
                    <button class="method-btn" onclick="setMethod('50-10', this)">50/10 Method</button>
                </div>
                <p id="selected-method" style="font-size: 0.85rem; color: var(--text-secondary); margin-top: 1rem; text-align: center;">Belum ada metode dipilih</p>
            </div>

            <!-- Background Selection -->
            <div class="card" style="margin-bottom: 1.5rem;">
                <h3 style="margin-bottom: 1rem; color: var(--accent-dark);">🎨 Suasana</h3>
                <div style="display: grid; grid-template-columns: 2fr 2fr; gap: 8px;">
                    <button class="mood-btn active" onclick="setMood('rainy', this)" title="Hujan">🌧️</button>
                    <button class="mood-btn" onclick="setMood('night', this)" title="Malam">🌙</button>
                    <button class="mood-btn" onclick="setMood('cafe', this)" title="Cafe">☕</button>
                    <button class="mood-btn" onclick="setMood('forest', this)" title="Hutan">🌲</button>
                </div>
                <p id="selected-mood" style="font-size: 0.85rem; color: var(--text-secondary); margin-top: 1rem; text-align: center;">Hujan dipilih</p>
            </div>
        </div>
    </div>

    <!-- Study Session Area (Hidden until desk is selected) -->
    <div id="study-session" style="display: none;">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
            <!-- Main Session Content -->
            <div>
                <!-- Timer & Controls -->
                <div class="control-panel fade-in-up">
                    <div style="text-align: center;">
                        <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.5rem;">Waktu Fokus</p>
                        <div class="timer-display" id="timer-display">25:00</div>
                        <div class="control-buttons">
                            <button class="btn btn-dark" onclick="startTimer()">Mulai</button>
                            <button class="btn btn-outline" onclick="pauseTimer()">Jeda</button>
                            <button class="btn btn-outline" onclick="stopTimer()">Hentikan</button>
                        </div>
                    </div>
                </div>

                <!-- Music Player -->
                <div class="music-player fade-in-up" style="margin-top: 1.5rem;">
                    <div class="player-header">🎵 Musik Latar</div>
                    <input type="text" id="music-url" class="music-input" 
                        placeholder="Masukkan URL musik (YouTube, Spotify, SoundCloud, dsb)"
                        onkeypress="handleMusicInput(event)">
                    <div style="font-size: 0.8rem; color: var(--text-secondary); margin-top: 0.5rem;">
                        Tekan Enter untuk memutar atau gunakan kontrol audio di bawah
                    </div>
                    <audio id="music-player" controls style="width: 100%; margin-top: 0.8rem;"></audio>
                </div>

                <!-- Games Section -->
                <div class="game-section fade-in-up" style="margin-top: 1.5rem;">
                    <h3 style="color: var(--accent-dark); margin-bottom: 1rem;">🎮 Game Santai</h3>
                    <p style="font-size: 0.9rem; color: var(--text-secondary); margin-bottom: 1rem;">
                        Mainkan game kecil saat istirahat untuk refresh otak
                    </p>
                    <div class="game-options">
                        <button class="game-btn" onclick="startGame('tic-tac-toe')">
                            <div style="font-size: 1.5rem; margin-bottom: 0.4rem;">⭕</div>
                            Tic-Tac-Toe
                        </button>
                        <button class="game-btn" onclick="startGame('memory')">
                            <div style="font-size: 1.5rem; margin-bottom: 0.4rem;">🧠</div>
                            Memory Game
                        </button>
                        <button class="game-btn" onclick="startGame('2048')">
                            <div style="font-size: 1.5rem; margin-bottom: 0.4rem;">🔢</div>
                            2048
                        </button>
                    </div>
                    <div id="game-area" style="display: none; margin-top: 1.5rem; padding: 1rem; background-color: var(--bg-secondary); border-radius: 8px;">
                        <div id="game-content"></div>
                        <button class="btn btn-outline" style="width: 100%; margin-top: 1rem;" onclick="closeGame()">Kembali</button>
                    </div>
                </div>

                <!-- Todo List -->
                <div class="todo-section fade-in-up" style="margin-top: 1.5rem;">
                    <h3 style="color: var(--accent-dark); margin-bottom: 1rem;">✓ To-Do List Belajar</h3>
                    <div class="todo-list" id="todo-list"></div>
                    <div style="display: flex; gap: 8px; margin-top: 1rem;">
                        <input type="text" id="todo-input" class="todo-input" placeholder="Tambah tugas baru..." 
                            style="padding: 0.8rem 1rem; border: 1px solid var(--border-light); border-radius: 8px; background-color: var(--bg-main); color: var(--text-primary); flex: 1;">
                        <button class="btn btn-dark" onclick="addTodo()" style="padding: 0.8rem 1.2rem;">Tambah</button>
                    </div>
                </div>
            </div>

            <!-- Session Sidebar -->
            <div>
                <!-- Session Info -->
                <div class="card" style="margin-bottom: 1.5rem;">
                    <h3 style="color: var(--accent-dark); margin-bottom: 1rem;">ℹ️ Info Sesi</h3>
                    <div style="font-size: 0.9rem;">
                        <div style="margin-bottom: 1rem;">
                            <p style="color: var(--text-secondary); font-size: 0.85rem; margin: 0 0 0.3rem 0;">Meja Dipilih</p>
                            <p id="session-desk" style="font-weight: 600; color: var(--text-primary); margin: 0;"></p>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <p style="color: var(--text-secondary); font-size: 0.85rem; margin: 0 0 0.3rem 0;">Metode</p>
                            <p id="session-method" style="font-weight: 600; color: var(--text-primary); margin: 0;">-</p>
                        </div>
                        <div>
                            <p style="color: var(--text-secondary); font-size: 0.85rem; margin: 0 0 0.3rem 0;">Suasana</p>
                            <p id="session-mood" style="font-weight: 600; color: var(--text-primary); margin: 0;">-</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="card">
                    <h3 style="color: var(--accent-dark); margin-bottom: 1rem;">📊 Statistik</h3>
                    <div style="font-size: 0.9rem;">
                        <div style="margin-bottom: 0.8rem; padding-bottom: 0.8rem; border-bottom: 1px solid var(--border-light);">
                            <p style="color: var(--text-secondary); font-size: 0.85rem; margin: 0 0 0.2rem 0;">Durasi Fokus</p>
                            <p id="total-focus" style="font-weight: 600; color: var(--text-primary); margin: 0; font-size: 1.2rem;">0 min</p>
                        </div>
                        <div style="margin-bottom: 0.8rem; padding-bottom: 0.8rem; border-bottom: 1px solid var(--border-light);">
                            <p style="color: var(--text-secondary); font-size: 0.85rem; margin: 0 0 0.2rem 0;">Tugas Selesai</p>
                            <p id="tasks-completed" style="font-weight: 600; color: var(--text-primary); margin: 0; font-size: 1.2rem;">0</p>
                        </div>
                        <div>
                            <button class="btn btn-dark" style="width: 100%; font-size: 0.85rem; padding: 0.6rem;" onclick="endSession()">
                                Selesaikan Sesi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Session Modal -->
<div id="end-session-modal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.7); z-index: 1000; padding: 20px; display: flex; align-items: center; justify-content: center;">
    <div style="background-color: var(--bg-main); border-radius: 16px; padding: 2rem; max-width: 600px; width: 100%; text-align: center;">
        <h2 style="color: var(--accent-dark); margin-bottom: 1rem;">🎉 Mantap! Sesi Belajarmu Selesai</h2>
        <p style="color: var(--text-secondary); margin-bottom: 1.5rem; font-size: 1rem;">
            Kamu telah fokus selama <strong id="modal-duration">0 menit</strong>. 
            Pertahankan konsistensi ini dan lihat pertumbuhanmu!
        </p>
        
        <div style="background-color: var(--surface-secondary); border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; text-align: left;">
            <h3 style="color: var(--accent-dark); margin-bottom: 1rem; font-size: 1rem;">📝 Apa yang sudah kamu kerjain?</h3>
            <div id="modal-todos" style="margin-bottom: 1rem;"></div>
            <input type="text" id="modal-new-todo" class="todo-input" placeholder="Tambah tugas yang baru selesai..." 
                style="width: 100%; padding: 0.8rem 1rem; border: 1px solid var(--border-light); border-radius: 8px; background-color: var(--bg-main); color: var(--text-primary);">
        </div>

        <div style="display: flex; gap: 12px;">
            <button class="btn btn-dark" style="flex: 1;" onclick="newSession()">Mulai Sesi Baru</button>
            <button class="btn btn-outline" style="flex: 1;" onclick="closeEndModal()">Kembali ke Halaman Utama</button>
        </div>
    </div>
</div>

<style>
.method-btn {
    padding: 0.8rem;
    border: 1px solid var(--border-light);
    background-color: var(--bg-main);
    border-radius: 8px;
    cursor: pointer;
    font-weight: 500;
    color: var(--text-primary);
    transition: all 0.3s ease;
    font-size: 0.9rem;
}

.method-btn:hover {
    border-color: var(--accent-dark);
    background-color: var(--surface-secondary);
}

.method-btn.active {
    background-color: var(--accent-dark);
    color: var(--bg-main);
    border-color: var(--accent-dark);
}

.mood-btn {
    padding: 0.8rem;
    background-color: var(--bg-main);
    border: 2px solid var(--border-light);
    border-radius: 8px;
    cursor: pointer;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.mood-btn:hover {
    border-color: var(--accent-dark);
    transform: scale(1.05);
}

.mood-btn.active {
    background-color: var(--accent-dark);
    border-color: var(--accent-dark);
}
</style>

<script src="{{ asset('js/room.js') }}"></script>
@endsection
