CREATE DATABASE `test` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `test_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` tinytext,
  `type` int(11) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `content` tinytext,
  `b` int(11) DEFAULT NULL,
  `c` int(11) DEFAULT NULL,
  `d` int(11) DEFAULT NULL,
  `e` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
