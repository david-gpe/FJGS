-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-11-2022 a las 16:20:58
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fgjs3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `valor` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `IdAlumno` int(10) NOT NULL,
  `LenguaMaterna` varchar(20) NOT NULL,
  `Discapacidad` varchar(20) NOT NULL,
  `DocumentoProbatorio` varchar(30) NOT NULL,
  `IdGrado` int(2) DEFAULT NULL,
  `idTutor` int(8) DEFAULT NULL,
  `IdDato` int(8) DEFAULT NULL,
  PRIMARY KEY (`IdAlumno`),
  KEY `IdGrado` (`IdGrado`),
  KEY `idTutor` (`idTutor`),
  KEY `IdDato` (`IdDato`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `asistenciausuario`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `asistenciausuario`;
CREATE TABLE IF NOT EXISTS `asistenciausuario` (
`Nombre` varchar(50)
,`ApellidoPaterno` varchar(20)
,`ApellidoMaterno` varchar(20)
,`id` int(8)
,`Matricula` varchar(15)
,`horaEntrada` time
,`HoraSalida` time
,`fecha` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
CREATE TABLE IF NOT EXISTS `calificacion` (
  `IdCalificacion` int(10) NOT NULL AUTO_INCREMENT,
  `IdMateria` tinyint(2) DEFAULT NULL,
  `Matricula` varchar(15) NOT NULL,
  `Cal` decimal(3,1) DEFAULT '0.0',
  `fechaderegsitro` date DEFAULT NULL,
  PRIMARY KEY (`IdCalificacion`),
  KEY `IdMateria` (`IdMateria`),
  KEY `Matricula` (`Matricula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegiatura`
--

DROP TABLE IF EXISTS `colegiatura`;
CREATE TABLE IF NOT EXISTS `colegiatura` (
  `IdColegiatura` int(10) NOT NULL AUTO_INCREMENT,
  `MatriculAlumno` varchar(15) DEFAULT NULL,
  `IdMensualidad` int(10) NOT NULL,
  `Monto` float NOT NULL,
  `FechedePago` date NOT NULL,
  `FechadeProximoPago` date NOT NULL,
  PRIMARY KEY (`IdColegiatura`),
  KEY `MatriculAlumno` (`MatriculAlumno`),
  KEY `IdMensualidad` (`IdMensualidad`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colegiatura`
--

INSERT INTO `colegiatura` (`IdColegiatura`, `MatriculAlumno`, `IdMensualidad`, `Monto`, `FechedePago`, `FechadeProximoPago`) VALUES
(1, 'ALPRI0001', 1, 140, '2022-11-28', '2022-12-28');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `colegiaturaalumnos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `colegiaturaalumnos`;
CREATE TABLE IF NOT EXISTS `colegiaturaalumnos` (
`Matricula` varchar(15)
,`Nombre` varchar(50)
,`ApellidoPaterno` varchar(20)
,`ApellidoMaterno` varchar(20)
,`IdColegiatura` int(10)
,`Monto` float
,`Mensualidad` varchar(20)
,`FechedePago` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

DROP TABLE IF EXISTS `contador`;
CREATE TABLE IF NOT EXISTS `contador` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `valor` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosgenerales`
--

DROP TABLE IF EXISTS `datosgenerales`;
CREATE TABLE IF NOT EXISTS `datosgenerales` (
  `IdDatoGeneral` int(10) NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(15) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `ApellidoPaterno` varchar(20) NOT NULL,
  `ApellidoMaterno` varchar(20) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `CURP` varchar(20) NOT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `IdGenero` tinyint(1) NOT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `IdTipoSangre` tinyint(1) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Celular` varchar(20) NOT NULL,
  `IdNivEst` tinyint(1) NOT NULL,
  `Entidad` varchar(20) NOT NULL,
  `Municipio` varchar(30) NOT NULL,
  `Localidad` varchar(30) NOT NULL,
  `Domicilio` varchar(30) NOT NULL,
  `Colonia` varchar(30) NOT NULL,
  `CP` int(5) NOT NULL,
  `IdTipoUsuario` tinyint(1) NOT NULL,
  `Estado` varchar(20) DEFAULT 'Habilitado',
  `Spr` float NOT NULL,
  PRIMARY KEY (`IdDatoGeneral`),
  UNIQUE KEY `Matricula` (`Matricula`),
  KEY `IdNivEst` (`IdNivEst`),
  KEY `IdGenero` (`IdGenero`),
  KEY `IdTipoUsuario` (`IdTipoUsuario`),
  KEY `IdTipoSangre` (`IdTipoSangre`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datosgenerales`
--

INSERT INTO `datosgenerales` (`IdDatoGeneral`, `Matricula`, `nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `FechaNacimiento`, `CURP`, `RFC`, `IdGenero`, `Correo`, `IdTipoSangre`, `Telefono`, `Celular`, `IdNivEst`, `Entidad`, `Municipio`, `Localidad`, `Domicilio`, `Colonia`, `CP`, `IdTipoUsuario`, `Estado`, `Spr`) VALUES
(1, 'Admin0001', 'David', 'Guadalupe', 'Maldonado', '1997-06-21', 'GUMD970721HPLDLV06', 'GUMD970721', 1, 'gpemaldavid@gmail.com', 7, '2481314567', '2481314567', 4, 'Puebla', 'San Salvador el Verde', 'San Lucas el Grande', 'Priv. Guadalupe Victoria', 'Ventanas', 74135, 1, 'Habilitado', 14.5),
(2, 'ALPRI0001', 'Matias', 'Perez', 'Perez', '2019-02-10', 'PEPM190210HPLRRT', NULL, 1, NULL, 1, '', '', 1, 'Puebla', 'San Salvador el Verde', 'San Lucas el Grande', 'San Lucas', 'Centro', 74135, 2, 'Habilitado', 0);

--
-- Disparadores `datosgenerales`
--
DROP TRIGGER IF EXISTS `RegistrarUsuario`;
DELIMITER $$
CREATE TRIGGER `RegistrarUsuario` AFTER INSERT ON `datosgenerales` FOR EACH ROW INSERT INTO Usuario(Usuario, Password, Matricula) values(new.nombre,new.FechaNacimiento,new.Matricula)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

DROP TABLE IF EXISTS `docente`;
CREATE TABLE IF NOT EXISTS `docente` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `valor` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

DROP TABLE IF EXISTS `docentes`;
CREATE TABLE IF NOT EXISTS `docentes` (
  `IdDocente` int(10) NOT NULL,
  `IdDato` int(10) NOT NULL,
  `IdGrado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdDocente`),
  KEY `IdDato` (`IdDato`),
  KEY `IdGrado` (`IdGrado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

DROP TABLE IF EXISTS `documento`;
CREATE TABLE IF NOT EXISTS `documento` (
  `IdDocumento` int(10) NOT NULL AUTO_INCREMENT,
  `IdDocente` int(10) DEFAULT NULL,
  `NombreDocumento` varchar(50) NOT NULL,
  `RutaDocumento` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`IdDocumento`),
  KEY `IdDocente` (`IdDocente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `IdGenero` tinyint(1) NOT NULL AUTO_INCREMENT,
  `Genero` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`IdGenero`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`IdGenero`, `Genero`) VALUES
(1, 'Hombre'),
(2, 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

DROP TABLE IF EXISTS `grado`;
CREATE TABLE IF NOT EXISTS `grado` (
  `IdGrado` tinyint(1) NOT NULL,
  `Grado` varchar(10) NOT NULL,
  `IdNivEst` tinyint(1) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IdGrado`),
  KEY `IdNivEst` (`IdNivEst`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

DROP TABLE IF EXISTS `kardex`;
CREATE TABLE IF NOT EXISTS `kardex` (
  `IdKardex` int(10) NOT NULL AUTO_INCREMENT,
  `IdMateria` tinyint(2) DEFAULT NULL,
  `Matricula` varchar(15) DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  PRIMARY KEY (`IdKardex`),
  UNIQUE KEY `Matricula` (`Matricula`),
  KEY `IdMateria` (`IdMateria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `llamausuario`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `llamausuario`;
CREATE TABLE IF NOT EXISTS `llamausuario` (
`Nombre` varchar(50)
,`ApellidoPaterno` varchar(20)
,`ApellidoMaterno` varchar(20)
,`id` int(8)
,`Matricula` varchar(15)
,`fecha` date
,`razon` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `IdMateria` tinyint(2) NOT NULL AUTO_INCREMENT,
  `IdGrado` tinyint(1) DEFAULT NULL,
  `Nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`IdMateria`),
  KEY `IdGrado` (`IdGrado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensualidad`
--

DROP TABLE IF EXISTS `mensualidad`;
CREATE TABLE IF NOT EXISTS `mensualidad` (
  `IdColegiatura` int(10) NOT NULL AUTO_INCREMENT,
  `Mensualidad` varchar(20) NOT NULL,
  PRIMARY KEY (`IdColegiatura`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensualidad`
--

INSERT INTO `mensualidad` (`IdColegiatura`, `Mensualidad`) VALUES
(1, 'Septiembre/Octubre'),
(2, 'Octube/Noviembre'),
(3, 'Noviembre/Diciembre'),
(4, 'Diciembre/Febrero'),
(5, 'Febrero/Marzo'),
(6, 'Marzo/Abril'),
(7, 'Abril/Mayo'),
(8, 'Mayo/Junio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivest`
--

DROP TABLE IF EXISTS `nivest`;
CREATE TABLE IF NOT EXISTS `nivest` (
  `IdNivEst` tinyint(1) NOT NULL AUTO_INCREMENT,
  `NivEst` varchar(15) NOT NULL,
  PRIMARY KEY (`IdNivEst`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivest`
--

INSERT INTO `nivest` (`IdNivEst`, `NivEst`) VALUES
(1, 'Preescolar'),
(2, 'Primaria'),
(3, 'Secundaria'),
(4, 'Media Superior'),
(5, 'Superior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

DROP TABLE IF EXISTS `nomina`;
CREATE TABLE IF NOT EXISTS `nomina` (
  `Folio` int(10) NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(15) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Salario` float NOT NULL,
  PRIMARY KEY (`Folio`),
  KEY `Matricula` (`Matricula`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`Folio`, `Matricula`, `Fecha`, `Salario`) VALUES
(1, 'Admin0001', '2022-11-27', 14.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE IF NOT EXISTS `notificaciones` (
  `IdNotificacion` int(10) NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(15) DEFAULT NULL,
  `Causa` varchar(20) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`IdNotificacion`),
  KEY `Matricula` (`Matricula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

DROP TABLE IF EXISTS `observacion`;
CREATE TABLE IF NOT EXISTS `observacion` (
  `IdObservacion` int(10) NOT NULL AUTO_INCREMENT,
  `IdNivEst` tinyint(1) NOT NULL,
  `Causa` varchar(25) NOT NULL,
  `Detalles` varchar(100) DEFAULT NULL,
  `IdUsuario` int(10) DEFAULT NULL,
  `IdAlumno` int(10) NOT NULL,
  `Matricula` varchar(15) NOT NULL,
  PRIMARY KEY (`IdObservacion`),
  KEY `IdUsuario` (`IdUsuario`),
  KEY `IdAlumno` (`IdAlumno`),
  KEY `Matricula` (`Matricula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

DROP TABLE IF EXISTS `observaciones`;
CREATE TABLE IF NOT EXISTS `observaciones` (
  `IdObservacion` int(10) NOT NULL AUTO_INCREMENT,
  `Nivel` varchar(20) NOT NULL,
  `Causa` varchar(20) NOT NULL,
  `Detalles` varchar(20) NOT NULL,
  `IdUsuario` int(10) DEFAULT NULL,
  PRIMARY KEY (`IdObservacion`),
  KEY `IdUsuario` (`IdUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoservicios`
--

DROP TABLE IF EXISTS `pagoservicios`;
CREATE TABLE IF NOT EXISTS `pagoservicios` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `IdServicio` int(10) DEFAULT NULL,
  `Monto` float DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IdServicio` (`IdServicio`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagoservicios`
--

INSERT INTO `pagoservicios` (`id`, `IdServicio`, `Monto`, `Fecha`) VALUES
(1, 1, 150, '2022-11-27'),
(2, 2, 200, '2022-11-26'),
(3, 3, 300, '2022-11-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroasis`
--

DROP TABLE IF EXISTS `registroasis`;
CREATE TABLE IF NOT EXISTS `registroasis` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(15) DEFAULT NULL,
  `horaEntrada` time DEFAULT NULL,
  `HoraSalida` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `HorasLaboradas` int(30) NOT NULL,
  `Status` varchar(30) NOT NULL DEFAULT 'Adeudo',
  PRIMARY KEY (`id`),
  KEY `Matricula` (`Matricula`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registroasis`
--

INSERT INTO `registroasis` (`id`, `Matricula`, `horaEntrada`, `HoraSalida`, `fecha`, `HorasLaboradas`, `Status`) VALUES
(1, 'Admin0001', '20:48:00', '21:48:00', '2022-11-26', 3600, 'Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrollaat`
--

DROP TABLE IF EXISTS `registrollaat`;
CREATE TABLE IF NOT EXISTS `registrollaat` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(15) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `razon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Matricula` (`Matricula`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registrollaat`
--

INSERT INTO `registrollaat` (`id`, `Matricula`, `fecha`, `razon`) VALUES
(1, 'Admin0001', '2022-11-26', 'Llego tarde'),
(2, 'Admin0001', '2022-11-26', 'Llego tarde');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `registropagonomina`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `registropagonomina`;
CREATE TABLE IF NOT EXISTS `registropagonomina` (
`Nombre` varchar(50)
,`ApellidoPaterno` varchar(20)
,`ApellidoMaterno` varchar(20)
,`Folio` int(10)
,`Matricula` varchar(15)
,`fecha` date
,`Salario` float
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `registropagoservicios`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `registropagoservicios`;
CREATE TABLE IF NOT EXISTS `registropagoservicios` (
`NombreServicio` varchar(20)
,`Monto` float
,`Fecha` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `IdServicio` int(10) NOT NULL AUTO_INCREMENT,
  `NombreServicio` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IdServicio`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`IdServicio`, `NombreServicio`) VALUES
(1, 'Agua'),
(2, 'Internet'),
(3, 'Luz Electrica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposangre`
--

DROP TABLE IF EXISTS `tiposangre`;
CREATE TABLE IF NOT EXISTS `tiposangre` (
  `IdTipoSangre` tinyint(1) NOT NULL AUTO_INCREMENT,
  `TipoSangre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IdTipoSangre`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiposangre`
--

INSERT INTO `tiposangre` (`IdTipoSangre`, `TipoSangre`) VALUES
(1, 'A Positiva'),
(2, 'A Negativo'),
(3, 'AB Positivo'),
(4, 'AB Negativo'),
(5, 'B Positivo'),
(6, 'B Negativo'),
(7, 'O Positivo'),
(8, 'O Negativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE IF NOT EXISTS `tipousuario` (
  `IdTipoUsuario` tinyint(1) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IdTipoUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`IdTipoUsuario`, `tipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Alumno'),
(3, 'Director'),
(4, 'Docente'),
(5, 'Financiero'),
(6, 'Tutor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

DROP TABLE IF EXISTS `tutor`;
CREATE TABLE IF NOT EXISTS `tutor` (
  `IdTutor` int(10) NOT NULL AUTO_INCREMENT,
  `Parentesco` varchar(20) NOT NULL,
  `Ocupacion` varchar(30) NOT NULL,
  `IdDato` int(10) DEFAULT NULL,
  PRIMARY KEY (`IdTutor`),
  KEY `IdDato` (`IdDato`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUsuario` int(10) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Matricula` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`),
  UNIQUE KEY `Usuario` (`Usuario`),
  KEY `Matricula` (`Matricula`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Usuario`, `Password`, `Matricula`) VALUES
(1, 'David', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Admin0001'),
(2, 'Matias', 'e0d5f8e0cbce0db0c64365d4b1eff2e56707e04f', '');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuariotipodato`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuariotipodato`;
CREATE TABLE IF NOT EXISTS `usuariotipodato` (
`Matricula` varchar(15)
,`Nombre` varchar(50)
,`ApellidoPaterno` varchar(20)
,`ApellidoMaterno` varchar(20)
,`FechaNacimiento` date
,`CURP` varchar(20)
,`RFC` varchar(13)
,`IdGenero` tinyint(1)
,`Genero` varchar(10)
,`Correo` varchar(50)
,`IdTipoSangre` tinyint(1)
,`TipoSangre` varchar(20)
,`Telefono` varchar(20)
,`Celular` varchar(20)
,`IdNivEst` tinyint(1)
,`NivEst` varchar(15)
,`Entidad` varchar(20)
,`Municipio` varchar(30)
,`Localidad` varchar(30)
,`Domicilio` varchar(30)
,`Colonia` varchar(30)
,`CP` int(5)
,`IdTipoUsuario` tinyint(1)
,`tipoUsuario` varchar(20)
,`Estado` varchar(20)
,`Spr` float
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuario_tipo`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuario_tipo`;
CREATE TABLE IF NOT EXISTS `usuario_tipo` (
`Usuario` varchar(20)
,`Password` varchar(255)
,`tipoUsuario` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuario_tipo_dato`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuario_tipo_dato`;
CREATE TABLE IF NOT EXISTS `usuario_tipo_dato` (
`Matricula` varchar(15)
,`Nombre` varchar(50)
,`ApellidoPaterno` varchar(20)
,`ApellidoMaterno` varchar(20)
,`CURP` varchar(20)
,`Celular` varchar(20)
,`tipoUsuario` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `asistenciausuario`
--
DROP TABLE IF EXISTS `asistenciausuario`;

DROP VIEW IF EXISTS `asistenciausuario`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `asistenciausuario`  AS SELECT `d`.`nombre` AS `Nombre`, `d`.`ApellidoPaterno` AS `ApellidoPaterno`, `d`.`ApellidoMaterno` AS `ApellidoMaterno`, `ra`.`id` AS `id`, `ra`.`Matricula` AS `Matricula`, `ra`.`horaEntrada` AS `horaEntrada`, `ra`.`HoraSalida` AS `HoraSalida`, `ra`.`fecha` AS `fecha` FROM (`registroasis` `ra` join `datosgenerales` `d` on((`ra`.`Matricula` = `d`.`Matricula`))) ORDER BY `d`.`Matricula` DESC ;

-- --------------------------------------------------------

--
-- Estructura para la vista `colegiaturaalumnos`
--
DROP TABLE IF EXISTS `colegiaturaalumnos`;

DROP VIEW IF EXISTS `colegiaturaalumnos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `colegiaturaalumnos`  AS SELECT `d`.`Matricula` AS `Matricula`, `d`.`nombre` AS `Nombre`, `d`.`ApellidoPaterno` AS `ApellidoPaterno`, `d`.`ApellidoMaterno` AS `ApellidoMaterno`, `c`.`IdColegiatura` AS `IdColegiatura`, `c`.`Monto` AS `Monto`, `m`.`Mensualidad` AS `Mensualidad`, `c`.`FechedePago` AS `FechedePago` FROM ((`datosgenerales` `d` join `colegiatura` `c` on((`d`.`Matricula` = `c`.`MatriculAlumno`))) join `mensualidad` `m` on((`c`.`IdMensualidad` = `m`.`IdColegiatura`))) ORDER BY `c`.`FechedePago` DESC ;

-- --------------------------------------------------------

--
-- Estructura para la vista `llamausuario`
--
DROP TABLE IF EXISTS `llamausuario`;

DROP VIEW IF EXISTS `llamausuario`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `llamausuario`  AS SELECT `d`.`nombre` AS `Nombre`, `d`.`ApellidoPaterno` AS `ApellidoPaterno`, `d`.`ApellidoMaterno` AS `ApellidoMaterno`, `ra`.`id` AS `id`, `ra`.`Matricula` AS `Matricula`, `ra`.`fecha` AS `fecha`, `ra`.`razon` AS `razon` FROM (`registrollaat` `ra` join `datosgenerales` `d` on((`ra`.`Matricula` = `d`.`Matricula`))) ORDER BY `d`.`Matricula` DESC ;

-- --------------------------------------------------------

--
-- Estructura para la vista `registropagonomina`
--
DROP TABLE IF EXISTS `registropagonomina`;

DROP VIEW IF EXISTS `registropagonomina`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `registropagonomina`  AS SELECT `d`.`nombre` AS `Nombre`, `d`.`ApellidoPaterno` AS `ApellidoPaterno`, `d`.`ApellidoMaterno` AS `ApellidoMaterno`, `ra`.`Folio` AS `Folio`, `ra`.`Matricula` AS `Matricula`, `ra`.`Fecha` AS `fecha`, `ra`.`Salario` AS `Salario` FROM (`nomina` `ra` join `datosgenerales` `d` on((`ra`.`Matricula` = `d`.`Matricula`))) ORDER BY `d`.`Matricula` DESC ;

-- --------------------------------------------------------

--
-- Estructura para la vista `registropagoservicios`
--
DROP TABLE IF EXISTS `registropagoservicios`;

DROP VIEW IF EXISTS `registropagoservicios`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `registropagoservicios`  AS SELECT `s`.`NombreServicio` AS `NombreServicio`, `ps`.`Monto` AS `Monto`, `ps`.`Fecha` AS `Fecha` FROM (`pagoservicios` `ps` join `servicios` `s` on((`ps`.`IdServicio` = `s`.`IdServicio`))) ORDER BY `ps`.`Fecha` DESC ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuariotipodato`
--
DROP TABLE IF EXISTS `usuariotipodato`;

DROP VIEW IF EXISTS `usuariotipodato`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuariotipodato`  AS SELECT `d`.`Matricula` AS `Matricula`, `d`.`nombre` AS `Nombre`, `d`.`ApellidoPaterno` AS `ApellidoPaterno`, `d`.`ApellidoMaterno` AS `ApellidoMaterno`, `d`.`FechaNacimiento` AS `FechaNacimiento`, `d`.`CURP` AS `CURP`, `d`.`RFC` AS `RFC`, `d`.`IdGenero` AS `IdGenero`, `g`.`Genero` AS `Genero`, `d`.`Correo` AS `Correo`, `d`.`IdTipoSangre` AS `IdTipoSangre`, `s`.`TipoSangre` AS `TipoSangre`, `d`.`Telefono` AS `Telefono`, `d`.`Celular` AS `Celular`, `d`.`IdNivEst` AS `IdNivEst`, `n`.`NivEst` AS `NivEst`, `d`.`Entidad` AS `Entidad`, `d`.`Municipio` AS `Municipio`, `d`.`Localidad` AS `Localidad`, `d`.`Domicilio` AS `Domicilio`, `d`.`Colonia` AS `Colonia`, `d`.`CP` AS `CP`, `d`.`IdTipoUsuario` AS `IdTipoUsuario`, `t`.`tipoUsuario` AS `tipoUsuario`, `d`.`Estado` AS `Estado`, `d`.`Spr` AS `Spr` FROM ((((`datosgenerales` `d` join `genero` `g` on((`d`.`IdGenero` = `g`.`IdGenero`))) join `tiposangre` `s` on((`d`.`IdTipoSangre` = `s`.`IdTipoSangre`))) join `nivest` `n` on((`d`.`IdNivEst` = `n`.`IdNivEst`))) join `tipousuario` `t` on((`d`.`IdTipoUsuario` = `t`.`IdTipoUsuario`))) WHERE (`d`.`Estado` = 'Habilitado') ORDER BY `d`.`Matricula` ASC ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuario_tipo`
--
DROP TABLE IF EXISTS `usuario_tipo`;

DROP VIEW IF EXISTS `usuario_tipo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuario_tipo`  AS SELECT `u`.`Usuario` AS `Usuario`, `u`.`Password` AS `Password`, `t`.`tipoUsuario` AS `tipoUsuario` FROM ((`usuario` `u` join `datosgenerales` `d` on((`u`.`Matricula` = `d`.`Matricula`))) join `tipousuario` `t` on((`d`.`IdTipoUsuario` = `t`.`IdTipoUsuario`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuario_tipo_dato`
--
DROP TABLE IF EXISTS `usuario_tipo_dato`;

DROP VIEW IF EXISTS `usuario_tipo_dato`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuario_tipo_dato`  AS SELECT `d`.`Matricula` AS `Matricula`, `d`.`nombre` AS `Nombre`, `d`.`ApellidoPaterno` AS `ApellidoPaterno`, `d`.`ApellidoMaterno` AS `ApellidoMaterno`, `d`.`CURP` AS `CURP`, `d`.`Celular` AS `Celular`, `t`.`tipoUsuario` AS `tipoUsuario` FROM ((`usuario` `u` join `datosgenerales` `d` on((`u`.`Matricula` = `d`.`Matricula`))) join `tipousuario` `t` on((`d`.`IdTipoUsuario` = `t`.`IdTipoUsuario`))) WHERE (`d`.`Estado` = 'Habilitado') ORDER BY `d`.`Matricula` ASC ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
