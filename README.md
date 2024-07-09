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
  git clone https://github.com/auditasya12/Sistem-Prestasi-Mahasiswa.git
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
## interface halaman admin
![1](https://github.com/auditasya12/Sistem-Prestasi-Mahasiswa/assets/68654073/a0104fc9-5228-48c5-abc6-5cf845f88378)
![2](https://github.com/auditasya12/Sistem-Prestasi-Mahasiswa/assets/68654073/33c236d3-28c7-4c77-9a65-50be07fc2e54)
![3](https://github.com/auditasya12/Sistem-Prestasi-Mahasiswa/assets/68654073/34951f40-4b1f-4f96-a7b9-3508f06ccad5)

## interface halaman siswa
![4](https://github.com/auditasya12/Sistem-Prestasi-Mahasiswa/assets/68654073/aef6561f-6adc-4269-951b-1168f997f3d1)
![5](https://github.com/auditasya12/Sistem-Prestasi-Mahasiswa/assets/68654073/b639297e-05e8-48e1-a419-916003a088de)
![6](https://github.com/auditasya12/Sistem-Prestasi-Mahasiswa/assets/68654073/4c9045ac-a06d-4fd8-9153-a7828a665be3)

