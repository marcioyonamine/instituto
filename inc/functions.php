<?php
@ini_set('display_errors', '1');
//error_reporting(E_ALL);
error_reporting(E_ALL ^ E_WARNING);  



$hoje = date('Y-m-d'); //global data

include "db.php";

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

function nextMonday($data){
	$diasemana_numero = date('w', strtotime($data)); //data em sql Y-m-d
	switch($diasemana_numero){
		case 0:
			return somarDatas($data,"+ 1");
		break;		
		case 1:
			return somarDatas($data,"+ 7");
		break;		
		case 2:
			return somarDatas($data,"+ 6");
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
function desFas($objetivo,$desafios,$fase){ 
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
	//$k = mysqli_fetch_array($query_des);// uma array com todos os ids da fase anterior
		

	$n = mysqli_num_rows($query_des);
	$obj = recuperaDados("iap_objetivo",$objetivo,"id"); //recupera dados do objetivo
	$tudo = array(1,2,3,4,5,6,7);
	foreach($desafios as $x){ //crio um numero na matriz 
		$y[$i] = $x;	
		$i++;
	}
	
	switch($fase){
		case 1:  //somente desafios de nível 1 (1)
			if(count($y) == 1){
				$f['bool_des'] = 1;
			}else{
				$f['bool_des'] = 0;
				$f['err_men'] = "Foram enviados ".count($y)." desafios. Na fase 1 é permitido exato 1 desafio.";
			}
		break; 

		case 2: // - 0, = 1,  + 1 (2)
			$i = 0;
			if(count($y) != 2){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Forma enviados ".count($y)." desafios. Na fase 2 é permitido exatos 2 desafios.";
			
			}else{ // caso esteja, é verificado se há duas novas
				$t = 0;
				for($i = 0; $i < count($y); $i++){
					$kg = "";
					while($k = mysqli_fetch_array($query_des)){
						if($y[$i] == $k['desafio']){
							
							$t++;
						}
						$kg .= $y[$i]." - ".$k['desafio']."<br />";
					}
				}
				if($t == 1){
					$f['bool_des'] = 1;	
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Pelo menos 1 dos desafios deve ser mantido.($t)";
					$f['dump'] = $e;
				}
		
			}
		break;

		case 3: // - 1, = 1, + 2 (3) / n e n - 1 (se n = 1, n - 1 = 7)
			$i = 0;
			if(count($y) != 3){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Forma enviados ".count($y)." desafios. Na fase 3 é permitido exatos 3 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				$t = 0;
				for($i = 0; $i <= count($y); $i++){ 
					while($k = mysqli_fetch_array($query_des)){
						
						if($k['desafio'] == $y[$i]){
						//echo $k['desafio']." == ".$y[$i];
							$t++;
						}else{
						//	echo $k['desafio']." != ".$y[$i];
	
						}
					}
				}		
				if($t == 1){ //se dois forem iguais, passa na condição
					$f['bool_des'] = 1;
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Pelo menos 1 dos desafios deve ser mantido.";
				}
			}

		
		break;

		case 4: // -1, = 2 , + 3 (5) / n, n - 1, n + 1 (se n = 7, n+1 = 1) 
		$i = 0;	
			if(count($y) != 5){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Forma enviados ".$count($y)." desafios. Na fase 4 é permitido exatos 5 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				$t = 0;
				for($i = 0; $i <= count($y); $i++){ 
					while($k = mysqli_fetch_array($query_des)){
						if($k['desafio'] == $y[$i]){
							$t++;
						}
					}
				}		
				if($t == 2){ //se numero de mantidos forem iguais, passa na condição
					$f['bool_des'] = 1;
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Pelo menos 2 dos desafios devem ser mantidos.";
				}
			}		
		
		break;

		case 5: // -2, = 3 , + 5 (8) / n, n - 1, n + 1 (se n = 7, n+1 = 1) 

			$i = 0;	
			if(count($y) != 8){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Forma enviados ".$count($y)." desafios. Na fase 5 é permitido exatos 8 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				$t = 0;
				for($i = 0; $i <= count($y); $i++){ 
					while($k = mysqli_fetch_array($query_des)){
						if($k['desafio'] == $y[$i]){
							$t++;
						}
					}
				}		
				if($t == 3){ //se numero de mantidos forem iguais, passa na condição
					$f['bool_des'] = 1;
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Pelo menos 3 dos desafios devem ser mantidos.";
				}
			}		
		
		break;

		case 6:// -3, = 5, + 8 (13) // pelo menos 1n

			$i = 0;	
			if(count($y) != 13){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Forma enviados ".$count($y)." desafios. Na fase 6 é permitido exatos 13 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				$t = 0;
				for($i = 0; $i <= count($y); $i++){ 
					while($k = mysqli_fetch_array($query_des)){
						if($k['desafio'] == $y[$i]){
							$t++;
						}
					}
				}		
				if($t == 5){ //se numero de mantidos forem iguais, passa na condição
					//verifica se tem um cada nível
					$caixa = array(); //cria um array para inserir todos os niveis das opções selecionadas
					for($i = 0; $i <= count($y); $i++){
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
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Pelo menos 5 dos desafios devem ser mantidos.";
				}
			}		
		

		
		break;

		case 7:// -5, = 8, + 13 (21) // pelo menos 1n

			$i = 0;	
			if(count($y) != 21){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Forma enviados ".$count($y)." desafios. Na fase 7 é permitido exatos 21 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				$t = 0;
				for($i = 0; $i <= count($y); $i++){ 
					while($k = mysqli_fetch_array($query_des)){
						if($k['desafio'] == $y[$i]){
							$t++;
						}
					}
				}		
				if($t == 7){ //se numero de mantidos forem iguais, passa na condição
					//verifica se tem um cada nível
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
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Pelo menos 7 dos desafios devem ser mantidos.";
				}
			}		
		

		

		
		break;

		case 8: // -8, = 13, + 21 (34) // pelo menos 1n
		
			$i = 0;	
			if(count($y) != 34){ //verifica se o número de opções está de acordo com o da fase. caso não,
				$f['bool_des'] = 0;
				$f['err_men'] = "Forma enviados ".$count($y)." desafios. Na fase 8 é permitido exatos 34 desafios.";
			}else{ // caso esteja, é verificado se há duas novas
				$t = 0;
				for($i = 0; $i <= count($y); $i++){ 
					while($k = mysqli_fetch_array($query_des)){
						if($k['desafio'] == $y[$i]){
							$t++;
						}
					}
				}		
				if($t == 13){ //se numero de mantidos forem iguais, passa na condição
					//verifica se tem um cada nível
					
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
				}else{
					$f['bool_des'] = 0;
					$f['err_men'] = "Pelo menos 13 dos desafios devem ser mantidos.";
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
		
		break;
		
		

		
	}
		return $f;	
	
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
	$sql = "SELECT * FROM iap_desafio WHERE nivel = '$nivel'";
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
				
   				 echo '         <tr>
                <td style="text-align:left;">'.$list['titulo'].' <div class="tooltip-explica"><img src="../assets/img/tooltip_des.png" width="15" /><span class="tooltiptext-explica">' . $list['tooltip_des'] . '</span></div></td>
                <td style="text-align:center;">'. recTermo($list['yy']).'</td>
                <td>
                	
           			 <input onchange="validaEscolhaDesafio();" type="checkbox" name="'.$list['id'].'" '.checado($list['id'],$checado).'>
           			 
        			</td>
             	 </tr>';
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
	$sql = "SELECT * FROM iap_desafio WHERE nivel = '$nivel'";
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

function verificaSegunda($objetivo,$semana){
	//verifica em que semana a pessoa deve estar
	//verifica se já foram inseridos desafios da semana
	//se sim, não permite inserção
	//se não, permite
	// liberar na semana 01,02, 03, 04, 05, 07, 09, 11, 13, 15
	$con = bancoMysqli();
	$hoje = date('Y-m-d');
	$diasemana_numero = date('w', strtotime($hoje));
	$sql_semana = "SELECT id,data_aceite FROM iap_aceite WHERE objetivo = '$objetivo' ORDER BY id ASC LIMIT 0,1";
	$query_semana = mysqli_query($con,$sql_semana);
	$semana_inicio = mysqli_fetch_array($query_semana);
	
	$sem = retornaSemanas($semana_inicio['data_aceite']);
	
	if($semana == 01 OR	//verifica se a semana permite abertura de desafios
	$semana == '02' OR 
	$semana == '03' OR
	$semana == '04' OR
	$semana == '05' OR
	$semana == '07' OR
	$semana == '09' OR
	$semana == '11' OR
	$semana == '13' OR
	$semana == '15'){
		if($diasemana_numero == 1){ //verifica se é segunda-feira
			$sql_desafios = "SELECT id,data_inicio,fase FROM iap_aceite WHERE objetivo = '$objetivo' ORDER BY data_inicio DESC LIMIT 0,1";
			$query_desafios = mysqli_query($con,$sql_desafios);
			$data_ultima = mysqli_fetch_array($query_desafios);
			if(($data_ultima['fase'] == 1) AND (somarDatas($data_ultima['data_inicio'],-7) == $hoje)){
				return FALSE;
			}
			elseif($data_ultima['data_inicio'] != $hoje){ //verifica se já foram inseridos desafios
				return TRUE;
			}
			
			else{
				return FALSE;
			}
		}
	}else{
		return FALSE;
			
	}
}

function retornaSemana($id){
	$hoje = date('Y-m-d');
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
	if($x != 0){
		return TRUE;
	}else{
		return FALSE;		
	}
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
	$resultado = mysqli_num_rows($query);
	//var_dump($resultado);
	$lista_res = mysqli_fetch_array($query);
	//var_dump($lista_res);
	
	
	
	if(!$resultado){
		echo "<p class=\"lead bg-primary\">Você ainda não enviou relatório com nota de avaliação</p>";
	}else{
		echo "
		<div class=\"table-responsive center-block\" style=\"width:30%;\" >
		<table class=\"table table-striped\" > 
			<tr>
			<th><center>Fase</center></th>
			<th><center>Nota</center></th>
			</tr>";
			$soma = 0;
		for($i = 0; $i < $resultado; $i++){
			echo "<tr><td> Fase " . $lista_res['fase'] . "</td><td>" . $lista_res['iap_rel_nota_desafios'] . "</td></tr>";
			$soma = $soma + $lista_res['iap_rel_nota_desafios'];
		}
		//echo $soma;
		$media = $soma / $resultado;
		echo "<tr><td><strong>Média</strong></td><td>" . $media . "</td></tr></table></div>";
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

?>

