<?php $page_title = "Acompanhamento | iAP"; ?>
<?php include '../inc/header.php'; ?>
<?php
$con = bancoMysqli();
$level = get_currentuserinfo();
?>
<div class="container">
	<?php include '../inc/fixed-navbar-trainer.php'; ?>
	<?php include '../inc/menu-trainer.php';?>

	<div class="jumbotron">
		<?php echo "<h1>Acompanhamento</h1>"; ?>
	</div>
    <div class="table-responsive">
    <table class=" table table-striped">
    <tr>
    <th>Nome</th>
    <th>Telefone</th>
    <th>Email</th>
    <th>Objetivo</th>
    <th>Fase</th>

    </tr>
    <?php 
	$sql_lista = "SELECT * FROM iap_objetivo WHERE finalizado <> '1' ORDER BY id";
	$query_lista = mysqli_query($con,$sql_lista);
	while($lista = mysqli_fetch_array($query_lista)){
		$usuario = get_userdata($lista['usuario']);
	?>
    <tr>
    <td><a href="historico_treinamento.php?id=<?php echo $lista['id']; ?>"><?php echo $usuario->first_name." ".$usuario->last_name; ?></a></td>
    <td></td>
    <td><?php echo $usuario->user_email; ?></td>
    <td><?php echo $lista['objetivo']; ?></td>
    <td><?php echo  verificaFase($lista['id']); ?></td>

    </tr>
    
    
    <?php 
	} // fim do while
	
	?>
    
    </table>
    
    </div>
    
    </div>
<?php include '../inc/footer.php'; ?>