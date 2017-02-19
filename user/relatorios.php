<?php $page_title = "iAP | Relatórios"; ?>
<?php include '../inc/header.php'; ?>
<?php $con = bancoMysqli();
	if (isset($_GET['p'])) {
		$p = $_GET['p'];
	} else {
		$p = "inicial";
	}

	$mensagem = "";
	if (isset($_POST['insere'])) {//insere
		$i = 0;
		$caixa = array();
		foreach ($_POST as $x => $valor) {
			if ($x != "insere") {
				$array = explode('_', $x);
				$campo = $array[0];
				$id = $array[1];
				if ($campo == "ter" OR $campo == "fazer" OR $campo == "ser" OR $campo == "fisico" OR $campo == "emocional" OR $campo == "mental" OR $campo == "espiritual") {
					$sql_update = "UPDATE iap_aceite SET $campo = '1' WHERE id = '$id'";
					$query_update = mysqli_query($con, $sql_update);
					if ($query_update) {
						//$mensagem .= "$campo = 1 Em Id: $id <br />";
					}
				} elseif ($campo == "frequencia" OR $campo == "intensidade" OR $campo == "lembrete") {
					$sql_update = "UPDATE iap_aceite SET $campo = '$valor' WHERE id = '$id'";
					$query_update = mysqli_query($con, $sql_update);
					if ($query_update) {
						//$mensagem .= "$campo = 1 Em Id: $id <br />";
					}

				}
			}

		}
	if(emailTreinador("desafio", $user->display_name)){
			gravarLog("Email enviado",$user->ID);
			
		}else{
			gravarLog("Erro ao enviar email",$user->ID);
		};
	}
?>



<div class="container">
<?php include '../inc/fixed-navbar-user.php'; ?>
<?php include '../inc/menu-principal.php'; ?>

