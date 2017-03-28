<?php $page_title = "iAP | Treinamento de Alta Performance"; ?>
<?php include '../inc/header.php'; ?>

	<div class="container">
		<?php include '../inc/fixed-navbar-user.php'; ?>
		<?php include '../inc/menu-principal.php'; ?>
      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Olá, <?php echo $user->display_name; ?>! <?php echo saudacao(); ?>!</h1>
        <!-- Não precisamos mostrar a semana do ano.
        <p class="lead">Esta é a semana <?php echo numeroSemana(date('m/d/Y')); ?> do ano!</p>
        -->
            
			<?php
		$objetivo = verificaObjetivo($user->ID); 
		if($objetivo == 0){ ?>
		 <p class="lead">O seu treinamento irá iniciar na segunda-feira seguinte que você escolher o seu primeiro desafio.</p>
        
        <p class="lead">Para liberar a escolha dos desafios, precisamos que você nos diga qual objetivo você quer alcançar com este treinamento.</p>
        
        <p class="lead">É importante que você escolha algo que tenha força para fazer você mudar de hábitos e que faça muito sentido nesse seu momento de vida.</p>
        
        <!--
        <p class="lead">Assita abaixo uma ferramenta simples que vai te ajudar na definição do seu objetivo:</p>
        
        <iframe src="https://player.vimeo.com/video/198873042" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        
        <p class="lead"><a href="http://ialtaperformance.com/downloads/baixar.php?arquivo=meta-smart.pdf">Baixar ferramenta SMART</a></p>
        -->
        <p class="lead">A sua data prevista para início do treinamento é: <?php echo exibirDataBrOrdem(nextMonday($GLOBALS['hoje'])); ?>, segunda-feira!  </p>
        
        <p class="lead">Pronto para definir o seu objetivo?</p>
        
        <p><a class="btn btn-lg btn-success" href="objetivo.php" role="button">Definir objetivo</a></p>
		<?php }else{
			$obj = 	ultObj($user->ID);
			?> 
		<p class="lead">Você está na fase 
			
			<?php $fase_atual = verificaFase($obj['id']);
				if($fase_atual == '0' || $fase_atual == null){
						echo " inicial do treinamento. Seus autodesafios começarão na próxima segunda-feira, que é o dia que você deve escolher o seu primeiro desafio.</p>";
					}else{
						$datas = retornaSemanas($objetivo['data_inicio']);
						echo $fase_atual . " do treinamento.</p>"; 
					}
				
			?>
				
				 
		<p class="lead">O seu objetivo para este treinamento é:<strong> <?php echo $objetivo['objetivo']; ?></strong>.</p>
		<p class="lead">O seu próximo evento agendado será em: 
			<?php 
                $events = eo_get_events(array(
              'numberposts'=>1,
              'event_start_after'=>'today',
              'showpastevents'=>true,//Will be deprecated, but set it to true to play it safe.
         ));

       if($events):
          echo '<p class="lead">';
          foreach ($events as $event):
               //Check if all day, set format accordingly
               $format2 = ( eo_is_all_day($event->ID) ? get_option('time_format') : get_option('time_format') );
               $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format') );
				
				$evento = get_post($event->ID);
				$descricao = $evento->post_content;
				//echo $descricao;
				//var_dump($evento);
				
				//Arrumar aqui pra abrir dentro do lightbox..
               echo eo_get_the_start( $format, $event->ID, $event->occurrence_id ) . ' - ' . '<a class="lightbox-home-evento" href="#goofy">' . get_the_title($event->ID) . '</a><div class="lightbox-target-home-evento" id="goofy"><h2>' . get_the_title($event->ID) . '</h2><br /><p class="lead">' . eo_get_the_start( $format, $event->ID, $event->occurrence_id ) . '</p><p class="lead">' . $descricao . '</p><a class="lightbox-close" href="#"></a></div>';
			   			   
          endforeach;
          echo '</p>';
       endif;
	   ?>
			</p>
		<!--
		<p class="lead">O seu treinamento terminará em <strong> <!--<?php echo exibirDataBr($des[1]['inicio']) ?>  a <?php $des = retornaSemanas($obj['data_inicio']); echo exibirDataBr($des[16]['fim']) ?> </strong>.</p>-->
		
		<p><a class="btn btn-lg btn-success" href="desafio.php" role="button">Ir para os desafios</a></p>
        <?php } ?>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Sua pontuação</h2>
          <?php 
		  $obj = 	ultObj($user->ID);
		  $adv = retornaAdvertencia($obj['id']);

		  if($adv == 0){
		  ?>
          <p class="text-success">Parabéns! Você não possui advertências =) Continue assim!</p>
          <?php 
		  }elseif($adv == 1){
		  ?>
          <p class="text-warning"><strong>Você tem 1 advertência!</strong><br />Ops, algo não saiu conforme o combinado. =/ <br />Mas não se preocupe! Organize-se para conseguir cumprir com o combinado e alcançar o seu objetivo.</p>
          <?php 
		  }elseif($adv == 2){
		  ?>
          <p class="text-warning"><strong>Você tem 2 advertências!</strong><br />Humm, algo não está legal. <br />Confira as suas próximas tarefas aqui na <a href="agenda.php" title="Eventos do Instituto">agenda</a> e organize melhor a sua rotina. <br />Lembre-se a disciplina é a melhor ferramenta para conquistarmos qualquer coisa.</p>
          <?php 
		  }elseif($adv >= 3){
		  ?>
          <p class="text-danger"><strong>Você tem 3 advertências!</strong><br />Ops, o que aconteceu? Está tudo bem?<br /> Melhor falar com o seu treinador né? <a href="contato.php" title="Fale com seu treinador">Clique aqui</a>.</p>

          <?php 
		  }


          	$obj = 	ultObj($user->ID);
          	$fase_atual = verificaFase($obj['id']); 
			//echo $fase_atual;
			$fase_anterior = $fase_atual - 1;
			//echo $fase_anterior . "<br>";
          	$usuario = $user->ID;
          	
			if($fase_atual == 0 || $fase_atual == 1){
			echo "<p>Ao final de cada fase, não se esqueça de enviar um relatório para o treinador de como foram os desafios para você.</p>
				<p><a class=\"btn btn-primary\" href=\"desafio.php\" role=\"button\">Ir para Desafios &raquo;</a></p>
				";			
			}else{
			
          	$con = bancoMysqli();
          	
          	$sql_nota_anterior = "SELECT * FROM relatorio_semanal WHERE user_id = '$usuario' AND fase = '$fase_anterior'";
			$executa = mysqli_query($con, $sql_nota_anterior);
			$mostra_nota = mysqli_num_rows($executa);
			
			$recupera_nota = mysqli_fetch_array($executa);
			
			//echo $recupera_nota['iap_rel_nota_desafios'] . "<br>";
			
			/*
			echo $mostra_nota['iap_rel_nota_desafios'];
          	$sql = "SELECT * FROM relatorio_semanal WHERE user_id = '$user->ID'";
			$query = mysqli_query($con, $sql);
			 
			 * 
			 */			
			
			if($mostra_nota == 0){
				echo "<p>Você não enviou relatório com nota na fase anterior. Esses relatórios devem ser preenchidos no final de cada fase. Não deixe de preenchê-lo, pois é ele que mostrará a sua evolução para o treinador.</p>
				<p><a class=\"btn btn-primary\" href=\"desafio.php\" role=\"button\">Ir para Desafios &raquo;</a></p>
				";
			}else{			
          ?>          
          <p>Sua nota para os desafios na fase anterior foi <?php echo $recupera_nota['iap_rel_nota_desafios']; ?>. 
          	<?php
          		if($recupera_nota['iap_rel_nota_desafios'] >= 0 && $recupera_nota['iap_rel_nota_desafios']<=5){
          			echo "Algo não está legal né, " . $user->user_firstname . "? Essa é a oportunidade para você observar o ego agindo e vencê-lo! Pegue os autodesafios que fazem mais sentido, não há certo ou errado, apenas observação e coragem, lembre-se disso. Siga em frente é normal termos algumas recaídas!</p>
          <p><a class=\"btn btn-primary\" href=\"desafio.php\" role=\"button\">Ir para Desafios &raquo;</a></p>";
		  
          		}elseif($recupera_nota['iap_rel_nota_desafios'] >=6 && $recupera_nota['iap_rel_nota_desafios'] <= 8){
          			echo "Legal " . $user->user_firstname . ", você está na direção, veja em que pontos que você pode melhorar e coloque mais foco nos seus desafios e na observação, assim você terá mais resultados. Lembre-se, seu objetivo só depende de você vencer o seu ego. Imprima o lembrete dos desafios para facilitar no seu dia a dia.</p>
          <p><a class=\"btn btn-primary\" href=\"desafio.php\" role=\"button\">Ir para Desafios &raquo;</a></p>";
          
		  		}else{
          			echo "Parabéns " . $user->user_firstname . ", esse é o caminho para a Alta Performance, continue pegando os autodesafios que fazem mais sentido para você e continue observando o seu ego agir.</p>
          <p><a class=\"btn btn-primary\" href=\"desafio.php\" role=\"button\">Ir para Desafios &raquo;</a></p>";
          
		  		}
          	?>
          	
          <?php } //fim do else ?> 
          
          <?php } // fim do else da semana 0?>
        </div>
        <div class="col-lg-4">
          <h2>Seus desafios</h2>          
          
          <?php 
			
          	$obj =	ultObj($user->ID);
          	$sem = retornaSemana($obj['id']);
          ?>
          
          <p><?php 
          	if($fase_atual == 0){ ?>
          		<p>
          			Você vai iniciar o seu treinamento na próxima segunda-feira. Enquanto isso, navegue pelo sistema ou <a href="#" title="Módulo Online">assista o módulo online</a> com os vídeos já disponíveis. 
          		</p>
          		
          		<?php }else{ ?>          	
          
          <p>Muitos preferem colocar os lembretes dos desafios no celular. Mas às vezes não podemos contar com ele, e isso não pode impedir a continuação dos desafios. Por isso disponibilizamos para você imprimir a sua lista de desafios da fase. Carregue esssa lista com você, e sempre dê uma olhada nela.</p>          
          
          		<a class="btn btn-primary" href="imprimir.php?semana=<?php echo $sem; ?>" target="_blank" role="button" style="float: left; margin-right: 10px;">Imprimir lembrete &raquo;</a></p>
          		<?php //echo $sem; ?>
          	<?php } ?>
          	
          	
          <p><a class="btn btn-primary" href="desafio.php" role="button">Ver meus desafios &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Próximos eventos do Instituto</h2>
          <?php 
                $events = eo_get_events(array(
              'numberposts'=>5,
              'event_start_after'=>'today',
              'showpastevents'=>true,//Will be deprecated, but set it to true to play it safe.
         ));

       if($events):
          
          foreach ($events as $event):
			  echo '<p>';
               //Check if all day, set format accordingly
               $format2 = ( eo_is_all_day($event->ID) ? get_option('time_format') : get_option('time_format') );
               $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format') );
				
				$evento = get_post($event->ID);
				$descricao = $evento->post_content;
				//echo $descricao;
				//var_dump($evento);
				
				//Arrumar aqui pra abrir dentro do lightbox..
               echo eo_get_the_start( $format, $event->ID, $event->occurrence_id ) . ' - ' . '<a class="lightbox-home-evento" href="#' . $event->ID . '">' . get_the_title($event->ID) . '</a><div class="lightbox-target-bloco-home" id="' . $event->ID . '"><h2>' . get_the_title($event->ID) . '</h2><br /><p class="lead">' . eo_get_the_start( $format, $event->ID, $event->occurrence_id ) . '</p><p class="lead">' . $descricao . '</p><a class="lightbox-close" href="#"></a></div>';
			   			echo '</p>';   
          endforeach;
          
       endif;
	   ?>

          <p><a class="btn btn-primary" href="agenda.php" role="button">Ver agenda completa &raquo;</a></p>
        </div>
      </div>

      <!-- Site footer -->
      
        <?php include '../inc/footer.php'; ?>


