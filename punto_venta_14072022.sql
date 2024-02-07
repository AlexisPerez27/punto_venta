/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.1.38-MariaDB : Database - punto_venta
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`punto_venta` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `punto_venta`;

/*Table structure for table `detalle_ventas` */

DROP TABLE IF EXISTS `detalle_ventas`;

CREATE TABLE `detalle_ventas` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_producto` int(11) NOT NULL,
  `fk_id_venta` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` decimal(10,3) DEFAULT NULL,
  `bandera` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `detalle_ventas` */

insert  into `detalle_ventas`(`id_detalle`,`fk_id_producto`,`fk_id_venta`,`cantidad`,`subtotal`,`bandera`) values 
(9,4,1,1,0.000,0),
(10,8,1,1,0.000,0),
(11,1,1,1,0.000,0),
(12,1,1,1,0.000,0),
(13,10,1,1,0.000,0),
(14,10,1,1,0.000,0),
(15,8,1,1,0.000,0),
(16,8,1,1,0.000,0),
(17,3,1,1,0.000,0),
(18,2,1,1,0.000,0),
(19,4,1,1,0.000,0),
(20,10,1,1,0.000,1),
(21,10,1,1,0.000,0),
(22,10,1,1,0.000,0),
(23,4,1,1,0.000,1),
(24,1,1,1,0.000,0),
(25,8,1,1,0.000,1),
(26,8,1,1,NULL,1),
(27,8,1,1,NULL,1),
(28,8,1,1,NULL,1),
(29,4,1,1,206.982,0),
(30,10,1,2,25.700,0),
(31,2,2,1,145.360,0),
(32,10,2,1,12.850,0),
(33,1,2,1,12.631,0),
(34,4,2,2,413.964,0),
(35,2,3,1,145.360,0),
(36,3,3,1,200.740,0),
(37,8,4,1,593.231,0),
(38,10,4,3,38.550,0),
(39,3,4,1,200.740,0);

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` decimal(10,3) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `imagen` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `productos` */

insert  into `productos`(`id_producto`,`nombre`,`descripcion`,`precio`,`cantidad`,`imagen`) values 
(1,'Bolsa T1','Bolsa color verde',125.631,5,'./images/bolsa_verde.jpg'),
(2,'Bolsa T2','Bolsa color rojo',145.360,8,'./images/bolsa_roja.jpg'),
(3,'pantalon v1','pantalon de vestir',200.740,11,'./images/pantalon_vestir.jpg'),
(4,'pantalon v2','pantalon de mezclilla ',206.982,9,'./images/pantalon_mezclilla.jpg'),
(8,'playera v1','Playera color morado',593.231,8,'./images/playera_morada.png'),
(10,'pulsera','pulsera',12.850,5,'./images/pulsera.jpg');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` decimal(10,3) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ventas` */

insert  into `ventas`(`id_venta`,`folio`,`total`,`fecha`) values 
(1,'F-00001',232.682,'2022-07-14 09:54:38'),
(2,'F-00002',584.805,'2022-07-14 09:57:18'),
(3,'F-00003',346.100,'2022-07-14 09:58:21'),
(4,'F-00004',832.521,'2022-07-14 10:23:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
