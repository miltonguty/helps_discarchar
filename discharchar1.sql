
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`) VALUES
(1, 'Queso gouda', 'El gouda o gauda es un queso neerlandés denominado así por la ciudad de Gouda.', '20.00', 10, 'https://es.wikipedia.org/wiki/Queso_gouda#/media/Archivo:Gouda.jpg');



CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `tipo_usuario` enum('admin','empleado') DEFAULT 'empleado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
