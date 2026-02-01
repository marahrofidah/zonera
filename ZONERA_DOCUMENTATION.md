# ZONERA - Ruang Belajar Virtual 🏡

## Deskripsi Proyek

**Zonera** adalah aplikasi web belajar virtual dengan desain 3D isometrik yang cozy, chill, dan menenangkan. Aplikasi ini menggabungkan filosofi pembelajaran sosial dengan teknologi modern untuk menciptakan lingkungan belajar yang mendukung dan memotivasi.

## 🎯 Filosofi Inti

- **Kebersamaan Tanpa Kompetisi**: Belajar dengan kehadiran orang lain yang memberikan motivasi sosial, bukan tekanan
- **Fokus & Kesedihan**: Suasana yang dirancang untuk menenangkan pikiran dan meningkatkan konsentrasi
- **Fleksibilitas**: Setiap pengguna dapat memilih metode, musik, dan suasana sesuai kebutuhannya
- **Konsistensi**: Mendukung pembelajaran jangka panjang melalui tracking progress dan accountability

## 📋 6 Halaman Utama

### 1. **HOME** - Ruang Belajar Virtual
- Menampilkan 6 meja belajar isometrik yang dapat dipilih
- Beberapa meja menampilkan avatar untuk menunjukkan siapa yang sedang belajar
- Lampu meja menyala pada meja yang sedang digunakan
- **Tujuan**: Mengajak pengguna memilih meja dan memulai sesi belajar

### 2. **ABOUT** - Tentang Zonera
- Menjelaskan konsep kebersamaan dan social accountability
- Visual menampilkan avatar belajar bersama
- Card untuk setiap nilai inti aplikasi
- **Tujuan**: Memperkenalkan filosofi dan konsep aplikasi

### 3. **LIBRARY/METHODS** - Metode Belajar
- **Filter Interaktif**: Pilih berdasarkan durasi (Pendek, Sedang, Panjang, Fleksibel)
- **9 Metode Belajar**:
  - Pomodoro (25/5)
  - Flowtime (Fleksibel)
  - 50/10 Method
  - Deep Work (90/20)
  - Ultradian Rhythm (90/20)
  - Spaced Repetition (Fleksibel)
  - 25/5/25 Method
  - Ivy Lee Method
  - Timeboxing (Custom)
- **Tujuan**: Membantu pengguna memilih teknik belajar yang sesuai

### 4. **GALLERY** - Galeri Suasana
- **12 Suasana Belajar**:
  - 🌧️ Hari Hujan Tenang
  - 🌙 Malam Tenang
  - ☕ Kafe Hangat
  - 🌲 Hutan Sejuk
  - 🌊 Pantai Berombang
  - 📚 Perpustakaan Sunyi
  - 🌅 Pagi Cerah
  - 🏢 Ruang Minimalis
  - 🌻 Taman Bunga
  - 🔥 Perapian Hangat
  - 💼 Ruang Studi Klasik
  - ⛰️ Pemandangan Gunung
- **Modal Zoom**: Lihat detail setiap suasana dengan popup
- **Tujuan**: Inspirasi visual dan eksplorasi mood

### 5. **CONTACT** - Hubungi Kami
- Form untuk masukan, bug report, dan pertanyaan
- Informasi kontak lengkap
- Link media sosial
- FAQ shortcuts
- **Tujuan**: Tempat pengguna memberikan feedback

### 6. **VIRTUAL ROOM** - Fitur Utama Aplikasi
Halaman dengan fitur paling lengkap:

#### **Pilihan Meja** 
- 6 meja dengan visual berbeda
- Meja "occupied" menampilkan avatar dan lampu menyala

#### **Metode Belajar Interaktif**
- Tombol untuk memilih Pomodoro, Flowtime, atau 50/10 Method
- Timer otomatis sesuai metode yang dipilih

#### **Suasana Belajar**
- 4 suasana utama: Hujan, Malam, Cafe, Hutan
- Tombol untuk switch antar suasana

#### **🎵 Music Player**
- Input URL untuk musik dari berbagai platform
- Supports: YouTube, Spotify, SoundCloud, direct MP3 links
- Audio player built-in dengan kontrol pause/play/volume

#### **🎮 Game Santai (3 Opsi)**
- **Tic-Tac-Toe**: Game klasik untuk istirahat otak
- **Memory Game**: Cari pasangan kartu untuk fokus
- **2048 Mini**: Kombinasikan angka untuk relaksasi

#### **✓ To-Do List**
- Tambah tugas belajar yang perlu diselesaikan
- Checkbox untuk mark complete
- Delete button untuk hapus tugas
- **End Session**: Modal menanyakan apa saja yang sudah dikerjain

#### **⏱️ Timer & Controls**
- Timer otomatis berdasarkan metode
- Tombol Start/Pause/Stop
- Display waktu dalam MM:SS format
- Auto-trigger saat waktu habis

#### **📊 Live Statistics**
- Tracking total waktu fokus
- Tracking jumlah tugas selesai
- Real-time updates

## 🎨 Desain Visual

