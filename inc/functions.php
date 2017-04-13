<?php



include "db.php";
include "globals.php";

function autenticaUsuario($usuario, $senha){ 
	$sql = "SELECT * FROM iap_user WHERE username = '$usuario' LIMIT 0,1";
	$con = bancoMysqli();
	$query = mysqli_query($con,$sql);
	if($query){ //verifica erro no banco de dados
		if(mysqli_num_rows($query) > 0){ // verifica se retorna usuário válido
			$user = mysqli_fetch_array($query);
				if($user['password'] == md5($senha)){ // compara as senhas
					session_start();
					$_SESSION['usuario'] = $user['username'];
					$_SESSION['perfil'] = $user['type'];
					$_SESSION['nomeCompleto'] = $user['name'];
					$_SESSION['idUsuario'] = $user['id'];
					header("Location: user/index.php"); 

				}else{

			return "A senha está incorreta.";
			}
		}else{
			return "O usuário não existe.";
		}
	}else{
		return "Erro no banco de dados";
	}	
}

function converterObjParaArray($data) { //função que transforma objeto vindo do json em array

    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    }
    else {
        return $data;
    }
}




function saudacao(){ 
	$hora = date('H');
	if(($hora > 12) AND ($hora <= 18)){
		return "Boa tarde";	
	}else if(($hora > 18) AND ($hora <= 23)){
		return "Boa noite";	
	}else if(($hora >= 0) AND ($hora <= 4)){
		return "Boa noite";	
	}else if(($hora > 4) AND ($hora <=12)){
		return "Bom dia";
	}
}

function numeroSemana($date){
	return date("W", strtotime($date)); 
}

//soma(+) ou substrai(-) dias de um date(a-m-d)
function somarDatas($data,$dias){ 
	$data_final = date('Y-m-d', strtotime("$dias days",strtotime($data)));	
	return $data_final;
}

function nextMonday($data, $usuario = null){
	if($usuario == null){
		$user = wp_get_current_user();
		$usuario = $user->ID;
	}
	
	$diasemana_numero = date('w', strtotime($data)); //data em sql Y-m-d
	switch($diasemana_numero){
		case 0:
			return somarDatas($data,"+ 1");
		break;		
		case 1:
			if($usuario > 60){
				return $data;
			}else{
				return somarDatas($data,"+ 7");
			}			
		break;		
		case 2:
			if($usuario > 60){
				return somarDatas($data,"- 1");
			}else{
				return somarDatas($data,"+ 6");
			}			
		break;
		case 3:
			return somarDatas($data,"+ 5");
		break;		
		case 4:
			return somarDatas($data,"+ 4");
		break;		
		case 5:
			return somarDatas($data,"+ 3");
		break;		
		case 6:
			return somarDatas($data,"+ 2");
		break;		

	}
}

// Retira acentos das strings
function semAcento($string){
	$newstring = preg_replace("/[^a-zA-Z0-9_.]/", "", strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
	return $newstring;
}

//retorna data d/m/y de mysql/date(a-m-d)
function exibirDataBr($data){ 
	$timestamp = strtotime($data); 
	return date('Y/m/d', $timestamp);
}

//retorna data d/m/y de mysql/date(a-m-d)
function exibirDataBrOrdem($data){ 
	$timestamp = strtotime($data); 
	return date('d/m/Y', $timestamp);
}

//funcao que verifica se há algum objetivo em andamento
function verificaObjetivo($id){
	$con = bancoMysqli();
	$sql = "SELECT * FROM iap_objetivo WHERE usuario = '$id' AND finalizado <> '1' ORDER BY id DESC LIMIT 0,1";
	$query = mysqli_query($con,$sql);
	$num = mysqli_num_rows($query);
	$obj = mysqli_fetch_array($query);
	//$obj['num'] = $num;
	return $obj;
}

function recuperaDados($tabela,$idEvento,$campo){ //retorna uma array com os dados de qualquer tabela. serve apenas para 1 registro.
	$con = bancoMysqli();
	$sql = "SELECT * FROM $tabela WHERE ".$campo." = '$idEvento' LIMIT 0,1";
	$query = mysqli_query($con,$sql);
	$campo = mysqli_fetch_array($query);
	return $campo;		
}

function ultObj($id){ //retorna dados do último objetivo
	$con = bancoMysqli();
	$sql = "SELECT * FROM iap_objetivo WHERE usuario = '$id' AND finalizado <> '1' ORDER BY id DESC LIMIT 0,1";
	$query = mysqli_query($con,$sql);
	return mysqli_fetch_array($query);	
		
}

function recTermo($id){
	$x = recuperaDados("iap_termo",$id,"id");
	return $x['termo'];	
}

function retornaSemanas($data){ //está retornando fase
	$inicio = nextMonday($data);
	$x[1]['inicio'] = $inicio;
	$x[1]['fim'] = date('Y-m-d', strtotime($inicio. ' + 6 days'));
	$x[1]['fase'] = 1;	
	for($i = 2; $i <= 16; $i++){
	//	$x[$i]['inicio'] = date('Y-m-d', strtotime($x[$i-1]['inicio']. ' + 7 days'));
	//	$x[$i]['fim'] = date('Y-m-d', strtotime($x[$i]['inicio']. ' + 6 days'));
		switch($i){
			case 2:
			case 3:
			case 4:
				$x[$i]['fase'] = $i;
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[$i-1]['inicio']. ' + 7 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[$i]['inicio']. ' + 6 days'));
			break;
			
			case 5:
			case 6:
				$x[$i]['fase'] = 5;
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[4]['inicio']. ' + 7 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[5]['inicio']. ' + 13 days'));
			break;
			
			case 7:
			case 8:
				$x[$i]['fase'] = 6;			
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[5]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[7]['inicio']. ' + 13 days'));
			break;

			case 9:
			case 10:
				$x[$i]['fase'] = 7;			
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[7]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[9]['inicio']. ' + 13 days'));
			break;
				
			case 11:
			case 12:
				$x[$i]['fase'] = 8;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[9]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[11]['inicio']. ' + 13 days'));		
			break;


			case 13:
			case 14:
				$x[$i]['fase'] = 9;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[11]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[13]['inicio']. ' + 13 days'));		
			break;

			case 15:
			case 16:
				$x[$i]['fase'] = 10;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[13]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[15]['inicio']. ' + 13 days'));		
			break;


		}

			
	}
	return $x;
}

