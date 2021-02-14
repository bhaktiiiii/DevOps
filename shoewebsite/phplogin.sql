-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 12:00 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phplogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `image`, `price`, `category`, `description`) VALUES
(1, 'Black Slippers', 'M1', 'Men/BlackSlippers.jpg', 24.00, 'Men', 'Soft pads are great for the feet.They are great pairing with casuals.Extremely comfortable'),
(2, 'Black Formal Shoes', 'M2', 'Men/BlackFormalShoes.jpg', 34.00, 'Men', 'Extremely Comfartable. Stylish. Perfect pair to make a statement in the office.'),
(3, 'Black Canvas', 'M3', 'Men/BlackCanvas.jpg', 34.00, 'Men', 'Designer.Cheap,Stylish. Perfect for everyday use.'),
(4, 'Grey Designer Shoes', 'M4', 'Men/GreyDesignerShoes.jpg', 34.00, 'Men', 'Designer.Stylish.Confortable.Affordable.'),
(5, 'Black Slippers with Stripes', 'M5', 'Men/BlackSlipperswithStripes.jpeg', 34.00, 'Men', 'Designer slippers perfect for indoor and outdoor.'),
(6, 'Grey Sandals', 'M6', 'Men/GreySandals.jpg', 34.00, 'Men', 'Extremely comfortable and cheap. Long lasting, perfect for people with fast life.'),
(7, 'Brown Formal Shoes', 'M7', 'Men/BrownFormalShoes.jpg', 34.00, 'Men', 'Designer.Stylish and Comfortable, They are really long-lasting. They are great for office use. Can also be paired with traditional wear.'),
(8, 'Blue and Grey Crocs', 'M8', 'Men/BlueandGreyCrocs.jpg', 34.00, 'Men', 'New in college and wanna make a statement then these are perfect for you. These shoes are waterproof,designer,and really affordable.'),
(9, 'Black Formal Slippers', 'M9', 'Men/BlackFormalSlippers.jpg', 34.00, 'Men', 'Perfect for office use. Really long lasting.'),
(10, 'Black Boots', 'W1', 'Women/BlackBoots.jpg', 34.00, 'Women', 'Soft pads are great for the feet.They are great pairing with casuals.Extremely comfortable.'),
(11, 'Black Heels', 'W2', 'Women/BlackHeels.jpeg', 14.00, 'Women', 'Extremely Comfortable. Stylish. Perfect pair for parties.'),
(12, 'Black Bellies', 'W3', 'Women/BlackBellies.jpg', 7.00, 'Women', 'Designer.Cheap,Stylish. Perfect for everyday use.'),
(13, 'Flat Sandals', 'W4', 'Women/FlatSandals.jpg', 30.00, 'Women', 'Designer.Stylish.Confortable.Affordable.'),
(14, 'Denim Shoes', 'W5', 'Women/DenimShoes.jpg', 33.00, 'Women', 'Designer shoes perfect for indoor and outdoor.'),
(15, 'Roadies Shoes', 'W6', 'Women/RoadiesShoes.jpg', 22.00, 'Women', 'Perfect for outdoors. Really long lasting. Giving you the rug look.'),
(16, 'Wedges', 'W7', 'Women/Wedges.jpg', 7.00, 'Women', 'Extremely comfortable and cheap. Long lasting, Perfect for elegant look.'),
(17, 'Pataudi', 'W8', 'Women/Pataudi.jpeg', 24.00, 'Women', 'Designer.Stylish and Comfortable, They are great for traditional wear.'),
(18, 'Floral Heels', 'W9', 'Women/FloralHeels.jpg', 34.00, 'Women', 'New in college and wanna make a statement then these are perfect for you. These shoes are designer,and really affordable.'),
(19, 'Ballet Shoes', 'K1', 'Kids/BalletShoes.jpg', 34.00, 'Kid', 'Sophisticated and designer shoes. Gives a great look during occasions.'),
(20, 'Baby Floaters', 'K2', 'Kids/BabyFloaters.jpg', 34.00, 'Kid', 'Extremely Comfortable. Perfect for daily use.'),
(21, 'Floral Jellies', 'K3', 'Kids/FloralJellies.jpg', 34.00, 'Kid', 'Flat pink belt jellies.'),
(22, 'Beach Flip Flops', 'K4', 'Kids/BeachFlipFlops.jpg', 34.00, 'Kid', 'Extremely comfortable and cheap. Long lasting.'),
(23, 'Crocs', 'K5', 'Kids/Crocs.jpg', 24.00, 'Kid', 'Long-lasting. All season.'),
(24, 'Baby Booties', 'K6', 'Kids/BabyBooties.jpg', 7.00, 'Kid', 'Shoes that light and gives you wings.'),
(25, 'Unicorn Slippers', 'K7', 'Kids/UnicornSlippers.jpg', 10.00, 'Kid', 'Designer.Cheap,Stylish. Perfect for everyday use.'),
(26, 'Red Dolly Shoes', 'K8', 'Kids/RedDollyShoes.jpg', 7.00, 'Kid', 'Red dolly shoes with red safety strap.Makes you look like dolls.'),
(27, 'Silver Steppers', 'K9', 'Kids/SilverSteppers.jpg', 40.00, 'Kid', 'Designer.Stylish.Confortable.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Jesica', 'abc'),
(2, 'Siddhi', '123'),
(3, 'Manissha', 'xyz'),
(4, 'Manjula', '456'),
(5, 'man', 'qwe'),
(6, 'jes', '789'),
(13, 'jesica13', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
