<?php 
@ini_set('display_errors', '1');
error_reporting(E_ALL); 

require_once("../../wp-load.php"); //carrega WP
require_once("../inc/functions.php"); //carrega as funcoes
require_once("../inc/lib/fpdf/fpdf.php"); //carrega a biblioteca PDF

//$con = bancoMysqli();
$user = wp_get_current_user();   
$semana = $_GET['semana'];
$obj = 	ultObj($user->ID);
$sem = retornaSemanas($obj['data_inicio']);
$data_inicio = $sem[$_GET['semana']]['inicio'];
$data_fim = $sem[$_GET['semana']]['fim'];
$fase = $sem[$_GET['semana']]['fase'];
$obj_titulo = $obj['objetivo'];
$lista = criaLista($fase,$obj['id']);
echo "<pre>";
print_r($lista);
echo "</pre>";