<?php switch($p){ 
case "inicial";
$objetivo = verificaObjetivo($user->ID); 
$datas = retornaSemanas($objetivo['data_inicio']);
?>
		<div class="jumbotron">
		
		
		<?php
		$obj = ultObj($user -> ID);
		$fase_atual = verificaFase($obj['id']);
		
		if ($fase_atual == '1'){?>
			<h1>Parabéns!</h1>
			<p class="lead">O seu treinamento começa oficialmente dia <?php echo exibirDataBrOrdem($datas[1]['inicio']) ?>. </p>
			<?php }else{ ?>
			<h1>Vamos em frente!</h1>			
			<?php } ?>
			
			<p class="lead">
				Você está na <strong>Fase <?php echo $fase_atual; ?></strong>.
			</p>
			
			<p class="lead">
			Esta fase é 
		
			<?php $obj = ultObj($user -> ID);
			$fase_atual = verificaFase($obj['id']);
			if ($fase_atual == '1' || $fase_atual == '2' || $fase_atual == '3' || $fase_atual == '4') {
				echo "semanal";
			} else {
				echo "quinzenal";
			}
			?>
			 e acaba dia 
			 <?php
			switch ($fase_atual) {
				case '1' :
					echo exibirDataBrOrdem($datas[1]['fim']);
					break;

				case '2' :
					echo exibirDataBrOrdem($datas[2]['fim']);
					break;

				case '3' :
					echo exibirDataBrOrdem($datas[3]['fim']);
					break;

				case '4' :
					echo exibirDataBrOrdem($datas[4]['fim']);
					break;

				case '5' :
					echo exibirDataBrOrdem($datas[5]['fim']);
					break;

				case '2' :
					echo exibirDataBrOrdem($datas[2]['fim']);
					break;

				case '6' :
					echo exibirDataBrOrdem($datas[6]['fim']);
					break;

				case '7' :
					echo exibirDataBrOrdem($datas[7]['fim']);
					break;

				case '8' :
					echo exibirDataBrOrdem($datas[8]['fim']);
					break;

				case '9' :
					echo exibirDataBrOrdem($datas[9]['fim']);
					break;

				case '10' :
					echo exibirDataBrOrdem($datas[10]['fim']);
					break;

				default :
					echo "";
					break;
			}
			 ?>.</p>
			 
			 <p class="lead">Lembre-se de até no dia 
		<?php		
				
		switch ($fase_atual) {		
			
			case '1' :
				
				$rel = verificaRelatorio($objetivo['id'],1);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[1]['fim'];
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				echo "<strong>" . exibirDataBrOrdem($data_envio_relatorio) . "</strong>";
				//echo exibirDataBrOrdem($data_envio_relatorio);
				break;

			case '2' :
				$rel = verificaRelatorio($objetivo['id'],2);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[2]['fim'];
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				echo "<strong>" . exibirDataBrOrdem($data_envio_relatorio) . "</strong>";
				//echo exibirDataBrOrdem($datas[2]['fim']);
				break;

			case '3' :
				$rel = verificaRelatorio($objetivo['id'],3);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[3]['fim'];
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				echo "<strong>" . exibirDataBrOrdem($data_envio_relatorio) . "</strong>";
				//echo exibirDataBrOrdem($datas[3]['fim']);
				break;

			case '4' :
				$rel = verificaRelatorio($objetivo['id'],4);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[4]['fim'];
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				echo "<strong>" . exibirDataBrOrdem($data_envio_relatorio) . "</strong>";
				//echo exibirDataBrOrdem($datas[4]['fim']);
				break;

			case '5' :
				$rel = verificaRelatorio($objetivo['id'],5);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[5]['fim'];
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				echo "<strong>" . exibirDataBrOrdem($data_envio_relatorio) . "</strong>";
				//echo exibirDataBrOrdem($datas[5]['fim']);
				break;
			/*
			case '2' :
				$rel = verificaRelatorio($objetivo['id'],6);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[6]['fim'];
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				echo "<strong>" . exibirDataBrOrdem($data_envio_relatorio) . "</strong>";
				//echo exibirDataBrOrdem($datas[2]['fim']);
				break;
			 */

			case '6' :
				$rel = verificaRelatorio($objetivo['id'],6);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[6]['fim'];
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				echo "<strong>" . exibirDataBrOrdem($data_envio_relatorio) . "</strong>";
				//echo exibirDataBrOrdem($datas[6]['fim']);
				break;

			case '7' :
				$rel = verificaRelatorio($objetivo['id'],7);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[7]['fim'];
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				echo "<strong>" . exibirDataBrOrdem($data_envio_relatorio) . "</strong>";
				//echo exibirDataBrOrdem($datas[7]['fim']);
				break;

			case '8' :
				$rel = verificaRelatorio($objetivo['id'],8);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[8]['fim'];
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				echo "<strong>" . exibirDataBrOrdem($data_envio_relatorio) . "</strong>";
				//echo exibirDataBrOrdem($datas[8]['fim']);
				break;

			case '9' :
				$rel = verificaRelatorio($objetivo['id'],9);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[9]['fim'];
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				echo "<strong>" . exibirDataBrOrdem($data_envio_relatorio) . "</strong>";
				//echo exibirDataBrOrdem($datas[9]['fim']);
				break;

			case '10' :
				$rel = verificaRelatorio($objetivo['id'],10);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[10]['fim'];
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				echo "<strong>" . exibirDataBrOrdem($data_envio_relatorio) . "</strong>";
				//echo exibirDataBrOrdem($datas[10]['fim']);
				break;

			default :
				echo "";
				break;
		}
			 ?>
	
		
		preencher e enviar o relatório para o seu treinador. É isso que permitirá o avanço do seu treinamento.</p>
		
		<?php echo "<h1>Relatórios</h1>"; ?>
		
		<p>
			<?php if (isset($mensagem)) {
			 echo $mensagem;	
			}
			?>
		</p>
		
        <?php //var_dump($datas); ?>
        
		<?php 
		$sem = retornaSemana($obj['id']);
		//echo "$sem";
		for($i = $sem + 1; $i <= $sem + 1 AND $i > 0; $i--){ ?>
  
  

<div id="box-toggle">
	<hr>
   <!--<h3>Semana <?php echo $i; ?>--> 
 	<h3> 		
  		Fase:  <?php echo $datas[$i]['fase']; ?> (<?php echo exibirDataBr($datas[$i]['inicio']) ?>  a <?php echo exibirDataBr($datas[$i]['fim']) ?>)   
	</h3>
	
	<p class="lead">Conta pra gente como foi essa fase pra você =)</p>
  	
  	<div class="tgl">
	
	<?php 
		$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '".$datas[$i]['fase']."' AND objetivo = '".$objetivo['id']."'";
		$query_lista = mysqli_query($con,$sql_lista);
		$num = mysqli_num_rows($query_lista);
		if($num > 0){
	?>
    
	<div class="table-responsive">
		<table class="table table-striped" style="text-align: left;">
            <!--
            <thead>
              <tr>
                <th>Nível</th>
                <th>Desafio</th>
                <th>Ying/Yang</th>
                <th>Ter</th>
                <th>Fazer</th>
                <th>Ser</th>
                <th>Fis</th>
                <th>Emo</th>
                <th>Men</th>
                <th>Esp</th>
              </tr>
            </thead>
            -->
            <tbody>
			<?php 
		
			while($x = mysqli_fetch_array($query_lista)){ 
				$desafio = recuperaDados("iap_desafio",$x['desafio'],"id");
			?>
            <tr>                
                <td colspan="2">
                	<?php echo "<strong>Desafio:</strong><br /> " . $desafio['titulo'] . "(Nível " . $desafio['nivel'] . " - " . recTermo($desafio['yy']) . ")"; ?>
                </td>
                <td>
                	<?php echo "<strong>Foco: </strong><br />Ter: <strong style=\"color: #56C4F1;\">(" . marcaX($x['ter']) . ")&nbsp;&nbsp;&nbsp;</strong>Ser: <strong style=\"color: #56C4F1;\">(" . marcaX($x['ser']) . ")</strong>&nbsp;&nbsp;&nbsp;Fazer: <strong style=\"color: #56C4F1;\">(" . marcaX($x['fazer']) . ")</strong>"; ?>
                </td>
                <td>
                	<?php echo "<strong>Corpos: </strong><br />Físico: <strong style=\"color: #56C4F1;\">(" . marcaX($x['fisico']) . ")&nbsp;&nbsp;&nbsp;</strong>Emocional: <strong style=\"color: #56C4F1;\">(" . marcaX($x['emocional']) . ")&nbsp;&nbsp;&nbsp;</strong>Mental: <strong style=\"color: #56C4F1;\">(" . marcaX($x['mental']) . ")</strong>&nbsp;&nbsp;&nbsp;Espiritual: <strong style=\"color: #56C4F1;\">(" . marcaX($x['espiritual']) . ")</strong>"; ?>
                </td>
            </tr>
            
            <tr>               
                <td><strong>Dúvidas?</strong><br />
                	<a class="lightbox" href="#goofy"> Entenda como funciona</a>
					<div class="lightbox-target" id="goofy">
		
					<h2>Medição dos Desafios</h2>
					Nessa área vamos deixar o autodesafio palpáveis para conseguirmos mensurar o nosso desempenho com o nosso comprometimento.
					<br /><br />
					<strong>Intensidade</strong> - Nesse bloco você indicará o quão desafiante será o seu autodesafio. O importante é você definir uma intensidade bem específica e que seja desafiadora para você!
					<br /><br /> 
					Não existe certo ou errado, melhor ou pior, o mais importante é você sair da zona de conforto de forma consciente e que não te leve para a zona de saturação. Só que lembre-se que quanto mais você se desafiar, mais padrões você conseguir identificar, maior a tendência de expansão de consciência.
					  <br /><br />
					
					<strong>Frequência</strong> - Aqui você indicará quantas vezes irá realizar o desafio até a próxima fase do treinamento.
					<br /><br /> 
					Alguns desafios podemos fazer diariamente ou até mais de uma vez por dia, outros somente uma vez durante essa fase do treinamento. O importante é você definir uma frequência que seja possível dentro do seu contexto para realizar os desafios conforme você se comprometeu. 
					<br /><br />
					<strong>Atenção:</strong> Lembre que o mais importante é mantermos a disciplina com que nos comprometemos. O ego perde espaço com disciplina.
					<br /><br />
					
					<h2>Foco</h2>
					<br /><br />
					Nessa área você irá selecionar o foco da sua consciência. Qual o foco em realizar esse autodesafio? Pode selecionar mais de uma opção se fizer sentido no seu desafio.
					<br /><br />
					<strong>Ter</strong> - Nessa área o foco é ter, podendo ser algum resultado, conhecimento, experiência ou outros. Também podemos interpretar como deixar de ter. Como exemplo, deixar de ter o conforto do banho quente para observar como vou reagir a esse desconforto. Tanto para ter algo como deixar de ter, nesses casos essa opção é válida.
					<br /><br />
					<strong>Fazer</strong> - Nessa opção o foco da consciência é fazer algo ou deixar de fazer, como um hábito por exemplo. Como exemplo fazer uma coisa com a mão trocada, deixar de fazer um hábito enraizado. Se a sua intenção com esse desafios for essa, selecione essa opção. 
					<br /><br />
					<strong>Ser</strong> - O foco em Ser, está relacionado a mudança do Ser. A intenção da sua consciência está em Ser uma pessoa diferente do que você é hoje. Por exemplo quem pegou o desafio de Meditar todos os dias com a intenção de Ser mais calmo, ou de desafiar limites pré-estabelecidos para Ser mais corajoso. Se essa for a sua intenção selecione essa opção.
					<br /><br />
					<h2>Corpos</h2>
					<br /><br />
					Todos nós possuimos diferentes corpos que usamos em diferentes experiências. Por exemplo o corpo físico para fazer desafios que necessitam de força física como praticar exercícios. 
					<br /><br />
					Mas no processo de Alta Performance como uma das formas de expandirmos a consciência, podemos utilizar também do corpo mental para melhorar o desempenho nesses exercícios, por exemplo. 
					Nesse sentido para te ajudar com os autodesafios nós separamos em 4 corpos, veja abaixo a explicação de cada um e veja qual deles você irá utilizar na realização dos seus desafios nessa fase. Pode selecionar mais de uma opção.
					<br /><br />
					<strong>Físico</strong> - Corpo físico propriamente dito, envolve assuntos que vão mexer com suas condições físicas e terrenas, é o nosso corpo mais denso. Se você acredita que esse desafio mexerá fisicamente com você selecione-o para te trazer mais consciência sobre o desafio.
					<br /><br />
					<strong>Emocional</strong> - Quando você acreditar que um desafio mexerá com as suas emoções, positivamente ou negativamente, selecione essa opção. É importante observar como os autodesafios influenciam as emoções pois muitos dos nossos padrões negativos aparecem nesse corpo. Observe bem como isso acontece com você.
					<br /><br />
					<strong>Mental</strong> - Com o corpo mental que criamos soluções, materializamos a intuição e criatividade e utilizamos da lógica, esse corpo, se usado de forma íntegra, pode ser bem útil no dia a dia dos desafios, uma vez que com ele é que ativamos a razão para solucionar problemas deixando as emoções de lado. Se fizer sentido no seu desafio selecione esse campo.
					<br /><br />
					<strong>Espiritual</strong> - O corpo espiritual é o mais sutil de todos, dizemos que é a nossa conexão com algo maior e onde vive a nossa intuição. Veja se os desafios que você selecionou irão mexer com a energia do seu espírito, caso positivo, selecione esse campo.
					<br /><br />
					<strong>Atenção:</strong> Lembre-se de que não existe certo ou errado, essas opções você seleciona os corpos que acredita que serão influenciados pelo seu desafio.
					<br /><br />
					<h2>Âncora e Lembretes</h2>
					<br /><br />
					O ego utiliza do "esquecimento" como principal ferramenta para manter um hábito, e a melhor forma de quebrarmos esse padrão é colocarmos lembretes no dia a dia.
					<br /><br />
					É muito comum os participantes utilizarem o celular, post it's, anotações, lembretes na agenda para fazerem os desafios. Quanto mais formas de lembrar melhor. Para o celular é importante colocar alarmes ou notificações dos lembretes, dessa forma eles apitam todos os dias para te lembrar.
					<br /><br />
					Para Android nós conhecemos: Do It Later, Trello, e Google Keep.
					<br /><br />
					Para iPhone: Calendário do iPhone, Productive, Trello e Google Keep.
					<br /><br />
					As âncoras são instrumentos poderosos que invoca nossa disposição para realizar o que é necessário e nos faz retornar ao nosso centro quando acabamos nos desviando ou desequilibrando.
					<br /><br />
					Uma âncora que é muito fácil de ser feita. Pegue algum objeto que te faça lembrar do Treinamento de Alta Performance, e programe a sua mente falando para você mesmo: "Todas as vezes que eu olhar/pegar/ver esse objeto vou verificar os meus desafios." Deixe esse objeto sempre por perto para te ajudar a lembrar. 
					<br /><br />
					Exemplos: 
					<br /><br />
					OLFATO: Incenso / Perfume / Cheiro da natureza / 
					<br /><br />
					AUDIÇÃO: Música específica / Alarme com música entusiasmada / Sons da natureza
					<br /><br />
					TATO: Exercícios físicos / Adorno ou acessório / Golpe de Timo
					<br /><br />
					VISÃO: Tela de celular ou computador / Quadro de paisagem  / Frases empoderadoras 
					<br /><br />
					PALADAR: Toda vez que for colocar açúcar / Fazer jejum ao acordar / Toda vez que comer uma frutas 
					<br /><br />
					MENTE: Meditar / Orar / Autoconhecimento

				<a class="lightbox-close" href="#"></a>
					</div>
                </td>
                <td><strong>Frequência:</strong><br /> <?php echo $x['frequencia']; ?> </td>
      			<td><strong>Intensidade:</strong><br /> <?php echo $x['intensidade']; ?> </td>
      			<td><strong>Âncora/Lembrete:</strong><br /><?php echo $x['lembrete']; ?></td>                
           </tr>
           
           <tr><td colspan="4" style="background-color: #d7e2ef;">&nbsp;</td></tr>
       
			<?php } //while ?>                             

	    </tbody>
	</table>
</div>
    
                <?php
                
				$rel = verificaRelatorio($objetivo['id'],$i);				
				$current_date = date('Y-m-d');
				$dias = '+1';				
				$data_final_fase = $datas[$i]['fim'];
				
				$data_envio_relatorio = somarDatas($data_final_fase,$dias);
				$data_envio_relatorio2 = somarDatas($data_final_fase,"+2");
				
				//echo "$current_date <br>";
				//echo "$data_final_fase <br>";
				//echo "$data_envio_relatorio";
				//$proxima_segunda = nextMonday($current_date);
				//echo "$proxima_segunda";
				
				
				if(isset($_GET['data_teste'])){
					$data_envio_relatorio = $_GET['data_teste'];
					$data_envio_relatorio2 = somarDatas($_GET['data_teste'],"+1");
					$current_date = $_GET['hoje'];
				}
				 
				
				if($rel == FALSE){

				 ?>
				 
				 
     	<form action="relatorios.php?p=insere" method="post">
            <input type="hidden" name="fase" value="<?php echo $datas[$i]['fase']; ?>">
            <input type="hidden" name="objetivo" value="<?php echo $objetivo['id']; ?>">
            <input type="hidden" name="semana" value="<?php echo $i; ?>">
            
            <?php  if($current_date != $data_envio_relatorio && $current_date !=$data_envio_relatorio2  ){ echo "<p class=\"alert alert-warning\">Você só pode enviar o relatório no final da fase:" . exibirDataBrOrdem($data_envio_relatorio) ."</p>";}
            ?>
            
            	
            <input type="submit" class="<?php if($current_date == $data_envio_relatorio){echo "btn btn-sm btn-success";}elseif($current_date == $data_envio_relatorio2){echo "btn btn-sm btn-danger";}else{echo "btn btn-sm btn-default";} ?>" value="Escrever relatório" <?php  if($current_date != $data_envio_relatorio && $current_date !=$data_envio_relatorio2  ){ echo "disabled=\"\"";}?> >
            
		<form>
			  
            <?php }else{ ?>

			<p>Você já enviou seu relatório dessa fase.					
				
			<a href="relatorios.php?p=ler&obj=<?php echo $objetivo['id']; ?>&sem=<?php echo $i; ?>"> <br />Clique aqui para ler.</a>
					 
			<section id="contact" class="home-section bg-white">
				<div class="container">
        			<div class="row">
        				<div class="jumbotron">
        				
        				<h1>Relatório</h1>
        				<p>Objetivo: <?php echo $obj['objetivo']; ?> (Nível <?php echo $obj['nivel']; ?>)</p>
        				<p>Semana <?php echo $i; ?> Fase:  <?php echo $datas[$i]['fase']; ?> (<?php echo exibirDataBr($datas[$i]['inicio']) ?>  a <?php echo exibirDataBr($datas[$i]['fim']) ?>)</p>
						<p>Desafios: <?php echo $num; ?></p>
			
			<?php
			while ($x = mysqli_fetch_array($query_lista)) {
				$desafio = recuperaDados("iap_desafio", $x['desafio'], "id");
				echo "+ " . $desafio['titulo'] . "<br />";
			}

			$sql_lei = "SELECT * FROM relatorio_semanal WHERE objetivo = '" . $_GET['obj'] . "' AND semana = '" . $_GET['sem'] . "'";
			$query_lei = mysqli_query($con, $sql_lei);
			$lei = mysqli_fetch_array($query_lei);
			?>

        				</div>
        			</div>
			
			<div class="row">     
				<div class="form-group">
            		<div class="col-md-offset-2 col-md-8">
   					
   					<p>Dê uma nota de 0 a 10 que você dá a si mesmo para o seu desempenho nos desafios: <strong><?php echo $lei['iap_rel_nota_desafios']; ?></strong>	</p>
   					<p>	Qual foi a experiência desse período com os desafios?</p>
			
            		<p><strong><?php echo($lei['iap_rel_exp_desafios']); ?></strong></p>
					<p>O que você observou?</p>
					<p><strong><?php echo $lei['iap_rel_oq_observou']; ?></strong></p>
					<p>Como foi esse período pra você?</p>
					<p><strong><?php echo $lei['iap_rel_periodo']; ?></strong></p> 
					
					<br />
					
					<p>Enviado em <?php echo exibirDataBrOrdem($lei['data']); ?> </p>
					</div>
				</div>
			</section>
												 
				</p>
                <?php } ?>
                
                <?php } //finaliza o if
				echo "</div><hr>";
				}//finaliza o for
				?>	
			</div>
			</div>
	</div>



