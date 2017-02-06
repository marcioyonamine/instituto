<?php include '../inc/header.php'; ?>

<?php 

//criar sessão de segurança
//session_start();
//include "../inc/functions.php";

if(isset($_GET['data'])){
	$hoje = $_GET['data'];	
}

$con = bancoMysqli();
$objetivo = verificaObjetivo($user->ID); 


if(isset($_GET['p'])){
	$p = $_GET['p'];	
	
}else{
	$p = "inicio";
	if(verificaSegunda($objetivo['id'],retornaSemana($user->ID))== TRUE){
		$p= "insere";
	}	
}


?>
     <?php 
	  switch ($p){
	  case "inicio":
	  
	  ?>
      <div class="container">
		  <?php include '../inc/fixed-navbar-user.php'; ?>
      	<?php include '../inc/menu-principal.php'; ?>
        <div class="jumbotron">
        <h1>Desafios</h1>
	  	<p><?php if(isset($mensagem)){echo $mensagem;} ?></p>
        <?php
		$objetivo = verificaObjetivo($user->ID); 
		// Mensagem inicial
		if($objetivo == 0){ // verifica objetivo?>
			<p class="lead">Para liberar a escolha dos desafios, precisamos que você nos diga qual objetivo você quer alcançar com este treinamento.</p>
			<p class="lead">Fizemos um vídeo explicativo para te ajudar a definir este objetivo. <a href="index.php">Quero assistir!</a></p>
	        <p><a class="btn btn-lg btn-success" href="objetivo.php?p=insere" role="button">Inserir um objetivo</a></p>
  <?php }else{
			$obj = 	ultObj($user->ID);
			if($obj['nivel'] == 0){ // o treinador ainda não avaliou o nível
		?>
				<p class="lead">O seu treinador ainda não avaliou o seu objetivo.</p>
				<p class="lead">É importante que o seu treinador avalie seu objetivo antes de iniciar, para que a escolha dos níveis dos desafios seja apropriada.</p>
				<p class="lead">Assim que ele classificar o seu objetivo, você poderá escolher os desafios.</p>
				<p class="lead">Não se preocupe, ele não vai demorar para fazer esta avaliação! =)</p>
        
        <?php
			}else{ // o treinador avaliou o nível
		?> 
		<?php 
				if($obj['data_inicio'] == '0000-00-00'){		
		?>
					<p class="lead">O seu treinador avaliou o seu objetivo <strong> "<?php echo $obj['objetivo'] ?>"</strong> como de nível <strong><?php echo $obj['nivel']; ?></strong><a href="http://ialtaperformance.com/downloads/baixar.php?arquivo=7-niveis-profissionais-pessoais.png"></a></p>
					
					<p class="lead">O seu treinamento irá iniciar na segunda-feira seguinte que você escolheu o seu primeiro desafio.</p>
					
					<p class="lead">Uma vez que o treinamento é iniciado, as datas não poderão ser alteradas.</p>
					
					<p class="lead">Será um total de 10 fases, com duração aproximada de 4 meses.</p>
					<p class="lead">[INSERIR VIDEO DA IMPORTANCIA DOS DESAFIOS...]</p>
					
					<p class="lead">Nessa fase inicial, você deve pegar um desafio de nível 1:</p>
                     <form action="desafio.php?p=insere_options" method="post">
                    <?php geraDesafios(1); ?>
   
	    	<input type="hidden" value="1" name="insere">
    	<input type="submit" class="btn btn-lg btn-success" value="Salvar">
		</form>	
	   	<?php  }else{ //caso já tenho inicio, lista as semanas 
				$des = retornaSemanas($obj['data_inicio']); ?>
  	 	<p class="lead">O seu treinador avaliou o seu desafio <strong> "<?php echo $obj['objetivo'] ?>"</strong> como de nível <strong><?php echo $obj['nivel']; ?></strong></p>    
   		<p class="lead">O seu treinamento vai de <strong> <?php echo exibirDataBr($des[1]['inicio']) ?>  a <?php echo exibirDataBr($des[16]['fim']) ?> </strong></p>     
   		<p class="lead">Serão 16 semanas com 10 fases.</p>
        <p class="lead">Você está na fase <b><?php $fase_atual = verificaFase($obj['id']); echo $fase_atual; ?> </b>. Veja abaixo os desafios da fase <?php  $fase_mostra = $fase_atual + 1; echo $fase_mostra; ?> </p>    
<?php         
switch($fase_atual){
	case 0: //vai para fase 1
		listaDesafios(1);
	break;

	case 1: //vai para fase 2
		listaDesafios(1);
		listaDesafios($objetivo['nivel']);
	break;

	case 2: //vai para fase 3
		listaDesafios($objetivo['nivel']);
		listaDesafios($objetivo['nivel'] - 1);

	break;
	case 3: //vai para fase 4

		listaDesafios($objetivo['nivel']);
		if($objetivo['nivel'] == 1){
			listaDesafios(7);
		}else{
			listaDesafios($objetivo['nivel'] - 1);
		}
		if($objetivo['nivel'] == 7){
			listaDesafios(1);
		}else{
			listaDesafios($objetivo['nivel'] + 1);
		}
	break;

	case 4: //vai para fase 5
		listaDesafios($objetivo['nivel']);
		if($objetivo['nivel'] == 1){
			listaDesafios(7);
		}else{
			listaDesafios($objetivo['nivel'] - 1);
		}
		if($objetivo['nivel'] == 7){
			listaDesafios(1);
		}else{
			listaDesafios($objetivo['nivel'] + 1);
		}
	break;
	case 5: //vai para fase 6
		for($i = 1; $i <= 7; $i++){
			listaDesafios($i);
		}
	break;
	case 6: //vai para fase 7
		for($i = 1; $i <= 7; $i++){
			listaDesafios($i);
		}
	break;
	case 7: //vai para fase 8
		for($i = 1; $i <= 7; $i++){
			listaDesafios($i);
		}
	break;
	case 8: //vai para fase 9
		for($i = 1; $i <= 7; $i++){
			listaDesafios($i);
		}
	break;
	case 9: //vai para fase 10
		for($i = 1; $i <= 7; $i++){
			listaDesafios($i);
		}
	break;

}                 
?>
		<?php } // fim da condicao?>

		<?php 
		} // não tem objetivo válido no sistema
		?>
        
		
        <?php } ?>

      </div>
      

