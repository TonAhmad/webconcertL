# Panduan Penggunaan - WebConcertL

Panduan lengkap penggunaan aplikasi WebConcertL untuk pengguna dan administrator.

---

## Untuk Pengguna (Customer)

### 1. Registrasi Akun

#### Langkah-langkah:
1. Buka aplikasi di browser (`http://localhost:8000`)
2. Klik menu **"Sign In"** di navigasi
3. Klik link **"Sign Up"** atau akses `/signin/signup`
4. Isi form registrasi:
   - **Nama Lengkap**: Masukkan nama lengkap Anda
   - **Email**: Masukkan email valid yang akan digunakan untuk login
   - **Password**: Minimal 8 karakter
   - **Konfirmasi Password**: Ulangi password yang sama
5. Klik tombol **"Sign Up"**
6. Jika berhasil, Anda akan diarahkan ke halaman login

#### Tips:
- Gunakan email yang aktif
- Buat password yang kuat (kombinasi huruf, angka, simbol)
- Catat kredensial Anda dengan aman

---

### 2. Login ke Sistem

#### Langkah-langkah:
1. Akses halaman `/signin`
2. Masukkan email dan password yang sudah didaftarkan
3. Klik tombol **"Sign In"**
4. Jika berhasil, Anda akan diarahkan ke halaman daftar tiket

#### Troubleshooting:
- **Email atau password salah**: Pastikan kredensial yang dimasukkan benar
- **Akun belum terdaftar**: Lakukan registrasi terlebih dahulu
- **Lupa password**: Hubungi administrator untuk reset password

---

### 3. Melihat Daftar Konser dan Artis

#### Melihat Artis:
1. Klik menu **"Artist"** di navigasi
2. Lihat daftar semua artis yang akan tampil
3. Setiap artis menampilkan:
   - Foto artis
   - Nama artis
   - Genre musik
   - Negara asal
   - Deskripsi singkat

#### Melihat Venue/Lokasi:
1. Klik menu **"Venue"** di navigasi
2. Lihat informasi tentang lokasi konser
3. Informasi yang ditampilkan:
   - Alamat venue
   - Kapasitas
   - Fasilitas
   - Peta lokasi (jika tersedia)

---

### 4. Membeli Tiket Konser

#### Langkah-langkah:

**Langkah 1: Login**
- Pastikan Anda sudah login ke sistem
- Jika belum, login terlebih dahulu

**Langkah 2: Pilih Tiket**
1. Akses halaman **"Ticket"** di navigasi atau `/ticket`
2. Lihat daftar konser yang tersedia
3. Untuk setiap konser, informasi yang ditampilkan:
   - Nama konser
   - Nama artis
   - Tanggal dan waktu
   - Lokasi
   - Kategori tiket (Regular/VIP/VVIP)
   - Harga per tiket
   - Stok tersedia

**Langkah 3: Pilih Kategori dan Jumlah**
1. Pilih kategori tiket yang diinginkan:
   - **Regular**: Tiket standar
   - **VIP**: Tiket dengan fasilitas lebih baik
   - **VVIP**: Tiket premium dengan fasilitas terbaik
2. Tentukan jumlah tiket yang ingin dibeli
3. Klik tombol **"Buy"** atau **"Purchase"**

**Langkah 4: Isi Form Pembelian**
1. Sistem akan menampilkan form pembelian
2. Isi informasi berikut:
   - **Nama Lengkap**: Nama sesuai identitas
   - **Nomor Telepon**: Nomor yang dapat dihubungi
   - **Email**: Email untuk konfirmasi (otomatis terisi)
3. Periksa detail pembelian:
   - Nama konser
   - Kategori tiket
   - Jumlah tiket
   - Harga per tiket
   - **Total Harga**

**Langkah 5: Konfirmasi Pembelian**
1. Pastikan semua informasi sudah benar
2. Klik tombol **"Confirm Purchase"**
3. Tunggu proses pembelian selesai

