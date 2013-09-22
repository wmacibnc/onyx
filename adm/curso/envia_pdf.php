<?php

include '../../config.php';
include '../header.php';
// Recebe o nome do curso
$curso =  $_POST['curso'];
// Recebe a aula do curso
$aula = $_POST['aula'];
// Recebe o ID do curso
$curso_id = $_POST['curso_id'];

$nome_temporario=$_FILES["pdf"]["tmp_name"];
$nome_real=$_FILES["pdf"]["name"];
$pasta = $curso."/".$aula."/".$nome_real;
copy($nome_temporario,$pasta);
echo "<div id='conteudo_curso'>";
echo "<h3>Arquivo enviado com sucesso! </h3>";
echo "<a href='lista_dados_curso.php?curso=".$curso_id."'>Lista de aulas.</a>";
echo "<p>Todos os direitos reservados - Instituto Onyx 2013</p>";
echo "</div>";
include '../footer.php';
?>	