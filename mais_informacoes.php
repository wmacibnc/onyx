<?php 
include("header.php");
include ("config.php");
 
    $curso_id = $_GET['curso_id'];
    $consulta = mysql_query("select * from curso where id = ".$curso_id);
    $resultado = mysql_fetch_array($consulta);
  ?>
<div id="conteudo">
	<div id="titulo_curso">
		Curso:  <?php echo $resultado['nome']; ?>
		<img src="imagens/btn-imprimir.png" class="imprimir">
		<img src="imagens/btn-enviar-amigo.png" class="enviar-amigo">
	</div>

	<div id="investimento">
		<img src="imagens/investimento.png" />
		<p>R$ <?php echo $resultado['valor']; ?>,00</p>	
	</div>

	<div id="carga_horaria">
		<img src="imagens/carga-horaria.png" />
		<p><?php echo $resultado['carga_horaria']; ?></p>
	</div>

	<div id="objetivo-curso">
		<img src="imagens/objetivo-curso.png" />
		<p><?php echo $resultado['ementa']; ?></p>
		<br />
		<p><?php echo $resultado['observacao']; ?></p>
	</div>

	<div id="conteudo-programatico">
		<img src="imagens/conteudo-programatico.png" />
		<p><?php echo $resultado['descricao']; ?></p>
	</div>

	<div id="quero-curso">
		<img src="imagens/quero-curso.png">
	</dv>

	<p><?php //echo "<a href='matricula.php?curso_id=".$resultado['id']."'><img src='imagens/icone/inscrever.png'/></a></a><br /><br /><br />"; ?>
</div>
</div>
<?php include("footer.php"); ?>