-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Dez-2018 às 00:28
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `db_atoxicated`
--
CREATE DATABASE IF NOT EXISTS `db_atoxicated` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_atoxicated`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_amigos`
--

CREATE TABLE IF NOT EXISTS `tb_amigos` (
  `cd_amigos` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario1` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_amigos`),
  KEY `id_usuario1` (`id_usuario1`),
  KEY `id_usuario2` (`id_usuario2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_amigos`
--

INSERT INTO `tb_amigos` (`cd_amigos`, `id_usuario1`, `id_usuario2`, `status`) VALUES
(1, 1, 1, 0),
(2, 1, 3, 0),
(3, 3, 1, 1),
(5, 5, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_avaliacao`
--

CREATE TABLE IF NOT EXISTS `tb_avaliacao` (
  `cd_avalicao` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(200) DEFAULT NULL,
  `id_usuario1` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL,
  PRIMARY KEY (`cd_avalicao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_avaliacao`
--

INSERT INTO `tb_avaliacao` (`cd_avalicao`, `comentario`, `id_usuario1`, `id_usuario2`) VALUES
(1, 'oi', 18, 17),
(3, 'adad', 18, 15),
(4, 'BOM', 18, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_campeoes`
--

CREATE TABLE IF NOT EXISTS `tb_campeoes` (
  `cd_campeoes` int(11) NOT NULL AUTO_INCREMENT,
  `campeoes` varchar(20) NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`cd_campeoes`),
  UNIQUE KEY `campeoes` (`campeoes`),
  UNIQUE KEY `img` (`img`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Extraindo dados da tabela `tb_campeoes`
--

INSERT INTO `tb_campeoes` (`cd_campeoes`, `campeoes`, `img`) VALUES
(1, 'Aatrox', 'img/campeoes/Aatrox.png'),
(2, 'Ahri', 'img/campeoes/Ahri.png'),
(3, 'Akali', 'img/campeoes/Akali.png'),
(4, 'Alistar', 'img/campeoes/Alistar.png'),
(5, 'Amumu', 'img/campeoes/Amumu.png'),
(6, 'Anivia', 'img/campeoes/Anivia.png'),
(7, 'Annie', 'img/campeoes/Annie.png'),
(8, 'Ashe', 'img/campeoes/Ashe.png'),
(9, 'Aurelion', 'img/campeoes/Aurelion.png'),
(10, 'Azir', 'img/campeoes/Azir.png'),
(11, 'Bardo', 'img/campeoes/Bardo.png'),
(12, 'Blitzcrank', 'img/campeoes/Blitzcrank.png'),
(13, 'Brand', 'img/campeoes/Brand.png'),
(14, 'Braum', 'img/campeoes/Braum.png'),
(15, 'Caitlyn', 'img/campeoes/Caitlyn.png'),
(16, 'Camille', 'img/campeoes/Camille.png'),
(17, 'Cassiopeia', 'img/campeoes/Cassiopeia.png'),
(18, 'Cho''Gath', 'img/campeoes/Cho''Gath.png'),
(19, 'Corki', 'img/campeoes/Corki.png'),
(20, 'Darius', 'img/campeoes/Darius.png'),
(21, 'Diana', 'img/campeoes/Diana.png'),
(22, 'Dr. Mundo', 'img/campeoes/Dr. Mundo.png'),
(23, 'Draven', 'img/campeoes/Draven.png'),
(24, 'Ekko', 'img/campeoes/Ekko.png'),
(25, 'Elise', 'img/campeoes/Elise.png'),
(26, 'Evelynn', 'img/campeoes/Evelynn.png'),
(27, 'Ezreal', 'img/campeoes/Ezreal.png'),
(28, 'Fiddlesticks', 'img/campeoes/Fiddlesticks.png'),
(29, 'Fiora', 'img/campeoes/Fiora.png'),
(30, 'Fizz', 'img/campeoes/Fizz.png'),
(31, 'Galio', 'img/campeoes/Galio.png'),
(32, 'Gangplank', 'img/campeoes/Gangplank.png'),
(33, 'Garen', 'img/campeoes/Garen.png'),
(34, 'Gnar', 'img/campeoes/Gnar.png'),
(35, 'Gragas', 'img/campeoes/Gragas.png'),
(36, 'Graves', 'img/campeoes/Graves.png'),
(37, 'Hecarim', 'img/campeoes/Hecarim.png'),
(38, 'Heimerdinger', 'img/campeoes/Heimerdinger.png'),
(39, 'Illaoi', 'img/campeoes/Illaoi.png'),
(40, 'Irelia', 'img/campeoes/Irelia.png'),
(41, 'Ivern', 'img/campeoes/Ivern.png'),
(42, 'Janna', 'img/campeoes/Janna.png'),
(43, 'Jarvan IV', 'img/campeoes/Jarvan IV.png'),
(44, 'Jax', 'img/campeoes/Jax.png'),
(45, 'Jayce', 'img/campeoes/Jayce.png'),
(46, 'Jhin', 'img/campeoes/Jhin.png'),
(47, 'Jinx', 'img/campeoes/Jinx.png'),
(48, 'Kai''Sa', 'img/campeoes/Kai''Sa.png'),
(49, 'Kalista', 'img/campeoes/Kalista.png'),
(50, 'Karma', 'img/campeoes/Karma.png'),
(51, 'Karthus', 'img/campeoes/Karthus.png'),
(52, 'Kassadin', 'img/campeoes/Kassadin.png'),
(53, 'Katarina', 'img/campeoes/Katarina.png'),
(54, 'Kayle', 'img/campeoes/Kayle.png'),
(55, 'Kayn', 'img/campeoes/Kayn.png'),
(56, 'Kennen', 'img/campeoes/Kennen.png'),
(57, 'Kha''Zix', 'img/campeoes/Kha''Zix.png'),
(58, 'Kindred', 'img/campeoes/Kindred.png'),
(59, 'Kled', 'img/campeoes/Kled.png'),
(60, 'Kog''Maw', 'img/campeoes/Kog''Maw.png'),
(61, 'LeBlanc', 'img/campeoes/LeBlanc.png'),
(62, 'Lee Sin', 'img/campeoes/Lee Sin.png'),
(63, 'Leona', 'img/campeoes/Leona.png'),
(64, 'Lissandra', 'img/campeoes/Lissandra.png'),
(65, 'Lucian', 'img/campeoes/Lucian.png'),
(66, 'Lulu', 'img/campeoes/Lulu.png'),
(67, 'Lux', 'img/campeoes/Lux.png'),
(68, 'Malphite', 'img/campeoes/Malphite.png'),
(69, 'Malzahar', 'img/campeoes/Malzahar.png'),
(70, 'Maokai', 'img/campeoes/Maokai.png'),
(71, 'Master Yi', 'img/campeoes/Master Yi.png'),
(72, 'Miss Fortune', 'img/campeoes/Miss Fortune.png'),
(73, 'Mordekaiser', 'img/campeoes/Mordekaiser.png'),
(74, 'Morgana', 'img/campeoes/Morgana.png'),
(75, 'Nami', 'img/campeoes/Nami.png'),
(76, 'Nasus', 'img/campeoes/Nasus.png'),
(77, 'Nautilus', 'img/campeoes/Nautilus.png'),
(78, 'Nidalee', 'img/campeoes/Nidalee.png'),
(79, 'Nocturne', 'img/campeoes/Nocturne.png'),
(80, 'Nunu e Willump', 'img/campeoes/Nunu e Willump.png'),
(81, 'Olaf', 'img/campeoes/Olaf.png'),
(82, 'Orianna', 'img/campeoes/Orianna.png'),
(83, 'Ornn', 'img/campeoes/Ornn.png'),
(84, 'Pyke', 'img/campeoes/Pyke.png'),
(85, 'Pantheon', 'img/campeoes/Pantheon.png'),
(86, 'Poppy', 'img/campeoes/Poppy.png'),
(87, 'Quinn', 'img/campeoes/Quinn.png'),
(88, 'Rakan', 'img/campeoes/Rakan.png'),
(89, 'Rammus', 'img/campeoes/Rammus.png'),
(90, 'Rek''sai', 'img/campeoes/Rek''sai.png'),
(91, 'Renekton', 'img/campeoes/Renekton.png'),
(92, 'Rengar', 'img/campeoes/Rengar.png'),
(93, 'Riven', 'img/campeoes/Riven.png'),
(94, 'Rumble', 'img/campeoes/Rumble.png'),
(95, 'Ryze', 'img/campeoes/Ryze.png'),
(96, 'Sejuani', 'img/campeoes/Sejuani.png'),
(97, 'Shaco', 'img/campeoes/Shaco.png'),
(98, 'Shen', 'img/campeoes/Shen.png'),
(99, 'Shyvana', 'img/campeoes/Shyvana.png'),
(100, 'Singed', 'img/campeoes/Singed.png'),
(101, 'Sion', 'img/campeoes/Sion.png'),
(102, 'Sivir', 'img/campeoes/Sivir.png'),
(103, 'Skarner', 'img/campeoes/Skarner.png'),
(104, 'Sona', 'img/campeoes/Sona.png'),
(105, 'Soraka', 'img/campeoes/Soraka.png'),
(106, 'Swain', 'img/campeoes/Swain.png'),
(107, 'Syndra', 'img/campeoes/Syndra.png'),
(108, 'Tahm Kench', 'img/campeoes/Tahm Kench.png'),
(109, 'Taliyah', 'img/campeoes/Taliyah.png'),
(110, 'Talon', 'img/campeoes/Talon.png'),
(111, 'Taric', 'img/campeoes/Taric.png'),
(112, 'Teemo', 'img/campeoes/Teemo.png'),
(113, 'Thresh', 'img/campeoes/Thresh.png'),
(114, 'Tristana', 'img/campeoes/Tristana.png'),
(115, 'Trundle', 'img/campeoes/Trundle.png'),
(116, 'Tryndamere', 'img/campeoes/Tryndamere.png'),
(117, 'Twisted Fate', 'img/campeoes/Twisted Fate.png'),
(118, 'Twitch', 'img/campeoes/Twitch.png'),
(119, 'Udyr', 'img/campeoes/Udyr.png'),
(120, 'Urgot', 'img/campeoes/Urgot.png'),
(121, 'Varus', 'img/campeoes/Varus.png'),
(122, 'Vayne', 'img/campeoes/Vayne.png'),
(123, 'Veigar', 'img/campeoes/Veigar.png'),
(124, 'Vel''Koz', 'img/campeoes/Vel''Koz.png'),
(125, 'Vi', 'img/campeoes/Vi.png'),
(126, 'Viktor', 'img/campeoes/Viktor.png'),
(127, 'Vladimir', 'img/campeoes/Vladimir.png'),
(128, 'Volibear', 'img/campeoes/Volibear.png'),
(129, 'Warwick', 'img/campeoes/Warwick.png'),
(130, 'Wukong', 'img/campeoes/Wukong.png'),
(131, 'Xayah', 'img/campeoes/Xayah.png'),
(132, 'Xerath', 'img/campeoes/Xerath.png'),
(133, 'Xin Zhao', 'img/campeoes/Xin Zhao.png'),
(134, 'Yasuo', 'img/campeoes/Yasuo.png'),
(135, 'Yorick', 'img/campeoes/Yorick.png'),
(136, 'Zac', 'img/campeoes/Zac.png'),
(137, 'Zed', 'img/campeoes/Zed.png'),
(138, 'Ziggs', 'img/campeoes/Ziggs.png'),
(139, 'Zilean', 'img/campeoes/Zilean.png'),
(140, 'Zoe', 'img/campeoes/Zoe.png'),
(141, 'Zyra', 'img/campeoes/Zyra.png'),
(142, 'Nenhum', 'img/campeoes/nenhum.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentario`
--

CREATE TABLE IF NOT EXISTS `tb_comentario` (
  `cd_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(200) NOT NULL,
  `id_usuario1` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cd_comentario`),
  KEY `id_usuario1` (`id_usuario1`),
  KEY `id_usuario2` (`id_usuario2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conviteequipeusuario`
--

CREATE TABLE IF NOT EXISTS `tb_conviteequipeusuario` (
  `cd_convite` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipelol` int(11) DEFAULT NULL,
  `id_equipecs` int(11) DEFAULT NULL,
  `mensagem` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `id_lanelol` int(11) NOT NULL,
  `id_funcaocs` int(11) DEFAULT NULL,
  `id_jogadorlol` int(11) DEFAULT NULL,
  `id_jogadorcs` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_convite`),
  KEY `id_equipecs` (`id_equipecs`),
  KEY `id_equipelol` (`id_equipelol`),
  KEY `id_lanelol` (`id_lanelol`),
  KEY `id_funcaocs` (`id_funcaocs`),
  KEY `id_jogadorlol` (`id_jogadorlol`),
  KEY `id_jogadorcs` (`id_jogadorcs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_conviteequipeusuario`
--

INSERT INTO `tb_conviteequipeusuario` (`cd_convite`, `id_equipelol`, `id_equipecs`, `mensagem`, `status`, `id_lanelol`, `id_funcaocs`, `id_jogadorlol`, `id_jogadorcs`) VALUES
(1, 1, NULL, 'queremos vc', 0, 1, NULL, 18, NULL),
(2, 1, NULL, 'queremos vc', 0, 1, NULL, 18, NULL),
(3, 1, NULL, 'asdasd', 0, 3, NULL, 17, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conviteusuarioequipe`
--

CREATE TABLE IF NOT EXISTS `tb_conviteusuarioequipe` (
  `cd_convite` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipecs` int(11) DEFAULT NULL,
  `id_equipelol` int(11) DEFAULT NULL,
  `id_funcaocs` int(11) DEFAULT NULL,
  `id_lanelol` int(11) DEFAULT NULL,
  `id_jogadorcs` int(11) DEFAULT NULL,
  `id_jogadorlol` int(11) DEFAULT NULL,
  `mensagem` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_convite`),
  KEY `id_equipecs` (`id_equipecs`),
  KEY `id_equipelol` (`id_equipelol`),
  KEY `id_funcaocs` (`id_funcaocs`),
  KEY `id_lanelol` (`id_lanelol`),
  KEY `id_jogadorcs` (`id_jogadorcs`),
  KEY `id_jogadorlol` (`id_jogadorlol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_conviteusuarioequipe`
--

INSERT INTO `tb_conviteusuarioequipe` (`cd_convite`, `id_equipecs`, `id_equipelol`, `id_funcaocs`, `id_lanelol`, `id_jogadorcs`, `id_jogadorlol`, `mensagem`, `status`) VALUES
(1, NULL, 1, NULL, 1, NULL, 18, 'asda', 1),
(2, NULL, 1, NULL, 3, NULL, 17, 'oi', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_denuncia`
--

CREATE TABLE IF NOT EXISTS `tb_denuncia` (
  `cd_denuncia` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(50) NOT NULL,
  `complemento` varchar(200) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`cd_denuncia`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_denuncia`
--

INSERT INTO `tb_denuncia` (`cd_denuncia`, `motivo`, `complemento`, `id_usuario`) VALUES
(1, 'asdasd', 'asdasdasd', 1),
(2, 'tre', 'tere', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_elolol`
--

CREATE TABLE IF NOT EXISTS `tb_elolol` (
  `cd_elolol` int(11) NOT NULL AUTO_INCREMENT,
  `elo` varchar(30) NOT NULL,
  `apielo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cd_elolol`),
  UNIQUE KEY `elo` (`elo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `tb_elolol`
--

INSERT INTO `tb_elolol` (`cd_elolol`, `elo`, `apielo`) VALUES
(1, 'Sem Elo', 'null'),
(2, 'Bronze V', 'Bronze V'),
(3, 'Bronze IV', 'Bronze IV'),
(4, 'Bronze III', 'Bronze III'),
(5, 'Bronze II', 'Bronze II'),
(6, 'Bronze I', 'Bronze I'),
(7, 'Prata V', 'Silver V'),
(8, 'Prata IV', 'Silver IV'),
(9, 'Prata III', 'Silver III'),
(10, 'Prata II', 'Silver II'),
(11, 'Prata I', 'Silver I'),
(12, 'Ouro V', 'Gold V'),
(13, 'Ouro IV', 'Gold IV'),
(14, 'Ouro III', 'Gold III'),
(15, 'Ouro II', 'Gold II'),
(16, 'Ouro I', 'Gold I'),
(17, 'Platina V', 'Platinum V'),
(18, 'Platina IV', 'Platinum IV'),
(19, 'Platina III', 'Platinum III'),
(20, 'Platina II', 'Platinum II'),
(21, 'Platina I', 'Platinum I'),
(22, 'Diamante V', 'Diamond V'),
(23, 'Diamante IV', 'Diamond IV'),
(24, 'Diamante III', 'Diamond III'),
(25, 'Diamante II', 'Diamond II'),
(26, 'Diamante I', 'Diamond I'),
(27, 'Mestre', 'MasterI'),
(28, 'Desafiante', 'Challenger');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_equipecs`
--

CREATE TABLE IF NOT EXISTS `tb_equipecs` (
  `cd_equipecs` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(400) NOT NULL,
  `objetivo` varchar(30) NOT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `gcmaximo` int(11) DEFAULT NULL,
  `gcminimo` int(11) DEFAULT NULL,
  `id_patenteminima` int(11) NOT NULL,
  `id_patentemaxima` int(11) NOT NULL,
  `id_lurker` int(11) DEFAULT NULL,
  `id_support` int(11) DEFAULT NULL,
  `id_entry` int(11) DEFAULT NULL,
  `id_igl` int(11) DEFAULT NULL,
  `id_awp` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_equipecs`),
  KEY `id_lurker` (`id_lurker`),
  KEY `id_support` (`id_support`),
  KEY `id_entry` (`id_entry`),
  KEY `id_igl` (`id_igl`),
  KEY `id_awp` (`id_awp`),
  KEY `id_patenteminima` (`id_patenteminima`),
  KEY `id_patentemaxima` (`id_patentemaxima`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_equipelol`
--

CREATE TABLE IF NOT EXISTS `tb_equipelol` (
  `cd_equipelol` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) DEFAULT NULL,
  `descricao` varchar(400) NOT NULL,
  `objetivo` varchar(30) NOT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `id_elominimo` int(11) NOT NULL,
  `id_elomaximo` int(11) NOT NULL,
  `id_Topo` int(11) DEFAULT NULL,
  `id_Selva` int(11) DEFAULT NULL,
  `id_Meio` int(11) DEFAULT NULL,
  `id_Atirador` int(11) DEFAULT NULL,
  `id_Suporte` int(11) DEFAULT NULL,
  `id_dono` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_equipelol`),
  UNIQUE KEY `nome` (`nome`),
  KEY `id_elominimo` (`id_elominimo`),
  KEY `id_elomaximo` (`id_elomaximo`),
  KEY `id_Topo` (`id_Topo`),
  KEY `id_Selva` (`id_Selva`),
  KEY `id_Meio` (`id_Meio`),
  KEY `id_Atirador` (`id_Atirador`),
  KEY `id_Suporte` (`id_Suporte`),
  KEY `id_dono` (`id_dono`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_equipelol`
--

INSERT INTO `tb_equipelol` (`cd_equipelol`, `nome`, `descricao`, `objetivo`, `estado`, `id_elominimo`, `id_elomaximo`, `id_Topo`, `id_Selva`, `id_Meio`, `id_Atirador`, `id_Suporte`, `id_dono`) VALUES
(1, 'atoxic', 'sad', 'ranqueada', 'SP', 2, 4, 18, NULL, 17, NULL, NULL, 18),
(2, 'asdasd', 'sdasd', 'ranqueada', 'AL', 2, 3, NULL, NULL, NULL, NULL, NULL, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_faleconosco`
--

CREATE TABLE IF NOT EXISTS `tb_faleconosco` (
  `cd_faleconosco` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `assunto` varchar(20) NOT NULL,
  `mensagem` varchar(50) NOT NULL,
  PRIMARY KEY (`cd_faleconosco`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_faleconosco`
--

INSERT INTO `tb_faleconosco` (`cd_faleconosco`, `nome`, `email`, `assunto`, `mensagem`) VALUES
(1, 'dani', 'dan@gmail.com', 'asdasdasdaasd', 'dasdasd'),
(2, 'danilo', 'eqweqw', 'qweqwe', 'qweqweq'),
(3, 'danilo', 'eqweqw', 'qweqwe', 'qweqweq'),
(4, 'eqwe', 'qweqwe', 'wqeqweqwe', 'qweqwasdads');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcaocs`
--

CREATE TABLE IF NOT EXISTS `tb_funcaocs` (
  `cd_funcaocs` int(11) NOT NULL AUTO_INCREMENT,
  `nm_funcaocs` varchar(30) NOT NULL,
  PRIMARY KEY (`cd_funcaocs`),
  UNIQUE KEY `nm_funcaocs` (`nm_funcaocs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_funcaocs`
--

INSERT INTO `tb_funcaocs` (`cd_funcaocs`, `nm_funcaocs`) VALUES
(2, 'Awper'),
(1, 'Entry Fragger'),
(5, 'IGL'),
(4, 'Lurcker'),
(3, 'Suport');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lanelol`
--

CREATE TABLE IF NOT EXISTS `tb_lanelol` (
  `cd_lanelol` int(11) NOT NULL AUTO_INCREMENT,
  `lane` varchar(30) NOT NULL,
  PRIMARY KEY (`cd_lanelol`),
  UNIQUE KEY `lane` (`lane`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_lanelol`
--

INSERT INTO `tb_lanelol` (`cd_lanelol`, `lane`) VALUES
(4, 'Atirador'),
(3, 'Meio'),
(2, 'Selva'),
(5, 'Suporte'),
(1, 'Topo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_noticia`
--

CREATE TABLE IF NOT EXISTS `tb_noticia` (
  `cd_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(40) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  PRIMARY KEY (`cd_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_patentecs`
--

CREATE TABLE IF NOT EXISTS `tb_patentecs` (
  `cd_patente` int(11) NOT NULL AUTO_INCREMENT,
  `patente` varchar(30) NOT NULL,
  PRIMARY KEY (`cd_patente`),
  UNIQUE KEY `patente` (`patente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perfilcs`
--

CREATE TABLE IF NOT EXISTS `tb_perfilcs` (
  `nick` varchar(50) NOT NULL,
  `objetivo` varchar(30) NOT NULL,
  `nivelgc` int(11) DEFAULT NULL,
  `cd_perfilcs` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_patentecs` int(11) NOT NULL,
  `id_equipecs` int(11) DEFAULT NULL,
  `id_funcaocs1` int(11) NOT NULL,
  `id_funcaocs2` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_perfilcs`),
  UNIQUE KEY `nick` (`nick`),
  UNIQUE KEY `id_usuario` (`id_usuario`),
  KEY `id_equipecs` (`id_equipecs`),
  KEY `id_patentecs` (`id_patentecs`),
  KEY `id_funcaocs1` (`id_funcaocs1`),
  KEY `id_funcaocs2` (`id_funcaocs2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perfillol`
--

CREATE TABLE IF NOT EXISTS `tb_perfillol` (
  `cd_perfillol` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(40) NOT NULL,
  `objetivo` varchar(30) DEFAULT NULL,
  `estado` varchar(30) NOT NULL,
  `campeao1` int(11) DEFAULT NULL,
  `campeao2` int(11) DEFAULT NULL,
  `campeao3` int(11) DEFAULT NULL,
  `campeao4` int(11) DEFAULT NULL,
  `campeao5` int(11) DEFAULT NULL,
  `id_elolol` int(11) NOT NULL,
  `id_lane1lol` int(11) NOT NULL,
  `id_lane2lol` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_equipelol` int(11) DEFAULT NULL,
  `idlol` int(11) DEFAULT NULL,
  `reputacao` int(11) DEFAULT NULL,
  `levellol` int(11) NOT NULL,
  `imgperfil` varchar(300) NOT NULL,
  `elo` varchar(40) NOT NULL,
  PRIMARY KEY (`cd_perfillol`),
  UNIQUE KEY `nick` (`nick`),
  UNIQUE KEY `id_usuario` (`id_usuario`),
  KEY `id_elolol` (`id_elolol`),
  KEY `id_lane1lol` (`id_lane1lol`),
  KEY `id_lane2lol` (`id_lane2lol`),
  KEY `id_equipelol` (`id_equipelol`),
  KEY `campeao1` (`campeao1`),
  KEY `campeao2` (`campeao2`),
  KEY `campeao3` (`campeao3`),
  KEY `campeao4` (`campeao4`),
  KEY `campeao5` (`campeao5`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `tb_perfillol`
--

INSERT INTO `tb_perfillol` (`cd_perfillol`, `nick`, `objetivo`, `estado`, `campeao1`, `campeao2`, `campeao3`, `campeao4`, `campeao5`, `id_elolol`, `id_lane1lol`, `id_lane2lol`, `id_usuario`, `id_equipelol`, `idlol`, `reputacao`, `levellol`, `imgperfil`, `elo`) VALUES
(15, 'DT TOPetista13', 'ranqueada', 'CE', 1, 96, 87, 69, 59, 2, 1, 2, 5, NULL, 0, 0, 0, '', ''),
(17, 'lleblack', 'ranqueada', 'SP', 40, 55, 142, 142, 142, 1, 2, 3, 3, 1, 14831814, 0, 53, 'https://avatar.leagueoflegends.com/br/lleblack.png', 'GOLD IV'),
(18, 'DanCan18', 'campeonato', 'AP', 2, 5, 11, 96, 37, 13, 1, 3, 1, 1, 0, -30, 169, 'https://avatar.leagueoflegends.com/br/DanCan18.png', 'GOLD V');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `cd_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `nick` varchar(45) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nascimento` date NOT NULL,
  `reputação` int(11) NOT NULL,
  `sobre` varchar(400) DEFAULT NULL,
  `genero` varchar(20) NOT NULL,
  `cargo` int(11) NOT NULL,
  `stats` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`cd_usuario`),
  UNIQUE KEY `nick` (`nick`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cd_usuario`, `usuario`, `nick`, `senha`, `nascimento`, `reputação`, `sobre`, `genero`, `cargo`, `stats`, `email`) VALUES
(1, 'oi', 'sad', '123', '0000-00-00', 1, 'sas', 'm', 1, 1, 'd@d.com'),
(2, 'nome', 'nick', '123', '0000-00-00', 1, 'oi', 'f', 1, 1, 'd@e.com'),
(3, 'perereq', 'perereq', 'perereq', '2018-10-05', 0, NULL, '1', 1, 1, 'perereq'),
(5, 'xec', 'xec', 'xec', '2018-10-05', 0, NULL, '1', 1, 1, 'xec');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_amigos`
--
ALTER TABLE `tb_amigos`
  ADD CONSTRAINT `tb_amigos_ibfk_1` FOREIGN KEY (`id_usuario1`) REFERENCES `tb_usuario` (`cd_usuario`),
  ADD CONSTRAINT `tb_amigos_ibfk_2` FOREIGN KEY (`id_usuario2`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  ADD CONSTRAINT `tb_comentario_ibfk_1` FOREIGN KEY (`id_usuario1`) REFERENCES `tb_usuario` (`cd_usuario`),
  ADD CONSTRAINT `tb_comentario_ibfk_2` FOREIGN KEY (`id_usuario2`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_conviteequipeusuario`
--
ALTER TABLE `tb_conviteequipeusuario`
  ADD CONSTRAINT `tb_conviteequipeusuario_ibfk_2` FOREIGN KEY (`id_equipecs`) REFERENCES `tb_equipecs` (`cd_equipecs`),
  ADD CONSTRAINT `tb_conviteequipeusuario_ibfk_3` FOREIGN KEY (`id_equipelol`) REFERENCES `tb_equipelol` (`cd_equipelol`),
  ADD CONSTRAINT `tb_conviteequipeusuario_ibfk_4` FOREIGN KEY (`id_lanelol`) REFERENCES `tb_lanelol` (`cd_lanelol`),
  ADD CONSTRAINT `tb_conviteequipeusuario_ibfk_5` FOREIGN KEY (`id_funcaocs`) REFERENCES `tb_funcaocs` (`cd_funcaocs`),
  ADD CONSTRAINT `tb_conviteequipeusuario_ibfk_6` FOREIGN KEY (`id_funcaocs`) REFERENCES `tb_funcaocs` (`cd_funcaocs`),
  ADD CONSTRAINT `tb_conviteequipeusuario_ibfk_7` FOREIGN KEY (`id_jogadorlol`) REFERENCES `tb_perfillol` (`cd_perfillol`),
  ADD CONSTRAINT `tb_conviteequipeusuario_ibfk_8` FOREIGN KEY (`id_jogadorcs`) REFERENCES `tb_perfilcs` (`cd_perfilcs`);

--
-- Limitadores para a tabela `tb_conviteusuarioequipe`
--
ALTER TABLE `tb_conviteusuarioequipe`
  ADD CONSTRAINT `tb_conviteusuarioequipe_ibfk_1` FOREIGN KEY (`id_equipecs`) REFERENCES `tb_equipecs` (`cd_equipecs`),
  ADD CONSTRAINT `tb_conviteusuarioequipe_ibfk_2` FOREIGN KEY (`id_equipelol`) REFERENCES `tb_equipelol` (`cd_equipelol`),
  ADD CONSTRAINT `tb_conviteusuarioequipe_ibfk_3` FOREIGN KEY (`id_funcaocs`) REFERENCES `tb_funcaocs` (`cd_funcaocs`),
  ADD CONSTRAINT `tb_conviteusuarioequipe_ibfk_4` FOREIGN KEY (`id_lanelol`) REFERENCES `tb_lanelol` (`cd_lanelol`),
  ADD CONSTRAINT `tb_conviteusuarioequipe_ibfk_5` FOREIGN KEY (`id_jogadorcs`) REFERENCES `tb_perfilcs` (`cd_perfilcs`),
  ADD CONSTRAINT `tb_conviteusuarioequipe_ibfk_6` FOREIGN KEY (`id_jogadorlol`) REFERENCES `tb_perfillol` (`cd_perfillol`);

--
-- Limitadores para a tabela `tb_denuncia`
--
ALTER TABLE `tb_denuncia`
  ADD CONSTRAINT `tb_denuncia_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_equipecs`
--
ALTER TABLE `tb_equipecs`
  ADD CONSTRAINT `tb_equipecs_ibfk_1` FOREIGN KEY (`id_lurker`) REFERENCES `tb_usuario` (`cd_usuario`),
  ADD CONSTRAINT `tb_equipecs_ibfk_2` FOREIGN KEY (`id_support`) REFERENCES `tb_usuario` (`cd_usuario`),
  ADD CONSTRAINT `tb_equipecs_ibfk_3` FOREIGN KEY (`id_entry`) REFERENCES `tb_usuario` (`cd_usuario`),
  ADD CONSTRAINT `tb_equipecs_ibfk_4` FOREIGN KEY (`id_igl`) REFERENCES `tb_usuario` (`cd_usuario`),
  ADD CONSTRAINT `tb_equipecs_ibfk_5` FOREIGN KEY (`id_awp`) REFERENCES `tb_usuario` (`cd_usuario`),
  ADD CONSTRAINT `tb_equipecs_ibfk_6` FOREIGN KEY (`id_patenteminima`) REFERENCES `tb_patentecs` (`cd_patente`),
  ADD CONSTRAINT `tb_equipecs_ibfk_7` FOREIGN KEY (`id_patentemaxima`) REFERENCES `tb_patentecs` (`cd_patente`);

--
-- Limitadores para a tabela `tb_equipelol`
--
ALTER TABLE `tb_equipelol`
  ADD CONSTRAINT `tb_equipelol_ibfk_10` FOREIGN KEY (`id_Topo`) REFERENCES `tb_perfillol` (`cd_perfillol`),
  ADD CONSTRAINT `tb_equipelol_ibfk_11` FOREIGN KEY (`id_Selva`) REFERENCES `tb_perfillol` (`cd_perfillol`),
  ADD CONSTRAINT `tb_equipelol_ibfk_12` FOREIGN KEY (`id_Meio`) REFERENCES `tb_perfillol` (`cd_perfillol`),
  ADD CONSTRAINT `tb_equipelol_ibfk_13` FOREIGN KEY (`id_Atirador`) REFERENCES `tb_perfillol` (`cd_perfillol`),
  ADD CONSTRAINT `tb_equipelol_ibfk_14` FOREIGN KEY (`id_Suporte`) REFERENCES `tb_perfillol` (`cd_perfillol`),
  ADD CONSTRAINT `tb_equipelol_ibfk_15` FOREIGN KEY (`id_Suporte`) REFERENCES `tb_perfillol` (`cd_perfillol`),
  ADD CONSTRAINT `tb_equipelol_ibfk_16` FOREIGN KEY (`id_dono`) REFERENCES `tb_perfillol` (`cd_perfillol`),
  ADD CONSTRAINT `tb_equipelol_ibfk_6` FOREIGN KEY (`id_elominimo`) REFERENCES `tb_elolol` (`cd_elolol`),
  ADD CONSTRAINT `tb_equipelol_ibfk_7` FOREIGN KEY (`id_elomaximo`) REFERENCES `tb_elolol` (`cd_elolol`);

--
-- Limitadores para a tabela `tb_perfilcs`
--
ALTER TABLE `tb_perfilcs`
  ADD CONSTRAINT `tb_perfilcs_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`cd_usuario`),
  ADD CONSTRAINT `tb_perfilcs_ibfk_2` FOREIGN KEY (`id_equipecs`) REFERENCES `tb_equipecs` (`cd_equipecs`),
  ADD CONSTRAINT `tb_perfilcs_ibfk_3` FOREIGN KEY (`id_patentecs`) REFERENCES `tb_patentecs` (`cd_patente`),
  ADD CONSTRAINT `tb_perfilcs_ibfk_4` FOREIGN KEY (`id_funcaocs1`) REFERENCES `tb_funcaocs` (`cd_funcaocs`),
  ADD CONSTRAINT `tb_perfilcs_ibfk_5` FOREIGN KEY (`id_funcaocs2`) REFERENCES `tb_funcaocs` (`cd_funcaocs`);

--
-- Limitadores para a tabela `tb_perfillol`
--
ALTER TABLE `tb_perfillol`
  ADD CONSTRAINT `tb_perfillol_ibfk_1` FOREIGN KEY (`id_elolol`) REFERENCES `tb_elolol` (`cd_elolol`),
  ADD CONSTRAINT `tb_perfillol_ibfk_10` FOREIGN KEY (`campeao5`) REFERENCES `tb_campeoes` (`cd_campeoes`),
  ADD CONSTRAINT `tb_perfillol_ibfk_2` FOREIGN KEY (`id_lane1lol`) REFERENCES `tb_lanelol` (`cd_lanelol`),
  ADD CONSTRAINT `tb_perfillol_ibfk_3` FOREIGN KEY (`id_lane2lol`) REFERENCES `tb_lanelol` (`cd_lanelol`),
  ADD CONSTRAINT `tb_perfillol_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`cd_usuario`),
  ADD CONSTRAINT `tb_perfillol_ibfk_5` FOREIGN KEY (`id_equipelol`) REFERENCES `tb_equipelol` (`cd_equipelol`),
  ADD CONSTRAINT `tb_perfillol_ibfk_6` FOREIGN KEY (`campeao1`) REFERENCES `tb_campeoes` (`cd_campeoes`),
  ADD CONSTRAINT `tb_perfillol_ibfk_7` FOREIGN KEY (`campeao2`) REFERENCES `tb_campeoes` (`cd_campeoes`),
  ADD CONSTRAINT `tb_perfillol_ibfk_8` FOREIGN KEY (`campeao3`) REFERENCES `tb_campeoes` (`cd_campeoes`),
  ADD CONSTRAINT `tb_perfillol_ibfk_9` FOREIGN KEY (`campeao4`) REFERENCES `tb_campeoes` (`cd_campeoes`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