//Verifica se os desafios enviados em uma array obedecem a uma regra
function desFas($objetivo,$desafios,$fase,$ajax = NULL){ 

	$con = bancoMysqli();
	$fase_anterior = $fase - 1;
	$sql_des = "SELECT * FROM iap_aceite WHERE objetivo = '$objetivo' AND fase = '$fase_anterior'"; //Seleciona todos os desafios do nível atual
	$query_des = mysqli_query($con,$sql_des);
	if($query_des){
		$e = "Consulta feita";	
	}else{
		$e = "Erro na consulta";	
	}
	$i = 0;
	
	//crio uma array sem índice com todos desafios da fase anterior
	$caixa_fase_anterior = array();
	while($k = mysqli_fetch_array($query_des)){ 
		array_push($caixa_fase_anterior, $k['desafio']);
	}
		

	$n = mysqli_num_rows($query_des);
	$obj = recuperaDados("iap_objetivo",$objetivo,"id"); //recupera dados do objetivo
	$tudo = array(1,2,3,4,5,6,7); //array com todas as fases
	//var_dump($tudo);
	$y = $desafios;
	foreach($desafios as $p_nivel){
		$p[$i] = $p_nivel;
		$i++;
	}
	$t = count(array_intersect($caixa_fase_anterior,$desafios)); //retorna uma array com elementos iguais do desafio e da caixa_fase_anterior
	echo "Aqui é o t:" . $t;
	
	if($ajax == 1){
		//trata com explode
	}
	
	switch($fase){
		case 1:  //somente desafios de nível 1 (1) OK
			if(count($y) == 1){
				$f['bool_des'] = 1;
			}else{
				$f['bool_des'] = 0;
				$f['err_men'] = "Foram enviados ".count($y)." desafios. Na fase 1 é permitido 1 desafio apenas.";
			}		
		break; 

		case 2: // - 0, = 1,  + 1 (2) 
			if(count($y) != 2){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Foram enviados ".count($y)." desafios. Na fase 2 são permitidos 2 desafios.";
			
			}else{ // caso esteja, é verificado se há um novo
				if($t == 1){							
						$f['bool_des'] = 1;	
						
						if(!verificaRelFase($objetivo, 1)){
							$f['bool_des'] = 0;
							$f['err_men'] = "Você ainda não enviou o relatório da fase anterior.<br /><br /> <a class=\"btn btn-warning\" href=\"relatorios.php\" title=\"Enviar relatório\">Enviar relatório</a>;";
							$f['dump'] = $e;
						}else{
							$f['bool_des'] = 1;
						}
						
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Você deve manter 1 desafio da fase anterior (nível 1) e pegar um novo desafio do nível do seu objetivo.";//Foram mantidos $t";
					$f['dump'] = $e;
				}
				}
			
			
			
		break;		

		case 3: // - 1, = 1, + 2 (3) / n e n - 1 (se n = 1, n - 1 = 7)
			$i = 0;
			if(count($y) != 3){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Foram enviados ".count($y)." desafios. Na fase 3 são permitidos 3 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				if($t == 1){ //se um for igual, passa na condição
					$f['bool_des'] = 1;
					
					if(!verificaRelFase($objetivo, 2)){
						$f['bool_des'] = 0;
						$f['err_men'] = "Você ainda não enviou o relatório da fase anterior.<br /><br /> <a class=\"btn btn-warning\" href=\"relatorios.php\" title=\"Enviar relatório\">Enviar relatório</a>;";
						$f['dump'] = $e;
					}else{
						$f['bool_des'] = 1;
					}
									
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Você deve manter 1 desafio da fase anteior. Foram mantidos $t";
				}
			}
			
			

		
		break;

		case 4: // -1, = 2 , + 3 (5) / n, n - 1, n + 1 (se n = 7, n+1 = 1) 
		$i = 0;	
			if(count($y) != 5){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Foram enviados ".count($y)." desafios. Na fase 4 são permitidos 5 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				if($t == 2){ //se numero de mantidos forem iguais, passa na condição
					$f['bool_des'] = 1;
					
					if(!verificaRelFase($objetivo, 3)){
						$f['bool_des'] = 0;
						$f['err_men'] = "Você ainda não enviou o relatório da fase anterior.<br /><br /> <a class=\"btn btn-warning\" href=\"relatorios.php\" title=\"Enviar relatório\">Enviar relatório</a>;";
						$f['dump'] = $e;
					}else{
						$f['bool_des'] = 1;
					}
					
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = /*count($y).*/"Você deve manter 2 desafios da fase anterior. Foram mantidos $t";
				}
			}
			
				
		
		break;

		case 5: // -2, = 3 , + 5 (8) / n, n - 1, n + 1 (se n = 7, n+1 = 1) 

			$i = 0;	
			if(count($y) != 8){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Foram enviados ".count($y)." desafios. Na fase 5 são permitidos 8 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				if($t == 3){ //se numero de mantidos forem iguais, passa na condição
					$f['bool_des'] = 1;
					
					if(!verificaRelFase($objetivo, 4)){
						$f['bool_des'] = 0;
						$f['err_men'] = "Você ainda não enviou o relatório da fase anterior.<br /><br /> <a class=\"btn btn-warning\" href=\"relatorios.php\" title=\"Enviar relatório\">Enviar relatório</a>;";
						$f['dump'] = $e;
					}else{
						$f['bool_des'] = 1;
					}
					
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Você deve manter 3 desafios da fase anterior. Foram mantidos $t";
				}
			}
			
			
		
		break;

		case 6:// -3, = 5, + 8 (13) // pelo menos 1n

			$i = 0;	
			if(count($y) != 13){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Foram enviados ".count($y)." desafios. Na fase 6 são permitidos 13 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				if($t == 5){ //se numero de mantidos forem iguais, passa na condição	
				
					//verifica se tem um cada nível
					$caixa2 = array(); //cria um array para inserir todos os niveis das opções selecionadas
					for($i = 0; $i < count($y); $i++){
						$d = recuperaDados("iap_desafio",$p[$i],"id");
						
							array_push($caixa2, $d['nivel']);						
					}		
					
					$dif =  array_diff($tudo, $caixa2); // compara as duas arrays
					if(count($dif) == 0){ //se não houver diferença é porque todos os níveis foram escolhidos
						$f['bool_des'] = 1;
						
						if(!verificaRelFase($objetivo, 5)){
							$f['bool_des'] = 0;
							$f['err_men'] = "Você ainda não enviou o relatório da fase anterior.<br /><br /> <a class=\"btn btn-warning\" href=\"relatorios.php\" title=\"Enviar relatório\">Enviar relatório</a>;";
							$f['dump'] = $e;
						}else{
							$f['bool_des'] = 1;
						}
						
					}else{ //caso não
						
						$f['bool_des'] = 0;
						$f['err_men'] = "Deve ser escolhido pelo menos 1 desafio de cada nível. <br>Lembre-se que o equilíbrio dos níveis são fundamentais para evolução.";
						

					}
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Você deve manter 5 desafios da fase anterior. Foram mantidos $t";
				}
			}		
		
			
		
		break;

		case 7:// -5, = 8, + 13 (21) // pelo menos 1n

			$i = 0;	
			if(count($y) != 21){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Foram enviados ".count($y)." desafios. Na fase 7 são permitidos 21 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				if($t == 8){ //se numero de mantidos forem iguais, passa na condição
					
					
					//verifica se tem um cada nível
					$caixa2 = array(); //cria um array para inserir todos os niveis das opções selecionadas
					for($i = 0; $i < count($y); $i++){
						$d = recuperaDados("iap_desafio",$p[$i],"id");
												
						array_push($caixa2, $d['nivel']);
														
					}
					//var_dump($caixa2);
					$dif =  array_diff($tudo, $caixa2); // compara as duas arrays
					if(count($dif) == 0){ //se não houver diferença é porque todos os níveis foram escolhidos
						$f['bool_des'] = 1;
						
						if(!verificaRelFase($objetivo, 6)){
							$f['bool_des'] = 0;
							$f['err_men'] = "Você ainda não enviou o relatório da fase anterior.<br /><br /> <a class=\"btn btn-warning\" href=\"relatorios.php\" title=\"Enviar relatório\">Enviar relatório</a>;";
							$f['dump'] = $e;
						}else{
							$f['bool_des'] = 1;
						}
						
					}else{ //caso não
						$f['bool_des'] = 0;
						$f['err_men'] = "Deve ser escolhido pelo menos 1 desafio de cada nível. <br>Lembre-se que o equilíbrio dos níveis são fundamentais para evolução.";
					}
					//$f['bool_des'] = 1;
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Você deve manter 8 desafios da fase anterior. Foram mantidos $t";
				}
			}		
		
			
		

		
		break;

		case 8: // -8, = 13, + 21 (34) // pelo menos 1n
		
			$i = 0;	
			if(count($y) != 34){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Foram enviados ".count($y)." desafios. Na fase 8 são permitidos exatos 34 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				if($t == 13){ //se numero de mantidos forem iguais, passa na condição
					//verifica se tem um cada nível
					
					$caixa2 = array(); //cria um array para inserir todos os niveis das opções selecionadas
					for($i = 0; $i < count($y); $i++){
						$d = recuperaDados("iap_desafio",$p[$i],"id");						
						
							array_push($caixa2, $d['nivel']);
							
					}		
					
					$dif =  array_diff($tudo, $caixa2); // compara as duas arrays
					if(count($dif) == 0){ //se não houver diferença é porque todos os níveis foram escolhidos
						$f['bool_des'] = 1;
						
						if(!verificaRelFase($objetivo, 7)){
							$f['bool_des'] = 0;
							$f['err_men'] = "Você ainda não enviou o relatório da fase anterior.<br /><br /> <a class=\"btn btn-warning\" href=\"relatorios.php\" title=\"Enviar relatório\">Enviar relatório</a>;";
							$f['dump'] = $e;
						}else{
							$f['bool_des'] = 1;
						}
						
					}else{ //caso não
						$f['bool_des'] = 0;
						$f['err_men'] = "Deve ser escolhido pelo menos 1 desafio de cada nível. <br>Lembre-se que o equilíbrio dos níveis são fundamentais para evolução.";

					}
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Você deve manter 13 desafios da fase anterior. Foram mantidos $t";
				}
			}		
		
					
		
		break;

		case 9: // pelo menos 1n (14)
			/*
					$i = 0;	
			if(count($y) != 14){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Forma enviados ".$count($y)." desafios. Na fase 9 é permitido exatos 14 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				
				$caixa = array(); //cria um array para inserir todos os niveis das opções selecionadas
				
				for($i = 0; $i <= count($y[$i]); $i++){
					$d = recuperaDados("iap_desafio",$y[$i],"id");
					$temp = in_array($d['nivel'],$caixa);
						if(count($temp) > 0){
							array_push($caixa, $d['nivel']);
						}				
				}		
				$dif =  array_diff($tudo, $caixa); // compara as duas arrays
				if(count($dif) == 0){ //se não houver diferença é porque todos os níveis foram escolhidos
					$f['bool_des'] = 1;
				}else{ //caso não
					$f['bool_des'] = 0;
					$f['err_men'] = "Deve ser escolhido ao menos 1 desafio de cada nível.";
				}
			}
			 */
			 $f['bool_des'] = 1;
			 
			 if(!verificaRelFase($objetivo, 8)){
				$f['bool_des'] = 0;
				$f['err_men'] = "Você ainda não enviou o relatório da fase anterior.<br /><br /> <a class=\"btn btn-warning\" href=\"relatorios.php\" title=\"Enviar relatório\">Enviar relatório</a>;";
				$f['dump'] = $e;
			}else{
				$f['bool_des'] = 1;
			}
		break;

		case 10: // pelo menos 1n (7)
					/*$i = 0;	
			if(count($y) != 7){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Foram enviados ".$count($y)." desafios. Na fase 9 é permitido exatos 14 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				$caixa = array(); //cria um array para inserir todos os niveis das opções selecionadas
				for($i = 0; $i <= count($y[$i]); $i++){
					$d = recuperaDados("iap_desafio",$y[$i],"id");
					$temp = in_array($d['nivel'],$caixa);
						if(count($temp) > 0){
							array_push($caixa, $d['nivel']);
						}		
				}		
				$dif =  array_diff($tudo, $caixa); // compara as duas arrays
				if(count($dif) == 0){ //se não houver diferença é porque todos os níveis foram escolhidos
					$f['bool_des'] = 1;
				}else{ //caso não
					$f['bool_des'] = 0;
					$f['err_men'] = "Deve ser escolhido ao menos 1 desafio de cada nível.";
				}
			}*/
			$f['bool_des'] = 1;
			
			if(!verificaRelFase($objetivo, 9)){
				$f['bool_des'] = 0;
				$f['err_men'] = "Você ainda não enviou o relatório da fase anterior.<br /><br /> <a class=\"btn btn-warning\" href=\"relatorios.php\" title=\"Enviar relatório\">Enviar relatório</a>;";
				$f['dump'] = $e;
			}else{
				$f['bool_des'] = 1;
			}
		
		break;
		
		

		
	}
		return $f;
		if($ajax == 1){
			//echos da div do ajax contador
		}
		
	
}

