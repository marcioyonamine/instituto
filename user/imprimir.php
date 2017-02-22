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



$mensagem = "Você está na fase $fase do seu Treinamento de Alta Performance.<br />
Essa fase termina no dia ".exibirDataBrOrdem($data_fim)." . <br />
Lembre-se sempre do seu objetivo para conseguir completar seus desafios.";

?>
<!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/print.css">

<body>
    <div class="a6">
    <img class="logo" src="http://www.ialtaperformance.com/sistema/assets/img/logo_impressao02.jpg" width="350"> 
    <p class="mensagem"><?php echo $mensagem; ?></p>
    <table>
    <tr>
    <th width:"30%">Desafio</th>
    <th>Acompanhamento diário</th>
  </tr>
<?php while($lista = mysqli_fetch_array($query_lista)){ 
		$desafio = recuperaDados("iap_desafio",$lista['desafio'],"id");
		$print = "+ ".$desafio['titulo']."(Nível " . $desafio['nivel'].")";

?>  
  <tr>
    <td width="50%"><p class="desafio"><?php echo $print; ?></p></td>
    <td><img src="../assets/img/boxes.png" width="100"></td>
  </tr>
<?php } ?>  

    </table>


	<p class="centro">Alta Performance é um estilo de vida, saiba mais em: ialtaperformance.com</p>
  
    </div>
</body>