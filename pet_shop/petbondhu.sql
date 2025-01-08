-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 07:41 PM
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
-- Database: `petbondhu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone` varchar(15) NOT NULL,
  `admin_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_password`, `admin_email`, `admin_phone`, `admin_role`) VALUES
(1, 'Antor', '123', 'richantor345@gmail.com', '123456', 'super Admin'),
(2, 'Janie', '123', 'janiefaria67@gmail.com', '123456', 'super Admin'),
(3, 'Israt', '123', 'gfgf345@gmail.com', '123456', 'super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `birds`
--

CREATE TABLE `birds` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `breed_name` varchar(50) NOT NULL,
  `health_status` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `birds`
--

INSERT INTO `birds` (`id`, `name`, `breed_name`, `health_status`, `image`) VALUES
(1, 'Kiwi', 'Parakeet', 'Healthy', '../image/parakeet.jpg'),
(2, 'Tweety', 'Canary', 'Vaccinated', '../image/canary.jpg'),
(3, 'Sunny', 'Cockatiel', 'Neutered', '../image/cockatiel.jpg'),
(4, 'Sky', 'Macaw', 'Healthy', '../image/macaw.jpg'),
(5, 'Snowball', 'Dove', 'Vaccinated', '../image/dove.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `breed_name` varchar(255) NOT NULL,
  `health_status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `name`, `breed_name`, `health_status`, `image`) VALUES
(1, 'Whiskers', 'Persian', 'Healthy', '../image/cat1.jpg'),
(2, 'Fluffy', 'Bengal', 'Vaccinated', '../image/bengal_cat.jpg'),
(3, 'Shadow', 'Siamese', 'Neutered', '../image/siamese_cat.jpg'),
(4, 'Mittens', 'Maine Coon', 'Healthy', '../image/maine_coon.jpg'),
(5, 'Luna', 'British Shorthair', 'Vaccinated', '../image/british_horthair_cat.jpg'),
(6, 'Muana', 'Bengal', 'healthy', '../image/cat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `id` int(100) NOT NULL COMMENT 'p',
  `name` varchar(100) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `health_status` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`id`, `name`, `breed`, `age`, `health_status`, `image_url`) VALUES
(1, 'Buddy', 'Golden Retriever', 2, 'Vaccinated', '../image/golden_retriever.jpeg'),
(2, 'Max', 'Labrador', 3, 'Neutered', '../image/dog2.jpg'),
(3, 'Charlie', 'Beagle', 1, 'Vaccinated', '../image/dog.webp'),
(4, 'Bunny', 'Golden Retriever', 2, 'Vaccinated', '../image/dog4.jpg'),
(5, 'Maxa', 'Labrador', 3, 'Neutered', '../image/dog5.jpg'),
(256, 'Nimbu', 'poodle', 4, 'vaccined', '../image/dog6.jpg'),
(257, 'voska', 'lebrador', 3, 'vaccined', '../image/dog.jpg'),
(258, 'Greed', 'lebrador', 3, 'vaccined', '../image/dog7.jpg'),
(259, 'Roger', 'Beagle', 1, 'vaccined', '../image/dog3.jpg'),
(260, 'Marco', 'poodle', 1, 'vaccined', '../image/dog10.jpg'),
(261, 'Tyson', 'Beagle', 2, 'vaccined', '../image/dog_background.webp'),
(262, 'mimi', 'lebrador', 2, 'healthy', '../image/dog.jpg'),
(263, 'Greedy', 'lebrador', 4, 'vaccined', '../image/dog10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fishs`
--

CREATE TABLE `fishs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `species_name` varchar(100) NOT NULL,
  `diet` varchar(255) NOT NULL,
  `size` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fishs`
--

INSERT INTO `fishs` (`id`, `name`, `species_name`, `diet`, `size`, `image`) VALUES
(1, 'Clownfish', 'Amphiprioninae', 'Algae, Zooplankton', '10-15 cm', '../image/clownfish.jpg'),
(3, 'Blue Tang', 'Paracanthurus hepatus', 'Algae, Plankton', '12-25 cm', '../image/blue_tang.webp'),
(4, 'Betta Fish', 'Betta splendens', 'Insects, Larvae', '6-8 cm', '../image/betta.jpg'),
(5, 'Goldfish', 'Carassius auratus', 'Plants, Crustaceans', '15-20 cm', '../image/goldfish.webp'),
(7, 'Guppy', 'Poecilia reticulata', 'Algae, Small Insects', '3-5 cm', '../image/guppy.jpg'),
(8, 'Mandarinfish', 'Synchiropus splendidus', 'Small Invertebrates', '6-8 cm', '../image/mandarinefish.jpeg'),
(9, 'GoldFish', ' Carassius auratus', 'Liken', '4-5cm', '../image/betta_back.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `offline_appointment`
--

CREATE TABLE `offline_appointment` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `pet_type` varchar(50) NOT NULL,
  `preferred_date` date NOT NULL,
  `consultation_location` varchar(50) NOT NULL,
  `selected_location` varchar(50) NOT NULL,
  `owner_number` varchar(15) NOT NULL,
  `symptoms` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offline_appointment`
--

INSERT INTO `offline_appointment` (`id`, `owner_name`, `pet_type`, `preferred_date`, `consultation_location`, `selected_location`, `owner_number`, `symptoms`, `created_at`) VALUES
(1, 'John Doe', 'Dog', '2024-12-25', 'Home Visit', 'Dhaka', '0123456789', 'Frequent sneezing', '2024-12-24 19:56:06'),
(2, 'Jane Smith', 'Cat', '2024-12-26', 'Clinic', 'Chattrogram', '0198765432', 'Loss of appetite', '2024-12-24 19:56:06'),
(4, 'Anika Tasnin', 'Cats', '2024-12-28', 'home', 'Chattogram', '123456', 'pragnent', '2024-12-25 14:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `online_appointment`
--

CREATE TABLE `online_appointment` (
  `id` int(11) NOT NULL,
  `pet_type` varchar(50) NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `pet_condition` text NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `consultation_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_appointment`
--

INSERT INTO `online_appointment` (`id`, `pet_type`, `service_type`, `pet_condition`, `first_name`, `last_name`, `email`, `consultation_date`, `created_at`) VALUES
(1, 'Dogs', 'Vaccination', 'nothing', 'janie', 'faria', 'cangaroguy272@gmail.com', '2024-12-27', '2024-12-24 18:23:27'),
(2, 'Cats', 'Dental Care', 'so much pain', 'antor', 'khan', 'cangaroguy272@gmail.com', '2024-12-28', '2024-12-24 18:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `petbondhu_shop`
--

CREATE TABLE `petbondhu_shop` (
  `id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `pet_category` enum('Dog','Cat','Bird','Bunny') NOT NULL,
  `product_type` enum('Food','Toys','Wearables','Decorations','Beds') NOT NULL,
  `min_age` int(11) DEFAULT 0,
  `max_age` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petbondhu_shop`
--

INSERT INTO `petbondhu_shop` (`id`, `product_name`, `price`, `image_url`, `pet_category`, `product_type`, `min_age`, `max_age`) VALUES
(1, 'chew toy for dogs', 700, '662124526bf8a3744040a528-dog-chew-toys-suction-cup-tug-of-war-toy.jpg', 'Dog', 'Food', 0, 0),
(3, 'Durable Dog Chew Toys: Low Prices (Free Shipping) | Chewy', 1500, 'chew.png.webp', 'Dog', 'Food', 0, 0),
(5, 'All Living Things® Flight Home', 500, '5350660.jpg', 'Dog', 'Food', 0, 0),
(6, 'ZuPreem® Pure Fun Enriching Variety Mix Bird Food', 350, '5261653.webp', 'Dog', 'Food', 0, 0),
(7, 'Full Cheeks™ Small Pet Cuddler Bed', 600, '5353396.webp', 'Dog', 'Food', 0, 0),
(8, 'Top Fin® Essentials Aquarium Starter Kit', 1450, '5262267.webp', 'Dog', 'Food', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_type` varchar(50) NOT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `medical_history` text DEFAULT NULL,
  `pet_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `user_id`, `pet_name`, `pet_type`, `breed`, `age`, `medical_history`, `pet_picture`, `created_at`) VALUES
(1, 1, 'pippo', 'cat', 'bengal', 2, 'vaccinated', NULL, '2025-01-02 04:01:00'),
(2, 1, 'bulubulu', 'dog', 'golden retriever', 3, 'sdfdfsdf', NULL, '2025-01-02 04:05:53'),
(3, 1, 'ASa', 'asa', 'asas', 2, 'sadasd', NULL, '2025-01-02 04:24:06'),
(4, 1, 'd.mkmasl.;kd', 'ewr3rl]pae', 'wqeqwewa', 23, 'adfsewfwefa', NULL, '2025-01-02 04:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_photo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password_hash`, `created_at`, `user_photo`, `address`) VALUES
(1, 'Antor', 'asdasd@gmail.com', '$2y$10$WAtU0PwvLQMoh8GBhZvCNusqmCo.tYU/HKF/UYX5EDZEfD93PSBoK', '2025-01-01 11:52:50', NULL, NULL),
(2, 'Antor', 'asda@gmail.com', '$2y$10$VjZ0KqkAHsnr0EFliqjh9OX4OEyc/ULwTeV26ZFPOQcfTRrwfFiOS', '2025-01-01 11:53:07', NULL, NULL),
(4, 'janie', 'janiemon@gmail.com', '$2y$10$0LAyOO9DdaZKPHTClj/7CO3otRZ9tmFBA8kv8klbr5DtLeeLB4N.q', '2025-01-01 11:56:34', '', 'adsasdasdasdasddeasdasd'),
(6, 'aaa', 'aaa@gmail.com', '$2y$10$p9NgHS3e5sIdYsxKI.Nb..WdVumUws2ohXngd0ysOtiGSwKebRgnC', '2025-01-01 12:03:22', '../image/uploads/25+ best ideas about Death Note on Pinterest _ Death note ___.jpg', 'asdasdasdad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `birds`
--
ALTER TABLE `birds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_name` (`product_name`);

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishs`
--
ALTER TABLE `fishs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offline_appointment`
--
ALTER TABLE `offline_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_appointment`
--
ALTER TABLE `online_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petbondhu_shop`
--
ALTER TABLE `petbondhu_shop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `birds`
--
ALTER TABLE `birds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT COMMENT 'p', AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `fishs`
--
ALTER TABLE `fishs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `offline_appointment`
--
ALTER TABLE `offline_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `online_appointment`
--
ALTER TABLE `online_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
