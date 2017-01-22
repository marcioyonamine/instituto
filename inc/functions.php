<?php
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


function nextMonday($data){
	$diasemana_numero = date('w', strtotime($data)); //data em sql Y-m-d
	switch($diasemana_numero){
		case 1:
			return date('Y-m-d', strtotime($data. ' + 1 days'));
		break;		
		case 2:
			return date('Y-m-d', strtotime($data. ' + 7 days'));
		break;		
		case 3:
			return date('Y-m-d', strtotime($data. ' + 6 days'));
		break;		
		case 4:
			return date('Y-m-d', strtotime($data. ' + 5 days'));
		break;		
		case 5:
			return date('Y-m-d', strtotime($data. ' + 4 days'));
		break;		
		case 6:
			return date('Y-m-d', strtotime($data. ' + 3days'));
		break;		
		case 7:
			return date('Y-m-d', strtotime($data. ' + 2 days'));
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
	$sql = "SELECT * FROM iap_objetivo WHERE usuario = '$id'";
	$query = mysqli_query($con,$sql);
	$num = mysqli_num_rows($query);
	return $num;	
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

?>