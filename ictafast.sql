/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ictafast

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-06-21 21:48:14
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
INSERT INTO `ocorrencia` VALUES ('1', 'À Disposição da Justiça Eleitoral', '03-148');
INSERT INTO `ocorrencia` VALUES ('2', 'Afastamento para Acompanhar Cônjuge ou Companheiro', '03-101');
INSERT INTO `ocorrencia` VALUES ('3', 'Afastamento para Estudos ou Missão no Exterior', '03-111');
INSERT INTO `ocorrencia` VALUES ('4', 'Afastamento para exercício Mandato Eletivo para Prefeito', '03-108');
INSERT INTO `ocorrencia` VALUES ('5', 'Afastamento para exercício Mandato Eletivo para Prefeito', '03-107');
INSERT INTO `ocorrencia` VALUES ('6', 'Afastamento para exercício Mandato Eletivo para Vereador', '03-110');
INSERT INTO `ocorrencia` VALUES ('7', 'Afastamento para exercício Mandato Eletivo para Vereador', '03-109');
INSERT INTO `ocorrencia` VALUES ('8', 'Afastamento para Mandato Federal, Estadual ou Distrital', '03-106');
INSERT INTO `ocorrencia` VALUES ('9', 'Afastamento para Servir a outro Órgão ou Entidade', '03-152');
INSERT INTO `ocorrencia` VALUES ('10', 'Afastamento para Servir em Organismo Internacional', '03-112');
INSERT INTO `ocorrencia` VALUES ('11', 'Afastamento por Inquerito Administrativo', '03-120');
INSERT INTO `ocorrencia` VALUES ('12', 'Afastamento Preventivo', '03-122');
INSERT INTO `ocorrencia` VALUES ('13', 'Afastamento Sindicância', '03-121');
INSERT INTO `ocorrencia` VALUES ('14', 'Alistar como Eleitor', '03-125');
INSERT INTO `ocorrencia` VALUES ('15', 'Aposentadoria', '05-000');
INSERT INTO `ocorrencia` VALUES ('16', 'Atraso ou Saída Antecipada', '03-141');
INSERT INTO `ocorrencia` VALUES ('17', 'Ausência Prevista', '03-050');
INSERT INTO `ocorrencia` VALUES ('18', 'Casamento', '03-126');
INSERT INTO `ocorrencia` VALUES ('19', 'Comparecimento a Congresso, Conferência ou Similares', '03-145');
INSERT INTO `ocorrencia` VALUES ('20', 'Compensação', '00-001');
INSERT INTO `ocorrencia` VALUES ('21', 'Condenação a Pena Privativa de Liberdade', '03-128');
INSERT INTO `ocorrencia` VALUES ('22', 'Curso - ESG', '03-139');
INSERT INTO `ocorrencia` VALUES ('23', 'Demissão', '02-114');
INSERT INTO `ocorrencia` VALUES ('24', 'Deslocamento para Nova Sede', '03-151');
INSERT INTO `ocorrencia` VALUES ('25', 'Doação Voluntária de Sangue', '03-124');
INSERT INTO `ocorrencia` VALUES ('26', 'Exclusão por Decisão Judicial', '02-110');
INSERT INTO `ocorrencia` VALUES ('27', 'Exoneração Cargo Comissionado', '02-108');
INSERT INTO `ocorrencia` VALUES ('28', 'Exoneração Cargo Comissionado', '02-109');
INSERT INTO `ocorrencia` VALUES ('29', 'Exoneração Cargo Efetivo, à pedido', '02-105');
INSERT INTO `ocorrencia` VALUES ('30', 'Exoneração Cargo Efetivo', '02-106');
INSERT INTO `ocorrencia` VALUES ('31', 'Exoneração Cargo Efetivo', '02-107');
INSERT INTO `ocorrencia` VALUES ('32', 'Falecimento do Servidor', '02-101');
INSERT INTO `ocorrencia` VALUES ('33', 'Falecimento', '03-127');
INSERT INTO `ocorrencia` VALUES ('34', 'Falta Justificada', '03-143');
INSERT INTO `ocorrencia` VALUES ('35', 'Falta não Justificada', '03-142');
INSERT INTO `ocorrencia` VALUES ('36', 'Falta por Greve', '03-146');
INSERT INTO `ocorrencia` VALUES ('37', 'Férias', '03-144');
INSERT INTO `ocorrencia` VALUES ('38', 'Hora-Extra', '00-002');
INSERT INTO `ocorrencia` VALUES ('39', 'Inquérito Policial', '03-008');
INSERT INTO `ocorrencia` VALUES ('40', 'Júri', '03-147');
INSERT INTO `ocorrencia` VALUES ('41', 'Licença Adoção ou Guarda Judicial', '03-115');
INSERT INTO `ocorrencia` VALUES ('42', 'Licença Adoção ou Guarda Judicial', '03-149');
INSERT INTO `ocorrencia` VALUES ('43', 'Licença Gestante', '03-114');
INSERT INTO `ocorrencia` VALUES ('44', 'Licença para Atividade Política', '03-137');
INSERT INTO `ocorrencia` VALUES ('45', 'Licença para Atividade Política', '03-136');
INSERT INTO `ocorrencia` VALUES ('46', 'Licença para o Desempenho de Mandato Classista', '03-105');
INSERT INTO `ocorrencia` VALUES ('47', 'Licença para Tratamento da Própria Saúde', '03-113');
INSERT INTO `ocorrencia` VALUES ('48', 'Licença para Trato de Enteresse Particular', '03-104');
INSERT INTO `ocorrencia` VALUES ('49', 'Licença Paternidade', '03-123');
INSERT INTO `ocorrencia` VALUES ('50', 'Licença por Convocação Militar', '03-102');
INSERT INTO `ocorrencia` VALUES ('51', 'Licença por Doença em Pessoa da Família', '03-100');
INSERT INTO `ocorrencia` VALUES ('52', 'Licença por Doença em Pessoa da Família', '03-133');
INSERT INTO `ocorrencia` VALUES ('53', 'Licença por Doença Especificada em Lei', '03-117');
INSERT INTO `ocorrencia` VALUES ('54', 'Licença por Motivo de Acidente em Serviço ou Doença Profissional', '03-116');
INSERT INTO `ocorrencia` VALUES ('55', 'Licença Prêmio por Assiduidade', '03-103');
INSERT INTO `ocorrencia` VALUES ('56', 'Lotação Provisória - Afastamento para Acompanhar Cônjuge ou Companheiro', '03-135');
INSERT INTO `ocorrencia` VALUES ('57', 'Participação em Competição Desportiva Nacional ou Exterior', '03-129');
INSERT INTO `ocorrencia` VALUES ('58', 'Participação em Processo de Liquidação em Outro Órgão', '03-138');
INSERT INTO `ocorrencia` VALUES ('59', 'Participação em Programa de Treinamento', '03-130');
INSERT INTO `ocorrencia` VALUES ('60', 'Penalidade Disciplinar', '03-119');
INSERT INTO `ocorrencia` VALUES ('61', 'Posse em outro Cargo Inacumulável', '02-122');
INSERT INTO `ocorrencia` VALUES ('62', 'Redistribuição', '02-100');
INSERT INTO `ocorrencia` VALUES ('63', 'Remoção à Pedido', '02-103');
INSERT INTO `ocorrencia` VALUES ('64', 'Remoção de Ofício', '02-104');
INSERT INTO `ocorrencia` VALUES ('65', 'Retorno ao Órgão de Origem', '02-102');
INSERT INTO `ocorrencia` VALUES ('66', 'Suspensão Disciplinar', '03-118');
INSERT INTO `ocorrencia` VALUES ('67', 'Transferência à Pedido', '02-111');
INSERT INTO `ocorrencia` VALUES ('68', 'Transferência de Ofício', '02-112');
INSERT INTO `ocorrencia` VALUES ('69', 'Viagem à Serviço', '03-150');
INSERT INTO `ocorrencia` VALUES ('70', 'Acidente de Trabalho - CLT', '03-030');
INSERT INTO `ocorrencia` VALUES ('71', 'Aposentadoria Pelo INSS - CLT', '02-031');
INSERT INTO `ocorrencia` VALUES ('72', 'Auxílio Doença - CLT', '03-029');
INSERT INTO `ocorrencia` VALUES ('73', 'Casamento - CLT', '03-037');
INSERT INTO `ocorrencia` VALUES ('74', 'Demissão - CLT', '02-011');
INSERT INTO `ocorrencia` VALUES ('75', 'Dispensa de Emprego por Justa causa - CLT', '02-010');
INSERT INTO `ocorrencia` VALUES ('76', 'Dispensa de Emprego a Pedido - CLT', '02-017');
INSERT INTO `ocorrencia` VALUES ('77', 'Dispensa de Emprego sem Justa Causa - CLT', '02-009');
INSERT INTO `ocorrencia` VALUES ('78', 'Falecimento Pessoa da Família - CLT', '03-040');
INSERT INTO `ocorrencia` VALUES ('79', 'Licença Gestante - CLT', '03-014');
INSERT INTO `ocorrencia` VALUES ('80', 'Licença Para Tratamento de Saúde - CLT', '03-018');
INSERT INTO `ocorrencia` VALUES ('81', 'Suspensão Contrato de Trabalho - CLT', '03-041');
INSERT INTO `ocorrencia` VALUES ('82', 'Término de contrato - CLT', '02-030');

-- ----------------------------
-- Table structure for `servidor`
-- ----------------------------
DROP TABLE IF EXISTS `servidor`;
CREATE TABLE `servidor` (
  `id_servidor` int(11) NOT NULL,
  `nome_servidor` varchar(200) NOT NULL,
  `siape_servidor` varchar(200) DEFAULT NULL,
  `curso_servidor` varchar(200) DEFAULT NULL,
  `email_servidor` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_servidor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of servidor
-- ----------------------------
