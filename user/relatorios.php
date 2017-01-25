<?php include '../inc/header.php'; ?>
<?php 
$con = bancoMysqli();
if(isset($_GET['p'])){
	$p = $_GET['p'];	
}else{
	$p = "inicial";	
}
$mensagem = "";
if(isset($_POST['insere'])){ //insere
	$i = 0;
	$caixa = array();
	foreach($_POST as $x => $valor){
		if(!preg_match('/[^0-9]/',$x)){ //verifica se é um número
			array_push($caixa, $x);
		}
	}
	$objetivo = verificaObjetivo($_SESSION['idUsuario']); 
	$fase = verificaFase($objetivo['id']);
	$prox = $fase + 1;
	echo $prox;
	//$verifica = desFas($objetivo['id'],$caixa,$prox);
	$verifica = desFas($objetivo['id'],$caixa,$prox);
	if($verifica['bool_des'] == 1){ //se passar pela verificação, gravar a tabela aceite
		for($i = 0; $i < count($caixa); $i++){
			$data_inicio = nextMonday($hoje);
			$sql_insere = "INSERT INTO `iap_aceite` (`id`, `objetivo`, `desafio`, `foco`, `data_aceite`, `data_inicio`, `data_final`, `duracao`, `semana`, `fase`, `relatorio`, `resposta`, `intesidade`, `frequencia`, `corpos`) VALUES (NULL, '".$objetivo['id']."', '".$caixa[$i]."', '', '$hoje', '$data_inicio', '', '', '', '".$prox."', '', '', '', '', '')";			
			$query_insere = mysqli_query($con,$sql_insere);
			if($query_insere){
				$des = recuperaDados("iap_desafio",$caixa[$i],"id");
				$mensagem .= "Desafio <b>".$des['titulo']."</b> inserido com sucesso.<br />";
				if($prox == 1){ // atualiza a tabela objetivo
					$sql_obj = "UPDATE iap_objetivo SET data_inicio = '$hoje' WHERE id = '".$objetivo['id']."'";
					$query_obj = mysqli_query($con,$sql_obj);
					if($query_obj){
						$mensagem .= "Objetivo atualizado.<br />";	
					}else{
						$mensagem .= "Erro ao atualizar objetivo.<br />";	
					}
				}	
			}else{
				$mensagem .= "Erro ao inserir.<br />";	
				
			}
		}

	}else{
		$mensagem = $verifica['err_men']."<br /> <a href = 'desafio.php?p=insere'>Tente novamente. </a>";	
	}
}




?>



<div class="container">

<?php include '../inc/menu-principal.php'; ?>

<?php switch($p){ 
case "inicial";
$objetivo = verificaObjetivo($_SESSION['idUsuario']); 
$datas = retornaSemanas($objetivo['data_inicio']);
?>
	<div class="jumbotron">
		<?php echo "<h1>Relatórios</h1>"; ?>
       <p> <?php if(isset($mensagem)){ echo $mensagem; }?></p>
		<pre>
        <?php //var_dump($datas);?>
        </pre>
	<?php 
	for($i = 1; $i <= 16; $i++){ ?>
  	<h2>Semana <?php echo $i; ?> Fase:  <?php echo $datas[$i]['fase']; ?> (<?php echo exibirDataBr($datas[$i]['inicio']) ?>  a <?php echo exibirDataBr($datas[$i]['fim']) ?>) </h2>
<?php 
			$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '".$datas[$i]['fase']."'";
			$query_lista = mysqli_query($con,$sql_lista);
			$num = mysqli_num_rows($query_lista);
			if($num > 0){
?>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><center>Nível</center></th>
                <th><center>Desafio</center></th>
                <th><center>Ying/Yang</center></th>
                <th><center>Ter</center></th>
                <th><center>Fazer</center></th>
                <th><center>Ser</center></th>
                <th><center>Fis</center></th>
                <th><center>Emo</center></th>
                <th><center>Men</center></th>
                <th><center>Esp</center></th>
              </tr>
            </thead>
            <tbody>
			<?php 
		
			while($x = mysqli_fetch_array($query_lista)){ 
				$desafio = recuperaDados("iap_desafio",$x['desafio'],"id");
			?>
            <tr>
                <td><?php echo $desafio['nivel']; ?></td>
                <td><?php echo $desafio['titulo']; ?></td>
                <td><?php echo recTermo($desafio['yy']); ?></td>
                <td> <input type="checkbox"> </td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>

           </tr>
			 <?php } ?>

	    </tbody>
          </table>
    </div>
    <?php } //finaliza o if($num)?>
    <?php 
		
	}
	
	?>

		
				
	</div>

</div>



<?php 
break;
} 
?>

<?php include '../inc/footer.php'; ?>