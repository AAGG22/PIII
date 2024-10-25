-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2024 a las 04:27:06
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
-- Base de datos: `verydeli`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `u_id` int(11) NOT NULL,
  `u_nombre` varchar(50) NOT NULL,
  `u_apellido` varchar(50) NOT NULL,
  `u_userName` varchar(50) NOT NULL,
  `u_pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_vehiculo` varchar(50) DEFAULT NULL,
  `u_tipo_usuario` varchar(50) DEFAULT NULL,
  `u_telefono` int(13) DEFAULT NULL,
  `u_domicilio` varchar(50) DEFAULT NULL,
  `u_avatar` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`u_id`, `u_nombre`, `u_apellido`, `u_userName`, `u_pwd`, `u_email`, `u_vehiculo`, `u_tipo_usuario`, `u_telefono`, `u_domicilio`, `u_avatar`) VALUES
(14, 'Ana', 'Garis', 'agaris', '$2y$10$uDcfqi3zHPV8AfOEF/H.Te7UqsXH8HySdiy4TqThFsTccCryo7BZa', 'ani@gmail.com', 'toyota', NULL, 0, '', 1),
(15, 'Alf', 'Galván', 'af', '$2y$10$RocufXru2ALaQdRU1dESOOsSi3KiDAmtelPWqOwNeLNehCcTsxW2K', 'adgalvan999@gmail.com', 'Kangoo', NULL, 0, '', 1),
(16, 'Ivo', 'Galván', 'ivo', '$2y$10$wEou6temQtlJx3JHRklQmOeRzh5MJ25hXhsPkL8vTexVeyU2ShZ8.', 'i@gmail.com', 'tuntun', NULL, 0, '', 1),
(17, 'Angela', 'Virulon', 'angela', '$2y$10$zFvqC4kq7ehfuHvGPSvUa.NCKRBoJGiHPiJWJv2WLAKMlqknWGZ26', 'av@gmailcom', 'strasse', NULL, 0, '', 1),
(18, 'Emma', 'Galván', 'emma', '$2y$10$NPFBO9bOs4bGpvFjtUmAkuza/ZSTiQAoTR6xjb1QyJ6i.ahbyFYQq', 'emma@gmail.com', 'voyage', NULL, 0, '', 1),
(19, 'Tobias', 'Galván', 'tobias', '$2y$10$3tsar3OTp/X1LdLEdvbns.gwd600QpWq27XdzmqIp2kgyExQ/zSrG', 'tob@gmail.com', 'voyage', NULL, 0, '', 1),
(20, 'a', 'a', 'a', '$2y$10$aADJ5PN3v398ZKBlWz7Yb.5PidWdqoZLx1mgrE.JcNHou5wdSQqLa', 'a@a', 'a', NULL, 0, '', 1),
(21, 'Pepa', 'Pic', 'pepa', '$2y$10$ExFXPSocONgXWYjWy72uRuv1OXsQ441b.85pDw1R.tPDuOrZ5/JcK', 'pepa@gmail.com', 'Fiat', NULL, 0, '', 1),
(22, 'David', 'Galvan', 'david', '$2y$10$46llYjcKJVMGyIwwKoFZpO9J3XQI9gxHTrG7GzNfIMW1Ef/JeolZi', 'dav@gmail.com', '', NULL, 0, '', 1),
(23, 'angela', 'viluron', 'angelaviluron', '$2y$10$h0lfOLZPI0wmZsNeSGnwSu8w5x/4YT1CBo9kgdXcZ0wGRVyzknz2W', 'angelaagustina04@gmail.com', 'toyota', NULL, 0, 'Rivadavia 300', 4),
(24, 'juan', 'gomez', 'juanGomez', '$2y$10$X5YunCoA.S8SY4zMwaEAeOMGYQSdFr.MP7PM2rZ1xIGlbRaskQNdq', 'jgomez@gmail.com', 'Hilux', NULL, 0, '', 1),
(34, 'jazmin', 'sosa', 'jsosa', '$2y$10$iYyOoKoi3RgIsdokho6TWu17q4UAkvzZPyZ2Z59vBa2COBo8fQqom', 'jsosa@gmail.com', 'kkkk', NULL, 0, '', 1),
(35, 'martin', 'torres', 'mtorres', '$2y$10$25vGkVRRwnCEWiXf6uITu.254INYm51OyF6DZuLBsw2Z7/wjfeooG', 'mtorres@gmail.com', 'lll', NULL, 0, 'San Luis 455', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `fk_avatar` (`u_avatar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_avatar` FOREIGN KEY (`u_avatar`) REFERENCES `avatar` (`a_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
