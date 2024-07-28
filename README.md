<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Clone and Setup Environment
Klon dan siapkan repositori ini di lingkungan lokal Anda menggunakan git dan perintah ini
```
git clone https://github.com/abdwhidd/car-rental.git
cd reimbursement
composer install
npm install
```
### Salin Berkas .env.example dan Ubah Nama Menjadi .env:
```
cp .env.example .env
```

### Setup Kunci di Berkas .env:
```
php artisan key:generate
```

### Migrate and seed database
Pastikan bahwa database Anda berjalan untuk melakukan migrasi dan mengisi basis data menggunakan perintah berikut:
```
php artisan migrate --seed
```

Jalankan proyek dengan perintah ini jika Anda tidak menggunakan Laragon dengan nama host virtual:
```
php artisan serve
```

Jalankan mode pengembangan npm dengan perintah ini:
```
npm run dev
```

Buka peramban web Anda dan buka proyek di salah satu URL berikut, tergantung pada pengaturan Anda: http:://localhost:8000 or http://car-rental.test jika Anda menggunakan Laragon dengan nama host virtual)
