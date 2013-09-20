<?php
include("../../config.php");
include("../header.php");
?>
<form method="post" action="salva.php" enctype="multipart/form-data">

	<label>Cadastro de Grupo de Curso: </label>
	<br />

	<label>Nome: </label> <br />		
	<input type="text" name="nome" id="nome"/><br/>
	
	<label>Observacao: </label> <br />		
	<input type="text" name="observacao" id="observacao"/><br/>						

	<input type="submit" value="Enviar" />
</form>
<?php include("../footer.php"); ?>