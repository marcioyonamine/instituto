-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tempo de Geração: 07/03/2017 às 11:34
-- Versão do servidor: 5.5.54-cll
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `ialtaper_sistema`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `iap_aceite`
--

CREATE TABLE IF NOT EXISTS `iap_aceite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objetivo` int(11) DEFAULT NULL,
  `desafio` int(11) DEFAULT NULL,
  `data_aceite` date DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `duracao` tinyint(2) DEFAULT NULL,
  `semana` tinyint(2) DEFAULT NULL,
  `fase` tinyint(2) DEFAULT NULL,
  `relatorio` longtext,
  `resposta` longtext,
  `intensidade` varchar(80) DEFAULT NULL,
  `frequencia` varchar(80) DEFAULT NULL,
  `lembrete` varchar(100) DEFAULT NULL,
  `ter` tinyint(1) DEFAULT NULL,
  `fazer` tinyint(1) DEFAULT NULL,
  `ser` tinyint(1) DEFAULT NULL,
  `fisico` tinyint(1) DEFAULT NULL,
  `emocional` tinyint(1) DEFAULT NULL,
  `mental` tinyint(1) DEFAULT NULL,
  `espiritual` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=379 ;

--
-- Fazendo dump de dados para tabela `iap_aceite`
--

INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`, `data_final`, `duracao`, `semana`, `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia`, `lembrete`, `ter`, `fazer`, `ser`, `fisico`, `emocional`, `mental`, `espiritual`) VALUES
(294, 19, 13, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 1, '', '', 'sempre com exceção de noite', 'todos os dias', 'site', NULL, 1, NULL, 1, 1, 1, NULL),
(295, 19, 13, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 2, '', '', 'sempre com exceção de noite', 'todos os dias', 'site', NULL, 1, NULL, 1, 1, 1, NULL),
(296, 19, 64, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 2, '', '', 'o tempo todo', 'todos os dias', 'site', 1, 1, 1, NULL, 1, 1, 1),
(299, 20, 15, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 1, '', '', 'desligado\r\n', '7 dias', 'site', 1, NULL, 1, 1, 1, 1, NULL),
(300, 20, 16, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 2, '', '', 'substituir por uma afirmação positiva\r\n', '7 dias', 'site', 1, NULL, 1, 1, 1, 1, NULL),
(301, 20, 283, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 3, '', '', '3 vezes por dia no minimo\r\n', '7 dias', 'site', 0, 1, 1, 0, 1, 1, 1),
(303, 20, 146, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', 'pelo menos 3 por dia\r\n\r\n', '7 dias', 'site', 0, 1, 1, 1, 1, 1, 1),
(306, 20, 283, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', '3 vezes por dia no minimo\r\n', '7 dias', 'site', 0, 1, 1, 0, 1, 1, 1),
(308, 20, 11, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', 'todas as refeições\r\n\r\n', '7 dias', 'site', 1, 1, 1, 1, 1, 1, 0),
(330, 24, 33, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 1, '', '', '24h\r\n\r\n', '1x na semana', 'Evento no celular\r\n', 1, 1, 0, 1, 1, 1, 1),
(331, 24, 33, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 2, '', '', '24h\r\n\r\n', '1x na semana', 'Evento no celular\r\n', 1, 1, 0, 1, 1, 1, 1),
(332, 24, 283, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 2, '', '', '3\r\n\r\n', 'Mínimo 3x / dia', 'site\r\n', 1, 1, 0, 0, 1, 1, 1),
(333, 24, 283, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 3, '', '', '3\r\n\r\n', 'Mínimo 3x / dia', 'site\r\n', 1, 1, 0, 0, 1, 1, 1),
(334, 24, 218, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 3, '', '', 'Verbalizar\r\n\r\n\r\n', 'Todos os dias', 'site\r\n', 1, 1, 0, 0, 1, 1, 0),
(335, 24, 16, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 3, '', '', 'Todo tempo\r\n\r\n', 'Considerar parar de ranjer os dentes', 'site\r\n', 1, 1, 0, 1, 0, 1, 0),
(336, 24, 3, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', '1 loucura\r\n\r\n', '1 dia', 'site\r\n', 1, 1, 1, 0, 1, 1, 0),
(337, 24, 51, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', '30\r\n\r\n', 'Todas refeições\r\n', 'Post it\r\n', 0, 1, 1, 1, 0, 1, 0),
(338, 24, 110, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', '19h00\r\n\r\n', 'Todo dia\r\n', 'Lembrete no calendar / Post it\r\n\r\n', 1, 1, 1, 0, 1, 1, 0),
(339, 24, 51, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', '30\r\n\r\n', 'Todas refeições\r\n', 'Post it\r\n', 0, 1, 1, 1, 0, 1, 0),
(340, 24, 110, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', '19h00\r\n\r\n', 'Todo dia\r\n', 'Lembrete no calendar / Post it\r\n\r\n', 1, 1, 1, 0, 1, 1, 0),
(341, 24, 157, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', '2x\r\n\r\n', 'Todo dia\r\n', 'Post it\r\n\r\n', 0, 1, 1, 1, 1, 1, 0),
(342, 24, 215, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'Zero\r\n\r\n', 'Todo dia\r\n', 'Se eu falar, pagar uma prenda: beber agua? elogiar alguém?\r\n\r\n\r\n', 0, 1, 1, 0, 1, 1, 0),
(343, 24, 250, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', '3x ao dia\r\n\r\n', 'Todo dia\r\n', 'Post it\r\n', 1, 1, 0, 0, 1, 1, 0),
(344, 24, 296, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', '10 minutos\r\n\r\n', 'Todo dia\r\n', 'Lembrete no calendar / Post it\r\n', 1, 1, 0, 0, 1, 1, 1),
(346, 32, 40, '2017-02-27', '2017-02-27', NULL, NULL, 1, 1, '', '', '1 consultor', '1x', 'celular', NULL, 1, 1, NULL, 1, 1, NULL),
(347, 32, 40, '2017-03-06', '2017-03-13', NULL, NULL, NULL, 2, '', '', '1', '1', 'cel', 1, NULL, NULL, 1, NULL, NULL, NULL),
(348, 32, 105, '2017-03-06', '2017-03-13', NULL, NULL, NULL, 2, '', '', '2', '2', '2', NULL, 1, NULL, NULL, 1, NULL, NULL),
(349, 20, 15, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 2, '', '', 'desligado\r\n', '7 dias', 'site', 1, NULL, 1, 1, 1, 1, NULL),
(350, 20, 53, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 3, '', '', 'Todos os dias\r\n', '7 dias', 'site', 0, NULL, 1, 0, 1, 1, NULL),
(351, 20, 16, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 3, '', '', 'substituir por uma afirmação positiva\r\n', '7 dias', 'site', 1, NULL, 1, 1, 1, 1, NULL),
(352, 20, 53, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', 'Todos os dias\r\n\r\n', '7 dias', 'site', 0, 0, 1, 0, 1, 1, 0),
(353, 20, 241, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', 'Listar pessoas da vida\r\n', '7 dias', 'site', 0, 1, 1, 0, 1, 1, 1),
(354, 20, 4, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', '1 hora mais cedo\r\n', '7 dias', 'site', 1, 1, 1, 1, 1, 1, 0),
(355, 20, 11, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'Todas as refeições\r\n', '7 dias', 'site', 0, 1, 1, 1, 1, 1, 1),
(356, 20, 47, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'Aulas, treinar em casa', '2x por semana', 'site', 1, 1, 1, 1, 1, 1, 1),
(357, 20, 146, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'pelo menos 3 por dia\r\n\r\n', '7 dias', 'site', 0, 1, 1, 1, 1, 1, 1),
(358, 20, 173, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'Uma pessoa por dia\r\n\r\n', '7 dias', 'site', 0, 1, 1, 0, 1, 1, 1),
(359, 20, 220, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', '1 carta detalhada\r\n\r\n', '1 carta', 'site', 0, 1, 1, 0, 1, 1, 1),
(360, 20, 258, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', '1 lista\r\n', '1 lista', 'site', 0, 1, 1, 0, 1, 1, 1),
(361, 20, 289, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'Fazer aulas, ver youtube\r\n', '3 dias', 'site', 0, 1, 1, 1, 1, 1, 1),
(362, 19, 64, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 3, '', '', 'o tempo todo', 'todos os dias', 'site', 1, 1, 1, NULL, 1, 1, 1),
(363, 19, 14, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 3, '', '', 'sempre que estiver em casa', 'todos os dias', 'site', 1, 1, 0, 1, 1, 0, 0),
(364, 19, 79, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 3, '', '', 'nenhum perfume', 'todos os dias', 'site', 1, 1, 0, 1, 1, 1, 0),
(365, 19, 14, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', 'sempre que estiver em casa', 'todos os dias', 'site', 1, 1, 0, 1, 1, 0, 0),
(366, 19, 79, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', 'nenhum perfume', 'todos os dias', 'site', 1, 1, 0, 1, 1, 1, 0),
(367, 19, 122, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', '1h por dia', 'todos os dias', 'site', 1, 1, 0, 0, 0, 1, 0),
(368, 19, 65, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', 'menos 5 minutos', 'todos os dias', 'site', 0, 1, 1, 1, 0, 1, 0),
(369, 19, 6, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 4, '', '', 'pelo menos 2 frutas', 'todos os dias', 'site', 0, 1, 1, 1, 0, 1, 0),
(370, 19, 122, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', '1h por dia', 'todos os dias', 'site', 1, 1, 0, 0, 0, 1, 0),
(371, 19, 65, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'menos 5 minutos', 'todos os dias', 'site', 0, 1, 1, 1, 0, 1, 0),
(372, 19, 6, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'pelo menos 2 frutas', 'todos os dias', 'site', 0, 1, 1, 1, 0, 1, 0),
(373, 19, 10, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'pelo menos agendar', '1 vez', 'site', 0, 1, 1, 1, 1, 1, 0),
(374, 19, 52, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', '1h por dia', '1 livro', 'site', 1, 1, 1, 0, 1, 1, 0),
(375, 19, 78, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'pra ir trabalhar', '2 dias', 'site', 1, 1, 1, 1, 1, 1, 0),
(376, 19, 99, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'Encontrar uma forma pelo menos\r\n', 'Todos os dias', 'site', 1, 1, 1, 1, 0, 1, 0),
(377, 19, 129, '2017-02-15', '2017-02-20', NULL, NULL, NULL, 5, '', '', 'Otimizar pelo menos 1 processo', '5 dias', 'site', 0, 1, 0, 0, 1, 1, 0),
(378, 34, 21, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Zero álcool', '7 dias', 'Inserir no outlook como lembrete diário', 0, 1, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `iap_advertencia`
--

CREATE TABLE IF NOT EXISTS `iap_advertencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `fase` int(2) NOT NULL,
  `objetivo` int(11) NOT NULL,
  `semana` int(2) NOT NULL,
  `advertencia` int(1) NOT NULL,
  `publicado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `iap_desafio`
--

CREATE TABLE IF NOT EXISTS `iap_desafio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) NOT NULL,
  `descricao` longtext NOT NULL,
  `nivel` tinyint(2) NOT NULL,
  `yy` tinyint(1) NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  `tooltip_des` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=326 ;

--
-- Fazendo dump de dados para tabela `iap_desafio`
--

