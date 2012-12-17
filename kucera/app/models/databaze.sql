
SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `zam_categorylist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ;


CREATE TABLE IF NOT EXISTS `zam_productlist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `categorylist_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order` (`categorylist_id`),
  CONSTRAINT `fk_categorylist` FOREIGN KEY (categorylist_id) REFERENCES zam_categorylist (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ;


CREATE TABLE IF NOT EXISTS `zam_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `price` int(6) NOT NULL,
  `created` datetime NOT NULL,
  `productlist_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order` (`productlist_id`),
  CONSTRAINT `fk_productlist` FOREIGN KEY (productlist_id) REFERENCES zam_productlist (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ;


CREATE TABLE IF NOT EXISTS `zam_images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `path` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `product_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ;

ALTER TABLE zam_images
ADD CONSTRAINT `fk_product_images` FOREIGN KEY (product_id) REFERENCES zam_product (id);


INSERT INTO `zam_categorylist` (`id`, `title`) VALUES
(1, 'Klíče'),
(2, 'Zámky'),
(3, 'Panty'),
(4, 'Vložky');

INSERT INTO `zam_productlist` (`id`, `title`, `categorylist_id`) VALUES
(1, 'FAB', 3),
(2, 'TOKOZ', 3),
(3, 'Guard', 2),
(4, 'DOLS', 2);
