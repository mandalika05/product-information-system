# Mini Project 1 : Product Information System

Mini Project Pemrograman Web yang mengimplementasikan konsep dasar PHP untuk membangun sistem informasi produk sederhana berbasis modular.

```teks
Mata Kuliah : Pemograman Web
Project : Mini Project 1
```

---

## 1. Gambaran Umum Project

**Product Information System** merupakan sistem informasi sederhana yang digunakan untuk menampilkan data produk dan memantau kondisi persediaan.

Aplikasi mengelola data produk yang terdiri dari **ID, nama, kategori, harga, stok, dan deskripsi**. Sistem juga melakukan pengolahan data berupa perhitungan total stok, total nilai persediaan, serta identifikasi produk dengan stok kritis.

Project ini dirancang dengan pendekatan **Separation of Concerns**, yaitu memisahkan konfigurasi, data, proses, dan tampilan ke dalam beberapa file agar struktur program lebih terorganisasi.

### Capaian Pembelajaran

Project ini menerapkan beberapa konsep dari materi Pemrograman Web:

* Konstanta menggunakan `const`
* Multidimensional array
* Function
* Conditional `if`
* Perulangan `foreach`
* `require_once`
* Modular programming
* Pemisahan configuration layer, data layer, processing layer, dan presentation layer

Konsep tersebut sesuai dengan rancangan **Mini Project 1: Product Information System** pada materi perkuliahan 2.

---

## 2. Dokumentasi Tampilan Web

Berikut merupakan tampilan utama sistem setelah aplikasi dijalankan pada lingkungan lokal.

<img width="936" height="438" alt="image" src="https://github.com/user-attachments/assets/fb44c08a-7c7c-4b6e-aeb0-f2bd9e07c1d3" />


### A. Dashboard & Ringkasan Persediaan

Halaman utama menampilkan informasi ringkas mengenai jumlah produk, total stok, jumlah stok kritis, dan total nilai persediaan.


<img width="950" height="133" alt="image" src="https://github.com/user-attachments/assets/843621ff-2476-4dcb-907e-b3c8943e2b7d" />


### B. Daftar Produk


<img width="919" height="432" alt="image" src="https://github.com/user-attachments/assets/1178d091-ed6c-483b-9d77-932a2c8eb913" />


Tabel produk menampilkan:

* ID produk
* Nama produk
* Kategori
* Harga
* Stok
* Deskripsi

Setiap produk juga memiliki status persediaan berdasarkan kondisi stok.

---

## 3. Struktur Direktori & Arsitektur

Struktur project dipisahkan berdasarkan fungsi masing-masing file:

```text
product-information-system/
│
├── config.php
├── products.php
├── functions.php
├── index.php
├── README.md
```

### Pembagian Layer

```text
config.php
     │
     └── Configuration Layer
         Konfigurasi dan konstanta sistem

products.php
     │
     └── Data Layer
         Data produk dalam multidimensional array

functions.php
     │
     └── Processing Layer
         Fungsi pengolahan dan perhitungan data

index.php
     │
     └── Presentation Layer
         Tampilan dan penyajian data kepada pengguna
```

Pemisahan file berdasarkan fungsi tersebut mengikuti konsep **Separation of Concerns** yang dijelaskan pada materi.

---

## 4. Rincian Komponen Sistem

### A. Configuration Layer — `config.php`

File `config.php` digunakan untuk menyimpan konstanta yang diperlukan oleh sistem.

Konstanta yang digunakan:

```php
const APP_NAME = "Product Information System";
const APP_VERSION = "1.0.0";
const STOK_KRITIS = 3;
```

`STOK_KRITIS` digunakan sebagai batas untuk menentukan kondisi persediaan produk.

---

### B. Data Layer — `products.php`

File `products.php` berfungsi sebagai tempat penyimpanan data produk menggunakan **multidimensional array**.

Setiap elemen produk memiliki struktur:

```text
ID
Nama
Kategori
Harga
Stok
Deskripsi
```

