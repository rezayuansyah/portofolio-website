# Portfolio Website — Laravel + Inertia.js

Website portofolio dinamis yang dibangun menggunakan **Laravel** (backend) dan **Inertia.js** (bridge frontend) tanpa perlu membuat API terpisah seperti REST/GraphQL.

## Tech Stack

- **Backend**: Laravel 13
- **Bahasa**: PHP >= 8.3 (minimum requirement Laravel 13)
- **Frontend Bridge**: Inertia.js
- **Frontend Framework**: React
- **Database**: MySQL / PostgreSQL *(isi sesuai pilihan)*
- **Auth & Otorisasi**: Session-based auth (Laravel built-in) + RBAC custom / package (lihat bagian Roadmap Fitur)

---

## Roadmap Fitur (Auth, Security & RBAC)

Project ini sengaja dibangun bertahap sebagai media belajar sekaligus membangun sistem yang terstruktur, aman, dan lengkap. Urutan pengerjaan yang disarankan:

### Tahap 1 — Fondasi Auth
- [ ] Registrasi & login (session-based, bukan token, karena Inertia jalan di monolith)
- [ ] Email verification
- [ ] Password reset & forgot password
- [ ] Rate limiting untuk login (brute-force protection)
- [ ] Remember me & session management

### Tahap 2 — RBAC (Role-Based Access Control)
- [ ] Desain skema: `users`, `roles`, `permissions`, `role_has_permissions`, `model_has_roles`
- [ ] Middleware/gate untuk cek permission per-route dan per-komponen frontend
- [ ] Seeder role default (misal: `super-admin`, `admin`, `editor`, `viewer`)
- [ ] Halaman admin untuk manage roles & permissions
- [ ] Opsional: evaluasi package seperti `spatie/laravel-permission` vs custom-built (bagus untuk belajar keduanya)

### Tahap 3 — Security Hardening
- [ ] CSRF protection (default Laravel + pastikan Inertia handle dengan benar)
- [ ] Policy & Gate untuk authorization di level model
- [ ] Audit log (siapa melakukan apa, kapan)
- [ ] 2FA (Two-Factor Authentication)
- [ ] Sanitasi input & validasi form request
- [ ] Security headers (CSP, X-Frame-Options, dll)
- [ ] Rate limiting API/route sensitif

### Tahap 4 — Fitur Portofolio (Konten)
- [ ] CRUD project/portofolio
- [ ] CRUD blog/artikel (opsional)
- [ ] Upload & manajemen media/gambar
- [ ] Halaman publik (landing page, about, contact)
- [ ] Dashboard admin untuk kelola semua konten

> Checklist ini akan diupdate progresif seiring development. Detail implementasi teknis tiap fitur akan didokumentasikan terpisah di folder `docs/` (opsional) atau di README ini seiring berjalan.

---

## Instalasi

### 1. Persyaratan Sistem

Pastikan sudah terinstall:

- PHP >= 8.3 (wajib, minimum requirement Laravel 13)
- Composer
- Node.js >= 18 & NPM
- Database server (MySQL/PostgreSQL/SQLite)
- Git

Cek versi PHP dan Composer:

```bash
php -v
composer -v
node -v
npm -v
```

### 2. Instalasi Laravel

Ada dua cara membuat project Laravel baru. Pilih salah satu:

**Cara 1 — Menggunakan Laravel Installer (disarankan)**

Install Laravel installer secara global (sekali saja per komputer):

```bash
composer global require laravel/installer
```

Pastikan direktori global Composer sudah masuk ke `PATH` sistem, lalu buat project baru:

```bash
laravel new nama-project
cd nama-project
```

**Cara 2 — Menggunakan Composer create-project**

```bash
composer create-project laravel/laravel nama-project
cd nama-project
```

Setelah project dibuat, jalankan untuk memastikan Laravel berjalan normal:

```bash
php artisan serve
```

Jika muncul halaman welcome Laravel di `http://127.0.0.1:8000`, instalasi berhasil.

> Jika kamu melanjutkan dari repository yang sudah ada (bukan membuat project baru), lewati langkah di atas dan langsung ke langkah berikut.

### 3. Clone Repository (jika melanjutkan dari repo yang sudah ada)

```bash
git clone https://github.com/username/nama-repo.git
cd nama-repo
```

### 4. Install Dependency Laravel (Backend)

```bash
composer install
```

### 5. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Sesuaikan konfigurasi database di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Install Inertia.js di Laravel (Server Side)

Install adapter server-side Inertia:

```bash
composer require inertiajs/inertia-laravel
```

Publish middleware Inertia:

```bash
php artisan inertia:middleware
```

Daftarkan middleware `HandleInertiaRequests` di `bootstrap/app.php` (Laravel 11) pada bagian `withMiddleware`:

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        \App\Http\Middleware\HandleInertiaRequests::class,
    ]);
})
```

### 7. Install Dependency Frontend (NPM)

```bash
npm install
```

### 8. Install Inertia.js Client Side (React)

```bash
npm install @inertiajs/react
```

Jika belum ada, install juga dependency React-nya:

```bash
npm install react react-dom
```

### 9. Jalankan Migrasi Database

```bash
php artisan migrate
```

Jika ada seeder untuk data awal (opsional):

```bash
php artisan db:seed
```

### 10. Build Assets Frontend

Mode development:

```bash
npm run dev
```

Mode production:

```bash
npm run build
```

### 11. Jalankan Server Laravel

```bash
php artisan serve
```

Website dapat diakses melalui:

```
http://127.0.0.1:8000
```

---

## Catatan

- Bagian setup layout root Inertia (`resources/views/app.blade.php`), entry point frontend (`resources/js/app.jsx` atau `app.js`), routing halaman, styling (Tailwind/dll), dan struktur folder komponen **tidak dicakup detail di dokumen ini** karena akan disesuaikan secara manual sesuai kebutuhan project. Detail implementasi auth, RBAC, dan security akan ditambahkan progresif — lihat bagian **Roadmap Fitur** di atas.
- Pastikan file `.env` **tidak** ikut di-commit ke repository publik. Cek `.gitignore` untuk memastikan `.env` sudah masuk daftar exclude.
- Laravel 13 rilis 17 Maret 2026, mensyaratkan PHP >= 8.3 minimum, tanpa breaking changes signifikan dari Laravel 12.

---

## Lisensi

Tentukan lisensi project (misalnya MIT License) sesuai kebutuhan.