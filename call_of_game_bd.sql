-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2022 a las 22:28:17
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `call_of_game`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `persona_id`, `nombre_usuario`, `clave`) VALUES
(1, 1, 'Admin', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `juego_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `pedido_id`, `juego_id`, `cantidad`, `precio`) VALUES
(1, 1, 3, 1, 25),
(2, 1, 5, 3, 25),
(5, 3, 10, 1, 14),
(6, 3, 30, 1, 20),
(7, 3, 38, 1, 15),
(8, 4, 39, 2, 18),
(9, 4, 23, 1, 18),
(10, 4, 16, 1, 20),
(11, 5, 36, 3, 25),
(12, 5, 12, 1, 15),
(13, 5, 6, 1, 20),
(14, 5, 45, 1, 14),
(15, 5, 43, 1, 12),
(16, 6, 47, 1, 15),
(17, 6, 45, 1, 14),
(18, 6, 48, 1, 30),
(19, 6, 46, 1, 25),
(20, 7, 47, 1, 15),
(21, 7, 48, 1, 30),
(22, 8, 39, 1, 18),
(23, 9, 27, 1, 18),
(24, 9, 17, 1, 35),
(25, 9, 26, 1, 20),
(26, 10, 34, 1, 15),
(27, 10, 25, 1, 18),
(28, 11, 7, 2, 7),
(29, 11, 6, 1, 20),
(30, 11, 11, 1, 15),
(31, 12, 36, 2, 25),
(32, 12, 45, 1, 14),
(33, 13, 43, 1, 12),
(34, 13, 34, 1, 15),
(35, 14, 38, 1, 15),
(36, 14, 48, 1, 30),
(37, 14, 46, 2, 25),
(38, 15, 46, 1, 25),
(39, 15, 47, 1, 15),
(40, 15, 9, 1, 12),
(41, 16, 46, 1, 25),
(42, 16, 45, 2, 14),
(43, 17, 47, 3, 15),
(44, 17, 22, 1, 13),
(45, 18, 48, 3, 40),
(46, 18, 8, 1, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`) VALUES
(1, 'ACCIÓN'),
(2, 'AVENTURA'),
(3, 'ARCADE'),
(4, 'ROL'),
(5, 'MUSICAL'),
(6, 'DEPORTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `plataforma_id` int(11) NOT NULL,
  `titulo` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `genero_id`, `plataforma_id`, `titulo`, `foto`, `precio`, `descripcion`, `fecha`) VALUES
