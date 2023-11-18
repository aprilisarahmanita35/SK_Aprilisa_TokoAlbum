-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 06:27 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `albumkpop`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id_agency` int(11) NOT NULL,
  `nama_agency` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`id_agency`, `nama_agency`) VALUES
(1, 'SM ENT'),
(2, 'HYBE ENT'),
(3, 'JYP ENT'),
(4, 'YG ENT'),
(6, 'WM ENT');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `jenis_kategori` varchar(255) DEFAULT NULL,
  `id_agency` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_kategori`, `id_agency`) VALUES
(1, 'Album NCT 127', 1),
(2, 'Album NCT Dream', 1),
(3, 'Album Aespa', 1),
(4, 'Album NCT', 1),
(5, 'Album OH MY GIRL', 6),
(22, 'Album Seventeen', 2),
(25, 'Album EXO', 1),
(26, 'Album BTS', 2);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `stok`, `detail`, `foto`) VALUES
(1, 1, 'Album Fact Check', 350000, 10, 'SPECS (TBD) <br>\r\n1. COVER: 1EA (RANDOM OUT OF 9) <br>\r\n2. LYRIC PAPER: 1EA <br>\r\n3. POSTCARD : 4EA <br>\r\n4. STICKER: 1EA <br>\r\n5. PHOTOCARD: 1EA (RANDOM OUT OF 9) <br>\r\n6. CD-R <br>\r\n', 'foto1699951034.jpeg'),
(2, 2, 'Album ISTJ', 360000, 17, 'Photobook Ver<br>\r\n1. Booklet: 1ea (Random out of Introvert / Extrovert ver.)<br>\r\n2. CD-R: 1ea (1 version)<br>\r\n3. (Introvert ver.) Printed Photo: 1ea (Random out of 7)<br>\r\n(Extrovert ver.) Polaroid Card: 1ea (Random out of 7)<br>\r\n4. Folded Poster: 1ea<br>\r\n5. Photocard: 1ea (Random out of 7)<br>', 'foto1699951085.png'),
(3, 3, 'Album Drama', 320000, 5, '1. 148*200*55 (mm)<br>\r\n2. Cover Bookband: 1ea (Random out of 4)<br>\r\n3. Booklet (72p): 1ea (1 version)<br>\r\n4. CD-R: 1ea (Random out of 4) (Matching bookband)<br>\r\n5. Photocard: 1ea (Random out of 4)<br>', 'foto1700311140.jpg'),
(4, 2, 'Album Hello Future', 350000, 7, '1. Cover: 2 versions<br>\r\n2. Photo Book: 1ea per version<br>\r\n3. CD-R: 1ea per version<br>\r\n4. Tattoo Sticker: Random 1 out of 2 per version<br>\r\n5. Folded Poster: Random 1 out of 7 per version<br>\r\n', 'foto1699951165.jpeg'),
(5, 3, 'Album Savage', 300000, 14, '1. Cover<br>\r\n2. Photobook (56 Pages)<br>\r\n3. 1 CD-R<br>\r\n4. 4 Folded Posters<br>\r\n5. Tattoo Sticker<br>\r\n6. Lenticular Card (1 random out of 4)<br>\r\n7. Photocard (1 random out of 4)<br>\r\n8. [SM Global Shop Exclusive] Unreleased Selfie Photocard (1 random out of 4)<br>', 'foto1700226273.jpeg'),
(37, 4, 'Album RESONANCE PT 2', 280000, 23, 'PACKAGE<br>\r\n- Photo Book : 145 x 205 x 20.5mm / 224p<br>\r\n- CD<br>\r\n- Folded Poster<br>\r\n- Sticker (Random 1 out of 3)<br>\r\n- ID Card (Random 1 out of 23)<br>\r\n- Photocard (Random 1 out of 23)<br>', 'foto1699954903.jpg'),
(39, 1, 'Album Favorite', 350000, 14, '- Cover (2 jenis) (boleh pilih versi setelah detail keluar)<br>\r\n- Booklet<br>\r\n- CD<br>\r\n- Bookmark (random 1 dari 9 jenis)<br>\r\n- Postcard (random 1 dari 9 jenis)<br>\r\n- Pendant card (random 1 dari 9 jenis)<br>\r\n- Photocard (random 1 dari 9 jenis)<br>', 'foto1699967745.jpeg'),
(40, 2, 'Album Glitch Mode', 330000, 13, 'PACKAGE (Each version includes)<br>\r\n- Cover : 2 version<br>\r\n- Photobook<br>\r\n- CD<br>\r\n- Photocard Set<br>\r\n- Folded Poster<br>\r\n- Sticker<br>\r\n- Lenticular Card (Random 1 out of 7)<br>\r\n- Poster (Random 1 out of 2 / First Press Only)<br>', 'foto1699967791.jpeg'),
(43, 1, 'Album Ay-yo', 370000, 12, '- Cover<br>\r\n- Booklet<br>\r\n- Printed Photo Postcard : Random (1 out of 9)<br>\r\n- Folded Poster : Random (1 out of 9)<br>\r\n- Sticker : Random (1 out of 9)<br>\r\n- Logo Sitcker : 1ea<br>\r\n- Photocard : Random (1 out of 9)<br>\r\n- Poster : First press only (Folded)<br>', 'foto1700147057.jpg'),
(44, 2, 'Album Candy', 230000, 5, '- Cover<br>\r\n- Photobook<br>\r\n- CD<br>\r\n- Folded Lyrics Poster<br>\r\n- Folded Postcard<br>\r\n- Folded Poster : Random (1 out of 7)<br>\r\n- Poster : First press only (Random 1 out of 2)<br>\r\n- Photo Card : Random (1 out of 7)<br>', 'foto1700310237.jpg'),
(45, 2, 'Album Hot Sauce', 300000, 10, '1. Cover : 3 versions (Crazy(Version A), Boring (Version B), Chilling (Version C))<br>\r\n2. Photo Book : 1 ea per version<br>\r\n3. Postcard Book : 1 ea per version<br>\r\n4. Sticker : 1 ea per version<br>\r\n5. Thanks To : 1 ea per version<br>\r\n6. Folded Poster : Random 1 out of 7 per version<br>\r\n7. Poster (Unfolded) : 1 ea per version (Initial order only)<br>\r\n8. Photo Card (Total 2ea) : Random 1 out of 7 per version & Random 1 out of 7 (Café 7 Dream Ver)<br>\r\n9. SGS Exclusive Photo Card : Random 1 out of 7 per version<br>', 'foto1700311816.jpg'),
(47, 4, 'Album Universe', 400000, 21, '1. Cover:1 version<br>\r\n2. Booklet: 1 ea(240p)<br>\r\n3. Photocard: 1 ea (Random 1 out of 21)<br>\r\n4. Folded Poster: 1 ea<br>\r\n5. Postcard: 1 ea (Random 1 out of 21)<br>\r\n6. Sticker: 1 ea (Random 1 out of 21)<br>', 'foto1700314098.png'),
(48, 4, 'Album Golden Age', 430000, 20, '1. Photobook: 224p<br>\r\n2. Bookmark: 1ea (Random 1 out of 20)<br>\r\n3. Sticker: 1ea (Random out of 4)<br>\r\n4. Year Book Card: 1ea (Random out of 20)<br>\r\n5. Printed Polaroid: 1ea (Random 1 out of 20)<br>\r\n6. Photocard: 1ea (Random out of 20)<br>', 'foto1700314387.jpg'),
(49, 5, 'Album Nonstop', 300000, 7, 'Vᴇʀ : Cʜᴀɴᴄᴇ Vᴇʀ / Qᴜᴇsᴛ Vᴇʀ.<br>\r\n- Game Board<br>\r\n- Board Book - CD Pocket + CD - Photo Card<br>\r\n- Game Marker<br>\r\n- Poster ( first press only ).<br>', 'foto1700314878.png'),
(50, 5, 'Album Dun-Dun Dance', 270000, 6, 'PHOTOBOOK : 148 X 148 mm (2ver. /116p)<br>\r\nCD : 2ver.<br>\r\nPHOTOCARD : 55 X 85 mm (2ver. / RANDOM 2 OUT OF 21)<br>\r\nSELFIE PHOTOCARD : 55 X 85 mm (2ver. / RANDOM 2 OUT OF 21)<br>\r\nILLUSTRATION POSTCARD : 100 X 150 mm (2ver.)<br>\r\nPOLAROID : 55 X 86 mm (*초도한정 총 38장 랜덤삽입)<br>\r\nPOSTER : 420 X 594 mm (2ver. / *초도한정)<br>', 'foto1700315208.jpg'),
(51, 26, 'Album Love Yourself Answer', 350000, 11, '- CD: 4 version<br>\r\n- Photobook: 2ea>br>\r\n- Minibook: 4 version<br>\r\n- Photocard : 4 version random<br>\r\n- Special Photocard<br>\r\n- Sticker Pack<br>\r\n- Poster: 4 version<br>', 'foto1700316064.jpg'),
(52, 26, 'Album Persona', 420000, 9, '- CD: 4 version<br>\r\n- Photobook: 2ea>br>\r\n- Minibook: 4 version<br>\r\n- 1 Photocard<br>\r\n- 1 Postcard<br>\r\n- 1 Clear photo picket (Randomly inserted given)<br>\r\n- 1 Poster (Bonus 1st press)<br>', 'foto1700316383.jpg'),
(53, 26, 'Album Map of The Soul 7', 340000, 7, '-Pilih Versi : 1 / 2 /3 / 4<br>\r\n-CD<br>\r\n-Photobook<br>\r\n-Lyric book<br>\r\n-Mini book -Photocard<br>\r\n-Postcard<br>\r\n-Sticker<br>\r\n-Coloring paper<br>\r\n-Poster random<br>', 'foto1700316654.jpeg'),
(54, 2, 'Album Beatbox', 380000, 19, '1. Cover: 1ea (Random out of 2)<br>\r\n2. Booklet (96p): 1ea (1 for each cover version)<br>\r\n3. Photocard Set: 1ea (1 for each cover version)<br>\r\n4. Folded Poster: 1ea (1 for each cover version)<br>\r\n5. Sticker: 1ea (1 for each cover version)<br>\r\n6. Photocard: 1ea (Random out of 7 for each cover versions)<br>', 'foto1700327362.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id_agency`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `FK_kategori_agency` (`id_agency`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK_produk_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id_agency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `FK_kategori_agency` FOREIGN KEY (`id_agency`) REFERENCES `agency` (`id_agency`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_produk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