**Langkah 6: Pembelian Berhasil**
1. Jika berhasil, akan muncul notifikasi sukses
2. Tiket akan otomatis masuk ke akun Anda
3. Stok tiket akan berkurang sesuai jumlah yang dibeli

#### Catatan Penting:
- Pastikan stok tiket masih tersedia
- Pembelian tidak dapat dibatalkan kecuali melalui refund
- Simpan bukti transaksi Anda
- Tiket yang sudah dibeli tidak dapat dipindahtangankan

---

### 5. Melihat Riwayat Pembelian

#### Langkah-langkah:
1. Login ke akun Anda
2. Klik menu **"Account"** atau akses `/account`
3. Halaman akun menampilkan:
   - Informasi profil Anda
   - Daftar semua transaksi pembelian
4. Untuk setiap transaksi, ditampilkan:
   - ID Transaksi
   - Nama konser
   - Kategori tiket
   - Jumlah tiket
   - Total harga
   - Tanggal pembelian
   - Status transaksi

#### Filter dan Pencarian:
- Urutkan berdasarkan tanggal (terbaru/terlama)
- Filter berdasarkan status
- Cari berdasarkan nama konser

---

### 6. Refund Tiket

#### Syarat Refund:
- Konser belum berlangsung
- Tiket sudah dibeli minimal 7 hari sebelum konser
- Refund harus diajukan minimal 3 hari sebelum konser

#### Langkah-langkah:
1. Login ke akun Anda
2. Akses halaman **"Account"**
3. Cari transaksi yang ingin di-refund
4. Klik tombol **"Refund"** pada transaksi tersebut
5. Konfirmasi permintaan refund
6. Tunggu proses refund disetujui

#### Proses Refund:
1. Permintaan refund akan diproses oleh sistem
2. Stok tiket akan dikembalikan
3. Dana akan dikembalikan sesuai kebijakan
4. Anda akan menerima notifikasi status refund

#### Catatan:
- Refund akan dikembalikan 100% jika lebih dari 7 hari sebelum konser
- Refund 50% jika 3-7 hari sebelum konser
- Tidak ada refund jika kurang dari 3 hari sebelum konser

---

### 7. Logout

#### Langkah-langkah:
1. Klik menu **"Logout"** di navigasi
2. Atau akses `/logout`
3. Session Anda akan dihapus
4. Anda akan diarahkan kembali ke halaman utama

#### Keamanan:
- Selalu logout setelah selesai menggunakan aplikasi
- Jangan tinggalkan browser dalam keadaan login
- Jangan bagikan kredensial login Anda

---

## Untuk Administrator

### 1. Login Admin

#### Langkah-langkah:
1. Akses halaman admin di `/admin`
2. Masukkan username admin
3. Masukkan password admin
4. Klik tombol **"Login"**
5. Jika berhasil, akan diarahkan ke dashboard admin

#### Default Credentials (untuk testing):
```
Username: admin
Password: admin123
```

**⚠️ PERINGATAN KEAMANAN**: 
- Kredensial ini HANYA untuk development/testing
- WAJIB ganti password segera setelah instalasi
- JANGAN PERNAH gunakan kredensial default di production
- Gunakan password yang kuat (min 12 karakter, kombinasi huruf/angka/simbol)

---

### 2. Dashboard Admin

#### Fitur Dashboard:
1. **Statistik Utama**:
   - Total tiket yang tersedia
   - Total transaksi
   - Total pendapatan
   - Jumlah user terdaftar

2. **Grafik dan Chart**:
   - Grafik penjualan tiket per hari
   - Statistik kategori tiket terlaris
   - Trend pembelian

3. **Aktivitas Terbaru**:
   - Transaksi terbaru
   - Tiket yang baru ditambahkan
   - Log aktivitas sistem

---

### 3. Manajemen Tiket

