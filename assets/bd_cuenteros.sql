-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2021 a las 00:16:25
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

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `cambiar_orden_capitulo` (`id_proy` INT, `id_cap_original` INT, `orden_buscado` DOUBLE) RETURNS DOUBLE BEGIN
	
	#Primero busca el capitulo del orden siguiente, sea menor o mayor.
	#El max es a futuro y por si nos llega algún día a devolver más de un capítulo.
	SELECT max( id_capitulo ) INTO @id_cap
	FROM tb_capitulos 
	WHERE id_proyecto = id_proy
	AND orden = orden_buscado;
	
	#Busca el orden del capítulo original
	SELECT max( orden ) INTO @nuevo_orden
	FROM tb_capitulos t2
	WHERE id_proyecto = id_proy 
	AND id_capitulo = id_cap_original;

	#Actualizamos el capítulo del orden buscado con el orden del capitulo seleccionado.
	UPDATE tb_capitulos t1
	SET orden = @nuevo_orden
	WHERE id_proyecto = id_proy
	AND id_capitulo = @id_cap;

	UPDATE tb_capitulos
	SET orden = orden_buscado
	WHERE id_proyecto = id_proy
	AND id_capitulo = id_cap_original;

	return 0.0;
		
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `max_orden_capitulo` (`id_proy` INT) RETURNS DOUBLE BEGIN
	
	select max( orden ) into @max_orden
	from tb_capitulos 
	where id_proyecto = id_proy;
	
	return @max_orden;
		
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `max_proximo_orden_capitulo` (`id_proy` INT, `id_cap` INT, `des` INT) RETURNS DOUBLE BEGIN
	
	#Primero busca el mayor orden hacia abajo, luego el menor dependiendo de des hacia arriba.
	IF des = 1 THEN 
		
		select min( orden ) INTO @salida
		from tb_capitulos t1 
		where id_proyecto = 1
		and orden > (   select min( orden ) 
						from tb_capitulos t2 
						where t1.id_proyecto = t2.id_proyecto
						and id_capitulo = id_cap
					);
		
	ELSE
		
			select max( orden ) INTO @salida
			from tb_capitulos t1 
			where id_proyecto = 1
			and orden < (   select max( orden ) 
							from tb_capitulos t2 
							where t1.id_proyecto = t2.id_proyecto
							and id_capitulo = id_cap
						);			
	END	IF;

	#Me devuelve el mismo orden del capítulo que entra si NO encuetra, es decir, si está en los límites.
	IF @salida IS NULL THEN
	
		SELECT orden INTO @salida FROM tb_capitulos 
		WHERE id_proyecto = id_proy AND id_capitulo = id_cap;
	
	END IF;
		
	return @salida;
		
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_capitulos`
--

CREATE TABLE `tb_capitulos` (
  `id_capitulo` int(11) NOT NULL,
  `titulo_capitulo` varchar(300) NOT NULL,
  `texto` text,
  `fecha_registro` datetime NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `orden` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_capitulos`
--