<?php
	break;
	case "insere":

	if(isset($_POST['insere_relatorio'])){

	$con = bancoMysqli();

	//$id = "";
	$current_user = wp_get_current_user();
	//$user_meta = get_userdata(1);

	//$nome = utf8_decode($_POST['nome']);
	$nome = utf8_decode($current_user -> user_firstname);
	$sobrenome = utf8_decode($current_user -> user_lastname);

	//$email = utf8_decode($_POST['email']);
	$email = utf8_decode($current_user->user_email);

	$userId = $current_user->ID;
	$notaDesafios = ($_POST['notaDesafios']);
	$expDesafios = ($_POST['expDesafios']);
	$oqObservou = ($_POST['oqObservou']);
	$periodo = ($_POST['periodo']);
	$semana = $_POST['semana'];
	$objetivo = $_POST['objetivo'];
	$fase = $_POST['fase'];
	
	$aprendizado = $_POST['aprendizado'];
	$msgm_si = $_POST['msg_si'];
	$msg_trainer = $_POST['msg_trainer'];
	
	//$query =

	$sql = "INSERT INTO relatorio_semanal (
	iap_rel_nota_desafios,
	iap_rel_exp_desafios,
	iap_rel_oq_observou,
	iap_rel_periodo,
	iap_rel_aprendizado,
	iap_rel_msg_si,
	iap_rel_msg_trainer,
	data,
	user_id,
	fase,
	semana,
	objetivo
	)
	VALUES (
	'$notaDesafios',
	'$expDesafios',
	'$oqObservou',
	'$periodo',
	'$aprendizado',
	'$msgm_si',
	'$msg_trainer',
	CURRENT_TIMESTAMP,
	'$userId',
	'$fase',
	'$semana',
	'$objetivo'
	)
	";
	$query = mysqli_query($con,$sql);
	if($query){
		if(emailTreinador("relatorio", $user->display_name)){
			gravarLog("Email enviado",$user->ID);
			
		}else{
			gravarLog("Erro ao enviar email",$user->ID);
		};
		?>
        <section id="contact" class="home-section bg-white">
   			<div class="container">
        		<div class="row">
        			<div class="jumbotron">
        			
        			<?php echo "<p class=\"form-sucesso\">Seu relatório de fase foi enviado e sua nova fase começa agora! =)</p>";
					echo "<a href=\"desafio.php?p=insere\" class=\"btn btn-primary\" title=\"Escolher desafios\">Escolher desafios</a>";
			 
			 

			}else{
		?>
        <section id="contact" class="home-section bg-white">
   			<div class="container">
        		<div class="row">
        			<div class="jumbotron">

					<?php echo "<p class=\"form-erro\">Ops. Algo errado aconteceu. Tente novamente.</p>";
					echo "<a href=\"relatorios.php/\" class=\"saiba-mais\" title=\"Tentar novamente\">Tentar novamente.</p>";
					//echo $sql;
					}
					?>
					</div>
				</div>
			</div>
		</section>

