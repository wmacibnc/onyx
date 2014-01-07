<?php
session_start();
include("../../config.php");  
include("../header.php"); 
?>

<div id="conteudo_curso">

<?php

$id = $_POST['id'];
// A instrução delete irá apagar o registro com do id recebido 
$sql = 'DELETE FROM usuario WHERE id='. $id;
mysql_query($sql); 

// Excluindo vinculo com curso
$sql = 'DELETE FROM usuario_curso WHERE usuario_id='. $id;
mysql_query($sql); 

// Excluindo vinculo com turma
$sql = 'DELETE FROM turma_usuario WHERE usuario_id='. $id;
mysql_query($sql); 

echo "Removido com sucesso!";
?>

<p><a href="usuario/lista_usuario_turma.php">Lista de Usu&aacute;rios</a></p>

</div>

<?php   include("../footer.php"); ?>