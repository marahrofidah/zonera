@extends('layouts.app')

@section('title', 'Metode Belajar - Zonera')

@section('content')
<div class="container">
    <div style="text-align: center; margin-bottom: 3rem;">
        <h1>Metode Belajar</h1>
        <p style="font-size: 1.1rem; max-width: 600px; margin: 1rem auto; color: var(--text-secondary);">
            Pilih teknik belajar yang sesuai dengan ritme dan kebutuhanmu untuk fokus lebih optimal.
        </p>
    </div>

    <!-- Filter & Search -->
    <div style="background-color: var(--bg-secondary); border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem; border: 1px solid var(--border-light);">
        <label for="method-filter" style="display: block; margin-bottom: 0.8rem; font-weight: 600; color: var(--text-primary);">Saring Metode:</label>
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <button class="filter-btn active" onclick="filterMethods('all', this)">Semua Metode</button>
            <button class="filter-btn" onclick="filterMethods('short', this)">Sesi Pendek</button>
            <button class="filter-btn" onclick="filterMethods('medium', this)">Sesi Sedang</button>
            <button class="filter-btn" onclick="filterMethods('long', this)">Sesi Panjang</button>
            <button class="filter-btn" onclick="filterMethods('flexible', this)">Fleksibel</button>
        </div>
    </div>

    <!-- Methods Grid -->
    <div class="grid grid-3 fade-in-up" id="methods-grid">
        <!-- Pomodoro Technique -->
        <div class="method-card" data-category="short" onclick="selectMethod(this)">
            <div class="method-icon">🍅</div>
            <div class="method-title">Pomodoro</div>
            <div class="method-duration">25 min + 5 min istirahat</div>
            <div class="method-description">
                Fokus 25 menit penuh, diikuti istirahat singkat. Teknik terbukti meningkatkan produktivitas dengan ritme yang teratur.
            </div>
        </div>

        <!-- Flowtime -->
        <div class="method-card" data-category="flexible" onclick="selectMethod(this)">
            <div class="method-icon">🌊</div>
            <div class="method-title">Flowtime</div>
            <div class="method-duration">Fleksibel sesuai kebutuhan</div>
            <div class="method-description">
                Belajar tanpa timer ketat. Ikuti aliran alami dan istirahat saat ada tanda-tanda lelah. Lebih natural dan flexible.
            </div>
        </div>

        <!-- 50/10 Method -->
        <div class="method-card" data-category="medium" onclick="selectMethod(this)">
            <div class="method-icon">⏱️</div>
            <div class="method-title">50/10 Method</div>
            <div class="method-duration">50 min + 10 min istirahat</div>
            <div class="method-description">
                Sesi fokus lebih panjang dengan jeda istirahat yang cukup. Cocok untuk pelajaran yang memerlukan pemahaman mendalam.
            </div>
        </div>

        <!-- Deep Work Block -->
        <div class="method-card" data-category="long" onclick="selectMethod(this)">
            <div class="method-icon">🎯</div>
            <div class="method-title">Deep Work</div>
            <div class="method-duration">90 min + 20 min istirahat</div>
            <div class="method-description">
                Dedikasi penuh untuk proyek kompleks. Istirahat lebih panjang memberi waktu pemulihan mental yang optimal.
            </div>
        </div>

        <!-- Ultradian Rhythm -->
        <div class="method-card" data-category="medium" onclick="selectMethod(this)">
            <div class="method-icon">🔄</div>
            <div class="method-title">Ultradian Rhythm</div>
            <div class="method-duration">90 min + 20 min istirahat</div>
            <div class="method-description">
                Mengikuti siklus energi alami tubuh. Pola 90 menit kerja dan 20 menit istirahat sesuai dengan ritme sirkadian.
            </div>
        </div>

        <!-- Spaced Repetition -->
        <div class="method-card" data-category="flexible" onclick="selectMethod(this)">
            <div class="method-icon">🔁</div>
            <div class="method-title">Spaced Repetition</div>
            <div class="method-duration">Fleksibel dengan interval</div>
            <div class="method-description">
                Ulang materi dengan interval yang semakin panjang. Optimal untuk menghafal dan mengingat jangka panjang.
            </div>
        </div>

        <!-- 25/5/25 Method -->
        <div class="method-card" data-category="short" onclick="selectMethod(this)">
            <div class="method-icon">📚</div>
            <div class="method-title">25/5/25 Method</div>
            <div class="method-duration">25 min x 3 + istirahat</div>
            <div class="method-description">
                Tiga sesi 25 menit dengan istirahat singkat. Sempurna untuk membagi topik menjadi bagian-bagian yang manageable.
            </div>
        </div>

        <!-- Ivy Lee Method -->
        <div class="method-card" data-category="long" onclick="selectMethod(this)">
            <div class="method-icon">📋</div>
            <div class="method-title">Ivy Lee Method</div>
            <div class="method-duration">Fokus 6 tugas utama</div>
            <div class="method-description">
                Fokus pada maksimal 6 tugas penting dan kerjakan satu per satu. Teknik untuk prioritas dan mengurangi overwhelm.
            </div>
        </div>

        <!-- Timeboxing -->
        <div class="method-card" data-category="flexible" onclick="selectMethod(this)">
            <div class="method-icon">📦</div>
            <div class="method-title">Timeboxing</div>
            <div class="method-duration">Custom waktu untuk setiap tugas</div>
            <div class="method-description">
                Alokasikan waktu spesifik untuk setiap tugas. Memaksa prioritas dan mencegah perfeksionisme yang berlebihan.
            </div>
        </div>
    </div>

    <!-- Selected Method Info -->
    <div id="selected-method-info" style="display: none; background-color: var(--surface-secondary); border-radius: 12px; padding: 2rem; margin-top: 3rem; border: 2px solid var(--accent-dark);">
        <h2 id="selected-title" style="color: var(--accent-dark); margin-bottom: 1rem;"></h2>
        <p id="selected-description" style="margin-bottom: 1rem; font-size: 1rem;"></p>
        <div style="display: flex; gap: 12px; margin-top: 2rem;">
            <a href="{{ route('room') }}" class="btn btn-dark">Gunakan Metode Ini</a>
            <button class="btn btn-outline" onclick="clearSelection()">Ganti Metode</button>
        </div>
    </div>

    <div style="text-align: center; margin-top: 4rem;">
        <p style="color: var(--text-secondary); max-width: 600px; margin: 0 auto;">
            Setiap orang punya ritme belajar yang berbeda. Coba berbagai metode dan temukan yang paling cocok untuk kamu.
        </p>
    </div>
