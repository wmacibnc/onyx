<?php
  include("../../config.php");
  include("../header.php");
?>
<div id="conteudo_curso">

<?php

$id = $_POST['id'];

$consulta = mysql_query("SELECT * FROM curso WHERE id=".$id."");
$curso = mysql_fetch_array($consulta);

$curso['id'];

// Deletando a pasta
$pasta = $curso['nome_pasta'];
rmdir($pasta);

// Deletando da base de dados
$sql = 'DELETE FROM curso WHERE id='. $id;
mysql_query($sql); 


echo "Removido com sucesso!";
?>

<p><a href="curso/index.php">Lista Geral</a></p>
</div>
<?php   include("../footer.php"); ?>