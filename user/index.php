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
        <p class="lead">A sua data prevista para início do treinamento é: <?php echo exibirDataBr(nextMonday(date('Y-m-d'))); ?>, segunda-feira!  </p>
        
        <p class="lead">Pronto para definir o seu objetivo?</p>
        
        <p><a class="btn btn-lg btn-success" href="objetivo.php" role="button">Definir objetivo</a></p>
		<?php }else{
			$obj = 	ultObj($user->ID);
			?> 
		<p class="lead">Você está na <strong>Fase <?php $fase_atual = verificaFase($obj['id']); echo $fase_atual; ?></strong> do processo. Esta fase termina em <?php echo exibirDataBr(nextMonday(date('Y-m-d'))); ?></p>
		<p class="lead">O seu objetivo para este treinamento é:<strong> <?php echo $objetivo['objetivo']; ?></strong></p>
		<p class="lead">O seu próximo evento ao vivo será em: a definir.</p>
		<p class="lead">O seu próximo evento online será em: a definir.</p>
		<p class="lead">O seu treinamento terminará em <strong> <!--<?php echo exibirDataBr($des[1]['inicio']) ?>  a--> <?php $des = retornaSemanas($obj['data_inicio']); echo exibirDataBr($des[16]['fim']) ?> </strong>.</p>
		<p><a class="btn btn-lg btn-success" href="desafio.php" role="button">Ir para os desafios</a></p>
        <?php } ?>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Sua pontuação</h2>
          <p class="text-success">Você não possui advertências =)</p>
          <p>(se teve nota na semana passada) Sua nota para os desafios na última fase foi X. Continue com seu observador ligado e atente-se para os lembretes e gatilhos para não se sabotar.</p>
          <p><a class="btn btn-primary" href="#" role="button">Ir para Desafios &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Seus desafios</h2>
          <p>Muitos preferem colocar os lembretes dos desafios no celular (clique aqui para ver uma lista com algumas sugestões). Mas às vezes não podemos contar com ele, e isso não pode impedir a continuação dos desafios. Por isso disponibilizamos para você imprimir a sua lista de desafios da fase, tanto no formato A4 (sulfite convencional), quanto uma versão pocket, pra você carregar sempre com você.</p>
          <p><a class="btn btn-primary" href="#" role="button" style="float: left; margin-right: 10px;">Imprimir lista &raquo;</a></p>
          <p><a class="btn btn-primary" href="desafio.php" role="button">Ver meus desafios &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Próximos eventos do Instituto</h2>
          <p>15/02 - Palestra Online: Ego vs Consciência</p>
		  <p>22/02 - Palestra Online: O que é Alta Performance?</p>
		  <p>13/03 - Encontro Presencial</p>
          <p><a class="btn btn-primary" href="agenda.php" role="button">Ver agenda completa &raquo;</a></p>
        </div>
      </div>

      <!-- Site footer -->
      
        <?php include '../inc/footer.php'; ?>