(5, 4, 2, 'AC Valhalla', 'acvalhalla-one.png', '25', 'Vikingos', '2022-05-07'),
(6, 4, 1, 'AC Valhalla', 'acvalhalla-ps4.png', '20', 'Vikingos', '2022-05-07'),
(7, 1, 3, 'AC Ezzio Collection', 'acezziocollection-switch.png', '7', 'Los tres primeros', '2022-05-07'),
(8, 4, 3, 'Animal Corssing', 'animalcrossing-switch.png', '18', 'Mascotas', '2022-05-07'),
(9, 3, 3, 'Crash Bandicoot', 'crashbandicoot-switch.png', '12', 'Zorro', '2022-05-07'),
(10, 6, 2, 'Dirt 5', 'dirt5-one.png', '14', 'Coches', '2022-05-07'),
(11, 3, 3, 'Donkey Kong', 'donkeykongcountry-switch.png', '15', 'Monos y barriles', '2022-05-07'),
(12, 4, 1, 'Dark Souls', 'ds1-ps4.png', '15', 'You died', '2022-05-07'),
(14, 4, 3, 'Dark Souls', 'ds1-switch.png', '18', 'You die', '2022-05-07'),
(15, 4, 2, 'Dark Souls 3', 'ds3-one.png', '20', 'You die 3', '2022-05-07'),
(16, 4, 1, 'Dark Souls 3', 'ds3-ps4.png', '20', 'You die', '2022-05-07'),
(17, 1, 2, 'Far Cry 6', 'farcry6-one.png', '35', 'Isla paradisíaca', '2022-05-07'),
(18, 1, 1, 'God of War', 'gow.png', '18', 'Kratos vikingo', '2022-05-07'),
(19, 1, 2, 'Halo Infinite', 'halo-xbox.jpg', '15', 'Clásico', '2022-05-07'),
(20, 5, 2, 'Just Dance 2022', 'justdance2022-one.png', '17', 'Baila', '2022-05-07'),
(21, 3, 3, 'Kirby', 'Kirby-switch.png', '12', 'No se', '2022-05-07'),
(22, 3, 3, 'Mario Party', 'marioparty-switch.png', '13', 'Fontaneros y setas', '2022-05-07'),
(23, 4, 2, 'Mass Effect', 'masseffect-one.png', '18', 'Espacio', '2022-05-07'),
(24, 3, 3, 'Pokemon', 'pokemon-switch.png', '20', 'Mascotas raras', '2022-05-07'),
(25, 3, 3, 'Rayman Legends', 'raymanlegends-switch.png', '18', 'Plataformas', '2022-05-07'),
(26, 4, 2, 'Sekiro', 'sekiro-one.png', '20', 'You died samurai', '2022-05-07'),
(27, 4, 2, 'Skyrim', 'skyrim-one.png', '18', 'Mundo abierto ', '2022-05-07'),
(28, 4, 1, 'Skyrim', 'skyrim-ps4.png', '20', 'Juegazo', '2022-05-07'),
(30, 4, 1, 'The Last of Us', 'tlou-ps4.png', '20', 'Peor que el primero pero mejores mecánicas', '2022-05-07'),
(32, 4, 1, 'The Witcher III', 'witcher-ps4.png', '17', 'Brujo', '2022-05-07'),
(33, 4, 3, 'The Witcher III', 'witcher-switch.png', '17', 'Brujo', '2022-05-07'),
(34, 1, 3, 'Wolfenstein 2', 'wolfensteinII-switch.png', '15', 'Nazis', '2022-05-07'),
(36, 4, 1, 'Sekiro', 'sekiro-ps4.png', '25', 'You died samurai', '2022-05-07'),
(38, 2, 1, 'Spider-Man', 'spiderman-ps4.jpg', '15', 'Hombre araña', '2022-05-07'),
(39, 4, 2, 'The Witcher III', 'witcher-one.png', '18', 'Brujo', '2022-05-08'),
(43, 1, 1, 'Far Cry 6', 'farcry6-ps4.png', '12', 'Isla', '2022-05-08'),
(44, 1, 2, 'GTA V', 'gta-xone.png', '13', 'Mundo abierto', '2022-05-08'),
(45, 1, 1, 'GTA V', 'gta-ps4.png', '14', 'Mundo abierto', '2022-05-08'),
(46, 6, 1, 'Fifa 22', 'fifa-ps4.png', '25', 'Fútbol', '2022-05-08'),
(47, 4, 2, 'Dark Souls', 'ds1-xbox.png', '25', 'You died', '2022-05-09'),
(48, 4, 3, 'Zelda', 'zelda.png', '30', 'Mundo abierto', '2022-05-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `total`, `fecha`) VALUES
(1, 12, '50', '2022-05-07'),
(3, 14, '49', '2022-05-07'),
(4, 15, '74', '2022-05-07'),
(5, 16, '136', '2022-05-08'),
(6, 17, '84', '2022-05-08'),
(7, 18, '45', '2022-05-08'),
(8, 19, '18', '2022-05-08'),
(9, 20, '73', '2022-05-08'),
(10, 21, '33', '2022-05-08'),
(11, 22, '49', '2022-05-08'),
(12, 23, '64', '2022-05-08'),
(13, 24, '27', '2022-05-08'),
(14, 25, '95', '2022-05-08'),
(15, 26, '52', '2022-05-08'),
(16, 27, '53', '2022-05-09'),
(17, 28, '58', '2022-05-09'),
(18, 30, '138', '2022-05-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellidos`, `email`, `telefono`) VALUES
(1, 'Juan', 'Requena', 'juan@correo.com', 632954781),
(2, 'Pepe', 'Pérez', 'pepe@correo.com', 629578632),
(4, 'Jose', 'Álvarez', 'jose@correo.com', 617453965),
(5, 'Alba', 'Ramirez', 'alba@correo.com', 639586254),
(6, 'Adrian', 'Rodriguez', 'adrian@correo.com', 652395874),
(14, 'Andrea', 'Castillo', 'andrea@correo.com', 639958426),
(15, 'Andrés', 'Álvarez', 'andres@correo.com', 698745632),
(16, 'Francisco', 'Fernandez', 'francisco@correo.com', 463695841),
(17, 'Penelope', 'Cruz', 'penelope@correo.com', 632598745),
(18, 'Antonio', 'Banderas', 'antonio@correo.com', 62595841),
(19, 'Roberto', 'Alarcon', 'roberto@correo.com', 632659854),
(20, 'Iker', 'Casillas', 'iker@correo.com', 362514589),
(21, 'Fernando', 'Hierro', 'fer@correo.com', 2147483647),
(22, 'Carlos', 'Martínez', 'carlos@correo.com', 632569854),
(23, 'Josué', 'Juarez', 'josue@correo.com', 632659854),
(24, 'Juan Manuel', 'Martinez', 'juanma@correo.com', 632563254),
(25, 'Pilar', 'Perez', 'pilar@correo.com', 632547854),
(26, 'Adrian', 'Gonzalez', 'adrian@correo.com', 636251474),
(27, 'Alfonso', 'Sabio', 'alfon@correo.com', 636265154),
(28, 'Alberto', 'Nuñez', 'alberto@correo.com', 2147483647),
(29, 'Josue', 'Fernandez', 'josue@correo.com', 632654154),
(30, 'Roberto', 'Rodriguez', 'roberto@correo.com', 2147483647),
(31, 'Alberto', 'Sanchez', 'alberto@correo.com', 632654748);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`id`, `nombre`) VALUES
(1, 'PS4'),
(2, 'XONE'),
(3, 'SWITCH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `persona_id`, `nombre_usuario`, `clave`) VALUES
(1, 2, 'Pepe', '123'),
(2, 0, 'Jose', '123'),
(3, 0, 'Alba', '123'),
(4, 0, 'Josue', '123'),
(5, 0, 'Alberto', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
