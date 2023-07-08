###################
INFORMATION WEB RESTO NDESO
###################

Resto Ndeso adalah sebuah website Point of Sale (POS) yang dirancang khusus untuk membantu pengelolaan bisnis restoran atau warung dengan mudah dan efisien. Website ini menawarkan fitur-fitur yang dapat mempermudah tugas-tugas yang terkait dengan manajemen menu, pengguna, dan riwayat transaksi.

Dalam Resto Ndeso, terdapat tiga peran yang berbeda: Manager, Admin, dan Kasir. Setiap peran memiliki hak akses dan tugas yang berbeda, sehingga memungkinkan pengguna untuk fokus pada pekerjaan mereka masing-masing.

1. Manager:
Sebagai seorang Manager, pengguna memiliki otoritas penuh dalam mengelola seluruh aspek dari Resto Ndeso. Beberapa tugas dan fitur yang dapat dilakukan oleh seorang Manager antara lain:
- Mengelola menu: Manager dapat menambah, mengedit, atau menghapus menu makanan dan minuman yang tersedia. Mereka juga dapat memberikan izin untuk menampilkan atau menyembunyikan menu tertentu.
- Mengelola pengguna: Manager dapat mengelola akun pengguna dengan membuat, mengedit, atau menghapus akun Kasir dan Admin.
- Melihat keseluruhan riwayat transaksi kasir: Manager memiliki akses penuh untuk melihat dan menganalisis seluruh riwayat transaksi yang dilakukan oleh kasir.
- Melihat laporan penjualan: Manager dapat melihat laporan penjualan harian, mingguan, atau bulanan untuk memantau performa bisnis secara keseluruhan.

2. Admin:
Sebagai seorang Admin, pengguna memiliki tanggung jawab dalam mengelola menu dan memantau transaksi kasir. Berikut adalah beberapa tugas dan fitur yang dapat dilakukan oleh seorang Admin:
- Mengelola menu: Admin dapat menambah, mengedit, atau menghapus menu makanan dan minuman yang tersedia.
- Melihat seluruh transaksi kasir: Admin memiliki akses untuk melihat riwayat transaksi yang dilakukan oleh seluruh kasir, sehingga memudahkan pengawasan dan monitoring aktivitas transaksi.

3. Kasir:
Sebagai seorang Kasir, pengguna bertanggung jawab atas transaksi penjualan dan pengelolaan riwayat transaksi pribadinya. Fitur-fitur yang dapat diakses oleh seorang Kasir antara lain:
- Melakukan transaksi penjualan: Kasir dapat menggunakan website Resto Ndeso untuk mencatat dan memproses pesanan pelanggan.
- Melihat riwayat transaksi pribadi: Kasir dapat melihat riwayat transaksi penjualan yang telah mereka lakukan untuk memudahkan manajemen keuangan dan pencatatan.

Dengan adanya peran-peran yang berbeda ini, Resto Ndeso membantu meningkatkan efisiensi dan ketepatan dalam pengelolaan bisnis restoran atau warung. Dengan fitur-fitur yang disediakan, pengguna dapat dengan mudah mengatur menu, melacak transaksi, dan menganalisis kinerja bisnis secara keseluruhan.

Account Login (username & password using lowercase):
Manager     | username: manager     password: manager
Admin       | username: admin       password: admin
Cashier     | username: kasir       password: kasir

*******************
Setup/Installation
*******************

Berikut adalah langkah-langkah untuk setup web Resto Ndeso:

1. Import Database:
   - Pertama, impor database "resto_ndeso.sql" ke dalam sistem manajemen basis data yang Anda gunakan, seperti MySQL.
   - Anda dapat menggunakan alat seperti phpMyAdmin atau MySQL Command Line untuk melakukan impor. Pastikan untuk membuat database terlebih dahulu sebelum melakukan impor.

2. Pindahkan Folder ke Document Root:
   - Jika Anda menggunakan XAMPP, pindahkan folder Resto Ndeso ke direktori "C:\xampp\htdocs\".
   - Jika Anda menggunakan Laragon, pindahkan folder Resto Ndeso ke direktori "C:\Laragon\www\".
   - Jika Anda menggunakan Laragon, restart servis Laragon untuk memastikan virtual host baru telah terdaftar.

3. Buka Web di Browser:
   - Buka browser web Anda (misalnya Google Chrome, Mozilla Firefox, atau lainnya).
   - Untuk XAMPP, akses website Resto Ndeso dengan URL http://localhost/resto_ndeso/.
   - Untuk Laragon, akses website Resto Ndeso dengan URL http://resto_ndeso.test/ (default hostname .test). 

4. Konfigurasi Base URL:
   - Setelah halaman Resto Ndeso muncul, salin alamat URL yang terbaca di bilah alamat browser Anda.
   - Selanjutnya, temukan file "application/config/config.php" dalam folder Resto Ndeso.
   - Buka file tersebut dengan menggunakan editor teks.
   - Cari baris yang berisi pengaturan "$config['base_url']" dan ubah nilainya dengan URL yang baru saja Anda salin.
   - Misalnya, jika URL yang baru saja Anda salin adalah "http://localhost/resto_ndeso/", maka ubah baris tersebut menjadi:
     ----------------------------------------------------------------
     $config['base_url'] = 'http://localhost/resto_ndeso/';
     ----------------------------------------------------------------

5. Konfigurasi Database:
   - Temukan file "application/config/database.php" dalam folder Resto Ndeso.
   - Buka file tersebut dengan menggunakan editor teks.
   - Cari bagian pengaturan koneksi ke database, yang mungkin mirip dengan:
     --------------------------------
     'hostname' => 'localhost',
     'username' => 'root',
     'password' => 'your_password',
     'database' => 'resto_ndeso',
     --------------------------------
   - Sesuaikan nilai 'username', 'password', dan 'database' dengan pengaturan koneksi database Anda. Jika Anda tidak memiliki kata sandi, biarkan nilai 'password' kosong (atau sesuaikan sesuai pengaturan database Anda).

6. Selesai:
   - Setelah mengubah konfigurasi, simpan file-file yang telah diubah.
   - Sekarang Anda dapat mencoba mengakses web Resto Ndeso menggunakan URL yang telah dikonfigurasi.
   - Jika semuanya berjalan dengan baik, Anda sekarang dapat mulai menggunakan Resto Ndeso untuk mengelola menu, pengguna, dan transaksi di restoran atau warung Anda.

Semoga langkah-langkah di atas membantu Anda dalam mengatur dan menjalankan website Resto Ndeso. Selamat mencoba!

*******************
Don't forget to visit "andikariskys.my.id"
*******************