<?php }else{
$con = bancoMysqli();
$obj = 	ultObj($user->ID);
$objetivo = verificaObjetivo($user->ID);
$datas = retornaSemanas($objetivo['data_inicio']);
if(isset($_GET['semana'])){
	$i = $_GET['semana'];
}else{
	$i = $_POST['semana'];
}
$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '".$datas[$i]['fase']."' AND objetivo = '".$objetivo['id']."'";
$query_lista = mysqli_query($con,$sql_lista);
$num = mysqli_num_rows($query_lista);
?>
<section id="contact" class="home-section bg-white">
    <div class="container">
        <div class="row">
        <div class="jumbotron">
        <h1>Relatório</h1>
        <p>Objetivo: <?php echo $obj['objetivo']; ?> (Nível <?php echo $obj['nivel']; ?>)</p>
        <p>Semana <?php echo $i; ?> Fase:  <?php echo $datas[$i]['fase']; ?> (<?php echo exibirDataBr($datas[$i]['inicio']) ?>  a <?php echo exibirDataBr($datas[$i]['fim']) ?>)</p>
		<p>Desafios: <?php echo $num; ?></p>
<?php
			while ($x = mysqli_fetch_array($query_lista)) {
				$desafio = recuperaDados("iap_desafio", $x['desafio'], "id");
				echo "+ " . $desafio['titulo'] . "<br />";
			}
		?>

        </div>
        </div>
        
<div class="row">     
	<div class="form-group">
		<div class="col-md-offset-2 col-md-8">
		
		<script type="text/javascript">
	function validaEnvioRelatorio() {
		
		var nota = document.getElementById('notaDesafios');
		var expDesafios = document.getElementById('expDesafios');
		var oqObservou = document.getElementById('oqObservou');
		var periodo = document.getElementById('periodo');
		var aprendizado = document.getElementById('aprendizado');
		var msg_si = document.getElementById('msg_si');
		var msg_trainer = document.getElementById('msg_trainer');
		
		
		if(formRelatorio.notaDesafio.value == ""){
			alert('Você precisa preencher o campo nota');
			return false;
		}
		
		if(formRelatorio.expDesafios.value == ""){
			alert('Você precisa preencher o campo nota');
			return false;
		}
		
		if(formRelatorio.oqObservou.value == ""){
			alert('Você precisa preencher o campo nota');
			return false;
		}
		
		if(formRelatorio.periodo.value == ""){
			alert('Você precisa preencher o campo nota');
			return false;
		}
		
		if(formRelatorio.aprendizado.value == ""){
			alert('Você precisa preencher o campo nota');
			return false;
		}
		
		if(formRelatorio.msg_si.value == ""){
			alert('Você precisa preencher o campo nota');
			return false;
		}
		
		if(formRelatorio.msg_trainer.value == ""){
			alert('Você precisa preencher o campo nota');
			return false;
		}		
	}
</script>
		
		<form action="relatorios.php?p=insere" method="post" name="formRelatorio" class="form-horizontal" onSubmit="return validaEnvioRelatorio();">
				
			<p>Dê uma nota de 0 a 10 que você dá a si mesmo para o seu desempenho nos desafios:
				<select name="notaDesafios" id="notaDesafios" class="form-control" >
	                <option value="0">0</option>
	                <option value="1">1</option>
	                <option value="2">2</option>
	                <option value="3">3</option>
	                <option value="4">4</option>
	                <option value="5">5</option>
	                <option value="6">6</option>
	                <option value="7">7</option>
	                <option value="8">8</option>
	                <option value="9">9</option>
	                <option value="10">10</option>
                </select>                
			</p>

			<p>
				Qual foi a experiência desse período com os desafios?
				<textarea name="expDesafios" class="form-control" id="expDesafios"></textarea>
			</p>
			
			<p>O que você observou?
				<textarea name="oqObservou" class="form-control" id="oqObservou"></textarea>		
			</p>
			
			<p>Como foi esse período pra você?
				<textarea name="periodo" class="form-control" id="periodo"></textarea>
			</p>
			
			<p>Qual foi o maior aprendizado ou benefício pra você nessa fase?
				<textarea name="aprendizado" class="form-control" id="aprendizado"></textarea>
			</p>
			
			<p>Com este aprendizado, qual a mensagem você dá para si mesmo, para aplicá-lo na prática em sua vida a partir de agora?
				<textarea name="msg_si" class="form-control" id="msg_si"></textarea>
			</p>
			
			<p>Que mensagem gostaria de enviar para o treinador?
				<textarea name="msg_trainer" class="form-control" id="msg_trainer"></textarea>
			</p>           
            
			<p class="lead">
            <input type="hidden" name="semana" value="<?php echo $_POST['semana']; ?>">
            <input type="hidden" name="fase" value="<?php echo $_POST['fase']; ?>">
            <input type="hidden" name="objetivo" value="<?php echo $_POST['objetivo']; ?>">
			<input class="btn-primary center-block" name="insere_relatorio" type="submit" value="Enviar relatório" />
			</p>
			
		</form>
        <?php ?>	
        
        </div>
	</div>
</div>
	</div>
</section>
<?php } ?>

