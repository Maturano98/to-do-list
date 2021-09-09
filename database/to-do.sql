SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `to-do`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task`
--

CREATE TABLE `task` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `completed_at` datetime NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PENDIENTE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `task`
--

INSERT INTO `task` (`id`, `name`, `created_at`, `completed_at`, `status`) VALUES
(31, 'Tarea 09-09-2021', '2021-09-09 00:00:00', '0000-00-00 00:00:00', 'PENDIENTE'),
(32, 'Tarea 04-09-2021', '2021-09-04 00:00:00', '0000-00-00 00:00:00', 'PENDIENTE'),
(33, 'Tarea 15-08-2021', '2021-08-15 00:00:00', '2021-08-17 00:00:00', 'COMPLETADO'),
(34, 'Tarea 09-10-2020', '2020-10-09 00:00:00', '2021-10-10 00:00:00', 'COMPLETADO'),
(35, 'Tarea 20-09-2020', '2020-09-20 00:00:00', '2020-09-20 00:00:00', 'COMPLETADO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `task`
--
ALTER TABLE `task`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;