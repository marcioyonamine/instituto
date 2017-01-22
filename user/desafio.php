<?php 
//criar sessão de segurança
session_start();
include "../inc/functions.php";
$con = bancoMysqli();

if(isset($_GET['p'])){
	$p = $_GET['p'];	
}else{
	$p = "inicio";	
}

if(isset($_POST['inicio'])){
	$i = 0;
	foreach ($_POST as $key => $valor) {
		$d[$i] = $key ;
		$i++;
	}
	$num_des = $i - 1;
	$mensagem = "Você escolheu $num_des desafios";
	
	for($i = 0; $i < $num_des; $i++){
		//fazer funcao
		$ultObj = ultObj($_SESSION['idUsuario']);
		$des = $d[$i];
		$hoje = date('Y-m-d');
		$proxSeg = nextMonday($hoje);
		echo $proxSeg;
		$sql_insere = "INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `foco`, `data_aceite`, `data_inicio`, `data_final`, `duracao`, `semana`, `fase`, `relatorio`, `resposta`) VALUES (NULL, '$ultObj', '$des', '', '$hoje', '$proxSeg', '', '', '1', '1', '', '')";
		$query = mysqli_query($con,$sql_insere);
		if($sql_insere){
			$mensagem .= "<br />Desafio inserido."; 	
					
		}else{
			$mensagem .= "<br />Erro ao inserir."; 	
		
		}
	
		
	}
	
	
}

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
            <li><a href="index.php">Home</a></li>
            <li><a href="objetivo.php">Objetivos</a></li>
            <li class="active"><a href="desafio.php">Desafios</a></li>
            <li><a href="#">Pontuação</a></li>
            <li><a href="#">Relatórios</a></li>
            <li><a href="#">Agenda</a></li>
          </ul>
        </nav>
      </div>
      <?php 
	  switch ($p){
	  case "inicio":
	  
	  ?>
      
        <div class="jumbotron">
        <h1>Desafios</h1>
	  	<p><?php if(isset($mensagem)){echo $mensagem;} ?></p>
        <?php
		$objetivo = verificaObjetivo($_SESSION['idUsuario']); 
		echo $objetivo." - ".$_SESSION['idUsuario'];
		if($objetivo == 0){ ?>
		<p class="lead">Você não tem nenhum objetivo inserido no sistema. Insira um!</p>
        <p><a class="btn btn-lg btn-success" href="?p=insere" role="button">Inserir um objetivo</a></p>
		<?php }else{
		$obj = 	ultObj($_SESSION['idUsuario']);
		if($obj['nivel'] == 0){ // o treinador ainda não avaliou o nível
		?>
			<p class="lead">O seu treinador ainda não avaliou o seu objetivo...</p>
			<p class="lead">Assim que ele classificar o seu objetivo, você poderá escolher os desafios.</p>
        
        <?php
		}else{ // o treinador avaliou o nível
		?> 

			<p class="lead">O seu treinador avaliou o seu desafio <strong> "<?php echo $obj['objetivo'] ?>"</strong> como de nível <strong><?php echo $obj['nivel']; ?></strong></p>
			<p class="lead">Na tabela abaixo, escolha 1 desafio para começar o programa.</p>
          <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><center>Desafio</center></th>
                <th><center>Ying/Yang</center></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <form action="?" method="post">
            
 			<?php 
			//fazer uma função
			$sql = "SELECT * FROM iap_desafio WHERE nivel = '1'";
			$query = mysqli_query($con,$sql);
			while($list = mysqli_fetch_array($query)){
			
			?>
             <tr>
                <td><?php echo $list['titulo']; ?></td>
                <td><?php echo recTermo($list['yy']); ?></td>
                <td>
            <input type="checkbox" name="<?php echo $list['id'] ?>"> 
        </td>
              </tr>
             <?php  }?> 
            </tbody>
          </table>
    </div>
    	<input type="hidden" value="1" name="inicio">
    	<input type="submit" class="btn btn-lg btn-success" value="Salvar">
		</form>

		<?php 
		} // não tem objetivo válido no sistema
		?>
        
		
        <?php } ?>

      </div>
      

<?php break; 
 case "insere":

if(isset($_POST['objetivo'])){
	$objetivo = addslashes($_POST['objetivo']);
	$user = $_SESSION['idUsuario'];
	$sql = "INSERT INTO `iap_objetivo` (`id`, `objetivo`, `usuario`, `treinador`, `nivel`, `data_inicio`) 
								VALUES (NULL, '$objetivo', '$user', '', '', '')";
	$query = mysqli_query($con,$sql);
	if($query){ ?>
	    <div class="jumbotron">
        <h1>Objetivo</h1>
        <p class="lead"></p>
        <p class="lead">Objetivo enviado ao treinador.</p>
        <p class="lead">Não se preocupe que, em breve, você terá todos as informações do seu programa.</p>
        </div>
<?php
	}else{
?>	
	    <div class="jumbotron">
        <h1>Objetivo</h1>
        <p class="lead"></p>
        <p class="lead">Erro ao enviar(1).</p>
        </div>

<?php
	}							


}else{


	  ?>
      
        <div class="jumbotron">
        <h1>Objetivo</h1>
        <p class="lead"></p>
        <p class="lead">Ao enviar um objetivo, um dos nossos treinadores irá avaliar o nível de dificuldade e montará um plano de desafios para trabalhar com você.</p>
        <p class="lead">Não se preocupe que, em breve, você terá todos as informações do programa.</p>

      </div>
      
<form action="?p=insere" method="post">
  <div class="form-group">
    <label>Descreva o seu objetivo</label>
    <input type="text" class="form-control" name="objetivo" placeholder="Ex: quero mudar de emprego!">
   
  </div>
<div class="form-group">
 <!--     <label for="exampleTextarea">Fale um pouco sobre o seu objetivo</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
  </div>-->
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>      </div>
<?php } ?>
<?php break; ?>
<?php } ?>

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

