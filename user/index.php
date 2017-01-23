<?php include '../inc/header.php'; ?>



	<div class="container">
		<?php include '../inc/menu-principal.php'; ?>
      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Olá, <?php echo $_SESSION['nomeCompleto'] ?>! <?php echo saudacao(); ?>!</h1>
        <p class="lead">Esta é a semana <?php echo numeroSemana(date('m/d/Y')); ?> do ano!</p>
        <p class="lead">Os novos desafios devem começar em <?php echo exibirDataBr(nextMonday(date('Y-m-d'))); ?>, segunda-feira!  </p>
        
        <?php
		$objetivo = verificaObjetivo($_SESSION['idUsuario']); 
		if($objetivo == 0){ ?>
		<p class="lead">Você não tem nenhum objetivo inserido no sistema. Insira um!</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Inserir um objetivo</a></p>
		<?php }else{
		?> 
		<p class="lead">Você tem um objetivo inserido no sistema. Acompanhe os desafios!</p>
        <p><a class="btn btn-lg btn-success" href="desafio.php" role="button">Ir para os desafios</a></p>
        <?php } ?>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Você tem x desafios nesta semana.</h2>
          <p class="text-danger">As of v9.1.2, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="#" role="button">+ Detalhes &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; 2016 Company, Inc.</p>
<?php
if($_SESSION['perfil'] == 1){
	echo "<strong>SESSION</strong><pre>", var_dump($_SESSION), "</pre>";
	echo "<strong>POST</strong><pre>", var_dump($_POST), "</pre>";
	echo "<strong>GET</strong><pre>", var_dump($_GET), "</pre>";
	echo "<strong>SERVER</strong><pre>", var_dump($_SERVER), "</pre>";
	echo ini_get('session.gc_maxlifetime')/60; // em minutos
}

?>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>