#### Melihat Daftar Tiket:
1. Klik menu **"Tickets"** di sidebar admin
2. Atau akses `/admin/ticket`
3. Lihat tabel dengan semua tiket yang tersedia
4. Informasi yang ditampilkan:
   - ID Tiket
   - Nama Konser
   - Kategori
   - Harga
   - Stok
   - Admin pembuat
   - Aksi (Edit/Delete)

#### Menambah Tiket Baru:

**Langkah 1:**
1. Klik tombol **"Add Ticket"**
2. Atau akses `/admin/ticket/add`

**Langkah 2: Isi Form**
1. **Concert ID**: Pilih konser dari dropdown
2. **Category**: Pilih kategori (Regular/VIP/VVIP)
3. **Price**: Masukkan harga tiket (dalam Rupiah)
4. **Stock**: Masukkan jumlah stok tersedia
5. **Admin ID**: Otomatis terisi dengan ID admin yang login

**Langkah 3: Validasi**
- Pastikan semua field sudah diisi
- Harga harus lebih dari 0
- Stok harus lebih dari 0
- Concert ID harus valid (konser sudah ada)

**Langkah 4: Simpan**
1. Klik tombol **"Add Ticket"**
2. Jika berhasil, akan muncul notifikasi sukses
3. Tiket baru akan muncul di daftar tiket

#### Mengedit Tiket:

**Langkah 1:**
1. Cari tiket yang ingin diedit di daftar tiket
2. Klik tombol **"Edit"** pada baris tiket tersebut

**Langkah 2: Edit Data**
1. Form edit akan muncul dengan data saat ini
2. Ubah data yang diperlukan:
   - Concert ID
   - Category
   - Price
   - Stock
3. **CATATAN**: Hati-hati saat mengubah stok, pastikan tidak lebih kecil dari tiket yang sudah terjual

**Langkah 3: Simpan Perubahan**
1. Klik tombol **"Update Ticket"**
2. Perubahan akan disimpan
3. Log perubahan akan tercatat di sistem

#### Menghapus Tiket:

**PERINGATAN**: Menghapus tiket akan menghapus semua transaksi terkait!

**Langkah-langkah:**
1. Cari tiket yang ingin dihapus
2. Klik tombol **"Delete"**
3. Konfirmasi penghapusan
4. Tiket dan semua data terkait akan dihapus

**Best Practice:**
- Jangan hapus tiket yang sudah memiliki transaksi
- Lebih baik set stok menjadi 0 daripada menghapus
- Backup database sebelum menghapus data penting

---

### 4. Melihat Log Aktivitas

#### Log Tiket:
1. Akses menu **"Ticket Log"**
2. Lihat semua aktivitas terkait tiket:
   - Tiket dibuat
   - Tiket diupdate
   - Tiket dihapus
   - Tiket dibeli
   - Tiket di-refund

#### Log Transaksi:
1. Akses menu **"Transaction Log"**
2. Lihat semua aktivitas transaksi:
   - Pembelian tiket
   - Refund tiket
   - Status pembayaran

#### Informasi Log:
- Timestamp (waktu kejadian)
- User/Admin yang melakukan aksi
- Jenis aksi
- Deskripsi detail
- Data sebelum dan sesudah (untuk update)

---

### 5. Monitoring Sistem

#### Monitoring Real-time:
1. **Active Users**: Lihat jumlah user yang sedang online
2. **Recent Purchases**: Monitor pembelian tiket terbaru
3. **Stock Alerts**: Peringatan jika stok tiket menipis
4. **Error Logs**: Monitor error yang terjadi di sistem

#### Laporan:
1. **Daily Report**: Laporan harian penjualan
2. **Weekly Report**: Laporan mingguan
3. **Monthly Report**: Laporan bulanan
4. **Custom Report**: Buat laporan custom sesuai kebutuhan

#### Export Data:
1. Export ke Excel/CSV
2. Export ke PDF
3. Export ke JSON

---

