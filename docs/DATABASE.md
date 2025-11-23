# Database Schema - WebConcertL

Dokumentasi lengkap struktur database untuk aplikasi WebConcertL.

## Overview

Database menggunakan **MySQL** dengan charset **utf8mb4** dan collation **utf8mb4_unicode_ci**.

Total tabel: **11 tabel**

---

## Entity Relationship Diagram (ERD)

```
┌─────────────┐         ┌─────────────┐         ┌─────────────┐
│   artist    │────────>│   concert   │<────────│   ticket    │
└─────────────┘         └─────────────┘         └─────────────┘
                                                       │
                                                       │
                                                       v
┌─────────────┐         ┌─────────────┐         ┌─────────────┐
│    admin    │────────>│   ticket    │<────────│ transaction │
└─────────────┘         └─────────────┘         └─────────────┘
                                                       ^
                                                       │
                                                       │
┌─────────────┐                                       │
│    user     │───────────────────────────────────────┘
└─────────────┘
```

---

## Tabel-tabel

### 1. artist

Menyimpan informasi artis/musisi yang akan tampil di konser.

| Field | Type | Key | Default | Extra | Description |
|-------|------|-----|---------|-------|-------------|
| artist_id | BIGINT UNSIGNED | PRI | NULL | AUTO_INCREMENT | ID unik artis |
| artist_name | VARCHAR(255) | | NULL | | Nama artis |
| genre | VARCHAR(255) | | NULL | | Genre musik |
| country | VARCHAR(100) | | NULL | | Negara asal |
| description | TEXT | | NULL | | Deskripsi artis |
| photo_name | VARCHAR(255) | | NULL | | Nama file foto artis |

**Indexes:**
- PRIMARY KEY (`artist_id`)

**Example Data:**
```sql
INSERT INTO artist VALUES 
(1, 'The Beatles', 'Rock', 'United Kingdom', 'Legendary rock band', 'beatles.jpg'),
(2, 'Taylor Swift', 'Pop', 'United States', 'Pop superstar', 'taylor.jpg');
```

---

### 2. concert

Menyimpan informasi konser yang akan diselenggarakan.

| Field | Type | Key | Default | Extra | Description |
|-------|------|-----|---------|-------|-------------|
| concert_id | BIGINT UNSIGNED | PRI | NULL | AUTO_INCREMENT | ID unik konser |
| artist_id | BIGINT UNSIGNED | FOR | NULL | | ID artis (FK) |
| concert_name | VARCHAR(255) | | NULL | | Nama konser |
| date | DATE | | NULL | | Tanggal konser |
| time | TIME | | NULL | | Waktu mulai konser |
| capacity | INT | | NULL | | Kapasitas venue |
| location | VARCHAR(255) | | NULL | | Lokasi/venue konser |

**Indexes:**
- PRIMARY KEY (`concert_id`)
- FOREIGN KEY (`artist_id`) REFERENCES `artist`(`artist_id`) ON DELETE CASCADE

**Example Data:**
```sql
INSERT INTO concert VALUES 
(1, 1, 'The Beatles Reunion Tour', '2024-12-31', '19:00:00', 5000, 'Jakarta International Stadium'),
(2, 2, 'Eras Tour Jakarta', '2025-01-15', '20:00:00', 8000, 'Gelora Bung Karno Stadium');
```

---

### 3. admin

Menyimpan data administrator sistem.

| Field | Type | Key | Default | Extra | Description |
|-------|------|-----|---------|-------|-------------|
| admin_id | VARCHAR(255) | PRI | NULL | | ID unik admin |
| username | VARCHAR(255) | | NULL | | Username admin |
| password | VARCHAR(255) | | NULL | | Password (hashed) |

**Indexes:**
- PRIMARY KEY (`admin_id`)

**Example Data:**
```sql
INSERT INTO admin VALUES 
('ADM001', 'admin', '$2y$10$hashed_password_here');
```

**Notes:**
- Password harus di-hash menggunakan bcrypt
- Username harus unique

---

### 4. ticket

Menyimpan informasi tiket yang dijual untuk setiap konser.

| Field | Type | Key | Default | Extra | Description |
|-------|------|-----|---------|-------|-------------|
| ticket_id | BIGINT UNSIGNED | PRI | NULL | AUTO_INCREMENT | ID unik tiket |
| admin_id | VARCHAR(255) | FOR | NULL | | ID admin pembuat (FK) |
| concert_id | BIGINT UNSIGNED | FOR | NULL | | ID konser (FK) |
| category | VARCHAR(255) | | NULL | | Kategori tiket |
| price | INT | | NULL | | Harga tiket |
| stock | INT | | NULL | | Stok tersedia |

