/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.15-log : Database - bdbiblioteca
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdbiblioteca` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bdbiblioteca`;

/*Table structure for table `autores` */

DROP TABLE IF EXISTS `autores`;

CREATE TABLE `autores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `nacionalidad` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `autores` */

LOCK TABLES `autores` WRITE;

insert  into `autores`(`id`,`nombre`,`nacionalidad`) values (1,'cesar vallejo','peruano'),(2,'ricardo palma','peruano'),(3,'carlos ugarte','chileno'),(4,'pablo pinto','colombiano'),(5,'carla merino','argentino');

UNLOCK TABLES;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `clientes` */

LOCK TABLES `clientes` WRITE;

insert  into `clientes`(`id`,`nombres`,`apellidos`,`dni`,`direccion`,`ciudad`,`sexo`,`telefono`,`celular`) values (1,'kevin takeshi','huallpa pari','78754215','dos de mayo','sicuani','masculino','854213254','985425458'),(2,'elisban','florez huillca','75485214','av. canchis','sicuani','masculino','985421547','985465858'),(3,'roger','condori checori','85475845','av. alianza','sicuani','masculino','985658568','963214587'),(4,'nataly','nina condori','78542154','confederacion','sicuani','femenino','985623586','958745631'),(6,'roxana','montalvo florez','78456325','dos de mayo','sicuani','femenino','98565874','96525555'),(7,'pablo','roque puma','85478548','jr. tacna','sicuani','masculino','854756585','985658569'),(8,'jose','puma noa','78451245','av. cusco','combapata','masculino','956852585','985658568');

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

insert  into `configuracion`(`id`,`ruc`,`empresa`,`email`,`telefono`,`direccion`,`logo`) values (1,'85421548','MATEO PUMACAHUA','admin@hotmail.com','958658585','AV. arequipa','assets/static/uploads/images (13).jpg');

UNLOCK TABLES;

/*Table structure for table `editoriales` */

DROP TABLE IF EXISTS `editoriales`;

CREATE TABLE `editoriales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `editoriales` */

LOCK TABLES `editoriales` WRITE;

insert  into `editoriales`(`id`,`nombre`) values (1,'el triunfo'),(2,'santillana s.a.'),(3,'consorcio corporacion grafica navarrete'),(4,'impacto cultural editores s.a.c.'),(5,'editorial coveñas'),(6,'editorial rubiños');

UNLOCK TABLES;

/*Table structure for table `generos` */

DROP TABLE IF EXISTS `generos`;

CREATE TABLE `generos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `generos` */

LOCK TABLES `generos` WRITE;

insert  into `generos`(`id`,`nombre`) values (1,'narrativo'),(3,'historico'),(4,'novela'),(5,'cientifico'),(6,'comedia');

UNLOCK TABLES;

/*Table structure for table `libros` */

DROP TABLE IF EXISTS `libros`;

CREATE TABLE `libros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `portada` varchar(64) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_editorial` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `edicion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_libros_genero` (`id_genero`),
  KEY `fk_libros_autor` (`id_autor`),
  KEY `fk_libros_editorial` (`id_editorial`),
  CONSTRAINT `fk_libros_autor` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id`),
  CONSTRAINT `fk_libros_editorial` FOREIGN KEY (`id_editorial`) REFERENCES `editoriales` (`id`),
  CONSTRAINT `fk_libros_genero` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `libros` */

LOCK TABLES `libros` WRITE;

insert  into `libros`(`id`,`nombre`,`descripcion`,`portada`,`cantidad`,`id_genero`,`id_editorial`,`id_autor`,`edicion`) values (1,'aritmetica','Este libro fue traido a esta biblioteca en buenas condiciones','assets/static/uploads/',10,5,1,3,1990),(2,'lenguaje','en buen estado','assets/static/uploads/',20,1,2,2,2009),(3,'biologia','en buen estado','assets/static/uploads/',2,5,5,5,2000),(4,'fisica','en buen estado','assets/static/uploads/',5,5,6,3,2010),(5,'quimica','en buen estado','assets/static/uploads/',10,5,3,2,2013),(6,'geometria','en buen estado','assets/static/uploads/',8,5,2,4,2012),(7,'taller de base de datos','kolp','assets/static/uploads/',2,6,4,3,2002);

UNLOCK TABLES;

/*Table structure for table `prestamos` */

DROP TABLE IF EXISTS `prestamos`;

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `abservacion` varchar(128) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prestamos_cliente` (`id_cliente`),
  KEY `fk_prestamos_libro` (`id_libro`),
  CONSTRAINT `fk_prestamos_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  CONSTRAINT `fk_prestamos_libro` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `prestamos` */

LOCK TABLES `prestamos` WRITE;

insert  into `prestamos`(`id`,`fecha`,`abservacion`,`id_cliente`,`id_libro`,`precio`) values (1,'2018-12-17','entregado en buen estado',1,1,NULL),(2,'2018-12-17','en buen estado',4,3,NULL),(3,'2018-12-17','en buen estado',6,4,NULL),(4,'2018-12-17','en buen estado',8,1,NULL),(5,'2018-12-17','en buen estado',4,1,NULL),(6,'2018-12-17','en buen estado',2,3,NULL),(7,'2018-12-17','en buen estado',1,4,NULL),(8,'2018-12-17','en buen estado',3,1,NULL),(9,'2018-12-17','en buen estado',7,3,NULL),(10,'2018-12-17','en buen estado',1,4,NULL),(11,'2018-12-17','en buen estado',6,7,NULL),(12,'2018-12-17','en buen estado',8,7,NULL),(13,'2018-12-17','en buen estado',3,1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`id`,`usuario`,`email`,`clave`,`foto`) values (2,'admin','admin@hotmail.com','d033e22ae348aeb5660fc2140aec35850c4da997','assets/static/uploads/batman_25-wallpaper-1920x1080.jpg'),(3,'antony','kleytonhq@hotmail.com','1799296195846afeef14df836a5db11994803780','assets/static/uploads/prince royce.jpg');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
