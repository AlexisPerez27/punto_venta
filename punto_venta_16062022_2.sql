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
  `bandera` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `detalle_ventas` */

insert  into `detalle_ventas`(`id_detalle`,`fk_id_producto`,`fk_id_venta`,`cantidad`,`bandera`) values 
(9,4,1,1,1),
(10,8,1,1,1),
(11,1,1,1,1),
(12,1,1,1,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `productos` */

insert  into `productos`(`id_producto`,`nombre`,`descripcion`,`precio`,`cantidad`,`imagen`) values 
(1,'Bolsa T1','Bolsa color verde',12.630,5,'./images/img1.png'),
(2,'Bolsa T2','Bolsa color rojo',145.360,8,'./images/img2.png'),
(3,'pantalon v1','pantalon de vestir',200.740,11,'./images/img3.png'),
(4,'pantalon v2','pantalon de mezclilla ',206.982,9,'./images/peso4.JPG'),
(8,'playera v1','Playera color morado',5493.231,8,'./images/peso1.JPG');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` decimal(10,3) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ventas` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
