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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO abogado VALUES("14","435679","1","25");
INSERT INTO abogado VALUES("15","456782","1","29");
INSERT INTO abogado VALUES("16","456789","3","30");
INSERT INTO abogado VALUES("17","467898","4","31");
INSERT INTO abogado VALUES("18","312211","3","37");



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

INSERT INTO aboxex VALUES("14","8","activo");
INSERT INTO aboxex VALUES("14","9","activo");
INSERT INTO aboxex VALUES("14","10","activo");
INSERT INTO aboxex VALUES("14","11","activo");
INSERT INTO aboxex VALUES("14","12","activo");
INSERT INTO aboxex VALUES("14","13","activo");
INSERT INTO aboxex VALUES("14","14","activo");



DROP TABLE IF EXISTS agenda;

CREATE TABLE `agenda` (
  `IdAgen` int(11) NOT NULL AUTO_INCREMENT,
  `IdAbo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`IdAgen`),
  KEY `IdAbo` (`IdAbo`),
  CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`IdAbo`) REFERENCES `abogado` (`IdAbo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO agenda VALUES("21","14","Agenda del abogado senior");



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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

INSERT INTO asignacion VALUES("13","16","14","10-14-2022 12:47:53 ");
INSERT INTO asignacion VALUES("14","18","14","10-14-2022 01:26:38 ");
INSERT INTO asignacion VALUES("15","19","14","10-14-2022 01:29:23 ");
INSERT INTO asignacion VALUES("16","20","14","10-14-2022 01:39:53 ");
INSERT INTO asignacion VALUES("17","22","14","10-14-2022 08:59:24 ");



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
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8mb4;

INSERT INTO bitacora VALUES("178","10-13-2022 09:20:02 ","Actualización del perfil abogado","perfil","2");
INSERT INTO bitacora VALUES("179","10-13-2022 11:43:55 ","Registro Nuevo Abogado","Usuario","2");
INSERT INTO bitacora VALUES("180","10-13-2022 11:46:38 ","Nuevo registro abogado.","abogado","2");
INSERT INTO bitacora VALUES("181","10-13-2022 11:48:29 ","Actualización del perfil abogado","perfil","2");
INSERT INTO bitacora VALUES("182","10-13-2022 11:52:02 ","Registro Nuevo Abogado","Usuario","2");
INSERT INTO bitacora VALUES("183","10-13-2022 11:54:12 ","Nuevo registro abogado.","abogado","2");
INSERT INTO bitacora VALUES("184","10-13-2022 11:55:11 ","Registro Nuevo Abogado","Usuario","2");
INSERT INTO bitacora VALUES("185","10-13-2022 11:57:18 ","Nuevo registro abogado.","abogado","2");
INSERT INTO bitacora VALUES("186","10-14-2022 12:06:30 ","Nueva registro de configuración","configuracion","2");
INSERT INTO bitacora VALUES("187","10-14-2022 12:07:16 ","Eliminación de registro de especialidad.","especialidad","2");
INSERT INTO bitacora VALUES("188","10-14-2022 12:08:28 ","Nueva registro de configuración","configuracion","2");
INSERT INTO bitacora VALUES("189","10-14-2022 12:09:27 ","Nueva registro de configuración","configuracion","2");
INSERT INTO bitacora VALUES("190","10-14-2022 12:10:30 ","Nueva registro de configuración","configuracion","2");
INSERT INTO bitacora VALUES("191","10-14-2022 12:11:18 ","Nueva registro de configuración","configuracion","2");
INSERT INTO bitacora VALUES("192","10-14-2022 12:31:30 ","Solicitud de cita","citas","28");
INSERT INTO bitacora VALUES("193","10-14-2022 12:34:56 ","Actualización del perfil cliente","perfil","28");
INSERT INTO bitacora VALUES("194","10-14-2022 12:47:53 ","Nuevo asignacion de abogado.","asignacion","2");
INSERT INTO bitacora VALUES("195","10-14-2022 12:48:18 ","Actualización de registro de cita","citas","2");
INSERT INTO bitacora VALUES("196","10-14-2022 12:50:09 ","Nuevo expediente.","expediente","2");
INSERT INTO bitacora VALUES("197","10-14-2022 12:54:45 ","Nuevo registro de Evidencia.","Evidencia","2");
INSERT INTO bitacora VALUES("198","10-14-2022 12:55:15 ","Nuevo registro de Evidencia.","Evidencia","2");
INSERT INTO bitacora VALUES("199","10-14-2022 12:57:23 ","Nuevo registro de Documento.","Documento","2");
INSERT INTO bitacora VALUES("200","10-14-2022 12:58:02 ","Nuevo registro de Documento.","Documento","2");
INSERT INTO bitacora VALUES("201","10-14-2022 12:59:20 ","Actualización de registro de un documento","Documento","2");
INSERT INTO bitacora VALUES("202","10-14-2022 12:59:58 ","Actualización de registro de un documento","Documento","2");
INSERT INTO bitacora VALUES("203","10-14-2022 01:01:00 ","Nuevo registro de detalle expediente.","detalleexp","2");
INSERT INTO bitacora VALUES("204","10-14-2022 01:01:37 ","Nuevo registro de detalle expediente.","detalleexp","2");
INSERT INTO bitacora VALUES("205","10-14-2022 01:02:02 ","Nuevo registro de detalle expediente.","detalleexp","2");
INSERT INTO bitacora VALUES("206","10-14-2022 01:02:34 ","Actualización de registro de expediente","expediente","2");
INSERT INTO bitacora VALUES("207","10-14-2022 01:10:55 ","Nuevo expediente.","expediente","2");
INSERT INTO bitacora VALUES("208","10-14-2022 01:11:59 ","Nuevo registro de Evidencia.","Evidencia","2");
INSERT INTO bitacora VALUES("209","10-14-2022 01:12:15 ","Nuevo registro de Evidencia.","Evidencia","2");
INSERT INTO bitacora VALUES("210","10-14-2022 01:12:48 ","Nuevo registro de Documento.","Documento","2");
INSERT INTO bitacora VALUES("211","10-14-2022 01:12:59 ","Eliminación de registro documento.","documento","2");
INSERT INTO bitacora VALUES("212","10-14-2022 01:13:13 ","Nuevo registro de Documento.","Documento","2");
INSERT INTO bitacora VALUES("213","10-14-2022 01:14:26 ","Nuevo registro de Documento.","Documento","2");
INSERT INTO bitacora VALUES("214","10-14-2022 01:15:01 ","Nuevo registro de detalle expediente.","detalleexp","2");
INSERT INTO bitacora VALUES("215","10-14-2022 01:21:28 ","Nuevo expediente.","expediente","2");
INSERT INTO bitacora VALUES("216","10-14-2022 01:25:35 ","Solicitud de cita","citas","4");
INSERT INTO bitacora VALUES("217","10-14-2022 01:26:13 ","Solicitud de cita","citas","4");
INSERT INTO bitacora VALUES("218","10-14-2022 01:26:38 ","Nuevo asignacion de abogado.","asignacion","2");
INSERT INTO bitacora VALUES("219","10-14-2022 01:27:06 ","Actualización de registro de cita","citas","2");
INSERT INTO bitacora VALUES("220","10-14-2022 01:27:43 ","Nuevo desestimación.","desestimarcita","2");
INSERT INTO bitacora VALUES("221","10-14-2022 01:29:10 ","Solicitud de cita","citas","4");
INSERT INTO bitacora VALUES("222","10-14-2022 01:29:23 ","Nuevo asignacion de abogado.","asignacion","2");
INSERT INTO bitacora VALUES("223","10-14-2022 01:32:31 ","Actualización de registro de cita","citas","2");
INSERT INTO bitacora VALUES("224","10-14-2022 01:33:17 ","Nuevo expediente.","expediente","2");
INSERT INTO bitacora VALUES("225","10-14-2022 01:34:01 ","Nuevo registro de detalle expediente.","detalleexp","2");
INSERT INTO bitacora VALUES("226","10-14-2022 01:34:27 ","Nuevo registro de Documento.","Documento","2");
INSERT INTO bitacora VALUES("227","10-14-2022 01:34:48 ","Actualización de registro de expediente","expediente","2");
INSERT INTO bitacora VALUES("228","10-14-2022 01:38:45 ","Solicitud de cita","citas","29");
INSERT INTO bitacora VALUES("229","10-14-2022 01:39:53 ","Nuevo asignacion de abogado.","asignacion","2");
INSERT INTO bitacora VALUES("230","10-14-2022 01:41:59 ","Solicitud de cita","citas","30");
INSERT INTO bitacora VALUES("231","10-14-2022 07:11:36 ","Nuevo expediente.","expediente","2");
INSERT INTO bitacora VALUES("232","10-14-2022 07:16:22 ","Nuevo registro de detalle expediente.","detalleexp","2");
INSERT INTO bitacora VALUES("233","10-14-2022 07:16:58 ","Nuevo registro de Documento.","Documento","2");
INSERT INTO bitacora VALUES("234","10-14-2022 07:18:12 ","Actualización de registro de expediente","expediente","2");
INSERT INTO bitacora VALUES("235","10-14-2022 07:19:34 ","Nuevo expediente.","expediente","2");
INSERT INTO bitacora VALUES("236","10-14-2022 07:20:26 ","Nuevo registro de Evidencia.","Evidencia","2");
INSERT INTO bitacora VALUES("237","10-14-2022 07:21:54 ","Nuevo registro de detalle expediente.","detalleexp","2");
INSERT INTO bitacora VALUES("238","10-14-2022 07:23:02 ","Nuevo registro de Documento.","Documento","2");
INSERT INTO bitacora VALUES("239","10-14-2022 07:23:43 ","Nuevo registro de Documento.","Documento","2");
INSERT INTO bitacora VALUES("240","10-14-2022 07:24:17 ","Nuevo registro de Documento.","Documento","2");
INSERT INTO bitacora VALUES("241","10-14-2022 07:24:45 ","Actualización de registro de un documento","Documento","2");
INSERT INTO bitacora VALUES("242","10-14-2022 07:25:02 ","Actualización de registro de un documento","Documento","2");
INSERT INTO bitacora VALUES("243","10-14-2022 07:38:28 ","Actualización del perfil cliente","perfil","4");
INSERT INTO bitacora VALUES("244","10-14-2022 08:57:33 ","Solicitud de cita","citas","4");
INSERT INTO bitacora VALUES("245","10-14-2022 08:59:24 ","Nuevo asignacion de abogado.","asignacion","2");
INSERT INTO bitacora VALUES("246","10-14-2022 09:00:12 ","Actualización de registro de asignación","asignacion","2");
INSERT INTO bitacora VALUES("247","10-14-2022 09:01:07 ","Actualización de registro de cita","citas","2");
INSERT INTO bitacora VALUES("248","10-14-2022 09:01:31 ","Actualización de registro de cita","citas","2");
INSERT INTO bitacora VALUES("249","10-14-2022 09:01:56 ","Nuevo desestimación.","desestimarcita","2");
INSERT INTO bitacora VALUES("250","10-14-2022 09:03:15 ","Nuevo expediente.","expediente","2");
INSERT INTO bitacora VALUES("251","10-14-2022 09:04:13 ","Nuevo registro de detalle expediente.","detalleexp","2");
INSERT INTO bitacora VALUES("252","10-14-2022 09:04:57 ","Nuevo registro de Evidencia.","Evidencia","2");
INSERT INTO bitacora VALUES("253","10-14-2022 09:05:33 ","Nuevo registro de Documento.","Documento","2");
INSERT INTO bitacora VALUES("254","10-14-2022 09:06:39 ","Actualización de registro de expediente","expediente","2");
INSERT INTO bitacora VALUES("255","10-14-2022 09:16:06 ","Registro Nuevo Abogado","Usuario","2");
INSERT INTO bitacora VALUES("256","10-14-2022 09:17:51 ","Nuevo registro abogado.","abogado","2");
INSERT INTO bitacora VALUES("257","10-14-2022 09:18:36 ","Actualización de registro de numero de colegiación","abogado","2");
INSERT INTO bitacora VALUES("258","10-14-2022 09:33:20 ","Actualización de registro de asignación","asignacion","2");



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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

INSERT INTO citas VALUES("16","2022-10-20","00:33","oficinas del bufete lega","Divorcio","Finalizado","28");
INSERT INTO citas VALUES("17","2022-10-12","16:28","Aun por establecer con abogado y cliente.","Divorcio","atrasado","4");
INSERT INTO citas VALUES("18","2022-10-15","16:29","oficinas del bufete lega","Divorcio","Desestimar","4");
INSERT INTO citas VALUES("19","2022-10-17","16:30","oficinas del bufete lega","asesoramiento por testamento","Finalizado","4");
INSERT INTO citas VALUES("20","2022-10-18","17:00","Aun por establecer con abogado y cliente.","Violencia domestica","En proceso","29");
INSERT INTO citas VALUES("21","2022-10-27","13:30","Aun por establecer con abogado y cliente.","Violencia domestica","activo","30");
INSERT INTO citas VALUES("22","2022-10-17","12:00","","Divorcio","Desestimar","4");



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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO configuracion VALUES("8","Confifuración del abogado Carlos Alejandro Roberto Padilla","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","2");
INSERT INTO configuracion VALUES("10","Configuracion Carlos lazarus","si","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1");
INSERT INTO configuracion VALUES("11","configuración oscar carcamo","si","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","25");
INSERT INTO configuracion VALUES("12","Configuración Erick tronconi","si","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","26");
INSERT INTO configuracion VALUES("13","Configuracion Maryori Chavez","si","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","27");



DROP TABLE IF EXISTS desestimarcita;

CREATE TABLE `desestimarcita` (
  `IdDes` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(100) NOT NULL,
  `IdCita` int(11) NOT NULL,
  PRIMARY KEY (`IdDes`),
  KEY `IdCita` (`IdCita`),
  CONSTRAINT `desestimarcita_ibfk_1` FOREIGN KEY (`IdCita`) REFERENCES `citas` (`IdCita`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO desestimarcita VALUES("14","El cliente aun no esta seguro de empezar el proceso de divorcio.","18");
INSERT INTO desestimarcita VALUES("15"," Por decisión del cliente.","22");



DROP TABLE IF EXISTS detalleexp;

CREATE TABLE `detalleexp` (
  `IdDetal` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` longtext NOT NULL,
  `fechaExp` varchar(100) DEFAULT NULL,
  `IdExp` int(11) NOT NULL,
  PRIMARY KEY (`IdDetal`),
  KEY `IdExp` (`IdExp`),
  CONSTRAINT `detalleexp_ibfk_1` FOREIGN KEY (`IdExp`) REFERENCES `expediente` (`IdExp`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

INSERT INTO detalleexp VALUES("29","Citación del caso el mes de agosto ","10-14-2022 ","8");
INSERT INTO detalleexp VALUES("30","Citación de caso en el mes de octubre","10-14-2022 ","8");
INSERT INTO detalleexp VALUES("31","Resolución de caso mes de septiembre del 2022","10-14-2022 ","8");
INSERT INTO detalleexp VALUES("32","Contestación de demanda  alimenticia en el mes de agosto","10-14-2022 ","9");
INSERT INTO detalleexp VALUES("33","Redacción de testamento para el mes de septiembre.","10-14-2022 ","11");
INSERT INTO detalleexp VALUES("34","Proceso de tramite de carta poder estaría para el mes de octubre 31 del año 2022.","10-14-2022 ","12");
INSERT INTO detalleexp VALUES("35","Primera sección de audiencia, se ejecuta en el mes de diciembre del 2022.","10-14-2022 ","13");
INSERT INTO detalleexp VALUES("36","El próximo mes hay registro","10-14-2022 ","14");



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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO documento VALUES("8","Contestación de demanda","image/jpeg","documentos/Contestacion a Demanda Laboral ( Simulacion).pdf","activo","8");
INSERT INTO documento VALUES("9","Contestación de demanda 2","application/pdf","documentos/Contestacion a Demanda Laboral ( Simulacion).pdf","activo","8");
INSERT INTO documento VALUES("10","Contestación de demanda","application/pdf","documentos/SE PROMUEVE DEMANDA ORDINARIA LABORAL PARA EL PAGO DE SUS PRESTACIONES E INDEMNIZACIONES ","eliminado","9");
INSERT INTO documento VALUES("11","Contestación de demanda","application/pdf","documentos/CONTESTACION DE DEMANDA VIA PROCESO ABREVIADO.pdf","activo","9");
INSERT INTO documento VALUES("12","Contestación de demanda 2","application/pdf","documentos/sepromueve.pdf","activo","9");
INSERT INTO documento VALUES("13","Testamento","application/pdf","documentos/Contestacion a Demanda Laboral ( Simulacion).pdf","activo","11");
INSERT INTO documento VALUES("14","Carta poder previo.","application/pdf","documentos/Contestacion a Demanda Laboral ( Simulacion).pdf","activo","12");
INSERT INTO documento VALUES("15","Primera ejecución de caso.","image/png","documentos/Contestacion a Demanda Laboral ( Simulacion).pdf","activo","13");
INSERT INTO documento VALUES("16","Carta poder previo.","image/jpeg","documentos/sepromueve.pdf","activo","13");
INSERT INTO documento VALUES("17","Segunda ejecución legal.","image/jpeg","documentos/images (9).jpg","activo","13");
INSERT INTO documento VALUES("18","documento 1","application/pdf","documentos/CONTESTACION DE DEMANDA VIA PROCESO ABREVIADO.pdf","activo","14");



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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

INSERT INTO evento VALUES("28","Nueva solicitud","#FFD700","2022-10-14 00:47:53","2022-10-14 00:47:53","Contacta con el cliente para confirmar la cita","21");
INSERT INTO evento VALUES("29","Cita con cliente","#0071c5","2022-10-20 00:33:00","2022-10-20 00:33:00","cita con cliente","21");
INSERT INTO evento VALUES("30","Nueva solicitud","#FFD700","2022-10-14 01:26:38","2022-10-14 01:26:38","Contacta con el cliente para confirmar la cita","21");
INSERT INTO evento VALUES("31","Cita con cliente","#0071c5","2022-10-15 16:29:00","2022-10-15 16:29:00","cita con cliente","21");
INSERT INTO evento VALUES("32","Nueva solicitud","#FFD700","2022-10-14 01:29:23","2022-10-14 01:29:23","Contacta con el cliente para confirmar la cita","21");
INSERT INTO evento VALUES("33","Cita con cliente","#0071c5","2022-10-17 16:30:00","2022-10-17 16:30:00","cita con cliente","21");
INSERT INTO evento VALUES("34","Nueva solicitud","#FFD700","2022-10-14 01:39:53","2022-10-14 01:39:53","Contacta con el cliente para confirmar la cita","21");
INSERT INTO evento VALUES("35","Nueva solicitud","#FFD700","2022-10-14 08:59:24","2022-10-14 08:59:24","Contacta con el cliente para confirmar la cita","21");
INSERT INTO evento VALUES("36","Cita con cliente","#0071c5","2022-10-17 12:00:00","2022-10-17 12:00:00","cita con cliente","21");
INSERT INTO evento VALUES("37","Cita con cliente","#0071c5","2022-10-17 12:00:00","2022-10-17 12:00:00","cita con cliente","21");



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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

INSERT INTO evidencia VALUES("20","Evidencia 1","image/jpeg","evidencia/images (4).jpg","activo","8");
INSERT INTO evidencia VALUES("21","Evidencia 2","image/jpeg","evidencia/images (16).jpg","activo","8");
INSERT INTO evidencia VALUES("22","Evidencia 1","image/jpeg","evidencia/pension-alimenticia.jpg","activo","9");
INSERT INTO evidencia VALUES("23","Evidencia 2","image/jpeg","evidencia/images (7).jpg","activo","9");
INSERT INTO evidencia VALUES("24","Prueba de accidente de transito.","image/jpeg","evidencia/images (3).jpg","activo","13");
INSERT INTO evidencia VALUES("25","evidencia 1","application/pdf","evidencia/Contestacion a Demanda Laboral ( Simulacion).pdf","activo","14");



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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO expediente VALUES("8","Caso Divorcio Jorge Mesa","caso","finalizado","28","6");
INSERT INTO expediente VALUES("9"," Caso pensión alimenticia  Carlos Rodriguez","caso","activo","28","1");
INSERT INTO expediente VALUES("10","Tramite carta legal Jorge Mesa","tramite","activo","28","10");
INSERT INTO expediente VALUES("11","Testamento Maria Carcamo","tramite","finalizado","4","5");
INSERT INTO expediente VALUES("12","Tramite Carta poder de Ericka LIcona","tramite","activo","29","8");
INSERT INTO expediente VALUES("13","Caso accidente de transito.","caso","activo","29","12");
INSERT INTO expediente VALUES("14","Caso Divorcio.","caso","finalizado","4","4");



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
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4;

INSERT INTO notificacion VALUES("116","Nueva solicitud de cita legal","Divorcio","2022-10-20 00:33:00","leido","2");
INSERT INTO notificacion VALUES("117","Nueva asignación de cita con cliente","Contactar con cliente para confirmación de cita","2022-10-14 00:47:53","leido","2");
INSERT INTO notificacion VALUES("118","Noticia del expediente","Citación del caso el mes de agosto ","2022-10-14 01:01:00","leido","28");
INSERT INTO notificacion VALUES("119","Noticia del expediente","Citación de caso en el mes de octubre","2022-10-14 01:01:37","leido","28");
INSERT INTO notificacion VALUES("120","Noticia del expediente","Resolución de caso mes de septiembre del 2022","2022-10-14 01:02:02","leido","28");
INSERT INTO notificacion VALUES("121","Noticia del expediente","Contestación de demanda  alimenticia en el mes de agosto","2022-10-14 01:15:01","leido","28");
INSERT INTO notificacion VALUES("122","Nueva solicitud de cita legal","Divorcio","2022-10-12 16:28:00","leido","2");
INSERT INTO notificacion VALUES("123","Cita sin seguimiento","Revisar las citas asignadas. Existe cita sin seguimiento.","2022-10-14 01:25:46","leido","2");
INSERT INTO notificacion VALUES("124","Nueva solicitud de cita legal","Divorcio","2022-10-15 16:29:00","leido","2");
INSERT INTO notificacion VALUES("125","Nueva asignación de cita con cliente","Contactar con cliente para confirmación de cita","2022-10-14 01:26:38","leido","2");
INSERT INTO notificacion VALUES("126","Cita desestimada","El cliente aun no esta seguro de empezar el proceso de divorcio.","2022-10-14 01:27:43","leido","2");
INSERT INTO notificacion VALUES("127","Nueva solicitud de cita legal","asesoramiento por testamento","2022-10-17 16:30:00","leido","2");
INSERT INTO notificacion VALUES("128","Nueva asignación de cita con cliente","Contactar con cliente para confirmación de cita","2022-10-14 01:29:23","leido","2");
INSERT INTO notificacion VALUES("129","Noticia del expediente","Redacción de testamento para el mes de septiembre.","2022-10-14 01:34:01","leido","4");
INSERT INTO notificacion VALUES("130","Nueva solicitud de cita legal","Violencia domestica","2022-10-18 17:00:00","leido","2");
INSERT INTO notificacion VALUES("131","Nueva asignación de cita con cliente","Contactar con cliente para confirmación de cita","2022-10-14 01:39:53","leido","2");
INSERT INTO notificacion VALUES("132","Nueva solicitud de cita legal","Violencia domestica","2022-10-27 13:30:00","leido","2");
INSERT INTO notificacion VALUES("133","Noticia del expediente","Proceso de tramite de carta poder estaría para el mes de octubre 31 del año 2022.","2022-10-14 07:16:22","no leido","29");
INSERT INTO notificacion VALUES("134","Noticia del expediente","Primera sección de audiencia, se ejecuta en el mes de diciembre del 2022.","2022-10-14 07:21:54","no leido","29");
INSERT INTO notificacion VALUES("135","Nueva solicitud de cita legal","Divorcio","2022-10-17 12:00:00","leido","2");
INSERT INTO notificacion VALUES("136","Nueva asignación de cita con cliente","Contactar con cliente para confirmación de cita","2022-10-14 08:59:24","leido","2");
INSERT INTO notificacion VALUES("137","Cita desestimada"," Por decisión del cliente.","2022-10-14 09:01:56","leido","2");
INSERT INTO notificacion VALUES("138","Noticia del expediente","El próximo mes hay registro","2022-10-14 09:04:13","leido","4");



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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

INSERT INTO perfil VALUES("25","Carlos","Alejandro","Rodriguez","Padilla","(+504) 22348-902","(+504) 98679-080","Colonia 21 d octubre bloque 2, casa 34567","0801-1996-25678","1","1990-11-20","Abogado","Masculino","","2");
INSERT INTO perfil VALUES("26","Daniel","Alejandro","Pacheco","Reyes","(+504) 22348-902","(+504) 98679-080","Colonia 21 d octubre bloque 2, casa 34567","0801-1996-25678","1","","","Masculino","","3");
INSERT INTO perfil VALUES("27","Maria","Isabel","Carcamo","Perez","(+504) 22348-902","(+504) 98679-080","Colonia 21 d octubre bloque 2, casa 34567","0801-1996-25678","1","1993-06-14","Maestra","Femenino","","4");
INSERT INTO perfil VALUES("28","Carlos","Roberto","Lazarus","Reyes","(+504) 22348-902","(+504) 98679-080","Colonia 21 d octubre bloque 2, casa 34567","0801-1996-25678","1","","","Masculino","","1");
INSERT INTO perfil VALUES("29","Oscar","Daniel","Carcamo","Tronconii","(+504) 22645-845","(+504) 98784-656","Colonia cerro grande, bloque 4a, casa 4567","0801-1980-45232","1","1980-11-12","Abogado","Masculino"," ","25");
INSERT INTO perfil VALUES("30","Erick","Santhiago","Troconi","Troconi","(+504) 22438-421","(+504) 98989-898","Colonia cerro grande, bloque 4a, casa 4567","0819-1970-20659","1","1970-06-13","Abogado","Masculino"," ","26");
INSERT INTO perfil VALUES("31","Maryoni ","Danessy","Chavez","Tronconi","(+504) 22568-974","(+504) 97979-797","Colonia cerro grande, bloque 4a, casa 4567","0401-2000-45645","1","2000-11-13","Abogado","Masculino"," ","27");
INSERT INTO perfil VALUES("32","Jorge","Antonio","Mesa","Flores","(+504) 22568-974","(+504) 97979-797","Colonia cerro grande, bloque 4a, casa 46787","0801-1996-25678","1","","Ingeniero en Negocios","Masculino","","28");
INSERT INTO perfil VALUES("33","Ericka ","Fabiola","Licona","Diaz","","","","","4","","","Femenino","","29");
INSERT INTO perfil VALUES("36","Meli","Denysse","Asti","Tronconi","","","","","1","","","Femenino","","30");
INSERT INTO perfil VALUES("37","x1","","x2","","(+504) 23313-122","(+504) 90990-00_","","9801-1231-23123","1","1990-09-13","Abogado","Masculino"," ","31");



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
) ENGINE=InnoDB AUTO_INCREMENT=10004 DEFAULT CHARSET=utf8mb4;

INSERT INTO recibo VALUES("10001","Jorge Antonio Mesa Flores","CINCO MIL LEMPIRAS","5000","Asesoramiento por demanda de divorcio.","0000-00-00 00:00:00","recibos/JorgeMesa14-10-2022 .pdf","28","14");
INSERT INTO recibo VALUES("10002","Maria Isabel Carcamo Perez","CINCO MIL LEMPIRAS","5000","Asesoramiento por creación de testamento","0000-00-00 00:00:00","recibos/MariaCarcamo14-10-2022 .pdf","4","14");
INSERT INTO recibo VALUES("10003","Maria Isabel Carcamo Perez","CINCO MIL LEMPIRAS","5000","ASESORIA EN CASO DE DIVORCIO","0000-00-00 00:00:00","recibos/MariaCarcamo14-10-2022 .pdf","4","14");



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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario VALUES("1","danielxcanales@hotmail.com","SwKYM14bNgng0qMCjTkxSw==","4","","1234","activo","04/05/2011");
INSERT INTO usuario VALUES("2","abog1@gmail.com","SwKYM14bNgng0qMCjTkxSw==","3","creador","1234","activo","04/05/2016");
INSERT INTO usuario VALUES("3","admin1@gmail.com","SwKYM14bNgng0qMCjTkxSw==","2","creador","1234","activo","10-13-2022 11:55:11");
INSERT INTO usuario VALUES("4","cliente1@gmail.com","SwKYM14bNgng0qMCjTkxSw==","1","","1234","activo","10-13-2022 11:55:11");
INSERT INTO usuario VALUES("25","abog2@gmail.com","SwKYM14bNgng0qMCjTkxSw==","3","","0","activo","10-13-2022 11:43:55 ");
INSERT INTO usuario VALUES("26","abog3@gmail.com","SwKYM14bNgng0qMCjTkxSw==","3","","0","activo","10-13-2022 11:52:02 ");
INSERT INTO usuario VALUES("27","abog4@gmail.com","SwKYM14bNgng0qMCjTkxSw==","3","","0","activo","10-13-2022 11:55:11 ");
INSERT INTO usuario VALUES("28","cliente2@gmail.com","SwKYM14bNgng0qMCjTkxSw==","1","","0","activo","10-13-2022 11:55:11");
INSERT INTO usuario VALUES("29","cliente3@gmail.com","SwKYM14bNgng0qMCjTkxSw==","1","","0","activo","10-13-2022 11:55:11");
INSERT INTO usuario VALUES("30","cliente4@gmail.com","SwKYM14bNgng0qMCjTkxSw==","1","","0","activo","10-13-2022 11:55:11");
INSERT INTO usuario VALUES("31","abog5@gmail.com","SwKYM14bNgng0qMCjTkxSw==","3","","0","activo","10-14-2022 09:16:06 ");



SET FOREIGN_KEY_CHECKS=1;