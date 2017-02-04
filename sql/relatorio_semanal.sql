-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tempo de Geração: 04/02/2017 às 01:42
-- Versão do servidor: 5.5.52-cll
-- Versão do PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `ialtaper_instituto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorio_semanal`
--

CREATE TABLE IF NOT EXISTS `relatorio_semanal` (
  `iap_rel_id` int(11) NOT NULL AUTO_INCREMENT,
  `iap_rel_nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `iap_rel_email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `iap_rel_objetivo` text CHARACTER SET latin1 NOT NULL,
  `iap_rel_sessao` int(2) NOT NULL,
  `iap_rel_qtde_desafios` int(3) NOT NULL,
  `iap_rel_resumo_desafios` text CHARACTER SET utf8mb4 NOT NULL,
  `iap_rel_nota_desafios` text CHARACTER SET latin1 NOT NULL,
  `iap_rel_exp_desafios` text CHARACTER SET latin1 NOT NULL,
  `iap_rel_oq_observou` text CHARACTER SET latin1 NOT NULL,
  `iap_rel_periodo` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(255) NOT NULL,
  `iap_rel_sobrenome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iap_rel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Fazendo dump de dados para tabela `relatorio_semanal`
--

INSERT INTO `relatorio_semanal` (`iap_rel_id`, `iap_rel_nome`, `iap_rel_email`, `iap_rel_objetivo`, `iap_rel_sessao`, `iap_rel_qtde_desafios`, `iap_rel_resumo_desafios`, `iap_rel_nota_desafios`, `iap_rel_exp_desafios`, `iap_rel_oq_observou`, `iap_rel_periodo`, `data`, `user_id`, `iap_rel_sobrenome`) VALUES
(2, 'Thiago', 'thiagonegro@gmail.com', 'testar a data', 4, 7, 'frfrfrf', '3', 'sdfvgvd', 'sdfvdfv', 'vdfvdfsv', '2017-01-31 20:52:31', 1, 'Negro'),
(3, 'Thiago', 'thiagonegro@gmail.com', 'sei la', 5, 5, 'vfdfdjdifhdoivfoi', '6', 'jdfjvodfgb', 'dipvjo iojdfoijpo', 'soidvjpsfoij', '2017-01-31 21:01:48', 1, 'Negro'),
(4, 'Josue', 'thiagonegro@hotmail.com', 'testar a data', 6, 4, 'frfrfrf', '6', 'excelente', 'tudo', 'bom demais', '2017-01-31 21:02:03', 2, 'Lemos'),
(5, 'Thiago', 'thiagonegro@gmail.com', 'Testar mais uma vez depois de ajustar o layout igual dos forms', 4, 3, '1 - esse\r\n2 - aquele\r\n3 - esse foi complicado...', '6', 'muito boa', 'o tempo todo', 'maravilhoso', '2017-01-31 21:02:09', 1, 'Negro'),
(6, 'Thiago', 'thiagonegro@gmail.com', 'ghfdgbfgbdgbdgbdgdgbdgb', 5, 32, 'fvdgbgbgbs', '234', 'ddfgbdfbdgf', 'bdfgbdgdgbg', 'dbdbdfgbdgbd', '2017-01-31 21:02:16', 1, 'Negro'),
(14, 'Tulio', 'Tuliomonteazul@gmail.com', 'Ter coragem para ser cara de pau, ter iniciativa e ser confiante.', 2, 2, 'Jejum de 24hs: Foi interessante. Me saí melhor do que eu esperava. Apesar de sentir fome, aceitei e acreditei que eu conseguiria. Não fiquei com raiva, consegui trabalhar e fui produtivo. O ponto que senti que meu ego mais apareceu, foi no Sábado a noite que eu tinha um aniversário pra ir. Mas fiquei pensando em não ir porque eu estava de jejum, daí seria mais difícil. Mas percebi isso e aí me motivei mais ainda pra ir.\r\nNo domingo às 22hs, fim do jejum, cozinhei um jantar bem caprichado pra mim.', '9', 'Foi interessante observar o ego em outros momentos durante a semana também. Como pra acordar cedo e ir malhar. Apesar de fazer isso há um tempo, algumas vezes isso ainda é um desafio. Principalmente quando durmo tarde no dia anterior.', 'Observei que eu já tinha um certo mindset de querer superar minha mente quando algo é desafiador. Mas eu não sabia que aquilo era meu ego. Sinto que ainda observei pouco e preciso/posso ser capaz de observar bem mais.', 'Foi interessante. Nessa 1 semana, senti que fui mais positivo em relação alguns acontecimentos ao tentar buscar um significado otimista pra eles. E também estou observando que várias coisas estão se conectando. Percebi que eu já estava começando a fazer o que esse treinamento incentiva, mas eu não imaginava.\r\nExplicando melhor: Ano passado, após refletir sobre a minha vida e ler sobre o assunto de espiritualidade, resolvi que eu precisava trabalhar mais esse lado. Fiz uma viagem espiritual (o nome é Panapanã e foi organizada pela Base Colaborativa). Estudei um pouco sobre meditação e budismo. Conheci pessoas incríveis na viagem, que inclusive, foi no grupo do whatsapp delas que me enviaram um video do TED que eu comentei no grupo do iAP. Através da viagem, conheci a Base Colaborativa, que é uma associação pra juntar pessoas que querem mudar o mundo. Conheci projetos sociais lá. Comecei a participar de um e também participei de uma ação social (Entrega Por SP) com moradores de rua. Parece que todas essas coisas estão se conectando e o treinamento está me mostrando isso. Tive esse insight quando olhei a planilha de desafios e vi que vários eu comecei a fazer ano passado e eu não tinha ideia do benefício deles.', '2017-01-31 21:02:22', 9, 'Azul'),
(8, 'Josué', 'thiagonegro@hotmail.com', 'svdfvdfv', 1, 3, 'sdvdfvsfd', '3', 'vsdfsdfvfd', 'vsdfvsdvfv', 'vsdvdsfvdsf', '2017-01-31 21:02:58', 2, 'Lemos'),
(9, 'Josué', 'thiagonegro@hotmail.com', 'fbfgbdfgdg', 1, 0, 'bdgbdfgb', '3', 'bdgbdfgbf', 'bdfgbdbg', 'bdfgbfdg', '2017-01-31 21:03:04', 2, 'Lemos'),
(15, 'Alessandra', 'alessandragomescoach@gmail.com', 'Subir no palco e dar o melhor de mim', 6, 13, 'Só realizei 2 desafios - Assistir filme que traga reflexão e Só falar a verdade', '3', 'Foi difícil para mim, não tive energia para faze-los', 'Que quanto mais observação e consciência, mais difícil', 'Foi reflexivo! Não realizei os desafios. Tive algumas situações de neutralidade e de observar o outro onde me trouxeram bastante clareza sobre o ego e a consciência.', '2017-01-31 21:03:22', 6, 'Gomes'),
(16, 'Fabiana', 'fabianamacedo@nucleodespertar.com', 'Treinadora de Alta performance', 8, 21, 'Não roer as unhas  \r\nCriar rotina de exercícios e descanso \r\nMastigar mais vezes\r\nComer de olhos fechados\r\nAnotar e filtrar ideias\r\nAprender uma nova habilidade \r\nAdotar ataques do meu Ficante Christian como auto desafios de mudança \r\nEscutar as pessoas com atenção e abertura\r\nSilenciar quando precisa falar\r\nDeixar de convencer as pessoas\r\nRetirar Palavrões\r\nAgradecer mentalmente pessoas que incomodam\r\nFazer um inventário Moral dobre Si mesmo\r\nEstudar os 12 passos AA\r\nOuvir música espiritual 1/2 hora ou 1 horar dia\r\nRespirar fundo antes de agir\r\nFazer lista do que eu preciso\r\nListar o que incomoda em outras pessoa\r\nFicar ocioso 10 minutos \r\nCavar um buraco com pá (perda do sentido - gratidão)\r\nEscutar sempre toda a resposta antes de responder\r\n\r\n\r\n', '7,5', 'Experiência sensacional, logico que as vezes bate aquela raiva por você ainda perceber que faz coisas do EGO, mas tenho percebido que estou observando mais e o EGO em algumas áreas vem perdendo força graças a Deus.  ', 'Observei que os sentimentos vem e eu já estou tomando consciência de coisas que eu nem pensava, me sinto mais forte para vencer os obstáculos que encontro na vida.. Me sinto mais forte para combater o EGO, tenho mais coragem, mais consciência, mais percepções dos fatos e mais ainda tenho enfrentado os meus achismos e me posicionado melhor. mais valorização a mim e ao meu trabalho. Mais expansão da consciência. ', 'Período difícil, para cumprir todos os desafios e ficar me observando mas maravilhoso e sou muito grata por enxergar coisas que antes não enxergava e por já estar conseguindo performance em algumas áreas. ', '2017-01-31 21:03:27', 41, 'Macedo'),
(17, 'Josué', 'thiagonegro@hotmail.com', 'fdvdvdf', 1, 3, 'sfdfsv', '3', 'vsdfvsfvs', 'vsdfvsfvs', 'vsdfvsdfvfv', '2017-01-31 21:03:32', 2, 'Lemos'),
(18, 'Josué', 'thiagonegro@hotmail.com', 'Ver se chega o email pra fase', 1, 1, 'sdvsdfvsvf', '2', 'sdvsfvffvsfd', 'sfvsdfvdf', 'vsdfvsdfsf', '2017-01-31 21:03:37', 2, 'Lemos'),
(19, 'Pablo', 'pablofonseca@gmail.com', '', 10, 14, 'após um tempo mais relaxado com os desafios, retomei mas não 100%, foi clara a relação entre abandonar os desafios e a retomada do ego.', '4', 'não segui os desafios, relaxei em muitos deles. ', 'Que o nível de consciência diminui muito quando não se seguem os desafios', 'Conturbado, evidenciando contração da consciência.', '2017-01-31 21:03:42', 40, 'Fonseca'),
(20, 'Thiago', 'thiagonegro@gmail.com', 'sdfvdsfv', 1, 43434, 'svdvsvfvsvfs', '4', 'vsdfvsdfvsdfvsd', 'vsdvdsfvsfv', 'vsdffvsdfvsf', '2017-01-31 21:03:49', 1, 'Negro'),
(21, 'Thiago', 'thiagonegro@gmail.com', 'vdfsdvsf', 1, 4, 'sfvsdfvsf', '5', ' d f dfg dfg dfg  bgfdfgb', 'bdbdgbfd', 'bdfgbfdbgdbfd', '2017-01-31 20:59:38', 1, 'Negro');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
