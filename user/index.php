<?php 
//criar sessão de segurança
session_start();
include "../inc/functions.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>IAP - Busca de objetivos</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="objetivo.php">Objetivos</a></li>
            <li><a href="desafio.php">Desafios</a></li>
            <li><a href="pontuacao.php">Pontuação</a></li>
            <li><a href="relatorios.php">Relatórios</a></li>
            <li><a href="agenda.php">Agenda</a></li>
          </ul>
        </nav>
      </div>

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

