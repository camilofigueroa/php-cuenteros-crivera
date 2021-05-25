-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2021 a las 18:53:14
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cuenteros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_capitulos`
--

CREATE TABLE `tb_capitulos` (
  `id_capitulo` int(11) NOT NULL,
  `titulo_capitulo` varchar(300) NOT NULL,
  `texto` text DEFAULT NULL,
  `fecha_registro` datetime NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_capitulos`
--

INSERT INTO `tb_capitulos` (`id_capitulo`, `titulo_capitulo`, `texto`, `fecha_registro`, `id_proyecto`) VALUES
(1, 'El renacuajo sale de la casa', 'Rin rin renacuajo salió esta mañana muy tieso y muy majo, con pantalón corto, corbajta de moda, sombrero encintado, y...', '2021-05-19 19:25:02', 1),
(2, 'Francachela y comilona', 'El renacuajo halla un ratón vecino que le dice, amigo, visitemos a doña ratona, que habrá francachela, y habrá comilona.', '2021-05-20 15:24:57', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_capitulos_objetos`
--

CREATE TABLE `tb_capitulos_objetos` (
  `id_capitulo` int(11) NOT NULL,
  `id_objeto` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_capitulos_objetos`
--

INSERT INTO `tb_capitulos_objetos` (`id_capitulo`, `id_objeto`, `fecha_registro`) VALUES
(1, 'La casa de Rin rin renacuajo', '2021-05-20 16:12:51'),
(1, 'Mamá de Rin Rin', '2021-05-19 19:25:44'),
(1, 'Rin rin renacuajo', '2021-05-19 19:25:33'),
(2, 'El ratón vecino', '2021-05-20 15:26:39'),
(2, 'Rin rin renacuajo', '2021-05-20 15:26:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_objetos`
--

CREATE TABLE `tb_objetos` (
  `id_objeto` varchar(100) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `tipo_objeto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_objetos`
--

INSERT INTO `tb_objetos` (`id_objeto`, `id_proyecto`, `fecha_registro`, `tipo_objeto`) VALUES
('El ratón vecino', 1, '2021-05-20 15:24:25', 'personaje'),
('La casa de Rin rin renacuajo', 1, '2021-05-20 16:12:10', 'escenario'),
('Mamá de Rin Rin', 1, '2021-05-19 19:24:25', 'personaje'),
('Rin rin renacuajo', 1, '2021-05-19 19:23:56', 'personaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proyectos`
--

CREATE TABLE `tb_proyectos` (
  `id_proyecto` int(11) NOT NULL,
  `titulo_proyecto` varchar(300) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_proyectos`
--

INSERT INTO `tb_proyectos` (`id_proyecto`, `titulo_proyecto`, `fecha_registro`) VALUES
(1, 'El renacuajo paseador', '2021-05-19 19:22:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipos_objeto`
--

CREATE TABLE `tb_tipos_objeto` (
  `tipo_objeto` varchar(20) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_tipos_objeto`
--

INSERT INTO `tb_tipos_objeto` (`tipo_objeto`, `fecha_registro`) VALUES
('escenario', '2021-05-19 19:23:25'),
('objeto o sustancia', '2021-05-19 19:23:31'),
('personaje', '2021-05-19 19:23:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_vectorizacion`
--

CREATE TABLE `tb_tipo_vectorizacion` (
  `id_tipo_vectorizacion` int(11) NOT NULL,
  `desc_vectorizacion` varchar(50) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_tipo_vectorizacion`
--

INSERT INTO `tb_tipo_vectorizacion` (`id_tipo_vectorizacion`, `desc_vectorizacion`, `fecha_registro`) VALUES
(1, 'discute a o con', '2021-05-23 22:14:55'),
(2, 'batalla cuerpo a cuerpo contra ', '2021-05-23 22:15:18'),
(3, 'agrede a', '2021-05-23 23:03:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_vectorizados`
--

CREATE TABLE `tb_vectorizados` (
  `id_vectorizacion` int(11) NOT NULL,
  `id_capitulo` int(11) NOT NULL,
  `id_objeto_vectoriza` varchar(100) NOT NULL,
  `id_objeto_vectorizado` varchar(100) NOT NULL,
  `id_tipo_vectorizacion` int(11) NOT NULL,
  `id_estado` smallint(5) UNSIGNED DEFAULT NULL,
  `id_vectorizacion_padre` int(11) NOT NULL,
  `nota` varchar(200) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_vectorizados`
--

INSERT INTO `tb_vectorizados` (`id_vectorizacion`, `id_capitulo`, `id_objeto_vectoriza`, `id_objeto_vectorizado`, `id_tipo_vectorizacion`, `id_estado`, `id_vectorizacion_padre`, `nota`, `fecha_registro`) VALUES
(1, 1, 'Rin rin renacuajo', 'Mamá de Rin Rin', 1, 0, 1, 'Rin rin renacuajo le contesta a su madre, debió ser al revés la vectorización.', '2021-05-23 23:07:35'),
(2, 1, 'Mamá de Rin Rin', 'Rin rin renacuajo', 1, 1, 1, 'Finaliza la vectorización cuando el renacuajo abandona la casa, se cierra el caso.', '2021-05-25 11:49:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_capitulos`
--
ALTER TABLE `tb_capitulos`
  ADD PRIMARY KEY (`id_capitulo`,`id_proyecto`),
  ADD KEY `fk_proyectos_capitulos` (`id_proyecto`);

--
-- Indices de la tabla `tb_capitulos_objetos`
--
ALTER TABLE `tb_capitulos_objetos`
  ADD PRIMARY KEY (`id_capitulo`,`id_objeto`),
  ADD KEY `fk_objetos` (`id_objeto`);

--
-- Indices de la tabla `tb_objetos`
--
ALTER TABLE `tb_objetos`
  ADD PRIMARY KEY (`id_objeto`,`id_proyecto`),
  ADD KEY `idx_tipo_objeto` (`tipo_objeto`),
  ADD KEY `fk_proyectos_objetos` (`id_proyecto`);

--
-- Indices de la tabla `tb_proyectos`
--
ALTER TABLE `tb_proyectos`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `tb_tipos_objeto`
--
ALTER TABLE `tb_tipos_objeto`
  ADD PRIMARY KEY (`tipo_objeto`);

--
-- Indices de la tabla `tb_tipo_vectorizacion`
--
ALTER TABLE `tb_tipo_vectorizacion`
  ADD PRIMARY KEY (`id_tipo_vectorizacion`);

--
-- Indices de la tabla `tb_vectorizados`
--
ALTER TABLE `tb_vectorizados`
  ADD PRIMARY KEY (`id_vectorizacion`),
  ADD KEY `idx_vectorizacion` (`id_tipo_vectorizacion`),
  ADD KEY `idx_capitulo` (`id_capitulo`),
  ADD KEY `idx_vectorizados` (`id_objeto_vectoriza`,`id_objeto_vectorizado`),
  ADD KEY `fk_vectorizados_caps_objetos_2` (`id_objeto_vectorizado`),
  ADD KEY `idx_vectorizacion_padre` (`id_vectorizacion_padre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_capitulos`
--
ALTER TABLE `tb_capitulos`
  MODIFY `id_capitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_proyectos`
--
ALTER TABLE `tb_proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_vectorizacion`
--
ALTER TABLE `tb_tipo_vectorizacion`
  MODIFY `id_tipo_vectorizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_vectorizados`
--
ALTER TABLE `tb_vectorizados`
  MODIFY `id_vectorizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_capitulos`
--
ALTER TABLE `tb_capitulos`
  ADD CONSTRAINT `fk_proyectos_capitulos` FOREIGN KEY (`id_proyecto`) REFERENCES `tb_proyectos` (`id_proyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_capitulos_objetos`
--
ALTER TABLE `tb_capitulos_objetos`
  ADD CONSTRAINT `fk_capitulos` FOREIGN KEY (`id_capitulo`) REFERENCES `tb_capitulos` (`id_capitulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_objetos` FOREIGN KEY (`id_objeto`) REFERENCES `tb_objetos` (`id_objeto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_objetos`
--
ALTER TABLE `tb_objetos`
  ADD CONSTRAINT `fk_proyectos_objetos` FOREIGN KEY (`id_proyecto`) REFERENCES `tb_proyectos` (`id_proyecto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipobjetos_objetos` FOREIGN KEY (`tipo_objeto`) REFERENCES `tb_tipos_objeto` (`tipo_objeto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_vectorizados`
--
ALTER TABLE `tb_vectorizados`
  ADD CONSTRAINT `fk_vector_y_vector_padre` FOREIGN KEY (`id_vectorizacion_padre`) REFERENCES `tb_vectorizados` (`id_vectorizacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vectorizacion_tipovector` FOREIGN KEY (`id_tipo_vectorizacion`) REFERENCES `tb_tipo_vectorizacion` (`id_tipo_vectorizacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vectorizados_caps_objetos` FOREIGN KEY (`id_capitulo`) REFERENCES `tb_capitulos_objetos` (`id_capitulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vectorizados_caps_objetos_1` FOREIGN KEY (`id_objeto_vectoriza`) REFERENCES `tb_capitulos_objetos` (`id_objeto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vectorizados_caps_objetos_2` FOREIGN KEY (`id_objeto_vectorizado`) REFERENCES `tb_capitulos_objetos` (`id_objeto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
