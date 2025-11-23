# Quick Start Guide - WebConcertL

Panduan cepat untuk memulai menggunakan WebConcertL dalam 10 menit.

## 🚀 Instalasi Cepat (Development)

### Prerequisites
Pastikan sudah terinstal:
- PHP 8.2+
- Composer
- Node.js 18+
- MySQL 8.0+

### Langkah 1: Clone Repository
```bash
git clone https://github.com/TonAhmad/webconcertL.git
cd webconcertL
```

### Langkah 2: Install Dependencies
```bash
composer install
npm install
```

### Langkah 3: Setup Environment
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Langkah 4: Konfigurasi Database
Edit file `.env`:
```env
DB_DATABASE=webconcertl
DB_USERNAME=root
DB_PASSWORD=
```

Buat database:
```bash
# Login ke MySQL
mysql -u root -p

# Buat database
CREATE DATABASE webconcertl;
EXIT;
```

### Langkah 5: Migrasi Database
```bash
php artisan migrate
```

### Langkah 6: (Optional) Seed Data
```bash
php artisan db:seed
```

### Langkah 7: Build Assets
```bash
npm run build
```

### Langkah 8: Jalankan Aplikasi
```bash
# Cara 1: Menggunakan composer script (recommended)
composer run dev

# Cara 2: Manual
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

### Langkah 9: Akses Aplikasi
Buka browser dan akses:
- **Homepage**: http://localhost:8000
- **User Login**: http://localhost:8000/signin
- **Admin Panel**: http://localhost:8000/admin

---

## 👥 Default Credentials (Setelah Seeding)

### Admin
```
URL: http://localhost:8000/admin
Username: admin
Password: admin123
```

### User
```
URL: http://localhost:8000/signin
Email: user@example.com
Password: password
```

**⚠️ PERINGATAN KEAMANAN**: 
- Kredensial ini HANYA untuk development/testing
- WAJIB ganti semua password default sebelum deploy ke production
- JANGAN PERNAH gunakan kredensial default di production environment
- Hapus atau nonaktifkan akun testing di production

---

## 📱 Fitur Utama

### Untuk User
1. **Registrasi**: `/signin/signup`
2. **Login**: `/signin`
3. **Lihat Tiket**: `/ticket`
4. **Beli Tiket**: Pilih tiket → Isi jumlah → Konfirmasi
5. **Akun Saya**: `/account`

### Untuk Admin
1. **Login**: `/admin`
2. **Dashboard**: `/admin/dashboard`
3. **Kelola Tiket**: `/admin/ticket`
4. **Tambah Tiket**: `/admin/ticket/add`

---

## 🎫 Cara Cepat: Membeli Tiket

1. Login sebagai user di `/signin`
2. Klik menu **"Ticket"**
3. Pilih konser yang diinginkan
4. Pilih kategori (Regular/VIP/VVIP)
5. Tentukan jumlah tiket
6. Klik **"Purchase"**
7. Isi form pembelian
8. Konfirmasi pembelian
9. Selesai! Tiket masuk ke akun Anda

---

## 🔧 Troubleshooting Cepat

### Error: "No application encryption key"
```bash
php artisan key:generate
```

### Error: "Access denied for user"
Periksa kredensial database di `.env`

### Error: "Class not found"
```bash
composer dump-autoload
```

### Error: "SQLSTATE[HY000] [2002]"
Pastikan MySQL sudah berjalan:
```bash
# Windows (XAMPP)
# Start MySQL dari XAMPP Control Panel

# Linux
sudo systemctl start mysql

# macOS
brew services start mysql
```

### Assets tidak ter-load
```bash
npm run build
php artisan config:clear
```

---

## 📚 Dokumentasi Lengkap

Untuk informasi lebih detail:
- **README.md** - Overview proyek
- **docs/INSTALLATION.md** - Panduan instalasi lengkap
- **docs/USER_GUIDE.md** - Panduan penggunaan
- **docs/API.md** - Dokumentasi API
- **docs/DATABASE.md** - Schema database
- **CONTRIBUTING.md** - Panduan kontribusi

---

## 🆘 Butuh Bantuan?

1. Periksa [FAQ di User Guide](docs/USER_GUIDE.md#faq)
2. Baca [Troubleshooting di Installation Guide](docs/INSTALLATION.md#troubleshooting)
3. Buat issue di GitHub
4. Email: support@webconcertl.com

---

## ⚡ Tips Development

### Menggunakan Laravel Pint (Code Linter)
```bash
./vendor/bin/pint
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Monitoring Logs
```bash
tail -f storage/logs/laravel.log
```

### Database Management
```bash
# Fresh migration (drop all tables)
php artisan migrate:fresh

# Refresh with seed
php artisan migrate:fresh --seed

# Rollback last migration
php artisan migrate:rollback
```

---

## 🎯 Next Steps

Setelah instalasi berhasil:

1. ✅ Ganti password default admin dan user
2. ✅ Tambah data artis dan konser (atau gunakan seeder)
3. ✅ Buat tiket untuk konser
4. ✅ Test flow pembelian tiket
5. ✅ Eksplorasi semua fitur
6. ✅ Baca dokumentasi lengkap

---

## 🚀 Production Deployment

Untuk deploy ke production:

```bash
# Set environment
APP_ENV=production
APP_DEBUG=false

# Optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev

# Build assets
npm run build
```

Lihat [Installation Guide](docs/INSTALLATION.md#production-deployment) untuk detail lengkap.

---

**Selamat! Anda sudah siap menggunakan WebConcertL! 🎉**
