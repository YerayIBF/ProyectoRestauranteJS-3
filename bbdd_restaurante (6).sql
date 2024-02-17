-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2024 a las 00:31:48
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
-- Base de datos: `bbdd_restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID_Categoria` int(100) NOT NULL,
  `NombreCategoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_Categoria`, `NombreCategoria`) VALUES
(1, 'Pasta Y Pizza'),
(2, 'Carnes'),
(3, 'Pescado y Marisco\r\n'),
(4, 'Platos con verdura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_Pedido` int(40) NOT NULL,
  `Precio_Total` int(100) NOT NULL,
  `Usuario` int(100) NOT NULL,
  `Propina` int(255) NOT NULL,
  `PrecioStandard` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID_Pedido`, `Precio_Total`, `Usuario`, `Propina`, `PrecioStandard`) VALUES
(1, 20, 4, 14, 6),
(2, 20, 3, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_Producto` int(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Precio` int(100) NOT NULL,
  `Img` text NOT NULL,
  `Categoria` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_Producto`, `Nombre`, `Precio`, `Img`, `Categoria`) VALUES
(1, 'Spaghetti a la Boloñesa', 7, 'Spaghetti.png', 1),
(2, 'Papilla de Verdura', 4, 'PapillaVerdura.png', 4),
(3, 'Arroz con Verduras', 6, 'ArrozConVerduras.png', 4),
(4, 'Patatas con Nuggets', 6, 'PatatasConNuggets.png', 2),
(5, 'Bacalao con Boletus', 12, 'Bacalao.png', 3),
(6, 'Berenjena rellena de carne', 6, 'Berenjena.png', 2),
(7, 'Pizza Prosciutto', 10, 'Pizza.png', 1),
(8, 'Crema de Calabaza', 4, 'CremaCalabaza.png', 4),
(9, 'Entrecot con guarnicion', 15, 'Entrecot.png', 2),
(10, 'Sopa de verdura y pollo', 5, 'SopaVerduraPollo.png', 4),
(11, 'Canelones de Carne', 7, 'Canelones.png', 1),
(12, 'Marisco a las dos Salsas', 25, 'MariscoALasDosSalsas.png', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `ID_Reseña` int(100) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Comentario` varchar(255) NOT NULL,
  `Valoracion` int(5) NOT NULL,
  `Usuario` int(255) NOT NULL,
  `Pedido` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contraseña` text NOT NULL,
  `Rol` varchar(100) NOT NULL,
  `Puntos` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Correo`, `Contraseña`, `Rol`, `Puntos`) VALUES
(3, 'Admin', 'Admin@gmail.com', '$2y$10$hVhecLnW4//UnHE4AgunJuaY0PiNShhX9a.q79IV1CN6HpWlaCTDe', 'Administrador', 0),
(4, 'Cliente1', 'Cliente1@gmail.com', '$2y$10$fAmhbPLI0DXPUcXMw2Str.7ZsOQRdIhrmCSeopUpI7p3pgfYZOlPC', 'Cliente', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_Pedido`),
  ADD KEY `FK_ID_UsuarioPedido` (`Usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Producto`),
  ADD KEY `FK_ID_CategoriaProducto` (`Categoria`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`ID_Reseña`),
  ADD KEY `FK_ID_Usuario` (`Usuario`),
  ADD KEY `FK_ID_PedidoReseña` (`Pedido`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_Pedido` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `ID_Reseña` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_ID_UsuarioPedido` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`ID_Usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_ID_CategoriaProducto` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`ID_Categoria`),
  ADD CONSTRAINT `FK_Producto_Categoria` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`ID_Categoria`);

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `FK_ID_PedidoReseña` FOREIGN KEY (`Pedido`) REFERENCES `pedidos` (`ID_Pedido`),
  ADD CONSTRAINT `FK_ID_Usuario` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`ID_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
