-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2024 a las 14:04:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `expand`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contras` varchar(255) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `perfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `correo`, `contras`, `pais`, `perfil`) VALUES
(1, 'alum-aa', 'a_alumn@gmail.com', '123', 've', 'setter'),
(2, 'alum-bb', 'b_alumn@gmail.com', '123', 'co', 'closer'),
(3, 'alum-cc', 'c_alumn@gmail.com', '123', 'ar', 'setter'),
(4, 'alum_dd', 'd_alumn@gmail.com', '123', 'cl', 'closer'),
(7, 'kiko_alum', 'kikoal@gmail.com', '123', 'br', 'setter'),
(8, 'Cinco', 'cinco@gmail.com', '123', 'ar', 'setter'),
(9, 'Seis', 'seis@gmail.com', '123', 'ar', 'setter'),
(10, 'siete', 'siete@gmail.com', '123', 'ar', 'closer'),
(11, 'Ocho', 'ocho@gmail.com', '123', 'ar', 'closer'),
(12, 'Nueve', 'nueve@gmail.com', '123', 'ar', 'closer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `materia` varchar(100) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `id_alumno`, `materia`, `calificacion`) VALUES
(3, 1, 'historia', 8),
(4, 1, 'matematica', 8),
(5, 1, 'ingles', 9),
(6, 2, 'historia', 6),
(7, 2, 'matematica', 9),
(8, 2, 'ingles', 10),
(10, 1, 'fisica', 6),
(11, 2, 'fisica', 7),
(12, 3, 'historia', 9),
(13, 4, 'historia', 7),
(14, 4, 'fisica', 9),
(15, 4, 'ingles', 6),
(16, 4, 'matematica', 10),
(17, 7, 'historia', 9),
(18, 8, 'Asistencia completa', 10),
(19, 9, 'Asistencia completa', 9),
(20, 10, 'Asistencia completa', 9),
(21, 11, 'Asistencia completa', 10),
(22, 8, 'Presentismo', 8),
(23, 8, 'Aporte de valor', 10),
(24, 8, 'Cámara encendida', 10),
(25, 8, 'Baja de cliente', -200),
(26, 8, 'Ausencia en clases', 0),
(27, 9, 'Presentismo', 8),
(28, 9, 'Aporte de valor', 9),
(29, 9, 'Cámara encendida', 8),
(30, 9, 'Baja de cliente', 0),
(31, 9, 'Ausencia en clases', 0),
(32, 10, 'Presentismo', 10),
(33, 10, 'Aporte de valor', 8),
(34, 10, 'Cámara encendida', 8),
(35, 10, 'Baja de cliente', 0),
(36, 10, 'Ausencia en clases', 0),
(37, 11, 'Presentismo', 10),
(38, 11, 'Aporte de valor', 10),
(39, 11, 'Cámara encendida', 10),
(40, 11, 'Baja de cliente', -200),
(41, 11, 'Ausencia en clases', -20),
(42, 12, 'Presentismo', 9),
(43, 12, 'Aporte de valor', 8),
(44, 12, 'Cámara encendida', 10),
(45, 12, 'Baja de cliente', 0),
(46, 12, 'Ausencia en clases', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profes`
--

CREATE TABLE `profes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contras` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profes`
--

INSERT INTO `profes` (`id`, `nombre`, `correo`, `contras`) VALUES
(1, 'aa', 'a@gmail.com', '123'),
(2, 'bb', 'b@gmail.com', '123'),
(3, 'cc', 'c@gmail.com', '123'),
(4, 'dd', 'd@gmail.com', '123'),
(5, 'ee', 'e@gmail.com', '123'),
(6, 'ff', 'f@gmail.com', '123'),
(7, 'migda', 'migdanell.r@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `profes`
--
ALTER TABLE `profes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `profes`
--
ALTER TABLE `profes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
