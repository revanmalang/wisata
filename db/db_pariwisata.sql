-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2023 pada 07.50
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pariwisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, '@sofyan', '12345678', 'Sofyan Tirto Laksono');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri_penginapan`
--

CREATE TABLE `tbl_galeri_penginapan` (
  `id_galeri_penginapan` int(11) NOT NULL,
  `id_penginapan` int(11) NOT NULL,
  `foto_1` varchar(100) NOT NULL,
  `foto_2` varchar(100) NOT NULL,
  `foto_3` varchar(100) NOT NULL,
  `foto_4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_galeri_penginapan`
--

INSERT INTO `tbl_galeri_penginapan` (`id_galeri_penginapan`, `id_penginapan`, `foto_1`, `foto_2`, `foto_3`, `foto_4`) VALUES
(1, 1, '6063063f058b0.jpg', '6063063f0f104.jpg', '6063063f0f30b.jpg', '6063063f0f4e6.jpg'),
(2, 2, '60630746d9506.jpg', '60630746d99be.jpg', '60630746d9aaa.jpg', '60630746d9b77.jpg'),
(3, 3, '60630b0eee5f0.jpg', '60630b0eeeaad.jpg', '60630b0eeeeee.jpg', '60630b0eef248.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri_restoran`
--

CREATE TABLE `tbl_galeri_restoran` (
  `id_galeri_restoran` int(11) NOT NULL,
  `id_restoran` int(11) NOT NULL,
  `foto_1` varchar(100) NOT NULL,
  `foto_2` varchar(100) NOT NULL,
  `foto_3` varchar(100) NOT NULL,
  `foto_4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_galeri_restoran`
--

INSERT INTO `tbl_galeri_restoran` (`id_galeri_restoran`, `id_restoran`, `foto_1`, `foto_2`, `foto_3`, `foto_4`) VALUES
(1, 1, '60630419a2c4b.jpg', '60630419abbb0.jpg', '60630419ac6d6.jpg', '60630419ad02e.jpg'),
(2, 2, '6063052cda2e6.jpg', '6063052cdab61.jpg', '6063052cdbba0.jpg', '6063052cdbffe.jpg'),
(3, 3, '60630a3a33576.jpg', '60630a3a3de45.jpg', '60630a3a3e40e.jpg', '60630a3a3e6ab.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri_wisata`
--

CREATE TABLE `tbl_galeri_wisata` (
  `id_galeri_wisata` int(11) NOT NULL,
  `id_kategori_wisata` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `foto_1` varchar(100) NOT NULL,
  `foto_2` varchar(100) NOT NULL,
  `foto_3` varchar(100) NOT NULL,
  `foto_4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_galeri_wisata`
--

INSERT INTO `tbl_galeri_wisata` (`id_galeri_wisata`, `id_kategori_wisata`, `id_wisata`, `foto_1`, `foto_2`, `foto_3`, `foto_4`) VALUES
(1, 1, 1, '6062d1bdb17ef.jpg', '6062d1bdb7564.jpg', '6062d1bdb767b.jpg', '6062d1bdc48fc.jpg'),
(2, 1, 2, '6062e01b2f673.jpg', '6062e01b4a501.jpg', '6062e01b4a81f.jpg', '6062e01b4aa27.jpg'),
(3, 2, 3, '6062f63a6110b.jpg', '6062f63a62536.jpg', '6062f63a63a7c.jpg', '6062f63a66045.jpg'),
(4, 2, 4, '6062f917b8857.jpg', '6062f917b8e1f.jpg', '6062f917b9273.jpg', '6062f917bde8b.jpg'),
(5, 3, 0, '6062fac7a7e22.jpg', '6062fac7a8714.jpg', '6062fac7a90b0.jpg', '6062fac7a95af.jpg'),
(6, 3, 0, '6062fd438b7a4.jpg', '6062fd4397324.jpg', '6062fd4398042.jpg', '6062fd4398640.jpg'),
(7, 3, 5, '6062ff7b67e9f.jpg', '6062ff7b6852f.jpg', '6062ff7b6887b.jpg', '6062ff7b68f8f.jpg'),
(8, 3, 6, '6063024d0e5b5.jpg', '6063024d18993.jpg', '6063024d1912b.jpg', '6063024d1944e.jpg'),
(9, 1, 7, '60630d3c070cf.jpg', '60630d3c0726c.jpg', '60630d3c073ab.jpg', '60630d3c0748e.jpg'),
(10, 1, 8, '6063140116f15.jpg', '60631401170b5.jpg', '606314011725f.jpg', '6063140117434.jpg'),
(11, 2, 9, '606693bdd0603.jpg', '606693bdd0d55.jpg', '606693bdd162f.jpg', '606693bdd1e14.jpg'),
(12, 2, 10, '60669c90c796f.jpg', '60669c90c7bb9.jpg', '60669c90c7e8c.jpg', '60669c90c8093.jpg'),
(13, 3, 11, '6066e8e4d1820.jpg', '6066e8e4d19b7.jpg', '6066e8e4d1fdb.jpg', '6066e8e4d3920.jpg'),
(14, 3, 12, '6066eae9a1221.jpg', '6066eae9a4873.jpg', '6066eae9a4a33.jpg', '6066eae9a4c5a.jpg'),
(15, 2, 13, '617d61b574d24.jpg', '617d61b575086.jpg', '617d61b575285.jpg', '617d61b57546c.jpg'),
(16, 1, 14, '617d686172700.jpg', '617d68617287a.jpg', '617d6861729c8.jpg', '617d686172b0b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_wisata`
--

CREATE TABLE `tbl_kategori_wisata` (
  `id_kategori_wisata` int(11) NOT NULL,
  `kategori_wisata` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori_wisata`
--

INSERT INTO `tbl_kategori_wisata` (`id_kategori_wisata`, `kategori_wisata`) VALUES
(1, 'Pegunungan'),
(2, 'Air'),
(3, 'Religi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penginapan`
--

CREATE TABLE `tbl_penginapan` (
  `id_penginapan` int(11) NOT NULL,
  `nama_penginapan` varchar(100) NOT NULL,
  `alamat_penginapan` varchar(255) NOT NULL,
  `url_lokasi` varchar(255) NOT NULL,
  `peta_area` varchar(255) NOT NULL,
  `nomor_telepon` varchar(100) NOT NULL,
  `video_youtube` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `deskripsi_penginapan` text NOT NULL,
  `foto_penginapan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penginapan`
--

INSERT INTO `tbl_penginapan` (`id_penginapan`, `nama_penginapan`, `alamat_penginapan`, `url_lokasi`, `peta_area`, `nomor_telepon`, `video_youtube`, `facebook`, `twitter`, `instagram`, `youtube`, `deskripsi_penginapan`, `foto_penginapan`) VALUES
(1, 'Hotel Sae Inn', 'Los Seri P No. 7 Pasar, Pekauman, Pakauman, Kec. Batu, Kabupaten Batu, Jawa Tengah 51314', 'https://goo.gl/maps/922MuY3ATRCEjvBE8', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.749434461216!2d110.19409251319532!3d-6.9205290696551955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705dec2275f25d%3A0x7844b82a2288b911!2sSae%20Inn%20Hotel%20Kendal!5e0!3m2!1sid!2sid!4v1', '0294388338', 'https://www.youtube.com/embed/Yti_P3CPIZE', 'https://web.facebook.com/SAE-INN-1020421428051081?_rdc=1&amp;_rdr', 'https://twitter.com', 'https://www.instagram.com/sae.inn/', 'https://www.youtube.com/channel/UC3PHrD446Zd1jJqaRV2xHYQ', 'Hotel sae inn kendal merupakan hotel berkonsep moderen dan termasuk hotel bintang 5, terletak persis disebelah jalan raya pantura kendal - semarang.', '6063063f00ba5_sae-inn-5.jpg'),
(2, 'Hotel Anugrah', 'Jl. Pemuda No.89, Kempil, Langenharjo, Kec. Batu, Kabupaten Batu, Jawa Tengah 51314', 'https://goo.gl/maps/i45uq9PKvYhsENmA7', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7377032877075!2d110.19485541319531!3d-6.921927069669962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705c67075b34bb%3A0xf1eedee579a987f4!2sHotel%20Anugrah%20Kab.%20Kendal!5e0!3m2!1sid!2si', '0294388202', '', '', '', '', '', 'Hotel anugrah merupakan salah satu hotel yang terkenal dan terbesar di kabupaten kendal, hotel ini terletak di jalan pemuda langenharjo kendal dan tepat di samping jalan raya pantura kendal - jakarta, hotel ini termasuk hotel yang keberadaan nya ada di tengah kota kendal.', '60630746d8760_ha-3.PNG'),
(3, 'Hotel Asri Baru', 'Jl. Masjid No.2, Patukangan, Kec. Batu, Kabupaten Batu, Jawa Tengah 51311', 'https://goo.gl/maps/YEUPv2ncMhGmuiTn7', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.75022065083!2d110.20134331319524!3d-6.920435369654199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705ddf96cb7c53%3A0x901ab271e5717b93!2sHotel%20Asri%20Baru%20kendal!5e0!3m2!1sid!2sid!4v1', '0294381261', '', '', '', '', '', '&quot;KENYAMANAN YANG KAMI UTAMAKAN&quot; itulah slogan dari hotel ini. Hotel Baru Asri Batu berada di tengah-tengah pusat kota kendal dengan memberikan segala akses kemudahan dalam berinvestasi.', '60630b0eed89b_ab-1.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_restoran`
--

CREATE TABLE `tbl_restoran` (
  `id_restoran` int(11) NOT NULL,
  `nama_restoran` varchar(100) NOT NULL,
  `alamat_restoran` varchar(255) NOT NULL,
  `url_lokasi` varchar(255) NOT NULL,
  `peta_area` varchar(255) NOT NULL,
  `nomor_telepon` varchar(100) NOT NULL,
  `video_youtube` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `deskripsi_restoran` text NOT NULL,
  `foto_restoran` varchar(100) NOT NULL,
  `jam_buka` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_restoran`
--

INSERT INTO `tbl_restoran` (`id_restoran`, `nama_restoran`, `alamat_restoran`, `url_lokasi`, `peta_area`, `nomor_telepon`, `video_youtube`, `facebook`, `twitter`, `instagram`, `youtube`, `deskripsi_restoran`, `foto_restoran`, `jam_buka`) VALUES
(1, 'Aldila Resto', 'Jl. Raya Soekarno-Hatta No.20, Sukup Kulon, Purwokerto, Kec. Patebon, Kabupaten Batu, Jawa Tengah 51351', 'https://goo.gl/maps/7jnK5vA91Ck5YQNo7', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7305935332265!2d110.17835009999999!3d-6.9227742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705c68fd7a1e9f%3A0x4edeb20c25f86ce2!2sAldila%20Resto!5e0!3m2!1sid!2sid!4v1617072100015!5m2!1si', '0294388555', '', '', '', '', '', 'Aldila Resto Batu adalah usaha dibidang kuliner yang menyajikan menu khas olahan ikan. Aldila Resto Batu teletak di jalur Pantura Kabupaten Batu, tepatnya yaitu beralamatkan di Jl.Soekarno Hatta Km. 20 Batu. Usaha yang dirintis oleh Bapak Cahyono dan Ibu Laela ini pertama kali didirikan pada tanggal 17 Mei 2001. Filosofi nama Aldila yang merupakan singkatan dari â€œAlhamdulillah Dia Lahirâ€ diilhami ketika pemilik dikaruniani seorang anak. Hal ini menjadi semangat dalam membuka usaha bisnisnya. Konsep awal Aldila merupakan kolam pancing selanjutnya Aldila berkembang menjadi resto dengan mengus ung tema â€œNatureâ€. Aldila Resto menyajikan menu khas olahan ikan, seperti Gurami, Nila, Lele, Bawal, Ayam, Cumi, Udang, dan Bebek baik goreng ataupu bakar. Selain itu tersedia juga menu pendamping, aneka sayur dan buah-buahan. Di sini pengunjung dapat menikmati aneka olahan ikan segar yang diperoleh dari langsung dari hasil memancing. Aldila Resto mempunyai tagline fresh from the kitchen yang berarti masakan yang disajikan adalah masi hangat dan baru di masak. Selain sebagai resto, Aldila juga menyediakan fasilitas Villa dan Wedding Party, Aldila sering juga untuk tempat mengadakan seminar ataupun reunian keluarga. Fasilitas mini Villa ini merupakan fasilitas pendukung acara wedding party, jadi keluarga pengantin dapat beristirahat di villa tersebut. Di samping itu mini Villa Aldila Resto ini juga diperuntukkan bagi pengunjung yang sedang dalam perjalan bisnis ataupun perjalanan wisata.', '606304198e511_ar-7.PNG', '07.00 â€“ 21.00'),
(2, 'Kopi Senthet', 'Jl. Tentara Pelajar No.57, Tunggulrejo, Kec. Batu, Kabupaten Batu, Jawa Tengah 51315', 'https://g.page/kopisenthet?share', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.6501805549683!2d110.18818781319548!3d-6.9323482697802765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705c58563d702b%3A0x3aff0fe8f7991b31!2sKopi%20Senthet%20Kampoeng%20Rider!5e0!3m2!1sid!', '02943691497', '', '', '', '', '', 'Kopi Sentet adalah cafe &amp; resto kekinian yang ada di jalan tentara pelajar tunggulrejo kendal, tempat ini mengusung desain yang moderen dan kekinian untuk menarik minat pengunjung terutama kalangan anak muda dikendal. cafe ini menyediakan banyak menu makanan dan minuman yang kekinian dan tentunya enak. Dengan desain cafe yang unik dan moderen pula tempat ini juga bagus untuk dijadikan objek berfoto.', '6063052ccab28_kskr-1.PNG', '08.30 â€“ 23.30'),
(3, 'Sixteen 16 Cafe', 'Tentara Pelajar, Pateban Kauman, Kebonharjo, Kec. Patebon, Kabupaten Batu, Jawa Tengah 51351', 'https://goo.gl/maps/hRxGYvU6ZrEtHj988', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.667967481442!2d110.16223811319539!3d-6.930231669757854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705cea042ebbaf%3A0x9ca59cce6f34c06e!2sSixteen%2016%20Cafe!5e0!3m2!1sid!2sid!4v161707636', '0895424460560', 'https://www.youtube.com/embed/pEt_Ce0WRoU', 'https://facebook.com', 'https://twitter.com', 'https://www.instagram.com/sixteen16cafe/', 'https://www.youtube.com/channel/UCWnLS1dx_QChOCr9_mXMDJw', 'Sixteen 16 cafe dan resto merupakan tempat makan yang sendang hits dikendal, bertempat di jalan tentara pelajar, kebonharjo patebon kendal desain dari cafe ini berkonsep modern dan kekinian, tempat ini sangat bagus untuk dijadikan tempat berfoto juga, karena banyak spot-spot yang bagus untuk dijadikan latarbelakang berfoto, seperti salah satunya dinding yang bergambar ke dua sayap dan awan. Soal makanan dan minuman disini juga tersedia banyak varian, termasuk makanan dan minuman yang kekinian dan pastinya enak.', '60630a3a32825_stc-4.PNG', '11.00 â€“ 22.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_subscriber`
--

CREATE TABLE `tbl_subscriber` (
  `id_subscriber` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal_gabung` date NOT NULL,
  `jam_gabung` time NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jam_keluar` time NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Mengikuti',
  `status_pesan` varchar(100) NOT NULL DEFAULT 'Belum terbaca'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_subscriber`
--

INSERT INTO `tbl_subscriber` (`id_subscriber`, `email`, `tanggal_gabung`, `jam_gabung`, `tanggal_keluar`, `jam_keluar`, `status`, `status_pesan`) VALUES
(1, 'yusronpati@gmail.com', '2021-03-30', '14:09:06', '0000-00-00', '00:00:00', 'Mengikuti', 'Terbaca'),
(4, 'wakpeng120619@gmail.com', '2021-03-30', '15:16:12', '0000-00-00', '00:00:00', 'Mengikuti', 'Terbaca'),
(5, 'ilmukitabersama.13@gmail.com', '2021-03-30', '15:16:39', '0000-00-00', '00:00:00', 'Mengikuti', 'Terbaca'),
(6, 'miftaqul.roger@gmail.com', '2021-03-30', '16:42:04', '0000-00-00', '00:00:00', 'Mengikuti', 'Terbaca'),
(8, 'nyonyakabul12@gmail.com', '2021-04-02', '16:28:35', '0000-00-00', '00:00:00', 'Mengikuti', 'Terbaca'),
(9, 'laksonotirtosopyant@gmail.com', '2021-04-02', '16:29:06', '2021-10-30', '15:27:44', 'Tidak mengikuti', 'Terbaca'),
(11, 'yohanesadip4@gmail.com', '2021-04-02', '16:52:49', '0000-00-00', '00:00:00', 'Mengikuti', 'Terbaca'),
(12, 'lalunak.studio@gmail.com', '2021-10-30', '22:38:00', '0000-00-00', '00:00:00', 'Mengikuti', 'Belum terbaca'),
(13, 'yohanesadip@gmail.com', '2021-11-09', '13:57:18', '0000-00-00', '00:00:00', 'Mengikuti', 'Belum terbaca'),
(14, 'yusronpati@gmai.com', '2022-01-29', '07:22:11', '0000-00-00', '00:00:00', 'Mengikuti', 'Belum terbaca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wisata`
--

CREATE TABLE `tbl_wisata` (
  `id_wisata` int(11) NOT NULL,
  `id_kategori_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `alamat_wisata` varchar(255) NOT NULL,
  `url_lokasi` varchar(255) NOT NULL,
  `peta_area` varchar(255) NOT NULL,
  `nomor_telepon` varchar(100) NOT NULL,
  `jam_buka` varchar(100) NOT NULL,
  `harga_tiket_dewasa` int(100) NOT NULL,
  `harga_tiket_anak` int(100) NOT NULL,
  `video_youtube` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `deskripsi_wisata` text NOT NULL,
  `foto_wisata` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_wisata`
--

INSERT INTO `tbl_wisata` (`id_wisata`, `id_kategori_wisata`, `nama_wisata`, `alamat_wisata`, `url_lokasi`, `peta_area`, `nomor_telepon`, `jam_buka`, `harga_tiket_dewasa`, `harga_tiket_anak`, `video_youtube`, `facebook`, `twitter`, `instagram`, `youtube`, `deskripsi_wisata`, `foto_wisata`) VALUES
(1, 1, 'Plantera Fruit Paradise', 'Kalidukuh, RT.026/RW.9, Manggung, Sidodadi, Kec. Patean, Kabupaten Batu, Jawa Tengah 51364', 'https://goo.gl/maps/61wiZ4zoUvCTu1v38', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3959.283282840223!2d110.1541824!3d-7.0931259!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70659238fbf2cb%3A0xc8ef31a6afea2198!2sPlantera%20Fruit%20Paradise%20(Ngebruk)!5e0!3m2!1sen!2sid!4v1617330594238!5m2!1se', '02470894716', '08.00 - 16.00', 25000, 25000, '', '', '', '', '', 'Agro Wisata Ngebruk atau lebih dikenal Plantera Fruit Paradise, merupakan tempat wisata pertama dan satu-satunya yang menyediakan surga buah unggul dengan luas lahan sekitar 234 hektare yang ada di Kabupaten Batu, Desa Sidokumpul, Kecamatan Patean. Untuk berkunjung ke Ngebruk, Anda yang dari arah Semarang, tidak perlu menuju Batu. Lebih baik mengambil jalan pintas melalui pertigaan Jerakah belok ke Selatan menuju jalur Ngaliyan hingga mentok di pertigaan Singorojo. Jarak dari Jerakah/Ngaliyan sampai lokasi Plantera Fruit Paradise hanya memerlukan waktu tempuh sekitar 1,5 jam saja. Begitu memasuki area parkir, hawa sejuk langsung terasa. Keasrian lokasi Agro Wisata yang berada di perbukitan antara 400-600 dpl ini, begitu kental dipadu keramahan para petugas. Setelah memasuki Plantera Hall tempat informasi, Anda bisa menikmati fasilitas mobil wisata warna-warni yang siap mengantar wisatawan berkeliling kebun.', '6062d1bd93b21_pf-5.PNG'),
(2, 1, 'Curug Semawur', 'Kejiwan, Blumah, Plantungan, Kabupaten Batu, Jawa Tengah 51362', 'https://goo.gl/maps/FSWSVuz3ijGgGTZA6', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.6437443525206!2d109.9357223131985!3d-7.167117672311867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e700d509db043ab%3A0xaeaa7ad8db419425!2sCurug%20Semawur!5e0!3m2!1sid!2sid!4v1617002992960', '0816343758', '24 Jam', 0, 0, '', '', '', '', '', 'Curug Semawur terdiri dari 8 tingkat dengan airnya yang jernih dan tidak pernah kering di musim kemarau.   Pada tingkat pertama air mempunyai ketinggian sekitar 25 meter, dan tingkat kedua berketinggian 50 meter.  Dari dasar lembah, hanya tiga tingkat air terjun yang bisa dilihat dengan mata. Curug ini berada di ketinggian 1300 m dpl dan mengalir di Kali Bajang.', '6062e01b1d94a_cs-8.PNG'),
(3, 2, 'Pantai Cahaya', 'Klampok, Sendang Sikucing, Kec. Rowosari, Kabupaten Batu, Jawa Tengah 51354', 'https://goo.gl/maps/T5bwYQDYga7U2apSA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.901780112319!2d110.0662392!3d-6.9023484999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70440c5599c325%3A0x807d85bc60d57b0c!2sPantai%20Cahaya!5e0!3m2!1sid!2sid!4v1617014636082!5m2!1', '02943645623', '08.00 â€“ 17.00', 40000, 40000, '', '', '', '', '', 'Pantai Cahaya adalah Sebuah Obyek Wisata yang terletak di Desa Sendang Sikucing, Kecamatan Rowosari, Kabupaten Batu, yang berada dibawah naungan PT. Wersut Seguni Indonesia (WSI). PT. WSI merupakan lembaga konservasi satwa dan tumbuhan yang berdiri sejak tahun 1999 dan pertama di Indonesia, yaitu sebuah lembaga yang bergerak dibidang penangkaran lumba-lumba, namun seiring perkembangannya sekarang telah dibuka untuk umum sebagai salah satu tujuan wisata di Jawa Tengah dan Indonesia dengan keunikan dan perpaduan antara alam dan binatang supaya terjaga keseimbangan. Pantai Cahaya mempunyai segmen pasar semua kalangan mulai dari anak-anak, kawula muda sampai dengan orang dewasa, dan tentunya Pantai Cahaya di tunjang oleh wahana dan fasilitas yang sangat memadai antara perpaduan hewan, laut dan tumbuhan juga dilengkapi dengan Pentas Lumba-Lumba serta aneka satwa, Therapy Lumba-Lumba, Berenang bersama Lumba-Lumba, Pemandangan Laut Lepas, Bon-Bin Mini Cahaya, dan Kolam Renang Cahaya. Didalam Kolam Renang Cahaya terdapat kolam bermain untuk anak-anak yang dilengkapi dengan Ember Tumpah dan Water Boom mini, Kolam Tanding dengan air terjun Niagara, dan juga Kolam Relaxasi (satu-satunya di Jawa Tengah), Balkon Sunset, Wahana permainan anak seperti Mandi Bola, ATV Jungle, Kereta Mini, Abhirama, Trampolin dan Panggung Hiburan Theatron.', '6062f63a4837a_pc-7.jpg'),
(4, 2, 'Pantai Indah Kemangi', 'Srandu, Tambak/Persawahan, Jungsemi, Kec. Kangkung, Kabupaten Batu, Jawa Tengah', 'https://goo.gl/maps/cu8bXB9TgqosAnJT6', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.0002327709394!2d110.10576209999999!3d-6.890574!2m3!  1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e704492601b7fcb%3A0x9cbb572cde0c8bdd!2sPantai%20Indah%20Kemangi!5e0!3m2!  1sid!2sid!4v16170162', '085719802564', '24 Jam', 3000, 3000, '', '', '', '', '', 'Keindahan Pantai Indah Kemangi yang berada di Kecamatan Kangkung dinilai mempunyai daya tarik dan bisa dikembangkan menjadi sport tourism. Ini dikarenakan semakin terkenalnya pantai ini dan ditambah lagi sekarang banyak wahana sport yang bermunculan di pantai ini, sehingga pantai ini layak untuk menjadi sport tourism baru dikendal.', '6062f917b77ef_pik-1.jpg'),
(5, 3, 'Masjid Agung Batu', 'Pekauman, Pakauman, Kec. Batu, Kabupaten Batu, Jawa Tengah 51319', 'https://goo.gl/maps/jayMnBkQxB3QmS636', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15842.999425451339!  2d110.20282583964033!3d-6.920478786545402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!  1s0x2e705c68e1fbe9f5%3A0x6efd2e43cc06a6e4!2sMasjid%20Agung%20Kendal!5e0!3m2!1sid!2sid!  ', '0294381133', '24 Jam', 0, 0, '', '', '', '', '', 'Masjid Agung Batu adalah masjid yang berada di Batu Jawa Tengah. Masjid ini terletak di \r\n\r\nJalan Raya Barat depan pusat perkantoran pemerintahan Kabupaten Batu, dan merupakan masjid \r\n\r\ntertua di Kabupaten Batu. Masjid tersebut dibangun sekitar tahun 1493 Masehi, atau \r\n\r\ntepatnya 1210 H oleh Wali Joko. Masjid tersebut dibangun sekitar abad 15, yaitu pada zaman Kesultanan Demak. Masjid tersebut dibangun oleh Raden Suweryo atau biasa dikenal dengan Wali \r\n\r\nJoko. Wali Joko merupakan salah satu santri Sunan Kalijaga, yang ditugasi untuk menyebarkan agama Islam di sekitar Batu. Wali Joko yang memiliki nama kecil Jaka Suwirya adalah \r\n\r\nkakak-beradik dengan Sunan Katong. Konon Wali Joko dimakamkan di Kaliwungu. Bangunan awal \r\n\r\nMasjid Agung Batu menyerupai Masjid Agung Demak, yaitu tidak terdapat kubah, pada atapnya \r\n\r\nberbentuk seperti prisma. Luas bangunan waktu itu hanya 27x27 meter. Sedangkan atapnya \r\n\r\nterbuat dari sirap (susunan kayu tipis) yang bersusun tiga. Tempat wudhu berupa kolah pendem \r\n\r\nyang mendapat aliran air dari sungai kendal yang dibuat oleh Wali Joko sendiri, letak \r\n\r\nkolamnya ada di depan masjid sebelah selatan utara makam Wali Joko. Seiring berjalannya \r\n\r\nwaktu, masjid yang berdiri gagah di pusat Kota Batu ini telah mengalami delapan kali \r\n\r\nrenovasi. Sejumlah peninggalan asli bangunan dari Wali Joko adalah 16 tiang penyangga masjid dengan masing-masing berdiameter 40 centimeter. Peninggalan asli lainnya yaitu kusein, \r\n\r\njendela dan daun pintu masjid. Selain itu adalah mimbar kotbah dan juga Maksuroh (tempat \r\n\r\nsalat bupati saat itu) yang terdapat di sebelah kiri mimbar. Tiang penyangga yang asli ada \r\n\r\ndi bangunan utama, tapi sekarang sudah dilapisi agar lebih kuat menjadi sekitar 60 cm. Dan sekarang tiang total menjadi 80 tiang.', '6062ff7b66ff7_mak-6.PNG'),
(6, 3, 'Masjid Al Muttaqin', 'Jl. Kyai H. Asyari, Kauman, Krajan Kulon, Kec. Kaliwungu, Kabupaten Batu, Jawa Tengah 51372', 'https://goo.gl/maps/eJf5eAtw64HeVgiw5', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.4050203951406!2d110.2522256662366!3d-6.9614564758865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705e6cbfd313f9%3A0x273518ee1added9f!2sMasjid%20Al-Muttaqin%20Kaliwungu!5e0!3m2!1sid!2sid!', '0294381006', '24 Jam', 0, 0, '', '', '', '', '', 'Masjid Al Muttaqin yang berada di jantung Kecamatan Kaliwungu, Batu, Jawa Tengah', '6063024d0ce52_mamk-5.PNG'),
(7, 1, 'Kebun Teh Medini', 'Limbangan, Jatirejo, Ngampel, Hutan, Ngesrepbalong, Limbangan, Kabupaten Batu, Jawa Tengah 51357', 'https://goo.gl/maps/gKyxRFmWpJRVkrpe7', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.6645408082754!2d110.33226311319837!3d-7.164723572285574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7066ffffffffff%3A0x6f145c8d7a61a475!2sKebun%20Teh%20Medini!5e0!3m2!1sid!2sid!4v1616996', '085285088147', '24 Jam', 3000, 3000, '', '', '', '', '', 'Kebun Teh Medini menjadi obyek wisata alam terbaru di Kabupaten Batu dengan sajian instagenic untuk liburan keluarga. Selain pesona alam yang luar biasa indah, destinasi wisata Kebun Teh Medini juga menyuguhkan spot, wahana dan fasilitas menarik didalamnya. Kabupaten Batu Jawa Tengah memang tak segencar kota lain untuk sektor pariwisatanya. Namun bukan berarti kota pantura satu ini tidak punya detinasi wisata untuk anda kunjungi saat hari libur tiba. Salah satu tempat menarik di Batu Jawa Tengah yaitu pantainya. Pesona alam Batu yang indah juga menyimpan destinasi yang jarang orang tahu dan pastinya rekomended. Obyek wisata alam Kebun Teh Medini Batu akan memanjakan aktivitas liburan anda dan keluarga tercinta dengan pesona keindahannya. Ketika anda hendak berlibur ke tempat piknik keluarga di Batu satu ini. Simak ulasan informasi wisata Kebun Teh Medini berikut ini untuk referensi sebelum anda berkunjung.', '60630d3be0c09_ktm-7.jpg'),
(8, 1, 'Kampoeng Djowo Sekatul', 'Desa, Sekutis, Margosari, Limbangan, Kabupaten Batu, Jawa Tengah 51383', 'https://g.page/kampoengdjowosekatul?share', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126684.19656383058!2d110.23082245997148!3d-7.139740772012021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7062c92343e9ef%3A0x63cd410a4fd16a18!2sKampoeng%20Djowo%20Sekatul!5e0!3m2!1sid!2sid!4v1', '08157777500', '10.00 â€“ 18.00', 0, 0, '', '', '', '', '', 'Desa Wisata Kampoeng Djowo Sekatul Terletak di Desa Mergosari Kecamatan Limbangan Kabupaten Batu. Berada di suasana pedesaan dan udaranya yang masih cukup dingin membuat Desa Wisata Kampoeng Djowo Sekatul ini ramai sekali dikunjungi pengunjung. Kembali ke Alam, Setelah seminggu penuh dengan segala kesibukan, merasakan segarnya udara pedesaan dan pemandangan alam yang asri dan indah akan memberi inspirasi dan menyegarkan pikiran sehingga dapat beraktifitas kembali dengan penuh semangat. Kehidupan modern seringkali membuat kita semakin jauh dari alam. Padahal, alam yang indah adalah karunia Tuhan yang setiap saat dapat kita nikmati. Riuhnya kicau burung, hamparan sawah yang luas, hijaunya perbukitan, serta gemercik air disungai di lingkungan alam pedesaan semakain lama menjadi semakin asing. Di Desa Wisata Kampoeng Djowo ini dengan fasilitas Penginapan Rombongan dan keluarga, Wisata Out Bound dan Edukasi, Taman bermain dan Bumi perkemahan, Flying Fox, Tanaman hias dan Kebun buah, Selamatan dan Ruwatan, Hotspot Area, Kolam Renang dan Pondok dahar, Pesta kebun dan Pesta pernikahan. Tempat ini juga merupakan salah satu tempat yang indah untuk Pre Wedding.', '60631401141b9_kjs-3.jpg'),
(9, 2, 'Pemandian Air Panas Nglimut', 'Nglimut, Gonoharjo, Limbangan, Kabupaten Batu, Jawa Tengah 51383', 'https://goo.gl/maps/xyW78FrAUZWpbxzR9', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.817365234277!2d110.33032562883604!3d-7.147105864028369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e707d55e5468139%3A0xfe1f58bd6f4f7bfd!2sPemandian%20Air%20Panas%20Nglimut%20Gonoharjo!5e0', '08112885488', '08.00 - 17.00', 0, 0, '', '', '', '', '', 'Wisata Pemandian Air Panas Nglimut di Gonoharjo Batu Jawa Tengah memiliki pesona keindahan yang sangat menarik untuk dikunjungi. Sangat di sayangkan jika anda berada di kota Batu tidak mengunjungi Wisata Pemandian Air Panas Nglimut di Gonoharjo Batu Jawa Tengah yang mempunyai keindahan yang tiada duanya tersebut. Wisata Pemandian Air Panas Nglimut di Gonoharjo Batu Jawa Tengah sangat cocok untuk mengisi kegiatan liburan anda, apalagi saat liburan panjang seperti libur nasional, ataupun hari ibur lainnya. Keindahan Wisata Pemandian Air Panas Nglimut di Gonoharjo Batu Jawa Tengah ini sangatlah baik bagi anda semua yang berada di dekat atau di kejauhan untuk merapat mengunjungi tempat wisata Pemandian air panas di kota Batu.', '606693bdcb6f2_papn-7.PNG'),
(10, 2, 'Sixs Water Games', 'Jl. Bahari No.66, Pandan Sari, Weleri, Kec. Weleri, Kabupaten Batu, Jawa Tengah 51355', 'https://goo.gl/maps/H2v9zenSa9tuJ4639', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3628977683684!2d110.0558886131959!3d-6.9664455701423735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70423b5f6ee763%3A0xf5884343941e531!2s6%20Six%20Water%20Games%20Wahana%20Air%20Dan%20Re', '087700120666', '07.00 - 17.00', 0, 0, '', '', '', '', '', 'Wahana permainan air sedang menjadi tren kali ini, banyak tempat wisata mendirikan wahana air yang menyenangkan untuk berlibur. Salah satunya yaitu SIX-WATER GAME WELERI berada di Kabupaten Batu Kecamatan Weleri, dibangun sebuah tempat wisata permaianan air. Lokasinya yang strategis ditengah kota Weleri membuat tempat wisata ini menjadi destinasi wisata keluarga saat liburan ataupun hari biasa.', '60669c90c3511_swg-3.jpg'),
(11, 3, 'Makam Wali Gembyang', 'Patukangan, Kec. Batu, Kabupaten Batu, Jawa Tengah 51311', 'https://goo.gl/maps/LWze3w6QPdPeKHtv9', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.750815530062!2d110.20340921319526!3d-6.920364469653456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705c696057e831%3A0xabd49f3c7ecd0be5!2sMakam%20Wali%20Gembyang!5e0!3m2!1sid!2sid!4v16170', '0246784440', '24 Jam', 0, 0, '', '', '', '', '', 'Selain makam Wali Joko dan Wali Hadi, di Kabupaten Batu juga terdapat makam seorang wali yang namanya cukup tersohor dan dituakan. Makam tersebut berjarak kurang lebih 1 kilometer dari Masjid Agung Batu. Tepatnya di Kelurahan Patukangan, Kec. Kota Batu, Kabupaten Batu. Untuk menuju ke makam, peziarah bisa menaiki becak yang telah tersedia di depan masjid.\r\nAdalah Wali Gembyang merupakan salah satu ulama terkenal penyebar agama Islam dan juga pendiri di Kabupaten Batu. Oleh karena itu Wali Gembyang termasuk sosok yang dituakan di kabupaten ini. Beliau dimakamkan di Kelurahan Patukangan.\r\nSebelum mensyiarkan agama Islam di Batu, rupanya Wali Gembyang telah terlebih dahulu mensyiarkan Islam di negara Cina. Cukup lama beliau hidup di Cina. Di sana beliau dipanggil dengan nama Han Byan. Padahal nama asli Wali Gembyang adalah Hamzah. Dari nama aslinya bisa disimpulkan bahwa beliau berasal dari negara Arab yakni Hamzah.\r\nSedangkan Gembyang merupakan nama panggilan yang semula Han Byan. Kemudian Beliau masuk ke Jawa dan sempat melakukan pertemuan dengan Sunan Kalijogo di Demak. Setelah itu Beliau diutus untuk menuju Batu dan mengembangkan ajarannya. Sesampainya di Batu Wali Gembyang benar-benar berjuang dan membantu mengembangkan Kabupaten Batu dalam segala bidang.\r\nSekitar tahun 1628 Masehi, dalam perjuangan serta syiarnya, Wali Gembyang memiliki ribuan santri yang ikut dalam ajaran Toreqot Satariyah. Semasa hidupnya Wali Gembyang dikenal dengan sifatnya yang ramah, sederhana dan sopan. Namun dibalik itu semua beliau memiliki suatu kelinuwihan yang sungguh luar biasa.', '6066e8e4c90cf_mwg-1.jpg'),
(12, 3, 'Goa Bunda Maria', 'Krajan, Pagergunung, Pageruyung, Kabupaten Batu, Jawa Tengah 51361', 'https://goo.gl/maps/dB31MCqJyvuyXiyc7', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.054772031361!2d110.06373184203234!3d-7.002833080137335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7069f955555555%3A0x31a0782a693af00f!2sGua%20Bunda%20Maria%20Ratu%20Besokor!5e0!3m2!1sid', '02455676511', '24 Jam', 0, 0, 'https://www.youtube.com/embed/ydgVMhyR7Ec', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'https://www.youtube.com/channel/UC_iUAWzHSfLN-fOZyRzolNQ', 'Kehadiran Gua Maria Ratu, Besokor â€“Weleri-Batu-Jawa tengah menambah wahana tempat Ziarah di jalur pantura, Jawa tengah. Gua Maria Ratu , Besokor tak dapat dipisahkan dari Paroki St. Martinus  Weleri-Batu, yang masuk wilayah tugas Ke Uskupan Agung Semarang. Dusun Besokor, merupakan salah satu Lingkungan Paroki St. Martinus Weleri yang berjarak 3 Km ke arah Selatan yang merupakan kawasan berbukit. Dusun besokor ketika itu adalah Dusun yang sangat miskin, sebagian penduduknya adalah buruh tani atau buruh perkebunan. Karena kemiskinannya inilah, KeUskupan Agung semarang pada tahun 1966 menugaskan Romo Danu Wijoyo (alm),Romo Knettsc Sj(alm), Romo Suto Panitro Sj (alm) dan 3 orang Bruder Rasul. Menurut Bp. Herwindo, staf keUskupan Agung Semarang, bagian pertanahan, Romo Danulah yang menjadi semacam  Pilot Proyek pengembangan karya KeUskupan Agung Semarang, dibidang pertanian (pertanian ketika itu, diidentikan dengan kaum lemah)Romo Danu ketika itu, mendampingi karya bruder-bruder Rasul. Para Bruder dan romo ini menempati tanah perkebunan seluas kurang lebih 11 ha, yang menurut keterangan Bp. Herwindo pula, tanah ini dibeli sejak tahun 1959 dari keluarga Sayers asal dusun Besokor.', '6066eae99a40b_gbm-1.jpg'),
(13, 2, 'Tirto Arum Baru', 'Jalan Raya Soekarno-Hatta Barat KM. 2,7, Bugangin, Kec. Batu, Kabupaten Batu, Jawa Tengah 51314', 'https://goo.gl/maps/xKWYxXrKa1xc2D4VA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.73938255092!2d110.1808672131953!3d-6.921726969667843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7041b90431efaf%3A0x313d943eccae094c!2sAgro%20Wisata%20Tirto%20Arum%20Baru!5e0!3m2!1sid!2s', '08112577707', '07.00 - 21.00', 20000, 10000, 'https://www.youtube.com/embed/_dw-aFhRMLw', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'https://www.youtube.com/channel/UC4e5OF4iUevg9RCv2CK7e0A', 'Sebuah Oase di Jalur Pantura, Wisata Agro Tirto Arum Baru berada di Jl. Soekarno Hatta KM 2,7 Kota Batu [tepi jalan raya Semarang â€“ Jakarta] sekitar 30 Km atau 45 menit dari Kota Semarang ini menawarkan relaksasi dari kepenatan dari rutinitas kerja sehari-hari.\r\nTirto Arum Baru dilengkapi dengan kolam renang ukuran besar, resto dengan lesehan-lesehannya, tempat pemancingan, hotel dengan kelengkapan kamar barak untuk group, fasilitas outbound termasuk rakit, wahana permainan di sawah berlumpur, flying fox, arena futsal dan bola volli, ruang pertemuan terbuka dan tertutup, arena atv, kebun binatang mini dan juga jalan pijat refleksi.', '617d61b572507_tab-15.PNG'),
(14, 1, 'Curug Sewu', 'Desa Wisata Curugsewu, Patean, Batu, Jawa Tengah, Indonesia, 51364.', 'https://goo.gl/maps/Nd5Sf4WiVK1d97T88', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7918.666901310249!2d110.1003133!3d-7.0872892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e706f2a61db769f%3A0x656494661c4ed66d!2sWisata%20Curug%20Sewu!5e0!3m2!1sid!2sid!4v1616990315278!5m2!1sid', '082222454711', '08.00 - 17.00', 10000, 10000, 'https://www.youtube.com/embed/rDsEBHzreps', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', ' https://www.youtube.com/channel/UCjdR_M7NLT_MGlUlythm5og', 'Curug Sewu merupakan wisata yang sudah sejak lama ada di Batu dan sampai sekarang masih menjadi wisata andalan di Kabupaten ini lebih tepatnya dibuka pada 26 Juni 2002. Alamat Curug Sewu Batu di Kecamatan Patean, Curug Sewu memiliki banyak keunikan yang pastinya akan membuat pengunjung yang datang takjub dan ingin kembali lagi kesana. Keunikan yang ada menjadikan curug ini sebagai destinasi yang wajib didatangi saat berkunjung ke Batu. Untuk lebih tepatnya, Curug Sewu terletak di Desa Curug Sewu, Kecamatan Patean, Kabupaten Batu. Tahukah kalian bahwa Curug Sewu merupakan air terjun tertinggi di Jawa Tengah, tingginya yang mencapai 80 meter tidak hanya menarik tetapi juga menjadi daya pikat tersendiri. Bukan hanya itu, Curug Sewu memiliki tiga tingkatan dengan total tingkatan 70 meter, air terjun Curug Sewu Batu ini kesemuanya memiliki pesonanya sendiri-sendiri. Untuk lebih tepatnya, tingkatan pertama memiliki tinggi 45 meter, tingkatan kedua memiliki tinggi 15 meter dan tingkatan ketiga mempunyai tinggi 20 meter. Mengagumkan bukan? Keindahan yang ada tidak hanya sebatas itu saja, disaat tertentu seperti pagi hari dengan cuaca cerah biasanya akan muncul pelangi dengan berbagai warna dan keindahannya. Pelangi itu biasanya muncul dari sisi air terjun melengkung hingga sisi lainnya, keindahan yang patut untuk diabadikan. Pelangi yang ada berasal dari perpaduan cahaya matahari yang terkena percikan air dari air terjun dengan intensitas tertentu sehingga memunculkan warna yang berbeda sesuai frekuensinya yang biasa kita sebut pelangi.', '617d68617219b_cs-1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_galeri_penginapan`
--
ALTER TABLE `tbl_galeri_penginapan`
  ADD PRIMARY KEY (`id_galeri_penginapan`);

--
-- Indeks untuk tabel `tbl_galeri_restoran`
--
ALTER TABLE `tbl_galeri_restoran`
  ADD PRIMARY KEY (`id_galeri_restoran`);

--
-- Indeks untuk tabel `tbl_galeri_wisata`
--
ALTER TABLE `tbl_galeri_wisata`
  ADD PRIMARY KEY (`id_galeri_wisata`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indeks untuk tabel `tbl_kategori_wisata`
--
ALTER TABLE `tbl_kategori_wisata`
  ADD PRIMARY KEY (`id_kategori_wisata`);

--
-- Indeks untuk tabel `tbl_penginapan`
--
ALTER TABLE `tbl_penginapan`
  ADD PRIMARY KEY (`id_penginapan`);

--
-- Indeks untuk tabel `tbl_restoran`
--
ALTER TABLE `tbl_restoran`
  ADD PRIMARY KEY (`id_restoran`);

--
-- Indeks untuk tabel `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  ADD PRIMARY KEY (`id_subscriber`);

--
-- Indeks untuk tabel `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeri_penginapan`
--
ALTER TABLE `tbl_galeri_penginapan`
  MODIFY `id_galeri_penginapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeri_restoran`
--
ALTER TABLE `tbl_galeri_restoran`
  MODIFY `id_galeri_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeri_wisata`
--
ALTER TABLE `tbl_galeri_wisata`
  MODIFY `id_galeri_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_wisata`
--
ALTER TABLE `tbl_kategori_wisata`
  MODIFY `id_kategori_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_penginapan`
--
ALTER TABLE `tbl_penginapan`
  MODIFY `id_penginapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_restoran`
--
ALTER TABLE `tbl_restoran`
  MODIFY `id_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  MODIFY `id_subscriber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