**Indexes:**
- PRIMARY KEY (`ticket_id`)
- FOREIGN KEY (`admin_id`) REFERENCES `admin`(`admin_id`) ON DELETE CASCADE
- FOREIGN KEY (`concert_id`) REFERENCES `concert`(`concert_id`) ON DELETE CASCADE

**Valid Categories:**
- Regular
- VIP
- VVIP

**Example Data:**
```sql
INSERT INTO ticket VALUES 
(1, 'ADM001', 1, 'Regular', 250000, 2000),
(2, 'ADM001', 1, 'VIP', 500000, 500),
(3, 'ADM001', 1, 'VVIP', 1000000, 100);
```

---

### 5. user

Menyimpan data pengguna/customer.

| Field | Type | Key | Default | Extra | Description |
|-------|------|-----|---------|-------|-------------|
| user_id | BIGINT UNSIGNED | PRI | NULL | AUTO_INCREMENT | ID unik user |
| name | VARCHAR(255) | | NULL | | Nama lengkap |
| email | VARCHAR(255) | UNI | NULL | | Email user |
| password | VARCHAR(255) | | NULL | | Password (hashed) |
| created_at | TIMESTAMP | | NULL | | Waktu registrasi |

**Indexes:**
- PRIMARY KEY (`user_id`)
- UNIQUE KEY (`email`)

**Example Data:**
```sql
INSERT INTO user VALUES 
(1, 'John Doe', 'john@example.com', '$2y$10$hashed_password', '2024-01-01 10:00:00');
```

**Notes:**
- Email harus unique
- Password harus di-hash menggunakan bcrypt

---

### 6. transaction

Menyimpan transaksi pembelian tiket.

| Field | Type | Key | Default | Extra | Description |
|-------|------|-----|---------|-------|-------------|
| transaction_id | BIGINT UNSIGNED | PRI | NULL | AUTO_INCREMENT | ID unik transaksi |
| ticket_id | BIGINT UNSIGNED | FOR | NULL | | ID tiket (FK) |
| user_id | BIGINT UNSIGNED | FOR | NULL | | ID user (FK) |
| quantity | INT | | NULL | | Jumlah tiket dibeli |
| total_price | DECIMAL(10,2) | | NULL | | Total harga |
| purchase_date | DATETIME | | NULL | | Tanggal pembelian |
| fullname | VARCHAR(255) | | NULL | | Nama lengkap pembeli |
| phone_number | VARCHAR(20) | | NULL | | Nomor telepon |
| email | VARCHAR(255) | | NULL | | Email pembeli |

**Indexes:**
- PRIMARY KEY (`transaction_id`)
- FOREIGN KEY (`ticket_id`) REFERENCES `ticket`(`ticket_id`) ON DELETE CASCADE
- FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE

**Example Data:**
```sql
INSERT INTO transaction VALUES 
(1, 1, 1, 2, 500000.00, '2024-01-15 14:30:00', 'John Doe', '08123456789', 'john@example.com');
```

**Business Rules:**
- `total_price` = `quantity` × harga tiket
- Stock tiket harus dikurangi setelah transaksi berhasil
- `purchase_date` otomatis menggunakan waktu saat ini

---

### 7. ticket_log

Menyimpan log aktivitas terkait tiket.

| Field | Type | Key | Default | Extra | Description |
|-------|------|-----|---------|-------|-------------|
| log_id | BIGINT UNSIGNED | PRI | NULL | AUTO_INCREMENT | ID unik log |
| ticket_id | BIGINT UNSIGNED | FOR | NULL | | ID tiket (FK) |
| action | VARCHAR(50) | | NULL | | Jenis aksi |
| description | TEXT | | NULL | | Deskripsi aksi |
| created_at | TIMESTAMP | | CURRENT_TIMESTAMP | | Waktu log dibuat |
| admin_id | VARCHAR(255) | FOR | NULL | | ID admin (FK) |

**Indexes:**
- PRIMARY KEY (`log_id`)
- FOREIGN KEY (`ticket_id`) REFERENCES `ticket`(`ticket_id`) ON DELETE CASCADE

**Valid Actions:**
- CREATE
- UPDATE
- DELETE
- PURCHASE
- REFUND

**Example Data:**
```sql
INSERT INTO ticket_log VALUES 
(1, 1, 'CREATE', 'Tiket Regular dibuat untuk konser The Beatles', '2024-01-01 10:00:00', 'ADM001');
```

---

### 8. transaction_log

Menyimpan log transaksi.

