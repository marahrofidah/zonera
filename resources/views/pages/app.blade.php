@extends('layouts.main')

@section('content')
<canvas id="interactive-bg" class="fixed inset-0 -z-10"></canvas>
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

<style>
    #interactive-bg {
        cursor: pointer;
        pointer-events: auto;
        display: block;
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
// cb
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

    // Aplikasi Logic (Existing Code)

@endsection