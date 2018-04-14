/* NUEVA VERSION SAI */

CREATE DATABASE `sai` COLLATE utf8_spanish_ci;

CREATE TABLE `sai`. `usuarios` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
 `password` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
 `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
 `correo` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
 `perfil` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
 `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
 `estado` int(11) NOT NULL,
 `ultimo_login` datetime NOT NULL,
 `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci


INSERT INTO usuarios (id, usuario, password, nombre, correo, perfil, foto, estado, ultimo_login, fecha)
VALUES (
  NULL ,
  'admin' ,
  '$2a$07$N1c0las19s0n1aMAr71nau21DL1kcJ8upM.N05vvL.clkPU5iZwC6' ,
  'Ruben Darío Ortiz' ,
  'rubenortizg@gmail.com' ,
  'Administrador',
  '' ,
  '1' ,
  '2018-02-23 18:06:30' ,
  NULL
  );

CREATE TABLE `sai`.`categorias` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `categoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
 `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 UNIQUE KEY `categoria` (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci


CREATE TABLE `sai`.`inmuebles` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `id_categoria` int(11) NOT NULL,
 `id_propietario` int(11) NOT NULL,
 `id_usuario` int(11) NOT NULL,
 `imagen` text COLLATE utf8_spanish_ci NOT NULL,
 `codigo` text COLLATE utf8_spanish_ci NOT NULL,
 `matricula` text COLLATE utf8_spanish_ci NOT NULL,
 `direccion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
 `ciudad` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
 `estado` int(11) NOT NULL,
 `valor_comercial` float DEFAULT NULL,
 `canon_arrendamiento` float NOT NULL,
 `comision` float NOT NULL,
 `descripcion` text COLLATE utf8_spanish_ci,
 `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci



CREATE TABLE `sai`.`clientes` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `identificacion` int(11) NOT NULL,
 `tipoid` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
 `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
 `direccion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
 `correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
 `telfijo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
 `celular` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
 `ciudad` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
 `banco` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
 `tcuenta` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
 `ncuenta` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
 `idusuario` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `identificacion` (`identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci


/* VERSION ANTERIOR AI */


CREATE TABLE `sai`.`clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `identificacion` INT(11) NOT NULL ,
  `tipoid` VARCHAR(100) NOT NULL ,
  `pnombre` VARCHAR(100) NOT NULL ,
  `snombre` VARCHAR(100) NULL ,
  `papellido` VARCHAR(100) NOT NULL ,
  `sapellido` VARCHAR(100) NULL ,
  `direccion` VARCHAR(100) NULL ,
  `correo` VARCHAR(100) NULL ,
  `telfijo` VARCHAR(100) NULL ,
  `celular` VARCHAR(100) NULL ,
  `ciudad` VARCHAR(100) NULL ,
  `tipo` VARCHAR(100) NULL ,
  `banco` VARCHAR(100) NULL ,
  `tcuenta` VARCHAR(100) NULL ,
  `ncuenta` VARCHAR(100) NULL ,
  `notas` TEXT NULL ,
  `idusuario` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`identificacion`)) ENGINE = InnoDB;


CREATE TABLE `ai`.`inmuebles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_categoria` INT(11) NOT NULL ,
  `id_propietario` INT(11) NOT NULL ,
  `id_usuario` INT(11) NOT NULL ,
  `imagen` TEXT NOT NULL ,
  `matricula` VARCHAR(100) NOT NULL ,
  `tipo` VARCHAR(100) NOT NULL ,
  `direccion` VARCHAR(200) NULL ,
  `ciudad` VARCHAR(100) NULL ,
  `valor` INT(11) NULL ,
  `descripcion` TEXT NULL ,

  PRIMARY KEY (`id`),
  UNIQUE (`matricula`)) ENGINE = InnoDB;

CREATE TABLE `ai`.`recibos` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `nrecibo` INT(11) NOT NULL ,
    `valorpago` INT(11) NOT NULL ,
    `ciudad` VARCHAR(100) NULL ,
    `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `idarrendatario` INT(11) NOT NULL ,
    `idinmueble` INT(11) NOT NULL ,
    `iperiodo` DATE NOT NULL ,
    `fperiodo` DATE NOT NULL ,
    `idusuario` INT(11) NOT NULL ,
    `concepto` VARCHAR(200) NULL ,
    PRIMARY KEY (`id`),
    UNIQUE (`nrecibo`)) ENGINE = InnoDB;

  CREATE TABLE `ai`.`egresos` (
      `id` INT(11) NOT NULL AUTO_INCREMENT ,
      `negreso` INT(11) NOT NULL ,
      `valorpago` INT(11) NOT NULL ,
      `ciudad` VARCHAR(100) NULL ,
      `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
      `idarrendatario` INT(11) NOT NULL ,
      `idinmueble` INT(11) NOT NULL ,
      `iperiodo` DATE NOT NULL ,
      `fperiodo` DATE NOT NULL ,
      `idusuario` INT(11) NOT NULL ,
      `concepto` VARCHAR(200) NULL ,
      PRIMARY KEY (`id`),
      UNIQUE (`negreso`)) ENGINE = InnoDB;

CREATE TABLE `ai`.`ingresos` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `ningreso` INT(11) NOT NULL ,
    `valorpago` INT(11) NOT NULL ,
    `ciudad` VARCHAR(100) NULL ,
    `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `idarrendatario` INT(11) NOT NULL ,
    `idinmueble` INT(11) NOT NULL ,
    `iperiodo` DATE NOT NULL ,
    `fperiodo` DATE NOT NULL ,
    `idusuario` INT(11) NOT NULL ,
    `concepto` VARCHAR(200) NULL ,
    PRIMARY KEY (`id`),
    UNIQUE (`ningreso`)) ENGINE = InnoDB;

CREATE TABLE `ai`.`contratos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `ncontrato` INT(10) NOT NULL ,
  `finicio` DATE NOT NULL ,
  `ffin` DATE NOT NULL ,
  `duracion` VARCHAR(100) NOT NULL ,
  `idarrendatario` INT(10) NOT NULL ,
  `idarrendador` INT(10) NOT NULL ,
  `canon` VARCHAR(100) NOT NULL ,
  `idinmueble` INT(20) NOT NULL ,
  `periodicidad` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`)) ENGINE = InnoDB;


CREATE TABLE `ai`.`econceptos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `negreso` INT(10) NOT NULL ,
  `valorconcepto` VARCHAR(100) NOT NULL ,
  `codigo` INT(20) NOT NULL ,
  `tipo` INT(20) NOT NULL ,
  `concepto` VARCHAR(300) NULL ,
  `observaciones` TEXT NULL ,
  PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `ai`.`iconceptos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `ningreso` INT(10) NOT NULL ,
  `valorconcepto` VARCHAR(100) NOT NULL ,
  `codigo` INT(20) NOT NULL ,
  `tipo` INT(20) NOT NULL ,
  `concepto` VARCHAR(300) NULL ,
  `observaciones` TEXT NULL ,
  PRIMARY KEY (`id`)) ENGINE = InnoDB;
