<?php

include("../header.php");
// Recebe o nome do arquivo
echo $arquivo = $_GET['arquivo'];
echo "<div id='conteudo_curso'>";
echo "<h3>conteudo</h3>";

echo "<embed src='curso/".$arquivo."' width='800px' height='600px'/>";
echo "</div>";

include ("../footer.php");
?>