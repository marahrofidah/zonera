@extends('layouts.main')

@section('content')
<canvas id="interactive-bg" class="fixed inset-0 -z-10"></canvas>

<main class="min-h-screen flex flex-col items-center justify-center pt-8 pb-32 relative px-4">
    <div class="w-full max-w-7xl mx-auto">
        <div class="text-center mb-12 z-10">
            <h1 class="text-5xl md:text-6xl font-black text-[#384D95] mb-4">Pilih Metode Fokusmu</h1>
            <p class="text-xl text-[#384D95] opacity-70 font-medium">Klik metode untuk melihat detail dan mulai belajar! 🎯</p>
        </div>

        <div class="mb-8 z-10 flex flex-wrap justify-center gap-3">
            <button onclick="filterMethods('all')" class="filter-btn active px-8 py-3.5 rounded-full font-bold transition-all duration-300 bg-gradient-to-r from-[#E63E88] to-[#d42d74] text-white shadow-lg hover:scale-110 text-base">🎯 Semua</button>
            <button onclick="filterMethods('short')" class="filter-btn px-8 py-3.5 rounded-full font-bold transition-all duration-300 border-2 border-[#384D95] text-[#384D95] bg-white/50 hover:bg-[#384D95] hover:text-white text-base">⚡ Singkat</button>
            <button onclick="filterMethods('long')" class="filter-btn px-8 py-3.5 rounded-full font-bold transition-all duration-300 border-2 border-[#E63E88] text-[#E63E88] bg-white/50 hover:bg-[#E63E88] hover:text-white text-base">🔥 Panjang</button>
            <button onclick="filterMethods('exam')" class="filter-btn px-8 py-3.5 rounded-full font-bold transition-all duration-300 border-2 border-[#384D95] text-[#384D95] bg-white/50 hover:bg-[#384D95] hover:text-white text-base">📚 Ujian</button>
        </div>

        <div class="z-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="method-card method-all method-short bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
                <div class="w-28 h-28 rounded-full bg-pink-100 flex items-center justify-center flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">
                <img 
                    src="/images/icons/pomodoro.png" 
                    alt="Pomodoro"
                    class="w-16 h-16 object-contain"
                >
                </div>
                <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#E63E88] leading-tight">Pomodoro</h3>
                        <span class="text-[10px] font-black bg-[#E63E88] text-white px-2.5 py-1 rounded-full uppercase">25m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 font-semibold">
                        Teknik fokus 25 menit dengan istirahat 5 menit. Cocok untuk tugas rutin dan membaca.
                    </p>
                    <a href="/room/pomodoro" class="text-xs font-black text-[#E63E88] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>

            <div class="method-card method-all method-long bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
            <div class="w-28 h-28 rounded-full bg-pink-100 flex items-center justify-center flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">
                <img 
                    src="/images/icons/deep-work.png" 
                    alt="Deep Work"
                    class="w-16 h-16 object-contain"
                >
                </div>                <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#384D95] leading-tight">Deep Work</h3>
                        <span class="text-[10px] font-black bg-[#384D95] text-white px-2.5 py-1 rounded-full uppercase">90m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 font-semibold">
                        Sesi fokus mendalam tanpa gangguan. Ideal untuk menulis, coding, atau analisis kompleks.
                    </p>
                    <a href="/room/deep-work" class="text-xs font-black text-[#384D95] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>

            <div class="method-card method-all method-short bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
            <div class="w-28 h-28 rounded-full bg-pink-100 flex items-center justify-center flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">
                <img 
                    src="/images/icons/ultradian.png" 
                    alt="Ultradian"
                    class="w-16 h-16 object-contain"
                >
                </div>                <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#E63E88] leading-tight">Ultradian</h3>
                        <span class="text-[10px] font-black bg-[#E63E88] text-white px-2.5 py-1 rounded-full uppercase">50m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 font-semibold">
                    Mengikuti ritme alami tubuh. Fokus 50 menit, istirahat 10 menit untuk menyegarkan otak.                    </p>
                    <a href="/room/ultradian" class="text-xs font-black text-[#E63E88] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>

            <div class="method-card method-all method-exam bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
            <div class="w-28 h-28 rounded-full bg-pink-100 flex items-center justify-center flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">
                <img 
                    src="/images/icons/marathon.png" 
                    alt="Marathon"
                    class="w-16 h-16 object-contain"
                >
                </div>     
                    <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#384D95] leading-tight">Marathon</h3>
                        <span class="text-[10px] font-black bg-[#384D95] text-white px-2.5 py-1 rounded-full uppercase">120m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 font-semibold">
                    Sesi belajar panjang untuk persiapan ujian dengan jeda istirahat 15 menit di tengah-tengah.                    </p>
                    <a href="/room/marathon" class="text-xs font-black text-[#384D95] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>
{{-- p --}}
            <div class="method-card method-all method-short bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
            <div class="w-28 h-28 rounded-full bg-pink-100 flex items-center justify-center flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">
                <img 
                    src="/images/icons/power-hour.png" 
                    alt="Power Hour"
                    class="w-16 h-16 object-contain"
                >
                </div>                
                <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#E63E88] leading-tight">Power Hour</h3>
                        <span class="text-[10px] font-black bg-[#E63E88] text-white px-2.5 py-1 rounded-full uppercase">60m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 font-semibold">
                    Satu jam fokus penuh untuk menyelesaikan tugas spesifik dengan deadline ketat.                    </p>
                    <a href="/room/power-hour" class="text-xs font-black text-[#E63E88] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>

            <div class="method-card method-all method-exam bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
