# Pohon Harapan

![Banner Pohon Harapan](https://images.unsplash.com/photo-1605316061464-eea55e21c398?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=774)

Sebuah platform crowdfunding dan donasi yang dibangun untuk mendanai berbagai proyek sosial. Proyek ini dibuat dengan Laravel dan menggunakan Filament untuk panel admin yang powerful.

<p align="left">
  <img src="https://img.shields.io/badge/Framework-Laravel-FF2D20.svg?style=flat-square" alt="Laravel">
  <img src="https://img.shields.io/badge/Admin-Filament-F59E0B.svg?style=flat-square" alt="Filament">
  <a href="https://github.com/danipinion/pohon-harapan/blob/main/LICENSE.md">
    <img src="https://img.shields.io/badge/License-MIT-green.svg?style=flat-square" alt="License">
  </a>
</p>

## 🚀 Fitur Utama

* **Publik:**
    * Jelajahi berbagai proyek yang membutuhkan dana.
    * Lihat detail, target, dan progres setiap proyek.
    * Berikan donasi secara mudah.
    * Lihat update terbaru dari proyek yang didanai.
* **Admin Panel (Filament):**
    * Manajemen Proyek (CRUD).
    * Manajemen Donasi (Verifikasi, lihat bukti bayar).
    * Manajemen Update Proyek.
    * Dashboard dengan statistik donasi dan proyek.

---

## 🛠️ Teknologi yang Digunakan

* **Backend:** [Laravel](https://laravel.com/)
* **Admin Panel:** [Filament](https://filamentphp.com/)
* **Frontend:** [Tailwind CSS](https://tailwindcss.com/) & [Blade](https://laravel.com/docs/blade)
* **Database:** MySQL

---

## ⚙️ Panduan Instalasi (Lokal)

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan lokal Anda.

**1. Clone Repository**
```bash
git clone [https://github.com/danipinion/pohon-harapan.git](https://github.com/danipinion/pohon-harapan.git)
cd pohon-harapan
````

**2. Install Dependensi**

```bash
# Install dependensi PHP
composer install

# Install dependensi JavaScript
npm install
```

**3. Konfigurasi Lingkungan (.env)**

```bash
# Salin file .env.example
cp .env.example .env

# Buat kunci aplikasi
php artisan key:generate
```

Buka file `.env` dan atur koneksi database Anda (DB\_HOST, DB\_PORT, DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD).

**4. Migrasi Database & Seeding**

```bash
# Jalankan migrasi untuk membuat tabel
php artisan migrate

# (Opsional) Jalankan seeder jika Anda memilikinya untuk data dummy
php artisan db:seed
```

**5. Buat Tautan Storage**

```bash
php artisan storage:link
```

**6. Build Aset Frontend**

```bash
npm run build
```

**7. Buat User Admin**
Untuk masuk ke panel admin, buat user pertama Anda:

```bash
php artisan make:filament-user
```

Ikuti petunjuk di terminal untuk membuat email dan password admin.

**8. Jalankan Server**

```bash
php artisan serve
```

Aplikasi Anda sekarang berjalan di `http://127.0.0.1:8000`.
Panel admin dapat diakses di `http://127.0.0.1:8000/admin`.

-----

## 🤝 Berkontribusi

Kontribusi sangat kami harapkan\! Jika Anda ingin berkontribusi:

1.  **Fork** repository ini.
2.  Buat **Branch** baru (`git checkout -b fitur/nama-fitur-baru`).
3.  **Commit** perubahan Anda (`git commit -m 'Menambahkan fitur baru'`).
4.  **Push** ke branch Anda (`git push origin fitur/nama-fitur-baru`).
5.  Buka **Pull Request**.

Atau, Anda bisa membuka [Issue](https://www.google.com/search?q=https://github.com/danipinion/pohon-harapan/issues) untuk melaporkan bug atau menyarankan fitur.

-----

## 📄 Lisensi

Proyek ini dilisensikan di bawah **MIT License**. Lihat file `LICENSE.md` untuk detail lebih lanjut.

```
```
