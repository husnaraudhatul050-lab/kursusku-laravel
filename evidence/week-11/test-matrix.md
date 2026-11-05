Tabel Pengujian Praktikum Pertemuan 11

Course CRUD Lanjutan (Show, Form Request, Edit/Update, Delete) - Proyek KursusKu

Nama: Raudhatul Husna
NIM: 2524225
Mata Kuliah: Pemrograman Web III

No.| Skenario Pengujian| Data Uji| Hasil yang Diharapkan| Actual| Status| Bukti
1| Menambah kursus valid| Semua data valid| Kursus berhasil ditambahkan| | Belum diuji| 
2| Kode kursus duplikat| Kode yang sudah ada| Validasi menolak data| | Belum diuji| 
3| Nama kursus kosong| Nama dikosongkan| Validasi menolak data| | Belum diuji| 
4| Nama kursus terlalu pendek| Nama 2 karakter| Validasi menolak data| | Belum diuji| 
5| Biaya negatif| -1000| Validasi menolak data| | Belum diuji| 
6| Biaya bukan bilangan bulat| 1000.5| Validasi menolak data| | Belum diuji| 
7| Kuota nol| 0| Validasi menolak data| | Belum diuji| 
8| Kuota melebihi batas| 501| Validasi menolak data| | Belum diuji| 
9| Kuota minimum| 1| Data diterima| | Belum diuji| 
10| Kuota maksimum| 500| Data diterima| | Belum diuji| 
11| Tanggal tidak valid| Tanggal salah| Validasi menolak data| | Belum diuji| 
12| Status tidak valid| active| Validasi menolak data| | Belum diuji| 
13| Update dengan kode sendiri| Kode tidak diubah| Update berhasil| | Belum diuji| 
14| Update memakai kode kursus lain| Kode duplikat| Validasi menolak data| | Belum diuji| 
15| Hapus kursus percobaan| TEST-DEL-01| Kursus terhapus| | Belum diuji| 

Catatan: Status dan hasil aktual diisi sesuai pengujian yang benar-benar dilakukan. Minimal 12 kasus pengujian harus tercatat. Jangan menandai Pass sebelum pengujian berhasil dilakukan.