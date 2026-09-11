<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# 📚 Peminjaman-perpus

Aplikasi manajemen peminjaman buku perpustakaan berbasis web yang dibangun menggunakan **Laravel** dan **MySQL**.

---

## 📸 Tampilan Aplikasi

|                 Halaman Login                 |                  Dashboard Admin                  |
| :-------------------------------------------: | :-----------------------------------------------: |
| <img src="screenshots/login.png" width="400"> | <img src="screenshots/dashboard.png" width="400"> |

|                  Data Buku (CRUD)                 |                  Status Peminjaman                 |
| :-----------------------------------------------: | :------------------------------------------------: |
| <img src="screenshots/data-buku.png" width="400"> | <img src="screenshots/peminjaman.png" width="400"> |

---

## 🌟 Fitur Utama

* 🔐 **Autentikasi User**

  * Login
  * Logout
* 👥 **Role-Based Access**

  * **Admin**

    * Mengelola data buku
    * Mengelola data peminjaman
    * Mengelola data pengguna
    * Melakukan operasi CRUD
  * **User / Anggota**

    * Melihat daftar buku
    * Melihat status peminjaman
* 📚 **Manajemen Buku**

  * Menambah buku
  * Melihat data buku
  * Mengubah data buku
  * Menghapus data buku
* 📋 **Manajemen Peminjaman**

  * Melakukan peminjaman
  * Melihat status peminjaman
  * Mengelola data peminjaman

---

## 🛠️ Teknologi & Stack

* **Framework:** Laravel
* **Bahasa Pemrograman:** PHP
* **Database:** MySQL
* **Frontend:** Blade Template / HTML / CSS / JavaScript
* **Dependency Manager:** Composer
* **Local Development:** XAMPP

---

# 🚀 Cara Setup & Menjalankan Proyek

Ikuti langkah-langkah berikut untuk menjalankan proyek **Peminjaman-perpus** di komputer lokal.

## 1. Prasyarat

Pastikan software berikut sudah terinstal:

* [PHP](https://www.php.net/)
* [Composer](https://getcomposer.org/)
* [MySQL](https://www.mysql.com/)
* [XAMPP](https://www.apachefriends.org/)
* Git

Untuk memastikan PHP dan Composer sudah tersedia, jalankan:

```bash
php -v
composer -V
git --version
```

---

## 2. Clone Repository

Clone repository dari GitHub:

```bash
git clone https://github.com/fadhilazahrani03-boop/Peminjaman-perpus.git
```

Masuk ke folder project:

```bash
cd Peminjaman-perpus
```

---

## 3. Install Dependency Laravel

Jalankan Composer untuk menginstall seluruh dependency:

```bash
composer install
```

---

## 4. Buat File `.env`

Laravel membutuhkan file `.env` untuk menyimpan konfigurasi aplikasi dan database.

Salin file `.env.example` menjadi `.env`.

### Windows CMD:

```bash
copy .env.example .env
```

### Git Bash:

```bash
cp .env.example .env
```

---

## 5. Generate Application Key

Setelah file `.env` dibuat, jalankan:

```bash
php artisan key:generate
```

Perintah ini akan membuat `APP_KEY` secara otomatis di file `.env`.

---

## 6. Buat Database MySQL

Buka **XAMPP Control Panel**, kemudian jalankan:

* Apache
* MySQL

Setelah itu buka **phpMyAdmin**.

Buat database baru, misalnya:

```text
perpus_digital
```

---

## 7. Konfigurasi Database

Buka file:

```text
.env
```

Kemudian sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=perpus_digital
DB_USERNAME=root
DB_PASSWORD=
```

Jika MySQL kamu menggunakan password, isi bagian:

```env
DB_PASSWORD=password_kamu
```

---

## 8. Jalankan Migration

Setelah database dikonfigurasi, jalankan migration:

```bash
php artisan migrate
```

Jika project menyediakan seeder untuk data awal, jalankan:

```bash
php artisan db:seed
```

Atau jika ingin menjalankan migration sekaligus mengisi data awal:

```bash
php artisan migrate --seed
```

> ⚠️ **Catatan:** Jangan menjalankan `migrate:fresh` jika database berisi data penting karena perintah tersebut akan menghapus tabel yang ada dan membuatnya kembali.

---

## 9. Jalankan Storage Link

Jika aplikasi menggunakan file atau gambar yang disimpan pada storage Laravel, jalankan:

```bash
php artisan storage:link
```

Perintah ini membuat symbolic link dari:

```text
storage/app/public
```

ke:

```text
public/storage
```

---

## 10. Bersihkan Cache Laravel

Untuk memastikan konfigurasi terbaru terbaca dengan benar, jalankan:

```bash
php artisan optimize:clear
```

---

## 11. Jalankan Server Laravel

Jalankan:

```bash
php artisan serve
```

Jika berhasil, biasanya Laravel akan berjalan pada:

```text
http://127.0.0.1:8000
```

Buka alamat tersebut melalui browser.

---

# 🔑 Akun Login

Jika project menggunakan akun yang dibuat melalui seeder, gunakan akun yang telah disediakan oleh project.

Contoh:

```text
Role  : Admin
Email : admin@example.com
Password : password
```

> Sesuaikan informasi akun di atas dengan data seeder yang terdapat pada project.

---

# 📁 Struktur Folder

Struktur utama project Laravel:

```text
Peminjaman-perpus/
│
├── app/
│   ├── Http/
│   ├── Models/
│   └── Providers/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   └── storage/
│
├── resources/
│   └── views/
│
├── routes/
│   ├── web.php
│   └── console.php
│
├── storage/
│
├── .env.example
├── artisan
├── composer.json
└── README.md
```

---

# 🧹 Perintah Artisan yang Berguna

### Membersihkan seluruh cache:

```bash
php artisan optimize:clear
```

### Melihat daftar route:

```bash
php artisan route:list
```

### Menjalankan migration:

```bash
php artisan migrate
```

### Membatalkan migration terakhir:

```bash
php artisan migrate:rollback
```

### Menjalankan seeder:

```bash
php artisan db:seed
```

### Membuat storage link:

```bash
php artisan storage:link
```

### Menjalankan server:

```bash
php artisan serve
```

---

# 🐛 Troubleshooting

### Error `No application encryption key has been specified`

Jalankan:

```bash
php artisan key:generate
```

---

### Error koneksi database

Pastikan:

1. MySQL di XAMPP sudah menyala.
2. Nama database di `.env` benar.
3. Username dan password MySQL benar.
4. Port MySQL sesuai dengan konfigurasi.

Kemudian jalankan:

```bash
php artisan config:clear
```

---

### Perubahan `.env` tidak terbaca

Jalankan:

```bash
php artisan optimize:clear
```

Kemudian restart server:

```bash
php artisan serve
```

---

### Error setelah clone repository

Pastikan dependency sudah di-install:

```bash
composer install
```

Kemudian:

```bash
php artisan key:generate
```

---

# 👨‍💻 Developer

**fadilah zahrani**

Project ini dibuat sebagai project pembelajaran dan pengembangan aplikasi web menggunakan Laravel.

---

## 📄 License

Project ini dibuat untuk keperluan pembelajaran dan pengembangan.
