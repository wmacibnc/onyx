<?php
include("../header.php");
?>
<div id="conteudo_curso">
<form method="post" action="contareceber/salva.php" enctype="multipart/form-data">

	<h3>Cadastro de Contas a Receber: </h3>

	<label>Nome: </label> <br />		
	<input type="text" name="nome" id="nome"/><br/>
	
	<label>Valor: </label> <br />		
	<input type="text" name="valor" id="valor"/><br/>
	
	<label>Data de Vencimento: </label> <br />		
	<input type="text" name="datavencimento" id="datavencimento"/><br/>
	
	<label>Data de Pagamento: </label> <br />		
	<input type="text" name="datapagamento" id="datapagamento"/><br/>
	
	<label>Observação: </label> <br />		
	<input type="text" name="observacao" id="observacao"/><br/>
	
	<input type="submit" value="Enviar" />
</form>
</div>
<?php include("../footer.php"); ?>