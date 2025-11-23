# WebConcertL - Sistem Manajemen Tiket Konser

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

## 📋 Deskripsi Proyek

WebConcertL adalah aplikasi web berbasis Laravel untuk manajemen pembelian tiket konser secara online. Sistem ini memungkinkan pengguna untuk melihat konser yang tersedia, membeli tiket, dan mengelola transaksi mereka, sementara admin dapat mengelola tiket, konser, dan artis.

## ✨ Fitur Utama

### Fitur untuk Pengguna (User)
- 🎫 **Pembelian Tiket**: Pengguna dapat membeli tiket konser dengan berbagai kategori (Regular, VIP, VVIP)
- 👤 **Manajemen Akun**: Registrasi, login, dan logout pengguna
- 📊 **Riwayat Transaksi**: Melihat riwayat pembelian tiket
- 💰 **Refund Tiket**: Pengguna dapat melakukan refund tiket yang sudah dibeli
- 🎤 **Informasi Artis**: Melihat daftar artis dan detail konser
- 📍 **Informasi Venue**: Melihat lokasi konser

### Fitur untuk Admin
- 📊 **Dashboard Admin**: Panel admin untuk monitoring sistem
- 🎫 **Manajemen Tiket**: Tambah, edit, dan hapus tiket konser
- 📝 **Log Aktivitas**: Monitoring log transaksi dan aktivitas tiket
- 🔐 **Autentikasi Admin**: Login khusus untuk admin

## 🛠️ Teknologi yang Digunakan

### Backend
- **Laravel 11.31** - PHP Framework
- **PHP 8.2+** - Bahasa pemrograman server-side
- **MySQL** - Database relasional

### Frontend
- **Blade Template** - Template engine Laravel
- **Tailwind CSS 3.4** - CSS Framework untuk styling
- **Bootstrap 5.2** - CSS Framework tambahan
- **Vite 6.0** - Build tool untuk asset

### Tools & Libraries
- **Laravel UI 4.6** - Authentication scaffolding
- **Axios** - HTTP client untuk AJAX requests
- **Sass** - CSS preprocessor
- **Concurrently** - Menjalankan multiple commands

## 📂 Struktur Database

### Tabel Utama

#### 1. **artist**
- `artist_id` (Primary Key)
- `artist_name` - Nama artis
- `genre` - Genre musik
- `country` - Negara asal
- `description` - Deskripsi artis
- `photo_name` - Nama file foto artis

#### 2. **concert**
- `concert_id` (Primary Key)
- `artist_id` (Foreign Key ke artist)
- `concert_name` - Nama konser
- `date` - Tanggal konser
- `time` - Waktu konser
- `capacity` - Kapasitas venue
- `location` - Lokasi konser

#### 3. **ticket**
- `ticket_id` (Primary Key)
- `admin_id` (Foreign Key ke admin)
- `concert_id` (Foreign Key ke concert)
- `category` - Kategori tiket (Regular/VIP/VVIP)
- `price` - Harga tiket
- `stock` - Stok tiket tersedia

#### 4. **transaction**
- `transaction_id` (Primary Key)
- `ticket_id` (Foreign Key ke ticket)
- `user_id` (Foreign Key ke user)
- `quantity` - Jumlah tiket dibeli
- `total_price` - Total harga
- `purchase_date` - Tanggal pembelian
- `fullname` - Nama lengkap pembeli
- `phone_number` - Nomor telepon
- `email` - Email pembeli

#### 5. **user**
- `user_id` (Primary Key)
- Data pengguna sistem

#### 6. **admin**
- `admin_id` (Primary Key)
- Data administrator sistem

#### 7. **ticket_log**
- Log aktivitas tiket

#### 8. **transaction_log**
- Log transaksi pembelian

## 🚀 Instalasi dan Konfigurasi

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL
- Git

### Langkah Instalasi

1. **Clone Repository**
```bash
git clone https://github.com/TonAhmad/webconcertL.git
cd webconcertL
```

2. **Install Dependencies PHP**
```bash
composer install
```

3. **Install Dependencies JavaScript**
```bash
npm install
```

4. **Konfigurasi Environment**
```bash
cp .env.example .env
```

Kemudian edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webconcertl
DB_USERNAME=root
DB_PASSWORD=
```

5. **Generate Application Key**
```bash
php artisan key:generate
```

6. **Buat Database**
Buat database MySQL dengan nama sesuai konfigurasi di `.env` (contoh: `webconcertl`)

7. **Jalankan Migration**
```bash
php artisan migrate
```

8. **Build Assets**
```bash
npm run build
```

9. **Jalankan Aplikasi**

Untuk development, gunakan:
```bash
composer run dev
```

Atau jalankan secara terpisah:
```bash
# Terminal 1: Laravel Server
php artisan serve

