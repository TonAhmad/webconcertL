# Dokumentasi API dan Routes - WebConcertL

Dokumentasi lengkap untuk semua endpoint API dan routing di aplikasi WebConcertL.

## Base URL
- Development: `http://localhost:8000`
- Production: `https://your-domain.com`

---

## Public Routes

### Homepage
**Endpoint:** `GET /`  
**Controller:** `PagesController@index`  
**View:** `paging/index.blade.php`  
**Deskripsi:** Menampilkan halaman utama aplikasi

**Response:**
```html
Halaman utama dengan informasi konser dan navigasi
```

---

### Daftar Artis
**Endpoint:** `GET /artist`  
**Controller:** `PagesController@artist`  
**View:** `paging/artist.blade.php`  
**Deskripsi:** Menampilkan daftar semua artis yang terdaftar

**Response Data:**
```php
[
    'artists' => [
        [
            'artist_id' => 1,
            'artist_name' => 'Nama Artis',
            'genre' => 'Pop',
            'country' => 'Indonesia',
            'description' => 'Deskripsi artis...',
            'photo_name' => 'artist_photo.jpg'
        ],
        // ...
    ]
]
```

---

### Informasi Venue
**Endpoint:** `GET /venue`  
**Controller:** `PagesController@venue`  
**View:** `paging/venue.blade.php`  
**Deskripsi:** Menampilkan informasi venue/lokasi konser

---

## User Authentication Routes

### Halaman Login User
**Endpoint:** `GET /signin`  
**Controller:** `PagesController@signin`  
**View:** `login/signin.blade.php`  
**Deskripsi:** Menampilkan form login untuk user

---

### Process Login User
**Endpoint:** `POST /ticket`  
**Controller:** `UserController@login`  
**Deskripsi:** Memproses login user

**Request Body:**
```json
{
    "email": "user@example.com",
    "password": "password123"
}
```

**Response Success:**
```json
{
    "success": true,
    "message": "Login berhasil",
    "redirect": "/ticket"
}
```

**Response Error:**
```json
{
    "success": false,
    "message": "Email atau password salah"
}
```

---

### Halaman Registrasi
**Endpoint:** `GET /signin/signup`  
**Controller:** `UserController@signup`  
**View:** Form registrasi user

---

### Process Registrasi
**Endpoint:** `POST /signin`  
**Controller:** `UserController@store`  
**Deskripsi:** Menyimpan data user baru

