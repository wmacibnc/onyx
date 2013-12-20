<?php
session_start();
include("../../config.php");  
include("../header.php");  
?>

<?php
$id = $_POST['id'];
$res = mysql_query("select * from cupom WHERE id='$id'");
$cupom=mysql_fetch_array($res);
?>
	<div id="conteudo_curso">
		<h3>Alteração de Cupom</h3>
		
  	<form method="post" action="cupom/atualizar.php" enctype="multipart/form-data">
  			<input type="hidden" name="id" value=" <?php echo $cupom['id']; ?>" />

  <label>Nome: </label> <br />
  <input type="text" name="nome" id="nome" value="<?php echo $cupom['nome']; ?>"/><br />

  <label>Desconto (%): </label> <br />
  <input type="text" name="desconto" id="desconto" value="<?php echo $cupom['desconto']; ?>"/><br />

  <label>Data de Vencimento: </label> <br />
  <input type="text" name="data_vencimento" id="data_vencimento" value="<?php echo $cupom['data_vencimento']; ?>"/><br />
 
 <input name="Editar" type="submit" value="Editar" />
</form>

</div>

<?php include("../footer.php");  ?>