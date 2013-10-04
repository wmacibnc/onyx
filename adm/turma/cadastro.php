<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">
<form method="post" action="turma/salva.php" enctype="multipart/form-data">

	<h3>Cadastro de Turma: </h3>
	<br />
	<label>Nome: </label> <br />		
	<input type="text" name="nome" id="nome" maxlength="20"/>
	<br /> <br />

	<label>Capacidade de Alunos: </label> <br />		
	<input type="text" name="quantidade" id="quantidade" maxlength="3"/><br/>

	<br />
	<input type="submit" value="Salvar" />
</form>
<p align="center">Instituto Onyx - Todos os direitos reservados.</p>
</div>
<?php include("../footer.php"); ?>