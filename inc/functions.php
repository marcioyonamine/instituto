<?php

@ini_set('display_errors', '1');
error_reporting(E_ALL); 


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

function retornaSemanas($data){
	$inicio = nextMonday($data);
	$x[1]['inicio'] = $inicio;
	$x[1]['fim'] = date('Y-m-d', strtotime($inicio. ' + 6 days'));
	$x[1]['fase'] = 1;	
	for($i = 2; $i <= 16; $i++){
		$x[$i]['inicio'] = date('Y-m-d', strtotime($x[$i-1]['inicio']. ' + 7 days'));
		$x[$i]['fim'] = date('Y-m-d', strtotime($x[$i]['inicio']. ' + 6 days'));
		switch($i){
			case 1:
			case 2:
			case 3:
			case 4:
				$x[$i]['fase'] = $i;
			break;
			
			case 5:
			case 6:
				$x[$i]['fase'] = 5;
			break;
			
			case 7:
			case 8:
				$x[$i]['fase'] = 6;			
			break;

			case 9:
			case 10:
				$x[$i]['fase'] = 7;			
			break;
				
			case 11:
			case 12:
				$x[$i]['fase'] = 8;			
			break;


			case 13:
			case 14:
				$x[$i]['fase'] = 9;			
			break;

			case 15:
			case 16:
				$x[$i]['fase'] = 10;			
			break;


		}

			
	}
	return $x;
}

//Verifica se os desafios enviados em uma array obedecem a uma regra
function desFas($objetivo,$desafios,$fase){ 
	$con = bancoMysqli();
	$sql_des = "SELECT id,desafio FROM iap_aceite WHERE objetivo = '$objetivo'"; //Seleciona todos os desafios do nível atual
	$query_des = mysqli_query($con,$sql_des);
	$i = 0;
	$k = mysqli_fetch_array($query_des); // uma array com todos os ids da fase anterior
		

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
				$f['err_men'] = "Forma enviados ".count($y)." desafios. Na fase 1 é permitido exato 1 desafio.";
			}
		break; 

		case 2: // - 0, = 1,  + 1 (2)
			if(count($y) == 2){ // verifica se a array tem valor 02 (dois desafios)
				$f['bool_des'] = 1;
			}else{
				$f['bool_des'] = 0;
				$f['err_men'] = "Forma enviados ".count($y)." desafios. Na fase 2 é permitido exatos 2 desafios.";

				
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
					while($k){
						if($k['desafio'] == $y[$i]){
							$t++;
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
					while($k){
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
					while($k){
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
					while($k){
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
					while($k){
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
					while($k){
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
		break;

		case 10: // pelo menos 1n (7)
					$i = 0;	
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
			}
		
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
	}
	return $x['fase'];
}


function checked($x,$array){
	if (in_array($x,$array)){
		return "checked='checked'";		
	}
}

function geraDesafios($nivel,$checked = array()){ //checked é uma array
	$con = bancoMysqli();
	$sql = "SELECT * FROM iap_desafio WHERE nivel = '$nivel'";
	$query = mysqli_query($con,$sql);
	

	echo '
	       
	<h2>Desafios Nível: '.$nivel.'</h2>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><center>Desafio</center></th>
                <th><center>Ying/Yang</center></th>
                <th></th>
              </tr>
            </thead>
            <tbody>';
			while($list = mysqli_fetch_array($query)){
				
   				 echo '         <tr>
                <td>'.$list['titulo'].'</td>
                <td>'. recTermo($list['yy']).'</td>
                <td>
                	
           			 <input onchange="validaEscolhaDesafio();" type="checkbox" name="'.$list['id'].'" '.checked($list['id'],$checked).'>
           			 
        			</td>
             	 </tr>';
			 }	
		
		//VALIDA ESCOLHA DOS DESAFIOS ANTES DO SUBMIT
		//Fase 1
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
		}
		
		
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
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><center>Desafio</center></th>
                <th><center>Ying/Yang</center></th>
              </tr>
            </thead>
            <tbody>';
			while($list = mysqli_fetch_array($query)){
				
   				 echo '         <tr>
                <td>'.$list['titulo'].'</td>
                <td>'. recTermo($list['yy']).'</td>
             	 </tr>';
			 }

	echo '    </tbody>
          </table>
    </div>';

}