**Request Body:**
```json
{
    "name": "Nama Lengkap",
    "email": "user@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

---

### Logout User
**Endpoint:** `GET /logout`  
**Controller:** `UserController@logout`  
**Deskripsi:** Logout user dan hapus session

---

## Ticket Routes (User)

### Tampilkan Tiket Tersedia
**Endpoint:** `GET /ticket`  
**Controller:** `TicketController@showTicketsWithConcerts`  
**Deskripsi:** Menampilkan semua tiket yang tersedia beserta informasi konser
**Authentication:** Required

**Response Data:**
```php
[
    'tickets' => [
        [
            'ticket_id' => 1,
            'concert_id' => 1,
            'concert_name' => 'Concert Name',
            'category' => 'VIP',
            'price' => 500000,
            'stock' => 100,
            'date' => '2024-12-31',
            'time' => '19:00:00',
            'location' => 'Jakarta',
            'artist_name' => 'Artist Name'
        ],
        // ...
    ]
]
```

---

### Form Pembelian Tiket
**Endpoint:** `POST /purchase/{ticket_id}/{quantity}`  
**Controller:** `TicketController@showPurchaseForm`  
**Deskripsi:** Menampilkan form pembelian untuk tiket tertentu
**Authentication:** Required

**Parameters:**
- `ticket_id` (integer): ID tiket yang akan dibeli
- `quantity` (integer): Jumlah tiket yang akan dibeli

**Response:**
Form pembelian dengan detail tiket dan total harga

---

### Process Pembelian Tiket
**Endpoint:** `POST /purchase`  
**Controller:** `TicketController@processPurchase`  
**Deskripsi:** Memproses pembelian tiket
**Authentication:** Required

**Request Body:**
```json
{
    "ticket_id": 1,
    "user_id": 1,
    "quantity": 2,
    "fullname": "John Doe",
    "phone_number": "08123456789",
    "email": "john@example.com"
}
```

**Response Success:**
```json
{
    "success": true,
    "message": "Pembelian tiket berhasil",
    "transaction_id": 123
}
```

**Response Error:**
```json
{
    "success": false,
    "message": "Stok tiket tidak mencukupi"
}
```

---

## User Account Routes

### Halaman Akun User
**Endpoint:** `GET /account`  
**Controller:** `UserController@account`  
**Deskripsi:** Menampilkan halaman akun user dengan riwayat transaksi
**Authentication:** Required

**Response Data:**
```php
[
    'user' => [
        'user_id' => 1,
        'name' => 'User Name',
        'email' => 'user@example.com'
    ],
    'transactions' => [
        [
            'transaction_id' => 1,
            'ticket_id' => 1,
            'concert_name' => 'Concert Name',
            'category' => 'VIP',
            'quantity' => 2,
            'total_price' => 1000000,
            'purchase_date' => '2024-01-15 14:30:00'
        ],
        // ...
    ]
]
```

---

### Refund Tiket
**Endpoint:** `POST /account/refund`  
**Controller:** `UserController@refundTicket`  
**Deskripsi:** Melakukan refund tiket yang sudah dibeli
**Authentication:** Required

**Request Body:**
```json
{
    "transaction_id": 123
}
```

**Response Success:**
```json
{
    "success": true,
    "message": "Refund berhasil diproses"
}
```

---

## Admin Routes

### Halaman Login Admin
**Endpoint:** `GET /admin`  
**Controller:** `AdminController@loginForm`  
**View:** `admin/login.blade.php`  
**Deskripsi:** Menampilkan form login admin

---

### Process Login Admin
**Endpoint:** `POST /admin/dashboard`  
**Controller:** `AdminController@login`  
**Deskripsi:** Memproses login admin

**Request Body:**
```json
{
    "username": "admin",
    "password": "admin123"
}
```

**Response Success:**
Redirect ke dashboard admin

---

### Dashboard Admin
**Endpoint:** `GET /admin/dashboard`  
**Controller:** `AdminController@adminDashboard`  
**Deskripsi:** Menampilkan dashboard admin dengan statistik
**Authentication:** Admin Required

**Response Data:**
```php
[
    'total_tickets' => 150,
    'total_transactions' => 45,
    'total_revenue' => 50000000,
    'recent_transactions' => [...]
]
```

---

### Logout Admin
**Endpoint:** `GET /admin/logout`  
**Controller:** `AdminController@logout`  
**Deskripsi:** Logout admin dan hapus session

---

## Admin Ticket Management

### Daftar Semua Tiket (Admin)
**Endpoint:** `GET /admin/ticket`  
**Controller:** `TicketController@showTickets`  
**Deskripsi:** Menampilkan semua tiket untuk admin
**Authentication:** Admin Required

**Response Data:**
```php
[
    'tickets' => [
        [
            'ticket_id' => 1,
            'concert_id' => 1,
            'concert_name' => 'Concert Name',
            'category' => 'VIP',
            'price' => 500000,
            'stock' => 100,
            'admin_id' => 'ADM001',
            'username' => 'admin'
        ],
        // ...
    ]
]
```

---

### Form Tambah Tiket
**Endpoint:** `GET /admin/ticket/add`  
**Controller:** `TicketController@showAddTicketForm`  
**Deskripsi:** Menampilkan form untuk menambah tiket baru
**Authentication:** Admin Required

---

### Simpan Tiket Baru
**Endpoint:** `POST /admin/ticket/add`  
**Controller:** `TicketController@addTicket`  
**Deskripsi:** Menyimpan tiket baru ke database
**Authentication:** Admin Required

**Request Body:**
```json
{
    "concert_id": 1,
    "admin_id": "ADM001",
    "category": "VIP",
    "price": 500000,
    "stock": 100
}
```

**Validation Rules:**
- `concert_id`: required, integer, exists in concert table
- `category`: required, must be one of: Regular, VIP, VVIP
- `stock`: required, integer, minimum 1
- `price`: required, numeric, minimum 0.01
- `admin_id`: required, exists in admin table

**Response Success:**
```json
{
    "success": true,
    "message": "Tiket berhasil ditambahkan",
    "ticket_id": 123
}
```

---

### Form Edit Tiket
**Endpoint:** `GET /admin/tickets/{ticket_id}/edit`  
**Controller:** `TicketController@editTicket`  
**Deskripsi:** Menampilkan form untuk edit tiket
**Authentication:** Admin Required

**Parameters:**
- `ticket_id` (integer): ID tiket yang akan diedit

---

### Update Tiket
**Endpoint:** `POST /admin/tickets/{ticket_id}/edit`  
**Controller:** `TicketController@updateTicket`  
**Deskripsi:** Mengupdate data tiket
**Authentication:** Admin Required

**Parameters:**
- `ticket_id` (integer): ID tiket yang akan diupdate

**Request Body:**
```json
{
    "concert_id": 1,
    "category": "VVIP",
    "price": 750000,
    "stock": 50
}
```

**Response Success:**
```json
{
    "success": true,
    "message": "Tiket berhasil diupdate"
}
```

---

### Hapus Tiket
**Endpoint:** `DELETE /tickets/{ticket_id}`  
**Controller:** `TicketController@destroy`  
**Deskripsi:** Menghapus tiket dari database
**Authentication:** Admin Required

**Parameters:**
- `ticket_id` (integer): ID tiket yang akan dihapus

**Response Success:**
```json
{
    "success": true,
    "message": "Tiket berhasil dihapus"
}
```

---

## Error Responses

### 401 Unauthorized
```json
{
    "error": "Unauthorized",
    "message": "Anda harus login untuk mengakses halaman ini"
}
```

### 403 Forbidden
```json
{
    "error": "Forbidden",
    "message": "Anda tidak memiliki akses ke halaman ini"
}
```

### 404 Not Found
```json
{
    "error": "Not Found",
    "message": "Resource tidak ditemukan"
}
```

### 422 Validation Error
```json
{
    "error": "Validation Error",
    "message": "Data yang Anda masukkan tidak valid",
    "errors": {
        "email": ["Format email tidak valid"],
        "price": ["Harga harus lebih dari 0"]
    }
}
```

### 500 Server Error
```json
{
    "error": "Server Error",
    "message": "Terjadi kesalahan pada server"
}
```

---

## Authentication

### User Authentication
User authentication menggunakan Laravel session. Setelah login, session akan disimpan dan digunakan untuk autentikasi request berikutnya.

**Session Data:**
```php
[
    'user_id' => 1,
    'name' => 'User Name',
    'email' => 'user@example.com'
]
```

### Admin Authentication
Admin authentication juga menggunakan Laravel session dengan data yang berbeda.

**Session Data:**
```php
[
    'admin' => [
        'admin_id' => 'ADM001',
        'username' => 'admin'
    ]
]
```

---

## Rate Limiting

Beberapa endpoint memiliki rate limiting untuk mencegah abuse:

- Login routes: 5 attempts per minute
- Purchase routes: 10 requests per minute
- API routes: 60 requests per minute

Jika melebihi limit, akan menerima response:
```json
{
    "error": "Too Many Requests",
    "message": "Terlalu banyak request. Silakan coba lagi nanti.",
    "retry_after": 60
}
```

---

## CORS Headers

Aplikasi ini mendukung CORS untuk akses dari domain lain (jika dikonfigurasi):

```
Access-Control-Allow-Origin: *
Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS
Access-Control-Allow-Headers: Content-Type, Authorization
```

---

## Testing Routes

Untuk testing API, gunakan tools seperti:
- **Postman**: Import collection dan test semua endpoint
- **cURL**: Test individual endpoint dari command line
- **PHPUnit**: Run automated tests

Contoh cURL:
```bash
# Test login
curl -X POST http://localhost:8000/ticket \
  -H "Content-Type: application/json" \
  -d '{"email":"user@example.com","password":"password123"}'

# Test get tickets
curl -X GET http://localhost:8000/ticket \
  -H "Cookie: laravel_session=your_session_cookie"
```

---

## Changelog

### Version 1.0.0
- Initial release dengan semua fitur dasar
- User authentication
- Admin panel
- Ticket management
- Transaction processing
