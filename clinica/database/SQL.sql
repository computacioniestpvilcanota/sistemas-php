/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.15-log : Database - botica
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`botica` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `botica`;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `categorias` */

LOCK TABLES `categorias` WRITE;

insert  into `categorias`(`id`,`nombre`) values (1,'Pastilas'),(2,'Jarabes'),(3,'Tonicos'),(4,'Tabletas');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `clientes` */

LOCK TABLES `clientes` WRITE;

insert  into `clientes`(`id`,`id_usuario`,`nombres`,`apellidos`,`dni`,`direccion`,`ciudad`,`sexo`,`telefono`,`celular`) values (1,2,'antonio','paucar','76869406','lima','sicuani','femenino','987548545','987456123'),(5,6,'ROCI8','asdasdasdasd','76869406','lima','sicuani','femenino','987548545','987654321');

UNLOCK TABLES;

/*Table structure for table `compras` */

DROP TABLE IF EXISTS `compras`;

CREATE TABLE `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_medicina` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compras_empleado` (`id_empleado`),
  KEY `fk_compras_proveedor` (`id_proveedor`),
  KEY `fk_compra_prodcuto` (`id_medicina`),
  CONSTRAINT `fk_compra_prodcuto` FOREIGN KEY (`id_medicina`) REFERENCES `medicinas` (`id`),
  CONSTRAINT `fk_compras_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`),
  CONSTRAINT `fk_compras_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `compras` */

LOCK TABLES `compras` WRITE;

insert  into `compras`(`id`,`id_medicina`,`cantidad`,`precio`,`fecha_compra`,`id_empleado`,`id_proveedor`) values (1,2,20,150,'0000-00-00',1,1),(2,2,20,150,'0000-00-00',1,1),(3,2,50,150,'0000-00-00',1,1),(4,2,80,150,'0000-00-00',1,1),(5,2,20,20,'0000-00-00',1,1),(6,1,1000,20,'0000-00-00',1,1),(7,2,50000,10,'2018-12-13',1,1),(8,4,500,10,'2018-12-13',1,1),(9,3,8000,10,'2018-12-13',1,1),(10,6,4,3.5,'2018-12-17',1,1),(11,6,20,10,'2018-12-17',1,3);

UNLOCK TABLES;

/*Table structure for table `configuracion` */

DROP TABLE IF EXISTS `configuracion`;

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(12) DEFAULT NULL,
  `empresa` varchar(128) DEFAULT NULL,
  `eamil` varchar(64) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `direccion` varchar(128) DEFAULT NULL,
  `logo` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `configuracion` */

LOCK TABLES `configuracion` WRITE;

insert  into `configuracion`(`id`,`ruc`,`empresa`,`eamil`,`telefono`,`direccion`,`logo`) values (1,'99999999999','ABC COMPANY',NULL,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `empleados` */

LOCK TABLES `empleados` WRITE;

insert  into `empleados`(`id`,`id_usuario`,`nombres`,`apellidos`,`dni`,`direccion`,`ciudad`,`sexo`,`telefono`,`celular`) values (1,1,'admin','admin','','','','','','');

UNLOCK TABLES;

/*Table structure for table `medicinas` */

DROP TABLE IF EXISTS `medicinas`;

CREATE TABLE `medicinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `descripcion` text,
  `stock` int(11) DEFAULT NULL,
  `codigo` varchar(128) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_medicinas_categoria` (`id_categoria`),
  CONSTRAINT `fk_medicinas_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `medicinas` */

LOCK TABLES `medicinas` WRITE;

insert  into `medicinas`(`id`,`nombre`,`descripcion`,`stock`,`codigo`,`id_categoria`,`precio`) values (1,'Medicina faborita','dbsb',-410,'bsdbs',3,20),(2,'sdvs','vsdvsdvv',49750,'vsdvsd',2,10),(3,'Naproxeno','kvjnalkhbaskjhbvkjhba',7800,'vsdvsd',1,10),(4,'Doloaproxol','vkdj',-100,'0001',1,10),(5,'DOLOFARMALAN','ES MEDICAMENTO PARA DOLORES',NULL,'0002',1,NULL),(6,'sildenafilo','ssssssss',24,'0003',1,10);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `proveedores` */

LOCK TABLES `proveedores` WRITE;

insert  into `proveedores`(`id`,`rason_social`,`ruc`,`direccion`,`ciudad`,`email`,`actividad_principal`,`telefono`,`representante`) values (1,'DROGUERIA','32163126','av.sicuani','vsavasv','florez01elis@gmail.com','vas','651','Elizban'),(2,'MARCOS','00000445','lima','combapata','vdsv@as.com','reportes','987548545','JHON'),(3,'DIMEXA','00000445','lima','sicuani','florez01elis@gmail.com','reportes','987548545','WILBER'),(4,'FARMA INDUSTRIA','00000445','lima','VSDV','vdsv@as.com','reportes','987548545','MAGALY'),(5,'MEDI FARMA','00000445','lima','VSDV','rosita_2055@hotmai.com','reportes','987548545','ROSARIO'),(6,'TEVA','00000445','AV. arequipa','combapata','Elisbanflorez0118@gmail.com','reportes','987548545','ROSARIO');

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

insert  into `usuarios`(`id`,`usuario`,`email`,`clave`,`foto`) values (1,'admin','florez01elis@gmail.com','d033e22ae348aeb5660fc2140aec35850c4da997','assets/static/uploads/descarga (1).jpg'),(2,'76869406',NULL,'16957d00892f4d34663fe714a4e7a5761fa3fcc7',NULL),(3,'VDSV',NULL,'52c987e50d757e6c773c8d60c7acc854d5c87766',NULL),(4,'76869406',NULL,'16957d00892f4d34663fe714a4e7a5761fa3fcc7',NULL),(5,'76869406',NULL,'16957d00892f4d34663fe714a4e7a5761fa3fcc7',NULL),(6,'76869406',NULL,'16957d00892f4d34663fe714a4e7a5761fa3fcc7',NULL);

UNLOCK TABLES;

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_medicina` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ventas_empleado` (`id_empleado`),
  KEY `fk_ventas_cliente` (`id_cliente`),
  KEY `fk_venta_medicina` (`id_medicina`),
  CONSTRAINT `fk_venta_medicina` FOREIGN KEY (`id_medicina`) REFERENCES `medicinas` (`id`),
  CONSTRAINT `fk_ventas_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  CONSTRAINT `fk_ventas_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `ventas` */

LOCK TABLES `ventas` WRITE;

insert  into `ventas`(`id`,`id_medicina`,`cantidad`,`precio`,`fecha_venta`,`id_empleado`,`id_cliente`) values (1,2,20,150,'0000-00-00',1,1),(2,2,400,20,'0000-00-00',1,1),(3,1,400,10,'0000-00-00',1,1),(4,1,10,10,'2018-12-13',1,1),(5,1,1000,10,'2018-12-13',1,1),(6,3,200,10,'2018-12-13',1,1),(7,4,600,10,'2018-12-13',1,1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
