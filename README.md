Kelompok 11

STACK yang Digunakan :

- Laravel 9
- Bootstrap
- Guzzle (For Seeder image from url)

## Installation
1. Clone Repo
   ```console
   git clone https://github.com/yohanes59/tugas-uts
   ```
2. Buat file .env dengan perintah
   ```console
   cp .env.example .env
   ```
3. buat kunci aplikasi 
   ```console
   php artisan key:generate
   ```
4. Run
   ```console
   composer install
   ```
5. migrate tabel
   ```console
   php artisan migrate
   or
   php artisan migrate:refresh
   ```
6. koneksikan storage ke folder public
   ```console
   php artisan storage:link
   ```
7. generate data dummy
   ```console
   php artisan db:seed
   ```
8. Run server
   ```console
   php artisan serve
   ```
