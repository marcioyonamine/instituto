<?php

$diasemana = date('w', strtotime($data));

if($diasemana == 1){


function bancoMysqli(){ 
	$servidor = 'localhost';
	$usuario = 'root';
	$senha = '';
	$banco = 'wordpress';
	$con = mysqli_connect($servidor,$usuario,$senha,$banco); 
	mysqli_set_charset($con,"utf8");
	return $con;
}

$con = bancoMysqli();
$sql = "SELECT user_email FROM wp_users WHERE ID IN(SELECT DISTINCT user_id FROM  wp_usermeta WHERE meta_key LIKE 'wp_user_level' AND meta_value <> '10')";
$query = mysqli_query($con, $sql);

while($x = mysqli_fetch_array($query)){
 emailTreinador('segunda', 'Treinador', $x['user_email']);
 sleep(2);
}
}
