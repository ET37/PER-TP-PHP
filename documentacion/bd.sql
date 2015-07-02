SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE `albums` (
`id_album` int(11) NOT NULL,
  `id_artista` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `articulos` (
`id_articulo` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `artistas` (
`id_artista` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `generos` (
`id_genero` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `proveedores` (
`id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cuit` bigint(20) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `cod_postal` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tarjetas_credito` (
`id_tarjeta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_tarjeta` int(1) NOT NULL,
  `codigo_tarjeta` bigint(20) NOT NULL,
  `clave_tarjeta` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usuarios` (
`id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `num_doc` int(8) NOT NULL,
  `tipo_usuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `albums`
 ADD PRIMARY KEY (`id_album`);

ALTER TABLE `articulos`
 ADD PRIMARY KEY (`id_articulo`);

ALTER TABLE `artistas`
 ADD PRIMARY KEY (`id_artista`);

ALTER TABLE `generos`
 ADD PRIMARY KEY (`id_genero`);

ALTER TABLE `proveedores`
 ADD PRIMARY KEY (`id_proveedor`);

ALTER TABLE `tarjetas_credito`
 ADD PRIMARY KEY (`id_tarjeta`);

ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);


ALTER TABLE `albums`
MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `articulos`
MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `artistas`
MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `generos`
MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `proveedores`
MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tarjetas_credito`
MODIFY `id_tarjeta` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
