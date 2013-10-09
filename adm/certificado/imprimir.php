<html>
<head>
	<title>Onyx - Certificado</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<div id="certificado" style="background-color: blue; width:50%;">
<?php  

include("../../config.php");

$usuario_id = $_POST['usuario_id'];
$curso_id = $_POST['curso_id'];

$consulta = mysql_query("SELECT * FROM usuario where id=".$usuario_id."");
$usuario = mysql_fetch_array($consulta);

$consulta2 = mysql_query("SELECT * FROM curso where id=".$curso_id."");
$curso = mysql_fetch_array($consulta2);

$consulta3 = mysql_query("SELECT * FROM usuario_curso where usuario_id=".$usuario_id." AND curso_id=".$curso_id."");
$usuario_curso = mysql_fetch_array($consulta3);

$matricula2 = 

$certificado1 = str_pad( $usuario_curso['matricula'], 4, '0', STR_PAD_LEFT );
$certificado2 = rand(1,10000);
$certificado = $certificado1.$certificado2;

echo "<h2>Certificado </h2>";
echo "<p>Certificamos que <b>".$usuario['nome']."</b> conclui com exito o curso de <b>".$curso['nome']."</b></p>";
echo "<p>Código: ".str_pad( $certificado, 12, '0', STR_PAD_LEFT )."</p>";echo "<p>Brasília, 09 de Outubro de 2013.</p>";

?>
</div>
</body>
</html>