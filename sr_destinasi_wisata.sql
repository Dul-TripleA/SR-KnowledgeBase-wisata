-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2024 at 11:51 AM
-- Server version: 10.6.18-MariaDB-log
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sr_destinasi_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_auth`
--

CREATE TABLE `tb_auth` (
  `id_user` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(5) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_auth`
--

INSERT INTO `tb_auth` (`id_user`, `username`, `email`, `password`, `level`, `profile_pic`, `created_at`, `updated_at`, `deleted_at`) VALUES
('4a9b7d55e6012933453e', 'Admin Dolankuy', 'admin_aja@gmail.com', '$2y$10$elPwZZtuWzm7ZkhOqk4Mluy0zeMDGDR0SS51.tr5NeFI1KfuLIs1W', 1, 'default.png', '2024-08-05 14:17:48', '2024-08-05 14:17:48', NULL),
('c29d87b329a597d866f5', 'Angel', 'angel@gmail.com', '$2y$10$IiXBkEpPIaLeM2jDJJNun.OkIvNyvLYkmjYAVjfwt/WHdFhzcQGjW', 2, 'default.png', '2024-07-17 13:35:35', '2024-07-17 13:35:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_destinasi_wisata`
--

CREATE TABLE `tb_destinasi_wisata` (
  `id_wisata` varchar(5) NOT NULL,
  `nama_wisata` varchar(50) DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga_tiket` float DEFAULT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `lokasi_kec` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `link_gmaps` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gambar`)),
  `status` varchar(20) DEFAULT NULL,
  `avg_rating` float DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_destinasi_wisata`
--

INSERT INTO `tb_destinasi_wisata` (`id_wisata`, `nama_wisata`, `kategori`, `harga_tiket`, `fasilitas`, `lokasi_kec`, `alamat`, `link_gmaps`, `deskripsi`, `gambar`, `status`, `avg_rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
('21269', 'Kampung Wayang', '[\"Wisata Sejarah\"]', 0, '[\"Parkir\",\"Mushola\",\"Toilet\",\"Rumah Makan\"]', 'Manyaran', 'Jalan Kepuhsari, Manyaran, Wonogiri Regency, Central Java 57662', 'https://maps.app.goo.gl/gAQzpU5vPDaaDNMAA', 'Desa Kepuhsari di Wonogiri, Jawa Tengah sudah sejak lama dikenal sebagai sentra kerajinan wayang kulit. Kerajinan dan kebudayaan wayang di Kepuhsari sudah ada sejak lebih dari setengah abad yang lalu. Masyarakat di desa tersebut  tetap mempertahankan secara turun temurun. Sejak dipromosikan sebagai Kampung  Wayang (Wayang Village),  banyak wisatawan yang didominasi turis luar negeri dan dari Jakarta yang berkunjung ke Kampung  Wayang (Wayang Village) Desa Kepuhsari Manyaran untuk belajar cara membuat wayang kulit tersebut ', '[\"1720196914_9144473a27dfc5e270bd.jpg\",\"1720196914_7adfe910ac9b5b6f13d3.jpg\"]', NULL, 4.4, '2024-07-05 16:28:34', '2024-08-07 22:51:17', NULL),
('24853', 'Waduk Gajah Mungkur', '[\"Wisata Buatan\",\"Wisata Alam\"]', 20000, '[\"Mushola\",\"Toilet\",\"Rumah Makan\",\"Parkir\",\"Gazebo\",\"Pusat Oleh - Oleh\"]', 'Wonogiri', 'Godean, Sendang, Wonogiri, Wonogiri Regency, Central Java 57615', 'https://maps.app.goo.gl/EE2UKgLSp9wcUgZT6', 'Obyek Wisata Sendang Asri Waduk Gajah Mungkur merupakan wisata buatan yang dikelola oleh Pemerintah  Kabupaten Wonogiri. Obyek wisata ini dibangun sekitar tahun ±1986 bersamaan dengan mulai beroperasinya Waduk Gajah Mungkur yang terletak 6 km sebelah selatan pusat Kota Kabupaten Wonogiri.\r\nAtraksi utama Obyek Wisata Sendang Asri adalah atraksi wisata tirta yang luasnya kurang lebih 88 Ha. Sedangkan luas daratan untuk kegiatan rekreasi penunjang, seperti taman bermain anak, kolam renang, waterboom, dan lain-lain adalah 2,2 Ha. Keindahan genangan air waduk dapat dinikmati dengan naik perahu motor. Pengunjung juga dapat menikmati suasana sekitar waduk yang asri sambil naik Kereta Kelinci.  Sarana wisata baru di obyek wisata ini adalah Taman Tombo Galau dan juga terdapat spot selfie yang cukup menarik.', '[\"1720191135_da1832489f8f89b7b292.jpg\",\"1720191135_525b0087138299f6e642.jpg\"]', NULL, 4.2, '2024-06-12 13:12:46', '2024-07-17 14:13:55', NULL),
('29059', 'Pantai Klothok', '[\"Wisata Alam\"]', 15000, '[\"Parkir\",\"Mushola\",\"Toilet\",\"Rumah Makan\",\"Pusat Oleh - Oleh\"]', 'Paranggupito', 'Kranding, Paranggupito, Wonogiri, Jawa Tengah', 'https://maps.app.goo.gl/weDj9NBAcwSSM4Eu5', 'Pantai Klotok yang berada di sebelah barat Pantai Sembukan, Desa/Kecamatan Paranggupito, Wonogiri, belakangan menjadi viral di media sosial. Foto-foto keindahan pantai yang baru selesai direvitalisasi itu mewarnai unggahan beberapa akun influencer.', '[\"1721536871_a71932f2d22f3c07583f.jpg\"]', NULL, 4.4, '2024-07-17 13:52:22', '2024-07-21 04:41:11', NULL),
('42712', 'Padepokan Soko Langit', '[\"Wisata Buatan\",\"Wisata Alam\"]', 20000, '[\"Parkir\",\"Toilet\",\"Rumah Makan\",\"Gazebo\"]', 'Bulukerto', 'Conto, Bulukerto, Wonogiri, Jawa Tengah', 'https://maps.app.goo.gl/X4mBaJ8DTbr3CtT86', 'Soko Langit berada di ketinggian lebih dari 1000 Mdpl. Wisatawan bisa merasakan keindaha dan kesejukan panorama alam di lereng selatan Gunung Lawu.', '[\"1721536918_752764b10a9f8d98b559.jpg\"]', NULL, 4.2, '2024-07-17 13:58:14', '2024-07-21 04:41:58', NULL),
('47359', 'Goa Putri Kencono', '[\"Wisata Sejarah\",\"Wisata Alam\"]', 5000, '[\"Mushola\",\"Parkir\",\"Toilet\",\"Rumah Makan\"]', 'Pracimantoro', 'Dusun Wonosobo, RT.3/RW.1, Gunungan, Wonodadi, Kec. Pracimantoro, Kabupaten Wonogiri, Jawa Tengah 57664', 'https://maps.app.goo.gl/rdHVKSi9odHqxoNQA', 'Goa Putri Kencana adalah goa alam yang terletak di Desa Wonodadi, Kecamatan Pracimantoro, Kabupaten Wonogiri. Kompleks goa yang terletak sekitar 40 kilometer sebelah selatan Wonogiri ini mencakup kawasan seluas 3,5 Hektare. Kawasan ini berada sekitar 250 m di atas permukaan laut.\r\n	Jarak lokasi Goa putri Kencana dari pusat kota Wonogiri dapat ditempuh ± 45 menit dengan menggunakan berbagai kendaraan darat. Perjalanan dapat dilakukan dengan menggunakan sepeda motor, bus pariwisata, angkutan umum, dan sebagainya \r\nWisatawan tidak perlu mengeluarkan uang banyak untuk dapat menikmati keindahan alam pada Goa Putri Kencana. karena dengan Rp. 2000.- maka kita sudah mendapatkan tiket masuknya. Goa ini pun dapat dinikmati setiap hari mulai pukul 09.00 sampai sore pukul 17.00 WIB\r\n', '[\"1720195211_bbcaf0aecddb25c402b5.png\",\"1720195211_1ea774f2e252da5759bf.jpg\"]', NULL, 4.4, '2024-07-05 15:58:31', '2024-07-17 14:20:00', NULL),
('52889', 'Masjid Tiban', '[\"Wisata Sejarah\",\"Wisata Religi\"]', 0, '[\"Mushola\",\"Parkir\",\"Toilet\"]', 'Baturetno', 'Wonokerso, Sendangrejo, Kec. Baturetno, Kabupaten Wonogiri, Jawa Tengah', 'https://g.co/kgs/e3LeQ5z', 'Kabupaten Wonogiri menyimpan situs sejarah berwujud masjid di Dusun Tekil Kulon RT 001/RW 005, Sendangrejo, Baturetno. Lokasinya 35 km-40 km dari pusat kota Wonogiri. Masjid Tiban Wonokerso namanya.\r\n\r\nMasjid itu diyakini dibangun wali dan lebih dulu dari pada Masjid Agung Demak. Bahkan, masjid kuno itu disebut sebagai maket atau model awal Masjid Agung Demak. Berdasarkan penelusurandari berbagai sumber, Masjid Wonokerso diperkirakan dibangun 1400-an.\r\n\r\nSesepuh dusun setempat, Dakrun, 90, saat ditemui di masjid tersebut, Kamis (15/6/2017), mengatakan warga dusun tidak ada yang tahu secara pasti siapa yang membangun masjid itu dan kapan dibangun', '[\"1721534807_47e99565d68f0208da19.jpeg\",\"1721534807_e54e408c4babd6b438b5.jpeg\"]', NULL, 4.5, '2024-07-17 14:04:14', '2024-07-21 04:06:47', NULL),
('53074', 'Khayangan', '[\"Wisata Alam\",\"Wisata Sejarah\",\"Wisata Religi\"]', 5000, '[\"Parkir\",\"Toilet\",\"Gazebo\"]', 'Tirtomoyo', 'Sugihan, Dlepih, Kec. Tirtomoyo, Kabupaten Wonogiri, Jawa Tengah 57672', 'https://maps.app.goo.gl/YnD3NzxBFRfgZXR1A', 'Kahyangan terletak di Desa Dlepih, Kecamatan Tirtomoyo. Sekitar 40 kilometer arah tenggara Kota Wonogiri. Akses menuju ke sana begitu mudah. Bisa dilalui dengan kendaraan roda dua maupun empat. Dari pusat Kota Wonogiri membutuhkan waktu ± 1 (satu) jam. \r\nLetak obyek wisata tersebut dikelilingi bukit yang dibawahnya mengalir sungai. Keindahan Obyek wisata ini sangat pas sekali untuk melepaskan penat dan lelah sambil melihat pemandangan di sekitar obyek wisata ini dengan gemericik air sungai yang mengalir.\r\nObyek wisata ini juga digunakan sebagai sarana wisata spiritual. Terdapat sebuah goa yang terletak diatas Kedung, yang konon tempat ini merupakan  petilasan (bekas) bertapanya Panembahan Senopati Ing Ngalogo (Pendiri Kerajaan Mataram Islam). \r\n', '[\"1720196675_4a0413d0ba01a71b146a.png\"]', NULL, 4.5, '2024-07-05 16:24:35', '2024-08-19 01:43:49', NULL),
('59384', 'Pantai Sembukan', '[\"Wisata Alam\"]', 10000, '[\"Mushola\",\"Parkir\",\"Toilet\",\"Rumah Makan\",\"Gazebo\"]', 'Paranggupito', 'Paranggupito, Kabupaten Wonogiri, Jawa Tengah', 'https://maps.app.goo.gl/j7aVAvafJmqCaUEY6', 'Kabupaten Wonogiri merupakan satu-satunya Kabupaten/ kota di wilayah eks Karesidenan Surakarta yang memiliki pantai. Pantai Sembukan berada di Desa Paranggupito, Kecamatan Paranggupito, Kabupaten Wonogiri. Jarak pantai tersebut ± 60 km sebelah selatan dari pusat Kota Wonogiri atau sekitar 1,5 jam perjalanan darat dengan kondisi jalan yang cukup lumayan.. \r\nPerjalanan menuju Pantai Sembukan adalah perjalanan petualangan yang mengasyikkan, karena kita akan melewati berbagai pemandangan alam seperti hamparan bukit, sawah, ladang, dan hutan. Sedemikinan banyak bukit yang dilalui sehingga setiap habis melewati bukit pasti wisatawan akan mengira akan habis dan pantai kelihatan, tapi ternyata belum\r\n', '[\"1720195516_fc35520c5844f063a81a.jpg\",\"1720195516_9045cd348948b904bb80.jpg\",\"1720195516_c08136e52c697b158411.jpg\"]', NULL, 4.5, '2024-07-05 16:05:16', '2024-07-17 14:25:29', NULL),
('61940', 'Goa Resi', '[\"Wisata Alam\",\"Wisata Buatan\"]', 15000, '[\"Mushola\",\"Toilet\"]', 'Bulukerto', 'Jalan Goa Resi, Dusun Nglarangan, Conto, Bulukerto, Wonogiri Regency, Central Java 57697', 'https://maps.app.goo.gl/seQNaDvtAV8kTe8B9', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat soluta omnis, quam natus cumque assumenda ex temporibus earum accusamus ratione molestiae officia expedita dicta nostrum distinctio explicabo aliquid dolorem magni? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque laboriosam ut autem adipisci quisquam quis vitae veritatis, praesentium nisi ullam laudantium, assumenda esse ipsum ex delectus voluptatibus pariatur! Quae, quam.', '[\"1720194834_fedd76df14b0ef5bc542.png\"]', NULL, 4.6, '2024-06-24 04:43:36', '2024-07-17 14:27:07', NULL),
('85260', 'Pantai Nampu', '[\"Wisata Alam\"]', 5000, '[\"Parkir\",\"Toilet\",\"Mushola\",\"Rumah Makan\"]', 'Paranggupito', 'Gunturharjo, Paranggupito, Wonogiri, Jawa Tengah', 'https://maps.app.goo.gl/hMePiv33xarybtpd7', 'Pantai Nampu adalah objek wisata pantai yang berada di pesisir selatan Kabupaten Wonogiri, Jawa Tengah. Sebuah Pantai yang terletak didusun Dringo, desa Kecamatan Paranggupito, Kabupaten Wonogiri ini menjadi destinasi wisata bagi warga setempat maupun mancanegara', '[\"1721537109_8221e49da6c2f9f3fe2a.png\"]', NULL, 4.3, '2024-07-17 13:47:40', '2024-07-21 04:45:09', NULL),
('99375', 'Museum Karst', '[\"Wisata Sejarah\"]', 10000, '[\"Mushola\",\"Parkir\",\"Toilet\"]', 'Pracimantoro', 'Mudal, Gebangharjo, Kec. Pracimantoro, Kabupaten Wonogiri, Jawa Tengah 57664', 'https://maps.app.goo.gl/tvXqFeTTvSdFbJY87', 'Museum Karst, yang terletak di Desa Gebangharjo, Kecamatan Pracimantoro, berjarak 35 km ke selatan dari pusat Kota Wonogiri dan dapat dicapai dalam 45 menit dengan kendaraan bermotor. Meskipun jauh dari pusat kota, akses ke museum ini baik, termasuk dari Pacitan (Jawa Timur) dan Wonosari (DI Yogyakarta). Kawasan museum seluas 24,6 hektar ini memiliki beberapa goa eksotis, seperti Goa Tembus, Goa Sodong, Goa Potro-Bunder, Goa Gilap, dan Goa Mrico.', '[\"1720195678_dcfc98edb2cea3be9066.jpg\"]', NULL, 4.3, '2024-07-05 16:07:58', '2024-07-17 14:31:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `fasilitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `fasilitas`) VALUES
(2, 'Mushola'),
(3, 'Parkir'),
(4, 'Toilet'),
(5, 'Rumah Makan'),
(6, 'Gazebo'),
(7, 'Pusat Oleh - Oleh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Wisata Alam'),
(2, 'Wisata Buatan'),
(3, 'Wisata Sejarah'),
(12, 'Wisata Religi'),
(13, 'Wisata Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kec` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kec`, `kecamatan`) VALUES
(3, 'Bulukerto'),
(4, 'Wonogiri'),
(5, 'Baturetno'),
(6, 'Batuwarno'),
(7, 'Eromoko'),
(8, 'Girimarto'),
(9, 'Giritontro'),
(10, 'Giriwoyo'),
(11, 'Jatipurno'),
(12, 'Jatiroto'),
(13, 'Jatisrono'),
(14, 'Karangtengah'),
(15, 'Kismantoro'),
(16, 'Manyaran'),
(17, 'Ngadirojo'),
(18, 'Nguntoronadi'),
(19, 'Paranggupito'),
(20, 'Puhpelem'),
(21, 'Purwantoro'),
(22, 'Selogiri'),
(23, 'Sidoharjo'),
(24, 'Slogohimo'),
(25, 'Tirtomoyo'),
(26, 'Wuryantoro'),
(27, 'Pracimantoro');

-- --------------------------------------------------------

--
-- Table structure for table `tb_review`
--

CREATE TABLE `tb_review` (
  `id_review` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  `rating` float NOT NULL,
  `komen` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_review`
--

INSERT INTO `tb_review` (`id_review`, `id_wisata`, `id_user`, `rating`, `komen`, `gambar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 21269, '107901893124937053781', 4.4, 'Ini merupakan review dari google maps', '1721225393_4de6ed95ca4533ce42a8.jpg', 'active', '2024-07-17 14:09:53', '2024-07-17 14:09:53', NULL),
(2, 24853, '107901893124937053781', 4.2, 'ini review dari google maps', '1721225635_cc8ad5b23b0b3a763f3f.jpg', 'active', '2024-07-17 14:13:55', '2024-07-17 14:13:55', NULL),
(3, 29059, '107901893124937053781', 4.4, 'ini rating google maps', '1721225834_53771682753a18b43937.jpg', 'active', '2024-07-17 14:17:14', '2024-07-17 14:17:14', NULL),
(4, 42712, '107901893124937053781', 4.2, 'rating google maps', '1721225911_5df679009405a0af3c27.jpg', 'active', '2024-07-17 14:18:31', '2024-07-17 14:18:31', NULL),
(5, 47359, '107901893124937053781', 4.4, 'rating google maps', '1721226000_3d688d8da3e16d8cd95e.png', 'active', '2024-07-17 14:20:00', '2024-07-17 14:20:00', NULL),
(6, 52889, '107901893124937053781', 4.5, 'rating google maps', '1721226089_ba7a7d109ad979e69c42.jpeg', 'active', '2024-07-17 14:21:29', '2024-07-17 14:21:29', NULL),
(7, 53074, '107901893124937053781', 4.6, 'rating google maps', '1721226223_89617286ea0f0c58c7a0.png', 'active', '2024-07-17 14:23:43', '2024-07-17 14:23:43', NULL),
(8, 59384, '107901893124937053781', 4.5, 'rating google maps', '1721226329_f393b47ec90532ca2d60.jpg', 'active', '2024-07-17 14:25:29', '2024-07-17 14:25:29', NULL),
(9, 61940, '107901893124937053781', 4.6, 'rating google maps', '1721226427_eeef3f43b652bcde3d19.png', 'active', '2024-07-17 14:27:07', '2024-07-17 14:27:07', NULL),
(10, 85260, '107901893124937053781', 4.3, 'rating google maps', '1721226591_55d29a2ab3553b509e8e.png', 'active', '2024-07-17 14:29:51', '2024-07-17 14:29:51', NULL),
(11, 99375, '107901893124937053781', 4.3, 'rating google maps', '1721226708_4cdee5a377e5086b7f8e.jpg', 'active', '2024-07-17 14:31:48', '2024-07-17 14:31:48', NULL),
(12, 21269, '113710168513695308402', 5, 'Jjj', '1722316336_86992df0eb083ab6d438.jpg', 'inactive', '2024-07-30 05:12:16', '2024-08-07 22:51:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_review_web`
--

CREATE TABLE `tb_review_web` (
  `id_review_web` int(11) NOT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_review_web`
--

INSERT INTO `tb_review_web` (`id_review_web`, `id_user`, `review`, `rating`) VALUES
(1, '113710168513695308402', 'Uuu', 5),
(2, '113710168513695308402', 'Bagus ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting_web`
--

CREATE TABLE `tb_setting_web` (
  `id_setting` int(11) NOT NULL,
  `web_name` varchar(255) DEFAULT NULL,
  `icon_logo` varchar(255) DEFAULT NULL,
  `logo_utama` varchar(255) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `u_ig` varchar(100) DEFAULT NULL,
  `ig` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `u_fb` varchar(100) DEFAULT NULL,
  `channel` varchar(100) DEFAULT NULL,
  `yt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_setting_web`
--

INSERT INTO `tb_setting_web` (`id_setting`, `web_name`, `icon_logo`, `logo_utama`, `deskripsi`, `email`, `telp`, `alamat`, `u_ig`, `ig`, `fb`, `u_fb`, `channel`, `yt`) VALUES
(1, 'DolanKuy', 'logo-icon.svg', '1719926161_e59e2fc85715f7bb658b.svg', 'DolanKuy merupakan webste rekomendasi wisata yang merekomendasikan wisata sesuai dengan kengininan para user. Website ini menyajikan berbagai jenis destinasi wisata di selurh wilayaj Kab. Wonogiri. Dengan menggunakan website ini user tidak perlu bingung lagi dalam mencari rekomendasi destinasi wisata yang sesuai dengan keinginan mereka.', '', '62', 'Jl. Pemuda I Jl. Sanggrahan No.5, Sabggrahan, Giripurwo, Kec. Wonogiri, Kabupaten Wonogiri, Jawa Tengah 57612', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_similarity`
--

CREATE TABLE `tb_similarity` (
  `id_sim` int(11) NOT NULL,
  `recommendation_Num` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `sim_kategori` float NOT NULL,
  `sim_harga_tiket` float NOT NULL,
  `sim_lokasi` float NOT NULL,
  `sim_rating` float NOT NULL,
  `sim_fasilitas` float NOT NULL,
  `similarity` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_similarity`
--

INSERT INTO `tb_similarity` (`id_sim`, `recommendation_Num`, `id_user`, `id_wisata`, `sim_kategori`, `sim_harga_tiket`, `sim_lokasi`, `sim_rating`, `sim_fasilitas`, `similarity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'unknown', 21269, 0.2, 0.17, 0, 0.182609, 0.2, 0.753, '2024-07-23 23:14:23', '2024-07-23 23:14:23', NULL),
(2, 1, 'unknown', 24853, 0, 0.03, 0.2, 0.191304, 0.2, 0.621, '2024-07-23 23:14:23', '2024-07-23 23:14:23', NULL),
(3, 1, 'unknown', 29059, 0, 0.08, 0, 0.182609, 0.2, 0.463, '2024-07-23 23:14:23', '2024-07-23 23:14:23', NULL),
(4, 1, 'unknown', 42712, 0, 0.03, 0, 0.191304, 0.2, 0.421, '2024-07-23 23:14:23', '2024-07-23 23:14:23', NULL),
(5, 1, 'unknown', 47359, 0.2, 0.18, 0, 0.182609, 0.2, 0.763, '2024-07-23 23:14:23', '2024-07-23 23:14:23', NULL),
(6, 1, 'unknown', 52889, 0.2, 0.17, 0, 0.178261, 0.2, 0.748, '2024-07-23 23:14:23', '2024-07-23 23:14:23', NULL),
(7, 1, 'unknown', 53074, 0.2, 0.18, 0, 0.173913, 0.2, 0.754, '2024-07-23 23:14:23', '2024-07-23 23:14:23', NULL),
(8, 1, 'unknown', 59384, 0, 0.13, 0, 0.178261, 0.2, 0.508, '2024-07-23 23:14:23', '2024-07-23 23:14:23', NULL),
(9, 1, 'unknown', 61940, 0, 0.08, 0, 0.173913, 0.2, 0.454, '2024-07-23 23:14:23', '2024-07-23 23:14:23', NULL),
(10, 1, 'unknown', 85260, 0, 0.18, 0, 0.186957, 0.2, 0.567, '2024-07-23 23:14:23', '2024-07-23 23:14:23', NULL),
(11, 1, 'unknown', 99375, 0.2, 0.13, 0, 0.186957, 0.2, 0.717, '2024-07-23 23:14:23', '2024-07-23 23:14:23', NULL),
(12, 2, 'unknown', 21269, 0, 0.12, 0, 0.13913, 0.2, 0.459, '2024-07-24 07:38:42', '2024-07-24 07:38:42', NULL),
(13, 2, 'unknown', 24853, 0, 0.08, 0.2, 0.147826, 0.2, 0.628, '2024-07-24 07:38:42', '2024-07-24 07:38:42', NULL),
(14, 2, 'unknown', 29059, 0, 0.13, 0, 0.13913, 0.2, 0.469, '2024-07-24 07:38:42', '2024-07-24 07:38:42', NULL),
(15, 2, 'unknown', 42712, 0, 0.08, 0, 0.147826, 0.2, 0.428, '2024-07-24 07:38:42', '2024-07-24 07:38:42', NULL),
(16, 2, 'unknown', 47359, 0, 0.17, 0, 0.13913, 0.2, 0.509, '2024-07-24 07:38:42', '2024-07-24 07:38:42', NULL),
(17, 2, 'unknown', 52889, 0, 0.12, 0, 0.134783, 0.2, 0.455, '2024-07-24 07:38:42', '2024-07-24 07:38:42', NULL),
(18, 2, 'unknown', 53074, 0, 0.17, 0, 0.130435, 0.2, 0.5, '2024-07-24 07:38:42', '2024-07-24 07:38:42', NULL),
(19, 2, 'unknown', 59384, 0, 0.18, 0, 0.134783, 0.2, 0.515, '2024-07-24 07:38:42', '2024-07-24 07:38:42', NULL),
(20, 2, 'unknown', 61940, 0, 0.13, 0, 0.130435, 0.2, 0.46, '2024-07-24 07:38:42', '2024-07-24 07:38:42', NULL),
(21, 2, 'unknown', 85260, 0, 0.17, 0, 0.143478, 0.2, 0.513, '2024-07-24 07:38:42', '2024-07-24 07:38:42', NULL),
(22, 2, 'unknown', 99375, 0, 0.18, 0, 0.143478, 0.2, 0.523, '2024-07-24 07:38:42', '2024-07-24 07:38:42', NULL),
(23, 3, 'unknown', 21269, 0, 0.12, 0, 0.173913, 0.2, 0.494, '2024-07-24 07:38:59', '2024-07-24 07:38:59', NULL),
(24, 3, 'unknown', 24853, 0, 0.08, 0.2, 0.165217, 0.2, 0.645, '2024-07-24 07:38:59', '2024-07-24 07:38:59', NULL),
(25, 3, 'unknown', 29059, 0, 0.13, 0, 0.173913, 0.2, 0.504, '2024-07-24 07:38:59', '2024-07-24 07:38:59', NULL),
(26, 3, 'unknown', 42712, 0, 0.08, 0, 0.165217, 0.2, 0.445, '2024-07-24 07:38:59', '2024-07-24 07:38:59', NULL),
(27, 3, 'unknown', 47359, 0, 0.17, 0, 0.173913, 0.2, 0.544, '2024-07-24 07:38:59', '2024-07-24 07:38:59', NULL),
(28, 3, 'unknown', 52889, 0, 0.12, 0, 0.178261, 0.2, 0.498, '2024-07-24 07:38:59', '2024-07-24 07:38:59', NULL),
(29, 3, 'unknown', 53074, 0, 0.17, 0, 0.182609, 0.2, 0.553, '2024-07-24 07:38:59', '2024-07-24 07:38:59', NULL),
(30, 3, 'unknown', 59384, 0, 0.18, 0, 0.178261, 0.2, 0.558, '2024-07-24 07:38:59', '2024-07-24 07:38:59', NULL),
(31, 3, 'unknown', 61940, 0, 0.13, 0, 0.182609, 0.2, 0.513, '2024-07-24 07:38:59', '2024-07-24 07:38:59', NULL),
(32, 3, 'unknown', 85260, 0, 0.17, 0, 0.169565, 0.2, 0.54, '2024-07-24 07:38:59', '2024-07-24 07:38:59', NULL),
(33, 3, 'unknown', 99375, 0, 0.18, 0, 0.169565, 0.2, 0.55, '2024-07-24 07:38:59', '2024-07-24 07:38:59', NULL),
(34, 4, 'unknown', 21269, 0, 0.12, 0, 0.13913, 0.2, 0.459, '2024-07-24 07:39:14', '2024-07-24 07:39:14', NULL),
(35, 4, 'unknown', 24853, 0, 0.08, 0.2, 0.147826, 0.2, 0.628, '2024-07-24 07:39:14', '2024-07-24 07:39:14', NULL),
(36, 4, 'unknown', 29059, 0, 0.13, 0, 0.13913, 0.2, 0.469, '2024-07-24 07:39:14', '2024-07-24 07:39:14', NULL),
(37, 4, 'unknown', 42712, 0, 0.08, 0, 0.147826, 0.2, 0.428, '2024-07-24 07:39:14', '2024-07-24 07:39:14', NULL),
(38, 4, 'unknown', 47359, 0, 0.17, 0, 0.13913, 0.2, 0.509, '2024-07-24 07:39:14', '2024-07-24 07:39:14', NULL),
(39, 4, 'unknown', 52889, 0, 0.12, 0, 0.134783, 0.2, 0.455, '2024-07-24 07:39:14', '2024-07-24 07:39:14', NULL),
(40, 4, 'unknown', 53074, 0, 0.17, 0, 0.130435, 0.2, 0.5, '2024-07-24 07:39:14', '2024-07-24 07:39:14', NULL),
(41, 4, 'unknown', 59384, 0, 0.18, 0, 0.134783, 0.2, 0.515, '2024-07-24 07:39:14', '2024-07-24 07:39:14', NULL),
(42, 4, 'unknown', 61940, 0, 0.13, 0, 0.130435, 0.2, 0.46, '2024-07-24 07:39:14', '2024-07-24 07:39:14', NULL),
(43, 4, 'unknown', 85260, 0, 0.17, 0, 0.143478, 0.2, 0.513, '2024-07-24 07:39:14', '2024-07-24 07:39:14', NULL),
(44, 4, 'unknown', 99375, 0, 0.18, 0, 0.143478, 0.2, 0.523, '2024-07-24 07:39:14', '2024-07-24 07:39:14', NULL),
(45, 5, 'unknown', 21269, 0, 0.12, 0, 0.182609, 0.2, 0.503, '2024-07-24 07:39:22', '2024-07-24 07:39:22', NULL),
(46, 5, 'unknown', 24853, 0, 0.08, 0.2, 0.191304, 0.2, 0.671, '2024-07-24 07:39:22', '2024-07-24 07:39:22', NULL),
(47, 5, 'unknown', 29059, 0, 0.13, 0, 0.182609, 0.2, 0.513, '2024-07-24 07:39:22', '2024-07-24 07:39:22', NULL),
(48, 5, 'unknown', 42712, 0, 0.08, 0, 0.191304, 0.2, 0.471, '2024-07-24 07:39:22', '2024-07-24 07:39:22', NULL),
(49, 5, 'unknown', 47359, 0, 0.17, 0, 0.182609, 0.2, 0.553, '2024-07-24 07:39:22', '2024-07-24 07:39:22', NULL),
(50, 5, 'unknown', 52889, 0, 0.12, 0, 0.178261, 0.2, 0.498, '2024-07-24 07:39:22', '2024-07-24 07:39:22', NULL),
(51, 5, 'unknown', 53074, 0, 0.17, 0, 0.173913, 0.2, 0.544, '2024-07-24 07:39:22', '2024-07-24 07:39:22', NULL),
(52, 5, 'unknown', 59384, 0, 0.18, 0, 0.178261, 0.2, 0.558, '2024-07-24 07:39:22', '2024-07-24 07:39:22', NULL),
(53, 5, 'unknown', 61940, 0, 0.13, 0, 0.173913, 0.2, 0.504, '2024-07-24 07:39:22', '2024-07-24 07:39:22', NULL),
(54, 5, 'unknown', 85260, 0, 0.17, 0, 0.186957, 0.2, 0.557, '2024-07-24 07:39:22', '2024-07-24 07:39:22', NULL),
(55, 5, 'unknown', 99375, 0, 0.18, 0, 0.186957, 0.2, 0.567, '2024-07-24 07:39:22', '2024-07-24 07:39:22', NULL),
(56, 6, 'unknown', 21269, 0, 0.15, 0, 0.182609, 0.2, 0.533, '2024-07-24 07:39:31', '2024-07-24 07:39:31', NULL),
(57, 6, 'unknown', 24853, 0, 0.05, 0.2, 0.191304, 0.2, 0.641, '2024-07-24 07:39:31', '2024-07-24 07:39:31', NULL),
(58, 6, 'unknown', 29059, 0, 0.1, 0, 0.182609, 0.2, 0.483, '2024-07-24 07:39:31', '2024-07-24 07:39:31', NULL),
(59, 6, 'unknown', 42712, 0, 0.05, 0, 0.191304, 0.2, 0.441, '2024-07-24 07:39:31', '2024-07-24 07:39:31', NULL),
(60, 6, 'unknown', 47359, 0, 0.2, 0, 0.182609, 0.2, 0.583, '2024-07-24 07:39:31', '2024-07-24 07:39:31', NULL),
(61, 6, 'unknown', 52889, 0, 0.15, 0, 0.178261, 0.2, 0.528, '2024-07-24 07:39:31', '2024-07-24 07:39:31', NULL),
(62, 6, 'unknown', 53074, 0, 0.2, 0, 0.173913, 0.2, 0.574, '2024-07-24 07:39:31', '2024-07-24 07:39:31', NULL),
(63, 6, 'unknown', 59384, 0, 0.15, 0, 0.178261, 0.2, 0.528, '2024-07-24 07:39:31', '2024-07-24 07:39:31', NULL),
(64, 6, 'unknown', 61940, 0, 0.1, 0, 0.173913, 0.2, 0.474, '2024-07-24 07:39:31', '2024-07-24 07:39:31', NULL),
(65, 6, 'unknown', 85260, 0, 0.2, 0, 0.186957, 0.2, 0.587, '2024-07-24 07:39:31', '2024-07-24 07:39:31', NULL),
(66, 6, 'unknown', 99375, 0, 0.15, 0, 0.186957, 0.2, 0.537, '2024-07-24 07:39:31', '2024-07-24 07:39:31', NULL),
(67, 7, 'unknown', 21269, 0, 0.15, 0, 0.182609, 0.2, 0.533, '2024-07-24 07:39:41', '2024-07-24 07:39:41', NULL),
(68, 7, 'unknown', 24853, 0, 0.05, 0.2, 0.191304, 0.2, 0.641, '2024-07-24 07:39:41', '2024-07-24 07:39:41', NULL),
(69, 7, 'unknown', 29059, 0, 0.1, 0, 0.182609, 0.2, 0.483, '2024-07-24 07:39:41', '2024-07-24 07:39:41', NULL),
(70, 7, 'unknown', 42712, 0, 0.05, 0, 0.191304, 0.2, 0.441, '2024-07-24 07:39:41', '2024-07-24 07:39:41', NULL),
(71, 7, 'unknown', 47359, 0, 0.2, 0, 0.182609, 0.2, 0.583, '2024-07-24 07:39:41', '2024-07-24 07:39:41', NULL),
(72, 7, 'unknown', 52889, 0, 0.15, 0, 0.178261, 0.2, 0.528, '2024-07-24 07:39:41', '2024-07-24 07:39:41', NULL),
(73, 7, 'unknown', 53074, 0, 0.2, 0, 0.173913, 0.2, 0.574, '2024-07-24 07:39:41', '2024-07-24 07:39:41', NULL),
(74, 7, 'unknown', 59384, 0, 0.15, 0, 0.178261, 0.2, 0.528, '2024-07-24 07:39:41', '2024-07-24 07:39:41', NULL),
(75, 7, 'unknown', 61940, 0, 0.1, 0, 0.173913, 0.2, 0.474, '2024-07-24 07:39:41', '2024-07-24 07:39:41', NULL),
(76, 7, 'unknown', 85260, 0, 0.2, 0, 0.186957, 0.2, 0.587, '2024-07-24 07:39:41', '2024-07-24 07:39:41', NULL),
(77, 7, 'unknown', 99375, 0, 0.15, 0, 0.186957, 0.2, 0.537, '2024-07-24 07:39:41', '2024-07-24 07:39:41', NULL),
(78, 8, 'unknown', 21269, 0, 0.15, 0, 0.182609, 0.2, 0.533, '2024-07-24 07:40:00', '2024-07-24 07:40:00', NULL),
(79, 8, 'unknown', 24853, 0.2, 0.05, 0.2, 0.191304, 0.2, 0.841, '2024-07-24 07:40:00', '2024-07-24 07:40:00', NULL),
(80, 8, 'unknown', 29059, 0.2, 0.1, 0, 0.182609, 0.2, 0.683, '2024-07-24 07:40:00', '2024-07-24 07:40:00', NULL),
(81, 8, 'unknown', 42712, 0.2, 0.05, 0, 0.191304, 0.2, 0.641, '2024-07-24 07:40:00', '2024-07-24 07:40:00', NULL),
(82, 8, 'unknown', 47359, 0.2, 0.2, 0, 0.182609, 0.2, 0.783, '2024-07-24 07:40:00', '2024-07-24 07:40:00', NULL),
(83, 8, 'unknown', 52889, 0, 0.15, 0, 0.178261, 0.2, 0.528, '2024-07-24 07:40:00', '2024-07-24 07:40:00', NULL),
(84, 8, 'unknown', 53074, 0.2, 0.2, 0, 0.173913, 0.2, 0.774, '2024-07-24 07:40:00', '2024-07-24 07:40:00', NULL),
(85, 8, 'unknown', 59384, 0.2, 0.15, 0, 0.178261, 0.2, 0.728, '2024-07-24 07:40:00', '2024-07-24 07:40:00', NULL),
(86, 8, 'unknown', 61940, 0.2, 0.1, 0, 0.173913, 0.2, 0.674, '2024-07-24 07:40:00', '2024-07-24 07:40:00', NULL),
(87, 8, 'unknown', 85260, 0.2, 0.2, 0, 0.186957, 0.2, 0.787, '2024-07-24 07:40:00', '2024-07-24 07:40:00', NULL),
(88, 8, 'unknown', 99375, 0, 0.15, 0, 0.186957, 0.2, 0.537, '2024-07-24 07:40:00', '2024-07-24 07:40:00', NULL),
(89, 9, 'unknown', 21269, 0, 0.15, 0, 0.182609, 0.2, 0.533, '2024-07-24 07:40:14', '2024-07-24 07:40:14', NULL),
(90, 9, 'unknown', 24853, 0.2, 0.05, 0, 0.191304, 0.2, 0.641, '2024-07-24 07:40:14', '2024-07-24 07:40:14', NULL),
(91, 9, 'unknown', 29059, 0.2, 0.1, 0, 0.182609, 0.2, 0.683, '2024-07-24 07:40:14', '2024-07-24 07:40:14', NULL),
(92, 9, 'unknown', 42712, 0.2, 0.05, 0, 0.191304, 0.2, 0.641, '2024-07-24 07:40:14', '2024-07-24 07:40:14', NULL),
(93, 9, 'unknown', 47359, 0.2, 0.2, 0, 0.182609, 0.2, 0.783, '2024-07-24 07:40:14', '2024-07-24 07:40:14', NULL),
(94, 9, 'unknown', 52889, 0, 0.15, 0.2, 0.178261, 0.2, 0.728, '2024-07-24 07:40:14', '2024-07-24 07:40:14', NULL),
(95, 9, 'unknown', 53074, 0.2, 0.2, 0, 0.173913, 0.2, 0.774, '2024-07-24 07:40:14', '2024-07-24 07:40:14', NULL),
(96, 9, 'unknown', 59384, 0.2, 0.15, 0, 0.178261, 0.2, 0.728, '2024-07-24 07:40:14', '2024-07-24 07:40:14', NULL),
(97, 9, 'unknown', 61940, 0.2, 0.1, 0, 0.173913, 0.2, 0.674, '2024-07-24 07:40:14', '2024-07-24 07:40:14', NULL),
(98, 9, 'unknown', 85260, 0.2, 0.2, 0, 0.186957, 0.2, 0.787, '2024-07-24 07:40:14', '2024-07-24 07:40:14', NULL),
(99, 9, 'unknown', 99375, 0, 0.15, 0, 0.186957, 0.2, 0.537, '2024-07-24 07:40:14', '2024-07-24 07:40:14', NULL),
(100, 10, 'unknown', 21269, 0, 0.15, 0, 0.182609, 0.2, 0.533, '2024-07-24 07:40:33', '2024-07-24 07:40:33', NULL),
(101, 10, 'unknown', 24853, 0.2, 0.05, 0, 0.191304, 0.2, 0.641, '2024-07-24 07:40:33', '2024-07-24 07:40:33', NULL),
(102, 10, 'unknown', 29059, 0.2, 0.1, 0, 0.182609, 0.2, 0.683, '2024-07-24 07:40:33', '2024-07-24 07:40:33', NULL),
(103, 10, 'unknown', 42712, 0.2, 0.05, 0, 0.191304, 0.2, 0.641, '2024-07-24 07:40:33', '2024-07-24 07:40:33', NULL),
(104, 10, 'unknown', 47359, 0.2, 0.2, 0, 0.182609, 0.2, 0.783, '2024-07-24 07:40:33', '2024-07-24 07:40:33', NULL),
(105, 10, 'unknown', 52889, 0, 0.15, 0, 0.178261, 0.2, 0.528, '2024-07-24 07:40:33', '2024-07-24 07:40:33', NULL),
(106, 10, 'unknown', 53074, 0.2, 0.2, 0, 0.173913, 0.2, 0.774, '2024-07-24 07:40:33', '2024-07-24 07:40:33', NULL),
(107, 10, 'unknown', 59384, 0.2, 0.15, 0, 0.178261, 0.2, 0.728, '2024-07-24 07:40:33', '2024-07-24 07:40:33', NULL),
(108, 10, 'unknown', 61940, 0.2, 0.1, 0, 0.173913, 0.2, 0.674, '2024-07-24 07:40:33', '2024-07-24 07:40:33', NULL),
(109, 10, 'unknown', 85260, 0.2, 0.2, 0, 0.186957, 0.2, 0.787, '2024-07-24 07:40:33', '2024-07-24 07:40:33', NULL),
(110, 10, 'unknown', 99375, 0, 0.15, 0, 0.186957, 0.2, 0.537, '2024-07-24 07:40:33', '2024-07-24 07:40:33', NULL),
(111, 11, '107901893124937053781', 21269, 0, 0.15, 0, 0.13913, 0.2, 0.489, '2024-07-24 07:45:01', '2024-07-24 07:45:01', NULL),
(112, 11, '107901893124937053781', 24853, 0.2, 0.05, 0, 0.147826, 0.2, 0.598, '2024-07-24 07:45:01', '2024-07-24 07:45:01', NULL),
(113, 11, '107901893124937053781', 29059, 0.2, 0.1, 0, 0.13913, 0.2, 0.639, '2024-07-24 07:45:01', '2024-07-24 07:45:01', NULL),
(114, 11, '107901893124937053781', 42712, 0.2, 0.05, 0.2, 0.147826, 0.2, 0.798, '2024-07-24 07:45:01', '2024-07-24 07:45:01', NULL),
(115, 11, '107901893124937053781', 47359, 0.2, 0.2, 0, 0.13913, 0.2, 0.739, '2024-07-24 07:45:01', '2024-07-24 07:45:01', NULL),
(116, 11, '107901893124937053781', 52889, 0, 0.15, 0, 0.134783, 0.2, 0.485, '2024-07-24 07:45:01', '2024-07-24 07:45:01', NULL),
(117, 11, '107901893124937053781', 53074, 0.2, 0.2, 0, 0.130435, 0.2, 0.73, '2024-07-24 07:45:01', '2024-07-24 07:45:01', NULL),
(118, 11, '107901893124937053781', 59384, 0.2, 0.15, 0, 0.134783, 0.2, 0.685, '2024-07-24 07:45:01', '2024-07-24 07:45:01', NULL),
(119, 11, '107901893124937053781', 61940, 0.2, 0.1, 0.2, 0.130435, 0.2, 0.83, '2024-07-24 07:45:01', '2024-07-24 07:45:01', NULL),
(120, 11, '107901893124937053781', 85260, 0.2, 0.2, 0, 0.143478, 0.2, 0.743, '2024-07-24 07:45:01', '2024-07-24 07:45:01', NULL),
(121, 11, '107901893124937053781', 99375, 0, 0.15, 0, 0.143478, 0.2, 0.493, '2024-07-24 07:45:01', '2024-07-24 07:45:01', NULL),
(122, 12, 'unknown', 21269, 0, 0.1, 0, 0.182609, 0.2, 0.483, '2024-07-24 12:37:08', '2024-07-24 12:37:08', NULL),
(123, 12, 'unknown', 24853, 0.2, 0.1, 0.2, 0.191304, 0.2, 0.891, '2024-07-24 12:37:08', '2024-07-24 12:37:08', NULL),
(124, 12, 'unknown', 29059, 0, 0.15, 0, 0.182609, 0.2, 0.533, '2024-07-24 12:37:08', '2024-07-24 12:37:08', NULL),
(125, 12, 'unknown', 42712, 0.2, 0.1, 0, 0.191304, 0.2, 0.691, '2024-07-24 12:37:08', '2024-07-24 12:37:08', NULL),
(126, 12, 'unknown', 47359, 0, 0.15, 0, 0.182609, 0.2, 0.533, '2024-07-24 12:37:08', '2024-07-24 12:37:08', NULL),
(127, 12, 'unknown', 52889, 0, 0.1, 0, 0.178261, 0.2, 0.478, '2024-07-24 12:37:08', '2024-07-24 12:37:08', NULL),
(128, 12, 'unknown', 53074, 0, 0.15, 0, 0.173913, 0.2, 0.524, '2024-07-24 12:37:08', '2024-07-24 12:37:08', NULL),
(129, 12, 'unknown', 59384, 0, 0.2, 0, 0.178261, 0.2, 0.578, '2024-07-24 12:37:08', '2024-07-24 12:37:08', NULL),
(130, 12, 'unknown', 61940, 0.2, 0.15, 0, 0.173913, 0.2, 0.724, '2024-07-24 12:37:08', '2024-07-24 12:37:08', NULL),
(131, 12, 'unknown', 85260, 0, 0.15, 0, 0.186957, 0.2, 0.537, '2024-07-24 12:37:08', '2024-07-24 12:37:08', NULL),
(132, 12, 'unknown', 99375, 0, 0.2, 0, 0.186957, 0.2, 0.587, '2024-07-24 12:37:08', '2024-07-24 12:37:08', NULL),
(133, 13, '107901893124937053781', 21269, 0, 0.15, 0, 0.182609, 0.2, 0.533, '2024-07-24 12:49:09', '2024-07-24 12:49:09', NULL),
(134, 13, '107901893124937053781', 24853, 0, 0.05, 0.2, 0.191304, 0.2, 0.641, '2024-07-24 12:49:09', '2024-07-24 12:49:09', NULL),
(135, 13, '107901893124937053781', 29059, 0, 0.1, 0, 0.182609, 0.2, 0.483, '2024-07-24 12:49:09', '2024-07-24 12:49:09', NULL),
(136, 13, '107901893124937053781', 42712, 0, 0.05, 0, 0.191304, 0.2, 0.441, '2024-07-24 12:49:09', '2024-07-24 12:49:09', NULL),
(137, 13, '107901893124937053781', 47359, 0, 0.2, 0, 0.182609, 0.2, 0.583, '2024-07-24 12:49:09', '2024-07-24 12:49:09', NULL),
(138, 13, '107901893124937053781', 52889, 0, 0.15, 0, 0.178261, 0.2, 0.528, '2024-07-24 12:49:09', '2024-07-24 12:49:09', NULL),
(139, 13, '107901893124937053781', 53074, 0, 0.2, 0, 0.173913, 0.2, 0.574, '2024-07-24 12:49:09', '2024-07-24 12:49:09', NULL),
(140, 13, '107901893124937053781', 59384, 0, 0.15, 0, 0.178261, 0.2, 0.528, '2024-07-24 12:49:09', '2024-07-24 12:49:09', NULL),
(141, 13, '107901893124937053781', 61940, 0, 0.1, 0, 0.173913, 0.2, 0.474, '2024-07-24 12:49:09', '2024-07-24 12:49:09', NULL),
(142, 13, '107901893124937053781', 85260, 0, 0.2, 0, 0.186957, 0.2, 0.587, '2024-07-24 12:49:09', '2024-07-24 12:49:09', NULL),
(143, 13, '107901893124937053781', 99375, 0, 0.15, 0, 0.186957, 0.2, 0.537, '2024-07-24 12:49:09', '2024-07-24 12:49:09', NULL),
(144, 14, '107901893124937053781', 21269, 0.2, 0.15, 0, 0.182609, 0.2, 0.733, '2024-07-24 12:49:23', '2024-07-24 12:49:23', NULL),
(145, 14, '107901893124937053781', 24853, 0, 0.05, 0.2, 0.191304, 0.2, 0.641, '2024-07-24 12:49:23', '2024-07-24 12:49:23', NULL),
(146, 14, '107901893124937053781', 29059, 0, 0.1, 0, 0.182609, 0.2, 0.483, '2024-07-24 12:49:23', '2024-07-24 12:49:23', NULL),
(147, 14, '107901893124937053781', 42712, 0, 0.05, 0, 0.191304, 0.2, 0.441, '2024-07-24 12:49:23', '2024-07-24 12:49:23', NULL),
(148, 14, '107901893124937053781', 47359, 0.2, 0.2, 0, 0.182609, 0.2, 0.783, '2024-07-24 12:49:23', '2024-07-24 12:49:23', NULL),
(149, 14, '107901893124937053781', 52889, 0.2, 0.15, 0, 0.178261, 0.2, 0.728, '2024-07-24 12:49:23', '2024-07-24 12:49:23', NULL),
(150, 14, '107901893124937053781', 53074, 0.2, 0.2, 0, 0.173913, 0.2, 0.774, '2024-07-24 12:49:23', '2024-07-24 12:49:23', NULL),
(151, 14, '107901893124937053781', 59384, 0, 0.15, 0, 0.178261, 0.2, 0.528, '2024-07-24 12:49:23', '2024-07-24 12:49:23', NULL),
(152, 14, '107901893124937053781', 61940, 0, 0.1, 0, 0.173913, 0.2, 0.474, '2024-07-24 12:49:23', '2024-07-24 12:49:23', NULL),
(153, 14, '107901893124937053781', 85260, 0, 0.2, 0, 0.186957, 0.2, 0.587, '2024-07-24 12:49:23', '2024-07-24 12:49:23', NULL),
(154, 14, '107901893124937053781', 99375, 0.2, 0.15, 0, 0.186957, 0.2, 0.737, '2024-07-24 12:49:23', '2024-07-24 12:49:23', NULL),
(155, 15, '107901893124937053781', 21269, 0.2, 0.1, 0, 0.182609, 0.2, 0.683, '2024-07-24 12:53:18', '2024-07-24 12:53:18', NULL),
(156, 15, '107901893124937053781', 24853, 0, 0.1, 0, 0.191304, 0.2, 0.491, '2024-07-24 12:53:18', '2024-07-24 12:53:18', NULL),
(157, 15, '107901893124937053781', 29059, 0, 0.15, 0, 0.182609, 0.2, 0.533, '2024-07-24 12:53:18', '2024-07-24 12:53:18', NULL),
(158, 15, '107901893124937053781', 42712, 0, 0.1, 0.2, 0.191304, 0.2, 0.691, '2024-07-24 12:53:18', '2024-07-24 12:53:18', NULL),
(159, 15, '107901893124937053781', 47359, 0.2, 0.15, 0, 0.182609, 0.2, 0.733, '2024-07-24 12:53:18', '2024-07-24 12:53:18', NULL),
(160, 15, '107901893124937053781', 52889, 0.2, 0.1, 0, 0.178261, 0.2, 0.678, '2024-07-24 12:53:18', '2024-07-24 12:53:18', NULL),
(161, 15, '107901893124937053781', 53074, 0.2, 0.15, 0, 0.173913, 0.2, 0.724, '2024-07-24 12:53:18', '2024-07-24 12:53:18', NULL),
(162, 15, '107901893124937053781', 59384, 0, 0.2, 0, 0.178261, 0.2, 0.578, '2024-07-24 12:53:18', '2024-07-24 12:53:18', NULL),
(163, 15, '107901893124937053781', 61940, 0, 0.15, 0.2, 0.173913, 0.2, 0.724, '2024-07-24 12:53:18', '2024-07-24 12:53:18', NULL),
(164, 15, '107901893124937053781', 85260, 0, 0.15, 0, 0.186957, 0.2, 0.537, '2024-07-24 12:53:18', '2024-07-24 12:53:18', NULL),
(165, 15, '107901893124937053781', 99375, 0.2, 0.2, 0, 0.186957, 0.2, 0.787, '2024-07-24 12:53:18', '2024-07-24 12:53:18', NULL),
(166, 16, '107901893124937053781', 21269, 0.2, 0.1, 0, 0.182609, 0.2, 0.683, '2024-07-24 12:53:36', '2024-07-24 12:53:36', NULL),
(167, 16, '107901893124937053781', 24853, 0.2, 0.1, 0, 0.191304, 0.2, 0.691, '2024-07-24 12:53:36', '2024-07-24 12:53:36', NULL),
(168, 16, '107901893124937053781', 29059, 0.2, 0.15, 0, 0.182609, 0.2, 0.733, '2024-07-24 12:53:36', '2024-07-24 12:53:36', NULL),
(169, 16, '107901893124937053781', 42712, 0.2, 0.1, 0.2, 0.191304, 0.2, 0.891, '2024-07-24 12:53:36', '2024-07-24 12:53:36', NULL),
(170, 16, '107901893124937053781', 47359, 0.2, 0.15, 0, 0.182609, 0.2, 0.733, '2024-07-24 12:53:36', '2024-07-24 12:53:36', NULL),
(171, 16, '107901893124937053781', 52889, 0.2, 0.1, 0, 0.178261, 0.2, 0.678, '2024-07-24 12:53:36', '2024-07-24 12:53:36', NULL),
(172, 16, '107901893124937053781', 53074, 0.2, 0.15, 0, 0.173913, 0.2, 0.724, '2024-07-24 12:53:36', '2024-07-24 12:53:36', NULL),
(173, 16, '107901893124937053781', 59384, 0.2, 0.2, 0, 0.178261, 0.2, 0.778, '2024-07-24 12:53:36', '2024-07-24 12:53:36', NULL),
(174, 16, '107901893124937053781', 61940, 0.2, 0.15, 0.2, 0.173913, 0.2, 0.924, '2024-07-24 12:53:36', '2024-07-24 12:53:36', NULL),
(175, 16, '107901893124937053781', 85260, 0.2, 0.15, 0, 0.186957, 0.2, 0.737, '2024-07-24 12:53:36', '2024-07-24 12:53:36', NULL),
(176, 16, '107901893124937053781', 99375, 0.2, 0.2, 0, 0.186957, 0.2, 0.787, '2024-07-24 12:53:36', '2024-07-24 12:53:36', NULL),
(177, 17, '107901893124937053781', 21269, 0, 0.19, 0.2, 0.182609, 0.2, 0.773, '2024-07-24 13:06:29', '2024-07-24 13:06:29', NULL),
(178, 17, '107901893124937053781', 24853, 0.2, 0.01, 0, 0.191304, 0.2, 0.601, '2024-07-24 13:06:29', '2024-07-24 13:06:29', NULL),
(179, 17, '107901893124937053781', 29059, 0.2, 0.06, 0, 0.182609, 0.2, 0.643, '2024-07-24 13:06:29', '2024-07-24 13:06:29', NULL),
(180, 17, '107901893124937053781', 42712, 0.2, 0.01, 0, 0.191304, 0.2, 0.601, '2024-07-24 13:06:29', '2024-07-24 13:06:29', NULL),
(181, 17, '107901893124937053781', 47359, 0.2, 0.16, 0, 0.182609, 0.2, 0.743, '2024-07-24 13:06:29', '2024-07-24 13:06:29', NULL),
(182, 17, '107901893124937053781', 52889, 0.2, 0.19, 0, 0.178261, 0.2, 0.768, '2024-07-24 13:06:29', '2024-07-24 13:06:29', NULL),
(183, 17, '107901893124937053781', 53074, 0.2, 0.16, 0, 0.173913, 0.2, 0.734, '2024-07-24 13:06:29', '2024-07-24 13:06:29', NULL),
(184, 17, '107901893124937053781', 59384, 0.2, 0.11, 0, 0.178261, 0.2, 0.688, '2024-07-24 13:06:29', '2024-07-24 13:06:29', NULL),
(185, 17, '107901893124937053781', 61940, 0.2, 0.06, 0, 0.173913, 0.2, 0.634, '2024-07-24 13:06:29', '2024-07-24 13:06:29', NULL),
(186, 17, '107901893124937053781', 85260, 0.2, 0.16, 0, 0.186957, 0.2, 0.747, '2024-07-24 13:06:29', '2024-07-24 13:06:29', NULL),
(187, 17, '107901893124937053781', 99375, 0, 0.11, 0, 0.186957, 0.2, 0.497, '2024-07-24 13:06:29', '2024-07-24 13:06:29', NULL),
(188, 18, '107901893124937053781', 21269, 0, 0.12, 0, 0.13913, 0, 0.259, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(189, 18, '107901893124937053781', 24853, 0.2, 0.08, 0, 0.147826, 0, 0.428, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(190, 18, '107901893124937053781', 29059, 0.2, 0.13, 0, 0.13913, 0, 0.469, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(191, 18, '107901893124937053781', 42712, 0.2, 0.08, 0, 0.147826, 0, 0.428, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(192, 18, '107901893124937053781', 47359, 0.2, 0.17, 0, 0.13913, 0, 0.509, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(193, 18, '107901893124937053781', 52889, 0, 0.12, 0, 0.134783, 0, 0.255, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(194, 18, '107901893124937053781', 53074, 0.2, 0.17, 0, 0.130435, 0, 0.5, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(195, 18, '107901893124937053781', 59384, 0.2, 0.18, 0, 0.134783, 0, 0.515, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(196, 18, '107901893124937053781', 61940, 0.2, 0.13, 0, 0.130435, 0, 0.46, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(197, 18, '107901893124937053781', 85260, 0.2, 0.17, 0, 0.143478, 0, 0.513, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(198, 18, '107901893124937053781', 99375, 0, 0.18, 0, 0.143478, 0, 0.323, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(199, 19, '107901893124937053781', 21269, 0, 0.12, 0, 0.13913, 0, 0.259, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(200, 19, '107901893124937053781', 24853, 0.2, 0.08, 0, 0.147826, 0, 0.428, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(201, 19, '107901893124937053781', 29059, 0.2, 0.13, 0, 0.13913, 0, 0.469, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(202, 19, '107901893124937053781', 42712, 0.2, 0.08, 0, 0.147826, 0, 0.428, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(203, 19, '107901893124937053781', 47359, 0.2, 0.17, 0, 0.13913, 0, 0.509, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(204, 19, '107901893124937053781', 52889, 0, 0.12, 0, 0.134783, 0, 0.255, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(205, 19, '107901893124937053781', 53074, 0.2, 0.17, 0, 0.130435, 0, 0.5, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(206, 19, '107901893124937053781', 59384, 0.2, 0.18, 0, 0.134783, 0, 0.515, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(207, 19, '107901893124937053781', 61940, 0.2, 0.13, 0, 0.130435, 0, 0.46, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(208, 19, '107901893124937053781', 85260, 0.2, 0.17, 0, 0.143478, 0, 0.513, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(209, 19, '107901893124937053781', 99375, 0, 0.18, 0, 0.143478, 0, 0.323, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(210, 20, '107901893124937053781', 21269, 0, 0.12, 0, 0.13913, 0, 0.259, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(211, 20, '107901893124937053781', 24853, 0.2, 0.08, 0, 0.147826, 0, 0.428, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(212, 20, '107901893124937053781', 29059, 0.2, 0.13, 0, 0.13913, 0, 0.469, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(213, 20, '107901893124937053781', 42712, 0.2, 0.08, 0, 0.147826, 0, 0.428, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(214, 20, '107901893124937053781', 47359, 0.2, 0.17, 0, 0.13913, 0, 0.509, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(215, 20, '107901893124937053781', 52889, 0, 0.12, 0, 0.134783, 0, 0.255, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(216, 20, '107901893124937053781', 53074, 0.2, 0.17, 0, 0.130435, 0, 0.5, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(217, 20, '107901893124937053781', 59384, 0.2, 0.18, 0, 0.134783, 0, 0.515, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(218, 20, '107901893124937053781', 61940, 0.2, 0.13, 0, 0.130435, 0, 0.46, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(219, 20, '107901893124937053781', 85260, 0.2, 0.17, 0, 0.143478, 0, 0.513, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(220, 20, '107901893124937053781', 99375, 0, 0.18, 0, 0.143478, 0, 0.323, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(221, 21, '107901893124937053781', 21269, 0, 0.12, 0, 0.13913, 0, 0.259, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(222, 21, '107901893124937053781', 24853, 0.2, 0.08, 0, 0.147826, 0, 0.428, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(223, 21, '107901893124937053781', 29059, 0.2, 0.13, 0, 0.13913, 0, 0.469, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(224, 21, '107901893124937053781', 42712, 0.2, 0.08, 0, 0.147826, 0, 0.428, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(225, 21, '107901893124937053781', 47359, 0.2, 0.17, 0, 0.13913, 0, 0.509, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(226, 21, '107901893124937053781', 52889, 0, 0.12, 0, 0.134783, 0, 0.255, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(227, 21, '107901893124937053781', 53074, 0.2, 0.17, 0, 0.130435, 0, 0.5, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(228, 21, '107901893124937053781', 59384, 0.2, 0.18, 0, 0.134783, 0, 0.515, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(229, 21, '107901893124937053781', 61940, 0.2, 0.13, 0, 0.130435, 0, 0.46, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(230, 21, '107901893124937053781', 85260, 0.2, 0.17, 0, 0.143478, 0, 0.513, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(231, 21, '107901893124937053781', 99375, 0, 0.18, 0, 0.143478, 0, 0.323, '2024-07-24 13:07:39', '2024-07-24 13:07:39', NULL),
(232, 22, '107901893124937053781', 21269, 0, 0.1, 0, 0.13913, 0, 0.239, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(233, 22, '107901893124937053781', 24853, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(234, 22, '107901893124937053781', 29059, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(235, 22, '107901893124937053781', 42712, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(236, 22, '107901893124937053781', 47359, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(237, 22, '107901893124937053781', 52889, 0, 0.1, 0, 0.134783, 0, 0.235, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(238, 22, '107901893124937053781', 53074, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(239, 22, '107901893124937053781', 59384, 0.2, 0.2, 0, 0.134783, 0, 0.535, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(240, 22, '107901893124937053781', 61940, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(241, 22, '107901893124937053781', 85260, 0.2, 0.15, 0, 0.143478, 0, 0.493, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(242, 22, '107901893124937053781', 99375, 0, 0.2, 0, 0.143478, 0, 0.343, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(243, 23, '107901893124937053781', 21269, 0, 0.1, 0, 0.13913, 0, 0.239, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(244, 23, '107901893124937053781', 24853, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(245, 23, '107901893124937053781', 29059, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(246, 23, '107901893124937053781', 42712, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(247, 23, '107901893124937053781', 47359, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(248, 23, '107901893124937053781', 52889, 0, 0.1, 0, 0.134783, 0, 0.235, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(249, 23, '107901893124937053781', 53074, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(250, 23, '107901893124937053781', 59384, 0.2, 0.2, 0, 0.134783, 0, 0.535, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(251, 23, '107901893124937053781', 61940, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(252, 23, '107901893124937053781', 85260, 0.2, 0.15, 0, 0.143478, 0, 0.493, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(253, 23, '107901893124937053781', 99375, 0, 0.2, 0, 0.143478, 0, 0.343, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(254, 24, '107901893124937053781', 21269, 0, 0.1, 0, 0.13913, 0, 0.239, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(255, 24, '107901893124937053781', 24853, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(256, 24, '107901893124937053781', 29059, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(257, 24, '107901893124937053781', 42712, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(258, 24, '107901893124937053781', 47359, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(259, 24, '107901893124937053781', 52889, 0, 0.1, 0, 0.134783, 0, 0.235, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(260, 24, '107901893124937053781', 53074, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(261, 24, '107901893124937053781', 59384, 0.2, 0.2, 0, 0.134783, 0, 0.535, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(262, 24, '107901893124937053781', 61940, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(263, 24, '107901893124937053781', 85260, 0.2, 0.15, 0, 0.143478, 0, 0.493, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(264, 24, '107901893124937053781', 99375, 0, 0.2, 0, 0.143478, 0, 0.343, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(265, 25, '107901893124937053781', 21269, 0, 0.1, 0, 0.13913, 0, 0.239, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(266, 25, '107901893124937053781', 24853, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(267, 25, '107901893124937053781', 29059, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(268, 25, '107901893124937053781', 42712, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(269, 25, '107901893124937053781', 47359, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(270, 25, '107901893124937053781', 52889, 0, 0.1, 0, 0.134783, 0, 0.235, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(271, 25, '107901893124937053781', 53074, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(272, 25, '107901893124937053781', 59384, 0.2, 0.2, 0, 0.134783, 0, 0.535, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(273, 25, '107901893124937053781', 61940, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(274, 25, '107901893124937053781', 85260, 0.2, 0.15, 0, 0.143478, 0, 0.493, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(275, 25, '107901893124937053781', 99375, 0, 0.2, 0, 0.143478, 0, 0.343, '2024-07-24 13:07:51', '2024-07-24 13:07:51', NULL),
(276, 26, '107901893124937053781', 21269, 0, 0.1, 0, 0.13913, 0, 0.239, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(277, 26, '107901893124937053781', 24853, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(278, 26, '107901893124937053781', 29059, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(279, 26, '107901893124937053781', 42712, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(280, 26, '107901893124937053781', 47359, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(281, 26, '107901893124937053781', 52889, 0, 0.1, 0, 0.134783, 0, 0.235, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(282, 26, '107901893124937053781', 53074, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(283, 26, '107901893124937053781', 59384, 0.2, 0.2, 0, 0.134783, 0, 0.535, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(284, 26, '107901893124937053781', 61940, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(285, 26, '107901893124937053781', 85260, 0.2, 0.15, 0, 0.143478, 0, 0.493, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(286, 26, '107901893124937053781', 99375, 0, 0.2, 0, 0.143478, 0, 0.343, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(287, 27, '107901893124937053781', 21269, 0, 0.1, 0, 0.13913, 0, 0.239, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(288, 27, '107901893124937053781', 24853, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(289, 27, '107901893124937053781', 29059, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(290, 27, '107901893124937053781', 42712, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(291, 27, '107901893124937053781', 47359, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(292, 27, '107901893124937053781', 52889, 0, 0.1, 0, 0.134783, 0, 0.235, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(293, 27, '107901893124937053781', 53074, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(294, 27, '107901893124937053781', 59384, 0.2, 0.2, 0, 0.134783, 0, 0.535, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(295, 27, '107901893124937053781', 61940, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(296, 27, '107901893124937053781', 85260, 0.2, 0.15, 0, 0.143478, 0, 0.493, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(297, 27, '107901893124937053781', 99375, 0, 0.2, 0, 0.143478, 0, 0.343, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(298, 28, '107901893124937053781', 21269, 0, 0.1, 0, 0.13913, 0, 0.239, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(299, 28, '107901893124937053781', 24853, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(300, 28, '107901893124937053781', 29059, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(301, 28, '107901893124937053781', 42712, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(302, 28, '107901893124937053781', 47359, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(303, 28, '107901893124937053781', 52889, 0, 0.1, 0, 0.134783, 0, 0.235, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(304, 28, '107901893124937053781', 53074, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(305, 28, '107901893124937053781', 59384, 0.2, 0.2, 0, 0.134783, 0, 0.535, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(306, 28, '107901893124937053781', 61940, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(307, 28, '107901893124937053781', 85260, 0.2, 0.15, 0, 0.143478, 0, 0.493, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(308, 28, '107901893124937053781', 99375, 0, 0.2, 0, 0.143478, 0, 0.343, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(309, 29, '107901893124937053781', 21269, 0, 0.1, 0, 0.13913, 0, 0.239, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(310, 29, '107901893124937053781', 24853, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(311, 29, '107901893124937053781', 29059, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(312, 29, '107901893124937053781', 42712, 0.2, 0.1, 0, 0.147826, 0, 0.448, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(313, 29, '107901893124937053781', 47359, 0.2, 0.15, 0, 0.13913, 0, 0.489, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(314, 29, '107901893124937053781', 52889, 0, 0.1, 0, 0.134783, 0, 0.235, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(315, 29, '107901893124937053781', 53074, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(316, 29, '107901893124937053781', 59384, 0.2, 0.2, 0, 0.134783, 0, 0.535, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(317, 29, '107901893124937053781', 61940, 0.2, 0.15, 0, 0.130435, 0, 0.48, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(318, 29, '107901893124937053781', 85260, 0.2, 0.15, 0, 0.143478, 0, 0.493, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(319, 29, '107901893124937053781', 99375, 0, 0.2, 0, 0.143478, 0, 0.343, '2024-07-24 13:07:52', '2024-07-24 13:07:52', NULL),
(320, 30, '107901893124937053781', 21269, 0.2, 0.12, 0, 0.0956522, 0, 0.416, '2024-07-24 13:08:02', '2024-07-24 13:08:02', NULL),
(321, 30, '107901893124937053781', 24853, 0.2, 0.08, 0, 0.104348, 0, 0.384, '2024-07-24 13:08:02', '2024-07-24 13:08:02', NULL),
(322, 30, '107901893124937053781', 29059, 0.2, 0.13, 0, 0.0956522, 0, 0.426, '2024-07-24 13:08:02', '2024-07-24 13:08:02', NULL),
(323, 30, '107901893124937053781', 42712, 0.2, 0.08, 0, 0.104348, 0, 0.384, '2024-07-24 13:08:02', '2024-07-24 13:08:02', NULL),
(324, 30, '107901893124937053781', 47359, 0.2, 0.17, 0, 0.0956522, 0, 0.466, '2024-07-24 13:08:02', '2024-07-24 13:08:02', NULL),
(325, 30, '107901893124937053781', 52889, 0.2, 0.12, 0, 0.0913043, 0, 0.411, '2024-07-24 13:08:02', '2024-07-24 13:08:02', NULL),
(326, 30, '107901893124937053781', 53074, 0.2, 0.17, 0, 0.0869565, 0, 0.457, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(327, 30, '107901893124937053781', 59384, 0.2, 0.18, 0, 0.0913043, 0, 0.471, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(328, 30, '107901893124937053781', 61940, 0.2, 0.13, 0, 0.0869565, 0, 0.417, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(329, 30, '107901893124937053781', 85260, 0.2, 0.17, 0, 0.1, 0, 0.47, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(330, 30, '107901893124937053781', 99375, 0.2, 0.18, 0, 0.1, 0, 0.48, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(331, 31, '107901893124937053781', 21269, 0.2, 0.12, 0, 0.0956522, 0, 0.416, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(332, 31, '107901893124937053781', 24853, 0.2, 0.08, 0, 0.104348, 0, 0.384, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(333, 31, '107901893124937053781', 29059, 0.2, 0.13, 0, 0.0956522, 0, 0.426, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(334, 31, '107901893124937053781', 42712, 0.2, 0.08, 0, 0.104348, 0, 0.384, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(335, 31, '107901893124937053781', 47359, 0.2, 0.17, 0, 0.0956522, 0, 0.466, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(336, 31, '107901893124937053781', 52889, 0.2, 0.12, 0, 0.0913043, 0, 0.411, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(337, 31, '107901893124937053781', 53074, 0.2, 0.17, 0, 0.0869565, 0, 0.457, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(338, 31, '107901893124937053781', 59384, 0.2, 0.18, 0, 0.0913043, 0, 0.471, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(339, 31, '107901893124937053781', 61940, 0.2, 0.13, 0, 0.0869565, 0, 0.417, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(340, 31, '107901893124937053781', 85260, 0.2, 0.17, 0, 0.1, 0, 0.47, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(341, 31, '107901893124937053781', 99375, 0.2, 0.18, 0, 0.1, 0, 0.48, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(342, 32, '107901893124937053781', 21269, 0.2, 0.12, 0, 0.0956522, 0, 0.416, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(343, 32, '107901893124937053781', 24853, 0.2, 0.08, 0, 0.104348, 0, 0.384, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(344, 32, '107901893124937053781', 29059, 0.2, 0.13, 0, 0.0956522, 0, 0.426, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(345, 32, '107901893124937053781', 42712, 0.2, 0.08, 0, 0.104348, 0, 0.384, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(346, 32, '107901893124937053781', 47359, 0.2, 0.17, 0, 0.0956522, 0, 0.466, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(347, 32, '107901893124937053781', 52889, 0.2, 0.12, 0, 0.0913043, 0, 0.411, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(348, 32, '107901893124937053781', 53074, 0.2, 0.17, 0, 0.0869565, 0, 0.457, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(349, 32, '107901893124937053781', 59384, 0.2, 0.18, 0, 0.0913043, 0, 0.471, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(350, 32, '107901893124937053781', 61940, 0.2, 0.13, 0, 0.0869565, 0, 0.417, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(351, 32, '107901893124937053781', 85260, 0.2, 0.17, 0, 0.1, 0, 0.47, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(352, 32, '107901893124937053781', 99375, 0.2, 0.18, 0, 0.1, 0, 0.48, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(353, 33, '107901893124937053781', 21269, 0.2, 0.12, 0, 0.0956522, 0, 0.416, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(354, 33, '107901893124937053781', 24853, 0.2, 0.08, 0, 0.104348, 0, 0.384, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(355, 33, '107901893124937053781', 29059, 0.2, 0.13, 0, 0.0956522, 0, 0.426, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(356, 33, '107901893124937053781', 42712, 0.2, 0.08, 0, 0.104348, 0, 0.384, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(357, 33, '107901893124937053781', 47359, 0.2, 0.17, 0, 0.0956522, 0, 0.466, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(358, 33, '107901893124937053781', 52889, 0.2, 0.12, 0, 0.0913043, 0, 0.411, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(359, 33, '107901893124937053781', 53074, 0.2, 0.17, 0, 0.0869565, 0, 0.457, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(360, 33, '107901893124937053781', 59384, 0.2, 0.18, 0, 0.0913043, 0, 0.471, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(361, 33, '107901893124937053781', 61940, 0.2, 0.13, 0, 0.0869565, 0, 0.417, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(362, 33, '107901893124937053781', 85260, 0.2, 0.17, 0, 0.1, 0, 0.47, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(363, 33, '107901893124937053781', 99375, 0.2, 0.18, 0, 0.1, 0, 0.48, '2024-07-24 13:08:03', '2024-07-24 13:08:03', NULL),
(364, 34, '107901893124937053781', 21269, 0, 0.15, 0, 0.117391, 0, 0.267, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(365, 34, '107901893124937053781', 24853, 0.2, 0.05, 0, 0.126087, 0, 0.376, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(366, 34, '107901893124937053781', 29059, 0.2, 0.1, 0, 0.117391, 0, 0.417, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(367, 34, '107901893124937053781', 42712, 0.2, 0.05, 0, 0.126087, 0, 0.376, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(368, 34, '107901893124937053781', 47359, 0.2, 0.2, 0, 0.117391, 0, 0.517, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(369, 34, '107901893124937053781', 52889, 0, 0.15, 0, 0.113043, 0, 0.263, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(370, 34, '107901893124937053781', 53074, 0.2, 0.2, 0, 0.108696, 0, 0.509, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(371, 34, '107901893124937053781', 59384, 0.2, 0.15, 0, 0.113043, 0, 0.463, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(372, 34, '107901893124937053781', 61940, 0.2, 0.1, 0, 0.108696, 0, 0.409, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(373, 34, '107901893124937053781', 85260, 0.2, 0.2, 0, 0.121739, 0, 0.522, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(374, 34, '107901893124937053781', 99375, 0, 0.15, 0, 0.121739, 0, 0.272, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(375, 35, '107901893124937053781', 21269, 0, 0.15, 0, 0.117391, 0, 0.267, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(376, 35, '107901893124937053781', 24853, 0.2, 0.05, 0, 0.126087, 0, 0.376, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(377, 35, '107901893124937053781', 29059, 0.2, 0.1, 0, 0.117391, 0, 0.417, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(378, 35, '107901893124937053781', 42712, 0.2, 0.05, 0, 0.126087, 0, 0.376, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(379, 35, '107901893124937053781', 47359, 0.2, 0.2, 0, 0.117391, 0, 0.517, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(380, 35, '107901893124937053781', 52889, 0, 0.15, 0, 0.113043, 0, 0.263, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(381, 35, '107901893124937053781', 53074, 0.2, 0.2, 0, 0.108696, 0, 0.509, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(382, 35, '107901893124937053781', 59384, 0.2, 0.15, 0, 0.113043, 0, 0.463, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(383, 35, '107901893124937053781', 61940, 0.2, 0.1, 0, 0.108696, 0, 0.409, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(384, 35, '107901893124937053781', 85260, 0.2, 0.2, 0, 0.121739, 0, 0.522, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(385, 35, '107901893124937053781', 99375, 0, 0.15, 0, 0.121739, 0, 0.272, '2024-07-24 13:15:11', '2024-07-24 13:15:11', NULL),
(386, 36, '107901893124937053781', 21269, 0, 0.15, 0, 0.117391, 0, 0.267, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(387, 36, '107901893124937053781', 24853, 0.2, 0.05, 0, 0.126087, 0, 0.376, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(388, 36, '107901893124937053781', 29059, 0.2, 0.1, 0, 0.117391, 0, 0.417, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(389, 36, '107901893124937053781', 42712, 0.2, 0.05, 0, 0.126087, 0, 0.376, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(390, 36, '107901893124937053781', 47359, 0.2, 0.2, 0, 0.117391, 0, 0.517, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(391, 36, '107901893124937053781', 52889, 0, 0.15, 0, 0.113043, 0, 0.263, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(392, 36, '107901893124937053781', 53074, 0.2, 0.2, 0, 0.108696, 0, 0.509, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(393, 36, '107901893124937053781', 59384, 0.2, 0.15, 0, 0.113043, 0, 0.463, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(394, 36, '107901893124937053781', 61940, 0.2, 0.1, 0, 0.108696, 0, 0.409, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(395, 36, '107901893124937053781', 85260, 0.2, 0.2, 0, 0.121739, 0, 0.522, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(396, 36, '107901893124937053781', 99375, 0, 0.15, 0, 0.121739, 0, 0.272, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(397, 37, '107901893124937053781', 21269, 0, 0.15, 0, 0.117391, 0, 0.267, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(398, 37, '107901893124937053781', 24853, 0.2, 0.05, 0, 0.126087, 0, 0.376, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(399, 37, '107901893124937053781', 29059, 0.2, 0.1, 0, 0.117391, 0, 0.417, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(400, 37, '107901893124937053781', 42712, 0.2, 0.05, 0, 0.126087, 0, 0.376, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(401, 37, '107901893124937053781', 47359, 0.2, 0.2, 0, 0.117391, 0, 0.517, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(402, 37, '107901893124937053781', 52889, 0, 0.15, 0, 0.113043, 0, 0.263, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(403, 37, '107901893124937053781', 53074, 0.2, 0.2, 0, 0.108696, 0, 0.509, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(404, 37, '107901893124937053781', 59384, 0.2, 0.15, 0, 0.113043, 0, 0.463, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(405, 37, '107901893124937053781', 61940, 0.2, 0.1, 0, 0.108696, 0, 0.409, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(406, 37, '107901893124937053781', 85260, 0.2, 0.2, 0, 0.121739, 0, 0.522, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(407, 37, '107901893124937053781', 99375, 0, 0.15, 0, 0.121739, 0, 0.272, '2024-07-24 13:15:12', '2024-07-24 13:15:12', NULL),
(408, 38, '107901893124937053781', 21269, 0, 0.12, 0, 0.13913, 0, 0.259, '2024-07-24 13:15:37', '2024-07-24 13:15:37', NULL);
INSERT INTO `tb_similarity` (`id_sim`, `recommendation_Num`, `id_user`, `id_wisata`, `sim_kategori`, `sim_harga_tiket`, `sim_lokasi`, `sim_rating`, `sim_fasilitas`, `similarity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(409, 38, '107901893124937053781', 24853, 0.2, 0.08, 0, 0.147826, 0, 0.428, '2024-07-24 13:15:37', '2024-07-24 13:15:37', NULL),
(410, 38, '107901893124937053781', 29059, 0.2, 0.13, 0, 0.13913, 0, 0.469, '2024-07-24 13:15:37', '2024-07-24 13:15:37', NULL),
(411, 38, '107901893124937053781', 42712, 0.2, 0.08, 0, 0.147826, 0, 0.428, '2024-07-24 13:15:37', '2024-07-24 13:15:37', NULL),
(412, 38, '107901893124937053781', 47359, 0.2, 0.17, 0, 0.13913, 0, 0.509, '2024-07-24 13:15:37', '2024-07-24 13:15:37', NULL),
(413, 38, '107901893124937053781', 52889, 0, 0.12, 0, 0.134783, 0, 0.255, '2024-07-24 13:15:37', '2024-07-24 13:15:37', NULL),
(414, 38, '107901893124937053781', 53074, 0.2, 0.17, 0, 0.130435, 0, 0.5, '2024-07-24 13:15:37', '2024-07-24 13:15:37', NULL),
(415, 38, '107901893124937053781', 59384, 0.2, 0.18, 0, 0.134783, 0, 0.515, '2024-07-24 13:15:37', '2024-07-24 13:15:37', NULL),
(416, 38, '107901893124937053781', 61940, 0.2, 0.13, 0, 0.130435, 0, 0.46, '2024-07-24 13:15:37', '2024-07-24 13:15:37', NULL),
(417, 38, '107901893124937053781', 85260, 0.2, 0.17, 0, 0.143478, 0, 0.513, '2024-07-24 13:15:37', '2024-07-24 13:15:37', NULL),
(418, 38, '107901893124937053781', 99375, 0, 0.18, 0, 0.143478, 0, 0.323, '2024-07-24 13:15:37', '2024-07-24 13:15:37', NULL),
(419, 39, 'unknown', 21269, 0.2, 0.15, 0, 0.195652, 0.2, 0.746, '2024-07-25 01:31:27', '2024-07-25 01:31:27', NULL),
(420, 39, 'unknown', 24853, 0.2, 0.05, 0, 0.186957, 0.2, 0.637, '2024-07-25 01:31:27', '2024-07-25 01:31:27', NULL),
(421, 39, 'unknown', 29059, 0.2, 0.1, 0, 0.195652, 0.2, 0.696, '2024-07-25 01:31:27', '2024-07-25 01:31:27', NULL),
(422, 39, 'unknown', 42712, 0.2, 0.05, 0.2, 0.186957, 0.2, 0.837, '2024-07-25 01:31:27', '2024-07-25 01:31:27', NULL),
(423, 39, 'unknown', 47359, 0.2, 0.2, 0, 0.195652, 0.2, 0.796, '2024-07-25 01:31:27', '2024-07-25 01:31:27', NULL),
(424, 39, 'unknown', 52889, 0.2, 0.15, 0, 0.2, 0.2, 0.75, '2024-07-25 01:31:27', '2024-07-25 01:31:27', NULL),
(425, 39, 'unknown', 53074, 0.2, 0.2, 0, 0.195652, 0.2, 0.796, '2024-07-25 01:31:27', '2024-07-25 01:31:27', NULL),
(426, 39, 'unknown', 59384, 0.2, 0.15, 0, 0.2, 0.2, 0.75, '2024-07-25 01:31:27', '2024-07-25 01:31:27', NULL),
(427, 39, 'unknown', 61940, 0.2, 0.1, 0.2, 0.195652, 0.2, 0.896, '2024-07-25 01:31:27', '2024-07-25 01:31:27', NULL),
(428, 39, 'unknown', 85260, 0.2, 0.2, 0, 0.191304, 0.2, 0.791, '2024-07-25 01:31:27', '2024-07-25 01:31:27', NULL),
(429, 39, 'unknown', 99375, 0.2, 0.15, 0, 0.191304, 0.2, 0.741, '2024-07-25 01:31:27', '2024-07-25 01:31:27', NULL),
(430, 40, 'unknown', 21269, 0.2, 0.15, 0.2, 0.195652, 0.2, 0.946, '2024-07-25 01:48:28', '2024-07-25 01:48:28', NULL),
(431, 41, 'unknown', 21269, 0.2, 0.15, 0, 0.195652, 0.2, 0.746, '2024-07-25 01:49:15', '2024-07-25 01:49:15', NULL),
(432, 41, 'unknown', 24853, 0.2, 0.05, 0.2, 0.186957, 0.2, 0.837, '2024-07-25 01:49:15', '2024-07-25 01:49:15', NULL),
(433, 41, 'unknown', 29059, 0.2, 0.1, 0, 0.195652, 0.2, 0.696, '2024-07-25 01:49:15', '2024-07-25 01:49:15', NULL),
(434, 41, 'unknown', 42712, 0.2, 0.05, 0, 0.186957, 0.2, 0.637, '2024-07-25 01:49:15', '2024-07-25 01:49:15', NULL),
(435, 41, 'unknown', 47359, 0.2, 0.2, 0, 0.195652, 0.2, 0.796, '2024-07-25 01:49:15', '2024-07-25 01:49:15', NULL),
(436, 41, 'unknown', 52889, 0.2, 0.15, 0, 0.2, 0.2, 0.75, '2024-07-25 01:49:15', '2024-07-25 01:49:15', NULL),
(437, 41, 'unknown', 53074, 0.2, 0.2, 0, 0.195652, 0.2, 0.796, '2024-07-25 01:49:15', '2024-07-25 01:49:15', NULL),
(438, 41, 'unknown', 59384, 0.2, 0.15, 0, 0.2, 0.2, 0.75, '2024-07-25 01:49:15', '2024-07-25 01:49:15', NULL),
(439, 41, 'unknown', 61940, 0.2, 0.1, 0, 0.195652, 0.2, 0.696, '2024-07-25 01:49:15', '2024-07-25 01:49:15', NULL),
(440, 41, 'unknown', 85260, 0.2, 0.2, 0, 0.191304, 0.2, 0.791, '2024-07-25 01:49:15', '2024-07-25 01:49:15', NULL),
(441, 41, 'unknown', 99375, 0.2, 0.15, 0, 0.191304, 0.2, 0.741, '2024-07-25 01:49:15', '2024-07-25 01:49:15', NULL),
(442, 42, '107901893124937053781', 21269, 0.2, 0.1, 0, 0.195652, 0.2, 0.696, '2024-07-25 01:51:42', '2024-07-25 01:51:42', NULL),
(443, 42, '107901893124937053781', 24853, 0, 0.1, 0, 0.186957, 0.2, 0.487, '2024-07-25 01:51:42', '2024-07-25 01:51:42', NULL),
(444, 42, '107901893124937053781', 29059, 0, 0.15, 0, 0.195652, 0.2, 0.546, '2024-07-25 01:51:42', '2024-07-25 01:51:42', NULL),
(445, 42, '107901893124937053781', 42712, 0, 0.1, 0.2, 0.186957, 0.2, 0.687, '2024-07-25 01:51:42', '2024-07-25 01:51:42', NULL),
(446, 42, '107901893124937053781', 47359, 0.2, 0.15, 0, 0.195652, 0.2, 0.746, '2024-07-25 01:51:42', '2024-07-25 01:51:42', NULL),
(447, 42, '107901893124937053781', 52889, 0.2, 0.1, 0, 0.2, 0.2, 0.7, '2024-07-25 01:51:42', '2024-07-25 01:51:42', NULL),
(448, 42, '107901893124937053781', 53074, 0.2, 0.15, 0, 0.195652, 0.2, 0.746, '2024-07-25 01:51:42', '2024-07-25 01:51:42', NULL),
(449, 42, '107901893124937053781', 59384, 0, 0.2, 0, 0.2, 0.2, 0.6, '2024-07-25 01:51:42', '2024-07-25 01:51:42', NULL),
(450, 42, '107901893124937053781', 61940, 0, 0.15, 0.2, 0.195652, 0.2, 0.746, '2024-07-25 01:51:42', '2024-07-25 01:51:42', NULL),
(451, 42, '107901893124937053781', 85260, 0, 0.15, 0, 0.191304, 0.2, 0.541, '2024-07-25 01:51:42', '2024-07-25 01:51:42', NULL),
(452, 42, '107901893124937053781', 99375, 0.2, 0.2, 0, 0.191304, 0.2, 0.791, '2024-07-25 01:51:42', '2024-07-25 01:51:42', NULL),
(453, 43, '118091384157007835113', 21269, 0, 0.15, 0, 0.191489, 0.2, 0.541, '2024-07-30 05:28:40', '2024-07-30 05:28:40', NULL),
(454, 43, '118091384157007835113', 24853, 0.2, 0.05, 0.2, 0.187234, 0.2, 0.837, '2024-07-30 05:28:40', '2024-07-30 05:28:40', NULL),
(455, 43, '118091384157007835113', 29059, 0.2, 0.1, 0, 0.195745, 0.2, 0.696, '2024-07-30 05:28:40', '2024-07-30 05:28:40', NULL),
(456, 43, '118091384157007835113', 42712, 0.2, 0.05, 0, 0.187234, 0.2, 0.637, '2024-07-30 05:28:40', '2024-07-30 05:28:40', NULL),
(457, 43, '118091384157007835113', 47359, 0.2, 0.2, 0, 0.195745, 0.2, 0.796, '2024-07-30 05:28:40', '2024-07-30 05:28:40', NULL),
(458, 43, '118091384157007835113', 52889, 0, 0.15, 0, 0.2, 0.2, 0.55, '2024-07-30 05:28:40', '2024-07-30 05:28:40', NULL),
(459, 43, '118091384157007835113', 53074, 0.2, 0.2, 0, 0.195745, 0.2, 0.796, '2024-07-30 05:28:40', '2024-07-30 05:28:40', NULL),
(460, 43, '118091384157007835113', 59384, 0.2, 0.15, 0, 0.2, 0.2, 0.75, '2024-07-30 05:28:40', '2024-07-30 05:28:40', NULL),
(461, 43, '118091384157007835113', 61940, 0.2, 0.1, 0, 0.195745, 0.2, 0.696, '2024-07-30 05:28:40', '2024-07-30 05:28:40', NULL),
(462, 43, '118091384157007835113', 85260, 0.2, 0.2, 0, 0.191489, 0.2, 0.791, '2024-07-30 05:28:40', '2024-07-30 05:28:40', NULL),
(463, 43, '118091384157007835113', 99375, 0, 0.15, 0, 0.191489, 0.2, 0.541, '2024-07-30 05:28:40', '2024-07-30 05:28:40', NULL),
(464, 44, 'unknown', 21269, 0, 0.1, 0, 0.117391, 0, 0.217, '2024-08-03 02:27:19', '2024-08-03 02:27:19', NULL),
(465, 44, 'unknown', 24853, 0.2, 0.1, 0, 0.126087, 0, 0.426, '2024-08-03 02:27:19', '2024-08-03 02:27:19', NULL),
(466, 44, 'unknown', 29059, 0.2, 0.15, 0, 0.117391, 0, 0.467, '2024-08-03 02:27:19', '2024-08-03 02:27:19', NULL),
(467, 44, 'unknown', 42712, 0.2, 0.1, 0.2, 0.126087, 0, 0.626, '2024-08-03 02:27:19', '2024-08-03 02:27:19', NULL),
(468, 44, 'unknown', 47359, 0.2, 0.15, 0, 0.117391, 0, 0.467, '2024-08-03 02:27:19', '2024-08-03 02:27:19', NULL),
(469, 44, 'unknown', 52889, 0, 0.1, 0, 0.113043, 0, 0.213, '2024-08-03 02:27:19', '2024-08-03 02:27:19', NULL),
(470, 44, 'unknown', 53074, 0.2, 0.15, 0, 0.108696, 0, 0.459, '2024-08-03 02:27:19', '2024-08-03 02:27:19', NULL),
(471, 44, 'unknown', 59384, 0.2, 0.2, 0, 0.113043, 0, 0.513, '2024-08-03 02:27:19', '2024-08-03 02:27:19', NULL),
(472, 44, 'unknown', 61940, 0.2, 0.15, 0.2, 0.108696, 0, 0.659, '2024-08-03 02:27:19', '2024-08-03 02:27:19', NULL),
(473, 44, 'unknown', 85260, 0.2, 0.15, 0, 0.121739, 0, 0.472, '2024-08-03 02:27:19', '2024-08-03 02:27:19', NULL),
(474, 44, 'unknown', 99375, 0, 0.2, 0, 0.121739, 0, 0.322, '2024-08-03 02:27:19', '2024-08-03 02:27:19', NULL),
(475, 45, 'c29d87b329a597d866f5', 21269, 0.2, 0.15, 0, 0.182609, 0.2, 0.733, '2024-08-05 14:44:55', '2024-08-05 14:44:55', NULL),
(476, 45, 'c29d87b329a597d866f5', 24853, 0, 0.05, 0.2, 0.191304, 0.2, 0.641, '2024-08-05 14:44:55', '2024-08-05 14:44:55', NULL),
(477, 45, 'c29d87b329a597d866f5', 29059, 0, 0.1, 0, 0.182609, 0.2, 0.483, '2024-08-05 14:44:55', '2024-08-05 14:44:55', NULL),
(478, 45, 'c29d87b329a597d866f5', 42712, 0, 0.05, 0, 0.191304, 0.2, 0.441, '2024-08-05 14:44:55', '2024-08-05 14:44:55', NULL),
(479, 45, 'c29d87b329a597d866f5', 47359, 0.2, 0.2, 0, 0.182609, 0.2, 0.783, '2024-08-05 14:44:55', '2024-08-05 14:44:55', NULL),
(480, 45, 'c29d87b329a597d866f5', 52889, 0.2, 0.15, 0, 0.178261, 0.2, 0.728, '2024-08-05 14:44:55', '2024-08-05 14:44:55', NULL),
(481, 45, 'c29d87b329a597d866f5', 53074, 0.2, 0.2, 0, 0.173913, 0.2, 0.774, '2024-08-05 14:44:55', '2024-08-05 14:44:55', NULL),
(482, 45, 'c29d87b329a597d866f5', 59384, 0, 0.15, 0, 0.178261, 0.2, 0.528, '2024-08-05 14:44:55', '2024-08-05 14:44:55', NULL),
(483, 45, 'c29d87b329a597d866f5', 61940, 0, 0.1, 0, 0.173913, 0.2, 0.474, '2024-08-05 14:44:55', '2024-08-05 14:44:55', NULL),
(484, 45, 'c29d87b329a597d866f5', 85260, 0, 0.2, 0, 0.186957, 0.2, 0.587, '2024-08-05 14:44:55', '2024-08-05 14:44:55', NULL),
(485, 45, 'c29d87b329a597d866f5', 99375, 0.2, 0.15, 0, 0.186957, 0.2, 0.737, '2024-08-05 14:44:55', '2024-08-05 14:44:55', NULL),
(486, 46, 'unknown', 21269, 0, 0.1, 0, 0.195652, 0, 0.296, '2024-08-08 03:53:37', '2024-08-08 03:53:37', NULL),
(487, 46, 'unknown', 24853, 0.2, 0.1, 0.2, 0.186957, 0.2, 0.887, '2024-08-08 03:53:37', '2024-08-08 03:53:37', NULL),
(488, 46, 'unknown', 29059, 0.2, 0.15, 0, 0.195652, 0.2, 0.746, '2024-08-08 03:53:37', '2024-08-08 03:53:37', NULL),
(489, 46, 'unknown', 42712, 0.2, 0.1, 0, 0.186957, 0.2, 0.687, '2024-08-08 03:53:37', '2024-08-08 03:53:37', NULL),
(490, 46, 'unknown', 47359, 0.2, 0.15, 0, 0.195652, 0, 0.546, '2024-08-08 03:53:37', '2024-08-08 03:53:37', NULL),
(491, 46, 'unknown', 52889, 0, 0.1, 0, 0.2, 0, 0.3, '2024-08-08 03:53:37', '2024-08-08 03:53:37', NULL),
(492, 46, 'unknown', 53074, 0.2, 0.15, 0, 0.195652, 0.2, 0.746, '2024-08-08 03:53:37', '2024-08-08 03:53:37', NULL),
(493, 46, 'unknown', 59384, 0.2, 0.2, 0, 0.2, 0.2, 0.8, '2024-08-08 03:53:37', '2024-08-08 03:53:37', NULL),
(494, 46, 'unknown', 61940, 0.2, 0.15, 0, 0.195652, 0, 0.546, '2024-08-08 03:53:37', '2024-08-08 03:53:37', NULL),
(495, 46, 'unknown', 85260, 0.2, 0.15, 0, 0.191304, 0, 0.541, '2024-08-08 03:53:37', '2024-08-08 03:53:37', NULL),
(496, 46, 'unknown', 99375, 0, 0.2, 0, 0.191304, 0, 0.391, '2024-08-08 03:53:37', '2024-08-08 03:53:37', NULL),
(497, 47, 'unknown', 21269, 0, 0.1, 0, 0.0521739, 0, 0.152, '2024-08-08 03:55:02', '2024-08-08 03:55:02', NULL),
(498, 47, 'unknown', 24853, 0.2, 0.1, 0.2, 0.0608696, 0.2, 0.761, '2024-08-08 03:55:02', '2024-08-08 03:55:02', NULL),
(499, 47, 'unknown', 29059, 0.2, 0.15, 0, 0.0521739, 0.2, 0.602, '2024-08-08 03:55:02', '2024-08-08 03:55:02', NULL),
(500, 47, 'unknown', 42712, 0.2, 0.1, 0, 0.0608696, 0.2, 0.561, '2024-08-08 03:55:02', '2024-08-08 03:55:02', NULL),
(501, 47, 'unknown', 47359, 0.2, 0.15, 0, 0.0521739, 0, 0.402, '2024-08-08 03:55:02', '2024-08-08 03:55:02', NULL),
(502, 47, 'unknown', 52889, 0, 0.1, 0, 0.0478261, 0, 0.148, '2024-08-08 03:55:02', '2024-08-08 03:55:02', NULL),
(503, 47, 'unknown', 53074, 0.2, 0.15, 0, 0.0434783, 0.2, 0.593, '2024-08-08 03:55:02', '2024-08-08 03:55:02', NULL),
(504, 47, 'unknown', 59384, 0.2, 0.2, 0, 0.0478261, 0.2, 0.648, '2024-08-08 03:55:02', '2024-08-08 03:55:02', NULL),
(505, 47, 'unknown', 61940, 0.2, 0.15, 0, 0.0434783, 0, 0.393, '2024-08-08 03:55:02', '2024-08-08 03:55:02', NULL),
(506, 47, 'unknown', 85260, 0.2, 0.15, 0, 0.0565217, 0, 0.407, '2024-08-08 03:55:02', '2024-08-08 03:55:02', NULL),
(507, 47, 'unknown', 99375, 0, 0.2, 0, 0.0565217, 0, 0.257, '2024-08-08 03:55:02', '2024-08-08 03:55:02', NULL),
(508, 48, 'unknown', 21269, 0, 0.1, 0, 0.0521739, 0, 0.152, '2024-08-08 03:56:12', '2024-08-08 03:56:12', NULL),
(509, 48, 'unknown', 24853, 0.2, 0.1, 0.2, 0.0608696, 0.2, 0.761, '2024-08-08 03:56:12', '2024-08-08 03:56:12', NULL),
(510, 48, 'unknown', 29059, 0, 0.15, 0, 0.0521739, 0.2, 0.402, '2024-08-08 03:56:12', '2024-08-08 03:56:12', NULL),
(511, 48, 'unknown', 42712, 0.2, 0.1, 0, 0.0608696, 0.2, 0.561, '2024-08-08 03:56:12', '2024-08-08 03:56:12', NULL),
(512, 48, 'unknown', 47359, 0, 0.15, 0, 0.0521739, 0, 0.202, '2024-08-08 03:56:12', '2024-08-08 03:56:12', NULL),
(513, 48, 'unknown', 52889, 0, 0.1, 0, 0.0478261, 0, 0.148, '2024-08-08 03:56:12', '2024-08-08 03:56:12', NULL),
(514, 48, 'unknown', 53074, 0, 0.15, 0, 0.0434783, 0.2, 0.393, '2024-08-08 03:56:12', '2024-08-08 03:56:12', NULL),
(515, 48, 'unknown', 59384, 0, 0.2, 0, 0.0478261, 0.2, 0.448, '2024-08-08 03:56:12', '2024-08-08 03:56:12', NULL),
(516, 48, 'unknown', 61940, 0.2, 0.15, 0, 0.0434783, 0, 0.393, '2024-08-08 03:56:12', '2024-08-08 03:56:12', NULL),
(517, 48, 'unknown', 85260, 0, 0.15, 0, 0.0565217, 0, 0.207, '2024-08-08 03:56:12', '2024-08-08 03:56:12', NULL),
(518, 48, 'unknown', 99375, 0, 0.2, 0, 0.0565217, 0, 0.257, '2024-08-08 03:56:12', '2024-08-08 03:56:12', NULL),
(519, 49, 'unknown', 21269, 0, 0.1, 0, 0.173913, 0, 0.274, '2024-08-08 03:59:28', '2024-08-08 03:59:28', NULL),
(520, 49, 'unknown', 24853, 0, 0.1, 0.2, 0.165217, 0.2, 0.665, '2024-08-08 03:59:28', '2024-08-08 03:59:28', NULL),
(521, 49, 'unknown', 29059, 0, 0.15, 0, 0.173913, 0.2, 0.524, '2024-08-08 03:59:28', '2024-08-08 03:59:28', NULL),
(522, 49, 'unknown', 42712, 0, 0.1, 0, 0.165217, 0.2, 0.465, '2024-08-08 03:59:28', '2024-08-08 03:59:28', NULL),
(523, 49, 'unknown', 47359, 0, 0.15, 0, 0.173913, 0, 0.324, '2024-08-08 03:59:28', '2024-08-08 03:59:28', NULL),
(524, 49, 'unknown', 52889, 0, 0.1, 0, 0.178261, 0, 0.278, '2024-08-08 03:59:28', '2024-08-08 03:59:28', NULL),
(525, 49, 'unknown', 53074, 0, 0.15, 0, 0.182609, 0.2, 0.533, '2024-08-08 03:59:28', '2024-08-08 03:59:28', NULL),
(526, 49, 'unknown', 59384, 0, 0.2, 0, 0.178261, 0.2, 0.578, '2024-08-08 03:59:28', '2024-08-08 03:59:28', NULL),
(527, 49, 'unknown', 61940, 0, 0.15, 0, 0.182609, 0, 0.333, '2024-08-08 03:59:28', '2024-08-08 03:59:28', NULL),
(528, 49, 'unknown', 85260, 0, 0.15, 0, 0.169565, 0, 0.32, '2024-08-08 03:59:28', '2024-08-08 03:59:28', NULL),
(529, 49, 'unknown', 99375, 0, 0.2, 0, 0.169565, 0, 0.37, '2024-08-08 03:59:28', '2024-08-08 03:59:28', NULL),
(530, 50, 'unknown', 21269, 0, 0.1, 0, 0.182609, 0, 0.283, '2024-08-08 03:59:43', '2024-08-08 03:59:43', NULL),
(531, 50, 'unknown', 24853, 0, 0.1, 0.2, 0.191304, 0.2, 0.691, '2024-08-08 03:59:43', '2024-08-08 03:59:43', NULL),
(532, 50, 'unknown', 29059, 0, 0.15, 0, 0.182609, 0.2, 0.533, '2024-08-08 03:59:43', '2024-08-08 03:59:43', NULL),
(533, 50, 'unknown', 42712, 0, 0.1, 0, 0.191304, 0.2, 0.491, '2024-08-08 03:59:43', '2024-08-08 03:59:43', NULL),
(534, 50, 'unknown', 47359, 0, 0.15, 0, 0.182609, 0, 0.333, '2024-08-08 03:59:43', '2024-08-08 03:59:43', NULL),
(535, 50, 'unknown', 52889, 0, 0.1, 0, 0.178261, 0, 0.278, '2024-08-08 03:59:43', '2024-08-08 03:59:43', NULL),
(536, 50, 'unknown', 53074, 0, 0.15, 0, 0.173913, 0.2, 0.524, '2024-08-08 03:59:43', '2024-08-08 03:59:43', NULL),
(537, 50, 'unknown', 59384, 0, 0.2, 0, 0.178261, 0.2, 0.578, '2024-08-08 03:59:43', '2024-08-08 03:59:43', NULL),
(538, 50, 'unknown', 61940, 0, 0.15, 0, 0.173913, 0, 0.324, '2024-08-08 03:59:43', '2024-08-08 03:59:43', NULL),
(539, 50, 'unknown', 85260, 0, 0.15, 0, 0.186957, 0, 0.337, '2024-08-08 03:59:43', '2024-08-08 03:59:43', NULL),
(540, 50, 'unknown', 99375, 0, 0.2, 0, 0.186957, 0, 0.387, '2024-08-08 03:59:43', '2024-08-08 03:59:43', NULL),
(541, 51, 'unknown', 21269, 0, 0.1, 0, 0.13913, 0, 0.239, '2024-08-08 03:59:53', '2024-08-08 03:59:53', NULL),
(542, 51, 'unknown', 24853, 0, 0.1, 0.2, 0.147826, 0.2, 0.648, '2024-08-08 03:59:53', '2024-08-08 03:59:53', NULL),
(543, 51, 'unknown', 29059, 0, 0.15, 0, 0.13913, 0.2, 0.489, '2024-08-08 03:59:53', '2024-08-08 03:59:53', NULL),
(544, 51, 'unknown', 42712, 0, 0.1, 0, 0.147826, 0.2, 0.448, '2024-08-08 03:59:53', '2024-08-08 03:59:53', NULL),
(545, 51, 'unknown', 47359, 0, 0.15, 0, 0.13913, 0, 0.289, '2024-08-08 03:59:53', '2024-08-08 03:59:53', NULL),
(546, 51, 'unknown', 52889, 0, 0.1, 0, 0.134783, 0, 0.235, '2024-08-08 03:59:53', '2024-08-08 03:59:53', NULL),
(547, 51, 'unknown', 53074, 0, 0.15, 0, 0.130435, 0.2, 0.48, '2024-08-08 03:59:53', '2024-08-08 03:59:53', NULL),
(548, 51, 'unknown', 59384, 0, 0.2, 0, 0.134783, 0.2, 0.535, '2024-08-08 03:59:53', '2024-08-08 03:59:53', NULL),
(549, 51, 'unknown', 61940, 0, 0.15, 0, 0.130435, 0, 0.28, '2024-08-08 03:59:53', '2024-08-08 03:59:53', NULL),
(550, 51, 'unknown', 85260, 0, 0.15, 0, 0.143478, 0, 0.293, '2024-08-08 03:59:53', '2024-08-08 03:59:53', NULL),
(551, 51, 'unknown', 99375, 0, 0.2, 0, 0.143478, 0, 0.343, '2024-08-08 03:59:53', '2024-08-08 03:59:53', NULL),
(552, 52, 'unknown', 21269, 0, 0.1, 0, 0.0956522, 0, 0.196, '2024-08-08 03:59:59', '2024-08-08 03:59:59', NULL),
(553, 52, 'unknown', 24853, 0, 0.1, 0.2, 0.104348, 0.2, 0.604, '2024-08-08 03:59:59', '2024-08-08 03:59:59', NULL),
(554, 52, 'unknown', 29059, 0, 0.15, 0, 0.0956522, 0.2, 0.446, '2024-08-08 03:59:59', '2024-08-08 03:59:59', NULL),
(555, 52, 'unknown', 42712, 0, 0.1, 0, 0.104348, 0.2, 0.404, '2024-08-08 03:59:59', '2024-08-08 03:59:59', NULL),
(556, 52, 'unknown', 47359, 0, 0.15, 0, 0.0956522, 0, 0.246, '2024-08-08 03:59:59', '2024-08-08 03:59:59', NULL),
(557, 52, 'unknown', 52889, 0, 0.1, 0, 0.0913043, 0, 0.191, '2024-08-08 03:59:59', '2024-08-08 03:59:59', NULL),
(558, 52, 'unknown', 53074, 0, 0.15, 0, 0.0869565, 0.2, 0.437, '2024-08-08 03:59:59', '2024-08-08 03:59:59', NULL),
(559, 52, 'unknown', 59384, 0, 0.2, 0, 0.0913043, 0.2, 0.491, '2024-08-08 03:59:59', '2024-08-08 03:59:59', NULL),
(560, 52, 'unknown', 61940, 0, 0.15, 0, 0.0869565, 0, 0.237, '2024-08-08 03:59:59', '2024-08-08 03:59:59', NULL),
(561, 52, 'unknown', 85260, 0, 0.15, 0, 0.1, 0, 0.25, '2024-08-08 03:59:59', '2024-08-08 03:59:59', NULL),
(562, 52, 'unknown', 99375, 0, 0.2, 0, 0.1, 0, 0.3, '2024-08-08 03:59:59', '2024-08-08 03:59:59', NULL),
(563, 53, 'unknown', 21269, 0, 0.1, 0, 0.0521739, 0, 0.152, '2024-08-08 04:00:20', '2024-08-08 04:00:20', NULL),
(564, 53, 'unknown', 24853, 0, 0.1, 0.2, 0.0608696, 0.2, 0.561, '2024-08-08 04:00:20', '2024-08-08 04:00:20', NULL),
(565, 53, 'unknown', 29059, 0, 0.15, 0, 0.0521739, 0.2, 0.402, '2024-08-08 04:00:20', '2024-08-08 04:00:20', NULL),
(566, 53, 'unknown', 42712, 0, 0.1, 0, 0.0608696, 0.2, 0.361, '2024-08-08 04:00:20', '2024-08-08 04:00:20', NULL),
(567, 53, 'unknown', 47359, 0, 0.15, 0, 0.0521739, 0, 0.202, '2024-08-08 04:00:20', '2024-08-08 04:00:20', NULL),
(568, 53, 'unknown', 52889, 0, 0.1, 0, 0.0478261, 0, 0.148, '2024-08-08 04:00:20', '2024-08-08 04:00:20', NULL),
(569, 53, 'unknown', 53074, 0, 0.15, 0, 0.0434783, 0.2, 0.393, '2024-08-08 04:00:20', '2024-08-08 04:00:20', NULL),
(570, 53, 'unknown', 59384, 0, 0.2, 0, 0.0478261, 0.2, 0.448, '2024-08-08 04:00:20', '2024-08-08 04:00:20', NULL),
(571, 53, 'unknown', 61940, 0, 0.15, 0, 0.0434783, 0, 0.193, '2024-08-08 04:00:20', '2024-08-08 04:00:20', NULL),
(572, 53, 'unknown', 85260, 0, 0.15, 0, 0.0565217, 0, 0.207, '2024-08-08 04:00:20', '2024-08-08 04:00:20', NULL),
(573, 53, 'unknown', 99375, 0, 0.2, 0, 0.0565217, 0, 0.257, '2024-08-08 04:00:20', '2024-08-08 04:00:20', NULL),
(574, 54, 'unknown', 21269, 0, 0.1, 0, 0.0521739, 0, 0.152, '2024-08-08 04:00:27', '2024-08-08 04:00:27', NULL),
(575, 54, 'unknown', 24853, 0.2, 0.1, 0.2, 0.0608696, 0.2, 0.761, '2024-08-08 04:00:27', '2024-08-08 04:00:27', NULL),
(576, 54, 'unknown', 29059, 0, 0.15, 0, 0.0521739, 0.2, 0.402, '2024-08-08 04:00:27', '2024-08-08 04:00:27', NULL),
(577, 54, 'unknown', 42712, 0.2, 0.1, 0, 0.0608696, 0.2, 0.561, '2024-08-08 04:00:27', '2024-08-08 04:00:27', NULL),
(578, 54, 'unknown', 47359, 0, 0.15, 0, 0.0521739, 0, 0.202, '2024-08-08 04:00:27', '2024-08-08 04:00:27', NULL),
(579, 54, 'unknown', 52889, 0, 0.1, 0, 0.0478261, 0, 0.148, '2024-08-08 04:00:27', '2024-08-08 04:00:27', NULL),
(580, 54, 'unknown', 53074, 0, 0.15, 0, 0.0434783, 0.2, 0.393, '2024-08-08 04:00:27', '2024-08-08 04:00:27', NULL),
(581, 54, 'unknown', 59384, 0, 0.2, 0, 0.0478261, 0.2, 0.448, '2024-08-08 04:00:27', '2024-08-08 04:00:27', NULL),
(582, 54, 'unknown', 61940, 0.2, 0.15, 0, 0.0434783, 0, 0.393, '2024-08-08 04:00:27', '2024-08-08 04:00:27', NULL),
(583, 54, 'unknown', 85260, 0, 0.15, 0, 0.0565217, 0, 0.207, '2024-08-08 04:00:27', '2024-08-08 04:00:27', NULL),
(584, 54, 'unknown', 99375, 0, 0.2, 0, 0.0565217, 0, 0.257, '2024-08-08 04:00:27', '2024-08-08 04:00:27', NULL),
(585, 55, 'unknown', 21269, 0, 0.1, 0, 0.0956522, 0, 0.196, '2024-08-08 04:00:47', '2024-08-08 04:00:47', NULL),
(586, 55, 'unknown', 24853, 0, 0.1, 0.2, 0.104348, 0.2, 0.604, '2024-08-08 04:00:47', '2024-08-08 04:00:47', NULL),
(587, 55, 'unknown', 29059, 0, 0.15, 0, 0.0956522, 0.2, 0.446, '2024-08-08 04:00:47', '2024-08-08 04:00:47', NULL),
(588, 55, 'unknown', 42712, 0, 0.1, 0, 0.104348, 0.2, 0.404, '2024-08-08 04:00:47', '2024-08-08 04:00:47', NULL),
(589, 55, 'unknown', 47359, 0, 0.15, 0, 0.0956522, 0, 0.246, '2024-08-08 04:00:47', '2024-08-08 04:00:47', NULL),
(590, 55, 'unknown', 52889, 0, 0.1, 0, 0.0913043, 0, 0.191, '2024-08-08 04:00:47', '2024-08-08 04:00:47', NULL),
(591, 55, 'unknown', 53074, 0, 0.15, 0, 0.0869565, 0.2, 0.437, '2024-08-08 04:00:47', '2024-08-08 04:00:47', NULL),
(592, 55, 'unknown', 59384, 0, 0.2, 0, 0.0913043, 0.2, 0.491, '2024-08-08 04:00:47', '2024-08-08 04:00:47', NULL),
(593, 55, 'unknown', 61940, 0, 0.15, 0, 0.0869565, 0, 0.237, '2024-08-08 04:00:47', '2024-08-08 04:00:47', NULL),
(594, 55, 'unknown', 85260, 0, 0.15, 0, 0.1, 0, 0.25, '2024-08-08 04:00:47', '2024-08-08 04:00:47', NULL),
(595, 55, 'unknown', 99375, 0, 0.2, 0, 0.1, 0, 0.3, '2024-08-08 04:00:47', '2024-08-08 04:00:47', NULL),
(596, 56, 'unknown', 21269, 0, 0.1, 0, 0.117391, 0, 0.217, '2024-08-08 04:04:27', '2024-08-08 04:04:27', NULL),
(597, 56, 'unknown', 24853, 0.2, 0.1, 0, 0.126087, 0, 0.426, '2024-08-08 04:04:27', '2024-08-08 04:04:27', NULL),
(598, 56, 'unknown', 29059, 0.2, 0.15, 0, 0.117391, 0, 0.467, '2024-08-08 04:04:27', '2024-08-08 04:04:27', NULL),
(599, 56, 'unknown', 42712, 0.2, 0.1, 0, 0.126087, 0, 0.426, '2024-08-08 04:04:27', '2024-08-08 04:04:27', NULL),
(600, 56, 'unknown', 47359, 0.2, 0.15, 0, 0.117391, 0, 0.467, '2024-08-08 04:04:27', '2024-08-08 04:04:27', NULL),
(601, 56, 'unknown', 52889, 0, 0.1, 0, 0.113043, 0, 0.213, '2024-08-08 04:04:27', '2024-08-08 04:04:27', NULL),
(602, 56, 'unknown', 53074, 0.2, 0.15, 0, 0.108696, 0, 0.459, '2024-08-08 04:04:27', '2024-08-08 04:04:27', NULL),
(603, 56, 'unknown', 59384, 0.2, 0.2, 0, 0.113043, 0, 0.513, '2024-08-08 04:04:27', '2024-08-08 04:04:27', NULL),
(604, 56, 'unknown', 61940, 0.2, 0.15, 0, 0.108696, 0, 0.459, '2024-08-08 04:04:27', '2024-08-08 04:04:27', NULL),
(605, 56, 'unknown', 85260, 0.2, 0.15, 0, 0.121739, 0, 0.472, '2024-08-08 04:04:27', '2024-08-08 04:04:27', NULL),
(606, 56, 'unknown', 99375, 0, 0.2, 0, 0.121739, 0, 0.322, '2024-08-08 04:04:27', '2024-08-08 04:04:27', NULL),
(607, 57, 'unknown', 21269, 0, 0.1, 0.2, 0.182609, 0.2, 0.683, '2024-08-09 08:07:11', '2024-08-09 08:07:11', NULL),
(608, 57, 'unknown', 24853, 0.2, 0.1, 0, 0.191304, 0.2, 0.691, '2024-08-09 08:07:11', '2024-08-09 08:07:11', NULL),
(609, 57, 'unknown', 29059, 0.2, 0.15, 0, 0.182609, 0.2, 0.733, '2024-08-09 08:07:11', '2024-08-09 08:07:11', NULL),
(610, 57, 'unknown', 42712, 0.2, 0.1, 0, 0.191304, 0.2, 0.691, '2024-08-09 08:07:11', '2024-08-09 08:07:11', NULL),
(611, 57, 'unknown', 47359, 0.2, 0.15, 0, 0.182609, 0.2, 0.733, '2024-08-09 08:07:11', '2024-08-09 08:07:11', NULL),
(612, 57, 'unknown', 52889, 0, 0.1, 0, 0.178261, 0.2, 0.478, '2024-08-09 08:07:11', '2024-08-09 08:07:11', NULL),
(613, 57, 'unknown', 53074, 0.2, 0.15, 0, 0.173913, 0.2, 0.724, '2024-08-09 08:07:11', '2024-08-09 08:07:11', NULL),
(614, 57, 'unknown', 59384, 0.2, 0.2, 0, 0.178261, 0.2, 0.778, '2024-08-09 08:07:11', '2024-08-09 08:07:11', NULL),
(615, 57, 'unknown', 61940, 0.2, 0.15, 0, 0.173913, 0.2, 0.724, '2024-08-09 08:07:11', '2024-08-09 08:07:11', NULL),
(616, 57, 'unknown', 85260, 0.2, 0.15, 0, 0.186957, 0.2, 0.737, '2024-08-09 08:07:11', '2024-08-09 08:07:11', NULL),
(617, 57, 'unknown', 99375, 0, 0.2, 0, 0.186957, 0.2, 0.587, '2024-08-09 08:07:11', '2024-08-09 08:07:11', NULL),
(618, 58, '118091384157007835113', 21269, 0, 0.1, 0, 0.173913, 0.2, 0.474, '2024-08-15 11:49:43', '2024-08-15 11:49:43', NULL),
(619, 58, '118091384157007835113', 24853, 0.2, 0.1, 0, 0.165217, 0.2, 0.665, '2024-08-15 11:49:43', '2024-08-15 11:49:43', NULL),
(620, 58, '118091384157007835113', 29059, 0.2, 0.15, 0, 0.173913, 0.2, 0.724, '2024-08-15 11:49:43', '2024-08-15 11:49:43', NULL),
(621, 58, '118091384157007835113', 42712, 0.2, 0.1, 0, 0.165217, 0.2, 0.665, '2024-08-15 11:49:43', '2024-08-15 11:49:43', NULL),
(622, 58, '118091384157007835113', 47359, 0.2, 0.15, 0, 0.173913, 0.2, 0.724, '2024-08-15 11:49:43', '2024-08-15 11:49:43', NULL),
(623, 58, '118091384157007835113', 52889, 0, 0.1, 0, 0.178261, 0.2, 0.478, '2024-08-15 11:49:43', '2024-08-15 11:49:43', NULL),
(624, 58, '118091384157007835113', 53074, 0.2, 0.15, 0, 0.182609, 0.2, 0.733, '2024-08-15 11:49:43', '2024-08-15 11:49:43', NULL),
(625, 58, '118091384157007835113', 59384, 0.2, 0.2, 0, 0.178261, 0.2, 0.778, '2024-08-15 11:49:43', '2024-08-15 11:49:43', NULL),
(626, 58, '118091384157007835113', 61940, 0.2, 0.15, 0, 0.182609, 0.2, 0.733, '2024-08-15 11:49:43', '2024-08-15 11:49:43', NULL),
(627, 58, '118091384157007835113', 85260, 0.2, 0.15, 0, 0.169565, 0.2, 0.72, '2024-08-15 11:49:43', '2024-08-15 11:49:43', NULL),
(628, 58, '118091384157007835113', 99375, 0, 0.2, 0, 0.169565, 0.2, 0.57, '2024-08-15 11:49:43', '2024-08-15 11:49:43', NULL),
(629, 59, '118091384157007835113', 21269, 0, 0.1, 0, 0.00869565, 0, 0.109, '2024-08-15 11:54:43', '2024-08-15 11:54:43', NULL),
(630, 59, '118091384157007835113', 24853, 0.2, 0.1, 0, 0.0173913, 0, 0.317, '2024-08-15 11:54:43', '2024-08-15 11:54:43', NULL),
(631, 59, '118091384157007835113', 29059, 0.2, 0.15, 0, 0.00869565, 0, 0.359, '2024-08-15 11:54:43', '2024-08-15 11:54:43', NULL),
(632, 59, '118091384157007835113', 42712, 0.2, 0.1, 0, 0.0173913, 0, 0.317, '2024-08-15 11:54:43', '2024-08-15 11:54:43', NULL),
(633, 59, '118091384157007835113', 47359, 0.2, 0.15, 0, 0.00869565, 0, 0.359, '2024-08-15 11:54:43', '2024-08-15 11:54:43', NULL),
(634, 59, '118091384157007835113', 52889, 0, 0.1, 0, 0.00434783, 0, 0.104, '2024-08-15 11:54:43', '2024-08-15 11:54:43', NULL),
(635, 59, '118091384157007835113', 53074, 0.2, 0.15, 0, 0, 0, 0.35, '2024-08-15 11:54:43', '2024-08-15 11:54:43', NULL),
(636, 59, '118091384157007835113', 59384, 0.2, 0.2, 0, 0.00434783, 0, 0.404, '2024-08-15 11:54:43', '2024-08-15 11:54:43', NULL),
(637, 59, '118091384157007835113', 61940, 0.2, 0.15, 0, 0, 0, 0.35, '2024-08-15 11:54:43', '2024-08-15 11:54:43', NULL),
(638, 59, '118091384157007835113', 85260, 0.2, 0.15, 0, 0.0130435, 0, 0.363, '2024-08-15 11:54:43', '2024-08-15 11:54:43', NULL),
(639, 59, '118091384157007835113', 99375, 0, 0.2, 0, 0.0130435, 0, 0.213, '2024-08-15 11:54:43', '2024-08-15 11:54:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_auth`
--
ALTER TABLE `tb_auth`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_destinasi_wisata`
--
ALTER TABLE `tb_destinasi_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indexes for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `tb_review_web`
--
ALTER TABLE `tb_review_web`
  ADD PRIMARY KEY (`id_review_web`);

--
-- Indexes for table `tb_setting_web`
--
ALTER TABLE `tb_setting_web`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tb_similarity`
--
ALTER TABLE `tb_similarity`
  ADD PRIMARY KEY (`id_sim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_review_web`
--
ALTER TABLE `tb_review_web`
  MODIFY `id_review_web` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_setting_web`
--
ALTER TABLE `tb_setting_web`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_similarity`
--
ALTER TABLE `tb_similarity`
  MODIFY `id_sim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=640;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