| Field | Type | Key | Default | Extra | Description |
|-------|------|-----|---------|-------|-------------|
| log_id | BIGINT UNSIGNED | PRI | NULL | AUTO_INCREMENT | ID unik log |
| transaction_id | BIGINT UNSIGNED | FOR | NULL | | ID transaksi (FK) |
| action | VARCHAR(50) | | NULL | | Jenis aksi |
| description | TEXT | | NULL | | Deskripsi aksi |
| created_at | TIMESTAMP | | CURRENT_TIMESTAMP | | Waktu log dibuat |
| user_id | BIGINT UNSIGNED | FOR | NULL | | ID user (FK) |

**Indexes:**
- PRIMARY KEY (`log_id`)
- FOREIGN KEY (`transaction_id`) REFERENCES `transaction`(`transaction_id`) ON DELETE CASCADE

**Valid Actions:**
- PURCHASE
- REFUND
- CANCEL

**Example Data:**
```sql
INSERT INTO transaction_log VALUES 
(1, 1, 'PURCHASE', 'Pembelian 2 tiket Regular untuk konser The Beatles', '2024-01-15 14:30:00', 1);
```

---

### 9. users (Laravel Default)

Tabel default Laravel untuk authentication.

| Field | Type | Key | Default | Extra | Description |
|-------|------|-----|---------|-------|-------------|
| id | BIGINT UNSIGNED | PRI | NULL | AUTO_INCREMENT | ID user |
| name | VARCHAR(255) | | NULL | | Nama user |
| email | VARCHAR(255) | UNI | NULL | | Email user |
| email_verified_at | TIMESTAMP | | NULL | NULL | Waktu verifikasi email |
| password | VARCHAR(255) | | NULL | | Password (hashed) |
| remember_token | VARCHAR(100) | | NULL | NULL | Token remember me |
| created_at | TIMESTAMP | | NULL | NULL | Waktu dibuat |
| updated_at | TIMESTAMP | | NULL | NULL | Waktu diupdate |

---

### 10. cache (Laravel Default)

Tabel untuk cache Laravel.

| Field | Type | Key | Default | Extra | Description |
|-------|------|-----|---------|-------|-------------|
| key | VARCHAR(255) | PRI | NULL | | Cache key |
| value | MEDIUMTEXT | | NULL | | Cache value |
| expiration | INT | | NULL | | Waktu expiry |

---

### 11. jobs (Laravel Default)

Tabel untuk queue jobs Laravel.

| Field | Type | Key | Default | Extra | Description |
|-------|------|-----|---------|-------|-------------|
| id | BIGINT UNSIGNED | PRI | NULL | AUTO_INCREMENT | Job ID |
| queue | VARCHAR(255) | | NULL | | Queue name |
| payload | LONGTEXT | | NULL | | Job data |
| attempts | TINYINT UNSIGNED | | NULL | | Attempt count |
| reserved_at | INT UNSIGNED | | NULL | NULL | Reserved time |
| available_at | INT UNSIGNED | | NULL | | Available time |
| created_at | INT UNSIGNED | | NULL | | Created time |

---

## Relationships

### One-to-Many Relationships

1. **artist** → **concert**
   - Satu artis dapat memiliki banyak konser
   - `artist.artist_id` → `concert.artist_id`

2. **concert** → **ticket**
   - Satu konser dapat memiliki banyak tiket (kategori berbeda)
   - `concert.concert_id` → `ticket.concert_id`

3. **admin** → **ticket**
   - Satu admin dapat membuat banyak tiket
   - `admin.admin_id` → `ticket.admin_id`

4. **ticket** → **transaction**
   - Satu tiket dapat memiliki banyak transaksi
   - `ticket.ticket_id` → `transaction.ticket_id`

5. **user** → **transaction**
   - Satu user dapat melakukan banyak transaksi
   - `user.user_id` → `transaction.user_id`

---

## Database Triggers (Recommended)

### 1. Update Stock After Purchase

```sql
DELIMITER $$
CREATE TRIGGER after_purchase_insert
AFTER INSERT ON transaction
FOR EACH ROW
BEGIN
    UPDATE ticket 
    SET stock = stock - NEW.quantity 
    WHERE ticket_id = NEW.ticket_id;
END$$
DELIMITER ;
```

### 2. Restore Stock After Refund

```sql
DELIMITER $$
CREATE TRIGGER after_transaction_delete
AFTER DELETE ON transaction
FOR EACH ROW
BEGIN
    UPDATE ticket 
    SET stock = stock + OLD.quantity 
    WHERE ticket_id = OLD.ticket_id;
END$$
DELIMITER ;
```

---

## Stored Procedures (Recommended)

### 1. Add Ticket with Validation

