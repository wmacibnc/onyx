<?php

include '../../config.php';
include '../header.php';
// Recebe o nome do turma
$turma =  $_POST['turma'];
// Recebe a aula do turma
$aula = $_POST['aula'];
// Recebe o ID do turma
$turma_id = $_POST['turma_id'];

$nome_temporario=$_FILES["pdf"]["tmp_name"];
$nome_real=$_FILES["pdf"]["name"];
$pasta = $turma."/".$aula."/".$nome_real;
copy($nome_temporario,$pasta);
echo "<div id='conteudo_curso'>";
echo "<h3>Arquivo enviado com sucesso! </h3>";
echo "<a href='turma/lista_dados_turma.php?turma=".$turma_id."'>Lista de aulas.</a>";
echo "<p>Todos os direitos reservados - Instituto Onyx 2013</p>";
echo "</div>";
include '../footer.php';
?>	