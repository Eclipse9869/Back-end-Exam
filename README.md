# Project Laravel Exam

## Cara Setup Project

Ikuti langkah-langkah berikut untuk menjalankan project ini di lokal komputer kamu.

---

### 1. Clone repository

```bash
git clone https://github.com/username/repository.git
cd repository
```

### 2. Install dependencies dengan Composer

```bash
composer install
```
Note : Folder vendor tidak di-commit ke Git, jadi harus install dependencies pakai Composer.

### 3. Edit file .env sesuai konfigurasi database lokal kamu, terutama bagian database dari DB_USERNAME serta DB_PASSWORD

```.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=exams
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Pastikan kamu sudah membuat database di MySQL sesuai nama di .env (misal exams):

```sql
CREATE DATABASE exams;
```
Note : Tetapi jika langsung melanjutkan step berikutnya tidak masalah karena akan terdapat pilihan untuk membuat database baru sesuai yang terdapat pada file .env, akan tetapi lebih baik dipastikan terlebih dahulu database yang sesuai pada file .env

### 5. Jalankan migration

```bash
php artisan migrate
```

### 6. Jalankan seeder

```bash
php artisan db:seed
```
Note : Pada saat melakukan seeder akan sedikit lama dikarenakan data faker yang cukup banyak.

### 7. Jalankan server lokal

```bash
php artisan serve
```
