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
		if($x != "insere"){
			$array = explode('_', $x);
			$campo = $array[0];
			$id = $array[1];
			$sql_update = "UPDATE iap_aceite SET $campo = '1' WHERE id = '$id'";
			$query_update = mysqli_query($con,$sql_update);
			if($query_update){
				//$mensagem .= "$campo = 1 Em Id: $id <br />";	
			}
			
		}

	}
}


?>



<div class="container">

<?php include '../inc/menu-principal.php'; ?>

<?php switch($p){ 
case "inicial";
$objetivo = verificaObjetivo($user->ID); 
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
                <th>Nível</th>
                <th>Desafio</th>
                <th>Ying/Yang</th>
                <th>Ter</th>
                <th>Fazer</th>
                <th>Ser</th>
                <th>Fis</th>
                <th>Emo</th>
                <th>Men</th>
                <th>Esp</th>
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
                <td><?php echo marcaX($x['ter']); ?>  </td>
                <td><?php echo marcaX($x['ser']); ?></td>
                <td><?php echo marcaX($x['fazer']); ?></td>
                <td><?php echo marcaX($x['fisico']); ?></td>
                <td><?php echo marcaX($x['emocional']); ?></td>
                <td><?php echo marcaX($x['mental']); ?></td>
                <td><?php echo marcaX($x['espiritual']); ?></td>

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