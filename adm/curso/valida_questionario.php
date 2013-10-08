<?php

include("../header.php");
include("../../config.php");
$consulta = mysql_query("select * from questionario");
$resultado = mysql_fetch_array($consulta);
$respostaCorreta = $resultado['respostaCorreta'];
$questionario = $_POST['questionario'];

echo "<div id='conteudo_curso'>";
echo "<h3>Validando Informações </h3>";
echo "<br />";
echo "Sua Resposta: " . $questionario;
echo "<br />";
echo "Resposta Correta: " . $respostaCorreta;
echo "<br />";
if($questionario == $respostaCorreta){
	echo "Resposta Correta!";
}else{
	echo "Resposta Errada!";
}
echo "</div>";

include ("../footer.php");
?>