# Terminal 2: Vite Dev Server
npm run dev
```

Aplikasi akan berjalan di `http://localhost:8000`

## 📖 Panduan Penggunaan

### Untuk Pengguna

1. **Registrasi Akun**
   - Akses halaman `/signin/signup`
   - Isi form registrasi dengan data yang valid
   - Klik tombol "Sign Up"

2. **Login**
   - Akses halaman `/signin`
   - Masukkan kredensial
   - Klik "Sign In"

3. **Membeli Tiket**
   - Pilih konser dari halaman utama atau `/ticket`
   - Pilih kategori tiket (Regular/VIP/VVIP)
   - Tentukan jumlah tiket
   - Isi form pembelian
   - Konfirmasi pembayaran

4. **Melihat Riwayat Pembelian**
   - Login terlebih dahulu
   - Akses halaman `/account`
   - Lihat semua transaksi yang telah dilakukan

5. **Refund Tiket**
   - Masuk ke halaman account
   - Pilih tiket yang ingin di-refund
   - Konfirmasi refund

### Untuk Admin

1. **Login Admin**
   - Akses halaman `/admin`
   - Masukkan kredensial admin
   - Klik "Login"

2. **Dashboard**
   - Setelah login, Anda akan diarahkan ke `/admin/dashboard`
   - Lihat statistik dan informasi sistem

3. **Manajemen Tiket**
   - Akses `/admin/ticket` untuk melihat semua tiket
   - Klik "Add Ticket" untuk menambah tiket baru
   - Klik "Edit" untuk mengubah informasi tiket
   - Klik "Delete" untuk menghapus tiket

4. **Melihat Log**
   - Akses halaman log untuk monitoring aktivitas sistem

## 🗺️ Route Structure

### Public Routes
- `GET /` - Homepage
- `GET /artist` - Daftar artis
- `GET /venue` - Informasi venue
- `GET /signin` - Halaman login user
- `GET /signin/signup` - Halaman registrasi

### User Routes (Authentication Required)
- `GET /ticket` - Lihat tiket tersedia
- `POST /purchase/{ticket_id}/{quantity}` - Form pembelian
- `POST /purchase` - Process pembelian
- `GET /account` - Halaman akun user
- `POST /account/refund` - Refund tiket
- `GET /logout` - Logout user

### Admin Routes
- `GET /admin` - Login form admin
- `POST /admin/dashboard` - Process login admin
- `GET /admin/dashboard` - Dashboard admin
- `GET /admin/ticket` - Manajemen tiket
- `GET /admin/ticket/add` - Form tambah tiket
- `POST /admin/ticket/add` - Simpan tiket baru
- `GET /admin/tickets/{id}/edit` - Form edit tiket
- `POST /admin/tickets/{id}/edit` - Update tiket
- `DELETE /tickets/{id}` - Hapus tiket
- `GET /admin/logout` - Logout admin

## 🏗️ Struktur Folder

```
webconcertL/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php
│   │   │   ├── HomeController.php
│   │   │   ├── PagesController.php
│   │   │   ├── TicketController.php
│   │   │   └── UserController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── Artist.php
│   │   ├── User.php
│   │   ├── admin.php
│   │   ├── ticket.php
│   │   └── users.php
│   └── Providers/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── public/
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   ├── auth/
│   │   ├── login/
│   │   ├── paging/
│   │   └── layout/
│   ├── js/
│   └── css/
├── routes/
│   ├── web.php
│   └── console.php
└── storage/
```

## 🧪 Testing

Untuk menjalankan test:
```bash
php artisan test
```

Atau dengan PHPUnit:
```bash
./vendor/bin/phpunit
```

## 🔧 Development

### Linting
```bash
./vendor/bin/pint
```

### Build untuk Production
```bash
npm run build
```

## 🤝 Kontribusi

Kontribusi selalu diterima! Jika Anda ingin berkontribusi:

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📝 License

Proyek ini menggunakan framework Laravel yang dilisensikan di bawah [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

**TonAhmad**
- GitHub: [@TonAhmad](https://github.com/TonAhmad)

## 📧 Kontak

Jika ada pertanyaan atau masalah, silakan buat issue di repository ini.

---

**Note**: Proyek ini dibuat menggunakan Laravel 11 dan merupakan sistem manajemen tiket konser yang dapat dikustomisasi sesuai kebutuhan.
