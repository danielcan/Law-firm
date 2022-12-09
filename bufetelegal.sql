/**
CREACION DE BASE DE DATOS CREADO POR DANIEL CANALES 
*/
CREATE DATABASE IF NOT EXISTS bufetelegal;

USE bufetelegal;

DROP TABLE IF EXISTS Usuario;
/**TABLA DE USUARIO*/
CREATE TABLE `Usuario` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) NOT NULL,
  `contra` varchar(150) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `two_factor_key` int(11)  NOT NULL,
  `estado` varchar(15) NOT NULL,
  `fechaingreso` varchar(70) NOT NULL,
   PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS Bitacora;

/**creación de  tabla bítacora */
CREATE TABLE `Bitacora` (
  `IdBita` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_acti` varchar(70) NOT NULL,
  `actividad` varchar(50) NOT NULL,
  `tabla` varchar(20) NOT NULL,
  `IdUser` int(11) NOT NULL,
   PRIMARY KEY (`IdBita`),
   FOREIGN KEY (IdUser)  REFERENCES Usuario(IdUser)  ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;



DROP TABLE  Configuracion;
/**creación de  tabla CONFIGURACIÓN */
CREATE TABLE `Configuracion` (
  `IdConfig` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `vista` varchar(20) NOT NULL,
  `Solicitudes` BOOLEAN,
  `Asignacion` BOOLEAN,
  `Miscitas` BOOLEAN,
  `Usuario` BOOLEAN,
  `Archivado` BOOLEAN,
  `Confi` BOOLEAN,
  `Creaexpedi` BOOLEAN,
  `Expediactu`  BOOLEAN,
  `Juzgado` BOOLEAN,
  `Agenda` BOOLEAN,
  `Noti` BOOLEAN,
  `Pais` BOOLEAN,
  `Especi` BOOLEAN,
  `Dash` BOOLEAN,
  `Perfil` BOOLEAN,
  `IdUser` int,
   PRIMARY KEY (`IdConfig`),
   FOREIGN KEY (IdUser)  REFERENCES Usuario(IdUser)  ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS Citas;
/**creación de  tabla citas */
CREATE TABLE `Citas` (
  `IdCita` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(70) NOT NULL,
  `hora` varchar(70) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `IdUser` int(11) NOT NULL,
   PRIMARY KEY (`IdCita`),
   FOREIGN KEY (IdUser) REFERENCES Usuario(IdUser) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS Desestimarcita;
CREATE TABLE `Desestimarcita` (
  `IdDes` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(100) NOT NULL,
  `IdCita` int(11) NOT NULL,
   PRIMARY KEY (`IdDes`),
   FOREIGN KEY (IdCita) REFERENCES Citas(IdCita) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS Juzgado;
/**creación de  tabla juzgado*/
CREATE TABLE `Juzgado` (
  `IdJuz` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200),
  `estado` varchar(100) not null,
   PRIMARY KEY (`IdJuz`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS Expediente;
/**creación de  tabla expediente*/
CREATE TABLE `Expediente` (
  `IdExp` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `IdJuz` int(11),
   PRIMARY KEY (`IdExp`),
   FOREIGN KEY (IdUser) REFERENCES Usuario(IdUser) ON DELETE CASCADE,
   FOREIGN KEY (IdJuz) REFERENCES Juzgado(IdJuz)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS Documento;
/**creación de  tabla documento*/
CREATE TABLE `Documento` (
  `IdDoc` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `documento` varchar(100) NOT NULL,
  `estado` varchar(100) not null,
  `IdExp` int(11) NOT NULL,
   PRIMARY KEY (`IdDoc`),
   FOREIGN KEY (IdExp) REFERENCES Expediente(IdExp) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS DetalleExp;
/**creación de  tabla detalle del expediente*/
CREATE TABLE `DetalleExp` (
  `IdDetal` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechaExp` varchar(100),
  `IdExp` int(11) NOT NULL,
   PRIMARY KEY (`IdDetal`),
   FOREIGN KEY (IdExp) REFERENCES Expediente(IdExp) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS Evidencia;
/**creación de  tabla evidencia*/
CREATE TABLE `Evidencia` (
  `IdEvid` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `evidencia` varchar(200) NOT NULL,
  `estado` varchar(100) not null,
  `IdExp` int(11) NOT NULL,
   PRIMARY KEY (`IdEvid`),
   FOREIGN KEY (IdExp) REFERENCES Expediente(IdExp) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS Pais;
/**creación de  tabla  pais*/
CREATE TABLE `Pais` (
  `IdPais` int(11)  NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(20),
   PRIMARY KEY (`IdPais`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS Especialidad;
/**creación de  tabla  pais*/
CREATE TABLE `Especialidad` (
  `IdEsp` int(11)  NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(20),
   PRIMARY KEY (`IdEsp`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS Perfil;
/**creación de tabla perfil */
CREATE TABLE `Perfil` (
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
   FOREIGN KEY (IdUser) REFERENCES Usuario(IdUser) ON DELETE CASCADE,
   FOREIGN KEY (IdPais) REFERENCES Pais(IdPais) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS Abogado;
/**creación de  tabla abogado */
CREATE TABLE `Abogado` (
  `IdAbo` int(11) NOT NULL AUTO_INCREMENT,
  `nume_abo` varchar(50) NOT NULL,
  `IdEsp`int(11) DEFAULT NULL,
  `IdPer` int(11) NOT NULL,
   PRIMARY KEY (`IdAbo`),
   FOREIGN KEY (IdPer) REFERENCES Perfil(IdPer) ON DELETE CASCADE,
   FOREIGN KEY (IdEsp) REFERENCES Especialidad(IdEsp) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS Asignacion;
/**creación de  tabla asignación citas con el abogado*/
CREATE TABLE `Asignacion` (
  `IdAsig` int(11) NOT NULL AUTO_INCREMENT,
  `IdCita` int(11) NOT NULL,
  `IdAbo` int(11) NOT NULL,
  `fecha_asig` varchar(100),
   PRIMARY KEY (`IdAsig`),
   FOREIGN KEY (IdCita) REFERENCES Citas(IdCita) ON DELETE CASCADE,
   FOREIGN KEY (IdAbo) REFERENCES Abogado(IdAbo) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS Agenda;
/**creación de  tabla agenda */
CREATE TABLE `Agenda` (
  `IdAgen` int(11) NOT NULL AUTO_INCREMENT,
  `IdAbo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
   PRIMARY KEY (`IdAgen`),
   FOREIGN KEY (IdAbo) REFERENCES Abogado(IdAbo) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS Evento;
/**creación de  tabla evento*/
CREATE TABLE `Evento` (
  `IdEven` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `color` varchar(10) default null,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `descripcion` varchar(150) NOT NULL,
  `IdAgen` int(11) NOT NULL,
   PRIMARY KEY (`IdEven`),
   FOREIGN KEY (IdAgen) REFERENCES Agenda(IdAgen) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS Notificacion;
/**creación de  tabla notificación*/
CREATE TABLE `Notificacion` (
  `IdNoti` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) default null,
  `descripcion` varchar(100) NOT NULL,
  `fecha_noti` datetime DEFAULT NULL,
  `estado` varchar(150) NOT NULL,
  `IdUser` int(11) NOT NULL,
   PRIMARY KEY (`IdNoti`),
   FOREIGN KEY (IdUser) REFERENCES Usuario(IdUser) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS AboxEx;
/**creación de  tabla  abogado por expediente*/
CREATE TABLE `AboxEx` (
  `IdAbo` int(11) NOT NULL,
  `IdExp` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
   PRIMARY KEY (`IdAbo`,`IdExp`),
   FOREIGN KEY (IdAbo) REFERENCES Abogado(IdAbo) ON DELETE CASCADE,
   FOREIGN KEY (IdExp) REFERENCES Expediente(IdExp) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS recibo;
/**creación de  tabla  abogado por expediente*/
CREATE TABLE `recibo` (
  `IdRec` int(11) NOT NULL AUTO_INCREMENT,
  `recibi` varchar(100),
  `sumanetal` varchar(100),
  `sumanetan` varchar(100),
  `concepto` varchar(200),
  `fechare` datetime,
  `documento` varchar(100),
  `IdUser` int(11) not null,
  `IdAbo` int(11) not null,
   PRIMARY KEY (`IdRec`),
   FOREIGN KEY (IdUser) REFERENCES usuario(IdUser) ON DELETE CASCADE,
   FOREIGN KEY (IdAbo) REFERENCES abogado(IdAbo) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8mb4;


INSERT INTO `usuario` (`IdUser`, `correo`, `contra`, `rol`,`tipo`, `two_factor_key`, `estado`, `fechaingreso`) VALUES 
(NULL, 'danielxcanales@hotmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '4',NULL, '1234', 'activo', '04/05/2011'),
(NULL, 'abog10@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '3',NULL, '1234', 'activo', '04/05/2015'),
(NULL, 'abog9@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '3',NULL, '1234', 'activo', '04/05/2015'),
(NULL, 'abog8@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '3',NULL, '1234', 'activo', '04/05/2015'),
(NULL, 'abog7@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '3',NULL, '1234', 'activo', '04/05/2015'),
(NULL, 'abog6@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '3',NULL, '1234', 'activo', '04/05/2015'),
(NULL, 'abog5@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '3',NULL, '1234', 'activo', '04/05/2015'),
(NULL, 'abog4@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '3',NULL, '1234', 'activo', '04/05/2015'),
(NULL, 'abog3@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '3',NULL, '1234', 'activo', '04/05/2015'),
(NULL, 'abog2@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '3',NULL, '1234', 'activo', '04/05/2015'),
(NULL, 'abog1@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '3','creador', '1234', 'activo', '04/05/2015'),
(NULL, 'danielxxcanales@hotmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '2','creador', '1234', 'activo', '04/05/2016'),
(NULL, 'danielcanc@hotmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '1',NULL, '1234', 'activo', '04/05/2022'),
(NULL, 'danielcanc@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '1',NULL, '1234', 'activo', '04/05/2022'),
(NULL, 'cliente1@gmail.com', 'SwKYM14bNgng0qMCjTkxSw==', '1',NULL, '1234', 'activo', '04/05/2022'),
(NULL, 'danielcanc@yahoo.es', 'SwKYM14bNgng0qMCjTkxSw==', '1',NULL, '1234', 'activo', '04/05/2022');


INSERT INTO `juzgado` (`IdJuz`, `nombre`, `descripcion`,`estado`) VALUES 
(NULL, 'Juzgados de Paz', 'En Tegucigalpa','activo'),
(NULL, 'Juzgados de Familia', 'En Tegucigalpa','activo'),
(NULL, 'Juzgados de la Niñez y Adolescencia', 'En Tegucigalpa','activo'),
(NULL, 'Juzgados de lo Contencioso Administrativo', 'En Tegucigalpa','activo'),
(NULL, 'Juzgados del Trabajo', 'En Tegucigalpa','activo'),
(NULL, 'Juzgados Contra la Violencia Doméstica', 'En Tegucigalpa','activo'),
(NULL, 'Juzgados de Ejecución de Penas', 'En Tegucigalpa','activo'),
(NULL, 'Juzgados de Competencia Nacional en Materia Penal', 'En Tegucigalpa','activo'),
(NULL, 'Tribunales de Sentencia', 'En Tegucigalpa','activo'),
(NULL, 'Corte de Apelaciones Mixtas (Penal y Civil)', 'En Tegucigalpa','activo'),
(NULL, 'Juzgados de Competencia Nacional en Materia Penal', 'En Tegucigalpa','activo'),
(NULL, 'Cortes de Apelaciones de lo Civil', 'En Tegucigalpa','activo'),
(NULL, 'Corte Suprema de Justicia', 'En Tegucigalpa','activo'),
(NULL, 'Cortes de Apelaciones de lo Contencioso Administrativo', 'En Tegucigalpa','activo'),
(NULL, 'Juzgados de Inquilinato', 'En Tegucigalpa','activo');


INSERT INTO `pais` (`IdPais`, `nombre`, `estado`) VALUES
(NULL, 'Honduras', 'activo'),
(NULL, 'Costa Rica', 'activo'),
(NULL, 'El Salvador', 'activo'),
(NULL, 'Estados Unidos', 'activo'),
(NULL, 'Nicaragua', 'activo'),
(NULL, 'Panama', 'activo'),
(NULL, 'Colombia', 'activo'),
(NULL, 'Peru', 'activo'),
(NULL, 'Mexico', 'activo'),
(NULL, 'Canada', 'activo'),
(NULL, 'España', 'activo'),
(NULL, 'Guatemala', 'activo');

INSERT INTO `especialidad` (`IdEsp`, `nombre`, `estado`) VALUES
(NULL, 'Civil', 'activo'),
(NULL, 'Penal', 'activo'),
(NULL, 'Coorporativo', 'activo'),
(NULL, 'Administrativo', 'activo'),
(NULL, 'Laboral', 'activo'),
(NULL, 'Notarial', 'activo');



INSERT INTO `perfil` (`IdPer`, `primer_nomb`, `segundo_nomb`, `primer_ape`, `segundo_ape`, `telefono`, `celular`, `direccion`, `DNI`, `IdPais`, `fecha_naci`, `ocupacion`, `genero`, `foto`, `IdUser`) VALUES 
(NULL, 'Daniel', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '1'),
(NULL, 'Alex', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '2'),
(NULL, 'Mario', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '3'),
(NULL, 'juan', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '4'),
(NULL, 'carlos', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '5'),
(NULL, 'Pedro', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '6'),
(NULL, 'Marco', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '7'),
(NULL, 'Fernando', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '8'),
(NULL, 'Juan', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '9'),
(NULL, 'Jesus', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '10'),
(NULL, 'Gerardo', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '11'),
(NULL, 'David', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Masculino', NULL, '12'),
(NULL, 'Sofia', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Femenino', NULL, '13'),
(NULL, 'Andrea', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Femenino', NULL, '14'),
(NULL, 'Maria', 'iSIAS', 'Cana', 'BEL', '25646698', '98765422', 'COLONIA 21', '98787988', '1', '08/05/1980', 'MEDICO', 'Femenino', NULL, '15');



INSERT INTO `configuracion` (`IdConfig`, `nombre`, `vista`, `Solicitudes`, `Asignacion`, `Miscitas`, `Usuario`, `Archivado`, `Confi`, `Creaexpedi`, `Expediactu`, `Juzgado`, `Agenda`, `Noti`,`Pais`,`Especi`, `IdUser`) VALUES 
(NULL, 'daniel', 'si', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2'),
(NULL, 'daniel', 'si', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3'),
(NULL, 'daniel', 'si', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4'),
(NULL, 'daniel', 'si', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4'),
(NULL, 'daniel', 'si', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '5'),
(NULL, 'daniel', 'si', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11');


INSERT INTO `abogado` (`IdAbo`, `nume_abo`, `IdEsp`, `IdPer`) VALUES 
(NULL, '4546544', '1', '2'),
(NULL, '4546544', '1', '3'),
(NULL, '4546544', '1', '4'),
(NULL, '4546544', '1', '5'),
(NULL, '4546544', '1', '6'),
(NULL, '4546544', '1', '7'),
(NULL, '4546544', '1', '8'),
(NULL, '4546544', '1', '9'),
(NULL, '4546544', '1', '10'),
(NULL, '4546544', '1', '11');


/**bueno*/
INSERT INTO `agenda` (`IdAgen`, `IdAbo`, `descripcion`) VALUES 
(NULL, '1', 'agenda de abogado'),
(NULL, '2', 'agenda de abogado'),
(NULL, '3', 'agenda de abogado'),
(NULL, '4', 'agenda de abogado'),
(NULL, '5', 'agenda de abogado'),
(NULL, '6', 'agenda de abogado'),
(NULL, '7', 'agenda de abogado'),
(NULL, '8', 'agenda de abogado'),
(NULL, '9', 'agenda de abogado'),
(NULL, '10', 'agenda de abogado');
