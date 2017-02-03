<?php include '../inc/header.php'; ?>

<?php 

//criar sessão de segurança
//session_start();
//include "../inc/functions.php";

if(isset($_GET['data'])){
	$hoje = $_GET['data'];	
}

$con = bancoMysqli();

if(isset($_GET['p'])){
	$p = $_GET['p'];	
}else{
	$p = "inicio";	
}

?>
     <?php 
	  switch ($p){
	  case "inicio":
	  
	  ?>
      <div class="container">
      	<?php include '../inc/menu-principal.php'; ?>
        <div class="jumbotron">
        <h1>Desafios</h1>
	  	<p><?php if(isset($mensagem)){echo $mensagem;} ?></p>
        <?php
		$objetivo = verificaObjetivo($user->ID); 
		// Mensagem inicial
		if($objetivo == 0){ // verifica objetivo?>
			<p class="lead">Você não tem nenhum objetivo inserido no sistema. Insira um!</p>
	        <p><a class="btn btn-lg btn-success" href="?p=insere" role="button">Inserir um objetivo</a></p>
  <?php }else{
			$obj = 	ultObj($user->ID);
			if($obj['nivel'] == 0){ // o treinador ainda não avaliou o nível
		?>
				<p class="lead">O seu treinador ainda não avaliou o seu objetivo...</p>
				<p class="lead">Assim que ele classificar o seu objetivo, você poderá escolher os desafios.</p>
        
        <?php
			}else{ // o treinador avaliou o nível
		?> 
		<?php 
				if($obj['data_inicio'] == '0000-00-00'){		
		?>
					<p class="lead">O seu treinador avaliou o seu desafio <strong> "<?php echo $obj['objetivo'] ?>"</strong> como de nível <strong><?php echo $obj['nivel']; ?></strong></p>
					<p class="lead">Na tabela abaixo, escolha 1 desafio para começar o programa.</p>
                     <form action="relatorios.php" method="post">
                    <?php geraDesafios(1); ?>
   
	    	<input type="hidden" value="1" name="insere">
    	<input type="submit" class="btn btn-lg btn-success" value="Salvar">
		</form>	
	   	<?php  }else{ //caso já tenho inicio, lista as semanas 
				$des = retornaSemanas($obj['data_inicio']); ?>
  	 	<p class="lead">O seu treinador avaliou o seu desafio <strong> "<?php echo $obj['objetivo'] ?>"</strong> como de nível <strong><?php echo $obj['nivel']; ?></strong></p>    
   		<p class="lead">O seu treinamento vai de <strong> <?php echo exibirDataBr($des[1]['inicio']) ?>  a <?php echo exibirDataBr($des[16]['fim']) ?> </strong></p>     
   		<p class="lead">Serão 16 semanas com 10 fases.</p>
        <p class="lead">Você está na fase <b><?php $fase_atual = verificaFase($obj['id']); echo $fase_atual; ?> </b>. Veja abaixo os desafios da fase <?php  $fase = $fase_atual + 1; echo $fase; ?> </p>    
<?php         
switch($fase){
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
echo $fase;
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
switch($fase){
	case 0: //vai para fase 1
		geraDesafios(1);
	break;

	case 1: //vai para fase 2
		geraDesafios(1);
		geraDesafios($objetivo['nivel']);
	break;

	case 2: //vai para fase 3
		geraDesafios($objetivo['nivel']);
		geraDesafios($objetivo['nivel'] - 1);

	break;
	case 3: //vai para fase 4

		geraDesafios($objetivo['nivel']);
		if($objetivo['nivel'] == 1){
			geraDesafios(7);
		}else{
			geraDesafios($objetivo['nivel'] - 1);
		}
		if($objetivo['nivel'] == 7){
			geraDesafios(1);
		}else{
			geraDesafios($objetivo['nivel'] + 1);
		}
	break;

	case 4: //vai para fase 5
		geraDesafios($objetivo['nivel']);
		if($objetivo['nivel'] == 1){
			geraDesafios(7);
		}else{
			geraDesafios($objetivo['nivel'] - 1);
		}
		if($objetivo['nivel'] == 7){
			geraDesafios(1);
		}else{
			geraDesafios($objetivo['nivel'] + 1);
		}
	break;
	case 5: //vai para fase 6
		for($i = 1; $i <= 7; $i++){
			geraDesafios($i);
		}
	break;
	case 6: //vai para fase 7
		for($i = 1; $i <= 7; $i++){
			geraDesafios($i);
		}
	break;
	case 7: //vai para fase 8
		for($i = 1; $i <= 7; $i++){
			geraDesafios($i);
		}
	break;
	case 8: //vai para fase 9
		for($i = 1; $i <= 7; $i++){
			geraDesafios($i);
		}
	break;
	case 9: //vai para fase 10
		for($i = 1; $i <= 7; $i++){
			geraDesafios($i);
		}
	break;

}
?>

	<input type="hidden" value="1" name="insere">
    	<input type="submit" class="btn btn-lg btn-success" value="Salvar">
		</form>	
			
</div>

<?php break; ?>
<?php } ?>

<?php include '../inc/footer.php'; ?>


