# Daftar Fitur — Portfolio Website Profesional

Dokumen ini merinci seluruh fitur yang direncanakan untuk project portofolio, dibagi menjadi 4 kelompok besar: **Halaman Publik**, **Admin/CMS Dashboard**, **Auth & Keamanan**, dan **RBAC**. Fitur ini melengkapi Roadmap yang sudah ada di `README.md`.

---

## 1. Halaman Publik (Visitor-facing)

### 1.1 Landing Page / Home
- Hero section (nama, tagline, foto/avatar, CTA ke CV atau contact)
- Ringkasan singkat about
- Highlight beberapa project unggulan (featured projects)
- Highlight skill/tech stack utama
- Call-to-action ke halaman contact

### 1.2 About
- Bio lengkap
- Timeline pengalaman kerja (**work experience**)
- Timeline pendidikan (**education**)
- Sertifikasi & pencapaian (**certifications**)
- Statistik ringkas (jumlah project, tahun pengalaman, dll — opsional)

### 1.3 Projects / Portfolio
- List semua project dengan filter berdasarkan kategori/teknologi
- Detail per-project: deskripsi, gallery gambar, tech stack yang dipakai, link demo, link source code (GitHub)
- Featured/pinned project (tampil di home)
- Status project (completed, ongoing, archived)

### 1.4 Blog / Artikel *(opsional tapi disarankan untuk personal branding)*
- List artikel dengan kategori & tag
- Detail artikel (rich content, syntax highlighting untuk kode)
- Related posts
- Reading time estimate
- Komentar (dengan moderasi dari admin)
- Share ke social media

### 1.5 Skills
- Daftar teknologi/skill dikelompokkan per kategori (Backend, Frontend, DevOps, Tools, dst)
- Level proficiency (opsional: beginner/intermediate/advanced, atau progress bar)

### 1.6 Testimonials
- Daftar testimoni dari client/rekan kerja
- Nama, jabatan/perusahaan, foto, isi testimoni

### 1.7 Contact
- Form contact (nama, email, subjek, pesan) → tersimpan ke database + notifikasi email ke admin
- Info kontak langsung (email, LinkedIn, GitHub, dll)
- Integrasi Google reCAPTCHA / honeypot untuk anti-spam

### 1.8 Fitur Pendukung Halaman Publik
- Download CV/Resume (PDF)
- Dark mode / light mode toggle
- SEO: meta tags dinamis, Open Graph image, sitemap.xml, robots.txt
- Responsive & accessible (mobile-first)
- Loading state & skeleton UI (khas Inertia SPA-like experience)
- Multi-language *(opsional, EN/ID)*
- Visitor analytics dasar (page views per project/artikel — opsional)

---

## 2. Admin / CMS Dashboard

### 2.1 Dashboard Overview
- Ringkasan statistik: total project, total artikel, pesan masuk belum dibaca, jumlah user
- Grafik sederhana (visitor per bulan, project per kategori — opsional)
- Aktivitas terbaru (activity log ringkas)

### 2.2 Manajemen Project
- CRUD project lengkap (create, edit, delete, reorder)
- Upload multi-gambar (gallery) per project
- Assign teknologi/tech stack ke project (many-to-many)
- Toggle featured & status publish/draft

### 2.3 Manajemen Blog/Artikel
- CRUD artikel dengan rich text/markdown editor
- Kategori & tag management
- Moderasi komentar (approve/delete/spam)
- Scheduled publish (opsional)

### 2.4 Manajemen Profil/About
- Edit bio, foto profil
- CRUD pengalaman kerja
- CRUD pendidikan
- CRUD sertifikasi

### 2.5 Manajemen Skills
- CRUD skill + kategori + level

### 2.6 Manajemen Testimonials
- CRUD testimoni + approval sebelum tampil publik

### 2.7 Manajemen Pesan (Inbox)
- List pesan masuk dari form contact
- Tandai sudah/belum dibaca
- Reply langsung via email (opsional) atau hanya arsip

### 2.8 Manajemen Media
- Upload & kelola file gambar/dokumen terpusat (media library)
- Preview & hapus media yang tidak dipakai

### 2.9 Manajemen User & RBAC
- CRUD user
- Assign role ke user
- CRUD role & permission
- Halaman khusus super-admin untuk kontrol penuh akses

### 2.10 Pengaturan Situs (Site Settings)
- Meta info global (site title, description, favicon)
- Social media links
- Kontak utama & alamat
- Warna tema / branding (opsional)
- Upload file CV/Resume yang bisa didownload publik

### 2.11 Activity Log / Audit Trail
- Catatan siapa melakukan aksi apa (create/update/delete) dan kapan
- Filter log berdasarkan user/aksi/tanggal

---

## 3. Auth & Keamanan

*(Detail teknis tahap implementasi ada di README bagian Roadmap Fitur — Tahap 1 & 3)*

- Login & registrasi (registrasi bisa dibatasi hanya untuk admin invite, karena ini bukan platform publik multi-user)
- Email verification
- Forgot & reset password
- Remember me
- Logout dari semua device (session invalidation)
- Two-Factor Authentication (2FA)
- Rate limiting login & form contact (anti brute-force & spam)
- CSRF protection
- Policy/Gate untuk otorisasi per-resource
- Security headers (CSP, X-Frame-Options, X-Content-Type-Options)
- Validasi & sanitasi input di semua form
- Audit log aktivitas sensitif (login gagal, perubahan role, dll)

---

## 4. RBAC (Role-Based Access Control)

### Role default yang disarankan
| Role | Deskripsi |
|---|---|
| `super-admin` | Akses penuh ke semua fitur termasuk manajemen user & role |
| `admin` | Kelola semua konten (project, blog, testimonial, dll) tapi tidak bisa ubah role/user lain |
| `editor` | Hanya bisa CRUD konten (blog/project), tidak bisa akses settings atau user management |
| `viewer` | Read-only akses ke dashboard (misal untuk keperluan demo/monitoring) |

### Permission granular (contoh, bisa dikembangkan)
- `project.view`, `project.create`, `project.update`, `project.delete`
- `post.view`, `post.create`, `post.update`, `post.delete`, `post.publish`
- `message.view`, `message.delete`
- `user.view`, `user.create`, `user.update`, `user.delete`
- `role.manage`
- `settings.manage`

---

## Prioritas Pengerjaan yang Disarankan

1. **MVP dulu**: Auth dasar → Project CRUD → Halaman publik (Home, About, Projects, Contact)
2. **Lanjut**: RBAC dasar (super-admin & admin saja dulu) → Skills → Testimonials
3. **Pengayaan**: Blog + komentar → Media library → Activity log
4. **Hardening**: 2FA → Security headers → Audit log lengkap → SEO optimization

> Tidak perlu membangun semua fitur sekaligus. Disarankan mulai dari MVP supaya termotivasi lihat progress, baru tambah fitur security & RBAC secara bertahap sambil belajar konsepnya satu per satu.
