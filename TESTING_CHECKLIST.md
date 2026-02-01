# 🧪 TESTING CHECKLIST - ZONERA

## ✅ HALAMAN TESTING

### HOME PAGE (http://127.0.0.1:8000)
- [ ] Page loads tanpa error
- [ ] 6 meja terlihat dalam grid
- [ ] Avatar mini terlihat pada meja occupied
- [ ] Lampu menyala pada meja occupied
- [ ] Click meja untuk select (border glow)
- [ ] Occupied meja tidak bisa select (alert)
- [ ] Desk info muncul saat select
- [ ] "Mulai Belajar" button berfungsi
- [ ] Styling sesuai palet warna
- [ ] Responsive di mobile

### ABOUT PAGE (http://127.0.0.1:8000/about)
- [ ] Page loads tanpa error
- [ ] Heading dan deskripsi terlihat
- [ ] 4 avatar berbeda terlihat
- [ ] 6 value cards terlihat
- [ ] Animations smooth (fade-in, slide-in)
- [ ] Tombol "Mulai Pengalaman" berfungsi
- [ ] Typography terlihat jelas
- [ ] Responsive di mobile

### METHODS PAGE (http://127.0.0.1:8000/methods)
- [ ] Page loads tanpa error
- [ ] 9 method cards terlihat
- [ ] Filter buttons ada 5 opsi
- [ ] Click filter - cards saring dengan benar
- [ ] Filter "Semua" menampilkan 9 cards
- [ ] Filter "Pendek" menampilkan 2 cards
- [ ] Click method card - selected state
- [ ] Method info muncul di bawah
- [ ] "Gunakan Metode Ini" button berfungsi
- [ ] "Ganti Metode" button deselect
- [ ] Responsive di mobile

### GALLERY PAGE (http://127.0.0.1:8000/gallery)
- [ ] Page loads tanpa error
- [ ] 12 mood cards terlihat
- [ ] Thumbnail dengan emoji terlihat
- [ ] Deskripsi readable
- [ ] Hover effect on cards (scale)
- [ ] Click card - zoom modal muncul
- [ ] Modal display besar
- [ ] Modal close button (✕) berfungsi
- [ ] Click outside modal - modal close
- [ ] ESC key closes modal
- [ ] Responsive di mobile

### CONTACT PAGE (http://127.0.0.1:8000/contact)
- [ ] Page loads tanpa error
- [ ] Form layout 2 column
- [ ] Nama input berfungsi
- [ ] Email input berfungsi
- [ ] Subject dropdown berfungsi
- [ ] Message textarea berfungsi
- [ ] Submit button berfungsi
- [ ] Validasi kosong fields (required)
- [ ] Success message muncul
- [ ] Form auto-reset setelah submit
- [ ] Contact info sidebar terlihat
- [ ] Social links ada 4
- [ ] FAQ links terlihat
- [ ] Responsive di mobile

### VIRTUAL ROOM PAGE (http://127.0.0.1:8000/room)

#### Desk Selection
- [ ] 6 desks terlihat dalam grid
- [ ] Avatar + lamp pada occupied desk
- [ ] Click desk - border glow & select
- [ ] Desk info panel muncul
- [ ] "Mulai Belajar" hanya setelah select
- [ ] Ganti meja button berfungsi

#### Method Selection
- [ ] 3 method buttons (Pomodoro, Flowtime, 50-10)
- [ ] Click method - active state
- [ ] Selected method display update
- [ ] Timer display update sesuai method:
  - [ ] Pomodoro = 25:00
  - [ ] Flowtime = 45:00
  - [ ] 50-10 = 50:00

#### Mood Selection
- [ ] 4 emoji buttons terlihat
- [ ] Click mood - active state
- [ ] Selected mood display update

#### Timer
- [ ] Timer display besar & jelas
- [ ] "Mulai" button - countdown start
- [ ] "Jeda" button - countdown pause
- [ ] "Hentikan" button - reset ke original
- [ ] Countdown akurat (countdown setiap detik)
- [ ] Auto-message saat habis
- [ ] Total focus time track

#### Music Player
- [ ] Input field untuk URL
- [ ] Placeholder terlihat
- [ ] Press ENTER - load musik
- [ ] Audio player muncul
- [ ] Play/Pause berfungsi
- [ ] Volume control berfungsi
- [ ] Timeline/progress bar berfungsi
- [ ] Test dengan YouTube URL
- [ ] Test dengan Spotify URL
- [ ] Test dengan direct MP3 link

#### Games
- [ ] "Game Santai" section terlihat
- [ ] 3 game buttons ada (Tic-Tac-Toe, Memory, 2048)
- [ ] Click game - game modal muncul
- [ ] Tic-Tac-Toe game playable
- [ ] Memory game playable
- [ ] 2048 mini displayable
- [ ] "Kembali" button close game

#### To-Do List
- [ ] Todo input terlihat
- [ ] Click "Tambah" - task added
- [ ] Task display di list
- [ ] Checkbox - mark complete
- [ ] Completed task strikethrough
- [ ] Delete button (✕) - remove task
- [ ] Empty list handling
- [ ] Task count tracking

#### Statistics
- [ ] "Durasi Fokus" display
- [ ] "Tugas Selesai" display
- [ ] Statistics update real-time
- [ ] "Selesaikan Sesi" button ada

#### End Session Modal
- [ ] Click "Selesaikan Sesi" - modal muncul
- [ ] Duration display correct
- [ ] Completed tasks list
- [ ] Completed task checkbox disabled
- [ ] New achievement input
- [ ] "Mulai Sesi Baru" button
- [ ] "Kembali ke Halaman Utama" button

