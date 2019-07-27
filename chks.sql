-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.58-log - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных check
CREATE DATABASE IF NOT EXISTS `check` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `check`;

-- Дамп структуры для таблица check.chek_otpravki
CREATE TABLE IF NOT EXISTS `chek_otpravki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomer_cheka` int(11) DEFAULT NULL,
  `data_otpravki` date DEFAULT NULL,
  `nomer_otslejivanie` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы check.chek_otpravki: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `chek_otpravki` DISABLE KEYS */;
/*!40000 ALTER TABLE `chek_otpravki` ENABLE KEYS */;

-- Дамп структуры для таблица check.jurnal
CREATE TABLE IF NOT EXISTS `jurnal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazvanie` varchar(255) DEFAULT NULL,
  `nomer_jurnala` int(11) DEFAULT NULL,
  `data_vixoda` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы check.jurnal: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `jurnal` DISABLE KEYS */;
/*!40000 ALTER TABLE `jurnal` ENABLE KEYS */;

-- Дамп структуры для таблица check.podpischik
CREATE TABLE IF NOT EXISTS `podpischik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы check.podpischik: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `podpischik` DISABLE KEYS */;
INSERT INTO `podpischik` (`id`, `fio`, `adres`) VALUES
	(1, 'Adreev Sergey Dmitrivich', 'Kazakhstan Astan'),
	(2, 'Suleymanov Aman Javlonovich', 'Uzbekistan Fergana'),
	(3, 'Juraev Holmat Rustamovich', 'Uzbekistan Tashkent');
/*!40000 ALTER TABLE `podpischik` ENABLE KEYS */;

-- Дамп структуры для таблица check.podpiska
CREATE TABLE IF NOT EXISTS `podpiska` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_nachala` date DEFAULT NULL,
  `srok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы check.podpiska: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `podpiska` DISABLE KEYS */;
INSERT INTO `podpiska` (`id`, `data_nachala`, `srok`) VALUES
	(1, '2019-07-01', 5),
	(2, '2019-07-21', 7),
	(3, '2019-07-21', 7),
	(4, '2019-07-22', 2);
/*!40000 ALTER TABLE `podpiska` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
