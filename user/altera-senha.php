<?php $page_title = "iAP | Alterar senha"; ?>
<?php include '../inc/header.php'; ?>

<div class="container">	
	
<?php include '../inc/fixed-navbar-user.php'; ?>
<?php include '../inc/menu-principal.php';	?>

<div class="jumbotron" style="padding-bottom:0px; margin-bottom:0px;">
	
<h1>Alterar senha</h1>

<p class="lead">
	Insira sua nova senha no campo abaixo para alterá-la:
</p>

<form action="senha-alterada.php" method="post" name="formAlteraSenha" class="form-control" style="padding:0px !important;">
    <input class="form-control" name="novaSenha" type="password" />
    <input class="btn btn-success" name="alterarSenha" type="submit" value="Alterar" style="margin-top:1% !important;" />
</form>

</div>

<?php include '../inc/footer.php'; ?>