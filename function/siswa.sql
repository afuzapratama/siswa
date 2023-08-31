-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2023 at 11:34 AM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_siswa`
--

CREATE TABLE `detail_siswa` (
  `id_detail_siswa` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap` longtext NOT NULL,
  `tgl_lahir` date NOT NULL,
  `img_siswa` longtext NOT NULL,
  `sekolah` longtext NOT NULL,
  `kelas` longtext NOT NULL,
  `alamat` longtext NOT NULL,
  `absensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_siswa`
--

INSERT INTO `detail_siswa` (`id_detail_siswa`, `username`, `nama_lengkap`, `tgl_lahir`, `img_siswa`, `sekolah`, `kelas`, `alamat`, `absensi`) VALUES
(1, 'budi', 'asdas', '2023-08-15', 'https://s3.fr-par.scw.cloud/siswa-buckets/siswa/budi-4d589796-61db-4afd-96bd-e0645fc93fd0', 'sekolah', 'X12', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(60) NOT NULL,
  `Sekolah` longtext NOT NULL,
  `Kelas` longtext NOT NULL,
  `mapel` longtext NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `Sekolah`, `Kelas`, `mapel`, `status`) VALUES
(1, '1234', 'asdas', 'asdas', '', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id_questions` int(255) NOT NULL,
  `id_title` int(255) NOT NULL,
  `questions` longtext NOT NULL,
  `option1` longtext NOT NULL,
  `option2` longtext NOT NULL,
  `option3` longtext NOT NULL,
  `option4` longtext NOT NULL,
  `correct_option` int(5) NOT NULL,
  `points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id_questions`, `id_title`, `questions`, `option1`, `option2`, `option3`, `option4`, `correct_option`, `points`) VALUES
(1, 12, 'asdas', 'dasda', 'asdas', 'asdas', 'cvxzxcz', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `questions_title`
--

CREATE TABLE `questions_title` (
  `id_questions_title` int(255) NOT NULL,
  `title` longtext NOT NULL,
  `timeLeft` int(11) NOT NULL,
  `date_create` date NOT NULL,
  `date_last_work` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` longtext NOT NULL,
  `password` varchar(255) NOT NULL,
  `kode_kelas` varchar(60) NOT NULL,
  `setup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `username`, `email`, `password`, `kode_kelas`, `setup`) VALUES
(8, 'budi', 'deviaprianty65@gmail.com', '$2y$10$H79/3p/u5cNx29OAZrddl./NUGJ4nbgjmWvrp/VCNNVaFlt7AOc.u', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_sessions`
--

CREATE TABLE `siswa_sessions` (
  `session_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `session_token` longtext NOT NULL,
  `user_agent` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa_sessions`
--

INSERT INTO `siswa_sessions` (`session_id`, `siswa_id`, `session_token`, `user_agent`, `created_at`, `last_activity`) VALUES
(10, 8, '2abfded659b2fd123105ff3ab14f536650bd468680ea4409a009c7c6c3e4dc8d', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '2023-08-26 11:29:27', '2023-08-26 11:29:27'),
(11, 8, 'c90c84f45b145f308af15e03d01228b207903b7544efce032004a19bd9aaee57', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '2023-08-31 02:57:59', '2023-08-31 02:57:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_siswa`
--
ALTER TABLE `detail_siswa`
  ADD PRIMARY KEY (`id_detail_siswa`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_questions`),
  ADD UNIQUE KEY `id_questions_title` (`id_title`);

--
-- Indexes for table `questions_title`
--
ALTER TABLE `questions_title`
  ADD PRIMARY KEY (`id_questions_title`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `siswa_sessions`
--
ALTER TABLE `siswa_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_siswa`
--
ALTER TABLE `detail_siswa`
  MODIFY `id_detail_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_questions` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions_title`
--
ALTER TABLE `questions_title`
  MODIFY `id_questions_title` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `siswa_sessions`
--
ALTER TABLE `siswa_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa_sessions`
--
ALTER TABLE `siswa_sessions`
  ADD CONSTRAINT `siswa_sessions_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
