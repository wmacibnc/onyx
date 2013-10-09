<?php
include("../header.php");
include("../../config.php");
?>
<div id='conteudo_curso'>
<h3>Certificados Disponíveis para impreensão.</h3>

<?php 

$usuario = $_SESSION['UsuarioID'];

$consulta = mysql_query("select * from usuario_curso where usuario_id=".$usuario." and certificado=1");

while($usuario_curso=mysql_fetch_array($consulta)){
	$curso_id = $usuario_curso['curso_id'];
	$consulta2 = mysql_query("select * from curso where id=".$curso_id."");
	$curso = mysql_fetch_array($consulta2);

	echo "<h4>Curso: ".$curso['nome']."</h4>";
	echo "<form method='POST' action='certificado/imprimir.php'>
	<input type='hidden' name='usuario_id' value='".$usuario."' />
	<input type='hidden' name='curso_id' value='".$curso['id']."'>
	<input type='submit' value='Imprimir' />
</form>";
}
?>
</div>

<?php include ("../footer.php"); ?>