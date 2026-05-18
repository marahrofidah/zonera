// ==================== VIRTUAL ROOM LOGIC ====================

let selectedDesk = null;
let selectedMethod = null;
let selectedMood = 'rainy';
let timerInterval = null;
let timeRemaining = 1500; // 25 minutes in seconds
let totalFocusTime = 0;
let isRunning = false;
let todos = [];

// ==================== DESK SELECTION ====================
function selectDesk(element, deskNumber) {
    if (element.classList.contains('occupied')) {
        alert('Meja ini sedang digunakan. Silakan pilih meja lain.');
        return;
    }

    // Remove previous selection
    document.querySelectorAll('.desk-card').forEach(card => {
        card.style.borderColor = '';
    });

    // Add selection
    element.style.borderColor = 'var(--accent-dark)';
    element.style.boxShadow = '0 0 0 3px var(--surface-secondary)';
    
    selectedDesk = {
        number: deskNumber,
        element: element
    };

    // Show desk info
    const deskNames = {
        1: 'Meja 1 - Terang & Nyaman',
        2: 'Meja 2 - Fokus Penuh',
        3: 'Meja 4 - Suasana Cafe',
        5: 'Meja 5 - Berombang',
        6: 'Meja 6 - Malam Tenang'
    };

    const vibes = {
        1: '📚 Tempat yang sempurna untuk pembelajaran terstruktur',
        2: '🎯 Ruangan yang dirancang untuk konsentrasi maksimal',
        3: '☕ Suasana hangat dengan buzz ringan motivasi',
        5: '🌊 Suara ombak yang menenangkan dan ritmik',
        6: '🌙 Kegelapan yang nyaman dengan cahaya lembut'
    };

    document.getElementById('desk-info').style.display = 'block';
    document.getElementById('selected-desk-name').textContent = deskNames[deskNumber];
    document.getElementById('selected-desk-vibe').textContent = vibes[deskNumber];
}

function deselectDesk() {
    if (selectedDesk) {
        selectedDesk.element.style.borderColor = '';
        selectedDesk.element.style.boxShadow = '';
    }
    selectedDesk = null;
    document.getElementById('desk-info').style.display = 'none';
    document.getElementById('study-session').style.display = 'none';
}

// ==================== METHOD SELECTION ====================
function setMethod(method, button) {
    selectedMethod = method;
    
    // Remove previous active
    document.querySelectorAll('.method-btn').forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');

    // Update timer based on method
    const methods = {
        'pomodoro': 25 * 60,
        'flowtime': 45 * 60,
        '50-10': 50 * 60
    };

    timeRemaining = methods[method];
    updateTimerDisplay();

    // Update selected method display
    const methodNames = {
        'pomodoro': 'Pomodoro (25 min)',
        'flowtime': 'Flowtime (45 min)',
        '50-10': '50/10 Method (50 min)'
    };
    
    document.getElementById('selected-method').textContent = '✓ ' + methodNames[method];
}

// ==================== MOOD SELECTION ====================
function setMood(mood, button) {
    selectedMood = mood;
    
    // Remove previous active
    document.querySelectorAll('.mood-btn').forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');

    const moodNames = {
        'rainy': 'Hujan Menenangkan 🌧️',
        'night': 'Malam Tenang 🌙',
        'cafe': 'Kafe Hangat ☕',
        'forest': 'Hutan Sejuk 🌲'
    };

    document.getElementById('selected-mood').textContent = moodNames[mood];
}

// ==================== START STUDY SESSION ====================
function startStudySession() {
    if (!selectedMethod) {
        alert('Pilih metode belajar terlebih dahulu!');
        return;
    }

    document.getElementById('study-session').style.display = 'block';
    document.getElementById('desk-info').style.display = 'none';

    // Update session info
    document.getElementById('session-desk').textContent = 'Meja ' + selectedDesk.number;
    document.getElementById('session-method').textContent = selectedMethod.toUpperCase();
    document.getElementById('session-mood').textContent = selectedMood;

    // Initialize todo list
    loadTodos();

    // Scroll to session area
    document.getElementById('study-session').scrollIntoView({ behavior: 'smooth' });
}

// ==================== TIMER FUNCTIONS ====================
function updateTimerDisplay() {
    const minutes = Math.floor(timeRemaining / 60);
    const seconds = timeRemaining % 60;
    document.getElementById('timer-display').textContent = 
        String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
}

function startTimer() {
    if (isRunning) return;
    
    isRunning = true;
    
    timerInterval = setInterval(() => {
        if (timeRemaining > 0) {
            timeRemaining--;
            updateTimerDisplay();
        } else {
            finishFocusSession();
        }
    }, 1000);
}

