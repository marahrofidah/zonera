@extends('layouts.main')

@section('content')
<canvas id="interactive-bg" class="fixed inset-0 -z-10"></canvas>

<main class="min-h-screen flex flex-col items-center justify-center pt-10 pb-32 relative">
    <!-- Hero Section -->
    <div class="text-center mb-16 z-10 max-w-2xl px-4">
        <h1 class="text-6xl md:text-7xl font-black text-[#384D95] mb-4">zonera</h1>
        <p class="text-lg text-[#384D95] opacity-80 mb-3 font-semibold">Platform Belajar Interaktif & Seru</p>
        <p class="text-sm md:text-base text-[#384D95] opacity-60 font-medium">Kelola waktu belajar, atur to-do, mainkan games, dengarkan musik, dan catat di kalender!</p>
    </div>

    <!-- Features Section - Interactive Carousel -->
    <div class="relative w-full max-w-4xl px-4 mb-16 z-10">
        <div class="relative overflow-hidden rounded-full bg-white backdrop-blur-sm p-12 shadow-lg border border-gray-100 carousel-glow">
            <!-- Carousel Container -->
            <div class="relative h-96 flex items-center justify-center">
                <!-- Feature Items -->
                <div id="featureCarousel" class="absolute inset-0 flex items-center justify-center">
                    <!-- Feature 1 -->
                    <div class="feature-item absolute opacity-0 cursor-pointer transform transition-all hover:scale-105 bg-white/60 backdrop-blur-sm rounded-full p-8" style="transform: translateX(500px);">
                        <img src="/images/icons/jadwal.png" alt="Jadwal Belajar" class="w-48 h-48 mx-auto mb-6">
                        <h3 class="text-2xl font-black text-[#E63E88] mb-2">Jadwal Belajar</h3>
                        <p class="text-[#384D95] max-w-sm font-medium leading-relaxed opacity-75">Atur jam belajar dengan fleksibel & dapatkan reminder otomatis</p>
                    </div>
                    <!-- Feature 2 -->
                    <div class="feature-item absolute opacity-0 cursor-pointer transform transition-all hover:scale-105 bg-white/60 backdrop-blur-sm rounded-full p-8" style="transform: translateX(500px);">
                        <img src="/images/icons/todo.png" alt="To-Do List" class="w-48 h-48 mx-auto mb-6">
                        <h3 class="text-2xl font-black text-[#E63E88] mb-2">To-Do List</h3>
                        <p class="text-[#384D95] max-w-sm font-medium leading-relaxed opacity-75">Catat tasks, prioritas, & raih kepuasan setiap check!</p>
                    </div>
                    <!-- Feature 3 -->
                    <div class="feature-item absolute opacity-0 cursor-pointer transform transition-all hover:scale-105 bg-white/60 backdrop-blur-sm rounded-full p-8" style="transform: translateX(500px);">
                        <img src="/images/icons/games.png" alt="Mini Games" class="w-48 h-48 mx-auto mb-6">
                        <h3 class="text-2xl font-black text-[#E63E88] mb-2">Mini Games</h3>
                        <p class="text-[#384D95] max-w-sm font-medium leading-relaxed opacity-75">Mainkan quiz, puzzle, & games seru untuk refresh pikiran</p>
                    </div>
                    <!-- Feature 4 -->
                    <div class="feature-item absolute opacity-0 cursor-pointer transform transition-all hover:scale-105 bg-white/60 backdrop-blur-sm rounded-full p-8" style="transform: translateX(500px);">
                        <img src="/images/icons/musik.png" alt="Musik Fokus" class="w-48 h-48 mx-auto mb-6">
                        <h3 class="text-2xl font-black text-[#E63E88] mb-2">Musik Fokus</h3>
                        <p class="text-[#384D95] max-w-sm font-medium leading-relaxed opacity-75">3 playlist curated: Focus, Chill, Energize</p>
                    </div>
                    <!-- Feature 5 -->
                    <div class="feature-item absolute opacity-0 cursor-pointer transform transition-all hover:scale-105 bg-white/60 backdrop-blur-sm rounded-full p-8" style="transform: translateX(500px);">
                        <img src="/images/icons/kalender.png" alt="Kalender Catatan" class="w-48 h-48 mx-auto mb-6">
                        <h3 class="text-2xl font-black text-[#E63E88] mb-2">Kalender Catatan</h3>
                        <p class="text-[#384D95] max-w-sm font-medium leading-relaxed opacity-75">Dokumentasi harian dengan markdown & color-coded entries</p>
                    </div>
                    <!-- Feature 6 -->
                    <div class="feature-item absolute opacity-0 cursor-pointer transform transition-all hover:scale-105 bg-white/60 backdrop-blur-sm rounded-full p-8" style="transform: translateX(500px);">
                        <img src="/images/icons/poin.png" alt="Poin & Level" class="w-48 h-48 mx-auto mb-6">
                        <h3 class="text-2xl font-black text-[#E63E88] mb-2">Poin & Level</h3>
                        <p class="text-[#384D95] max-w-sm font-medium leading-relaxed opacity-75">Naik level, unlock badge, & compete di leaderboard</p>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button id="prevBtn" class="absolute left-4 z-10 w-10 h-10 rounded-full bg-[#384D95] hover:bg-[#E63E88] text-white flex items-center justify-center transition-all hover:scale-105 shadow-md text-lg font-bold">
                    ❮
                </button>
                <button id="nextBtn" class="absolute right-4 z-10 w-10 h-10 rounded-full bg-[#384D95] hover:bg-[#E63E88] text-white flex items-center justify-center transition-all hover:scale-105 shadow-md text-lg font-bold">
                    ❯
                </button>
            </div>

            <!-- Dots Indicator -->
            <div id="dotsContainer" class="flex justify-center gap-2 mt-6">
                <!-- Dots will be generated by JS -->
            </div>
        </div>
    </div>

    <!-- CTA Buttons -->
    <div class="flex flex-col sm:flex-row gap-4 z-10 mb-8">
        <a href="/app" class="bg-[#E63E88] hover:bg-[#384D95] text-white px-10 py-3 rounded-full shadow-md font-bold tracking-wide text-sm transition-all duration-300 transform hover:scale-102">
            🚀 Mulai Sekarang
        </a>
        <a href="/about" class="bg-white hover:bg-gray-50 text-[#384D95] px-10 py-3 rounded-full shadow-md font-bold tracking-wide text-sm transition-all duration-300 border-2 border-[#384D95] transform hover:scale-102">
            📖 Pelajari Lebih Lanjut
        </a>
    </div>

    <!-- Floating Message -->
    <div class="text-center text-[#384D95] opacity-50 text-xs z-10 font-medium">
        <p>💡 Move your cursor • background follows ✨</p>
    </div>
