-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-10-2022 a las 16:24:31
-- Versión del servidor: 5.7.39-log-cll-lve
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fundaci2_fund_afenix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actfam`
--

CREATE TABLE `actfam` (
  `id` int(11) NOT NULL,
  `desem` varchar(100) DEFAULT NULL,
  `motivo_ins` varchar(100) DEFAULT NULL,
  `do_malcolegio` varchar(100) DEFAULT NULL,
  `otro_vamal` varchar(100) DEFAULT NULL,
  `do_biencolegio` varchar(100) DEFAULT NULL,
  `otro_biencolegio` varchar(100) DEFAULT NULL,
  `ambiente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antescolar`
--

CREATE TABLE `antescolar` (
  `id` int(11) NOT NULL,
  `ingEsc` int(11) DEFAULT NULL,
  `aJardin` tinyint(1) DEFAULT NULL,
  `antecedentes` text,
  `mod_Ensenanza` varchar(100) DEFAULT NULL,
  `motivo_c` varchar(100) DEFAULT NULL,
  `rep_curso` tinyint(1) DEFAULT NULL,
  `c_motivorep` varchar(100) DEFAULT NULL,
  `situacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antfam`
--

CREATE TABLE `antfam` (
  `id` int(11) NOT NULL,
  `pers_viven` text,
  `ant_salud` text,
  `obs_AntFam` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audicion`
--