function pauseTimer() {
    isRunning = false;
    if (timerInterval) {
        clearInterval(timerInterval);
        timerInterval = null;
    }
}

function stopTimer() {
    pauseTimer();
    
    const methods = {
        'pomodoro': 25 * 60,
        'flowtime': 45 * 60,
        '50-10': 50 * 60
    };
    
    timeRemaining = methods[selectedMethod];
    updateTimerDisplay();
}

function finishFocusSession() {
    pauseTimer();
    
    // Calculate focus time
    const methods = {
        'pomodoro': 25 * 60,
        'flowtime': 45 * 60,
        '50-10': 50 * 60
    };
    
    const focusMinutes = Math.floor(methods[selectedMethod] / 60);
    totalFocusTime += focusMinutes;
    
    // Update stats
    document.getElementById('total-focus').textContent = totalFocusTime + ' min';
    
    // Show completion message
    showFocusCompleteMessage();
    
    // Reset timer
    timeRemaining = methods[selectedMethod];
    updateTimerDisplay();
}

function showFocusCompleteMessage() {
    const messages = [
        '🎉 Sesi fokus selesai! Istirahat sebentar.',
        '✨ Luar biasa! Kamu tetap fokus!',
        '💪 Terus semangat! Pertumbuhan membutuhkan konsistensi!',
        '🌟 Mantap! Otak mu sedang berkembang!'
    ];
    
    const randomMessage = messages[Math.floor(Math.random() * messages.length)];
    alert(randomMessage + '\n\nWaktu istirahat dimulai.');
}

// ==================== MUSIC PLAYER ====================
function handleMusicInput(event) {
    if (event.key === 'Enter') {
        const url = document.getElementById('music-url').value;
        if (url) {
            const player = document.getElementById('music-player');
            
            // Handle different music platforms
            let embeddedUrl = url;
            
            // YouTube
            if (url.includes('youtube.com') || url.includes('youtu.be')) {
                const videoId = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?]+)/)?.[1];
                if (videoId) {
                    embeddedUrl = `https://www.youtube.com/embed/${videoId}`;
                }
            }
            
            // For audio sources
            if (url.match(/\.(mp3|wav|ogg|m4a)$/i) || url.includes('spotify') || url.includes('soundcloud')) {
                player.src = url;
                player.load();
            }
            
            event.preventDefault();
        }
    }
}

// ==================== GAME FUNCTIONS ====================
function startGame(gameName) {
    document.getElementById('game-area').style.display = 'block';
    const gameContent = document.getElementById('game-content');
    gameContent.innerHTML = '';

    if (gameName === 'tic-tac-toe') {
        initTicTacToe(gameContent);
    } else if (gameName === 'memory') {
        initMemoryGame(gameContent);
    } else if (gameName === '2048') {
        initSimple2048(gameContent);
    }
}

function closeGame() {
    document.getElementById('game-area').style.display = 'none';
}

// Tic Tac Toe Game
function initTicTacToe(container) {
    const board = ['', '', '', '', '', '', '', '', ''];
    let currentPlayer = 'X';
    
    const html = `
        <div style="text-align: center;">
            <h3 style="margin-bottom: 1rem;">Tic Tac Toe</h3>
            <div style="display: grid; grid-template-columns: repeat(3, 80px); gap: 8px; margin: 0 auto 1rem;">
                ${board.map((_, i) => `<button class="tictactoe-cell" onclick="playTicTacToe(${i})" style="width: 80px; height: 80px; font-size: 1.5rem; font-weight: bold; background-color: var(--surface-primary); border: 2px solid var(--accent-brown); cursor: pointer; border-radius: 4px;">${board[i]}</button>`).join('')}
            </div>
            <button class="btn btn-outline" onclick="initTicTacToe(document.getElementById('game-content'))">Ulangi</button>
        </div>
    `;
    
    container.innerHTML = html;
}

function playTicTacToe(index) {
    // Simple tic-tac-toe logic
    const cells = document.querySelectorAll('.tictactoe-cell');
    if (cells[index].textContent === '') {
        cells[index].textContent = 'X';
    }
}

// Memory Game
function initMemoryGame(container) {
    const cards = ['🌟', '🎨', '🎵', '🎭', '🌟', '🎨', '🎵', '🎭'];
    const shuffled = cards.sort(() => Math.random() - 0.5);
    
    const html = `
        <div style="text-align: center;">
            <h3 style="margin-bottom: 1rem;">Memory Game</h3>
            <div style="display: grid; grid-template-columns: repeat(4, 60px); gap: 8px; margin: 0 auto 1rem;">
                ${shuffled.map((card, i) => `<button class="memory-card" onclick="flipCard(this)" data-card="${card}" style="width: 60px; height: 60px; font-size: 1.5rem; background-color: var(--surface-primary); border: 2px solid var(--accent-brown); cursor: pointer; border-radius: 4px;">?</button>`).join('')}
            </div>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Cari pasangan kartu yang sama!</p>
        </div>
    `;
    
    container.innerHTML = html;
}