function verificaFase($idObj){
	$con = bancoMysqli();
	$sql = "SELECT fase FROM iap_aceite WHERE objetivo = '$idObj' ORDER BY fase DESC LIMIT 0,1"; //pega a fase mais avançada
	$query = mysqli_query($con,$sql);
	$x = mysqli_fetch_array($query);
	if($x['fase'] == NULL){
		return $x['fase'] = 0;
	}else{
		return $x['fase'];
	}
}

function matrizDesafios($obj,$fase){
	$con = bancoMysqli();
	$sql = "SELECT desafio FROM iap_aceite WHERE objetivo = '$obj' AND fase = '$fase'";
	$query = mysqli_query($con,$sql);
	$caixa = array();
	while($x = mysqli_fetch_array($query)){
		array_push($caixa, $x['desafio']);
		
	}
	return $caixa;		
}

function checado($x,$array){
	if (in_array($x,$array)){
		return "checked='checked'";		
	}
}



function marcaX($x){
	if($x == 1){
		return "X";		
	}
}



function geraDesafios($nivel,$checado = array()){ //checked é uma array
	$con = bancoMysqli();
	$sql = "SELECT * FROM iap_desafio WHERE nivel = '$nivel' ORDER BY titulo ASC";
	$query_01 = mysqli_query($con,$sql);
	
	echo '
	       
	<h2>Desafios Nível: '.$nivel.'</h2>
        <div class="table-responsive" style="overflow:unset;">';
          
        if($nivel == 1){
        	echo '<table class="table table-striped tbl-des-nvl1">';
        }elseif($nivel == 2){
          	echo '<table class="table table-striped tbl-des-nvl2">';
		}elseif($nivel == 3){
          	echo '<table class="table table-striped tbl-des-nvl3">';
		}elseif($nivel == 4){
          	echo '<table class="table table-striped tbl-des-nvl4">';
		}elseif($nivel == 5){
          	echo '<table class="table table-striped tbl-des-nvl5">';
		}elseif($nivel == 6){
          	echo '<table class="table table-striped tbl-des-nvl6">';
		}elseif($nivel == 7){
          	echo '<table class="table table-striped tbl-des-nvl7">';
		}

		  
		echo '
            <thead>
              <tr>
                <th>Desafio</th>
                <th><center>Yin/Yang
                <a class="lightbox" href="#goofy"> [?]</a></center>
					<div class="lightbox-target" id="goofy">
						<h2>O que é Yin e Yang?</h2>
<br />
Yin Yang são conceitos que expõem a dualidade de tudo que existe no universo. Descrevem as duas forças fundamentais opostas e complementares que se encontram em todas as coisas
<br /><br />
Segundo essa ideia, cada ser, objeto ou pensamento possui um complemento do qual depende para a sua existência. Esse complemento existe dentro de si. Assim, se deduz que nada existe no estado puro: nem na atividade absoluta, nem na passividade absoluta, mas sim em transformação contínua. Voltaremos a falar desse assunto no futuro.
<br /><br />
A expansão da consciência está relacionada ao quão equilibrado uma pessoa está em cada um dos 7 níveis. Quanto mais clareza se tem das atividades Yin e Yang em cada nível maior a tendência de subida de consciência naquela área e maiores as chances de se alcançar resultados de forma equilibrada.
<br /><br />

<div class="tbl-yy">
	<div class="tbl-yy-left"><strong>Yang:<hr></strong></div><div><strong>Yin:<hr></strong></div>
	
	
		<div class="tbl-yy-left">o princípio ativo</div><div>o princípio passivo</div>
		<div class="tbl-yy-left">ação</div><div>reação</div>
		<div class="tbl-yy-left">diurno</div><div>noturno</div>
		<div class="tbl-yy-left">luminoso</div><div>escuro</div>
		<div class="tbl-yy-left">sol</div><div>lua</div>
		<div class="tbl-yy-left">som</div><div>o silêncio</div>
		<div class="tbl-yy-left">início</div><div>o fim</div>
		<div class="tbl-yy-left">ideal</div><div>real</div>
		<div class="tbl-yy-left">difícil</div><div>fácil</div>
		<div class="tbl-yy-left">coragem</div><div>medo</div>
		
</div>


<br /><br />
Da mesma forma cada desafios tem um objetivo de levar o participante a ser mais Yin ou Yang em uma área específica. Todos temos uma forma de ser a agir no dia a dia, é isso que formams os hábitos, os desafios foram feitos para quebrar esses hábitos para que a observação seja possível.
<a class="lightbox-close" href="#"></a>
					</div>
                </th>
                <th><center>Escolher</center></th>                
              </tr>
            </thead>
            <tbody>';
			while($list = mysqli_fetch_array($query_01)){
				
				if(!in_array($list['id'], $checado)){
						
   				 echo '         <tr>
                <td style="text-align:left;">'.$list['titulo'].' <div class="tooltip-explica"><img src="../assets/img/tooltip_des.png" width="15" /><span class="tooltiptext-explica">' . $list['tooltip_des'] . '</span></div></td>
                <td style="text-align:center;">'. recTermo($list['yy']).'</td>
                <td>
                	<center>
           			 <input onchange="return contaChkbox();" type="checkbox" name="'.$list['id'].'" '.checado($list['id'],$checado).'></center>
           			 
        			</td>
             	 </tr>';
				}
			 }	
		
		//VALIDA ESCOLHA DOS DESAFIOS ANTES DO SUBMIT
		//Fase 1
		/*
		$fase1 = "SELECT * FROM iap_aceite WHERE fase = 1";
		$pega_fase = mysqli_query($con, $fase1);
		$usa_fase = mysqli_fetch_assoc($pega_fase);
		//var_dump($usa_fase);
		
		$fase_atual = $usa_fase['fase'];
		$nivel_obj = $usa_fase['objetivo'];
		
		if($fase_atual == '1'){
			echo "<script>
		function validaEscolhaDesafio(){
			var chkList = document.querySelectorAll('input[type=\"checkbox\"]:checked');
			if(chkList.length > 1){
				alert('Você está começando o treinamento agora, e deve pegar apenas um desafio.');
				return true;			
			}
		}		
		</script>";
		}*/
		
		
	echo '    </tbody>
          </table>
    </div>
    ';

}
function listaDesafios($nivel){ //checked é uma array
	$con = bancoMysqli();
	$sql = "SELECT * FROM iap_desafio WHERE nivel = '$nivel' ORDER BY titulo ASC";
	$query = mysqli_query($con,$sql);
	

	echo '
	       
	<h2>Desafios Nível: '.$nivel.'</h2>
        <div class="table-responsive" style="overflow:unset;">';
        
        if($nivel == 1){
        	echo '<table class="table table-striped tbl-des-nvl1">';
        }elseif($nivel == 2){
          	echo '<table class="table table-striped tbl-des-nvl2">';
		}elseif($nivel == 3){
          	echo '<table class="table table-striped tbl-des-nvl3">';
		}elseif($nivel == 4){
          	echo '<table class="table table-striped tbl-des-nvl4">';
		}elseif($nivel == 5){
          	echo '<table class="table table-striped tbl-des-nvl5">';
		}elseif($nivel == 6){
          	echo '<table class="table table-striped tbl-des-nvl6">';
		}elseif($nivel == 7){
          	echo '<table class="table table-striped tbl-des-nvl7">';
		}
		
		echo'
            <thead>
              <tr>
                <th>Desafio</th>
                <th><center>Yin/Yang
                <a class="lightbox" href="#yy"> [?]</a></center></th>
					<div class="lightbox-target" id="yy">
						<h2>O que é Yin e Yang?</h2>
<br />
Yin Yang são conceitos que expõem a dualidade de tudo que existe no universo. Descrevem as duas forças fundamentais opostas e complementares que se encontram em todas as coisas
<br /><br />
Segundo essa ideia, cada ser, objeto ou pensamento possui um complemento do qual depende para a sua existência. Esse complemento existe dentro de si. Assim, se deduz que nada existe no estado puro: nem na atividade absoluta, nem na passividade absoluta, mas sim em transformação contínua. Voltaremos a falar desse assunto no futuro.
<br /><br />
A expansão da consciência está relacionada ao quão equilibrado uma pessoa está em cada um dos 7 níveis. Quanto mais clareza se tem das atividades Yin e Yang em cada nível maior a tendência de subida de consciência naquela área e maiores as chances de se alcançar resultados de forma equilibrada.
<br /><br />

<div class="tbl-yy">
	<div class="tbl-yy-left"><strong>Yang:<hr></strong></div><div><strong>Yin:<hr></strong></div>
	
	
		<div class="tbl-yy-left">o princípio ativo</div><div>o princípio passivo</div>
		<div class="tbl-yy-left">ação</div><div>reação</div>
		<div class="tbl-yy-left">diurno</div><div>noturno</div>
		<div class="tbl-yy-left">luminoso</div><div>escuro</div>
		<div class="tbl-yy-left">sol</div><div>lua</div>
		<div class="tbl-yy-left">som</div><div>o silêncio</div>
		<div class="tbl-yy-left">início</div><div>o fim</div>
		<div class="tbl-yy-left">ideal</div><div>real</div>
		<div class="tbl-yy-left">difícil</div><div>fácil</div>
		<div class="tbl-yy-left">coragem</div><div>medo</div>
		
</div>



<br /><br />
Da mesma forma cada desafios tem um objetivo de levar o participante a ser mais Yin ou Yang em uma área específica. Todos temos uma forma de ser a agir no dia a dia, é isso que formams os hábitos, os desafios foram feitos para quebrar esses hábitos para que a observação seja possível.
<a class="lightbox-close" href="#"></a>
					</div>
                </th>
                
              </tr>
            </thead>
            <tbody>';
			while($list = mysqli_fetch_array($query)){
				
   				 echo '         <tr>
                <td style="text-align:left;">'.$list['titulo'].' <div class="tooltip-explica"><img src="../assets/img/tooltip_des.png" width="15" /><span class="tooltiptext-explica">' . $list['tooltip_des'] . '</span></div> </td>
                <td style="text-align:center;">'. recTermo($list['yy']).'</td>
             	 </tr>';
			 }

	echo '    </tbody>
          </table>
    </div>';

}

