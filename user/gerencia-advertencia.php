<?php $page_title = "Gerenciar Advertências | iAP"; ?>
<?php include '../inc/header.php'; ?>
<?php
$con = bancoMysqli();
$level = get_currentuserinfo();
?>
<div class="container">
	<?php include '../inc/fixed-navbar-trainer.php'; ?>
	<?php include '../inc/menu-trainer.php';	?>

	<div class="jumbotron">
		<?php echo "<h1>Gerenciar Advertências</h1>"; ?>
	</div>