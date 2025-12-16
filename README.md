# fp-pbp
How To Run:
1. Install PHP version 8.4
2. Install MySQL
3. Install MySQL Workbench
4. Clone this Repo
5. Run `php -S localhost:8000`
6. Open browser http://localhost:8000

#  🌐**Food Expiry Tracker (FET)**
Food Expiry Tracker adalah website untuk mencatat, memonitor, dan mengelola makanan yang user input dengan fokus utama pada tanggal kedaluwarsa.
## Deskripsi
Food Expiry Tracker adalah website yang dapat digunakan dalam kehidupan sehari-hari dengan tujuan membantu pengguna mencatat, memonitor, dan mengelola makanan yang mereka miliki dengan fokus utama pada tanggal kedaluwarsa. Sistem secara otomatis menghitung sisa hari menuju tanggal expired, lalu menampilkan status warna (hijau, kuning, merah) sebagai indikator tingkat urgensi. 
Tujuan utama pengembangan website ini adalah mencegah food waste, meningkatkan kesadaran pengguna terhadap stok makanan, serta memudahkan manajemen bahan makanan di rumah dengan tampilan yang sederhana, intuitif, dan mudah diakses.
##  📌 Fitur Utana
- 🔹 User Login & Register: menggunakan Laravel Authentication
- 🔹 Dashboard Data Makanan:
- 🔹 Tambah Data Makanan
- 🔹 Perhitungan Sisa Hari Otomatis
- 🔹 Indikator Status Warna
- 🔹 Edit & Delete Data Makanan
- 🔹 Filter Data Berdasarkan Kategori
## 🚀 Fitur Pendukung
- 🔹 Responsive Design fully Bootstrap
- 🔹 Landing Page informatif
- 🔹 Validasi form
- 🔹 Dark/Light mode 
## 🧠 Fitur Lanjutan
- 🔹 Website menyediakan fitur notifikasi email otomatis yang dikirimkan setiap hari pada pukul 08.00 kepada pengguna saat membuka website nya. Email berisi informasi kondisi bahan makanan milik user, yang dikategorikan menjadi fresh, soon expired, dan expired.
- 🔹 Sistem juga memberikan rekomendasi resep berdasarkan bahan makanan yang hampir kadaluarsa. Tujuan fitur ini adalah membantu pengguna memanfaatkan bahan makanan secara optimal sehingga dapat mengurangi food waste.
## 🧑‍💻 Bahasa Pemrograman Yang di Gunakan
- 📄 HTML
- 🎨 CSS (bootstrap)
- ⚡ JavaScript
- 🐘 PHP
- 🔴 Laravel
- 📡 REST API
- 🐬 MySQL
##  🖼Front end
1. 📄 HTML (Struktur Halaman)
   - 🔹index.html = Menjadi halaman awal (landing page) aplikasi Food Expiry Tracker
   - 🔹login.html = Menyediakan form untuk proses login pengguna.
   - 🔹register.html = Menyediakan form pendaftaran akun baru.
   - 🔹dashboard.html = Menampilkan halaman utama pengelolaan data makanan.
   - 🔹recipe-finder.html = Menampilkan fitur pencarian resep berdasarkan bahan.
   - 🔹settings.html = Menyediakan halaman pengaturan pengguna.
   - 🔹help-center.html = Menampilkan halaman bantuan dan FAQ.
   - 🔹privacy-policy.html = Menampilkan kebijakan privasi aplikasi.
   - 🔹terms-of-service.html = Menampilkan syarat dan ketentuan penggunaan aplikasi.
2. 🎨 CSS (Tampilan & Responsivitas)
   - 🔹landing.css = Mengatur tampilan halaman awal aplikasi.
   - 🔹auth.css = Mengatur tampilan halaman login dan register.
   - 🔹dashboard.css = Mengatur tampilan dashboard utama
3. ⚡ JavaScript (Logika Aplikasi)
   - utils.js = Membantu menjaga kode tetap rapi dan terstruktur.
   - auth.js = Menggunakan event handling dan localStorage
   - landing.js = Berisi event listener sederhana dan pemanggilan fungsi JavaScript lain.
   - guest-mode.js = Memungkinkan pengguna mengakses aplikasi tanpa login akun.
   - dashboard.js = Mengelola data client-side dan rendering dinamis.
   - notifications.js = Memberi peringatan kepada pengguna jika ada makanan yang hampir atau sudah kadaluarsa.
   - email-notifications.js = Mengirim notifikasi melalui email.
   - recipe-finder.js = Mengolah input pencarian dan menampilkan hasil
   - settings.js = Mengelola pengaturan pengguna.
   - sound-notifications.js = Menyediakan notifikasi suara.










