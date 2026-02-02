@extends('layouts.main')

@section('content')
<canvas id="contact-bg" class="fixed inset-0 -z-10"></canvas>

<main class="min-h-screen pt-12 pb-20 px-4 relative">
    <!-- Header -->
    <div class="text-center mb-16 z-10 relative max-w-2xl mx-auto">
        <h1 class="text-5xl md:text-6xl font-black text-[#384D95] mb-4">Mari Berhubungan 💬</h1>
        <p class="text-lg text-[#384D95] opacity-80 font-medium">Ada pertanyaan, saran, atau feedback? Kami menunggu kabar dari kamu!</p>
    </div>

    <div class="max-w-6xl mx-auto z-10 relative">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Contact Info Section -->
            <div class="space-y-8">
                <!-- Info Cards -->
                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-lg border border-white/20 hover:shadow-xl transition-all hover:scale-105 cursor-pointer">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#E63E88] to-[#d42d74] flex items-center justify-center text-2xl shadow-lg transform group-hover:rotate-12 transition-transform">
                            📧
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-black text-[#384D95] mb-2">Email</h3>
                            <p class="text-[#384D95] opacity-70 font-medium">hello@zonera.id</p>
                            <p class="text-sm text-[#384D95] opacity-50 mt-1">Balas dalam 24 jam</p>
                        </div>
                    </div>
                </div>

                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-lg border border-white/20 hover:shadow-xl transition-all hover:scale-105 cursor-pointer">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#384D95] to-[#2a3a6a] flex items-center justify-center text-2xl shadow-lg transform group-hover:rotate-12 transition-transform">
                            📱
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-black text-[#384D95] mb-2">WhatsApp</h3>
                            <p class="text-[#384D95] opacity-70 font-medium">+62 812-3456-7890</p>
                            <p class="text-sm text-[#384D95] opacity-50 mt-1">Senin-Jumat 09:00-17:00</p>
                        </div>
                    </div>
                </div>

                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-lg border border-white/20 hover:shadow-xl transition-all hover:scale-105 cursor-pointer">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#FFB84D] to-[#ff9500] flex items-center justify-center text-2xl shadow-lg transform group-hover:rotate-12 transition-transform">
                            📍
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-black text-[#384D95] mb-2">Lokasi</h3>
                            <p class="text-[#384D95] opacity-70 font-medium">Jakarta, Indonesia</p>
                            <p class="text-sm text-[#384D95] opacity-50 mt-1">HQ & Support Center</p>
                        </div>
                    </div>
                </div>

                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-lg border border-white/20 hover:shadow-xl transition-all hover:scale-105 cursor-pointer">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#4CAF50] to-[#388E3C] flex items-center justify-center text-2xl shadow-lg transform group-hover:rotate-12 transition-transform">
                            🕐
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-black text-[#384D95] mb-2">Jam Kerja</h3>
                            <p class="text-[#384D95] opacity-70 font-medium">Senin - Jumat</p>
                            <p class="text-sm text-[#384D95] opacity-50 mt-1">09:00 - 17:00 WIB</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-lg border border-white/20">
                    <h3 class="text-xl font-black text-[#384D95] mb-6">Ikuti Kami 👋</h3>
                    <div class="flex gap-4 flex-wrap">
                        <a href="#" class="social-btn w-14 h-14 rounded-2xl bg-gradient-to-br from-[#E63E88] to-[#d42d74] flex items-center justify-center text-white text-xl hover:scale-125 transition-all shadow-lg">
                            f
                        </a>
                        <a href="#" class="social-btn w-14 h-14 rounded-2xl bg-gradient-to-br from-[#384D95] to-[#2a3a6a] flex items-center justify-center text-white text-xl hover:scale-125 transition-all shadow-lg">
                            𝕏
                        </a>
                        <a href="#" class="social-btn w-14 h-14 rounded-2xl bg-gradient-to-br from-[#FFB84D] to-[#ff9500] flex items-center justify-center text-white text-xl hover:scale-125 transition-all shadow-lg">
                            📷
                        </a>
                        <a href="#" class="social-btn w-14 h-14 rounded-2xl bg-gradient-to-br from-[#4CAF50] to-[#388E3C] flex items-center justify-center text-white text-xl hover:scale-125 transition-all shadow-lg">
                            ▶
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="bg-white/90 backdrop-blur-sm p-12 rounded-3xl shadow-2xl border border-white/20">
                <h2 class="text-3xl font-black text-[#384D95] mb-8">Kirim Pesan 📝</h2>
                
                <form id="contactForm" class="space-y-6">
                    <!-- Name Input -->
                    <div class="form-group">
                        <label class="block text-sm font-bold text-[#384D95] mb-3">Nama Lengkap</label>
                        <div class="relative">
                            <input type="text" id="name" name="name" placeholder="Siapa nama kamu?" 
                                class="form-input w-full px-6 py-4 rounded-2xl border-2 border-[#384D95]/20 bg-white/50 focus:bg-white text-[#384D95] font-medium placeholder-[#384D95]/40 focus:outline-none focus:ring-2 focus:ring-[#E63E88] focus:border-transparent transition-all"
                                required>
                            <span class="form-icon absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl">👤</span>
                        </div>
                    </div>

                    <!-- Email Input -->
                    <div class="form-group">
                        <label class="block text-sm font-bold text-[#384D95] mb-3">Email</label>
                        <div class="relative">
                            <input type="email" id="email" name="email" placeholder="email@kamu.com" 
                                class="form-input w-full px-6 py-4 rounded-2xl border-2 border-[#384D95]/20 bg-white/50 focus:bg-white text-[#384D95] font-medium placeholder-[#384D95]/40 focus:outline-none focus:ring-2 focus:ring-[#E63E88] focus:border-transparent transition-all"
                                required>
                            <span class="form-icon absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl">📧</span>
                        </div>
                    </div>

                    <!-- Subject Input -->
                    <div class="form-group">
                        <label class="block text-sm font-bold text-[#384D95] mb-3">Subjek</label>
                        <div class="relative">
                            <select id="subject" name="subject" 
                                class="form-input w-full px-6 py-4 rounded-2xl border-2 border-[#384D95]/20 bg-white/50 focus:bg-white text-[#384D95] font-medium focus:outline-none focus:ring-2 focus:ring-[#E63E88] focus:border-transparent transition-all appearance-none cursor-pointer"
                                required>
                                <option value="">Pilih kategori...</option>
                                <option value="feedback">💡 Feedback & Saran</option>
                                <option value="bug">🐛 Laporkan Bug</option>
                                <option value="feature">✨ Request Fitur</option>
                                <option value="partnership">🤝 Kerjasama</option>
                                <option value="other">❓ Lainnya</option>
                            </select>
                            <span class="form-icon absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl pointer-events-none">▼</span>
                        </div>
                    </div>

                    <!-- Message Input -->
                    <div class="form-group">
                        <label class="block text-sm font-bold text-[#384D95] mb-3">Pesan</label>
                        <textarea id="message" name="message" placeholder="Tulis pesan kamu di sini... (minimal 10 karakter)" rows="6"
                            class="form-input w-full px-6 py-4 rounded-2xl border-2 border-[#384D95]/20 bg-white/50 focus:bg-white text-[#384D95] font-medium placeholder-[#384D95]/40 focus:outline-none focus:ring-2 focus:ring-[#E63E88] focus:border-transparent transition-all resize-none"
                            required></textarea>
                    </div>

                    <!-- Character Counter -->
                    <div class="flex justify-between items-center text-sm">
                        <p id="charCount" class="text-[#384D95]/50 font-medium">0 / 500 karakter</p>
                        <div class="flex gap-2">
                            <input type="checkbox" id="subscribe" class="w-5 h-5 rounded cursor-pointer accent-[#E63E88]">
                            <label for="subscribe" class="text-[#384D95]/70 font-medium cursor-pointer">Subscribe newsletter</label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn w-full bg-gradient-to-r from-[#E63E88] to-[#d42d74] text-white font-black py-4 rounded-2xl mt-8 shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all active:scale-95 flex items-center justify-center gap-2 text-lg">
                        <span>🚀 Kirim Pesan</span>
                        <span class="submit-arrow">→</span>
                    </button>

                    <!-- Success Message -->
                    <div id="successMessage" class="hidden bg-green-100/80 backdrop-blur-sm border-2 border-green-500 text-green-700 px-6 py-4 rounded-2xl font-bold text-center animate-bounce-in">
                        ✓ Terima kasih! Pesan kamu sudah terkirim. Kami akan segera menghubungi kamu! 🎉
                    </div>

                    <!-- Error Message -->
                    <div id="errorMessage" class="hidden bg-red-100/80 backdrop-blur-sm border-2 border-red-500 text-red-700 px-6 py-4 rounded-2xl font-bold text-center">
                        ✗ Oops! Ada yang salah. Coba lagi!
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-40px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(40px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes bounce-in {
        0% {
            opacity: 0;
            transform: scale(0.95) translateY(-20px);
        }
        70% {
            transform: scale(1.02);
        }
        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    @keyframes inputFocus {
        from {
            box-shadow: 0 0 0 0 rgba(230, 62, 136, 0.3);
        }
        to {
            box-shadow: 0 0 0 8px rgba(230, 62, 136, 0);
        }
    }

    @keyframes shimmer {
        0%, 100% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }

    .animate-bounce-in {
        animation: bounce-in 0.6s ease-out;
    }

    /* Contact Info Cards */
    .group {
        animation: fadeInUp 0.6s ease-out;
    }

    .group:nth-child(1) { animation-delay: 0.1s; }
    .group:nth-child(2) { animation-delay: 0.2s; }
    .group:nth-child(3) { animation-delay: 0.3s; }
    .group:nth-child(4) { animation-delay: 0.4s; }
    .group:nth-child(5) { animation-delay: 0.5s; }

    /* Form Container */
    .bg-white\/90 {
        animation: slideInRight 0.7s ease-out;
    }

    /* Form Inputs */
    .form-group {
        animation: fadeInUp 0.6s ease-out;
    }

    .form-input {
        transition: all 0.3s ease;
    }

    .form-input:focus {
        animation: inputFocus 0.6s ease-out;
    }

    .form-icon {
        transition: transform 0.3s ease;
    }

    .form-input:focus + .form-icon {
        animation: float 2s ease-in-out infinite;
    }

    /* Social Buttons */
    .social-btn {
        transition: all 0.3s ease;
    }

    .social-btn:hover {
        animation: float 1.5s ease-in-out infinite;
    }

    /* Submit Button */
    .submit-btn {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .submit-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s ease;
    }

    .submit-btn:hover::before {
        left: 100%;
    }

    .submit-arrow {
        transition: transform 0.3s ease;
    }

    .submit-btn:hover .submit-arrow {
        transform: translateX(4px);
    }

    /* Canvas Background */
    #contact-bg {
        pointer-events: auto;
        display: block;
    }

    /* Scrollbar */
    input::-webkit-scrollbar,
    select::-webkit-scrollbar,
    textarea::-webkit-scrollbar {
        width: 8px;
    }

    input::-webkit-scrollbar-track,
    select::-webkit-scrollbar-track,
    textarea::-webkit-scrollbar-track {
        background: #f0f0f0;
        border-radius: 10px;
    }

    input::-webkit-scrollbar-thumb,
    select::-webkit-scrollbar-thumb,
    textarea::-webkit-scrollbar-thumb {
        background: #E63E88;
        border-radius: 10px;
    }

    input::-webkit-scrollbar-thumb:hover,
    select::-webkit-scrollbar-thumb:hover,
    textarea::-webkit-scrollbar-thumb:hover {
        background: #d42d74;
    }

    /* Select Dropdown Arrow */
    select {
        padding-right: 3rem;
    }

    select option {
        padding: 10px;
        color: #384D95;
        background-color: white;
    }

    /* Input Placeholder */
    input::placeholder,
    textarea::placeholder {
        font-weight: 500;
    }
</style>

<script>
    // Canvas Background Animation
    const canvas = document.getElementById('contact-bg');
    const ctx = canvas.getContext('2d');

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    function drawBackground() {
        const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
        gradient.addColorStop(0, '#FAFBFF');
        gradient.addColorStop(0.5, '#F5F7FF');
        gradient.addColorStop(1, '#FAFBFF');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Decorative circles
        ctx.globalAlpha = 0.12;
        ctx.strokeStyle = '#E63E88';
        ctx.lineWidth = 2;
        const time = Date.now() * 0.0001;
        for (let i = 0; i < 4; i++) {
            const x = canvas.width * (0.25 + Math.sin(time + i) * 0.25);
            const y = canvas.height * (0.3 + Math.cos(time * 0.8 + i) * 0.25);
            const radius = 150 + Math.sin(time + i * 2) * 100;
            ctx.beginPath();
            ctx.arc(x, y, radius, 0, Math.PI * 2);
            ctx.stroke();
        }
        ctx.globalAlpha = 1;
    }

    function animate() {
        drawBackground();
        requestAnimationFrame(animate);
    }
    animate();

    // Form Handling
    const contactForm = document.getElementById('contactForm');
    const messageInput = document.getElementById('message');
    const charCount = document.getElementById('charCount');
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');

    // Character Counter
    messageInput.addEventListener('input', () => {
        const count = messageInput.value.length;
        charCount.textContent = `${count} / 500 karakter`;
        
        if (count > 500) {
            messageInput.value = messageInput.value.substring(0, 500);
        }
    });

    // Form Submission
    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;
        const subscribe = document.getElementById('subscribe').checked;

        // Validation
        if (message.length < 10) {
            errorMessage.classList.remove('hidden');
            errorMessage.textContent = '✗ Pesan minimal 10 karakter!';
            setTimeout(() => errorMessage.classList.add('hidden'), 3000);
            return;
        }

        // Show loading state
        const submitBtn = contactForm.querySelector('.submit-btn');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '⏳ Mengirim...';
        submitBtn.disabled = true;

        // Simulate sending (bisa diganti dengan API call)
        setTimeout(() => {
            // Reset form
            contactForm.reset();
            charCount.textContent = '0 / 500 karakter';
            
            // Show success message
            successMessage.classList.remove('hidden');
            errorMessage.classList.add('hidden');

            // Reset button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;

            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.classList.add('hidden');
            }, 5000);

            console.log('Form Data:', { name, email, subject, message, subscribe });
        }, 1500);
    });

    // Input Focus Animation
    document.querySelectorAll('.form-input').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });

    // Social buttons ripple effect
    document.querySelectorAll('.social-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const ripple = document.createElement('span');
            const rect = btn.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            btn.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    });
</script>
@endsection
