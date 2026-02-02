<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zonera - Virtual Study</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #F0E8FF;
            --primary-pink: #E63E88;
            --primary-blue: #384D95;
            --accent-white: #FFFFFF;
            --text-blue: #384D95;
        }
        body { 
            background-color: var(--bg-color);
            font-family: 'Quicksand', sans-serif;
            color: var(--text-blue);
            overflow-x: hidden;
        }
        /* Navbar ala Dock di Bawah */
        .bottom-nav {
            position: fixed;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary-pink);
            backdrop-filter: blur(15px);
            padding: 16px 40px;
            border-radius: 60px;
            display: flex;
            gap: 40px;
            border: 2px solid var(--primary-pink);
            z-index: 1000;
            box-shadow: 0 8px 32px rgba(230, 62, 136, 0.2);
        }
        .nav-link {
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 1rem;
            color: var(--accent-white);
            padding: 8px 16px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }
        .nav-link img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }
        .nav-link:hover {
            color: var(--accent-white);
            background-color: var(--primary-blue);
            transform: translateY(-3px);
            border-radius: 50px;
            padding: 10px 48px 10px 24px;
        }
        .nav-link.active {
            color: var(--accent-white);
            background-color: var(--primary-blue);
            padding: 10px 48px 10px 24px;
        }
        .nav-link.active:hover {
            transform: translateY(-3px) scale(1.05);
        }
    </style>
