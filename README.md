## Fitur Utama
- Pendaftaran kendaraan otomatis
- Pemindaian nomor plat kendaraan
- Manajemen reservasi
- Laporan harian dan bulanan
- Multi-login untuk pengguna dengan hak akses berbeda

## Prosedur Masuk
Kendaraan berhenti di depan pintu masuk, tepat sebelum palang pintu. Sensor mendeteksi keberadaannya dan kamera ANPR khusus secara otomatis mengenali dan merekam plat nomor, tanggal, dan waktu masuk. Sistem manajemen jarak jauh menangkap data yang disediakan oleh kamera dan memasukkannya ke dalam basis data. Jika sudah terdaftar, informasi keanggotaan dan data reservasi pelanggan ditambahkan. Palang pintu masuk dinaikkan agar pengemudi dapat mengakses tempat parkir. Palang pintu otomatis diturunkan setelah kendaraan melewati sensor keselamatan.

## Prosedur Keluar
Kendaraan berhenti di pintu keluar, tepat sebelum palang pintu. Sensor mendeteksi keberadaannya dan kamera ANPR khusus kembali memverifikasi pelat nomor dengan informasi pembayaran, atau daftar kendaraan di basis data (misalnya pelanggan). Sistem manajemen memvalidasi pembayaran yang benar, atau hak untuk parkir tanpa membayar untuk memungkinkan keluar. Palang pintu keluar terbuka, memungkinkan pengemudi meninggalkan Area Parkir. Palang pintu otomatis turun setelah kendaraan melewati sensor keselamatan.

## Instalasi
1. Clone repository ini.
2. Install dependencies yang diperlukan.
3. Konfigurasi database dan file .env.
4. Jalankan aplikasi.

## Penggunaan
- Masuk ke aplikasi menggunakan kredensial yang valid.
- Ikuti prosedur masuk dan keluar sesuai petunjuk di atas.
- Akses laporan dan manajemen pengguna sesuai dengan hak akses Anda.

## Lisensi

## Struktur Database

### 1. Tabel `users`
| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| id | bigint(20) | Primary key, Auto Increment |
| name | varchar(191) | Nama pengguna |
| email | varchar(191) | Email pengguna (unique) |
| place_id | bigint(20) | Foreign key ke tabel places |
| language_id | bigint(20) | Foreign key ke tabel languages |
| password | varchar(191) | Password terenkripsi |
| salt | varchar(100) | Salt untuk password |
| status | tinyint(1) | Status aktif/nonaktif (default: 1) |
| remember_token | varchar(100) | Token untuk fitur "remember me" |
| created_at | timestamp | Waktu pembuatan record |
| updated_at | timestamp | Waktu update record |

### 2. Tabel `categories`
| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| id | bigint(20) | Primary key, Auto Increment |
| place_id | bigint(20) | Foreign key ke tabel places |
| type | varchar(50) | Tipe kendaraan |
| description | mediumtext | Deskripsi kategori |
| limit_count | tinyint(4) | Batas jumlah |
| status | tinyint(4) | Status aktif/nonaktif |
| created_by | bigint(20) | Foreign key ke users |
| modified_by | bigint(20) | Foreign key ke users |
| created_at | timestamp | Waktu pembuatan |
| updated_at | timestamp | Waktu update |

### 3. Tabel `parkings`
| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| id | bigint(20) | Primary key, Auto Increment |
| place_id | bigint(20) | Foreign key ke places |
| slot_id | bigint(20) | Foreign key ke slots |
| category_id | bigint(20) | Foreign key ke categories |
| barcode | varchar(191) | Barcode unik |
| vehicle_no | varchar(191) | Nomor kendaraan |
| rfid_no | varchar(191) | Nomor RFID |
| driver_name | varchar(191) | Nama pengemudi |
| driver_mobile | varchar(191) | Nomor HP pengemudi |
| in_time | datetime | Waktu masuk |
| out_time | datetime | Waktu keluar |
| amount | decimal(8,2) | Jumlah biaya |
| paid | decimal(8,2) | Jumlah yang dibayar |
| status | tinyint(4) | Status parkir |

### 4. Tabel `tariffs`
| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| id | bigint(20) | Primary key, Auto Increment |
| place_id | bigint(20) | Foreign key ke places |
| category_id | bigint(20) | Foreign key ke categories |
| name | varchar(191) | Nama tarif |
| min_amount | decimal(8,2) | Jumlah minimum |
| amount | decimal(8,2) | Jumlah tarif |
| start_date | datetime | Tanggal mulai berlaku |
| end_date | datetime | Tanggal berakhir |
| status | tinyint(4) | Status aktif/nonaktif |

### 5. Tabel `floors`
| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| id | bigint(20) | Primary key, Auto Increment |
| place_id | bigint(20) | Foreign key ke places |
| name | varchar(191) | Nama lantai |
| level | tinyint(4) | Level lantai |
| remarks | varchar(191) | Catatan tambahan |
| status | tinyint(4) | Status aktif/nonaktif |

### Relasi Antar Tabel
- `parkings.category_id` → `categories.id`
- `parkings.slot_id` → `category_wise_floor_slots.id`
- `parkings.place_id` → `places.id`
- `tariffs.category_id` → `categories.id`
- `floors.place_id` → `places.id`
- `users.place_id` → `places.id`
- `users.language_id` → `languages.id`
