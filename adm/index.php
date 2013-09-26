<?php 

include('header.php');

echo "Página Restrita <br />";
		echo $_SESSION['UsuarioNome'];
echo "<br /><a href='curso/lista_curso.php'>Cursos</a>";
echo "<br /><a href='../logoff.php'>Sair</a>";
?>
<?php include('footer.php'); ?>