---

## 🎨 DESIGN VERIFICATION

### Colors
- [ ] Background #f8f8f7 (Off-white)
- [ ] Beige surfaces #cbc0b2
- [ ] Wine accent #550b14 pada buttons & highlights
- [ ] Brown accent #7e6961
- [ ] Text colors sesuai

### Typography
- [ ] Heading h1 size 3rem
- [ ] Heading h2 size 2rem
- [ ] Text readable & consistent
- [ ] Font stacks loaded properly

### Layout
- [ ] Desktop layout optimal
- [ ] Tablet layout responsive
- [ ] Mobile layout responsive
- [ ] No horizontal scroll

### Animations
- [ ] Fade-in on page load
- [ ] Slide-in effects smooth
- [ ] Hover animations smooth
- [ ] Transition timing consistent

---

## 🔗 NAVIGATION TESTING

- [ ] Navbar sticky di top
- [ ] Logo clickable (to home)
- [ ] All nav links functional
- [ ] Active link highlight
- [ ] Mobile nav responsive
- [ ] Footer visible
- [ ] Footer links functional

---

## ♿ ACCESSIBILITY TESTING

- [ ] Semantic HTML structure
- [ ] Form labels associated
- [ ] Button text clear
- [ ] Color contrast sufficient
- [ ] Keyboard navigation works
- [ ] ESC key closes modals
- [ ] Tab order logical
- [ ] No console errors

---

## 📱 RESPONSIVE TESTING

### Desktop (1200+px)
- [ ] All elements visible
- [ ] Layout optimal
- [ ] Spacing adequate
- [ ] Images scale properly

### Tablet (768px-1200px)
- [ ] Content readable
- [ ] Touch targets adequate
- [ ] Layout adjusts
- [ ] No overflow

### Mobile (<768px)
- [ ] Single column layout
- [ ] Touch-friendly buttons
- [ ] Text readable
- [ ] Images scaled
- [ ] No horizontal scroll
- [ ] Modals full-width
- [ ] Forms responsive

---

## 🐛 ERROR HANDLING

- [ ] No console errors
- [ ] Form validation works
- [ ] Error messages clear
- [ ] Page doesn't break
- [ ] Recovery possible

---

## ⚡ PERFORMANCE

- [ ] Page loads quickly
- [ ] Animations smooth
- [ ] No lag on interaction
- [ ] Memory usage normal
- [ ] CSS not blocking
- [ ] JS not blocking

---

## 🔒 SECURITY

- [ ] No XSS vulnerabilities
- [ ] Form properly escaped
- [ ] URLs safe
- [ ] Session data protected

---

## 📊 FUNCTIONALITY MATRIX

| Feature | Expected | Actual | Status |
|---------|----------|--------|--------|
| 6 Pages | ✓ | | |
| Navigation | ✓ | | |
| 9 Methods | ✓ | | |
| 12 Moods | ✓ | | |
| Music Player | ✓ | | |
| 3 Games | ✓ | | |
| Timer | ✓ | | |
| To-Do List | ✓ | | |
| Statistics | ✓ | | |
| End Modal | ✓ | | |
| Responsive | ✓ | | |
| Animations | ✓ | | |
| Accessibility | ✓ | | |
| Form Validation | ✓ | | |
| Colors/Design | ✓ | | |

---

## 🎯 TEST SCENARIOS

### Scenario 1: First-time User Journey
1. Open http://127.0.0.1:8000
2. Read home page
3. Click "Tentang" to learn about app
4. Click "Metode" to explore methods
5. Click "Galeri" to see moods
6. Click "Kontak" for info
7. Click "Masuk Ruangan" to start
8. **Result**: User understands app purpose

### Scenario 2: Study Session
1. Select desk
2. Select method (Pomodoro)
3. Select mood (Rainy)
4. Click "Mulai Belajar"
5. Add music via URL
6. Add tasks to to-do
7. Click "Mulai" timer
8. Let timer count
9. Click "Selesaikan Sesi"
10. Review in modal
11. **Result**: Complete study session

### Scenario 3: Game During Break
1. Start session (as above)
2. Click one game button
3. Play game briefly
4. Click "Kembali"
5. Continue studying
6. **Result**: Game break works

### Scenario 4: Method Selection
1. Go to Methods page
2. Click "Sesi Pendek" filter
3. See filtered methods
4. Click method card
5. See details
6. Click "Gunakan Metode Ini"
7. **Result**: Method selected & applied

### Scenario 5: Gallery Exploration
1. Go to Gallery page
2. Click mood card
3. See zoom modal
4. Read description
5. Click "Gunakan Suasana Ini"
6. Go to Virtual Room
7. **Result**: Mood selection flows to room

---

## 🏁 FINAL VERIFICATION

Before declaring project complete:

- [ ] All pages load without error
- [ ] All buttons functional
- [ ] All inputs accept data
- [ ] All displays update correctly
- [ ] All animations smooth
- [ ] Design consistent
- [ ] Colors accurate
- [ ] Typography correct
- [ ] Responsive working
- [ ] No console errors
- [ ] No memory leaks
- [ ] No broken links
- [ ] Navigation intuitive
- [ ] Accessibility good
- [ ] Performance acceptable
- [ ] User can complete full flow
- [ ] Code clean & organized
- [ ] Documentation complete
- [ ] Ready for production

---

## ✅ PROJECT STATUS

**Status**: READY FOR TESTING ✓

**Tested By**: [Your Name]
**Test Date**: [Date]
**Test Result**: PASS/FAIL

**Notes**:
_____________________________________
_____________________________________
_____________________________________

**Sign-off**: __________________