<?php break; 
 case "insere":
if(isset($_GET['nivel'])){
	$objetivo['nivel'] = $_GET['nivel'];
}else{
	$objetivo = verificaObjetivo($user->ID); 
	
}


if(isset($_GET['fase'])){
	$fase = $_GET['fase'];
}else{
	$fase = verificaFase($objetivo['id']);
}
echo $objetivo['nivel']." - ".$fase;
$checados = matrizDesafios($objetivo['id'],$fase);
		$obj = 	ultObj($user->ID);

 ?>

    <div class="container">
 		  <?php include '../inc/fixed-navbar-user.php'; ?>
      	<?php include '../inc/menu-principal.php'; ?>
        <div class="jumbotron">
        <h1>Desafios</h1>
	  	<p><?php if(isset($mensagem)){echo $mensagem;} ?></p>
			<?php	$des = retornaSemanas($obj['data_inicio']); ?>
  	 	<p class="lead">O seu treinador avaliou o seu desafio <strong> "<?php echo $obj['objetivo'] ?>"</strong> como de nível <strong><?php echo $obj['nivel']; ?></strong></p>    
   		<p class="lead">O seu treinamento vai de <strong> <?php echo exibirDataBr($des[1]['inicio']) ?>  a <?php echo exibirDataBr($des[16]['fim']) ?> </strong></p>     
   		<p class="lead">Serão 16 semanas com 10 fases.</p>
        <p class="lead">Você está na fase <b><?php $fase_atual = verificaFase($obj['id']); echo $fase_atual; ?> </b>.  </p>   
 <form action="desafio.php?p=insere_options" method="post">

<?php 
switch($fase){
	case 0: //vai para fase 1
		geraDesafios(1);
	break;

	case 1: //vai para fase 2
		geraDesafios(1,$checados);
		geraDesafios($objetivo['nivel'],$checados);
	break;

	case 2: //vai para fase 3
		geraDesafios($objetivo['nivel'],$checados);
		geraDesafios($objetivo['nivel'] - 1,$checados);

	break;
	case 3: //vai para fase 4

		geraDesafios($objetivo['nivel'],$checados);
		if($objetivo['nivel'] == 1){
			geraDesafios(7,$checados);
		}else{
			geraDesafios($objetivo['nivel'] - 1,$checados);
		}
		if($objetivo['nivel'] == 7){
			geraDesafios(1,$checados);
		}else{
			geraDesafios($objetivo['nivel'] + 1,$checados);
		}
	break;

	case 4: //vai para fase 5
		geraDesafios($objetivo['nivel'],$checados);
		if($objetivo['nivel'] == 1){
			geraDesafios(7,$checados);
		}else{
			geraDesafios($objetivo['nivel'] - 1,$checados);
		}
		if($objetivo['nivel'] == 7){
			geraDesafios(1,$checados);
		}else{
			geraDesafios($objetivo['nivel'] + 1,$checados);
		}
	break;
	case 5: //vai para fase 6
		for($i = 1; $i <= 7; $i++){
			geraDesafios($i,$checados);
		}
	break;
	case 6: //vai para fase 7
		for($i = 1; $i <= 7; $i++){
			geraDesafios($i,$checados);
		}
	break;
	case 7: //vai para fase 8
		for($i = 1; $i <= 7; $i++){
			geraDesafios($i,$checados);
		}
	break;
	case 8: //vai para fase 9
		for($i = 1; $i <= 7; $i++){
			geraDesafios($i,$checados);
		}
	break;
	case 9: //vai para fase 10
		for($i = 1; $i <= 7; $i++){
			geraDesafios($i,$checados);
		}
	break;

}
?>

	<input type="hidden" value="1" name="insere">
    	<input type="submit" class="btn btn-lg btn-success" value="Salvar">
		</form>	
			
