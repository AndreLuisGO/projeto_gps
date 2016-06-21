/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ictafast

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-06-20 22:11:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `administrador`
-- ----------------------------
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `login_administrador` varchar(20) NOT NULL,
  `senha_administrador` varchar(20) NOT NULL,
  `nome_administrador` varchar(200) NOT NULL,
  PRIMARY KEY (`id_administrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of administrador
-- ----------------------------

-- ----------------------------
-- Table structure for `afastamento`
-- ----------------------------
DROP TABLE IF EXISTS `afastamento`;
CREATE TABLE `afastamento` (
  `id_afastamento` int(11) NOT NULL,
  `data_afastamento` date NOT NULL,
  `observ_afastamento` varchar(200) DEFAULT NULL,
  `id_ocorrencia` int(11) NOT NULL,
  `id_servidor` int(11) NOT NULL,
  PRIMARY KEY (`id_afastamento`),
  KEY `FK_afastamento_ocorrencia` (`id_ocorrencia`),
  KEY `FK_afastamento_servidor` (`id_servidor`),
  CONSTRAINT `FK_afastamento_ocorrencia` FOREIGN KEY (`id_ocorrencia`) REFERENCES `ocorrencia` (`id_ocorrencia`) ON UPDATE CASCADE,
  CONSTRAINT `FK_afastamento_servidor` FOREIGN KEY (`id_servidor`) REFERENCES `servidor` (`id_servidor`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of afastamento
-- ----------------------------

-- ----------------------------
-- Table structure for `ocorrencia`
-- ----------------------------
DROP TABLE IF EXISTS `ocorrencia`;
CREATE TABLE `ocorrencia` (
  `id_ocorrencia` int(11) NOT NULL,
  `tipo_ocorrencia` varchar(200) NOT NULL,
  `codigo_ocorrencia` varchar(200) NOT NULL,
  PRIMARY KEY (`id_ocorrencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocorrencia
-- ----------------------------

-- ----------------------------
-- Table structure for `servidor`
-- ----------------------------
DROP TABLE IF EXISTS `servidor`;
CREATE TABLE `servidor` (
  `id_servidor` int(11) NOT NULL,
  `nome_servidor` varchar(200) NOT NULL,
  `siape_servidor` varchar(200) NOT NULL,
  `curso_servidor` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_servidor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of servidor
-- ----------------------------
