<?php $page_title = "iAP | Atualização de senha"; ?>
<?php include '../inc/header.php'; ?>

<div class="container">	
	
<?php include '../inc/fixed-navbar-user.php'; ?>
<?php include '../inc/menu-principal.php';	?>

<div class="jumbotron" style="padding-bottom:0px; margin-bottom:0px;">		

	<h1>Atualização de senha</h1>
	
<?php

$db_name = "wordpress";
$db_user = "root";
$db_pass = "th1ag0o10";
$db_host = "localhost";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$current_user = wp_get_current_user();
$userId = $current_user -> ID;
$nova_senha = md5($_POST['novaSenha']);

$query = "UPDATE wp_users SET user_pass='$nova_senha' WHERE id='$userId'";
$exec = mysqli_query($conn, $query);

//wp_set_password( $nova_senha, $userId );

if ($exec) {
	//wp_update_user(array('ID' => $userId, 'user_pass' => '$nova_senha'));
	echo "<p class=\"form-sucesso\">Sua senha foi alterada. Use a nova senha para conectar nos próximos acessos.</p>";
	echo "<a href=\"/sistemaiap/instituto/user/index.php\" class=\"btn btn-success\" title=\"Voltar para Início\">Voltar para Início</a>";
} else {
	echo "<p class=\"form-erro\">Ops. Algo errado aconteceu e não conseguimos salvar sua nova senha.</p>";
	echo "<a href=\"/altera-senha.php/\" class=\"btn btn-danger\" title=\"Tentar novamente\">Tentar novamente.</p>";
}
?>

</div>
<?php include '../inc/footer.php'; ?>