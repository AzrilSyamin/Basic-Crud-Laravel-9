
# Basic Crud Vanilla PHP 
Project ini dibina atas dasar percubaan dan pembelajaran sahaja, 
jika anda ingin gunakan secara live, anda perlu tingkatkan securiti pada project ini terlebih dahulu, 
pihak kami tidak akan bertanggung jawab atas apa yang berlaku pada website anda 

## Gambaran Project
Project ini digambarkan sebagai sistem Kaunter Pembayaran `(Casher)` dan Pemilik kedai, halaman `index` adalah casher dan `Owner` adalah pemilik kedai

 Project ini mempunyai 2 versi

 <br>
 <b style="color:orange">Gitlab Repo</b>

 - Versi <a href="https://gitlab.com/AzrilSyamin/Basic-Crud-Vanilla-PHP"><b>Vanila PHP</b></a>
 - Versi <a href="https://gitlab.com/AzrilSyamin/basic-crud-laravel-9"><b>Laravel 9</b></a>
  
 <br>
 <b>Github Repo</b>

 - Versi <a href="https://github.com/AzrilSyamin/Basic-Crud-Vanilla-PHP"><b>Vanila PHP</b></a>
 - Versi <a href="https://github.com/AzrilSyamin/basic-crud-laravel-9"><b>Laravel 9</b></a>


# Table of contents  
1. [Tech Stack](#tech-stack)  
2. [Ciri-ciri ](#ciri-ciri)  
3. [Basic Role](#basic-role)  
4. [Langkah Menjalankan project](#langkah-menjalankan-project)
5. [Preview Public](#preview-public)
6. [Preview Owner](#preview-owner)

 
## Tech Stack    
- CSS - Bootstrap 5 
- PHP - Laravel 9
- MySQL
- Javascript

## Ciri-ciri  
- Tambah data  
- Edit data  
- Padam Data
- Cari Data (Search)
- Pagination

## Basic Role
- Public = Penjaga Kaunter
- Owner = Pemilik Kedai

**Public** hanya boleh tolak quantiti barang(di kaunter)

**Owner** boleh :
- Tambah Barang **(Multiple Data)**
- Edit Barang **(Multiple Data)**
- Padam Barang **(Multiple Data)**

password untuk halaman owner adalah `Owner`

## Langkah Menjalankan project
Anda perlu clone project ini dengan salah satu langkah dibawah
```
//jika menggunakan http
git clone https://gitlab.com/azrilsyamin/basic-crud-laravel-9.git

//jika menggunakan SSH
git clone git@gitlab.com:azrilsyamin/basic-crud-laravel-9.git
```

copy file `.env.example` kepada `.env`
```
//jika anda menggunakan terminal 
cp .env.example .env
```
kemudian isi detail host anda pada file `.env`
```
DB_DATABASE=Laravel   \\ database name
DB_USERNAME=root      \\ database user
DB_PASSWORD=          \\ database password
```
kemudian jalankan perintah dibawah untuk download vendor yang digunakan dalam project ini
```
composer install && composer update
```
jalan migration untuk database, untuk generate table
```
php artisan migrate
```
jangan lupa jalankan peritah dibawah untuk generate key
```
php artisan key:generate
```
dan yang terakhir untuk jalankan laravel, jalankan perintah dibawah
```
php artisan serve
```
Setelah selesai semua langkah diatas, 
anda boleh buka melalui Browser menggunakan url dibawah
```
http://localhost:8000
```

## Preview Public 
![App Screenshot](public/asset/img/screenshoot/public.png)  

## Preview Owner
Halaman Owner sedikit berbeza dengan adanya beberapa button tambahan untuk kegunaan owner
#### Owner Password - Memerlukan password untuk ke halaman owner
![App Screenshot](public/asset/img/screenshoot/alert-password.png)  
![App Screenshot](public/asset/img/screenshoot/owner.png)  

#### Owner Tambah Barang
![App Screenshot](public/asset/img/screenshoot/tambah-data.png)  

![App Screenshot](public/asset/img/screenshoot/tambah-multiple.png)  

#### Owner Edit Barang
![App Screenshot](public/asset/img/screenshoot/edit-multiple.png) 



