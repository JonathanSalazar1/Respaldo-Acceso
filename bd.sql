-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for qr
CREATE DATABASE IF NOT EXISTS `qr` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `qr`;


-- Dumping structure for table qr.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `NoEmp` int(5) NOT NULL,
  `Grado` varchar(10) NOT NULL,
  `NombreCompleto` varchar(60) NOT NULL,
  `Adscripcion` varchar(80) NOT NULL,
  `Genero` varchar(80) NOT NULL,
  `Bloque` varchar(80) NOT NULL,
  `Estatus` varchar(50) NOT NULL,
  `Institucion` varchar(80) NOT NULL,
  `Situacion` varchar(80) NOT NULL,
  `Observaciones` varchar(200) NOT NULL,
  PRIMARY KEY (`NoEmp`),
  UNIQUE KEY `NoEmp` (`NoEmp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table qr.empleados: ~1 rows (approximately)
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` (`NoEmp`, `Grado`, `NombreCompleto`, `Adscripcion`, `Genero`, `Bloque`, `Estatus`, `Institucion`, `Situacion`, `Observaciones`) VALUES
	(538, 'Policia', 'Pedro Alcantara Gomez', 'adscrito', 'Hombre', 'Bloque 2', 'Activo', 'Fuerza Civil', 'Franco', 'Ninguna');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;


-- Dumping structure for table qr.institucion
CREATE TABLE IF NOT EXISTS `institucion` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `NombreInstitucion` varchar(100) NOT NULL,
  `Ano` varchar(10) NOT NULL,
  `logo` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table qr.institucion: ~0 rows (approximately)
/*!40000 ALTER TABLE `institucion` DISABLE KEYS */;
INSERT INTO `institucion` (`id`, `NombreInstitucion`, `Ano`, `logo`) VALUES
	(1, 'I.E TRILCE', '2019', '1558239565.jpg');
/*!40000 ALTER TABLE `institucion` ENABLE KEYS */;


-- Dumping structure for table qr.regasistencia
CREATE TABLE IF NOT EXISTS `regasistencia` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `NoEmp` int(5) NOT NULL,
  `f_entrada` date NOT NULL,
  `h_entrada` time NOT NULL,
  `f_salida` date DEFAULT NULL,
  `h_salida` time DEFAULT NULL,
  `adscripcion` varchar(50) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `placas_vehiculos` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assistance_people_idx` (`NoEmp`),
  CONSTRAINT `fk_assistance_people` FOREIGN KEY (`NoEmp`) REFERENCES `empleados` (`NoEmp`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table qr.regasistencia: ~10 rows (approximately)
/*!40000 ALTER TABLE `regasistencia` DISABLE KEYS */;
INSERT INTO `regasistencia` (`id`, `NoEmp`, `f_entrada`, `h_entrada`, `f_salida`, `h_salida`, `adscripcion`, `estatus`, `placas_vehiculos`, `created_at`, `updated_at`) VALUES
	(1, 538, '0000-00-00', '00:55:33', '0000-00-00', '00:56:03', NULL, NULL, NULL, '2021-07-24 00:55:33', '2021-07-24 00:56:03'),
	(2, 538, '0000-00-00', '04:44:35', '0000-00-00', '04:44:56', NULL, NULL, NULL, '2021-07-26 04:44:35', '2021-07-26 04:44:56'),
	(3, 538, '0000-00-00', '04:50:50', '0000-00-00', '05:54:55', 'adscrito', 'Activo', NULL, '2021-07-26 04:50:50', '2021-07-26 05:54:55'),
	(4, 538, '0000-00-00', '05:55:15', '0000-00-00', '06:05:15', 'adscrito', 'Activo', 'VH345', '2021-07-26 05:55:15', '2021-07-26 06:05:15'),
	(5, 538, '0000-00-00', '06:05:32', '2021-07-26', '06:05:42', 'adscrito', 'Activo', 'VH345', '2021-07-26 06:05:32', '2021-07-26 06:05:42'),
	(6, 538, '2021-07-26', '07:37:55', '2021-07-26', '07:38:54', 'adscrito', 'Activo', 'VH345', '2021-07-26 07:37:55', '2021-07-26 07:38:54'),
	(7, 538, '2021-07-25', '07:39:08', '2021-07-26', '07:39:13', 'adscrito', 'Activo', 'VH345', '2021-07-26 07:39:08', '2021-07-26 07:39:13'),
	(8, 538, '2021-07-24', '07:39:18', '2021-07-26', '07:51:39', 'adscrito', 'Activo', 'VH345', '2021-07-26 07:39:18', '2021-07-26 07:51:39'),
	(9, 538, '2021-07-27', '07:51:42', '2021-07-26', '07:51:45', 'adscrito', 'Activo', 'VH345', '2021-07-26 07:51:42', '2021-07-26 07:51:45'),
	(10, 538, '2021-07-26', '23:41:15', '2021-07-27', '00:10:14', 'adscrito', 'Activo', 'VH345', '2021-07-26 23:41:15', '2021-07-27 00:10:14');
/*!40000 ALTER TABLE `regasistencia` ENABLE KEYS */;


-- Dumping structure for table qr.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `condicion` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table qr.usuarios: ~2 rows (approximately)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `login`, `clave`, `condicion`) VALUES
	(1, 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1),
	(2, 'user', 'user', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Dumping structure for table qr.vehiculos
CREATE TABLE IF NOT EXISTS `vehiculos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `NoEmp` int(5) NOT NULL,
  `NoPlacas` varchar(50) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Vigencia` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_vehiculos_empleados` (`NoEmp`),
  CONSTRAINT `FK_vehiculos_empleados` FOREIGN KEY (`NoEmp`) REFERENCES `empleados` (`NoEmp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table qr.vehiculos: ~0 rows (approximately)
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` (`id`, `NoEmp`, `NoPlacas`, `Marca`, `Modelo`, `Color`, `Vigencia`) VALUES
	(1, 538, 'VH345', 'Volkwagen', 'V234', 'Negro', '2021-07-17');
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