Struktur tersebut mengikuti kebutuhan data yang ditentukan dalam Mini Project.

---

### C. Processing Layer — `functions.php`

File `functions.php` berisi fungsi untuk melakukan pengolahan data.

Fungsi utama:

```php
hitungTotalNilaiStok()
```

Fungsi tersebut menghitung nilai persediaan berdasarkan:

```text
Harga Produk × Jumlah Stok
```

Selain fungsi utama tersebut, terdapat fungsi pengolahan untuk menghitung total stok dan jumlah produk dengan kondisi stok kritis.

---

### D. Presentation Layer — `index.php`

File `index.php` merupakan halaman utama sistem.

File ini menggunakan:

```php
require_once
```

untuk memuat konfigurasi, data produk, dan fungsi yang diperlukan.

Data produk kemudian ditampilkan menggunakan:

```php
foreach
```

Sedangkan kondisi stok ditentukan menggunakan:

```php
if
```

Konsep `require_once` dan penggunaan `foreach` untuk menampilkan data merupakan bagian dari rancangan presentation layer pada Mini Project.

---

## 5. Logika Pengelolaan Stok

Sistem menggunakan batas stok kritis sebesar **3 unit**.

| Kondisi Stok | Status      |
| ------------ | ----------- |
| `< 3`        | Stok Kritis |
| `>= 3`       | Stok Aman   |

Logika tersebut digunakan untuk memberikan penanda visual pada tabel produk sehingga kondisi persediaan dapat diketahui dengan lebih mudah.

Konsep stok kritis `< 3` merupakan aturan yang secara khusus dicantumkan dalam Mini Project pada materi dosen.

---

## 6. Alur Pengolahan Data

Secara sederhana, proses aplikasi berjalan dengan alur:

```text
Data Produk
    ↓
products.php
    ↓
index.php memuat data
    ↓
functions.php mengolah data
    ↓
Conditional & foreach
    ↓
Dashboard dan Tabel Produk
```

Hasil pengolahan meliputi:

* jumlah produk
* total stok
* jumlah stok kritis
* total nilai persediaan
* status stok setiap produk

---

## 7. Cara Menjalankan Aplikasi

### Persiapan

Pastikan:

* XAMPP telah terpasang
* Apache dalam keadaan aktif
* Folder project berada di dalam `htdocs`

### Menjalankan

Akses melalui browser:

```text
http://localhost/product-information-system/
```

Sistem kemudian akan menampilkan halaman utama **Product Information System**.

---

## 8. Teknologi yang Digunakan

* PHP
* HTML
* CSS
* Visual Studio Code
* XAMPP
* Git
* GitHub

---

## 9. Checklist Implementasi

* [x] Configuration Layer
* [x] Data Layer
* [x] Processing Layer
* [x] Presentation Layer
* [x] Multidimensional Array
* [x] Function `hitungTotalNilaiStok()`
* [x] Conditional stok kritis
* [x] Perulangan `foreach`
* [x] `require_once`
* [x] Tampilan tabel produk
* [x] Ringkasan informasi persediaan
* [x] Dokumentasi README
* [x] Repository GitHub

---

### Status Project

**[x] Mini Project Selesai**

Product Information System telah berhasil dibuat sebagai sistem informasi sederhana untuk menampilkan dan memantau data produk serta kondisi persediaan.

Sistem menampilkan informasi produk berupa ID, nama, kategori, harga, stok, dan deskripsi. Data tersebut diolah untuk menampilkan jumlah produk, total stok, stok yang berada dalam kondisi kritis, serta total nilai persediaan.

Dalam proses pembuatannya, project menerapkan konsep PHP yang telah dipelajari, seperti multidimensional array untuk menyimpan data produk, function untuk melakukan perhitungan, conditional untuk menentukan kondisi stok, dan `foreach` untuk menampilkan data produk ke dalam tabel.

Project telah dijalankan dan diuji pada lingkungan lokal menggunakan XAMPP.
