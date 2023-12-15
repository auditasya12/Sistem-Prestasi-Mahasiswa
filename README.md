Hi, salam kenal...nama saya Quin Audi Tasya Effendy, dan akrab dipanggil Quin. Saya seorang developer junior web developer

SISTEM INFORMASI PRESTASI MAHASISWA
==================================
bahasa pemrograman Laravel 8
## Default akun untuk testing

Admin : 
email : admin@mail.com
password : admin123

Siswa :
Isikan data siswa di halaman admin lalu buat akun untuk siswa agar bisa login halaman siswa


## Instalasi

clone project atau download

```bash
  git clone https://github.com/Rossadwi/siprestof.git
  cd SIPRESTOFF
  npm install
  composer install
  cp .env.example .env
```

Buka `.env` dan atur database anda
```bash
  DB_PORT=3306
  DB_DATABASE=db_siko
  DB_USERNAME=root
  DB_PASSWORD=
```

Install website
```bash
  php artisan key:generate
  php artisan migrate --seed
```

Jalankan website
```bash
  php artisan serve
```
