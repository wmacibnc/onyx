<?php 
include('header.php');

echo "<div id='conteudo_curso'>";

echo "Página Restrita <br />";
echo $_SESSION['UsuarioNome'];
echo "<br />Definir Página Inicial";

echo "</div>";
include('footer.php'); ?>