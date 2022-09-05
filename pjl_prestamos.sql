-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2021 a las 23:30:21
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pjl_prestamos`
--
DROP DATABASE `pjl_prestamos`;
CREATE DATABASE `pjl_prestamos`;

USE `pjl_prestamos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coins`
--

CREATE TABLE `coins` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `singular_name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `short_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `symbol` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `coins`
--

INSERT INTO `coins` (`id`, `name`, `singular_name`, `short_name`, `symbol`, `description`) VALUES
(1, 'Pesos', 'Peso', 'DOP', 'RD$', 'Peso dominicano'),
(2, 'Dólares', 'Dólar', 'USD', '$', 'Dólar estadounidense'),
(3, 'Euros', 'Euro', 'EUR', '€', 'Moneda europea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `document_id` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `first_name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `gender` enum('masculino','femenino','no especificado','') COLLATE utf8_spanish_ci DEFAULT NULL,
	`birthday` date DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `city_id` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apto` varchar(15) DEFAULT NULL,
  `floor` int(11) DEFAULT 0,
  `mobile` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `business_name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rnc` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `company` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `company_phone` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `loan_status` int(11) NOT NULL DEFAULT 0,
	`created_at` timestamp,
	`updated_at` datetime DEFAULT NULL,
	UNIQUE (document_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `document_id`, `first_name`, `last_name`, `gender`, `birthday`, `country_id`, `state_id`, `city_id`, `address`, `apto`, `floor`, `mobile`, `phone`, `email`, `business_name`, `rnc`, `company`, `company_phone`, `company_address`, `loan_status`) VALUES
(8, '12345678', 'maria', 'chavez', 'masculino', NULL, 01, '0101', '010101', '', NULL, 0, '', '', 'correo1@email.com', 'MINISTERIO DE TRABAJO', '401-00736-3', '', NULL, NULL, 0),
(9, '344555', 'mario', 'flores', 'femenino', NULL, 01, '0101', '010101', '', NULL, 0, '', '', 'correo2@email.com', 'MINISTERIO DE TRABAJO', '401-00736-3', '', NULL, NULL, 1),
(10, '12344', 'ruben', 'chavez', 'masculino', NULL, 01, '0101', '010101', 'av el incas98', NULL, 0, '', '', 'correo3@email.com', 'MINISTERIO DE TRABAJO', '401-00736-3', '', NULL, NULL, 1),
(11, '123451', 'diego', 'arnica', 'masculino', NULL, 01, '0101', '010101', 'mariano cron 45', NULL, 0, '', '', 'correo4@email.com', 'MINISTERIO DE TRABAJO', '401-00736-3', '', NULL, NULL, 1),
(12, '7654321', 'matilde', 'frisanc', 'femenino', NULL, 01, '0101', '010101', 'choqwur n455', NULL, 0, '', '', 'correo5@email.com', 'MINISTERIO DE TRABAJO', '401-00736-3', '', NULL, NULL, 1),
(13, '1223', 'pablo', 'moralesss', 'masculino', NULL, 01, '0101', '010101', '', NULL, 0, '', '', 'correo6@email.com', 'MINISTERIO DE TRABAJO', '401-00736-3', '', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `credit_amount` decimal(15,2) NOT NULL,
  `interest_amount` decimal(15,2) NOT NULL,
  `num_fee` int(3) NOT NULL,
  `fee_amount` decimal(10,2) NOT NULL,
  `payment_m` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `coin_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `loans`
--

