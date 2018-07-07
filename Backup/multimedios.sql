-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2018 a las 19:14:29
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `multimedios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_casual`
--

CREATE TABLE `m_casual` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `extension_img` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `cant_s` tinyint(4) NOT NULL,
  `cant_m` tinyint(4) NOT NULL,
  `cant_l` tinyint(4) NOT NULL,
  `cant_xl` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `m_casual`
--

INSERT INTO `m_casual` (`id`, `tipo`, `nombre`, `precio`, `extension_img`, `cant_s`, `cant_m`, `cant_l`, `cant_xl`) VALUES
(2, 'jeans', 'Jenas_BlueStrey', 25000, 'img/uploads/jeans_1.jpg', 1, 5, 1, 3),
(3, 'jeans', 'Fashion_Whort', 32000, 'img/uploads/jeans_2.jpg', 4, 3, 5, 2),
(4, 'jeans', 'Elegant_Sprat', 27500, 'img/uploads/jeans_4.jpg', 7, 5, 2, 6),
(5, 'jeans', 'Invicious-Streak', 30000, 'img/uploads/jeans_3.jpg', 5, 4, 4, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_deportiva`
--

CREATE TABLE `m_deportiva` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` int(5) DEFAULT NULL,
  `extension_img` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `cant_s` tinyint(4) DEFAULT NULL,
  `cant_m` tinyint(4) DEFAULT NULL,
  `cant_l` tinyint(4) DEFAULT NULL,
  `cant_xl` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `m_deportiva`
--

INSERT INTO `m_deportiva` (`id`, `tipo`, `nombre`, `precio`, `extension_img`, `cant_s`, `cant_m`, `cant_l`, `cant_xl`) VALUES
(21, 'licra', 'yadir', 1000, 'img/uploads/3.jpg', 2, 0, 0, 0),
(22, 'licra', 'y', 17000, 'img/uploads/4.jpg', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_pedidos_casual`
--

CREATE TABLE `m_pedidos_casual` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `prenda` int(11) NOT NULL,
  `talla` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `cant` tinyint(4) NOT NULL,
  `monto` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `m_pedidos_casual`
--

INSERT INTO `m_pedidos_casual` (`id`, `user`, `prenda`, `talla`, `cant`, `monto`, `estado`) VALUES
(2, 13, 2, 's', 1, 25000, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_pedidos_deportiva`
--

CREATE TABLE `m_pedidos_deportiva` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `prenda` int(11) NOT NULL,
  `talla` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `cant` tinyint(4) NOT NULL,
  `monto` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `m_pedidos_deportiva`
--

INSERT INTO `m_pedidos_deportiva` (`id`, `user`, `prenda`, `talla`, `cant`, `monto`, `estado`) VALUES
(1, 11, 21, 's', 2, 8000, 'Pendiente'),
(2, 12, 22, 'm', 4, 7500, 'Pendiente'),
(3, 13, 21, 's', 1, 1000, 'Pendiente'),
(4, 13, 22, 'l', 3, 51000, 'Pendiente'),
(5, 13, 21, 'm', 5, 5000, 'Pendiente'),
(6, 12, 22, 'l', 3, 51000, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_usuarios`
--

CREATE TABLE `m_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `app_paterno` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `app_materno` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gusto` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `m_usuarios`
--

INSERT INTO `m_usuarios` (`id`, `nombre`, `app_paterno`, `app_materno`, `usuario`, `contrasena`, `gusto`, `email`, `tipo`) VALUES
(11, 'yadir', 'aguilar', 'acosta', 'yadir9777', 'Lacasa0111!', 'estudiar', 'yadir@gmail.com', 'admin'),
(12, 'kevin', 'Bermudez', 'Alvarado', 'kevin955', 'Lacasa0111!', 'futbol', 'kevin95@gmail.com', 'user'),
(13, 'Leonardo', 'Arias', 'Lobo', 'leo93303', 'Lacasa0111!', 'estudiar', 'leo93@gmail.com', 'user'),
(14, 'Esteban', 'Gonzalez', 'Diaz', 'esteban98', 'Lacasa0111!', 'futbol', 'esteban98@gmail.com', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `m_casual`
--
ALTER TABLE `m_casual`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m_deportiva`
--
ALTER TABLE `m_deportiva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m_pedidos_casual`
--
ALTER TABLE `m_pedidos_casual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `prenda` (`prenda`);

--
-- Indices de la tabla `m_pedidos_deportiva`
--
ALTER TABLE `m_pedidos_deportiva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `prenda` (`prenda`);

--
-- Indices de la tabla `m_usuarios`
--
ALTER TABLE `m_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `m_casual`
--
ALTER TABLE `m_casual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `m_deportiva`
--
ALTER TABLE `m_deportiva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `m_pedidos_casual`
--
ALTER TABLE `m_pedidos_casual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `m_pedidos_deportiva`
--
ALTER TABLE `m_pedidos_deportiva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `m_usuarios`
--
ALTER TABLE `m_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `m_pedidos_casual`
--
ALTER TABLE `m_pedidos_casual`
  ADD CONSTRAINT `m_pedidos_casual_ibfk_1` FOREIGN KEY (`user`) REFERENCES `m_usuarios` (`id`),
  ADD CONSTRAINT `m_pedidos_casual_ibfk_2` FOREIGN KEY (`prenda`) REFERENCES `m_casual` (`id`);

--
-- Filtros para la tabla `m_pedidos_deportiva`
--
ALTER TABLE `m_pedidos_deportiva`
  ADD CONSTRAINT `m_pedidos_deportiva_ibfk_1` FOREIGN KEY (`user`) REFERENCES `m_usuarios` (`id`),
  ADD CONSTRAINT `m_pedidos_deportiva_ibfk_2` FOREIGN KEY (`prenda`) REFERENCES `m_deportiva` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
