<?php $page_title = "iAP | Desafios"; ?>
<?php include '../inc/header.php'; ?>

<?php //criar sessão de segurança
	//session_start();
	//include "../inc/functions.php";

	if (isset($_GET['data'])) {
		$hoje = $_GET['data'];
	}

	$con = bancoMysqli();
	$objetivo = verificaObjetivo($user -> ID);

	if (isset($_GET['p'])) {
		$p = $_GET['p'];

	} else {
		$p = "inicio";
		if (verificaSegunda($objetivo['id'], retornaSemana($user -> ID)) == TRUE) {
			$p = "insere";
		}
	}
?>
     <?php 
	  switch ($p){
	  case "inicio":
	  
	  ?>
      <div class="container">
		  <?php
		include '../inc/fixed-navbar-user.php';
 ?>
      	<?php
			include '../inc/menu-principal.php';
 ?>
        <div class="jumbotron">
        <h1>Desafios</h1>
	  	<p><?php
			if (isset($mensagem)) {echo $mensagem;
			}
 ?></p>
        <?php
		$objetivo = verificaObjetivo($user->ID); 
		// Mensagem inicial
		if($objetivo == 0){ // verifica objetivo?>
			<p class="lead">Para liberar a escolha dos desafios, precisamos que você nos diga qual objetivo você quer alcançar com este treinamento.</p>
			<p class="lead">Fizemos um vídeo explicativo para te ajudar a definir este objetivo.</p>
			<p class="lead"><a href="objetivo.php">Assistir vídeo!</a></p>
	        <p><a class="btn btn-lg btn-success" href="objetivo.php" role="button">Definir objetivo</a></p>
  <?php }else{
				$obj = 	ultObj($user->ID);
				if($obj['nivel'] == 0){ // o treinador ainda não avaliou o nível
		?>
				<p class="lead">O seu treinador ainda não avaliou o seu objetivo.</p>
				<p class="lead">É importante que o seu treinador avalie seu objetivo antes de iniciar, para que a escolha dos níveis dos desafios seja apropriada.</p>
				<p class="lead">Assim que ele classificar o seu objetivo, você poderá escolher os desafios.</p>
				<p class="lead">Não se preocupe, ele não vai demorar para fazer esta avaliação! =)</p>
        
        <?php }else{ // o treinador avaliou o nível ?> 
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
    	<input type="submit" class="btn btn-lg btn-success" value="Próximo">
		</form>	
	   	<?php }else{ //caso já tenho inicio, lista as semanas
			$des = retornaSemanas($obj['data_inicio']);
 ?>
  	 	<p class="lead">O seu treinador avaliou o seu objetivo <strong> "<?php echo $obj['objetivo'] ?>"</strong> como de nível <strong><?php echo $obj['nivel']; ?></strong>.</p>
  	 	<p class="lead"><a href="http://ialtaperformance.com/downloads/baixar.php?arquivo=7-niveis-profissionais-pessoais.png"> Baixar explicação dos níveis.</a></p>
  	 	<p class="lead">
  	 		
  	 		Agora voce está na <strong>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?> </strong>do seu treinamento, e abaixo estão os seus desafios dessa fase:</p>
  	 		
  	 		<p> <?php
				if (isset($mensagem)) { echo $mensagem;
				}
				$datas = retornaSemanas($objetivo['data_inicio']);
  	 			?></p>
		
        <?php //var_dump($datas); ?>
    
    
	<?php 
	$sem = retornaSemana($obj['id']);
	//echo "$sem";
	for($i = 1; $i <= $sem; $i++){ ?>
  
  

<div id="box-toggle">
	<hr>
   
   <!--<h3>Semana <?php echo $i; ?>--> 
 	
 	
 	
 	<h3>
  	Fase:  <?php echo $datas[$i]['fase']; ?> (<?php echo exibirDataBr($datas[$i]['inicio']) ?>  a <?php echo exibirDataBr($datas[$i]['fim']) ?>)   
  	</h3> 
  	
<div class="tgl">
 

  	
<?php 
			$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '".$datas[$i]['fase']."' AND objetivo = '".$objetivo['id']."'";
			$query_lista = mysqli_query($con,$sql_lista);
			$num = mysqli_num_rows($query_lista);
			if($num > 0){
?>
		
        <div class="table-responsive" >
        	
          <table class="table table-striped" style="text-align: left;">
          	
            <thead>
              <!--
              <tr>
                <th>Desafio</th>
                <th>Nível</th>
                <th>Ying/Yang</th>
              </tr>
              
              <tr>
                <th>Ter</th>
                <th>Fazer</th>
                <th>Ser</th>
                <th>Fis</th>
                <th>Emo</th>
                <th>Men</th>
                <th>Esp</th>
              </tr>-->
            </thead>
            <tbody>
            	
            	
			<?php 
						
			while($x = mysqli_fetch_array($query_lista)){ 
				$desafio = recuperaDados("iap_desafio",$x['desafio'],"id");
			?>
            <tr>                
                <td colspan="2">
                	<?php echo "<strong>Desafio:</strong><br /> " . $desafio['titulo'] . "(Nível " . $desafio['nivel'] . " - " . recTermo($desafio['yy']) . ")"; ?>
                </td>
                <td>
                	<?php echo "<strong>Foco: </strong><br />Ter: <strong style=\"color: #56C4F1;\">(" . marcaX($x['ter']) . ")&nbsp;&nbsp;&nbsp;</strong>Ser: <strong style=\"color: #56C4F1;\">(" . marcaX($x['ser']) . ")</strong>&nbsp;&nbsp;&nbsp;Fazer: <strong style=\"color: #56C4F1;\">(" . marcaX($x['fazer']) . ")</strong>"; ?>
                </td>
                <td>
                	<?php echo "<strong>Corpos: </strong><br />Físico: <strong style=\"color: #56C4F1;\">(" . marcaX($x['fisico']) . ")&nbsp;&nbsp;&nbsp;</strong>Emocional: <strong style=\"color: #56C4F1;\">(" . marcaX($x['emocional']) . ")&nbsp;&nbsp;&nbsp;</strong>Mental: <strong style=\"color: #56C4F1;\">(" . marcaX($x['mental']) . ")</strong>&nbsp;&nbsp;&nbsp;Espiritual: <strong style=\"color: #56C4F1;\">(" . marcaX($x['espiritual']) . ")</strong>"; ?>
                </td>
            </tr>
            
            <tr>               
                <td><strong>Dúvidas?</strong><br /></td>
                <td><strong>Frequência:</strong> <br /><?php echo $x['frequencia']; ?> </td>
      			<td><strong>Intensidade:</strong> <br /><?php echo $x['intesidade']; ?> </td>
      			<td><strong>Âncora/Lembrete</strong><br /></td>
                
           </tr>
       
			<tr><td colspan="4" style="background-color: #d7e2ef;">&nbsp;</td></tr>      
			 <?php } //while
				} //if
			  ?>
                             

	    </tbody>
          </table>
          </div>
          </div><hr>
          <?php } //for ?>
          
          </div>
            	 		
   		<!--<p class="lead">O seu treinamento terminará em <strong> <?php echo exibirDataBr($des[1]['inicio']) ?>  a <?php echo exibirDataBr($des[16]['fim']) ?> </strong>.</p>-->     
   		<!--<p class="lead">Serão 16 semanas com 10 fases.</p>-->
   		
   		
   		
   		<?php
		switch ($fase_atual) {
			case '0' :?>
				<p class="lead">Para iniciar o seu treinamento, você deve escolher um desafio de Nível 1.</p>
				<?php
					break;

					case '1' :
				?>
				 <p class="lead" style="margin-top:3%;">Hoje você está na Fase <b><?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?> </b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>manter o seu desafio inicial de Nível 1</strong>, e ainda escolher um novo desafio do nível do seu objetivo <em>(<?php echo $objetivo . $objetivo['nivel'] ?>)</em>.</p> 
				 	<p class="lead">O seu total de desafios para essa próxima fase será 2.</p>
				 <p class="lead">
				 Abaixo estão listados os desafios do nível do seu objetivo. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '2' :
			?>
			
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>parar com um dos desafios que estava</strong>, e ainda escolher <strong>DOIS NOVOS</strong> desafios, sendo um do nível do seu objetivo <em>(<?php echo $objetivo['objetivo'] . ", " . "Nível: " . $objetivo['nivel'] ?>)</em> e um do nível abaixo do seu objetivo <em>(nível <?php echo $objetivo['nivel'] - 1; ?>)</em>.</p> 
				 	<p class="lead">O seu total de desafios para essa próxima fase será 3.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
			
				<?php
				break;

				case '3' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PARAR com UM dos desafios que estava</strong>, deve MANTER DOIS desafios, e ainda escolher <strong>DOIS NOVOS</strong> desafios, sendo um do nível do seu objetivo <em>(<?php echo $objetivo['objetivo'] . ", " . "Nível: " . $objetivo['nivel'] ?>)</em>, um do nível abaixo do seu objetivo <em>(nível <?php echo $objetivo['nivel'] - 1; ?>)</em> e um do nível acima do seu objetivo <em>(nível <?php echo $objetivo['nivel'] + 1; ?>)</em>. </p>
				 	<p class="lead">O seu total de desafios para essa próxima fase será 5.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '4' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PARAR com DOIS dos desafios que estava</strong>, deve MANTER TRÊS desafios, e ainda escolher <strong>CINCO NOVOS</strong> desafios, sendo pelo menos um do nível do seu objetivo <em>(<?php echo $objetivo['objetivo'] . ", " . "Nível: " . $objetivo['nivel'] ?>)</em>, pelo menos um do nível abaixo do seu objetivo <em>(nível <?php echo $objetivo['nivel'] - 1; ?>)</em> e pelo menos um do nível acima do seu objetivo <em>(nível <?php echo $objetivo['nivel'] + 1; ?>)</em>.</p> 
				 	<p class="lead">O seu total de desafios para essa próxima fase será 8.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '5' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PARAR com TRÊS dos desafios que estava</strong>, deve MANTER CINCO desafios, e ainda escolher <strong>OITO NOVOS</strong> desafios, podendo ser de qualquer nível, desde que tenha pelo menos um de cada nível.</p> 
				 	<p class="lead">O seu total de desafios para essa próxima fase será 13.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '6' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PARAR com CINCO dos desafios que estava</strong>, deve MANTER OITO desafios, e ainda escolher <strong>TREZE NOVOS</strong> desafios, podendo ser de qualquer nível, desde que tenha pelo menos um de cada nível. </p>
				 	<p class="lead">O seu total de desafios para essa próxima fase será 21.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '7' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PARAR com OITO dos desafios que estava</strong>, deve MANTER TREZE desafios, e ainda escolher <strong>VINTE E UM NOVOS</strong> desafios, podendo ser de qualquer nível, desde que tenha pelo menos um ou dois de cada nível.</p> 
				 	<p class="lead">O seu total de desafios para essa próxima fase será 34.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '8' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PEGAR 14 DESAFIOS</strong>.</p>
				 <p class="lead"> É importante que você considere parar com os desafios que se tornaram fáceis para você. Mantenha os que ainda estão desafiadores, e escolha novos desafios tão desafiadores quanto estes.</p>
				 <p class="lead">Você terá 14 desafios nessa próxima fase.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '9' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PEGAR 7 DESAFIOS</strong>.</p>
				 <p class="lead"> À partir de agora, você está pronto para seguir se desafiando por conta própria. Mantenha pelo menos 7 desafios e renove a cada 14 dias.</p>
				 <p class="lead">Fazendo isso, você continuará desfrutando do estilo de vida em Alta Performance.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '10' :
			?>
				<p class="lead">O seu treinamento chegou ao fim. [Mensagem]</p>
				<?php
				break;

				default :
			?>
				<p class="lead">Ops..parece que o sistema buscou uma fase que não existe. Fale com seu treinador pra que ele possa te dar o suporte necessário enquanto a equipe técnica resolve esse probleminha..</p>
				<?php
				break;
				}
		?>
   		
   		
        
<?php
			switch($fase_atual) {
				case 0 :
					//vai para fase 1
					listaDesafios(1);
					break;

				case 1 :
					//vai para fase 2
					//listaDesafios(1);
					listaDesafios($objetivo['nivel']);
					break;

				case 2 :
					//vai para fase 3
					listaDesafios($objetivo['nivel']);
					listaDesafios($objetivo['nivel'] - 1);

					break;
				case 3 :
					//vai para fase 4

					listaDesafios($objetivo['nivel']);
					if ($objetivo['nivel'] == 1) {
						listaDesafios(7);
					} else {
						listaDesafios($objetivo['nivel'] - 1);
					}
					if ($objetivo['nivel'] == 7) {
						listaDesafios(1);
					} else {
						listaDesafios($objetivo['nivel'] + 1);
					}
					break;

				case 4 :
					//vai para fase 5
					listaDesafios($objetivo['nivel']);
					if ($objetivo['nivel'] == 1) {
						listaDesafios(7);
					} else {
						listaDesafios($objetivo['nivel'] - 1);
					}
					if ($objetivo['nivel'] == 7) {
						listaDesafios(1);
					} else {
						listaDesafios($objetivo['nivel'] + 1);
					}
					break;
				case 5 :
					//vai para fase 6
					for ($i = 1; $i <= 7; $i++) {
						listaDesafios($i);
					}
					break;
				case 6 :
					//vai para fase 7
					for ($i = 1; $i <= 7; $i++) {
						listaDesafios($i);
					}
					break;
				case 7 :
					//vai para fase 8
					for ($i = 1; $i <= 7; $i++) {
						listaDesafios($i);
					}
					break;
				case 8 :
					//vai para fase 9
					for ($i = 1; $i <= 7; $i++) {
						listaDesafios($i);
					}
					break;
				case 9 :
					//vai para fase 10
					for ($i = 1; $i <= 7; $i++) {
						listaDesafios($i);
					}
					break;
			}
		?>
		<?php } // fim da condicao ?>

		<?php } // não tem objetivo válido no sistema ?>
        
		
        <?php } ?>

      </div>
      

