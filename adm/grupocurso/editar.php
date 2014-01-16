<?php
include("../../config.php");  
include("../header.php");  
?>

<?php
$id = $_POST['id'];
$res = mysql_query("select * from grupo_curso WHERE id='$id'");
$grupocurso=mysql_fetch_array($res);
?>
	<div id="conteudo_curso">
		<h3>Alteração de Grupo de Curso</h3>
		
  		<form method="post" action="grupocurso/atualizar.php" enctype="multipart/form-data">
  		<input type="hidden" name="id" value=" <?php echo $grupocurso['id']; ?>" />

  		<label>Nome: </label> <br />
  		<input type="text" name="nome" id="nome" value="<?php echo $grupocurso['nome']; ?>"/><br />

  		<label>Observação: </label> <br />
  		<input type="text" name="observacao" id="observacao" value="<?php echo $grupocurso['observacao']; ?>"/><br />
 
 		<input name="Editar" type="submit" value="Editar" />
		</form>

	</div>

<?php include("../footer.php");  ?>