### 6. Manajemen User (Advanced)

#### Melihat Daftar User:
- Lihat semua user terdaftar
- Informasi: nama, email, tanggal registrasi, total transaksi

#### Aksi pada User:
- **View Details**: Lihat detail user dan riwayat transaksi
- **Disable Account**: Nonaktifkan akun user
- **Reset Password**: Reset password user
- **Delete Account**: Hapus akun user (hati-hati!)

---

### 7. Pengaturan Sistem

#### Konfigurasi Umum:
1. **Site Settings**: Nama situs, logo, tagline
2. **Email Settings**: Konfigurasi email notification
3. **Payment Settings**: Metode pembayaran
4. **Refund Policy**: Atur kebijakan refund

#### Keamanan:
1. **Change Password**: Ganti password admin
2. **Two-Factor Auth**: Aktifkan 2FA (jika tersedia)
3. **IP Whitelist**: Batasi akses admin dari IP tertentu
4. **Session Timeout**: Atur durasi session

---

### 8. Backup dan Restore

#### Backup Database:
1. Akses menu **"Backup"**
2. Klik **"Create Backup"**
3. Database akan di-backup otomatis
4. Download file backup

#### Restore Database:
1. Akses menu **"Restore"**
2. Upload file backup
3. Konfirmasi restore
4. Database akan dikembalikan ke kondisi backup

**PENTING**: Lakukan backup secara berkala!

---

### 9. Logout Admin

#### Langkah-langkah:
1. Klik menu **"Logout"** di dashboard admin
2. Atau akses `/admin/logout`
3. Session admin akan dihapus
4. Diarahkan kembali ke halaman login admin

---

## Tips dan Trik

### Untuk User:
1. **Beli Tiket Lebih Awal**: Tiket terbaik biasanya cepat habis
2. **Cek Email Secara Berkala**: Notifikasi dan konfirmasi dikirim via email
3. **Screenshot Bukti Pembelian**: Simpan sebagai backup
4. **Perhatikan Tanggal Konser**: Jangan sampai terlewat

### Untuk Admin:
1. **Monitor Stok Secara Berkala**: Update stok jika diperlukan
2. **Backup Rutin**: Lakukan backup database setiap hari
3. **Review Log**: Periksa log aktivitas untuk mendeteksi anomali
4. **Update Harga dengan Hati-hati**: Pastikan tidak merugikan customer
5. **Komunikasi dengan User**: Responsif terhadap pertanyaan dan keluhan

---

## FAQ (Frequently Asked Questions)

### Untuk User:

**Q: Apakah saya bisa membeli tiket tanpa registrasi?**
A: Tidak, Anda harus registrasi dan login terlebih dahulu.

**Q: Bagaimana cara membayar tiket?**
A: Saat ini pembayaran dilakukan melalui sistem yang terintegrasi. Detail pembayaran akan diberikan setelah konfirmasi pembelian.

**Q: Apakah tiket bisa dipindahtangankan?**
A: Tidak, tiket hanya berlaku untuk pembeli yang terdaftar.

**Q: Berapa lama proses refund?**
A: Proses refund memakan waktu 3-7 hari kerja.

**Q: Apakah ada biaya tambahan?**
A: Tidak ada biaya tambahan di luar harga tiket.

### Untuk Admin:

**Q: Bagaimana menambah konser baru?**
A: Saat ini konser ditambahkan melalui database. Fitur CRUD konser akan ditambahkan di versi mendatang.

**Q: Apakah bisa export laporan?**
A: Ya, tersedia fitur export ke Excel dan PDF.

**Q: Bagaimana cara menambah admin baru?**
A: Admin baru ditambahkan melalui database atau command line artisan.

---

## Kontak Support

Jika mengalami masalah atau butuh bantuan:
- Email: support@webconcertl.com
- Buat issue di GitHub repository
- Hubungi administrator sistem

---

**Terima kasih telah menggunakan WebConcertL!**