function verificaRelFase($objetivo,$semana){
	$con = bancoMysqli();
	$sql = "SELECT iap_rel_id FROM relatorio_semanal WHERE objetivo = '$objetivo' AND fase = '$semana'";
	$query = mysqli_query($con,$sql);
	$num = mysqli_num_rows($query);
	
	if($num > 0){
		return TRUE;
	
	}else{	
		if($semana == 0 || $semana == null){
			return TRUE;
			
		}else{
			return FALSE;
		} 
	}
}


function verificaRelatorio($objetivo,$semana){
	$con = bancoMysqli();
	$sql = "SELECT iap_rel_id FROM relatorio_semanal WHERE objetivo = '$objetivo' AND semana = '$semana'";
	$query = mysqli_query($con,$sql);
	$num = mysqli_num_rows($query);
	if($num > 0){
		return TRUE;
	
	}else{
		return FALSE;
	}
		
}

//FAZER COM CALMA
/*
function verificaRelatorioObj($objetivo){
	$con = bancoMysqli();
	$sql = "SELECT iap_rel_id FROM relatorio_semanal WHERE objetivo = '$objetivo'";
	$query = mysqli_query($con,$sql);
	$num = mysqli_num_rows($query);
	if($num > 0){
		$x["bool"] = TRUE;
		$x
		return TRUE;
	
	}else{
		return FALSE;
	}
		
}
* 
 */
