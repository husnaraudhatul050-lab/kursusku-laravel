Skenario | Input | Expected | Actual | Status
0 hasil | Ketik q=xyz-tidak-ada-999 | Empty state tampil, tanpa error. | Muncul pesan "Tidak ada kursus..." dan tabel kosong. | Pass
1 hasil | Ketik q=WEB-01 (kode unik) | Tepat 1 Course tampil. | Muncul tepat 1 baris data. | Pass
>10 hasil | Pilih filter status=open | Page 1 max 10 + pagination. | Page 1 menampilkan 10 data, muncul pagination. | Pass
Keyword spasi | Ketik q=Web Modern | Keyword terbaca benar. | Muncul data yang mengandung "Web Modern". | Pass
Filter + page 2 | Pilih status=open, klik Page 2 | Query state tetap (q/status di URL). | URL: ?status=open&page=2. Data sesuai filter. | Pass