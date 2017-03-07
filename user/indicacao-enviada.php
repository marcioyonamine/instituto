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
					$enviaEmail = "Olá! O trainee " . $nome ."(" . $email . ") quer convidar um amigo para participar do Treinamento de Alta Performance. Veja os detalhes abaixo:\r\n \r\n Nome do amigo convidado: " . $nomeIndicacao . "\r\n E-mail do amigo convidado: " . $emailIndicacao . "\r\n Telefone do amigo convidado: " . $telIndicacao . "\r\n Mensagem do amigo que convidou: " . $msgIndicacao;

					if (empty($_POST))
					{
					echo "Ooops..parece que houve algum erro ao enviar sua indicação.<br>
					<a href=\"contato.php\">Clique aqui</a> para enviar novamente.";
					}
					else{

					$from="From: $nome<$email>\r\nReturn-path: $email";
					$subject="Indicação de trainee via sistema Hawk.";
					mail("caio@ialtaperformance.com", $subject, nl2br($enviaEmail), $from);
					echo "<h1 class=\"bg-success\">Obrigado!</h1>Recebemos o contato do seu amigo e vamos conversar com ele para fazer o convite do treinamento.<br><a href=\"index.php\">Continuar navegando >></a>";
					}
                ?>
                
<?php include '../inc/footer.php'; ?>