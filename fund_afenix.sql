-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2022 a las 23:14:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fund_afenix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_usuario`
--

CREATE TABLE `a_usuario` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `a_usuario`
--

INSERT INTO `a_usuario` (`ID`, `nombre`) VALUES
(1, 'director area tecnica'),
(2, 'fonoaudiolog@'),
(3, 'terapeuta ocupacional');

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
  `c_identidad` longblob DEFAULT NULL,
  `teleton` tinyint(1) DEFAULT NULL,
  `pension` tinyint(1) DEFAULT NULL,
  `pension_basicaS` tinyint(1) DEFAULT NULL,
  `subsidioD_mental` tinyint(1) DEFAULT NULL,
  `p_sobrevivencia` tinyint(1) DEFAULT NULL,
  `a_duplo` tinyint(1) DEFAULT NULL,
  `chile_solidario` tinyint(1) DEFAULT NULL,
  `r_s_hogares` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`ID`, `nombre`) VALUES
(1, 'Gerencia'),
(2, 'secretaria'),
(3, 'Profesional'),
(4, 'practicante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion`
--

CREATE TABLE `condicion` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_discapacidad`
--

CREATE TABLE `c_discapacidad` (
  `ID` int(11) NOT NULL,
  `n_credencial` int(20) DEFAULT NULL,
  `o_principal` varchar(50) DEFAULT NULL,
  `o_secundario` varchar(50) DEFAULT NULL,
  `porcentaje` double DEFAULT NULL,
  `grado` varchar(50) DEFAULT NULL,
  `movilidad_reducida` varchar(50) DEFAULT NULL,
  `c_parte_delantera` longblob DEFAULT NULL,
  `c_parte_trasera` longblob DEFAULT NULL,
  `beneficiario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `ID` int(11) NOT NULL,
  `especialista` varchar(50) DEFAULT NULL,
  `fecha_u_control` date DEFAULT NULL,
  `informe_diagnostico` longblob DEFAULT NULL,
  `beneficiario` int(11) DEFAULT NULL,
  `codigo_c` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentezco`
--

CREATE TABLE `parentezco` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `beneficiario` int(11) DEFAULT NULL,
  `tutor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_socialh`
--

CREATE TABLE `registro_socialh` (
  `ID` int(11) NOT NULL,
  `copia_cartola` longblob DEFAULT NULL,
  `beneficiario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_teleton`
--

CREATE TABLE `registro_teleton` (
  `ID` int(11) NOT NULL,
  `registro` varchar(50) DEFAULT NULL,
  `beneficiario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `ID` int(11) NOT NULL,
  `RUT` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `comuna` varchar(50) DEFAULT NULL,
  `c_identidad` longblob DEFAULT NULL,
  `n_escolar` varchar(50) DEFAULT NULL,
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
(1, 'administrador'),
(2, 'trabajador');

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
  `cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `RUT`, `nombre`, `apellido`, `email`, `passwd`, `telefono`, `t_user`, `a_user`, `cargo`) VALUES
(1, '15.116.506-0', 'nicolas Antonio', 'Perez Droguett', 'nicolasperezcorreo@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 949310401, 2, 3, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `a_usuario`
--
ALTER TABLE `a_usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `condicion`
--
ALTER TABLE `condicion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `c_discapacidad`
--
ALTER TABLE `c_discapacidad`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `beneficiario` (`beneficiario`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `beneficiario` (`beneficiario`),
  ADD KEY `codigo_c` (`codigo_c`);

--
-- Indices de la tabla `parentezco`
--
ALTER TABLE `parentezco`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `beneficiario` (`beneficiario`),
  ADD KEY `tutor` (`tutor`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `a_usuario`
--
ALTER TABLE `a_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `condicion`
--
ALTER TABLE `condicion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `c_discapacidad`
--
ALTER TABLE `c_discapacidad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parentezco`
--
ALTER TABLE `parentezco`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_prevision`
--
ALTER TABLE `t_prevision`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `c_discapacidad`
--
ALTER TABLE `c_discapacidad`
  ADD CONSTRAINT `c_discapacidad_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`ID`);

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`ID`),
  ADD CONSTRAINT `diagnostico_ibfk_2` FOREIGN KEY (`codigo_c`) REFERENCES `condicion` (`ID`);

--
-- Filtros para la tabla `parentezco`
--
ALTER TABLE `parentezco`
  ADD CONSTRAINT `parentezco_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`ID`),
  ADD CONSTRAINT `parentezco_ibfk_2` FOREIGN KEY (`tutor`) REFERENCES `tutor` (`ID`);

--
-- Filtros para la tabla `registro_socialh`
--
ALTER TABLE `registro_socialh`
  ADD CONSTRAINT `registro_socialh_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`ID`);

--
-- Filtros para la tabla `registro_teleton`
--
ALTER TABLE `registro_teleton`
  ADD CONSTRAINT `registro_teleton_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `beneficiario` (`ID`);

--
-- Filtros para la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`prevision`) REFERENCES `t_prevision` (`ID`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`t_user`) REFERENCES `t_usuario` (`ID`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`a_user`) REFERENCES `a_usuario` (`ID`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
