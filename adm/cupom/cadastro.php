<?php
include("../header.php");
?>
<div id="conteudo_curso">
<form method="post" action="cupom/salva.php" enctype="multipart/form-data">

	<h3>Cadastro de Cupom: </h3>

	<label>Nome: </label> <br />		
	<input type="text" name="nome" id="nome"/><br/>
	
	<label>Desconto (%): </label> <br />		
	<input type="text" name="desconto" id="desconto"/><br/>						

	<label>Data Vencimento: </label> <br />		
	<input type="text" name="data_vencimento" id="data_vencimento"/><br/>						

	<input type="submit" value="Enviar" />
</form>
</div>
<?php include("../footer.php"); ?>