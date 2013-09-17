<?php
include("../../config.php");
include("../header.php");
?>
<form method="post" action="salva.php" enctype="multipart/form-data">

	<label>Cadastro de Contas a Pagar: </label>
	<br />
	<label>Nome: </label> <br />		
	<input type="text" name="nome" id="nome"/><br/>

	<label>Data de Vencimento: </label> <br />		
	<input type="text" name="datavencimento" id="datavencimento"/><br/>

	<label>Data do Pagamento: </label> <br />		
	<input type="text" name="datapagamento" id="datapagamento"/><br/>

	<label>Valor: </label> <br />		
	<input type="text" name="valor" id="valor"/><br/>

	<label>Observação: </label> <br />		
	<input type="text" name="observacao" id="observacao"/><br />
	
	<input type="submit" value="Salvar" />
</form>
<?php include("../footer.php"); ?>