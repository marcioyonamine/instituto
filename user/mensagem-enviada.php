<?php $page_title = "iAP | Fale com seu treinador"; ?>
<?php include '../inc/header.php'; ?>

<div class="container">
	
	
	
	<?php include '../inc/fixed-navbar-user.php'; ?>
	<?php include '../inc/menu-principal.php';	?>
	<div class="jumbotron">           
                
                <?php
					$nome=$user->user_firstname;
					$email=$user->user_email;
					$mensagem=$_POST['mensagem'];

					if (empty($_POST))
					{
					echo "Ooops..parece que houve algum erro ao enviar sua mensagem<br>
					<a href=\"contato.php\">Clique aqui</a> para enviar novamente.";
					}
					else{

					$from="From: $nome<$email>\r\nReturn-path: $email";
					$subject="Contato de trainee via sistema Hawk.";
					mail("thiagonegro@gmail.com", $subject, $mensagem, $from);
					echo "<h1 class=\"bg-success\">Mensagem enviada!</h1>Sua mensagem foi enviada ao treinador e será respondida em breve!<br><a href=\"index.php\">Continuar navegando >></a>";
					}
                ?>
                
<?php include '../inc/footer.php'; ?>