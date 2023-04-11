Kelompok 11

STACK yang Digunakan :

- Laravel 9
- Bootstrap
- Guzzle (For Seeder image from url)


## Installation
1.Pertama-tama, kita perlu membuat file .env = copy .env.example .env

2. Clone Repo
    ```console
    git clone https://github.com/yohanes59/tugas-uts
    ```
3.	sesuaikan nama database pada file .env pada bagian DB_DATABASE sesuai dengan nama pada database mysql anda

4. install library 
 ```console
  composer install
   ```
5.Generate Key 
   ```console
   php artisan key:generate
   ```
6.migrate tabel mysql 
   ```console
   php artisan migrate
   or
   php artisan migrate:refresh
   ```
7.generate data dummy 
   ```console
   php artisan db:seed
   ```

8. Run server
   ```console
   php artisan serve
   ```
