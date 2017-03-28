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
	<?php //echo "<h2>".$usuario->first_name." ".$usuario->last_name."</h2>"; ?>
        <p><strong>Objetivo:<br /></strong> <?php echo $objetivo['objetivo']; ?></p>
        <p><strong>Data início:<br /></strong> <?php echo exibirDataBrOrdem($datas[1]['inicio']) ?></p>
        <p><strong>Data prevista para término:<br /></strong> <?php echo exibirDataBrOrdem($datas[16]['fim']) ?></p>
        <p><strong>Número de advertências:<br /></strong><?php echo retornaAdvertencia($objetivo['id']); ?></p>
        <p><strong>Média das notas das fases:<br /></strong><?php retornaNota($usuario->ID,$objetivo['id']); ?></p>
	
		<?php 
		
		//echo "$sem";
		$f = 0;
		for($i = $sem; $i <= $sem  AND $i > 0; $i--){ 
			if($i != 6 && $i != 8 && $i != 10 && $i != 12 && $i != 14){	

			
			?>
<h2 style="background-color:#183F76; color:#ffffff; padding:15px;">Fase <?php echo $datas[$i]['fase']; ?></h2>
<h3 style="background-color:#56C4F1; color:#ffffff; padding:15px;">Desafios</h3>
<?php 
$sql_desafio = "SELECT * FROM iap_aceite WHERE objetivo = ".$_GET['id']." AND fase = ".$datas[$i]['fase']."";
$query_desafio = mysqli_query($con,$sql_desafio);
while($des = mysqli_fetch_array($query_desafio)){
	$desafio = recuperaDados("iap_desafio",$des['desafio'],"id");
?>
<p><strong>Desafio:</strong> <?php echo $desafio['titulo'] ?> | Frequência: <?php echo $des['frequencia'] ?> | Intensidade: <?php echo $des['intensidade'] ?> | Lembrete/Âncora: <?php echo $des['lembrete'] ?></p>
<?php 	

}

?>


<h3 style="background-color:#56C4F1; color:#ffffff; padding:15px;">Relatório</h3>

<?php 
$relatorio = recRelatorio($_GET['id'],$datas[$i]['fase']);
?>
<p><strong>Como foi a experiência dessa fase com seus desafios?</strong> </p>
<p><?php echo $relatorio['iap_rel_exp_desafios'];  ?></p>

<p><strong>Quais padrões de comportamento você observou nessa fase do seu treinamento?</strong></p>
<p><?php echo $relatorio['iap_rel_oq_observou'];  ?></p>

<p><strong>Quais ações você tomou nessa fase para se aproximar do seu objetivo?</strong></p>
<p><?php echo $relatorio['iap_rel_periodo'];  ?></p>

<p><strong>Nota:</strong></p>
<p><?php echo $relatorio['iap_rel_nota_desafios'];  ?></p>

<p><strong>Qual foi o maior aprendizado ou benefício para você nesta fase?</strong></p>
<p><?php echo $relatorio['iap_rel_aprendizado'];  ?></p>

<p><strong>Com este aprendizado, qual a mensagem você dá para si mesmo, para aplicá-lo na prática em sua vida a partir de agora?</strong><p>
<p><?php echo $relatorio['iap_rel_msg_si'];  ?></p>

<p><strong>Tem alguma sugestão ou mensagem para passar para o treinador ou para o time iAP?</strong></p>
<p><?php echo $relatorio['iap_rel_msg_trainer'];  ?></p>

<p><strong>Enviado em:</strong></p>
<p><?php echo $relatorio['data'];  ?></p>

<?php } //final do if ?>
<?php } //final do for ?>
    
    </div></div>
<?php include '../inc/footer.php'; ?>    