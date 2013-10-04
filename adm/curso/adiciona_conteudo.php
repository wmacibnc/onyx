<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">
	<?php $curso=$_GET['curso']; ?>
	<?php $aula=$_GET['aula']; ?>
	<?php $curso_nome=$_GET['curso_nome']; ?>
	<?php $curso_id=$_GET['curso_id']; ?>

	<h3>Upload de Arquivo</h3>
	<h4>Curso: <?php echo $curso_nome; ?>  Aula: <?php echo $aula; ?></h4>

<form name="teste" method="post" action="curso/envia_pdf.php" enctype="multipart/form-data">
	<input type='hidden' name='curso' value='<?php echo $curso; ?>' />
	<input type='hidden' name='aula' value='<?php echo $aula; ?>' />
	<input type='hidden' name='curso_id' value='<?php echo $curso_id; ?>' />
<label> Selecione o arquivo que deseja enviar.</label><br /><br />
<input type="file" name="pdf" id="pdf" /><br /><br />
<input type="submit" name="envia" value="Enviar" />
</form>
<?php 
	$usuario_id=1;
	$aula_id = $aula;

	$resultado = mysql_query("select * from curso where id=".$curso_id."");
    $row = mysql_fetch_array($resultado);
    $path = $row['nome_pasta']."/".$aula_id."/";

    echo "<h4>Conteúdo já disponível</h4>";

    $diretorio = dir($path);

		while($arquivo = $diretorio -> read()){
   			if($arquivo != '.' && $arquivo !='..'){
      			echo "<a href='curso/".$path.$arquivo."'target='_blank'>".$arquivo."</a><br />";
  			}
  		}

   $diretorio -> close(); ?>
   <p align='center'>Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include('../footer.php'); ?>