/*
function verificaSegunda($objetivo,$semana){
	//verifica em que semana a pessoa deve estar
	//verifica se já foram inseridos desafios da semana
	//se sim, não permite inserção
	//se não, permite
	// liberar na semana 01,02, 03, 04, 05, 07, 09, 11, 13, 15
	$con = bancoMysqli();
	$hoje = $GLOBALS['hoje'];
	$diasemana_numero = date('w', strtotime($hoje));
	$sql_semana = "SELECT iap_aceite.id, iap_objetivo.data_inicio,iap_aceite_fase FROM iap_aceite,iap_objetivo WHERE iap_aceite.objetivo = iap_objetivo.id AND iap_aceite.objetivo = '$objetivo' AND iap_objetivo.nivel <> '0' ORDER BY iap_aceite.id ASC LIMIT 0,1";
	$query_semana = mysqli_query($con,$sql_semana);
	$semana_inicio = mysqli_fetch_array($query_semana);
	$sem = retornaSemanas($semana_inicio['data_inicio']);
	if(mysqli_num_rows($query_semana) == 0) { //se o resultado for igual a zero, estamos no inicio do programa
		if($hoje == $sem[1]['inicio'] OR somarDatas($$sem[1]['inicio'],"+ 1") == $hoje){ //se hoje for igual ao primeiro dia do treinamento ou o segundo dia
			return TRUE;	
		}else{
			return FALSE;
		}
	}else{ //caso exista o registro de aceite
		if($sem[2]['inicio'] == $hoje OR somarDatas($$sem[2]['inicio'],"+ 1") == $hoje OR //verifica se as datas permitidas para inserir se igual ao hoje
   		$sem[3]['inicio'] == $hoje OR somarDatas($$sem[3]['inicio'],"+ 1") == $hoje OR
		$sem[4]['inicio'] == $hoje OR somarDatas($$sem[4]['inicio'],"+ 1") == $hoje OR
		$sem[5]['inicio'] == $hoje OR somarDatas($$sem[5]['inicio'],"+ 1") == $hoje OR
		$sem[7]['inicio'] == $hoje OR somarDatas($$sem[7]['inicio'],"+ 1") == $hoje OR
		$sem[9]['inicio'] == $hoje OR somarDatas($$sem[9]['inicio'],"+ 1") == $hoje OR
		$sem[11]['inicio'] == $hoje OR somarDatas($$sem[11]['inicio'],"+ 1") == $hoje OR
		$sem[13]['inicio'] == $hoje OR somarDatas($$sem[13]['inicio'],"+ 1") == $hoje OR		
		$sem[15]['inicio'] == $hoje OR somarDatas($$sem[15]['inicio'],"+ 1") == $hoje){
			$verFase = verificaFase($objetivo);
			if($sem[2]['fase'] <= $verFase){ //verifica se a fase já foi inserida
				return FALSE;
			}else{
				return TRUE;	
			}
			
		}else{
			return FALSE;	
		}

	}

}

*/

