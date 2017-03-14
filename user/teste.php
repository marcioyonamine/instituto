<?php 
@ini_set('display_errors', '1');
error_reporting(E_ALL); 

require_once("../../wp-load.php"); //carrega WP
require_once("../inc/lib/fpdf/fpdf.php"); //carrega a biblioteca PDF
include '../inc/header.php';
	$con = bancoMysqli();
	$objetivo = verificaObjetivo($user -> ID);
var_dump(verificaSegunda($objetivo['id'], retornaSemana($user -> ID)));


echo "<pre>";
//print_r($desrec);
echo "</pre>";
