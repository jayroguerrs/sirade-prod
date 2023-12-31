-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 3.215.99.5    Database: centrumpucp
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paises` (
  `idPais` int NOT NULL AUTO_INCREMENT,
  `nombrePais` varchar(80) NOT NULL,
  `prefijo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idPais`),
  UNIQUE KEY `nombrePais_UNIQUE` (`nombrePais`)
) ENGINE=InnoDB AUTO_INCREMENT=486 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (241,'AFGANISTÁN','93'),(242,'ALBANIA','355'),(243,'ALEMANIA','49'),(244,'ANDORRA','376'),(245,'ANGOLA','244'),(246,'ANGUILA','1 264'),(247,'ANTÁRTIDA','672'),(248,'ANTIGUA Y BARBUDA','1 268'),(249,'ARABIA SAUDITA','966'),(250,'ARGELIA','213'),(251,'ARGENTINA','54'),(252,'ARMENIA','374'),(253,'ARUBA','297'),(254,'AUSTRALIA','61'),(255,'AUSTRIA','43'),(256,'AZERBAIYÁN','994'),(257,'BÉLGICA','32'),(258,'BAHAMAS','1 242'),(259,'BAHREIN','973'),(260,'BANGLADESH','880'),(261,'BARBADOS','1 246'),(262,'BELICE','501'),(263,'BENÍN','229'),(264,'BHUTÁN','975'),(265,'BIELORRUSIA','375'),(266,'BIRMANIA','95'),(267,'BOLIVIA','591'),(268,'BOSNIA Y HERZEGOVINA','387'),(269,'BOTSUANA','267'),(270,'BRASIL','55'),(271,'BRUNÉI','673'),(272,'BULGARIA','359'),(273,'BURKINA FASO','226'),(274,'BURUNDI','257'),(275,'CABO VERDE','238'),(276,'CAMBOYA','855'),(277,'CAMERÚN','237'),(278,'CANADÁ','1'),(279,'CHAD','235'),(280,'CHILE','56'),(281,'CHINA','86'),(282,'CHIPRE','357'),(283,'CIUDAD DEL VATICANO','39'),(284,'COLOMBIA','57'),(285,'COMORAS','269'),(286,'REPÚBLICA DEL CONGO','242'),(287,'REPÚBLICA DEMOCRÁTICA DEL CONGO','243'),(288,'COREA DEL NORTE','850'),(289,'COREA DEL SUR','82'),(290,'COSTA DE MARFIL','225'),(291,'COSTA RICA','506'),(292,'CROACIA','385'),(293,'CUBA','53'),(294,'CURAZAO','5999'),(295,'DINAMARCA','45'),(296,'DOMINICA','1 767'),(297,'ECUADOR','593'),(298,'EGIPTO','20'),(299,'EL SALVADOR','503'),(300,'EMIRATOS ÁRABES UNIDOS','971'),(301,'ERITREA','291'),(302,'ESLOVAQUIA','421'),(303,'ESLOVENIA','386'),(304,'ESPAÑA','34'),(305,'ESTADOS UNIDOS DE AMÉRICA','1'),(306,'ESTONIA','372'),(307,'ETIOPÍA','251'),(308,'FILIPINAS','63'),(309,'FINLANDIA','358'),(310,'FIYI','679'),(311,'FRANCIA','33'),(312,'GABÓN','241'),(313,'GAMBIA','220'),(314,'GEORGIA','995'),(315,'GHANA','233'),(316,'GIBRALTAR','350'),(317,'GRANADA','1 473'),(318,'GRECIA','30'),(319,'GROENLANDIA','299'),(320,'GUADALUPE','590'),(321,'GUAM','1 671'),(322,'GUATEMALA','502'),(323,'GUAYANA FRANCESA','594'),(324,'GUERNSEY','44'),(325,'GUINEA','224'),(326,'GUINEA ECUATORIAL','240'),(327,'GUINEA-BISSAU','245'),(328,'GUYANA','592'),(329,'HAITÍ','509'),(330,'HONDURAS','504'),(331,'HONG KONG','852'),(332,'HUNGRÍA','36'),(333,'INDIA','91'),(334,'INDONESIA','62'),(335,'IRÁN','98'),(336,'IRAK','964'),(337,'IRLANDA','353'),(338,'ISLA DE MAN','44'),(339,'ISLA DE NAVIDAD','61'),(340,'ISLA NORFOLK','672'),(341,'ISLANDIA','354'),(342,'ISLAS BERMUDAS','1 441'),(343,'ISLAS CAIMÁN','1 345'),(344,'ISLAS COCOS (KEELING)','61'),(345,'ISLAS COOK','682'),(346,'ISLAS DE ÅLAND','358'),(347,'ISLAS FEROE','298'),(348,'ISLAS GEORGIAS DEL SUR Y SANDWICH DEL SUR','500'),(349,'ISLAS MALDIVAS','960'),(350,'ISLAS MALVINAS','500'),(351,'ISLAS MARIANAS DEL NORTE','1 670'),(352,'ISLAS MARSHALL','692'),(353,'ISLAS PITCAIRN','870'),(354,'ISLAS SALOMÓN','677'),(355,'ISLAS TURCAS Y CAICOS','1 649'),(356,'ISLAS ULTRAMARINAS MENORES DE ESTADOS UNIDOS','246'),(357,'ISLAS VÍRGENES BRITÁNICAS','1 284'),(358,'ISLAS VÍRGENES DE LOS ESTADOS UNIDOS','1 340'),(359,'ISRAEL','972'),(360,'ITALIA','39'),(361,'JAMAICA','1 876'),(362,'JAPÓN','81'),(363,'JERSEY','44'),(364,'JORDANIA','962'),(365,'KAZAJISTÁN','7'),(366,'KENIA','254'),(367,'KIRGUISTÁN','996'),(368,'KIRIBATI','686'),(369,'KUWAIT','965'),(370,'LÍBANO','961'),(371,'LAOS','856'),(372,'LESOTO','266'),(373,'LETONIA','371'),(374,'LIBERIA','231'),(375,'LIBIA','218'),(376,'LIECHTENSTEIN','423'),(377,'LITUANIA','370'),(378,'LUXEMBURGO','352'),(379,'MÉXICO','52'),(380,'MÓNACO','377'),(381,'MACAO','853'),(382,'MACEDÔNIA','389'),(383,'MADAGASCAR','261'),(384,'MALASIA','60'),(385,'MALAWI','265'),(386,'MALI','223'),(387,'MALTA','356'),(388,'MARRUECOS','212'),(389,'MARTINICA','596'),(390,'MAURICIO','230'),(391,'MAURITANIA','222'),(392,'MAYOTTE','262'),(393,'MICRONESIA','691'),(394,'MOLDAVIA','373'),(395,'MONGOLIA','976'),(396,'MONTENEGRO','382'),(397,'MONTSERRAT','1 664'),(398,'MOZAMBIQUE','258'),(399,'NAMIBIA','264'),(400,'NAURU','674'),(401,'NEPAL','977'),(402,'NICARAGUA','505'),(403,'NIGER','227'),(404,'NIGERIA','234'),(405,'NIUE','683'),(406,'NORUEGA','47'),(407,'NUEVA CALEDONIA','687'),(408,'NUEVA ZELANDA','64'),(409,'OMÁN','968'),(410,'PAÍSES BAJOS','31'),(411,'PAKISTÁN','92'),(412,'PALAU','680'),(413,'PALESTINA','970'),(414,'PANAMÁ','507'),(415,'PAPÚA NUEVA GUINEA','675'),(416,'PARAGUAY','595'),(417,'PERÚ','51'),(418,'POLINESIA FRANCESA','689'),(419,'POLONIA','48'),(420,'PORTUGAL','351'),(421,'PUERTO RICO','1'),(422,'QATAR','974'),(423,'REINO UNIDO','44'),(424,'REPÚBLICA CENTROAFRICANA','236'),(425,'REPÚBLICA CHECA','420'),(426,'REPÚBLICA DOMINICANA','1 809'),(427,'REPÚBLICA DE SUDÁN DEL SUR','211'),(428,'REUNIÓN','262'),(429,'RUANDA','250'),(430,'RUMANÍA','40'),(431,'RUSIA','7'),(432,'SAHARA OCCIDENTAL','212'),(433,'SAMOA','685'),(434,'SAMOA AMERICANA','1 684'),(435,'SAN BARTOLOMÉ','590'),(436,'SAN CRISTÓBAL Y NIEVES','1 869'),(437,'SAN MARINO','378'),(438,'SAN MARTÍN (FRANCIA)','1 599'),(439,'SAN PEDRO Y MIQUELÓN','508'),(440,'SAN VICENTE Y LAS GRANADINAS','1 784'),(441,'SANTA ELENA','290'),(442,'SANTA LUCÍA','1 758'),(443,'SANTO TOMÉ Y PRÍNCIPE','239'),(444,'SENEGAL','221'),(445,'SERBIA','381'),(446,'SEYCHELLES','248'),(447,'SIERRA LEONA','232'),(448,'SINGAPUR','65'),(449,'SINT MAARTEN','1 721'),(450,'SIRIA','963'),(451,'SOMALIA','252'),(452,'SRI LANKA','94'),(453,'SUDÁFRICA','27'),(454,'SUDÁN','249'),(455,'SUECIA','46'),(456,'SUIZA','41'),(457,'SURINÁM','597'),(458,'SVALBARD Y JAN MAYEN','47'),(459,'SWAZILANDIA','268'),(460,'TAYIKISTÁN','992'),(461,'TAILANDIA','66'),(462,'TAIWÁN','886'),(463,'TANZANIA','255'),(464,'TERRITORIO BRITÁNICO DEL OCÉANO ÍNDICO','246'),(465,'TIMOR ORIENTAL','670'),(466,'TOGO','228'),(467,'TOKELAU','690'),(468,'TONGA','676'),(469,'TRINIDAD Y TOBAGO','1 868'),(470,'TUNEZ','216'),(471,'TURKMENISTÁN','993'),(472,'TURQUÍA','90'),(473,'TUVALU','688'),(474,'UCRANIA','380'),(475,'UGANDA','256'),(476,'URUGUAY','598'),(477,'UZBEKISTÁN','998'),(478,'VANUATU','678'),(479,'VENEZUELA','58'),(480,'VIETNAM','84'),(481,'WALLIS Y FUTUNA','681'),(482,'YEMEN','967'),(483,'YIBUTI','253'),(484,'ZAMBIA','260'),(485,'ZIMBABUE','263');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-25 13:34:58