function verificaSegunda($objetivo,$semana){
	$obj = objetivo($objetivo);
	$diasemana_numero = date('w', strtotime($GLOBALS['hoje']));
	//echo "Contagem matriz: " . count($obj['datas'][$semana]['desafios']);
	//echo $GLOBALS['hoje'];
	
	switch($semana){

	/*
	case 0:
	case NULL:
		if(($obj['datas'][1]['inicio'] == $GLOBALS['hoje'] OR
		 somarDatas($obj['datas'][1]['inicio']," +1") == $GLOBALS['hoje'])
		 ){
			 return TRUE;
		}else{
			return FALSE;
		}
		*/
	
			
	case 1:
	case 2:
	case 3:
	case 4:
	case 5:
	//case 6:
	case 7:
	//case 8:
	case 9:
	//case 10:
	case 11:
	//case 12:
	case 13:
	//case 14:
	case 15:
		
		if(($obj['datas'][$semana]['inicio'] == $GLOBALS['hoje'] OR
		 somarDatas($obj['datas'][$semana]['inicio'],"+1") == $GLOBALS['hoje']) 
		 AND (count($obj['datas'][$semana]['desafios']) == 0)
		 )
		 {
			 return TRUE;
		}else{
			return FALSE;
		}
	break;
	
	//Exceção da regra - possibilidade de implementação
	case 6:
	case 8:
	case 10:
	case 12:
	case 14:
		$user = get_currentuserinfo();
		//echo $user->ID;
		
		if(($obj['datas'][$semana]['inicio'] == $GLOBALS['hoje'] OR
		 somarDatas($obj['datas'][$semana]['inicio']," +1") == $GLOBALS['hoje'] OR 
		 somarDatas($obj['datas'][$semana]['inicio']," +2") == $GLOBALS['hoje']) 
		 AND (count($obj['datas'][$semana]['desafios']) == 0) AND ($user->ID == '8' OR $user->ID == '9' OR $user->ID == '10')){
			 return TRUE;
		}else{
			return FALSE;
		}
		
	break;
	
	default:
		return FALSE;
	break;

		
		
	
	
	}
		
	
	
}



function retornaSemana($id){
	$hoje = $GLOBALS['hoje'];
	$ult = recuperaDados("iap_objetivo",$id,"id");
	//echo "<h1>$id ".$ult['data_inicio']."</h1>";
	$semana = retornaSemanas($ult['data_inicio']);
	$x = 0;
	for($i = 1; $i <= 16; $i++){
		
		
		//echo strtotime($semana[$i]['inicio'])."(".$semana[$i]['inicio'].") - ".strtotime($hoje)."(".$hoje." - )".strtotime($semana[$i]['fim']) . "(".$semana[$i]['fim'].")<br>";
		//echo ($semana[$i]['inicio'])." - ".($hoje)." - ".($semana[$i]['fim']) . "<br>";
		if(strtotime($semana[$i]['inicio']) <= strtotime($hoje) AND
		 strtotime($semana[$i]['fim']) >= strtotime($hoje)){
			
		$x = $i;
				
		}		
	}
	return $x;
}

function retornaSemanaSegunda($id){
	$hoje = $GLOBALS['hoje'];
	$ult = recuperaDados("iap_objetivo",$id,"id");
	//echo "<h1>$id ".$ult['data_inicio']."</h1>";
	$semana = retornaSemanas($ult['data_inicio']);
	$x = 0;
	for($i = 1; $i <= 16; $i++){
		//echo strtotime($semana[$i]['inicio'])." - ".strtotime($hoje)." - ".strtotime($semana[$i]['fim']) . "<br>";
		//echo ($semana[$i]['inicio'])." - ".($hoje)." - ".($semana[$i]['fim']) . "<br>";
		if(strtotime($semana[$i]['inicio']) <= strtotime($hoje) AND
		 strtotime($semana[$i]['fim']) >= strtotime($hoje)){
		$x = $i;
		}			
	}

	return $x;
}

function select($id,$sel){
	if($id == $sel){
		return "selected";			
	}	
}


function criaLista($fase,$obj){
	$con = bancoMysqli();
	$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '$fase' AND objetivo = '$obj'";
	$query_lista = mysqli_query($con,$sql_lista);
	return mysqli_fetch_array($query_lista);	
}



function retornaNota($id, $obj){
	$con = bancoMysqli();
	//echo $id;
	$sql = "SELECT * FROM relatorio_semanal WHERE user_id = '$id'";
	$query = mysqli_query($con, $sql);
		
	$num_linhas = mysqli_num_rows($query);	
	
	if(!$query){
		echo "<p class=\"lead bg-primary\">Você ainda não enviou relatório com nota de avaliação</p>";
	}else{
		//echo $id . " " . $obj . "<br><br><br>";
		echo "
		<div class=\"table-responsive center-block\" style=\"width:30%;\" >
		<table class=\"table table-striped\" > 
			<tr>
			<th><center>Fase</center></th>
			<th><center>Nota</center></th>
			</tr>";
			
			$soma = 0;
			while($lista_res = mysqli_fetch_assoc($query)){
				echo "<tr><td><center> Fase " . $lista_res['fase'] . "</center></td><td><center>" . $lista_res['iap_rel_nota_desafios'] . "</center></td></tr>";
				$soma = $soma + $lista_res['iap_rel_nota_desafios'];
				}
			
			/*
			$soma = 0;
		for($i = 0; $i < $num_linhas; $i++){
			echo "<tr><td><center> Fase " . $lista_res['fase'] . "</center></td><td><center>" . $lista_res['iap_rel_nota_desafios'] . "</center></td></tr>";
			$soma = $soma + $lista_res['iap_rel_nota_desafios'];
		}
		//echo $soma;
		*/
		$media = $soma / $num_linhas;
		
		echo "<tr><td><strong><center>Média</center></strong></td><td><center>" . $media . "</center></td></tr></table></div>";
	}
}

