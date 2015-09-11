-- --------------------------------------------------------
-- DATABASE: `mindkblog`
-- --------------------------------------------------------
DROP SCHEMA IF EXISTS `mindkblog` ;
CREATE SCHEMA IF NOT EXISTS `mindkblog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mindkblog`;


DROP TABLE IF EXISTS `posts` ;

-- --------------------------------------------------------
-- Create table: `posts`
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