<?php
	break;
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
	//echo $objetivo['nivel']." - ".$fase;
	$checados = matrizDesafios($objetivo['id'],$fase);
	$obj = 	ultObj($user->ID);
 ?>

    <div class="container">
 		<?php
		include '../inc/fixed-navbar-user.php';
 ?>
      	<?php
			include '../inc/menu-principal.php';
 ?>
        <div class="jumbotron">
        <h1>Desafios</h1>
	  	<p><?php
			if (isset($mensagem)) {echo $mensagem;
			}
 ?></p>
			<?php	$des = retornaSemanas($obj['data_inicio']); ?>
  	 	<p class="lead">O seu treinador avaliou o seu desafio <strong> "<?php echo $obj['objetivo'] ?>"</strong> como de nível <strong><?php echo $obj['nivel']; ?></strong>.</p>    
   		<p class="lead">O seu treinamento vai de <strong> <?php echo exibirDataBr($des[1]['inicio']) ?>  a <?php echo exibirDataBr($des[16]['fim']) ?> </strong></p>     
   		<!--<p class="lead">Serão 16 semanas com 10 fases.</p>-->
        <?php
        $fase_atual = verificaFase($obj['id']);
		switch ($fase_atual) {
			case '0' :?>
				<p class="lead">Para iniciar o seu treinamento, você deve escolher um desafio de Nível 1.</p>
				<?php
					break;

					case '1' :
				?>
				 <p class="lead" style="margin-top:3%;">Hoje você está na Fase <b><?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?> </b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>manter o seu desafio inicial de Nível 1</strong>, e ainda escolher um novo desafio do nível do seu objetivo <em>(<?php echo $objetivo . $objetivo['nivel'] ?>)</em>.</p> 
				 	<p class="lead">O seu total de desafios para essa próxima fase será 2.</p>
				 <p class="lead">
				 Abaixo estão listados os desafios do nível do seu objetivo. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '2' :
			?>
			
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>parar com um dos desafios que estava</strong>, e ainda escolher <strong>DOIS NOVOS</strong> desafios, sendo um do nível do seu objetivo <em>(<?php echo $objetivo['objetivo'] . ", " . "Nível: " . $objetivo['nivel'] ?>)</em> e um do nível abaixo do seu objetivo <em>(nível <?php echo $objetivo['nivel'] - 1; ?>)</em>.</p> 
				 	<p class="lead">O seu total de desafios para essa próxima fase será 3.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
			
				<?php
				break;

				case '3' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PARAR com UM dos desafios que estava</strong>, deve MANTER DOIS desafios, e ainda escolher <strong>DOIS NOVOS</strong> desafios, sendo um do nível do seu objetivo <em>(<?php echo $objetivo['objetivo'] . ", " . "Nível: " . $objetivo['nivel'] ?>)</em>, um do nível abaixo do seu objetivo <em>(nível <?php echo $objetivo['nivel'] - 1; ?>)</em> e um do nível acima do seu objetivo <em>(nível <?php echo $objetivo['nivel'] + 1; ?>)</em>. </p>
				 	<p class="lead">O seu total de desafios para essa próxima fase será 5.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '4' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PARAR com DOIS dos desafios que estava</strong>, deve MANTER TRÊS desafios, e ainda escolher <strong>CINCO NOVOS</strong> desafios, sendo pelo menos um do nível do seu objetivo <em>(<?php echo $objetivo['objetivo'] . ", " . "Nível: " . $objetivo['nivel'] ?>)</em>, pelo menos um do nível abaixo do seu objetivo <em>(nível <?php echo $objetivo['nivel'] - 1; ?>)</em> e pelo menos um do nível acima do seu objetivo <em>(nível <?php echo $objetivo['nivel'] + 1; ?>)</em>.</p> 
				 	<p class="lead">O seu total de desafios para essa próxima fase será 8.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '5' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PARAR com TRÊS dos desafios que estava</strong>, deve MANTER CINCO desafios, e ainda escolher <strong>OITO NOVOS</strong> desafios, podendo ser de qualquer nível, desde que tenha pelo menos um de cada nível.</p> 
				 	<p class="lead">O seu total de desafios para essa próxima fase será 13.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '6' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PARAR com CINCO dos desafios que estava</strong>, deve MANTER OITO desafios, e ainda escolher <strong>TREZE NOVOS</strong> desafios, podendo ser de qualquer nível, desde que tenha pelo menos um de cada nível. </p>
				 	<p class="lead">O seu total de desafios para essa próxima fase será 21.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '7' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PARAR com OITO dos desafios que estava</strong>, deve MANTER TREZE desafios, e ainda escolher <strong>VINTE E UM NOVOS</strong> desafios, podendo ser de qualquer nível, desde que tenha pelo menos um ou dois de cada nível.</p> 
				 	<p class="lead">O seu total de desafios para essa próxima fase será 34.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '8' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PEGAR 14 DESAFIOS</strong>.</p>
				 <p class="lead"> É importante que você considere parar com os desafios que se tornaram fáceis para você. Mantenha os que ainda estão desafiadores, e escolha novos desafios tão desafiadores quanto estes.</p>
				 <p class="lead">Você terá 14 desafios nessa próxima fase.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '9' :
			?>
				<p class="lead" style="margin-top:3%;">Hoje você está na <b>Fase <?php $fase_atual = verificaFase($obj['id']);
				echo $fase_atual;
 ?></b>.</p>
				 <p class="lead">Para a sua próxima fase (<strong>Fase <?php $fase_mostra = $fase_atual + 1;
					echo $fase_mostra;
 ?></strong>), você deve <strong>PEGAR 7 DESAFIOS</strong>.</p>
				 <p class="lead"> À partir de agora, você está pronto para seguir se desafiando por conta própria. Mantenha pelo menos 7 desafios e renove a cada 14 dias.</p>
				 <p class="lead">Fazendo isso, você continuará desfrutando do estilo de vida em Alta Performance.</p>
				 <p class="lead">
				 Veja abaixo a lista de desafios. Você ainda não pode marcá-los, mas já pode visualizá-los.</p>
				<?php
				break;

				case '10' :
			?>
				<p class="lead">O seu treinamento chegou ao fim. [Mensagem]</p>
				<?php
				break;

				default :
			?>
				<p class="lead">Ops..parece que o sistema buscou uma fase que não existe. Fale com seu treinador pra que ele possa te dar o suporte necessário enquanto a equipe técnica resolve esse probleminha..</p>
				<?php
				break;
				}
		?>   
 <form action="desafio.php?p=insere_options" method="post">

