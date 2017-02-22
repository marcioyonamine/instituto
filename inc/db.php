<?php
function bancoMysqli(){ 
	$servidor = 'localhost';
	$usuario = 'ialtaper_root';
	$senha = '%T*BKdbLLTSk';
	$banco = 'ialtaper_sistema';
	$con = mysqli_connect($servidor,$usuario,$senha,$banco); 
	mysqli_set_charset($con,"utf8");
	return $con;
}

?>