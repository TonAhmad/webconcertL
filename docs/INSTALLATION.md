# Panduan Instalasi WebConcertL

Panduan lengkap untuk instalasi dan konfigurasi aplikasi WebConcertL.

## Prasyarat Sistem

Sebelum memulai instalasi, pastikan sistem Anda memenuhi persyaratan berikut:

### Software yang Diperlukan
- **PHP** >= 8.2
- **Composer** (latest version)
- **Node.js** >= 18.x
- **NPM** >= 9.x
- **MySQL** >= 8.0 atau **MariaDB** >= 10.3
- **Git** (untuk clone repository)

### Ekstensi PHP yang Diperlukan
- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- PDO MySQL
- Tokenizer
- XML

Untuk mengecek ekstensi PHP yang terinstall:
```bash
php -m
```

## Instalasi di Windows

### 1. Install XAMPP atau Laragon
Download dan install [XAMPP](https://www.apachefriends.org/) atau [Laragon](https://laragon.org/)

### 2. Install Composer
Download dari [getcomposer.org](https://getcomposer.org/) dan install

### 3. Install Node.js
Download dari [nodejs.org](https://nodejs.org/) dan install

### 4. Clone Repository
```bash
cd C:\xampp\htdocs
git clone https://github.com/TonAhmad/webconcertL.git
cd webconcertL
```

### 5. Install Dependencies
```bash
composer install
npm install
```

### 6. Konfigurasi Environment
```bash
copy .env.example .env
```

Edit `.env` dan sesuaikan konfigurasi database:
```env
APP_NAME=WebConcertL
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=Asia/Jakarta
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webconcertl
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Generate Application Key
```bash
php artisan key:generate
```

### 8. Buat Database
Buka phpMyAdmin di `http://localhost/phpmyadmin` dan buat database baru dengan nama `webconcertl`

### 9. Jalankan Migration
```bash
php artisan migrate
```

### 10. (Optional) Seed Data
```bash
php artisan db:seed
```

### 11. Build Assets
```bash
npm run build
```

### 12. Jalankan Aplikasi
```bash
php artisan serve
```

Atau untuk development dengan hot reload:
```bash
composer run dev
```

Akses aplikasi di `http://localhost:8000`

## Instalasi di Linux (Ubuntu/Debian)

### 1. Update System
```bash
sudo apt update && sudo apt upgrade -y
```

### 2. Install PHP dan Extensions
```bash
sudo apt install -y php8.2 php8.2-cli php8.2-fpm php8.2-mysql php8.2-xml php8.2-curl php8.2-mbstring php8.2-zip php8.2-bcmath php8.2-gd
```

### 3. Install Composer
```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

### 4. Install Node.js dan NPM
```bash
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs
```

### 5. Install MySQL
```bash
sudo apt install -y mysql-server
sudo mysql_secure_installation
```

### 6. Clone Repository
```bash
cd /var/www/html
sudo git clone https://github.com/TonAhmad/webconcertL.git
cd webconcertL
```

### 7. Set Permissions
```bash
sudo chown -R $USER:www-data .
sudo chmod -R 775 storage bootstrap/cache
```

### 8. Install Dependencies
```bash
composer install
npm install
```

### 9. Konfigurasi Environment
```bash
cp .env.example .env
nano .env
```

### 10. Generate Application Key
```bash
php artisan key:generate
```

### 11. Buat Database
```bash
sudo mysql -u root -p
```

Di MySQL console:
```sql
CREATE DATABASE webconcertl CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'webconcert_user'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON webconcertl.* TO 'webconcert_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

Update `.env`:
```env
DB_DATABASE=webconcertl
DB_USERNAME=webconcert_user
DB_PASSWORD=your_password
```

### 12. Jalankan Migration
```bash
php artisan migrate
```

### 13. Build Assets
```bash
npm run build
```

### 14. Jalankan Aplikasi
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

## Instalasi di macOS

### 1. Install Homebrew
```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

### 2. Install PHP
```bash
brew install php@8.2
```

### 3. Install Composer
```bash
brew install composer
```

### 4. Install Node.js
```bash
brew install node
```

### 5. Install MySQL
```bash
brew install mysql
brew services start mysql
```

### 6. Clone Repository
```bash
cd ~/Sites
git clone https://github.com/TonAhmad/webconcertL.git
cd webconcertL
```

### 7. Ikuti langkah 8-14 dari panduan Linux di atas

## Konfigurasi Lanjutan

### Mail Configuration
Jika ingin mengaktifkan fitur email, tambahkan di `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@webconcertl.com
MAIL_FROM_NAME="${APP_NAME}"
```

**⚠️ Catatan Keamanan untuk Gmail**:
- Gunakan App Password, bukan password akun utama
- Aktifkan 2-Factor Authentication di akun Gmail
- Jangan commit file `.env` ke repository
- Simpan kredensial dengan aman menggunakan environment variables atau secret manager

### Queue Configuration
Untuk menggunakan queue system:
```env
QUEUE_CONNECTION=database
```

Jalankan queue worker:
```bash
php artisan queue:work
```

### Cache Configuration
Untuk production, gunakan Redis atau Memcached:
```env
CACHE_DRIVER=redis
SESSION_DRIVER=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

## Troubleshooting

### Error: "The stream or file could not be opened"
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Error: "No application encryption key has been specified"
```bash
php artisan key:generate
```

### Error: "SQLSTATE[HY000] [1045] Access denied"
Periksa kredensial database di file `.env`

### Error: NPM dependencies
```bash
rm -rf node_modules package-lock.json
npm install
```

### Error: Composer dependencies
```bash
rm -rf vendor composer.lock
composer install
```

## Production Deployment

### 1. Optimize Aplikasi
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev
```

### 2. Set Environment ke Production
Di `.env`:
```env
APP_ENV=production
APP_DEBUG=false
```

### 3. Build Assets untuk Production
```bash
npm run build
```

### 4. Set Permission yang Tepat
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### 5. Gunakan HTTPS
Pastikan aplikasi dijalankan dengan HTTPS di production

## Verifikasi Instalasi

Setelah instalasi selesai, verifikasi dengan:

1. Akses `http://localhost:8000` - Homepage harus muncul
2. Akses `/admin` - Halaman login admin harus muncul
3. Akses `/signin` - Halaman login user harus muncul
4. Check database - Semua tabel harus tercipta

## Update Aplikasi

Untuk update ke versi terbaru:
```bash
git pull origin main
composer install
npm install
php artisan migrate
php artisan config:clear
php artisan cache:clear
npm run build
```

## Bantuan Lebih Lanjut

Jika mengalami masalah, silakan:
- Periksa log di `storage/logs/laravel.log`
- Buat issue di GitHub repository
- Periksa dokumentasi Laravel di [laravel.com/docs](https://laravel.com/docs)
