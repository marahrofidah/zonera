@extends('layouts.main')
@section('content')
<canvas id="interactive-bg" class="fixed inset-0 -z-10"></canvas>

<main class="min-h-screen flex flex-col items-center justify-center pt-20 pb-32 relative px-4">
    <div class="w-full max-w-7xl mx-auto">
        <div class="text-center mb-16 z-10">
            <h1 class="text-5xl md:text-6xl font-black text-[#384D95] mb-4">Pilih Metode Fokusmu</h1>
            <p class="text-xl text-[#384D95] opacity-70 font-medium">Klik metode untuk melihat detail dan mulai belajar! 🎯</p>
        </div>

        <div class="mb-12 z-10 flex flex-wrap justify-center gap-3">
            <button onclick="filterMethods('all')" class="filter-btn active px-8 py-3.5 rounded-full font-bold transition-all duration-300 bg-gradient-to-r from-[#E63E88] to-[#d42d74] text-white shadow-lg hover:scale-110 text-base">🎯 Semua</button>
            <button onclick="filterMethods('short')" class="filter-btn px-8 py-3.5 rounded-full font-bold transition-all duration-300 border-2 border-[#384D95] text-[#384D95] bg-white/50 hover:bg-[#384D95] hover:text-white text-base">⚡ Singkat</button>
            <button onclick="filterMethods('long')" class="filter-btn px-8 py-3.5 rounded-full font-bold transition-all duration-300 border-2 border-[#E63E88] text-[#E63E88] bg-white/50 hover:bg-[#E63E88] hover:text-white text-base">🔥 Panjang</button>
            <button onclick="filterMethods('exam')" class="filter-btn px-8 py-3.5 rounded-full font-bold transition-all duration-300 border-2 border-[#384D95] text-[#384D95] bg-white/50 hover:bg-[#384D95] hover:text-white text-base">📚 Ujian</button>
        </div>

        <div class="z-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="method-card method-all method-short bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
                <div class="w-28 h-28 rounded-full bg-pink-100 flex items-center justify-center text-5xl flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">🍅</div>
                <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#E63E88] leading-tight">Pomodoro</h3>
                        <span class="text-[10px] font-black bg-[#E63E88] text-white px-2.5 py-1 rounded-full uppercase">25m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 line-clamp-2 font-semibold">
                        Teknik klasik: 25 menit fokus penuh dan 5 menit istirahat untuk menjaga stamina mental.
                    </p>
                    <a href="/app?method=pomodoro" class="text-xs font-black text-[#E63E88] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>

            <div class="method-card method-all method-long bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
                <div class="w-28 h-28 rounded-full bg-blue-100 flex items-center justify-center text-5xl flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">🧠</div>
                <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#384D95] leading-tight">Deep Work</h3>
                        <span class="text-[10px] font-black bg-[#384D95] text-white px-2.5 py-1 rounded-full uppercase">90m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 line-clamp-2 font-semibold">
                        Sesi intens tanpa gangguan. Cocok untuk tugas kognitif berat yang butuh analisa dalam.
                    </p>
                    <a href="/app?method=deep-work" class="text-xs font-black text-[#384D95] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>

            <div class="method-card method-all method-short bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
                <div class="w-28 h-28 rounded-full bg-pink-100 flex items-center justify-center text-5xl flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">⚡</div>
                <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#E63E88] leading-tight">Ultradian</h3>
                        <span class="text-[10px] font-black bg-[#E63E88] text-white px-2.5 py-1 rounded-full uppercase">50m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 line-clamp-2 font-semibold">
                        Bekerja mengikuti ritme alami tubuh (90-120 menit) untuk produktivitas yang berkelanjutan.
                    </p>
                    <a href="/app?method=ultradian" class="text-xs font-black text-[#E63E88] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>

            <div class="method-card method-all method-exam bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
                <div class="w-28 h-28 rounded-full bg-blue-100 flex items-center justify-center text-5xl flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">🏃</div>
                <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#384D95] leading-tight">Marathon</h3>
                        <span class="text-[10px] font-black bg-[#384D95] text-white px-2.5 py-1 rounded-full uppercase">120m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 line-clamp-2 font-semibold">
                        Sesi belajar marathon dengan jeda recovery singkat. Dirancang khusus untuk persiapan ujian.
                    </p>
                    <a href="/app?method=marathon" class="text-xs font-black text-[#384D95] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>

            <div class="method-card method-all method-short bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
                <div class="w-28 h-28 rounded-full bg-pink-100 flex items-center justify-center text-5xl flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">💪</div>
                <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#E63E88] leading-tight">Power Hour</h3>
                        <span class="text-[10px] font-black bg-[#E63E88] text-white px-2.5 py-1 rounded-full uppercase">60m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 line-clamp-2 font-semibold">
                        Satu jam tanpa ampun. Tuntaskan tugas spesifik dengan fokus dan kecepatan maksimal.
                    </p>
                    <a href="/app?method=power-hour" class="text-xs font-black text-[#E63E88] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>

            <div class="method-card method-all method-exam bg-white/90 backdrop-blur-md rounded-full p-4 pr-10 transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-white flex items-center gap-5 cursor-pointer group shadow-sm">
                <div class="w-28 h-28 rounded-full bg-blue-100 flex items-center justify-center text-5xl flex-shrink-0 group-hover:rotate-12 transition-transform shadow-inner">📚</div>
                <div class="flex flex-col min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-black text-[#384D95] leading-tight">Study Block</h3>
                        <span class="text-[10px] font-black bg-[#384D95] text-white px-2.5 py-1 rounded-full uppercase">180m</span>
                    </div>
                    <p class="text-[#384D95] text-xs opacity-80 leading-snug my-2 line-clamp-2 font-semibold">
                        Blok waktu komprehensif untuk penguasaan materi secara menyeluruh dan latihan soal.
                    </p>
                    <a href="/app?method=study-block" class="text-xs font-black text-[#384D95] hover:underline transition-all">MULAI SESI →</a>
                </div>
            </div>

        </div>

        <div class="mt-14 z-10 text-center">
            <div class="inline-block bg-white/30 backdrop-blur-sm px-10 py-4 rounded-full border border-white/50 shadow-sm">
                <p class="text-[#384D95] font-black text-sm italic">💡 Tips: Pilih metode Marathon jika kamu perlu mengejar materi dalam satu malam!</p>
            </div>
        </div>
    </div>
