<?php include '../inc/header.php'; ?>
<?php 
$con = bancoMysqli();
if(isset($_GET['p'])){
	$p = $_GET['p'];	
}else{
	$p = "inicial";	
}

$mensagem = "";
if(isset($_POST['insere'])){ //insere
	$i = 0;
	$caixa = array();
	foreach($_POST as $x => $valor){
		if($x != "insere"){
			$array = explode('_', $x);
			$campo = $array[0];
			$id = $array[1];
			$sql_update = "UPDATE iap_aceite SET $campo = '1' WHERE id = '$id'";
			$query_update = mysqli_query($con,$sql_update);
			if($query_update){
				//$mensagem .= "$campo = 1 Em Id: $id <br />";	
			}
			
		}

	}
}


?>



<div class="container">
<?php include '../inc/fixed-navbar-user.php'; ?>
<?php include '../inc/menu-principal.php'; ?>

<?php switch($p){ 
case "inicial";
$objetivo = verificaObjetivo($user->ID); 
$datas = retornaSemanas($objetivo['data_inicio']);
?>
	<div class="jumbotron">
		<?php echo "<h1>Relatórios</h1>"; ?>
		
		<p class="lead">Nesta página é onde você deverá preencher seu relatório de fase, sempre que a fase atual acabar.</p>
		<p class="lead">Não deixe de preenchê-lo. É este relatório que permitirá o seu treinador fazer uma análise detalhada da sua evolução e te instruir para a próxima fase. </p>
		
		
       <p> <?php if(isset($mensagem)){ echo $mensagem; }?></p>
		
        <?php //var_dump($datas);?>
    
	<?php 
	for($i = 1; $i <= 16; $i++){ ?>
  <h3>Semana <?php echo $i; ?> Fase:  <?php echo $datas[$i]['fase']; ?> (<?php echo exibirDataBr($datas[$i]['inicio']) ?>  a <?php echo exibirDataBr($datas[$i]['fim']) ?>)   <h3>
<?php 
			$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '".$datas[$i]['fase']."' AND objetivo = '".$objetivo['id']."'";
			$query_lista = mysqli_query($con,$sql_lista);
			$num = mysqli_num_rows($query_lista);
			if($num > 0){
?>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nível</th>
                <th>Desafio</th>
                <th>Ying/Yang</th>
                <th>Ter</th>
                <th>Fazer</th>
                <th>Ser</th>
                <th>Fis</th>
                <th>Emo</th>
                <th>Men</th>
                <th>Esp</th>
              </tr>
            </thead>
            <tbody>
			<?php 
		
			while($x = mysqli_fetch_array($query_lista)){ 
				$desafio = recuperaDados("iap_desafio",$x['desafio'],"id");
			?>
            <tr>
                <td><?php echo $desafio['nivel']; ?></td>
                <td><?php echo $desafio['titulo']; ?></td>
                <td><?php echo recTermo($desafio['yy']); ?></td>
                <td><?php echo marcaX($x['ter']); ?>  </td>
                <td><?php echo marcaX($x['ser']); ?></td>
                <td><?php echo marcaX($x['fazer']); ?></td>
                <td><?php echo marcaX($x['fisico']); ?></td>
                <td><?php echo marcaX($x['emocional']); ?></td>
                <td><?php echo marcaX($x['mental']); ?></td>
                <td><?php echo marcaX($x['espiritual']); ?></td>
           </tr>
			 <?php } //while ?>
                             

	    </tbody>
          </table>
    </div>
                <?php 
				$rel = verificaRelatorio($objetivo['id'],$i);

				if($rel == FALSE){
				
				 ?>
     <form action="relatorios.php?p=insere" method="post">
                <input type="hidden" name="fase" value="<?php echo $datas[$i]['fase']; ?>">
                <input type="hidden" name="objetivo" value="<?php echo $objetivo['id']; ?>">
                <input type="hidden" name="semana" value="<?php echo $i; ?>">
                <input type="submit" class="btn btn-sm btn-success" value="Escrever relatório">
                <form>  
                <?php }else{ ?>

				<p>Você já enviou seu relatório. <a href="relatorios.php?p=ler&obj=<?php echo $objetivo['id']; ?>&sem=<?php echo $i; ?>"> Clique aqui para ler.</a></p>
                <?php } ?>
                
                
                
    <?php } //finaliza o if
	
	}//finaliza o for
	?>
	</div>

</div>



<?php 
break;
case "insere":

if(isset($_POST['insere_relatorio'])){
	
	$con = bancoMysqli();
	
	//$id = "";
	$current_user = wp_get_current_user();
	//$user_meta = get_userdata(1);
	
	//$nome = utf8_decode($_POST['nome']);
	$nome = utf8_decode($current_user -> user_firstname);
	$sobrenome = utf8_decode($current_user -> user_lastname);
	
	//$email = utf8_decode($_POST['email']);
	$email = utf8_decode($current_user->user_email);
	
	$userId = $current_user->ID;
	$notaDesafios = ($_POST['notaDesafios']);
	$expDesafios = ($_POST['expDesafios']);
	$oqObservou = ($_POST['oqObservou']);
	$periodo = ($_POST['periodo']);
	$semana = $_POST['semana'];
	$objetivo = $_POST['objetivo'];
	$fase = $_POST['fase'];	
	//$query =
	
	$sql = "INSERT INTO relatorio_semanal (
	iap_rel_nota_desafios, 
	iap_rel_exp_desafios, 
	iap_rel_oq_observou, 
	iap_rel_periodo, 
	data, 
	user_id,
	fase,
	semana,
	objetivo
	) 
	VALUES (
	'$notaDesafios', 
	'$expDesafios', 
	'$oqObservou', 
	'$periodo', 
	CURRENT_TIMESTAMP, 
	'$userId',
	'$fase',
	'$semana',
	'$objetivo'
)
	";
	$query = mysqli_query($con,$sql);
	if($query = 1){
		?>
        <section id="contact" class="home-section bg-white">
   		 <div class="container">
        <div class="row">
        <div class="jumbotron">
        <?php 
		echo "<p class=\"form-sucesso\">Seu relatório de fase foi enviado! =)</p>";
		echo "<a href=\"relatorios.php\" class=\"saiba-mais\" title=\"Voltar para Meu Perfil\">Voltar para Meu Perfil</a>";
		/*
		$to = "caio@ialtaperformance.com";
		$subject = $nome . utf8_decode(" enviou um relatório da fase");
		$txt = "Acesse o seu painel de treinador para visualizar:http://ialtaperformance.com/login";
		$headers = "From: relatorios@ialtaperformance.com";
		mail($to,$subject,$txt,$headers);
		*/
        
		} else{
?>
        <section id="contact" class="home-section bg-white">
   		 <div class="container">
        <div class="row">
        <div class="jumbotron">

<?php 
		echo "<p class=\"form-erro\">Ops. Algo errado aconteceu. Tente novamente.</p>";
		echo "<a href=\"relatorios.php/\" class=\"saiba-mais\" title=\"Tentar novamente\">Tentar novamente.</p>";
	}	
?>
</div>
</div>
</div>
</section>

<?php


}else{
$con = bancoMysqli();
$obj = 	ultObj($user->ID);
$objetivo = verificaObjetivo($user->ID); 
$datas = retornaSemanas($objetivo['data_inicio']);
$i = $_POST['semana'];
$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '".$datas[$i]['fase']."' AND objetivo = '".$objetivo['id']."'";
$query_lista = mysqli_query($con,$sql_lista);
$num = mysqli_num_rows($query_lista);

?>
<section id="contact" class="home-section bg-white">
    <div class="container">
        <div class="row">
        <div class="jumbotron">
        <h1>Relatório</h1>
        <p>Objetivo: <?php echo $obj['objetivo']; ?> (Nível <?php echo $obj['nivel']; ?>)</p>
        <p>Semana <?php echo $i; ?> Fase:  <?php echo $datas[$i]['fase']; ?> (<?php echo exibirDataBr($datas[$i]['inicio']) ?>  a <?php echo exibirDataBr($datas[$i]['fim']) ?>)</p>
		<p>Desafios: <?php echo $num; ?></p>
<?php 
while($x = mysqli_fetch_array($query_lista)){ 
	$desafio = recuperaDados("iap_desafio",$x['desafio'],"id");
	echo "+ ".$desafio['titulo']."<br />";
}
?>

        </div>
        </div>
<div class="row">     
  <div class="form-group">
            <div class="col-md-offset-2 col-md-8">
		<form action="relatorios.php?p=insere" method="post" class="form-horizontal" onSubmit="return validaDados()">
			
			
			<p>Dê uma nota de 0 a 10 que você dá a si mesmo para o seu desempenho nos desafios:
				<select name="notaDesafios" class="form-control" >
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>

                </select>
                
			</p>

			<p>
				Qual foi a experiência desse período com os desafios?
				<textarea name="expDesafios" class="form-control"></textarea>
			</p>
			
			<p>O que você observou?
				<textarea name="oqObservou" class="form-control"></textarea>		
			</p>
			
			<p>Como foi esse período pra você?
				<textarea name="periodo" class="form-control"></textarea>
			</p>
			

            
            
			<p>
            <input type="hidden" name="semana" value="<?php echo $_POST['semana']; ?>">
            <input type="hidden" name="fase" value="<?php echo $_POST['fase']; ?>">
            <input type="hidden" name="objetivo" value="<?php echo $_POST['objetivo']; ?>">

				<input name="insere_relatorio" type="submit" value="Enviar relatório" />
			</p>
			
		</form>
        <?php ?>	
        
        </div>
        </div>
</div>
</div>
</section>
<?php } ?>