</head>
<body class="antialiased">

    @yield('content')

    <nav class="bottom-nav">
        <a href="/" class="nav-link">
            <img src="/images/icons/nav-home.png" alt="Home">
            <span>Home</span>
        </a>
        <a href="/about" class="nav-link">
            <img src="/images/icons/nav-about.png" alt="About">
            <span>About</span>
        </a>
        <a href="/library" class="nav-link">
            <img src="/images/icons/nav-library.png" alt="Library">
            <span>Library</span>
        </a>
        <a href="/calendar" class="nav-link">
            <img src="/images/icons/nav-calendar.png" alt="Calendar">
            <span>Calendar</span>
        </a>
        <a href="/contact" class="nav-link">
            <img src="/images/icons/nav-contact.png" alt="Contact">
            <span>Contact</span>
        </a>
        <a href="/profile" class="nav-link active" style="background-color: var(--primary-blue); color: var(--accent-white);">
            <img src="/images/icons/nav-app.png" alt="App">
            <span>Profile</span>
        </a>
    </nav>

    <!-- Floating Timer Widget - Global -->
    <div id="floatingTimer" class="fixed bottom-[30px] right-[30px] z-[9999] bg-gradient-to-br from-[#E63E88] to-[#d42d74] rounded-[20px] p-4 text-white shadow-lg border-2 border-white hidden cursor-move" style="min-width: 200px;">
        <button class="absolute top-2 right-2 bg-white/30 hover:bg-white/50 w-6 h-6 rounded-full flex items-center justify-center text-sm font-bold transition-all" onclick="hideFloatingTimer()">✕</button>
        <div class="text-center">
            <div class="text-xs opacity-90 font-semibold mb-1">⏱ Sesi Pomodoro</div>
            <div class="text-2xl font-black font-mono mb-2" id="floatingTimerDisplay">25:00</div>
            <div class="flex gap-2 justify-center">
                <button onclick="pauseTimer()" class="px-2 py-1 bg-white/30 hover:bg-white/50 text-white rounded text-xs font-bold transition-all">⏸</button>
                <button onclick="stopTimer()" class="px-2 py-1 bg-white/30 hover:bg-white/50 text-white rounded text-xs font-bold transition-all">⏹</button>
                <button onclick="backToRoom()" class="px-2 py-1 bg-white/30 hover:bg-white/50 text-white rounded text-xs font-bold transition-all">↩</button>
            </div>
        </div>
    </div>

    <script>
        // ===== GLOBAL FLOATING TIMER =====
        const floatingTimer = document.getElementById('floatingTimer');
        let floatingTimerPinned = localStorage.getItem('floatingTimerPinned') === 'true';
        let floatingTimerPosition = JSON.parse(localStorage.getItem('floatingTimerPosition') || '{"x": 30, "y": 30}');
        
        // Global timer variables
        window.globalTimeRemaining = parseInt(localStorage.getItem('globalTimeRemaining') || '1500');
        window.globalTimerRunning = localStorage.getItem('globalTimerRunning') === 'true';
        window.globalTimerInterval = null;
        window.globalTimerDuration = parseInt(localStorage.getItem('globalTimerDuration') || '1500');

        function showFloatingTimer() {
            floatingTimer.classList.remove('hidden');
            if (floatingTimerPinned) {
                floatingTimer.style.position = 'fixed';
                floatingTimer.style.bottom = floatingTimerPosition.y + 'px';
                floatingTimer.style.right = floatingTimerPosition.x + 'px';
            }
            updateFloatingTimerDisplay();
            console.log('✅ Floating timer shown');
        }

        function hideFloatingTimer() {
            floatingTimer.classList.add('hidden');
            console.log('❌ Floating timer hidden');
        }

        function updateFloatingTimerDisplay() {
            const minutes = Math.floor(window.globalTimeRemaining / 60);
            const seconds = window.globalTimeRemaining % 60;
            const display = document.getElementById('floatingTimerDisplay');
            if (display) {
                display.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            }
        }

        function startGlobalTimerInterval() {
            if (window.globalTimerInterval) clearInterval(window.globalTimerInterval);
            
            window.globalTimerInterval = setInterval(() => {
                window.globalTimeRemaining--;
                updateFloatingTimerDisplay();
                
                // Sync dengan localStorage
                localStorage.setItem('globalTimeRemaining', window.globalTimeRemaining);
                
                if (window.globalTimeRemaining <= 0) {
                    clearInterval(window.globalTimerInterval);
                    window.globalTimerRunning = false;
                    alert('⏰ Sesi Pomodoro selesai! Istirahat 5 menit yuk! 🎉');
                    clearGlobalTimerStorage();
                    hideFloatingTimer();
                }
            }, 1000);
        }

        function clearGlobalTimerStorage() {
            localStorage.removeItem('globalTimeRemaining');
            localStorage.removeItem('globalTimerRunning');
            localStorage.removeItem('globalTimerDuration');
            localStorage.removeItem('timerStartTime');
        }

        function pauseTimer() {
            if (window.globalTimerRunning) {
                clearInterval(window.globalTimerInterval);
                window.globalTimerRunning = false;
                localStorage.setItem('globalTimerRunning', 'false');
                console.log('⏸ Timer paused');
            } else {
                window.globalTimerRunning = true;
                localStorage.setItem('globalTimerRunning', 'true');
                startGlobalTimerInterval();
                console.log('▶ Timer resumed');
            }
        }

        function stopTimer() {
            clearInterval(window.globalTimerInterval);
            window.globalTimerRunning = false;
            clearGlobalTimerStorage();
            hideFloatingTimer();
            console.log('⏹ Timer stopped');
        }

        function backToRoom() {
            // Cek apakah kita di halaman room-pomodoro
            const mejaSection = document.querySelector('#mejaSection');
            
            if (mejaSection) {
                // Kita sudah di halaman room-pomodoro, tinggal scroll
                mejaSection.scrollIntoView({ behavior: 'smooth' });
                console.log('✅ Scrolled to meja section');
            } else {
                // Kita tidak di halaman room-pomodoro, redirect
                console.log('📍 Redirecting to room-pomodoro');
                window.location.href = '/room-pomodoro';
            }
        }

        function saveFloatingTimerPosition() {
            floatingTimerPosition = {
                x: parseInt(floatingTimer.style.right) || 30,
                y: parseInt(floatingTimer.style.bottom) || 30
            };
            localStorage.setItem('floatingTimerPosition', JSON.stringify(floatingTimerPosition));
            console.log('💾 Position saved:', floatingTimerPosition);
        }

        // Drag functionality
        let isDragging = false;
        let dragOffsetX = 0;
        let dragOffsetY = 0;

        floatingTimer.addEventListener('mousedown', (e) => {
            if (e.target.tagName === 'BUTTON' || e.target.closest('button')) return;
            if (!floatingTimerPinned) return;
            
            isDragging = true;
            const rect = floatingTimer.getBoundingClientRect();
            dragOffsetX = e.clientX - rect.right;
            dragOffsetY = e.clientY - rect.bottom;
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

        // Restore timer on page load
        window.addEventListener('load', () => {
            const isRunning = localStorage.getItem('globalTimerRunning') === 'true';
            const timeRemaining = parseInt(localStorage.getItem('globalTimeRemaining') || '0');
            
            if (isRunning && timeRemaining > 0) {
                window.globalTimeRemaining = timeRemaining;
                window.globalTimerRunning = true;
                showFloatingTimer();
                startGlobalTimerInterval();
                console.log('🔄 Timer restored:', timeRemaining);
            }
        });

        // Save before unload
        window.addEventListener('beforeunload', () => {
            if (window.globalTimerRunning) {
                localStorage.setItem('globalTimeRemaining', window.globalTimeRemaining);
                localStorage.setItem('globalTimerRunning', 'true');
                console.log('💾 Timer state saved before unload');
            }
        });

        // Pin/Unpin functionality
        window.pinFloatingTimer = function() {
            floatingTimerPinned = !floatingTimerPinned;
            localStorage.setItem('floatingTimerPinned', floatingTimerPinned);
            
            if (floatingTimerPinned) {
                console.log('📌 Timer pinned');
            } else {
                console.log('📌 Timer unpinned');
            }
        }
    </script>

</body>
</html>