</main>

<style>
    /* Interactive Background Canvas */
    #interactive-bg {
        cursor: pointer;
        pointer-events: auto;
        display: block;
    }

    /* Carousel Animations */
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

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }

    @keyframes pulse-glow {
        0%, 100% { 
            opacity: 0;
            filter: blur(20px);
        }
        50% { 
            opacity: 0.8;
            filter: blur(30px);
        }
    }

    @keyframes emoji-glow {
        0%, 100% { 
            filter: drop-shadow(0 0 8px rgba(230, 62, 136, 0.2));
            transform: translateY(0px) scale(1);
        }
        50% { 
            filter: drop-shadow(0 0 15px rgba(230, 62, 136, 0.4));
            transform: translateY(-6px) scale(1.05);
        }
    }

    @keyframes scale-pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .feature-item {
        animation: slideInUp 0.6s ease-out forwards;
        text-align: center;
    }

    .feature-item .text-8xl {
        animation: emoji-glow 2s ease-in-out infinite !important;
    }

    .carousel-glow {
        box-shadow: 0 2px 12px rgba(56, 77, 149, 0.08);
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .animate-bounce {
        animation: bounce 2s ease-in-out infinite;
    }

    /* Dot indicators */
    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #E0E0E0;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .dot.active {
        background-color: #E63E88;
        transform: scale(1.2);
    }

    .dot:hover {
        background-color: #384D95;
    }
</style>