<?php 
break;
case "ler":
$con = bancoMysqli();
$obj = 	ultObj($user->ID);
$objetivo = verificaObjetivo($user->ID); 
$datas = retornaSemanas($objetivo['data_inicio']);
$i = $_GET['sem'];
$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '".$datas[$i]['fase']."' AND objetivo = '".$objetivo['id']."'";
$query_lista = mysqli_query($con,$sql_lista);
$num = mysqli_num_rows($query_lista);
?>
<section id="contact" class="home-section bg-white">
    <div class="container">
        <div class="row">
        <div class="jumbotron">
        <h1>Relatório</h1>
        <p>Objetivo: <?php echo $obj['objetivo']; ?> (Nível <?php echo $obj['nivel']; ?>)</p>
        <p>Semana <?php echo $i; ?> Fase:  <?php echo $datas[$i]['fase']; ?> (<?php echo exibirDataBr($datas[$i]['inicio']) ?>  a <?php echo exibirDataBr($datas[$i]['fim']) ?>)</p>
		<p>Desafios: <?php echo $num; ?></p>
<?php 
while($x = mysqli_fetch_array($query_lista)){ 
	$desafio = recuperaDados("iap_desafio",$x['desafio'],"id");
	echo "+ ".$desafio['titulo']."<br />";
}