```sql
DELIMITER $$
CREATE PROCEDURE add_ticket(
    IN p_admin_id VARCHAR(255),
    IN p_concert_id BIGINT,
    IN p_category VARCHAR(255),
    IN p_price INT,
    IN p_stock INT
)
BEGIN
    -- Validation
    IF p_price <= 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Price must be greater than 0';
    END IF;
    
    IF p_stock <= 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Stock must be greater than 0';
    END IF;
    
    -- Insert ticket
    INSERT INTO ticket (admin_id, concert_id, category, price, stock)
    VALUES (p_admin_id, p_concert_id, p_category, p_price, p_stock);
    
    -- Log action
    INSERT INTO ticket_log (ticket_id, action, description, admin_id)
    VALUES (LAST_INSERT_ID(), 'CREATE', CONCAT('Created ', p_category, ' ticket'), p_admin_id);
END$$
DELIMITER ;
```

### 2. Process Purchase

```sql
DELIMITER $$
CREATE PROCEDURE process_purchase(
    IN p_ticket_id BIGINT,
    IN p_user_id BIGINT,
    IN p_quantity INT,
    IN p_fullname VARCHAR(255),
    IN p_phone VARCHAR(20),
    IN p_email VARCHAR(255)
)
BEGIN
    DECLARE v_stock INT;
    DECLARE v_price INT;
    DECLARE v_total DECIMAL(10,2);
    
    -- Get current stock and price
    SELECT stock, price INTO v_stock, v_price
    FROM ticket WHERE ticket_id = p_ticket_id;
    
    -- Check stock availability
    IF v_stock < p_quantity THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Insufficient stock';
    END IF;
    
    -- Calculate total
    SET v_total = v_price * p_quantity;
    
    -- Insert transaction
    INSERT INTO transaction (ticket_id, user_id, quantity, total_price, purchase_date, fullname, phone_number, email)
    VALUES (p_ticket_id, p_user_id, p_quantity, v_total, NOW(), p_fullname, p_phone, p_email);
    
    -- Update stock
    UPDATE ticket SET stock = stock - p_quantity WHERE ticket_id = p_ticket_id;
    
    -- Log transaction
    INSERT INTO transaction_log (transaction_id, action, description, user_id)
    VALUES (LAST_INSERT_ID(), 'PURCHASE', CONCAT('Purchased ', p_quantity, ' tickets'), p_user_id);
END$$
DELIMITER ;
```

---

## Indexes and Performance

### Recommended Indexes

```sql
-- Index untuk pencarian tiket berdasarkan konser
CREATE INDEX idx_ticket_concert ON ticket(concert_id);

-- Index untuk pencarian transaksi berdasarkan user
CREATE INDEX idx_transaction_user ON transaction(user_id);

-- Index untuk pencarian konser berdasarkan tanggal
CREATE INDEX idx_concert_date ON concert(date);

-- Index untuk pencarian berdasarkan email
CREATE INDEX idx_user_email ON user(email);
```

---

## Backup and Restore

### Backup Database
```bash
mysqldump -u username -p webconcertl > backup_webconcertl_$(date +%Y%m%d).sql
```

### Restore Database
```bash
mysql -u username -p webconcertl < backup_webconcertl_20240115.sql
```

---

## Migration Files

Semua migration files tersimpan di folder `database/migrations/`:

1. `0001_01_01_000000_create_users_table.php`
2. `0001_01_01_000001_create_cache_table.php`
3. `0001_01_01_000002_create_jobs_table.php`
4. `2024_12_26_123154_create_artist_table.php`
5. `2024_12_29_135900_create__concert_table.php`
6. `2024_12_29_142640_create_admin_table.php`
7. `2024_12_29_144015_create_ticket_table.php`
8. `2024_12_29_144128_create_ticket_log_table.php`
9. `2024_12_29_144201_create_user_table.php`
10. `2024_12_29_144231_create_transaction_table.php`
11. `2024_12_29_144252_create_transaction_log_table.php`

---

## Security Considerations

1. **Password Hashing**: Semua password harus di-hash menggunakan bcrypt
2. **SQL Injection**: Gunakan prepared statements dan Eloquent ORM
3. **Foreign Key Constraints**: Pastikan referential integrity
4. **Backup Regular**: Lakukan backup database secara berkala
5. **Access Control**: Batasi akses langsung ke database

---

## Database Size Estimation

Estimasi ukuran database berdasarkan data:
- 100 artis: ~50 KB
- 500 konser: ~200 KB
- 2000 tiket: ~500 KB
- 10,000 transaksi: ~5 MB
- Logs: ~2 MB

**Total Estimated:** ~8 MB untuk data awal

Untuk production dengan traffic tinggi, siapkan minimal 100 MB storage.
