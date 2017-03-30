-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2017 at 02:01 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_games`
--

-- --------------------------------------------------------

--
-- Table structure for table `tp_price`
--

CREATE TABLE `tp_price` (
  `id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tp_price`
--

INSERT INTO `tp_price` (`id`, `product_id`, `price`, `sale_price`) VALUES
(1, 1, '34.99', '19.99'),
(2, 2, '29.99', '24.99'),
(3, 3, '59.99', '39.99'),
(4, 4, '0.00', '0.00'),
(5, 5, '59.99', '29.99'),
(6, 6, '59.99', '19.99'),
(7, 7, '59.99', '29.99'),
(8, 8, '29.99', '19.99'),
(9, 9, '59.99', '34.99'),
(10, 10, '59.99', '49.99'),
(11, 11, '59.99', '49.99'),
(12, 12, '19.99', '9.99'),
(13, 13, '19.99', '9.99'),
(14, 14, '0.00', '0.00'),
(15, 15, '29.99', '19.99'),
(16, 16, '29.99', '24.99'),
(17, 17, '19.99', '14.99'),
(18, 18, '59.99', '49.99'),
(19, 19, '39.99', '29.99'),
(20, 20, '39.99', '29.99');

-- --------------------------------------------------------

--
-- Table structure for table `tp_sales`
--

CREATE TABLE `tp_sales` (
  `id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tp_sales`
--

INSERT INTO `tp_sales` (`id`, `product_id`, `start_date`, `end_date`, `active`) VALUES
(1, 1, '2017-07-29', '2017-09-22', 1),
(2, 5, '2017-06-11', '2017-09-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tp_stock`
--

