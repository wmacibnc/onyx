<?php
session_start();
include("../../config.php");  
include("../header.php");  
?>

<?php
$id = $_POST['id'];
$res = mysql_query("select * from parametrizacao WHERE id='$id'");
$parametrizacao=mysql_fetch_array($res);
?>
	<div id="conteudo_curso">
		<h3>Alteração de Parametro</h3>
		
  			<form method="post" action="parametrizacao/atualizar.php" enctype="multipart/form-data">
  			<input type="hidden" name="id" value=" <?php echo $parametrizacao['id']; ?>" />

  <label>Parametro: <?php echo $parametrizacao['parametro']; ?></label> <br />

  <label>Valor: </label> <br />
  <input type="text" name="valor" id="valor" value="<?php echo $parametrizacao['valor']; ?>"/><br />
 
 <input name="Editar" type="submit" value="Editar" />
</form>

</div>

<?php include("../footer.php");  ?>