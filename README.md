### [Modify Online Shop]

**Deskripsi:**

Aplikasi website ini adalah platform e-commerce yang dirancang khusus untuk penjualan pakaian dan aksesoris. Selain itu, website ini menyajikan berbagai fitur, mulai dari fitur register, admin panel, hingga manajemen produk melalui Admin.

**Fitur Utama:**

- **Pencarian dan Penelusuran Produk:**
  Pengguna dapat dengan mudah mencari produk berdasarkan kategori, merek, atau kriteria lainnya.

- **Detail Produk:**
  Setiap produk memiliki halaman detail yang mencakup informasi rinci, termasuk deskripsi, harga, dan stok.

- **Autentikasi Pengguna:**
  Terdapat fitur login dan register yang memungkinkan pengguna membuat dan mengelola akun mereka.

- **Area Admin:**
  Halaman admin memberikan kontrol penuh terhadap produk dan pengguna. Admin dapat melakukan operasi CRUD pada produk, serta melihat daftar pengguna terdaftar.

**Teknologi yang Digunakan:**

**Backend:**
- Framework: Laravel
- Database: MySQL
- Bahasa Pemrograman: PHP

**Frontend:**
- HTML
- CSS
- JavaScript
- Blade (Laravel)
- Bootsrap

### Cara Menjalankan Proyek

**Langkah-langkah:**

1. **Clone Repository:**
   ```bash
   https://github.com/BramantioSYahrulAlam/NewModifyShop.git
   ```

2. **Masuk ke Direktori:**
   ```bash
   cd nama-repository
   ```

3. **Instal Dependencies:**
   ```bash
   composer install
   ```

4. **Setup Environment:**
   - Duplikat file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```
     menyesuaikan nama Database 

5. **Menjalankan Migrations:**
   - Jalankan perintah migrate untuk mengatur skema database:
    ```bash
    php artisan migrate
    ```

6. **Menjalankan Seeder:**
   - Jalankan perintah seeder untuk mengisi database dengan data awal:
    ```bash
    php artisan db:seed
    ```

7. **Menjalankan Storage link**
    - Jalankan perintah storage untuk menghubungkan relasi dantar gambar
    ```bash
    php artisan storage:link
    ```

7. **Generate Kunci Aplikasi:**
   ```bash
   php artisan key:generate
   ```

8. **Jalankan Server Pembangunan:**
   ```bash
   php artisan serve
   ```

   Aplikasi sekarang dapat diakses melalui [localhost:8000](http://localhost:8000) atau sesuai dengan URL yang ditampilkan setelah menjalankan php artisan serve tersebut.
