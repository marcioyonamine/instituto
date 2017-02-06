<?php include '../inc/header.php'; ?>

<div class="container">
	<?php include '../inc/fixed-navbar-user.php'; ?>
	<?php include '../inc/menu-principal.php';	?>

	<div class="jumbotron">
		<?php echo "<h1>Histórico da pontuação</h1>"; ?>
		
		<p class="lead">Nessa página você consegue ver as suas pontuações e como está a evolução do seu treinamento. Seja 100% sincero com você mesmo e com seu desempenho quando estiver se avaliando. Não existe certo ou errado nesse treinamento, tudo é informação relevante para termos consciência de como o ego atua na nossa vida.</p>
		
		<p class="lead">Acompanhe sempre suas notas e vá ajustando a rota no seu tempo. Qualquer dúvida, fale com seu treinador. [form contato]</p>
		
		<p class="lead">Se ainda não enviou relatório, echo "você ainda não enviou nenhum relatório com nota de avaliação".</p>
		
		<p class="lead">
			Se já enviou:
			<table class="table">
				<tr>
					<td>Fase 1</td>
					<td>Nota</td>
				</tr>
			</table>
		</p>
		
		<p class="lead">Nessa mesma página vamos inserir as notas por CADA desafio, assim que tiver implementado no sistema.</p>
		
		<p class="lead">Vamos passar tbm em um campo hidden a média do sistema. A ideia é poder comparar a média das notas de cada desafio individualmente com a nota geral que o usuário se dá.</p>
		
	</div>

	
		<?php include '../inc/footer.php'; ?>
	

