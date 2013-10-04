<?php
  include("../../config.php");
  include("../header.php");
?>
<div id="conteudo_curso">
<?php

$id = $_POST['id'];

// A instrução delete irá apagar o registro com do id recebido 
$sql = 'DELETE FROM turma WHERE id='. $id;

mysql_query($sql); 
echo "<h3>Removido com sucesso!</h3>";
?>

<p><a href="turma/lista.php">Lista Geral</a></p>

<p align="center">Instituto Onyx - Todos os direitos reservados.</p>
</div>
<?php   include("../footer.php"); ?>