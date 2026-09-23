<div align="center">

# 🏛️ Sistem Administrasi Surat Desa

**Layanan persuratan desa, dari pengajuan hingga penerbitan.**

Aplikasi web untuk membantu perangkat desa mengelola administrasi surat dan memudahkan penduduk mengajukan layanan secara daring.

![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=flat-square&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![Blade](https://img.shields.io/badge/View-Blade-F05340?style=flat-square)
![Vite](https://img.shields.io/badge/Build-Vite_5-646CFF?style=flat-square&logo=vite&logoColor=white)

[Fitur](#fitur-utama) · [Alur Layanan](#alur-layanan) · [Instalasi](#instalasi-lokal) · [Struktur Proyek](#struktur-proyek) · [Kontribusi](#kontribusi)

</div>

---

## Tentang Proyek

Sistem Administrasi Surat Desa menghubungkan kebutuhan layanan penduduk dengan proses administrasi perangkat desa dalam satu aplikasi. Penduduk dapat mengirim pengajuan beserta dokumen persyaratan, memantau riwayat, dan memperbaiki pengajuan yang ditolak. Admin dapat meninjau berkas, memberikan keputusan, dan mengelola informasi pelayanan desa.

Aplikasi memisahkan area kerja **admin** dan **penduduk** menggunakan autentikasi serta middleware peran. Halaman publik menampilkan profil desa, jenis surat, dan waktu pelayanan.

## Fitur Utama

| Untuk admin | Untuk penduduk |
| --- | --- |
| Dashboard ringkasan dan grafik pengajuan | Dashboard layanan penduduk |
| Pengelolaan data penduduk dan akun admin | Pengelolaan profil pribadi |
| Impor data penduduk dari XLSX, XLS, atau CSV | Pengajuan surat beserta dokumen persyaratan |
| Pengelolaan jenis surat dan jadwal pelayanan | Riwayat dan status pengajuan |
| Pengelolaan profil desa | Perbaikan pengajuan yang ditolak |
| Persetujuan atau penolakan dengan pesan | Pengajuan ulang setelah perbaikan |
| Penomoran surat saat persetujuan | Unduh dokumen surat yang telah disetujui dan tersedia |
| Riwayat surat, cetak, dan pengolahan berkas PDF | Akses layanan melalui akun penduduk |

### Jenis surat

Data awal pada seeder mencakup **12 jenis surat**:

| Kode | Layanan |
| --- | --- |
| SD | Surat Dispensasi |
| SPP | Surat Pengantar Perpindahan Penduduk |
| SKIA | Surat Pengantar Pembuatan KIA |
| SPEK | Surat Pernyataan Perubahan Elemen Kependudukan |
| SKU | Surat Keterangan Usaha |
| SKTM | Surat Keterangan Tidak Mampu |
| SKD | Surat Keterangan Domisili |
| SPN | Surat Pengantar Nikah |
| SPIK | Surat Pengantar Izin Keramaian |
| SPKK | Surat Pengantar Pembuatan KK |
| SPAK | Surat Pengantar Pembuatan Akte Kelahiran |
| SPKM | Surat Keterangan Kematian |

Persyaratan berkas berbeda menurut jenis surat. Validasi dan formulirnya terdapat pada controller pengajuan dan view terkait; menambahkan jenis baru mungkin memerlukan penyesuaian kode tersebut.

## Alur Layanan

~~~mermaid
flowchart LR
    A[Penduduk login] --> B[Pilih jenis surat]
    B --> C[Isi pengajuan dan unggah berkas]
    C --> D[Menunggu pemeriksaan admin]
    D --> E{Keputusan}
    E -->|Disetujui| F[Penomoran dan proses dokumen surat]
    E -->|Ditolak| G[Pesan perbaikan]
    G --> H[Penduduk memperbaiki pengajuan]
    H --> D
    F --> I[Cetak atau unduh dokumen yang tersedia]
~~~

Status yang digunakan pada controller pengajuan adalah **Menunggu**, **Approved**, dan **Rejected**.

## Teknologi

| Komponen | Teknologi |
| --- | --- |
| Backend | PHP ^8.2 dan Laravel ^11.9 |
| Template | Blade |
| Autentikasi | Laravel Breeze dan middleware peran |
| Frontend | Tailwind CSS, Alpine.js, serta aset template admin |
| Build aset | Vite 5 |
| Grafik | Chart.js |
| PDF | Laravel DomPDF |
| Spreadsheet | Laravel Excel |
| Pengujian | PHPUnit 11 |
| Database panduan lokal | MySQL |

Versi dependensi yang digunakan proyek dikunci melalui **composer.lock** dan **package-lock.json**.

## Instalasi Lokal

### 1. Prasyarat

Siapkan PHP 8.2 atau lebih baru yang kompatibel dengan dependensi, Composer 2, Node.js yang kompatibel dengan Vite 5, npm, dan MySQL. Pastikan ekstensi PHP yang diminta Composer tersedia, termasuk driver database yang digunakan.

### 2. Ambil kode dan pasang dependensi

~~~bash
git clone https://github.com/bayupra7ama/sistem-administrasi-surat-desa.git
cd sistem-administrasi-surat-desa
composer install
npm ci
~~~

### 3. Siapkan environment

Repositori saat ini belum menyertakan **.env.example**. Buat file **.env** di root proyek dengan konfigurasi awal berikut, lalu sesuaikan koneksi database lokal:

~~~dotenv
APP_NAME="Administrasi Surat Desa"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

LOG_CHANNEL=stack
LOG_STACK=single

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=administrasi_surat_desa
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=local

MAIL_MAILER=log
~~~

Contoh ini memakai kredensial database lokal. Isi username dan password sesuai instalasi kamu. Pengiriman email memakai log untuk pengembangan; atur layanan email sendiri jika ingin menggunakan pengiriman email nyata.

Buat database kosong bernama **administrasi_surat_desa**, kemudian hasilkan application key:

~~~bash
php artisan key:generate
~~~

### 4. Siapkan data awal dan penyimpanan

Sebelum menjalankan seeder, sesuaikan identitas serta password akun admin pada **database/seeders/AdminSeeder.php** untuk lingkungan lokal kamu. Jangan commit password pribadi.

Pada database baru:

~~~bash
php artisan migrate --seed
php artisan storage:link
~~~

Seeder utama menyiapkan profil desa, waktu pelayanan, jenis surat, dan akun admin. Tinjau data awal tersebut dan sesuaikan dengan desa yang digunakan. Hindari menjalankan seeder berulang tanpa memeriksa data yang sudah ada.

### 5. Jalankan aplikasi

Buka dua terminal di folder proyek.

**Terminal pertama — server Laravel:**

~~~bash
php artisan serve
~~~

**Terminal kedua — pengembangan aset:**

~~~bash
npm run dev
~~~

Buka **http://127.0.0.1:8000** di browser.

| Halaman | Alamat |
| --- | --- |
| Informasi layanan publik | / |
| Login | /login |
| Dashboard admin | /admin/dashboard |
| Dashboard penduduk | /penduduk/dashboard |

Dashboard memerlukan login dengan peran yang sesuai. Gunakan akun dari seeder untuk admin; akun penduduk dapat dikelola melalui modul penduduk.

## Struktur Proyek

~~~text
app/
├── Http/
│   ├── Controllers/       # Proses administrasi, autentikasi, dan pengajuan
│   └── Middleware/        # Pembatasan akses berdasarkan peran
└── Models/                # Model data aplikasi
database/
├── migrations/            # Struktur tabel
└── seeders/               # Data awal dan akun admin
resources/
├── views/                 # Halaman Blade admin, penduduk, dan publik
├── css/                   # Sumber stylesheet
└── js/                    # Sumber JavaScript
routes/
├── web.php                # Rute layanan dan dashboard
└── auth.php               # Rute autentikasi
public/                    # Aset yang diakses browser
storage/                   # Log, cache, dan berkas aplikasi
tests/                     # Tes unit dan fitur
~~~

## Perintah Pengembangan

| Perintah | Kegunaan |
| --- | --- |
| php artisan route:list | Melihat rute aplikasi |
| php artisan test | Menjalankan tes yang tersedia |
| npm run build | Membuat aset frontend untuk distribusi |
| php artisan optimize:clear | Membersihkan cache konfigurasi dan aplikasi |
| php artisan storage:link | Membuat tautan penyimpanan publik |

Tes yang tersedia mencakup contoh serta alur autentikasi/profil. Cakupan tersebut belum membuktikan seluruh proses administrasi surat telah teruji. Gunakan database pengujian terpisah dan verifikasi alur pengajuan, revisi, persetujuan, serta dokumen secara manual.

## Catatan Operasional

Aplikasi memproses data identitas dan berkas penduduk. Sebelum digunakan pada lingkungan publik:

- Simpan konfigurasi database dan layanan email di **.env**; jangan masukkan kredensial ke repositori.
- Ganti kredensial admin bawaan, gunakan **APP_DEBUG=false**, dan aktifkan HTTPS.
- Arahkan document root server ke folder **public/**.
- Tinjau otorisasi pada setiap akses berkas dan pengajuan, termasuk pembatasan berdasarkan pemilik data.
- Periksa penyimpanan dokumen identitas. Implementasi menggunakan disk publik untuk sejumlah unggahan; jangan menganggap berkas tersebut privat hanya karena halaman aplikasi membutuhkan login.
- Siapkan pencadangan database dan berkas beserta pengujian pemulihannya.

## Pemecahan Masalah

| Kendala | Langkah pemeriksaan |
| --- | --- |
| Application key belum tersedia | Pastikan .env ada, lalu jalankan php artisan key:generate. |
| Koneksi database gagal | Periksa layanan MySQL, nama database, dan kredensial pada .env. |
| Tabel tidak ditemukan | Jalankan migrasi pada database pengembangan yang benar. |
| Vite manifest tidak ditemukan | Jalankan npm run dev saat pengembangan atau npm run build untuk aset terkompilasi. |
| Gambar atau unggahan tidak tampil | Periksa php artisan storage:link dan izin akses folder storage. |
| Dashboard menolak akses | Pastikan akun memiliki peran admin atau penduduk yang sesuai. |
| Konfigurasi lama masih digunakan | Jalankan php artisan optimize:clear setelah memperbarui .env. |

## Kontribusi

Laporkan bug atau usulkan perbaikan melalui [Issues](https://github.com/bayupra7ama/sistem-administrasi-surat-desa/issues). Sertakan langkah reproduksi, perilaku yang diharapkan, dan versi lingkungan pengembangan.

Untuk kontribusi kode, buat branch terpisah dan kirim pull request dengan penjelasan perubahan serta hasil pemeriksaan. Gunakan data contoh; jangan unggah NIK, KK, dokumen penduduk, atau kredensial nyata.

---

<div align="center">

**Administrasi lebih tertata. Layanan lebih mudah diakses.**

Dikelola melalui [bayupra7ama/sistem-administrasi-surat-desa](https://github.com/bayupra7ama/sistem-administrasi-surat-desa).

</div>
