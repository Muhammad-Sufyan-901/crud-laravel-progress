# Blog CRUD — Laravel Learning Project

Aplikasi web sederhana untuk belajar operasi **CRUD (Create, Read, Update, Delete)** menggunakan **Laravel 13**. Proyek ini mengelola dua entitas utama: **Author** (penulis) dan **Blog** (artikel), termasuk relasi antar keduanya.

---

## Fitur

- **CRUD Author** — tambah, lihat, ubah, dan hapus data penulis (nama & nama pena)
- **CRUD Blog** — tambah, lihat, ubah, dan hapus artikel beserta judulnya
- **Relasi Author ↔ Blog** — setiap blog terhubung ke satu author
- **Soft Deletes** — data yang dihapus tidak langsung hilang dari database
- **Tampilan responsif** dengan Tailwind CSS 4

---

## Teknologi

| Teknologi | Versi |
|-----------|-------|
| PHP | >= 8.3 |
| Laravel | ^13.8 |
| MySQL | 5.7+ / 8.x |
| Vite | ^8.0 |
| Tailwind CSS | ^4.0 |
| Pest (testing) | ^4.7 |

---

## Prasyarat

Sebelum memulai, pastikan sudah terinstall di komputer kamu:

- **PHP** versi 8.3 atau lebih baru
- **Composer** (dependency manager PHP)
- **Node.js** dan **npm**
- **MySQL** (atau MariaDB)
- **Git**

---

## Cara Clone & Menjalankan Proyek

### 1. Clone repositori

```bash
git clone <url-repositori-ini>
cd blog-crud-progress
```

### 2. Install dependency PHP

```bash
composer install
```

### 3. Salin file konfigurasi environment

```bash
cp .env.example .env
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Konfigurasi database

Buka file `.env`, lalu sesuaikan pengaturan database berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_crud_progress
DB_USERNAME=root
DB_PASSWORD=
```

> Buat database bernama `blog_crud_progress` di MySQL terlebih dahulu:
> ```sql
> CREATE DATABASE blog_crud_progress;
> ```

### 6. Jalankan migrasi database

```bash
php artisan migrate
```

### 7. Install dependency Node.js

```bash
npm install
```

### 8. Jalankan aplikasi

**Cara cepat** — jalankan semua service sekaligus (server, queue, log, vite):

```bash
composer dev
```

**Atau secara terpisah**, buka dua terminal:

```bash
# Terminal 1 — PHP development server
php artisan serve

# Terminal 2 — Vite (asset bundler)
npm run dev
```

### 9. Akses aplikasi

Buka browser dan kunjungi:

- **Author**: [http://localhost:8000/authors](http://localhost:8000/authors)
- **Blog**: [http://localhost:8000/blogs](http://localhost:8000/blogs)

---

### Shortcut: Setup Otomatis

Kamu bisa menjalankan semua langkah 2–7 sekaligus dengan satu perintah:

```bash
composer setup
```

Perintah ini akan otomatis menginstall dependency, membuat `.env`, generate key, menjalankan migrasi, dan build aset frontend.

---

## Rute Utama

| Method | URL | Keterangan |
|--------|-----|------------|
| GET | `/authors` | Daftar semua author |
| GET | `/authors/create` | Form tambah author |
| POST | `/authors` | Simpan author baru |
| GET | `/authors/edit/{id}` | Form edit author |
| PUT | `/authors/{id}` | Update data author |
| DELETE | `/authors/{id}` | Hapus author |
| GET | `/blogs` | Daftar semua blog |
| GET | `/blogs/create` | Form tambah blog |
| POST | `/blogs` | Simpan blog baru |
| GET | `/blogs/edit/{id}` | Form edit blog |
| PUT | `/blogs/{id}` | Update data blog |
| DELETE | `/blogs/{id}` | Hapus blog |

---

## Menjalankan Test

```bash
php artisan test
# atau
composer test
```

---

## Lisensi

Proyek ini dibuat untuk keperluan pembelajaran. Bebas digunakan dan dimodifikasi.
