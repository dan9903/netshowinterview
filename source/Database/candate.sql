# ************************************************************
# Interview NetshowMe
# By Damian Meneses <menesesd2@live.com>
#
# 
# ************************************************************

USE NetshowMeInterview;

DROP TABLE IF EXISTS `candidates`;

CREATE TABLE `candidates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `ip_addr` varchar(20) DEFAULT NULL,
  `created_at` timestamp DEFAULT NOW,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

