SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS bufetelegal;

USE bufetelegal;

DROP TABLE IF EXISTS abogado;

CREATE TABLE `abogado` (
  `IdAbo` int(11) NOT NULL AUTO_INCREMENT,
  `nume_abo` varchar(50) NOT NULL,
  `IdEsp` int(11) DEFAULT NULL,
  `IdPer` int(11) NOT NULL,
  PRIMARY KEY (`IdAbo`),
  KEY `IdPer` (`IdPer`),
  KEY `IdEsp` (`IdEsp`),
  CONSTRAINT `abogado_ibfk_1` FOREIGN KEY (`IdPer`) REFERENCES `perfil` (`IdPer`) ON DELETE CASCADE,
  CONSTRAINT `abogado_ibfk_2` FOREIGN KEY (`IdEsp`) REFERENCES `especialidad` (`IdEsp`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS aboxex;

CREATE TABLE `aboxex` (
  `IdAbo` int(11) NOT NULL,
  `IdExp` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`IdAbo`,`IdExp`),
  KEY `IdExp` (`IdExp`),
  CONSTRAINT `aboxex_ibfk_1` FOREIGN KEY (`IdAbo`) REFERENCES `abogado` (`IdAbo`) ON DELETE CASCADE,
  CONSTRAINT `aboxex_ibfk_2` FOREIGN KEY (`IdExp`) REFERENCES `expediente` (`IdExp`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS agenda;

CREATE TABLE `agenda` (
  `IdAgen` int(11) NOT NULL AUTO_INCREMENT,
  `IdAbo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`IdAgen`),
  KEY `IdAbo` (`IdAbo`),
  CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`IdAbo`) REFERENCES `abogado` (`IdAbo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS asignacion;

CREATE TABLE `asignacion` (
  `IdAsig` int(11) NOT NULL AUTO_INCREMENT,
  `IdCita` int(11) NOT NULL,
  `IdAbo` int(11) NOT NULL,
  `fecha_asig` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdAsig`),
  KEY `IdCita` (`IdCita`),
  KEY `IdAbo` (`IdAbo`),
  CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`IdCita`) REFERENCES `citas` (`IdCita`) ON DELETE CASCADE,
  CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`IdAbo`) REFERENCES `abogado` (`IdAbo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS bitacora;

CREATE TABLE `bitacora` (
  `IdBita` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_acti` varchar(70) NOT NULL,
  `actividad` varchar(50) NOT NULL,
  `tabla` varchar(20) NOT NULL,
  `IdUser` int(11) NOT NULL,
  PRIMARY KEY (`IdBita`),
  KEY `IdUser` (`IdUser`),
  CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `usuario` (`IdUser`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS citas;

CREATE TABLE `citas` (
  `IdCita` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(70) NOT NULL,
  `hora` varchar(70) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `IdUser` int(11) NOT NULL,
  PRIMARY KEY (`IdCita`),
  KEY `IdUser` (`IdUser`),
  CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `usuario` (`IdUser`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS configuracion;

CREATE TABLE `configuracion` (
  `IdConfig` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `vista` varchar(20) NOT NULL,
  `Solicitudes` tinyint(1) DEFAULT NULL,
  `Asignacion` tinyint(1) DEFAULT NULL,
  `Miscitas` tinyint(1) DEFAULT NULL,
  `Usuario` tinyint(1) DEFAULT NULL,
  `Archivado` tinyint(1) DEFAULT NULL,
  `Confi` tinyint(1) DEFAULT NULL,
  `Creaexpedi` tinyint(1) DEFAULT NULL,
  `Expediactu` tinyint(1) DEFAULT NULL,
  `Juzgado` tinyint(1) DEFAULT NULL,
  `Agenda` tinyint(1) DEFAULT NULL,
  `Noti` tinyint(1) DEFAULT NULL,
  `Pais` tinyint(1) DEFAULT NULL,
  `Especi` tinyint(1) DEFAULT NULL,
  `Dash` tinyint(1) NOT NULL,
  `Perfil` tinyint(1) NOT NULL,
  `IdUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdConfig`),
  KEY `IdUser` (`IdUser`),
  CONSTRAINT `configuracion_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `usuario` (`IdUser`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS desestimarcita;

CREATE TABLE `desestimarcita` (
  `IdDes` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(100) NOT NULL,
  `IdCita` int(11) NOT NULL,
  PRIMARY KEY (`IdDes`),
  KEY `IdCita` (`IdCita`),
  CONSTRAINT `desestimarcita_ibfk_1` FOREIGN KEY (`IdCita`) REFERENCES `citas` (`IdCita`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS detalleexp;

CREATE TABLE `detalleexp` (
  `IdDetal` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` longtext NOT NULL,
  `fechaExp` varchar(100) DEFAULT NULL,
  `IdExp` int(11) NOT NULL,
  PRIMARY KEY (`IdDetal`),
  KEY `IdExp` (`IdExp`),
  CONSTRAINT `detalleexp_ibfk_1` FOREIGN KEY (`IdExp`) REFERENCES `expediente` (`IdExp`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS documento;

CREATE TABLE `documento` (
  `IdDoc` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `documento` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `IdExp` int(11) NOT NULL,
  PRIMARY KEY (`IdDoc`),
  KEY `IdExp` (`IdExp`),
  CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`IdExp`) REFERENCES `expediente` (`IdExp`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS especialidad;

CREATE TABLE `especialidad` (
  `IdEsp` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IdEsp`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO especialidad VALUES("1","Civil","activo");
INSERT INTO especialidad VALUES("2","Penal","activo");
INSERT INTO especialidad VALUES("3","Coorporativo","activo");
INSERT INTO especialidad VALUES("4","Administrativo","activo");
INSERT INTO especialidad VALUES("5","Laboral","activo");
INSERT INTO especialidad VALUES("6","Notarial","activo");



DROP TABLE IF EXISTS evento;

CREATE TABLE `evento` (
  `IdEven` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `descripcion` varchar(150) NOT NULL,
  `IdAgen` int(11) NOT NULL,
  PRIMARY KEY (`IdEven`),
  KEY `IdAgen` (`IdAgen`),
  CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`IdAgen`) REFERENCES `agenda` (`IdAgen`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS evidencia;

CREATE TABLE `evidencia` (
  `IdEvid` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `evidencia` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `IdExp` int(11) NOT NULL,
  PRIMARY KEY (`IdEvid`),
  KEY `IdExp` (`IdExp`),
  CONSTRAINT `evidencia_ibfk_1` FOREIGN KEY (`IdExp`) REFERENCES `expediente` (`IdExp`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS expediente;

CREATE TABLE `expediente` (
  `IdExp` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `IdJuz` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdExp`),
  KEY `IdUser` (`IdUser`),
  KEY `IdJuz` (`IdJuz`),
  CONSTRAINT `expediente_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `usuario` (`IdUser`) ON DELETE CASCADE,
  CONSTRAINT `expediente_ibfk_2` FOREIGN KEY (`IdJuz`) REFERENCES `juzgado` (`IdJuz`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS juzgado;

CREATE TABLE `juzgado` (
  `IdJuz` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`IdJuz`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO juzgado VALUES("1","Juzgados de Paz","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("2","Juzgados de Familia","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("3","Juzgados de la Niñez y Adolescencia","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("4","Juzgados de lo Contencioso Administrativo","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("5","Juzgados del Trabajo","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("6","Juzgados Contra la Violencia Doméstica","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("7","Juzgados de Ejecución de Penas","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("8","Juzgados de Competencia Nacional en Materia Penal","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("9","Tribunales de Sentencia","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("10","Corte de Apelaciones Mixtas (Penal y Civil)","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("11","Juzgados de Competencia Nacional en Materia Penal","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("12","Cortes de Apelaciones de lo Civil","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("13","Corte Suprema de Justicia","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("14","Cortes de Apelaciones de lo Contencioso Administrativo","En Tegucigalpa","activo");
INSERT INTO juzgado VALUES("15","Juzgados de Inquilinato","En Tegucigalpa","activo");



DROP TABLE IF EXISTS notificacion;

CREATE TABLE `notificacion` (
  `IdNoti` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_noti` datetime DEFAULT NULL,
  `estado` varchar(150) NOT NULL,
  `IdUser` int(11) NOT NULL,
  PRIMARY KEY (`IdNoti`),
  KEY `IdUser` (`IdUser`),
  CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `usuario` (`IdUser`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS pais;

CREATE TABLE `pais` (
  `IdPais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IdPais`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO pais VALUES("1","Honduras","activo");
INSERT INTO pais VALUES("2","Costa Rica","activo");
INSERT INTO pais VALUES("3","El Salvador","activo");
INSERT INTO pais VALUES("4","Estados Unidos","activo");
INSERT INTO pais VALUES("5","Nicaragua","activo");
INSERT INTO pais VALUES("6","Panama","activo");
INSERT INTO pais VALUES("7","Colombia","activo");
INSERT INTO pais VALUES("8","Peru","activo");
INSERT INTO pais VALUES("9","Mexico","activo");
INSERT INTO pais VALUES("10","Canada","activo");
INSERT INTO pais VALUES("11","España","activo");
INSERT INTO pais VALUES("12","Guatemala","activo");



DROP TABLE IF EXISTS perfil;

CREATE TABLE `perfil` (
  `IdPer` int(11) NOT NULL AUTO_INCREMENT,
  `primer_nomb` varchar(15) NOT NULL,
  `segundo_nomb` varchar(15) NOT NULL,
  `primer_ape` varchar(15) NOT NULL,
  `segundo_ape` varchar(15) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `DNI` varchar(25) NOT NULL,
  `IdPais` int(11) NOT NULL,
  `fecha_naci` varchar(50) NOT NULL,
  `ocupacion` varchar(50) DEFAULT NULL,
  `genero` varchar(20) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `IdUser` int(11) NOT NULL,
  PRIMARY KEY (`IdPer`),
  KEY `IdUser` (`IdUser`),
  KEY `IdPais` (`IdPais`),
  CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `usuario` (`IdUser`) ON DELETE CASCADE,
  CONSTRAINT `perfil_ibfk_2` FOREIGN KEY (`IdPais`) REFERENCES `pais` (`IdPais`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS recibo;

CREATE TABLE `recibo` (
  `IdRec` int(11) NOT NULL AUTO_INCREMENT,
  `recibi` varchar(100) DEFAULT NULL,
  `sumanetal` varchar(100) DEFAULT NULL,
  `sumanetan` varchar(100) DEFAULT NULL,
  `concepto` varchar(200) DEFAULT NULL,
  `fechare` datetime DEFAULT NULL,
  `documento` varchar(100) DEFAULT NULL,
  `IdUser` int(11) NOT NULL,
  `IdAbo` int(11) NOT NULL,
  PRIMARY KEY (`IdRec`),
  KEY `IdUser` (`IdUser`),
  KEY `IdAbo` (`IdAbo`),
  CONSTRAINT `recibo_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `usuario` (`IdUser`) ON DELETE CASCADE,
  CONSTRAINT `recibo_ibfk_2` FOREIGN KEY (`IdAbo`) REFERENCES `abogado` (`IdAbo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) NOT NULL,
  `contra` varchar(150) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `two_factor_key` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `fechaingreso` varchar(70) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario VALUES("1","danielxcanales@hotmail.com","SwKYM14bNgng0qMCjTkxSw==","4","","1234","activo","04/05/2011");
INSERT INTO usuario VALUES("2","abog1@gmail.com","SwKYM14bNgng0qMCjTkxSw==","3","creador","1234","activo","04/05/2016");
INSERT INTO usuario VALUES("3","admin1@gmail.com","SwKYM14bNgng0qMCjTkxSw==","2","creador","1234","activo","04/05/2016");
INSERT INTO usuario VALUES("4","cliente1@gmail.com","SwKYM14bNgng0qMCjTkxSw==","1","","1234","activo","04/05/2022");



SET FOREIGN_KEY_CHECKS=1;