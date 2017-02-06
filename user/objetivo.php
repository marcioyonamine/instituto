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
		<p class="lead">[INCLUIR O VIDEO AQUI]</p>
		<p class="lead">Assita abaixo uma ferramenta simples que vai te ajudar na definição do seu objetivo:</p>
        
        <iframe src="https://player.vimeo.com/video/198873042" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        <p class="lead"><a href="http://ialtaperformance.com/downloads/baixar.php?arquivo=meta-smart.pdf">Baixar ferramenta SMART</a></p>
        
        <p class="lead">Agora que você já consegue ver o seu objetivo de forma mais clara, escreva ele em uma frase curta. Essa frase será o seu objetivo durante o treinamento:</p>
        
        <p><a class="btn btn-lg btn-success" href="?p=insere" role="button">Inserir um objetivo</a></p>
		<?php }else{ ?> 
		<p class="lead">O objetivo que você escolheu para atingir durante o treinamento foi:</p>
        <h2><?php echo $objetivo['objetivo']; ?></h2>
        <br /><br />
        <?php if($objetivo['nivel'] != '0'){ ?>
        <p><a class="btn btn-lg btn-success" href="desafio.php" role="button">Ir para os desafios</a></p>
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
      	 <?php include '../inc/menu-principal.php'; ?>      
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
<?php
	break;
 ?>
<?php } ?>

      <!-- Site footer -->
      
        <?php include '../inc/footer.php'; ?>
