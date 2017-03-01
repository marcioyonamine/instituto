<?php $page_title = "iAP | Indicação"; ?>
<?php include '../inc/header.php'; ?>

<div class="container">
	
	<?php include '../inc/fixed-navbar-user.php'; ?>
	<?php include '../inc/menu-principal.php';	?>
	<div class="jumbotron">           
                
                <?php
                	$nome=$user->user_firstname;
					$email=$user->user_email;
					//$mensagem=$_POST['mensagem'];					
					$nomeIndicacao = $_POST['nomeIndicacao'];
					$emailIndicacao = $_POST['emailIndicacao'];
					$telIndicacao = $_POST['telIndicacao'];
					$msgIndicacao = $_POST['msgIndica'];
					$enviaEmail = "Olá! O trainee " . $nome ."(" . $email . ") indicou uma pessoa para participar do Treinamento de Alta Performance. Veja os detalhes abaixo:\r\n \r\n Nome do indicado: " . $nomeIndicacao . "\r\n E-mail do indicado: " . $emailIndicacao . "\r\n Telefone do indicado: " . $telIndicacao . "\r\n Mensagem de quem indicou: " . $msgIndicacao;

					if (empty($_POST))
					{
					echo "Ooops..parece que houve algum erro ao enviar sua indicação.<br>
					<a href=\"contato.php\">Clique aqui</a> para enviar novamente.";
					}
					else{

					$from="From: $nome<$email>\r\nReturn-path: $email";
					$subject="Indicação de trainee via sistema Hawk.";
					mail("caio@ialtaperformance.com", $subject, nl2br($enviaEmail), $from);
					echo "<h1 class=\"bg-success\">Indicação enviada!</h1>Sua indicação foi enviada à nossa equipe e será analisada em breve!<br><a href=\"index.php\">Continuar navegando >></a>";
					}
                ?>
                
<?php include '../inc/footer.php'; ?>