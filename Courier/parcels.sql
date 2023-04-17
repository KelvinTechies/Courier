-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 08:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` int(30) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_address` text NOT NULL,
  `sender_contact` text NOT NULL,
  `sender_email` text NOT NULL,
  `recipient_email` text NOT NULL,
  `recipient_name` text NOT NULL,
  `recipient_address` text NOT NULL,
  `recipient_contact` text NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 = Deliver, 2=Pickup',
  `from_branch_id` varchar(30) NOT NULL,
  `to_branch_id` varchar(30) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `product` text NOT NULL,
  `pickup` varchar(1000) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `reference_number`, `sender_name`, `sender_address`, `sender_contact`, `sender_email`, `recipient_email`, `recipient_name`, `recipient_address`, `recipient_contact`, `type`, `from_branch_id`, `to_branch_id`, `weight`, `height`, `width`, `length`, `price`, `product`, `pickup`, `status`, `date_created`) VALUES
(20, 'CP/513927/Ed8561d', 'Marvel Wilson', '8 0sayande str off erediawa off sapele road, Benin city, Edo state, 300271', '+2347082575907', 'marvelwilson@gmail.com', 'marvel@gmail.com', 'Marvelous Ighodaro', 'Erediawa Str', '+93907459676', 1, '1', '', '50kg', '$300', '3.09', '2022-11-25', 1000000, '', '', 0, '2022-11-14 13:40:25'),
(21, 'CP/863751/Ed5329c', 'Marvelous Ighodaro', '8 0sayande str off erediawa off sapele road', '07082575907', 'marvel@gmail.com', 'marvel@gmail.com', 'Marvelous Ighodaro', '8 0sayande str off erediawa off sapele road', '07082575907', 1, '1', '', '80', '80', '8.9', '2022-11-14', 100000, 'uo', 'Array', 0, '2022-11-15 16:29:08'),
(22, 'CP/273596/Ed2346a', 'Marvelous Ighodaro', '8 0sayande str off erediawa off sapele road', '07082575907', 'marvel@gmail.com', 'marvel@gmail.com', 'Marvelous Ighodaro', '8 0sayande\' str off erediawa off sapele road', '07082575907', 1, '3', '', '50kg', '$300', '8.9', '2022-11-15', 1000000, '', '', 0, '2022-11-16 07:54:41'),
(23, 'CP/247685/Ed5132f', 'Marvelous Ighodaro', '8 0sayande str off erediawa off sapele road', '07082575907', 'marvel@gmail.com', 'marvel@gmail.com', 'Marvelous Ighodaro', '8 0sayande str off erediawa off sapele road', '07082575907', 2, '3', '3', '78', '$300', '3.09', '2022-11-17', 1000000, '', '', 3, '2022-11-16 07:59:14'),
(24, 'CP/753426/Ed2674a', 'Marvelous Ighodaro', '8 0sayande str off erediawa off sapele road', '07082575907', 'marvel@gmail.com', 'marvel@gmail.com', 'Marvelous Ighodaro', '8 0sayande str off erediawa off sapele road', '07082575907', 1, 'Gucci, Diamond wrist watch\r\n  ', '', '50kg', '$300', '89', '2022-11-17', 1000000, '', '', 0, '2022-11-16 08:26:51'),
(25, 'CP/169425/Ed6849f', 'Marvelous Ighodaro', '8 0sayande str off erediawa off sapele road', '07082575907', 'marvel@gmail.com', 'marvel@gmail.com', 'Marvelous Ighodaro', '8 0sayande str off erediawa off sapele road', '07082575907', 1, 'This product is not for sale', '', '50kg', '$300', '3.09', '2022-11-17', 1000000, '', '2022-11-15', 0, '2022-11-16 08:35:09'),
(26, 'CP/536814/Ed2581a', 'Marvelous Ighodaro', 'Erediawa Str', '+2347082575907', 'marvelwilsononit@gmail.com', 'marvelwilsononit@gmail.com', 'Marvelous Ighodaro', 'Erediawa Str', '+2347082575907', 1, 'ho               \r\n           ', '', '50', '3000', '78', '2023-01-24', 100000, '', '2023-01-25', 0, '2023-01-14 20:34:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
