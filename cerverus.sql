-- phpMyAdmin SQL Dump
-- version 4.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-07-2015 a las 20:18:53
-- Versión del servidor: 5.5.41-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cerverus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `business`
--

CREATE TABLE IF NOT EXISTS `business` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `nit` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `ext` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `second_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_phone` int(11) NOT NULL,
  `manager` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_web` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `expedition_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `business`
--

INSERT INTO `business` (`id`, `name`, `type`, `state`, `nit`, `address`, `phone`, `ext`, `email`, `second_email`, `mobile_phone`, `manager`, `photo`, `page_web`, `fax`, `country`, `city`, `skype`, `maps`, `payment_date`, `expedition_date`, `created_at`, `updated_at`, `source`) VALUES
(1, 'cliente', 1, 3, 123, '', 8888888, 0, 'jose.cardenasp@hotmail.com', '', 8888888, 4, 'fI30E4ceYkAkM3I74239_4662593078262_592799536_n.jpg', '', 0, '', '', '', '(4.6080856870560085, -74.03167247772217)', '2015-04-10', '2015-04-11', '2015-04-20 02:07:54', '2015-05-07 06:22:00', ''),
(2, 'prospecto', 2, 1, 123, '', 10231564, 0, 'prospecto@gmail.com', '', 6666644, 4, 'UD4kvO7ubpiswA459547_407544009331708_2093514760_n.jpg', '', 0, '', '', '', '(4.596108131919814, -74.06737804412842)', '0000-00-00', '0000-00-00', '2015-01-20 02:35:02', '2015-04-30 02:36:30', ''),
(3, 'client', 1, 3, 123, '', 0, 0, 'client@gmail.com', '', 423432, 3, 'perfil.png', '', 0, '', '', '', '(4.553858910791575, -73.7208366394043)', '2015-04-19', '2015-04-25', '2015-04-20 03:04:57', '2015-04-30 02:26:51', ''),
(4, 'prospectos', 2, 1, 456, '', 0, 0, 'prospectos@gmail.com', '', 134567, 3, 'perfil.png', '', 0, '', '', '', '(4.606374620094408, -74.05398845672607)', '0000-00-00', '0000-00-00', '2015-04-22 17:16:32', '2015-04-30 02:37:57', ''),
(5, 'maps', 1, 3, 1321, '', 0, 0, 'maps@gmail.com', '', 123456, 3, 'perfil.png', '', 0, '', '', '', '(4.64099618738856, -74.07749533653259)', '2015-01-01', '2015-01-01', '2015-04-30 02:20:27', '2015-05-05 20:27:55', ''),
(6, 'mapsp', 2, 1, 123, '', 0, 0, 'mapsp@gmail.com', '', 123456, 128, 'perfil.png', '', 0, '', '', '', '(4.625880539026424, -74.01965618133545)', '0000-00-00', '0000-00-00', '2015-04-30 02:33:25', '2015-05-24 22:55:54', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `businessProducts`
--

CREATE TABLE IF NOT EXISTS `businessProducts` (
  `id` int(10) unsigned NOT NULL,
  `product_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `value` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `businessProducts`
--

INSERT INTO `businessProducts` (`id`, `product_id`, `business_id`, `created_at`, `updated_at`, `value`) VALUES
(2, 201, 3, '2015-04-27 22:42:52', '2015-04-27 22:42:52', 123456),
(3, 201, 5, '2015-05-05 18:50:43', '2015-05-05 18:50:43', 213),
(4, 101, 1, '2015-05-14 22:14:54', '2015-05-14 22:14:54', 123456),
(5, 101, 3, '2015-05-19 20:40:31', '2015-05-19 20:40:31', 432),
(6, 201, 1, '2015-05-24 22:54:03', '2015-05-24 22:54:03', 423);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `mobile_phone` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `charge` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `mobile_phone`, `business_id`, `created_at`, `updated_at`, `last_name`, `charge`) VALUES
(1, 'contact de client', 'contact@gmail.com', 123456, 123456, 3, '2015-04-20 03:08:24', '2015-04-20 03:08:24', 'fdsa', 'gerente'),
(2, 'nose', 'nose@gmail.com', 123456, 123456, 2, '2015-04-20 06:43:51', '2015-04-20 06:43:51', 'nose', 'nose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL,
  `responsible` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsible_id` int(11) NOT NULL,
  `affected_entity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `affected_entity_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `responsible`, `responsible_id`, `affected_entity`, `action`, `created_at`, `updated_at`, `affected_entity_id`) VALUES
(1, 'drawde', 1, '', 'ha solicitado restaurar la contraseña', '2015-04-19 15:29:07', '2015-04-19 15:29:07', 0),
(2, 'drawde', 1, '', 'ha restaurado la contraseña', '2015-04-19 15:29:23', '2015-04-19 15:29:23', 0),
(3, 'drawde', 1, '', 'ha actualizado su foto de perfil', '2015-04-19 15:31:04', '2015-04-19 15:31:04', 0),
(4, 'drawde', 1, '', 'ha actualizado permisos de role ', '2015-04-19 15:35:12', '2015-04-19 15:35:12', 0),
(5, 'drawde', 1, 'administrador', 'ha creado una cuenta ', '2015-04-19 15:37:11', '2015-04-19 15:37:11', 0),
(6, 'drawde', 1, 'vendedor', 'ha creado una cuenta ', '2015-04-19 15:37:45', '2015-04-19 15:37:45', 0),
(7, 'drawde', 1, 'vend', 'ha creado una cuenta ', '2015-04-19 17:59:31', '2015-04-19 17:59:31', 0),
(8, 'drawde', 1, 'fdsa', 'ha creado un producto ', '2015-04-19 18:38:00', '2015-04-19 18:38:00', 0),
(9, 'drawde', 1, '', 'ha eliminado un producto ', '2015-04-19 18:38:12', '2015-04-19 18:38:12', 0),
(10, 'drawde', 1, 'fdas', 'ha creado un producto ', '2015-04-19 18:38:20', '2015-04-19 18:38:20', 0),
(11, 'drawde', 1, '', 'ha actualizado un producto ', '2015-04-19 18:38:30', '2015-04-19 18:38:30', 0),
(12, 'drawde', 1, '', 'ha actualizado un producto ', '2015-04-19 18:39:04', '2015-04-19 18:39:04', 0),
(13, 'drawde', 1, 'otros', 'ha creado un producto ', '2015-04-19 18:43:34', '2015-04-19 18:43:34', 0),
(14, 'drawde', 1, 'we', 'ha creado un producto ', '2015-04-19 19:01:35', '2015-04-19 19:01:35', 0),
(15, 'drawde', 1, 'administrador', 'ha actualizado una cuenta ', '2015-04-19 19:58:06', '2015-04-19 19:58:06', 2),
(16, 'drawde', 1, 'cliente', 'ha creado un Cliente', '2015-04-20 02:07:54', '2015-04-20 02:07:54', 0),
(17, 'drawde', 1, 'prospecto', 'ha creado un Prospecto', '2015-04-20 02:35:02', '2015-04-20 02:35:02', 0),
(18, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-20 02:42:22', '2015-04-20 02:42:22', 0),
(19, 'drawde', 1, 'client', 'ha creado un Cliente', '2015-04-20 03:04:57', '2015-04-20 03:04:57', 0),
(20, 'drawde', 1, 'cliente', 'ha actualizado un Cliente', '2015-04-20 03:06:40', '2015-04-20 03:06:40', 0),
(21, 'drawde', 1, 'client', 'ha actualizado un Cliente', '2015-04-20 03:07:19', '2015-04-20 03:07:19', 0),
(22, 'drawde', 1, 'contact de client', 'ha creado un contacto ', '2015-04-20 03:08:24', '2015-04-20 03:08:24', 0),
(23, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-20 03:09:39', '2015-04-20 03:09:39', 0),
(24, 'drawde', 1, '', 'ha actualizado permisos de role ', '2015-04-20 03:18:16', '2015-04-20 03:18:16', 0),
(25, 'drawde', 1, '', 'ha agregado un producto para cotizacion ', '2015-04-20 05:25:48', '2015-04-20 05:25:48', 0),
(26, 'drawde', 1, '', 'ha agregado un producto a una empresa ', '2015-04-20 05:50:29', '2015-04-20 05:50:29', 0),
(27, 'drawde', 1, '', 'ha eliminado un producto de una empresa ', '2015-04-20 05:50:38', '2015-04-20 05:50:38', 0),
(28, 'drawde', 1, '', 'ha actualizado un producto para cotizacion ', '2015-04-20 06:25:52', '2015-04-20 06:25:52', 0),
(29, 'drawde', 1, '', 'ha actualizado un producto para cotizacion ', '2015-04-20 06:26:34', '2015-04-20 06:26:34', 0),
(30, 'drawde', 1, '', 'ha actualizado un producto para cotizacion ', '2015-04-20 06:28:27', '2015-04-20 06:28:27', 0),
(31, 'drawde', 1, '', 'ha actualizado un producto para cotizacion ', '2015-04-20 06:31:32', '2015-04-20 06:31:32', 0),
(32, 'drawde', 1, '', 'ha actualizado un producto para cotizacion ', '2015-04-20 06:31:43', '2015-04-20 06:31:43', 0),
(33, 'drawde', 1, '', 'ha agregado un producto para cotizacion ', '2015-04-20 06:33:06', '2015-04-20 06:33:06', 0),
(34, 'drawde', 1, '', 'ha agregado un producto para cotizacion ', '2015-04-20 06:33:14', '2015-04-20 06:33:14', 0),
(35, 'drawde', 1, '', 'ha actualizado un producto para cotizacion ', '2015-04-20 06:33:21', '2015-04-20 06:33:21', 0),
(36, 'drawde', 1, '', 'ha eliminado un producto para cotizacion ', '2015-04-20 06:35:44', '2015-04-20 06:35:44', 0),
(37, 'drawde', 1, '', 'ha eliminado un producto para cotizacion ', '2015-04-20 06:36:01', '2015-04-20 06:36:01', 0),
(38, 'drawde', 1, 'nose', 'ha creado un contacto ', '2015-04-20 06:43:51', '2015-04-20 06:43:51', 0),
(39, 'drawde', 1, 'prospectos', 'ha creado un Prospecto', '2015-04-22 17:16:32', '2015-04-22 17:16:32', 0),
(40, 'drawde', 1, '', 'ha actualizado permisos de role ', '2015-04-22 17:45:40', '2015-04-22 17:45:40', 0),
(41, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-24 02:43:11', '2015-04-24 02:43:11', 0),
(42, 'drawde', 1, '', 'ha agregado un producto a una empresa ', '2015-04-27 22:41:45', '2015-04-27 22:41:45', 0),
(43, 'drawde', 1, '', 'ha creado fechas de pago de una empresa ', '2015-04-27 22:42:00', '2015-04-27 22:42:00', 0),
(44, 'drawde', 1, '', 'ha creado fechas de pago de una empresa ', '2015-04-27 22:42:35', '2015-04-27 22:42:35', 0),
(45, 'drawde', 1, '', 'ha agregado un producto a una empresa ', '2015-04-27 22:42:52', '2015-04-27 22:42:52', 0),
(46, 'drawde', 1, '', 'ha creado fechas de pago de una empresa ', '2015-04-27 22:43:14', '2015-04-27 22:43:14', 0),
(47, 'drawde', 1, '', 'ha modificado los pagos de la empresa ', '2015-04-27 22:43:22', '2015-04-27 22:43:22', 0),
(48, 'drawde', 1, '', 'ha modificado los pagos de la empresa ', '2015-04-27 22:43:22', '2015-04-27 22:43:22', 0),
(49, 'drawde', 1, '', 'ha modificado los pagos de la empresa ', '2015-04-27 22:43:22', '2015-04-27 22:43:22', 0),
(50, 'drawde', 1, '', 'ha creado fechas de pago de una empresa ', '2015-04-27 22:48:13', '2015-04-27 22:48:13', 0),
(51, 'drawde', 1, '', 'ha creado fechas de pago de una empresa ', '2015-04-27 22:51:35', '2015-04-27 22:51:35', 0),
(52, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-27 23:17:38', '2015-04-27 23:17:38', 0),
(53, 'drawde', 1, 'cliente', 'ha actualizado un Cliente', '2015-04-27 23:18:48', '2015-04-27 23:18:48', 0),
(54, 'drawde', 1, 'cliente', 'ha actualizado un Cliente', '2015-04-27 23:24:13', '2015-04-27 23:24:13', 0),
(55, 'drawde', 1, 'cliente', 'ha actualizado un Cliente', '2015-04-27 23:24:45', '2015-04-27 23:24:45', 0),
(56, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-27 23:25:14', '2015-04-27 23:25:14', 0),
(57, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-27 23:25:29', '2015-04-27 23:25:29', 0),
(58, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-27 23:32:32', '2015-04-27 23:32:32', 0),
(59, 'drawde', 1, 'cliente', 'ha actualizado un Cliente', '2015-04-27 23:32:47', '2015-04-27 23:32:47', 0),
(60, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-27 23:33:09', '2015-04-27 23:33:09', 0),
(61, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-27 23:33:55', '2015-04-27 23:33:55', 0),
(62, 'drawde', 1, 'maps', 'ha creado un Cliente', '2015-04-30 02:20:27', '2015-04-30 02:20:27', 0),
(63, 'drawde', 1, 'client', 'ha actualizado un Cliente', '2015-04-30 02:26:51', '2015-04-30 02:26:51', 0),
(64, 'drawde', 1, 'cliente', 'ha actualizado un Cliente', '2015-04-30 02:27:34', '2015-04-30 02:27:34', 0),
(65, 'drawde', 1, 'mapsp', 'ha creado un Prospecto', '2015-04-30 02:33:25', '2015-04-30 02:33:25', 0),
(66, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-30 02:34:39', '2015-04-30 02:34:39', 0),
(67, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-30 02:36:30', '2015-04-30 02:36:30', 0),
(68, 'drawde', 1, 'prospecto', 'ha actualizado un Prospecto', '2015-04-30 02:36:41', '2015-04-30 02:36:41', 0),
(69, 'drawde', 1, 'prospectos', 'ha actualizado un Prospecto', '2015-04-30 02:37:57', '2015-04-30 02:37:57', 0),
(70, 'drawde', 1, 'maps', 'ha actualizado un Cliente', '2015-04-30 03:39:05', '2015-04-30 03:39:05', 0),
(71, 'drawde', 1, 'mapsp', 'ha actualizado un Prospecto', '2015-04-30 03:39:54', '2015-04-30 03:39:54', 0),
(72, 'drawde', 1, '', 'ha actualizado permisos de role ', '2015-05-04 00:01:56', '2015-05-04 00:01:56', 0),
(73, 'administrador', 2, 'maps', 'ha actualizado un Cliente', '2015-05-05 18:46:26', '2015-05-05 18:46:26', 0),
(74, 'administrador', 2, '', 'ha eliminado un producto para cotizacion ', '2015-05-05 18:49:17', '2015-05-05 18:49:17', 0),
(75, 'administrador', 2, '', 'ha agregado un producto a una empresa ', '2015-05-05 18:50:43', '2015-05-05 18:50:43', 0),
(76, 'drawde', 1, '', 'se ha enviado correos masivos de promocion ', '2015-05-07 05:24:28', '2015-05-07 05:24:28', 0),
(77, 'drawde', 1, '', 'ha solicitado restaurar la contraseña', '2015-05-07 05:58:14', '2015-05-07 05:58:14', 0),
(78, 'drawde', 1, '', 'ha solicitado restaurar la contraseña', '2015-05-07 06:09:07', '2015-05-07 06:09:07', 0),
(79, 'administrador', 2, '', 'se ha enviado correos masivos de promocion ', '2015-05-07 06:21:22', '2015-05-07 06:21:22', 0),
(80, 'administrador', 2, 'cliente', 'ha actualizado un Cliente', '2015-05-07 06:22:00', '2015-05-07 06:22:00', 0),
(81, 'administrador', 2, '', 'se ha enviado correos masivos de promocion ', '2015-05-07 06:22:14', '2015-05-07 06:22:14', 0),
(82, 'administrador', 2, '', 'ha agregado un producto para cotizacion ', '2015-05-07 07:20:22', '2015-05-07 07:20:22', 0),
(83, 'administrador', 2, '', 'ha eliminado un producto para cotizacion ', '2015-05-07 07:22:11', '2015-05-07 07:22:11', 0),
(84, 'administrador', 2, '', 'ha agregado un producto a una empresa ', '2015-05-07 07:22:24', '2015-05-07 07:22:24', 0),
(85, 'administrador', 2, '', 'ha eliminado un producto de una empresa ', '2015-05-07 07:27:31', '2015-05-07 07:27:31', 0),
(86, 'administrador', 2, '', 'ha eliminado un producto de una empresa ', '2015-05-07 07:27:36', '2015-05-07 07:27:36', 0),
(87, 'drawde', 1, 'manuel', 'ha creado una cuenta ', '2015-05-08 14:56:38', '2015-05-08 14:56:38', 0),
(88, 'drawde', 1, 'sacha', 'ha creado una cuenta ', '2015-05-08 14:57:02', '2015-05-08 14:57:02', 0),
(89, 'drawde', 1, 'pez', 'ha creado una cuenta ', '2015-05-08 14:59:16', '2015-05-08 14:59:16', 0),
(90, 'vend', 4, '', 'ha agregado un producto a una empresa ', '2015-05-14 22:14:55', '2015-05-14 22:14:55', 0),
(91, 'vend', 4, '', 'ha creado fechas de pago de una empresa ', '2015-05-14 22:15:10', '2015-05-14 22:15:10', 0),
(92, 'drawde', 1, '', 'ha agregado un producto a una empresa ', '2015-05-19 20:40:31', '2015-05-19 20:40:31', 0),
(93, 'drawde', 1, '', 'ha eliminado una cuenta ', '2015-05-21 04:20:55', '2015-05-21 04:20:55', 9),
(94, 'drawde', 1, '', 'ha eliminado una cuenta ', '2015-05-21 04:28:01', '2015-05-21 04:28:01', 8),
(95, 'drawde', 1, '', 'ha eliminado una cuenta ', '2015-05-21 04:37:19', '2015-05-21 04:37:19', 111),
(96, 'drawde', 1, 'administrador', 'ha actualizado una cuenta ', '2015-05-21 04:47:14', '2015-05-21 04:47:14', 2),
(97, 'drawde', 1, 'vEmard', 'ha actualizado una cuenta ', '2015-05-21 04:47:28', '2015-05-21 04:47:28', 112),
(98, 'drawde', 1, 'Mae.Quigley', 'ha actualizado una cuenta ', '2015-05-21 04:48:45', '2015-05-21 04:48:45', 213),
(99, 'drawde', 1, 'Salma18', 'ha actualizado una cuenta ', '2015-05-21 04:48:53', '2015-05-21 04:48:53', 118),
(100, 'drawde', 1, '', 'ha agregado un producto a una empresa ', '2015-05-24 22:54:04', '2015-05-24 22:54:04', 0),
(101, 'drawde', 1, 'mapsp', 'ha actualizado un Prospecto', '2015-05-24 22:55:54', '2015-05-24 22:55:54', 0),
(102, 'drawde', 1, '', 'ha eliminado una cuenta ', '2015-05-27 19:46:24', '2015-05-27 19:46:24', 115),
(103, 'vend', 4, '', 'ha creado fechas de pago de una empresa ', '2015-05-30 00:25:49', '2015-05-30 00:25:49', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_02_19_033805_create_permissions_table', 1),
('2015_02_19_034134_create_permissionRoles_table', 1),
('2015_02_19_034418_create_permissionUsers_table', 1),
('2015_02_19_034738_create_roles_table', 1),
('2015_02_19_035120_create_users_table', 1),
('2015_02_26_040623_create_logs_table', 1),
('2015_02_26_052842_change_users_table', 1),
('2015_02_27_051950_change_logs_table', 1),
('2015_02_28_225502_create_business_table', 1),
('2015_03_01_053910_add_business_table', 1),
('2015_03_03_051500_create_contacts_table', 1),
('2015_03_03_073110_add_contacts_table', 1),
('2015_03_07_075841_create_records_table', 1),
('2015_03_07_091550_change_records_table', 1),
('2015_03_16_235638_change_contacts_table', 1),
('2015_03_17_000806_create_payments_table', 1),
('2015_03_19_164218_create_products_table', 1),
('2015_03_21_221739_create_businessProducts_table', 1),
('2015_03_23_210834_change_payments_table', 1),
('2015_03_25_133928_add_businessProducts_table', 1),
('2015_04_19_234017_create_stateProducts_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) unsigned NOT NULL,
  `type` int(11) NOT NULL,
  `payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `validator` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `businessProduct_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `type`, `payment`, `validator`, `created_at`, `updated_at`, `businessProduct_id`) VALUES
(5, 3, '2015-04-27', 1, '2015-04-27 22:43:14', '2015-04-27 22:43:21', 2),
(6, 3, '2015-04-27', 0, '2015-04-27 22:43:14', '2015-04-27 22:43:22', 2),
(7, 3, '2015-04-27', 0, '2015-04-27 22:43:14', '2015-04-27 22:43:22', 2),
(13, 0, '', 0, '2015-05-05 18:50:43', '2015-05-05 18:50:43', 3),
(16, 0, '', 0, '2015-05-19 20:40:31', '2015-05-19 20:40:31', 5),
(17, 0, '', 0, '2015-05-24 22:54:04', '2015-05-24 22:54:04', 6),
(18, 1, '2015-05-29', 0, '2015-05-30 00:25:49', '2015-05-30 00:25:49', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissionRoles`
--

CREATE TABLE IF NOT EXISTS `permissionRoles` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permissionRoles`
--

INSERT INTO `permissionRoles` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2015-04-19 15:35:12', '2015-04-19 15:35:12'),
(3, 1, 2, '2015-04-19 15:35:12', '2015-04-19 15:35:12'),
(4, 1, 3, '2015-04-19 15:35:12', '2015-04-19 15:35:12'),
(5, 1, 4, '2015-04-19 15:35:12', '2015-04-19 15:35:12'),
(6, 1, 5, '2015-04-19 15:35:12', '2015-04-19 15:35:12'),
(7, 1, 6, '2015-04-19 15:35:12', '2015-04-19 15:35:12'),
(8, 1, 7, '2015-04-19 15:35:12', '2015-04-19 15:35:12'),
(9, 1, 8, '2015-04-19 15:35:12', '2015-04-19 15:35:12'),
(10, 1, 9, '2015-04-19 15:35:12', '2015-04-19 15:35:12'),
(11, 1, 10, '2015-04-19 15:35:12', '2015-04-19 15:35:12'),
(12, 1, 11, '2015-04-19 15:35:12', '2015-04-19 15:35:12'),
(13, 1, 12, '2015-04-20 03:18:16', '2015-04-20 03:18:16'),
(18, 3, 1, '2015-04-22 17:45:40', '2015-04-22 17:45:40'),
(19, 3, 2, '2015-04-22 17:45:40', '2015-04-22 17:45:40'),
(20, 3, 3, '2015-04-22 17:45:40', '2015-04-22 17:45:40'),
(21, 3, 4, '2015-04-22 17:45:40', '2015-04-22 17:45:40'),
(22, 3, 5, '2015-04-22 17:45:40', '2015-04-22 17:45:40'),
(23, 2, 1, '2015-05-04 00:01:56', '2015-05-04 00:01:56'),
(24, 2, 2, '2015-05-04 00:01:56', '2015-05-04 00:01:56'),
(25, 2, 3, '2015-05-04 00:01:56', '2015-05-04 00:01:56'),
(26, 2, 4, '2015-05-04 00:01:56', '2015-05-04 00:01:56'),
(27, 2, 5, '2015-05-04 00:01:56', '2015-05-04 00:01:56'),
(28, 2, 6, '2015-05-04 00:01:56', '2015-05-04 00:01:56'),
(29, 2, 7, '2015-05-04 00:01:56', '2015-05-04 00:01:56'),
(30, 2, 8, '2015-05-04 00:01:56', '2015-05-04 00:01:56'),
(31, 2, 9, '2015-05-04 00:01:56', '2015-05-04 00:01:56'),
(32, 2, 10, '2015-05-04 00:01:56', '2015-05-04 00:01:56'),
(33, 2, 11, '2015-05-04 00:01:56', '2015-05-04 00:01:56'),
(34, 2, 12, '2015-05-04 00:01:56', '2015-05-04 00:01:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '    ', '2015-04-19 15:32:41', '2015-04-19 15:32:44'),
(2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'chart', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissionUsers`
--

CREATE TABLE IF NOT EXISTS `permissionUsers` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `permission_no` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `dependency` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `dependency`, `name`, `created_at`, `updated_at`) VALUES
(101, 1, 'branding10', '2015-04-19 18:38:19', '2015-04-19 18:38:30'),
(601, 6, 'otros', '2015-04-19 18:43:34', '2015-04-19 18:43:34'),
(201, 2, 'we', '2015-04-19 19:01:35', '2015-04-19 19:01:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(10) unsigned NOT NULL,
  `business_id` int(11) NOT NULL,
  `state_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_two` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_three` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_four` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_five` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_six` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_seven` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_eight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_nine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `records`
--

INSERT INTO `records` (`id`, `business_id`, `state_one`, `state_two`, `state_three`, `state_four`, `state_five`, `state_six`, `state_seven`, `state_eight`, `state_nine`, `created_at`, `updated_at`, `state_ten`) VALUES
(1, 1, '', '', '', '', '', '', '', '', '', '2015-04-20 02:07:54', '2015-04-20 02:07:54', ''),
(2, 2, '', '', '', '', '', '', '', '', '', '2015-04-20 02:35:02', '2015-04-20 02:35:02', ''),
(3, 3, '', '', '', '', '', '', '', '', '', '2015-04-20 03:04:57', '2015-04-20 03:04:57', ''),
(4, 4, '', '', '', '', '', '', '', '', '', '2015-04-22 17:16:32', '2015-04-22 17:16:32', ''),
(5, 5, '', '', '', '', '', '', '', '', '', '2015-04-30 02:20:27', '2015-04-30 02:20:27', ''),
(6, 6, '', '', '', '', '', '', '', '', '', '2015-04-30 02:33:25', '2015-04-30 02:33:25', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrador', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Administrador', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Vendedor', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stateProducts`
--

CREATE TABLE IF NOT EXISTS `stateProducts` (
  `id` int(10) unsigned NOT NULL,
  `product_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `restore_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `manager` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `password`, `restore_password`, `email`, `address`, `phone`, `photo`, `role_id`, `user_name`, `remember_token`, `created_at`, `updated_at`, `manager`) VALUES
(1, 'edward', 'diaz    ', '$2y$10$HpblbywCV3ygGTKnrjWEy.SoECM/j6Vm5GZd8ScRvNItdTUmg2aka', 'Mmq91Q6lj2Y8P0kISdbzgWZPNF7gvX', 'edwarddiaz92@gmail.com', 'cc', 123456, 'X6WSMynfU645jrS401307_337602562949418_269849913058017_919089_214478974_n.jpg', 1, 'drawde', 'sDWVwzKqyftRJxopM2Wv7k8d7IaqmpM9g9HeRG49hf59xq7iyc06hxjh5MIj', '2015-04-19 15:28:21', '2015-05-27 19:59:06', 0),
(2, 'administrador', 'administrador', '$2y$10$ax8vwS3bEefSlRdeSr8bG.6EDPP7uXg/h1dSFLbpoF.mFGCjWYBSK', '', 'administrador@gmail.com', 'calle64', 456123, 'perfil.png', 2, 'administrador', '7r0IG2n0KNPjKn5Vo4Ubf21xf09Qvo3fUhMU4Bue4VB12ksvcLR9WeXAEyme', '2015-04-19 15:37:11', '2015-05-08 14:52:41', 0),
(3, 'vendedor', 'vendedor', '$2y$10$TtYthfEdnDqxj3JL87osTuprwb/3bu8Sc3okWeFR1NprKQpm6LiKa', '', 'vendedor@gmail.com', 'calle ', 123456, 'perfil.png', 3, 'vendedor', '8Jo2hD7wpYVqAOvA70NlCZ9zjpD8jdI7rwms9yw2B08WvGZKbY6vTaQcIMHA', '2015-04-19 15:37:45', '2015-05-16 20:50:23', 2),
(4, 'vend', 'vend', '$2y$10$/.fF4jZcQ7Rw3Wc2xr0/D.1CBJQIyoD8MIrGA586ihtVQrcOmzRWi', '', 'vend@gmail.com', '123', 123456, 'perfil.png', 3, 'vend', 'RE84YJfmU1rGXXsR50Yxy0wkI18cLiC8u7oDYzfLhbOpAXhLRANyqOON35Oy', '2015-04-19 17:59:31', '2015-05-19 21:36:29', 2),
(5, 'manue', 'pinzon', '$2y$10$nhU9gAQA3FrMAe2sq5x7W.6WikggTI1ZmGYeeR3o5f9qyNEG6iZ7e', '', 'malpisa1@hotmail.com', 'cc3', 123456, 'perfil.png', 1, 'manuel', '', '2015-05-08 14:56:38', '2015-05-08 14:56:38', 0),
(6, 'sacha', 'diaz', '$2y$10$tq7BGvFTJmw5F0eZwMRtHe543pgwuIBOSexb4wOymjLNgz99forae', '', 'sachadiazalba@gmail.com', '123456', 123456, 'perfil.png', 2, 'sacha', '', '2015-05-08 14:57:02', '2015-05-08 14:57:02', 0),
(7, 'pez', 'pez', '$2y$10$uu91AxKCMp.0jNfi1El1ruj7InCmnpVnY45wtRkT4/DqXFxvL3qVG', '', 'pez@gmail.com', '123456', 123456, 'perfil.png', 3, 'pez', '', '2015-05-08 14:59:16', '2015-05-08 14:59:16', 2),
(112, 'Nelda', 'Strosin', '$2y$10$UUxEGdVgnlvOAok/IPLmWeeFi2PBgZtdxIJE20c9hxktWFs4USZ3G', '', 'Zieme.Sherman@King.com', '0093 Roob Mountain Suite 719Marcosmouth, MI 66597', 123456, 'perfil.png', 2, 'vEmard', '', '0000-00-00 00:00:00', '2015-05-21 04:47:28', 0),
(113, 'Camilla', 'Ritchie', '$2y$10$k.urZuK6ULqMt5TEinnaUOCWE8FA7CUCFwnQsaJJ5BLqS80OxBdCe', '', 'Lehner.Rosario@gmail.com', '570 Terrence Forge Apt. 804\nNew Corenefurt, NH 63453-7965', 123456, 'perfil.png', 2, 'Kuhlman.Reba', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(114, 'Kris', 'Ruecker', '$2y$10$sbnh.zJf7e.1t0o4ssE1s.T0xKqHoLgbewL/G5dvdnjzdNpH4GBy6', '', 'Carter.Noemie@Buckridge.org', '953 Keely Club\nWatersmouth, NH 44270', 123456, 'perfil.png', 2, 'Powlowski.Pearlie', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(116, 'Loraine', 'Gorczany', '$2y$10$d07JF2htjoSrH8cR4NKmvuZELrZ/t7ftLLxHiVx5E7n0FYyQLu5wC', '', 'Sipes.Cecilia@yahoo.com', '3023 Shaylee River Apt. 628\nEricamouth, TX 23861', 123456, 'perfil.png', 3, 'bGreen', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(117, 'Marta', 'Bergnaum', '$2y$10$atZwsY.RIkiVTuZMV3sWGupeyWeBJQ/Z9aWQEHXgQhQu4tM9t2ADu', '', 'Rogelio82@Feeney.com', '164 Buckridge Mount\nOberbrunnerfurt, WV 00245', 123456, 'perfil.png', 3, 'Georgiana.Runte', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(118, 'Joaquin', 'Gutkowski', '$2y$10$MF0C26bPLwdHINSmzJzy7e/xLXhTC2PKwSWVa.Y8BHM6qPEiutkiy', '', 'Earnestine.Renner@McGlynn.com', '488 Mann PlazaBobbyhaven, TN 45830', 123456, 'perfil.png', 3, 'Salma18', '', '0000-00-00 00:00:00', '2015-05-21 04:48:53', 114),
(119, 'Jennyfer', 'Heidenreich', '$2y$10$7vyP6vIwcdTJ21KcJEAqsOeBK.NJu/knvG/n0VFCJDIeRHkbkBg2u', '', 'Aurelie61@Beatty.net', '81159 Kovacek Fork Suite 109\nRomachester, OH 27346-9024', 123456, 'perfil.png', 3, 'Leannon.Georgianna', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(120, 'Rebekah', 'Bechtelar', '$2y$10$syR0HXAHLT3f9DHP6.H68.DognYFPtKjclZVNen9ONV1rFs2IlmoG', '', 'Granville.Jast@Parker.com', '8478 Walker Harbor\nStiedemannland, NV 77499', 123456, 'perfil.png', 3, 'Schmeler.Antonetta', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(121, 'Harry', 'Ritchie', '$2y$10$f.eq8Yh7SjD75VFuUG1h.u9WFBlB8Bgga8pwcFStB/ZhJOttaltBS', '', 'Elwyn10@yahoo.com', '69191 Terrance Loop Suite 431\nGinatown, MT 77347', 123456, 'perfil.png', 3, 'Howell.Prohaska', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(122, 'Darby', 'Leannon', '$2y$10$MtcdLj35lrkhDr1mrqcJX.vdPSfFPUzMzVqE7K4wqmXz8o1RqDc6i', '', 'tToy@yahoo.com', '0791 Trantow Mall Suite 794\nWest Cedrick, WA 17431-3254', 123456, 'perfil.png', 3, 'Donnelly.Leola', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(123, 'Aurelie', 'Lowe', '$2y$10$Scx/EEk5fJau7IresUStmuAGM.Jxvj6TOnCfpht09oA3ZTadpsOLu', '', 'Melba32@Stokes.com', '89016 Schmitt Vista\nLake Aracely, DC 60417-9413', 123456, 'perfil.png', 3, 'Ortiz.Yasmeen', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(124, 'Eleonore', 'Yost', '$2y$10$EEjRx10/WrfUBMzC93e/3O8yx/ApJ9guk7imMWXIHEGTH0bgi7Dtq', '', 'Ritchie.Mia@yahoo.com', '07773 Cormier Rapids\nEast Reillyville, NV 34063-6912', 123456, 'perfil.png', 3, 'lOKeefe', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(125, 'Alayna', 'Sipes', '$2y$10$46cboLHnYneux9Zs7M5Dm.wYDjjrRVKmHBg/KhbW1Xfe0EXPK4ex2', '', 'Kautzer.Stephania@yahoo.com', '294 Eloisa Parkways Apt. 384\nEast Grace, AR 58215-6104', 123456, 'perfil.png', 3, 'Crona.Hillary', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(126, 'Adonis', 'Rempel', '$2y$10$upyy9gzy3k3sicHAVlOrw.9/e6JPt0E./zLz8PRGqfKA4VLMySuF2', '', 'Lamont.Paucek@gmail.com', '65702 Josiane Center Apt. 187\nLake Harmony, OK 30639-2746', 123456, 'perfil.png', 3, 'Bradtke.Emilio', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(127, 'Linnea', 'Lind', '$2y$10$FMI9uC2AzpWHcBP.H03U7ehQx9aX0a0zg0q1QI.CXGlGqINc1dUne', '', 'Evan02@Schaden.com', '130 Lorenzo Curve Suite 242\nEast Jolieburgh, UT 05114-0626', 123456, 'perfil.png', 3, 'Herzog.Kiley', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(128, 'Keven', 'Dickinson', '$2y$10$yVGT0ZIm0/EmpC8OpGmN1ODxj5gc8CPYMl.kyxdXGtFIqZzxh3y7.', '', 'Crooks.Kaitlyn@Jenkins.com', '02443 Moen Stravenue\nNorth Karianne, WY 54088', 123456, 'perfil.png', 3, 'Lawrence81', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(129, 'Cornell', 'Effertz', '$2y$10$OCn42AuQlhiWERnjcPOoxe5WGKEnSBZk5fBQzhru1WIpGthpni8qO', '', 'Collins.Elton@hotmail.com', '12628 Cole Spring Suite 043\nEast Myahtown, KY 93943', 123456, 'perfil.png', 3, 'Rempel.Zoie', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(130, 'Camden', 'Sporer', '$2y$10$egOSotR.BZXJ0V8Hi/ynpeShBqakOrQiOGl9BN8.jbw1B3U/6cioG', '', 'Stevie.Pfeffer@yahoo.com', '26769 Connelly Springs\nEthelmouth, NM 48602', 123456, 'perfil.png', 3, 'pLeannon', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(131, 'Reinhold', 'Hintz', '$2y$10$t8f6.RGabYff0b3wJXdGiOWc8HakZkAlcqT8HagnQaS6B4oqUbnhO', '', 'Trent.Russel@Lockman.com', '001 Schamberger Flat Apt. 433\nTavaresmouth, OH 83398', 123456, 'perfil.png', 3, 'Stroman.Hank', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(132, 'Darrin', 'Wiza', '$2y$10$ytJLNWrHNpGUnbNlzxtwjOmy8nhx2wMM.LngwUmpQLxF/XS8YGj5S', '', 'Danial.Stamm@Conn.info', '64641 Gutkowski Locks Apt. 553\nEast Roma, OK 22317-0096', 123456, 'perfil.png', 3, 'Carter.Gracie', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(133, 'Patricia', 'Hoeger', '$2y$10$/6bsNyHP4SbW5wnAs5U.ee8cJoBTOqVEsZr2NistGNjxknaM9Og1a', '', 'Ashley.Goldner@Veum.info', '1853 Willms Crescent Apt. 976\nPort Rogelio, VA 28917', 123456, 'perfil.png', 3, 'Nikki36', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(134, 'Ezekiel', 'Roob', '$2y$10$yqFnmw9NJBjYeK2L7lEKieC/olLrzayfwJyOHO/fAP8pa20tAhzsW', '', 'Kelton.Zieme@hotmail.com', '573 Christiansen Common Suite 363\nChristelleland, IN 81362', 123456, 'perfil.png', 3, 'Gulgowski.Lorna', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(135, 'Oswaldo', 'Daniel', '$2y$10$QRB1COXbqOxZA6T.vYyvgedtnuJDgZ9UNC1yOgpRlbaAAFiF4vMvq', '', 'Daniel.Trudie@gmail.com', '3001 Yundt Cliff\nSouth Asaborough, MS 40964', 123456, 'perfil.png', 3, 'fFranecki', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(136, 'Delia', 'Fahey', '$2y$10$J7oBoXSlkTS1icNStyFeQu6/hHKJXiYIgMoZOXSVqEKz6Yy2TJbem', '', 'Cesar.Stanton@Dare.biz', '91924 Damion Road\nLake Carli, KS 00291', 123456, 'perfil.png', 3, 'vGoldner', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(137, 'Else', 'Keeling', '$2y$10$fR2bISIaa/HXHkUeBzy6FuYsL/JrtnjwdMqSOOrEu9bieuYsjopMq', '', 'Prosacco.Lizzie@hotmail.com', '22497 Rippin Canyon\nNorth Cecilstad, DC 31276', 123456, 'perfil.png', 3, 'eReinger', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(138, 'Earnestine', 'Treutel', '$2y$10$1K44JMJwsdFnnlztx2rVzOHlwXP/K3kou8B0L1F9ui3KaZrtlPAKe', '', 'tNienow@Barrows.com', '1515 Reymundo Shoal\nStrackefort, NH 59488', 123456, 'perfil.png', 3, 'xKiehn', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(139, 'Grover', 'Spinka', '$2y$10$EiFveaD1mK2K1gkkPV9MxOBdn7vSJeL14jrFGd.ILVIjPp5Jnuc4O', '', 'nAnkunding@hotmail.com', '4822 Howe Center\nCiaraland, NM 31292-2586', 123456, 'perfil.png', 3, 'Barton.Addie', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(140, 'Tamia', 'Ruecker', '$2y$10$GuaTABjE0MkluBRDbyCL1.0n0KJ3YAb7PNHlAAkgD7auAzYmGimRa', '', 'Joannie.Denesik@Grimes.com', '7541 Maggio Lodge\nNew Maritza, NV 83926', 123456, 'perfil.png', 3, 'Ayla.Abbott', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(141, 'Roy', 'Eichmann', '$2y$10$w3nVbKUsNdROtK2FqBS/Rux2062yltEypVb.F9mgbtbzdAsPVf2BC', '', 'aBauch@hotmail.com', '6896 Dawn Green Suite 839\nSouth Jett, PA 12333', 123456, 'perfil.png', 3, 'Arnaldo.Russel', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(142, 'Iliana', 'Smitham', '$2y$10$iJlEDYh79H6Vi98TuZyBKeDilIbwxXznxFPMx3Yt2W6PnbeTBJzZC', '', 'Hahn.Hunter@Harris.info', '73232 Angus Extension Apt. 585\nNew Leonora, ME 07145', 123456, 'perfil.png', 3, 'Wendell61', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(143, 'Jack', 'Rippin', '$2y$10$8hfJ/5PrLVLKo.mEbKvV/uYP650tmO7JQrmyFrUvT.uOAunUu02eW', '', 'Harrison.Keebler@yahoo.com', '981 Brakus Stravenue\nPort Abbeyborough, IA 63714-0952', 123456, 'perfil.png', 3, 'gKshlerin', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(144, 'Dina', 'Schmitt', '$2y$10$XkenkUiK5e6/8JbAFIw.3e45.GljOodjQFrl81Betj197JTaY7FNi', '', 'yLubowitz@gmail.com', '1313 Nitzsche Orchard Suite 957\nPort Jaunitaberg, OK 92646-8356', 123456, 'perfil.png', 3, 'Adolphus64', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(145, 'Rebeca', 'Lubowitz', '$2y$10$JNjb8XC5Nulxaj0nM5hXiOsXxgl8XgquQ8VOjSf5/ySed3Du2d4wy', '', 'kBecker@hotmail.com', '2092 Nicolas Ville Suite 135\nNew Zion, IA 97825-9137', 123456, 'perfil.png', 3, 'Runolfsdottir.Jessie', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(146, 'Jerrold', 'Larson', '$2y$10$Ke93gFZ7L0luEMyLNwGVEeieVKAt6Lu4b8Dij8Uc04UKPy2G8ybgS', '', 'sBernhard@Hayes.net', '53720 Schneider Station\nDonaldshire, IL 20663', 123456, 'perfil.png', 3, 'Robert.Tromp', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(147, 'Reed', 'Maggio', '$2y$10$wWiIltzYRRvVR0YaFYdH4uNZ20sSWSNGggA5hX3dZL8.DPvMSktLy', '', 'pRunolfsson@Goodwin.com', '960 Lenna Spring Apt. 257\nLake Chesterberg, OR 05416', 123456, 'perfil.png', 3, 'Quigley.Cindy', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(148, 'Gwen', 'Pacocha', '$2y$10$eVxbmUSSh3iDQGia0vXC1O7hA8rDmMP5udKvF8ZawThj492jWzBcG', '', 'London.Brown@Runolfsson.com', '899 Lina Parkways\nNew Raleigh, UT 04646', 123456, 'perfil.png', 3, 'Berge.Isadore', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(149, 'Kaitlyn', 'Denesik', '$2y$10$vW4fZCt9M9OwU3oY6lvZtORtrF1YyH69TfGJPekp2c2JcweJSSfde', '', 'Nola.Lakin@yahoo.com', '72343 Adrienne Extension\nDickenshaven, HI 90972', 123456, 'perfil.png', 3, 'fWatsica', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(150, 'Roxane', 'Farrell', '$2y$10$B4XQvEdt9gZ7xUQ/Pz9eHOirjNHdki/MLYLDl/IYxjUNOnk9AvxC6', '', 'Onie94@Kuphal.com', '91217 Bret Ranch\nDarrelport, UT 84877-0944', 123456, 'perfil.png', 3, 'Rippin.Kareem', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(151, 'Javier', 'Price', '$2y$10$xdabLwskMUD139mADMYZdeveznD0xR4Nf812sOfs3.R25mXrBOn/i', '', 'Timmy39@yahoo.com', '37042 Daphney Centers\nTiannaview, NC 36916-8734', 123456, 'perfil.png', 3, 'Constance43', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(152, 'Destini', 'Reilly', '$2y$10$U/PIPKop51WjepeN9.Spm.IpuQ8xYjy7UfjbYqDaQvdYXlY/hUkki', '', 'Doris14@yahoo.com', '06632 Russell Wall\nCathrineside, DC 00632-7862', 123456, 'perfil.png', 3, 'Rudy15', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(153, 'Ella', 'Champlin', '$2y$10$GBLN8yv8.QSK6Y0DUGvEK.A3Q.3Hsl65MkDVi9uygwggAM1uMnngO', '', 'mKreiger@gmail.com', '959 Corwin Mountains\nNew Fannytown, WV 82299', 123456, 'perfil.png', 3, 'Clarabelle.Pouros', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(154, 'Alvina', 'Schimmel', '$2y$10$rSvd94dIoAk1RlUmu1yGF.Xhm/iRfUi29iolF8ZCm/9t3vYXvBFa.', '', 'tErnser@Rolfson.com', '894 Ara Route\nEast Joanborough, DE 57585', 123456, 'perfil.png', 3, 'Stanford.Crona', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(155, 'Retta', 'Mante', '$2y$10$YduIQ92xfubIWylTiQTSduGqrvwoViwtKlPmm4orOApeaxZ9Rm5Oa', '', 'Alberta43@Blick.com', '91868 Bruen Roads\nWest Deangelochester, MT 46951', 123456, 'perfil.png', 3, 'Lueilwitz.Jeffrey', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(156, 'Kari', 'Stoltenberg', '$2y$10$dSpOXL8E1q.5olgm3Jw0JuBqUNFTwNZ6zod5AXiJUA3tkBQdkkcf2', '', 'Aufderhar.Lempi@yahoo.com', '9557 Brown Divide Suite 363\nPort Vanessaland, CT 10027', 123456, 'perfil.png', 3, 'Nathanael.Farrell', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(157, 'Laverna', 'Glover', '$2y$10$DHaqa2NzLJA8jHish.T8Nu6hShHNS8ALz7MwDNeiOqBsX8PUv1k3.', '', 'Isaac.Robel@Price.com', '0818 Ledner Stream Suite 584\nAbernathychester, WV 67462', 123456, 'perfil.png', 3, 'Theo.Schumm', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(158, 'Edison', 'Dooley', '$2y$10$FAvXjYhn8qSZBWTyQwFI6.kM.IlPkSW4j/jv6Hni9R73y7/sJu66O', '', 'Howell73@Turner.net', '4007 Mills Underpass\nLake Tylerfurt, AK 39218', 123456, 'perfil.png', 3, 'Grace.McKenzie', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(159, 'Adolfo', 'Moen', '$2y$10$WpBSMUaWC7sXqNDE2d7Fpuz37nxjv8hHPm4Yat/Lf228AF1O1cvC2', '', 'tJacobs@gmail.com', '362 Konopelski Field\nWest Nigel, MT 76738', 123456, 'perfil.png', 3, 'Kristian94', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(160, 'Rosalind', 'Lakin', '$2y$10$j3NBm7akOv4CaQzKc30FsuX5N.RU8yP3PXy1IG2.zKWG6JOD5M0u2', '', 'kMorissette@yahoo.com', '059 Kemmer Gateway Suite 287\nLake Beatrice, IA 60255-3537', 123456, 'perfil.png', 3, 'Macey.Jones', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(161, 'Candido', 'Franecki', '$2y$10$.0TI6FGd9EKHqA7yLhLkAurQSHCjZDZj3FeYD5tGJ7WKwCKfJgzIi', '', 'mDietrich@gmail.com', '4280 Jerome Harbor Suite 002\nWymanville, MT 82441-5045', 123456, 'perfil.png', 3, 'Walter14', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(162, 'Erika', 'Bruen', '$2y$10$SDGk.3NWUAi5JsNRJljtHeqMZ4znEwRfaRttC2x1VXCGMrSrIKj2K', '', 'Graham.Jacques@hotmail.com', '031 Farrell Mountains\nEmmittmouth, DC 31426-6869', 123456, 'perfil.png', 3, 'Paucek.Genoveva', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(163, 'Elyssa', 'Mills', '$2y$10$3Oxq1s9sJ.RkUpVKxQocx.EQbKgE87iikI1RQYTfcqM6/pPYd.oTG', '', 'Abbott.Freda@Friesen.com', '4152 Josiane Islands\nLake Izaiahview, WY 42694-0026', 123456, 'perfil.png', 3, 'Fredy.Wolff', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(164, 'Trudie', 'Jast', '$2y$10$u.bffhb82FB0aB.ZjunFS.AKY0HOdLg2DNiuJ5AB0LdYFGt3rR4Kq', '', 'Ally.Hand@yahoo.com', '651 Cyrus Plains Apt. 175\nOthaville, MN 17085-6934', 123456, 'perfil.png', 3, 'Weimann.Rossie', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(165, 'River', 'Schmidt', '$2y$10$p9IUb.eYyYKacGnzr5t9OeoYzuOsmD5UZu9FdkbWtPrDLc.7aaWtG', '', 'aKemmer@gmail.com', '6565 Koch Skyway Suite 152\nStrosinview, KS 58313', 123456, 'perfil.png', 3, 'Isabell07', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(166, 'Heber', 'Okuneva', '$2y$10$ZTLDiYqdz658tBOL91x1D.0E6rqIEeGoFR9tyo3txVcviY2dGu9Mi', '', 'Yasmeen.Larson@yahoo.com', '159 Neil Motorway Suite 163\nKundeburgh, MA 97478', 123456, 'perfil.png', 3, 'Pollich.Braeden', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(167, 'Jade', 'Mann', '$2y$10$7FKrpzW12ftOlOWQS0vFduNJsUAqft9fLNREHTVbs5scYIEaOwG9S', '', 'Runte.Delilah@hotmail.com', '32953 Wehner Glen\nPort Vella, MN 39601', 123456, 'perfil.png', 3, 'tHeidenreich', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(168, 'Horace', 'Abbott', '$2y$10$ixqyoDKQK/QyilaoJod0quJm9/iOhGjzSW.EtCCxJIUER.gabSXbm', '', 'Rickie.Shields@Jakubowski.com', '2160 Darrion Plaza Apt. 930\nMaybellberg, FL 12639-7249', 123456, 'perfil.png', 3, 'zBatz', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(169, 'Adriana', 'Langosh', '$2y$10$jv73bzk6rlZ3DVpq9jqR0enJunl2BDVxLIqBWOWyphCcZNRuVgLx6', '', 'Juvenal.Kutch@Jacobs.com', '09386 Shanon Lane Apt. 426\nNew Hudson, SC 89926', 123456, 'perfil.png', 3, 'Riley70', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(170, 'Mauricio', 'Ortiz', '$2y$10$kHLL9bwzE9pCBDfnxuOOreq.5Nfivp//q0ZacnTHFscc2V68bLa0K', '', 'Quitzon.Henry@yahoo.com', '35514 Isobel Fords\nKreigerport, SD 56337', 123456, 'perfil.png', 3, 'Juliet43', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(171, 'Newell', 'Block', '$2y$10$Azb0o6LD1MGuggAbnAkNjOkg0qE59vMVOxTnATloWI7nNUvXkbpbi', '', 'oWolf@Gorczany.com', '5818 Predovic Ville\nSouth Abdul, VT 44651', 123456, 'perfil.png', 3, 'Barrows.Ahmed', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(172, 'Sammie', 'Douglas', '$2y$10$8FZUFtOUfP0POUKh5TqbCe9fGvbk7TOfh4QwzuV/TusMR8bf0VO1u', '', 'Elsa.Roberts@hotmail.com', '615 Meda Forges\nPort Emmittmouth, MS 14783', 123456, 'perfil.png', 3, 'oRohan', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(173, 'Janis', 'Kub', '$2y$10$t4U1OvBdmQnQPDQtJ68Oy.0P1gn9aTHm.MyNdndN1yACcHyn.9yC6', '', 'Batz.Jarrell@hotmail.com', '95030 Elva Land\nWest Orphachester, SD 62287-3341', 123456, 'perfil.png', 3, 'Marge.Hayes', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(174, 'Kameron', 'D''Amore', '$2y$10$l4L/I6rMCZyQxb0X0ThpPO1lc0QLw.2oVq9fwmpjHCxgQzU7R0MFC', '', 'eWaters@Hoeger.com', '53942 Hahn Landing Suite 426\nLake Nolanhaven, UT 49534-4433', 123456, 'perfil.png', 3, 'Brad15', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(175, 'Vallie', 'Hahn', '$2y$10$BDZdTvfMezeKLH7YM3y8QeRvKHI3aj4uH.4R5RzuhGuhEOtsKzSLS', '', 'Dangelo19@hotmail.com', '087 Erdman Tunnel\nEast Selmershire, FL 26446-9225', 123456, 'perfil.png', 3, 'Alejandra20', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(176, 'Boris', 'Mante', '$2y$10$KuZCeM.R41aYWNLbEFiIbOggcU8RHL2wmQjpWCkWMDHDB/aHPSgS2', '', 'Towne.Gust@hotmail.com', '5291 Archibald Valley\nBlickview, IA 89704', 123456, 'perfil.png', 3, 'Edmond.Streich', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(177, 'Josh', 'Roob', '$2y$10$E3RM1uUENVEuRwh2Bj7SqOL8PxcIP9bpUc7EWvlqh5qKM7p0z4umm', '', 'Marks.Ena@Cartwright.com', '201 Cronin Springs\nMayertport, NC 70928', 123456, 'perfil.png', 3, 'Fredrick50', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(178, 'Ludie', 'Grant', '$2y$10$JI5HSd5js2ZdJ3X6KaVhdOSWMLQIBwObv2176Stm2FKaODpG1Efvi', '', 'Mathias80@yahoo.com', '3599 Gleichner Fort\nDouglasmouth, IA 39661-2297', 123456, 'perfil.png', 3, 'uLittle', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(179, 'Vella', 'Grady', '$2y$10$sF7.VSatgiN6BaqHu5uhqeke9g9DeJk9f3kh8HCgi/1SXwsVSM6L6', '', 'Simone.Boyle@gmail.com', '9162 Kassulke Rapids Suite 732\nSteuberhaven, MT 08666', 123456, 'perfil.png', 3, 'rKirlin', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(180, 'Jillian', 'Auer', '$2y$10$szEP1S5aFKgf/pdm3dl1weut.V9yjyzWR6ukBPYYxmZChxlV9/5Ie', '', 'Andreane.Pollich@Langosh.org', '0846 Judah Via\nRafaelahaven, WY 86242-4826', 123456, 'perfil.png', 3, 'gProsacco', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(181, 'Loma', 'Walter', '$2y$10$eWyXdN6Y96UO/9oeHX/6XudA4FkKH3f1BlrupOa.YArlvO4hA9rcq', '', 'mWeissnat@Stoltenberg.com', '2144 Bauch Center Suite 277\nProsaccoshire, IA 41225', 123456, 'perfil.png', 3, 'Jaylin.Brakus', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(182, 'Nicklaus', 'Mraz', '$2y$10$Kw9M4JBcN/xETrzs5xJIj.3rhqzvcDgEft0Y5nbPJBNxseULXD4he', '', 'Cooper17@yahoo.com', '94277 Adrienne Terrace Suite 949\nMayetown, OH 17786', 123456, 'perfil.png', 3, 'Kelli21', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(183, 'Myra', 'Hodkiewicz', '$2y$10$7ElZgv0UFcPXNjdE6GU1seAsSGFGF/kQMuu1P5blzojHQZiK6J05m', '', 'Reina71@Buckridge.org', '5650 Gideon Isle Apt. 490\nHeidenreichmouth, NE 33686-1225', 123456, 'perfil.png', 3, 'McCullough.Alanis', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(184, 'Vena', 'Bauch', '$2y$10$pVFwVQAD.J7bSeOMRJzK4.xDhLRs.YnjTBpzqQ9kd3z/obZNVi4bq', '', 'Miguel.Botsford@yahoo.com', '89033 Abshire Walk\nPort Ashaville, AL 08590', 123456, 'perfil.png', 3, 'Jennings28', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(185, 'Sid', 'Purdy', '$2y$10$dPjVXx5HoAQKvoBiSk6ya.Et040GGVLBzz2Iz0k0xWtaV85TlLJ4O', '', 'Kenya.Hermiston@gmail.com', '35770 Gladyce Mount\nChelsiestad, WA 44608', 123456, 'perfil.png', 3, 'Silas40', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(186, 'Hobart', 'Kuhlman', '$2y$10$tFS5hlj/R0vGYuduPhglsucQCR/MNqzjJJyK4dWPZw1KtDOAM2X3i', '', 'aJakubowski@yahoo.com', '75707 Bauch Streets\nFranciscoside, ND 75244-7017', 123456, 'perfil.png', 3, 'Kshlerin.Laurence', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(187, 'Brittany', 'Barrows', '$2y$10$l99U3pwIPbEhANFenMXj.O/88qNrLJgxq/RDgmTg6wh1ydVuGlQr6', '', 'Marianne.Jaskolski@yahoo.com', '8037 Hegmann Street Apt. 451\nWindlermouth, WA 40388-3086', 123456, 'perfil.png', 3, 'fHyatt', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(188, 'Roscoe', 'Fadel', '$2y$10$YajqEd83MLtqTzg1L55lvuw5OMVBt2NAVEeZFv7L7IW.mlQ/xrqQu', '', 'Jakubowski.Murray@Larson.com', '337 Laila Square\nEast Clairstad, UT 77703', 123456, 'perfil.png', 3, 'Bechtelar.Josiah', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(189, 'Theodore', 'King', '$2y$10$E4HRu4MIDZyGKug.02WwU.qXL5T9w7mdYV1MuDH6Q.YaA546yWoVq', '', 'Schmitt.Theron@Beier.net', '007 Ottis Drive\nPort Santina, AK 67137-4225', 123456, 'perfil.png', 3, 'Vanessa63', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(190, 'Peggie', 'Schuster', '$2y$10$brvUrZkM6fo4NdhO1vU2y.QtKdrqRk5h.luQG20vV6k/40HVZLvN6', '', 'Runte.Beulah@Boyle.net', '7020 Runte Street Apt. 621\nLake Brianview, CO 54991', 123456, 'perfil.png', 3, 'Murray.Violette', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(191, 'Lina', 'Bashirian', '$2y$10$.sIARzhKs0TkTZ28m6ZIcurTzAPvpWpm2Zo.wkEmwVDw.4pEFTije', '', 'Bode.Rosetta@Balistreri.info', '9224 Dario Locks\nLonieborough, FL 43336-2175', 123456, 'perfil.png', 3, 'Rollin.Lynch', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(192, 'Alexzander', 'Emmerich', '$2y$10$jyJwMhpdKL8PLDbNtKD3t.fUjW7RvfCEsyaDc/7d.s7Ry/WpkXkbG', '', 'Ashlynn75@Mraz.com', '565 Hudson Square Suite 914\nShanonton, IA 49203', 123456, 'perfil.png', 3, 'Gleichner.Maye', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(193, 'Reuben', 'Morar', '$2y$10$2nforUqhW.Wi5B4aDeGdverSQxIRGWbRjyIdgcxoO6RiXyPCuEb7G', '', 'Mozelle24@Champlin.org', '95005 Bahringer Skyway\nTorpville, ND 37988', 123456, 'perfil.png', 3, 'Theresa.Satterfield', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(194, 'Russel', 'Koss', '$2y$10$oB0mIEZCF1fC9aiHcjCioeyUVVNpeXIdvGrtGlOFf5gubrdvk9oHC', '', 'Cydney.Trantow@hotmail.com', '28977 Ryan Shoals\nCindyfort, IN 71304-6592', 123456, 'perfil.png', 3, 'Malachi12', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(195, 'Molly', 'Haag', '$2y$10$jmeEr4Fy65wJB1LVO9hhyOHv2cy.jorUL6Qba8bGKdjqhBFgqsR1u', '', 'qJenkins@Ward.net', '66889 Alisha Mission Apt. 312\nHomenickland, CT 17648-1700', 123456, 'perfil.png', 3, 'Goyette.Dovie', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(196, 'Sheila', 'Strosin', '$2y$10$ukVpO.n/1oKSld89Pzzr2.NfWabXapQNQhESoLpa27iH8Q61vjPBC', '', 'Conor.Beahan@hotmail.com', '6983 Aliya Tunnel\nMannshire, OK 52899', 123456, 'perfil.png', 3, 'Rosina99', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(197, 'Haley', 'Hahn', '$2y$10$Hd0oNkuuB7LsDOs7tx/u9.HywnlUU55KFygzKyx7gLonklSz22Hse', '', 'lBeahan@yahoo.com', '7631 Samson Shoals\nEast Keyshawnville, SD 90784', 123456, 'perfil.png', 3, 'McKenzie.Gladyce', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(198, 'Desiree', 'Nikolaus', '$2y$10$Fws5Reo.C2vAhpcMTDy7xewd6LvxEd8v4wZyMYvlBjt5bQbtO4MJa', '', 'hFlatley@Windler.com', '408 Mante Forks\nWest Buddy, NJ 96656', 123456, 'perfil.png', 3, 'tKilback', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(199, 'Roberta', 'Raynor', '$2y$10$8og.SELOuiMF9UeoWYEeMeK4PKjy9MUEP3RpYFAmu1e/goO6WillK', '', 'eBecker@gmail.com', '3882 McKenzie Ranch\nZachariahville, NH 76818-9184', 123456, 'perfil.png', 3, 'Upton.Demario', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(200, 'Boyd', 'Baumbach', '$2y$10$b7ATbF7c3IR2sHfEaERXheKKS3O49Iqwpv5wXVtsAU.SjJCaqha5W', '', 'rTromp@hotmail.com', '074 Houston Throughway\nPort Mabel, MS 00046-4739', 123456, 'perfil.png', 3, 'mReilly', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(201, 'Delores', 'Bradtke', '$2y$10$iy1ZJMieEU4wlP96urrVkOMKAle1VH7prHgfuOAtkGwRLJpKnWlYe', '', 'Jaylon36@yahoo.com', '65320 Moen Forge Apt. 793\nEast Sheridan, IA 39129-6109', 123456, 'perfil.png', 3, 'Retha.Hagenes', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(202, 'Dianna', 'Dietrich', '$2y$10$Ar0FN7Q/jZzteuu3lfyyWevZCESZ3Z.pZn8jH9fauHPk3mdNcg.da', '', 'xGaylord@gmail.com', '1360 Lawson Cliffs Suite 766\nMariostad, UT 70642-5752', 123456, 'perfil.png', 3, 'Hettinger.Keon', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(203, 'Keaton', 'Feest', '$2y$10$uZMtum8bPFgTQkhwfLQcSO4obqxMP2tp22tcuoozlOD7XLk45knUK', '', 'oBalistreri@Hamill.com', '51961 Margarete Orchard Suite 795\nWest Martinaburgh, NY 24576', 123456, 'perfil.png', 3, 'Abby64', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(204, 'Frida', 'Reilly', '$2y$10$O7ZhGgg3s/IL6J3H192RLOFdUe3yNZw7Z8F8gI7lp./8b7pHg3rF2', '', 'Nakia93@hotmail.com', '64963 Ronaldo Fort\nWest Deja, AR 09314-7357', 123456, 'perfil.png', 3, 'Tillman.Greg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(205, 'Rylee', 'Legros', '$2y$10$eO7pTPEA.k0MoVgjRPTSeOtRBEbtuFyQBMJx73K/w4uPMY/IgF2fm', '', 'Theodore51@Armstrong.com', '2064 Powlowski Lodge\nNorth Destiny, AK 92847-0545', 123456, 'perfil.png', 3, 'Gottlieb.Kylee', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(206, 'Tamia', 'Hayes', '$2y$10$4mQiY7oh7nfdCknT3avG2u9BUouILMZ6Ncft6VebKyiAcvg5guklK', '', 'Bertrand.Cummerata@hotmail.com', '369 Hoeger Meadow\nAuerville, TN 79871', 123456, 'perfil.png', 3, 'John.Leannon', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(207, 'Felicia', 'Goodwin', '$2y$10$WTRfPylhX6kwsivAhfnYLumwHuaR8hWrRjH8iwH/tlaA3l1655uHu', '', 'Wilkinson.Will@Sanford.com', '762 Rusty Ranch Suite 853\nSouth Damaris, MA 68214', 123456, 'perfil.png', 3, 'Murazik.Antonietta', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(208, 'Dahlia', 'Johnson', '$2y$10$eB2SnSOppIquJxLic7K9re8PHeLqWIMWuZwvuHIyysCL/.FzCTuVy', '', 'Keebler.Candace@hotmail.com', '424 Francis Glens Suite 578\nNew Joelle, AR 00106', 123456, 'perfil.png', 3, 'Glover.Priscilla', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(209, 'Rebeca', 'Anderson', '$2y$10$yJTT9z7UKKH6Aj39b26ES.nbNXrJasY2U13jbR3C9Z.onST.BXT/S', '', 'Hope61@Murray.com', '462 Zulauf Trail\nNew Angelitaberg, MT 96262-8256', 123456, 'perfil.png', 3, 'Tanner.Green', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(210, 'Eliza', 'Considine', '$2y$10$ZNSC.C1Oji4jqW/JGOrSmeyilOkl0ccetPJn5AtUVSrHO2VfupXXK', '', 'Marielle67@Parisian.info', '4929 Neva Forges\nMitchellton, KS 33752', 123456, 'perfil.png', 3, 'Heidenreich.Rey', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(211, 'Salvador', 'Davis', '$2y$10$kDLz.9Jd9dP.F.dUO.RuS.MakhEUwtDT9sDlFGA8bZ1YCKrID539W', '', 'Enola.Reilly@Vandervort.com', '8593 Quitzon Heights Suite 417\nNorth Nannietown, FL 90327', 123456, 'perfil.png', 3, 'Price69', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(212, 'Garrett', 'Botsford', '$2y$10$16OgHwTLEJ.5rtcaVH5nVe00Wqyc5Nj6rD0OxuGOL5JMSnbscw9kS', '', 'Vivianne31@yahoo.com', '842 Walter Tunnel\nO''Reillyview, NE 85910-2502', 123456, 'perfil.png', 3, 'Weber.Else', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(213, 'Pedro', 'Anderson', '$2y$10$OYLAZnj0sgSptDT2Kw5b2u8QlxY31f7zR9.lR4o.vn4b9yBM6uZVK', '', 'Dortha30@Corkery.com', '490 Cremin MeadowsSouth Jewel, NV 13642-9602', 123456, 'perfil.png', 3, 'Mae.Quigley', '', '0000-00-00 00:00:00', '2015-05-21 04:48:45', 112),
(214, 'Derick', 'Hickle', '$2y$10$7aeBAkAiF6AaArSWWrdVSOfnm5pzCktx7QV74EAOBt/5lwfl8Ohr2', '', 'rVolkman@gmail.com', '30455 Kaitlin Alley\nAdrainmouth, TN 81592', 123456, 'perfil.png', 3, 'Friedrich27', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `businessProducts`
--
ALTER TABLE `businessProducts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissionRoles`
--
ALTER TABLE `permissionRoles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissionUsers`
--
ALTER TABLE `permissionUsers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stateProducts`
--
ALTER TABLE `stateProducts`
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
-- AUTO_INCREMENT de la tabla `business`
--
ALTER TABLE `business`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `businessProducts`
--
ALTER TABLE `businessProducts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `permissionRoles`
--
ALTER TABLE `permissionRoles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `permissionUsers`
--
ALTER TABLE `permissionUsers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `stateProducts`
--
ALTER TABLE `stateProducts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=215;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
