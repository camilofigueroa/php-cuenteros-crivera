-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2021 a las 02:41:51
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `texto` text,
  `fecha_registro` datetime NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_capitulos`
--

INSERT INTO `tb_capitulos` (`id_capitulo`, `titulo_capitulo`, `texto`, `fecha_registro`, `id_proyecto`) VALUES
(1, 'El renacuajo sale de la casa', 'El hijo de Rana, Rinrín Renacuajo,\r\nsalió esta mañana muy tieso y muy majo\r\ncon pantalón corto, corbata a la moda,\r\nsombrero encintado y chupa de boda.\r\n“¡Muchacho no salgas!” le grita mamá,\r\npero él le hace un gesto y orondo se va.\r\n\r\nHalló en el camino a un ratón vecino,\r\ny le dijo: “¡Amigo! venga usted conmigo,\r\nvisitemos juntos a doña Ratona\r\ny habrá francachela y habrá comilona”.\r\n\r\nA poco llegaron, y avanza Ratón,\r\nestírase el cuello, coge el aldabón,\r\nda dos o tres golpes, preguntan: “¿Quién es?”\r\n— “Yo, doña Ratona, beso a usted los pies”. \r\n\r\nEl hijo de Rana, Rinrín Renacuajo,\r\nsalió esta mañana muy tieso y muy majo\r\ncon pantalón corto, corbata a la moda,\r\nsombrero encintado y chupa de boda.\r\n“¡Muchacho no salgas!” le grita mamá,\r\npero él le hace un gesto y orondo se va.\r\n\r\nHalló en el camino a un ratón vecino,\r\ny le dijo: “¡Amigo! venga usted conmigo,\r\nvisitemos juntos a doña Ratona\r\ny habrá francachela y habrá comilona”.\r\n\r\nA poco llegaron, y avanza Ratón,\r\nestírase el cuello, coge el aldabón,\r\nda dos o tres golpes, preguntan: “¿Quién es?”\r\n— “Yo, doña Ratona, beso a usted los pies”. \r\n\r\nEl hijo de Rana, Rinrín Renacuajo,\r\nsalió esta mañana muy tieso y muy majo\r\ncon pantalón corto, corbata a la moda,\r\nsombrero encintado y chupa de boda.\r\n“¡Muchacho no salgas!” le grita mamá,\r\npero él le hace un gesto y orondo se va.\r\n\r\nHalló en el camino a un ratón vecino,\r\ny le dijo: “¡Amigo! venga usted conmigo,\r\nvisitemos juntos a doña Ratona\r\ny habrá francachela y habrá comilona”.\r\n\r\nA poco llegaron, y avanza Ratón,\r\nestírase el cuello, coge el aldabón,\r\nda dos o tres golpes, preguntan: “¿Quién es?”\r\n— “Yo, doña Ratona, beso a usted los pies”. \r\n\r\nEl hijo de Rana, Rinrín Renacuajo,\r\nsalió esta mañana muy tieso y muy majo\r\ncon pantalón corto, corbata a la moda,\r\nsombrero encintado y chupa de boda.\r\n“¡Muchacho no salgas!” le grita mamá,\r\npero él le hace un gesto y orondo se va.\r\n\r\nHalló en el camino a un ratón vecino,\r\ny le dijo: “¡Amigo! venga usted conmigo,\r\nvisitemos juntos a doña Ratona\r\ny habrá francachela y habrá comilona”.\r\n\r\nA poco llegaron, y avanza Ratón,\r\nestírase el cuello, coge el aldabón,\r\nda dos o tres golpes, preguntan: “¿Quién es?”\r\n— “Yo, doña Ratona, beso a usted los pies”. \r\n\r\nEl hijo de Rana, Rinrín Renacuajo,\r\nsalió esta mañana muy tieso y muy majo\r\ncon pantalón corto, corbata a la moda,\r\nsombrero encintado y chupa de boda.\r\n“¡Muchacho no salgas!” le grita mamá,\r\npero él le hace un gesto y orondo se va.\r\n\r\nHalló en el camino a un ratón vecino,\r\ny le dijo: “¡Amigo! venga usted conmigo,\r\nvisitemos juntos a doña Ratona\r\ny habrá francachela y habrá comilona”.\r\n\r\nA poco llegaron, y avanza Ratón,\r\nestírase el cuello, coge el aldabón,\r\nda dos o tres golpes, preguntan: “¿Quién es?”\r\n— “Yo, doña Ratona, beso a usted los pies”. ', '2021-05-19 19:25:02', 1),
(2, 'Francachela y comilona', '“¿Está usted en casa?” — “Sí, señor, sí estoy;\r\ny celebro mucho ver a ustedes hoy;\r\nestaba en mi oficio, hilando algodón,\r\npero eso no importa; bien venidos son”.\r\n\r\nSe hicieron la venia, se dieron la mano,\r\ny dice Ratico, que es más veterano:\r\n“Mi amigo el de verde rabia de calor,\r\ndémele cerveza, hágame el favor”.\r\n\r\nY en tanto que el pillo consume la jarra\r\nmandó la señora traer la guitarra\r\ny a renacuajito le pide que cante\r\nversitos alegres, tonada elegante.\r\n\r\n“¿Está usted en casa?” — “Sí, señor, sí estoy;\r\ny celebro mucho ver a ustedes hoy;\r\nestaba en mi oficio, hilando algodón,\r\npero eso no importa; bien venidos son”.\r\n\r\nSe hicieron la venia, se dieron la mano,\r\ny dice Ratico, que es más veterano:\r\n“Mi amigo el de verde rabia de calor,\r\ndémele cerveza, hágame el favor”.\r\n\r\nY en tanto que el pillo consume la jarra\r\nmandó la señora traer la guitarra\r\ny a renacuajito le pide que cante\r\nversitos alegres, tonada elegante.\r\n\r\n“¿Está usted en casa?” — “Sí, señor, sí estoy;\r\ny celebro mucho ver a ustedes hoy;\r\nestaba en mi oficio, hilando algodón,\r\npero eso no importa; bien venidos son”.\r\n\r\nSe hicieron la venia, se dieron la mano,\r\ny dice Ratico, que es más veterano:\r\n“Mi amigo el de verde rabia de calor,\r\ndémele cerveza, hágame el favor”.\r\n\r\nY en tanto que el pillo consume la jarra\r\nmandó la señora traer la guitarra\r\ny a renacuajito le pide que cante\r\nversitos alegres, tonada elegante.\r\n\r\n“¿Está usted en casa?” — “Sí, señor, sí estoy;\r\ny celebro mucho ver a ustedes hoy;\r\nestaba en mi oficio, hilando algodón,\r\npero eso no importa; bien venidos son”.\r\n\r\nSe hicieron la venia, se dieron la mano,\r\ny dice Ratico, que es más veterano:\r\n“Mi amigo el de verde rabia de calor,\r\ndémele cerveza, hágame el favor”.\r\n\r\nY en tanto que el pillo consume la jarra\r\nmandó la señora traer la guitarra\r\ny a renacuajito le pide que cante\r\nversitos alegres, tonada elegante.\r\n\r\n“¿Está usted en casa?” — “Sí, señor, sí estoy;\r\ny celebro mucho ver a ustedes hoy;\r\nestaba en mi oficio, hilando algodón,\r\npero eso no importa; bien venidos son”.\r\n\r\nSe hicieron la venia, se dieron la mano,\r\ny dice Ratico, que es más veterano:\r\n“Mi amigo el de verde rabia de calor,\r\ndémele cerveza, hágame el favor”.\r\n\r\nY en tanto que el pillo consume la jarra\r\nmandó la señora traer la guitarra\r\ny a renacuajito le pide que cante\r\nversitos alegres, tonada elegante.', '2021-05-20 15:24:57', 1),
(3, 'Ay de mil amores', 'Ay de mil amores lo hiciera señora\r\npero es imposible darle, gusto ahora\r\npero tengo el gasnate más seco que estopa\r\ny me aprieta mucho esta nueva ropa\r\nlo siento infinito responde tía rata\r\naflojese un poco chaleco y corbata\r\ny mientras tanto les voy a cantar\r\nuna cancioncita muy particular', '2021-05-30 13:21:45', 1),
(4, 'Brillante función', 'Más estando en esta brillante función\r\nde baile y cerveza\r\nguitarra y canción.\r\nSe hallaba en este ameno lugar\r\ncon canto, guitarra y canción\r\ncuando la gata y sus gatos\r\naparecen en el umbral\r\ny aquello parece el jucio final.', '2021-05-30 13:22:26', 1),
(5, 'Gata vieja', 'Doña gata vieja\r\ntrinchó por la oreja\r\nal niño ratico, maullándole hola\r\ny los niños gatos a la rata vieja\r\nuno por la pata y otro por la cola.', '2021-05-30 13:23:00', 1),
(6, 'Renacuajito', 'Don renacuajito mirando este asalto\r\ntomó su sombrero y dió un tremendo salto\r\ny abriendo la puerta con manos y narices\r\nse fue dando a todos noches muy felices\r\ny siguió saltando tan alto y deprisa\r\nse colocó en la boca de un pato tragón\r\neste se lo enbucha de un sólo estirón.', '2021-05-30 13:23:35', 1),
(7, 'Conslusión', 'Así concluyeron uno, dos y tres\r\nratón y ratona y rana después\r\nlos gatos comieron y el pato ceno\r\ny mamá ratona solita quedó\r\nlos gatos comieron y el pato ceno\r\ny mamá ranita solita quedó', '2021-05-30 13:24:00', 1);

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
(2, 'Mamá de Rin Rin', '2021-05-30 10:30:57'),
(2, 'Rin rin renacuajo', '2021-05-20 15:26:39'),
(7, 'Mamá de Rin Rin', '2021-05-30 13:25:31'),
(7, 'Rin rin renacuajo', '2021-05-30 13:34:45');

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
(2, 1, 'Mamá de Rin Rin', 'Rin rin renacuajo', 1, 1, 1, 'Finaliza la vectorización cuando el renacuajo abandona la casa, se cierra el caso.', '2021-05-25 11:49:04'),
(3, 2, 'Rin rin renacuajo', 'Mamá de Rin Rin', 1, 1, 2, 'LA mamá de Rin rin se preocupa por el muchacho.', '2021-05-30 10:37:06'),
(4, 7, 'Rin rin renacuajo', 'Mamá de Rin Rin', 1, 1, 1, 'Termina la vectorización de Rinrin hacia la mamña.', '2021-05-30 13:27:44');

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
  MODIFY `id_capitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_vectorizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
