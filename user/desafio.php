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
  	 	<p class="lead"><a href="http://ialtaperformance.com/downloads/baixar.php?arquivo=7-niveis-profissionais-pessoais.png"> Clique aqui</a> para entender mais sobre os níveis que nós trabalhamos.</p>
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
	for($i = $sem; $i <= $sem AND $i > 0; $i--){ ?>
  
  

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
      			<td><strong>Intensidade:</strong> <br /><?php echo $x['intensidade']; ?> </td>
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
 ?></strong>), você deve <strong>manter o seu desafio inicial de Nível 1</strong>, e ainda escolher um novo desafio do nível do seu objetivo <em>(<?php echo "lembrando que o seu objetivo é " . $objetivo['objetivo'] . " e o treinador classificou ele como Nível " . $objetivo['nivel'] ?>)</em>.</p> 
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
   		<!--<p class="lead">O seu treinamento iniciará depois que você escolher o seu primeiro desafio. <strong> <?php echo exibirDataBr($des[1]['inicio']) ?>  a <?php echo exibirDataBr($des[16]['fim']) ?> </strong>--></p>     
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
			geraDesafios(1, $checados);
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
	$sql_insere = "INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `data_aceite`, `data_inicio`,  `fase`, `relatorio`, `resposta`, `intensidade`, `frequencia` ) VALUES (NULL, '".$objetivo['id']."', '".$caixa[$i]."','$hoje', '$data_inicio',  '".$prox."', '', '', '', '')";
	$query_insere = mysqli_query($con,$sql_insere);
	if($query_insere){
		gravarLog($sql_insere);
	$des = recuperaDados("iap_desafio",$caixa[$i],"id");
	$mensagem .= "<b>".$des['titulo']."</b><br />";
	if($prox == 1){ // atualiza a tabela objetivo
	$sql_obj = "UPDATE iap_objetivo SET data_inicio = '$hoje' WHERE id = '".$objetivo['id']."'";
	$query_obj = mysqli_query($con,$sql_obj);
	if($query_obj){
	$mensagem .= " ";
		gravarLog($sql_insere);
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
        <p class="lead">Muito bem! Os desafios que você escolheu estão listados abaixo.</p>
        	<p class="lead">
        	Para te ajudar no cumprimento dos desafios é importante você definir qual será o Foco (ser, fazer, ter) da sua Consciência e os Corpos (físico, emocional, mental e espiritual).</p>
        	<p class="lead">
        	A ferramenta principal para desarmar o ego é a disciplina. Para isso, defina qual será a frequência e a intensidade para cada desafio.</p>
        	<p class="lead">
        		Se tiver dúvidas, <a class="lightbox" href="#goofy">clique aqui</a> para ler a explicação detalhada.
        	</p>
	  	<p><?php
			if (isset($mensagem)) {echo $mensagem;
			}
 ?></p>
      	


 <form action="relatorios.php" method="post" onsubmit="return validaCorpos();" name="form_corpos">
<?php 
		if($verifica['bool_des'] == 1){		
			$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '".$datas[$i]['fase']."' AND objetivo = '".$objetivo['id']."'";
			$query_lista = mysqli_query($con,$sql_lista);
			$num = mysqli_num_rows($query_lista);
			if($num > 0){
	

?>

<script>
	function validaCorpos(){
		
		<?php while($y = mysqli_fetch_array($query_lista)){ ?>
			
			
			var ter = document.getElementById("ter_<?php echo $y['id']; ?>");
			var fazer = document.getElementById("fazer_<?php echo $y['id']; ?>");
			var ser = document.getElementById("ser_<?php echo $y['id']; ?>");
			
			var fisico = document.getElementById("fisico_<?php echo $y['id']; ?>");
			var emocional = document.getElementById("emocional_<?php echo $y['id']; ?>");
			var mental = document.getElementById("mental_<?php echo $y['id']; ?>");
			var espiritual = document.getElementById("espiritual_<?php echo $y['id']; ?>");
			
			if(!ter.checked && !fazer.checked && !ser.checked){
				alert('Você precisa definir pelo menos um FOCO para cada desafio');
				return false;
			}
			
			if(!fisico.checked && !emocional.checked && !mental.checked && !espiritual.checked){
				alert('Você precisa definir pelo menos um CORPO para cada desafio');
				return false;
			}
			
			if(form_corpos.frequencia_<?php echo $y['id']; ?>.value == ""){
				alert('Você precisa definir a FREQUÊNCIA para cada desafio');
				return false;
			}
			
			if(form_corpos.intensidade_<?php echo $y['id']; ?>.value == ""){
				alert('Você precisa definir a INTENSIDADE para cada desafio');
				return false;
			}
			
			if(form_corpos.lembrete_<?php echo $y['id']; ?>.value == ""){
				alert('Você precisa definir um LEMBRETE para cada desafio');
				return false;
			}
			
				
		<?php } ?>
	}
	
</script>


		<?php 
			$sql_lista2 = "SELECT * FROM iap_aceite WHERE fase = '".$datas[$i]['fase']."' AND objetivo = '".$objetivo['id']."'";
			$query_lista2 = mysqli_query($con,$sql_lista2);
			while($x = mysqli_fetch_array($query_lista2)){ 
				$desafio = recuperaDados("iap_desafio",$x['desafio'],"id");
			?>		
			
                      <table class="table table-striped" style="text-align: left;">
                                  <tbody>

  <tr>
  	
  	<td>
  		<?php echo "<strong>Desafio:</strong><br />" . $desafio['titulo']; ?> (Nível: <?php echo $desafio['nivel']; ?> - <?php echo recTermo($desafio['yy']); ?>)
  	</td>
  	
  	<td>
  		<strong>Foco: </strong><br /><input id="ter_<?php echo $x['id']; ?>" type="checkbox" name="ter_<?php echo $x['id']; ?>"> Ter&nbsp;&nbsp;&nbsp;<input id="fazer_<?php echo $x['id']; ?>" type="checkbox" name="fazer_<?php echo $x['id']; ?>"> Fazer&nbsp;&nbsp;&nbsp;<input id="ser_<?php echo $x['id']; ?>" type="checkbox" name="ser_<?php echo $x['id']; ?>"> Ser
  	</td>
  	
  	<td colspan="2">
  		<strong>Corpos: </strong><br /><input id="fisico_<?php echo $x['id']; ?>" type="checkbox" name="fisico_<?php echo $x['id']; ?>"> Físico&nbsp;&nbsp;&nbsp;<input id="emocional_<?php echo $x['id']; ?>" type="checkbox" name="emocional_<?php echo $x['id']; ?>"> Emocional&nbsp;&nbsp;&nbsp;<input id="mental_<?php echo $x['id']; ?>" type="checkbox" name="mental_<?php echo $x['id']; ?>">Mental&nbsp;&nbsp;&nbsp;<input id="espiritual_<?php echo $x['id']; ?>" type="checkbox" name="espiritual_<?php echo $x['id']; ?>"> Espiritual
  	</td>  	
  </tr>
  
  <tr>  	
  	<td>
  		<strong>Frequência: </strong><br /><input id="frequencia_<?php echo $x['id']; ?>" class="form-control" type="text" name="frequencia_<?php echo $x['id']; ?>" />
  	</td>
  	<td>
  		<strong>Intensidade: </strong><br /><input id="intensidade_<?php echo $x['id']; ?>" class="form-control" type="text" name="intensidade_<?php echo $x['id']; ?>" />
  	</td>
  	<td>
  		<strong>Âncora/Lembrete: </strong><br /><input id="lembrete_<?php echo $x['id']; ?>" class="form-control" type="text" name="lembrete_<?php echo $x['id']; ?>" />
  	</td>  	
  	<td style="vertical-align: bottom;">
  		

		<a class="lightbox" href="#goofy"> 
			<img src="../assets/img/duvida.png" width="15" />
		</a>
		
		<div class="lightbox-target" id="goofy">
		
<h2>Medição dos Desafios</h2>
Nessa área vamos deixar o autodesafio palpáveis para conseguirmos mensurar o nosso desempenho com o nosso comprometimento.
<br /><br />
<strong>Intensidade</strong> - Nesse bloco você indicará o quão desafiante será o seu autodesafio. O importante é você definir uma intensidade bem específica e que seja desafiadora para você!
<br /><br /> 
Não existe certo ou errado, melhor ou pior, o mais importante é você sair da zona de conforto de forma consciente e que não te leve para a zona de saturação. Só que lembre-se que quanto mais você se desafiar, mais padrões você conseguir identificar, maior a tendência de expansão de consciência.
  <br /><br />

<strong>Frequência</strong> - Aqui você indicará quantas vezes irá realizar o desafio até a próxima fase do treinamento.
<br /><br /> 
Alguns desafios podemos fazer diariamente ou até mais de uma vez por dia, outros somente uma vez durante essa fase do treinamento. O importante é você definir uma frequência que seja possível dentro do seu contexto para realizar os desafios conforme você se comprometeu. 
<br /><br />
<strong>Atenção:</strong> Lembre que o mais importante é mantermos a disciplina com que nos comprometemos. O ego perde espaço com disciplina.
<br /><br />

<h2>Foco</h2>
<br /><br />
Nessa área você irá selecionar o foco da sua consciência. Qual o foco em realizar esse autodesafio? Pode selecionar mais de uma opção se fizer sentido no seu desafio.
<br /><br />
<strong>Ter</strong> - Nessa área o foco é ter, podendo ser algum resultado, conhecimento, experiência ou outros. Também podemos interpretar como deixar de ter. Como exemplo, deixar de ter o conforto do banho quente para observar como vou reagir a esse desconforto. Tanto para ter algo como deixar de ter, nesses casos essa opção é válida.
<br /><br />
<strong>Fazer</strong> - Nessa opção o foco da consciência é fazer algo ou deixar de fazer, como um hábito por exemplo. Como exemplo fazer uma coisa com a mão trocada, deixar de fazer um hábito enraizado. Se a sua intenção com esse desafios for essa, selecione essa opção. 
<br /><br />
<strong>Ser</strong> - O foco em Ser, está relacionado a mudança do Ser. A intenção da sua consciência está em Ser uma pessoa diferente do que você é hoje. Por exemplo quem pegou o desafio de Meditar todos os dias com a intenção de Ser mais calmo, ou de desafiar limites pré-estabelecidos para Ser mais corajoso. Se essa for a sua intenção selecione essa opção.
<br /><br />
<h2>Corpos</h2>
<br /><br />
Todos nós possuimos diferentes corpos que usamos em diferentes experiências. Por exemplo o corpo físico para fazer desafios que necessitam de força física como praticar exercícios. 
<br /><br />
Mas no processo de Alta Performance como uma das formas de expandirmos a consciência, podemos utilizar também do corpo mental para melhorar o desempenho nesses exercícios, por exemplo. 
Nesse sentido para te ajudar com os autodesafios nós separamos em 4 corpos, veja abaixo a explicação de cada um e veja qual deles você irá utilizar na realização dos seus desafios nessa fase. Pode selecionar mais de uma opção.
<br /><br />
<strong>Físico</strong> - Corpo físico propriamente dito, envolve assuntos que vão mexer com suas condições físicas e terrenas, é o nosso corpo mais denso. Se você acredita que esse desafio mexerá fisicamente com você selecione-o para te trazer mais consciência sobre o desafio.
<br /><br />
<strong>Emocional</strong> - Quando você acreditar que um desafio mexerá com as suas emoções, positivamente ou negativamente, selecione essa opção. É importante observar como os autodesafios influenciam as emoções pois muitos dos nossos padrões negativos aparecem nesse corpo. Observe bem como isso acontece com você.
<br /><br />
<strong>Mental</strong> - Com o corpo mental que criamos soluções, materializamos a intuição e criatividade e utilizamos da lógica, esse corpo, se usado de forma íntegra, pode ser bem útil no dia a dia dos desafios, uma vez que com ele é que ativamos a razão para solucionar problemas deixando as emoções de lado. Se fizer sentido no seu desafio selecione esse campo.
<br /><br />
<strong>Espiritual</strong> - O corpo espiritual é o mais sutil de todos, dizemos que é a nossa conexão com algo maior e onde vive a nossa intuição. Veja se os desafios que você selecionou irão mexer com a energia do seu espírito, caso positivo, selecione esse campo.
<br /><br />
<strong>Atenção:</strong> Lembre-se de que não existe certo ou errado, essas opções você seleciona os corpos que acredita que serão influenciados pelo seu desafio.
<br /><br />
<h2>Âncora e Lembretes</h2>
<br /><br />
O ego utiliza do "esquecimento" como principal ferramenta para manter um hábito, e a melhor forma de quebrarmos esse padrão é colocarmos lembretes no dia a dia.
<br /><br />
É muito comum os participantes utilizarem o celular, post it's, anotações, lembretes na agenda para fazerem os desafios. Quanto mais formas de lembrar melhor. Para o celular é importante colocar alarmes ou notificações dos lembretes, dessa forma eles apitam todos os dias para te lembrar.
<br /><br />
Para Android nós conhecemos: Do It Later, Trello, e Google Keep.
<br /><br />
Para iPhone: Calendário do iPhone, Productive, Trello e Google Keep.
<br /><br />
As âncoras são instrumentos poderosos que invoca nossa disposição para realizar o que é necessário e nos faz retornar ao nosso centro quando acabamos nos desviando ou desequilibrando.
<br /><br />
Uma âncora que é muito fácil de ser feita. Pegue algum objeto que te faça lembrar do Treinamento de Alta Performance, e programe a sua mente falando para você mesmo: "Todas as vezes que eu olhar/pegar/ver esse objeto vou verificar os meus desafios." Deixe esse objeto sempre por perto para te ajudar a lembrar. 
<br /><br />
Exemplos: 
<br /><br />
OLFATO: Incenso / Perfume / Cheiro da natureza / 
<br /><br />
AUDIÇÃO: Música específica / Alarme com música entusiasmada / Sons da natureza
<br /><br />
TATO: Exercícios físicos / Adorno ou acessório / Golpe de Timo
<br /><br />
VISÃO: Tela de celular ou computador / Quadro de paisagem  / Frases empoderadoras 
<br /><br />
PALADAR: Toda vez que for colocar açúcar / Fazer jejum ao acordar / Toda vez que comer uma frutas 
<br /><br />
MENTE: Meditar / Orar / Autoconhecimento

			<a class="lightbox-close" href="#"></a>
		</div>


  	</td>
  	
  </tr>
  <tr><td colspan="4" style="background-color: #d7e2ef;">&nbsp;</td></tr>
  

			 <?php } //while ?>
	    </tbody>
          </table>
          <input type="hidden" value="1" name="insere">
    	<input type="submit" class="btn btn-lg btn-success" value="Salvar">
    </div>
    	
        <?php } //finaliza o if($num) ?>
    <?php }  ?>
    



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