<?php
	switch($fase) {
		case 0 :
			//vai para fase 1
			geraDesafios(1);
			break;

		case 1 :
			//vai para fase 2
			geraDesafios(1, $checados);
			geraDesafios($objetivo['nivel'], $checados);
			break;

		case 2 :
			//vai para fase 3
			geraDesafios($objetivo['nivel'], $checados);
			geraDesafios($objetivo['nivel'] - 1, $checados);

			break;
		case 3 :
			//vai para fase 4

			geraDesafios($objetivo['nivel'], $checados);
			if ($objetivo['nivel'] == 1) {
				geraDesafios(7, $checados);
			} else {
				geraDesafios($objetivo['nivel'] - 1, $checados);
			}
			if ($objetivo['nivel'] == 7) {
				geraDesafios(1, $checados);
			} else {
				geraDesafios($objetivo['nivel'] + 1, $checados);
			}
			break;

		case 4 :
			//vai para fase 5
			geraDesafios($objetivo['nivel'], $checados);
			if ($objetivo['nivel'] == 1) {
				geraDesafios(7, $checados);
			} else {
				geraDesafios($objetivo['nivel'] - 1, $checados);
			}
			if ($objetivo['nivel'] == 7) {
				geraDesafios(1, $checados);
			} else {
				geraDesafios($objetivo['nivel'] + 1, $checados);
			}
			break;
		case 5 :
			//vai para fase 6
			for ($i = 1; $i <= 7; $i++) {
				geraDesafios($i, $checados);
			}
			break;
		case 6 :
			//vai para fase 7
			for ($i = 1; $i <= 7; $i++) {
				geraDesafios($i, $checados);
			}
			break;
		case 7 :
			//vai para fase 8
			for ($i = 1; $i <= 7; $i++) {
				geraDesafios($i, $checados);
			}
			break;
		case 8 :
			//vai para fase 9
			for ($i = 1; $i <= 7; $i++) {
				geraDesafios($i, $checados);
			}
			break;
		case 9 :
			//vai para fase 10
			for ($i = 1; $i <= 7; $i++) {
				geraDesafios($i, $checados);
			}
			break;
	}
