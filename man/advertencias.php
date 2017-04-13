<?php 
/*

Verifica a situação dos relatórios enviados

*/
//echo "vaaaaaai";
$diasemana = date('w', strtotime($data));
//echo $diasemana;
//echo "<br>" . date('d/m/Y');
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
	
	case 4: // verifica se é quarta-feira 
	
	//echo $diasemana;
	
	/* 
	inserir "Usuário não enviou relatório em tempo" na tabela iap_termos
	pegar o ID e colocar na variável $id_adv
	mudar o número de INT do campo advertencia da tabela iap_advertencia para 3
	
	*/
	$id_adv = 10;
	
	//se sim, carrega todos os objetivos que possuam desafios definidos
	$sql = "SELECT * FROM iap_objetivo WHERE nivel <> '0' AND finalizado = '0'";
	
	$query = mysqli_query($con,$sql);
	
	
	//passa por todos os objetivos 
	while($x = mysqli_fetch_array($query)){
		$user_id = $x['usuario'];
		$obj = 	ultObj($x['usuario']);
		$obj_id = $obj['id'];
		$sem = retornaSemana($obj_id);
		$fase_atual = verificaFase($obj['id']);
		
		$verifica_rel = verificaRelFase($obj_id,$fase_atual);
		
		if($verifica_rel == FALSE){
			$semana = retornaSemanas($obj['data_inicio']);
			$hoje = $GLOBALS['hoje'];
			$repete = 0;
			for($i = 1; $i <= 16; $i++){
				if($semana[$i]['fase'] == $fase_atual && $repete == 0){
					if(strtotime($semana[$i]['inicio']) <= strtotime($hoje) AND strtotime($semana[$i]['fim']) >= strtotime($hoje)){
						echo "O objetivo $obj_id tá rodando a fase <br>";
							if($i == 1 || $i == 2 || $i == 3 || $i == 4){
								$repete = 0;
							}else{
								$repete = 1;
							}
						$repete = 1;
					}else{
						$user = get_userdata($user_id);
						
						echo "O objetivo $obj_id não possui relatorio na fase $fase_atual <br>";						
						//echo "<pre>";
						//var_dump($user);
						//echo "</pre>";
												
						$insere_adv = insereAdvertencia($user_id,$obj_id,$fase_atual,0,$id_adv);
						emailTreinador("advertencia",$user->data->display_name);
						//emailTreinador("advertencia_trainee",$user->display_name,$user->user_email);
						
						if($insere_adv != 0){
							$sql_verifica_adv = "SELECT id FROM iap_advertencia WHERE usuario = '".$x['usuario']."' AND publicado = '1' AND advertendia = '$id_adv' ";
							$query_verifica_adv = mysqli_query($con,$sql_verifica_adv);
							$num_verifica_adv = mysqli_num_rows($query_verifica_adv);
							
							switch($num_verifica_adv){
							
							case 0:
							case 1:
							case 2:
								// muda a data próxima segunda
								
								$prox_seg = somarDatas($obj['data_inicio'],"+ 7");
								echo "Proxima: $prox_seg ....Inicio: " . $obj['data_inicio'] . "<br>";
								$sql_atualiza_data = "UPDATE iap_objetivo SET data_inicio = '$prox_seg' WHERE id = '$obj_id'";
								$query_atualiza_data = mysqli_query($con,$sql_atualiza_data);
								if($query_atualiza_data){
									gravarLog($sql_atualiza_data,$x['usuario']);									
								}else{
									gravarLog("Erro ao fazer UPDATE na data nextMonday",$x['usuario']);	
								}
							break;		
							
							}
						}
					}
				}else{
					$repete = 0;
				}
			}
		}
		}
			/*	
			$user = get_userdata($user_id);
			$insere_adv = "INSERT INTO iap_advertencia ('id', 'usuario', 'fase', 'objetivo', 'semana', 'advertencia', 'publicado') VALUES (NULL, '$user_id', '$fase_atual', '$obj_id', '$sem', '$id_adv', '1')";
			$exec_adv = mysqli_query($con, $insere_adv);
			//emailTreinador("advertencia",$user->first_name,$user->user_email);
			$sql_verifica_adv = "SELECT id FROM iap_advertencia WHERE usuario = '".$x['usuario']."' AND publicado = '1' AND advertencia = '$id_adv' ";
			$query_verifica_adv = mysqli_query($con,$sql_verifica_adv);
			$num_verifica_adv = mysqli_num_rows($query_verifica_adv);
			switch($num_verifica_adv){
			
			case 0:
			case 1:
			case 2:
				// muda a data próxima segunda
				//$prox_seg = nextMonday($obj['data_inicio'],$user_id);
				
				$prox_seg = somarDatas($obj['data_inicio'],"+ 7");
							
				$sql_atualiza_data = "UPDATE iap_objetivo SET data_inicio = '$prox_seg' WHERE id = '$obj_id'";
				$query_atualiza_data = mysqli_query($con,$sql_atualiza_data);
				if($query_atualiza_data){
					gravarLog($sql_atualiza_data,$x['usuario']);
				}else{
					gravarLog("Erro ao fazer UPDATE na data nextMonday",$x['usuario']);	
				}
			break;		
			
			}
			 
		}else{
			echo "A semana $sem do objetivo $obj_id possui relatório.<br />";
		}
		
		
		/*
		if($num_relatorio == 0){ 		//se não tiver relatório na quarta-feira, inputa a advertencia no banco
			//echo "A semana $sem do objetivo $obj_id NÃO possui relatório.<br />";
			$insere_adv = "INSERT INTO iap_advertencia ('id', 'usuario', 'fase', 'objetivo', 'semana', 'advertencia', 'publicado') VALUES (NULL, '$user_id', '$fase_atual', '$obj_id', '$sem', '$id_adv', '1')";
			$exec_adv = mysqli_query($con, $insere_adv);
			emailTreinador("advertencia",$user->user_firstname,$user->user_email);
			$sql_verifica_adv = "SELECT id FROM iap_advertencia WHERE usuario = '".$x['usuario']."' AND publicado = '1' AND advertendia = '$id_adv' ";
			$query_verifica_adv = mysqli_query($con,$sql_verifica_adv);
			$num_verifica_adv = mysqli_num_rows($query_verifica_adv);
			switch($num_verifica_adv){
			
			case 0:
			case 1:
			case 2:
				// muda a data próxima segunda
				$prox_seg = nextMonday($obj['data_inicio']);				
				$sql_atualiza_data = "UPDATE iap_objetivo SET data_inicio = '$prox_seg' WHERE id = '$obj_id'";
				$query_atualiza_data = mysqli_query($con,$sql_atualiza_data);
				if($query_atualiza_data){
					gravarLog($sql_atualiza_data,$x['usuario']);
				}else{
					gravarLog("Erro ao fazer UPDATE na data nextMonday",$x['usuario']);	
				}
			break;		
			
			}
			 
		}else{
			echo "A semana $sem do objetivo $obj_id possui relatório.<br />";
		}	
		*/

	//}
	
	break;
}
?>