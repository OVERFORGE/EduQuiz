-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 04:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `email`, `password`, `doe`) VALUES
(1, 'admin@gmail.com', 'admin', '2024-07-24 07:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `chemistry_class_10th_quiz`
--

CREATE TABLE `chemistry_class_10th_quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `o1check` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `o2check` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `o3check` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `o4check` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chemistry_class_11th_quiz`
--

CREATE TABLE `chemistry_class_11th_quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `o1check` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `o2check` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `o3check` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `o4check` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chemistry_class_12th_quiz`
--

CREATE TABLE `chemistry_class_12th_quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `o1check` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `o2check` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `o3check` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `o4check` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(10) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_img` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`, `class_img`, `doe`) VALUES
(1, 'Class 10th', '07212024181226.png', '2024-07-21 16:12:26'),
(2, 'Class 11th', '07182024204549.png', '2024-07-18 18:45:49'),
(3, 'Class 12th', '07182024204601.png', '2024-07-18 18:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `maths_class_10th_quiz`
--

CREATE TABLE `maths_class_10th_quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `o1check` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `o2check` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `o3check` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `o4check` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maths_class_11th_quiz`
--

CREATE TABLE `maths_class_11th_quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `o1check` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `o2check` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `o3check` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `o4check` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maths_class_12th_quiz`
--

CREATE TABLE `maths_class_12th_quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `o1check` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `o2check` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `o3check` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `o4check` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `physics_class_10th_quiz`
--

CREATE TABLE `physics_class_10th_quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `o1check` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `o2check` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `o3check` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `o4check` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physics_class_10th_quiz`
--

INSERT INTO `physics_class_10th_quiz` (`id`, `question`, `option_1`, `o1check`, `option_2`, `o2check`, `option_3`, `o3check`, `option_4`, `o4check`) VALUES
(1, 'The change in the direction of a wave passing from one medium to another is termed as —————', 'Interference', 'false', 'Mirage', 'false', 'Diffraction', 'false', 'Refraction', 'true'),
(2, 'What would be the angle of incidence for a light ray having zero reflection angle?', '180 degrees', 'false', '90 degrees', 'false', '0 degree', 'true', '45 degrees', 'false'),
(3, 'Light can be focused on our retina through which of the following phenomena?', 'Interference', 'false', 'Refraction', 'true', 'Diffraction', 'false', 'Mirage', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `physics_class_11th_quiz`
--

CREATE TABLE `physics_class_11th_quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `o1check` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `o2check` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `o3check` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `o4check` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `physics_class_12th_quiz`
--

CREATE TABLE `physics_class_12th_quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `o1check` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `o2check` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `o3check` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `o4check` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(10) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option_1` varchar(500) NOT NULL,
  `o1check` varchar(10) NOT NULL,
  `option_2` varchar(500) NOT NULL,
  `o2check` varchar(10) NOT NULL,
  `option_3` varchar(500) NOT NULL,
  `o3check` varchar(10) NOT NULL,
  `option_4` varchar(500) NOT NULL,
  `o4check` varchar(10) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `option_1`, `o1check`, `option_2`, `o2check`, `option_3`, `o3check`, `option_4`, `o4check`, `doe`) VALUES
(1, 'First Question', 'Hi', 'false', 'Hello', 'false', 'This is first question', 'true', 'Bye', 'false', '2024-07-16 12:57:23'),
(2, 'Second Question', 'This is second Question', 'true', 'Hello', 'false', 'new', 'false', 'Bye', 'false', '2024-07-16 13:16:38'),
(3, 'Third Question', 'A', 'false', 'B', 'false', 'C', 'false', 'This is Third question', 'true', '2024-07-16 20:56:21'),
(4, 'The change in the direction of a wave passing from one medium to another is termed as —————', 'Interference', 'false', 'Mirage', 'false', 'Diffraction', 'false', 'Refraction', 'true', '2024-07-19 13:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_list`
--

CREATE TABLE `quiz_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_list`
--

INSERT INTO `quiz_list` (`id`, `name`, `image`, `subject`, `class`, `doe`) VALUES
(1, 'physics_class_10th_quiz', '07192024153645.png', '1', '1', '2024-07-19 13:36:45'),
(2, 'physics_class_11th_quiz', '07192024153725.png', '2', '2', '2024-07-19 13:37:25'),
(3, 'physics_class_12th_quiz', '07192024153747.png', '3', '3', '2024-07-19 13:37:47'),
(4, 'chemistry_class_10th_quiz', '07192024153814.png', '4', '1', '2024-07-19 13:38:14'),
(5, 'chemistry_class_11th_quiz', '07192024153842.png', '5', '2', '2024-07-19 13:38:42'),
(6, 'chemistry_class_12th_quiz', '07192024153938.png', '6', '3', '2024-07-19 13:39:38'),
(7, 'maths_class_10th_quiz', '07192024154003.png', '7', '1', '2024-07-19 13:40:03'),
(8, 'maths_class_11th_quiz', '07192024154051.png', '8', '2', '2024-07-19 13:40:51'),
(9, 'maths_class_12th_quiz', '07192024154115.png', '9', '3', '2024-07-19 13:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `class_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `image`, `class_id`, `date`) VALUES
(1, 'Physics Class10th', '07182024212333.png', 1, '2024-07-18 19:23:33'),
(2, 'Physics Class11th', '07182024212353.png', 2, '2024-07-18 19:23:53'),
(3, 'Physics Class12th', '07182024212420.png', 3, '2024-07-18 19:24:20'),
(4, 'Chemistry Class10th', '07182024212452.png', 1, '2024-07-18 19:24:52'),
(5, 'Chemistry Class11th', '07182024212505.png', 2, '2024-07-18 19:25:05'),
(6, 'Chemistry Class12th', '07182024212518.png', 3, '2024-07-18 19:25:18'),
(7, 'Maths Class10th', '07182024212542.png', 1, '2024-07-18 19:25:42'),
(8, 'Maths Class11th', '07182024212555.png', 2, '2024-07-18 19:25:55'),
(9, 'Maths Class12th', '07182024212609.png', 3, '2024-07-18 19:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

CREATE TABLE `user_signup` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `doe` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_signup`
--

INSERT INTO `user_signup` (`id`, `name`, `email`, `password`, `dob`, `doe`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2024-07-17', '2024-07-16 22:57:33'),
(2, 'User 2', 'testuser@gmail.com', 'test', '2024-07-23', '2024-07-24 07:40:40'),
(3, 'user 3', 'testuser3@gmail.com', 'testuser', '2024-07-17', '2024-07-30 10:10:30'),
(4, 'Daksh', 'dkdakshkhurana@gmail.com', 'daksh', '2003-10-25', '2024-07-30 10:12:15'),
(5, 'user 4', 'user4@gmail.com', 'user4', '2024-07-16', '2024-07-30 11:00:45'),
(6, 'user 5', 'user5@gmail.com', 'user5', '2024-07-08', '2024-07-30 11:02:29'),
(7, 'user 6', 'user6@gmail.com', 'user6', '2024-07-14', '2024-07-30 11:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_stats`
--

CREATE TABLE `user_stats` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_quiz` int(11) NOT NULL,
  `last_quiz` varchar(255) NOT NULL,
  `accuracy` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_stats`
--

INSERT INTO `user_stats` (`id`, `user_id`, `total_quiz`, `last_quiz`, `accuracy`) VALUES
(1, 1, 25, 'physics_class_10th_quiz', '87'),
(2, 2, 1, 'physics_class_10th_quiz', '86'),
(3, 3, 1, 'physics_class_10th_quiz', '86'),
(4, 4, 1, 'physics_class_10th_quiz', '87'),
(5, 5, 1, 'physics_class_10th_quiz', '87'),
(6, 6, 1, 'physics_class_10th_quiz', '87'),
(7, 7, 1, 'physics_class_10th_quiz', '87');

-- --------------------------------------------------------

--
-- Table structure for table `user_track`
--

CREATE TABLE `user_track` (
  `id` int(10) NOT NULL,
  `track` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_track`
--

INSERT INTO `user_track` (`id`, `track`) VALUES
(1, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemistry_class_10th_quiz`
--
ALTER TABLE `chemistry_class_10th_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemistry_class_11th_quiz`
--
ALTER TABLE `chemistry_class_11th_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemistry_class_12th_quiz`
--
ALTER TABLE `chemistry_class_12th_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maths_class_10th_quiz`
--
ALTER TABLE `maths_class_10th_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maths_class_11th_quiz`
--
ALTER TABLE `maths_class_11th_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maths_class_12th_quiz`
--
ALTER TABLE `maths_class_12th_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physics_class_10th_quiz`
--
ALTER TABLE `physics_class_10th_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physics_class_11th_quiz`
--
ALTER TABLE `physics_class_11th_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physics_class_12th_quiz`
--
ALTER TABLE `physics_class_12th_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_list`
--
ALTER TABLE `quiz_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_stats`
--
ALTER TABLE `user_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_track`
--
ALTER TABLE `user_track`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chemistry_class_10th_quiz`
--
ALTER TABLE `chemistry_class_10th_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chemistry_class_11th_quiz`
--
ALTER TABLE `chemistry_class_11th_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chemistry_class_12th_quiz`
--
ALTER TABLE `chemistry_class_12th_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maths_class_10th_quiz`
--
ALTER TABLE `maths_class_10th_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maths_class_11th_quiz`
--
ALTER TABLE `maths_class_11th_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maths_class_12th_quiz`
--
ALTER TABLE `maths_class_12th_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `physics_class_10th_quiz`
--
ALTER TABLE `physics_class_10th_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `physics_class_11th_quiz`
--
ALTER TABLE `physics_class_11th_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `physics_class_12th_quiz`
--
ALTER TABLE `physics_class_12th_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz_list`
--
ALTER TABLE `quiz_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_stats`
--
ALTER TABLE `user_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_track`
--
ALTER TABLE `user_track`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
