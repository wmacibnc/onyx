<?php
session_start();
include("../../config.php");  
include("../header.php");  
?>

<?php
$id = $_POST['id'];
$res = mysql_query("select * from contareceber WHERE id='$id'");
$contareceber=mysql_fetch_array($res);
?>
	<div id="conteudo_curso">
		<h3>Alteração de Conta a Receber</h3>
		
  			<form method="post" action="contareceber/atualizar.php" enctype="multipart/form-data">
  			<input type="hidden" name="id" value=" <?php echo $contareceber['id']; ?>" />

  <label>Nome: </label> <br />
  <input type="text" name="nome" id="nome" value="<?php echo $contareceber['nome']; ?>"/><br />

  <label>Valor: </label> <br />
  <input type="text" name="valor" id="valor" value="<?php echo $contareceber['valor']; ?>"/><br />
  
  <label>Data Vencimento: </label> <br />
  <input type="text" name="datavencimento" id="datavencimento" value="<?php echo $contareceber['datavencimento']; ?>"/><br />
  
  <label>Data Pagamento: </label> <br />
  <input type="text" name="datapagamento" id="datapagamento" value="<?php echo $contareceber['datapagamento']; ?>"/><br />
  
  <label>Observação: </label> <br />
  <input type="text" name="observacao" id="observacao" value="<?php echo $contareceber['observacao']; ?>"/><br />
   
   <input name="Editar" type="submit" value="Editar" />
</form>

</div>

<?php include("../footer.php");  ?>