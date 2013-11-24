<?php
include("../header.php");
?>
<div id="conteudo_curso">
<form method="post" action="grupocurso/salva.php" enctype="multipart/form-data">

	<h3>Cadastro de Grupo de Curso: </h3>

	<label>Nome: </label> <br />		
	<input type="text" name="nome" id="nome"/><br/>
	
	<label>Observacao: </label> <br />		
	<input type="text" name="observacao" id="observacao"/><br/>						

	<input type="submit" value="Enviar" />
</form>
</div>
<?php include("../footer.php"); ?>