</div>

<style>
.filter-btn {
    padding: 0.6rem 1.2rem;
    border: 2px solid var(--border-light);
    background-color: var(--bg-main);
    border-radius: 8px;
    cursor: pointer;
    font-weight: 500;
    color: var(--text-primary);
    transition: all 0.3s ease;
}

.filter-btn:hover {
    border-color: var(--accent-dark);
    color: var(--accent-dark);
}

.filter-btn.active {
    background-color: var(--accent-dark);
    color: var(--bg-main);
    border-color: var(--accent-dark);
}
</style>

<script>
function filterMethods(category, button) {
    // Update active button
    document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');
    
    // Filter methods
    const cards = document.querySelectorAll('.method-card');
    cards.forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
            card.style.display = '';
            setTimeout(() => card.style.opacity = '1', 10);
        } else {
            card.style.opacity = '0.3';
        }
    });
}

function selectMethod(element) {
    // Get method info
    const title = element.querySelector('.method-title').textContent;
    const duration = element.querySelector('.method-duration').textContent;
    const description = element.querySelector('.method-description').textContent;
    
    // Update selected info
    document.getElementById('selected-title').textContent = '✓ ' + title + ' dipilih';
    document.getElementById('selected-description').textContent = description + '\n\nDurasi: ' + duration;
    
    // Show selected info
    document.getElementById('selected-method-info').style.display = 'block';
    
    // Highlight selected card
    document.querySelectorAll('.method-card').forEach(card => card.classList.remove('active'));
    element.classList.add('active');
    
    // Scroll to info
    document.getElementById('selected-method-info').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function clearSelection() {
    document.getElementById('selected-method-info').style.display = 'none';
    document.querySelectorAll('.method-card').forEach(card => card.classList.remove('active'));
}
</script>
@endsection
