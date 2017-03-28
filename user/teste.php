<?php 
@ini_set('display_errors', '1');
error_reporting(E_ALL); 

require_once("../../wp-load.php"); //carrega WP
require_once("../inc/lib/fpdf/fpdf.php"); //carrega a biblioteca PDF
include '../inc/header.php';
	$con = bancoMysqli();
	$objetivo = verificaObjetivo($user -> ID);
	//var_dump(verificaSegunda($objetivo['id'], retornaSemana($user -> ID)));

	$x = retornaSemanas('2017-01-09');
	
echo "<br><br>" . ($GLOBALS['hoje']);
//echo "<br><br>" . $hoje;


echo "<pre>";
//print_r($desrec);
var_dump($x);
echo "</pre>";
