/*
Navicat MySQL Data Transfer

Source Server         : localhost_33061
Source Server Version : 50537
Source Host           : localhost:3306
Source Database       : acl_lilipink

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2014-12-12 17:30:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `permisos`
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permisos
-- ----------------------------
INSERT INTO `permisos` VALUES ('1', 'ver');
INSERT INTO `permisos` VALUES ('2', 'crear');
INSERT INTO `permisos` VALUES ('3', 'actualizar');
INSERT INTO `permisos` VALUES ('4', 'eliminar');
INSERT INTO `permisos` VALUES ('5', 'ver_usuario');
INSERT INTO `permisos` VALUES ('6', 'crear_usuario');
INSERT INTO `permisos` VALUES ('7', 'actualizar_usuario');
INSERT INTO `permisos` VALUES ('8', 'eliminar_usuario');
INSERT INTO `permisos` VALUES ('9', 'ver_vendedor');
INSERT INTO `permisos` VALUES ('10', 'crear_vendedor');
INSERT INTO `permisos` VALUES ('11', 'actualizar_vendedor');
INSERT INTO `permisos` VALUES ('12', 'eliminar_vendedor');

-- ----------------------------
-- Table structure for `permisos_roles`
-- ----------------------------
DROP TABLE IF EXISTS `permisos_roles`;
CREATE TABLE `permisos_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_role` (`id_role`),
  KEY `id_permiso` (`id_permiso`),
  CONSTRAINT `id_permiso` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`),
  CONSTRAINT `id_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permisos_roles
-- ----------------------------
INSERT INTO `permisos_roles` VALUES ('1', '1', '1');
INSERT INTO `permisos_roles` VALUES ('2', '1', '2');
INSERT INTO `permisos_roles` VALUES ('3', '1', '3');
INSERT INTO `permisos_roles` VALUES ('4', '1', '4');
INSERT INTO `permisos_roles` VALUES ('5', '1', '5');
INSERT INTO `permisos_roles` VALUES ('6', '1', '6');
INSERT INTO `permisos_roles` VALUES ('7', '1', '7');
INSERT INTO `permisos_roles` VALUES ('8', '1', '8');
INSERT INTO `permisos_roles` VALUES ('9', '1', '9');
INSERT INTO `permisos_roles` VALUES ('10', '1', '10');
INSERT INTO `permisos_roles` VALUES ('11', '1', '11');
INSERT INTO `permisos_roles` VALUES ('12', '1', '12');
INSERT INTO `permisos_roles` VALUES ('13', '2', '1');
INSERT INTO `permisos_roles` VALUES ('14', '2', '2');
INSERT INTO `permisos_roles` VALUES ('15', '2', '3');
INSERT INTO `permisos_roles` VALUES ('16', '2', '4');
INSERT INTO `permisos_roles` VALUES ('17', '3', '9');
INSERT INTO `permisos_roles` VALUES ('18', '3', '10');
INSERT INTO `permisos_roles` VALUES ('19', '3', '11');
INSERT INTO `permisos_roles` VALUES ('20', '3', '12');

-- ----------------------------
-- Table structure for `permisos_usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `permisos_usuarios`;
CREATE TABLE `permisos_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL,
  `no_permiso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permisos_usuarios
-- ----------------------------
INSERT INTO `permisos_usuarios` VALUES ('1', '5', '5', '0');
INSERT INTO `permisos_usuarios` VALUES ('2', '5', '6', '0');
INSERT INTO `permisos_usuarios` VALUES ('3', '6', '7', '0');
INSERT INTO `permisos_usuarios` VALUES ('4', '6', '8', '0');
INSERT INTO `permisos_usuarios` VALUES ('5', '6', '12', '0');
INSERT INTO `permisos_usuarios` VALUES ('6', '5', '0', '12');
INSERT INTO `permisos_usuarios` VALUES ('7', '5', '0', '5');
INSERT INTO `permisos_usuarios` VALUES ('8', '6', '0', '7');
INSERT INTO `permisos_usuarios` VALUES ('9', null, null, null);

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'super_administrador');
INSERT INTO `roles` VALUES ('2', 'administrador');
INSERT INTO `roles` VALUES ('3', 'vendedor');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`id_role`),
  CONSTRAINT `role_id` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'edward', 'diaz', 'diaz@gmail.com', '123456', '1', null, null, null);
INSERT INTO `users` VALUES ('2', 'juan', 'ramos', 'ramos@gmail.com', '123456', '2', null, null, null);
INSERT INTO `users` VALUES ('3', 'michael', 'camacho', 'fasdfa@gmail.com', '123456', '3', null, null, null);
INSERT INTO `users` VALUES ('4', 'admin', 'Administrator', 'admin@admin.com', '$2y$10$xdEijnpGFILk1xxDACPIgOPojGETMtaQHnQ5ik66t2rP1FMazByy2', '1', '2014-12-09 23:02:17', '2014-12-12 22:23:53', 'crtCYagBd7gj3uyTFHZEzdBxuZBYyZgRIJ2onXe1Amkj727dniX0R0uOiCcO');
INSERT INTO `users` VALUES ('5', 'juan', 'ramos', 'juan@gmail.com', '$2y$10$3oJBWnLETFzo9qKyXVJJyezwRX7pz5XJGAY2Cx.ukh4e3Jeb6ch0W', '2', '2014-12-10 16:10:45', '2014-12-12 22:15:09', 'BVggjNjTlTxAP0D5RrGbJmUFzE0wAsarTFGpAaICQZOSgdAYGhCTOVIfJKsi');
INSERT INTO `users` VALUES ('6', 'michael', 'camacho', 'camacho@gmail.com', '$2y$10$d9.CaIberYINM4y4b5RWd.lIC7E9S.MTWJBnBFqNN6JWxSqidTxia', '3', '2014-12-10 16:11:33', '2014-12-12 22:15:27', '46ALT82WLgT3WfZrCQVkbshtf9kTpLDzKTcJdL13bXKAGwNeQ2uy3LrdCNO3');
