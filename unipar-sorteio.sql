-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Servidor: mysql06.uni5.net
-- Tempo de Geração: Out 18, 2012 as 08:55 PM
-- Versão do Servidor: 5.1.63
-- Versão do PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `uniparsorteio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cidade` varchar(250) NOT NULL,
  `uf` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id`, `cidade`, `uf`) VALUES
(1, 'Cianorte', 'PR'),
(2, 'JapurÃ¡ ', 'PR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ganhadores`
--

CREATE TABLE IF NOT EXISTS `ganhadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `pessoa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ganhadores_pessoa1` (`pessoa_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `dtnascimento` date NOT NULL,
  `colegio` varchar(250) DEFAULT NULL,
  `serie` varchar(250) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL,
  `telefone` varchar(250) DEFAULT NULL,
  `sorteado` enum('S','N') DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `turma_id` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pessoa_cidade` (`cidade_id`),
  KEY `fk_pessoa_turma1` (`turma_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `sorteada` enum('S','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;
