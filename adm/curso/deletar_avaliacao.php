<?php
  include("../../config.php");
  include("../header.php");
?>
<div id="conteudo_curso">
<?php

$id = $_POST['id'];
$curso_id = $_POST['curso_id'];

$sql = 'DELETE FROM questionario WHERE id='. $id;

mysql_query($sql); 
echo "<h3>Removido com sucesso!</h3>";

echo "<p><a href='curso/lista_avaliacao.php?curso_id=".$curso_id."'>Lista Questões</a></p>";

?>

<p align="center">Instituto Onyx - Todos os direitos reservados.</p>
</div>
<?php   include("../footer.php"); ?>