</div>
<?php 
break;
case "insere_options":
$objetivo = verificaObjetivo($user->ID); 
$datas = retornaSemanas($objetivo['data_inicio']);
$mensagem = "";
if(isset($_POST['insere'])){ //insere
	$i = 0;
	$caixa = array();
	foreach($_POST as $x => $valor){
		if(!preg_match('/[^0-9]/',$x)){ //verifica se é um número
			array_push($caixa, $x);
		}
	}
	$objetivo = verificaObjetivo($user->ID); 
	$fase = verificaFase($objetivo['id']);
	$prox = $fase + 1;
	echo $prox;
	//$verifica = desFas($objetivo['id'],$caixa,$prox);
	$verifica = desFas($objetivo['id'],$caixa,$prox);
	if($verifica['bool_des'] == 1){ //se passar pela verificação, gravar a tabela aceite
		for($i = 0; $i < count($caixa); $i++){
			$data_inicio = nextMonday($hoje);
			$sql_insere = "INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`, `data_final`, `duracao`, `semana`, `fase`, `relatorio`, `resposta`, `intesidade`, `frequencia` ) VALUES (NULL, '".$objetivo['id']."', '".$caixa[$i]."','$hoje', '$data_inicio', '', '', '', '".$prox."', '', '', '', '')";			
			$query_insere = mysqli_query($con,$sql_insere);
			if($query_insere){
				$des = recuperaDados("iap_desafio",$caixa[$i],"id");
				$mensagem .= "Desafio <b>".$des['titulo']."</b> inserido com sucesso.<br />";
				if($prox == 1){ // atualiza a tabela objetivo
					$sql_obj = "UPDATE iap_objetivo SET data_inicio = '$hoje' WHERE id = '".$objetivo['id']."'";
					$query_obj = mysqli_query($con,$sql_obj);
					if($query_obj){
						$mensagem .= "Objetivo atualizado.<br />";	
					}else{
						$mensagem .= "Erro ao atualizar objetivo.<br />";	
					}
				}	
			}else{
				$mensagem .= "Erro ao inserir.<br />";	
				
			}
		}

	}else{
		$mensagem = $verifica['err_men']."<br /> <a href = 'desafio.php?p=insere'>Tente novamente. </a>";	
	}
}
?>
    <div class="container">
      	<?php include '../inc/menu-principal.php'; ?>
        <div class="jumbotron">
        <h1>Desafios</h1>
	  	<p><?php if(isset($mensagem)){echo $mensagem;} ?></p>
      	<p>
        
        
        
        </p>  
 <form action="relatorios.php" method="post">
<?php 
			$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '".$datas[$i]['fase']."' AND objetivo = '".$objetivo['id']."'";
			$query_lista = mysqli_query($con,$sql_lista);
			$num = mysqli_num_rows($query_lista);
			if($num > 0){
?>

		<?php 
		
			while($x = mysqli_fetch_array($query_lista)){ 
				$desafio = recuperaDados("iap_desafio",$x['desafio'],"id");
			?>
                      <table class="table table-striped">
                                  <tbody>

  <tr>
    <td colspan="7"><?php echo $desafio['titulo']; ?> - Nível: <?php echo $desafio['nivel']; ?> - <?php echo recTermo($desafio['yy']); ?></td>
  </tr>
  <tr>
    <td colspan="3">Foco</td>
    <td colspan="4">Corpo</td>
  </tr>
  <tr>
    <td><input type="checkbox" name="ter_<?php echo $x['id']; ?>"> Ter</td>
    <td><input type="checkbox" name="fazer_<?php echo $x['id']; ?>"> Fazer</td>
    <td><input type="checkbox" name="ser_<?php echo $x['id']; ?>"> Ser</td>
    <td><input type="checkbox" name="fisico_<?php echo $x['id']; ?>"> Físico</td>
    <td><input type="checkbox" name="emocional_<?php echo $x['id']; ?>"> Emocional</td>
    <td><input type="checkbox" name="mental_<?php echo $x['id']; ?>"> Mental</td>
    <td><input type="checkbox" name="espiritual_<?php echo $x['id']; ?>"> Espiritual</td>
  </tr>

			 <?php } ?>
	    </tbody>
          </table>
    </div>
    	<input type="hidden" value="1" name="insere">
    	<input type="submit" class="btn btn-lg btn-success" value="Salvar">
    <?php } //finaliza o if($num)?>
    



</form>

<?php
break;

?>



<?php break; ?>
<?php } ?>

<?php include '../inc/footer.php'; ?>


