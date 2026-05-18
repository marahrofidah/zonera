@extends('layouts.app')

@section('title', 'Tentang Zonera - Filosofi Pembelajaran Bersama')

@section('content')
<div class="container">
    <div style="text-align: center; margin-bottom: 4rem;">
        <h1>Tentang Zonera</h1>
        <p style="font-size: 1.1rem; max-width: 600px; margin: 1rem auto; color: var(--text-secondary);">
            Filosofi pembelajaran kami berpusat pada kebersamaan dan motivasi sosial tanpa kompetisi.
        </p>
    </div>

    <!-- Concept Visualization -->
    <div class="study-room fade-in-up" style="margin-bottom: 3rem;">
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; align-items: center; justify-items: center;">
            <div style="text-align: center;">
                <div class="avatar-mini" style="margin: 0 auto 12px;"></div>
                <p style="font-size: 0.85rem;">Dia Belajar</p>
            </div>
            <div style="text-align: center;">
                <div class="avatar-mini" style="margin: 0 auto 12px; background: linear-gradient(135deg, #8b7355, #a0826d);"></div>
                <p style="font-size: 0.85rem;">Kamu Fokus</p>
            </div>
            <div style="text-align: center;">
                <div class="avatar-mini" style="margin: 0 auto 12px; background: linear-gradient(135deg, #6b5b4f, #7e6961);"></div>
                <p style="font-size: 0.85rem;">Kami Dukung</p>
            </div>
            <div style="text-align: center;">
                <div class="avatar-mini" style="margin: 0 auto 12px; background: linear-gradient(135deg, #9b7e6f, #b0926b);"></div>
                <p style="font-size: 0.85rem;">Bersama Tumbuh</p>
            </div>
        </div>
    </div>

    <!-- Philosophy Cards -->
    <div class="grid grid-3 mb-4">
        <div class="card slide-in-left">
            <h3 style="color: var(--accent-dark); margin-bottom: 1rem;">🤝 Kebersamaan</h3>
            <p>
                Di Zonera, kamu tidak belajar sendirian. Meskipun tidak ada interaksi langsung, 
                kehadiran pengguna lain memberikan motivasi sosial yang kuat.
            </p>
        </div>
        <div class="card slide-in-left" style="animation-delay: 0.1s;">
            <h3 style="color: var(--accent-dark); margin-bottom: 1rem;">🎯 Fokus Bersama</h3>
            <p>
                Setiap orang yang sedang belajar adalah bagian dari komunitas yang saling mendukung. 
                Kehadiran mereka mengingatkanmu bahwa kamu tidak sendirian dalam perjalanan belajar ini.
            </p>
        </div>
        <div class="card slide-in-left" style="animation-delay: 0.2s;">
            <h3 style="color: var(--accent-dark); margin-bottom: 1rem;">💡 Tanpa Kompetisi</h3>
            <p>
                Kami menghapuskan elemen kompetitif. Ini bukan tentang siapa yang tercepat, 
                tapi tentang siapa yang konsisten dan peduli dengan pertumbuhan dirinya sendiri.
            </p>
        </div>
    </div>

    <!-- Core Values -->
    <div style="background-color: var(--surface-secondary); border-radius: 12px; padding: 2rem; margin-bottom: 3rem;">
        <h2 style="text-align: center; margin-bottom: 2rem;">Nilai Inti Zonera</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
            <div>
                <h3 style="color: var(--accent-dark); font-size: 1.1rem; margin-bottom: 0.8rem;">🏡 Nyaman & Homey</h3>
                <p style="font-size: 0.9rem;">
                    Ruang belajar yang dirancang untuk membuat kamu merasa nyaman seperti di rumah sendiri.
                </p>
            </div>
            <div>
                <h3 style="color: var(--accent-dark); font-size: 1.1rem; margin-bottom: 0.8rem;">☮️ Tenang & Menenangkan</h3>
                <p style="font-size: 0.9rem;">
                    Suasana yang santai dan bebas stress membantu fokus lebih optimal.
                </p>
            </div>
            <div>
                <h3 style="color: var(--accent-dark); font-size: 1.1rem; margin-bottom: 0.8rem;">🌱 Pertumbuhan Berkelanjutan</h3>
                <p style="font-size: 0.9rem;">
                    Belajar adalah perjalanan, bukan destinasi. Kami mendukung pertumbuhan jangka panjang.
                </p>
            </div>
            <div>
                <h3 style="color: var(--accent-dark); font-size: 1.1rem; margin-bottom: 0.8rem;">✨ Minimalisme Bermakna</h3>
                <p style="font-size: 0.9rem;">
                    Hanya yang penting yang kami tampilkan. Tanpa gangguan, hanya fokus.
                </p>
            </div>
            <div>
                <h3 style="color: var(--accent-dark); font-size: 1.1rem; margin-bottom: 0.8rem;">🎭 Fleksibilitas</h3>
                <p style="font-size: 0.9rem;">
                    Pilih metode belajar, musik, dan lingkungan sesuai kebutuhanmu saat ini.
                </p>
            </div>
            <div>
                <h3 style="color: var(--accent-dark); font-size: 1.1rem; margin-bottom: 0.8rem;">💪 Akuntabilitas Sosial</h3>
                <p style="font-size: 0.9rem;">
                    Kehadiran komunitas memotivasi tanpa tekanan. Semua orang sedang berusaha, seperti kamu.
                </p>
            </div>
        </div>
    </div>

    <div style="text-align: center; margin-top: 3rem;">
        <p style="font-size: 1rem; color: var(--text-secondary); max-width: 700px; margin: 0 auto;">
            Bergabunglah dengan ribuan pelajar yang telah menemukan ketenangan dan fokus sejati di Zonera. 
            Belajar tidak harus stressful. Belajar bisa santai, menyenangkan, dan bermakna.
        </p>
        <a href="{{ route('room') }}" class="btn btn-dark" style="margin-top: 2rem;">Mulai Pengalaman Zonera</a>
    </div>
</div>
@endsection
