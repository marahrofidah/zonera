@extends('layouts.main')

@section('content')
<canvas id="interactive-bg" class="fixed inset-0 -z-10"></canvas>

<main class="min-h-screen flex flex-col items-center justify-center pt-20 pb-32 relative px-4">
    <!-- Hero Section -->
    <div class="text-center mb-20 z-10 max-w-3xl">
        <div class="inline-block mb-6">
            <div class="text-7xl animate-bounce-soft mb-4">🌟</div>
        </div>
        <h1 class="text-6xl md:text-7xl font-black text-[#384D95] mb-6">About zonera</h1>
        <p class="text-xl text-[#384D95] opacity-80 font-semibold mb-4">Platform Belajar yang Bikin Belajar Jadi Seru & Produktif!</p>
        <p class="text-lg text-[#384D95] opacity-60 font-medium">Kami percaya belajar itu gak perlu membosankan. Dengan zonera, kelola waktu, atur tasks, main games, dengarkan musik, dan catat pelajaran—semuanya dalam satu tempat yang fun! 🎉</p>
    </div>

    <!-- Mission & Vision Section -->
    <div class="w-full max-w-5xl mb-20 z-10">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Mission Card -->
            <div class="group bg-[#E63E88] backdrop-blur-sm rounded-full py-8 md:py-10 px-16 md:px-24 border-2 border-[#E63E88] hover:border-[#384D95] transition-all duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
                <div class="flex items-center justify-center mb-4">
                    <img src="/images/icons/mission.png" alt="Mission" class="w-16 h-16 group-hover:scale-110 transition-transform duration-300">
                </div>
                <h3 class="text-2xl font-black text-white mb-3 text-center">Misi Kami</h3>
                <p class="text-white font-medium leading-relaxed opacity-90 text-center">Membuat belajar jadi menyenangkan & produktif dengan tools interaktif yang kombinasi fokus, kreativitas, & gamification untuk setiap pelajar.</p>
            </div>

            <!-- Vision Card -->
            <div class="group bg-[#384D95] backdrop-blur-sm rounded-full py-8 md:py-10 px-16 md:px-24 border-2 border-[#384D95] hover:border-[#E63E88] transition-all duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
                <div class="flex items-center justify-center mb-4">
                    <img src="/images/icons/vision.png" alt="Vision" class="w-16 h-16 group-hover:scale-110 transition-transform duration-300">
                </div>
                <h3 class="text-2xl font-black text-white mb-3 text-center">Visi Kami</h3>
                <p class="text-white font-medium leading-relaxed opacity-90 text-center">Jadi platform belajar #1 untuk gen Z yang menggabungkan produktivitas, kreativitas, & hiburan jadi satu ekosistem yang harmonis & engaging.</p>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="w-full max-w-5xl mb-20 z-10">
        <h2 class="text-4xl font-black text-center text-[#384D95] mb-12">Mengapa Zonera?</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Feature 1 -->
            <div class="feature-card bg-white backdrop-blur-sm rounded-full p-8 border-2 border-[#E63E88] hover:border-[#384D95] transition-all duration-300 hover:shadow-xl hover:-translate-y-2 text-center cursor-pointer">
                <img src="/images/icons/jadwal.png" alt="Manajemen Waktu" class="w-24 h-24 mx-auto mb-4">
                <h3 class="text-xl font-black text-[#E63E88] mb-2">Manajemen Waktu</h3>
                <p class="text-[#384D95] opacity-75 font-medium">Atur jadwal belajar dengan mudah </p>
            </div>

            <!-- Feature 2 -->
            <div class="feature-card bg-white backdrop-blur-sm rounded-full p-8 border-2 border-[#384D95] hover:border-[#E63E88] transition-all duration-300 hover:shadow-xl hover:-translate-y-2 text-center cursor-pointer">
                <img src="/images/icons/games.png" alt="Gamification" class="w-24 h-24 mx-auto mb-4">
                <h3 class="text-xl font-black text-[#384D95] mb-2">Gamification</h3>
                <p class="text-[#384D95] opacity-75 font-medium">Kumpulkan poin & unlock badge</p>
            </div>

            <!-- Feature 3 -->
            <div class="feature-card bg-white backdrop-blur-sm rounded-full p-8 border-2 border-[#E63E88] hover:border-[#384D95] transition-all duration-300 hover:shadow-xl hover:-translate-y-2 text-center cursor-pointer">
                <img src="/images/icons/musik.png" alt="Musik & Break" class="w-24 h-24 mx-auto mb-4">
                <h3 class="text-xl font-black text-[#E63E88] mb-2">Musik & Break</h3>
                <p class="text-[#384D95] opacity-75 font-medium">3 playlist curated + mini games untuk refresh otak & prevent burnout</p>
            </div>

            <!-- Feature 4 -->
            <div class="feature-card bg-white backdrop-blur-sm rounded-full p-8 border-2 border-[#384D95] hover:border-[#E63E88] transition-all duration-300 hover:shadow-xl hover:-translate-y-2 text-center cursor-pointer">
                <img src="/images/icons/todo.png" alt="To-Do List" class="w-24 h-24 mx-auto mb-4">
                <h3 class="text-xl font-black text-[#384D95] mb-2">To-Do List</h3>
                <p class="text-[#384D95] opacity-75 font-medium">Catat semua tasks, prioritaskan, & rasakan kepuasan setiap check!</p>
            </div>

            <!-- Feature 5 -->
            <div class="feature-card bg-white backdrop-blur-sm rounded-full p-8 border-2 border-[#E63E88] hover:border-[#384D95] transition-all duration-300 hover:shadow-xl hover:-translate-y-2 text-center cursor-pointer">
                <img src="/images/icons/kalender.png" alt="Kalender Notes" class="w-24 h-24 mx-auto mb-4">
                <h3 class="text-xl font-black text-[#E63E88] mb-2">Kalender Notes</h3>
                <p class="text-[#384D95] opacity-75 font-medium">Dokumentasi harian dengan markdown & color-coded entries untuk tracking progress</p>
            </div>

            <!-- Feature 6 -->
            <div class="feature-card bg-white backdrop-blur-sm rounded-full p-8 border-2 border-[#384D95] hover:border-[#E63E88] transition-all duration-300 hover:shadow-xl hover:-translate-y-2 text-center cursor-pointer">
                <img src="/images/icons/design-minimal.png" alt="Design Minimal" class="w-24 h-24 mx-auto mb-4">
                <h3 class="text-xl font-black text-[#384D95] mb-2">Design Minimal</h3>
                <p class="text-[#384D95] opacity-75 font-medium">Interface yang clean, intuitive & gak bikin distraksi saat belajar</p>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="w-full max-w-5xl mb-20 z-10">
        <div class="bg-gradient-to-r from-[#E63E88] to-[#384D95] rounded-full p-12 text-white">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div class="stat-item">
                    <div class="text-5xl font-black mb-2 stat-number">10K+</div>
                    <p class="text-lg opacity-90 font-semibold">User Aktif</p>
                </div>
                <div class="stat-item">
                    <div class="text-5xl font-black mb-2 stat-number">50K+</div>
                    <p class="text-lg opacity-90 font-semibold">Tasks Completed</p>
                </div>
                <div class="stat-item">
                    <div class="text-5xl font-black mb-2 stat-number">100K+</div>
                    <p class="text-lg opacity-90 font-semibold">Study Hours</p>
                </div>
                <div class="stat-item">
                    <div class="text-5xl font-black mb-2 stat-number">4.9★</div>
                    <p class="text-lg opacity-90 font-semibold">Rating</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="text-center z-10 mb-8">
        <h2 class="text-4xl font-black text-[#384D95] mb-6">Siap Mulai Belajar dengan Cara Baru?</h2>
        <p class="text-xl text-[#384D95] opacity-70 font-medium mb-8 max-w-2xl mx-auto">Join ribuan pelajar yang udah rasakan perbedaan belajar dengan zonera. Yuk, transform your study routine sekarang juga!</p>
        <a href="/app" class="inline-block cta-button cta-button-primary text-white px-12 py-4 rounded-full shadow-lg font-bold tracking-wide text-lg">
            🚀 Mulai Sekarang - Gratis!
        </a>
    </div>
</main>

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

        requestAnimationFrame(animate);
    }

    animate();

    // Scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'slideInUp 0.6s ease-out forwards';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.feature-card, .stat-item').forEach(el => {
        observer.observe(el);
    });
</script>

@endsection
