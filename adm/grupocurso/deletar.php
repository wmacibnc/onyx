<?php
  session_start();
  include("../../config.php");
  include("../header.php");
?>
<?php

$id = $_POST['id'];
// A instrução delete irá apagar o registro com do id recebido 
$sql = 'DELETE FROM convenio WHERE id='. $id;
mysql_query($sql); 
echo "Removido com sucesso!";
?>

<p><a href="lista.php">Lista Geral</a></p>
<?php   include("../footer.php"); ?>