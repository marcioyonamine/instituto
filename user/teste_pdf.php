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
$obj_id = $obj['id'];
$sem = retornaSemanas($obj['data_inicio']);
$data_inicio = $sem[$_GET['semana']]['inicio'];
$data_fim = $sem[$_GET['semana']]['fim'];
$fase = $sem[$_GET['semana']]['fase'];
$obj_titulo = $obj['objetivo'];


$con = bancoMysqli();
$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '$fase' AND objetivo = '$obj_id'";
$query_lista = mysqli_query($con,$sql_lista);
$lista = mysqli_fetch_array($query_lista);	



//$lista = criaLista($fase,$obj['id']);
echo "<pre>";
var_dump($sql_lista);
echo "</pre>";

$mensagem = "Você está na fase $fase do seu Treinamento de Alta Performance.
Essa fase termina no dia ".exibirDataBrOrdem($data_fim)." .
Lembre-se sempre do seu objetivo para conseguir completar seus desafios.";

   