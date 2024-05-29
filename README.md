# Penggunaan API 
  Penggunaan API pada aplikasi pemesanan makanan digunakan untuk menyediakan antarmuka yang jelas dan terstruktur 
  untuk berkomunikasi anatara backend dengan ui atau frontend pada aplikasi pemesanan makanan. 
  API ini memungkinkan pengguna untuk melakukan berbagai operasi seperti melihat menu, membuat pesanan, menambahkan review,
  melihat review dan melihat riwayat pesanan.

# Framework yang digunakan
  Framework yang digunakan dalam pembuatan API ini yaitu Laravel-11 , Laravel menyediakan berbagai fitur yang memudahkan pengembangan API 
  seperti routing, kontroler, dan validasi data. Pada Pembuatan API ini saya menggunakan package yang ada di laravel yaitu laravel-sanctum 
  yang menyediakan autentikasi API dan memudahkan dalam mengimplementasikan autentikasi token API untuk melindungi rute-rute API yang 
  memerlukan autentikasi.

# EndPoint Yang digunakan
  - GET /api/menu: Mendapatkan daftar menu yang tersedia.
  - POST /api/pemesanan: Membuat pesanan baru.
  - GET /api/pemesanan/{id}: Mendapatkan detail pesanan berdasarkan ID.
  - GET /api/order/history: Mendapatkan riwayat pesanan pengguna.
  - POST/api/review : Membuat review
  - POST/api/sen-email : membuat komentar pada use contact dan langsung masuk ke email
  - dan Masih banyak lagi endpoint yang terdapat pada API ini 
