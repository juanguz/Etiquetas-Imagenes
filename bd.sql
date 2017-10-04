-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2016 a las 09:49:32
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cliente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) NOT NULL,
  `ruta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `ruta`) VALUES
(1, '1.jpg'),
(2, '2.jpg'),
(3, '3.jpg'),
(4, '4.jpg'),
(5, '5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_tag`
--

CREATE TABLE `img_tag` (
  `id_img` int(10) NOT NULL,
  `id_tags` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `img_tag`
--

INSERT INTO `img_tag` (`id_img`, `id_tags`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 4),
(4, 1),
(4, 3),
(5, 1),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_tags`
--

CREATE TABLE `img_tags` (
  `id_img` int(10) NOT NULL,
  `id_tags` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `img_tags`
--

INSERT INTO `img_tags` (`id_img`, `id_tags`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 166),
(2, 169),
(3, 1),
(3, 4),
(4, 1),
(4, 3),
(5, 1),
(5, 165);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id_tags` int(10) NOT NULL,
  `nombre_tags` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id_tags`, `nombre_tags`) VALUES
(1, 'linux'),
(2, 'debian'),
(3, 'tux'),
(4, 'ubuntu'),
(9, 'pinguinos'),
(165, 'logo'),
(166, 'espiral'),
(167, 'fad'),
(168, 'aa'),
(169, 'asdf'),
(170, 'aadffs'),
(171, 'aaa'),
(172, 'aads'),
(173, 'aaaaa'),
(174, 'aaaa'),
(175, 'fff'),
(176, 'azul'),
(177, 'espiralf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `img_tag`
--
ALTER TABLE `img_tag`
  ADD PRIMARY KEY (`id_img`,`id_tags`),
  ADD KEY `tagsconst` (`id_tags`);

--
-- Indices de la tabla `img_tags`
--
ALTER TABLE `img_tags`
  ADD PRIMARY KEY (`id_img`,`id_tags`),
  ADD KEY `tagsconst` (`id_tags`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tags`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tags` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `img_tags`
--
ALTER TABLE `img_tags`
  ADD CONSTRAINT `img_tags_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `imagenes` (`id`),
  ADD CONSTRAINT `img_tags_ibfk_2` FOREIGN KEY (`id_tags`) REFERENCES `tags` (`id_tags`),
  ADD CONSTRAINT `imgconst` FOREIGN KEY (`id_img`) REFERENCES `imagenes` (`id`),
  ADD CONSTRAINT `imgconstrain` FOREIGN KEY (`id_img`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `imgconstraint` FOREIGN KEY (`id_img`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tagconstraint` FOREIGN KEY (`id_tags`) REFERENCES `tags` (`id_tags`) ON DELETE CASCADE,
  ADD CONSTRAINT `tagsconst` FOREIGN KEY (`id_tags`) REFERENCES `tags` (`id_tags`),
  ADD CONSTRAINT `tagsconstraint` FOREIGN KEY (`id_tags`) REFERENCES `tags` (`id_tags`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
