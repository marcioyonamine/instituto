<?php include '../inc/header.php'; ?>

<?php 
	//criar sessão de segurança
	//session_start();
	//include "../inc/functions.php";
	$con = bancoMysqli();

	if (isset($_GET['p'])) {
		$p = $_GET['p'];
	} else {
		$p = "inicio";
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
        <h1>Objetivo</h1>
        <?php
		$objetivo = verificaObjetivo($user->ID);
		if($objetivo == NULL){ ?>
		<p class="lead">Vamos definir agora qual será o foco principal do seu treinamento.</p>
		<p class="lead">É importante que você escolha algo que tenha força para fazer você mudar de hábitos e que faça muito sentido nesse seu momento de vida.</p>
		<p class="lead">O valor do seu objetivo pra você mesmo é que vai te dar força e energia para fazer os desafios e para conseguir expandir sua consciência.</p>
		<p class="lead"><iframe width="560" height="315" src="https://www.youtube.com/embed/-fcFDx3zf0A?controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></p>
		<p class="lead">Assista abaixo uma ferramenta simples que vai te ajudar na definição do seu objetivo:</p>
        
        <iframe src="https://player.vimeo.com/video/198873042" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        <p class="lead"><a href="http://ialtaperformance.com/downloads/baixar.php?arquivo=meta-smart.pdf">Baixar ferramenta SMART</a></p>
        
        <p class="lead">Agora que você já consegue ver o seu objetivo de forma mais clara, escreva ele em uma frase curta. Essa frase será o seu objetivo durante o treinamento:</p>
        
        <p><a class="btn btn-lg btn-success" href="?p=insere" role="button">Inserir um objetivo</a></p>
		<?php }else{ ?> 
		<p class="lead">O seu objetivo já foi definido e validado pelo treinador.</p>
		<p class="lead">Lembre-se sempre que do começo até o final do treinamento este será o seu foco: <strong><?php echo $objetivo['objetivo']; ?>.</strong></p>
        <p class="lead">Para visualizar os desafios em andamento dessa fase, clique no botão abaixo.</p>
        <br /><br />
        <?php if($objetivo['nivel'] != '0'){ ?>
        <p><a class="btn btn-lg btn-success" href="relatorios.php" role="button">Visualizar meus desafios</a></p>
		<?php }else{?>
    		<p class="lead">Em breve, o treinador irá indicar qual o nível está o seu desafio.</p>    
        <?php } ?>
        <?php } ?>

      </div>
      

<?php
	break;
	case "insere":

	if(isset($_POST['objetivo'])){
	$objetivo = addslashes($_POST['objetivo']);
	$user = $user->ID;
	$sql = "INSERT INTO `iap_objetivo` (`id`, `objetivo`, `usuario`, `treinador`, `nivel`, `data_inicio`)
	VALUES (NULL, '$objetivo', '$user', '', '', '')";
	$query = mysqli_query($con,$sql);
	if($query){
		//envia email para o treinador
	}
?>
       <div class="container">
       	<?php include '../inc/fixed-navbar-user.php'; ?>
      	 <?php include '../inc/menu-principal.php'; ?>

<?php
	if($query){
 ?>
	    <div class="jumbotron">
        <h1>Objetivo</h1>
        <p class="lead"></p>
        <p class="lead">Objetivo enviado ao treinador.</p>
        <p class="lead">Não se preocupe que, em breve, você terá todos as informações do seu programa.</p>
        </div>
<?php }else{ ?>	
	    <div class="jumbotron">
        <h1>Objetivo</h1>
        <p class="lead"></p>
        <p class="lead">Erro ao enviar(1).</p>
        </div>

<?php }

}else{
	  ?>
       <div class="container">
      	 <?php include '../inc/fixed-navbar-user.php'; ?>
      	 <?php include '../inc/menu-principal.php'; ?>      	   
        <div class="jumbotron" style="padding-bottom: 0px !important;">
        <h1>Objetivo</h1>
        <p class="lead"></p>
        <p class="lead">Ao enviar um objetivo, um dos nossos treinadores irá avaliar a área específica desse objetivo e montará um plano de desafios para trabalhar com você.</p>
        <p class="lead">Em breve seu treinador irá validar seu objetivo e te passar os próximos passos.</p>

      </div>
      
<form action="?p=insere" method="post">
  <div class="form-group">
    <h3 style="text-align: center; color:#183F76;">Descreva o seu objetivo:</h3>
    <input type="text" class="form-control" name="objetivo" placeholder="Insira aqui seu objetivo">
   
  </div>
<div class="form-group">
 <!--     <label for="exampleTextarea">Fale um pouco sobre o seu objetivo</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
  </div>-->
  <p class="lead text-center">
  <button type="submit" class="btn btn-primary">Enviar</button>
  </p>
</form>      </div>

<?php } ?>
<?php
	break;
 ?>
<?php } ?>

      <!-- Site footer -->
      
        <?php include '../inc/footer.php'; ?>