<div class="w-28 h-28 rounded-full bg-pink-100 flex items-center justify-center flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">
                <img 
                    src="/images/icons/study-block.png" 
                    alt="Study Block"
                    class="w-16 h-16 object-contain"
                >
                </div>                
                <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#384D95] leading-tight">Study Block</h3>
                        <span class="text-[10px] font-black bg-[#384D95] text-white px-2.5 py-1 rounded-full uppercase">180m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 font-semibold">
                    Blok waktu intensif untuk menguasai materi ujian, termasuk sesi review dan latihan soal.                    </p>
                    <a href="/room/study-block" class="text-xs font-black text-[#384D95] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>

        </div>

        <div class="mt-10 z-10 text-center">
            <div class="inline-block bg-white/30 backdrop-blur-sm px-10 py-4 rounded-full border border-white/50 shadow-sm">
                <p class="text-[#384D95] font-black text-sm italic">💡 Tips: Pilih metode Marathon jika kamu perlu mengejar materi dalam satu malam!</p>
            </div>
        </div>
    </div>
</main>

<style>
    /* Styling Dasar & Interaktif */
    #interactive-bg { cursor: pointer; pointer-events: auto; display: block; }

    .filter-btn.active {
        background: linear-gradient(to right, #E63E88, #d42d74);
        color: white;
        border-color: transparent;
        box-shadow: 0 10px 20px rgba(230, 62, 136, 0.4);
    }

    .method-card {
        animation: slideInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .method-card.hide { display: none !important; }
    .method-card.show { display: flex !important; }

    @keyframes slideInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
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
    /* --- LOGIKA FILTER (Library Khusus) --- */
    function filterMethods(category) {
        // Mengubah status tombol filter
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active', 'bg-gradient-to-r', 'from-[#E63E88]', 'to-[#d42d74]', 'text-white');
        });
        event.currentTarget.classList.add('active');

        // Menyaring kartu berdasarkan kelas
        const cards = document.querySelectorAll('.method-card');
        cards.forEach(card => {
            if (category === 'all' || card.classList.contains(`method-${category}`)) {
                card.classList.remove('hide');
                card.classList.add('show');
            } else {
                card.classList.add('hide');
                card.classList.remove('show');
            }
        });
    }

    /* --- LOGIKA CANVAS (Identik dengan About) --- */
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
        liquidBlobs.push(new LiquidBlob((Math.random() - 0.5) * 600, (Math.random() - 0.5) * 600));
    }

    let mouseX = canvas.width / 2;
    let mouseY = canvas.height / 2;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        if (Math.random() > 0.7) {
            particles.push(new Particle(mouseX + (Math.random() - 0.5) * 30, mouseY + (Math.random() - 0.5) * 30));
        }
    });

    document.addEventListener('click', (e) => {
        for (let i = 0; i < 30; i++) {
            const angle = (Math.PI * 2 * i) / 30;
            const p = new Particle(e.clientX, e.clientY);
            p.vx = Math.cos(angle) * 5;
            p.vy = Math.sin(angle) * 5;
            particles.push(p);
        }
    });

    function animate() {
        // Clear background with soft white
        ctx.fillStyle = '#FAFBFF';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Update & Draw Blobs
        liquidBlobs.forEach(blob => {
            blob.update(mouseX, mouseY);
            blob.draw();
        });

        // Update & Draw Particles
        for (let i = particles.length - 1; i >= 0; i--) {
            particles[i].update();
            particles[i].draw();
            if (particles[i].life <= 0) particles.splice(i, 1);
        }

        requestAnimationFrame(animate);
    }

    animate();
</script>
@endsection