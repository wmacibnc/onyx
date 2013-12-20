<?php

include '../../config.php';
include '../header.php';

// Recebe o ID do curso
$pasta_nome = $_POST['pasta'];
$curso_id = $_POST['curso_id'];
$aula = 1;
$tipo = $_POST['tipo'];

$nome_temporario=$_FILES["pdf"]["tmp_name"];
$nome_real=$_FILES["pdf"]["name"];
$pasta = $pasta_nome."/".$nome_real;

$query = <<<QUERY
  INSERT INTO upload(
    caminho, 
    curso_id, 
    aula,
    tipo
    )
VALUES (
  '$pasta',
  '$curso_id',
  '$aula',
  '$tipo'
  )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());

copy($nome_temporario,$pasta);
echo "<div id='conteudo_curso'>";
echo "<h3>Arquivo enviado com sucesso! </h3>";
echo "<a href='curso/adiciona_conteudo.php?curso=".$curso_id."'>Lista conteudo.</a>";
echo "<p>Todos os direitos reservados - Instituto Onyx 2013</p>";
echo "</div>";
include '../footer.php';
?>	