function gravarLog($log, $idUsuario){ //grava na tabela ig_log os inserts e updates
		$logTratado = addslashes($log);
		//$idUsuario = $user->ID;
		$ip = $_SERVER["REMOTE_ADDR"];
		$data = date('Y-m-d H:i:s');
		$sql = "INSERT INTO `iap_log` (`idLog`, `ig_usuario_idUsuario`, `enderecoIP`, `dataLog`, `descricao`) VALUES (NULL, '$idUsuario', '$ip', '$data', '$logTratado')";
		$mysqli = bancoMysqli();
		$mysqli->query($sql);
}

function emailTreinador($funcao, $nome, $email = null){//ENVIA EMAIL DE NOVO RELATÓRIO - TROCAR PRO DO CAIO
		
		$user = get_currentuserinfo();
		
		if($email == null){
			$to = "thiagonegro@gmail.com, caio@ialtaperformance.com";
		}else{
			$to = $email;
		}
		
		$headers = "From: sistema@ialtaperformance.com";
		switch($funcao){
		case "objetivo":
			$subject = $nome . utf8_decode(" cadastrou um objetivo que precisa ser avaliado");
			$txt = "Acesse o seu painel de treinador para avaliar:http://ialtaperformance.com/login";
		break;
		case "desafio":
			$subject = $nome . utf8_decode(" cadastrou novos desafios.");
			$txt = "Acesse o seu painel de treinador para visualizar:http://ialtaperformance.com/login";
		break;
		case "relatorio":
			$subject = $nome . utf8_decode(" enviou um relatório da fase");
			$txt = "Acesse o seu painel de treinador para visualizar:http://ialtaperformance.com/login";
		break;
		case "nivelinserido":
			$subject = utf8_decode("O seu treinador avaliou seu objetivo");
			$txt = "Olá ". $user->user_firstname . "! \n\n Acabamos de avaliar o seu objetivo. Dê uma olhada na sua área interna do participante: http://ialtaperformance.com/login . Estamos ansiosos para que você inicie seu treinamento! \n\n Nos vemos em breve! \n Um grande abraço \n\n \"Uma longa caminhada começa com o primeiro passo.\"";
		break;
		case "segunda":
			$subject = utf8_decode("Não se esqueça de mandar seu relatório de fase.");
			$txt = "Acesse o sistema para visualizar:http://ialtaperformance.com/login";
		break;
		case "advertencia":
			$subject = utf8_decode("$nome recebeu uma advertência.");
			$txt = "O trainee $user->user_firstname recebeu uma advertência por não enviar o relatório de fase.<br>Acesse o sistema para visualizar:http://ialtaperformance.com/login";
		break;
		case "advertencia_trainee":
			$subject = utf8_decode("$nome, você recebeu uma advertência.");
			$txt = "$user->user_firstname, você recebeu uma advertência por não enviar o relatório de fase através do sistema do Instituto de Alta Performance.<br>Fale com seu treinador.";
		break;
		}
		$x = mail($to,$subject,nl2br($txt),$headers);
		return $x;
}

function geraPreDesafios($desafios){ //$desafios é uma array
		$nivel_passado = "";
		foreach($desafios as $x){
			$des = recuperaDados("iap_desafio",$x,"id");
			$nivel = $des['nivel'];
			if($nivel != $nivel_passado){
		echo '
	       
	<h2>Desafios Nível: '.$nivel.'</h2>
        <div class="table-responsive">';
          
        if($nivel == 1){
        	echo '<table class="table table-striped tbl-des-nvl1">';
        }elseif($nivel == 2){
          	echo '<table class="table table-striped tbl-des-nvl2">';
		}elseif($nivel == 3){
          	echo '<table class="table table-striped tbl-des-nvl3">';
		}elseif($nivel == 4){
          	echo '<table class="table table-striped tbl-des-nvl4">';
		}elseif($nivel == 5){
          	echo '<table class="table table-striped tbl-des-nvl5">';
		}elseif($nivel == 6){
          	echo '<table class="table table-striped tbl-des-nvl6">';
		}elseif($nivel == 7){
          	echo '<table class="table table-striped tbl-des-nvl7">';
		}

		  
		echo '
            <thead>
              <tr>
                <th>Desafio</th>
                <th><center>Yin/Yang</center></th>
                <th><center>Escolher</center></th> 
              </tr>
            </thead>
            <tbody>';
			}
				
   				 echo '         <tr>
                <td style="text-align:left;">'.$des['titulo'].' <div class="tooltip-explica"><img src="../assets/img/tooltip_des.png" width="15" /><span class="tooltiptext-explica">' . $des['tooltip_des'] . '</span></div></td>
                <td>'. recTermo($des['yy']).'</td>
                <td>
                	
           			 <input onchange="validaEscolhaDesafio();" type="checkbox" name="'.$des['id'].'" '.checado($des['id'],$desafios).'>
           			 
        			</td>
             	 </tr>';
			if($nivel != $nivel_passado){
		
	echo '    </tbody>
          </table>
    </div>
    ';
			}
		$nivel_passado = $nivel;
		}
}

function retornaAdvertencia($obj){
	$con = bancoMysqli();
	$sql = "SELECT id FROM iap_advertencia WHERE objetivo = '$obj'";
	$query = mysqli_query($con,$sql);
	$num = mysqli_num_rows($query);
	return $num;
}

function insereAdvertencia($usuario,$objetivo,$fase = 0,$semana = 0,$advertencia = 0){
	$con = bancoMysqli();
	$sql = "INSERT INTO `iap_advertencia` (`id`, `usuario`, `fase`, `objetivo`, `semana`, `advertencia`, `publicado`) 
	VALUES (NULL, '$usuario', '$fase', '$objetivo', '$semana', '$advertencia', '1')";
	$query = mysqli_query($con,$sql);
	if($query){
		return mysqli_insert_id($con);	
	}else{
		return 0;	
	}
			
}

function noResend(){
	$p1 = $_SERVER["HTTP_REFERER"];
	$p2 = $_SERVER["QUERY_STRING"];
	echo $p1;
	header('Location:'.$p1, true, 301);
}

function vGlobais(){
	echo "SERVER";
	echo "<pre>";
	var_dump($_SERVER);
	echo "</pre>";

	if(isset($_POST)){
		echo "POST";
		echo "<pre>";
		var_dump($_POST);
		echo "</pre>";
	}

	if(isset($_GET)){
		echo "GET";
		echo "<pre>";
		var_dump($_GET);
		echo "</pre>";	
	}
	if(isset($_SESSION)){
		echo "SESSION";
		echo "<pre>";
		var_dump($_SESSION);
		echo "</pre>";	
	}
}

