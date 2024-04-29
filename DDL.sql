-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla multiselect.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla multiselect.clientes: ~3 rows (aproximadamente)
DELETE FROM `clientes`;
INSERT INTO `clientes` (`id_cliente`, `nombre`) VALUES
	(1, 'Juan'),
	(2, 'Manuel'),
	(3, 'Patricio');

-- Volcando estructura para tabla multiselect.motorizado
CREATE TABLE IF NOT EXISTS `motorizado` (
  `id_motorizado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_motorizado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla multiselect.motorizado: ~1 rows (aproximadamente)
DELETE FROM `motorizado`;
INSERT INTO `motorizado` (`id_motorizado`, `nombre`) VALUES
	(1, 'Motorizado');

-- Volcando estructura para tabla multiselect.viandas
CREATE TABLE IF NOT EXISTS `viandas` (
  `id_vianda` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_motorizado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vianda`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_motorizado` (`id_motorizado`),
  CONSTRAINT `viandas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  CONSTRAINT `viandas_ibfk_2` FOREIGN KEY (`id_motorizado`) REFERENCES `motorizado` (`id_motorizado`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla multiselect.viandas: ~11 rows (aproximadamente)
DELETE FROM `viandas`;
INSERT INTO `viandas` (`id_vianda`, `id_cliente`, `id_motorizado`) VALUES
	(1, 2, 1),
	(2, 1, 1),
	(3, 2, 1),
	(4, 3, 1),
	(5, 2, 1),
	(6, 1, 1),
	(7, 1, 1),
	(8, 2, 1),
	(9, 3, 1),
	(10, 2, 1),
	(11, 3, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
