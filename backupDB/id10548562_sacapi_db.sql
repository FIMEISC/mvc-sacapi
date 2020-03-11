/*
 Navicat Premium Data Transfer

 Source Server         : PCKEVIN
 Source Server Type    : MySQL
 Source Server Version : 50715
 Source Host           : localhost:3306
 Source Schema         : id10548562_sacapi_db

 Target Server Type    : MySQL
 Target Server Version : 50715
 File Encoding         : 65001

 Date: 11/03/2020 10:21:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `numcontrol` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombreu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `permisos_acceso` enum('Admin') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('activo','bloqueado') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'activo'
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('admin', 'Admin', 'sacapi@ucol.mx', '21232f297a57a5a743894a0e4a801fc3', 'user-default.png', 'Admin', 'activo');

-- ----------------------------
-- Table structure for alumnos
-- ----------------------------
DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos`  (
  `numcuenta` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombreu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellidop` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellidom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'user-default.png',
  `permisos_acceso` enum('Alumno') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('activo','bloqueado') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'activo',
  `semestre` int(2) NULL DEFAULT NULL,
  `grupo` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `generacion` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `idnivel` int(2) NULL DEFAULT NULL,
  `idtutor` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `idcarrera` int(11) NOT NULL,
  `idfacultad` int(11) NOT NULL,
  `pass_ok` int(1) NOT NULL DEFAULT 0,
  UNIQUE INDEX `numcuenta`(`numcuenta`) USING BTREE,
  INDEX `idnivel`(`idnivel`) USING BTREE,
  INDEX `numcontrol`(`idtutor`) USING BTREE,
  INDEX `keycarrera`(`idcarrera`) USING BTREE,
  CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`idtutor`) REFERENCES `profesores` (`numcontrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `keycarrera` FOREIGN KEY (`idcarrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alumnos
-- ----------------------------
INSERT INTO `alumnos` VALUES ('20004047', 'Hector', 'Mendez', 'Gongora', 'c6865cf98b133f1f3de596a4a2894630', 'hmendez1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20097886', 'Dhyana Ixchel', 'Verjan', 'Vargas', 'c6865cf98b133f1f3de596a4a2894630', 'dverjan@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20105392', 'Cesar Ulises', 'Arzac', 'Ricardo', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20106746', 'Jose Fransico', 'Pedraza', 'Santos', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20107064', 'Pedro Florentino', 'Ortiz', 'Ramos', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20113386', 'Carlos Alejandro', 'Diaz', 'Perez', 'c6865cf98b133f1f3de596a4a2894630', 'cdiaz8@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '590', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20114593', 'Jocelyn', 'Flores', 'Gonzales', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20115362', 'Jeniffer', 'Hernandez', 'Lorenzo', '77e2edcc9b40441200e31dc57dbb8829', 'jhernandez26@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'D', '2', 26, '3728', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20116971', 'Eduardo Daniel', 'Vazques', 'Vaca', 'c6865cf98b133f1f3de596a4a2894630', 'evazquez5@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '7107', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20117670', 'Guilberto', 'Sandoval', 'Ortiz', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20117685', 'David', 'Torres', 'Lois', 'c6865cf98b133f1f3de596a4a2894630', 'ltorres6@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20119206', 'Carlos Andres', 'Arroyo', 'Zamora', 'c6865cf98b133f1f3de596a4a2894630', 'carroyo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20122515', 'Daniel Alejandro', 'Hernandez', 'Robles', '834753dd2749b363412b4b109b8619df', 'dhernandez28@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20123345', 'Oscar Eduardo', 'Castillo', 'Arceo', 'c6865cf98b133f1f3de596a4a2894630', 'ocastillo0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '004', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20124232', 'Luis Angel', 'Maldonado', 'Lino', 'c6865cf98b133f1f3de596a4a2894630', 'lmaldonado@ucol.m', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 23, '6539', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20124733', 'Oscar Adrian', 'Peralta', 'Cardenas', 'c6865cf98b133f1f3de596a4a2894630', 'poscar1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20125181', 'Saul', 'Santos', 'De jesus', 'c6865cf98b133f1f3de596a4a2894630', 'ssantos0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20126086', 'Luis Alberto', 'De la Vega', 'Martinez', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'G', '1', 19, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20126889', 'Mauri Derek', 'Garcia', 'Blanco', 'c6865cf98b133f1f3de596a4a2894630', 'mgarcia13@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20127154', 'Rodolfo Adalberto', 'Contreras', 'Jimenez', 'c6865cf98b133f1f3de596a4a2894630', 'rcontreras4@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20127282', 'Ana Paola', 'Ruiz', 'Mesa', 'c6865cf98b133f1f3de596a4a2894630', 'aruiz1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20129558', 'Noel Eduardo', 'Lopez', 'Mejia', 'c6865cf98b133f1f3de596a4a2894630', 'nlopez13@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20130515', 'Carlos Ulises', 'Bazan', 'Lomeli', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20130545', 'Hernan', 'Hernandez', 'Lopez', 'c6865cf98b133f1f3de596a4a2894630', 'hhernandez4@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '004', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20130581', 'Maria de Jesus', 'Ramos', 'Ramos', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20131109', 'Carlos Efraín', 'Alcaraz', 'Luna', 'c6865cf98b133f1f3de596a4a2894630', 'calcaraz7@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 19, '590', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20131240', 'Maria de Lourdes', 'Martinez', 'Sandoval', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20131514', 'Angel Adrian', 'Alvarez', 'Jimenez', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20131703', 'Cristobal', 'Cobian', 'Mejia', 'c6865cf98b133f1f3de596a4a2894630', 'ccobian2@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20132747', 'Jorge Alejandro', 'Calderon', 'Angel', 'c6865cf98b133f1f3de596a4a2894630', 'jcalderon0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '004', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20132851', 'Juan Antonio', 'Larios', 'Aguilar', 'c6865cf98b133f1f3de596a4a2894630', 'llarios@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20132931', 'Maria Fernanda', 'Perez', 'Brena', 'c6865cf98b133f1f3de596a4a2894630', 'mperez32@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '3728', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20132950', 'Jazmin', 'Rizo', 'Contreras', 'c6865cf98b133f1f3de596a4a2894630', 'rjazmin@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20133021', 'Jose Emmanuel', 'Barreto', 'Lozano', 'c6865cf98b133f1f3de596a4a2894630', 'jbarreto4@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '004', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20133178', 'Jonathan', 'Lozano', 'Alvarez', 'c6865cf98b133f1f3de596a4a2894630', 'jlozano0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20133190', 'Jose Fransico', 'Romero', 'Garcia', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20133405', 'Israel', 'Macias', 'Briceño', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20133412', 'Luis Isidro', 'Manzanares', 'Navarro', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20133676', 'Christian Camilo', 'Cervantes', 'Rodriguez', 'c6865cf98b133f1f3de596a4a2894630', 'ccervantes@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '127', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20133685', 'Jairo Efrain', 'Godinez', 'Rojas', 'c6865cf98b133f1f3de596a4a2894630', 'jgodine12@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20134122', 'Victor Eduardo', 'Anguiano', 'Guitierrez', 'c6865cf98b133f1f3de596a4a2894630', 'vanguiano1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20134201', 'Mario Antonio', 'Gaytan', 'Barrajas', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20134217', 'Hernan', 'Guitierres', 'Larios', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20134258', 'Rodolfo Ivan', 'Madrigal', 'Paredes', 'c6865cf98b133f1f3de596a4a2894630', 'rmadrigal@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '004', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20134295', 'Edwin Noe', 'Ochoa', 'Sandoval', 'c6865cf98b133f1f3de596a4a2894630', 'eochoa5@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '004', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20134333', 'Daniel Edmundo', 'Renteria', 'Velasco', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20134341', 'Jorge Alberto', 'Rocha ', 'Olivera', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20134351', 'Christian', 'Rojo', 'Gallardo', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20134381', 'Christian', 'Valdez', 'Lopez', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'G', '1', 19, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20134391', 'Jesus Salvador', 'Ventura', 'Gonzales', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20134394', 'Rodolfo de Jesus', 'Villalobos', 'Salazar', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20134437', 'Noemi Guadalupe', 'Rivera', 'Magaña', 'c6865cf98b133f1f3de596a4a2894630', 'nrivera@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20134447', 'Edgar Armando', 'Aguirre', 'Pazarin', 'c6865cf98b133f1f3de596a4a2894630', 'eaguirre1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '1190', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20134500', 'Christian Eduardo', 'Avila', 'Ruelas', 'c6865cf98b133f1f3de596a4a2894630', 'cavila1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '6353', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20134552', 'Miguel Angel', 'Alvarez', 'Huerta', 'c17fbed0e21d35ef61787f6f69c06482', 'mmiguel@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20134562', 'Carlos Josue', 'Ayala', 'Guerrero', 'c6865cf98b133f1f3de596a4a2894630', 'cayala0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20134609', 'Julissa', 'Delgado', 'Gillermo', 'c6865cf98b133f1f3de596a4a2894630', 'jdelgado12@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20134703', 'Miguel Angel', 'Mata', 'Quintero', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'G', '1', 19, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20134710', 'Daniel Martin', 'Miramontes', 'Gaspar', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20134725', 'Luis Guilberto', 'Olguin', 'Flores', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'G', '1', 19, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20134732', 'Nancy Lorena', 'Pastelin', 'Hernandez', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20134795', 'Monico', 'Sandoval', 'Bermudez', 'c6865cf98b133f1f3de596a4a2894630', 'msandoval13@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '3728', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20134809', 'Diana Jacqueline', 'Tirado', 'Rosales', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20134855', 'Jayro Moises', 'Carillo', 'Rojas', 'c6865cf98b133f1f3de596a4a2894630', 'jcarrillo17@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20135002', 'Carlos Augusto', 'Gonzales', 'Lopez', 'c6865cf98b133f1f3de596a4a2894630', 'cgonzalez20@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '004', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20135027', 'Marco Antonio', 'Morales', 'Negrete', 'c6865cf98b133f1f3de596a4a2894630', 'mmorales12@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '3728', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20135059', 'Jose Ramon', 'Vargas ', 'Lopez', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20135081', 'Ricardo', 'Cardenas', 'Diaz', 'c6865cf98b133f1f3de596a4a2894630', 'dcardenas@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20135116', 'Oliver Alejandro', 'Lopez', 'Galindo', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20135249', 'Edgar Uriel', 'Saucedo', 'Michel', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'G', '1', 19, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20136227', 'Erik Federico', 'Mendoza', 'Gonzales', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20136277', 'Jesus Daniel', 'Perez', 'Medina', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20136288', 'Benjamin', 'Puente', 'Santana', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20136293', 'Eduardo', 'Ramirez', 'Beas', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20136440', 'Alejandro', 'Camacho', 'Gomez', 'c6865cf98b133f1f3de596a4a2894630', 'acamacho7@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20136588', 'Jaqueline Veronica', 'Jimenez', 'Ramos', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20136614', 'Elias', 'Maldonado', 'Morelos', 'c6865cf98b133f1f3de596a4a2894630', 'emaldonado@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '590', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20136693', 'Zhurech Fernando', 'Ramirez', 'Carrillo', 'c6865cf98b133f1f3de596a4a2894630', 'zramirez1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20136705', 'Luis Aldebrani', 'Reyes', 'Chavez', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20136882', 'Eduardo', 'Gutierrez', 'Bayardo', 'c6865cf98b133f1f3de596a4a2894630', 'egutierrez12@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20137280', 'Sonia', 'Cardenas', 'Esparza', 'c6865cf98b133f1f3de596a4a2894630', 'scardenas13@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20137309', 'Adriana Isabel', 'Garcia', 'Lam', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20137333', 'Luis Eduardo', 'Hernandez', 'Gonzales', 'c6865cf98b133f1f3de596a4a2894630', 'lhernandez31@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '004', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20137423', 'Rodrigo', 'Gutierrez', 'Serrano', 'c6865cf98b133f1f3de596a4a2894630', 'rserrano6@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20137508', 'Wilmer Jair', 'Trejo', 'Figueroa', 'c6865cf98b133f1f3de596a4a2894630', 'wtrejo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '4486', 1, 1, 1);
INSERT INTO `alumnos` VALUES ('20139781', 'Jose Andres', 'Castañeda', 'Santana', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20139795', 'Jose Miguel', 'Lopez', 'Olmos', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20139809', 'Diego Alejandro', 'Ahumada', 'Rodriguez', 'c6865cf98b133f1f3de596a4a2894630', 'dahumada@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20139818', 'Sergio Julian', 'Diaz', 'Topete', 'c6865cf98b133f1f3de596a4a2894630', 'sdiaz5@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20140527', 'Isaac', 'Carrillo', 'Martinez', 'c6865cf98b133f1f3de596a4a2894630', 'isaac_carrillo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'D', '2', 26, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20140555', 'Ricardo', 'Gomez', 'Carenaz', 'c6865cf98b133f1f3de596a4a2894630', 'ricardo_gomez@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20141055', 'Jorge Alejandro', 'Aguilar', 'Moran', 'c6865cf98b133f1f3de596a4a2894630', 'jorgealejandro_aguilar@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 19, '3728', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20141603', 'Alonso', 'Maldonado', 'Deniz', 'c6865cf98b133f1f3de596a4a2894630', 'alonso_maldonado@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20141647', 'Jennyer Guadalupe', 'Camarena', 'Figueroa', 'c6865cf98b133f1f3de596a4a2894630', 'jennyferguadalupe_camarena@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '127', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20142775', 'Daniel', 'Francisco', 'Molina', 'c6865cf98b133f1f3de596a4a2894630', 'daniel_francisco@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 21, '6539', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20142782', 'Jorge Joel', 'Garcia', 'Chavez', 'c6865cf98b133f1f3de596a4a2894630', 'jorgejoel_garcia@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20143203', 'Marcos', 'Nava', 'Quiroz', 'c6865cf98b133f1f3de596a4a2894630', 'mnava@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '127', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20143251', 'Gabriel David', 'Barajas', 'Rodriguez', 'c6865cf98b133f1f3de596a4a2894630', 'gabrieldavid_barajas@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '127', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20143402', 'Francisco Ruben', 'Meza', 'Castillon', 'c6865cf98b133f1f3de596a4a2894630', 'franciscoruben_meza@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20143445', 'Jose Armando', 'Puente', 'Vergara', 'c6865cf98b133f1f3de596a4a2894630', 'josearmando_puente@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20143457', 'Miguel Angel', 'Ramos', 'Palacios', 'c6865cf98b133f1f3de596a4a2894630', 'miguelangel_ramos0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'D', '2', 26, '6539', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20143548', 'Fernando Alberto', 'Araiza', 'NuÃ±es', 'c6865cf98b133f1f3de596a4a2894630', 'fernandoalberto_araiza@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20144170', 'Oswin Guadalupe', 'Flores', 'valle', 'c6865cf98b133f1f3de596a4a2894630', 'oswinguadalupe_flores@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20144190', 'Carlos Adrian', 'Gomez', 'Osorio', 'c6865cf98b133f1f3de596a4a2894630', 'carlosadrian_gomez@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20144466', 'Alfredo Alfonso', 'Alcaraz', 'Silva', 'c6865cf98b133f1f3de596a4a2894630', 'alfredoalonso_alcaraz@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20144574', 'Andrea', 'Flores', 'Diaz', 'c6865cf98b133f1f3de596a4a2894630', 'andrea_flores@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20144639', 'Francisco Javier', 'Mena', 'Soriano', 'c6865cf98b133f1f3de596a4a2894630', 'franciscojavier_mena@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'D', '2', 26, '6539', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20144899', 'Ricardo', 'Diaz', 'Crotte', 'c6865cf98b133f1f3de596a4a2894630', 'ricardo_diaz@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 23, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20144942', 'Jessica Sarahi', 'Ochoa', 'Velasco', 'c6865cf98b133f1f3de596a4a2894630', 'jessicasarahi_ochoa@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20144965', 'Milda Dolores', 'Verduzco', 'Valencia', 'c6865cf98b133f1f3de596a4a2894630', 'mildadolores_verduzco@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20145047', 'Fatima Adriana', 'Romero', 'Velazco', 'c6865cf98b133f1f3de596a4a2894630', 'fromero2@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'D', '2', 26, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20145990', 'Diego Ulises', 'Gonzales', 'Padilla', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20146131', 'Miguel Antonio', 'Gutierrez', 'Maldonado', 'c6865cf98b133f1f3de596a4a2894630', 'miguelantonio_gutierrez@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20146473', 'Benito Benjamin', 'Guillen', 'Cuevas', 'c6865cf98b133f1f3de596a4a2894630', 'benitobenjamin_guillen@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'D', '2', 26, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20146525', 'Teresa Elizabeth', 'Mejia', 'Carrillo', 'c6865cf98b133f1f3de596a4a2894630', 'teresaelizabeth_mejia@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'D', '2', 26, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20146714', 'Jose alberto', 'Barajas', 'Moreno', 'c6865cf98b133f1f3de596a4a2894630', 'josealberto_barajas@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20147131', 'Oscar', 'Estrada', 'Mejia', 'c6865cf98b133f1f3de596a4a2894630', 'oscar_estrada@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20147148', 'Adrian Guadalupe', 'Guzman', 'Delgado', 'c6865cf98b133f1f3de596a4a2894630', 'adrianguadalupe_guzman@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20147172', 'Jose Salvador', 'Lopez', 'Virgen', 'c6865cf98b133f1f3de596a4a2894630', 'josesalvador_lopez@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '127', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20147301', 'Pedro Noe', 'Acosta', 'Cuevas', 'c6865cf98b133f1f3de596a4a2894630', 'pedronoe_acosta@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 19, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20147340', 'Tomas Alejandro', 'Espiritu', 'Mora', 'c6865cf98b133f1f3de596a4a2894630', 'tomasalejandro_espiritu@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'D', '2', 26, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20147360', 'Osbaldo Javier', 'Guardado', 'Alvarez', 'c6865cf98b133f1f3de596a4a2894630', 'oguardado@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20149555', 'Miguel Paul', 'Padilla', 'AcuÃ±a', 'c6865cf98b133f1f3de596a4a2894630', 'mpadilla11@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 25, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20150507', 'Luis Eduardo', 'Ayala', 'Ruiz', 'c6865cf98b133f1f3de596a4a2894630', 'layala0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '6353', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20150514', 'Juan Jose', 'Cardenas', 'Ramirez', 'c6865cf98b133f1f3de596a4a2894630', 'jcardenas3@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20150517', 'Orlando Paul', 'Carrasco', 'Quintero', 'c6865cf98b133f1f3de596a4a2894630', 'ocarrasco@ucol.m', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 20, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20150542', 'Jose Refugio', 'Decena', 'Romero', 'c6865cf98b133f1f3de596a4a2894630', 'jdecena1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20150581', 'Yessica Araceli', 'Leon', 'MuÃ±ez', 'c6865cf98b133f1f3de596a4a2894630', 'yleon@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20150666', 'Jose Jesus', 'Virgen', 'Cervantes', 'c6865cf98b133f1f3de596a4a2894630', 'jvirgen9@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '590', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20150773', 'Pedro Rogelio', 'Garcia', 'Mendez', 'c6865cf98b133f1f3de596a4a2894630', 'pgarcia17@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20150932', 'Guillermino', 'Lopez', 'Villanueva', 'c6865cf98b133f1f3de596a4a2894630', 'glopez5@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '127', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20151074', 'Juan Carlos', 'Villa', 'AviÃ±a', 'c6865cf98b133f1f3de596a4a2894630', 'jvilla4@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '591', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20151156', 'Jose Enrique', 'Garcia', 'Linares', 'c6865cf98b133f1f3de596a4a2894630', 'jgarcia_48@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20152909', 'Juan Carlos', 'Marquez', 'MuÃ±os', 'c6865cf98b133f1f3de596a4a2894630', 'jmarquez2@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 23, '590', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20152989', 'Fabian', 'Ramos', 'Lopez', 'c6865cf98b133f1f3de596a4a2894630', 'framos6@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '591', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20152994', 'Oscar Eduardo', 'Rincon', 'Ramirez', 'c6865cf98b133f1f3de596a4a2894630', 'orincon0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '591', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20153248', 'Edward', 'Michel', 'Diaz', 'c6865cf98b133f1f3de596a4a2894630', 'emichel4@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '591', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20153443', 'Oscar Usai', 'Gomez', 'Barajas', 'c6865cf98b133f1f3de596a4a2894630', 'ogomez10@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20153447', 'Jose Guadalupe', 'Gonzalez', 'Celestino', 'c6865cf98b133f1f3de596a4a2894630', 'jgonzalez34@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20153464', 'Omar Alejandro', 'Hinojosa', 'Ochoa', 'c6865cf98b133f1f3de596a4a2894630', 'ohinojosa@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20153823', 'Miguel Angel', 'Mariscal', 'Llamas', 'c6865cf98b133f1f3de596a4a2894630', 'mmariscal0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 23, '590', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20153845', 'Hector Samuel', 'Sandoval', 'Llamas', '1a8d5287661486e4fafad0140ce2be59', 'hsandoval@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 23, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20154460', 'Miguel Angel', 'Heredia', 'Mora', 'c6865cf98b133f1f3de596a4a2894630', 'mheredia@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '7107', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20154498', 'Ricardo Julian', 'Lorenzo', 'Moreno', 'c6865cf98b133f1f3de596a4a2894630', 'rlorenzo0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '127', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20154711', 'Jiovani Said', 'Mancilla', 'De la cruz', 'c6865cf98b133f1f3de596a4a2894630', 'jmancilla11@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20154754', 'Alberto', 'Arredondo', 'Pozos', 'c6865cf98b133f1f3de596a4a2894630', 'aarredondo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20155247', 'Luis Gabriel', 'Rodriguez', 'Figueroa', 'c6865cf98b133f1f3de596a4a2894630', 'lrodriguez42@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20155309', 'Naomy Alejandra', 'Rios', 'Martinez', 'c6865cf98b133f1f3de596a4a2894630', 'nrios0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20155736', 'Jose Antonio', 'Gutierrez', 'Sanchez', 'c6865cf98b133f1f3de596a4a2894630', 'jgutierrez21@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '127', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20156387', 'Christopher Armando', 'Cernas', 'Leom', 'c6865cf98b133f1f3de596a4a2894630', 'ccernas@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 20, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20156430', 'Daniel Misael', 'Eusebio', 'Rodriguez', 'c6865cf98b133f1f3de596a4a2894630', 'deusebio0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '326', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20156561', 'Esmeralda Jomary', 'Ochoa', 'Flores', 'c6865cf98b133f1f3de596a4a2894630', 'eochoa@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '4486', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20156781', 'Edson Paul', 'Morfin', 'Gallardo', 'c6865cf98b133f1f3de596a4a2894630', 'emorfin@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'B', '4', 23, '3731', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20156863', 'Jose Arnoldo', 'Guedea', 'Orozco', 'c6865cf98b133f1f3de596a4a2894630', 'jguedea@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20157100', 'Juan Carlos', 'Aguilar', 'Navarro', 'c6865cf98b133f1f3de596a4a2894630', 'jaguilar1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '6539', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20157248', 'Jonathan Jasiel', 'Macias', 'MuÃ±oz', 'c6865cf98b133f1f3de596a4a2894630', 'jmacias5@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '591', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20158366', 'Paola Lisset', 'Satollo', 'Vargas', 'c6865cf98b133f1f3de596a4a2894630', 'psantollo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20158610', 'Mauro Gabriel', 'Rodriguez', 'MartiÃ±on', 'c6865cf98b133f1f3de596a4a2894630', 'mrodriguez70@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '127', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20160549', 'Jesus Francisco', 'Gaytan', 'Ricardo', 'c6865cf98b133f1f3de596a4a2894630', 'jgaytan3@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '326', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20160677', 'Victor Emmanuel', 'Alvarez', 'Fernandez', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20160678', 'David', 'Alvarez', 'Ochoa', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20160684', 'Oscar Andres', 'Encarnacion', 'Rojas', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20160686', 'Rodigo', 'Muñoz', 'Solis', 'c6865cf98b133f1f3de596a4a2894630', 'rmunoz5@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'A', '1', 5747, '004', 3, 1, 0);
INSERT INTO `alumnos` VALUES ('20160691', 'Oscar', 'Amador', 'Orozco', 'dd0929f63d9f893964414e0578ef657d', 'oamador@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20160693', 'Jose Manuel', 'Cirilo', 'Terrazas', 'c6865cf98b133f1f3de596a4a2894630', 'jcirilo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20160695', 'Edgar Antonio', 'Martinez', 'Enciso', 'c6865cf98b133f1f3de596a4a2894630', 'emartinez45@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '591', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20160696', 'Javier', 'Meza', 'Enciso', 'c3284d0f94606de1fd2af172aba15bf3', 'jmeza2@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '3728', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20160698', 'Carlos', 'Puente', 'Valladares', 'c6865cf98b133f1f3de596a4a2894630', 'cpuente4@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '127', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20160699', 'Arturo Enrique', 'Aguirre', 'Pinedo', 'c6865cf98b133f1f3de596a4a2894630', 'aaguirre7@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '7107', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20160704', 'Juan Diego', 'De la Cruz', 'Riestra', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20160705', 'Edgar Orlando', 'Esparza', 'Garcia', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20160707', 'Julio Eduardo', 'Gomez', 'Baldovinos', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20160710', 'Angel Josafat', 'Prado', 'Celis', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20160711', 'Omar', 'Sanches', 'DueÃ±as', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20160712', 'Edwin Jose', 'Zapot', 'Gutierres', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20160756', 'Jose Luis', 'Toro', 'Murrieta', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'I', '1', 19, '004', 5, 1, 0);
INSERT INTO `alumnos` VALUES ('20160757', 'Kevin Joel', 'Deniz', 'Celis', '202cb962ac59075b964b07152d234b70', 'kdeniz1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '326', 1, 1, 1);
INSERT INTO `alumnos` VALUES ('20160758', 'Angel Manuel', 'Esparza', 'Ramirez', 'c6865cf98b133f1f3de596a4a2894630', 'aesparza@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'B', '1', 4522, '326', 1, 1, 1);
INSERT INTO `alumnos` VALUES ('20160761', 'Vicente', 'Contreras', 'Garcia', 'c6865cf98b133f1f3de596a4a2894630', 'vcontreras2@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '004', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20160767', 'Christian Alexis', 'Alvarez', 'Padill', 'c6865cf98b133f1f3de596a4a2894630', 'calvarez18@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '004', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20160771', 'Jose Alejandro', 'Huerta', 'Arias', 'e7af6dfca286728d3671a6c45de39b18', 'jhuerta16@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20160777', 'Edwin Fransico', 'Negrete', 'Orozco', 'c6865cf98b133f1f3de596a4a2894630', 'enegrete3@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'C', '1', 26, '004', 4, 1, 0);
INSERT INTO `alumnos` VALUES ('20160915', 'Derek', 'Moises', 'Ayala', 'c6865cf98b133f1f3de596a4a2894630', 'dayala0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '6539', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20161225', 'Kenia', 'Diaz', 'Izazaga', 'c6865cf98b133f1f3de596a4a2894630', 'kdiaz13@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '326', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20161283', 'Roberto Damian', 'Leon', 'Hernandez', 'c6865cf98b133f1f3de596a4a2894630', 'rleon2@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '7107', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20162055', 'Edgar Axel', 'Garcia', 'GarduÃ±o', 'f52958d544fd622dd6b9d3dec3678741', 'gedgar3@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20162056', 'Edgar', 'Garcia', 'GudiÃ±o', 'c6865cf98b133f1f3de596a4a2894630', 'cedgar2@ucol.mx', 'user-default.png', 'Alumno', 'activo', 7, 'D', '1', 5747, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20163690', 'Osvaldo', 'Carrillo', 'Guitierrez', 'c6865cf98b133f1f3de596a4a2894630', 'ocarrillo5@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '127', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20164798', 'Axel Hervey', 'Cruz', 'Baez', 'c6865cf98b133f1f3de596a4a2894630', 'acruz31@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '127', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20164828', 'Ulises Yael', 'Garcia', 'De los santos', 'c6865cf98b133f1f3de596a4a2894630', 'ugarcia4@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '326', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20165323', 'Rafael', 'Padilla', 'Beltran', 'c6865cf98b133f1f3de596a4a2894630', 'rpadilla@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '4486', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20165597', 'Alexandro Marcelo', 'Martinez', 'Ramos', 'c6865cf98b133f1f3de596a4a2894630', 'amartinez71@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '7107', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20165732', 'Diana Artemisa', 'Sepulveda', 'PatiÃ±o', 'c6865cf98b133f1f3de596a4a2894630', 'dsepulveda@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '4486', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20165747', 'Clara Andrea', 'Tinoco', 'Guerrero', 'c6865cf98b133f1f3de596a4a2894630', 'ctinoco@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '590', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20166017', 'Rigoberto', 'GodÃ­nez', 'GarcÃ­a', 'c6865cf98b133f1f3de596a4a2894630', 'rgodinez2@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '7107', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20166025', 'Gisela', 'Martinez', 'Rios', 'c6865cf98b133f1f3de596a4a2894630', 'gmartinez20@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '6353', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20166317', 'Jonathan Guadalupe', 'Alvarodo', 'Vargas', 'c6865cf98b133f1f3de596a4a2894630', 'jalvarado1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'B', '4', 22, '590', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20166685', 'Marco Antonio', 'Alvarez', 'Lopez', 'c6865cf98b133f1f3de596a4a2894630', 'malvarez31@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '6539', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20166707', 'Yahir', 'Blanco', 'Gomez', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '127', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20166795', 'Claudia Patricia', 'Godinez', 'Calzada', 'c6865cf98b133f1f3de596a4a2894630', 'cgodinez7@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '326', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20167033', 'Pedro Efren', 'Aguilar', 'Dominguez', 'c6865cf98b133f1f3de596a4a2894630', 'paguilar2@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'B', '4', 22, '7107', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20167050', 'Rodrigo Rafael', 'Aparicio', 'Ramirez', 'c6865cf98b133f1f3de596a4a2894630', 'raparicio@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '6539', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20167423', 'Jose Maximiliano', 'Retana', 'Lopez', 'c6865cf98b133f1f3de596a4a2894630', 'jretana0@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '4486', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20167523', 'Diego Jeancarlo', 'Corona', 'Barragan', 'c6865cf98b133f1f3de596a4a2894630', 'dcorona3@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '127', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20167561', 'Jose Juan', 'Herrera', 'Reyes', 'c6865cf98b133f1f3de596a4a2894630', 'jherrera11@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'B', '4', 22, '4486', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20167581', 'Jessica Monzerrat', 'Medina', 'Carrillo', 'c6865cf98b133f1f3de596a4a2894630', 'jmedina22@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '7107', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20167650', 'Jose Miguel', 'Vazquez', 'Torres', 'c6865cf98b133f1f3de596a4a2894630', 'sncorreo@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '591', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20168002', 'Manuel', 'Figueroa', 'Estrada', 'c6865cf98b133f1f3de596a4a2894630', 'mfigueroa5@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 21, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20169423', 'Isaac Martin', 'Ponce', 'Osorio', 'c6865cf98b133f1f3de596a4a2894630', 'iponce@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '3728', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20169934', 'Dolores Fernanda', 'Castillo', 'De dios', 'c6865cf98b133f1f3de596a4a2894630', 'dcastillo11@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '127', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20170234', 'Leonel', 'Vega', 'Santomayor', 'c6865cf98b133f1f3de596a4a2894630', 'lvega5@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20170235', 'Jose Emmanuel', 'Arellano', 'Garcia', 'c6865cf98b133f1f3de596a4a2894630', 'jarellano5@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20170237', 'Victor Alonso', 'Garcia', 'Madrigal', 'c6865cf98b133f1f3de596a4a2894630', 'vgarcia16@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'D', '2', 26, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20170239', 'Ulises', 'Puente', 'Sanchez', 'c6865cf98b133f1f3de596a4a2894630', 'upuente@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '1190', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20170241', 'Jose Francisco', 'Martinez', 'Carrazco', 'c6865cf98b133f1f3de596a4a2894630', 'jmartinez110@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '7107', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20170242', 'Celina Fabiola', 'Ramirez', 'Torres', 'c6865cf98b133f1f3de596a4a2894630', 'cramirez49@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'D', '2', 26, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20170299', 'Alan', 'Perez', 'Josue', 'c6865cf98b133f1f3de596a4a2894630', 'aperez72@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '127', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20179440', 'Lynda Sherly', 'Garcia', 'Pulido', 'c6865cf98b133f1f3de596a4a2894630', 'lgarcia54@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '326', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20180005', 'Juan Pedro', 'Segura', 'MaÃ±aga', 'c6865cf98b133f1f3de596a4a2894630', 'jsegura1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 5, 'B', '2', 21, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20180302', 'Jonathan Ivan', 'Miranda', 'Mendez', 'c6865cf98b133f1f3de596a4a2894630', 'jmiranda9@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 23, '3728', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20180303', 'Juan Ramon', 'Nazarian', 'Romero', 'c6865cf98b133f1f3de596a4a2894630', 'jnazarin@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '326', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20188171', 'Mario Alberto', 'Garcia', 'Garica', 'c6865cf98b133f1f3de596a4a2894630', 'mgarcia125@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'D', '3', 5747, '3731', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20188437', 'Bryant Bidkar', 'Rivera', 'Meza', 'c6865cf98b133f1f3de596a4a2894630', 'brivera@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '4486', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20190007', 'Pedro Ibrahim', 'Olmos', 'DueÃ±as', 'c6865cf98b133f1f3de596a4a2894630', 'polmos@ucol.mx', 'user-default.png', 'Alumno', 'activo', 3, 'B', '3', 24, '3728', 1, 1, 0);
INSERT INTO `alumnos` VALUES ('20190254', 'Luisa Concepcion', 'Lleneras', 'Romero', 'c6865cf98b133f1f3de596a4a2894630', 'lllerenas3@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'B', '4', 22, '4486', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20190255', 'Luis Angel', 'Guardado', 'Cisneros', 'c6865cf98b133f1f3de596a4a2894630', 'lguardado@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '7107', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20190256', 'Obed Alejandro', 'MunguÃ­a', 'GaitÃ¡n', 'c6865cf98b133f1f3de596a4a2894630', 'omunguia2@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '4486', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20190270', 'Eduard Issael', 'MontaÃ±o', 'Arreola', 'c6865cf98b133f1f3de596a4a2894630', 'emontano1@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '4486', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20190271', 'Paloma Montserrat', 'Villegas', 'Herrera', 'c6865cf98b133f1f3de596a4a2894630', 'pvillegas2@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '590', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20190314', 'Arath', 'Avalos', 'Delgadillo', 'c6865cf98b133f1f3de596a4a2894630', 'aavalos32@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '6539', 2, 1, 0);
INSERT INTO `alumnos` VALUES ('20193782', 'Jose Francisco', 'Atayde', 'Virgen', 'c6865cf98b133f1f3de596a4a2894630', 'jatayde@ucol.mx', 'user-default.png', 'Alumno', 'activo', 1, 'D', '4', 5747, '6539', 2, 1, 0);

-- ----------------------------
-- Table structure for carreras
-- ----------------------------
DROP TABLE IF EXISTS `carreras`;
CREATE TABLE `carreras`  (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_facultad` int(11) NOT NULL,
  PRIMARY KEY (`id_carrera`) USING BTREE,
  INDEX `facultad_key`(`id_facultad`) USING BTREE,
  CONSTRAINT `facultad_key` FOREIGN KEY (`id_facultad`) REFERENCES `facultades` (`id_facultad`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carreras
-- ----------------------------
INSERT INTO `carreras` VALUES (1, 'Ingeniería en Sistemas Computacionales', 1);
INSERT INTO `carreras` VALUES (2, 'Ingeniería en Computación Inteligente', 1);
INSERT INTO `carreras` VALUES (3, 'Ingeniería Mecánica y Eléctrica', 1);
INSERT INTO `carreras` VALUES (4, 'Ingeniería en Sistemas Electrónicos y Telecomunicaciones', 1);
INSERT INTO `carreras` VALUES (5, 'Ingeniero(a) en Mecatrónica', 1);
INSERT INTO `carreras` VALUES (6, 'Diseño Industrial', 2);

-- ----------------------------
-- Table structure for facultades
-- ----------------------------
DROP TABLE IF EXISTS `facultades`;
CREATE TABLE `facultades`  (
  `id_facultad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_facultad` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_facultad`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of facultades
-- ----------------------------
INSERT INTO `facultades` VALUES (1, 'Facultad de Ingeniería Mecánica y Eléctrica');
INSERT INTO `facultades` VALUES (2, 'Facultad de Arquitectura y Diseño');
INSERT INTO `facultades` VALUES (3, 'Facultad de Ingeniería Civil');
INSERT INTO `facultades` VALUES (4, 'Facultad de Ciencias Químicas');

-- ----------------------------
-- Table structure for generaciones
-- ----------------------------
DROP TABLE IF EXISTS `generaciones`;
CREATE TABLE `generaciones`  (
  `id_generacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_generacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_generacion`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of generaciones
-- ----------------------------
INSERT INTO `generaciones` VALUES (1, '2016-2020');
INSERT INTO `generaciones` VALUES (2, '2017-2021');
INSERT INTO `generaciones` VALUES (3, '2018-2022');
INSERT INTO `generaciones` VALUES (4, '2019-2023');

-- ----------------------------
-- Table structure for niveles
-- ----------------------------
DROP TABLE IF EXISTS `niveles`;
CREATE TABLE `niveles`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `semestre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `grupo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `numcontrol` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nivel` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `idnivel`(`id`) USING BTREE,
  INDEX `numcontrol`(`numcontrol`) USING BTREE,
  CONSTRAINT `niveles_ibfk_1` FOREIGN KEY (`numcontrol`) REFERENCES `profesores` (`numcontrol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of niveles
-- ----------------------------
INSERT INTO `niveles` VALUES (1, '7', 'B', '4522', NULL);
INSERT INTO `niveles` VALUES (9, '7', 'D', '5747', NULL);
INSERT INTO `niveles` VALUES (10, '1', 'D', '5747', NULL);
INSERT INTO `niveles` VALUES (12, '3', 'D', '5747', NULL);
INSERT INTO `niveles` VALUES (13, '5', 'A', '5747', NULL);
INSERT INTO `niveles` VALUES (14, '7', 'A', '5747', NULL);
INSERT INTO `niveles` VALUES (15, '1', 'G', '5747', NULL);
INSERT INTO `niveles` VALUES (16, '3', 'G', '5747', NULL);

-- ----------------------------
-- Table structure for profesores
-- ----------------------------
DROP TABLE IF EXISTS `profesores`;
CREATE TABLE `profesores`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numcontrol` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nombreu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apellidop` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apellidom` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `permisos_acceso` enum('Profesor','Profesor y Tutor','Tutor','Coordinador','Jefe de Carrera','Jefe de Carrera y Tutor','Coordinador y Tutor','Admin','Director') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sub_permiso_acceso` enum('Ninguno','Tutor') CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `status` enum('activo','bloqueado') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'activo',
  `pass_ok` int(1) NOT NULL DEFAULT 0,
  `idFacultad` set('1','2','3','4','0') CHARACTER SET latin1 COLLATE latin1_spanish_ci NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `numcontrol`(`numcontrol`) USING BTREE,
  INDEX `numcontrol_2`(`numcontrol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profesores
-- ----------------------------
INSERT INTO `profesores` VALUES (1, '004', 'Alicia Armantina', 'Galvez', 'Martell', '793741d54b00253006453742ad4ed534', 'armantina@ucol.mx', 'user-default.png', 'Profesor', 'Ninguno', 'activo', 1, '1');
INSERT INTO `profesores` VALUES (2, '009', 'Administrador', 'Admin', 'Admin', '202cb962ac59075b964b07152d234b70', 'admin@sacapi.ucol.mx', 'user-default.png', 'Admin', 'Ninguno', 'activo', 1, '1');
INSERT INTO `profesores` VALUES (3, '1190', 'Conrrado', 'Ochoa', 'Alcantar', '793741d54b00253006453742ad4ed534', 'conrado_ochoa@ucol.mx', 'user-default.png', 'Tutor', 'Tutor', 'activo', 1, '1');
INSERT INTO `profesores` VALUES (4, '127', 'Luis', 'Arvizu', 'Amezcua', '793741d54b00253006453742ad4ed534', 'larvizu@ucol.mx', 'user-default.png', 'Tutor', 'Tutor', 'activo', 0, '1');
INSERT INTO `profesores` VALUES (5, '326', 'Victor Hugo', 'Castillo', 'Topete', '793741d54b00253006453742ad4ed534', 'victorc@ucol.mx', 'user-default.png', 'Coordinador', 'Tutor', 'activo', 1, '1');
INSERT INTO `profesores` VALUES (6, '3464', 'Reyna', 'NoRemember', 'Anguiano', '202cb962ac59075b964b07152d234b70', 'reyna_valladares@ucol.mx', 'user-default.png', 'Director', 'Ninguno', 'activo', 1, '2');
INSERT INTO `profesores` VALUES (7, '3728', 'Luis Eduardo', 'Moran', 'Lopez', '793741d54b00253006453742ad4ed534', 'lmoran72@ucol.mx', 'user-default.png', 'Jefe de Carrera', 'Tutor', 'activo', 1, '1');
INSERT INTO `profesores` VALUES (8, '3731', 'Walter Alexander', 'Mata', 'Lopez', '793741d54b00253006453742ad4ed534', 'wmata@ucol.mx', 'user-default.png', 'Tutor', 'Tutor', 'activo', 0, '1');
INSERT INTO `profesores` VALUES (9, '4330', 'Tiberio', 'Venegas', 'Trujillo', '202cb962ac59075b964b07152d234b70', 'reyna_valladares@ucol.mx', 'user-default.png', 'Director', 'Tutor', 'activo', 1, '1');
INSERT INTO `profesores` VALUES (10, '4486', 'Martha Elizabeth', 'Evangelista', 'Salazar', '533e8b42815421ee970260ae93504560', 'mevangel@ucol.mx', 'user-default.png', 'Tutor', 'Tutor', 'activo', 1, '1');
INSERT INTO `profesores` VALUES (11, '4522', 'Luis Daniel', 'Benavides', 'Sanchez', '202cb962ac59075b964b07152d234b70', 'benvaides@ucol.mx', 'user-default.png', 'Profesor', 'Ninguno', 'activo', 1, '1');
INSERT INTO `profesores` VALUES (12, '4813', 'Oswaldo', 'Carrillo', 'Zepeda', '793741d54b00253006453742ad4ed534', 'oswaldo_carrillo@ucol.mx', 'user-default.png', 'Tutor', 'Tutor', 'activo', 0, '1');
INSERT INTO `profesores` VALUES (13, '5579', 'Apolinar', 'Gonzales', 'Potes', '793741d54b00253006453742ad4ed534', 'apogon@ucol.mx', 'user-default.png', 'Tutor', 'Tutor', 'activo', 0, '1');
INSERT INTO `profesores` VALUES (14, '5747', 'Oscar Octavio', 'Ochoa', 'Zuñiga', '202cb962ac59075b964b07152d234b70', 'oscarochoa@ucol.mx', 'user-default.png', 'Profesor', 'Ninguno', 'activo', 1, '1,2');
INSERT INTO `profesores` VALUES (15, '590', 'Andres Gerardo', 'Fuentes', 'Covarrubias', '793741d54b00253006453742ad4ed534', 'fuentesg@ucol.mx', 'user-default.png', 'Tutor', 'Tutor', 'activo', 0, '1');
INSERT INTO `profesores` VALUES (16, '591', 'Ricardo', 'Fuentes', 'Covarrubias', '793741d54b00253006453742ad4ed534', 'fuentesr@ucol.mx', 'user-default.png', 'Tutor', 'Tutor', 'activo', 0, '1');
INSERT INTO `profesores` VALUES (17, '6353', 'Laura Sanely', 'Gaytan', 'Lugo', '793741d54b00253006453742ad4ed534', 'laura@ucol.mx', 'user-default.png', 'Tutor', 'Tutor', 'activo', 0, '1');
INSERT INTO `profesores` VALUES (18, '6539', 'Pablo Armando', 'Alcaraz', 'Valencia', '793741d54b00253006453742ad4ed534', 'pablo_alcaraz@ucol.mx', 'user-default.png', 'Tutor', 'Tutor', 'activo', 0, '1');
INSERT INTO `profesores` VALUES (19, '7107', 'Nery Alejandro', 'Deniz', 'Galvez', '793741d54b00253006453742ad4ed534', 'nery_deniz@ucol.mx', 'user-default.png', 'Tutor', 'Tutor', 'activo', 0, '1');

-- ----------------------------
-- Table structure for resultados
-- ----------------------------
DROP TABLE IF EXISTS `resultados`;
CREATE TABLE `resultados`  (
  `idresultado` int(7) NOT NULL AUTO_INCREMENT,
  `numcuenta` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `f1` date NULL DEFAULT NULL,
  `pl1` int(5) NULL DEFAULT NULL,
  `ps1` int(5) NULL DEFAULT NULL,
  `pr1` int(5) NULL DEFAULT NULL,
  `pt1` int(5) NULL DEFAULT NULL,
  `f2` date NULL DEFAULT NULL,
  `pl2` int(5) NULL DEFAULT NULL,
  `ps2` int(5) NULL DEFAULT NULL,
  `pr2` int(5) NULL DEFAULT NULL,
  `pt2` int(5) NULL DEFAULT NULL,
  `f3` date NULL DEFAULT NULL,
  `pl3` int(5) NULL DEFAULT NULL,
  `ps3` int(5) NULL DEFAULT NULL,
  `pr3` int(5) NULL DEFAULT NULL,
  `pt3` int(11) NULL DEFAULT NULL,
  `f4` date NULL DEFAULT NULL,
  `pl4` int(5) NULL DEFAULT NULL,
  `ps4` int(5) NULL DEFAULT NULL,
  `pr4` int(5) NULL DEFAULT NULL,
  `pt4` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idresultado`) USING BTREE,
  INDEX `numcontrol`(`numcuenta`) USING BTREE,
  CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`numcuenta`) REFERENCES `alumnos` (`numcuenta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
