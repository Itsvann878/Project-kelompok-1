# Tepi Waktu Production - Web Management & E-Ticketing System

Aplikasi web berbasis **PHP Native** dengan arsitektur **Object-Oriented Programming (OOP)** yang dirancang khusus untuk manajemen layanan, sistem transaksi, dan e-ticketing pada **Tepi Waktu Production**. 

Sistem ini mendukung otomatisasi notifikasi email, integrasi webhook, dan pembagian hak akses menggunakan *Role-Based Access Control* (RBAC) untuk Admin, Employee, dan Customer.



## 🛠️ Prasyarat & Tools yang Diperlukan (Prerequisites)

Sebelum melakukan *cloning* dan menjalankan projek ini di lingkungan lokal (*localhost*), pastikan Anda telah menginstal perangkat lunak berikut:

1. **Web Server & PHP Interpreter**
   * Rekomendasi: **XAMPP** (versi 8.0 atau yang lebih baru).
   * Projek ini menggunakan **PHP Native** dengan pustaka berbasis kelas.
2. **Database Server**
   * **MySQL / MariaDB** (Sudah termasuk di dalam paket XAMPP).
3. **Dependency Manager**
   * **Composer** (Diperlukan untuk mengelola pustaka eksternal seperti *Mail System* atau integrasi pihak ketiga).
4. **Code Editor**
   * Visual Studio Code, Sublime Text, atau PHPStorm.
5. **Web Browser**
   * Google Chrome, Mozilla Firefox, atau Microsoft Edge versi terbaru.

---

## 🚀 Panduan Instalasi Projek (Local Setup)

Ikuti langkah-langkah berikut untuk memasang projek di komputer Anda:

### Clone Repositori
Buka terminal atau Git Bash, lalu arahkan ke direktori server lokal Anda (misal: `C:/xampp/htdocs/` untuk XAMPP) dan jalankan perintah:
Output kode
File successfully created: README.md

```bash
git clone https://github.com/tepiwaktu-dev/tepiwaktu- web-native
```

### Install Dependencies via Composer
Pastikan Composer sudah terinstal global, lalu jalankan perintah ini di dalam direktori projek untuk mengunduh pustaka vendor (termasuk modul komponen class.Mail.php):

``` Bash
composer install
```
### Konfigurasi Database SQL
- Aktifkan modul Apache dan MySQL pada XAMPP Control Panel.
- Buka browser dan akses `http://localhost/phpmyadmin/.`
- Buat database baru dengan nama, company/bebas.
- Pilih database tersebut, lalu masuk ke menu Import.
- Pilih file database SQL projek ini `https://drive.google.com/file/d/1LXJjseNWKO2cUjtrVVIGr53lAzBd2L6C/view?usp=sharing`, lalu klik Go/Import.

### Jalankan Aplikasi
Buka web browser dan ketik tautan berikut:

``` Plaintext
http://localhost/project-kelompok-1/Main.php
```
## 🖥️ Tata Cara Penggunaan Sistem (User Guide)
Aplikasi ini menggunakan sistem Role-Based Access Control (RBAC) yang membagi hak akses ke dalam beberapa peran utama:

### A. Panduan Penggunaan sebagai USER (Pelanggan)
#### 1. Registrasi & Login:
* Akses halaman utama, pilih menu Register untuk membuat akun baru, atau langsung Login jika sudah memiliki akun.

#### 2. Eksplorasi Katalog:
* Masuk ke halaman Produk (Produk.php) untuk melihat katalog jasa dokumentasi, produksi, atau tiket event yang tersedia.

#### 3. Proses Pembelian (Checkout):
* Pilih produk/tiket yang diinginkan, klik tombol beli, sistem akan memproses permintaan melalui `proses_beli.php`, dan gunakan simulator untuk melakukan paymant di midtrans  `https://simulator.sandbox.midtrans.com`
  
#### 4. Pembayaran & Riwayat:
* Setelah checkout, pengguna dapat memantau riwayat transaksi pada halaman Riwayat `(riwayat.php)`.

### B. Panduan Penggunaan sebagai ADMIN (Pengelola Utama)
#### Login Admin:
* Masuk menggunakan akun khusus Administrator melalui halaman login utama (sistem otomatis mendeteksi role akun Anda).

#### 1. Manajemen Pengguna:
* Melalui menu Admin, Anda dapat mengelola data karyawan (Employee) dan melihat daftar pelanggan (User) pada file user.php.

### 2. Manajemen Produk:
* Admin memiliki wewenang penuh untuk Menambah, Mengubah (Edit Harga/Deskripsi), dan Menghapus katalog yang diproses melalui class.Produk.php.

### 3. Monitoring Transaksi:
* Memantau seluruh arus masuk transaksi keuangan dan memvalidasi status pembayaran secara manual atau melalui sistem otomatis.