INSERT INTO `iap_desafio` (`id`, `titulo`, `descricao`, `nivel`, `yy`, `publicado`, `tooltip_des`) VALUES
(1, 'Desafiar seus próprios limites, desafiar o ego \n', '', 1, 2, 1, 'Você deve criar uma lista com coisas que você julga que são os seus limites e transcender esses limites. Ex. de Frequência: 3 itens da lista por dia; Ex. de Intensidade: Transcender 2 itens na semana.\n'),
(2, 'Saltar de paraquédas/ fazer rafting/ tirolesa/ trilha em floresta', '', 1, 2, 1, 'Fazer uma dessas atividades. Ex. de Frequência: 1 ou 2 atividades durante a fase; Ex. de Intensidade: Algo que desperta Medo.\n'),
(3, 'Fazer algo que para você seja uma loucura simples', '', 1, 2, 1, 'Ir trabalhar com sapatos trocados, convencer alguém de algo sem sentido, pode ser qualquer coisa que você considera fora do comum. Ex. de Frequência: 1 loucura por semana; Ex. de Intensidade: Algo que desperte um sentimento específico que você queira trabalhar.\n'),
(4, 'Acordar mais cedo \r\n\r\n', '', 1, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: 1 hora.\n'),
(5, 'Durante um determinado período se alimentar só de frutas', '', 1, 2, 1, ' Ex. de Frequência: Todas as manhãs ou uma semana completa; Ex. de Intensidade: Só frutas.\n\n'),
(6, 'Comer mais frutas que come hoje', '', 1, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: 3x mais.\n\n'),
(7, 'Se alimentar só de líquidos durante um período\n\n', '', 1, 2, 1, ' Ex. de Frequência: Por 3 dias ou uma semana completa; Ex. de Intensidade: Só líquidos.\n'),
(8, 'Se alimentar só de vegetais crus durante um período', '', 1, 2, 1, ' Ex. de Frequência: Por 3 dias ou uma semana completa; Ex. de Intensidade: Só vegetais crus.\n'),
(9, 'Doar dinheiro à uma instituição \r\n\r\n', '', 1, 2, 1, 'Escolha uma instituição séria para realizar esse desafio, doe o valor que fizer sentido para você. Ex. de Frequência: 1 ou mais vezes na fase; Ex. de Intensidade: R$ 100,00 (Apenas um exemplo).\n'),
(10, 'Realizar check up médico\r\n\r\n', '', 1, 2, 1, 'Agende consultas que fazem sentido para o seu momento de vida Ex. de Frequência: 1 vez durante a fase; Ex. de Intensidade: Uma consulta e um retorno.\n'),
(11, 'Programar e Iniciar uma dieta', '', 1, 2, 1, 'Adapte a sua rotina para começar uma dieta alimentar, uma que faça sentido para você. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Seguir a risca a dieta.\n'),
(12, 'Fazer uma consulta no nutricionista', '', 1, 2, 1, ' Ex. de Frequência: 1 vez durante a fase; Ex. de Intensidade: Uma consulta e um retorno.\n'),
(13, 'Não usar o elevador, subir e descer usando as escadas', '', 1, 2, 1, ' Ex. de Frequência: Todos as oportunidades; Ex. de Intensidade: Até 10 andares.\n'),
(14, 'Andar só descalço em um espaço específico (casa, trabalho...)', '', 1, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Em casa.\n'),
(15, 'Tomar banho frio\r\n', '', 1, 1, 1, 'Simplesmente desligue o chuveiro ou abaixe a temperatura Ex. de Frequência: 5 dias na semana; Ex. de Intensidade: Chuveiro desligado.\n'),
(16, 'Parar de se coçar ou se cutucar ', '', 1, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Se acontecer de cutucar, elogiar alguém próximo.\n'),
(17, 'Parar de roer as unhas', '', 1, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Se acontecer de roer, dar 3 pulos.\n'),
(18, 'Parar de se balançar ou batucar', '', 1, 1, 1, ' Ex. de Frequência: Dias da semana; Ex. de Intensidade: Se acontecer de balançar, tomar um copo de água.\n'),
(19, 'Não dormir por 24h ou mais\r\n', '', 1, 1, 1, ' Ex. de Frequência: 1 vez durante a fase; Ex. de Intensidade: 24h ou mais.\n'),
(20, 'Cortar alimentos de origem animal\r\n', '', 1, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Cortar tudo.\n'),
(21, 'Cortar álcool', '', 1, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Cortar tudo.\n'),
(22, 'Cortar carne  (branca, vermelha, peixe...)\n\n', '', 1, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Cortar tudo.\n'),
(23, 'Cortar laticínios e seus derivados (leite, queijo, iogurte...)\n', '', 1, 1, 1, 'Ex. de Frequência: Todos os dias; Ex. de Intensidade: Cortar tudo.\n'),
(24, 'Cortar cigarro\r\n', '', 1, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Cortar tudo.\n'),
(25, 'Cortar açúcar refinado e produtos industrializados com açúcar\n', '', 1, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Cortar tudo.\n'),
(26, 'Fazer amizade com o calor, sentir o calor e aceitá-lo como ele é', '', 1, 1, 1, 'Nesse desafio você deve buscar situações para sentir o calor e aceitá-lo. Ex. de Frequência: Dias da semana; Ex. de Intensidade: No escritório e no carro.\n'),
(27, 'Fazer amizade com o frio, sentir o frio e aceitá-lo como ele é', '', 1, 1, 1, ' Ex. de Frequência: Finais de semana; Ex. de Intensidade: Não usar blusa ou casaco acima de 18°C.\n'),
(28, 'Não ligar ar condicionado / aquecedor\r\n', '', 1, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Em casa e no escritório.\n'),
(29, 'Dormir ao ar livre\r\n', '', 1, 1, 1, 'Escolha um lugar seguro para esse desafio. Ex. de Frequência: 1 vez durante a fase; Ex. de Intensidade: 1 noite inteira.\n'),
(30, 'Cortar café da manhã ou jantar\r\n', '', 1, 1, 1, ' Ex. de Frequência: Durante a semana; Ex. de Intensidade: Café da manhã.\n'),
(31, 'Dormir somente o necessário', '', 1, 3, 1, 'Faça as contas de quanto você acha que precisa dormir e programe o seu despertador com base nessas horas menos a hora que você precisa acordar. Exemplo: Durmir só 6 horas. Se preciso acordar as 7h, tenho que dormir á 1h da manhã. Ex. de Frequência: Dias da semana; Ex. de Intensidade: 6 horas.\n'),
(32, 'Criar uma rotina de exercícios e descanso ', '', 1, 3, 1, 'Estabeleça horários no seu dia a dia para se exercitar e coloque também horas específicas para descansar. Ex. de Frequência: 5X por semana; Ex. de Intensidade: 1 hora de exercício e 1 hora de descanso.\n'),
(33, 'Fazer jejum por um período', '', 1, 3, 1, 'Procure mais informações sobre os benefícios dos diferentes tipos de jejuns. Ex. de Frequência: 1X por semana; Ex. de Intensidade: 24 horas.\n'),
(34, 'Beber mais água que o habitual', '', 1, 3, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: 2 litros.\n'),
(35, 'Quitar ou renegociar dívidas atrasadas', '', 1, 3, 1, 'Busque os atrasos ou possíveis dívidas para resolver ou poder melhorar as condições por negociação. Ex. de Frequência: 1 vez durante a fase; Ex. de Intensidade: Quitar pelo menos 50% das pendências.\n'),
(36, 'Quitar ou retrair empréstimos\r\n', '', 1, 3, 1, 'Busque os atrasos ou possíveis dívidas para resolver ou poder melhorar as condições por negociação. Ex. de Frequência: 1 vez durante a fase; Ex. de Intensidade: Quitar pelo menos 50% das pendências.\n'),
(37, 'Separar dinheiro pessoal e da empresa/profissional', '', 1, 2, 1, 'Fazer uma separação minuciosa das suas finanças. Ex. de Frequência: 1 vez durante a fase; Ex. de Intensidade: Criar uma planilha.\n'),
(38, 'Estudar sobre mercado financeiro ou investimentos\n', '', 1, 2, 1, 'Se inscreva em algum curso, leia um livro, participe de algum seminário ou outros. Ex. de Frequência: 3 vezes durante a fase; Ex. de Intensidade: Renda Fixa e Ações.\n'),
(39, 'Realizar treinamento de finanças ou investimentos', '', 1, 2, 1, 'Ex. de Frequência: ; Ex. de Intensidade: .\n'),
(40, 'Contratar consultor financeiro\r\n', '', 1, 2, 1, 'Procure um profissional para te ajudar nesse aspecto. Ex. de Frequência: 1 vez durante a fase; Ex. de Intensidade: 1 Reunião com o Profissional.\n'),
(41, 'Cortar custos pessoais e/ou profissionais', '', 1, 1, 1, 'Entender quais custos você tem hoje que podem ser cortados. Ex. de Frequência: 1 vez por semana; Ex. de Intensidade: Cortar 20%.\n'),
(45, 'Economizar água e luz\r\n', '', 1, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Economizar 40%.\n'),
(46, 'Reutilizar folhas de papéis e materiais descartáveis \r\n', '', 1, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Reutilizar pelo menos 50%.\n'),
(47, 'Adquirir hobby leve (dança, pintura, jardinagem, colecionáveis)', '', 2, 2, 1, 'Começar uma atividade prazerosa para você. Ex. de Frequência: Fazer uma vez por semana; Ex. de Intensidade: Por 1 hora.\n'),
(48, 'Criar um plano de investimentos', '', 2, 2, 1, 'Criar uma planejamento para você investir o seu dinheiro no curto, médio ou longo prazo. Ex. de Frequência: 2 vezes na semana; Ex. de Intensidade: Finalizar o plano até o próximo encontro.\n'),
(49, 'Dar presentes', '', 2, 2, 1, 'Simplesmente dar presentes sem se prender no valor financeiro, muitas vezes algo simples é o melhor dos presentes. Ex. de Frequência: 3 vezes na semana; Ex. de Intensidade: 3 pessoas diferentes.\n'),
(50, 'Dar presentes inusitados (nome na estrela, terra e sementes, etc)', '', 2, 2, 1, 'Procurar por presentes diferentes do comum para dar as pessoas, tudo é válido nesse caso. Ex. de Frequência: 2 vezes na semana; Ex. de Intensidade: 2 pessoas diferentes.\n'),
(51, 'Aumentar o número de vezes que mastiga o alimento', '', 2, 2, 1, 'Primeiro conte quantas vezes você mastiga o alimento e daí pra frente aumente a quantidade de vezes. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Dobro de vezes.\n'),
(52, 'Ler um livro por prazer', '', 2, 2, 1, 'Qualquer tipo de livro que seja prazeroso para você. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 1 capítulo do livro.\n'),
(53, 'Listar o que incomoda em outras pessoas', '', 2, 2, 1, 'Observar nas outras pessoas o que incomoda você e fazer um lista, desde os menores incômodos até coisas que te tiram do sério. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 5 itens por dia.\n'),
(54, 'Não mexer no celular enquanto dirige', '', 2, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todas as vezes.\n'),
(55, 'Experimentar um sabor novo por dia', '', 2, 2, 1, 'Procure comer coisas novas e diferentes, coisas que você fala que não gosta mas nunca experimentou. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 1 coisa nova.\n'),
(56, 'Usar roupas com cores mais alegres', '', 2, 2, 1, ' Ex. de Frequência: Durante a semana; Ex. de Intensidade: No trabalho.\n'),
(57, 'Inserir cores positivas em ambientes que convive', '', 2, 2, 1, 'Basicamente colocar coisas mais coloridas, quadros, flores, fotos e etc. Ex. de Frequência: Durante a semana; Ex. de Intensidade: 5 cores novas.\n'),
(58, 'Guardar todas as moedas que tiver em um cofrinho', '', 2, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todas as moedas de R$1,00.\n'),
(59, 'Montar Lego, quebra-cabeças ou similares\n', '', 2, 2, 1, ' Ex. de Frequência: 2 vezes na semana; Ex. de Intensidade: Montar um carrinho ou casa.\n'),
(60, 'Comprar roupas intímas novas (estímulo sensual)', '', 2, 2, 1, ' Ex. de Frequência: 1 vez na semana; Ex. de Intensidade: 3 conjuntos.\n'),
(61, 'Andar de bicicleta', '', 2, 2, 1, ' Ex. de Frequência: 3 vezes na semana; Ex. de Intensidade: Mínimo 5km.\n'),
(62, 'Pintar a unha de cores fortes', '', 2, 2, 1, ' Ex. de Frequência: 1 vez na semana; Ex. de Intensidade: Vermelho, laranja ou amarelo.\n'),
(63, 'Fazer controle financeiro', '', 2, 1, 1, 'Organizar suas finanças e anotar todos os gasto. Recomendamos o site GuiaBolso.com.br. Ex. de Frequência: 2 vezes por dia; Ex. de Intensidade: Todos os gastos.\n'),
(64, 'Fazer uma lista de todos os hábitos que observar', '', 2, 1, 1, 'Anotar e listar todos os hábitos que você têm. Desde os mais simples como mexer no cabelo, até os mais diferentes como não pisar na junção dos azulejos do chão. Anote todos não tem certo ou errado. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 7 hábitos por dia.\n'),
(65, 'Diminuir tempo no banho', '', 2, 1, 1, 'Primeiro conte quanto tempo você leva no banho e depois diminua. Recomendamos colocar o celular com despertador para não perder a hora. Ex. de Frequência: Dias da semana; Ex. de Intensidade: Banhos 50% mais rápidos.\n'),
(66, 'Reservar tempo para si mesmo fazer o que quiser', '', 2, 1, 1, 'Anote um compromisso com você mesmo na agenda para fazer o que desejar. Ex. de Frequência: 2 vezes na semana; Ex. de Intensidade: 2 horas.\n'),
(67, 'Diminuir a quantidade de comida nas refeições', '', 2, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: 50% a menos de comida no prato.\n'),
(68, 'Cortar luxos e/ou supérfluos', '', 2, 1, 1, 'Observar tudo que você entende como luxo ou supérfluo no seu dia a dia e cortar essas coisas. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 1 Luxo ou Supérfluo por dia.\n'),
(69, 'Fazer refeições de olhos fechados', '', 2, 1, 1, 'Não precisa comer de olhos fechados quando está comendo com pessoas do trabalho ou na rua, pode pegar esse desafio para quando estiver em casa por exemplo. Ex. de Frequência: 3 vezes na semana; Ex. de Intensidade: Quando estiver sozinho.\n'),
(70, 'Gastar menos dinheiro', '', 2, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Gastar 25% do que gasta geralmente.\n'),
(71, 'Ficar sem acessar redes sociais (Facebook, Twitter, SnapChat e Instagram)', '', 2, 1, 1, 'Nesse desafio não é necessário parar com o WhatsApp se você utiliza para o trabalho. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Zero acessos.\n'),
(72, 'Cortar sexo por um período', '', 2, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Por 15 dias.\n'),
(73, 'Cortar pornografia / masturbação', '', 2, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Por 15 dias.\n'),
(74, 'Parar de ver TV / rádio / notícias', '', 2, 1, 1, ' Ex. de Frequência: Durante a semana; Ex. de Intensidade: Não assistir nada.\n'),
(75, 'Cortar saídas a bares, baladas e house parties', '', 2, 1, 1, ' Ex. de Frequência: Durante os finais de semana; Ex. de Intensidade: Zero saídas.\n'),
(76, 'Cortar atividades que usa para se entreter', '', 2, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Cortar tudo, substituir por trabalho ou estudo.\n'),
(77, 'Suportar dor e/ou incômodos sem reclamar', '', 2, 3, 1, 'Esse desafio é para suportar pequenas dores e incômodos do dia a dia, para algo mais intenso procure um médico ou ajuda. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Dores musculares na academia.\n'),
(78, 'Cortar maquiagem', '', 2, 3, 1, ' Ex. de Frequência: 4 vezes na semana; Ex. de Intensidade: Zero maquiagem.\n'),
(79, 'Cortar perfumes', '', 2, 3, 1, 'Esse desafio é sobre perfume e não desodorante. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Zero perfumes.\n'),
(80, 'Cortar corrupções (download ilegal, furar fila, atestado falso, etc)', '', 2, 3, 1, 'Abrir mão de tudo que não seja original. Ex. de Frequência: Checar 3 vezes na semana; Ex. de Intensidade: Apagar músicas, filmes e doar roupas..\n'),
(81, 'Comprar apenas à vista', '', 2, 3, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todas as compras.\n'),
(82, 'Separar 10% da sua renda para caridade', '', 2, 3, 1, 'Buscar uma instituição de caridade íntegra e doar uma parte da sua renda. Ex. de Frequência: 1 vez na fase; Ex. de Intensidade: 15% da renda.\n'),
(83, 'Visitar grupos de networking', '', 2, 2, 1, 'Alguns exemplos podem ser: BNI, Virtvs e outros. Ex. de Frequência: 1 vez durante a fase; Ex. de Intensidade: 1 grupo.\n'),
(84, 'Prospectar novos mercados ou áreas de atuação profissional', '', 2, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Uma área nova por dia.\n'),
(85, 'Observar concorrências ou empresas de outras áreas', '', 2, 1, 1, 'Fazer anotações, observar campanhas, ver acertos e erros, marcar uma bate papo para se conhecer melhor. Ex. de Frequência: 1 vez na semana; Ex. de Intensidade: Marcar bate papo.\n'),
(86, 'Otimizar as metas profissionais, usar ferramenta S.M.A.R.T.\n', '', 2, 2, 1, 'Pegar o vídeo da meta SMART na sua área de membros e aplicar isso para todas as suas metas profissionais. Ex. de Frequência: Durante a semana; Ex. de Intensidade: Pelo menos 7 metas.\n'),
(87, 'Criar plano de negócios/plano de carreira', '', 2, 2, 1, 'Criar onde você gostaria de levar a sua empresa ou a sua carreira nos próximos, meses ou anos. Ex. de Frequência: No final de semana; Ex. de Intensidade: Criar um plano completo para 5 anos.\n'),
(88, 'Buscar novas parcerias ou contatos profissionais', '', 2, 2, 1, ' Ex. de Frequência: 3 vezes na semana; Ex. de Intensidade: Pelo menos 3 novos contatos.\n'),
(89, 'Fazer um mapa de ideias e criar em lista por ordem de importância', '', 2, 2, 1, 'Mapa de ideias pode ser uma folha em branco onde você coloca todas as ideias sem filtrar, depois liste quais são mais importantes e viáveis para o seu atual momento. Ex. de Frequência: Tirar 1 dia para fazer isso; Ex. de Intensidade: Só termina quando tiver 15 ideias listadas.\n'),
(90, 'Estudar sobre seu mercado de atuação / vendas / networking / inovação', '', 2, 1, 1, 'Escolha um mercado que faça sentido para você e faça um estudo sobre esse tema específico. Ex. de Frequência: 1 vez na semana; Ex. de Intensidade: Estudar por 2 horas.\n'),
(91, 'Realizar treinamentos de venda / estratégias de negociação', '', 2, 3, 1, ' Ex. de Frequência: Procurar na semana; Ex. de Intensidade: Fazer o treinamento nos próximos 3 meses.\n'),
(92, 'Fazer esportes não competitivos', '', 3, 2, 1, 'Participar de algum esporte ou jogo sem a intenção de competir, apenas para se divertir Ex. de Frequência: 1 vez na semana; Ex. de Intensidade: 1 partida.\n'),
(93, 'Fazer uma ou mais coisas diferentes, com a mão trocada\n', '', 3, 2, 1, 'Utilizar a mão que você menos usa para atividades do dia a dia, por exemplo mexer no mouse com a mão esquerda. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todo dia uma atividade nova.\n'),
(94, 'Fazer uma lista com as habilidades que faz bem', '', 3, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Pelo menos 3 itens por dia.\n'),
(95, 'Seguir as regras de trânsito', '', 3, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Seguir á risca.\n'),
(96, 'Fazer tarefas/organizar a casa  (arrumar a cama, lavar a louça e etc) \n', '', 3, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Antes de sair para trabalhar e antes de dormir.\n'),
(97, 'Abrir e-mail / whatsapp em horas específicas', '', 3, 2, 1, 'Programar no seu dia a dia a hora certa para abrir o e-mail ou whatsapp e definir tempo limite para ficar nesses aplicativos. Ex. de Frequência: Dias da semana; Ex. de Intensidade: 3 vezes por dia.\n'),
(98, 'Jogar Xadrez / Palavras cruzadas / Sudoku / Cubo Mágico', '', 3, 2, 1, 'Fazer qualquer atividade que utilize muito do raciocínio lógico Ex. de Frequência: 5 vezes na semana; Ex. de Intensidade: 1 vez por dia.\n'),
(99, 'Divulgar o trabalho/empresa/cargo/currículo', '', 3, 2, 1, ' Ex. de Frequência: Durante a semana; Ex. de Intensidade: Divulgar pelo menos 5 vezes.\n'),
(100, 'Fazer coisas ao mesmo tempo (ex: lavar cabeça e escovar dentes)', '', 3, 2, 1, 'Buscar fazer mais de uma coisa ao mesmo tempo no seu dia a dia, ver o que faz sentido no seu contexto. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Fazer 2 coisas diferentes por dia.\n'),
(101, 'Terminar projetos atrasados', '', 3, 2, 1, ' Ex. de Frequência: Um pouco todos os dias; Ex. de Intensidade: Finalizar todos projetos.\n'),
(102, 'Iniciar novos projetos', '', 3, 2, 1, ' Ex. de Frequência: Um pouco todos os dias; Ex. de Intensidade: Iniciar um projeto profissional.\n'),
(103, 'Ser pontual em compromissos e com si próprio', '', 3, 2, 1, 'Ser pontual com todas as pessoas e agendar compromisso consigo mesmo com data e local, e seguir á risca. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todos compromissos.\n'),
(104, 'Arrumar guarda-roupas/mesa/carro e se desfazer de coisas antigas', '', 3, 2, 1, ' Ex. de Frequência: 2 vezes na semana; Ex. de Intensidade: O guarda roupa e o carro.\n'),
(105, 'Lavar carro', '', 3, 2, 1, ' Ex. de Frequência: 1 vez na semana; Ex. de Intensidade: Por dentro e por fora.\n'),
(106, 'Colocar mais flores e plantas em seus ambientes', '', 3, 2, 1, ' Ex. de Frequência: 1 vez na semana; Ex. de Intensidade: 3 plantas novas.\n'),
(107, 'Limpar a sujeira de outras pessoas', '', 3, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Em casa.\n'),
(108, 'Reciclar o seu lixo', '', 3, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Separar o lixo de casa.\n'),
(109, 'Fazer atividades que tenham um risco calculado\n', '', 3, 2, 1, 'Busque alguma atividade pessoal ou profissional que para você tenha um nível de risco médio. Ex. de Frequência: No final de semana; Ex. de Intensidade: Algo que desperte medo.\n'),
(110, 'Não fazer hora extra no trabalho', '', 3, 1, 1, ' Ex. de Frequência: Dias da semana; Ex. de Intensidade: Tolerância de 10 minutos.\n'),
(111, 'Fazer lista de ideias e filtrar só as viáveis', '', 3, 1, 1, ' Ex. de Frequência: No final de semana; Ex. de Intensidade: Listar pelo menos 5 realmente viáveis.\n'),
(112, 'Sempre dar passagem no trânsito', '', 3, 1, 1, 'Dar passagem para os outros motoristas, pedestres em todas as situações. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Sempre.\n'),
(113, 'Cortar todos os tipos jogos \n', '', 3, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Por 15 dias.\n'),
(114, 'Eliminar competitividade nos esportes', '', 3, 1, 1, 'Participar dos jogos apenas para se divertir, seja esportes ou jogos eletrônicos Ex. de Frequência: Todos os dias; Ex. de Intensidade: Jogar pela diversão.\n'),
(115, 'Aprender uma nova habilidade', '', 3, 1, 1, 'Buscar aprender qualquer nova habilidade que faça sentido para você, podendo ser qualquer habilidade, por exemplo: Malabares. Ex. de Frequência: Treinar todos os dias; Ex. de Intensidade: Pelo menos 20 minutos por dia.\n'),
(116, 'Cavar um buraco com pá (perda do sentido na ação - gratidão)', '', 3, 1, 1, 'Simplesmente cavar um buraco e depois tapar o buraco com a terra, apenas isso. Ex. de Frequência: Uma vez; Ex. de Intensidade: Um buraco médio.\n'),
(117, 'Ficar sem fazer nada (ocioso) por um tempo', '', 3, 1, 1, 'Ficar ocioso não é ver TV, mexer no celular, nada, é realmente ficar ocioso "olhando para o teto". Ex. de Frequência: 2 vezes na semana; Ex. de Intensidade: 15 minutos.\n'),
(118, 'Parar de usar relógio', '', 3, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Ficar sem relógio.\n'),
(119, 'Sempre dar passagem para estranhos', '', 3, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Em ambientes públicos.\n'),
(120, 'Segurar a porta para estranhos, conhecidos e familiares', '', 3, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todas as oportunidades.\n'),
(121, 'Parar de se olhar no espelho, reflexos e câmera do celular', '', 3, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Não se olhar.\n'),
(122, 'Estudar outra língua', '', 3, 3, 1, ' Ex. de Frequência: 3 vezes por semana; Ex. de Intensidade: 1 hora.\n'),
(123, 'Doar roupas', '', 3, 3, 1, ' Ex. de Frequência: 1 vez na fase; Ex. de Intensidade: 5 roupas.\n'),
(124, 'Bagunçar a organização dos aplicativos no celular', '', 3, 3, 1, 'Mude a forma como você organiza os aplicativos ou tire os grupos de aplicativos por área.  Ex. de Frequência: 1 vez na fase; Ex. de Intensidade: Deixar desorganizado por 15 dias.\n'),
(125, 'Não usar poder para conforto', '', 3, 3, 1, 'Deixar de pedir para os outros fazerem coisas que você mesmo pode fazer, por exemplo: Pega esse copo para mim.  Ex. de Frequência: Todos os dias; Ex. de Intensidade: Com familiares.\n'),
(126, 'Fazer planejamento de rotina do dia com ações e descansos', '', 3, 3, 1, 'Organizar o seu dia a dia com o que tem que fazer e colocar também momentos de descanso. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Organizar a semana toda na sexta feira.\n'),
(127, 'Permitir que o outro ganhe em discussões, negociação ou esportes', '', 3, 1, 1, 'Não se deixar levar na competitividade dessas situações. Ex. de Frequência: Durante o trabalho; Ex. de Intensidade: Abrir mão de discutir.\n'),
(128, 'Realizar processos de maneira mais rápida/mais qualidade/mais eficiente', '', 3, 2, 1, 'Modificar os processos do seu trabalho ou empresa para aumentar a eficiência. Ex. de Frequência: Um pouco todos os dias; Ex. de Intensidade: Modificar processo de vendas.\n'),
(129, 'Criar processos claros ou simplificar processos atuais\n', '', 3, 2, 1, ' Ex. de Frequência: Até o final da semana; Ex. de Intensidade: Modificar processo de compra.\n'),
(130, 'Criar cronograma ou fluxograma', '', 3, 2, 1, 'Criar uma organização do projeto atual. Ex. de Frequência: Até o final da fase; Ex. de Intensidade: Criar um cronograma até o final do projeto.\n'),
(131, 'Desenvolver expertise de mercado', '', 3, 1, 1, 'Estudar assuntos que você sente que está faltando para se tornar um expert no seu mercado de atuação. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 1h30 por dia.\n'),
(132, 'Montar plano com estratégias da ação pessoal ou profissional', '', 3, 2, 1, ' Ex. de Frequência: Separar 2 dias só para focar nisso; Ex. de Intensidade: Montar um plano para 6 meses.\n'),
(133, 'Estudar sobre processos / produção / otimização / qualidade', '', 3, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Ler um livro.\n'),
(134, 'Implementar métricas de qualidade na carreira ou empresa', '', 3, 2, 1, 'Criar objetivos e parâmetros a serem seguidos para sua carreira ou empresa. Ex. de Frequência: Até Final do ano; Ex. de Intensidade: Certificação ISSO 9001.\n'),
(135, 'Aumentar atenção para diminuir retrabalho', '', 3, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Conferir todos os trabalhos durante 15 dias.\n'),
(136, 'Criar planejamento de atividades semanal', '', 3, 2, 1, 'Organizar as semanas antes de início delas.  Ex. de Frequência: Todos os dias; Ex. de Intensidade: Fazer planejamento detalhado dos dias.\n'),
(137, 'Realizar treinamentos técnicos', '', 3, 3, 1, ' Ex. de Frequência: Até final do semestre; Ex. de Intensidade: 1 treinamento vivencial.\n'),
(138, 'Organizar o tempo, listar onde investe o tempo', '', 3, 2, 1, 'Observar onde está investindo o tempo no dia a dia, listando as atividades feitas e o tempo investido em cada uma delas, e verificar se faz sentido com as metas. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Separar tabela por períodos de 30 minutos.\n'),
(139, 'Fazer novas amizades', '', 4, 2, 1, ' Ex. de Frequência: Nos finais de semana; Ex. de Intensidade: Pelo menos 3 novos amigos na fase.\n'),
(140, 'Colocar post-it pela casa com mensagens positiva para as pessoas', '', 4, 2, 1, 'Colocar post-it pela casa com mensagens positiva para as pessoas. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 3 post-it''s por dia.\n'),
(141, 'Usar transporte público', '', 4, 2, 1, ' Ex. de Frequência: Nos dias da semana; Ex. de Intensidade: 2 vezes por dia.\n'),
(142, 'Elogiar uma pessoa por dia', '', 4, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: 2 pessoas por dia.\n'),
(143, 'Ajudar uma pessoa por dia', '', 4, 2, 1, 'Ajudar em qualquer tipo de situação e em qualquer contexto. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 3 pessoas por dia no trabalho.\n'),
(144, 'Presentear pessoas diferentes', '', 4, 2, 1, 'Pode ser qualquer tipo de presentes dos mais simples, como um bilhetinho até algo mais complexo. Ex. de Frequência: Na semana; Ex. de Intensidade: 2 pessoas.\n'),
(145, 'Escrever texto ou ligar para agradecer parente ou amigo antigo\n', '', 4, 2, 1, ' Ex. de Frequência: 3 vezes na fase; Ex. de Intensidade: 1 pessoa por dia.\n\n'),
(146, 'Cumprimentar estranhos na rua/trabalho', '', 4, 2, 1, 'Um bom dia sincero já é o suficiente. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 3 pessoas por dia.\n'),
(147, 'Mentalizar e emanar cura e amor para pessoas conhecidas e desconhecidas', '', 4, 2, 1, 'Nesse desafios você precisa apensar mentalizar de onde você estiver para emanar cura e amor para os demais, pelo bem dessas pessoas. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 20 minutos por dia.\n'),
(148, 'Fazer serviço voluntário presencialmente\n', '', 4, 2, 1, ' Ex. de Frequência: No final de semana; Ex. de Intensidade: 1 dia inteiro.\n'),
(149, 'Assistir filme que traga autorreflexão com amigos/familiares', '', 4, 2, 1, 'Consulte a lista de sugestões de conteúdo para ter indicações. Ex. de Frequência: No final de semana; Ex. de Intensidade: 1 filme.\n'),
(150, 'Fazer uma lista de atividades que gosta de fazer', '', 4, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: 10 itens na lista.\n'),
(151, 'Listar as críticas das outras pessoas sobre nós', '', 4, 2, 1, 'Observe o que as pessoas a sua volta geralmente te criticam e faça uma lista, desde as pequenas coisas até críticas maiores. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 10 itens na lista.\n'),
(152, 'Listar o que incomoda nos outras pessoas, atitudes/comportamentos/etc', '', 4, 2, 1, 'Observe o que incomoda a você nos comportamentos e atitudes das outras pessoas e faça uma lista, nesse desafio desde as pequenas coisinhas até os maiores incômodos que te tiram do sério são válidos.  Ex. de Frequência: Todos os dias; Ex. de Intensidade: 25 itens no mínimo.\n'),
(153, 'Fazer carta de gratidão para pessoas específicas', '', 4, 2, 1, 'Carta de gratidão é uma carta de puro agradecimento por aquilo que fizer sentido para você. Ex. de Frequência: Escrever nos finais de semana; Ex. de Intensidade: 3 cartas de gratidão.\n'),
(154, 'Fazer surpresa para parceiro ou familiar', '', 4, 2, 1, ' Ex. de Frequência: Na quarta feira; Ex. de Intensidade: 1 surpresa.\n'),
(155, 'Dar massagens grátis', '', 4, 2, 1, ' Ex. de Frequência: 3 vezes na fase; Ex. de Intensidade: 10 minutos por dia.\n'),
(156, 'Demonstrar amor, afeto e carinho em público', '', 4, 2, 1, ' Ex. de Frequência: No final de semana; Ex. de Intensidade: Na fila do cinema.\n'),
(157, 'Sorrir para pessoas no trânsito/transporte público', '', 4, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Um sorriso e um tchauzinho.\n'),
(158, 'Fazer uma atividade que outra pessoa goste junto com ela por ela', '', 4, 2, 1, 'Nesse desafio você deve servir a outra pessoa e fazer o que ela goste de fazer, será o dia dessa pessoa. Ex. de Frequência: 1 vez por semana; Ex. de Intensidade: Um dia inteiro com um parente.\n'),
(159, 'Mudar o que nos criticam, se fizer sentido', '', 4, 1, 1, 'Esse desafio fica mais fácil se for feito junto com o "Listar a crítica dos outros sobre nós". Ex. de Frequência: Todos os dias; Ex. de Intensidade: Mudar 1 comportamento.\n'),
(160, 'Mudar o que incomoda nos outros, em nós', '', 4, 1, 1, 'Esse desafio fica mais fácil se for feito junto com o "Listar o que incomoda nos outros". Tudo que vemos fora é um reflexo do que não está resolvido dentro, ou seja, é uma oportunidade de aprendizado e cura interna. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Mudar 3 comportamentos.\n'),
(161, 'Cortar ou reduzir contato de pessoas de má influência/círculos desnecessários', '', 4, 1, 1, 'Nesse desafios você pode sair de grupos do WhatsApp, cortar fofocas no trabalho e atitudes nesse sentido. Ex. de Frequência: Uma vez na fase; Ex. de Intensidade: Sair do grupo da faculdade.\n'),
(162, 'Respirar fundo antes de responder/agir', '', 4, 1, 1, 'Para ajudar nesse desafio coloque uma âncora de lembrete para sempre respirar fundo. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Respiração com contagem até 5.\n'),
(163, 'Adotar ataques do cônjuge como autodesafios de mudança', '', 4, 1, 1, 'Esse desafio fica mais fácil se for feito junto com o "Listar a crítica dos outros sobre nós". Ex. de Frequência: Todos os dias; Ex. de Intensidade: Mudar 2 comportamentos.\n'),
(164, 'Servir na casa da sogra/ nora/conhecidos', '', 4, 1, 1, ' Ex. de Frequência: Uma vez no final de semana; Ex. de Intensidade: Servir por 1 tarde.\n'),
(165, 'Tirar sapato quando chegar em casa', '', 4, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Quando chegar do trabalho.\n'),
(166, 'Oferecer-se para fazer favores ao cônjuge/namorado/parceiro', '', 4, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: 2 favores por dia.\n'),
(167, 'Pedir desculpas por situações do passado e/ou presente', '', 4, 3, 1, ' Ex. de Frequência: 3 vezes na fase; Ex. de Intensidade: 3 situações.\n'),
(168, 'Listar características de parceiro ideal para se relacionar e criar intenção', '', 4, 3, 1, 'Pense e liste quem você gostaria de se relacionar, crie um lista de até 7 características e classifique por ordem de importância. Ex. de Frequência: Pensar todos os dias a respeito; Ex. de Intensidade: 7 características até o final da fase.\n'),
(169, 'Adotar dieta vegetariana/vegana por amor aos animais', '', 4, 3, 1, ' Ex. de Frequência: Por 15 dias; Ex. de Intensidade: Somente alimentos veganos.\n'),
(170, 'Ser cortez e amável com quem não gosta ou tem conflitos', '', 4, 3, 1, 'Mudar os comportamentos com quem não tem afinidade, essas pessoas são grandes professores para nós pois despertam comportamentos que geralmente não queremos ver. É um exercício de aceitação, aceitar o outro como ele é, sem esperar que mude. Ex. de Frequência: Todos os dias; Ex. de Intensidade: No trabalho.\n'),
(171, 'Questionar situações: "Se eu fosse o amor, o que o amor faria agora?"', '', 4, 3, 1, 'Nesse desafios você deve apenas pensar como o Amor, não necessariamente precisa fazer a ação, apenas pare e reflita a respeito. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Pelo menos 3 vezes ao dia.\n'),
(172, 'Reunir a família/amigos sem motivo especial', '', 4, 3, 1, ' Ex. de Frequência: Uma vez na fase; Ex. de Intensidade: Uma reunião.\n'),
(173, 'Enviar uma mensagem motivadora por dia para pessoas diferentes', '', 4, 3, 1, ' Ex. de Frequência: Por 15 dias; Ex. de Intensidade: 1 pessoa por dia.\n'),
(174, 'Estudar líderes criativos / líderes humanitários / líderes impactantes\n', '', 4, 1, 1, 'Alguns exemplos: Nelson Mandela, Steve Jobs, Gandhi, Samuel Klein, Larry Page, Abraham Lincoln Ex. de Frequência: Uma vez na semana; Ex. de Intensidade: 1 pessoa por dia.\n'),
(175, 'Entrosar equipes que tem contato', '', 4, 2, 1, 'Combinar alguma reunião ou happy hour para entrosar as pessoas. Ex. de Frequência: Uma vez na semana; Ex. de Intensidade: 1 reunião.\n'),
(176, 'Criar plano de capacitação e desenvolvimento para time', '', 4, 2, 1, 'Observar onde o time pode se desenvolver e oferecer soluções para esses desafios. Ex. de Frequência: Até o final do semestre; Ex. de Intensidade: Oferecer 1 treinamento.\n'),
(177, 'Implementar cultura de feedbacks na equipe que faz parte', '', 4, 2, 1, 'Feedbacks devem sempre ser feito em particular.  Ex. de Frequência: Até o final do mês; Ex. de Intensidade: Propor a cultura no time.\n'),
(178, 'Premiar ou parabenizar pessoas em destaque', '', 4, 2, 1, 'Para esse desafio não é necessário ter um evento na empresa, você pode ser proativo e parabenizar a pessoa pessoalmente. Ex. de Frequência: 1 vez na fase; Ex. de Intensidade: 2 pessoas.\n'),
(179, 'Criar descrição da sua função e atribuições na empresa ou descrição da empresa\n', '', 4, 2, 1, ' Ex. de Frequência: 1 vez na fase; Ex. de Intensidade: Descrição completa .\n'),
(180, 'Criar estratégias de relacionamento com o cliente', '', 4, 2, 1, ' Ex. de Frequência: 1 vez na fase; Ex. de Intensidade: Criar um plano de ação com metas.\n'),
(181, 'Minimizar conflitos na equipe / empresa / projeto', '', 4, 1, 1, 'Esse desafio é para quem está em uma situação que já tem os conflitos, você deve pensar o que deve fazer para minimizar esses conflitos. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Minimizar conflito do João e da Flávia.\n'),
(182, 'Realizar pequenas reuniões de compartilhamento de ideias', '', 4, 2, 1, 'Pode ser pequenas reuniões no início da semana, onde cada um fala por vez e no máximo por 5 minutos. Apenas uma reunião rápida de alinhamento. Ex. de Frequência: Toda semana; Ex. de Intensidade: 1 vez no começa da semana de no máximo 30 minutos.\n'),
(183, 'Ajudar o colega nos problemas', '', 4, 3, 1, 'Observar quais colegas precisam de ajuda, sem necessariamente eles pediram, usar da proatividade. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 1 pessoa por dia.\n'),
(184, 'Aumentar a proatividade', '', 4, 1, 1, 'Proatividade é o comportamento de antecipação e de responsabilização pelas próprias escolhas e ações frente às situações impostas pelo meio. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Pelo menos 1 vez ao dia.\n'),
(185, 'Oferecer ajuda para as pessoas', '', 4, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Oferecer 3 vezes ao dia.\n'),
(186, 'Escutar as pessoas com atenção e abertura', '', 4, 1, 1, 'Ouvir atentamente a todas as pessoas que tiver contato, sem interrompê-las. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todas as conversas.\n'),
(187, 'Buscar se interessar por assuntos que não geram interesse momentâneo', '', 4, 1, 1, 'Mesmo que o assunto do momento não seja do seu interesse, ouvir atentamente e procurar saber mais. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Procurar por grupos que não são do meu interesse..\n'),
(188, 'Estudar sobre liderança / influência / marketing', '', 4, 2, 1, ' Ex. de Frequência: 1 capítulo por dia; Ex. de Intensidade: Ler um livro.\n'),
(189, 'Realizar treinamento comportamental / qualidade de vida / integração', '', 4, 3, 1, ' Ex. de Frequência: Até o final do semestre; Ex. de Intensidade: 1 treinamento.\n'),
(190, 'Ensinar algo que você domine a alguém', '', 5, 2, 1, 'Se comprometa a ensinar alguma coisa ou habilidade a alguém até um determinado nível, pode ser algo simples o algo mais complexo. Ex. de Frequência: 2 vezes por semana; Ex. de Intensidade: Ensinar meu irmão a dirigir.\n'),
(191, 'Olhar nos olhos durante a conversa com outras pessoas', '', 5, 2, 1, 'Durante as conversas foque o seu olhar nos olhos da outra pessoa, e evite ao máximo de olhar para outras direções. Ex. de Frequência: Todos os contatos; Ex. de Intensidade: Perceber as expressões das pessoas.\n'),
(192, 'Pedir permissão para as pessoas para falar de uma terceira pessoa', '', 5, 2, 1, 'Quando estiver em uma situação que tenha de falar de uma terceira pessoa, pedir permissão para as pessoas do grupo ou da roda que você está inserido. Ex. de Frequência: Todos as situações; Ex. de Intensidade: Sempre pedir permissão.\n'),
(193, 'Falar somente a verdade, eliminar todos os tipos de mentiras do vocabulário', '', 5, 2, 1, 'Elimine desde as menores mentiras, até aquelas que acredita que sejam "inofensivas" até as maiores. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Zero mentira.\n'),
(194, 'Não fazer piadas ou praticar bullying com os outros', '', 5, 2, 1, 'Deixar de fazer qualquer tipo de brincadeiras prejorativas com as outras pessoas. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Zero brincadeiras, quando fizer pagar a prenda de tomar um copo d''água de 300ml..\n'),
(195, 'Pedir desculpas/perdão por coisas ou acontecimentos do presente ou do passado\n', '', 5, 2, 1, 'Para facilitar pode ser feito um lista dos acontecimentos que merecem desculpa ou perdão. Ex. de Frequência: 1 vez ao dia até sentir alívio; Ex. de Intensidade: 10 acontecimentos durante a fase.\n'),
(196, 'Falar quando quer silenciar', '', 5, 2, 1, 'Nos momentos que sentir que deve ficar em silêncio, falar. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Toda vez que quiser ficar quieto.\n'),
(197, 'Priorizar comunicação para: ao vivo <- telefone <- digital', '', 5, 2, 1, 'Sempre que possível se encontrar pessoalmente, se não for possível ligar e se não for possível usar meios digitais. Ex. de Frequência: Durante a semana; Ex. de Intensidade: Com pessoas do trabalho.\n'),
(198, 'Listar e cruzar suas habilidades com o que gosta de fazer', '', 5, 2, 1, 'Faça uma lista do que você faz bem e depois observe o que você mais gosta de fazer, podendo colocar notas para cada atividade. Ex. de Frequência: Um pouco todo dia; Ex. de Intensidade: Lista com 20 habilidades.\n'),
(199, 'Escrever artigos ou poemas e publicar em blog ou redes sociais', '', 5, 2, 1, ' Ex. de Frequência: 2 vezes na semana; Ex. de Intensidade: 2 posts ou poemas durante a fase.\n'),
(200, 'Só se comunicar através de mensagem de voz', '', 5, 2, 1, 'Não mandar mais textos no WhatsApp, Messenger do Facebook ou outros aplicativos. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Somente voz.\n'),
(201, 'Agradecer pessoas que fazem pequenas tarefas no seu dia-a-dia', '', 5, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Mínimo 3 vezes por dia.\n'),
(202, 'Ser gentil em todos os momentos, a todas as pessoas', '', 5, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Com todas as pessoas.\n'),
(203, 'Pedir mais ajuda aos outros', '', 5, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Pedir ajuda a pelo menos 2 pessoas.\n'),
(204, 'Expressar suas ideias', '', 5, 2, 1, 'Fale sobre suas ideias com outras pessoas, dê sua opinião e mostre o seu ponto de vista sobre situações de forma saudável. Ex. de Frequência: Durante a semana; Ex. de Intensidade: No almoço no trabalho.\n'),
(205, 'Cortar fofocas', '', 5, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: No trabalho e nos finais de semana com a família.\n'),
(206, 'Cortar lisonjas e puxa-saquismo a outros', '', 5, 2, 1, ' Ex. de Frequência: Durante a semana; Ex. de Intensidade: No trabalho.\n'),
(207, 'Não-julgar verbalmente', '', 5, 1, 1, 'Observar o que é julgamento na sua expressão e cortar esse comportamento. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Cortar totalmente, em caso de falha, elogiar sinceramente a pessoa que julgou.\n'),
(208, 'Deixar de tentar convencer as outras pessoas com suas ideias/opiniões', '', 5, 1, 1, 'Praticar a aceitação e observação com as ideias. Ex. de Frequência: Quando estiver em família ou trabalho; Ex. de Intensidade: Todas as situações de família ou trabalho.\n'),
(209, 'Cortar manipulação com palavras e gestos', '', 5, 1, 1, ' Ex. de Frequência: ; Ex. de Intensidade: .\n'),
(210, 'Quando achar que precisa falar, ficar em silêncio', '', 5, 1, 1, 'Nos momentos que sentir que deve falar, dar uma opinião, você deve ficar em silêncio. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todo tempo.\n'),
(211, 'Ficar em silêncio por um determinado período', '', 5, 1, 1, ' Ex. de Frequência: 1 vez durante a fase; Ex. de Intensidade: 24 horas de silêncio.\n'),
(212, 'Criar própria filosofia de vida com missão, visão e valores', '', 5, 1, 1, ' Ex. de Frequência: Um pouco por dia; Ex. de Intensidade: Criar até próxima fase.\n'),
(213, 'Retirar palavrões', '', 5, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Zero palavrões, se falar fazer 3 polichinelos.\n'),
(214, 'Não fazer promessas ou juramentos', '', 5, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Zero promessas.\n'),
(215, 'Retirar palavras negativas como: não consigo, mas, nunca, etc', '', 5, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Retirar todas as palavras impeditivas.\n'),
(216, 'Escutar sempre toda a resposta antes de responder', '', 5, 1, 1, 'Parar de interromper as pessoas na fala delas, ouvir sincera e atentamente esperando a sua vez. Ex. de Frequência: Todas as reuniões; Ex. de Intensidade: Com clientes.\n'),
(217, 'Respeitar tradições e crenças alheias', '', 5, 1, 1, 'Aceitar opinião de outras pessoas com crenças diferentes das suas. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Pessoas das Redes Sociais.\n'),
(218, 'Olhar nos próprios olhos no espelho e dizer a intenção para o dia', '', 5, 3, 1, 'Todos os dias pensar qual a intenção para aquele dia, o que você deseja conquistar e falar para si mesmo. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todas as manhãs antes de sair de casa.\n'),
(219, 'Pedir perdão/perdoar ativamente pessoa com conflito', '', 5, 3, 1, 'Perdoar ativamente é tomar alguma ação específica para ter impacto na outra pessoa, como ligação, carta, vídeo ou visita. Ex. de Frequência: 1 vez para cada; Ex. de Intensidade: João e Luciana no trabalho.\n'),
(220, 'Contemplar a própria morte e escrever carta para si mesmo', '', 5, 3, 1, 'Escrever uma carta de como seria se você morresse hoje, se amanhã você não estivesse mais aqui. Ex. de Frequência: 1 vez durante a fase; Ex. de Intensidade: 1 carta.\n'),
(221, 'Parar de se justificar', '', 5, 3, 1, 'Justificar é qualquer desculpa que você pode dar a si mesmo ou aos outros para tirar sua responsabilidade do ato. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Zero justificativas, caso aconteça tomar um copo d''água de 300ml.\n'),
(222, 'Improvisar em alguma situação sempre que for preciso', '', 5, 3, 1, 'Nesse desafio o importante é não desistir porque algo na saiu conforme planejado, continuar indo em frente mesmo no improviso, com responsabilidade. Ex. de Frequência: Até o final do projeto; Ex. de Intensidade: No projeto X da empresa.\n'),
(223, 'Responder negatividades das outras pessoas com positividades', '', 5, 3, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Ressignificar todas as negatividades que chegar até mim.\n'),
(224, 'Criar storytelling ou jornada do herói da empresa ou carreira', '', 5, 2, 1, 'Observar os fatos da carreira e contar no estilo de uma história com as dificuldades, aprendizados, momentos marcantes e tudo mais que pode deixar sua história interessante. Ex. de Frequência: Um pouco por dia; Ex. de Intensidade: Uma história.\n'),
(225, 'Criar artigos e postar em blogs / mídias sociais / revistas', '', 5, 2, 1, 'Escrever algum artigo sobre algum assunto que goste e ache interessante Ex. de Frequência: Finalizar até o final da fase; Ex. de Intensidade: 1 artigo de no mínimo 1.000 palavras.\n'),
(226, 'Criar vídeos de conteúdos gratuitos', '', 5, 2, 1, 'Criar um ou mais vídeos de um assunto que domine e publicá-lo na internet. Ex. de Frequência: No final de semana; Ex. de Intensidade: 1 vídeo.\n'),
(227, 'Desenvolver liderança pessoal ou profissional', '', 5, 2, 1, 'Buscar formas de desenvolver sua liderança, pode ser por livro, curso, filme e outros. Ex. de Frequência: Ler todos os dias e ver o filme no final de semana; Ex. de Intensidade: 1 filme e 1 livro inspirador.\n'),
(228, 'Motivar fidelização empresarial', '', 5, 2, 1, 'Criar formas de fidelizar os clientes ou funcionários a sua empresa. Ex. de Frequência: Até o final do mês, um pouco a cada dia; Ex. de Intensidade: Criar política de benefício.\n'),
(229, 'Pedir desculpas', '', 5, 1, 1, 'Pode ser para pessoas específicas ou alguma situação específica. Ex. de Frequência: Nas reuniões semanais; Ex. de Intensidade: Para equipe, por erros cometidos.\n'),
(230, 'Dar ideias de melhorias aos colegas', '', 5, 2, 1, ' Ex. de Frequência: 1 vez para cada pessoa; Ex. de Intensidade: 2 colegas da equipe.\n'),
(231, 'Dar feedbakcs sobre os problemas aos líderes ou liderados', '', 5, 2, 1, 'Feedbacks devem sempre ser feito em particular.  Ex. de Frequência: 1 vez por mês; Ex. de Intensidade: 1 reunião com líder.\n'),
(232, 'Melhorar comunicação com outros departamentos', '', 5, 2, 1, 'Criar soluções para melhorar os problemas de comunicação. Ex. de Frequência: Até estabelecer a política; Ex. de Intensidade: Criar política de reunião rápidas no começo da semana.\n'),
(233, 'Responder mais rápido a pedidos', '', 5, 2, 1, ' Ex. de Frequência: Todos os pedidos; Ex. de Intensidade: Tempo de espera máximo 5 minutos.\n'),
(234, 'Estudar sobre planejamento estratégico / fidelização / autobiografias', '', 5, 2, 1, 'Pode ser através de cursos, livros, vídeos e outros. Ex. de Frequência: Ler todos os dias; Ex. de Intensidade: 1 livro.\n'),
(235, 'Realizar treinamento de liderança / comunicação assertiva', '', 5, 3, 1, 'Podem ser cursos de Coaching, Dale Carnegie, Stephe Covey e outros. Ex. de Frequência: Até o final do semestre; Ex. de Intensidade: 1 curso.\n'),
(236, 'Observar e escrever pensamentos do seu dia', '', 6, 2, 1, 'Faça uma lista com os pensamentos que você observar, marcando quais aqueles se repetem. Ex. de Frequência: Todo momento; Ex. de Intensidade: Lista com no mínimo 10 pensamentos por dia.\n'),
(237, 'Orar ao Divino / Universo / Deus / Força Maior', '', 6, 2, 1, 'Fazer uma oração sincera Ex. de Frequência: 1 vez ao dia; Ex. de Intensidade: Todo dia de manhã.\n'),
(238, 'Estudar desenvolvimento pessoal', '', 6, 2, 1, 'Qualquer tipo de estudo é válido para esse desafio, livro, filme, ferramenta e outros. Ex. de Frequência: Nos finais de semana; Ex. de Intensidade: 2 Filmes na fase.\n'),
(239, 'Assistir filme que traga autorreflexão', '', 6, 2, 1, 'Busque por filmes com grandes histórias e aprendizados Ex. de Frequência: Final de semana; Ex. de Intensidade: 1 filme por semana.\n'),
(240, 'Consumir arte clássica em músicas / pinturas / exposições / ópera', '', 6, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: 30 minutos por dia de música.\n'),
(241, 'Perdoar a si mesmo e quem te magoou no passado', '', 6, 2, 1, 'Nesse desafio você pode buscar por acontecimentos e fatos e perdoá-los. Ex. de Frequência: Até o final da fase; Ex. de Intensidade: Perdoar 3 pessoas.\n');
INSERT INTO `iap_desafio` (`id`, `titulo`, `descricao`, `nivel`, `yy`, `publicado`, `tooltip_des`) VALUES
(242, 'Perdoar relação com o dinheiro como: erros, traumas, pessoas, situações e etc', '', 6, 2, 1, 'Nesse desafio você pode buscar por acontecimentos e fatos e perdoá-los. Ex. de Frequência: Até o final da fase; Ex. de Intensidade: Perdoar venda do apartamento.\n'),
(243, 'Praticar artes marciais', '', 6, 2, 1, ' Ex. de Frequência: 2 vezes por semana; Ex. de Intensidade: Iniciar Aikidô.\n'),
(244, 'Separar e levar materiais recicláveis para coleta', '', 6, 2, 1, ' Ex. de Frequência: 2 vezes por semana; Ex. de Intensidade: Lixo da semana.\n'),
(245, 'Parar de matar insetos pernilongos, baratas, formigas e etc', '', 6, 2, 1, 'Nesse desafios ao invés de matar os insetos apenas tire eles do seu ambiente ou caminho Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todos os insetos.\n'),
(246, 'Aprender uma palavra nova por dia', '', 6, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: 3 palavras em inglês por dia.\n'),
(247, 'Estudar pessoas vencedoras / inspiradoras / grandes nomes da humanidade', '', 6, 2, 1, 'Pode ser através de livros, filmes, documentários e até viagens. Ex. de Frequência: Nos finais de semana; Ex. de Intensidade: Conhecer História do Nelson Mandela.\n'),
(248, 'Ouvir música instrumental', '', 6, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: 1 hora no trânsito.\n'),
(249, 'Meditar', '', 6, 1, 1, ' Ex. de Frequência: Dias da semana; Ex. de Intensidade: 15 minutos de noite.\n'),
(250, 'Apenas observar pensamentos', '', 6, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todos os momentos.\n'),
(251, 'Observar ideias e não se envolver com elas', '', 6, 1, 1, 'Apenas observar Ex. de Frequência: Todos os dias; Ex. de Intensidade: No trabalho.\n'),
(252, 'Tomar banho de cachoeira', '', 6, 1, 1, ' Ex. de Frequência: 1 vez na fase; Ex. de Intensidade: Passar o dia na cachoeira.\n'),
(253, 'Cortar arte popular como músicas, novelas, reality shows e etc', '', 6, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Cortar totalmente.\n'),
(254, 'Anotar sonhos', '', 6, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Ao amanhecer.\n'),
(255, 'Ficar ocioso', '', 6, 1, 1, 'Ficar ocioso não é ver TV, mexer no celular, nada, é realmente ficar ocioso "olhando para o teto". Ex. de Frequência: 3 vezes na semana; Ex. de Intensidade: 15 minutos por dia.\n'),
(256, 'Criar intenção de viver sua própria filosofia de vida (missão, visão e valores)', '', 6, 1, 1, 'Focalizar seu pensamentos para viver sua missão e observar o desdobramento do universo Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todas as manhãs ao acordar.\n'),
(257, 'Fazer um inventário moral, com vícios e virtudes, minucioso sobre si mesmo', '', 6, 1, 1, 'Inventário moral é o preenchimento dessa ferramenta: http://ialtaperformance.com/downloads/baixar.php?arquivo=inventario-moral-7-niveis.pdf Ex. de Frequência: Até o final da fase; Ex. de Intensidade: Preencher toda a ferramenta.\n'),
(258, 'Criar uma lista do que acredita que precisa', '', 6, 1, 1, 'Liste tudo que você acredita que precisa e observe essa lista, em todos os sentidos, emocional, material e outras crenças. Ex. de Frequência: Até o final da fase; Ex. de Intensidade: Lista com no mínimo 15 itens.\n'),
(259, 'Investigar a essência das coisas e pessoas através da autorreflexão', '', 6, 1, 1, 'Trocar o julgamento pela autorreflexão dos acontecimentos Ex. de Frequência: Dias de semana; Ex. de Intensidade: Com meu chefe.\n'),
(260, 'Abandonar necessidade de estar certo', '', 6, 1, 1, 'Aceitar opinião de outras pessoas com crenças diferentes das suas sem tentar convencê-los da sua visão ou opinião. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Na família.\n'),
(261, 'Cortar pensamentos negativos', '', 6, 1, 1, 'Abrir mão de pensar coisas negativas, coloque uma prenda caso isso aconteça. Ex. de Frequência: Todos os momentos; Ex. de Intensidade: Se tiver pensamentos negativos, tomar um copo d''água.\n'),
(262, 'Agradecer mentalmente pessoas que incomodam', '', 6, 3, 1, 'Simplesmente agradeça. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todas as pessoas que incomodam.\n'),
(263, 'Não alimentar julgamentos mentais', '', 6, 3, 1, 'Trocar o julgamento pela compreensão. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Todos os momentos.\n'),
(264, 'Estudar novo testamento Bíblia', '', 6, 3, 1, ' Ex. de Frequência: Dias de semana; Ex. de Intensidade: 10 páginas por dia.\n'),
(265, 'Estudar Bhagavad Gita', '', 6, 3, 1, 'Bhagavad Gita é uma escrita religiosa da índia que relata o diálogo de Krishna (Avatar indiano) com Arjuna seu discípulo que tem uma importante missão em um campo de batalha. Ex. de Frequência: Todos os dias; Ex. de Intensidade: 1 capítulo por dia.\n'),
(266, 'Estudar outra língua', '', 6, 3, 1, 'Fique á vontade para escolher a língua que fizer mais sentido no seu contexto. Ex. de Frequência: 2 vezes por semana; Ex. de Intensidade: 1 aula.\n'),
(267, 'Definir cultura empresarial ou profissional', '', 6, 2, 1, 'Colocar em um papel a sua cultura, forma de atuação, crenças, valores e outras informações. Ex. de Frequência: Até o final da fase; Ex. de Intensidade: Definição completa.\n'),
(268, 'Se envolver com seus colaboradores em todos os 7 níveis da vida', '', 6, 3, 1, 'Observar, contribuir e apoiar as pessoas nos 7 diferentes níveis que trabalhamos na Alta Performance. Ex. de Frequência: Todos os dias; Ex. de Intensidade: Meus liderados.\n'),
(269, 'Alinhar propósitos pessoais com empresariais/profissionais', '', 6, 2, 1, ' Ex. de Frequência: Até o final da fase; Ex. de Intensidade: Criar arquivo de lembrete.\n'),
(270, 'Investir em ideias / genialidade / inovação', '', 6, 2, 1, 'Dar atenção e atuar em novas ideias e ou projetos Ex. de Frequência: 2 reuniões na semana; Ex. de Intensidade: Ideia do novo produto.\n'),
(271, 'Contribuir para próximas gerações ativamente com projetos / ações / iniciativas', '', 6, 2, 1, ' Ex. de Frequência: Atuar nele nos finais de semana; Ex. de Intensidade: Criar um projeto.\n'),
(272, 'Inspirar futuras lideranças (Ser Inspirador)', '', 6, 2, 1, 'Auxiliar as pessoas próximas a você a se desenvolverem como líderes Ex. de Frequência: Todos os dias; Ex. de Intensidade: Ajudar dois colegas de trabalho.\n'),
(273, 'Ser pontual consigo mesmo e com os outros', '', 6, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Toda as situações.\n'),
(274, 'Não estender horário de almoço', '', 6, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Apenas 1 hora.\n'),
(275, 'Não diminuir horário de almoço', '', 6, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: No mínimo 1 hora.\n'),
(276, 'Diminuir tempo e conversas às idas ao café', '', 6, 1, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Fazer só 1 parada de 10 min ás 15h30.\n'),
(277, 'Cortar fofocas', '', 6, 2, 1, ' Ex. de Frequência: Todos os dias; Ex. de Intensidade: Cortar totalmente.\n'),
(278, 'Não estimular assuntos nocivos', '', 6, 1, 1, 'Assuntos nocivos é qualquer tipo de assunto negativo, abster-se de estimular esse tipo de assunto Ex. de Frequência: Todos os dias; Ex. de Intensidade: Toda hora.\n'),
(279, 'Respeitar a visão do próximo', '', 6, 1, 1, 'Aceitar e respeitar a opinião dos demais, não é para concordar, apenas aceitar e observar, sem julgar. Ex. de Frequência: Dias da semana; Ex. de Intensidade: No trabalho.\n'),
(280, 'Estudar sobre cultura empresarial / cases de grades empresas e profissionais', '', 6, 1, 1, 'Pode ser por grandes cases de sucesso, documentários, filmes e ou livros. Ex. de Frequência: 1 vez na fase; Ex. de Intensidade: Documentário da Apple.\n'),
(281, 'Realizar treinamento de alto impacto / mudança de cultura empresarial', '', 6, 3, 1, 'Treinamentos como Alta Performance, Leader Training, Empretec, Coaching e outros. Ex. de Frequência: 1 vez no semestre; Ex. de Intensidade: Fechar um grupo de 10 pessoas.\n'),
(282, 'Servir a quem precisa e pede', '', 7, 3, 1, 'Nesse desafio pode ser feito serviço de caridade, assitencial ou até uma ajuda mais simples dentro de casa ou no trabalho, é a prática do serviço. Ex. de Frequência: No final de semana; Ex. de Intensidade: Um dia todo de serviço.\n'),
(283, 'Agradecer continuamente no seu dia a dia', '', 7, 3, 1, NULL),
(284, 'Agradecer antes das refeições e realizá-las de maneira consciente', '', 7, 3, 1, NULL),
(285, 'Plantar árvores / flores', '', 7, 3, 1, NULL),
(286, 'Adotar um animal', '', 7, 3, 1, NULL),
(287, 'Estudar espiritualidade pessoal', '', 7, 3, 1, NULL),
(288, 'Assistir filme espiritual', '', 7, 3, 1, NULL),
(289, 'Fazer Yoga  / Aikidô  / Tai Chi', '', 7, 3, 1, NULL),
(291, 'Referir-se a insetos como seres vivos', '', 7, 3, 1, NULL),
(292, 'Caminhar com atenção e observação', '', 7, 3, 1, NULL),
(293, 'Tornar-se na prática sua própria filosofia de vida (missão, visão e valores)', '', 7, 3, 1, NULL),
(294, 'Observar e/ou contemplar situações desafiadoras', '', 7, 3, 1, NULL),
(295, 'Fazer caridade através de serviço presencial', '', 7, 3, 1, NULL),
(296, 'Meditar', '', 7, 3, 1, NULL),
(297, 'Realizar ação social ou ambiental sem divulgar', '', 7, 3, 1, NULL),
(298, 'Fazer jejum prolongado de 4 dias ou mais', '', 7, 3, 1, NULL),
(299, 'Observar a reação do corpo na ingestão de carnes e/ou álcool', '', 7, 3, 1, NULL),
(300, 'Contemplar as situações da vida', '', 7, 3, 1, NULL),
(301, 'Fazer as lições do livro prático: O Curso Em Milagres', '', 7, 3, 1, NULL),
(302, 'Ouvir música espiritual', '', 7, 3, 1, NULL),
(303, 'Estudar processo dos 12 passos', '', 7, 3, 1, NULL),
(304, 'Estudar novo testamento Bíblia', '', 7, 3, 1, NULL),
(305, 'Estudar Cânone Pali', '', 7, 3, 1, NULL),
(306, 'Estudar Bhagavad Gita', '', 7, 3, 1, NULL),
(307, 'Estudar Vedas e Upanishads', '', 7, 3, 1, NULL),
(308, 'Estudar Tao Te Ching', '', 7, 3, 1, NULL),
(309, 'Dar um nome / forma para seu ego', '', 7, 3, 1, NULL),
(310, 'Convidar pessoas para seu local de oração/meditação', '', 7, 3, 1, NULL),
(311, 'Usar apenas materiais reciclados', '', 7, 3, 1, NULL),
(312, 'Fazer pergunta ao Universo e aguardar resposta ser revelada', '', 7, 3, 1, NULL),
(313, 'Implantar plano de sustentabilidade na empresa', '', 7, 3, 1, NULL),
(314, 'Implantar plano de contribuição social', '', 7, 3, 1, NULL),
(315, 'Se empenhar na reciclagem de materiais', '', 7, 3, 1, NULL),
(316, 'Contribuir com caridade de excedentes internos', '', 7, 3, 1, NULL),
(317, 'Resolver situações dentro das suas competências, independente de remuneração', '', 7, 3, 1, NULL),
(318, 'Integrar pessoa-empresa-sociedade', '', 7, 3, 1, NULL),
(319, 'Propagar a harmonia no ambiente de trabalho', '', 7, 3, 1, NULL),
(320, 'Agradecer mesmo quando parecer desconfortável ou negativo', '', 7, 3, 1, NULL),
(321, 'Aprender com os seus erros e dos outros', '', 7, 3, 1, NULL),
(322, 'Encarar os problemas com alegria e bom humor', '', 7, 3, 1, NULL),
(323, 'Mentalizar e emanar cura e amor para pessoas conhecidas e desconhecidas', '', 7, 3, 1, NULL),
(324, 'Estudar sobre espiritualidade / líderes espirituais / legados empresariais', '', 7, 3, 1, NULL),
(325, 'Realizar retiros espirituais / meditação / silêncio', '', 7, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `iap_log`
--

CREATE TABLE IF NOT EXISTS `iap_log` (
  `idLog` int(8) NOT NULL AUTO_INCREMENT,
  `ig_usuario_idUsuario` int(3) NOT NULL,
  `enderecoIP` varchar(20) NOT NULL,
  `dataLog` datetime NOT NULL,
  `descricao` longtext NOT NULL,
  PRIMARY KEY (`idLog`),
  KEY `ig_log_FKIndex1` (`ig_usuario_idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=77 ;

--
-- Fazendo dump de dados para tabela `iap_log`
--

INSERT INTO `iap_log` (`idLog`, `ig_usuario_idUsuario`, `enderecoIP`, `dataLog`, `descricao`) VALUES
(1, 0, '200.171.12.181', '2017-02-15 20:44:14', 'Email enviado'),
(2, 47, '200.171.12.181', '2017-02-15 20:46:09', 'Email enviado'),
(3, 47, '200.171.12.181', '2017-02-15 20:49:38', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''19'', ''15'',''2017-02-15'', ''2017-02-20'',  ''1'', '''', '''', '''', '''')'),
(4, 47, '200.171.12.181', '2017-02-15 20:49:38', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''19'', ''15'',''2017-02-15'', ''2017-02-20'',  ''1'', '''', '''', '''', '''')'),
(5, 47, '200.171.12.181', '2017-02-15 20:57:52', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''19'', ''13'',''2017-02-15'', ''2017-02-20'',  ''1'', '''', '''', '''', '''')'),
(6, 47, '200.171.12.181', '2017-02-15 20:57:52', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''19'', ''13'',''2017-02-15'', ''2017-02-20'',  ''1'', '''', '''', '''', '''')'),
(7, 47, '200.171.12.181', '2017-02-15 20:58:43', 'Email enviado'),
(8, 47, '200.171.12.181', '2017-02-15 21:49:43', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''19'', ''13'',''2017-02-15'', ''2017-02-20'',  ''1'', '''', '''', '''', '''')'),
(9, 47, '200.171.12.181', '2017-02-15 21:49:43', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''19'', ''13'',''2017-02-15'', ''2017-02-20'',  ''1'', '''', '''', '''', '''')'),
(10, 47, '200.171.12.181', '2017-02-15 21:50:24', 'Email enviado'),
(11, 47, '200.171.12.181', '2017-02-15 22:48:06', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''19'', ''13'',''2017-02-15'', ''2017-02-20'',  ''2'', '''', '''', '''', '''')'),
(12, 47, '200.171.12.181', '2017-02-15 22:48:06', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''19'', ''64'',''2017-02-15'', ''2017-02-20'',  ''2'', '''', '''', '''', '''')'),
(13, 47, '200.171.12.181', '2017-02-15 22:50:21', 'Email enviado'),
(14, 0, '200.171.12.181', '2017-02-15 23:09:18', 'Email enviado'),
(15, 47, '200.171.12.181', '2017-02-15 23:10:48', 'Email enviado'),
(16, 47, '200.171.12.181', '2017-02-15 23:13:27', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''20'', ''15'',''2017-02-15'', ''2017-02-20'',  ''1'', '''', '''', '''', '''')'),
(17, 47, '200.171.12.181', '2017-02-15 23:13:27', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''20'', ''15'',''2017-02-15'', ''2017-02-20'',  ''1'', '''', '''', '''', '''')'),
(18, 47, '200.171.12.181', '2017-02-15 23:16:10', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''20'', ''16'',''2017-02-15'', ''2017-02-20'',  ''1'', '''', '''', '''', '''')'),
(19, 47, '200.171.12.181', '2017-02-15 23:16:10', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''20'', ''16'',''2017-02-15'', ''2017-02-20'',  ''1'', '''', '''', '''', '''')'),
(20, 47, '200.171.12.181', '2017-02-15 23:17:02', 'Email enviado'),
(21, 1, '191.205.8.138', '2017-02-20 13:31:51', 'Email enviado'),
(22, 2, '191.205.8.138', '2017-02-20 13:37:58', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''21'', ''45'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(23, 2, '191.205.8.138', '2017-02-20 13:37:58', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''21'', ''45'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(24, 2, '191.205.8.138', '2017-02-20 13:39:57', 'Email enviado'),
(25, 1, '200.182.64.162', '2017-02-20 18:42:02', 'Email enviado'),
(26, 2, '200.182.64.162', '2017-02-20 18:53:00', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''40'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(27, 2, '200.182.64.162', '2017-02-20 18:53:00', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''40'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(28, 2, '200.182.64.162', '2017-02-20 19:00:13', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''40'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(29, 2, '200.182.64.162', '2017-02-20 19:00:13', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''40'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(30, 2, '200.182.64.162', '2017-02-20 19:03:21', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''40'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(31, 2, '200.182.64.162', '2017-02-20 19:03:21', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''40'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(32, 2, '200.182.64.162', '2017-02-20 19:04:44', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''40'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(33, 2, '200.182.64.162', '2017-02-20 19:04:44', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''40'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(34, 2, '200.182.64.162', '2017-02-20 19:10:12', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''36'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(35, 2, '200.182.64.162', '2017-02-20 19:10:12', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''36'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(36, 2, '200.182.64.162', '2017-02-20 19:19:41', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''36'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(37, 2, '200.182.64.162', '2017-02-20 19:19:41', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''36'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(38, 2, '200.182.64.162', '2017-02-20 19:20:58', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''36'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(39, 2, '200.182.64.162', '2017-02-20 19:20:58', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''36'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(40, 2, '200.182.64.162', '2017-02-20 19:21:30', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''36'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(41, 2, '200.182.64.162', '2017-02-20 19:21:30', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''22'', ''36'',''2017-02-20'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(42, 2, '200.182.64.162', '2017-02-20 19:26:42', 'Email enviado'),
(43, 1, '191.205.8.138', '2017-02-21 23:10:05', 'Email enviado'),
(44, 1, '191.205.8.138', '2017-02-22 00:09:54', 'Email enviado'),
(45, 1, '191.205.8.138', '2017-02-22 00:11:27', 'Email enviado'),
(46, 0, '191.205.8.138', '2017-02-22 17:02:57', 'Email enviado'),
(47, 0, '191.205.8.138', '2017-02-22 17:07:58', 'Email enviado'),
(48, 0, '191.205.8.138', '2017-02-22 17:13:38', 'Email enviado'),
(49, 0, '191.205.8.138', '2017-02-22 17:15:04', 'Email enviado'),
(50, 2, '191.205.8.138', '2017-02-22 17:18:20', 'Email enviado'),
(51, 1, '191.205.8.138', '2017-02-22 17:25:40', 'Email enviado'),
(52, 2, '191.205.8.138', '2017-02-22 17:26:12', 'Email enviado'),
(53, 2, '191.205.8.138', '2017-02-22 17:26:12', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''30'', ''41'',''2017-02-22'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(54, 2, '191.205.8.138', '2017-02-22 17:26:12', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''30'', ''41'',''2017-02-22'', ''2017-02-27'',  ''1'', '''', '''', '''', '''')'),
(55, 48, '189.0.126.177', '2017-02-23 21:01:19', 'Email enviado'),
(56, 11, '189.0.126.177', '2017-02-23 21:24:47', 'Email enviado'),
(57, 2, '189.69.192.38', '2017-03-03 14:53:27', 'Email enviado'),
(58, 1, '189.69.192.38', '2017-03-03 15:38:38', 'Email enviado'),
(59, 1, '189.69.192.38', '2017-03-03 15:41:04', 'Email enviado'),
(60, 1, '189.69.192.38', '2017-03-03 15:41:25', 'Email enviado'),
(61, 2, '189.69.192.38', '2017-03-03 16:00:30', 'Email enviado'),
(62, 2, '189.69.192.38', '2017-03-03 16:00:30', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''32'', ''40'',''2017-03-03'', ''2017-03-06'',  ''1'', '''', '''', '''', '''')'),
(63, 2, '189.69.192.38', '2017-03-03 16:00:30', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''32'', ''40'',''2017-03-03'', ''2017-03-06'',  ''1'', '''', '''', '''', '''')'),
(64, 2, '189.69.192.38', '2017-03-03 16:02:19', 'Email enviado'),
(65, 49, '189.40.63.21', '2017-03-04 16:43:12', 'Email enviado'),
(66, 11, '201.92.136.80', '2017-03-06 18:22:39', 'Email enviado'),
(67, 50, '187.11.238.105', '2017-03-06 18:35:48', 'Email enviado'),
(68, 11, '201.92.136.80', '2017-03-06 18:38:14', 'Email enviado'),
(69, 2, '187.74.247.211', '2017-03-06 22:12:55', 'Email enviado'),
(70, 2, '187.74.247.211', '2017-03-06 22:14:23', 'Email enviado'),
(71, 2, '187.74.247.211', '2017-03-06 22:14:23', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''32'', ''40'',''2017-03-06'', ''2017-03-13'',  ''2'', '''', '''', '''', '''')'),
(72, 2, '187.74.247.211', '2017-03-06 22:14:23', 'Email enviado'),
(73, 2, '187.74.247.211', '2017-03-06 22:14:23', 'INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, ''32'', ''105'',''2017-03-06'', ''2017-03-13'',  ''2'', '''', '''', '''', '''')'),
(74, 2, '187.74.247.211', '2017-03-06 22:17:09', 'Email enviado'),
(75, 9, '187.74.247.211', '2017-03-07 02:54:55', 'Email enviado'),
(76, 9, '187.74.247.211', '2017-03-07 03:05:27', 'Email enviado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `iap_objetivo`
--

CREATE TABLE IF NOT EXISTS `iap_objetivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objetivo` longtext NOT NULL,
  `usuario` int(11) NOT NULL,
  `treinador` int(11) DEFAULT NULL,
  `nivel` tinyint(2) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `finalizado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Fazendo dump de dados para tabela `iap_objetivo`
--

INSERT INTO `iap_objetivo` (`id`, `objetivo`, `usuario`, `treinador`, `nivel`, `data_inicio`, `finalizado`) VALUES
(19, 'Ter coragem para tomar a decisão que tem que ser feita e ter sabedoria para observar', 8, 1, 2, '2017-01-19', 0),
(20, 'Ter coragem de olhar pro Gabriel, me aceitando em todas as minhas perfeições e imperfeições nos relacionamentos pessoais e interpessoais', 10, 47, 4, '2017-01-19', 0),
(24, 'Ter coragem para ser cara de pau, ter iniciativa e ser confiante.', 9, 1, 5, '2017-01-19', 0),
(31, 'Objetivo é observar os testes e fazer acontecer', 48, 11, 2, '2017-02-23', 0),
(32, 'quero ver se os textos estão todos certos', 2, 1, 3, '2017-02-24', 0),
(33, 'Ter meu próprio negócio.', 49, 11, 2, '2017-03-06', 0),
(34, 'Observar os sentimentos negativos e não reagir a eles, criando uma solução mais assertiva ', 50, 11, 4, '2017-03-03', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `iap_semana`
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
-- Estrutura para tabela `iap_termo`
--

CREATE TABLE IF NOT EXISTS `iap_termo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `termo` varchar(60) NOT NULL,
  `abreviatura` varchar(5) NOT NULL,
  `classe` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Fazendo dump de dados para tabela `iap_termo`
--

INSERT INTO `iap_termo` (`id`, `termo`, `abreviatura`, `classe`) VALUES
(1, 'Yin', 'ying', 'ying_yang'),
(2, 'Yang', 'yang', 'ying_yang'),
(3, 'Yin/Yang', 'yy', 'ying_yang'),
(4, 'Ter', 'ter', 'foco'),
(5, 'Fazer', 'fazer', 'foco'),
(6, 'Ser', 'ser', 'foco'),
(7, 'Físico', 'fis', 'corpos'),
(8, 'Emocional', 'emo', 'corpos'),
(9, 'Mental', 'men', 'corpos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `iap_user`
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
-- Fazendo dump de dados para tabela `iap_user`
--

INSERT INTO `iap_user` (`id`, `username`, `password`, `name`, `type`) VALUES
(1, 'marcioyonamine', 'e44313433d93ce4d00143f4773be2dfc', 'Marcio Yonamine', 1),
(2, 'thiago', '0c55035086af02b6ed8865fc34e15dfa', 'Thiago Negro', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorio_semanal`
--

CREATE TABLE IF NOT EXISTS `relatorio_semanal` (
  `iap_rel_id` int(11) NOT NULL AUTO_INCREMENT,
  `iap_rel_nome` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `iap_rel_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `iap_rel_objetivo` text CHARACTER SET latin1,
  `iap_rel_sessao` int(2) DEFAULT NULL,
  `iap_rel_qtde_desafios` int(3) DEFAULT NULL,
  `iap_rel_resumo_desafios` text CHARACTER SET utf8mb4,
  `iap_rel_nota_desafios` text CHARACTER SET latin1 NOT NULL,
  `iap_rel_exp_desafios` text CHARACTER SET latin1 NOT NULL,
  `iap_rel_oq_observou` text CHARACTER SET latin1 NOT NULL,
  `iap_rel_periodo` text NOT NULL,
  `iap_rel_aprendizado` text,
  `iap_rel_msg_si` text,
  `iap_rel_msg_trainer` text,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(255) NOT NULL,
  `iap_rel_sobrenome` varchar(255) DEFAULT NULL,
  `objetivo` int(11) NOT NULL,
  `semana` int(11) NOT NULL,
  `fase` int(11) NOT NULL,
  PRIMARY KEY (`iap_rel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Fazendo dump de dados para tabela `relatorio_semanal`
--

INSERT INTO `relatorio_semanal` (`iap_rel_id`, `iap_rel_nome`, `iap_rel_email`, `iap_rel_objetivo`, `iap_rel_sessao`, `iap_rel_qtde_desafios`, `iap_rel_resumo_desafios`, `iap_rel_nota_desafios`, `iap_rel_exp_desafios`, `iap_rel_oq_observou`, `iap_rel_periodo`, `iap_rel_aprendizado`, `iap_rel_msg_si`, `iap_rel_msg_trainer`, `data`, `user_id`, `iap_rel_sobrenome`, `objetivo`, `semana`, `fase`) VALUES
(37, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'Boa', 'Muita coisa', 'Tranquilo', 'Todos', 'Segue!', 'Vamo q vamo!', '2017-03-06 22:12:54', 2, NULL, 32, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