INSERT INTO `tb_capitulos` (`id_capitulo`, `titulo_capitulo`, `texto`, `fecha_registro`, `id_proyecto`, `orden`) VALUES
(1, 'CApítulo uno<br>  ', 'El hijo de Rana, Rinrín renacuajo,<br><br>salió esta mañana muy tieso y muy majo<br><br>con pantalón corto, corbata a la moda,<br><br>sombrero encintado y chupa de boda.<br><br>-¡Muchacho, no salgas! -le grita mamá<br><br>pero él hace un gesto y orondo se va.<br>  ', '2021-05-19 19:25:02', 1, 1),
(2, 'Capítulo dos<br>  ', 'Halló en el camino, a un ratón vecino<br><br>y le dijo: ?¡Amigo!? venga usted conmigo.<br><br>Visitemos juntos a doña Ratona<br><br>y habrá francachela y habrá comilona.<br><br>A poco llegaron, y avanza Ratón,<br><br>Estírase el cuello, coge el aldabón,<br><br>da dos o tres golpes, preguntan ¿quién es?<br><br>?Yo doña ratona, beso a usted los pies.<br>  ', '2021-05-20 15:24:57', 1, 2),
(3, 'Capítulo tres<br>  ', '¿Está usted en casa? ?Sí señor, sí estoy,<br><br>y celebro mucho ver a ustedes hoy;<br><br>estaba en mi oficio, hilando algodón,<br><br>pero eso no importa; bienvenidos son.<br>  ', '2021-05-30 13:21:45', 1, 3),
(4, 'Brillante función', 'Más estando en esta brillante función\r\nde baile y cerveza\r\nguitarra y canción.\r\nSe hallaba en este ameno lugar\r\ncon canto, guitarra y canción\r\ncuando la gata y sus gatos\r\naparecen en el umbral\r\ny aquello parece el jucio final.', '2021-05-30 13:22:26', 1, 4),
(5, 'Gata vieja', 'Doña gata vieja\r\ntrinchó por la oreja\r\nal niño ratico, maullándole hola\r\ny los niños gatos a la rata vieja\r\nuno por la pata y otro por la cola.', '2021-05-30 13:23:00', 1, 5),
(6, 'Renacuajito', 'Don renacuajito mirando este asalto\r\ntomó su sombrero y dió un tremendo salto\r\ny abriendo la puerta con manos y narices\r\nse fue dando a todos noches muy felices\r\ny siguió saltando tan alto y deprisa\r\nse colocó en la boca de un pato tragón\r\neste se lo enbucha de un sólo estirón.', '2021-05-30 13:23:35', 1, 8),
(7, 'Conslusión', 'Este es el texto de la conclusión.', '2021-05-30 13:24:00', 1, 6),
(8, 'Ahora sÃ­ el Ãºltimo', '    At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.\r\n  ', '2021-06-03 17:26:53', 1, 7),
(9, 'El Ãºltimo con arreglos', '    At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies. \r\nEste es otro capÃ­tulo con arreglos.\r\n\r\nOjo.\r\n\r\n<strong>Ojoo!</strong>\r\n  ', '2021-06-03 19:31:25', 1, 22),
(10, '20210604 1700', 'At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies. AquÃƒÂ­ estÃƒÂ¡ la cosa.', '2021-06-04 17:01:10', 1, 9.3),
(11, '20210604 1701', 'At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies. Aquí está la cosa otra vez.', '2021-06-04 17:02:09', 1, 10),
(13, '20210604 1704', 'La obra está fechada el 14 de marzo de 1933, compuesta para orquesta de cámara y dedicada a sus hijas: Carmen y Natalia. La indicación de la obra dice El Renacuajo Paseador. Pantomima para niños.3', '2021-06-04 17:04:42', 1, 11),
(19, '20210605 capÃ­tulo de prueba a', '    At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.<br>  ', '2021-06-05 11:02:07', 1, 13),
(20, '20210605 capÃ­tulo de prueba b', '    At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.<br>  ', '2021-06-05 11:15:13', 1, 21),
(21, '20210605 1116 otro capÃ­tulo', '    At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.<br>  ', '2021-06-05 11:16:11', 1, 19),
(22, 'Este es el Ãºltimo del 5 de junio', 'Este es el último del 5 de junio Este es el último del 5 de junio Este es el último del 5 de junio<br>Este es el último del 5 de junio<br>Este es el último del 5 de junio<br>      ', '2021-06-05 17:08:09', 1, 20);

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
(6, 'Rin rin renacuajo', '2021-06-04 20:53:42'),
(7, 'Mamá de Rin Rin', '2021-05-30 13:25:31'),
(7, 'Rin rin renacuajo', '2021-05-30 13:34:45'),
(8, 'La casa de Rin rin renacuajo', '2021-06-03 17:30:24'),
(8, 'Rin rin renacuajo', '2021-06-03 17:30:13');

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
('El bosque', 1, '2021-06-04 21:29:15', 'escenario'),
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
(3, 'agrede a', '2021-05-23 23:03:54'),
(4, 'está en', '2021-06-04 18:51:44'),
(5, 'afecta a', '2021-06-04 20:08:04');

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
(4, 7, 'Rin rin renacuajo', 'Mamá de Rin Rin', 1, 1, 1, 'Termina la vectorización de Rinrin hacia la mamña.', '2021-05-30 13:27:44'),
(5, 8, 'La casa de Rin rin renacuajo', 'Rin rin renacuajo', 3, 0, 4, 'Deriva de una derivada', '2021-06-03 17:31:33'),
(6, 8, 'La casa de Rin rin renacuajo', 'La casa de Rin rin renacuajo', 3, 0, 6, 'Ella con ella misma', '2021-06-03 18:31:04'),
(8, 1, 'Rin rin renacuajo', 'Rin rin renacuajo', 1, 0, 8, 'La Ãºltima para el primer', '2021-06-03 19:29:08'),
(9, 1, 'Rin rin renacuajo', 'La casa de Rin rin renacuajo', 4, 0, 1, '.', '2021-06-04 18:53:32');

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
  MODIFY `id_capitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tb_proyectos`
--
ALTER TABLE `tb_proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_vectorizacion`
--
ALTER TABLE `tb_tipo_vectorizacion`
  MODIFY `id_tipo_vectorizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_vectorizados`
--
ALTER TABLE `tb_vectorizados`
  MODIFY `id_vectorizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
