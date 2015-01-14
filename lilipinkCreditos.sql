/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : lilipinkCreditos

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2015-01-13 08:08:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for permisos
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
-- Table structure for permisos_roles
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
-- Table structure for permisos_usuarios
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
-- Table structure for registros
-- ----------------------------
DROP TABLE IF EXISTS `registros`;
CREATE TABLE `registros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `accion` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of registros
-- ----------------------------
INSERT INTO `registros` VALUES ('1', 'admin', 'edward crea', '2014-12-27 20:48:03', '2014-12-27 20:48:03');
INSERT INTO `registros` VALUES ('2', 'admin', 'edward crea', '2014-12-27 20:48:23', '2014-12-27 20:48:23');
INSERT INTO `registros` VALUES ('3', 'admin', 'edward crea', '2014-12-27 20:48:24', '2014-12-27 20:48:24');
INSERT INTO `registros` VALUES ('4', 'admin', 'creo una cuenta', '2014-12-27 20:49:34', '2014-12-27 20:49:34');
INSERT INTO `registros` VALUES ('5', 'admin', 'creo una cuenta', '2014-12-27 23:38:32', '2014-12-27 23:38:32');
INSERT INTO `registros` VALUES ('9', 'martha', 'ha creado una cuenta', '2014-12-28 04:25:21', '2014-12-28 04:25:21');
INSERT INTO `registros` VALUES ('10', 'sacha', 'ha creado una cuenta', '2014-12-28 04:27:42', '2014-12-28 04:27:42');
INSERT INTO `registros` VALUES ('11', 'oreo', 'se ha registrado', '2014-12-28 04:30:38', '2014-12-28 04:30:38');
INSERT INTO `registros` VALUES ('12', 'fas', 'se ha registrado', '2014-12-28 04:38:48', '2014-12-28 04:38:48');
INSERT INTO `registros` VALUES ('13', 'martha1', 'se ha registrado', '2014-12-28 04:39:42', '2014-12-28 04:39:42');
INSERT INTO `registros` VALUES ('14', 'perfecto', 'se ha registrado', '2014-12-28 04:41:24', '2014-12-28 04:41:24');
INSERT INTO `registros` VALUES ('15', 'juanito', 'se ha registrado', '2014-12-30 17:42:56', '2014-12-30 17:42:56');

-- ----------------------------
-- Table structure for roles
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
-- Table structure for users
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
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`id_role`),
  CONSTRAINT `role_id` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'edward', 'diaz', 'diaz@gmail.com', '123456', '1', null, null, null, null);
INSERT INTO `users` VALUES ('2', 'juan', 'ramos', 'ramos@gmail.com', '123456', '2', null, null, null, null);
INSERT INTO `users` VALUES ('3', 'michael', 'camacho', 'fasdfa@gmail.com', '123456', '3', null, null, null, null);
INSERT INTO `users` VALUES ('4', 'admin', 'Administrator', 'admin@admin.com', '$2y$10$xdEijnpGFILk1xxDACPIgOPojGETMtaQHnQ5ik66t2rP1FMazByy2', '1', '2014-12-09 23:02:17', '2014-12-30 17:40:57', 'hdwtoEqsKi3mk0n9jV8XIFcLMKb9VDmBtwt3OuFmy63LxrqzIjMbjpUNq6Kw', null);
INSERT INTO `users` VALUES ('5', 'juan', 'ramos', 'juan@gmail.com', '$2y$10$3oJBWnLETFzo9qKyXVJJyezwRX7pz5XJGAY2Cx.ukh4e3Jeb6ch0W', '2', '2014-12-10 16:10:45', '2014-12-30 17:42:02', 'q7bP3yJQUlsDywdWciu4dyH3PXio2BxqvNeEy8JEm23lTVOk2RUkXxIVBAqp', null);
INSERT INTO `users` VALUES ('6', 'michael', 'camacho', 'camacho@gmail.com', '$2y$10$d9.CaIberYINM4y4b5RWd.lIC7E9S.MTWJBnBFqNN6JWxSqidTxia', '3', '2014-12-10 16:11:33', '2014-12-27 18:59:35', 'NnG2jCB4WHzwqeF0N9ic8wFjyE5sbLcAUHuJLmW4xPNNAHgmyAajyLwX47P1', null);
INSERT INTO `users` VALUES ('8', 'drawde', 'drawde', 'drawde@gmail.com', '$2y$10$k3L0vTLGkNyQGVzCQP758OP4Rb0o9MpqIceMRLFK2qtPK3pNXfLv.', '2', '2014-12-27 19:02:20', '2014-12-30 17:39:30', 'FqcQ9Jwmi8MixSaNYQZu06qOsbVEA4FJO6UIJMWeNZIDcix3WMPtYnitHCRG', 'drawde');
INSERT INTO `users` VALUES ('9', 'guardian', 'guaridan', 'guaridian@gmail.com', '$2y$10$7Ut0dMdCPbxwsfoOqZzrfez4FnxJyePMSptu1I5nj7rfKmPi98RJK', '3', '2014-12-27 19:07:22', '2014-12-27 19:07:22', null, 'guardian');
INSERT INTO `users` VALUES ('30', 'zaid', 'zaid', 'zaid@gmail.com', '$2y$10$Syfy3BxfLHx93plxehqpf.KKEU8UUg3.zTAaAKFPtATuQA.Y1IDxa', '1', '2014-12-27 23:38:32', '2014-12-27 23:38:32', null, 'zaid');
INSERT INTO `users` VALUES ('35', 'martha', 'martha', 'martha@gmail.com', '$2y$10$hehRdRyFQDllFZk5a58RN.NnMmiTVoDfdKUqq8NZcjvuDrmtt/Zs2', '3', '2014-12-28 04:25:21', '2014-12-28 04:26:24', 'brtbFaKaKjBPoQpfSATXJcKsGW69w7EHbXdJO6UadGHtobcDTCuXfNopU4rb', 'martha');
INSERT INTO `users` VALUES ('36', 'sacha', 'sacha', 'sacha@gmail.com', '$2y$10$n9csZwmfOgnYbl6a6LYFFOv8IuImTFlBR.RkUrxr2LvNj0uyv9i3S', '1', '2014-12-28 04:27:42', '2014-12-28 04:27:42', null, 'sacha');
INSERT INTO `users` VALUES ('37', 'oreo', 'oreo', 'oreo@gmail.com', '$2y$10$Ovm6ajaoDQxEaI7juSH5uOG40d5UQ3R.lVIV1aE0OV58JTBmXRY6m', '3', '2014-12-28 04:30:38', '2014-12-28 04:30:38', null, 'oreo');
INSERT INTO `users` VALUES ('38', 'fdas', 'fdas', 'fdas@gmail.com', '$2y$10$oeZXp19HTQxGCGIma9S5jOQ.cL3U82gsXolgTsvqGYvoCCu9lHVji', '3', '2014-12-28 04:38:48', '2014-12-28 04:38:48', null, 'fas');
INSERT INTO `users` VALUES ('39', 'martha', 'martha', 'martha@gmai.com', '$2y$10$qlu1I/mpL66IH7EiQ3qOXOanOKMi7bhFpC74zCltxcq.LTS6eSVIi', '3', '2014-12-28 04:39:42', '2014-12-28 04:39:42', null, 'martha1');
INSERT INTO `users` VALUES ('40', 'perfecto', 'perfecto', 'perfecto@gmail.com', '$2y$10$CQnAi3ovSTTgEOtUvFxzdenc1/1Xt4nmUqklmNPbwItYjYQZZYbIC', '3', '2014-12-28 04:41:23', '2014-12-28 04:41:23', null, 'perfecto');
INSERT INTO `users` VALUES ('41', 'juanito', 'juanito', 'juanito@gmail.com', '$2y$10$82lVi0N5V8OgpSAw9Fzcxuh60x5OjPrLtA7TxI1h9lvD0yWPDiOkK', '3', '2014-12-30 17:42:56', '2014-12-30 17:42:56', null, 'juanito');
