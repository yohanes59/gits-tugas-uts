Kelompok 11

STACK yang Digunakan :

- Laravel 9
- Bootstrap
- Guzzle (For Seeder image from url)

## Installation
1.Pertama-tama, kita perlu membuat file .env = copy .env.example .env

2.Clone Repo
  ```console
   git clone https://github.com/yohanes59/tugas-uts
   ```
3.Run
 ```console
   composer install
   ```
 4.buat kunci aplikasi 
   ```console
   php artisan key:generate
   ```
 5.migrate tabel
   ```console
   php artisan migrate
   or
   php artisan migrate:refresh
   ```
6.generate data dummy
   ```console
   php artisan db:seed
   ```
7.koneksikan storage ke folder public
   ```console
  php artisan storage:link
   ```
8.generate data dummy
   ```console
   php artisan db:seed
   ```
9.Run server
   ```console
   php artisan serve
   ```
