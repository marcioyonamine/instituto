<?php include '../inc/header.php'; ?>



	<div class="container">
		<?php include '../inc/fixed-navbar-user.php'; ?>
		<?php include '../inc/menu-principal.php'; ?>
      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Olá, <?php echo $user->display_name; ?>! <?php echo saudacao(); ?>!</h1>
        <p class="lead">Esta é a semana <?php echo numeroSemana(date('m/d/Y')); ?> do ano!</p>
        <p class="lead">Os novos desafios devem começar em <?php echo exibirDataBr(nextMonday(date('Y-m-d'))); ?>, segunda-feira!  </p>
        
        <?php
		$objetivo = verificaObjetivo($user->ID); 
		if($objetivo == 0){ ?>
		<p class="lead">Você não tem nenhum objetivo inserido no sistema. Para definir seu objetivo e iniciar o treinamento, te recomendo assistir a Introdução do Módulo Online, onde apresento a ferramenta S.M.A.R.T! Ela vai te ajudar a detalhar seu objetivo e te permitirá saber se está se aproximando ou se afastando do seu objetivo.</p>
        <p><a class="btn btn-lg btn-success" href="objetivo.php" role="button">Inserir um objetivo</a></p>
		<?php }else{
		?> 
		<p class="lead">Você já escolheu seu objetivo para este treinamento:<strong> <?php echo $objetivo['objetivo']; ?></strong></p>
		<p>Lembre-se de focar nos desafios escolhidos para esta fase, e mantenha o seu observador ligado para perceber as situações.</p>
        <p><a class="btn btn-lg btn-success" href="desafio.php" role="button">Ir para os desafios</a></p>
        <?php } ?>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Você tem x desafios nesta semana.</h2>
          <p class="text-success">Você não possui advertências =)</p>
          <p>(se teve nota na semana passada) Sua nota para os desafios na última fase foi X. Continue com seu observador ligado e atente-se para os lembretes e gatilhos para não se sabotar.</p>
          <p><a class="btn btn-primary" href="#" role="button">Ir para Desafios &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Desafios versão Pocket</h2>
          <p>Muitos preferem colocar os lembretes dos desafios no celular (clique aqui para ver uma lista com algumas sugestões). Mas às vezes não podemos contar com ele, e isso não pode impedir a continuação dos desafios. Por isso disponibilizamos para você imprimir a sua lista de desafios da fase, tanto no formato A4 (sulfite convencional), quanto uma versão pocket, pra você carregar sempre com você.</p>
          <p><a class="btn btn-primary" href="#" role="button">Imprimir lista &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Próximos eventos</h2>
          <p>15/02 - Palestra Online: Ego vs Consciência</p>
		  <p>22/02 - Palestra Online: O que é Alta Performance?</p>
		  <p>13/03 - Encontro Presencial</p>
          <p><a class="btn btn-primary" href="#" role="button">Ver agenda completa &raquo;</a></p>
        </div>
      </div>

      <!-- Site footer -->
      
        <?php include '../inc/footer.php'; ?>