<?php
	break;
	case "ler":
	$con = bancoMysqli();
	$obj = 	ultObj($user->ID);
	$objetivo = verificaObjetivo($user->ID);
	$datas = retornaSemanas($objetivo['data_inicio']);
	$i = $_GET['sem'];
	$sql_lista = "SELECT * FROM iap_aceite WHERE fase = '".$datas[$i]['fase']."' AND objetivo = '".$objetivo['id']."'";
	$query_lista = mysqli_query($con,$sql_lista);
	$num = mysqli_num_rows($query_lista);
?>
<section id="contact" class="home-section bg-white">
    <div class="container">
        <div class="row">
        <div class="jumbotron">
        <h1>Relatório</h1>
        <p>Objetivo: <?php echo $obj['objetivo']; ?> (Nível <?php echo $obj['nivel']; ?>)</p>
        <p>Semana <?php echo $i; ?> Fase:  <?php echo $datas[$i]['fase']; ?> (<?php echo exibirDataBr($datas[$i]['inicio']) ?>  a <?php echo exibirDataBr($datas[$i]['fim']) ?>)</p>
		<p>Desafios: <?php echo $num; ?></p>

		<?php
			while ($x = mysqli_fetch_array($query_lista)) {
				$desafio = recuperaDados("iap_desafio", $x['desafio'], "id");
				echo "+ " . $desafio['titulo'] . "<br />";
			}

			$sql_lei = "SELECT * FROM relatorio_semanal WHERE objetivo = '" . $_GET['obj'] . "' AND semana = '" . $_GET['sem'] . "'";
			$query_lei = mysqli_query($con, $sql_lei);
			$lei = mysqli_fetch_array($query_lei);
		?>

        </div>
        </div>
        
<div class="row">     
	<div class="form-group">
		<div class="col-md-offset-2 col-md-8">
   			<p>Dê uma nota de 0 a 10 que você dá a si mesmo para o seu desempenho nos desafios: <strong><?php echo $lei['iap_rel_nota_desafios']; ?></strong></p>	
			<p>Qual foi a experiência desse período com os desafios?</p>			
            <p><strong><?php echo($lei['iap_rel_exp_desafios']); ?></strong></p>
			<p>O que você observou?</p>
			<p><strong><?php echo $lei['iap_rel_oq_observou']; ?></strong></p>
			<p>Como foi esse período pra você?</p>
	        <p><strong><?php echo $lei['iap_rel_periodo']; ?></strong></p> 
            
            <br />
            
            <p>Enviado em <?php echo exibirDataBr($lei['data']); ?> </p>
		</div>
	</div>
</section>

<?php
break;
//finaliza o switch
}
?>

<?php include '../inc/footer.php'; ?>