<?php 
/*

Verifica a situação dos relatórios enviados

*/

$diasemana = date('w', strtotime($data));

switch($diasemana){
	
	case 2: //verifica se é terça-feira
	//case 1: case 3: case 4: case 5: case 6: case 0:
	
	//se sim, carrega todos os objetivos que possuam desafios definidos
	$sql = "SELECT * FROM iap_aceite, iap_objetivo 
	WHERE iap_aceite.objetivo = iap_objetivo.id 
	AND iap_objetivo.nivel <> '0'
	GROUP BY iap_aceite.objetivo, iap_aceite.fase
	ORDER BY iap_objetivo.id DESC";
	$query = mysqli_query($con,$sql);
	
	//passa por todos os objetivos 
	$c = 0;
	$e = 0;
	while($x = mysqli_fetch_array($query)){
		$obj = 	ultObj($x['usuario']);
		$obj_id = $obj['id'];
		$sem = retornaSemana($obj_id);
		//verifica se a fase em que a pessoa estava (fase - 1) possuí um relatório
		$sql_relatorio = "SELECT iap_rel_id FROM relatorio_semanal WHERE objetivo = '$obj_id' AND semana = '$sem'";
		$query_realorio = mysqli_query($con,$sql_relatorio);
		$num_relatorio = mysqli_num_rows($query_realorio);
		if($num_relatorio == 0){ 		//caso não, envia um aviso de que precisa escrever o relatório
			echo "A semana $sem do objetivo $obj_id NÃO possui relatório.<br />";
			$c++;
		}else{
			echo "A semana $sem do objetivo $obj_id possui relatório.<br />";
			$e++;
		}	
		
	
	}
	break;
	
	case 3: // verifica se é quarta-feira

	//se sim, carrega todos os objetivos que possuam desafios definidos
	$sql = "SELECT * FROM iap_aceite, iap_objetivo 
	WHERE iap_aceite.objetivo = iap_objetivo.id 
	AND iap_objetivo.nivel <> '0'
	GROUP BY iap_aceite.objetivo, iap_aceite.fase
	ORDER BY iap_objetivo.id DESC";
	$query = mysqli_query($con,$sql);
	
	//passa por todos os objetivos 
	while($x = mysqli_fetch_array($query)){
		$obj = 	ultObj($x['usuario']);
		$obj_id = $obj['id'];
		$sem = retornaSemana($obj_id);
		//verifica se a fase em que a pessoa estava (fase - 1) possuí um relatório
		$sql_relatorio = "SELECT iap_rel_id FROM relatorio_semanal WHERE objetivo = '$obj_id' AND semana = '$sem'";
		$query_realorio = mysqli_query($con,$sql_relatorio);
		$num_relatorio = mysqli_num_rows($query_realorio);
		if($num_relatorio == 0){ 		//caso não, envia um aviso de que precisa escrever o relatório
			echo "A semana $sem do objetivo $obj_id NÃO possui relatório.<br />";
		}else{
			echo "A semana $sem do objetivo $obj_id possui relatório.<br />";
		}	

	}
		
	break;
	case 5: // toda sexta-feira - email para treinador
	$sql = "SELECT usuario FROM iap_objetivo 
	WHERE nivel <> '0' AND
	finalizado <> '1'
	ORDER BY id DESC";
	$query = mysqli_query($con,$sql);
	while($x = mysqli_fetch_array($query)){
	  $user_info = get_userdata($x['usuario']);
      $username = $user_info->user_login;
      $first_name = $user_info->first_name;
      $last_name = $user_info->last_name;
	  $email = $user_info->email;
	  $objetivo = ultObj($x['usuario']);
	  $fase = verificaFase($objetivo['id']); 
	  $titulo = $objetivo['objetivo'];
	  
	  //função email
		
	}
	
	break;
	
}
?>