<script>
    // Interactive Canvas Background dengan Cursor Following Effect
    const canvas = document.getElementById('interactive-bg');
    const ctx = canvas.getContext('2d');

    // Color palette
    const colors = ['#FFFFFF', '#E63E88', '#384D95', '#F0F0F5'];

    // Canvas setup
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    // Cursor following liquid blobs
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
            // Smooth follow cursor dengan easing yang lebih responsif
            this.targetX = mouseX;
            this.targetY = mouseY;
            
            const dx = this.targetX - this.x;
            const dy = this.targetY - this.y;
            
            // Adaptive easing based on distance - LEBIH AGRESIF
            const distance = Math.sqrt(dx * dx + dy * dy);
            const easing = Math.min(distance * 0.001, 0.25);
            
            this.x += dx * easing;
            this.y += dy * easing;

            // Wobble effect
            this.wobbleAmount += this.wobbleSpeed;
            this.radius = this.baseRadius + Math.sin(this.wobbleAmount) * 15;
        }

        draw() {
            // Blur effect untuk liquid feel
            ctx.globalAlpha = 0.4;
            ctx.fillStyle = this.color;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius * 1.2, 0, Math.PI * 2);
            ctx.fill();
            
            // Inner blob lebih solid
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
            
            // Bounce
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

    // Create multiple liquid blobs dengan offset berbeda
    for (let i = 0; i < 6; i++) {
        const offsetX = (Math.random() - 0.5) * 600;
        const offsetY = (Math.random() - 0.5) * 600;
        liquidBlobs.push(new LiquidBlob(offsetX, offsetY));
    }

    // Initial particles
    for (let i = 0; i < 30; i++) {
        particles.push(new Particle());
    }

    let mouseX = canvas.width / 2;
    let mouseY = canvas.height / 2;
    let isMouseMoving = false;

    // Mouse movement - LEBIH RESPONSIF
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        isMouseMoving = true;
        
        // Create particles LEBIH SERING
        if (Math.random() > 0.7) {
            for (let i = 0; i < 2; i++) {
                const p = new Particle(mouseX + (Math.random() - 0.5) * 30, mouseY + (Math.random() - 0.5) * 30);
                particles.push(p);
            }
        }
    });

    // Touch support
    document.addEventListener('touchmove', (e) => {
        const touch = e.touches[0];
        mouseX = touch.clientX;
        mouseY = touch.clientY;
        isMouseMoving = true;
        
        if (Math.random() > 0.7) {
            for (let i = 0; i < 2; i++) {
                const p = new Particle(mouseX + (Math.random() - 0.5) * 30, mouseY + (Math.random() - 0.5) * 30);
                particles.push(p);
            }
        }
    });

    // Click untuk particle burst - LEBIH BANYAK & LEBIH BESAR
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

    // Draw gradient background
    function drawBackground() {
        const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
        gradient.addColorStop(0, '#FAFBFF');
        gradient.addColorStop(0.5, '#F5F7FF');
        gradient.addColorStop(1, '#FAFBFF');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }

    // Draw decorative circles
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

    let frameCount = 0;
    // Animation loop
    function animate() {
        frameCount++;
        
        drawBackground();
        drawDecorations();

        // Update dan draw liquid blobs
        liquidBlobs.forEach(blob => {
            blob.update(mouseX, mouseY);
            blob.draw();
        });

        // Update dan draw particles
        for (let i = particles.length - 1; i >= 0; i--) {
            particles[i].update();
            particles[i].draw();

            if (particles[i].life <= 0) {
                particles.splice(i, 1);
            }
        }

        // Draw subtle connections
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

        if (frameCount % 60 === 0) {
            // Silent logging
        }

        requestAnimationFrame(animate);
    }

    animate();

    // Carousel Functionality
    let currentIndex = 0;
    const totalFeatures = 6;
    const featureItems = document.querySelectorAll('.feature-item');
    const dotsContainer = document.getElementById('dotsContainer');

    // Generate dots
    for (let i = 0; i < totalFeatures; i++) {
        const dot = document.createElement('div');
        dot.className = 'dot' + (i === 0 ? ' active' : '');
        dot.addEventListener('click', () => goToSlide(i));
        dotsContainer.appendChild(dot);
    }

    const dots = document.querySelectorAll('.dot');

    function showSlide(index) {
        // Update positions - HANYA SATU ITEM YANG VISIBLE
        featureItems.forEach((item, i) => {
            if (i === index) {
                // Current slide - FULLY VISIBLE INSTANT
                item.style.visibility = 'visible';
                item.style.zIndex = '10';
                item.style.pointerEvents = 'auto';
                // Trigger reflow untuk instant display
                item.offsetHeight;
                item.style.transition = 'opacity 700ms ease-out';
                item.style.opacity = '1';
                item.style.transform = 'translateX(0) scale(1)';
            } else {
                // Hidden items - COMPLETELY HIDDEN LANGSUNG
                item.style.transition = 'none';
                item.style.opacity = '0';
                item.style.transform = 'translateX(500px)';
                item.style.zIndex = '-1';
                item.style.pointerEvents = 'none';
                item.style.visibility = 'hidden';
            }
        });

        // Update dots
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    function goToSlide(index) {
        currentIndex = index;
        showSlide(currentIndex);
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalFeatures;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalFeatures) % totalFeatures;
        showSlide(currentIndex);
    }

    // Event listeners
    document.getElementById('nextBtn').addEventListener('click', nextSlide);
    document.getElementById('prevBtn').addEventListener('click', prevSlide);

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') nextSlide();
        if (e.key === 'ArrowLeft') prevSlide();
    });

    // Auto-rotate carousel
    setInterval(nextSlide, 6000);

    // Initialize
    showSlide(0);

    // Tilt effect pada cards saat mouse move (jika diperlukan)
    document.querySelectorAll('.card-tilt').forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;
            
            this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.08)`;
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
        });
    });
</script>
@endsection