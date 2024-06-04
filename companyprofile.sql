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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `halaman`
--

LOCK TABLES `halaman` WRITE;
/*!40000 ALTER TABLE `halaman` DISABLE KEYS */;
INSERT INTO `halaman` VALUES (6,'Judul 3','Kutipan 3','<p>Isi 3</p>','2021-03-28 00:10:54'),(8,'Tetap Sehat Tetap Semangat','Belajar Programming #dirumahaja','<p><img src=\"../gambar/2b24d495052a8ce66358eb576b8912c8.jpg\" data-filename=\"2b24d495052a8ce66358eb576b8912c8.jpg\" class=\"note-float-left\" style=\"float: left;\">Belajar dari rumah telah menjadi bagian dari new normal warga Indonesia dalam menjalani kehidupan di tengah pandemi virus corona. Namun kendala infrastruktur dan teknologi membuat adanya kesenjangan pendidikan antar daerah.</p><p>Sherly Lewerissa, warga di Ambon sudah hampir tiga bulan punya tanggung jawab tambahan di rumah.</p><p>Selain harus mengajar dengan metode online sebagai dosen di Universitas Pattimura, ia juga harus mendampingi kedua anaknya belajar dari rumah.</p><p>Putera sulungnya, Hillary de Queoljoe sekarang duduk di kelas 7 SMP Negeri 6, sementara adik Hillary, Marchella de Qoeljoe adalah murid kelas 1 Sekolah Citra Kasih, di Ambon, Maluku.</p><p>Sherly mengaku ada perbedaan besar dalam aktivitas keduanya saat berlajar di rumah karena mereka berada di sekolah yang berbeda.</p><p>\"Sekolah negeri tidak sama dengan sekolah swasta. Sekolah yang swasta lebih terorganisasi dan rapi,\" kata Sherly kepada Hellena Souisa dari ABC News.</p><p>\"Adik setiap hari ada tugas, nanti hasilnya dikirim melalui Gmail. Tapi Kakak tugasnya [dari sekolah] tidak menentu, dalam satu minggu mungkin hanya ada 2 atau 3 tugas,\" tambahnya.</p><p>Sekitar 4.000 kilometer dari kota Ambon, Vincent, seorang murid kelas 5 Sekolah Dasar di Desa Semudun, Kabupaten Mempawah, Provinsi Kalimantan Barat mengaku lebih suka belajar di sekolah.</p><p>\"Saya lebih suka belajar [di sekolah] seperti biasa karena di rumah bosan tidak ada teman,\" ujarnya kepada Natasya Salim.</p><p>Sejak akhir Maret lalu, Vincent dan adiknya, Wilson, yang duduk di kelas 3, belajar di rumah dengan menyaksikan tayangan TVRI, sesuai instruksi dari sekolah mereka yaitu SD Negeri 19 Semudun.</p>','2021-03-30 01:01:53'),(9,'Online Courses','You Will Need This','<p style=\"margin: 10px 0px; padding: 10px 0px; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><img src=\"../gambar/84d9ee44e457ddef7f2c4f25dc8fa865.jpg\" style=\"width: 626px; float: left;\" class=\"note-float-left\"></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Pagi ini, Moreyna, 6 tahun, bangun pada pukul 7 pagi seperti biasanya. Setelah mandi dan sarapan, ia mengenakan seragam sekolahnya dan meminta ibunya untuk mengantarkannya ke sekolah dengan harapan semuanya sudah kembali normal.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Akan tetapi, Moreyna langsung kecewa begitu mengetahui bahwa sekolahnya masih ditutup karena pandemi.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Moreyna adalah murid di PAUD Kuncup Mekar di Jayapura. Sejak Pemerintah Papua memutuskan untuk menutup semua sekolah di provinsi ini pada bulan Maret 2020, ia belajar dari rumah bersama ibunya, Maria Morin.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Lebih dari 60 juta murid di Indonesia untuk sementara waktu tidak masuk sekolah karena COVID-19. Hal ini menimbulkan dampak yang belum pernah terjadi sebelumnya terhadap keberlangsungan pendidikan mereka.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">\"Berdasarkan survei dari orang tua dan murid, hambatan terbesar yang dihadapi murid saat belajar dari rumah adalah kurangnya akses internet dan perangkat elektronik yang mendukung,\" kata Spesialis Pendidikan UNICEF Nugroho Warman. “Orang tua juga harus fokus pada kewajiban lain untuk menghidupi keluarga mereka, yang akhirnya membuat mereka kurang memiliki waktu untuk membantu anak-anak mereka.\"</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><span style=\"color: rgb(0, 0, 0); font-family: var(--bs-font-sans-serif); font-size: 1rem;\">Untuk mengatasi hal ini, Pemerintah Indonesia menyiarkan program TV edukasi “Belajar dari Rumah” lewat TVRI untuk membantu anak-anak belajar dari rumah. Program tersebut, yang diselenggarakan oleh Kementerian Pendidikan dan Kebudayaan, menyiarkan acara dari Senin hingga Jumat untuk anak-anak usia sekolah dari prasekolah hingga Sekolah Menengah Atas yang mencakup berbagai bidang, termasuk program pengasuhan anak.</span></p>','2021-03-30 00:58:31');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (2,'dirumahrafif@gmail.com','Di Rumahrafif','c33367701511b4f6020ec61ded352059','1','','2021-04-09 00:00:58','','','0','','','','','',''),(3,'epradana15@gmail.com','ekahhhhhhhh','e10adc3949ba59abbe56e057f20f883e','1',NULL,'2024-05-17 15:57:41','OKE1','rt 1 rw 1','62895338221298','ownera','smk','2','apa ya','gatau','6287876776'),(6,'epradana1111@gmail.com','eka pradana','0192023a7bbd73250516f069df18b500','23',NULL,'2024-05-28 14:44:30','ekaa','rt 1 rw 1','0895338331298','kuli','asd','11','11','ss','11'),(7,'epradana125@gmail.com','eka pradana','0192023a7bbd73250516f069df18b500','23',NULL,'2024-05-28 14:45:13','ekaa','rt 1 rw 1','0895338331298','kuli','asd','11','asdasd','','1'),(8,'epradana215@gmail.com','eka pradana','6bbe5eaa9b787ca6ae1730ef700eebe7','belum',NULL,'2024-05-29 12:36:18','ekaa1','rt 1 rw 1','0895338331298','ownera','asd','1','asdasd','','2');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,'UIN Sunan Kalijaga','partners_1617496652_uin.jpg','<p>UIN Sunan Kalijaga<br></p>','2021-04-04 00:37:32'),(2,'UGM','partners_1617496676_ugm.jpg','<p>UGM</p>','2021-04-04 00:37:56'),(3,'UMY','partners_1617496689_umy.png','<p>UMY</p>','2021-04-04 00:38:09'),(4,'UNY','partners_1617496703_uny.png','<p>UNY</p>','2021-04-04 00:38:23'),(5,'UAD','partners_1617496716_uad.png','<p>UAD</p>','2021-04-04 00:38:36'),(7,'UPN','partners_1617496766_upn.png','<p>UPN</p>','2021-04-04 00:39:26');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (1,3,'2024-05-30 00:00:00',10000,0,'',''),(2,6,'2024-06-03 00:00:00',500000,0,'',''),(3,6,'2024-06-04 00:00:00',200000,0,'1717521121.png','0');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutors`
--

LOCK TABLES `tutors` WRITE;
/*!40000 ALTER TABLE `tutors` DISABLE KEYS */;
INSERT INTO `tutors` VALUES (2,'Budi rahardjo','tutors_1617208710_Budi Rahardjo.jpg','<p>Budi Raharjo[1] berprofesi sebagai Dosen, praktisi IT dan ahli keamanan informasi. Technopreneur, penulis, peneliti, pembicara, konsultan information security, blogger, rocker, itulah beberapa profesi yang dilakoni oleh Ir. Budi Rahardjo, MSc, PhD. Dengan gayanya yang khas, dosen Teknik Elektro ITB ini turut memberikan kontribusi untuk perkembangan dan kemajuan teknologi informasi di Indonesia.<br></p>','2021-04-02 22:21:41'),(3,'Romi Satrio Wahono','tutors_1617209015_Romi Satrio Wahono.jpg','<p>Romi Satria Wahono. Lahir di Madiun, 2 Oktober 1974. Menyelesaikan pendidikan dasar dan menengah di SD Negeri Sompok 4 dan SMP Negeri 8 Semarang. Menamatkan SMA di SMA Taruna Nusantara, Magelang pada tahun 1993. Menempuh pendidikan S1 (B.Eng), S2 (M.Eng), dan S3 (Dr.Eng) (on-leave) di bidang Software Engineering di Department of Computer Science di Saitama University, Jepang pada tahun 1999, 2001, dan 2004. Juga menyelesaikan PhD di bidang Software Engineering dan Machine Learning di&nbsp; Faculty of Information and Computer Technology di Universiti Teknikal Malaysia Melaka pada tahun 2014. Mantan PNS dan peneliti Lembaga Ilmu Pengetahuan Indonesia (LIPI). Cisco certified instructor lulusan Nanyang Technological University (NTU), Singapore. Bidang minat penelitian adalah Software Engineering dan Machine Learning. Professional member dari asosiasi ilmiah IEEE Computer Society (90598687), ACM (6680333) dan PMI (2822015). Pendiri dan CEO dari PT Brainmatics Cipta Informatika, dan PT IlmuKomputerCom Braindevs Sistema, perusahaan yang bergerak di bidang pengembangan software, enterprise architecture, professional training dan certification center.</p><p>Memiliki pengalaman sebagai pengembang enterprise architecture dan IT blueprint di berbagai instansi pemerintah dan swasta, seperti Komisi Pemberantasan Korupsi, Kementrian Keuangan, Universitas Sriwijaya, dsb. Pemegang sertifikasi industri dan certified trainer berhubungan dengan bidang enterprise architecture (TOGAF), business process modeling (BPMN), systems analysis and design (OMG UML), IT service management (ITIL), data mining (RapidMiner) dan software development (IEEE, Oracle).</p><p>Aktif sebagai peneliti dan dosen, dimana ratusan publikasi penelitian dalam bentuk scientific paper, artikel, dan tutorial telah diterbitkan dalam berbagai proceedings conference, jurnal ilmiah, majalah, koran dan portal, bertaraf nasional maupun internasional. Selain menulis tetap di beberapa kolom majalah IT, juga menyempatkan diri untuk menulis bebas di situs blog pribadi di RomiSatriaWahono.Net. Terjun di dunia industri IT semenjak masa kuliah. Memulai karir sebagai software tester, programmer dan system analyst di beberapa software house dan game developer company di Jepang. Memiliki pengalaman sebagai engineer, konsultan, lecturer dan pembicara seminar, workshop, serta conference baik di Indonesia maupun Jepang.</p><p>Saat ini sebagai reviewer di beberapa journal terindeks SCOPUS yang diterbitkan oleh Elsevier, ACTAPress dan NASA. Di Indonesia, reviewer dari journal Telkomnika dan journal lokal lain yang terakreditasi oleh Dikti. Selain itu memiliki pengalaman sebagai reviewer untuk program hibah penelitian yang diselenggarakan oleh Universitas Indonesia dan beberapa universitas lain, dan juga reviewer untuk kegiatan tender pengembangan software di beberapa kementerian di Indonesia. Technical Assistance program hibah kompetisi dari kementrian pendidikan nasional untuk beberapa universitas di Jakarta, Padang, Lampung, Surabaya dan Yogyakarta. Editor-in-Chief dan reviewer dari journal ilmiah Journal of Software Engineering dan Journal of Intelligent Systems.</p><p>Menjadi juri pada berbagai event lomba dan kompetisi bertaraf nasional maupun internasional, diantaranya adalah: Lomba Pembuatan Multimedia Pembelajaran (LPMP) yang diselenggarakan oleh Kemdiknas, National Innovative Teacher Competition yang diselenggarakan oleh Microsoft, eLearning Award yang diselenggarakan oleh Pustekkom, INAICTA (Indonesia ICT Award) yang diselenggarakan oleh Kominfo dan Aspiluki, Kompetisi Smart Campus yang diselenggarakan oleh Telkom, Imagine Cup yang diselenggarakan oleh Microsoft, dan kompetisi pengembangan aplikasi dan situs web yang diadakan oleh kementrian keuangan, dan berbagai universitas lain di Indoneia.</p><p>Selain tema diatas juga memiliki minat dan aktif menulis dalam tema yang berhubungan dengan manajemen, leadership, self improvement, motivation dan keorganisasian. Aktifis organisasi kampus dan kemahasiswaan semasa menjadi mahasiswa di Saitama University. Menjadi Ketua Umum PPI Jepang (Perhimpunan Pelajar Indonesia di Jepang) periode tahun 2001-2003, dan Ketua Umum IECI Japan (asosiasi ilmiah di bidang elektronika dan informatika) periode tahun 2001-2002.</p><p>Mendapat penghargaan dari PBB pada pertemuan puncak WSIS (World Summit on Information Society) pada tahun 2003 di Jenewa, Swiss, dengan penghargaan the Continental Best Practice Examples in the Category eLearning (IlmuKomputer.Com).</p>','2021-04-02 22:22:41'),(4,'Onno W Purbo','tutors_1617209038_onno w purbo.jpg','<p>Onno Widodo Purbo (lahir di Bandung, Jawa Barat, 17 Agustus 1962; umur 58 tahun) adalah seorang tokoh dan pakar di bidang teknologi informasi asal Indonesia.[1] Selain pakar, Onno juga dikenal sebagai penulis, pendidik, dan pembicara seminar.[1] Sebagai aktivis Onno dikenal dalam upayanya memperjuangkan Linux. Karya inovatifnya diantaranya adalah Wajanbolic, sebagai upaya koneksi internet murah tanpa kabel dan RT/RW-Net sebagai jaringan komputer swadaya masyarakat untuk menyebarkan internet murah, serta penerapan Open BTS[1][2]</p><p>Ia memulai pendidikan akademis di ITB pada jurusan Teknik Elektro pada tahun 1981 dan lulus dengan predikat wisudawan terbaik, kemudian melanjutkan studi ke Kanada dengan beasiswa dari PAUME.</p><p>Ia juga aktif menulis dalam bidang teknologi informasi media, seminar, konferensi nasional maupun internasional dan percaya filosofi copyleft (sumber terbuka), banyak tulisannya dipublikasi secara gratis di internet.[1][3][4] Sebagai pakar teknologi Onno hanya menggunakan netbook dan telepon seluler Android merek lokal.[1].</p><p>Pada bulan November 2020, ia menerima penghargaan Postel Service Award dari Internet Society. Postel Service Award diberikan kepada Onno karena telah memberikan kontribusi luar biasa bagi perkembangan teknologi Internet di Indonesia.[5]</p>','2021-04-02 22:20:53'),(5,'Ricky Elson','tutors_1617402687_Ricky Elson.jpg','<p>Ricky Elson (lahir di Padang, Sumatra Barat, 11 Juni 1980; umur 40 tahun) adalah seorang teknokrat Indonesia yang ahli dalam teknologi motor penggerak listrik. Ia yang merancang bangun mobil listrik Selo bersama Danet Suryatama yang merancang bangun Tucuxi dianggap sebagai pelopor mobil listrik nasional.[1][2][3]</p><p>Ricky menempuh pendidikan tinggi teknologinya di Jepang, kemudian bekerja di sebuah perusahaan di negeri sakura itu. Selama 14 tahun di sana, Ricky telah menemukan belasan teknologi motor penggerak listrik yang sudah dipatenkan di Jepang.[4]</p><p>Tertarik dengan kemampuan Ricky untuk pengembangan teknologi mobil listrik, Menteri Negara Badan Usaha Milik Negara (BUMN), Dahlan Iskan meminta Ricky dan beberapa praktisi pengembang teknologi mobil listrik lainnya untuk bersinergi bersama Kementerian Riset dan Teknologi Indonesia, lembaga penelitian, beberapa universitas dan lembaga pemerintahan terkait, demi mempercepat pengembangan mobil listrik Indonesia. Bahkan Dahlan Iskan rela menghibahkan gajinya sebagai menteri kepada Ricky.[5]</p><p>Sebelum kuliah ke Jepang, Ricky Elson menamatkan sekolah menengahnya di SMA Negeri 5 Padang pada tahun 1998.[6]</p><p>Di pertengahan tahun 2013, Ricky dan timnya bekerja menyelesaikan beberapa purwarupa mobil listrik yang diberi nama Selo dan Gendhis yang digunakan pada KTT APEC yang telah dilaksanakan pada Oktober 2013 di Denpasar, Bali.[7] Namun kemudian proyek mobil listrik nasional itu menghadapi hambatan, karena peraturannya tidak segera keluar. Lelah menunggu kepastian tentang proyek tersebut yang tak kunjung jelas statusnya, ia kemudian kembali ke perusahaan tempat ia semula bekerja di Jepang.[1]</p><p>Kabar terakhir dari tokoh ini, ia telah kembali ke Indonesia dan pada kisaran 2011-2012 ia menggagas sebuah pusat riset yang ia namakan Lentera Angin Nusantara, bertempat di Dusun Lembur Tengah, Desa Ciheras, Kecamatan Cipatujah, Kabupaten Tasikmalaya, Jawa Barat.[8] [9] [10]</p>','2021-04-02 22:31:27'),(6,'Adi Wirawan','tutors_1617402809_path4362-14.png','<p>Adi Wirawan<br></p>','2021-04-02 22:33:29');
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

-- Dump completed on 2024-06-05  0:20:20
