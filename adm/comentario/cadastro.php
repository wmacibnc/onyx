<?php
include("../header.php");
?>
<div id="conteudo_curso">
<form method="post" action="comentario/salva.php" enctype="multipart/form-data">

	<h3>Cadastro de Comentário: </h3>

	<label>Nome: </label> <br />		
	<input type="text" name="nome" id="nome"/><br/>
	
	<label>Cidade: </label> <br />		
	<input type="text" name="cidade" id="cidade"/><br/>
	
	<label>UF: </label> <br />		
	<input type="text" name="uf" id="uf"/><br/>
	
	<label>Comentário: </label> <br />		
	<input type="text" name="texto" id="texto"/><br/>
	<br />
	<input type="checkbox" name="ativo" value="1" checked/> Ativo <br /><br />						

	<input type="submit" value="Enviar" />
</form>
</div>
<?php include("../footer.php"); ?>