function recDes($obj,$fase){
	$con = bancoMysqli();
	$sql = "SELECT desafio FROM iap_aceite WHERE objetivo = '$obj' AND fase = '$fase'";
	$query = mysqli_query($con,$sql);
	$caixa = array();
	while($x = mysqli_fetch_array($query)){
		array_push($caixa, $x['desafio']);		
	}
	return $caixa;
}

function checadoUnitario($x,$y){
	if($x == $y){
		return "checked='checked'";	
	}	
}

function recRelatorio($objetivo,$fase){
	$con = bancoMysqli();
	$sql = "SELECT * FROM relatorio_semanal WHERE objetivo = '$objetivo' AND fase = '$fase' LIMIT 0,1";
	$query = mysqli_query($con,$sql);
	$x = mysqli_fetch_array($query);
	return $x;	
}

function hoje(){
	echo $GLOBALS['hoje'];
}

function vSistema($user){
	$x['hoje'] = $GLOBALS['hoje'];
	$x['userID'] = $user;
	$x['objetivo'] = verificaObjetivo($user);
	$x['retornaSemana'] = retornaSemana($user);
	$x['retornaSemans'] = retornaSemanas($x['objetivo']['data_inicio']);
	
	
	echo "<pre>";
	var_dump($x);
	echo "</pre>";
	
}


// a funcao retorna todas informações do objetivo
function objetivo($objetivo){
	$obj = recuperaDados("iap_objetivo",$objetivo,"id");
	// 1 verifica todas as datas
	$semanas = retornaSemanas($obj['data_inicio']);
	for($i = 1; $i <= 16 ;$i ++){
		$semanas[$i]['desafios'] = array();	
		//echo $objetivo." - ".$semanas[$i]['fase']."<br />";
		$semanas[$i]['desafios'] = matrizDesafios($objetivo,$semanas[$i]['fase']);
		
	}
	$x['inicio'] = $obj['data_inicio'];
	$x['datas'] = $semanas;	
	return $x;
}

function geraDesafiosOutras($tabelas,$checados){ 
	//$tabelas tem as tabelas que podem ser selecionadas, queremos as outras
	$tudo = array(1,2,3,4,5,6,7);
	$dif = array_diff($tudo,$tabelas);
	//var_dump($dif);
	$i = 0;
	foreach($checados as $desafios){
		$des[$i] = $desafios;
		$i++;	
	}
	//echo "<br />";
	//var_dump($des);
	
	

	echo '
	       
        <div class="table-responsive" style="overflow:unset;">';
          
       	echo '<table class="table">'; //class="table table-striped tbl-des-nvl1">';
		  
		echo '
            <thead>
              <tr>
                <th>Desafio</th>
                <th><center>Yin/Yang
                <a class="lightbox" href="#goofy"> [?]</a></center>
					<div class="lightbox-target" id="goofy">
						<h2>O que é Yin e Yang?</h2>
<br />
Yin Yang são conceitos que expõem a dualidade de tudo que existe no universo. Descrevem as duas forças fundamentais opostas e complementares que se encontram em todas as coisas
<br /><br />
Segundo essa ideia, cada ser, objeto ou pensamento possui um complemento do qual depende para a sua existência. Esse complemento existe dentro de si. Assim, se deduz que nada existe no estado puro: nem na atividade absoluta, nem na passividade absoluta, mas sim em transformação contínua. Voltaremos a falar desse assunto no futuro.
<br /><br />
A expansão da consciência está relacionada ao quão equilibrado uma pessoa está em cada um dos 7 níveis. Quanto mais clareza se tem das atividades Yin e Yang em cada nível maior a tendência de subida de consciência naquela área e maiores as chances de se alcançar resultados de forma equilibrada.
<br /><br />

<div class="tbl-yy">
	<div class="tbl-yy-left"><strong>Yang:<hr></strong></div><div><strong>Yin:<hr></strong></div>
	
	
		<div class="tbl-yy-left">o princípio ativo</div><div>o princípio passivo</div>
		<div class="tbl-yy-left">ação</div><div>reação</div>
		<div class="tbl-yy-left">diurno</div><div>noturno</div>
		<div class="tbl-yy-left">luminoso</div><div>escuro</div>
		<div class="tbl-yy-left">sol</div><div>lua</div>
		<div class="tbl-yy-left">som</div><div>o silêncio</div>
		<div class="tbl-yy-left">início</div><div>o fim</div>
		<div class="tbl-yy-left">ideal</div><div>real</div>
		<div class="tbl-yy-left">difícil</div><div>fácil</div>
		<div class="tbl-yy-left">coragem</div><div>medo</div>
		
</div>


<br /><br />
Da mesma forma cada desafios tem um objetivo de levar o participante a ser mais Yin ou Yang em uma área específica. Todos temos uma forma de ser a agir no dia a dia, é isso que formams os hábitos, os desafios foram feitos para quebrar esses hábitos para que a observação seja possível.
<a class="lightbox-close" href="#"></a>
					</div>
                </th>
                <th><center>Escolher</center></th>                
              </tr>
            </thead>
            <tbody>';
			
			for($k = 0; $k < $i; $k++){ 
				$list = recuperaDados("iap_desafio",$des[$k],"id");
				//echo $des[$k];
				//if(in_array($list['nivel'],$dif)){
				
   				 echo '         <tr>
                <td style="text-align:left;">'.$list['titulo'].' (Nível:' . $list['nivel'] . ' ) <div class="tooltip-explica"><img src="../assets/img/tooltip_des.png" width="15" /><span class="tooltiptext-explica">' . $list['tooltip_des'] . '</span></div></td>
                <td style="text-align:center;">'. recTermo($list['yy']).'</td>
                <td>
                	<center>
           			 <input onchange="return contaChkbox();" type="checkbox" name="'.$list['id'].'" checked="checked"></center>
           			 
        			</td>
             	 </tr>';
			 }	
			//}
		
		//VALIDA ESCOLHA DOS DESAFIOS ANTES DO SUBMIT
		//Fase 1
		/*
		$fase1 = "SELECT * FROM iap_aceite WHERE fase = 1";
		$pega_fase = mysqli_query($con, $fase1);
		$usa_fase = mysqli_fetch_assoc($pega_fase);
		//var_dump($usa_fase);
		
		$fase_atual = $usa_fase['fase'];
		$nivel_obj = $usa_fase['objetivo'];
		
		if($fase_atual == '1'){
			echo "<script>
		function validaEscolhaDesafio(){
			var chkList = document.querySelectorAll('input[type=\"checkbox\"]:checked');
			if(chkList.length > 1){
				alert('Você está começando o treinamento agora, e deve pegar apenas um desafio.');
				return true;			
			}
		}		
		</script>";
		}*/
		
		
	echo '    </tbody>
          </table>
    </div>
    ';


	
	
}


?>

