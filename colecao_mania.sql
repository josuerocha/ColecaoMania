-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Nov-2015 às 00:29
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `colecao_mania`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `conversaatual`
--
CREATE TABLE IF NOT EXISTS `conversaatual` (
`idMensagem` int(10) unsigned
,`idUsuEnvia` int(10) unsigned
,`idUsuRecebe` int(10) unsigned
,`texto` text
,`hora` time
,`data` date
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcolecao`
--

CREATE TABLE IF NOT EXISTS `tbcolecao` (
  `idColecao` int(10) unsigned NOT NULL,
  `idTipoColecao` int(10) unsigned NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `idUsuDono` int(10) unsigned DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbcolecao`
--

INSERT INTO `tbcolecao` (`idColecao`, `idTipoColecao`, `nome`, `descricao`, `idUsuDono`, `status`) VALUES
(1, 2, 'Barcos em Miniatura', 'Barcos em miniaturas', 20, 0),
(2, 1, 'teste', 'teste', 22, 0),
(6, 1, 'teste', 'lll', 20, 0),
(7, 2, 'Tazos Elma Chips', 'Meus tazos', 24, 0),
(8, 2, 'Carrinhos', 'Jornal Super', 22, 1),
(9, 4, 'Tazos Elma Chips', '1999', 22, 1),
(10, 2, 'Barcos', 'Arte da Praia', 24, 1),
(11, 3, 'Selos', '1945', 24, 1),
(12, 1, 'CartÃµes TelefÃ´nicos', 'Diversos', 24, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbevento`
--

CREATE TABLE IF NOT EXISTS `tbevento` (
  `idEvento` int(10) unsigned NOT NULL,
  `idUsuCriador` int(10) unsigned NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cep` varchar(15) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `idPais` int(11) NOT NULL,
  `nroParticipantes` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbevento`
--

INSERT INTO `tbevento` (`idEvento`, `idUsuCriador`, `nome`, `data`, `hora`, `numero`, `complemento`, `cep`, `cidade`, `bairro`, `rua`, `estado`, `idPais`, `nroParticipantes`) VALUES
(1, 20, 'I Colecionismo em TimÃ³teo', '2015-12-12', '19:00:00', '900', '', '35.181-000', 'TimÃ³teo', 'Alegre', 'Avenida Um', 'MG', 1, 1),
(2, 22, 'II Encontro', '2015-12-22', '19:00:00', '23', 'praÃ§a', '35.182-000', 'TimÃ³teo', 'Centro Sul', 'Avenida SÃ£o JoÃ£o', 'MG', 1, 0),
(3, 20, 'zsdsd', '2015-12-22', '12:00:00', '2', '', '35.182-000', 'TimÃ³teo', 'Centro Sul', 'Avenida SÃ£o JoÃ£o', 'MG', 1, 1),
(4, 22, 'Colecionadores Pirados', '2016-10-20', '19:00:00', '5', '', '35.184-001', 'TimÃ³teo', 'Cachoeira do Vale', 'Rodovia BR-381', 'MG', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbidioma`
--

CREATE TABLE IF NOT EXISTS `tbidioma` (
  `idIdioma` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbidioma`
--

INSERT INTO `tbidioma` (`idIdioma`, `nome`) VALUES
(3, 'PortuguÃªs'),
(4, 'InglÃªs'),
(5, 'AlemÃ£o'),
(7, 'Ãrabe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitemcolecao`
--

CREATE TABLE IF NOT EXISTS `tbitemcolecao` (
  `idItemColecao` int(10) unsigned NOT NULL,
  `idColecao` int(10) unsigned NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` text,
  `quantidade` int(10) unsigned DEFAULT NULL,
  `imagem` text,
  `nroSerie` varchar(100) NOT NULL,
  `interesse` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbitemcolecao`
--

INSERT INTO `tbitemcolecao` (`idItemColecao`, `idColecao`, `nome`, `descricao`, `quantidade`, `imagem`, `nroSerie`, `interesse`, `status`) VALUES
(2, 1, 'Barco', '', 1, '121444257866.jpg', '', 2, 0),
(3, 2, 'barco', 'teste', 9, '921444316069.jpg', '09', 2, 0),
(11, 1, 'outro teste', 'teste', 2, 'noimg.png', '1', 1, 0),
(12, 1, 'testesss', '3', 3, 'noimg.png', '2', 1, 0),
(14, 1, 'meu', 'teste', 1500, '150021446057753.jpg', '1', 2, 0),
(15, 7, 'Tazos', 'teste', 100, 'noimg.png', '1', 2, 0),
(16, 7, 'Meus tazos', 'teste', 20, 'noimg.png', '1', 2, 0),
(17, 7, 'Porta tazos antigo', 'teste', 1, '121446083566.jpg', '1', 2, 0),
(18, 7, 'Na Lanterna', 'teste', 190, '19031446084641.jpg', '28', 3, 0),
(24, 7, 'teste', 'teste', 2, '211446091203.jpg', '2', 1, 0),
(26, 7, 'Anime Bleach', 'teste', 2, '211446770781.png', '1', 1, 0),
(28, 7, 'kofo', 'f', 2, 'noimg.png', '2', 1, 0),
(29, 7, 'ff', '4', 4, 'noimg.png', '4', 1, 0),
(30, 7, 'dede', '2', 2, '211446771740.png', '2', 1, 0),
(31, 1, 'pl', 'p', 1, 'noimg.png', '1', 1, 0),
(32, 6, 'teste', 'OP', 2, 'noimg.png', '1', 1, 0),
(33, 6, 'ewrer', '2', 2, 'noimg.png', '1', 1, 0),
(34, 8, 'Carrinhos', 'Jornal Super 2013', 12, '1231447704553.jpg', '22', 3, 1),
(35, 8, 'Carrinhos', 'Jornal Super 2012, VÃ¡rias cores e modelos', 12, '1241447706519.jpg', '33', 4, 1),
(37, 8, 'Carrinhos', '', 10, '1011447706573.jpg', '200', 1, 1),
(38, 8, 'Carrinhos', '', 0, '00011447706609.jpg', '10', 1, 1),
(39, 9, 'Porta Tazos Original', '1999', 1, '121447706698.jpg', '019', 2, 1),
(40, 9, 'ColeÃ§Ã£o de Tazos', '', 25, '2531447706725.jpg', '000', 3, 1),
(41, 9, 'Na Lanterna', 'Ou trocar', 50, '5041447706755.jpg', '14', 4, 1),
(42, 9, 'Meus Tazos', '', 50, '5021447706787.jpg', '000', 2, 1),
(43, 10, 'Barcos', '2000', 2, '221447707393.jpg', '11', 2, 1),
(44, 10, 'Navio', '2000', 1, '121447707421.jpg', '11', 2, 1),
(45, 11, 'Selo', '1945', 10, '1021447707480.jpg', '1', 2, 1),
(46, 12, 'SÃ©rie Borboletas', '2001', 50, '5031447707614.jpg', '0103-0590', 3, 1),
(47, 12, 'SÃ©rie Cidades HistÃ³ricas', '2003', 20, '2031447707664.jpg', '009-090', 3, 1),
(48, 12, 'SÃ©rie Dalmatas', '1999', 200, '20031447707706.jpg', '0120-9988', 3, 1),
(49, 12, 'Diversos', 'Ou trocasr', 2000, '200041447707736.jpg', '000', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitemlistadesejos`
--

CREATE TABLE IF NOT EXISTS `tbitemlistadesejos` (
  `idListaDesejos` int(10) unsigned NOT NULL,
  `idItemColecao` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbitemlistadesejos`
--

INSERT INTO `tbitemlistadesejos` (`idListaDesejos`, `idItemColecao`) VALUES
(4, 17),
(4, 18),
(4, 24),
(1, 39),
(1, 40),
(1, 41),
(5, 43);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblistadesejos`
--

CREATE TABLE IF NOT EXISTS `tblistadesejos` (
  `idListaDesejos` int(10) unsigned NOT NULL,
  `idUsuDono` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblistadesejos`
--

INSERT INTO `tblistadesejos` (`idListaDesejos`, `idUsuDono`) VALUES
(2, 20),
(3, 21),
(4, 22),
(1, 24),
(5, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmensagem`
--

CREATE TABLE IF NOT EXISTS `tbmensagem` (
  `idMensagem` int(10) unsigned NOT NULL,
  `idUsuEnvia` int(10) unsigned NOT NULL,
  `idUsuRecebe` int(10) unsigned NOT NULL,
  `texto` text,
  `hora` time DEFAULT NULL,
  `data` date DEFAULT NULL,
  `status` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbmensagem`
--

INSERT INTO `tbmensagem` (`idMensagem`, `idUsuEnvia`, `idUsuRecebe`, `texto`, `hora`, `data`, `status`) VALUES
(1, 20, 24, 'Oi', '07:29:00', '2015-10-29', 0),
(2, 24, 20, 'E ai?', '07:29:00', '2015-10-29', 0),
(3, 20, 24, '<p>dsdsd</p>\r\n', '11:32:45', '2015-10-29', 0),
(4, 20, 24, '<p>dsdsd</p>\r\n', '11:33:03', '2015-10-29', 0),
(5, 24, 20, '<p><img alt="laugh" src="http://localhost/SGC/pages/componentes/assets/ckeditor/plugins/smiley/images/teeth_smile.png" style="height:23px; width:23px" title="laugh" /></p>\r\n', '11:34:05', '2015-10-29', 0),
(6, 24, 20, '<p>oi</p>\r\n', '13:57:36', '2015-10-29', 0),
(7, 20, 24, '<p><img alt="yes" src="http://localhost/SGC/pages/componentes/assets/ckeditor/plugins/smiley/images/thumbs_up.png" style="height:23px; width:23px" title="yes" /></p>\r\n', '02:20:05', '2015-11-07', 0),
(8, 20, 24, '<p>OI</p>\r\n', '11:25:43', '2015-11-07', 0),
(9, 20, 24, '<p>ed</p>\r\n', '11:50:20', '2015-11-07', 0),
(10, 20, 24, '<p>dodd</p>\r\n', '11:50:50', '2015-11-07', 0),
(11, 20, 24, '<p>d</p>\r\n', '11:50:59', '2015-11-07', 0),
(12, 20, 24, '<p>sds</p>\r\n', '12:04:09', '2015-11-07', 0),
(13, 20, 24, '<p>ghgh</p>\r\n', '12:04:23', '2015-11-07', 0),
(14, 20, 24, '<p>6</p>\r\n', '12:13:11', '2015-11-07', 0),
(15, 20, 24, '<p>p</p>\r\n', '12:14:57', '2015-11-07', 0),
(16, 20, 24, '<p>&ccedil;</p>\r\n', '12:15:22', '2015-11-07', 0),
(17, 20, 24, '<p>jk</p>\r\n', '12:24:36', '2015-11-07', 0),
(18, 20, 24, '<p>ff</p>\r\n', '12:25:14', '2015-11-07', 0),
(19, 20, 24, '<p>ss</p>\r\n', '12:28:31', '2015-11-07', 0),
(20, 20, 24, '<p>rrerr</p>\r\n', '13:38:51', '2015-11-07', 0),
(21, 20, 24, 'fhffh', '13:59:20', '2015-11-07', 0),
(22, 20, 24, 'rrrrr', '13:59:28', '2015-11-07', 0),
(23, 20, 24, 'erer', '14:00:15', '2015-11-07', 0),
(24, 20, 24, 'w', '14:05:26', '2015-11-07', 0),
(25, 20, 24, 'wwwww', '15:30:28', '2015-11-07', 0),
(26, 24, 20, 'oi kkk', '15:34:56', '2015-11-07', 0),
(27, 20, 24, 'ff', '15:48:14', '2015-11-07', 0),
(28, 20, 24, 'effeffd', '15:58:31', '2015-11-07', 0),
(29, 20, 24, 'asd', '16:44:33', '2015-11-07', 0),
(30, 20, 24, 'as', '16:44:48', '2015-11-07', 0),
(34, 20, 24, 'dfdsf', '20:18:24', '2015-11-07', 0),
(35, 20, 24, 'Ola maisa', '20:18:33', '2015-11-07', 0),
(36, 20, 24, 'sdfsdf', '20:19:11', '2015-11-07', 0),
(37, 20, 24, '"Quando o jogo termina, vocÃª sÃ³ sabe que termina porque alguma condiÃ§Ã£o se satisfaz.  Quando essa condiÃ§Ã£o se satisfizer vocÃª faz uma requisiÃ§Ã£o AJAX para qualquer URL que vocÃª tenha definido e nessa pÃ¡gina, dessa URL, seja um sistema de querystrings ou um arquivo fÃ­sico vai invocar a funÃ§Ã£o PHP utilizando-se dos valores do array superglobal definido. "', '20:19:37', '2015-11-07', 0),
(38, 24, 20, 'A sim', '20:21:02', '2015-11-07', 0),
(39, 20, 22, 'Ola Maisa', '20:33:24', '2015-11-07', 0),
(40, 20, 22, 'Tudo bem?', '20:45:00', '2015-11-07', 0),
(41, 22, 20, 'Sim jao, e tu?', '20:45:37', '2015-11-07', 0),
(42, 22, 20, 'Vc vai no encontro de colecionadores sabado?', '20:46:36', '2015-11-07', 0),
(43, 22, 20, '125.183', '21:56:53', '2015-11-07', 0),
(44, 22, 20, '125.183', '21:58:01', '2015-11-07', 0),
(45, 22, 20, '125.183', '22:00:07', '2015-11-07', 0),
(46, 22, 20, '125.183', '22:01:16', '2015-11-07', 0),
(47, 22, 20, '', '22:02:05', '2015-11-07', 0),
(48, 22, 20, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 90<br>35.183-000 , ', '22:06:15', '2015-11-07', 0),
(49, 22, 20, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 90<br>35.183-000 ', '22:06:55', '2015-11-07', 0),
(50, 22, 20, 'qsas', '00:57:00', '2015-11-08', 0),
(51, 22, 20, 'baba', '00:57:08', '2015-11-08', 0),
(52, 22, 20, 'gf', '01:37:07', '2015-11-08', 0),
(53, 22, 20, 'oiii', '02:03:22', '2015-11-08', 0),
(54, 22, 20, 'sasas', '02:03:36', '2015-11-08', 0),
(55, 22, 20, 'kkkk', '02:04:21', '2015-11-08', 0),
(56, 22, 20, 'hhvvh', '02:09:52', '2015-11-08', 0),
(57, 20, 22, 'oi', '02:10:35', '2015-11-08', 0),
(58, 20, 22, 'Ola', '13:49:23', '2015-11-12', 0),
(59, 20, 22, 'oi', '13:49:44', '2015-11-12', 0),
(60, 22, 20, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 90<br>35.183-000 ', '13:50:16', '2015-11-12', 0),
(61, 22, 20, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 4969<br>35.183-000 Residencia', '13:56:15', '2015-11-12', 0),
(62, 22, 20, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 4969<br>35.183-000 Residencia', '13:59:17', '2015-11-12', 0),
(63, 24, 20, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 4969<br>35.183-000 Residencia', '14:00:27', '2015-11-12', 0),
(64, 20, 24, 'oi', '14:01:07', '2015-11-12', 0),
(65, 20, 24, 'ola', '14:22:58', '2015-11-12', 0),
(66, 22, 20, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 90<br>35.183-000 ', '02:53:00', '2015-11-13', 0),
(67, 22, 20, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 90<br>35.183-000 ', '02:54:29', '2015-11-13', 0),
(68, 22, 20, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 90<br>35.183-000 ', '02:54:36', '2015-11-13', 0),
(69, 20, 22, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 4969<br>35.183-000 Residencia', '02:59:46', '2015-11-13', 0),
(70, 20, 22, 'olp', '02:59:58', '2015-11-13', 0),
(71, 20, 24, 'ola', '09:48:24', '2015-11-13', 0),
(72, 20, 24, 'blz', '09:48:36', '2015-11-13', 0),
(73, 20, 22, 'dd', '08:44:28', '2015-11-15', 0),
(74, 20, 22, 'data', '05:46:30', '2015-11-15', 0),
(75, 20, 22, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 4969<br>35.183-000 Residencia', '05:46:37', '2015-11-15', 0),
(76, 20, 24, 'oi', '05:57:52', '2015-11-15', 0),
(77, 24, 20, 'p', '10:05:08', '2015-11-15', 0),
(78, 22, 20, 'Brasil , MG<br>TimÃ³teo , Alvorada<br>Avenida Ana Moura , 90<br>35.183-000 ', '17:51:03', '2015-11-16', 0),
(79, 24, 20, 'ola', '19:10:36', '2015-11-16', 0),
(80, 20, 24, 'lo', '19:51:20', '2015-11-16', 1),
(81, 20, 24, 'njn', '20:08:05', '2015-11-16', 1),
(82, 25, 24, 'Brasil , MG<br>TimÃ³teo , Centro Sul<br>Avenida SÃ£o JoÃ£o , 222<br>35.182-000 ', '20:13:38', '2015-11-16', 0),
(83, 25, 22, 'oi', '20:22:14', '2015-11-16', 0),
(84, 25, 22, 'oi', '20:22:24', '2015-11-16', 0),
(85, 25, 20, 'oi', '20:35:18', '2015-11-16', 0),
(86, 25, 20, 'tudo bem?', '20:35:39', '2015-11-16', 0),
(87, 21, 22, 'OlÃ¡ JoÃ£o', '20:36:15', '2015-11-16', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbnotificacoes`
--

CREATE TABLE IF NOT EXISTS `tbnotificacoes` (
  `idNotf` int(11) NOT NULL,
  `idUsuario` int(10) unsigned DEFAULT NULL,
  `idUsuNotf` int(10) unsigned DEFAULT NULL,
  `idItemNotf` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `obs` text COLLATE utf8_bin
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbnotificacoes`
--

INSERT INTO `tbnotificacoes` (`idNotf`, `idUsuario`, `idUsuNotf`, `idItemNotf`, `status`, `obs`) VALUES
(1, 24, 20, 1, 0, 'adicionou um item seu na lista de desejos'),
(2, 20, 24, 2, 0, 'adicionou um item seu na lista de desejos'),
(3, 20, 24, 2, 0, 'adicionou um item seu na lista de desejos'),
(4, 24, 20, 1, 0, 'adicionou um item seu na lista de desejos'),
(5, 24, 20, 7, 0, 'adicionou um novo item'),
(6, 24, 20, 7, 0, 'adicionou um novo item'),
(7, 20, 24, 1, 0, 'adicionou um novo item'),
(8, 22, 20, 4, 0, 'adicionou um item seu na lista de desejos'),
(9, 20, 22, 6, 0, 'adicionou um novo item'),
(10, 20, 22, 6, 0, 'adicionou um novo item'),
(11, 20, 24, 6, 0, 'adicionou um novo item'),
(12, 24, 22, 1, 0, 'adicionou um item seu na lista de desejos'),
(13, 22, 24, 4, 0, 'adicionou um item seu na lista de desejos'),
(14, 22, 24, 4, 1, 'adicionou um item seu na lista de desejos'),
(15, 22, 24, 4, 1, 'adicionou um item seu na lista de desejos'),
(16, 22, 24, 4, 1, 'adicionou um item seu na lista de desejos'),
(17, 22, 24, 4, 1, 'adicionou um item seu na lista de desejos'),
(18, 22, 24, 4, 1, 'adicionou um item seu na lista de desejos'),
(19, 24, 20, 10, 1, 'adicionou um novo item'),
(20, 24, 20, 10, 1, 'adicionou um novo item'),
(21, 24, 20, 11, 1, 'adicionou um novo item'),
(22, 24, 20, 12, 1, 'adicionou um novo item'),
(23, 24, 20, 12, 1, 'adicionou um novo item'),
(24, 24, 20, 12, 1, 'adicionou um novo item'),
(25, 24, 20, 12, 1, 'adicionou um novo item'),
(26, 24, 22, 1, 1, 'adicionou um item seu na lista de desejos'),
(27, 24, 22, 1, 1, 'adicionou um item seu na lista de desejos'),
(28, 24, 22, 1, 1, 'adicionou um item seu na lista de desejos'),
(29, 25, 24, 5, 1, 'adicionou um item seu na lista de desejos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpais`
--

CREATE TABLE IF NOT EXISTS `tbpais` (
  `idPais` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbpais`
--

INSERT INTO `tbpais` (`idPais`, `nome`) VALUES
(1, 'Brasil'),
(2, 'Inglaterra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbparticipaevento`
--

CREATE TABLE IF NOT EXISTS `tbparticipaevento` (
  `idUsuario` int(10) unsigned NOT NULL,
  `idEvento` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbparticipaevento`
--

INSERT INTO `tbparticipaevento` (`idUsuario`, `idEvento`) VALUES
(20, 1),
(24, 2),
(24, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsugestaotipo`
--

CREATE TABLE IF NOT EXISTS `tbsugestaotipo` (
  `idSugestaoTipo` int(10) unsigned NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  `nome` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbsugestaotipo`
--

INSERT INTO `tbsugestaotipo` (`idSugestaoTipo`, `idUsuario`, `nome`) VALUES
(3, 21, 'Tazos'),
(4, 20, 'Tazos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipocolecao`
--

CREATE TABLE IF NOT EXISTS `tbtipocolecao` (
  `idTipoColecao` int(10) unsigned NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbtipocolecao`
--

INSERT INTO `tbtipocolecao` (`idTipoColecao`, `nome`) VALUES
(1, 'Cartões Telefônicos'),
(2, 'Miniatura'),
(3, 'Selos'),
(4, 'Tazos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE IF NOT EXISTS `tbusuario` (
  `idUsuario` int(10) unsigned NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `senha` text,
  `tipo` int(11) unsigned NOT NULL,
  `imagem` text,
  `idIdioma` int(11) DEFAULT NULL,
  `dataNasc` date DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `rua` varchar(200) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idUsuario`, `nome`, `email`, `senha`, `tipo`, `imagem`, `idIdioma`, `dataNasc`, `numero`, `telefone`, `complemento`, `cep`, `cidade`, `bairro`, `rua`, `estado`, `idPais`, `status`) VALUES
(20, 'MaÃ­sa', 'maisa@email.com', '25d55ad283aa400af464c76d713c07ad', 1, 'maisa@email.com1447710147.jpg', 3, '1994-01-09', '4969', '', 'Residencia', '35.183-000', 'TimÃ³teo', 'Alvorada', 'Avenida Ana Moura', 'MG', 1, 1),
(21, 'maria', 'maria@email.com', '25d55ad283aa400af464c76d713c07ad', 2, 'noimg.png', 3, '1994-09-22', '', '', '', '', '', '', '', '', 1, 0),
(22, 'Joao', 'joao@email.com', '25d55ad283aa400af464c76d713c07ad', 2, 'joao@email.com1447703730.png', 3, '1994-10-22', '400', '', '', '35.183-000', 'TimÃ³teo', 'Alvorada', 'Avenida Ana Moura', 'MG', 1, 1),
(24, 'Ariane', 'ariane@email.com', '25d55ad283aa400af464c76d713c07ad', 2, 'ariane@email.com1445610389.jpg', 3, '1993-09-22', '', '', '', '', '', '', '', '', 1, 1),
(25, 'Joana', 'joana@email.com', '25d55ad283aa400af464c76d713c07ad', 2, 'joana@email.com1447709543.jpg', 3, '1997-04-22', '222', '', '', '35.182-000', 'TimÃ³teo', 'Centro Sul', 'Avenida SÃ£o JoÃ£o', 'MG', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuariobloqueado`
--

CREATE TABLE IF NOT EXISTS `tbusuariobloqueado` (
  `idUsuBloqueado` int(10) unsigned NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusuariobloqueado`
--

INSERT INTO `tbusuariobloqueado` (`idUsuBloqueado`, `idUsuario`) VALUES
(20, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuarioseguido`
--

CREATE TABLE IF NOT EXISTS `tbusuarioseguido` (
  `idUsuSeguido` int(10) unsigned NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusuarioseguido`
--

INSERT INTO `tbusuarioseguido` (`idUsuSeguido`, `idUsuario`) VALUES
(24, 20),
(20, 24);

-- --------------------------------------------------------

--
-- Structure for view `conversaatual`
--
DROP TABLE IF EXISTS `conversaatual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `conversaatual` AS select `tbmensagem`.`idMensagem` AS `idMensagem`,`tbmensagem`.`idUsuEnvia` AS `idUsuEnvia`,`tbmensagem`.`idUsuRecebe` AS `idUsuRecebe`,`tbmensagem`.`texto` AS `texto`,`tbmensagem`.`hora` AS `hora`,`tbmensagem`.`data` AS `data` from `tbmensagem` where ((`tbmensagem`.`idUsuRecebe` like 20) or (24 and (`tbmensagem`.`idUsuEnvia` like 24)) or 20) order by `tbmensagem`.`idMensagem` desc limit 30;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcolecao`
--
ALTER TABLE `tbcolecao`
  ADD PRIMARY KEY (`idColecao`), ADD KEY `tbcolecao_ibfk_1` (`idTipoColecao`), ADD KEY `tbcolecao_ibfk_2` (`idUsuDono`);

--
-- Indexes for table `tbevento`
--
ALTER TABLE `tbevento`
  ADD PRIMARY KEY (`idEvento`), ADD KEY `tbevento_ibfk_1` (`cep`), ADD KEY `tbevento_ibfk_2` (`idUsuCriador`), ADD KEY `tbevento_ibfk_3` (`idPais`);

--
-- Indexes for table `tbidioma`
--
ALTER TABLE `tbidioma`
  ADD PRIMARY KEY (`idIdioma`);

--
-- Indexes for table `tbitemcolecao`
--
ALTER TABLE `tbitemcolecao`
  ADD PRIMARY KEY (`idItemColecao`,`idColecao`), ADD KEY `tbitemcolecao_ibfk_1` (`idColecao`);

--
-- Indexes for table `tbitemlistadesejos`
--
ALTER TABLE `tbitemlistadesejos`
  ADD PRIMARY KEY (`idListaDesejos`,`idItemColecao`), ADD KEY `tbitemlistadesejos_ibfk_2` (`idItemColecao`);

--
-- Indexes for table `tblistadesejos`
--
ALTER TABLE `tblistadesejos`
  ADD PRIMARY KEY (`idListaDesejos`), ADD KEY `tblistadesejos_ibfk_1` (`idUsuDono`);

--
-- Indexes for table `tbmensagem`
--
ALTER TABLE `tbmensagem`
  ADD PRIMARY KEY (`idMensagem`), ADD KEY `tbmensagem_ibfk_1` (`idUsuEnvia`), ADD KEY `tbmensagem_ibfk_2` (`idUsuRecebe`);

--
-- Indexes for table `tbnotificacoes`
--
ALTER TABLE `tbnotificacoes`
  ADD PRIMARY KEY (`idNotf`), ADD KEY `idUsuario` (`idUsuario`), ADD KEY `idUsuNotf` (`idUsuNotf`);

--
-- Indexes for table `tbpais`
--
ALTER TABLE `tbpais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indexes for table `tbparticipaevento`
--
ALTER TABLE `tbparticipaevento`
  ADD PRIMARY KEY (`idUsuario`,`idEvento`), ADD KEY `idEvento` (`idEvento`);

--
-- Indexes for table `tbsugestaotipo`
--
ALTER TABLE `tbsugestaotipo`
  ADD PRIMARY KEY (`idSugestaoTipo`), ADD KEY `tbsugestaotipo_ibfk_1` (`idUsuario`);

--
-- Indexes for table `tbtipocolecao`
--
ALTER TABLE `tbtipocolecao`
  ADD PRIMARY KEY (`idTipoColecao`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`), ADD KEY `tbusuario_ibfk_1` (`cep`), ADD KEY `tbusuario_ibfk_3` (`idPais`), ADD KEY `tbusuario_ibfk_2` (`idIdioma`);

--
-- Indexes for table `tbusuariobloqueado`
--
ALTER TABLE `tbusuariobloqueado`
  ADD PRIMARY KEY (`idUsuBloqueado`,`idUsuario`), ADD KEY `tbusuariobloqueado_ibfk_2` (`idUsuario`);

--
-- Indexes for table `tbusuarioseguido`
--
ALTER TABLE `tbusuarioseguido`
  ADD PRIMARY KEY (`idUsuSeguido`,`idUsuario`), ADD KEY `tbusuarioseguido_ibfk_2` (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcolecao`
--
ALTER TABLE `tbcolecao`
  MODIFY `idColecao` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbevento`
--
ALTER TABLE `tbevento`
  MODIFY `idEvento` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbidioma`
--
ALTER TABLE `tbidioma`
  MODIFY `idIdioma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbitemcolecao`
--
ALTER TABLE `tbitemcolecao`
  MODIFY `idItemColecao` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tblistadesejos`
--
ALTER TABLE `tblistadesejos`
  MODIFY `idListaDesejos` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbmensagem`
--
ALTER TABLE `tbmensagem`
  MODIFY `idMensagem` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `tbnotificacoes`
--
ALTER TABLE `tbnotificacoes`
  MODIFY `idNotf` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbpais`
--
ALTER TABLE `tbpais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbsugestaotipo`
--
ALTER TABLE `tbsugestaotipo`
  MODIFY `idSugestaoTipo` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbtipocolecao`
--
ALTER TABLE `tbtipocolecao`
  MODIFY `idTipoColecao` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbcolecao`
--
ALTER TABLE `tbcolecao`
ADD CONSTRAINT `tbcolecao_ibfk_1` FOREIGN KEY (`idTipoColecao`) REFERENCES `tbtipocolecao` (`idTipoColecao`),
ADD CONSTRAINT `tbcolecao_ibfk_2` FOREIGN KEY (`idUsuDono`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbevento`
--
ALTER TABLE `tbevento`
ADD CONSTRAINT `tbevento_ibfk_2` FOREIGN KEY (`idUsuCriador`) REFERENCES `tbusuario` (`idUsuario`),
ADD CONSTRAINT `tbevento_ibfk_3` FOREIGN KEY (`idPais`) REFERENCES `tbpais` (`idPais`);

--
-- Limitadores para a tabela `tbitemcolecao`
--
ALTER TABLE `tbitemcolecao`
ADD CONSTRAINT `tbitemcolecao_ibfk_1` FOREIGN KEY (`idColecao`) REFERENCES `tbcolecao` (`idColecao`);

--
-- Limitadores para a tabela `tbitemlistadesejos`
--
ALTER TABLE `tbitemlistadesejos`
ADD CONSTRAINT `tbitemlistadesejos_ibfk_2` FOREIGN KEY (`idItemColecao`) REFERENCES `tbitemcolecao` (`idItemColecao`),
ADD CONSTRAINT `tbitemlistadesejos_ibfk_3` FOREIGN KEY (`idListaDesejos`) REFERENCES `tblistadesejos` (`idListaDesejos`);

--
-- Limitadores para a tabela `tblistadesejos`
--
ALTER TABLE `tblistadesejos`
ADD CONSTRAINT `tblistadesejos_ibfk_1` FOREIGN KEY (`idUsuDono`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbmensagem`
--
ALTER TABLE `tbmensagem`
ADD CONSTRAINT `tbmensagem_ibfk_1` FOREIGN KEY (`idUsuEnvia`) REFERENCES `tbusuario` (`idUsuario`),
ADD CONSTRAINT `tbmensagem_ibfk_2` FOREIGN KEY (`idUsuRecebe`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbnotificacoes`
--
ALTER TABLE `tbnotificacoes`
ADD CONSTRAINT `tbnotificacoes_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`),
ADD CONSTRAINT `tbnotificacoes_ibfk_2` FOREIGN KEY (`idUsuNotf`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbparticipaevento`
--
ALTER TABLE `tbparticipaevento`
ADD CONSTRAINT `tbparticipaevento_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`),
ADD CONSTRAINT `tbparticipaevento_ibfk_2` FOREIGN KEY (`idEvento`) REFERENCES `tbevento` (`idEvento`);

--
-- Limitadores para a tabela `tbsugestaotipo`
--
ALTER TABLE `tbsugestaotipo`
ADD CONSTRAINT `tbsugestaotipo_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbusuario`
--
ALTER TABLE `tbusuario`
ADD CONSTRAINT `tbusuario_ibfk_2` FOREIGN KEY (`idIdioma`) REFERENCES `tbidioma` (`idIdioma`),
ADD CONSTRAINT `tbusuario_ibfk_3` FOREIGN KEY (`idPais`) REFERENCES `tbpais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbusuariobloqueado`
--
ALTER TABLE `tbusuariobloqueado`
ADD CONSTRAINT `tbusuariobloqueado_ibfk_1` FOREIGN KEY (`idUsuBloqueado`) REFERENCES `tbusuario` (`idUsuario`),
ADD CONSTRAINT `tbusuariobloqueado_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbusuarioseguido`
--
ALTER TABLE `tbusuarioseguido`
ADD CONSTRAINT `tbusuarioseguido_ibfk_1` FOREIGN KEY (`idUsuSeguido`) REFERENCES `tbusuario` (`idUsuario`),
ADD CONSTRAINT `tbusuarioseguido_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
