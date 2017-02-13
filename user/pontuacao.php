<?php $page_title = "iAP | Pontuação"; ?>
<?php include '../inc/header.php'; ?>

<div class="container">
	<?php
	include '../inc/fixed-navbar-user.php';
	?>
	<?php
		include '../inc/menu-principal.php';
	?>

	<div class="jumbotron">
		<?php echo "<h1>Histórico da pontuação</h1>"; ?>

		<p class="lead">
			Nessa página você consegue ver as suas pontuações e como está a evolução do seu treinamento. Seja 100% sincero com você mesmo e com seu desempenho quando estiver se avaliando.
		</p>

		<p class="lead">
			Não existe certo ou errado nesse treinamento, tudo é informação relevante para termos consciência de como o ego atua na nossa vida.
		</p>

		<p class="lead">
			Acompanhe sempre suas notas e vá ajustando a rota no seu tempo.
			<br />
			Qualquer dúvida, <a href="contato.php" title="Fale com seu treinador">fale com seu treinador</a>.
		</p>

		<?php 
			$user = $user -> ID;
			//echo $user;
			$obj = 	ultObj($user);
			retornaNota($user);
			
		?>

	</div>

	<?php
	include '../inc/footer.php';
	?>
