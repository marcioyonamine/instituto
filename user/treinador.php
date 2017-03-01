<?php $page_title = "Treinador | iAP"; ?>
<?php include '../inc/header.php'; ?>
<?php
$con = bancoMysqli();
$level = get_currentuserinfo();
if($level->user_level == 10){

if(isset($_GET['p'])){
	$p = $_GET['p'];	
}else{
	$p = "inicial";	
}


 ?>
<div class="container">
	<?php include '../inc/fixed-navbar-trainer.php'; ?>
	<?php include '../inc/menu-trainer.php';	?>

<?php  
switch($p){
case "inicial":
?>

	<div class="jumbotron">
		<?php echo "<h1>Olá, " . $level->user_firstname .  "!</h1>"; 
		
		//Verifica se o cliente está com o treinamento em andamento
		$sql_andamento = "SELECT * FROM iap_objetivo WHERE finalizado = '0'";
		$query_andamento = mysqli_query($con, $sql_andamento);
		$conta_andamento = mysqli_num_rows($query_andamento);
		
		//Verifica se o cliente está com o treinamento em andamento ou finalizado
		$sql_finalizado = "SELECT * FROM iap_objetivo WHERE finalizado = '1'";
		$query_finalizado = mysqli_query($con, $sql_finalizado);
		$conta_finalizado = mysqli_num_rows($query_finalizado);	
		
		?>
		
		<p class="lead">Hoje é dia <?php echo date('d/m/Y');?>, e atualmente <?php echo $conta_andamento; ?> pessoas estão com o treinamento em andamento.</p>
		
		<p class="lead">Até hoje, <?php echo $conta_finalizado; ?> pessoas já terminaram o treinamento.</p>
		
		<?php 
		
		
		
		//Verifica se tem objetivos ainda não avaliados na tabela objetivo
		$sql_conta = "SELECT id FROM iap_objetivo WHERE nivel = '0' OR nivel is null";
		$query_conta = mysqli_query($con,$sql_conta);
		$num = mysqli_num_rows($query_conta);
		
		if($num == 0 || $num == NULL){
		?>
		<p class="lead">Você não tem novos objetivos para avaliar.</p>
		<?php }else{ ?>
		<p class="lead">Você tem <?php echo $num ?> objetivos para avaliar.</p> 
		<p> <a class="btn btn-lg btn-success" href="treinador.php?p=objetivo" role="button">Avaliar objetivos</a>
		<?php } ?>
		
		


	</div>		

<?php 
break;
case "objetivo":
$con = bancoMysqli();
if(isset($_POST['idObj'])){
	$objetivo = recuperaDados("iap_objetivo", $_POST['idObj'], "id");
	$user_info = get_userdata($objetivo['usuario']);
	$hoje = date('Y-m-d');
	$sql_atualiza = "UPDATE iap_objetivo SET nivel = '".$_POST['nivel']."' ,
	data_inicio = '$hoje' , finalizado = '0' , treinador = '". $user->ID ."'
	WHERE id = '".$_POST['idObj']."'";
	$query_atualiza = mysqli_query($con,$sql_atualiza);
	if($query_atualiza){
		$mensagem = "Nível do objetivo atualizado.";
		
		if(emailTreinador("nivelinserido", "Treinador", $user_info->user_email)){
			gravarLog("Email enviado",$user->ID);
			
		}else{
			gravarLog("Erro ao enviar email",$user->ID);
		};
			
	}else{
		$mensagem = "Erro ao atualizar nível do objetivo.";	
		
	}	
}
?>    
	<div class="jumbotron">
		<p><?php if(isset($mensagem)){echo "<h1>Objetivos";} ?>
        </p>
<?php 

$sql_lista = "SELECT * FROM iap_objetivo ORDER BY id DESC";
$query_lista = mysqli_query($con,$sql_lista);

?>

</div>

      <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Objetivo</th>
                <th>Usuário</th>
                <th>Nível</th>
                <th>Data</th>
                <th></th>
              </tr>
            </thead>
           <tbody>
<?php 
		while($obj = mysqli_fetch_array($query_lista)){
			$user_lista = get_user_by( 'ID', $obj['usuario'] );
			
?>
           <tr>
           <td><?php echo $obj['objetivo']; ?></td>
           <td><?php echo $user_lista->first_name . ' ' . $user_lista->last_name; ?></td>
           <td>
           <form action="treinador.php?p=objetivo" method="post">
           <select name="nivel">
           <option></option>
		   <option value="1" <?php echo select(1,$obj['nivel']);?>>1</option>
		   <option value="2" <?php echo select(2,$obj['nivel']);?>>2</option>
		   <option value="3" <?php echo select(3,$obj['nivel']);?>>3</option>
		   <option value="4" <?php echo select(4,$obj['nivel']);?>>4</option>
		   <option value="5" <?php echo select(5,$obj['nivel']);?>>5</option>
		   <option value="6" <?php echo select(6,$obj['nivel']);?>>6</option>
		   <option value="7" <?php echo select(7,$obj['nivel']);?>>7</option>
		   
           </select>
           </td>
           <td><?php if($obj['data_inicio'] == NULL OR $obj['data_inicio'] == '0000-00-00'){echo "";}else{echo exibirDataBrOrdem($obj['data_inicio']);} ?></td>
			<td>
            <input type="hidden" name="idObj" value="<?php echo $obj['id']?>" />
 			<input type="submit" class="btn btn-sm btn-success" value="Atualiza">
            </form></td>
           </tr>
<?php 
		} 
?>           
            </tbody>
          </table>
    </div>

<?php 
break;
case "edita":
$obj = recuperaDados("iap_objetivo",$_POST['idObj'],"id");
$user_lista = get_user_by( 'ID', $obj['usuario'] );
?> 
	<div class="jumbotron">
		<?php echo $obj['objetivo']; ?>
        <p></p>
     </div>
   
<div class="row">     
  <div class="form-group">
            <div class="col-md-offset-2 col-md-8">
		<form action="relatorios.php?p=insere" method="post" class="form-horizontal" onSubmit="return validaDados()">
			
			
			<p>Dê uma nota de 0 a 10 que você dá a si mesmo para o seu desempenho nos desafios:
				<select name="notaDesafios" class="form-control" >
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>

                </select>
                
			</p>

			<p>
				Qual foi a experiência desse período com os desafios?
				<textarea name="expDesafios" class="form-control"></textarea>
			</p>
			
			<p>O que você observou?
				<textarea name="oqObservou" class="form-control"></textarea>		
			</p>
			
			<p>Como foi esse período pra você?
				<textarea name="periodo" class="form-control"></textarea>
			</p>
			

            
            
			<p>
            <input type="hidden" name="semana" value="<?php echo $_POST['semana']; ?>">
            <input type="hidden" name="fase" value="<?php echo $_POST['fase']; ?>">
            <input type="hidden" name="objetivo" value="<?php echo $_POST['objetivo']; ?>">

				<input name="insere_relatorio" type="submit" value="Enviar relatório" />
			</p>
			
		</form>
        <?php ?>	
        
        </div>
        </div>

    
<?php 
break;
}// fim switch 
?>
<?php } else {?>
<div class="container">
	<?php include '../inc/fixed-navbar-user.php'; ?>
	<?php include '../inc/menu-principal.php';	?>

	<div class="jumbotron">
		<h2>Você não tem autorização para acessar esta área.</h2>
        <p><a class="btn btn-lg btn-success" href="../inc/logout.php" role="button">Sair</a></p>
        </div>



<?php } // fim do if level?>
        </div>	
		<?php include '../inc/footer.php'; ?>
	

