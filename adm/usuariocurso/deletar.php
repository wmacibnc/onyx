<?php
  include("../../config.php");
  include("../header.php");
?>
<div id="conteudo_curso">
<?php

$usuario_id = $_POST['usuario_id'];
$curso_id = $_POST['curso_id'];

$sql = 'DELETE FROM usuario_curso WHERE usuario_id='. $usuario_id." AND curso_id=".$curso_id;
mysql_query($sql); 
echo "Removido com sucesso!";
?>

<p><a href="usuario/lista_usuario_turma.php">Lista de Usu&aacute;rios</a></p>

</div>
<?php   include("../footer.php"); ?>