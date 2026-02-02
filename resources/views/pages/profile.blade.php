@extends('layouts.main')

@section('content')
<canvas id="interactive-bg" class="fixed inset-0 -z-10"></canvas>

<main class="min-h-screen p-6 pb-32">
    <div class="max-w-5xl mx-auto">
        <!-- Header -->
        <div class="mb-8 z-10 relative">
            <a href="/library" class="text-sm font-bold text-[#E63E88] hover:text-[#384D95] transition-all">← Kembali</a>
            <h1 class="text-5xl font-black text-[#384D95] mt-4 mb-2">👤 Profile Saya</h1>
        </div>

        <!-- Profile Card -->
        <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-8 border-2 border-[#384D95] shadow-lg mb-8 z-10 relative">
            <div class="grid md:grid-cols-3 gap-8 items-center">
                <!-- Avatar -->
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto bg-gradient-to-br from-[#E63E88] to-[#d42d74] rounded-full flex items-center justify-center text-6xl shadow-lg border-4 border-white">
                        🎓
                    </div>
                </div>

                <!-- Info -->
                <div class="md:col-span-2">
                    <h2 class="text-3xl font-black text-[#384D95] mb-2">Pelajar Zonera</h2>
                    <p class="text-[#384D95] opacity-70 mb-6">Level 1 • Member sejak hari ini</p>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-[#384D95]/10 p-4 rounded-xl text-center">
                            <p class="text-3xl font-black text-[#E63E88]" id="totalScore">0</p>
                            <p class="text-xs font-bold text-[#384D95] mt-2">Total Score</p>
                        </div>
                        <div class="bg-[#E63E88]/10 p-4 rounded-xl text-center">
                            <p class="text-3xl font-black text-[#384D95]" id="badgeCount">0</p>
                            <p class="text-xs font-bold text-[#384D95] mt-2">Badge</p>
                        </div>
                        <div class="bg-[#384D95]/10 p-4 rounded-xl text-center">
                            <p class="text-3xl font-black text-[#E63E88]" id="gameCount">0</p>
                            <p class="text-xs font-bold text-[#384D95] mt-2">Game Dimainkan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Score & Badge Section -->
        <div class="grid lg:grid-cols-2 gap-8 z-10 relative">
            <!-- Score Details -->
            <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 border-2 border-[#384D95] shadow-lg">
                <h3 class="text-2xl font-black text-[#384D95] mb-6">📊 Skor Per Game</h3>
                <div id="scoreDetails" class="space-y-3">
                    <p class="text-sm text-[#384D95] opacity-50 text-center">Belum ada skor</p>
                </div>
            </div>

            <!-- Badges -->
            <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 border-2 border-[#384D95] shadow-lg">
                <h3 class="text-2xl font-black text-[#384D95] mb-6">🏅 Badge Saya</h3>
                <div id="badgesContainer" class="grid grid-cols-3 gap-4">
                    <p class="col-span-3 text-sm text-[#384D95] opacity-50 text-center">Belum ada badge</p>
                </div>
            </div>
        </div>

        <!-- Badge Shop -->
        <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 border-2 border-[#384D95] shadow-lg mt-8 z-10 relative">
            <h3 class="text-2xl font-black text-[#384D95] mb-6">🛍 Badge Shop</h3>
            <p class="text-sm text-[#384D95] opacity-70 mb-6">Tukar skor kamu dengan badge eksklusif!</p>
            
            <div id="badgeShop" class="grid md:grid-cols-3 gap-6">
                <!-- Badges akan di-generate oleh JS -->
            </div>
        </div>
    </div>
</main>

<style>
    #interactive-bg {
        cursor: pointer;
        pointer-events: auto;
        display: block;
    }

    .badge-item {
        transition: all 0.3s ease;
    }

    .badge-item:hover {
        transform: translateY(-8px);
    }

    .badge-locked {
        opacity: 0.5;
        filter: grayscale(100%);
    }

    .badge-unlocked {
        box-shadow: 0 0 20px rgba(230, 62, 136, 0.3);
    }
</style>

<script>
    // ===== BADGE SYSTEM =====
    const badges = [
        { id: 1, name: 'Game Master', emoji: '🎮', cost: 100, description: 'Menang 10 game' },
        { id: 2, name: 'Genius Quiz', emoji: '🧠', cost: 150, description: 'Quiz score 100' },
        { id: 3, name: 'Memory Pro', emoji: '🎯', cost: 80, description: 'Memory match sempurna' },
        { id: 4, name: 'Snake Champion', emoji: '🐍', cost: 120, description: 'Snake score 500' },
        { id: 5, name: 'Rising Star', emoji: '⭐', cost: 200, description: 'Total score 500' },
        { id: 6, name: 'Legend', emoji: '👑', cost: 500, description: 'Total score 2000' }
    ];

    let userScore = JSON.parse(localStorage.getItem('userScore')) || { total: 0, games: {} };
    let userBadges = JSON.parse(localStorage.getItem('userBadges')) || [];

    function renderProfile() {
        // Update score
        document.getElementById('totalScore').textContent = userScore.total;

        // Update badge count
        document.getElementById('badgeCount').textContent = userBadges.length;

        // Update game count
        const gameCount = Object.keys(userScore.games).length;
        document.getElementById('gameCount').textContent = gameCount;

        // Render score details
        renderScoreDetails();

        // Render badges
        renderBadges();

        // Render shop
        renderBadgeShop();
    }

    function renderScoreDetails() {
        const details = document.getElementById('scoreDetails');
        if (Object.keys(userScore.games).length === 0) {
            details.innerHTML = '<p class="text-sm text-[#384D95] opacity-50 text-center">Belum ada skor</p>';
            return;
        }

        let html = '';
        for (const [game, score] of Object.entries(userScore.games)) {
            const gameNames = {
                'memory': '🧠 Memory Match',
                'snake': '🐍 Snake Game',
                'quiz': '❓ Quick Quiz'
            };
            html += `
                <div class="flex justify-between items-center p-3 bg-[#384D95]/10 rounded-lg">
                    <span class="font-bold text-[#384D95]">${gameNames[game] || game}</span>
                    <span class="text-lg font-black text-[#E63E88]">${score}</span>
                </div>
            `;
        }
        details.innerHTML = html;
    }

    function renderBadges() {
        const container = document.getElementById('badgesContainer');
        if (userBadges.length === 0) {
            container.innerHTML = '<p class="col-span-3 text-sm text-[#384D95] opacity-50 text-center">Belum ada badge. Tukarkan skor untuk mendapatkan badge!</p>';
            return;
        }

        let html = '';
        userBadges.forEach(badgeId => {
            const badge = badges.find(b => b.id === badgeId);
            if (badge) {
                html += `
                    <div class="text-center badge-item badge-unlocked">
                        <div class="text-5xl mb-2">${badge.emoji}</div>
                        <p class="font-bold text-[#384D95] text-sm">${badge.name}</p>
                    </div>
                `;
            }
        });
        container.innerHTML = html;
    }

    function renderBadgeShop() {
        const shop = document.getElementById('badgeShop');
        let html = '';

        badges.forEach(badge => {
            const isOwned = userBadges.includes(badge.id);
            const canBuy = userScore.total >= badge.cost && !isOwned;

            html += `
                <div class="badge-item bg-white border-2 border-[#384D95] rounded-2xl p-6 text-center ${isOwned ? 'badge-unlocked' : ''} ${isOwned ? '' : 'badge-locked'}">
                    <div class="text-5xl mb-3">${badge.emoji}</div>
                    <h4 class="font-black text-[#384D95] mb-2">${badge.name}</h4>
                    <p class="text-xs text-[#384D95] opacity-70 mb-4">${badge.description}</p>
                    
                    ${isOwned ? `
                        <div class="bg-green-100 border-2 border-green-500 text-green-700 px-4 py-2 rounded-lg font-bold text-sm">
                            ✓ Milik Saya
                        </div>
                    ` : `
                        <div class="flex items-center justify-between p-3 bg-[#384D95]/10 rounded-lg mb-3">
                            <span class="font-bold text-[#384D95]">${badge.cost} pts</span>
                            <span class="text-sm ${canBuy ? 'text-green-600 font-bold' : 'text-red-600 opacity-70'}">
                                ${canBuy ? '✓ Bisa Beli' : '❌ Kurang'}
                            </span>
                        </div>
                        <button onclick="buyBadge(${badge.id})" class="w-full ${canBuy ? 'bg-[#E63E88] hover:bg-[#d42d74]' : 'bg-gray-300 cursor-not-allowed'} text-white px-4 py-2 rounded-lg font-bold transition-all" ${!canBuy ? 'disabled' : ''}>
                            Tukar Skor
                        </button>
                    `}
                </div>
            `;
        });

        shop.innerHTML = html;
    }

    function buyBadge(badgeId) {
        const badge = badges.find(b => b.id === badgeId);

        if (userScore.total < badge.cost) {
            alert('❌ Skor tidak cukup!');
            return;
        }

        if (userBadges.includes(badgeId)) {
            alert('✓ Kamu sudah memiliki badge ini!');
            return;
        }

        // Kurangi skor
        userScore.total -= badge.cost;
        localStorage.setItem('userScore', JSON.stringify(userScore));

        // Tambah badge
        userBadges.push(badgeId);
        localStorage.setItem('userBadges', JSON.stringify(userBadges));

        // Update tampilan
        renderProfile();
        alert(`🎉 Selamat! Kamu mendapat badge "${badge.name}"!`);
    }

    // Canvas background (sama seperti halaman lain)
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

    // Initialize
    renderProfile();
</script>

@endsection
