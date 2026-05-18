@extends('layouts.app')

@section('title', 'Zonera - Ruang Belajar Virtual yang Tenang')

@section('content')
<div class="container">
    <div style="text-align: center; margin-bottom: 4rem;">
        <h1>Selamat Datang di Zonera</h1>
        <p style="font-size: 1.1rem; max-width: 600px; margin: 1rem auto;">
            Ruang belajar virtual yang tenang dan menenangkan. Pilih meja belajarmu dan fokus dengan santai.
        </p>
    </div>

    <!-- Isometric Study Room -->
    <div class="study-room fade-in-up">
        <div class="room-desks-grid">
            <div class="desk-card" onclick="selectDesk(this)">
                <div style="font-size: 2.5rem; margin-bottom: 8px;">📚</div>
                <p>Meja 1</p>
                <p style="font-size: 0.75rem; margin-top: 4px;">Terang & Nyaman</p>
            </div>
            <div class="desk-card" onclick="selectDesk(this)">
                <div style="font-size: 2.5rem; margin-bottom: 8px;">🌙</div>
                <p>Meja 2</p>
                <p style="font-size: 0.75rem; margin-top: 4px;">Malam Tenang</p>
            </div>
            <div class="desk-card occupied" onclick="selectDesk(this)">
                <div class="avatar-mini"></div>
                <div class="desk-lamp-small"></div>
                <p>Meja 3</p>
                <p style="font-size: 0.75rem; margin-top: 4px;">Sedang Digunakan</p>
            </div>
            <div class="desk-card" onclick="selectDesk(this)">
                <div style="font-size: 2.5rem; margin-bottom: 8px;">☕</div>
                <p>Meja 4</p>
                <p style="font-size: 0.75rem; margin-top: 4px;">Cafe Hangat</p>
            </div>
            <div class="desk-card" onclick="selectDesk(this)">
                <div style="font-size: 2.5rem; margin-bottom: 8px;">🌧️</div>
                <p>Meja 5</p>
                <p style="font-size: 0.75rem; margin-top: 4px;">Hujan Menenangkan</p>
            </div>
            <div class="desk-card" onclick="selectDesk(this)">
                <div style="font-size: 2.5rem; margin-bottom: 8px;">🌻</div>
                <p>Meja 6</p>
                <p style="font-size: 0.75rem; margin-top: 4px;">Terang Alami</p>
            </div>
        </div>
    </div>

    <div style="text-align: center; margin-top: 4rem;">
        <p style="color: var(--text-secondary); margin-bottom: 1.5rem;">
            Tidak ada kompetisi, hanya fokus bersama untuk belajar lebih baik.
        </p>
        <a href="{{ route('room') }}" class="btn btn-dark">Mulai Belajar</a>
    </div>
</div>

<script>
function selectDesk(element) {
    if (element.classList.contains('occupied')) {
        alert('Meja ini sedang digunakan. Silakan pilih meja lain.');
        return;
    }
    
    // Remove previous selection
    document.querySelectorAll('.desk-card').forEach(card => {
        card.style.borderColor = '';
    });
    
    // Add selection
    element.style.borderColor = 'var(--accent-dark)';
}
</script>
@endsection