?>

	<input type="hidden" value="1" name="insere">
    	<input type="submit" class="btn btn-lg btn-success" value="Próximo >>">
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

	//$verifica = desFas($objetivo['id'],$caixa,$prox);
	$verifica = desFas($objetivo['id'],$caixa,$prox);
	if($verifica['bool_des'] == 1){ //se passar pela verificação, gravar a tabela aceite
	for($i = 0; $i < count($caixa); $i++){
	$data_inicio = nextMonday($hoje);
	$sql_insere = "INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intesidade`, `frequencia` ) VALUES (NULL, '".$objetivo['id']."', '".$caixa[$i]."','$hoje', '$data_inicio',  '".$prox."', '', '', '', '')";
	$query_insere = mysqli_query($con,$sql_insere);
	if($query_insere){
	$des = recuperaDados("iap_desafio",$caixa[$i],"id");
	$mensagem .= "Desafio <b>".$des['titulo']."</b> inserido com sucesso.<br />";
	if($prox == 1){ // atualiza a tabela objetivo
	$sql_obj = "UPDATE iap_objetivo SET data_inicio = '$hoje' WHERE id = '".$objetivo['id']."'";
	$query_obj = mysqli_query($con,$sql_obj);
	if($query_obj){
	$mensagem .= " ";
	}else{
	$mensagem .= "Erro ao atualizar objetivo.<br />";
	}
	}
	}else{
	$mensagem .= "Erro ao inserir.<br />".$sql_insere;

	}
	}

	}else{
	$mensagem = $verifica['err_men']."<br /> <a href = 'desafio.php?p=insere'>Tente novamente. </a>";
	}
	}
