/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.15-log : Database - bdcaserita
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdcaserita` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bdcaserita`;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `categorias` */

LOCK TABLES `categorias` WRITE;

insert  into `categorias`(`id`,`nombre`) values (1,'leche'),(2,'gaceosoa'),(3,'pan'),(4,'galletas');

UNLOCK TABLES;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(128) NOT NULL,
  `apellidos` varchar(128) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `direccion` varchar(128) DEFAULT NULL,
  `ciudad` varchar(64) DEFAULT NULL,
  `sexo` varchar(12) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clientes_usuario` (`id_usuario`),
  CONSTRAINT `fk_clientes_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `clientes` */

LOCK TABLES `clientes` WRITE;

insert  into `clientes`(`id`,`id_usuario`,`nombres`,`apellidos`,`dni`,`direccion`,`ciudad`,`sexo`,`telefono`,`celular`) values (1,2,'Rosa modificado','mamani','61651','av. los andes','sicuani','femenino','651651','651615'),(2,4,'mirian ','quispe','742335','AV. bracil','puno','femenino','1565545','965847123'),(3,5,'lidia','rerina','78459315','av. los andes','iquitos','femenino','932145454','932564474');

UNLOCK TABLES;

/*Table structure for table `compras` */

DROP TABLE IF EXISTS `compras`;

CREATE TABLE `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compras_empleado` (`id_empleado`),
  KEY `fk_compras_proveedor` (`id_proveedor`),
  KEY `fk_compra_prodcuto` (`id_producto`),
  CONSTRAINT `fk_compra_prodcuto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  CONSTRAINT `fk_compras_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`),
  CONSTRAINT `fk_compras_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `compras` */

LOCK TABLES `compras` WRITE;

insert  into `compras`(`id`,`id_producto`,`cantidad`,`precio`,`fecha_compra`,`id_empleado`,`id_proveedor`) values (1,1,100,5,'0000-00-00',1,1),(2,1,5000,10,'0000-00-00',1,1),(3,1,100,5,'2018-12-13',1,1),(4,3,100,5,'2018-12-13',1,2);

UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `configuracion` */

LOCK TABLES `configuracion` WRITE;

insert  into `configuracion`(`id`,`ruc`,`empresa`,`email`,`telefono`,`direccion`,`logo`) values (1,'99999999999','ABC COMPANY modificar','fjsdfsg@gmail.com','9865412337','fdgdfg','assets/static/uploads/descarga (2).jpg');

UNLOCK TABLES;

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(128) NOT NULL,
  `apellidos` varchar(128) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `direccion` varchar(128) DEFAULT NULL,
  `ciudad` varchar(64) DEFAULT NULL,
  `sexo` varchar(12) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_empleados_usuario` (`id_usuario`),
  CONSTRAINT `fk_empleados_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `empleados` */

LOCK TABLES `empleados` WRITE;

insert  into `empleados`(`id`,`id_usuario`,`nombres`,`apellidos`,`dni`,`direccion`,`ciudad`,`sexo`,`telefono`,`celular`) values (1,1,'admin','admin','74521368','AV. BRACIL','sicuani','femenino','986531147','98878451'),(2,3,'Jose modificado','mamani','65165165','av. los andes','sicuani','femenino','986541233','985632147'),(3,6,'ana','mirian','7485223','AV. BRACIL','cusco','femenino','985645631','');

UNLOCK TABLES;

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `descripcion` text,
  `stock` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `codigo` varchar(128) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prodcutos_categoria` (`id_categoria`),
  CONSTRAINT `fk_prodcutos_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `productos` */

LOCK TABLES `productos` WRITE;

insert  into `productos`(`id`,`nombre`,`descripcion`,`stock`,`precio`,`codigo`,`id_categoria`,`fecha_vencimiento`) values (1,'leche gloria','ackvjbscas',-399,5,'kjvskbjvad',1,'2019-01-25'),(2,'Leche nestle','v jksdbkj',-100,NULL,'vksdjb',1,'2018-12-12'),(3,'atun','cvlaskcml',100,5,'lkmvlkds',2,'2018-12-06'),(4,'MIRIAN','mediano',-100,NULL,'9852134',3,'2018-12-11'),(5,'mariana','mediano',NULL,NULL,'5F0006',4,NULL);

UNLOCK TABLES;

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rason_social` varchar(128) NOT NULL,
  `ruc` varchar(8) DEFAULT NULL,
  `direccion` varchar(128) DEFAULT NULL,
  `ciudad` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `actividad_principal` varchar(64) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `representante` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `proveedores` */

LOCK TABLES `proveedores` WRITE;

insert  into `proveedores`(`id`,`rason_social`,`ruc`,`direccion`,`ciudad`,`email`,`actividad_principal`,`telefono`,`representante`) values (1,'Lima distribuidores','65165165','AV. bracil','sicuani','plech_nelida@hotmail.com','comercio y venta','651651651','yo mismo'),(2,'abc company','20145879','av. los andes','cusco','hitari719@gmail.com','comercio y venta','986532147','nohemi'),(3,'Abarrotes juliaca','10234568','AV. BRACIL','arequipa','hitari719@gmail.com','comercio y venta','986541327','maria');

UNLOCK TABLES;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(64) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `clave` varchar(64) DEFAULT NULL,
  `foto` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`id`,`usuario`,`email`,`clave`,`foto`) values (1,'admin','plech_nelida@hotmail.com','d033e22ae348aeb5660fc2140aec35850c4da997','assets/static/uploads/images (1).png'),(2,'61651',NULL,'f845b11d309bd8faa2777f798c4c16a1f5e109cd',NULL),(3,'651651651',NULL,'f9d3fedf1ebe143b288dfcd2b3b8eb9223f07cee',NULL),(4,'742335',NULL,'09255cbbe77d3ab86db3f1e0b30199476bd7574e',NULL),(5,'78459315',NULL,'1a6a66f0b4413e0ef90287f53f613d7636cc44a1',NULL),(6,'7485223',NULL,'8c36c3f108bb8d9958598d5be13d5172ad542ba9',NULL);

UNLOCK TABLES;

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ventas_empleado` (`id_empleado`),
  KEY `fk_ventas_cliente` (`id_cliente`),
  KEY `fk_venta_producto` (`id_producto`),
  CONSTRAINT `fk_venta_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  CONSTRAINT `fk_ventas_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  CONSTRAINT `fk_ventas_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `ventas` */

LOCK TABLES `ventas` WRITE;

insert  into `ventas`(`id`,`id_producto`,`cantidad`,`precio`,`fecha_venta`,`id_empleado`,`id_cliente`) values (1,1,500,100,'0000-00-00',1,1),(2,1,4599,5,'0000-00-00',1,1),(3,1,500,10,'0000-00-00',1,1),(4,4,100,10,'0000-00-00',1,2),(5,2,100,5,'2018-12-14',1,1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
