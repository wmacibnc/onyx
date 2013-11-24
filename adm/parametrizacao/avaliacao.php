<?php
include("../header.php");
include("../../config.php");
?>
<div id='conteudo_curso'>
<h3>Avalia&ccedil;&atilde;o</h3>

<?php 
$curso_id = $_GET['curso_id'];
$usuario = $_SESSION['UsuarioID'];
?>

<form method="POST" action="curso/valida_questionario.php">

	<?php
		$consulta = mysql_query("select * from questionario where curso_id=".$curso_id);
		$data = array();
			while($questionario=mysql_fetch_array($consulta)){
			$id = $questionario['id'];
			$data[]= ($id);
			echo "<h4>".$questionario['pergunta']." ?</h4>";
				for ($j=1; $j <=4 ; $j++) { 
					echo "<input type='radio' name='questionario".$id."[]' value='".$j."'>".$questionario['resposta'.$j]."<br>";
				}
			}
			print_r ($data);
			$_SESSION['questionario'] = ($data);
			
			
	?>
<input type='hidden' value='<?php print_r ($data);?>' name='ids'/>
<input type='submit' value='Responder' />
</form>
</div>

<?php include ("../footer.php"); ?>