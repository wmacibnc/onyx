<?php
include("../header.php");
include("../../config.php");
?>
<div id='conteudo_curso'>
<h3>Avalia&ccedil;&atilde;o</h3>

<?php 
$curso_id = $_GET['curso_id'];
$usuario = $_SESSION['UsuarioID'];
// Verifica se o usuário já fez a avaliação
$consultaVerifica = mysql_query("select * from usuario_curso where usuario_id=".$usuario." AND curso_id=".$curso_id." AND certificado = 0");
$verifica = mysql_num_rows($consultaVerifica);

$consultaPergunta = mysql_query("select * from questionario where curso_id=".$curso_id);
while($array = mysql_fetch_array($consultaPergunta)){
	$pergunta[] = $array['id'];
}
$total = mysql_num_rows($consultaPergunta);
for ($i=0; $i < $total; $i++) { 
echo $pergunta[$i];
}


if($verifica == 1){
// Seta aluno como reprovado - 2
$query = mysql_query("UPDATE usuario_curso SET certificado=0
	WHERE usuario_id='$usuario' AND curso_id='$curso_id' ") or die(mysql_error());

$consulta = mysql_query("select * from questionario where curso_id=".$curso_id."");

?>

<form method="POST" action="curso/valida_questionario.php">
<?php

while($questionario=mysql_fetch_array($consulta)){
echo "<h4>".$questionario['pergunta']." ?</h4>";
for ($j=1; $j <=4 ; $j++) { 
	echo "<input type='radio' name='questionario' value='".$j."'>".$questionario['resposta'.$j]."<br>";
}
}

echo "<input type='submit' value='Responder' />
</form>";
}else{
	echo "<h4>Você já efetuo essa avaliação anteriormente!</h4>";
	echo "<p>Contate o Administrador do sistema!</p>";
}
?>

</div>

<?php include ("../footer.php"); ?>