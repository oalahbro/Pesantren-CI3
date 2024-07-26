-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: companyprofile
-- ------------------------------------------------------
-- Server version	5.7.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',1),(3,'oalahbro','8e5d9042dcbaf6d011a4891a800e6af9',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `halaman`
--

DROP TABLE IF EXISTS `halaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `halaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `kutipan` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `halaman`
--

LOCK TABLES `halaman` WRITE;
/*!40000 ALTER TABLE `halaman` DISABLE KEYS */;
INSERT INTO `halaman` VALUES (8,'Tetap Sehat Tetap Semangattttttt','Belajar Programming #dirumahaja','<p><img src=\"../assets/gambar/2b24d495052a8ce66358eb576b8912c8.jpg\" style=\"float:left; height:375px; margin-left:10px; margin-right:10px; width:500px\" />Belajar dari rumah telah menjadi bagian dari new normal warga Indonesia dalam menjalani kehidupan di tengah pandemi virus corona. Namun kendala infrastruktur dan teknologi membuat adanya kesenjangan pendidikan antar daerah.</p>\r\n\r\n<p>Sherly Lewerissa, warga di Ambon sudah hampir tiga bulan punya tanggung jawab tambahan di rumah.</p>\r\n\r\n<p>Selain harus mengajar dengan metode online sebagai dosen di Universitas Pattimura, ia juga harus mendampingi kedua anaknya belajar dari rumah.</p>\r\n\r\n<p>Putera sulungnya, Hillary de Queoljoe sekarang duduk di kelas 7 SMP Negeri 6, sementara adik Hillary, Marchella de Qoeljoe adalah murid kelas 1 Sekolah Citra Kasih, di Ambon, Maluku.</p>\r\n\r\n<p>Sherly mengaku ada perbedaan besar dalam aktivitas keduanya saat berlajar di rumah karena mereka berada di sekolah yang berbeda.</p>\r\n\r\n<p>&quot;Sekolah negeri tidak sama dengan sekolah swasta. Sekolah yang swasta lebih terorganisasi dan rapi,&quot; kata Sherly kepada Hellena Souisa dari ABC News.</p>\r\n\r\n<p>&quot;Adik setiap hari ada tugas, nanti hasilnya dikirim melalui Gmail. Tapi Kakak tugasnya [dari sekolah] tidak menentu, dalam satu minggu mungkin hanya ada 2 atau 3 tugas,&quot; tambahnya.</p>\r\n\r\n<p>Sekitar 4.000 kilometer dari kota Ambon, Vincent, seorang murid kelas 5 Sekolah Dasar di Desa Semudun, Kabupaten Mempawah, Provinsi Kalimantan Barat mengaku lebih suka belajar di sekolah.</p>\r\n\r\n<p>&quot;Saya lebih suka belajar [di sekolah] seperti biasa karena di rumah bosan tidak ada teman,&quot; ujarnya kepada Natasya Salim.</p>\r\n\r\n<p>Sejak akhir Maret lalu, Vincent dan adiknya, Wilson, yang duduk di kelas 3, belajar di rumah dengan menyaksikan tayangan TVRI, sesuai instruksi dari sekolah mereka yaitu SD Negeri 19 Semudun.</p>\r\n','2024-06-26 15:08:10'),(9,'Online Courses','You Will Need This','<p style=\"margin: 10px 0px; padding: 10px 0px; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><img src=\"../assets/gambar/84d9ee44e457ddef7f2c4f25dc8fa865.jpg\" style=\"width: 626px; float: left;\" class=\"note-float-left\"></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Pagi ini, Moreyna, 6 tahun, bangun pada pukul 7 pagi seperti biasanya. Setelah mandi dan sarapan, ia mengenakan seragam sekolahnya dan meminta ibunya untuk mengantarkannya ke sekolah dengan harapan semuanya sudah kembali normal.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Akan tetapi, Moreyna langsung kecewa begitu mengetahui bahwa sekolahnya masih ditutup karena pandemi.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Moreyna adalah murid di PAUD Kuncup Mekar di Jayapura. Sejak Pemerintah Papua memutuskan untuk menutup semua sekolah di provinsi ini pada bulan Maret 2020, ia belajar dari rumah bersama ibunya, Maria Morin.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Lebih dari 60 juta murid di Indonesia untuk sementara waktu tidak masuk sekolah karena COVID-19. Hal ini menimbulkan dampak yang belum pernah terjadi sebelumnya terhadap keberlangsungan pendidikan mereka.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">\"Berdasarkan survei dari orang tua dan murid, hambatan terbesar yang dihadapi murid saat belajar dari rumah adalah kurangnya akses internet dan perangkat elektronik yang mendukung,\" kata Spesialis Pendidikan UNICEF Nugroho Warman. “Orang tua juga harus fokus pada kewajiban lain untuk menghidupi keluarga mereka, yang akhirnya membuat mereka kurang memiliki waktu untuk membantu anak-anak mereka.\"</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><span style=\"color: rgb(0, 0, 0); font-family: var(--bs-font-sans-serif); font-size: 1rem;\">Untuk mengatasi hal ini, Pemerintah Indonesia menyiarkan program TV edukasi “Belajar dari Rumah” lewat TVRI untuk membantu anak-anak belajar dari rumah. Program tersebut, yang diselenggarakan oleh Kementerian Pendidikan dan Kebudayaan, menyiarkan acara dari Senin hingga Jumat untuk anak-anak usia sekolah dari prasekolah hingga Sekolah Menengah Atas yang mencakup berbagai bidang, termasuk program pengasuhan anak.</span></p>','2024-06-25 17:43:46'),(12,'APPLE IS','Just the Apple inc','<p><strong><img alt=\"\" src=\"http://localhost/PROJ/Pesantren-CI3/assets/gambar/b823fa6f70b4084e0358ddc9d3e454f4.jpg\" style=\"float:right; height:300px; width:400px\" />Apple Inc.</strong>&nbsp;is an American&nbsp;<a href=\"https://en.wikipedia.org/wiki/Multinational_corporation\">multinational corporation</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Technology_company\">technology company</a>&nbsp;headquartered in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Cupertino,_California\">Cupertino, California</a>, in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Silicon_Valley\">Silicon Valley</a>. It&nbsp;<a href=\"https://en.wikipedia.org/wiki/Apple_Inc._design_motifs\">designs</a>, develops, and sells&nbsp;<a href=\"https://en.wikipedia.org/wiki/Consumer_electronics\">consumer electronics</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Computer_software\">computer software</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Online_service\">online services</a>.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Timeline_of_Apple_Inc._products\">Devices</a>&nbsp;include the&nbsp;<a href=\"https://en.wikipedia.org/wiki/IPhone\">iPhone</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/IPad\">iPad</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mac_(computer)\">Mac</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Apple_Watch\">Apple Watch</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Vision_Pro\">Vision Pro</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Apple_TV\">Apple TV</a>;&nbsp;<a href=\"https://en.wikipedia.org/wiki/List_of_Apple_operating_systems\">operating systems</a>&nbsp;include&nbsp;<a href=\"https://en.wikipedia.org/wiki/IOS\">iOS</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/IPadOS\">iPadOS</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/MacOS\">macOS</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/WatchOS\">watchOS</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/TvOS\">tvOS</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/VisionOS\">visionOS</a>; and software applications and services include&nbsp;<a href=\"https://en.wikipedia.org/wiki/ITunes\">iTunes</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/ICloud\">iCloud</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Apple_Music\">Apple Music</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Apple_TV%2B\">Apple TV+</a>.</p>\r\n\r\n<p>Since 2011, Apple has been the world&#39;s&nbsp;<a href=\"https://en.wikipedia.org/wiki/List_of_public_corporations_by_market_capitalization\">largest company by market capitalization</a>&nbsp;except when&nbsp;<a href=\"https://en.wikipedia.org/wiki/Microsoft\">Microsoft</a>&nbsp;held the position between January and June 2024.<a href=\"https://en.wikipedia.org/wiki/Apple_Inc.#cite_note-6\">[6]</a><a href=\"https://en.wikipedia.org/wiki/Apple_Inc.#cite_note-:4-7\">[7]</a><a href=\"https://en.wikipedia.org/wiki/Apple_Inc.#cite_note-:5-8\">[8]</a>&nbsp;In 2022, Apple was the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Largest_technology_company_by_revenue\">largest technology company by revenue</a>, with&nbsp;US$394.3&nbsp;billion.<a href=\"https://en.wikipedia.org/wiki/Apple_Inc.#cite_note-9\">[9]</a>[<em><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Verifiability\">failed verification</a></em>]&nbsp;As of 2023, Apple was the fourth-largest&nbsp;<a href=\"https://en.wikipedia.org/wiki/Market_share_of_personal_computer_vendors\">personal computer vendor by unit sales</a>,<a href=\"https://en.wikipedia.org/wiki/Apple_Inc.#cite_note-2023_PC-10\">[10]</a>&nbsp;the&nbsp;<a href=\"https://en.wikipedia.org/wiki/List_of_largest_manufacturing_companies_by_revenue\">largest manufacturing company by revenue</a>, and the&nbsp;<a href=\"https://en.wikipedia.org/wiki/List_of_best-selling_mobile_phones#2023\">largest vendor of mobile phones</a>&nbsp;in the world.<a href=\"https://en.wikipedia.org/wiki/Apple_Inc.#cite_note-11\">[11]</a>&nbsp;It is one of the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Big_Tech\">Big Five</a>&nbsp;American&nbsp;<a href=\"https://en.wikipedia.org/wiki/Information_technology\">information technology</a>&nbsp;companies, alongside&nbsp;<a href=\"https://en.wikipedia.org/wiki/Alphabet_Inc.\">Alphabet</a>&nbsp;(the parent company of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Google\">Google</a>),&nbsp;<a href=\"https://en.wikipedia.org/wiki/Amazon_(company)\">Amazon</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Meta_Platforms\">Meta</a>&nbsp;(the parent company of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Facebook\">Facebook</a>), and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Microsoft\">Microsoft</a>.</p>\r\n\r\n<p>Apple was founded as Apple Computer Company on April 1, 1976, to produce and market&nbsp;<a href=\"https://en.wikipedia.org/wiki/Steve_Wozniak\">Steve Wozniak</a>&#39;s&nbsp;<a href=\"https://en.wikipedia.org/wiki/Apple_I\">Apple I</a>&nbsp;personal computer. The company was incorporated by Wozniak and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Steve_Jobs\">Steve Jobs</a>&nbsp;in 1977. Its second computer, the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Apple_II_(original)\">Apple II</a>, became a best seller as one of the first mass-produced&nbsp;<a href=\"https://en.wikipedia.org/wiki/Microcomputer\">microcomputers</a>. Apple introduced the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Apple_Lisa\">Lisa</a>&nbsp;in 1983 and the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Macintosh_128K\">Macintosh</a>&nbsp;in 1984, as some of the first computers to use a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Graphical_user_interface\">graphical user interface</a>&nbsp;and a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Computer_mouse\">mouse</a>. By 1985, the company&#39;s internal problems included the high cost of its products and power struggles between executives. That year Jobs left Apple to form&nbsp;<a href=\"https://en.wikipedia.org/wiki/NeXT,_Inc.\">NeXT, Inc.</a>, and Wozniak withdrew to other ventures. The market for personal computers expanded and evolved throughout the 1990s, and Apple lost considerable&nbsp;<a href=\"https://en.wikipedia.org/wiki/Market_share\">market share</a>&nbsp;to the lower-priced&nbsp;<a href=\"https://en.wikipedia.org/wiki/Wintel\">Wintel</a>&nbsp;duopoly of the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Microsoft_Windows\">Microsoft Windows</a>&nbsp;operating system on&nbsp;<a href=\"https://en.wikipedia.org/wiki/Intel\">Intel</a>-powered&nbsp;<a href=\"https://en.wikipedia.org/wiki/PC_clones\">PC clones</a>.</p>\r\n\r\n<p>In 1997, Apple was weeks away from bankruptcy. To resolve its failed&nbsp;<a href=\"https://en.wikipedia.org/wiki/Operating_system\">operating system</a>&nbsp;strategy and entice Jobs&#39;s return, it bought NeXT. Over the next decade, Jobs guided Apple back to profitability through several tactics including introducing the&nbsp;<a href=\"https://en.wikipedia.org/wiki/IMac\">iMac</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/IPod\">iPod</a>, iPhone, and iPad to critical acclaim, launching the &quot;<a href=\"https://en.wikipedia.org/wiki/Think_different\">Think different</a>&quot; campaign and other memorable advertising campaigns, opening the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Apple_Store\">Apple Store</a>&nbsp;retail chain, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/List_of_mergers_and_acquisitions_by_Apple\">acquiring numerous companies</a>&nbsp;to broaden its product portfolio. Jobs resigned in 2011 for health reasons, and died two months later. He was succeeded as CEO by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tim_Cook\">Tim Cook</a>.</p>\r\n\r\n<p>Apple has received criticism regarding&nbsp;<a href=\"https://en.wikipedia.org/wiki/Apple_supply_chain\">its contractors</a>&#39; labor practices, its environmental practices, and its business ethics, including&nbsp;<a href=\"https://en.wikipedia.org/wiki/Anti-competitive_practices\">anti-competitive practices</a>&nbsp;and materials sourcing. Nevertheless, it has&nbsp;<a href=\"https://en.wikipedia.org/wiki/Apple_community\">a large following</a>&nbsp;and a high level of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Brand_loyalty\">brand loyalty</a>. It has been consistently ranked as one of the world&#39;s&nbsp;<a href=\"https://en.wikipedia.org/wiki/List_of_most_valuable_brands\">most valuable brands</a>.</p>\r\n\r\n<p>Apple became the first publicly traded U.S. company to be&nbsp;<a href=\"https://en.wikipedia.org/wiki/Trillion-dollar_company\">valued at over $1&nbsp;trillion</a>&nbsp;in August 2018, $2&nbsp;trillion in August 2020, and at $3&nbsp;trillion in January 2022. As of June 2024, it was valued at just over $3.2&nbsp;trillion.<a href=\"https://en.wikipedia.org/wiki/Apple_Inc.#cite_note-:5-8\">[8]</a></p>\r\n','2024-07-22 16:11:14');
/*!40000 ALTER TABLE `halaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info`
--

LOCK TABLES `info` WRITE;
/*!40000 ALTER TABLE `info` DISABLE KEYS */;
INSERT INTO `info` VALUES (1,'Rumahrafif.','<p>lorem ipsum dolor sit amet</p>','2021-04-04 23:08:00'),(2,'About','<p>Kami menyediakan beragam pelatihan yang bisa teman-teman gunakan</p>','2021-04-04 23:08:22'),(3,'Contact','<p>Silakan kontak kami di nomor :&nbsp;</p>','2021-04-04 23:08:39'),(4,'Social','<p><b>Youtube : </b>Programming di Rumahrafif</p>','2021-04-04 23:09:03');
/*!40000 ALTER TABLE `info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL,
  `token_ganti_password` text,
  `tgl_isi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_panggilan` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `telp` varchar(45) NOT NULL,
  `pekerjaan` varchar(45) NOT NULL,
  `pendidikan_terakhir` varchar(45) NOT NULL,
  `jumlah_anggota_keluarga` varchar(45) NOT NULL,
  `nama_keluarga` varchar(45) NOT NULL,
  `status_keluarga` varchar(45) NOT NULL,
  `telp_keluarga` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (6,'epradana1111@gmail.com','eka pradana','0192023a7bbd73250516f069df18b500','23',NULL,'2024-05-28 14:44:30','ekaa','rt 1 rw 1','0895338331298','kuli','asd','11','11','ss','11'),(7,'epradana125@gmail.com','eka pradana','0192023a7bbd73250516f069df18b500','23',NULL,'2024-05-28 14:45:13','ekaa','rt 1 rw 1','0895338331298','kuli','asd','11','asdasd','','1'),(8,'epradana215@gmail.com','eka pradana','6bbe5eaa9b787ca6ae1730ef700eebe7','belum',NULL,'2024-05-29 12:36:18','ekaa1','rt 1 rw 1','0895338331298','ownera','asd','1','asdasd','','2'),(9,'sadadd5@gmail.com','eka pradana','','',NULL,'2024-07-14 16:47:28','ekaaaaa','rt 1 rw 1','62895338221298','ownera','2','3','asdasd','gatau','987654567890');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (2,'U GE EM','partners_1617496676_ugm.jpg','U GE EM','2021-04-04 00:37:56'),(3,'UMY','partners_1617496689_umy.png','<p>UMY</p>','2021-04-04 00:38:09'),(4,'UNY','partners_1617496703_uny.png','<p>UNY</p>','2021-04-04 00:38:23'),(5,'UAD','partners_1617496716_uad.png','<p>UAD</p>','2021-04-04 00:38:36');
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `total_bayar` decimal(9,0) NOT NULL,
  `status` int(11) NOT NULL,
  `bukti_bayar` varchar(45) NOT NULL,
  `notes` varchar(145) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (1,3,'2024-05-30 00:00:00',10000,2,'',''),(2,6,'2024-06-03 00:00:00',500000,1,'',''),(3,6,'2024-06-04 00:00:00',200000,1,'1717521121.png','0'),(4,2,'2024-06-28 00:00:00',2000000,1,'0','0'),(5,7,'2024-06-27 00:00:00',2000000,1,'0','0'),(6,8,'2024-06-07 00:00:00',2000000,1,'0','0');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rekening`
--

DROP TABLE IF EXISTS `rekening`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rekening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(45) NOT NULL,
  `nomor_rek` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekening`
--

LOCK TABLES `rekening` WRITE;
/*!40000 ALTER TABLE `rekening` DISABLE KEYS */;
/*!40000 ALTER TABLE `rekening` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutors`
--

DROP TABLE IF EXISTS `tutors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutors`
--

LOCK TABLES `tutors` WRITE;
/*!40000 ALTER TABLE `tutors` DISABLE KEYS */;
INSERT INTO `tutors` VALUES (2,'Budi Nihhhhhhhhhhhhh','tutors_1617208710_Budi_Rahardjo.jpg','<p>Budi Raharjo OKE[1] berprofesi sebagai Dosen, praktisi IT dan ahli keamanan informasi. Technopreneur, penulis, peneliti, pembicara, konsultan information security, blogger, rocker, itulah beberapa profesi yang dilakoni oleh Ir. Budi Rahardjo, MSc, PhD. Dengan gayanya yang khas, dosen Teknik Elektro ITB ini turut memberikan kontribusi untuk perkembangan dan kemajuan teknologi informasi di Indonesia.</p>\r\n','2022-04-02 22:21:41'),(3,'Eka Pradana Putra','tutors_1617209015_Romi_Satrio_Wahono.jpg','<p>Romi Satria Wahono. Lahir di Madiun, 2 Oktober 1974. Menyelesaikan pendidikan dasar dan menengah di SD Negeri Sompok 4 dan SMP Negeri 8 Semarang. Menamatkan SMA di SMA Taruna Nusantara, Magelang pada tahun 1993. Menempuh pendidikan S1 (B.Eng), S2 (M.Eng), dan S3 (Dr.Eng) (on-leave) di bidang Software Engineering di Department of Computer Science di Saitama University, Jepang pada tahun 1999, 2001, dan 2004. Juga menyelesaikan PhD di bidang Software Engineering dan Machine Learning di&nbsp; Faculty of Information and Computer Technology di Universiti Teknikal Malaysia Melaka pada tahun 2014. Mantan PNS dan peneliti Lembaga Ilmu Pengetahuan Indonesia (LIPI). Cisco certified instructor lulusan Nanyang Technological University (NTU), Singapore. Bidang minat penelitian adalah Software Engineering dan Machine Learning. Professional member dari asosiasi ilmiah IEEE Computer Society (90598687), ACM (6680333) dan PMI (2822015). Pendiri dan CEO dari PT Brainmatics Cipta Informatika, dan PT IlmuKomputerCom Braindevs Sistema, perusahaan yang bergerak di bidang pengembangan software, enterprise architecture, professional training dan certification center.</p>\r\n\r\n<p>Memiliki pengalaman sebagai pengembang enterprise architecture dan IT blueprint di berbagai instansi pemerintah dan swasta, seperti Komisi Pemberantasan Korupsi, Kementrian Keuangan, Universitas Sriwijaya, dsb. Pemegang sertifikasi industri dan certified trainer berhubungan dengan bidang enterprise architecture (TOGAF), business process modeling (BPMN), systems analysis and design (OMG UML), IT service management (ITIL), data mining (RapidMiner) dan software development (IEEE, Oracle).</p>\r\n\r\n<p>Aktif sebagai peneliti dan dosen, dimana ratusan publikasi penelitian dalam bentuk scientific paper, artikel, dan tutorial telah diterbitkan dalam berbagai proceedings conference, jurnal ilmiah, majalah, koran dan portal, bertaraf nasional maupun internasional. Selain menulis tetap di beberapa kolom majalah IT, juga menyempatkan diri untuk menulis bebas di situs blog pribadi di RomiSatriaWahono.Net. Terjun di dunia industri IT semenjak masa kuliah. Memulai karir sebagai software tester, programmer dan system analyst di beberapa software house dan game developer company di Jepang. Memiliki pengalaman sebagai engineer, konsultan, lecturer dan pembicara seminar, workshop, serta conference baik di Indonesia maupun Jepang.</p>\r\n\r\n<p>Saat ini sebagai reviewer di beberapa journal terindeks SCOPUS yang diterbitkan oleh Elsevier, ACTAPress dan NASA. Di Indonesia, reviewer dari journal Telkomnika dan journal lokal lain yang terakreditasi oleh Dikti. Selain itu memiliki pengalaman sebagai reviewer untuk program hibah penelitian yang diselenggarakan oleh Universitas Indonesia dan beberapa universitas lain, dan juga reviewer untuk kegiatan tender pengembangan software di beberapa kementerian di Indonesia. Technical Assistance program hibah kompetisi dari kementrian pendidikan nasional untuk beberapa universitas di Jakarta, Padang, Lampung, Surabaya dan Yogyakarta. Editor-in-Chief dan reviewer dari journal ilmiah Journal of Software Engineering dan Journal of Intelligent Systems.</p>\r\n\r\n<p>Menjadi juri pada berbagai event lomba dan kompetisi bertaraf nasional maupun internasional, diantaranya adalah: Lomba Pembuatan Multimedia Pembelajaran (LPMP) yang diselenggarakan oleh Kemdiknas, National Innovative Teacher Competition yang diselenggarakan oleh Microsoft, eLearning Award yang diselenggarakan oleh Pustekkom, INAICTA (Indonesia ICT Award) yang diselenggarakan oleh Kominfo dan Aspiluki, Kompetisi Smart Campus yang diselenggarakan oleh Telkom, Imagine Cup yang diselenggarakan oleh Microsoft, dan kompetisi pengembangan aplikasi dan situs web yang diadakan oleh kementrian keuangan, dan berbagai universitas lain di Indoneia.</p>\r\n\r\n<p>Selain tema diatas juga memiliki minat dan aktif menulis dalam tema yang berhubungan dengan manajemen, leadership, self improvement, motivation dan keorganisasian. Aktifis organisasi kampus dan kemahasiswaan semasa menjadi mahasiswa di Saitama University. Menjadi Ketua Umum PPI Jepang (Perhimpunan Pelajar Indonesia di Jepang) periode tahun 2001-2003, dan Ketua Umum IECI Japan (asosiasi ilmiah di bidang elektronika dan informatika) periode tahun 2001-2002.</p>\r\n\r\n<p>Mendapat penghargaan dari PBB pada pertemuan puncak WSIS (World Summit on Information Society) pada tahun 2003 di Jenewa, Swiss, dengan penghargaan the Continental Best Practice Examples in the Category eLearning (IlmuKomputer.Com).</p>\r\n','2023-04-02 22:22:41'),(4,'Onno W Purbo','tutors_1617209038_onno_w_purbo.jpg','<p>Onno Widodo Purbo (lahir di Bandung, Jawa Barat, 17 Agustus 1962; umur 58 tahun) adalah seorang tokoh dan pakar di bidang teknologi informasi asal Indonesia.[1] Selain pakar, Onno juga dikenal sebagai penulis, pendidik, dan pembicara seminar.[1] Sebagai aktivis Onno dikenal dalam upayanya memperjuangkan Linux. Karya inovatifnya diantaranya adalah Wajanbolic, sebagai upaya koneksi internet murah tanpa kabel dan RT/RW-Net sebagai jaringan komputer swadaya masyarakat untuk menyebarkan internet murah, serta penerapan Open BTS[1][2]</p>\r\n\r\n<p>Ia memulai pendidikan akademis di ITB pada jurusan Teknik Elektro pada tahun 1981 dan lulus dengan predikat wisudawan terbaik, kemudian melanjutkan studi ke Kanada dengan beasiswa dari PAUME.</p>\r\n\r\n<p>Ia juga aktif menulis dalam bidang teknologi informasi media, seminar, konferensi nasional maupun internasional dan percaya filosofi copyleft (sumber terbuka), banyak tulisannya dipublikasi secara gratis di internet.[1][3][4] Sebagai pakar teknologi Onno hanya menggunakan netbook dan telepon seluler Android merek lokal.[1].</p>\r\n\r\n<p>Pada bulan November 2020, ia menerima penghargaan Postel Service Award dari Internet Society. Postel Service Award diberikan kepada Onno karena telah memberikan kontribusi luar biasa bagi perkembangan teknologi Internet di Indonesia.[5]</p>\r\n','2023-09-02 22:20:53'),(5,'Ricky Elson','tutors_1617402687_Ricky_Elson.jpg','<p>Ricky Elson (lahir di Padang, Sumatra Barat, 11 Juni 1980; umur 40 tahun) adalah seorang teknokrat Indonesia yang ahli dalam teknologi motor penggerak listrik. Ia yang merancang bangun mobil listrik Selo bersama Danet Suryatama yang merancang bangun Tucuxi dianggap sebagai pelopor mobil listrik nasional.[1][2][3]</p><p>Ricky menempuh pendidikan tinggi teknologinya di Jepang, kemudian bekerja di sebuah perusahaan di negeri sakura itu. Selama 14 tahun di sana, Ricky telah menemukan belasan teknologi motor penggerak listrik yang sudah dipatenkan di Jepang.[4]</p><p>Tertarik dengan kemampuan Ricky untuk pengembangan teknologi mobil listrik, Menteri Negara Badan Usaha Milik Negara (BUMN), Dahlan Iskan meminta Ricky dan beberapa praktisi pengembang teknologi mobil listrik lainnya untuk bersinergi bersama Kementerian Riset dan Teknologi Indonesia, lembaga penelitian, beberapa universitas dan lembaga pemerintahan terkait, demi mempercepat pengembangan mobil listrik Indonesia. Bahkan Dahlan Iskan rela menghibahkan gajinya sebagai menteri kepada Ricky.[5]</p><p>Sebelum kuliah ke Jepang, Ricky Elson menamatkan sekolah menengahnya di SMA Negeri 5 Padang pada tahun 1998.[6]</p><p>Di pertengahan tahun 2013, Ricky dan timnya bekerja menyelesaikan beberapa purwarupa mobil listrik yang diberi nama Selo dan Gendhis yang digunakan pada KTT APEC yang telah dilaksanakan pada Oktober 2013 di Denpasar, Bali.[7] Namun kemudian proyek mobil listrik nasional itu menghadapi hambatan, karena peraturannya tidak segera keluar. Lelah menunggu kepastian tentang proyek tersebut yang tak kunjung jelas statusnya, ia kemudian kembali ke perusahaan tempat ia semula bekerja di Jepang.[1]</p><p>Kabar terakhir dari tokoh ini, ia telah kembali ke Indonesia dan pada kisaran 2011-2012 ia menggagas sebuah pusat riset yang ia namakan Lentera Angin Nusantara, bertempat di Dusun Lembur Tengah, Desa Ciheras, Kecamatan Cipatujah, Kabupaten Tasikmalaya, Jawa Barat.[8] [9] [10]</p>','2024-02-02 22:31:27'),(7,'BAMBANG SANTOSO','cilantro1.jpg','<p>H.&nbsp;<strong>Bambang</strong>&nbsp;<strong>Santoso,</strong>&nbsp;S.Pd.I,&nbsp;M.A&nbsp;atau yang disapa&nbsp;<strong>Haji Bambang Santoso</strong>&nbsp;(lahir 1 Desember 1969) adalah&nbsp;Senator Republik Indonesia,&nbsp;tokoh&nbsp;masyarakat&nbsp;muslim&nbsp;Bali&nbsp;dan juga&nbsp;pengusaha&nbsp;yang telah lama berkecimpung dalam berbagai&nbsp;organisasi&nbsp;dan&nbsp;lembaga&nbsp;non&nbsp;pemerintah&nbsp;dari tingkat regional hingga nasional. H. Bambang Santoso dinobatkan sebagai wakil muslim pertama dalam sejarah yang duduk di kursi&nbsp;Dewan Perwakilan Daerah Republik Indonesia&nbsp;DPD-RI&nbsp;mewakili Provinsi&nbsp;Bali&nbsp;periode&nbsp;2019-2024.[1][2]&nbsp;Kemenangannya diharapkan membawa angin segar&nbsp;toleransi&nbsp;dan mengangkat pulau Bali sebagai contoh pulau&nbsp;kebhinekaan&nbsp;di&nbsp;Indonesia.</p>\r\n\r\n<p><strong>Bambang Santoso</strong>&nbsp;adalah ketua umum&nbsp;Dewan Masjid Indonesia&nbsp;<strong>DMI</strong>&nbsp;provinsi&nbsp;Bali[2][3]&nbsp;dan juga anggota dewan pertimbangan&nbsp;Majelis Ulama Indonesia&nbsp;<strong>MUI</strong>&nbsp;provinsi Bali.[4]</p>\r\n\r\n<p>Setelah terpilih dan dilantik sebagai anggota DPD-RI dan MPR-RI di&nbsp;gedung MPR/DPR/DPD,&nbsp;Senayan,&nbsp;Jakarta, 1 Oktober 2019 lalu, Bambang Santoso berikrar dan bertanda tangan bahwa selama ia menjabat akan menghibahkan 100% gaji pokoknya kepada salah satu lembaga independen di Provinsi Bali agar disalurkan dan dirasakan masyarakat kemanfaatannya lebih luas.[5][6]</p>\r\n','2024-07-14 15:08:39');
/*!40000 ALTER TABLE `tutors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-27  0:27:09
