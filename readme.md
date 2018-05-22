Database : datamining.table_1, datamining_clean.table_clean_1 <br> <br>

Clean : <br>
1.Penghapusan kd_peserta yang duplicat dan menyisakan 1 baris <br>
2.Pengubahan Gender yang tidak konsisten => hanya ada Pria dan Perempuan <br>
3.Update umur 0 tahun menjadi => Tahun daftar - Tahun Lahir <br>
4.Tgl daftar 0 menjadi => CURDATE()<br>
