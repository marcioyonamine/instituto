<?php include '../inc/header.php'; ?>
<?php 
//if($user['caps']['administrator'] == TRUE){
$admin = get_currentuserinfo();
if($admin->user_level == 10){
?>
<?php 

		$objetivo = verificaObjetivo($user->ID); 
		$ver = verificaSegunda($objetivo['id'],retornaSemana($objetivo['id']));
		$obj = 	ultObj($user->ID);
		echo $obj['id'];
		$semana = retornaSemana($objetivo['id']);
		?>
		 <p class="lead">Você está na fase <b><?php $fase_atual = verificaFase($obj['id']); echo $fase_atual; ?> </b>. Veja abaixo os desafios da fase <?php  $fase = $fase_atual + 1; echo $fase; ?> </p>    

         <?php echo var_dump(verificaSegunda($objetivo['id'],retornaSemana($user->ID)));; ?>
<p><?php echo somarDatas(date('Y-m-d'),-7); ?></p>
<pre>
	<?php var_dump($user); ?>
</pre>
["ID"]=>
  int(5)
  ["caps"]=>
  array(1) {
    ["subscriber"]=>
    bool(true)
    <?php }else{ ?>
    	<p>Você não é administrador.</p>
<?php } ?>