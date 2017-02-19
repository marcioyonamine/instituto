<?php $page_title = "iAP | Fale com seu treinador"; ?>
<?php include '../inc/header.php'; ?>

<div class="container">
	
	
	
	<?php include '../inc/fixed-navbar-user.php'; ?>
	<?php include '../inc/menu-principal.php';	?>
	<div class="jumbotron" style="padding-bottom:0px; margin-bottom:0px;">
		
                
                    <h1>Contato</h1>
                    <p class="lead">
                        Está com alguma dificuldade ou precisa esclarecer algo com seu treinador? Mande uma mensagem pra ele.
                    </p>
                    
                    <br /><br />
                
                <div style="width:70%;text-align: left; margin:0 auto;">
                <form action="mensagem-enviada.php" method="POST" enctype="multipart/form-data" name="contactform" onsubmit="return validaMensagem();">       
                    
                            Mensagem:
                            <br />
                            
                            	<textarea class="form-control" name="mensagem" rows="7" cols="30" id="mensagem"></textarea>             	
                        

                        <br /><br />
                            <input class="btn btn-primary center-block" type="submit" value="Enviar mensagem" />
                           
                   
                </form>
               </div>
                
            
                </div>
		
		

	<?php include '../inc/footer.php'; ?>