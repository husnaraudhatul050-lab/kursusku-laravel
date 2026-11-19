# TEST MATRIX – MILESTONE 13

**Nama:** Raudhatul Husna  
**NIM:** 2524225  
**Mata Kuliah:** Bahasa Pemrograman III (PHP & MySQL)  
**Pertemuan:** 13  
**Tanggal Pengujian:** 18 November 2026  

| No. | Skenario | Input | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|---|
| 1 | 0 hasil | `q=xyz123tidakada` | Tidak ada data yang ditemukan dan muncul pesan data kosong. | Belum diuji | - |
| 2 | 1 hasil | `q=WEB-08` | Menampilkan satu data kursus yang sesuai dengan kata kunci. | Belum diuji | - |
| 3 | Lebih dari 10 hasil | `status=open` | Menampilkan maksimal 10 data per halaman dan tersedia pagination. | Belum diuji | - |
| 4 | Keyword dengan spasi | `q=Web Modern` | Sistem membaca kata kunci yang mengandung spasi dan menampilkan data sesuai. | Belum diuji | - |
| 5 | Filter + page 2 | `status=open`, lalu klik Next » | Halaman kedua tetap menampilkan data dengan filter status open. | Belum diuji | - |