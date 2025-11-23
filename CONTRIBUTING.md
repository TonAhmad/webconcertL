# Contributing to WebConcertL

Terima kasih atas minat Anda untuk berkontribusi pada WebConcertL! Dokumen ini berisi panduan untuk berkontribusi pada proyek ini.

## Daftar Isi

- [Code of Conduct](#code-of-conduct)
- [Cara Berkontribusi](#cara-berkontribusi)
- [Melaporkan Bug](#melaporkan-bug)
- [Mengajukan Fitur Baru](#mengajukan-fitur-baru)
- [Pull Request Process](#pull-request-process)
- [Coding Standards](#coding-standards)
- [Commit Message Guidelines](#commit-message-guidelines)
- [Development Setup](#development-setup)

---

## Code of Conduct

Proyek ini mengikuti kode etik berikut:

### Komitmen Kami

- Membuat lingkungan yang ramah dan inklusif untuk semua kontributor
- Menghormati sudut pandang dan pengalaman yang berbeda
- Menerima kritik konstruktif dengan baik
- Fokus pada yang terbaik untuk komunitas
- Menunjukkan empati terhadap anggota komunitas lainnya

### Perilaku yang Tidak Dapat Diterima

- Penggunaan bahasa atau gambar yang tidak pantas
- Trolling, komentar menghina, atau serangan pribadi
- Pelecehan publik atau pribadi
- Publikasi informasi pribadi orang lain tanpa izin
- Perilaku tidak profesional lainnya

---

## Cara Berkontribusi

Ada banyak cara untuk berkontribusi pada WebConcertL:

### 1. Melaporkan Bug
Jika Anda menemukan bug, silakan buat issue di GitHub dengan informasi detail.

### 2. Memperbaiki Bug
Cari issue dengan label `bug` dan ajukan Pull Request dengan perbaikan.

### 3. Menambah Fitur
Lihat issue dengan label `enhancement` atau `feature request` dan implementasikan fitur tersebut.

### 4. Meningkatkan Dokumentasi
Dokumentasi yang baik sangat penting! Anda bisa membantu dengan:
- Memperbaiki typo
- Menambah contoh penggunaan
- Menerjemahkan dokumentasi
- Menambah tutorial

### 5. Code Review
Review Pull Request dari kontributor lain dan berikan feedback konstruktif.

---

## Melaporkan Bug

### Sebelum Melaporkan

1. **Cek dokumentasi** - Pastikan bukan masalah konfigurasi
2. **Search issues** - Lihat apakah bug sudah dilaporkan sebelumnya
3. **Update ke versi terbaru** - Bug mungkin sudah diperbaiki

### Informasi yang Dibutuhkan

Saat melaporkan bug, sertakan:

```markdown
**Deskripsi Bug:**
Penjelasan singkat tentang bug

**Langkah Reproduksi:**
1. Buka halaman '...'
2. Klik tombol '....'
3. Scroll ke '....'
4. Lihat error

**Hasil yang Diharapkan:**
Apa yang seharusnya terjadi

**Hasil Aktual:**
Apa yang benar-benar terjadi

**Screenshots:**
Jika memungkinkan, tambahkan screenshot

**Environment:**
- OS: [e.g. Windows 11, Ubuntu 22.04]
- Browser: [e.g. Chrome 120, Firefox 121]
- PHP Version: [e.g. 8.2.13]
- Laravel Version: [e.g. 11.31]
- MySQL Version: [e.g. 8.0.35]

**Log Error:**
Paste error dari `storage/logs/laravel.log`

**Informasi Tambahan:**
Konteks lain yang mungkin relevan
```

---

## Mengajukan Fitur Baru

### Template Feature Request

```markdown
**Fitur yang Diusulkan:**
Deskripsi singkat fitur

**Masalah yang Dipecahkan:**
Jelaskan masalah yang akan diselesaikan fitur ini

**Solusi yang Diusulkan:**
Bagaimana fitur ini seharusnya bekerja

**Alternatif yang Dipertimbangkan:**
Solusi alternatif lain yang sudah dipikirkan

**Prioritas:**
- [ ] Critical
- [ ] High
- [ ] Medium
- [ ] Low

**Dampak:**
- Jumlah user yang terpengaruh
- Kompleksitas implementasi
- Breaking changes (jika ada)
```

---

## Pull Request Process

### 1. Fork dan Clone Repository

```bash
# Fork repository di GitHub
# Kemudian clone fork Anda
git clone https://github.com/YOUR_USERNAME/webconcertL.git
cd webconcertL
```

### 2. Buat Branch Baru

```bash
# Buat branch dari main
git checkout -b feature/nama-fitur
# atau
git checkout -b bugfix/nama-bug
```

Konvensi penamaan branch:
- `feature/` - untuk fitur baru
- `bugfix/` - untuk perbaikan bug
- `hotfix/` - untuk perbaikan urgent
- `docs/` - untuk perubahan dokumentasi
- `refactor/` - untuk refactoring code

### 3. Development Setup

```bash
# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate
php artisan db:seed

# Run development server
composer run dev
```

### 4. Buat Perubahan

- Tulis kode yang clean dan readable
- Ikuti [Coding Standards](#coding-standards)
- Tambahkan tests jika memungkinkan
- Update dokumentasi jika diperlukan

### 5. Test Perubahan Anda

```bash
# Run PHP linter
./vendor/bin/pint

# Run tests
php artisan test

# Check code coverage (optional)
php artisan test --coverage
```

### 6. Commit Perubahan

```bash
git add .
git commit -m "feat: tambah fitur pembelian grup tiket"
```

Lihat [Commit Message Guidelines](#commit-message-guidelines) untuk format commit yang benar.

### 7. Push dan Buat Pull Request

```bash
# Push ke fork Anda
git push origin feature/nama-fitur

# Buat Pull Request di GitHub
# Isi template PR dengan lengkap
```

### 8. Pull Request Checklist

Sebelum submit PR, pastikan:

- [ ] Code sudah di-lint dengan `./vendor/bin/pint`
- [ ] Tests pass dengan `php artisan test`
- [ ] Dokumentasi sudah diupdate (jika perlu)
- [ ] Commit messages mengikuti konvensi
- [ ] Branch up-to-date dengan main
- [ ] No merge conflicts
- [ ] PR description jelas dan detail
- [ ] Screenshots ditambahkan (untuk perubahan UI)

---

## Coding Standards

### PHP Standards (PSR-12)

WebConcertL mengikuti [PSR-12 Coding Standard](https://www.php-fig.org/psr/psr-12/).

**Gunakan Laravel Pint untuk auto-format:**
```bash
./vendor/bin/pint
```

#### Contoh PHP Style

```php
<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of tickets.
     */
    public function index(): View
    {
        $tickets = Ticket::with(['concert', 'admin'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.tickets.index', compact('tickets'));
    }

    /**
     * Store a newly created ticket.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'concert_id' => 'required|exists:concert,concert_id',
            'category' => 'required|in:Regular,VIP,VVIP',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
        ]);

        $ticket = Ticket::create($validated);

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Tiket berhasil ditambahkan');
    }
}
```

### JavaScript Standards

- Gunakan ES6+ syntax
- Prefer `const` dan `let` over `var`
- Use arrow functions when appropriate
- Add comments untuk logic yang kompleks

```javascript
// Good
const calculateTotal = (price, quantity) => {
    return price * quantity;
};

// Bad
var calculateTotal = function(price, quantity) {
    return price * quantity;
}
```

### Blade Templates

```blade
{{-- Good: Proper indentation and spacing --}}
<div class="container">
    @foreach ($tickets as $ticket)
        <div class="ticket-card">
            <h3>{{ $ticket->concert->concert_name }}</h3>
            <p>{{ $ticket->category }} - Rp {{ number_format($ticket->price) }}</p>
        </div>
    @endforeach
</div>

{{-- Always escape output --}}
{{ $userInput }}  {{-- Escaped --}}
{!! $trustedHtml !!}  {{-- Unescaped - use only for trusted content --}}
```

### Database

- Gunakan migrations untuk schema changes
- Gunakan seeders untuk data testing
- Gunakan Eloquent ORM, hindari raw queries
- Tambahkan indexes untuk foreign keys
- Gunakan proper naming conventions

```php
// Migration example
Schema::create('tickets', function (Blueprint $table) {
    $table->id('ticket_id');
    $table->foreignId('concert_id')
        ->constrained('concert', 'concert_id')
        ->onDelete('cascade');
    $table->string('category');
    $table->integer('price');
    $table->integer('stock');
    $table->timestamps();

    // Add indexes
    $table->index('concert_id');
    $table->index('category');
});
```

---

## Commit Message Guidelines

Kami mengikuti [Conventional Commits](https://www.conventionalcommits.org/).

### Format

```
<type>(<scope>): <subject>

<body>

<footer>
```

### Types

- `feat`: Fitur baru
- `fix`: Perbaikan bug
- `docs`: Perubahan dokumentasi
- `style`: Format code (tidak mengubah logic)
- `refactor`: Refactoring code
- `perf`: Peningkatan performance
- `test`: Menambah atau memperbaiki tests
- `chore`: Perubahan build process atau tools

### Contoh

```bash
# Fitur baru
git commit -m "feat(ticket): tambah validasi stok tiket sebelum purchase"

# Bug fix
git commit -m "fix(auth): perbaiki session timeout di admin panel"

# Dokumentasi
git commit -m "docs(readme): tambah panduan instalasi di Windows"

# Dengan body
git commit -m "feat(refund): implementasi sistem refund tiket

- Tambah route untuk refund request
- Tambah validasi periode refund
- Update stock setelah refund disetujui
- Kirim email notifikasi refund

Closes #123"
```

---

## Development Setup

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js >= 18.x
- MySQL >= 8.0
- Git

### Local Development

```bash
# Clone repository
git clone https://github.com/TonAhmad/webconcertL.git
cd webconcertL

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate
php artisan db:seed

# Build assets
npm run build

# Run development server
composer run dev
```

### Database Seeding

Untuk development, gunakan seeders:

```bash
# Seed all
php artisan db:seed

# Seed specific seeder
php artisan db:seed --class=ArtistSeeder
```

### Testing

```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/TicketTest.php

# Run with coverage
php artisan test --coverage
```

---

## Review Process

1. **Automated Checks**: PR akan otomatis di-check oleh CI/CD
2. **Code Review**: Maintainer akan review code Anda
3. **Feedback**: Anda mungkin diminta untuk melakukan perubahan
4. **Approval**: Setelah approved, PR akan di-merge

### Response Time

- Initial review: 1-3 hari
- Follow-up review: 1-2 hari

---

## Pertanyaan?

Jika ada pertanyaan tentang kontribusi:

1. Baca dokumentasi terlebih dahulu
2. Search existing issues
3. Buat issue baru dengan label `question`
4. Join Discord/Slack community (jika ada)

---

## License

Dengan berkontribusi pada WebConcertL, Anda setuju bahwa kontribusi Anda akan dilisensikan di bawah lisensi yang sama dengan proyek ini.

---

## Terima Kasih!

Kontribusi Anda, besar atau kecil, sangat berarti untuk proyek ini. Terima kasih telah meluangkan waktu untuk berkontribusi! 🎉
