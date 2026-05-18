@extends('layouts.app')

@section('title', 'Kontak - Zonera')

@section('content')
<div class="container">
    <div style="text-align: center; margin-bottom: 3rem;">
        <h1>Hubungi Kami</h1>
        <p style="font-size: 1.1rem; max-width: 600px; margin: 1rem auto; color: var(--text-secondary);">
            Kami mendengarkan. Masukan dan saran Anda membantu kami menciptakan pengalaman belajar yang lebih baik.
        </p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-bottom: 3rem;">
        <!-- Contact Form -->
        <div class="fade-in-up">
            <div class="card">
                <h2 style="color: var(--accent-dark); margin-bottom: 1.5rem;">Kirim Pesan</h2>
                
                <form id="contactForm" onsubmit="handleSubmit(event)">
                    <div style="margin-bottom: 1.5rem;">
                        <label for="name" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-primary);">Nama</label>
                        <input type="text" id="name" name="name" required
                            style="width: 100%; padding: 0.8rem 1rem; border: 1px solid var(--border-light); border-radius: 8px; background-color: var(--bg-main); color: var(--text-primary); font-size: 0.95rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="email" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-primary);">Email</label>
                        <input type="email" id="email" name="email" required
                            style="width: 100%; padding: 0.8rem 1rem; border: 1px solid var(--border-light); border-radius: 8px; background-color: var(--bg-main); color: var(--text-primary); font-size: 0.95rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="subject" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-primary);">Subjek</label>
                        <select id="subject" name="subject" required
                            style="width: 100%; padding: 0.8rem 1rem; border: 1px solid var(--border-light); border-radius: 8px; background-color: var(--bg-main); color: var(--text-primary); font-size: 0.95rem;">
                            <option value="">-- Pilih Subjek --</option>
                            <option value="suggestion">Saran Fitur</option>
                            <option value="bug">Laporan Bug</option>
                            <option value="feedback">Feedback Umum</option>
                            <option value="question">Pertanyaan</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="message" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-primary);">Pesan</label>
                        <textarea id="message" name="message" rows="5" required
                            style="width: 100%; padding: 0.8rem 1rem; border: 1px solid var(--border-light); border-radius: 8px; background-color: var(--bg-main); color: var(--text-primary); font-size: 0.95rem; resize: vertical; font-family: inherit;"></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark" style="width: 100%;">
                        Kirim Pesan
                    </button>
                </form>

                <div id="successMessage" style="display: none; margin-top: 1.5rem; padding: 1rem; background-color: #e8f5e9; border: 1px solid #c8e6c9; border-radius: 8px; color: #2e7d32; text-align: center;">
                    ✓ Terima kasih! Pesan Anda telah kami terima. Kami akan merespons segera.
                </div>
            </div>
        </div>

        <!-- Contact Info & Social -->
        <div class="slide-in-left" style="animation-delay: 0.1s;">
            <div class="card">
                <h2 style="color: var(--accent-dark); margin-bottom: 1.5rem;">Informasi Kontak</h2>
                
                <div style="margin-bottom: 2rem;">
                    <h3 style="color: var(--text-primary); font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem;">Email</h3>
                    <p style="color: var(--text-secondary); word-break: break-all;">hello@zonera.app</p>
                </div>

                <div style="margin-bottom: 2rem;">
                    <h3 style="color: var(--text-primary); font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem;">Jam Respons</h3>
                    <p style="color: var(--text-secondary);">Senin - Jumat: 09:00 - 18:00 WIB</p>
                    <p style="color: var(--text-secondary);">Sabtu - Minggu: 10:00 - 16:00 WIB</p>
                </div>

                <div style="margin-bottom: 2rem;">
                    <h3 style="color: var(--text-primary); font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem;">Media Sosial</h3>
                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: var(--surface-secondary); border-radius: 8px; color: var(--accent-dark); text-decoration: none; transition: all 0.3s ease; font-weight: bold;">f</a>
                        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: var(--surface-secondary); border-radius: 8px; color: var(--accent-dark); text-decoration: none; transition: all 0.3s ease; font-weight: bold;">𝕏</a>
                        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: var(--surface-secondary); border-radius: 8px; color: var(--accent-dark); text-decoration: none; transition: all 0.3s ease; font-weight: bold;">📷</a>
                        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: var(--surface-secondary); border-radius: 8px; color: var(--accent-dark); text-decoration: none; transition: all 0.3s ease; font-weight: bold;">▶</a>
                    </div>
                </div>

                <hr style="border: none; border-top: 1px solid var(--border-light); margin: 2rem 0;">

                <div>
                    <h3 style="color: var(--text-primary); font-size: 1rem; font-weight: 600; margin-bottom: 1rem;">Pertanyaan Umum</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.8rem;">
                            <a href="#" style="color: var(--accent-dark); text-decoration: none; transition: color 0.3s ease;">→ Bagaimana cara membuat akun?</a>
                        </li>
                        <li style="margin-bottom: 0.8rem;">
                            <a href="#" style="color: var(--accent-dark); text-decoration: none; transition: color 0.3s ease;">→ Apakah Zonera gratis?</a>
                        </li>
                        <li style="margin-bottom: 0.8rem;">
                            <a href="#" style="color: var(--accent-dark); text-decoration: none; transition: color 0.3s ease;">→ Bagaimana cara reset password?</a>
                        </li>
                        <li>
                            <a href="#" style="color: var(--accent-dark); text-decoration: none; transition: color 0.3s ease;">→ Lihat semua FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div style="background-color: var(--surface-secondary); border-radius: 12px; padding: 2rem; text-align: center;">
        <h2 style="color: var(--accent-dark); margin-bottom: 1rem;">Bergabung dengan Komunitas Zonera</h2>
        <p style="color: var(--text-secondary); max-width: 600px; margin: 1rem auto 2rem; line-height: 1.6;">
            Komunitas Zonera terdiri dari ribuan pelajar yang berkomitmen untuk fokus dan pertumbuhan personal. 
            Bagian dari komunitas ini berarti Anda tidak pernah belajar sendirian.
        </p>
        <a href="{{ route('home') }}" class="btn btn-dark">Mulai Sekarang</a>
    </div>
</div>

<script>
function handleSubmit(event) {
    event.preventDefault();
    
    // Collect form data
    const formData = new FormData(event.target);
    const data = {
        name: formData.get('name'),
        email: formData.get('email'),
        subject: formData.get('subject'),
        message: formData.get('message')
    };
    
    // Show success message (in production, this would send to a server)
    console.log('Form submitted:', data);
    
    event.target.style.display = 'none';
    document.getElementById('successMessage').style.display = 'block';
    
    // Reset form after 3 seconds
    setTimeout(() => {
        event.target.reset();
        event.target.style.display = 'block';
        document.getElementById('successMessage').style.display = 'none';
    }, 3000);
}
</script>
@endsection