$sql_lei = "SELECT * FROM relatorio_semanal WHERE objetivo = '".$_GET['obj']."' AND semana = '".$_GET['sem']."'";
$query_lei = mysqli_query($con,$sql_lei);
$lei = mysqli_fetch_array($query_lei);
?>

        </div>
        </div>
<div class="row">     
  <div class="form-group">
            <div class="col-md-offset-2 col-md-8">
   			<p>Dê uma nota de 0 a 10 que você dá a si mesmo para o seu desempenho nos desafios: <strong><?php echo $lei['iap_rel_nota_desafios']; ?></strong>	</p>
	
			<p>
				Qual foi a experiência desse período com os desafios?
			</p>
			
            <p><strong><?php echo ($lei['iap_rel_exp_desafios']); ?></strong></p>
			<p>O que você observou?
			</p>
			            <p><strong><?php echo $lei['iap_rel_oq_observou']; ?></strong></p>
			<p>Como foi esse período pra você?
			</p>
	                    <p><strong><?php echo $lei['iap_rel_periodo']; ?></strong></p> 
                        <br />
                        <p>Enviado em <?php echo exibirDataBr($lei['data']); ?> </p>
  </div>
</div>
</section>

<?php
break; //finaliza o switch
} 
?>

<?php include '../inc/footer.php'; ?>