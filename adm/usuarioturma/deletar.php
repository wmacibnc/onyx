<?php
  include("../../config.php");
  include("../header.php");
?>
<div id="conteudo_curso">
<?php

$usuario_id = $_POST['usuario_id'];
$turma_id = $_POST['turma_id'];

$sql = 'DELETE FROM turma_usuario WHERE usuario_id='. $usuario_id." AND turma_id=".$turma_id;
mysql_query($sql); 
echo "Removido com sucesso!";
?>

<p><a href="usuario/lista_usuario_turma.php">Lista de Usu&aacute;rios</a></p>

</div>
<?php   include("../footer.php"); ?>