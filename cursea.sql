-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2022 a las 07:24:37
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursea`
--C
CREATE DATABASE IF NOT EXISTS `cursea` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `cursea`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(12) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(999) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `duracion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `vistas` int(12) NOT NULL DEFAULT 0,
  `tipo_curso` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `descripcion`, `imagen`, `duracion`, `categoria`, `vistas`, `tipo_curso`) VALUES
(1, 'Curso 1', '\r\nAndy Samberg portrays Jacob Sherlock Peralta, a talented but childish detective. His last name is of Spanish origin. Peralta often engages in pranks and makes immature jokes at the expense of his colleagues. He is fun-loving and sarcastic but is often motivated by his emotions more than his colleagues. Despite his goofiness, Peralta is smart, perceptive, and quick thinking, and as', '', '200hrs', 'Categoria', 12, 'texto'),
(2, 'Curso 2', 'Descripcion', '', '30min', 'Categoria', 85, 'video'),
(3, 'Curso 3', 'Descripcion', '', '5hrs', 'Categoria', 10, 'video'),
(4, 'Curso 4', 'Descripcion', '', '', 'Categoria', 2, 'video'),
(5, 'Curso 5', 'Descripcion', '', '', 'Categoria', 25, 'texto'),
(6, 'Curso 6', 'Descripcion', '', '', 'Categoria', 5, 'video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `texto`
--

CREATE TABLE `texto` (
  `id` int(12) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `id_curso` int(12) NOT NULL,
  `numero` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `texto`
--

INSERT INTO `texto` (`id`, `nombre`, `id_curso`, `numero`) VALUES
(1, 'Video 1', 1, 1),
(3, 'Video 2', 1, 2),
(4, 'Video 3', 1, 3),
(5, 'Video 4', 1, 4),
(6, 'Video 5', 1, 5),
(7, 'Video 7', 1, 7),
(8, 'Video 8', 1, 8),
(9, 'Video 6', 1, 6),
(10, 'Video 10', 1, 10),
(11, 'Video 11', 1, 11),
(12, 'Video 12', 1, 12),
(13, 'Video 13', 1, 13),
(14, 'Video 14', 1, 14),
(15, 'Video 9', 1, 9),
(16, 'Video 15', 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(12) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `contraseña` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `premium` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `tarjeta` int(16) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tema` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `activa` int(1) NOT NULL,
  `cursos_terminados` int(12) NOT NULL DEFAULT 0,
  `cursos_pendientes` int(12) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `contraseña`, `premium`, `tarjeta`, `foto`, `tema`, `activa`, `cursos_terminados`, `cursos_pendientes`) VALUES
(19, 'Diego Barajas', 'desaubv@gmail.com', 'diego382004', 'no', NULL, NULL, 'claro', 1, 0, 0),
(20, 'Juan Lopez', 'desaubv@hotmail.com', '123456', 'no', NULL, NULL, 'claro', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id` int(12) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `id_curso` int(12) NOT NULL,
  `numero` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id`, `nombre`, `id_curso`, `numero`) VALUES
(1, 'Video 1', 1, 1),
(3, 'Video 2', 1, 2),
(4, 'Video 3', 1, 3),
(5, 'Video 4', 1, 4),
(6, 'Video 5', 1, 5),
(7, 'Video 7', 1, 7),
(8, 'Video 8', 1, 8),
(9, 'Video 6', 1, 6),
(10, 'Video 10', 1, 10),
(11, 'Video 11', 1, 11),
(12, 'Video 12', 1, 12),
(13, 'Video 13', 1, 13),
(14, 'Video 14', 1, 14),
(15, 'Video 9', 1, 9),
(16, 'Video 15', 1, 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `texto`
--
ALTER TABLE `texto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `texto`
--
ALTER TABLE `texto`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
