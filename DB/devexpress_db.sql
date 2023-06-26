-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-06-2023 a las 17:14:20
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `devexpress_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tipo_id` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `cantidad` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `monto_a_pagar` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `fecha_a_pagar` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `comentarios` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_tipos`
--

CREATE TABLE `pago_tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pago` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `pago_tipos`
--

INSERT INTO `pago_tipos` (`id`, `pago`, `created_at`) VALUES
(1, 'Bonos', '2023-06-25 00:05:36'),
(2, 'Horas extras', '2023-06-25 00:05:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `super_admin` varchar(255) COLLATE latin1_bin DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `super_admin`, `created_at`) VALUES
(1, 'Usuario', '0', '2023-06-25 00:06:20'),
(2, 'Admin', '1', '2023-06-25 00:06:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `apellido` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `contrasena` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `rol_id` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `email`, `contrasena`, `estado`, `rol_id`, `created_at`) VALUES
(2, 'Administrador', 'General (Freeze)', 'admin@admin.com', 'VjQCMw1vAj5Wag==', 1, 2, '2023-06-25 16:01:33'),
(11, 'Usuario', 'Prueba', 'usuario@prueba.com', 'UiQDJQB6Wm4GJgFpV2s=', 1, 1, '2023-06-26 17:09:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago_tipos`
--
ALTER TABLE `pago_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pago_tipos`
--
ALTER TABLE `pago_tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
