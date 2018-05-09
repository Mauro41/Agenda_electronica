-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2018 a las 01:09:15
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `fecini` date NOT NULL,
  `fecfin` date DEFAULT NULL,
  `todoeldia` int(11) NOT NULL,
  `idusuario` varchar(35) NOT NULL,
  `horaini` varchar(5) DEFAULT NULL,
  `horafin` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `titulo`, `fecini`, `fecfin`, `todoeldia`, `idusuario`, `horaini`, `horafin`) VALUES
(7, 'reunion', '2018-05-09', '2018-05-09', 0, 'juan.gonzales@mail.com', '09:00', '10:30'),
(8, 'reunion', '2018-05-09', '2018-05-09', 0, 'juan.gonzales@mail.com', '09:00', '10:30'),
(9, 'reunion', '2018-05-09', '2018-05-09', 0, 'juan.gonzales@mail.com', '09:00', '10:30'),
(10, 'COORDINACION JEFE', '2018-05-10', '2018-05-10', 0, 'juan.gonzales@mail.com', '11:00', '12:00'),
(11, 'REUNION', '2018-05-09', '2018-05-09', 0, 'juan.gonzales@mail.com', '08:30', '09:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` varchar(35) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `password`) VALUES
('juan.gonzales@mail.com', 'Juan Gonzales', '$2y$10$tpBquWZcqOzxDrevU.Voz.SFYYtyX10cgeIOxpu/K5QCSQY12lKcK'),
('martha.juarez@cloud.com', 'Marta Gonzales', '$2y$10$exJ0WPPCne.CGO3LnDpWZusMyKiwaaeKpNDhL6FoDJ7WrzLaYP6SW'),
('leslie.chacon@mymail.com', 'Leslie ChacÃ³n', '$2y$10$ZkdWsx7Dd8gpLkczXpsLieLcVWP5OfFPQjRSE2EQV1jx8StoqsIxW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
