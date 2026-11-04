# Log Penggunaan AI - Praktikum Pertemuan 10

Dokumen ini mencatat riwayat interaksi dengan AI selama pengerjaan Milestone 10 (CRUD Course) dan integrasi fitur sebelumnya.

| Prompt/tujuan | Saran AI | Diterima/ditolak | Alasan | Test |
| :--- | :--- | :---: | :--- | :--- |
| **Integrasi AJAX Availability:** "Kenapa tidak ada jumlah kursi yang tersisa?" | Menganalisis error JS, memperbaiki sintaks `}` berlebih, menambahkan fungsi `setAvailabilityMessage` yang hilang, dan menyesuaikan ID selector. | Diterima | Script JS sebelumnya *silent fail* karena syntax error dan fungsi tidak terdefinisi. | Console menampilkan log `✅ Script dimuat`, AJAX berhasil mengambil data JSON. |
| **Penyesuaian Blueprint PDF:** "Tolong sesuaikan dengan langkah-langkah ini ya (PDF Pertemuan 10)" | Memberikan panduan reset database, membuat ulang migration sesuai blueprint (`code`, `fee`, `quota`, dll), dan membuat Resource Controller. | Diterima | Struktur tabel dan controller lama tidak sesuai dengan acuan RPS/PDF Pertemuan 10. | `php artisan migrate` berhasil membuat tabel `courses` dengan kolom yang tepat. |
| **Perbaikan `web.php`:** "Ini codingan web.php saya tolong perbaiki" (Error merah & Route conflict) | Menambahkan `use App\Models\Course;`, menghapus duplikasi route `/`, dan mengomentari route `/pendaftaran` yang view-nya belum dibuat. | Diterima | Mencegah error 500 (`RouteNotFound`) dan 404 (`View not found`) saat membuka beranda. | `php artisan route:list` menampilkan route courses dengan bersih tanpa error. |
| **Verifikasi Model & Controller:** "Ini codingan Course.php/CourseController saya tolong perbaiki" | Memvalidasi bahwa kode `$fillable`, `casts()`, dan rule validasi `unique:courses,code` sudah 100% benar sesuai PDF. | Diterima | Tidak ada perubahan yang diperlukan; struktur sudah aman dari *MassAssignmentException*. | Form berhasil menyimpan data dan menolak input negatif pada `fee`/`quota`. |
| **Debugging Validasi Unique:** "Kenapa kode duplikat masih bisa dipakai, harusnya error?" | Meminta user mengecek jumlah data di database via Tinker (`App\Models\Course::count()`). | Diterima | Jika `count() = 0`, berarti data pertama tidak pernah tersimpan (atau DB di-reset), sehingga rule `unique` tidak terpicu. | Input data valid hingga muncul di tabel `/courses`, lalu input kode yang sama untuk memverifikasi error validasi. |
| **Pembuatan Test Matrix:** "Tolong buatkan test matrixnya" | Membuat matriks pengujian lengkap untuk skenario valid, invalid, network error, dan edge case. | Diterima | Memenuhi requirement "Delapan Test Case Manual Wajib" di Bagian 18 PDF. | Dilakukan pengujian manual pada form create untuk mengisi tabel evidence. |

---

### Catatan Refleksi (Sesuai Panduan)
1. **Bagian paling mudah dipahami:** Membuat View Blade (`index` dan `create`) karena strukturnya mirip dengan form pertemuan sebelumnya.
2. **Bagian paling sering menimbulkan error:** Konfigurasi Route di `web.php` (lupa meng-import Controller atau membuat route duplikat) dan lupa menjalankan `php artisan migrate` setelah membuat file migration baru.
3. **Hubungan antar komponen:** 
   - **Migration** adalah cetak biru (blueprint) untuk membuat tabel di MySQL.
   - **Model** adalah jembatan PHP untuk berbicara dengan tabel tersebut menggunakan Eloquent.
   - **Controller** menerima permintaan dari Route, memvalidasi data, dan memerintahkan Model untuk menyimpan/mengambil data.
   - **View** adalah tampilan antarmuka yang menampilkan data dari Controller kepada pengguna.