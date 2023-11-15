-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 05:14:32
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcarritocompras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
    `idcompra` bigint(20) NOT NULL,
    `cofecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `idusuario` bigint(20) NOT NULL,
    `metodo` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraestado`
--

CREATE TABLE `compraestado` (
    `idcompraestado` bigint(20) UNSIGNED NOT NULL,
    `idcompra` bigint(11) NOT NULL,
    `idcompraestadotipo` int(11) NOT NULL,
    `cefechaini` timestamp NOT NULL DEFAULT current_timestamp(),
    `cefechafin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraestadotipo`
--

CREATE TABLE `compraestadotipo` (
    `idcompraestadotipo` int(11) NOT NULL,
    `cetdescripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `cetdetalle` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compraestadotipo`
--

INSERT INTO `compraestadotipo` (`idcompraestadotipo`, `cetdescripcion`, `cetdetalle`) VALUES
(1, 'iniciada', 'cuando el usuario : cliente inicia la compra de uno o mas productos del carrito'),
(2, 'aceptada', 'cuando el usuario administrador da ingreso a uno de las compras en estado = 1 '),
(3, 'enviada', 'cuando el usuario administrador envia a uno de las compras en estado =2 '),
(4, 'cancelada', 'un usuario administrador podra cancelar una compra en cualquier estado y un usuario cliente solo en estado=1 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraitem`
--

CREATE TABLE `compraitem` (
    `idcompraitem` bigint(20) UNSIGNED NOT NULL,
    `idproducto` bigint(20) NOT NULL,
    `idcompra` bigint(20) NOT NULL,
    `cicantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
    `idmenu` bigint(20) NOT NULL,
    `menombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del item del menu',
    `medescripcion` varchar(124) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Descripcion mas detallada del item del menu',
    `idpadre` bigint(20) DEFAULT NULL COMMENT 'Referencia al id del menu que es subitem',
    `medeshabilitado` timestamp NULL DEFAULT current_timestamp() COMMENT 'Fecha en la que el menu fue deshabilitado por ultima vez'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `menombre`, `medescripcion`, `idpadre`, `medeshabilitado`) VALUES
(1, 'Opciones de Administrador', 'desc', NULL, NULL),
(2, 'Opciones de Deposito', 'desc', NULL, NULL),
(3, 'Opciones de Cliente', 'desc', NULL, NULL),
(4, 'Gestion de Usuarios', 'gestionUsuarios', 1, NULL),
(5, 'Gestion de Menues', 'gestionMenues', 1, NULL),
(6, 'Gestion de Compras', 'gestionCompras', 1, NULL),
(7, 'Gestion de Productos', 'gestionProductos', 2, NULL),
(8, 'Gestion de Compras', 'gestionComprasDeposito', 2, NULL),
(9, 'Actualizar Informacion', 'actualizarLogin', 3, NULL),
(10, 'Realizar compra', 'tienda', 3, NULL),
(11, 'Ver Carrito', 'carrito', 3, NULL),
(12, 'Ver Estado de Compras', 'seguimiento', 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menurol`
--

CREATE TABLE `menurol` (
    `idmenu` bigint(20) NOT NULL,
    `idrol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `menurol`
--

INSERT INTO `menurol` (`idmenu`, `idrol`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(5, 1),
(6, 1),
(7, 2),
(8, 2),
(9, 3),
(10, 3),
(11, 3),
(12, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
    `idproducto` bigint(20) NOT NULL,
    `pronombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
    `prodetalle` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
    `proprecio` int(11) NOT NULL,
    `prodeshabilitado` timestamp NULL DEFAULT current_timestamp(),
    `procantstock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `pronombre`, `prodetalle`, `proprecio`, `prodeshabilitado`, `procantstock`) VALUES
(1, 'Sillón Frida', 'Super cómodos, elegantes y funcionales.', 15000, NULL, 62),
(2, 'Sofa Sofia', 'Sofá SOFÍA, de lineas modernas, patas cromadas, con apoya cabeza reclinable en 6 posiciones', 20000, NULL, 13),
(3, 'Sofa Jeff', 'Apoyacabezas reclinable en 6 posiciones. Estructura y patas en hierro negro.', 25000, NULL, 28),
(4, 'Sofa Sharon', 'Realizado en madera maciza secada en horno de 2 pulgadas cepillada en sus 4 caras.', 30000, NULL, 6), 
(5, 'Sofa Bock', 'Sofá BOCK con apoya cabeza reclinable en 6 posiciones, estructura y patas en hierro negro.', 35000, NULL, 81),
(6, 'Sofa Jackson', 'Realizado en madera maciza secada en horno de 2 pulgadas cepillada en sus 4 caras.', 40000, NULL, 95),
(7, 'Sofa Mellow', 'Los almohadones tienen cierre y doble funda para facilitar su limpieza.', 45000, NULL, 3),
(8, 'Esquinero Warren', 'Los almohadones tienen cierre y doble funda para facilitar su limpieza.', 50000, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
    `idrol` bigint(20) NOT NULL,
    `rodescripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rodescripcion`) VALUES
(1, 'Administrador'),
(2, 'Depósito'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
    `idusuario` bigint(20) NOT NULL,
    `usnombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `uspass` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
    `usmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `usdeshabilitado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usnombre`, `uspass`, `usmail`, `usdeshabilitado`) VALUES
(1, 'usuario1', '144cce165e9b405a014d015e9059a7fd', 'us1@gmail.com', NULL),
(2, 'usuario2', 'dddc3c797b55e57459abadac14706030', 'us2@gmail.com', NULL),
(3, 'usuario3', '4f92b80c0fca1a495ad8ff524c630a8d', 'us3@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorol`
--

CREATE TABLE `usuariorol` (
    `idusuario` bigint(20) NOT NULL,
    `idrol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuariorol`
--

INSERT INTO `usuariorol` (`idusuario`, `idrol`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(3, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
    ADD PRIMARY KEY (`idcompra`),
    ADD UNIQUE KEY `idcompra` (`idcompra`),
    ADD KEY `fkcompra_1` (`idusuario`);

--
-- Indices de la tabla `compraestado`
--
ALTER TABLE `compraestado`
    ADD PRIMARY KEY (`idcompraestado`),
    ADD UNIQUE KEY `idcompraestado` (`idcompraestado`),
    ADD KEY `fkcompraestado_1` (`idcompra`),
    ADD KEY `fkcompraestado_2` (`idcompraestadotipo`);

--
-- Indices de la tabla `compraestadotipo`
--
ALTER TABLE `compraestadotipo`
    ADD PRIMARY KEY (`idcompraestadotipo`);

--
-- Indices de la tabla `compraitem`
--
ALTER TABLE `compraitem`
    ADD PRIMARY KEY (`idcompraitem`),
    ADD UNIQUE KEY `idcompraitem` (`idcompraitem`),
    ADD KEY `fkcompraitem_1` (`idcompra`),
    ADD KEY `fkcompraitem_2` (`idproducto`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
    ADD PRIMARY KEY (`idmenu`),
    ADD UNIQUE KEY `idmenu` (`idmenu`),
    ADD KEY `fkmenu_1` (`idpadre`);

--
-- Indices de la tabla `menurol`
--
ALTER TABLE `menurol`
    ADD PRIMARY KEY (`idmenu`,`idrol`),
    ADD KEY `fkmenurol_2` (`idrol`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
    ADD PRIMARY KEY (`idproducto`),
    ADD UNIQUE KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
    ADD PRIMARY KEY (`idrol`),
    ADD UNIQUE KEY `idrol` (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
    ADD PRIMARY KEY (`idusuario`),
    ADD UNIQUE KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
    ADD PRIMARY KEY (`idusuario`,`idrol`),
    ADD KEY `idusuario` (`idusuario`),
    ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
    MODIFY `idcompra` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compraestado`
--
ALTER TABLE `compraestado`
    MODIFY `idcompraestado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compraitem`
--
ALTER TABLE `compraitem`
    MODIFY `idcompraitem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
    MODIFY `idmenu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
    MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
    MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
    MODIFY `idusuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
    ADD CONSTRAINT `fkcompra_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compraestado`
--
ALTER TABLE `compraestado`
    ADD CONSTRAINT `fkcompraestado_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON UPDATE CASCADE,
    ADD CONSTRAINT `fkcompraestado_2` FOREIGN KEY (`idcompraestadotipo`) REFERENCES `compraestadotipo` (`idcompraestadotipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compraitem`
--
ALTER TABLE `compraitem`
    ADD CONSTRAINT `fkcompraitem_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON UPDATE CASCADE,
    ADD CONSTRAINT `fkcompraitem_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
    ADD CONSTRAINT `fkmenu_1` FOREIGN KEY (`idpadre`) REFERENCES `menu` (`idmenu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `menurol`
--
ALTER TABLE `menurol`
    ADD CONSTRAINT `fkmenurol_1` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`) ON UPDATE CASCADE,
    ADD CONSTRAINT `fkmenurol_2` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
    ADD CONSTRAINT `fkmovimiento_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE,
    ADD CONSTRAINT `usuariorol_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;