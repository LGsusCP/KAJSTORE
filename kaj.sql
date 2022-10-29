-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2022 a las 01:21:17
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kaj`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(2, 'Emir', 'emir@mail.com', '$2y$10$6fxcQij0b0yXxvPyF6w.pet29yJEdVccw/a3DD9JZaMefjKZNKREy', 'avatar-male.png', '7894561230', 'mexico', 'estudiante', 'Trabajador'),
(3, 'Beltran', 'beltran', '$2y$10$ORFGgRGtPCQUdM9AV38ujOpZkJ0oknrMK2kRCkTof8VzQmyGpxgxC', 'avatar-male2.png', '7894561230', 'ixmiyork', 'soporte', 'CHIDO'),
(0, 'jesus', 'jesus@mail.com', '$2y$10$Zq9DBmxy83z1PRItCTXN/eMv7K.uUjsDFe23PK6Vnk7bdQUjApvqK', 'unnamed.jpg', '7714152091', 'pachuca', 'vendedor', ' Trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`cart_id`, `p_id`, `ip_add`, `qty`, `p_price`) VALUES
(0, 3, '192.168.100.95', 1, 343434),
(0, 3, '192.168.100.127', 1, 343434),
(0, 5, '164.56.42.108', 1, 999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `asunto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `mensaje` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `correo`, `asunto`, `mensaje`) VALUES
(1, 'gergreg', 'grgergerg', '[value-4]', '[value-5]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `client_email` varchar(60) NOT NULL,
  `client_first_name` text NOT NULL,
  `client_last_name` text NOT NULL,
  `client_address_1` text NOT NULL,
  `client_state` text NOT NULL,
  `client_city` text NOT NULL,
  `client_postcode` text NOT NULL,
  `order_total` decimal(10,1) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`order_id`, `client_email`, `client_first_name`, `client_last_name`, `client_address_1`, `client_state`, `client_city`, `client_postcode`, `order_total`, `order_status`, `order_date`) VALUES
(19, '013jesus@mail.com', 'JJJJJJJJJ', 'JJJJJJJJJJJ', 'JJJJJJJJJJJJJJJJ', 'JJJJJJJJJJJJJ', 'JJJJJJJJJJJJ', '7879', '343434.0', 'procesando', '2022-10-26 12:58:34'),
(20, 'paco@mail.com', 'fffff', 'ffffffffffff', 'ggggggggggg', 'ggggggg', 'ggggggg', '66666', '1000.0', 'pendiente', '2022-10-26 21:49:23'),
(21, 'iiiii@mail.com', 'iiiiii', 'iiiiiiiiiii', 'iiiiiiiiiiii', 'iiiiiiiiiii', 'iiiiiiiiiiiiiii', '666', '999.0', 'pendiente', '2022-10-27 10:33:01'),
(22, '013jesus@mail.com', 'DDDD', 'DDDDDDDDDDD', 'RERRERERER', 'ERERERERERER', 'RERERER', '34343', '2399.0', 'pendiente', '2022-10-29 15:37:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_items`
--

CREATE TABLE `orders_items` (
  `item_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `price` decimal(10,1) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orders_items`
--

INSERT INTO `orders_items` (`item_id`, `order_id`, `product_id`, `price`, `qty`) VALUES
(1, 15, 3, '343434.0', 1),
(2, 15, 2, '1000.0', 1),
(3, 16, 3, '343434.0', 1),
(4, 16, 2, '1000.0', 1),
(5, 17, 2, '1000.0', 1),
(6, 18, 3, '343434.0', 1),
(7, 19, 3, '343434.0', 1),
(8, 20, 2, '1000.0', 1),
(9, 21, 5, '999.0', 1),
(10, 22, 5, '999.0', 1),
(11, 22, 4, '800.0', 1),
(12, 22, 6, '600.0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `product_stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `status`, `product_stock`) VALUES
(4, '0000-00-00 00:00:00', 'Camisa Hombre, Azul (Lavender Lustre 556)', 'Tommy-Hilfiger-Original-Stretch-Camisa-Hombre-Azul', 'camisa1.jpg', 'camisa2.jpg', 'camisa3.jpg', 800, '\r\n\r\n\r\n\r\n\r\nDimensiones del producto ? : ? 4.4 x 37.6 x 20.4 cm; 200 g<br>Producto en Amazon.com.mx desde ? : ? 23 febrero 2020<br>ASIN ? : ? B077741R2Z<br>Número de modelo del producto ? : ? DM0DM04405<br>País de origen ? : ? China<br>Departamento ? : ? Hombre\r\n\r\n\r\n', 'product', 55),
(5, '0000-00-00 00:00:00', 'Pantalon Frontal Liso con Cintura Extensible Oculta para Hombre', 'Pantalon-Frontal-Liso-con-Cintura-Extensible-Oculta-para-Hombre', '51Sx3lpKvEL._AC_SX679_.jpg', '61A15y9p65L._AC_SX679_.jpg', '61CqdHCKkFL._AC_SX679_.jpg', 999, '\r\n\r\n\r\n\r\nDimensiones del producto ? : ? 12.7 x 12.7 x 1.78 cm; 294.84 g<br>Número de modelo del producto ? : ? 41114529498<br>Departamento ? : ? Para hombre\r\n\r\n', 'product', 55),
(6, '2022-10-27 15:17:02', 'Womens Basic Versatile Strechy Flare Skater Skirt S White', 'Womensd-Basicd-Versatiled-Strechyd-Flared-Skaterd-Skirtd-Sd-White', '61jceFoXVcL._AC_SY741_.jpg', '61OwT6w6EFL._AC_SX679_.jpg', '61vLAj7TUDL._AC_SX569_.jpg', 600, '\r\n\r\nDimensiones del producto ? : ? 12.7 x 12.7 x 1.78 cm<br>Número de modelo del producto ? : ? MBJWB154_MBJWB669-WHITE-S<br>Departamento ? : ? Mujer', 'product', 80),
(7, '0000-00-00 00:00:00', 'Camisa clasica de Manga Larga para Mujer con Botones (Talla estandar y Grande)', 'Camisa-clasica-de-Manga-Larga-para-Mujer-con-Botones-Talla-estandar-y-Grande', '81Gl0iwffRL._AC_SX569_.jpg', '81hkz2+JlHL._AC_SX569_.jpg', '81zXYdvbIxL._AC_SX569_.jpg', 650, '\r\n\r\n\r\n\r\nDimensiones del paquete ? : ? 26.16 x 16.51 x 6.1 cm; 204 g<br>Número de modelo del producto ? : ? J9RM0542<br>Departamento ? : ? Mujer\r\n\r\n\r\n\r\n', 'product', 99);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indices de la tabla `orders_items`
--
ALTER TABLE `orders_items`
  ADD UNIQUE KEY `item_id_2` (`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
