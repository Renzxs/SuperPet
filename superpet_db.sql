-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 04:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superpet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption_tbl`
--

CREATE TABLE `adoption_tbl` (
  `adoption_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pet_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_tbl`
--

INSERT INTO `adoption_tbl` (`adoption_id`, `user_id`, `pet_id`, `status`) VALUES
(20, 4, 12, 'Rejected'),
(21, 4, 13, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_tbl`
--

CREATE TABLE `appointment_tbl` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `pet_name` varchar(50) DEFAULT NULL,
  `type_of_pet` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL,
  `isCancelled` varchar(10) DEFAULT NULL,
  `status_msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pets_tbl`
--

CREATE TABLE `pets_tbl` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(30) NOT NULL,
  `pet_age` varchar(30) NOT NULL,
  `pet_breed` varchar(30) NOT NULL,
  `pet_photo_url` varchar(100) NOT NULL,
  `pet_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets_tbl`
--

INSERT INTO `pets_tbl` (`pet_id`, `pet_name`, `pet_age`, `pet_breed`, `pet_photo_url`, `pet_desc`) VALUES
(12, 'Milky', 'Adult', 'Black American', 'IMG-656b2a9ea33b00.73071164.png', 'Please adopt me!'),
(13, 'Hello Kitty', 'Young', 'Persian', 'IMG-656b2ae4578ba8.56911289.png', 'Embrace elegance with a Persian cat: grace, charm, and furry sophistication.'),
(14, 'Micky Mouse', 'Young', 'Hamster', 'IMG-656b2b1285b887.52005092.png', 'Tiny ball of fur, big heart. Adopt a hamster today!');

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_image_url` varchar(150) NOT NULL,
  `product_category` varchar(25) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`product_id`, `product_name`, `product_image_url`, `product_category`, `product_description`, `product_price`) VALUES
(6, 'Woofy', 'IMG-656b20a8369f78.61880561.png', 'Best Seller', 'Best Doggo Food on the town.', 39),
(7, 'wagg (Puppy)', 'IMG-656b21e988cf79.64695288.png', 'Best Seller', 'Tail-wagging nutrition tailored for your growing and playful puppy.', 49),
(8, 'Dinovate', 'IMG-656b2242c61aa1.93679345.png', 'Limited Edition', 'Tail-wagging nutrition tailored for your growing and playful puppy.', 89),
(9, 'Whole Life', 'IMG-656b2785a31564.57331769.png', 'Best Seller', 'WHOLE LIFE: Tasty dog biscuits for a tail-wagging, lifelong delight.', 39);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `username`, `password`, `email`, `address`, `user_role`) VALUES
(1, 'admin', 'superpetadmin123', 'superpet@gmail.com', 'Valenzuela City', 'admin'),
(4, 'Renzxs', '54321', 'florencebatol85@gmail.com', 'Philippines, Manila City', 'customer'),
(5, 'Lebron James', '321', 'lebron@gmail.com', 'Philippines, Ilocus Sur', 'customer'),
(6, 'jamorant', 'billgates', 'jamorant@gmail.com', 'dyanlang', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_tbl`
--
ALTER TABLE `adoption_tbl`
  ADD PRIMARY KEY (`adoption_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Indexes for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pets_tbl`
--
ALTER TABLE `pets_tbl`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_tbl`
--
ALTER TABLE `adoption_tbl`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pets_tbl`
--
ALTER TABLE `pets_tbl`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption_tbl`
--
ALTER TABLE `adoption_tbl`
  ADD CONSTRAINT `adoption_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`id`),
  ADD CONSTRAINT `adoption_tbl_ibfk_2` FOREIGN KEY (`pet_id`) REFERENCES `pets_tbl` (`pet_id`);

--
-- Constraints for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  ADD CONSTRAINT `appointment_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