INSERT INTO `loans` (`id`, `customer_id`, `credit_amount`, `interest_amount`, `num_fee`, `fee_amount`, `payment_m`, `coin_id`, `date`, `status`) VALUES
(10, 11, '3000.00', '3.00', 4, '772.50', 'mensual', 1, '2021-07-04', b'1'),
(11, 10, '3000.00', '4.00', 3, '1040.00', 'mensual', 1, '2021-07-18', b'1'),
(12, 9, '2000.00', '2.00', 3, '680.00', 'mensual', 1, '2021-07-18', b'1'),
(13, 12, '1000.00', '2.00', 4, '255.00', 'mensual', 2, '2021-07-18', b'1'),
(14, 13, '4000.00', '3.00', 4, '1030.00', 'mensual', 1, '2021-07-18', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loan_items`
--

CREATE TABLE `loan_items` (
  `id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `num_quota` int(11) NOT NULL,
  `fee_amount` decimal(25,2) NOT NULL,
  `pay_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `loan_items`
--

INSERT INTO `loan_items` (`id`, `loan_id`, `date`, `num_quota`, `fee_amount`, `pay_date`, `status`) VALUES
(41, 10, '2021-08-04', 1, '772.50', '2021-07-08 22:40:50', b'0'),
(42, 10, '2021-09-04', 2, '772.50', '2021-07-08 22:40:50', b'0'),
(43, 10, '2021-10-04', 3, '772.50', '2021-07-05 01:12:13', b'1'),
(44, 10, '2021-11-04', 4, '772.50', '2021-07-05 01:12:13', b'1'),
(45, 11, '2021-08-18', 1, '1040.00', '2021-07-19 00:56:48', b'0'),
(46, 11, '2021-09-18', 2, '1040.00', '2021-07-19 00:55:17', b'1'),
(47, 11, '2021-10-18', 3, '1040.00', '2021-07-19 00:55:17', b'1'),
(48, 12, '2021-08-18', 1, '680.00', '2021-07-19 02:09:52', b'1'),
(49, 12, '2021-09-18', 2, '680.00', '2021-07-19 02:09:53', b'1'),
(50, 12, '2021-10-18', 3, '680.00', '2021-07-19 02:09:53', b'1'),
(51, 13, '2021-08-18', 1, '255.00', '2021-07-19 02:10:53', b'1'),
(52, 13, '2021-09-18', 2, '255.00', '2021-07-19 02:10:53', b'1'),
(53, 13, '2021-10-18', 3, '255.00', '2021-07-19 02:10:53', b'1'),
(54, 13, '2021-11-18', 4, '255.00', '2021-07-19 02:10:53', b'1'),
(55, 14, '2021-08-18', 1, '1030.00', '2021-07-19 02:26:15', b'0'),
(56, 14, '2021-09-18', 2, '1030.00', '2021-07-19 02:26:16', b'0'),
(57, 14, '2021-10-18', 3, '1030.00', '2021-07-19 02:23:32', b'1'),
(58, 14, '2021-11-18', 4, '1030.00', '2021-07-19 02:23:32', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` varchar(2) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
('01', 'Dominican Republic'),
('02', 'United States');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` varchar(6) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `state_id` varchar(4) DEFAULT NULL,
  `country_id` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `country_id`) VALUES
('010101', 'Santo Domingo de Guzmán', '0101', '01'),
('010201', 'Azua', '0102', '01'),
('010202', 'Las Charcas', '0102', '01'),
('010203', 'Las Yayas de Viajama', '0102', '01'),
('010204', 'Padre Las Casas', '0102', '01'),
('010205', 'Peralta', '0102', '01'),
('010206', 'Sabana Yegua', '0102', '01'),
('010207', 'Pueblo Viejo', '0102', '01'),
('010208', 'Tábara Arriba', '0102', '01'),
('010209', 'Guayabal', '0102', '01'),
('010210', 'Estebanía', '0102', '01'),
('010301', 'Neiba', '0103', '01'),
('010302', 'Galván', '0103', '01'),
('010303', 'Tamayo', '0103', '01'),
('010304', 'Villa Jaragua', '0103', '01'),
('010305', 'Los Ríos', '0103', '01'),
('010401', 'Barahona', '0104', '01'),
('010402', 'Cabral', '0104', '01'),
('010403', 'Enriquillo', '0104', '01'),
('010404', 'Paraíso', '0104', '01'),
('010405', 'Vicente Noble', '0104', '01'),
('010406', 'El Peñón', '0104', '01'),
('010407', 'La Ciénaga', '0104', '01'),
('010408', 'Fundación', '0104', '01'),
('010409', 'Las Salinas', '0104', '01'),
('010410', 'Polo', '0104', '01'),
('010411', 'Jaquimeyes', '0104', '01'),
('010501', 'Dajabón', '0105', '01'),
('010502', 'Loma de Cabrera', '0105', '01'),
('010503', 'Partido', '0105', '01'),
('010504', 'Restauración', '0105', '01'),
('010505', 'El Pino', '0105', '01'),
('010601', 'San Francisco de Macorís', '0106', '01'),
('010602', 'Arenoso', '0106', '01'),
('010603', 'Castillo', '0106', '01'),
('010604', 'Pimentel', '0106', '01'),
('010605', 'Villa Riva', '0106', '01'),
('010606', 'Las Guáranas', '0106', '01'),
('010607', 'Eugenio María de Hostos', '0106', '01'),
('010701', 'Comendador', '0107', '01'),
('010702', 'Bánica', '0107', '01'),
('010703', 'El Llano', '0107', '01'),
('010704', 'Hondo Valle', '0107', '01'),
('010705', 'Pedro Santana', '0107', '01'),
('010706', 'Juan Santiago', '0107', '01'),
('010801', 'El Seibo', '0108', '01'),
('010802', 'Miches', '0108', '01'),
('010901', 'Moca', '0109', '01'),
('010902', 'Cayetano Germosén', '0109', '01'),
('010903', 'Gaspar Hernández', '0109', '01'),
('010904', 'Jamao al Norte', '0109', '01'),
('010905', 'San Víctor', '0109', '01'),
('011001', 'Jimaní', '0110', '01'),
('011002', 'Duvergé', '0110', '01'),
('011003', 'La Descubierta', '0110', '01'),
('011004', 'Postrer Río', '0110', '01'),
('011005', 'Cristóbal', '0110', '01'),
('011006', 'Mella', '0110', '01'),
('011101', 'Higüey', '0111', '01'),
('011102', 'San Rafael del Yuma', '0111', '01'),
('011201', 'La Romana', '0112', '01'),
('011202', 'Guaymate', '0112', '01'),
('011203', 'Villa Hermosa', '0112', '01'),
('011301', 'La Vega', '0113', '01'),
('011302', 'Constanza', '0113', '01'),
('011303', 'Jarabacoa', '0113', '01'),
('011304', 'Jima Abajo', '0113', '01'),
('011401', 'Nagua', '0114', '01'),
('011402', 'Cabrera', '0114', '01'),
('011403', 'El Factor', '0114', '01'),
('011404', 'Río San Juan', '0114', '01'),
('011501', 'Monte Cristi', '0115', '01'),
('011502', 'Castañuelas', '0115', '01'),
('011503', 'Guayubín', '0115', '01'),
('011504', 'Las Matas de Santa Cruz', '0115', '01'),
('011505', 'Pepillo Salcedo (Manzanillo)', '0115', '01'),
('011506', 'Villa Vásquez', '0115', '01'),
('011601', 'Pedernales', '0116', '01'),
('011602', 'Oviedo', '0116', '01'),
('011701', 'Baní', '0117', '01'),
('011702', 'Nizao', '0117', '01'),
('011703', 'Matanzas', '0117', '01'),
('011801', 'Puerto Plata', '0118', '01'),
('011802', 'Altamira', '0118', '01'),
('011803', 'Guananico', '0118', '01'),
('011804', 'Imbert', '0118', '01'),
('011805', 'Los Hidalgos', '0118', '01'),
('011806', 'Luperón', '0118', '01'),
('011807', 'Sosúa', '0118', '01'),
('011808', 'Villa Isabela', '0118', '01'),
('011809', 'Villa Montellano', '0118', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` varchar(4) NOT NULL,
  `name` varchar(45) NOT NULL,
  `country_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
('0101', 'Distrito Nacional', '01'),
('0102', 'Azua', '01'),
('0103', 'Baoruco', '01'),
('0104', 'Barahona', '01'),
('0105', 'Dajabón', '01'),
('0106', 'Duarte', '01'),
('0107', 'Elías Piña', '01'),
('0108', 'El Seibo', '01'),
('0109', 'Espaillat', '01'),
('0110', 'Independencia', '01'),
('0111', 'La Altagracia', '01'),
('0112', 'La Romana', '01'),
('0113', 'La Vega', '01'),
('0114', 'María Trinidad Sánchez', '01'),
('0115', 'Monte Cristi', '01'),
('0116', 'Pedernales', '01'),
('0117', 'Peravia', '01'),
('0118', 'Puerto Plata', '01'),
('0119', 'Hermanas Mirabal', '01'),
('0120', 'Samaná', '01'),
('0121', 'San Cristóbal', '01'),
('0122', 'San Juan', '01'),
('0123', 'San Pedro de Macorís', '01'),
('0124', 'Sánchez Ramírez', '01'),
('0125', 'Santiago', '01'),
('0126', 'Santiago Rodríguez', '01'),
('0127', 'Valverde', '01'),
('0128', 'Monseñor Nouel', '01'),
('0129', 'Monte Plata', '01'),
('0130', 'Hato Mayor', '01'),
('0131', 'San José de Ocoa', '01'),
('0132', 'Santo Domingo', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
	UNIQUE (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Leonardo', 'Fabian', 'ramonlfabian@gmail.com', 'ad57cb3de9c53c1fc7de94665f6f1db2dfbcaaf73063769fed0b3011466eba602c2f423c4725c6dfacdc2973a518a18e0784e848ca3aabd7cadfd140df1df447'),
(2, 'Jacobo', 'Urraca', 'jacrood@gmail.com', 'ad57cb3de9c53c1fc7de94665f6f1db2dfbcaaf73063769fed0b3011466eba602c2f423c4725c6dfacdc2973a518a18e0784e848ca3aabd7cadfd140df1df447'),
(3, 'Pascual', 'Sanchez', 'pascual_sanchezv@hotmail.com', 'ad57cb3de9c53c1fc7de94665f6f1db2dfbcaaf73063769fed0b3011466eba602c2f423c4725c6dfacdc2973a518a18e0784e848ca3aabd7cadfd140df1df447');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `coin_id` (`coin_id`);

--
-- Indices de la tabla `loan_items`
--
ALTER TABLE `loan_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_id` (`loan_id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
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
-- AUTO_INCREMENT de la tabla `coins`
--
ALTER TABLE `coins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `loan_items`
--
ALTER TABLE `loan_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`coin_id`) REFERENCES `coins` (`id`);

--
-- Filtros para la tabla `loan_items`
--
ALTER TABLE `loan_items`
  ADD CONSTRAINT `loan_items_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