</main>

<style>
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
</style>

<script>
    // Logika Filter (Aman & Berfungsi)
    function filterMethods(category) {
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active', 'bg-gradient-to-r', 'from-[#E63E88]', 'to-[#d42d74]', 'text-white');
        });
        event.currentTarget.classList.add('active');

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

    // Logika Canvas Background (Aman & Berfungsi)
    const canvas = document.getElementById('interactive-bg');
    const ctx = canvas.getContext('2d');
    const colors = ['#E63E88', '#384D95', '#F0F0F5'];

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    class LiquidBlob {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.radius = 15 + Math.random() * 20;
            this.color = colors[Math.floor(Math.random() * colors.length)];
        }
        update(mx, my) {
            this.x += (mx - this.x) * 0.04;
            this.y += (my - this.y) * 0.04;
        }
        draw() {
            ctx.globalAlpha = 0.15;
            ctx.fillStyle = this.color;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius * 4, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    const blobs = Array.from({length: 4}, () => new LiquidBlob());
    let mx = canvas.width/2, my = canvas.height/2;
    document.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });

    function animate() {
        ctx.clearRect(0,0, canvas.width, canvas.height);
        blobs.forEach(b => { b.update(mx, my); b.draw(); });
        requestAnimationFrame(animate);
    }
    animate();
</script>
@endsection