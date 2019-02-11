/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.15-log : Database - cine
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cine` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cine`;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `categorias` */

insert  into `categorias`(`id`,`nombre`) values (2,'accion'),(3,'novela'),(4,'drama'),(5,'serie'),(6,'terror');

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(128) NOT NULL,
  `apellidos` varchar(128) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `direccion` varchar(128) DEFAULT NULL,
  `ciudad` varchar(64) DEFAULT NULL,
  `sexo` varchar(12) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `edad` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`nombres`,`apellidos`,`dni`,`direccion`,`ciudad`,`sexo`,`telefono`,`celular`,`edad`) values (1,'reysa','lacuta','6516516','av puno','puno','femenino','54651','65165',20),(2,'robert','limo','545612','miraflores','sicuani','masculino','1252454','9854545',25),(3,'edison','huillca','545454','av. miraflores','arequipa','masculino','000045','9542165',16),(4,'Rene','ANTEZANA YANA','651651','av. la calle','sicuani','masculino','65165165','6516516',30),(5,'emylia','turpo','55525','lima','chorillos','femenino','000788','98754825',45),(6,'elsa','lio','4554454','tarata','trujillo','femenino','95425','9854545',12),(7,'gregorio','jhgbgh','545612','av grau','sicuani','femenino','8582','4525252',17);

/*Table structure for table `configuracion` */

DROP TABLE IF EXISTS `configuracion`;

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(12) DEFAULT NULL,
  `empresa` varchar(128) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `direccion` varchar(128) DEFAULT NULL,
  `logo` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `configuracion` */

/*Table structure for table `peliculas` */

DROP TABLE IF EXISTS `peliculas`;

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `descripcion` text,
  `portada` varchar(64) DEFAULT NULL,
  `unidad` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_peliculas_categoria` (`id_categoria`),
  CONSTRAINT `fk_peliculas_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `peliculas` */

insert  into `peliculas`(`id`,`nombre`,`descripcion`,`portada`,`unidad`,`id_categoria`) values (1,'el precio de mañana','nominado al oscar',NULL,1,2),(2,'el  raro','premio oscar',NULL,2,4),(3,'el precio de mañana','es  una  pelicula  denominada al  oscar',NULL,1,2),(4,'el  mecanico','es  una   pelicula de motivacion',NULL,1,5),(5,'el precio de mañana','nominado al oscar',NULL,1,2),(6,'corazon  de  vidrio','ganados   de   dos   veces  de  mejor   pelicula',NULL,2,4),(7,'el precio de mañana','nominado al oscar',NULL,1,2);

/*Table structure for table `reservaciones` */

DROP TABLE IF EXISTS `reservaciones`;

CREATE TABLE `reservaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `hora_reserva` int(11) DEFAULT NULL,
  `abservacion` varchar(128) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_pelicula` int(11) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reservaciones_cliente` (`id_cliente`),
  KEY `fk_reservaciones_pelicula` (`id_pelicula`),
  CONSTRAINT `fk_reservaciones_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  CONSTRAINT `fk_reservaciones_pelicula` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `reservaciones` */

insert  into `reservaciones`(`id`,`fecha`,`fecha_reserva`,`hora_reserva`,`abservacion`,`id_cliente`,`id_pelicula`,`precio`) values (1,'2018-12-17','2018-12-17',10,'observaciones modificado',3,1,65165),(2,'2018-12-17','2018-12-17',2,'ganador de  un  premio   al  mejor  pelicula',2,1,10),(3,'2018-12-17','2018-12-17',4,'pelicula   ganador  del  oscar',2,2,150),(4,'2018-12-18','2018-12-17',9,'nomina al   oscar',4,2,20),(5,'2018-12-17','2018-12-12',3,'pelicula   ganador  del  oscar',2,1,20),(6,'2018-12-17','2018-12-14',6,'mejor   serie de 2018',6,6,12),(7,'2018-12-17','2018-12-04',10,'nomina al   oscar',4,4,22),(8,'2018-12-18','2018-12-11',2,'pelicula   ganador  del  oscar',7,4,57);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(64) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `clave` varchar(64) DEFAULT NULL,
  `foto` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`usuario`,`email`,`clave`,`foto`) values (4,'admin','admin@admin.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',NULL),(5,'modificado','admin@admin.com','6117be904f539a5833882e771d9e156883d5ebc9',NULL),(6,'modificado','admin@admin.com','6117be904f539a5833882e771d9e156883d5ebc9',NULL),(7,'admin','admin@admin.com','d033e22ae348aeb5660fc2140aec35850c4da997',NULL),(8,'73975755','hola@gmail.com','6117be904f539a5833882e771d9e156883d5ebc9',NULL),(9,'ssssss MODIFICADO','ycsacas@gmail.com','f7ce80c45d242369e815ea77f12d786f23f18b66',NULL),(10,'','','da39a3ee5e6b4b0d3255bfef95601890afd80709',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
