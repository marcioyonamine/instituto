<?php $page_title = "Gerenciar Advertências | iAP"; ?>
<?php include '../inc/header.php'; ?>
<?php
$con = bancoMysqli();
$level = get_currentuserinfo();
$objetivo = recuperaDados("iap_objetivo",$_GET['id'],"id");
$usuario = get_userdata($objetivo['usuario']);
$sem = retornaSemana($_GET['id']);
$datas = retornaSemanas($objetivo['data_inicio']);

//var_dump($usuario);
?>
<div class="container">
	<?php include '../inc/fixed-navbar-trainer.php'; ?>
	<?php include '../inc/menu-trainer.php';	?>

	<div class="jumbotron">
		<?php echo "<h1>".$usuario->first_name." ".$usuario->last_name."</h1>"; ?>
        <p><?php echo $usuario->user_email; ?></p>
	<?php echo "<h2>".$usuario->first_name." ".$usuario->last_name."</h2>"; ?>
        <p><strong>Objetivo</strong> <?php echo $objetivo['objetivo']; ?></p>
        <p><strong>Data início</strong> <?php echo exibirDataBrOrdem($datas[1]['inicio']) ?></p>
        <p><strong>Data prevista para término</strong> <?php echo exibirDataBrOrdem($datas[16]['fim']) ?></p>
        <p><strong>Número de advertências</strong></p>
        <p><strong>Média das notas das fases</strong></p>
	</div>
		<?php 
		
		//echo "$sem";
		$f = 0;
		for($i = $sem; $i <= $sem  AND $i > 0; $i--){ 
			if($i != 6 && $i != 8 && $i != 10 && $i != 12 && $i != 14){	

			
			?>
<h2>Fase <?php echo $datas[$i]['fase']; ?></h2>
<h3>Desafios</h3>
<?php 
$sql_desafio = "SELECT * FROM iap_aceite WHERE objetivo = ".$_GET['id']." AND fase = ".$datas[$i]['fase']."";
$query_desafio = mysqli_query($con,$sql_desafio);
while($des = mysqli_fetch_array($query_desafio)){
	$desafio = recuperaDados("iap_desafio",$des['desafio'],"id");
?>
<p>Desafio: <?php echo $desafio['titulo'] ?> | Frequência: <?php echo $des['frequencia'] ?> | Intensidade: <?php echo $des['intensidade'] ?> | Lembrete/Âncora <?php echo $des['lembrete'] ?></p>
<?php 	

}

?>


<h3>Relatório</h3>

<?php 
$relatorio = recRelatorio($_GET['id'],$datas[$i]['fase']);
?>
<p><?php echo $relatorio['iap_rel_exp_desafios'];  ?></p>
<p><?php echo $relatorio['iap_rel_oq_observou'];  ?></p>
<p><?php echo $relatorio['iap_rel_periodo'];  ?></p>
<p><?php echo $relatorio['iap_rel_aprendizado'];  ?></p>
<p><?php echo $relatorio['iap_rel_msg_si'];  ?></p>
<p><?php echo $relatorio['iap_rel_msg_trainer'];  ?></p>
<p><?php echo $relatorio['data'];  ?></p>


<h3>Nota</h3>
<p><?php echo $relatorio['iap_rel_nota_desafios'];  ?></p>

<?php } //final do if ?>
<?php } //final do for ?>
    
    </div>
<?php include '../inc/footer.php'; ?>    