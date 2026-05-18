@extends('layouts.app')

@section('title', 'Galeri Suasana - Zonera')

@section('content')
<div class="container">
    <div style="text-align: center; margin-bottom: 3rem;">
        <h1>Galeri Suasana Belajar</h1>
        <p style="font-size: 1.1rem; max-width: 600px; margin: 1rem auto; color: var(--text-secondary);">
            Jelajahi berbagai suasana dan lingkungan belajar. Setiap mood memiliki energi dan keunikan tersendiri.
        </p>
    </div>

    <!-- Gallery Grid -->
    <div class="mood-gallery fade-in-up">
        <!-- Rainy Day -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #a89a8a 0%, #8a7a6a 100%); font-size: 5rem;">
                🌧️
            </div>
            <div class="mood-info">
                <div class="mood-name">Hari Hujan Tenang</div>
                <div class="mood-description">Suara hujan yang lembut. Sempurna untuk fokus dalam dan pemahaman mendalam.</div>
            </div>
        </div>

        <!-- Night Peaceful -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #4a4035 0%, #3a3025 100%); font-size: 5rem;">
                🌙
            </div>
            <div class="mood-info">
                <div class="mood-name">Malam Tenang</div>
                <div class="mood-description">Kegelapan yang nyaman dengan pencahayaan lembut. Ideal untuk belajar malam hari tanpa eye strain.</div>
            </div>
        </div>

        <!-- Cozy Cafe -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #d4a574 0%, #c4956a 100%); font-size: 5rem;">
                ☕
            </div>
            <div class="mood-info">
                <div class="mood-name">Kafe Hangat</div>
                <div class="mood-description">Suasana kafe yang cozy dengan buzz ringan. Motivasi dari kehadiran orang lain yang belajar.</div>
            </div>
        </div>

        <!-- Forest Ambiance -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #7a9a7a 0%, #5a8a5a 100%); font-size: 5rem;">
                🌲
            </div>
            <div class="mood-info">
                <div class="mood-name">Hutan Sejuk</div>
                <div class="mood-description">Suara alam dan bau segar pinus. Menenangkan dan meningkatkan kreativitas.</div>
            </div>
        </div>

        <!-- Beach Wave -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #b8a89a 0%, #a89a7a 100%); font-size: 5rem;">
                🌊
            </div>
            <div class="mood-info">
                <div class="mood-name">Pantai Berombang</div>
                <div class="mood-description">Suara ombak yang ritmik dan menenangkan. Sempurna untuk brainstorming dan ide-ide kreatif.</div>
            </div>
        </div>

        <!-- Library Quiet -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #b8a89a 0%, #a89a8a 100%); font-size: 5rem;">
                📚
            </div>
            <div class="mood-info">
                <div class="mood-name">Perpustakaan Sunyi</div>
                <div class="mood-description">Kesunyian absolut dengan cahaya alami. Untuk konsentrasi maksimal dan pekerjaan yang detail.</div>
            </div>
        </div>

        <!-- Sunrise Golden -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #f4c894 0%, #e4b884 100%); font-size: 5rem;">
                🌅
            </div>
            <div class="mood-info">
                <div class="mood-name">Pagi Cerah</div>
                <div class="mood-description">Cahaya matahari pagi yang hangat. Energi positif dan motivasi tinggi untuk memulai hari.</div>
            </div>
        </div>

        <!-- Urban Minimalist -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #dcc8b8 0%, #cbb8a8 100%); font-size: 5rem;">
                🏢
            </div>
            <div class="mood-info">
                <div class="mood-name">Ruang Minimalis</div>
                <div class="mood-description">Estetika modern yang clean. Untuk fokus tanpa distraksi visual apapun.</div>
            </div>
        </div>

        <!-- Garden Bloom -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #d8b8a8 0%, #c8a898 100%); font-size: 5rem;">
                🌻
            </div>
            <div class="mood-info">
                <div class="mood-name">Taman Bunga</div>
                <div class="mood-description">Warna cerah dan kehidupan alam. Menginspirasi kreativitas dan semangat belajar.</div>
            </div>
        </div>

        <!-- Fireplace Cozy -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #b87a5a 0%, #a86a4a 100%); font-size: 5rem;">
                🔥
            </div>
            <div class="mood-info">
                <div class="mood-name">Perapian Hangat</div>
                <div class="mood-description">Kehangatan api yang nyaman. Ideal untuk pembelajaran yang santai dan refleksif.</div>
            </div>
        </div>

        <!-- Study Space Classic -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #c8b8a8 0%, #b8a898 100%); font-size: 5rem;">
                💼
            </div>
            <div class="mood-info">
                <div class="mood-name">Ruang Studi Klasik</div>
                <div class="mood-description">Tradisional dan terpercaya. Atmosfer yang mendukung pembelajaran serius dan terstruktur.</div>
            </div>
        </div>

        <!-- Mountain View -->
        <div class="mood-card" onclick="zoomMood(this)">
            <div class="mood-thumbnail" style="background: linear-gradient(135deg, #9a8a7a 0%, #8a7a6a 100%); font-size: 5rem;">
                ⛰️
            </div>
            <div class="mood-info">
                <div class="mood-name">Pemandangan Gunung</div>
                <div class="mood-description">Pemandangan luas dan menenangkan. Memberikan perspektif dan mengingatkan pentingnya pembelajaran.</div>
            </div>
        </div>
    </div>

    <!-- Zoom View Modal -->
    <div id="mood-modal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.7); z-index: 1000; padding: 20px; display: flex; align-items: center; justify-content: center;">
        <div style="background-color: var(--bg-main); border-radius: 16px; padding: 2rem; max-width: 600px; width: 100%; max-height: 80vh; overflow-y: auto;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <h2 id="modal-title" style="margin: 0; color: var(--accent-dark);"></h2>
                <button onclick="closeZoom()" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: var(--text-secondary);">✕</button>
            </div>
            <div id="modal-thumbnail" style="width: 100%; height: 300px; border-radius: 12px; margin-bottom: 2rem; display: flex; align-items: center; justify-content: center; font-size: 8rem; background: linear-gradient(135deg, var(--surface-primary) 0%, var(--surface-secondary) 100%);"></div>
            <p id="modal-description" style="line-height: 1.6; margin-bottom: 2rem; color: var(--text-secondary); font-size: 1rem;"></p>
            <a href="{{ route('room') }}" class="btn btn-dark">Gunakan Suasana Ini</a>
        </div>
    </div>

    <div style="text-align: center; margin-top: 4rem;">
        <p style="color: var(--text-secondary); max-width: 600px; margin: 0 auto;">
            Setiap suasana dirancang dengan cermat untuk mendukung fokus dan kreativitas. 
            Pilih yang paling resonan dengan mood belajarmu hari ini.
        </p>
    </div>
</div>

<script>
function zoomMood(element) {
    const card = element;
    const thumbnail = card.querySelector('.mood-thumbnail');
    const name = card.querySelector('.mood-name').textContent;
    const description = card.querySelector('.mood-description').textContent;
    
    // Fill modal
    document.getElementById('modal-title').textContent = name;
    document.getElementById('modal-thumbnail').textContent = thumbnail.textContent;
    document.getElementById('modal-thumbnail').style.background = window.getComputedStyle(thumbnail).background;
    document.getElementById('modal-description').textContent = description;
    
    // Show modal
    document.getElementById('mood-modal').style.display = 'flex';
}

function closeZoom() {
    document.getElementById('mood-modal').style.display = 'none';
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('mood-modal');
    if (event.target === modal) {
        closeZoom();
    }
});
</script>

<style>
.mood-card {
    cursor: pointer;
    user-select: none;
}

.mood-card .mood-thumbnail {
    transition: transform 0.3s ease;
}

.mood-card:hover .mood-thumbnail {
    transform: scale(1.05);
}
</style>
@endsection
