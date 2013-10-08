<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">
	<?php $turma=$_GET['turma']; ?>
	<?php $aula=$_GET['aula']; ?>
	<?php $turma_nome=$_GET['turma_nome']; ?>
	<?php $turma_id=$_GET['turma_id']; ?>

	<h3>Upload de Arquivo</h3>
	<h4>Turma: <?php echo $turma_nome; ?>  Aula: <?php echo $aula; ?></h4>

<form name="teste" method="post" action="turma/envia_pdf.php" enctype="multipart/form-data">
	<input type='hidden' name='turma' value='<?php echo $turma; ?>' />
	<input type='hidden' name='aula' value='<?php echo $aula; ?>' />
	<input type='hidden' name='turma_id' value='<?php echo $turma_id; ?>' />
<label> Selecione o arquivo que deseja enviar.</label><br /><br />
<input type="file" name="pdf" id="pdf" /><br /><br />
<input type="submit" name="envia" value="Enviar" />
</form>
<?php 
	$usuario_id=1;
	$aula_id = $aula;

	$resultado = mysql_query("select * from turma where id=".$turma_id."");
    $row = mysql_fetch_array($resultado);
    $path = $row['nome_pasta']."/".$aula_id."/";

    echo "<h4>Conteúdo já disponível</h4>";

    $diretorio = dir($path);

		while($arquivo = $diretorio -> read()){
   			if($arquivo != '.' && $arquivo !='..'){
      			echo "<a href='turma/".$path.$arquivo."'target='_blank'>".$arquivo."</a><br />";
  			}
  		}

   $diretorio -> close(); ?>
   <p align='center'>Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include('../footer.php'); ?>