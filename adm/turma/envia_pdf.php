<?php

include '../../config.php';
include '../header.php';
// Recebe o nome do turma
$turma =  $_POST['turma'];
// Recebe a aula do turma
$aula = $_POST['aula'];
// Recebe o ID do turma
$turma_id = $_POST['turma_id'];
// Recebe o TIPO de conteudo
$tipo = $_POST['tipo'];

// Recebimento de arquivo
$nome_temporario=$_FILES["pdf"]["tmp_name"];
$nome_real=$_FILES["pdf"]["name"];
$pasta = $turma."/".$aula."/".$nome_real;
copy($nome_temporario,$pasta);


$query = <<<QUERY
  INSERT INTO upload(
    caminho, 
    turma_id, 
    aula,
    tipo
    )
VALUES (
  '$pasta',
  '$turma_id',
  '$aula',
  '$tipo'
  )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());

echo "<div id='conteudo_curso'>";
echo "<h3>Arquivo enviado com sucesso! </h3>";
echo "<a href='turma/lista_dados_turma.php?turma=".$turma_id."'>Lista de aulas.</a>";
echo "<p>Todos os direitos reservados - Instituto Onyx 2013</p>";
echo "</div>";
include '../footer.php';
?>	