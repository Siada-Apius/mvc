/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 5.6.24 : Database - mvc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mvc` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `mvc`;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_id` bigint(20) DEFAULT NULL,
  `fb_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fb_first_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fb_last_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`facebook_id`,`fb_name`,`fb_first_name`,`fb_last_name`,`created_at`,`updated_at`) values 
(1,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 13:45:02','2016-02-23 13:45:02'),
(2,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 14:15:37','2016-02-23 14:15:37'),
(3,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 14:26:01','2016-02-23 14:26:01'),
(4,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 15:12:25','2016-02-23 15:12:25'),
(5,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 15:53:29','2016-02-23 15:53:29'),
(6,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 16:01:56','2016-02-23 16:01:56'),
(7,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 17:24:07','2016-02-23 17:24:07'),
(8,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 17:48:58','2016-02-23 17:48:58'),
(9,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 17:52:07','2016-02-23 17:52:07'),
(10,'vira-nova@rambler.ru',10207236802451747,'Vira Kobyletska','Vira','Kobyletska','2016-02-23 19:56:13','2016-02-23 19:56:13'),
(11,'vira-nova@rambler.ru',10207236802451747,'Vira Kobyletska','Vira','Kobyletska','2016-02-23 20:18:24','2016-02-23 20:18:24'),
(12,'vira-nova@rambler.ru',10207236802451747,'Vira Kobyletska','Vira','Kobyletska','2016-02-23 20:18:52','2016-02-23 20:18:52'),
(13,'vira-nova@rambler.ru',10207236802451747,'Vira Kobyletska','Vira','Kobyletska','2016-02-23 20:32:20','2016-02-23 20:32:20'),
(14,'vira-nova@rambler.ru',10207236802451747,'Vira Kobyletska','Vira','Kobyletska','2016-02-23 20:32:41','2016-02-23 20:32:41'),
(15,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 20:40:06','2016-02-23 20:40:06'),
(16,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 20:40:22','2016-02-23 20:40:22'),
(17,'vira-nova@rambler.ru',10207236802451747,'Vira Kobyletska','Vira','Kobyletska','2016-02-23 21:11:07','2016-02-23 21:11:07'),
(18,'vira-nova@rambler.ru',10207236802451747,'Vira Kobyletska','Vira','Kobyletska','2016-02-23 21:26:13','2016-02-23 21:26:13'),
(19,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 21:26:34','2016-02-23 21:26:34'),
(20,'vira-nova@rambler.ru',10207236802451747,'Vira Kobyletska','Vira','Kobyletska','2016-02-23 21:26:42','2016-02-23 21:26:42'),
(21,'vira-nova@rambler.ru',10207236802451747,'Vira Kobyletska','Vira','Kobyletska','2016-02-23 21:35:14','2016-02-23 21:35:14'),
(22,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 22:14:39','2016-02-23 22:14:39'),
(23,'siadaapius@gmail.com',550177535140776,'Oleksandr Kobyletsky','Oleksandr','Kobyletskyi','2016-02-23 22:16:38','2016-02-23 22:16:38'),
(24,'vira-nova@rambler.ru',10207236802451747,'Vira Kobyletska','Vira','Kobyletska','2016-02-23 22:18:03','2016-02-23 22:18:03');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
