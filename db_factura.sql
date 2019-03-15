-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.29-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_factura
CREATE DATABASE IF NOT EXISTS `db_factura` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_factura`;

-- Dumping structure for table db_factura.sys_factura_template
CREATE TABLE IF NOT EXISTS `sys_factura_template` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `factura_name` varchar(50) NOT NULL DEFAULT '0',
  `factura_description` varchar(50) NOT NULL DEFAULT '0',
  `factura_tipe_documento` int(11) NOT NULL DEFAULT '0',
  `factura_cliente` int(11) NOT NULL DEFAULT '0',
  `factura_template` text,
  `factura_lineas` int(11) NOT NULL DEFAULT '0',
  `factura_estatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_factura.sys_factura_template: ~0 rows (approximately)
DELETE FROM `sys_factura_template`;
/*!40000 ALTER TABLE `sys_factura_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_factura_template` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
