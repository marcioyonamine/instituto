<?php include '../inc/header.php'; ?>

<?php 

		$objetivo = verificaObjetivo($user->ID); 
		$obj = 	ultObj($user->ID);
		echo $obj['id'];
		?>
		 <p class="lead">Você está na fase <b><?php $fase_atual = verificaFase($obj['id']); echo $fase_atual; ?> </b>. Veja abaixo os desafios da fase <?php  $fase = $fase_atual + 1; echo $fase; ?> </p>    
