-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Dez-2022 às 16:49
-- Versão do servidor: 8.0.27
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `adote_pet`
--

DELIMITER $$
--
-- Procedimentos
--
DROP PROCEDURE IF EXISTS `tutor_cadastrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tutor_cadastrar` (IN `cpf` VARCHAR(20), IN `nome` VARCHAR(100), IN `telefone` VARCHAR(100), IN `email` VARCHAR(100), IN `data_nasc` DATE, IN `cep` VARCHAR(20), IN `uf` CHAR(2), IN `cidade` VARCHAR(100), IN `bairro` VARCHAR(100), IN `logradouro` VARCHAR(100), IN `numero` INT)  INSERT INTO tutor (cpf, nome, telefone, email, data_nasc, cep, uf, cidade, bairro, logradouro, numero) VALUES (cpf, nome, telefone, email, data_nasc, cep, uf, cidade, bairro, logradouro, numero)$$

DROP PROCEDURE IF EXISTS `tutor_consultar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tutor_consultar` (IN `filtro` VARCHAR(20))  SELECT * FROM tutor WHERE
tutor.Id = filtro or tutor.nome LIKE concat('%',filtro,'%') or tutor.cpf LIKE concat('%',filtro,'%') or tutor.email LIKE concat('%',filtro,'%') or tutor.cidade LIKE concat('%',filtro,'%') OR tutor.telefone LIKE concat('%',filtro,'%') OR tutor.cep LIKE concat('%',filtro,'%')$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adocao`
--

DROP TABLE IF EXISTS `adocao`;
CREATE TABLE IF NOT EXISTS `adocao` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `fk_Tutor_Id` int DEFAULT NULL,
  `fk_Pet_Id` int DEFAULT NULL,
  `data_adocao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `fk_Tutor_Id` (`fk_Tutor_Id`),
  KEY `fk_Pet_Id` (`fk_Pet_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `adocao`
--

INSERT INTO `adocao` (`Id`, `fk_Tutor_Id`, `fk_Pet_Id`, `data_adocao`) VALUES
(4, 6, 4, '2022-11-28 10:08:11'),
(5, 6, 2, '2022-11-28 10:08:25'),
(6, 1, 3, '2022-11-29 13:13:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet`
--

DROP TABLE IF EXISTS `pet`;
CREATE TABLE IF NOT EXISTS `pet` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `especie` varchar(100) DEFAULT NULL,
  `animal` varchar(100) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `vacinado` smallint DEFAULT NULL,
  `sobre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`Id`, `nome`, `especie`, `animal`, `data_nasc`, `peso`, `vacinado`, `sobre`) VALUES
(1, 'Pingo', 'Mamífero ', 'Cachorro', '2022-11-01', 1, 1, 'Lindinho'),
(2, 'Piu Pui', 'Aves', 'Galinha (Galo)', '2022-11-25', 0.2, 1, 'Acho que vi um gatinho'),
(3, 'Doke', 'Mamíferos', 'Cão', '2022-10-03', 15, 1, 'Meu cão'),
(4, 'Ralph', 'Mamíferos', 'Cão', '2022-05-18', 12.6, 1, 'Cachorro encontrado na rua.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tutor`
--

DROP TABLE IF EXISTS `tutor`;
CREATE TABLE IF NOT EXISTS `tutor` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(20) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `cpf` (`cpf`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tutor`
--

INSERT INTO `tutor` (`Id`, `cpf`, `nome`, `telefone`, `email`, `data_nasc`, `cep`, `uf`, `cidade`, `bairro`, `logradouro`, `numero`) VALUES
(1, '11122233300', 'Eliton Camargo de Oliveira', '(14)99988-7766', 'elitonoliveira@fatec.sp.gov.br', '1988-11-16', '13550-00', 'SP', 'Tietê', 'Serra', 'Rua Teste', 100),
(2, '21242423432', 'Marcos', '12434252343', 'marcos@gmail.com', '1977-03-01', '3123213', 'MT', 'Teste Mato', 'Não sei', 'Rua dos Esquecimentos', 100),
(6, '555.444.333-66', 'Marcos Silva', '(15)99677-4543', 'marcos.silva@hotmail.com', '2011-01-01', '18530-000', 'SP', 'Tietê', 'Jardim da Serra', 'Rua Joaquim Souza', 50);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `adocao`
--
ALTER TABLE `adocao`
  ADD CONSTRAINT `adocao_ibfk_1` FOREIGN KEY (`fk_Tutor_Id`) REFERENCES `tutor` (`Id`),
  ADD CONSTRAINT `adocao_ibfk_2` FOREIGN KEY (`fk_Pet_Id`) REFERENCES `pet` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
