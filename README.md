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
3. sesuaikan nama database pada file .env pada bagian DB_DATABASE sesuai dengan nama pada database mysql anda
4. Run
   ```console
   composer install
   ```
5. buat kunci aplikasi 
   ```console
   php artisan key:generate
   ```
6. migrate tabel dan isi dengan data seeder
   ```console
   php artisan migrate:fresh --seed
   ```
7. koneksikan storage ke folder public
   ```console
   php artisan storage:link
   ```
8. Run server
   ```console
   php artisan serve
   ```
