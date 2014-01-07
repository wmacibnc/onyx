<?php 
include("header.php");
include ("config.php");
 
    $curso_id = $_GET['curso_id'];
    $consulta = mysql_query("select * from curso where id = ".$curso_id);
    $resultado = mysql_fetch_array($consulta);
  ?>
<div id="conteudo">
	<h1>Mais Informações - Curso em <?php echo $resultado['nome']; ?></h1>
	
	<h4>Descrição</h4>
	<p><?php echo $resultado['descricao']; ?></p>

	<h4>Ementa</h4>
	<p><?php echo $resultado['ementa']; ?></p>

	<h4>Investimento</h4>
	<p>R$ <?php echo $resultado['valor']; ?>,00</p>

	<h4>Observação</h4>
	<p><?php echo $resultado['observacao']; ?></p>

	<h4>Validade em dias</h4>
	<p><?php echo $resultado['validade']; ?></p>

	<p><?php echo "<a href='matricula.php?curso_id=".$resultado['id']."'><img src='imagens/icone/inscrever.png'/></a></a><br /><br /><br />"; ?>

</div>
<?php include("footer.php"); ?>