/*
Navicat MySQL Data Transfer

Source Server         : SyabeTech-Group
Source Server Version : 50719
Source Host           : 192.168.1.100:3306
Source Database       : campagne_bd

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2020-08-16 23:17:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `access`
-- ----------------------------
DROP TABLE IF EXISTS `access`;
CREATE TABLE `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accessId` varchar(36) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expiredOn` timestamp NULL DEFAULT NULL,
  `membreId` varchar(36) NOT NULL,
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `membreId` (`membreId`),
  CONSTRAINT `access_ibfk_1` FOREIGN KEY (`membreId`) REFERENCES `membre` (`membreId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of access
-- ----------------------------
INSERT INTO `access` VALUES ('1', 'e7bc75aa-f07d-4406-862f-d55057a50dea', 'moktar', 'test', '2020-08-16 23:12:38', null, 'dfb9effd-f12f-407b-e0e4-11b68e8e5ad9', '1');
INSERT INTO `access` VALUES ('3', 'e274de4c-861c-4329-8329-83d5cfc9065d', 'dramane', 'dos', '2020-08-16 23:12:38', null, 'd2c15f10-9753-48d1-a6cb-9570d5e17bb1', '1');

-- ----------------------------
-- Table structure for `affectation`
-- ----------------------------
DROP TABLE IF EXISTS `affectation`;
CREATE TABLE `affectation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `affectationId` varchar(36) NOT NULL,
  `acteurId` varchar(36) NOT NULL COMMENT 'porte l''iddu coordinateur ou de l''animateur',
  `blocId` varchar(36) NOT NULL COMMENT 'comporte le comite de base ou la section',
  `type` int(2) NOT NULL COMMENT '1 pour comité de base / 2 pour section',
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `affectationId` (`affectationId`),
  KEY `acteurId` (`acteurId`),
  KEY `blocId` (`blocId`),
  CONSTRAINT `affectation_ibfk_1` FOREIGN KEY (`acteurId`) REFERENCES `membre` (`membreId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of affectation
-- ----------------------------
INSERT INTO `affectation` VALUES ('1', '51543d99-45f1-4374-81cb-0e4761f0627c', 'd2c15f10-9753-48d1-a6cb-9570d5e17bb1', '42db2a67-5072-46d7-8a73-667edc0b98ce', '2', '1', 'IdConnectedUser', '2020-08-16 22:49:18');
INSERT INTO `affectation` VALUES ('2', 'f8e24ab2-71de-416a-eaac-785fdb7ea4ab', 'd2c15f10-9753-48d1-a6cb-9570d5e17bb1', '82f270d7-bb6c-44a8-8fd0-5a2d64acd58a', '1', '1', 'IdConnectedUser', '2020-08-16 22:50:36');

-- ----------------------------
-- Table structure for `affectationmission`
-- ----------------------------
DROP TABLE IF EXISTS `affectationmission`;
CREATE TABLE `affectationmission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `affectationMissionId` varchar(36) NOT NULL,
  `missionId` varchar(36) NOT NULL,
  `membreId` varchar(36) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `affectationMissionId` (`affectationMissionId`),
  KEY `missionId` (`missionId`),
  KEY `membreId` (`membreId`),
  CONSTRAINT `affectationmission_ibfk_1` FOREIGN KEY (`membreId`) REFERENCES `membre` (`membreId`),
  CONSTRAINT `affectationmission_ibfk_2` FOREIGN KEY (`missionId`) REFERENCES `mission` (`missionId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of affectationmission
-- ----------------------------
INSERT INTO `affectationmission` VALUES ('1', 'ebedb63b-09a2-4d56-a242-d68e33777625', 'ca4a68ed-3455-436e-b138-89d14e5edf13', 'dfb9effd-f12f-407b-e0e4-11b68e8e5ad9', '1', 'IdConnectedUser', '2020-08-16 22:33:57');
INSERT INTO `affectationmission` VALUES ('2', '6152644a-d7d0-4e61-e61c-9a15a2f20165', '5cb5be98-90b3-4c9d-a98b-0b831c99b431', '70943234-1c2a-4f66-c22a-2cb708cc9d6a', '1', 'IdConnectedUser', '2020-08-16 22:34:25');

-- ----------------------------
-- Table structure for `campagne`
-- ----------------------------
DROP TABLE IF EXISTS `campagne`;
CREATE TABLE `campagne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campagneId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `campagneId` (`campagneId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of campagne
-- ----------------------------
INSERT INTO `campagne` VALUES ('1', 'fad183d5-21b7-41f3-a736-db7895cfc859', 'Campagne 2020', '1', 'IdConnectedUser', '2020-08-16 18:43:56');
INSERT INTO `campagne` VALUES ('2', 'b6a9842b-e57c-4081-c1d5-701e4e759acf', 'Campagne 2025', '1', 'IdConnectedUser', '2020-08-16 18:44:02');
INSERT INTO `campagne` VALUES ('3', 'fe943835-9497-4cb8-af53-22b776773e9f', 'Campagne 2015', '1', 'IdConnectedUser', '2020-08-16 18:44:06');
INSERT INTO `campagne` VALUES ('4', '5ef8bdf1-da3f-4b1f-ade0-8ec2ead56923', 'Campagne 2030', '1', 'IdConnectedUser', '2020-08-16 18:44:10');

-- ----------------------------
-- Table structure for `checklist`
-- ----------------------------
DROP TABLE IF EXISTS `checklist`;
CREATE TABLE `checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkListId` varchar(36) NOT NULL,
  `affectationMissionId` varchar(36) NOT NULL,
  `membreId` varchar(36) NOT NULL,
  `etat` int(2) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `checkListId` (`checkListId`),
  KEY `affectionMissionId` (`affectationMissionId`),
  KEY `membreId` (`membreId`),
  CONSTRAINT `checklist_ibfk_1` FOREIGN KEY (`affectationMissionId`) REFERENCES `affectationmission` (`affectationMissionId`),
  CONSTRAINT `checklist_ibfk_2` FOREIGN KEY (`membreId`) REFERENCES `membre` (`membreId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of checklist
-- ----------------------------
INSERT INTO `checklist` VALUES ('1', '64629724-8a8b-45a2-bf97-55a1a5252740', 'ebedb63b-09a2-4d56-a242-d68e33777625', 'd2c15f10-9753-48d1-a6cb-9570d5e17bb1', '0', '1', 'IdConnectedUser', '2020-08-16 22:40:20');
INSERT INTO `checklist` VALUES ('2', '3ba85008-6f72-4c99-a5b8-3cc8b3e0c6a7', 'ebedb63b-09a2-4d56-a242-d68e33777625', 'dfb9effd-f12f-407b-e0e4-11b68e8e5ad9', '1', '1', 'IdConnectedUser', '2020-08-16 22:40:40');

-- ----------------------------
-- Table structure for `comitebase`
-- ----------------------------
DROP TABLE IF EXISTS `comitebase`;
CREATE TABLE `comitebase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comiteBaseId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `code` varchar(36) NOT NULL,
  `partiId` varchar(36) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comiteBaseId` (`comiteBaseId`),
  KEY `partiId` (`partiId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comitebase
-- ----------------------------
INSERT INTO `comitebase` VALUES ('1', 'e37ea9fc-f1fc-44cf-adab-a4964bc8993f', 'Angre Chateau', 'CS Angre Chateau', '7be5fa60-65d0-4843-a2a6-b4cc87046af3', '1', 'IdConnectedUser', '2020-08-16 16:30:55');
INSERT INTO `comitebase` VALUES ('2', '82f270d7-bb6c-44a8-8fd0-5a2d64acd58a', 'Angre 8 Tranche', 'CS Angre 8 Tranche', '7be5fa60-65d0-4843-a2a6-b4cc87046af3', '1', 'IdConnectedUser', '2020-08-16 16:31:23');
INSERT INTO `comitebase` VALUES ('3', 'da4e879b-5d36-4c5d-c53f-8f98b42cff36', 'Cocody Centre ', 'CS Cocody Centre', '7be5fa60-65d0-4843-a2a6-b4cc87046af3', '1', 'IdConnectedUser', '2020-08-16 16:33:17');
INSERT INTO `comitebase` VALUES ('4', '44ec4f27-14e7-4d60-86f4-39cbe6e88e12', 'Angre Oscar', 'CS Angre Oscar', '7be5fa60-65d0-4843-a2a6-b4cc87046af3', '1', 'IdConnectedUser', '2020-08-16 19:09:02');

-- ----------------------------
-- Table structure for `commune`
-- ----------------------------
DROP TABLE IF EXISTS `commune`;
CREATE TABLE `commune` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `communeId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `sousPrefectureId` varchar(36) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `communeId` (`communeId`),
  KEY `sousPrefectureId` (`sousPrefectureId`),
  CONSTRAINT `commune_ibfk_1` FOREIGN KEY (`sousPrefectureId`) REFERENCES `sousprefecture` (`sousPrefectureId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of commune
-- ----------------------------
INSERT INTO `commune` VALUES ('2', 'fad183d5-21b7-41f3-a736-db7895cfc878', 'Yopougon', 'fad176d5-21b7-41f3-a736-db5645cfc999', '1', 'IdConnectedUser', '2020-08-16 21:06:57');

-- ----------------------------
-- Table structure for `departement`
-- ----------------------------
DROP TABLE IF EXISTS `departement`;
CREATE TABLE `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departementId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `regionId` varchar(36) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `departementId` (`departementId`),
  KEY `regionId` (`regionId`),
  CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`regionId`) REFERENCES `region` (`regionId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of departement
-- ----------------------------
INSERT INTO `departement` VALUES ('1', 'fad176d5-21b7-41f3-a736-db5645cfc262', 'Abidjan', 'fad183d5-21b7-41f3-a736-db5645cfc262', '1', 'IdConnectedUser', '2020-08-16 21:09:57');

-- ----------------------------
-- Table structure for `district`
-- ----------------------------
DROP TABLE IF EXISTS `district`;
CREATE TABLE `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `districtId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `districtId` (`districtId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of district
-- ----------------------------
INSERT INTO `district` VALUES ('1', 'fad183d5-21b7-41f3-a736-db7895cfc262', 'Abidjan', '1', 'IdConnectedUser', '2020-08-16 21:07:50');

-- ----------------------------
-- Table structure for `lieuvote`
-- ----------------------------
DROP TABLE IF EXISTS `lieuvote`;
CREATE TABLE `lieuvote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lieuVoteId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `communeId` varchar(36) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `lieuVoteId` (`lieuVoteId`),
  KEY `communeId` (`communeId`),
  CONSTRAINT `lieuvote_ibfk_1` FOREIGN KEY (`communeId`) REFERENCES `commune` (`communeId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lieuvote
-- ----------------------------
INSERT INTO `lieuvote` VALUES ('1', 'gsd183d5-21b7-41f3-a736-db7895cfc878', 'G S ADAHOU EXTENTION 1- 2', 'fad183d5-21b7-41f3-a736-db7895cfc878', '1', 'IdConnectedUser', '2020-08-16 22:15:17');

-- ----------------------------
-- Table structure for `membre`
-- ----------------------------
DROP TABLE IF EXISTS `membre`;
CREATE TABLE `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membreId` varchar(36) NOT NULL,
  `numeroElecteur` varchar(36) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(36) DEFAULT NULL,
  `sex` char(10) NOT NULL,
  `communeId` varchar(36) NOT NULL,
  `lieuVoteId` varchar(36) DEFAULT NULL,
  `dateNaissance` varchar(15) NOT NULL,
  `lieuNaissance` varchar(255) NOT NULL,
  `adressePhysique` varchar(255) DEFAULT NULL,
  `adressePostale` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `nomPere` varchar(255) DEFAULT NULL,
  `prenomPere` varchar(255) DEFAULT NULL,
  `dateNaissancePere` varchar(15) DEFAULT NULL,
  `lieuNaissancePere` varchar(255) DEFAULT NULL,
  `nomMere` varchar(255) DEFAULT NULL,
  `prenomMere` varchar(255) DEFAULT NULL,
  `dateNaissanceMere` varchar(15) DEFAULT NULL,
  `lieuNaissanceMere` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `membreId` (`membreId`),
  KEY `communeId` (`communeId`),
  KEY `lieuVoteId` (`lieuVoteId`),
  CONSTRAINT `membre_ibfk_2` FOREIGN KEY (`communeId`) REFERENCES `commune` (`communeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of membre
-- ----------------------------
INSERT INTO `membre` VALUES ('1', 'd2c15f10-9753-48d1-a6cb-9570d5e17bb1', null, 'Ouattara', 'Sefon Dramane', null, null, 'M', 'fad183d5-21b7-41f3-a736-db7895cfc878', null, '16/03/1989', 'GUIGLO', null, '225', null, null, null, null, null, null, null, null, null, '1', 'IdConnectedUser', '2020-08-16 21:46:41');
INSERT INTO `membre` VALUES ('2', '70943234-1c2a-4f66-c22a-2cb708cc9d6a', null, 'Bamba', 'Aboubacar', 'aboubacarbamba@gmail.com', null, 'M', 'fad183d5-21b7-41f3-a736-db7895cfc878', null, '03/05/1989', 'ABIDJAN', null, '225', null, null, null, null, null, null, null, null, null, '1', 'IdConnectedUser', '2020-08-16 21:47:36');
INSERT INTO `membre` VALUES ('3', 'dfb9effd-f12f-407b-e0e4-11b68e8e5ad9', 'V 0065 2924 53', 'Diomande', 'Diomande', 'diomandemoktar@gmail.com', '48788996', 'M', 'fad183d5-21b7-41f3-a736-db7895cfc878', 'gsd183d5-21b7-41f3-a736-db7895cfc878', '14/07/1991', 'ABIDJAN', 'Cocody Chateau', ' BP 512 AGBOVILLE', 'Ingenieur Informaticien', '14/07/1900', 'Diomande', 'Issa', 'Issa', 'Bamba', 'Salie', '14/07/1910', '14/07/1910', '1', 'IdConnectedUser', '2020-08-16 21:48:07');

-- ----------------------------
-- Table structure for `mission`
-- ----------------------------
DROP TABLE IF EXISTS `mission`;
CREATE TABLE `mission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `missionId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `checkList` int(2) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `missionId` (`missionId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mission
-- ----------------------------
INSERT INTO `mission` VALUES ('1', 'ca4a68ed-3455-436e-b138-89d14e5edf13', 'Appels', '1', '1', 'IdConnectedUser', '2020-08-16 18:25:21');
INSERT INTO `mission` VALUES ('2', '7faec963-b6c2-4b56-d428-39da0959b877', 'Porte à Porte', '1', '1', 'IdConnectedUser', '2020-08-16 18:25:36');
INSERT INTO `mission` VALUES ('3', '5cb5be98-90b3-4c9d-a98b-0b831c99b431', 'Vote Verification', '1', '1', 'IdConnectedUser', '2020-08-16 18:28:11');
INSERT INTO `mission` VALUES ('4', 'eca285ae-ced6-4d7b-d41a-bbcdc04aa8d0', 'Affiches', '0', '1', 'IdConnectedUser', '2020-08-16 18:29:39');
INSERT INTO `mission` VALUES ('5', '66a9e578-3f28-4caf-8cc7-8d5d1ab198e2', 'Collecte Information', '0', '1', 'IdConnectedUser', '2020-08-16 18:30:13');

-- ----------------------------
-- Table structure for `objectif`
-- ----------------------------
DROP TABLE IF EXISTS `objectif`;
CREATE TABLE `objectif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objectifId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `code` varchar(36) NOT NULL,
  `valeur` double NOT NULL,
  `campagneId` varchar(36) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `objectifId` (`objectifId`),
  KEY `campagneId` (`campagneId`),
  CONSTRAINT `objectif_ibfk_1` FOREIGN KEY (`campagneId`) REFERENCES `campagne` (`campagneId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of objectif
-- ----------------------------
INSERT INTO `objectif` VALUES ('1', '947c5d1b-3042-4f36-f6e8-0c813ed311af', 'Electeur', 'ELT', '3000000', 'fad183d5-21b7-41f3-a736-db7895cfc859', '1', 'IdConnectedUser', '2020-08-16 19:25:53');
INSERT INTO `objectif` VALUES ('2', '3b288cab-81e9-44f8-f764-7c412c3eb5dd', 'Voteur', 'VT', '2400000', 'fad183d5-21b7-41f3-a736-db7895cfc859', '1', 'IdConnectedUser', '2020-08-16 19:26:45');

-- ----------------------------
-- Table structure for `parti`
-- ----------------------------
DROP TABLE IF EXISTS `parti`;
CREATE TABLE `parti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partiId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `partiId` (`partiId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of parti
-- ----------------------------
INSERT INTO `parti` VALUES ('1', '7be5fa60-65d0-4843-a2a6-b4cc87046af3', 'RHDP', '1', 'IdConnectedUser', '2020-08-16 18:50:58');
INSERT INTO `parti` VALUES ('2', 'ce2825dd-f025-43c6-f133-55626c492ebe', 'PDCI', '1', 'IdConnectedUser', '2020-08-16 18:51:06');
INSERT INTO `parti` VALUES ('3', 'f6d3a4f8-4897-4c55-f772-fcb32bc2b2ff', 'FPI', '1', 'IdConnectedUser', '2020-08-16 18:51:11');

-- ----------------------------
-- Table structure for `region`
-- ----------------------------
DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regionId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `districtId` varchar(36) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `regionId` (`regionId`),
  KEY `districtId` (`districtId`),
  CONSTRAINT `region_ibfk_1` FOREIGN KEY (`districtId`) REFERENCES `district` (`districtId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of region
-- ----------------------------
INSERT INTO `region` VALUES ('1', 'fad183d5-21b7-41f3-a736-db5645cfc262', 'Abidjan', 'fad183d5-21b7-41f3-a736-db7895cfc262', '1', 'IdConnectedUser', '2020-08-16 21:09:00');

-- ----------------------------
-- Table structure for `section`
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sectionId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `code` varchar(36) NOT NULL,
  `comiteBaseId` varchar(36) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sectionId` (`sectionId`),
  KEY `comiteBaseId` (`comiteBaseId`),
  CONSTRAINT `section_ibfk_1` FOREIGN KEY (`comiteBaseId`) REFERENCES `comitebase` (`comiteBaseId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES ('1', '42db2a67-5072-46d7-8a73-667edc0b98ce', 'Section Angre Chateau Mosque', 'SEC Angre Chateau Mosque', 'e37ea9fc-f1fc-44cf-adab-a4964bc8993f', '1', 'IdConnectedUser', '2020-08-16 17:58:03');
INSERT INTO `section` VALUES ('2', 'dc053105-87c2-4c28-d83e-d711a6fc1c0e', 'Section Angre Chateau Lycée Moderne', 'SEC Angre Chateau Lycée Moderne', '82f270d7-bb6c-44a8-8fd0-5a2d64acd58a', '1', 'IdConnectedUser', '2020-08-16 17:58:22');
INSERT INTO `section` VALUES ('3', 'f6eed30b-d06e-49fd-bc44-1f06bc61236c', 'Section Angre Phamarcie 8 Tranche', 'SEC Angre Phamarcie 8 Tranche', '82f270d7-bb6c-44a8-8fd0-5a2d64acd58a', '1', 'IdConnectedUser', '2020-08-16 17:59:08');
INSERT INTO `section` VALUES ('4', 'b1c9391c-2dff-479a-f71b-1e2371a845dc', 'Section Cocody St Jean', 'SEC Cocody St Jean', 'da4e879b-5d36-4c5d-c53f-8f98b42cff36', '1', 'IdConnectedUser', '2020-08-16 18:02:18');

-- ----------------------------
-- Table structure for `sousprefecture`
-- ----------------------------
DROP TABLE IF EXISTS `sousprefecture`;
CREATE TABLE `sousprefecture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sousPrefectureId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `departementId` varchar(36) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sousPrefectureId` (`sousPrefectureId`),
  KEY `departementId` (`departementId`),
  CONSTRAINT `sousprefecture_ibfk_1` FOREIGN KEY (`departementId`) REFERENCES `departement` (`departementId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sousprefecture
-- ----------------------------
INSERT INTO `sousprefecture` VALUES ('1', 'fad176d5-21b7-41f3-a736-db5645cfc999', 'Abidjan', 'fad176d5-21b7-41f3-a736-db5645cfc262', '1', 'IdConnectedUser', '2020-08-16 21:11:28');

-- ----------------------------
-- Table structure for `typemembre`
-- ----------------------------
DROP TABLE IF EXISTS `typemembre`;
CREATE TABLE `typemembre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeMembreId` varchar(36) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `code` varchar(36) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `createdBy` varchar(36) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `typeMembreId` (`typeMembreId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of typemembre
-- ----------------------------
INSERT INTO `typemembre` VALUES ('4', 'd0d9c488-ab48-49e1-a5a2-9f289afe025a', 'Coordinateur', 'CSE', '1', 'IdConnectedUser', '2020-08-16 16:11:21');
INSERT INTO `typemembre` VALUES ('5', '0a29505e-c948-49c6-affb-baa9461b86ea', 'Animateur', 'AS', '1', 'IdConnectedUser', '2020-08-16 16:11:32');
INSERT INTO `typemembre` VALUES ('6', '52959877-a4b9-4333-e54a-abfe420ddec9', 'Militant', 'M', '1', 'IdConnectedUser', '2020-08-16 16:11:48');

-- ----------------------------
-- Procedure structure for `ps_Access`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_Access`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_Access`(IN _accessId varchar(255), IN _pseudo varchar(100),
                                                 IN _password varchar(255), IN _expiredOn timestamp,
                                                 IN _membreId varchar(36), IN _status int(2), IN _action varchar(100))
BEGIN 
	DECLARE membreId VARCHAR(36);	
	IF (_action='Insert') THEN
		INSERT INTO access ( accessId, pseudo, password, createdOn, expiredOn, membreId, status)
		VALUE (_accessId, _pseudo, _password, NOW(), _expiredOn,_membreId, _status);
	END IF;

	IF (_action='UpdateById') THEN
		UPDATE  access
		SET
			password = _password,
			pseudo = _pseudo,
			expiredOn =_expiredOn,
			status = _statut
		WHERE   accessId = _accessId ;
	END IF;

	IF (_action='DeleteById') THEN
		UPDATE  access
		SET status = 0 
		WHERE   accessId = _accessId ;     
	END IF;
	IF (_action='SelectAll') THEN
		SELECT m.*, a.accessId,a.expiredOn, a.password, a.pseudo, a.status as etatAccess
		FROM access a 
		INNER JOIN membre m ON m.membreId = a.membreId 
		WHERE a.status = 1;     
	END IF;
	IF (_action='Connect') THEN
		SET membreId = (SELECT a.membreId 
		FROM access a
		INNER JOIN membre m ON m.membreId = a.membreId
		WHERE a.status =_status AND password = _password AND (pseudo = _pseudo OR m.contact = _pseudo OR email = _pseudo));
		IF membreId IS NOT NULL 
		THEN
		SELECT m.*, a.password, a.pseudo, a.accessId, a.status as etatAccess
		FROM access a
		INNER JOIN membre m ON m.membreId = a.membreId
		WHERE m.membreId = membreId;
	ELSE
		SELECT 1;
	END IF;
	END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `ps_Affectation`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_Affectation`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_Affectation`(IN _affectationId varchar(36), IN _acteurId varchar(36),
                                                      IN _blocId varchar(36), IN _type int(2),
                                                      IN _createdBy varchar(36), IN _action varchar(100))
BEGIN
	#Routine body goes here...
	IF (_action='Insert') THEN
		INSERT INTO affectation (affectationId, acteurId, blocId, type, createdBy)
		VALUES (_affectationId, _acteurId, _blocId, _type, _createdBy);
	END IF;
	IF (_action='UpdateById') THEN
		UPDATE affectation
		SET 
			affectationId = _affectationId,
			acteurId = _acteurId,
			blocId = _blocId,
			type = _type
		WHERE affectationId=_affectationId;
	END IF;
    IF (_Action='DeleteById') THEN
			UPDATE affectation
			SET
				status=0 
			WHERE   affectationId =_affectationId ;     
		END IF;
	IF ((_action='SelectAll') AND (_type=1)) THEN
			SELECT a.*, m.nom, m.prenom, c.libelle
			FROM affectation a
			INNER JOIN comitebase c ON a.blocId = c.comiteBaseId
			INNER JOIN membre m  ON m.membreId = a.acteurId
            WHERE a.status=1;
	END IF;
    IF ((_action='SelectAll') AND (_type=2)) THEN
			SELECT a.*, m.nom, m.prenom, s.libelle
			FROM affectation a
			INNER JOIN section s ON a.blocId = s.comiteBaseId
			INNER JOIN membre m  ON m.membreId = a.acteurId
            WHERE a.status=1;
	END IF;
	IF ((_action='SelectById' AND (_type=1))) THEN
			SELECT a.*, m.nom, m.prenom, c.libelle
			FROM affectation a
			INNER JOIN comitebase c ON a.blocId = c.comiteBaseId
			INNER JOIN membre m  ON m.membreId = a.acteurId
            WHERE a.affectationId = _affectationID AND a.status=1;
	END IF;
    IF ((_action='SelectById' AND (_type=2))) THEN
			SELECT a.*, m.nom, m.prenom, s.libelle
			FROM affectation a
			INNER JOIN section s ON a.blocId = s.comiteBaseId
			INNER JOIN membre m  ON m.membreId = a.acteurId
            WHERE a.affectationId = _affectationID AND a.status=1;
	END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `ps_AffectationMission`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_AffectationMission`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_AffectationMission`(IN _affectationMissionId varchar(36),
                                                             IN _missionId varchar(36), IN _membreId varchar(36),
                                                             IN _createdBy varchar(36), IN _action varchar(100))
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO affectationMission (affectationMissionId, missionId,membreId,createdBy) 

        VALUES (_affectationMissionId, _missionId,_membreId,_createdBy); 

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE affectationMission 

        SET  

            affectationMissionId = _affectationMissionId, 

            missionId = _missionId,

            membreId=_membreId

        WHERE affectationMissionId=_affectationMissionId; 

    END IF; 

    IF (_action='DeleteById') THEN 

            UPDATE affectationMission 

            SET 

                status=0  

            WHERE   affectationMissionId =_affectationMissionId ; 

        END IF; 

 
 

        IF (_action='SelectAll') THEN 

            SELECT affectationMission.*,mission.libelle AS Aff_lib,membre.nom AS AffM_Membre
            			FROM affectationMission
    		INNER JOIN mission ON mission.missionId = affectationMission.missionId
			INNER JOIN membre ON membre.membreId = affectationMission.membreId
			where affectationMission.status=1;

    END IF; 

 
 

    IF (_Action='SelectById') THEN 

             SELECT affectationMission.*,mission.libelle AS Aff_lib,membre.nom AS AffM_Membre
            			FROM affectationMission
    		INNER JOIN mission ON mission.missionId = affectationMission.missionId
			INNER JOIN membre ON membre.membreId = affectationMission.membreId


                    WHERE affectationMission.affectationMissionId = _affectationMissionId and affectationMission.status=1; 

    END IF; 
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `ps_Campagne`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_Campagne`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_Campagne`(IN `_campagneId` VARCHAR(36), IN `_libelle` VARCHAR(255), IN `_createdBy` VARCHAR(36), IN `_action` VARCHAR(100))
    NO SQL
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO campagne (campagneId, libelle, createdBy) 

        VALUES (_campagneId, _libelle, _createdBy); 

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE campagne 

        SET  

            campagneId = _campagneId, 

            libelle = _libelle

        WHERE campagneId=_campagneId; 

    END IF; 

    IF (_action='DeleteById') THEN 

            UPDATE campagne 

            SET 

                status=0  

            WHERE   campagneId =_campagneId; 

        END IF; 

 
 

        IF (_action='SelectAll') THEN 

            SELECT * FROM campagne
            Where status=1; 

    END IF; 

 
 

    IF (_action='SelectById') THEN 

            SELECT * FROM campagne 

                    WHERE campagne.campagneId = _campagneId
                    and  status=1; 

    END IF; 

 
 

     

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `ps_Checklist`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_Checklist`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_Checklist`(IN _checklistId varchar(36), IN _affectationMissionId varchar(36),
                                                    IN _membreId varchar(36), IN _etat int(2),
                                                    IN _createdBy varchar(36), IN _action varchar(100))
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO checklist (checklistId, affectationMissionId,membreId,etat, createdBy) 

        VALUES (_checklistId, _affectationMissionId,_membreId, _etat, _createdBy); 

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE checklist 

        SET  

            checklistId = _checklistId, 

            affectationMissionId = _affectationMissionId,

            membreId=_membreId,

            etat=_etat

        WHERE checklistId=_checklistId; 

    END IF; 

    IF (_Action='DeleteById') THEN 

            UPDATE checklist 

            SET 

                status=0  

            WHERE   checklistId =_checklistId ; 

        END IF; 

 
 

        IF (_Action='SelectAll') THEN 

            SELECT checklist.*,affectationMission.status AS Check_AfMi,membre.nom AS Check_Membre
            			FROM checklist
    		INNER JOIN affectationMission ON affectationMission.affectationMissionId = checklist.affectationMissionId
			INNER JOIN membre ON membre.membreId = checklist.membreId
            Where checklist.status=1;

    END IF; 

 
 

    IF (_Action='SelectById') THEN 

            SELECT checklist.*,affectationMission.status AS Check_AfMi,membre.nom AS Check_Membre
            			FROM checklist
    		INNER JOIN affectationMission ON affectationMission.affectationMissionId = checklist.affectationMissionId
			INNER JOIN membre ON membre.membreId = checklist.membreId


                    WHERE checklist.checklistId = _checklistId and checklist.status=1=1; 

    END IF; 

 
 

     

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `ps_ComiteBase`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_ComiteBase`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_ComiteBase`(IN _comiteBaseId varchar(36), IN _libelle varchar(255),
                                                     IN _code varchar(36), IN _partiId varchar(36),
                                                     IN _createdBy varchar(36), IN _action varchar(100))
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO comitebase (comiteBaseId, libelle, code, partiId,  createdBy) 

        VALUES (_comiteBaseId, _libelle, _code, _partiId, _createdBy); 

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE comitebase 

        SET  

            comiteBaseId = _comiteBaseId, 

            libelle = _libelle, 
            
            code = _code,
            
            partiId = _partiId

        WHERE comiteBaseId = _comiteBaseId; 

    END IF; 

    IF (_Action='DeleteById') THEN 

            UPDATE comitebase 

            SET 

                status = 0  

            WHERE   comiteBaseId = _comiteBaseId ; 

        END IF; 

 
 

        IF (_Action='SelectAll') THEN 

            SELECT * FROM comitebase
            
            WHERE status = 1; 

    END IF; 

 
 

    IF (_Action='SelectById') THEN 

            SELECT * FROM comitebase

                    WHERE comiteBaseId = _comiteBaseId and status=1; 

    END IF; 
     
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `ps_Membre`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_Membre`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_Membre`(IN `_membreId` VARCHAR(36), IN `_numeroElecteur` VARCHAR(36), IN `_nom` VARCHAR(100), IN `_prenom` VARCHAR(100), IN `_email` VARCHAR(100), IN `_contact` VARCHAR(36), IN `_sex` CHAR(10), IN `_communeId` VARCHAR(36), IN `_lieuVoteId` VARCHAR(36), IN `_dateNaissance` VARCHAR(15), IN `_lieuNaissance` VARCHAR(36), IN `_adressePhysique` VARCHAR(255), IN `_adressePostale` VARCHAR(255), IN `_profession` VARCHAR(255), IN `_nomPere` VARCHAR(255), IN `_prenomPere` VARCHAR(255), IN `_dateNaissancePere` VARCHAR(15), IN `_lieuNaissancePere` VARCHAR(255), IN `_nomMere` VARCHAR(255), IN `_prenomMere` VARCHAR(255), IN `_dateNaissanceMere` VARCHAR(15), IN `_lieuNaissanceMere` VARCHAR(255), IN `_createdBy` VARCHAR(36), IN `_action` VARCHAR(36))
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO membre (membreId,numeroElecteur,nom,prenom,email,contact,sex,communeId,lieuVoteId, dateNaissance,lieuNaissance,adressePhysique,adressePostale,profession,nomPere,prenomPere,dateNaissancePere,lieuNaissancePere, nomMere,prenomMere,dateNaissanceMere,lieuNaissanceMere,createdBy)

        VALUES (_membreId,_numeroElecteur,_nom,_prenom,_email,_contact,_sex,_communeId,_lieuVoteId, _dateNaissance,_lieuNaissance,_adressePhysique,_adressePostale,profession,_nomPere,_prenomPere,_dateNaissancePere,_lieuNaissancePere,_nomMere,_prenomMere,_dateNaissanceMere,_lieuNaissanceMere,_createdBy); 

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE membre 

        SET   
            numeroElecteur=_numeroElecteur,
            nom = _nom, 
            prenom =  _nom ,          
            email = _email,
            contact = _contact,
            sex = _sex,
            communeId = _communeId,
            lieuVoteId = _lieuVoteId,
            dateNaissance = _dateNaissance,
            lieuNaissance = _lieuNaissance,
            adressePhysique = _adressePhysique,
            adressePostale = _adressePostale,
            profession = _profession,
            nomPere = _nomPere,
            prenomPere = _prenomPere,
            dateNaissancePere = _dateNaissancePere,
            lieuNaissancePere = _dateNaissancePere,
            nomMere = _nomMere,
            prenomMere = _prenomMere,
            dateNaissanceMere = _dateNaissanceMere,
            lieuNaissanceMere = _dateNaissanceMere

        WHERE membreId = _membreId; 

    END IF; 

    IF (_action='DeleteById') THEN 

            UPDATE membre 

            SET 

                status = 0  

            WHERE   membreId = _membreId ; 

        END IF; 

 
 

        IF (_action='SelectAll') THEN 

            SELECT membre.*, commune.libelle AS libelleCommune, lieuvote.libelle AS libelleLieuVote 
            FROM membre 
            INNER JOIN commune ON commune.communeId = membre.communeId
            LEFT JOIN lieuvote ON lieuvote.lieuVoteId = membre.lieuVoteId
            WHERE membre.status=1; 

    END IF; 

 
 

    IF (_action='SelectById') THEN 

            SELECT membre.*, commune.libelle AS libelleCommune, lieuvote.libelle AS libelleLieuVote 
            FROM membre 
            INNER JOIN commune ON commune.communeId = membre.communeId
            LEFT JOIN lieuvote ON lieuvote.lieuVoteId = membre.lieuVoteId
            WHERE membre.membreId = _membreId AND membre.status=1; 

    END IF; 

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `ps_Mission`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_Mission`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_Mission`(IN `_missionId` VARCHAR(36), IN `_libelle` VARCHAR(255), IN `_checkList` INT(2), IN `_createdBy` VARCHAR(36), IN `_action` VARCHAR(100))
    NO SQL
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO mission (missionId, libelle, checkList, createdBy) 

        VALUES (_missionId, _libelle,_checklist, _createdBy); 

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE mission 

        SET  

            missionId = _missionId, 

            libelle = _libelle,

            checkList = _checkList

        WHERE missionId = _missionId; 

    END IF; 

    IF (_Action='DeleteById') THEN 

            UPDATE mission 

            SET 

                status=0  

            WHERE   missionId =_missionId ; 

        END IF; 

 
 

        IF (_Action='SelectAll') THEN 

            SELECT * FROM mission
            Where status=1; 

    END IF; 

 
 

    IF (_Action='SelectById') THEN 

            SELECT * FROM mission 

                    WHERE mission.missionId = _missionId and status=1; 

    END IF; 
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `ps_Objectif`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_Objectif`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_Objectif`(IN `_objectifId` VARCHAR(36), IN `_libelle` VARCHAR(255), IN `_code` VARCHAR(36), IN `_valeur` DOUBLE, IN `_campagneId` VARCHAR(36), IN `_createdBy` VARCHAR(36), IN `_action` VARCHAR(100))
    NO SQL
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO objectif (objectifId, libelle, code, valeur, campagneId, createdBy) 

        VALUES (_objectifId, _libelle, _code, _valeur, _campagneId, _createdBy); 

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE objectif 

        SET  
        
            libelle = _libelle, 
            
            code = _code,
            
            valeur = _valeur,
            
            campagneId = _campagneId

        WHERE objectifId = _objectifId; 

    END IF; 

    IF (_action='DeleteById') THEN 

            UPDATE objectif 

            SET 

                status = 0  

            WHERE   objectifId = _objectifId ; 

        END IF; 

 
 

        IF (_Action='SelectAll') THEN 

            SELECT * FROM objectif
            
            WHERE status = 1; 

    END IF; 

 
 

    IF (_Action='SelectById') THEN 

            SELECT * FROM objectif

                    WHERE objectifId = _objectifId and status=1; 

    END IF; 
     
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `ps_Parti`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_Parti`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_Parti`(IN `_partiId` VARCHAR(36), IN `_libelle` VARCHAR(255), IN `_createdBy` VARCHAR(36), IN `_action` VARCHAR(100))
    NO SQL
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO parti (partiId, libelle, createdBy) 

        VALUES (_partiId, _libelle, _createdBy); 

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE parti 

        SET  

            partiId = _partiId, 

            libelle = _libelle

        WHERE partiId=_partiId; 

    END IF; 

    IF (_Action='DeleteById') THEN 

            UPDATE parti 

            SET 

                status=0  

            WHERE   partiId = _partiId ; 

        END IF; 

 
 

        IF (_Action='SelectAll') THEN 

            SELECT * FROM parti
            Where status=1; 

    END IF; 

 
 

    IF (_Action='SelectById') THEN 

            SELECT * FROM parti 

                    WHERE parti.partiId = _partiId and  status=1; 

    END IF; 

 
 

     

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `ps_Section`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_Section`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_Section`(IN `_sectionId` VARCHAR(36), IN `_libelle` VARCHAR(255), IN `_code` VARCHAR(36), IN `_comiteBaseId` VARCHAR(36), IN `_status` INT(2), IN `_createdBy` VARCHAR(36), IN `_action` VARCHAR(100))
    NO SQL
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO section (sectionId, libelle,code,comiteBaseId,createdBy) 

        VALUES (_sectionId, _libelle,_code, _comiteBaseId, _createdBy); 

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE section 

        SET  

            sectionId = _sectionId, 

            libelle = _libelle,

            code=_code,

            comiteBaseId=_comiteBaseId

        WHERE sectionId=_sectionId; 

    END IF; 

    IF (_Action='DeleteById') THEN 

            UPDATE section 

            SET 

                status=0  

            WHERE   sectionId =_sectionId ; 

        END IF; 

 
 

        IF (_Action='SelectAll') THEN 

            SELECT section.*,comiteBase.Libelle AS Sec_Com
            FROM section
    		INNER JOIN comiteBase ON comiteBase.comiteBaseId = section.comiteBaseId
            Where section.status=1;

    END IF; 

 
 

    IF (_Action='SelectById') THEN 

            SELECT section.*, comiteBase.Libelle AS Sec_Com 
            FROM section
            INNER JOIN comiteBase ON comiteBase.comiteBaseId = section.comiteBaseId
            WHERE section.sectionId = _sectionId
				and  section.status=1; 

    END IF; 
     

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `ps_TypeMembre`
-- ----------------------------
DROP PROCEDURE IF EXISTS `ps_TypeMembre`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_TypeMembre`(IN _typeMembreId varchar(36), IN _libelle varchar(255),
                                                     IN _code varchar(36), IN _status int(2), IN _createdBy varchar(36),
                                                     IN _action varchar(100))
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO typeMembre (typeMembreId, libelle,code, status, createdBy) 

        VALUES (_typeMembreId, _libelle,_code, _status, _createdBy); 

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE typeMembre 

        SET  

            typeMembreId = _typeMembreId, 

            libelle = _libelle,

            code=_code, 

            status = _status

        WHERE typeMembreId=_typeMembreId; 

    END IF; 

    IF (_Action='DeleteById') THEN 

            UPDATE typeMembre 

            SET 

                status=0  

            WHERE   typeMembreId =_typeMembreId ; 

        END IF; 

 
 

        IF (_Action='SelectAll') THEN 

            SELECT * FROM typeMembre
            where status = 1; 

    END IF; 

 
 

    IF (_Action='SelectById') THEN 

            SELECT * FROM typeMembre 

                    WHERE typeMembre.typeMembreId = _typeMembreId and status=1; 

    END IF; 

END
;;
DELIMITER ;
