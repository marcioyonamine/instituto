<?php
	
	try {
		$handler = new PDO('mysql:host=localhost;dbname=ialtaper_instituto', 'ialtaper_root', '%T*BKdbLLTSk');
		$handler -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		echo $e -> getMessage();
		die();
	}
	
	//$id = "";
	$current_user = wp_get_current_user();
	//$user_meta = get_userdata(1);
	
	//$nome = utf8_decode($_POST['nome']);
	$nome = utf8_decode($current_user -> user_firstname);
	$sobrenome = utf8_decode($current_user -> user_lastname);
	
	//$email = utf8_decode($_POST['email']);
	$email = utf8_decode($current_user->user_email);
	
	$userId = $current_user->ID;
	
	$objetivo = utf8_decode($_POST['objetivo']);
	$sessao = utf8_decode($_POST['sessao']);
	$qtdeDesafios = utf8_decode($_POST['qtdeDesafios']);
	$resumoDesafios = utf8_decode($_POST['resumoDesafios']);
	$notaDesafios = utf8_decode($_POST['notaDesafios']);
	$expDesafios = utf8_decode($_POST['expDesafios']);
	$oqObservou = utf8_decode($_POST['oqObservou']);
	$periodo = utf8_decode($_POST['periodo']);
	
	//$query =
	
	$query = $handler->query
	("INSERT INTO relatorio_semanal (
	iap_rel_nome, 
	iap_rel_email, 
	iap_rel_objetivo, 
	iap_rel_sessao, 
	iap_rel_qtde_desafios, 
	iap_rel_resumo_desafios, 
	iap_rel_nota_desafios, 
	iap_rel_exp_desafios, 
	iap_rel_oq_observou, 
	iap_rel_periodo, 
	data, 
	user_id,
	iap_rel_sobrenome) 
	VALUES (
	'$nome',
	'$email',
	'$objetivo', 
	'$sessao', 
	'$qtdeDesafios', 
	'$resumoDesafios', 
	'$notaDesafios', 
	'$expDesafios', 
	'$oqObservou', 
	'$periodo', 
	CURRENT_TIMESTAMP, 
	'$userId',
	'$sobrenome')
	");
	
	if($query = 1){
		echo "<p class=\"form-sucesso\">Seu relatório de fase foi enviado! =)</p>";
		echo "<a href=\"/meu-perfil\" class=\"saiba-mais\" title=\"Voltar para Meu Perfil\">Voltar para Meu Perfil</a>";
		
		$to = "caio@ialtaperformance.com";
		$subject = $nome . utf8_decode(" enviou um relatório da fase");
		$txt = "Acesse o seu painel de treinador para visualizar:http://ialtaperformance.com/login";
		$headers = "From: relatorios@ialtaperformance.com";
		mail($to,$subject,$txt,$headers);
		
		} else{
		echo "<p class=\"form-erro\">Ops. Algo errado aconteceu. Tente novamente.</p>";
		echo "<a href=\"/enviar-relatorio-da-fase/\" class=\"saiba-mais\" title=\"Tentar novamente\">Tentar novamente.</p>";
	}
	
	?>
