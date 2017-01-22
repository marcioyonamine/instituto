-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 22-Jan-2017 às 21:18
-- Versão do servidor: 5.5.53-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `instituto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `iap_aceite`
--

CREATE TABLE IF NOT EXISTS `iap_aceite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objetivo` int(11) NOT NULL,
  `desafio` int(11) NOT NULL,
  `foco` int(16) NOT NULL,
  `data_aceite` date NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `duracao` tinyint(2) NOT NULL,
  `semana` tinyint(2) NOT NULL,
  `fase` tinyint(2) NOT NULL,
  `relatorio` longtext NOT NULL,
  `resposta` longtext NOT NULL,
  `intesidade` varchar(80) NOT NULL,
  `frequencia` varchar(80) NOT NULL,
  `corpos` varchar(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `iap_desafio`
--

CREATE TABLE IF NOT EXISTS `iap_desafio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) NOT NULL,
  `descricao` longtext NOT NULL,
  `nivel` tinyint(2) NOT NULL,
  `yy` tinyint(1) NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Extraindo dados da tabela `iap_desafio`
--

INSERT INTO `iap_desafio` (`id`, `titulo`, `descricao`, `nivel`, `yy`, `publicado`) VALUES
(1, 'Desafiar limites preestabelecidos \r\n', '', 1, 2, 1),
(2, 'Saltar de paraquédas/ fazer rafting/ tirolesa/ trilha em floresta\r\n', '', 1, 2, 1),
(3, 'Fazer uma loucura simples \r\n\r\n', '', 1, 2, 1),
(4, 'Acordar mais cedo \r\n\r\n', '', 1, 2, 1),
(5, 'Comer só frutas durante um período \r\n\r\n', '', 1, 2, 1),
(6, 'Comer mais frutas\r\n\r\n', '', 1, 2, 1),
(7, 'Tomar só líquidos durante um período\r\n\r\n', '', 1, 2, 1),
(8, 'Comer só vegetais crus durante um período \r\n\r\n', '', 1, 2, 1),
(9, 'Doar dinheiro à uma instituição \r\n\r\n', '', 1, 2, 1),
(10, 'Realizar check up médico\r\n\r\n', '', 1, 2, 1),
(11, 'Iniciar dieta\r\n', '', 1, 2, 1),
(12, 'Não usar elevador (subir e descer escadas)\r\n\r\n', '', 1, 2, 1),
(13, 'Andar mais descalço\r\n', '', 1, 2, 1),
(14, 'Tomar banho frio \r\n', '', 1, 1, 1),
(15, 'Não se coçar ou se cutucar \r\n', '', 1, 1, 1),
(16, 'Não roer as unhas\r\n', '', 1, 1, 1),
(17, 'Não se balançar ou batucar\r\n', '', 1, 1, 1),
(18, 'Não dormir por 24h ou mais \r\n', '', 1, 1, 1),
(19, 'Cortar alimentos de origem animal \r\n', '', 1, 1, 1),
(20, 'Cortar álcool \r\n', '', 1, 1, 1),
(21, 'Cortar carne \r\n', '', 1, 1, 1),
(22, 'Cortar laticínios \r\n', '', 1, 1, 1),
(23, 'Cortar cigarro\r\n', '', 1, 1, 1),
(24, 'Cortar açúcar\r\n', '', 1, 1, 1),
(25, 'Fazer amizade com o calor\r\n', '', 1, 1, 1),
(26, 'Fazer amizade com o frio\r\n', '', 1, 1, 1),
(27, 'Não ligar ar condicionado / aquecedor\r\n', '', 1, 1, 1),
(28, 'Dormir ao ar livre\r\n', '', 1, 1, 1),
(29, 'Cortar café da manhã ou jantar\r\n', '', 1, 1, 1),
(30, 'Cortar café da manhã ou jantar\r\n', '', 1, 1, 1),
(31, 'Dormir o necessário \r\n', '', 1, 3, 1),
(32, 'Criar rotina de exercícios e descanso \r\n', '', 1, 3, 1),
(33, 'Fazer jejum \r\n', '', 1, 3, 1),
(34, 'Beber mais água \r\n', '', 1, 3, 1),
(35, 'Quitar ou renegociar dívidas, impostos ou taxas atrasadas\r\n', '', 1, 3, 1),
(36, 'Quitar ou retrair empréstimos\r\n', '', 1, 3, 1),
(37, 'Separar dinheiro pessoal e da empresa/profissional\r\n', '', 1, 2, 1),
(38, 'Estudar sobre mercado financeiro / economia / investimentos\r\n', '', 1, 2, 1),
(39, 'Realizar treinamento de finanças e economia\r\n', '', 1, 2, 1),
(40, 'Contratar consultor financeiro\r\n', '', 1, 2, 1),
(41, 'Cortar custos\r\n', '', 1, 1, 1),
(42, 'Quitar ou renegociar dívidas, impostos ou taxas atrasadas\r\n', '', 1, 2, 1),
(43, 'Cortar benefícios\r\n', '', 1, 1, 1),
(44, 'Diminuir utilização de materiais na empresa\r\n', '', 1, 1, 1),
(45, 'Economizar água e luz\r\n', '', 1, 1, 1),
(46, 'Reutilizar folhas de papéis e materiais descartáveis \r\n', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `iap_objetivo`
--

CREATE TABLE IF NOT EXISTS `iap_objetivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objetivo` longtext NOT NULL,
  `usuario` int(11) NOT NULL,
  `treinador` int(11) NOT NULL,
  `nivel` tinyint(2) NOT NULL,
  `data_inicio` date NOT NULL,
  `finalizado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `iap_objetivo`
--

INSERT INTO `iap_objetivo` (`id`, `objetivo`, `usuario`, `treinador`, `nivel`, `data_inicio`, `finalizado`) VALUES
(4, 'Quero mudar de emprego!', 1, 5, 2, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `iap_semana`
--

CREATE TABLE IF NOT EXISTS `iap_semana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `semana` tinyint(2) NOT NULL,
  `desafio` int(5) NOT NULL,
  `nota` tinyint(2) NOT NULL,
  `relatorio` longtext NOT NULL,
  `objetivo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `iap_termo`
--

CREATE TABLE IF NOT EXISTS `iap_termo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `termo` varchar(60) NOT NULL,
  `abreviatura` varchar(5) NOT NULL,
  `classe` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `iap_termo`
--

INSERT INTO `iap_termo` (`id`, `termo`, `abreviatura`, `classe`) VALUES
(1, 'ying', 'ying', 'ying_yang'),
(2, 'yang', 'yang', 'ying_yang'),
(3, 'ying & yang', 'yy', 'ying_yang'),
(4, 'Ter', 'ter', 'foco'),
(5, 'Fazer', 'fazer', 'foco'),
(6, 'Ser', 'ser', 'foco'),
(7, 'Físico', 'fis', 'corpos'),
(8, 'Emocional', 'emo', 'corpos'),
(9, 'Mental', 'men', 'corpos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `iap_user`
--

CREATE TABLE IF NOT EXISTS `iap_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(160) NOT NULL,
  `name` varchar(80) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `iap_user`
--

INSERT INTO `iap_user` (`id`, `username`, `password`, `name`, `type`) VALUES
(1, 'marcioyonamine', 'e44313433d93ce4d00143f4773be2dfc', 'Marcio Yonamine', 1),
(2, 'thiago', '0c55035086af02b6ed8865fc34e15dfa', 'Thiago Negro', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
