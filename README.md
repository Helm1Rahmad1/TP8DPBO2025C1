# TP8DPBO2025C1

Saya Muhammad Helmi Rahmadi dengan NIM 2311574 mengerjakan soal TP 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---
## Deskripsi

Ini adalah proyek sistem manajemen mahasiswa sederhana yang dibangun menggunakan PHP dengan pendekatan arsitektur MVC (Model-View-Controller). Aplikasi ini dirancang untuk memudahkan pengelolaan data Mahasiswa, Kursus, dan Pendaftaran.

---

## Struktur Folder Proyek

```
tp_mvc/
├── aset/                # File CSS dan JS (Bootstrap)
├── konfigurasi/         # Koneksi database
├── pengendali/          # Controller (logika aplikasi)
├── model/               # Model (data dan database)
├── tampilan/            # View (halaman HTML/PHP)
├── index.php            # Router utama aplikasi

```
---

## Struktur Tabel

### students
Menyimpan data mahasiswa:
- `id`
- `nama`
- `nim`
- `telepon`
- `tanggal_bergabung`

### courses
Menyimpan data kursus:
- `id`
- `course_code`
- `course_name`
- `credits`
- `description`

### enrollments
Mencatat pendaftaran mahasiswa ke kursus:
- `id`
- `student_id` (relasi ke `students.id`)
- `course_id` (relasi ke `courses.id`)
- `enrollment_date`
- `grade`

---

## Cara Kerja MVC

### Model (`model/`)
- `Student.php` – fungsi CRUD mahasiswa
- `Course.php` – fungsi CRUD kursus
- `Enrollment.php` – fungsi CRUD pendaftaran + relasi antar entitas

### Controller (`pengendali/`)
- Mengatur proses data dari Model ke View dan sebaliknya:
  - `StudentController.php`
  - `CourseController.php`
  - `EnrollmentController.php`

### View (`tampilan/`)
- Halaman `create`, `edit`, `view` untuk masing-masing entitas
- Folder `tata letak/` berisi layout seperti `header.php` dan `footer.php`
- `template.class.php` sebagai sistem template sederhana

### Routing
- File `index.php` bertugas mengatur navigasi berdasarkan parameter `action` di URL.
  
---

## Fitur Tambahan

- Hubungan antar tabel dikelola secara otomatis via foreign key
- Konfirmasi sebelum penghapusan data agar tidak terjadi kesalahan

---

## Dokumtasi

https://github.com/user-attachments/assets/379fb475-95c3-4614-9546-56bd2d3ee9c2

---


