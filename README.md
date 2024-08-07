# PenerimaanMahasiswa
Website terkait penerimaan mahasiswa baru menggunakan laravel 11 sebagai framework php dan bootstrap sebagai framework HTML, CSS, dan JavaScript.

# Website Pendaftaran Mahasiswa

Proyek ini adalah website pendaftaran mahasiswa yang dibuat menggunakan framework Laravel. Sistem ini memungkinkan pengguna untuk melakukan pendaftaran, mengelola data mahasiswa, dan mengelola pengumuman.

## Fitur

- **Pendaftaran Akun**: Pengguna dapat mendaftar dan akun.
- **Pendaftaran Calon Mahasiswa**: Pengguna dapat mendaftar sebagai calon mahasiswa dan melihat status penerimaan.
- **Manajemen Pengumuman**: Admin dapat melihat, membuat, mengedit, dan menghapus pengumuman. Sedangkan mahasiswa hanya dapat melihat
- **Otorisasi Pengguna**: Sistem mendukung otorisasi pengguna berupa admin dan mahasiswa.
- **Autentikasi Pengguna**: Sistem mendukung pendaftaran dan login pengguna.
- **Manajemen Status**: Admin dapat mengubah status pendaftaran mahasiswa.
- **Lihat Daftar Mahasiswa**: Admin dapat melihat daftar mahasiswa dan verifikasi akun mahasiswa.

## Persyaratan

- PHP 8.2 atau lebih baru
- Composer
- MySQL
- Node.js dan NPM
- Server web Nginx
- laravel 11
- Laragon

## Instalasi
- **Clone Repositori**

   `git clone https://github.com/fellyca/PenerimaanMahasiswa.git`

   `cd PenerimaanMahasiswa`

- **Konfigurasi Database**

   `DB_CONNECTION=mysql`

   `DB_HOST=127.0.0.1`

   `DB_PORT=3306`

   `DB_DATABASE=calonmhs`

   `DB_USERNAME=root`

   `DB_PASSWORD=`

- **Migrasi Dan Seed Database**

   `php artisan migrate --seed`

## Menjalankan Aplikasi
- **Perintah Terminal**

   `php artisan serve`

- **Laragon**

   Menjalankan dari laragon dengan pretty url


