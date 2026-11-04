# Test Case Manual - Praktikum Pertemuan 10

Dokumen ini mencatat hasil pengujian manual terhadap fitur Create + Read Course pada proyek KursusKu.

**Tanggal Pengujian:** 04 November 2026  
**Penguji:** Raudhatul Husna  
**Environment:** Laragon (Apache + MySQL), Laravel 13.38.0, PHP 8.3.33

---

## Tabel 8 Test Case Wajib

| No | Skenario | Input Utama | Hasil yang Diharapkan | Hasil Aktual | Status |
| :--: | :--- | :--- | :--- | :--- | :---: |
| 1 | Simpan data valid | Semua field valid (code: `WEB-101`, name: `Web Dasar`, fee: `300000`, quota: `25`, status: `open`) | Data tersimpan, redirect ke `/courses`, pesan sukses muncul | Data tersimpan, redirect berhasil, alert hijau "Kursus berhasil ditambahkan." muncul | ✅ Lulus |
| 2 | Kode kosong | Field `code` dikosongkan | Validasi gagal, data tidak tersimpan, pesan error muncul | Muncul pesan "The code field is required." | ✅ Lulus |
| 3 | Kode duplikat | Input `WEB-101` untuk kedua kalinya | Ditolak oleh rule `unique:courses,code` | Muncul pesan "The code has already been taken." | ✅ Lulus |
| 4 | Nama kosong | Field `name` dikosongkan | Validasi gagal, data tidak tersimpan | Muncul pesan "The name field is required." | ✅ Lulus |
| 5 | Biaya negatif | `fee = -1000` | Ditolak karena rule `min:0` | Muncul pesan "The fee field must be at least 0." | ✅ Lulus |
| 6 | Kuota 0 | `quota = 0` | Ditolak karena rule `min:1` | Muncul pesan "The quota field must be at least 1." | ✅ Lulus |
| 7 | Status tidak valid | Manipulasi form: `status = active` (bukan draft/open/closed) | Ditolak karena rule `in:draft,open,closed` | Muncul pesan "The selected status is invalid." | ✅ Lulus |
| 8 | Daftar tampil ulang | Reload halaman `/courses` | Data tetap ada karena berasal dari MySQL | 8 data kursus tetap tampil di tabel setelah reload | ✅ Lulus |

---

## Catatan Hasil Pengujian

### Test 1 - Data Valid
- **Input:** code=`WEB-101`, name=`Web Dasar`, description=`HTML, CSS, dan dasar web.`, fee=`300000`, quota=`25`, start_date=`2026-11-15`, status=`open`
- **Hasil:** Redirect ke `/courses` dengan alert sukses. Data muncul di baris pertama tabel.
- **Verifikasi MySQL:** Data terlihat di tabel `courses` melalui HeidiSQL.

### Test 3 - Kode Duplikat
- **Input:** code=`WEB-101` (sama dengan data pertama)
- **Hasil:** Form kembali menampilkan input lama (old value), pesan error merah muncul di bawah field Kode.
- **Verifikasi:** Tidak ada baris baru di tabel `courses`.

### Test 5 & 6 - Validasi Numerik
- **Input:** fee=`-1000` dan quota=`0`
- **Hasil:** Validasi server-side menolak sebelum data sampai ke model. Tidak ada query INSERT yang dijalankan.

### Test 7 - Status Tidak Valid
- **Cara uji:** Menggunakan DevTools untuk mengubah nilai `<option>` menjadi `active` sebelum submit.
- **Hasil:** Rule `in:draft,open,closed` di controller berhasil menolak input.

---

## Evidence Screenshot

Simpan screenshot berikut di folder `evidence/week-10/`:

- [ ] `05-validation-error.png` — Screenshot saat test case 2, 3, 4, 5, 6, atau 7 (pilih salah satu yang paling jelas menampilkan pesan error merah).
- [ ] `04-index-8-data.png` — Screenshot halaman `/courses` setelah 8 data kursus berhasil ditambahkan.

---

## Refleksi Pengujian

**Jalur request yang terjadi saat test case 1 (data valid):**

1. Browser mengirim **POST** ke `/courses`
2. Route `courses.store` meneruskan ke `CourseController@store()`
3. `$request->validate()` memeriksa semua field — **LOLOS**
4. `Course::create($data)` menjalankan **INSERT** ke tabel `courses` via Eloquent
5. `to_route('courses.index')` mengirim **redirect 302** ke `/courses`
6. `Course::latest()->get()` menjalankan **SELECT** dengan `ORDER BY created_at DESC`
7. View `courses/index.blade.php` merender data ke tabel HTML

**Konsep SQL di balik Eloquent:**

```sql
-- Saat Course::create($data):
INSERT INTO courses (code, name, description, fee, quota, start_date, status, created_at, updated_at)
VALUES ('WEB-101', 'Web Dasar', 'HTML, CSS, dan dasar web.', 300000, 25, '2026-11-15', 'open', NOW(), NOW());

-- Saat Course::latest()->get():
SELECT * FROM courses ORDER BY created_at DESC;