### Palet Warna
```
Latar Belakang:    #f8f8f7 (Off-White)
Permukaan Utama:   #cbc0b2 (Beige Hangat)
Permukaan Sekunder:#d9cfc4 (Beige Lighter)
Aksen Gelap:       #550b14 (Wine Merah)
Aksen Coklat:      #7e6961 (Coklat Muted)
Text Utama:        #3d3a36 (Coklat Gelap)
Text Sekunder:     #6b6661 (Coklat Terang)
Border:            #e8e3dd (Beige Terang)
```

### Karakteristik
- ✅ 3D Isometrik dengan CSS transforms
- ✅ Bentuk slightly rounded (border-radius: 8-12px)
- ✅ Shadow halus dan lembut
- ✅ Lighting hangat dan natural
- ✅ Detail minimal tapi meaningful
- ✅ Lo-fi & cozy aesthetic
- ❌ Tidak ada neon/biru/hijau terang
- ❌ Tidak ada cyberpunk/realistis
- ❌ Tidak ada logo/watermark/teks pada visual

## 🛠️ Teknologi & Stack

- **Backend**: Laravel 11
- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Styling**: Tailwind CSS + Custom CSS
- **3D Effects**: CSS 3D transforms
- **Responsif**: Mobile-first approach

## 📂 Struktur File

```
zoneraFIX/
├── routes/
│   └── web.php (6 routes utama)
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php (Master Layout)
│   │   ├── components/
│   │   │   ├── navigation.blade.php
│   │   │   └── footer.blade.php
│   │   ├── home.blade.php
│   │   ├── about.blade.php
│   │   ├── methods.blade.php
│   │   ├── gallery.blade.php
│   │   ├── contact.blade.php
│   │   └── room.blade.php
│   ├── css/
│   │   ├── app.css (Base styles + navbar)
│   │   └── isometric.css (3D effects + components)
│   └── js/
│       ├── app.js (General functions)
│       └── room.js (Virtual room logic)
```

## 🚀 Cara Menjalankan

1. **Setup Laravel**
```bash
cd d:\laragon\www\zoneraFIX
composer install
```

2. **Jalankan Development Server**
```bash
php artisan serve --port=8000
```

3. **Buka Browser**
```
http://127.0.0.1:8000
```

## ✨ Fitur Unggulan

### Virtual Room
- ✅ **Desk Selection**: Pilih meja belajar favorit
- ✅ **Study Methods**: Filter & pilih metode belajar (9 opsi)
- ✅ **Background Moods**: Pilih suasana belajar (4 opsi utama)
- ✅ **Music Player**: Masukkan URL musik dari berbagai platform
- ✅ **Games**: 3 mini-games untuk istirahat (Tic-Tac-Toe, Memory, 2048)
- ✅ **Timer**: Auto-timer berdasarkan metode belajar
- ✅ **To-Do List**: Tambah/hapus/complete tasks
- ✅ **Statistics**: Track waktu fokus dan task completion
- ✅ **End Session Modal**: Recap performa & tanya apa saja yang dikerjain

### Method Selection
- ✅ **9 Study Methods** dengan deskripsi lengkap
- ✅ **Filter System**: Saring berdasarkan durasi sesi
- ✅ **Info Display**: Tampilkan detail metode yang dipilih

### Gallery
- ✅ **12 Mood Variations** dengan visual & deskripsi
- ✅ **Zoom Modal**: Lihat detail suasana dengan popup
- ✅ **Inspirasi Visual**: Untuk eksplorasi dan motivasi

### Contact
- ✅ **Form Validation**: Form masukan dengan validasi
- ✅ **Subject Selection**: Pilih tipe feedback
- ✅ **Social Links**: Link ke media sosial
- ✅ **FAQ**: Quick links untuk pertanyaan umum

## 💡 Interaktifitas

### Responsif
- Mobile-friendly design
- Grid yang adaptive
- Touch-friendly buttons

### Accessibility
- Semantic HTML
- ARIA labels
- Keyboard navigation (ESC untuk close modal)
- Focus indicators

### Animasi
- Fade-in on load
- Smooth scroll
- Hover effects
- Transitions halus

## 🔮 Fitur Potensial Masa Depan

- User authentication & profiles
- Progress tracking across sessions
- Leaderboard non-kompetitif
- Custom timer presets
- Integration dengan calendar
- Export study statistics
- Dark mode toggle
- Multi-language support
- API untuk mobile app
- Real-time multiplayer rooms

## 📝 Notes

- Aplikasi ini fokus pada **user experience** yang tenang dan mendukung
- Desain **lo-fi** yang menenangkan untuk mencegah eye strain
- Tidak ada elemen gamified yang kompetitif
- Music player support berbagai format (MP3, YouTube, Spotify, SoundCloud, dll)
- Semua data disimpan di local storage browser (tidak ada backend database requirement)

## 🌟 Design Philosophy

Zonera didesain dengan filosofi:
- **Aman**: Suasana yang tidak threatening atau pressuring
- **Supportif**: Kehadiran orang lain memberikan motivation, bukan kompetisi
- **Fleksibel**: Setiap pengguna bisa customize sesuai kebutuhan
- **Minimal**: Hanya yang perlu saja, tanpa distraksi
- **Hangat**: Estetika yang cozy dan menenangkan

---

**Dibuat dengan ❤️ untuk membuat belajar lebih tenang dan menyenangkan.**

Selamat datang di Zonera! 🏡✨
