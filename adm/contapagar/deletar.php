<?php
  session_start();
  include("../../config.php");
  include("../header.php");
?>
<div id="conteudo_curso">

<?php

$id = $_POST['id'];
// A instru��o delete ir� apagar o registro com do id recebido
 
$sql = 'DELETE FROM contapagar WHERE id='. $id;
mysql_query($sql); 
echo "Removido com sucesso!";
?>

<p><a href="contapagar/lista.php">Lista Geral</a></p>
</div>
<?php   include("../footer.php"); ?>