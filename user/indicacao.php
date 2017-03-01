<?php $page_title = "Indicação | Treinamento de Alta Performance"; ?>
<?php
	include '../inc/header.php';
?>

<div class="container">
    <?php include '../inc/fixed-navbar-user.php';?>
    <?php include '../inc/menu-principal.php';?>
    <!-- Jumbotron -->
    <div class="jumbotron">
        <h1>Indique um amigo</h1>
        
        <div style="width:70%;text-align: left; margin:0 auto;">
            <form action="indicacao-enviada.php" method="POST" enctype="multipart/form-data" name="formIndica" onsubmit="return validaIndicacao();">
				
				Nome do amigo (obrigatório):
				<br />
				<input class="form-control" type="text" name="nomeIndicacao" id="nomeIndicacao" />
				<br />
                <br />
				E-mail do amigo(obrigatório):
				<br />
				<input class="form-control" type="email" name="emailIndicacao" id="emailIndicacao" />
				<br />
                <br />
				Telefone do amigo (com DDD):
				<br />
				<input class="form-control" type="tel" name="telIndicacao" id="telIndicacao" />
				<br />
                <br />
                Mensagem:
                <br />
                <textarea class="form-control" name="msgIndica" rows="7" cols="30" id="msgIndica" placeholder="Se preferir, conte-nos por quê está indicando este amigo."></textarea>
 				<br />
                <br />
                <input class="btn btn-primary center-block" type="submit" value="Indicar!" />

            </form>
        </div>
        
    </div>
