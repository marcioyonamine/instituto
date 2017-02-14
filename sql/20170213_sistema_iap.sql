-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2017 at 11:33 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `membros`
--

-- --------------------------------------------------------

--
-- Table structure for table `iap_aceite`
--

CREATE TABLE `iap_aceite` (
  `id` int(11) NOT NULL,
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
  `espiritual` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iap_aceite`
--

INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`, `data_final`, `duracao`, `semana`, `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia`, `lembrete`, `ter`, `fazer`, `ser`, `fisico`, `emocional`, `mental`, `espiritual`) VALUES
(49, 9, 3, '2017-02-04', '2017-02-06', '0000-00-00', 0, 0, 1, '', '', '', '', NULL, 1, 1, 1, 0, 1, 1, 1),
(51, 11, 11, '2017-02-04', '2017-02-06', '0000-00-00', 0, 0, 1, '', '', '', '', NULL, 0, 1, 1, 1, 1, 0, 1),
(55, 5, 11, '2017-02-06', '2017-02-13', '0000-00-00', 0, 0, 1, '', '', '', '', NULL, 0, 1, 0, 1, 1, 1, 0),
(56, 12, 8, '2017-02-06', '2017-02-13', '0000-00-00', 0, 0, 1, '', '', '', '', NULL, 1, 0, 1, 0, 1, 1, 0),
(57, 10, 45, '2017-02-07', '2017-02-13', '0000-00-00', 0, 0, 1, '', '', 'Sempre', 'Todos os dias', NULL, 0, 1, 0, 0, 0, 1, 0),
(58, 14, 29, '2017-02-07', '2017-02-13', '0000-00-00', 0, 0, 1, '', '', 'Quintal', '1x', NULL, 1, 1, 0, 1, 0, 1, 0),
(283, 9, 3, '2017-02-11', '2017-02-13', NULL, NULL, NULL, 3, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(284, 9, 152, '2017-02-11', '2017-02-13', NULL, NULL, NULL, 3, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(285, 9, 138, '2017-02-11', '2017-02-13', NULL, NULL, NULL, 3, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(289, 16, 45, '2017-02-13', '2017-02-20', NULL, NULL, NULL, 1, '', '', '10%', '10x', 'celular', 1, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `iap_desafio`
--

CREATE TABLE `iap_desafio` (
  `id` int(11) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descricao` longtext NOT NULL,
  `nivel` tinyint(2) NOT NULL,
  `yy` tinyint(1) NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  `tooltip_des` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iap_desafio`
--

INSERT INTO `iap_desafio` (`id`, `titulo`, `descricao`, `nivel`, `yy`, `publicado`, `tooltip_des`) VALUES
(1, 'Desafiar seus próprios limites, desafiar o ego \n', '', 1, 2, 1, NULL),
(2, 'Saltar de paraquédas/ fazer rafting/ tirolesa/ trilha em floresta', '', 1, 2, 1, NULL),
(3, 'Fazer algo que para você seja uma loucura simples', '', 1, 2, 1, NULL),
(4, 'Acordar mais cedo \r\n\r\n', '', 1, 2, 1, 'Acordar X tempo antes do horário que você geralmente acorda'),
(5, 'Durante um determinado período se alimentar só de frutas', '', 1, 2, 1, NULL),
(6, 'Comer mais frutas que come hoje', '', 1, 2, 1, NULL),
(7, 'Se alimentar só de líquidos durante um período\n\n', '', 1, 2, 1, NULL),
(8, 'Se alimentar só de vegetais crus durante um período', '', 1, 2, 1, NULL),
(9, 'Doar dinheiro à uma instituição \r\n\r\n', '', 1, 2, 1, NULL),
(10, 'Realizar check up médico\r\n\r\n', '', 1, 2, 1, NULL),
(11, 'Programar e Iniciar uma dieta', '', 1, 2, 1, NULL),
(12, 'Fazer uma consulta no nutricionista', '', 1, 2, 1, NULL),
(13, 'Não usar o elevador, subir e descer usando as escadas', '', 1, 2, 1, NULL),
(14, 'Andar só descalço em um espaço específico (casa, trabalho...)', '', 1, 1, 1, NULL),
(15, 'Tomar banho frio\r\n', '', 1, 1, 1, NULL),
(16, 'Parar de se coçar ou se cutucar ', '', 1, 1, 1, NULL),
(17, 'Parar de roer as unhas', '', 1, 1, 1, NULL),
(18, 'Parar de se balançar ou batucar', '', 1, 1, 1, NULL),
(19, 'Não dormir por 24h ou mais\r\n', '', 1, 1, 1, NULL),
(20, 'Cortar alimentos de origem animal\r\n', '', 1, 1, 1, NULL),
(21, 'Cortar álcool', '', 1, 1, 1, NULL),
(22, 'Cortar carne\r\n', '', 1, 1, 1, NULL),
(23, 'Cortar laticínios e seus derivados', '', 1, 1, 1, NULL),
(24, 'Cortar cigarro\r\n', '', 1, 1, 1, NULL),
(25, 'Cortar açúcar refinado e industrializado', '', 1, 1, 1, NULL),
(26, 'Fazer amizade com o calor, sentir o calor e aceitá-lo como ele é', '', 1, 1, 1, NULL),
(27, 'Fazer amizade com o frio, sentir o frio e aceitá-lo como ele é', '', 1, 1, 1, NULL),
(28, 'Não ligar ar condicionado / aquecedor\r\n', '', 1, 1, 1, NULL),
(29, 'Dormir ao ar livre\r\n', '', 1, 1, 1, NULL),
(30, 'Cortar café da manhã ou jantar\r\n', '', 1, 1, 1, NULL),
(31, 'Dormir somente o necessário', '', 1, 3, 1, NULL),
(32, 'Criar uma rotina de exercícios e descanso ', '', 1, 3, 1, NULL),
(33, 'Fazer jejum por um período', '', 1, 3, 1, NULL),
(34, 'Beber mais água que o habitual', '', 1, 3, 1, NULL),
(35, 'Quitar ou renegociar dívidas atrasadas', '', 1, 3, 1, NULL),
(36, 'Quitar ou retrair empréstimos\r\n', '', 1, 3, 1, NULL),
(37, 'Separar dinheiro pessoal e da empresa/profissional', '', 1, 2, 1, NULL),
(38, 'Estudar sobre mercado financeiro ou investimentos', '', 1, 2, 1, NULL),
(39, 'Realizar treinamento de finanças ou investimentos', '', 1, 2, 1, NULL),
(40, 'Contratar consultor financeiro\r\n', '', 1, 2, 1, NULL),
(41, 'Cortar custos pessoais e/ou profissionais', '', 1, 1, 1, NULL),
(42, 'Quitar ou renegociar dívidas, impostos ou taxas atrasadas\r\n', '', 1, 2, 1, NULL),
(43, 'Cortar benefícios\r\n', '', 1, 1, 1, NULL),
(44, 'Diminuir utilização de materiais na empresa\r\n', '', 1, 1, 1, NULL),
(45, 'Economizar água e luz\r\n', '', 1, 1, 1, NULL),
(46, 'Reutilizar folhas de papéis e materiais descartáveis \r\n', '', 1, 1, 1, NULL),
(47, 'Adquirir hobby leve (dança, pintura, jardinagem, colecionáveis)', '', 2, 2, 1, NULL),
(48, 'Criar um plano de investimentos', '', 2, 2, 1, NULL),
(49, 'Dar presentes', '', 2, 2, 1, NULL),
(50, 'Dar presentes inusitados (nome na estrela, terra e sementes, etc)', '', 2, 2, 1, NULL),
(51, 'Aumentar o número de vezes que mastiga o alimento', '', 2, 2, 1, NULL),
(52, 'Ler um livro por prazer', '', 2, 2, 1, NULL),
(53, 'Listar o que incomoda em outras pessoas', '', 2, 2, 1, NULL),
(54, 'Não mexer no celular enquanto dirige', '', 2, 2, 1, NULL),
(55, 'Experimentar um sabor novo por dia', '', 2, 2, 1, NULL),
(56, 'Usar roupas com cores mais alegres', '', 2, 2, 1, NULL),
(57, 'Inserir cores positivas em ambientes que convive', '', 2, 2, 1, NULL),
(58, 'Guardar todas as moedas que tiver em um cofrinho', '', 2, 2, 1, NULL),
(59, 'Montar lego, quebra-cabeças ou similares', '', 2, 2, 1, NULL),
(60, 'Comprar roupas intímas novas (estímulo sensual)', '', 2, 2, 1, NULL),
(61, 'Andar de bicicleta', '', 2, 2, 1, NULL),
(62, 'Pintar a unha de cores fortes', '', 2, 2, 1, NULL),
(63, 'Fazer controle financeiro', '', 2, 1, 1, NULL),
(64, 'Fazer uma lista de todos os hábitos que observar', '', 2, 1, 1, NULL),
(65, 'Diminuir tempo no banho', '', 2, 1, 1, NULL),
(66, 'Reservar tempo para si mesmo fazer o que quiser', '', 2, 1, 1, NULL),
(67, 'Diminuir a quantidade de comida nas refeições', '', 2, 1, 1, NULL),
(68, 'Cortar luxos e/ou supérfluos', '', 2, 1, 1, NULL),
(69, 'Fazer refeições de olhos fechados', '', 2, 1, 1, NULL),
(70, 'Gastar menos dinheiro', '', 2, 1, 1, NULL),
(71, 'Ficar sem acessar redes sociais (Facebook, Twitter, SnapChat e Instagram)', '', 2, 1, 1, NULL),
(72, 'Cortar sexo por um período', '', 2, 1, 1, NULL),
(73, 'Cortar pornografia / masturbação', '', 2, 1, 1, NULL),
(74, 'Parar de ver TV / rádio / notícias', '', 2, 1, 1, NULL),
(75, 'Cortar saídas a bares, baladas e house parties', '', 2, 1, 1, NULL),
(76, 'Cortar atividades que usa para se entreter', '', 2, 1, 1, NULL),
(77, 'Suportar dor e/ou incômodos sem reclamar', '', 2, 3, 1, NULL),
(78, 'Cortar maquiagem', '', 2, 3, 1, NULL),
(79, 'Cortar perfumes', '', 2, 3, 1, NULL),
(80, 'Cortar corrupções (download ilegal, furar fila, atestado falso, etc)', '', 2, 3, 1, NULL),
(81, 'Comprar apenas à vista', '', 2, 3, 1, NULL),
(82, 'Separar 10% da sua renda para caridade', '', 2, 3, 1, NULL),
(83, 'Visitar grupos de networking', '', 2, 2, 1, NULL),
(84, 'Prospectar novos mercados ou áreas de atuação profissional', '', 2, 2, 1, NULL),
(85, 'Observar concorrências ou empresas de outras áreas', '', 2, 1, 1, NULL),
(86, 'Otimizar todas as metas ,usar ferramenta S.M.A.R.T.', '', 2, 2, 1, NULL),
(87, 'Criar plano de negócios/plano de carreira', '', 2, 2, 1, NULL),
(88, 'Buscar novas parcerias ou contatos profissionais', '', 2, 2, 1, NULL),
(89, 'Fazer um mapa de ideias e criar em lista por ordem de importância', '', 2, 2, 1, NULL),
(90, 'Estudar sobre seu mercado de atuação / vendas / networking / inovação', '', 2, 1, 1, NULL),
(91, 'Realizar treinamentos de venda / estratégias de negociação', '', 2, 3, 1, NULL),
(92, 'Fazer esportes não competitivos', '', 3, 2, 1, NULL),
(93, 'Fazer uma ou mais coisas diferentes com a mão trocada', '', 3, 2, 1, NULL),
(94, 'Fazer uma lista com as habilidades que faz bem', '', 3, 2, 1, NULL),
(95, 'Seguir as regras de trânsito', '', 3, 2, 1, NULL),
(96, 'Fazer tarefas/organizar a casa  (arrumar a cama, lavar a louça)', '', 3, 2, 1, NULL),
(97, 'Abrir e-mail / whatsapp em horas específicas', '', 3, 2, 1, NULL),
(98, 'Jogar Xadrez / Palavras cruzadas / Sudoku / Cubo Mágico', '', 3, 2, 1, NULL),
(99, 'Divulgar o trabalho/empresa/cargo/currículo', '', 3, 2, 1, NULL),
(100, 'Fazer coisas ao mesmo tempo (ex: lavar cabeça e escovar dentes)', '', 3, 2, 1, NULL),
(101, 'Terminar projetos atrasados', '', 3, 2, 1, NULL),
(102, 'Iniciar novos projetos', '', 3, 2, 1, NULL),
(103, 'Ser pontual em compromissos e com si próprio', '', 3, 2, 1, NULL),
(104, 'Arrumar guarda-roupas/mesa/carro e se desfazer de coisas antigas', '', 3, 2, 1, NULL),
(105, 'Lavar carro', '', 3, 2, 1, NULL),
(106, 'Colocar mais flores e plantas em seus ambientes', '', 3, 2, 1, NULL),
(107, 'Limpar a sujeira de outras pessoas', '', 3, 2, 1, NULL),
(108, 'Reciclar o seu lixo', '', 3, 2, 1, NULL),
(109, 'Fazer atividades que tenham um risco calculado', '', 3, 2, 1, NULL),
(110, 'Não fazer hora extra no trabalho', '', 3, 1, 1, NULL),
(111, 'Fazer lista de ideias e filtrar só as viáveis', '', 3, 1, 1, NULL),
(112, 'Sempre dar passagem no trânsito', '', 3, 1, 1, NULL),
(113, 'Cortar jogos', '', 3, 1, 1, NULL),
(114, 'Eliminar competitividade nos esportes', '', 3, 1, 1, NULL),
(115, 'Aprender uma nova habilidade', '', 3, 1, 1, NULL),
(116, 'Cavar um buraco com pá (perda do sentido na ação - gratidão)', '', 3, 1, 1, NULL),
(117, 'Ficar sem fazer nada (ocioso) por um tempo', '', 3, 1, 1, NULL),
(118, 'Parar de usar relógio', '', 3, 1, 1, NULL),
(119, 'Sempre dar passagem para estranhos', '', 3, 1, 1, NULL),
(120, 'Segurar a porta para estranhos, conhecidos e familiares', '', 3, 1, 1, NULL),
(121, 'Parar de se olhar no espelho, reflexos e câmera do celular', '', 3, 1, 1, NULL),
(122, 'Estudar outra língua', '', 3, 3, 1, NULL),
(123, 'Doar roupas', '', 3, 3, 1, NULL),
(124, 'Bagunçar a organização dos aplicativos no celular', '', 3, 3, 1, NULL),
(125, 'Não usar poder para conforto', '', 3, 3, 1, NULL),
(126, 'Fazer planejamento de rotina do dia com ações e descansos', '', 3, 3, 1, NULL),
(127, 'Permitir que o outro ganhe em discussões, negociação ou esportes', '', 3, 1, 1, NULL),
(128, 'Realizar processos de maneira mais rápida/mais qualidade/mais eficiente', '', 3, 2, 1, NULL),
(129, 'Criar processos claros', '', 3, 2, 1, NULL),
(130, 'Criar cronograma ou fluxograma', '', 3, 2, 1, NULL),
(131, 'Desenvolver expertise de mercado', '', 3, 1, 1, NULL),
(132, 'Montar plano com estratégias da ação pessoal ou profissional', '', 3, 2, 1, NULL),
(133, 'Estudar sobre processos / produção / otimização / qualidade', '', 3, 1, 1, NULL),
(134, 'Implementar métricas de qualidade na carreira ou empresa', '', 3, 2, 1, NULL),
(135, 'Aumentar atenção para diminuir retrabalho', '', 3, 1, 1, NULL),
(136, 'Criar planejamento de atividades semanal', '', 3, 2, 1, NULL),
(137, 'Realizar treinamentos técnicos', '', 3, 3, 1, NULL),
(138, 'Organizar o tempo, listar onde investe o tempo', '', 3, 2, 1, NULL),
(139, 'Fazer novas amizades', '', 4, 2, 1, 'Fazer novos amigos por aí.'),
(140, 'Colocar post-it pela casa com mensagens positiva para as pessoas', '', 4, 2, 1, NULL),
(141, 'Usar transporte público', '', 4, 2, 1, NULL),
(142, 'Elogiar uma pessoa por dia', '', 4, 2, 1, NULL),
(143, 'Ajudar uma pessoa por dia', '', 4, 2, 1, NULL),
(144, 'Presentear pessoas diferentes', '', 4, 2, 1, NULL),
(145, 'Escrever texto/ligar para agradecer parente/amigo antigo', '', 4, 2, 1, NULL),
(146, 'Cumprimentar estranhos na rua/trabalho', '', 4, 2, 1, NULL),
(147, 'Mentalizar e emanar cura e amor para pessoas conhecidas e desconhecidas', '', 4, 2, 1, NULL),
(148, 'Fazer caridade através de serviço presencial', '', 4, 2, 1, NULL),
(149, 'Assistir filme que traga autorreflexão com amigos/familiares', '', 4, 2, 1, NULL),
(150, 'Fazer uma lista de atividades que gosta de fazer', '', 4, 2, 1, NULL),
(151, 'Listar as críticas das outras pessoas sobre nós', '', 4, 2, 1, NULL),
(152, 'Listar o que incomoda nos outras pessoas, atitudes/comportamentos/etc', '', 4, 2, 1, NULL),
(153, 'Fazer carta de gratidão para pessoas específicas', '', 4, 2, 1, NULL),
(154, 'Fazer surpresa para parceiro ou familiar', '', 4, 2, 1, NULL),
(155, 'Dar massagens grátis', '', 4, 2, 1, NULL),
(156, 'Demonstrar amor, afeto e carinho em público', '', 4, 2, 1, NULL),
(157, 'Sorrir para pessoas no trânsito/transporte público', '', 4, 2, 1, NULL),
(158, 'Fazer uma atividade que outra pessoa goste junto com ela por ela', '', 4, 2, 1, NULL),
(159, 'Mudar o que nos criticam, se fizer sentido', '', 4, 1, 1, NULL),
(160, 'Mudar o que incomoda nos outros, em nós', '', 4, 1, 1, NULL),
(161, 'Cortar ou reduzir contato de pessoas de má influência/círculos desnecessários', '', 4, 1, 1, NULL),
(162, 'Respirar fundo antes de responder/agir', '', 4, 1, 1, NULL),
(163, 'Adotar ataques do cônjuge como autodesafios de mudança', '', 4, 1, 1, NULL),
(164, 'Servir na casa da sogra/ nora/conhecidos', '', 4, 1, 1, NULL),
(165, 'Tirar sapato quando chegar em casa', '', 4, 1, 1, NULL),
(166, 'Oferecer-se para fazer favores ao cônjuge/namorado/parceiro', '', 4, 1, 1, NULL),
(167, 'Pedir desculpas por situações do passado e/ou presente', '', 4, 3, 1, NULL),
(168, 'Listar características de parceiro ideal para se relacionar e criar intenção', '', 4, 3, 1, NULL),
(169, 'Adotar dieta vegetariana/vegana por amor aos animais', '', 4, 3, 1, NULL),
(170, 'Ser cortez e amável com quem não gosta ou tem conflitos', '', 4, 3, 1, NULL),
(171, 'Questionar situações: "Se eu fosse o amor, o que o amor faria agora?"', '', 4, 3, 1, NULL),
(172, 'Reunir a família/amigos sem motivo especial', '', 4, 3, 1, NULL),
(173, 'Enviar uma mensagem motivadora por dia para pessoas diferentes', '', 4, 3, 1, NULL),
(174, 'Identificar e estudar líderes criativos / humanos / de impacto', '', 4, 1, 1, NULL),
(175, 'Entrosar equipes que tem contato', '', 4, 2, 1, NULL),
(176, 'Criar plano de capacitação e desenvolvimento para time', '', 4, 2, 1, NULL),
(177, 'Implementar cultura de feedbacks na equipe que faz parte', '', 4, 2, 1, NULL),
(178, 'Premiar ou parabenizar pessoas em destaque', '', 4, 2, 1, NULL),
(179, 'Criar job description ou descrição da empresa', '', 4, 2, 1, NULL),
(180, 'Criar estratégias de relacionamento com o cliente', '', 4, 2, 1, NULL),
(181, 'Minimizar conflitos na equipe / empresa / projeto', '', 4, 1, 1, NULL),
(182, 'Realizar pequenas reuniões de compartilhamento de ideias', '', 4, 2, 1, NULL),
(183, 'Ajudar o colega nos problemas', '', 4, 3, 1, NULL),
(184, 'Aumentar a proatividade', '', 4, 1, 1, NULL),
(185, 'Oferecer ajuda para as pessoas', '', 4, 1, 1, NULL),
(186, 'Escutar as pessoas com atenção e abertura', '', 4, 1, 1, NULL),
(187, 'Buscar se interessar por assuntos que não geram interesse momentâneo', '', 4, 1, 1, NULL),
(188, 'Estudar sobre liderança / influência / marketing', '', 4, 2, 1, NULL),
(189, 'Realizar treinamento comportamental / qualidade de vida / integração', '', 4, 3, 1, NULL),
(190, 'Ensinar algo que você domine a alguém', '', 5, 2, 1, NULL),
(191, 'Olhar nos olhos durante a conversa com outras pessoas', '', 5, 2, 1, NULL),
(192, 'Pedir permissão para as pessoas para falar de uma terceira pessoa', '', 5, 2, 1, NULL),
(193, 'Falar somente a verdade, eliminar todos os tipos de mentiras do vocabulário', '', 5, 2, 1, NULL),
(194, 'Não fazer piadas ou praticar bullying com os outros', '', 5, 2, 1, NULL),
(195, 'Pedir desculpas por coisas do presente ou do passado', '', 5, 2, 1, NULL),
(196, 'Falar quando quer silenciar', '', 5, 2, 1, NULL),
(197, 'Priorizar comunicação para: ao vivo <- telefone <- digital', '', 5, 2, 1, NULL),
(198, 'Listar e cruzar suas habilidades com o que gosta de fazer', '', 5, 2, 1, NULL),
(199, 'Escrever artigos ou poemas e publicar em blog ou redes sociais', '', 5, 2, 1, NULL),
(200, 'Só se comunicar através de mensagem de voz', '', 5, 2, 1, NULL),
(201, 'Agradecer pessoas que fazem pequenas tarefas no seu dia-a-dia', '', 5, 2, 1, NULL),
(202, 'Ser gentil em todos os momentos, a todas as pessoas', '', 5, 2, 1, NULL),
(203, 'Pedir mais ajuda aos outros', '', 5, 2, 1, NULL),
(204, 'Expressar suas ideias', '', 5, 2, 1, NULL),
(205, 'Cortar fofocas', '', 5, 2, 1, NULL),
(206, 'Cortar lisonjas e puxa-saquismo a outros', '', 5, 2, 1, NULL),
(207, 'Não-julgar verbalmente', '', 5, 1, 1, NULL),
(208, 'Deixar de tentar convencer as outras pessoas com suas ideias/opiniões', '', 5, 1, 1, NULL),
(209, 'Cortar manipulação com palavras e gestos', '', 5, 1, 1, NULL),
(210, 'Quando achar que precisa falar, ficar em silêncio', '', 5, 1, 1, NULL),
(211, 'Ficar em silêncio por um determinado período', '', 5, 1, 1, NULL),
(212, 'Criar própria filosofia de vida com missão, visão e valores', '', 5, 1, 1, NULL),
(213, 'Retirar palavrões', '', 5, 1, 1, NULL),
(214, 'Não fazer promessas ou juramentos', '', 5, 1, 1, NULL),
(215, 'Retirar palavras negativas como: não consigo, mas, nunca, etc', '', 5, 1, 1, NULL),
(216, 'Escutar sempre toda a resposta antes de responder', '', 5, 1, 1, NULL),
(217, 'Respeitar tradições e crenças alheias', '', 5, 1, 1, NULL),
(218, 'Olhar nos próprios olhos no espelho e dizer a intenção para o dia', '', 5, 3, 1, NULL),
(219, 'Pedir perdão/perdoar ativamente pessoa com conflito', '', 5, 3, 1, NULL),
(220, 'Contemplar a própria morte e escrever carta para si mesmo', '', 5, 3, 1, NULL),
(221, 'Parar de se justificar', '', 5, 3, 1, NULL),
(222, 'Improvisar em alguma situação sempre que for preciso', '', 5, 3, 1, NULL),
(223, 'Responder negatividades das outras pessoas com positividades', '', 5, 3, 1, NULL),
(224, 'Criar storytelling ou jornada do herói da empresa ou carreira', '', 5, 2, 1, NULL),
(225, 'Criar artigos e postar em blogs / mídias sociais / revistas', '', 5, 2, 1, NULL),
(226, 'Criar vídeos de conteúdos gratuitos', '', 5, 2, 1, NULL),
(227, 'Desenvolver liderança pessoal ou profissional', '', 5, 2, 1, NULL),
(228, 'Motivar fidelização empresarial', '', 5, 2, 1, NULL),
(229, 'Pedir desculpas', '', 5, 1, 1, NULL),
(230, 'Dar ideias de melhorias aos colegas', '', 5, 2, 1, NULL),
(231, 'Dar feedbakcs sobre os problemas aos líderes ou liderados', '', 5, 2, 1, NULL),
(232, 'Melhorar comunicação com outros departamentos', '', 5, 2, 1, NULL),
(233, 'Responder mais rápido a pedidos', '', 5, 2, 1, NULL),
(234, 'Estudar sobre planejamento estratégico / fidelização / autobiografias', '', 5, 2, 1, NULL),
(235, 'Realizar treinamento de liderança / comunicação assertiva', '', 5, 3, 1, NULL),
(236, 'Observar e escrever pensamentos do seu dia', '', 6, 2, 1, NULL),
(237, 'Orar ao Divino / Universo / Deus / Força Maior', '', 6, 2, 1, NULL),
(238, 'Estudar desenvolvimento pessoal', '', 6, 2, 1, NULL),
(239, 'Assistir filme que traga autorreflexão', '', 6, 2, 1, NULL),
(240, 'Consumir arte clássica em músicas / pinturas / exposições / ópera', '', 6, 2, 1, NULL),
(241, 'Perdoar a si mesmo e quem te magoou no passado', '', 6, 2, 1, NULL),
(242, 'Perdoar relação com o dinheiro como: erros, traumas, pessoas, situações e etc', '', 6, 2, 1, NULL),
(243, 'Praticar artes marciais', '', 6, 2, 1, NULL),
(244, 'Separar e levar materiais recicláveis para coleta', '', 6, 2, 1, NULL),
(245, 'Parar de matar insetos pernilongos, baratas, formigas e etc', '', 6, 2, 1, NULL),
(246, 'Aprender uma palavra nova por dia', '', 6, 2, 1, NULL),
(247, 'Estudar pessoas vencedoras / inspiradoras / grandes nomes da humanidade', '', 6, 2, 1, NULL),
(248, 'Ouvir música instrumental', '', 6, 1, 1, NULL),
(249, 'Meditar', '', 6, 1, 1, NULL),
(250, 'Apenas observar pensamentos', '', 6, 1, 1, NULL),
(251, 'Observar ideias e não se envolver com elas', '', 6, 1, 1, NULL),
(252, 'Tomar banho de cachoeira', '', 6, 1, 1, NULL),
(253, 'Cortar arte popular como músicas, novelas, reality shows e etc', '', 6, 1, 1, NULL),
(254, 'Anotar sonhos', '', 6, 1, 1, NULL),
(255, 'Ficar ocioso', '', 6, 1, 1, NULL),
(256, 'Criar intenção de viver sua própria filosofia de vida (missão, visão e valores)', '', 6, 1, 1, NULL),
(257, 'Fazer um inventário moral, com vícios e virtudes, minucioso sobre si mesmo', '', 6, 1, 1, NULL),
(258, 'Criar uma lista do que acredita que precisa', '', 6, 1, 1, NULL),
(259, 'Investigar a essência das coisas e pessoas através da autorreflexão', '', 6, 1, 1, NULL),
(260, 'Abandonar necessidade de estar certo', '', 6, 1, 1, NULL),
(261, 'Cortar pensamentos negativos', '', 6, 1, 1, NULL),
(262, 'Agradecer mentalmente pessoas que incomodam', '', 6, 3, 1, NULL),
(263, 'Não alimentar julgamentos mentais', '', 6, 3, 1, NULL),
(264, 'Estudar novo testamento Bíblia', '', 6, 3, 1, NULL),
(265, 'Estudar Bhagavad Gita', '', 6, 3, 1, NULL),
(266, 'Estudar outra língua', '', 6, 3, 1, NULL),
(267, 'Definir cultura empresarial ou profissional', '', 6, 2, 1, NULL),
(268, 'Se envolver com seus colaboradores em todos os 7 níveis da vida', '', 6, 3, 1, NULL),
(269, 'Alinhar propósitos pessoais com empresariais/profissionais', '', 6, 2, 1, NULL),
(270, 'Investir em ideias / genialidade / inovação', '', 6, 2, 1, NULL),
(271, 'Contribuir para próximas gerações ativamente com projetos / ações / iniciativas', '', 6, 2, 1, NULL),
(272, 'Inspirar futuras lideranças (Ser Inspirador)', '', 6, 2, 1, NULL),
(273, 'Ser pontual consigo mesmo e com os outros', '', 6, 2, 1, NULL),
(274, 'Não estender horário de almoço', '', 6, 1, 1, NULL),
(275, 'Não diminuir horário de almoço', '', 6, 1, 1, NULL),
(276, 'Diminuir tempo e conversas às idas ao café', '', 6, 1, 1, NULL),
(277, 'Cortar fofocas', '', 6, 2, 1, NULL),
(278, 'Não estimular assuntos nocivos', '', 6, 1, 1, NULL),
(279, 'Respeitar a visão do próximo', '', 6, 1, 1, NULL),
(280, 'Estudar sobre cultura empresarial / cases de grades empresas e profissionais', '', 6, 1, 1, NULL),
(281, 'Realizar treinamento de alto impacto / mudança de cultura empresarial', '', 6, 3, 1, NULL),
(282, 'Servir a quem precisa e pede', '', 7, 3, 1, NULL),
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
-- Table structure for table `iap_objetivo`
--

CREATE TABLE `iap_objetivo` (
  `id` int(11) NOT NULL,
  `objetivo` longtext NOT NULL,
  `usuario` int(11) NOT NULL,
  `treinador` int(11) NOT NULL,
  `nivel` tinyint(2) NOT NULL,
  `data_inicio` date NOT NULL,
  `finalizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iap_objetivo`
--

INSERT INTO `iap_objetivo` (`id`, `objetivo`, `usuario`, `treinador`, `nivel`, `data_inicio`, `finalizado`) VALUES
(4, 'Quero mudar de emprego!', 1, 5, 2, '2017-02-03', 0),
(5, 'Ser um bom líder', 2, 1, 2, '2017-02-06', 0),
(8, 'Quero ganhar o dobro de salário!', 4, 0, 5, '2017-02-01', 2),
(9, 'testar o sistema', 5, 0, 4, '2017-02-04', 0),
(10, 'Quero testar o sistema!!!', 6, 1, 6, '2017-02-07', 0),
(11, 'comer mais', 7, 0, 5, '2017-02-04', 0),
(12, 'jantar todos os dias', 8, 0, 4, '2017-02-06', 0),
(14, 'aprender a cozinhar', 9, 0, 3, '2017-02-07', 0),
(16, 'testar o Hawk2', 10, 1, 1, '2017-02-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iap_semana`
--

CREATE TABLE `iap_semana` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `semana` tinyint(2) NOT NULL,
  `desafio` int(5) NOT NULL,
  `nota` tinyint(2) NOT NULL,
  `relatorio` longtext NOT NULL,
  `objetivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iap_termo`
--

CREATE TABLE `iap_termo` (
  `id` int(11) NOT NULL,
  `termo` varchar(60) NOT NULL,
  `abreviatura` varchar(5) NOT NULL,
  `classe` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iap_termo`
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
-- Table structure for table `iap_user`
--

CREATE TABLE `iap_user` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(160) NOT NULL,
  `name` varchar(80) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iap_user`
--

INSERT INTO `iap_user` (`id`, `username`, `password`, `name`, `type`) VALUES
(1, 'marcioyonamine', 'e44313433d93ce4d00143f4773be2dfc', 'Marcio Yonamine', 1),
(2, 'thiago', '0c55035086af02b6ed8865fc34e15dfa', 'Thiago Negro', 1);

-- --------------------------------------------------------

--
-- Table structure for table `relatorio_semanal`
--

CREATE TABLE `relatorio_semanal` (
  `iap_rel_id` int(11) NOT NULL,
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
  `fase` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relatorio_semanal`
--

INSERT INTO `relatorio_semanal` (`iap_rel_id`, `iap_rel_nome`, `iap_rel_email`, `iap_rel_objetivo`, `iap_rel_sessao`, `iap_rel_qtde_desafios`, `iap_rel_resumo_desafios`, `iap_rel_nota_desafios`, `iap_rel_exp_desafios`, `iap_rel_oq_observou`, `iap_rel_periodo`, `iap_rel_aprendizado`, `iap_rel_msg_si`, `iap_rel_msg_trainer`, `data`, `user_id`, `iap_rel_sobrenome`, `objetivo`, `semana`, `fase`) VALUES
(2, 'Thiago', 'thiagonegro@gmail.com', 'testar a data', 4, 7, 'frfrfrf', '3', 'sdfvgvd', 'sdfvdfv', 'vdfvdfsv', NULL, NULL, NULL, '2017-01-31 20:52:31', 1, 'Negro', 0, 0, 0),
(3, 'Thiago', 'thiagonegro@gmail.com', 'sei la', 5, 5, 'vfdfdjdifhdoivfoi', '6', 'jdfjvodfgb', 'dipvjo iojdfoijpo', 'soidvjpsfoij', NULL, NULL, NULL, '2017-01-31 21:01:48', 1, 'Negro', 0, 0, 0),
(4, 'Josue', 'thiagonegro@hotmail.com', 'testar a data', 6, 4, 'frfrfrf', '6', 'excelente', 'tudo', 'bom demais', NULL, NULL, NULL, '2017-01-31 21:02:03', 2, 'Lemos', 0, 0, 0),
(5, 'Thiago', 'thiagonegro@gmail.com', 'Testar mais uma vez depois de ajustar o layout igual dos forms', 4, 3, '1 - esse\r\n2 - aquele\r\n3 - esse foi complicado...', '6', 'muito boa', 'o tempo todo', 'maravilhoso', NULL, NULL, NULL, '2017-01-31 21:02:09', 1, 'Negro', 0, 0, 0),
(6, 'Thiago', 'thiagonegro@gmail.com', 'ghfdgbfgbdgbdgbdgdgbdgb', 5, 32, 'fvdgbgbgbs', '234', 'ddfgbdfbdgf', 'bdfgbdgdgbg', 'dbdbdfgbdgbd', NULL, NULL, NULL, '2017-01-31 21:02:16', 1, 'Negro', 0, 0, 0),
(14, 'Tulio', 'Tuliomonteazul@gmail.com', 'Ter coragem para ser cara de pau, ter iniciativa e ser confiante.', 2, 2, 'Jejum de 24hs: Foi interessante. Me saí melhor do que eu esperava. Apesar de sentir fome, aceitei e acreditei que eu conseguiria. Não fiquei com raiva, consegui trabalhar e fui produtivo. O ponto que senti que meu ego mais apareceu, foi no Sábado a noite que eu tinha um aniversário pra ir. Mas fiquei pensando em não ir porque eu estava de jejum, daí seria mais difícil. Mas percebi isso e aí me motivei mais ainda pra ir.\r\nNo domingo às 22hs, fim do jejum, cozinhei um jantar bem caprichado pra mim.', '9', 'Foi interessante observar o ego em outros momentos durante a semana também. Como pra acordar cedo e ir malhar. Apesar de fazer isso há um tempo, algumas vezes isso ainda é um desafio. Principalmente quando durmo tarde no dia anterior.', 'Observei que eu já tinha um certo mindset de querer superar minha mente quando algo é desafiador. Mas eu não sabia que aquilo era meu ego. Sinto que ainda observei pouco e preciso/posso ser capaz de observar bem mais.', 'Foi interessante. Nessa 1 semana, senti que fui mais positivo em relação alguns acontecimentos ao tentar buscar um significado otimista pra eles. E também estou observando que várias coisas estão se conectando. Percebi que eu já estava começando a fazer o que esse treinamento incentiva, mas eu não imaginava.\r\nExplicando melhor: Ano passado, após refletir sobre a minha vida e ler sobre o assunto de espiritualidade, resolvi que eu precisava trabalhar mais esse lado. Fiz uma viagem espiritual (o nome é Panapanã e foi organizada pela Base Colaborativa). Estudei um pouco sobre meditação e budismo. Conheci pessoas incríveis na viagem, que inclusive, foi no grupo do whatsapp delas que me enviaram um video do TED que eu comentei no grupo do iAP. Através da viagem, conheci a Base Colaborativa, que é uma associação pra juntar pessoas que querem mudar o mundo. Conheci projetos sociais lá. Comecei a participar de um e também participei de uma ação social (Entrega Por SP) com moradores de rua. Parece que todas essas coisas estão se conectando e o treinamento está me mostrando isso. Tive esse insight quando olhei a planilha de desafios e vi que vários eu comecei a fazer ano passado e eu não tinha ideia do benefício deles.', NULL, NULL, NULL, '2017-01-31 21:02:22', 9, 'Azul', 0, 0, 0),
(8, 'Josué', 'thiagonegro@hotmail.com', 'svdfvdfv', 1, 3, 'sdvdfvsfd', '3', 'vsdfsdfvfd', 'vsdfvsdvfv', 'vsdvdsfvdsf', NULL, NULL, NULL, '2017-01-31 21:02:58', 2, 'Lemos', 0, 0, 0),
(9, 'Josué', 'thiagonegro@hotmail.com', 'fbfgbdfgdg', 1, 0, 'bdgbdfgb', '3', 'bdgbdfgbf', 'bdfgbdbg', 'bdfgbfdg', NULL, NULL, NULL, '2017-01-31 21:03:04', 2, 'Lemos', 0, 0, 0),
(15, 'Alessandra', 'alessandragomescoach@gmail.com', 'Subir no palco e dar o melhor de mim', 6, 13, 'Só realizei 2 desafios - Assistir filme que traga reflexão e Só falar a verdade', '3', 'Foi difícil para mim, não tive energia para faze-los', 'Que quanto mais observação e consciência, mais difícil', 'Foi reflexivo! Não realizei os desafios. Tive algumas situações de neutralidade e de observar o outro onde me trouxeram bastante clareza sobre o ego e a consciência.', NULL, NULL, NULL, '2017-01-31 21:03:22', 6, 'Gomes', 0, 0, 0),
(16, 'Fabiana', 'fabianamacedo@nucleodespertar.com', 'Treinadora de Alta performance', 8, 21, 'Não roer as unhas  \r\nCriar rotina de exercícios e descanso \r\nMastigar mais vezes\r\nComer de olhos fechados\r\nAnotar e filtrar ideias\r\nAprender uma nova habilidade \r\nAdotar ataques do meu Ficante Christian como auto desafios de mudança \r\nEscutar as pessoas com atenção e abertura\r\nSilenciar quando precisa falar\r\nDeixar de convencer as pessoas\r\nRetirar Palavrões\r\nAgradecer mentalmente pessoas que incomodam\r\nFazer um inventário Moral dobre Si mesmo\r\nEstudar os 12 passos AA\r\nOuvir música espiritual 1/2 hora ou 1 horar dia\r\nRespirar fundo antes de agir\r\nFazer lista do que eu preciso\r\nListar o que incomoda em outras pessoa\r\nFicar ocioso 10 minutos \r\nCavar um buraco com pá (perda do sentido - gratidão)\r\nEscutar sempre toda a resposta antes de responder\r\n\r\n\r\n', '7,5', 'Experiência sensacional, logico que as vezes bate aquela raiva por você ainda perceber que faz coisas do EGO, mas tenho percebido que estou observando mais e o EGO em algumas áreas vem perdendo força graças a Deus.  ', 'Observei que os sentimentos vem e eu já estou tomando consciência de coisas que eu nem pensava, me sinto mais forte para vencer os obstáculos que encontro na vida.. Me sinto mais forte para combater o EGO, tenho mais coragem, mais consciência, mais percepções dos fatos e mais ainda tenho enfrentado os meus achismos e me posicionado melhor. mais valorização a mim e ao meu trabalho. Mais expansão da consciência. ', 'Período difícil, para cumprir todos os desafios e ficar me observando mas maravilhoso e sou muito grata por enxergar coisas que antes não enxergava e por já estar conseguindo performance em algumas áreas. ', NULL, NULL, NULL, '2017-01-31 21:03:27', 41, 'Macedo', 0, 0, 0),
(17, 'Josué', 'thiagonegro@hotmail.com', 'fdvdvdf', 1, 3, 'sfdfsv', '3', 'vsdfvsfvs', 'vsdfvsfvs', 'vsdfvsdfvfv', NULL, NULL, NULL, '2017-01-31 21:03:32', 2, 'Lemos', 0, 0, 0),
(18, 'Josué', 'thiagonegro@hotmail.com', 'Ver se chega o email pra fase', 1, 1, 'sdvsdfvsvf', '2', 'sdvsfvffvsfd', 'sfvsdfvdf', 'vsdfvsdfsf', NULL, NULL, NULL, '2017-01-31 21:03:37', 2, 'Lemos', 0, 0, 0),
(19, 'Pablo', 'pablofonseca@gmail.com', '', 10, 14, 'após um tempo mais relaxado com os desafios, retomei mas não 100%, foi clara a relação entre abandonar os desafios e a retomada do ego.', '4', 'não segui os desafios, relaxei em muitos deles. ', 'Que o nível de consciência diminui muito quando não se seguem os desafios', 'Conturbado, evidenciando contração da consciência.', NULL, NULL, NULL, '2017-01-31 21:03:42', 40, 'Fonseca', 0, 0, 0),
(20, 'Thiago', 'thiagonegro@gmail.com', 'sdfvdsfv', 1, 43434, 'svdvsvfvsvfs', '4', 'vsdfvsdfvsdfvsd', 'vsdvdsfvsfv', 'vsdffvsdfvsf', NULL, NULL, NULL, '2017-01-31 21:03:49', 1, 'Negro', 0, 0, 0),
(21, 'Thiago', 'thiagonegro@gmail.com', 'vdfsdvsf', 1, 4, 'sfvsdfvsf', '5', ' d f dfg dfg dfg  bgfdfgb', 'bdbdgbfd', 'bdfgbfdbgdbfd', NULL, NULL, NULL, '2017-01-31 20:59:38', 1, 'Negro', 0, 0, 0),
(28, '', '', '', 0, 0, '', '6', 'ótima', 'tudo', 'bom', NULL, NULL, NULL, '2017-02-06 23:34:54', 8, NULL, 12, 1, 1),
(27, '', '', '', 0, 0, '', '0', 'Foi uma experiência dificil.', 'Vi que não é fáicl.', 'Foi um período dificil.', NULL, NULL, NULL, '2017-02-05 22:47:26', 6, NULL, 10, 1, 1),
(29, '', '', '', 0, 0, '', '3', 'péssima', 'quase nada', 'muito ruim...', NULL, NULL, NULL, '2017-02-07 11:34:54', 9, NULL, 14, 1, 1),
(36, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'vsdfvsdfvsv', 'svdfvsfvfsv', 'svdfvsdfvsdfv', 'vsdfvsdfvsdf', 'svdfvsdfvsdfvs', 'vsdfvsdfvdsvf', '2017-02-14 01:20:15', 5, NULL, 9, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iap_aceite`
--
ALTER TABLE `iap_aceite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iap_desafio`
--
ALTER TABLE `iap_desafio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iap_objetivo`
--
ALTER TABLE `iap_objetivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `iap_semana`
--
ALTER TABLE `iap_semana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iap_termo`
--
ALTER TABLE `iap_termo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iap_user`
--
ALTER TABLE `iap_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatorio_semanal`
--
ALTER TABLE `relatorio_semanal`
  ADD PRIMARY KEY (`iap_rel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iap_aceite`
--
ALTER TABLE `iap_aceite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;
--
-- AUTO_INCREMENT for table `iap_desafio`
--
ALTER TABLE `iap_desafio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;
--
-- AUTO_INCREMENT for table `iap_objetivo`
--
ALTER TABLE `iap_objetivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `iap_semana`
--
ALTER TABLE `iap_semana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iap_termo`
--
ALTER TABLE `iap_termo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `iap_user`
--
ALTER TABLE `iap_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `relatorio_semanal`
--
ALTER TABLE `relatorio_semanal`
  MODIFY `iap_rel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