?>
    <div class="container">
    	<?php
		include '../inc/fixed-navbar-user.php';
 ?>
      	<?php
			include '../inc/menu-principal.php';
 ?>
        <div class="jumbotron">
        <h1>Desafios</h1>
	  	<p><?php
			if (isset($mensagem)) {echo $mensagem;
			}
 ?></p>
      	<p>
        
        
        
        </p>  
 <form action="relatorios.php" method="post">
<?php 
		if($verifica['bool_des'] == 1){		
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
  <tr>
      <td colspan="4">Frequencia</td>
      <td colspan="7">Intensidade</td>
  
  </tr>
  <tr>
     <td colspan="4"><input type="text" name="frequencia_<?php echo $x['id']; ?>" /></td>
      <td colspan="7"><input type="text" name="intesidade_<?php echo $x['id']; ?>" /></td>
  
  </tr>
  

			 <?php } ?>
	    </tbody>
          </table>
    </div>
    	<input type="hidden" value="1" name="insere">
    	<input type="submit" class="btn btn-lg btn-success" value="Salvar">
        <?php } ?>
    <?php } //finaliza o if($num) ?>
    



</form>

<?php
break;
?>



<?php
	break;
 ?>
<?php } ?>

<?php
	include '../inc/footer.php';
 ?>


