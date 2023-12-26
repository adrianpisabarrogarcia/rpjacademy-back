-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-12-2023 a las 19:05:18
-- Versión del servidor: 5.7.39-42-log
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redpjacademy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `block`
--

CREATE TABLE `block` (
  `id` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sorting` int(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `block`
--

INSERT INTO `block` (`id`, `course_id`, `name`, `sorting`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jóvenes de este mundo: desafíos', 1, 'Las personas que acompañamos jóvenes sabemos que debemos reflexionar a fondo sobre los cambios sociales para poder seguir proponiendo\r\nprocesos significativos para sus vidas.', 'http://localhost:8888/assets/images/block/1.jpeg', '2023-08-25 13:16:49', '2023-08-25 13:16:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course`
--

CREATE TABLE `course` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `duration` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `dateStart` date NOT NULL,
  `dateFinish` date DEFAULT NULL,
  `course` tinyint(1) NOT NULL,
  `workshop` tinyint(1) NOT NULL,
  `modality` varchar(255) NOT NULL,
  `contact` mediumtext NOT NULL,
  `dateStartRegistration` datetime(6) DEFAULT NULL,
  `dateFinishRegistration` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slogan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `course`
--

INSERT INTO `course` (`id`, `name`, `slug`, `description`, `duration`, `image1`, `image2`, `image3`, `image4`, `image5`, `video`, `dateStart`, `dateFinish`, `course`, `workshop`, `modality`, `contact`, `dateStartRegistration`, `dateFinishRegistration`, `created_at`, `updated_at`, `slogan`) VALUES
(1, 'Animador/a de Procesos Pastorales con Jóvenes', 'animador-a-de-procesos-pastorales-con-jovenes', '<p>Las personas que acompañamos jóvenes sabemos que debemos reflexionar a fondo sobre los cambios sociales para poder seguir proponiendo procesos significativos para sus vidas.</p><p>Por otro lado, los cambios que estamos viviendo en la Iglesia nos animan a seguir tejiendo redes de colaboración, a encontrarnos para reflexionar juntos y poder aprender de la sabiduría compartida.</p><p>Con este convencimiento ofrecemos este Curso desde la Red de Pastoral Juvenil.</p>\r\n', '54 horas', 'http://localhost:8888/assets/images/course/1.jpg', NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=3OHnnL4xK0M', '2023-10-21', '2024-06-17', 1, 0, 'Online por videoconferencia', 'joncalleja@escolapiosemaus.org, chema.perez@cardenalcisneros.es', '2023-05-01 17:59:09.000000', '2023-11-05 00:00:00', '2023-08-24 16:11:37', '2023-09-06 21:41:58', 'Más que nunca, acompañando a jóvenes en procesos comunitarios, solidarios y centrados en Jesucristo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_institution`
--

CREATE TABLE `course_institution` (
  `id` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `institution_id` int(255) NOT NULL,
  `convenes` tinyint(1) NOT NULL DEFAULT '0',
  `certifies` tinyint(1) NOT NULL DEFAULT '0',
  `collaborate` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `course_institution`
--

INSERT INTO `course_institution` (`id`, `course_id`, `institution_id`, `convenes`, `certifies`, `collaborate`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, 0, '2023-09-08 19:36:49', '2023-09-08 19:36:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institution`
--

CREATE TABLE `institution` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `description` mediumtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `institution`
--

INSERT INTO `institution` (`id`, `name`, `logo`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Red Pastoral Juvenil', 'http://localhost:8888/assets/images/institution/1.jpg', 'Somos una red de personas e instituciones especializada en acercar el evangelio a los jóvenes, acompañandolos a discernir, sin miedo a seguir a Jesús y avivir su propuesta de amor. Hoy damos pasos en nuevas direcciones: la formación en pastoral juvenil, la evangelización digital.', '2023-09-08 19:36:09', '2023-09-08 19:36:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_block_id_course` (`course_id`);

--
-- Indices de la tabla `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `course_institution`
--
ALTER TABLE `course_institution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course_fk` (`course_id`),
  ADD KEY `id_intitution_fk` (`institution_id`);

--
-- Indices de la tabla `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `block`
--
ALTER TABLE `block`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `course`
--
ALTER TABLE `course`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `course_institution`
--
ALTER TABLE `course_institution`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `institution`
--
ALTER TABLE `institution`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `block`
--
ALTER TABLE `block`
  ADD CONSTRAINT `id_block_id_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `course_institution`
--
ALTER TABLE `course_institution`
  ADD CONSTRAINT `id_course_fk` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_intitution_fk` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