CREATE TABLE `tp_stock` (
  `id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(25) NOT NULL,
  `ps4` tinyint(1) NOT NULL,
  `pc` tinyint(1) NOT NULL,
  `xbox` tinyint(1) NOT NULL,
  `count` int(6) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tp_stock`
--

INSERT INTO `tp_stock` (`id`, `name`, `description`, `category`, `ps4`, `pc`, `xbox`, `count`, `image`) VALUES
(1, 'Banished', 'A village Simulator Game', 'Simulator', 0, 1, 0, 65, 'http://i59.tinypic.com/wbufm0.jpg'),
(2, 'The Elder Scrolls Online', 'The Elder Scrolls Online is a massively multiplayer online role-playing video game developed by ZeniMax Online Studios and published by Bethesda Softworks. It was originally released for Microsoft Windows and OS X on April 4, 2014.', 'MMORPG', 1, 1, 1, 5, 'https://upload.wikimedia.org/wikipedia/en/f/fa/Elder_Scrolls_Online_cover.png'),
(3, 'Overwatch', 'Overwatch is a team-based multiplayer first-person shooter video game developed and published by Blizzard Entertainment. It was released in May 2016 for Microsoft Windows, PlayStation 4, and Xbox One.', 'FPS', 1, 1, 1, 3, 'https://upload.wikimedia.org/wikipedia/en/8/8f/Overwatch_cover_art_%28PC%29.jpg'),
(4, 'World of Warcraft ', 'World of Warcraft is a massively multiplayer online role-playing game released in 2004 by Blizzard Entertainment. It is the fourth released game set in the fantasy Warcraft universe, which was first introduced by Warcraft: Orcs & Humans in 1994.', 'MMORPG', 0, 1, 0, 5, 'https://upload.wikimedia.org/wikipedia/en/9/91/WoW_Box_Art1.jpg'),
(5, 'The Elder Scrolls V: Skyrim', 'The Elder Scrolls V: Skyrim is an open world action role-playing video game developed by Bethesda Game Studios and published by Bethesda Softworks.', 'RPG', 1, 1, 1, 4, 'https://upload.wikimedia.org/wikipedia/en/1/15/The_Elder_Scrolls_V_Skyrim_cover.png'),
(6, 'Uncharted 4: A Thief''s End', 'Uncharted 4: A Thief''s End is an action-adventure video game developed by Naughty Dog and published by Sony Computer Entertainment for the PlayStation 4 video game console. The game was released worldwide on May 10, 2016.', 'Action', 1, 0, 0, 4, 'https://upload.wikimedia.org/wikipedia/en/1/1a/Uncharted_4_box_artwork.jpg'),
(7, 'Final Fantasy XV', 'Final Fantasy XV is an open world action role-playing video game developed and published by Square Enix for the PlayStation 4 and Xbox One home consoles.', 'RPG', 1, 0, 1, 3, 'https://upload.wikimedia.org/wikipedia/en/5/5a/FF_XV_cover_art.jpg'),
(8, 'Dark Souls III', 'Dark Souls III is an action role-playing video game developed by FromSoftware and published by Bandai Namco Entertainment for PlayStation 4, Xbox One, and Microsoft Windows.', 'RPG', 1, 1, 1, 5, 'https://upload.wikimedia.org/wikipedia/en/b/bb/Dark_souls_3_cover_art.jpg'),
(9, 'Madden NFL 17', 'Madden 17 is an American football sports video game based on the National Football League and published by EA Sports for the PlayStation 4, PlayStation 3, Xbox One and Xbox 360', 'Sports', 1, 0, 1, 3, 'https://upload.wikimedia.org/wikipedia/en/6/61/Madden_NFL_17_cover.jpeg'),
(10, 'Gears of War 4', 'Gears of War 4 is a 2016 third-person shooter video game developed by The Coalition and published by Microsoft Studios for Microsoft Windows and Xbox One.', 'TPS', 0, 1, 1, 2, 'https://upload.wikimedia.org/wikipedia/en/f/ff/Gears_of_War_4.jpg'),
(11, 'Horizon Zero Dawn\r\n', 'Horizon Zero Dawn is an open-world action role-playing video game developed by Guerrilla Games and published by Sony Interactive Entertainment for the PlayStation 4. The game was released worldwide in 2017.', 'RPG', 1, 0, 0, 5, 'https://upload.wikimedia.org/wikipedia/en/9/93/Horizon_Zero_Dawn.jpg'),
(12, 'Bloodborne', 'Bloodborne is an action role-playing video game developed by FromSoftware and published by Sony Computer Entertainment.', 'RPG', 1, 0, 0, 3, 'https://upload.wikimedia.org/wikipedia/en/6/68/Bloodborne_Cover_Wallpaper.jpg'),
(13, 'Rocket League', 'Rocket League is a vehicular soccer video game developed and published by Psyonix. The game was first released for Microsoft Windows and PlayStation 4 in July 2015, with ports for Xbox One, OS X, and Linux being released in 2016.', 'Sports', 1, 1, 1, 4, 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Rocket_League_coverart.jpg'),
(14, 'Runescape', 'RuneScape is a fantasy MMORPG developed and published by Jagex, released originally in January 2001. RuneScape can be used as a graphical browser game implemented on the client-side in Java, and incorporates 3D rendering. ', 'MMORPG', 0, 1, 0, 5, 'https://upload.wikimedia.org/wikipedia/en/0/0e/Runescape_3_Logo.png'),
(15, 'The Witcher 3: Wild Hunt\r\n', 'The Witcher 3: Wild Hunt is an action role-playing video game developed by CD Projekt and published by CD Projekt RED. Announced in February 2013, it was released worldwide for Microsoft Windows, PlayStation 4, and Xbox One in 2015.', 'RPG', 1, 1, 1, 4, 'https://upload.wikimedia.org/wikipedia/en/0/0c/Witcher_3_cover_art.jpg'),
(16, 'Grand Theft Auto V', 'Grand Theft Auto V is an action-adventure video game developed by Rockstar North and published by Rockstar Games.', 'Action', 1, 1, 1, 4, 'https://upload.wikimedia.org/wikipedia/en/a/a5/Grand_Theft_Auto_V.png'),
(17, 'Destiny', 'Destiny is an online-only multiplayer first-person shooter video game developed by Bungie and published by Activision. It was released worldwide on September 9, 2014, for the PlayStation 3, PlayStation 4, Xbox 360, and Xbox One consoles. ', 'FPS', 1, 0, 1, 3, 'https://upload.wikimedia.org/wikipedia/en/b/be/Destiny_box_art.png'),
(18, 'Halo Wars 2', 'Halo Wars 2 is a real-time strategy video game developed by 343 Industries and Creative Assembly. The game was published by Microsoft Studios and released in February 2017 on Windows-based personal computers and the Xbox One video game console', 'RTS', 0, 1, 1, 4, 'https://upload.wikimedia.org/wikipedia/en/0/07/Halo_wars_2_cover_art.jpg'),
(19, 'Watch Dogs 2', 'Watch Dogs 2 is an open world action-adventure third person shooter video game developed and published by Ubisoft. The sequel to 2014''s Watch Dogs, it was released worldwide for PlayStation 4, Xbox One, and Microsoft Windows in November 2016.', 'Action', 1, 1, 1, 4, 'https://upload.wikimedia.org/wikipedia/en/b/b0/Watch_Dogs_2.jpg'),
(20, 'NBA 2K17', 'NBA 2K17 is a basketball simulation video game developed by Visual Concepts and published by 2K Sports. It is the 18th installment in the NBA 2K franchise and the successor to NBA 2K16.', 'Sports', 1, 1, 1, 5, 'https://upload.wikimedia.org/wikipedia/en/a/a0/NBA_2K17_cover_art.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_price`
--
ALTER TABLE `tp_price`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FOREIGN` (`product_id`);

--
-- Indexes for table `tp_sales`
--
ALTER TABLE `tp_sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FOREIGN` (`product_id`);

--
-- Indexes for table `tp_stock`
--
ALTER TABLE `tp_stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tp_price`
--
ALTER TABLE `tp_price`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tp_stock`
--
ALTER TABLE `tp_stock`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tp_price`
--
ALTER TABLE `tp_price`
  ADD CONSTRAINT `tp_price_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tp_stock` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tp_sales`
--
ALTER TABLE `tp_sales`
  ADD CONSTRAINT `tp_sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tp_stock` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
