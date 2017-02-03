<?php
function bancoMysqli(){ 
	$servidor = 'localhost';
	$usuario = 'ialtaper_adm';
	$senha = 'iap#2017';
	$banco = 'ialtaper_aplicativo';
	$con = mysqli_connect($servidor,$usuario,$senha,$banco); 
	mysqli_set_charset($con,"utf8");
	return $con;
}

?>