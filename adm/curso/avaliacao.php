<?php
include("../header.php");
include("../../config.php");
?>
<div id='conteudo_curso'>
<h3>Avalia&ccedil;&atilde;o</h3>

<?php 
$curso_id = $_GET['curso_id'];
$usuario = $_SESSION['UsuarioID'];

$consulta = mysql_query("select * from questionario where curso_id=".$curso_id."");

// Verifica se o usuário já fez a avaliação
$consultaVerifica = mysql_query("select * from usuario_curso where usuario_id='".$usuario."' AND curso_id='".$curso_id."'");
$resultado = mysql_fetch_array($consultaVerifica);
$situacaoCertificado = $resultado['certificado'];

$consultaPergunta = mysql_query("select * from questionario where curso_id=".$curso_id);
while($array = mysql_fetch_array($consultaPergunta)){
	$pergunta[] = $array['id'];
}

if($situacaoCertificado != 1){
?>

<form method="POST" action="curso/valida_questionario.php">
<input type="hidden" name="curso_id" value="<?php echo $curso_id; ?>"> 
<?php
$questions = array('');
while($questionario=mysql_fetch_array($consulta)){

echo "<h4>".$questionario['pergunta']." ?</h4>";
for ($j=1; $j <=4 ; $j++) { 
	echo "<input type='radio' name='".$questionario['id']."' value='".$j."'>".$questionario['resposta'.$j]."<br>";
}
array_push($questions, $questionario['id']);
}
$_SESSION['questions'] = $questions;
echo "<input type='submit' value='Responder' />
</form>";
}else{
	echo "<h4>Você já efetuo essa avaliação anteriormente!</h4>";
	echo "<a href='certificado/index.php'>Acesse seu Certificado</a>";
	echo "<p>Contate o Administrador do sistema em caso de dúvidas e/ou problemas!</p>";
}
?>

</div>

<?php include ("../footer.php"); ?>