CREATE TABLE `audicion` (
  `id` int(11) NOT NULL,
  `U_audifonos` tinyint(1) DEFAULT NULL,
  `obs_Audicion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_usuario`
--

CREATE TABLE `a_usuario` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `a_usuario`
--

INSERT INTO `a_usuario` (`ID`, `nombre`, `activo`) VALUES
(1, 'Administracion', 1),
(2, 'fonoaudiologo', 1),
(3, 'Oculista', 1),
(4, 'Kinesiologo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `ID` int(11) NOT NULL,
  `RUT` varchar(13) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `comuna` varchar(50) DEFAULT NULL,
  `c_identidad` longblob,
  `teleton` tinyint(1) DEFAULT NULL,
  `c_discapacidad` tinyint(1) DEFAULT NULL,
  `pension` int(11) DEFAULT NULL,
  `chile_solidario` tinyint(1) DEFAULT NULL,
  `r_s_hogares` tinyint(1) DEFAULT NULL,
  `prevision` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `beneficiario` varchar(13) DEFAULT NULL,
  `usuario` varchar(13) DEFAULT NULL,
  `area_u` int(11) DEFAULT NULL,
  `programa` int(11) DEFAULT NULL,
  `t_atencion` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `antecedentes_r` text,
  `objetivo` text,
  `actividad` text,
  `acuerdo` text,
  `observacion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `nombre`) VALUES
(1, 'Dirección'),
(2, 'Secretaria'),
(3, 'Profesional'),
(4, 'Interno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compactfam`
--

CREATE TABLE `compactfam` (
  `id` int(11) NOT NULL,
  `id_actFam` int(11) DEFAULT NULL,
  `apoyo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compaudicion`
--

CREATE TABLE `compaudicion` (
  `id` int(11) NOT NULL,
  `id_audicion` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compdeslengua_compr`
--

CREATE TABLE `compdeslengua_compr` (
  `id` int(11) NOT NULL,
  `id_Des_Lengua` int(11) DEFAULT NULL,
  `caract` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compdeslengua_expre`
--

CREATE TABLE `compdeslengua_expre` (
  `id` int(11) NOT NULL,
  `id_Des_Lengua` int(11) DEFAULT NULL,
  `caract` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compdesmotrizfina`
--

CREATE TABLE `compdesmotrizfina` (
  `id` int(11) NOT NULL,
  `id_DesMotriz` int(11) DEFAULT NULL,
  `Logro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compdesmotrizscog`
--

CREATE TABLE `compdesmotrizscog` (
  `id` int(11) NOT NULL,
  `id_DesMotriz` int(11) DEFAULT NULL,
  `signos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compdessocial`
--

CREATE TABLE `compdessocial` (
  `id` int(11) NOT NULL,
  `id_DesSocial` int(11) DEFAULT NULL,
  `desarrollo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compdiagaudicion`
--

CREATE TABLE `compdiagaudicion` (
  `id` int(11) NOT NULL,
  `id_audicion` int(11) DEFAULT NULL,
  `diagnostico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compdiagvision`
--

CREATE TABLE `compdiagvision` (
  `id` int(11) NOT NULL,
  `id_vision` int(11) DEFAULT NULL,
  `diagnostico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complementopparto`
--

CREATE TABLE `complementopparto` (
  `id` int(11) NOT NULL,
  `id_postParto` int(11) DEFAULT NULL,
  `sintomas_12m` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compsaludactual`
--

CREATE TABLE `compsaludactual` (
  `id` int(11) NOT NULL,
  `id_Salud` int(11) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compsaludnocturno`
--

CREATE TABLE `compsaludnocturno` (
  `id` int(11) NOT NULL,
  `id_Salud` int(11) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compvision`
--

CREATE TABLE `compvision` (
  `id` int(11) NOT NULL,
  `id_vision` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion`
--

CREATE TABLE `condicion` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `condicion`
--

INSERT INTO `condicion` (`ID`, `nombre`, `codigo`, `descripcion`) VALUES
(1, 'Trastorno Bipolar', 'TB01', 'Puede ocasionar cambios inusuales, a menudo extremos y fluctuantes en el estado de ánimo, el nivel de energía y de actividad, y la concentración.'),
(2, 'Trastorno de Demencia', 'TD01', 'Término general para referirse a una alteración de la capacidad para recordar, pensar o tomar decisiones, que interfiere en la realización de las actividades de la vida diaria.'),
(3, 'Trastorno de Deficit de Atencion', 'TDA01', 'Trastorno crónico caracterizado por la dificultad para prestar atención.'),
(4, 'Trastorno de Defict de Atencion con Hiperactividad', 'TDAH01', 'Trastorno crónico caracterizado por la dificultad para prestar atención, la hiperactividad y la impulsividad.'),
(5, 'Trastorno del Espectro Autista', 'TEA01', 'Grupo de afecciones diversas. Se caracterizan por algún grado de dificultad en la interacción social y la comunicación.'),
(6, 'Trastorno del Lenguaje', 'TdL01', 'Los trastornos del lenguaje son alteraciones que dificultan la comunicación oral, tanto para hablar como para entender lo que otras personas dicen.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `rut_bene` varchar(13) DEFAULT NULL,
  `rut_profe` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_discapacidad`
--

CREATE TABLE `c_discapacidad` (
  `ID` int(11) NOT NULL,
  `n_credencial` int(25) DEFAULT NULL,
  `o_principal` int(11) DEFAULT NULL,
  `o_secundario` int(11) DEFAULT NULL,
  `porcentaje` double DEFAULT NULL,
  `grado` int(11) DEFAULT NULL,
  `movilidad` int(11) DEFAULT NULL,
  `c_parte_delantera` longblob,
  `c_parte_trasera` longblob,
  `beneficiario` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosgenerales`
--

CREATE TABLE `datosgenerales` (
  `id` int(11) NOT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `derivacion` varchar(100) DEFAULT NULL,
  `atencion` tinyint(1) DEFAULT NULL,
  `beneficiario` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deslengua`
--

CREATE TABLE `deslengua` (
  `id` int(11) NOT NULL,
  `comunicacion` varchar(100) DEFAULT NULL,
  `indique` varchar(100) DEFAULT NULL,
  `perdida_leng` tinyint(1) DEFAULT NULL,
  `indique_Pl` varchar(100) DEFAULT NULL,
  `obs_DesLengua` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desmotriz`
--

CREATE TABLE `desmotriz` (
  `id` int(11) NOT NULL,
  `C_cabeza` int(11) DEFAULT NULL,
  `S_solo` int(11) DEFAULT NULL,
  `C_gatear` int(11) DEFAULT NULL,
  `C_apoyo` int(11) DEFAULT NULL,
  `S_apoyo` int(11) DEFAULT NULL,
  `E_1palabras` int(11) DEFAULT NULL,
  `E_1frases` int(11) DEFAULT NULL,
  `V_solo` int(11) DEFAULT NULL,
  `c_EsVDiurno` tinyint(1) DEFAULT NULL,
  `c_EsVNocturno` tinyint(1) DEFAULT NULL,
  `c_EsADiurno` tinyint(1) DEFAULT NULL,
  `c_EsANocturno` tinyint(1) DEFAULT NULL,
  `U_panal` tinyint(1) DEFAULT NULL,
  `U_PanalEntr` tinyint(1) DEFAULT NULL,
  `A_bano` tinyint(1) DEFAULT NULL,
  `indique_ABano` varchar(100) DEFAULT NULL,
  `A_motoraG` varchar(100) DEFAULT NULL,
  `T_muscG` varchar(100) DEFAULT NULL,
  `Es_Caminar` tinyint(1) DEFAULT NULL,
  `C_frecuen` tinyint(1) DEFAULT NULL,
  `D_lateral` varchar(100) DEFAULT NULL,
  `obs_DesMotriz` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dessocial`
--

CREATE TABLE `dessocial` (
  `id` int(11) NOT NULL,
  `react_luz` varchar(100) DEFAULT NULL,
  `react_sonido` varchar(100) DEFAULT NULL,
  `react_persona` varchar(100) DEFAULT NULL,
  `obs_DesSocial` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `ID` int(11) NOT NULL,
  `especialista` int(11) DEFAULT NULL,
  `fecha_u_control` date DEFAULT NULL,
  `informe_diagnostico` longblob,
  `tipoDocumento` varchar(50) DEFAULT NULL,
  `beneficiario` varchar(13) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embarazoparto`
--

CREATE TABLE `embarazoparto` (
  `id` int(11) NOT NULL,
  `Em_controlado` tinyint(1) DEFAULT NULL,
  `per_control` varchar(100) DEFAULT NULL,
  `consumo` tinyint(1) DEFAULT NULL,
  `indique_c` varchar(100) DEFAULT NULL,
  `complicaciones` tinyint(1) DEFAULT NULL,
  `indique_com` varchar(100) DEFAULT NULL,
  `semanas_em` int(11) DEFAULT NULL,
  `tipo_part` int(11) DEFAULT NULL,
  `motivo_Ces` varchar(100) DEFAULT NULL,
  `asiste_Med` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrevista`
--

CREATE TABLE `entrevista` (
  `id` int(11) NOT NULL,
  `rut_bene` varchar(13) DEFAULT NULL,
  `rut_usuario` varchar(13) DEFAULT NULL,
  `id_embPart` int(11) DEFAULT NULL,
  `id_postParto` int(11) DEFAULT NULL,
  `id_lactancia` int(11) DEFAULT NULL,
  `id_DesMotriz` int(11) DEFAULT NULL,
  `id_Vision` int(11) DEFAULT NULL,
  `id_Audicion` int(11) DEFAULT NULL,
  `id_DesLengua` int(11) DEFAULT NULL,
  `id_DesSocial` int(11) DEFAULT NULL,
  `id_Salud` int(11) DEFAULT NULL,
  `id_AntFam` int(11) DEFAULT NULL,
  `id_AntEscolar` int(11) DEFAULT NULL,
  `id_ActFam` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialista`
--

CREATE TABLE `especialista` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialista`
--

INSERT INTO `especialista` (`ID`, `nombre`) VALUES
(1, 'Neurologo'),
(2, 'Psicologo'),
(3, 'No posee diagnostico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_admin`
--

CREATE TABLE `evento_admin` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `startHour` time DEFAULT NULL,
  `end` date DEFAULT NULL,
  `endHour` time DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lactancia`
--

CREATE TABLE `lactancia` (
  `id` int(11) NOT NULL,
  `l_materna` varchar(100) DEFAULT NULL,
  `l_mixto` varchar(100) DEFAULT NULL,
  `l_relleno` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco`
--

CREATE TABLE `parentesco` (
  `ID` int(11) NOT NULL,
  `parecido` int(11) DEFAULT NULL,
  `beneficiario` varchar(13) DEFAULT NULL,
  `tutor` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pension`
--

CREATE TABLE `pension` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pension`
--

INSERT INTO `pension` (`ID`, `nombre`) VALUES
(1, 'No posee pensión'),
(2, 'Asignación Duplo'),
(3, 'Pension basica solidaria de invalidez'),
(4, 'Subsidio a la discapacidad mental'),
(5, 'Pensión de sobrevivencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postparto`
--

CREATE TABLE `postparto` (
  `id` int(11) NOT NULL,
  `peso` int(11) DEFAULT NULL,
  `talla` int(11) DEFAULT NULL,
  `apgar_1` int(11) DEFAULT NULL,
  `apgar_5` int(11) DEFAULT NULL,
  `hospit_nac` tinyint(1) DEFAULT NULL,
  `motiv_Hos` varchar(100) DEFAULT NULL,
  `control_per` tinyint(1) DEFAULT NULL,
  `vacunas` tinyint(1) DEFAULT NULL,
  `obs_12m` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_socialh`
--

CREATE TABLE `registro_socialh` (
  `ID` int(11) NOT NULL,
  `copia_cartola` longblob,
  `porcentaje` int(11) DEFAULT NULL,
  `tipoDocumento` varchar(50) DEFAULT NULL,
  `beneficiario` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_teleton`
--

CREATE TABLE `registro_teleton` (
  `ID` int(11) NOT NULL,
  `registro` varchar(50) DEFAULT NULL,
  `beneficiario` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salud`
--

CREATE TABLE `salud` (
  `id` int(11) NOT NULL,
  `tratamiento` tinyint(1) DEFAULT NULL,
  `Ind_tratam` varchar(100) DEFAULT NULL,
  `medicamento` tinyint(1) DEFAULT NULL,
  `ind_medic` varchar(100) DEFAULT NULL,
  `alimentacion` varchar(100) DEFAULT NULL,
  `indique_ali` varchar(100) DEFAULT NULL,
  `talla_act` int(11) DEFAULT NULL,
  `peso_act` double DEFAULT NULL,
  `peso_IMC` varchar(100) DEFAULT NULL,
  `c_solo` tinyint(1) DEFAULT NULL,
  `gusta_comer` varchar(100) DEFAULT NULL,
  `nogusta_comer` varchar(100) DEFAULT NULL,
  `sueno` varchar(100) DEFAULT NULL,
  `hora_dormir` time DEFAULT NULL,
  `duerme` varchar(100) DEFAULT NULL,
  `espDuerme` text,
  `humor` int(11) DEFAULT NULL,
  `indique_h` varchar(100) DEFAULT NULL,
  `obs_Salud` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `ID` int(11) NOT NULL,
  `RUT` varchar(13) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `comuna` varchar(50) DEFAULT NULL,
  `c_identidad` longblob,
  `n_escolar` int(11) DEFAULT NULL,
  `ocupacion` varchar(50) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `prevision` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_prevision`
--

CREATE TABLE `t_prevision` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_prevision`
--

INSERT INTO `t_prevision` (`ID`, `nombre`) VALUES
(1, 'Fonasa A'),
(2, 'Fonasa B'),
(3, 'Fonasa C'),
(4, 'Fonasa D'),
(5, 'Isapre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`ID`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `RUT` varchar(13) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `passwd` varchar(256) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `t_user` int(11) DEFAULT NULL,
  `a_user` int(11) DEFAULT NULL,
  `cargo` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `RUT`, `nombre`, `apellido`, `email`, `passwd`, `telefono`, `t_user`, `a_user`, `cargo`, `activo`) VALUES
(1, '15.116.506-0', 'Nicolas Antonio', 'Perez Droguett', 'nicolasperezcorreo@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 949310401, 1, 1, 1, 1),
(2, '20.660.314-3', 'Javier Alein', 'Villalobos Ramirez', 'jr972971@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 949310401, 2, 1, 1, 1),
(3, '15.738.857-6', 'Viviana Andrea', 'Droguett Rodriguez', 'viviana@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 949310401, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vision`
--

CREATE TABLE `vision` (
  `id` int(11) NOT NULL,
  `u_lentes` tinyint(1) DEFAULT NULL,
  `obs_Vision` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actfam`
--
ALTER TABLE `actfam`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `antescolar`
--
ALTER TABLE `antescolar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `antfam`
--
ALTER TABLE `antfam`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `audicion`
--
ALTER TABLE `audicion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `a_usuario`
--
ALTER TABLE `a_usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `RUT` (`RUT`),
  ADD KEY `prevision` (`prevision`),
  ADD KEY `pension` (`pension`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiario` (`beneficiario`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `area_u` (`area_u`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compactfam`
--
ALTER TABLE `compactfam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_actFam` (`id_actFam`);

--
-- Indices de la tabla `compaudicion`
--
ALTER TABLE `compaudicion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_audicion` (`id_audicion`);

--
-- Indices de la tabla `compdeslengua_compr`
--
ALTER TABLE `compdeslengua_compr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Des_Lengua` (`id_Des_Lengua`);

--
-- Indices de la tabla `compdeslengua_expre`
--
ALTER TABLE `compdeslengua_expre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Des_Lengua` (`id_Des_Lengua`);

--
-- Indices de la tabla `compdesmotrizfina`
--
ALTER TABLE `compdesmotrizfina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_DesMotriz` (`id_DesMotriz`);

--
-- Indices de la tabla `compdesmotrizscog`
--
ALTER TABLE `compdesmotrizscog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_DesMotriz` (`id_DesMotriz`);

--
-- Indices de la tabla `compdessocial`
--
ALTER TABLE `compdessocial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_DesSocial` (`id_DesSocial`);

--
-- Indices de la tabla `compdiagaudicion`
--
ALTER TABLE `compdiagaudicion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_audicion` (`id_audicion`);

--
-- Indices de la tabla `compdiagvision`
--
ALTER TABLE `compdiagvision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vision` (`id_vision`);

--
-- Indices de la tabla `complementopparto`
--
ALTER TABLE `complementopparto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_postParto` (`id_postParto`);

--
-- Indices de la tabla `compsaludactual`
--
ALTER TABLE `compsaludactual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Salud` (`id_Salud`);

--
-- Indices de la tabla `compsaludnocturno`
--
ALTER TABLE `compsaludnocturno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Salud` (`id_Salud`);

--
-- Indices de la tabla `compvision`
--
ALTER TABLE `compvision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vision` (`id_vision`);

--
-- Indices de la tabla `condicion`
--
ALTER TABLE `condicion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `rut_bene` (`rut_bene`),
  ADD KEY `rut_profe` (`rut_profe`);

--
-- Indices de la tabla `c_discapacidad`
--
ALTER TABLE `c_discapacidad`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `beneficiario` (`beneficiario`);

--
-- Indices de la tabla `datosgenerales`
--
ALTER TABLE `datosgenerales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiario` (`beneficiario`);

--
-- Indices de la tabla `deslengua`
--
ALTER TABLE `deslengua`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `desmotriz`
--
ALTER TABLE `desmotriz`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dessocial`
--
ALTER TABLE `dessocial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `especialista` (`especialista`),
  ADD KEY `beneficiario` (`beneficiario`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `embarazoparto`
--
ALTER TABLE `embarazoparto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrevista`
--
ALTER TABLE `entrevista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rut_bene` (`rut_bene`),
  ADD KEY `rut_usuario` (`rut_usuario`),
  ADD KEY `id_embPart` (`id_embPart`),
  ADD KEY `id_postParto` (`id_postParto`),
  ADD KEY `id_lactancia` (`id_lactancia`),
  ADD KEY `id_DesMotriz` (`id_DesMotriz`),
  ADD KEY `id_Vision` (`id_Vision`),
  ADD KEY `id_Audicion` (`id_Audicion`),
  ADD KEY `id_DesLengua` (`id_DesLengua`),
  ADD KEY `id_DesSocial` (`id_DesSocial`),
  ADD KEY `id_Salud` (`id_Salud`),
  ADD KEY `id_AntFam` (`id_AntFam`),
  ADD KEY `id_AntEscolar` (`id_AntEscolar`),
  ADD KEY `id_ActFam` (`id_ActFam`);

--
-- Indices de la tabla `especialista`
--
ALTER TABLE `especialista`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evento_admin`
--
ALTER TABLE `evento_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lactancia`
--
ALTER TABLE `lactancia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `beneficiario` (`beneficiario`),
  ADD KEY `tutor` (`tutor`);

--
-- Indices de la tabla `pension`
--
ALTER TABLE `pension`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `postparto`
--
ALTER TABLE `postparto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_socialh`
--
ALTER TABLE `registro_socialh`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `beneficiario` (`beneficiario`);

--
-- Indices de la tabla `registro_teleton`
--
ALTER TABLE `registro_teleton`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `beneficiario` (`beneficiario`);

--
-- Indices de la tabla `salud`
--
ALTER TABLE `salud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `RUT` (`RUT`),
  ADD KEY `prevision` (`prevision`);

--
-- Indices de la tabla `t_prevision`
--
ALTER TABLE `t_prevision`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `RUT` (`RUT`),
  ADD KEY `t_user` (`t_user`),
  ADD KEY `a_user` (`a_user`),
  ADD KEY `cargo` (`cargo`);

--
-- Indices de la tabla `vision`
--
ALTER TABLE `vision`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actfam`
--
ALTER TABLE `actfam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `antescolar`
--
ALTER TABLE `antescolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `antfam`
--
ALTER TABLE `antfam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `audicion`
--
ALTER TABLE `audicion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `a_usuario`
--
ALTER TABLE `a_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compactfam`
--
ALTER TABLE `compactfam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compaudicion`
--
ALTER TABLE `compaudicion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compdeslengua_compr`
--
ALTER TABLE `compdeslengua_compr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compdeslengua_expre`
--
ALTER TABLE `compdeslengua_expre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compdesmotrizfina`
--
ALTER TABLE `compdesmotrizfina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compdesmotrizscog`
--
ALTER TABLE `compdesmotrizscog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compdessocial`
--
ALTER TABLE `compdessocial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compdiagaudicion`
--
ALTER TABLE `compdiagaudicion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compdiagvision`
--
ALTER TABLE `compdiagvision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `complementopparto`
--
ALTER TABLE `complementopparto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compsaludactual`
--
ALTER TABLE `compsaludactual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compsaludnocturno`
--
ALTER TABLE `compsaludnocturno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compvision`
--
ALTER TABLE `compvision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `condicion`
--
ALTER TABLE `condicion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `c_discapacidad`
--
ALTER TABLE `c_discapacidad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datosgenerales`
--
ALTER TABLE `datosgenerales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deslengua`
--
ALTER TABLE `deslengua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `desmotriz`
--
ALTER TABLE `desmotriz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dessocial`
--
ALTER TABLE `dessocial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `embarazoparto`
--
ALTER TABLE `embarazoparto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrevista`
--
ALTER TABLE `entrevista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialista`
--
ALTER TABLE `especialista`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evento_admin`
--
ALTER TABLE `evento_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lactancia`
--
ALTER TABLE `lactancia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pension`
--
ALTER TABLE `pension`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `postparto`
--
ALTER TABLE `postparto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_socialh`
--
ALTER TABLE `registro_socialh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_teleton`
--
ALTER TABLE `registro_teleton`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salud`
--
ALTER TABLE `salud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_prevision`
--
ALTER TABLE `t_prevision`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vision`
--
ALTER TABLE `vision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `beneficiario_ibfk_1` FOREIGN KEY (`prevision`) REFERENCES `t_prevision` (`ID`),
  ADD CONSTRAINT `beneficiario_ibfk_2` FOREIGN KEY (`pension`) REFERENCES `pension` (`ID`);

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`RUT`),
  ADD CONSTRAINT `bitacora_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`RUT`),
  ADD CONSTRAINT `bitacora_ibfk_3` FOREIGN KEY (`area_u`) REFERENCES `a_usuario` (`ID`);

--
-- Filtros para la tabla `compactfam`
--
ALTER TABLE `compactfam`
  ADD CONSTRAINT `compactfam_ibfk_1` FOREIGN KEY (`id_actFam`) REFERENCES `actfam` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compaudicion`
--
ALTER TABLE `compaudicion`
  ADD CONSTRAINT `compaudicion_ibfk_1` FOREIGN KEY (`id_audicion`) REFERENCES `audicion` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compdeslengua_compr`
--
ALTER TABLE `compdeslengua_compr`
  ADD CONSTRAINT `compdeslengua_compr_ibfk_1` FOREIGN KEY (`id_Des_Lengua`) REFERENCES `deslengua` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compdeslengua_expre`
--
ALTER TABLE `compdeslengua_expre`
  ADD CONSTRAINT `compdeslengua_expre_ibfk_1` FOREIGN KEY (`id_Des_Lengua`) REFERENCES `deslengua` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compdesmotrizfina`
--
ALTER TABLE `compdesmotrizfina`
  ADD CONSTRAINT `compdesmotrizfina_ibfk_1` FOREIGN KEY (`id_DesMotriz`) REFERENCES `desmotriz` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compdesmotrizscog`
--
ALTER TABLE `compdesmotrizscog`
  ADD CONSTRAINT `compdesmotrizscog_ibfk_1` FOREIGN KEY (`id_DesMotriz`) REFERENCES `desmotriz` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compdessocial`
--
ALTER TABLE `compdessocial`
  ADD CONSTRAINT `compdessocial_ibfk_1` FOREIGN KEY (`id_DesSocial`) REFERENCES `dessocial` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compdiagaudicion`
--
ALTER TABLE `compdiagaudicion`
  ADD CONSTRAINT `compdiagaudicion_ibfk_1` FOREIGN KEY (`id_audicion`) REFERENCES `audicion` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compdiagvision`
--
ALTER TABLE `compdiagvision`
  ADD CONSTRAINT `compdiagvision_ibfk_1` FOREIGN KEY (`id_vision`) REFERENCES `vision` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `complementopparto`
--
ALTER TABLE `complementopparto`
  ADD CONSTRAINT `complementopparto_ibfk_1` FOREIGN KEY (`id_postParto`) REFERENCES `postparto` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compsaludactual`
--
ALTER TABLE `compsaludactual`
  ADD CONSTRAINT `compsaludactual_ibfk_1` FOREIGN KEY (`id_Salud`) REFERENCES `salud` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compsaludnocturno`
--
ALTER TABLE `compsaludnocturno`
  ADD CONSTRAINT `compsaludnocturno_ibfk_1` FOREIGN KEY (`id_Salud`) REFERENCES `salud` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compvision`
--
ALTER TABLE `compvision`
  ADD CONSTRAINT `compvision_ibfk_1` FOREIGN KEY (`id_vision`) REFERENCES `vision` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`rut_bene`) REFERENCES `beneficiario` (`RUT`) ON DELETE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`rut_profe`) REFERENCES `usuario` (`RUT`) ON DELETE CASCADE;

--
-- Filtros para la tabla `c_discapacidad`
--
ALTER TABLE `c_discapacidad`
  ADD CONSTRAINT `c_discapacidad_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`RUT`) ON DELETE CASCADE;

--
-- Filtros para la tabla `datosgenerales`
--
ALTER TABLE `datosgenerales`
  ADD CONSTRAINT `datosgenerales_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`RUT`);

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`especialista`) REFERENCES `especialista` (`ID`),
  ADD CONSTRAINT `diagnostico_ibfk_2` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`RUT`) ON DELETE CASCADE,
  ADD CONSTRAINT `diagnostico_ibfk_3` FOREIGN KEY (`codigo`) REFERENCES `condicion` (`ID`);

--
-- Filtros para la tabla `entrevista`
--
ALTER TABLE `entrevista`
  ADD CONSTRAINT `entrevista_ibfk_1` FOREIGN KEY (`rut_bene`) REFERENCES `beneficiario` (`RUT`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_10` FOREIGN KEY (`id_DesSocial`) REFERENCES `dessocial` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_11` FOREIGN KEY (`id_Salud`) REFERENCES `salud` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_12` FOREIGN KEY (`id_AntFam`) REFERENCES `antfam` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_13` FOREIGN KEY (`id_AntEscolar`) REFERENCES `antescolar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_14` FOREIGN KEY (`id_ActFam`) REFERENCES `actfam` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_2` FOREIGN KEY (`rut_usuario`) REFERENCES `usuario` (`RUT`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_3` FOREIGN KEY (`id_embPart`) REFERENCES `embarazoparto` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_4` FOREIGN KEY (`id_postParto`) REFERENCES `postparto` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_5` FOREIGN KEY (`id_lactancia`) REFERENCES `lactancia` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_6` FOREIGN KEY (`id_DesMotriz`) REFERENCES `desmotriz` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_7` FOREIGN KEY (`id_Vision`) REFERENCES `vision` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_8` FOREIGN KEY (`id_Audicion`) REFERENCES `audicion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrevista_ibfk_9` FOREIGN KEY (`id_DesLengua`) REFERENCES `deslengua` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `parentesco`
--
ALTER TABLE `parentesco`
  ADD CONSTRAINT `parentesco_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`RUT`) ON DELETE CASCADE,
  ADD CONSTRAINT `parentesco_ibfk_2` FOREIGN KEY (`tutor`) REFERENCES `tutor` (`RUT`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registro_socialh`
--
ALTER TABLE `registro_socialh`
  ADD CONSTRAINT `registro_socialh_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`RUT`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registro_teleton`
--
ALTER TABLE `registro_teleton`
  ADD CONSTRAINT `registro_teleton_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`RUT`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`prevision`) REFERENCES `t_prevision` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`t_user`) REFERENCES `t_usuario` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`a_user`) REFERENCES `a_usuario` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
