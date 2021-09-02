-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-09-2021 a las 22:36:25
-- Versión del servidor: 5.7.33
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `enlace` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id`, `nombre`, `enlace`, `descripcion`, `categoria`, `creado`, `editado`) VALUES
(27, 'Google', 'http://www.google.com', 'PÃ¡gina oficial de Google', 'enlaces', '2021-09-02 16:26:40', NULL),
(28, 'Youtube', 'http://www.youtube.com', 'PÃ¡gina oficial de Youtube', 'enlaces', '2021-09-02 16:26:54', NULL),
(29, 'Facebook', 'http://www.facebook.com', 'PÃ¡gina oficial de Facebook', 'enlaces', '2021-09-02 16:27:07', NULL),
(30, 'Contenido de ejemplo (CategorÃ­a 1)', 'http://www.google.com', 'Breve descripciÃ³n del contenido de ejemplo (CategorÃ­a 1)', 'categoria1', '2021-09-02 16:28:22', NULL),
(31, 'Contenido de ejemplo (CategorÃ­a 2)', 'http://www.google.com', 'Breve descripciÃ³n del contenido de ejemplo (CategorÃ­a 2)', 'categoria2', '2021-09-02 16:28:29', NULL),
(32, 'Contenido de ejemplo (CategorÃ­a 3)', 'http://www.google.com', 'Breve descripciÃ³n del contenido de ejemplo (CategorÃ­a 3)', 'categoria3', '2021-09-02 16:28:36', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `rut` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasena` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre1` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre2` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido1` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido2` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nacionalidad` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo_adicional` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono2` varchar(8) DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `comuna` varchar(50) DEFAULT NULL,
  `nombre_emergencia1` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_emergencia1` varchar(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_emergencia2` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_emergencia2` varchar(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `cedula` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `cv` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel_pregrado` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `institucion_pregrado` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo_pregrado` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `semestres_pregrado` int(11) DEFAULT NULL,
  `fecha_pregrado` date DEFAULT NULL,
  `certificado_pregrado` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel_pregrado2` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `institucion_pregrado2` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo_pregrado2` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `semestres_pregrado2` int(11) DEFAULT NULL,
  `fecha_pregrado2` date DEFAULT NULL,
  `certificado_pregrado2` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel_postgrado` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `institucion_postgrado` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo_postgrado` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `semestres_postgrado` int(11) DEFAULT NULL,
  `fecha_postgrado` date DEFAULT NULL,
  `certificado_postgrado` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel_postgrado2` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `institucion_postgrado2` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo_postgrado2` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `semestres_postgrado2` int(11) DEFAULT NULL,
  `fecha_postgrado2` date DEFAULT NULL,
  `certificado_postgrado2` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `institucion_bancaria` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_cuenta` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_cuenta` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `perfil` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `editado` datetime DEFAULT NULL,
  `validado` int(1) NOT NULL DEFAULT '0',
  `cuenta_suspendida` int(1) NOT NULL DEFAULT '0',
  `contrasena_id` varchar(32) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `rut`, `contrasena`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `fecha_nacimiento`, `genero`, `nacionalidad`, `correo`, `correo_adicional`, `telefono`, `telefono2`, `direccion`, `comuna`, `nombre_emergencia1`, `telefono_emergencia1`, `nombre_emergencia2`, `telefono_emergencia2`, `foto`, `cedula`, `cv`, `nivel_pregrado`, `institucion_pregrado`, `titulo_pregrado`, `semestres_pregrado`, `fecha_pregrado`, `certificado_pregrado`, `nivel_pregrado2`, `institucion_pregrado2`, `titulo_pregrado2`, `semestres_pregrado2`, `fecha_pregrado2`, `certificado_pregrado2`, `nivel_postgrado`, `institucion_postgrado`, `titulo_postgrado`, `semestres_postgrado`, `fecha_postgrado`, `certificado_postgrado`, `nivel_postgrado2`, `institucion_postgrado2`, `titulo_postgrado2`, `semestres_postgrado2`, `fecha_postgrado2`, `certificado_postgrado2`, `institucion_bancaria`, `tipo_cuenta`, `numero_cuenta`, `perfil`, `creado`, `editado`, `validado`, `cuenta_suspendida`, `contrasena_id`) VALUES
(5, '32.123.456-9', '$2y$12$RkqSclCs/X1EsFxhlcRJ..v.QDRlHmShboPRyouxZk0YlHW2lu9xK', 'Nuevo', NULL, 'Administrador', NULL, NULL, NULL, NULL, 'proyecto_intranet@yopmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Administrador', '2021-09-02 15:33:28', NULL, 1, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `rut` (`rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
