-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2023 a las 05:22:23
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_camisetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camisetas`
--

CREATE TABLE `camisetas` (
  `id` int(10) NOT NULL,
  `nombre_equipo` varchar(50) NOT NULL,
  `categoria_camiseta` varchar(50) NOT NULL,
  `tipo_camiseta` varchar(50) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `id_decada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `camisetas`
--

INSERT INTO `camisetas` (`id`, `nombre_equipo`, `categoria_camiseta`, `tipo_camiseta`, `imagen`, `id_decada`) VALUES
(92, 'Barcelona', 'Club', 'Titular', 'https://classic-shirts.com/eng_pl_1984-89-FC-BARCELONA-SHIRT-S-134413_1.jpg', 3),
(94, 'Paraguay', 'Seleccion', 'Alternativa', 'https://2.bp.blogspot.com/-lIDAQtHrm6Y/Tbd2_j89EUI/AAAAAAAABoE/-pyoY4KdQmU/s1600/Paraguay+2.png', 5),
(97, 'Real Madrid', 'Club', 'Titular', 'https://estaticos01.marca.com/imagenes/2011/04/19/futbol/copa_rey/1303215006_0.jpg', 2),
(102, 'Milan', 'Club', 'Alternativa', 'https://aguerocamisetas.cl/wp-content/uploads/2021/03/bd8b6b8c.jpg', 5),
(110, 'Alemania', 'Seleccion', 'Titular', 'https://acdn.mitiendanube.com/stores/002/292/348/products/20d4b26f1-6bbba19abe4553eef616717354317873-1024-1024.webp', 4),
(111, 'España', 'Seleccion', 'Alternativa', 'https://cdn.shopify.com/s/files/1/0605/7515/4372/products/1267525263_extras_noticia_foton_7_0.jpg?v=1639478999', 6),
(112, 'Manchester City', 'Club', 'Titular', 'https://perufc.com/wp-content/uploads/2022/07/51189-1.jpg', 2015),
(113, 'Manchester United', 'Club', 'Alternativa', 'https://imbictoz.com/wp-content/uploads/2021/05/5c43a45f.jpg', 5),
(114, 'Boca Juniors', 'Club', 'Titular', 'https://www.vintagefootballshirts.com/uploads/products/images/1995-boca-juniors-olan-home-sh-46499-1.jpg', 4),
(116, 'Holanda', 'Seleccion', 'Titular', 'https://miro.medium.com/v2/resize:fit:561/1*9OWQN9Q4V47ClRbAmDUfTA.jpeg', 2),
(117, 'Argentina', 'Seleccion', 'Alternativa', 'https://imbictoz.com/wp-content/uploads/2021/04/a7e48486.jpg', 3),
(118, 'Francia', 'Seleccion', 'Titular', 'https://acdn.mitiendanube.com/stores/002/292/348/products/ded12bf31-6f76ba5415d52e67d216717348393859-1024-1024.webp', 4),
(119, 'Inter Milan', 'Club', 'Titular', 'https://acdn.mitiendanube.com/stores/002/292/348/products/7227b40b1-661fd4fe3c7ee99fdc16726079836701-1024-1024.webp', 6),
(120, 'Liverpool', 'Club', 'Titular', 'https://acdn.mitiendanube.com/stores/002/292/348/products/d2b8a3b41-c7f3fbfd6c2865e29516721787177443-1024-1024.webp', 5),
(121, 'Arsenal', 'Club', 'Titular', 'https://www.thunderinternacional.com/cdn/shop/products/arsenal-2022-23-adidas-home-kit-10_be987551-744e-4d7b-9378-8960f2459ee4.jpg?v=1663803765&width=493', 2015),
(126, 'AAAAAAAAAAAA', 'AAAAAAAAAAA', 'A', 'https://www.tradeinn.com/f/13664/136644404/copa-camiseta-manga-corta-brazil-1960.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decadas`
--

CREATE TABLE `decadas` (
  `id_decada` int(11) NOT NULL,
  `numero_decada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `decadas`
--

INSERT INTO `decadas` (`id_decada`, `numero_decada`) VALUES
(1, 60),
(2, 70),
(3, 80),
(4, 90),
(5, 2000),
(6, 2010),
(2015, 2020);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(250) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contrasenia` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contrasenia`) VALUES
(2, 'webadmin', '$2y$10$Gaw0.eIGIG8BQ8fMbkpNq.PFJ3z8yk0SFCM1eeVHnnRIUh41W41B2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camisetas`
--
ALTER TABLE `camisetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `decadas_id` (`id_decada`);

--
-- Indices de la tabla `decadas`
--
ALTER TABLE `decadas`
  ADD PRIMARY KEY (`id_decada`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camisetas`
--
ALTER TABLE `camisetas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `decadas`
--
ALTER TABLE `decadas`
  MODIFY `id_decada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2016;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camisetas`
--
ALTER TABLE `camisetas`
  ADD CONSTRAINT `decadas_id` FOREIGN KEY (`id_decada`) REFERENCES `decadas` (`id_decada`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