function flipCard(element) {
    if (element.textContent === '?') {
        element.textContent = element.dataset.card;
    } else {
        element.textContent = '?';
    }
}

// Simple 2048
function initSimple2048(container) {
    const html = `
        <div style="text-align: center;">
            <h3 style="margin-bottom: 1rem;">2048 Mini</h3>
            <div style="display: grid; grid-template-columns: repeat(3, 70px); gap: 8px; margin: 0 auto 1rem; background-color: var(--surface-secondary); padding: 8px; border-radius: 8px;">
                ${[2, 4, 8, 16, 32, 64, 128, 256, 512].map(num => `<div style="width: 70px; height: 70px; background-color: var(--surface-primary); border-radius: 4px; display: flex; align-items: center; justify-content: center; font-weight: bold; color: var(--accent-dark);">${num}</div>`).join('')}
            </div>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Kombinasikan angka untuk mencapai 2048!</p>
        </div>
    `;
    
    container.innerHTML = html;
}

// ==================== TODO LIST ====================
function addTodo() {
    const input = document.getElementById('todo-input');
    const text = input.value.trim();
    
    if (text === '') return;
    
    const todo = {
        id: Date.now(),
        text: text,
        completed: false
    };
    
    todos.push(todo);
    input.value = '';
    loadTodos();
}

function loadTodos() {
    const todoList = document.getElementById('todo-list');
    const modalTodos = document.getElementById('modal-todos');
    
    todoList.innerHTML = todos.map(todo => `
        <div class="todo-item" ${todo.completed ? 'style="opacity: 0.6;"' : ''}>
            <input type="checkbox" class="todo-checkbox" ${todo.completed ? 'checked' : ''} 
                onchange="toggleTodo(${todo.id})">
            <span class="todo-input" style="flex: 1; text-align: left; ${todo.completed ? 'text-decoration: line-through;' : ''}">${todo.text}</span>
            <button class="todo-delete" onclick="deleteTodo(${todo.id})">✕</button>
        </div>
    `).join('');
    
    // Update modal todos too if it exists
    if (modalTodos) {
        const completedTodos = todos.filter(t => t.completed);
        modalTodos.innerHTML = completedTodos.map(todo => `
            <div class="todo-item" style="opacity: 1;">
                <input type="checkbox" class="todo-checkbox" checked disabled>
                <span style="flex: 1; text-align: left; text-decoration: line-through;">${todo.text}</span>
            </div>
        `).join('');
    }
    
    // Update completed count
    const completedCount = todos.filter(t => t.completed).length;
    document.getElementById('tasks-completed').textContent = completedCount;
}

function toggleTodo(id) {
    const todo = todos.find(t => t.id === id);
    if (todo) {
        todo.completed = !todo.completed;
        loadTodos();
    }
}

function deleteTodo(id) {
    todos = todos.filter(t => t.id !== id);
    loadTodos();
}

// ==================== SESSION MANAGEMENT ====================
function endSession() {
    if (!isRunning && totalFocusTime === 0) {
        alert('Mulai sesi belajar terlebih dahulu!');
        return;
    }

    pauseTimer();
    
    document.getElementById('modal-duration').textContent = totalFocusTime + ' menit';
    document.getElementById('end-session-modal').style.display = 'flex';
    loadTodos();
}

function closeEndModal() {
    document.getElementById('end-session-modal').style.display = 'none';
    newSession();
}

function newSession() {
    // Reset all
    totalFocusTime = 0;
    todos = [];
    selectedMethod = null;
    selectedDesk = null;
    
    // Reset UI
    document.getElementById('study-session').style.display = 'none';
    document.getElementById('desk-info').style.display = 'none';
    document.getElementById('end-session-modal').style.display = 'none';
    document.getElementById('total-focus').textContent = '0 min';
    document.getElementById('tasks-completed').textContent = '0';
    document.querySelectorAll('.desk-card').forEach(card => {
        card.style.borderColor = '';
        card.style.boxShadow = '';
    });
    document.querySelectorAll('.method-btn').forEach(btn => btn.classList.remove('active'));
    
    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    // Set default mood
    document.querySelector('.mood-btn.active').click();
});
