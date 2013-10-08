<?php
include("../header.php");
include("../../config.php");

$consulta = mysql_query("select * from questionario");

?>
<div id='conteudo_curso'>
<h3>Avalia&ccedil;&atilde;o</h3>

<form method="POST" action="curso/valida_questionario.php">
<?php 
$questionario = mysql_fetch_array($consulta);
echo "<h3>".$consulta['pergunta']."</h3>";
for ($i=1; $i <=4 ; $i++) { 
echo "<input type='radio' name='questionario' value='".$i."'>".$questionario['resposta'.$i]."<br>";
}
?>
<input type="submit" value="responder" />
</form>
</div>

<?php include ("../footer.php"); ?>