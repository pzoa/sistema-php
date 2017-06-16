/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 100116
Source Host           : localhost:3306
Source Database       : bd_sportingcristal

Target Server Type    : MYSQL
Target Server Version : 100116
File Encoding         : 65001

Date: 2017-06-09 23:58:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for arbitros
-- ----------------------------
DROP TABLE IF EXISTS `arbitros`;
CREATE TABLE `arbitros` (
  `idarbitro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idarbitro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of arbitros
-- ----------------------------

-- ----------------------------
-- Table structure for arbitrosxpartido
-- ----------------------------
DROP TABLE IF EXISTS `arbitrosxpartido`;
CREATE TABLE `arbitrosxpartido` (
  `arbitros_idarbitro` int(11) NOT NULL,
  `partido_idpartido` int(11) NOT NULL,
  PRIMARY KEY (`arbitros_idarbitro`,`partido_idpartido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of arbitrosxpartido
-- ----------------------------

-- ----------------------------
-- Table structure for equipo
-- ----------------------------
DROP TABLE IF EXISTS `equipo`;
CREATE TABLE `equipo` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `anio_fundacion` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idequipo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of equipo
-- ----------------------------
INSERT INTO `equipo` VALUES ('1', 'Sporting Cristal', 'Lima', '1955', '1');
INSERT INTO `equipo` VALUES ('2', 'Universitario', 'Lima', '1924', '1');
INSERT INTO `equipo` VALUES ('3', 'Melgar', 'Arequipa', '1915', '1');
INSERT INTO `equipo` VALUES ('4', 'Sport Huancayo', 'Huancayo', '2007', '1');
INSERT INTO `equipo` VALUES ('5', 'Alianza Lima', 'Lima', '1901', '1');
INSERT INTO `equipo` VALUES ('6', 'San Martin', 'Lima', '2004', '1');
INSERT INTO `equipo` VALUES ('7', 'Real Garcilazo', 'Cuzco', '2007', '1');
INSERT INTO `equipo` VALUES ('8', 'Juan Aurich', 'Chiclayo', '1924', '1');
INSERT INTO `equipo` VALUES ('9', 'Deportivo Municipal', 'Lima', '1935', '1');
INSERT INTO `equipo` VALUES ('10', 'Academia Cantolao', 'Callao', '1981', '1');
INSERT INTO `equipo` VALUES ('11', 'Ayacucho FC', 'Ayacucho', '1987', '1');

-- ----------------------------
-- Table structure for equipoxpartido
-- ----------------------------
DROP TABLE IF EXISTS `equipoxpartido`;
CREATE TABLE `equipoxpartido` (
  `equipo_idequipo` int(11) NOT NULL,
  `partido_idpartido` int(11) NOT NULL,
  PRIMARY KEY (`equipo_idequipo`,`partido_idpartido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of equipoxpartido
-- ----------------------------

-- ----------------------------
-- Table structure for estadio
-- ----------------------------
DROP TABLE IF EXISTS `estadio`;
CREATE TABLE `estadio` (
  `idestadio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `aforo` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idestadio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of estadio
-- ----------------------------

-- ----------------------------
-- Table structure for goles
-- ----------------------------
DROP TABLE IF EXISTS `goles`;
CREATE TABLE `goles` (
  `idgoles` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_gol` varchar(45) DEFAULT NULL,
  `minuto_gol` varchar(45) DEFAULT NULL,
  `partido_idpartido` int(11) NOT NULL,
  `jugadores_idjugadores` int(11) NOT NULL,
  PRIMARY KEY (`idgoles`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of goles
-- ----------------------------

-- ----------------------------
-- Table structure for jugadores
-- ----------------------------
DROP TABLE IF EXISTS `jugadores`;
CREATE TABLE `jugadores` (
  `idjugadores` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` varchar(45) DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `posicion` varchar(45) DEFAULT NULL,
  `equipo_idequipo` int(11) NOT NULL,
  PRIMARY KEY (`idjugadores`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jugadores
-- ----------------------------
INSERT INTO `jugadores` VALUES ('1', 'Mauricio Viana', '12/06/1992', 'Chile', 'Arquero', '111');
INSERT INTO `jugadores` VALUES ('2', 'Carlos Lobaton', '30/02/1975', 'Peru', 'Mediocampista', '222');
INSERT INTO `jugadores` VALUES ('3', 'Pedro Aquino', '02/06/1994', 'Peru', 'Mediocampista', '333');
INSERT INTO `jugadores` VALUES ('4', 'Jorge Cazulo', '01/05/1986', 'Peru/Uruguay', 'Mediocampista', '444');
INSERT INTO `jugadores` VALUES ('5', 'Josepmir Ballón', '24/04/1989', 'Peru', 'Mediocampista', '555');

-- ----------------------------
-- Table structure for lesion
-- ----------------------------
DROP TABLE IF EXISTS `lesion`;
CREATE TABLE `lesion` (
  `idlesion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_lesion` varchar(45) DEFAULT NULL,
  `duracion` varchar(45) DEFAULT NULL,
  `jugadores_idjugadores` int(11) NOT NULL,
  PRIMARY KEY (`idlesion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lesion
-- ----------------------------

-- ----------------------------
-- Table structure for partido
-- ----------------------------
DROP TABLE IF EXISTS `partido`;
CREATE TABLE `partido` (
  `idpartido` int(11) NOT NULL AUTO_INCREMENT,
  `lugar` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `resultado` varchar(45) DEFAULT NULL,
  `estadio_idestadio` int(11) NOT NULL,
  PRIMARY KEY (`idpartido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of partido
-- ----------------------------

-- ----------------------------
-- Table structure for suspendido
-- ----------------------------
DROP TABLE IF EXISTS `suspendido`;
CREATE TABLE `suspendido` (
  `idsuspendido` int(11) NOT NULL AUTO_INCREMENT,
  `amarilla` varchar(45) DEFAULT NULL,
  `roja` varchar(45) DEFAULT NULL,
  `jugadores_idjugadores` int(11) NOT NULL,
  PRIMARY KEY (`idsuspendido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of suspendido
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'joel', 'c000ccf225950aac2a082a59ac5e57ff');
SET FOREIGN_KEY_CHECKS=1;
