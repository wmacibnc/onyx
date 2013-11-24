<?php
session_start();
include("../../config.php");  
include("../header.php");  
?>

<?php
$id = $_POST['id'];
$res = mysql_query("select * from comentario WHERE id='$id'");
$comentario=mysql_fetch_array($res);
?>
	<div id="conteudo_curso">
		<h3>Alteração de Comentário</h3>
		
  			<form method="post" action="comentario/atualizar.php" enctype="multipart/form-data">
  			<input type="hidden" name="id" value=" <?php echo $comentario['id']; ?>" />

  <label>Nome: </label> <br />
  <input type="text" name="nome" id="nome" value="<?php echo $comentario['nome']; ?>"/><br />

  <label>Cidade: </label> <br />
  <input type="text" name="cidade" id="cidade" value="<?php echo $comentario['cidade']; ?>"/><br />
  
  <label>Comentário: </label> <br />
  <input type="text" name="texto" id="texto" value="<?php echo $comentario['texto']; ?>"/><br />
  
	<?php if($comentario['ativo'] == 1){ ?>
	<input type="checkbox" name="ativo" value="1" checked/> Ativo <br /><br />
	<?php } ?>			
	
	<?php if($comentario['ativo'] == 0){ ?>
	<input type="checkbox" name="ativo" value="0"/> Ativo <br /><br />
	<?php } ?>
  
   <input name="Editar" type="submit" value="Editar" />
</form>

</div>

<?php include("../footer.php");  ?>