<?php

include("../header.php");
include("../../config.php");


echo "<div id='conteudo_curso'>";
echo "<h3>Correção Online de Avaliação </h3>";
echo "<br />";

$usuario_id = $_SESSION['id_user'];
$curso_id = $_POST['curso_id'];
$acerto = 0;
$erro = 0;


foreach ($_SESSION['questions'] as $value) {
	if($value != ''){
		$consulta = mysql_query("select * from avaliacao where usuario_id='".$usuario_id."' and questao_id='".$value."'");
		$resultado = mysql_fetch_array($consulta);
		$totalLinhas = mysql_num_rows($consulta);

		$consulta2 = mysql_query("select * from parametrizacao where parametro='PORCENTAEMAPROVACAO'");
		$resultado2 = mysql_fetch_array($consulta2);
		$porcentagemAprovacao = $resultado2['valor'];
		
		if(($totalLinhas) >0){
		// Deleta a questão respondida anteriormente
		// Guarda somente a última
			$sql = 'DELETE FROM avaliacao WHERE id='. $resultado['id'];
			mysql_query($sql); 
		}
		
		if(isset($_POST[$value])){
			$resposta = $_POST[$value];
		}else{
			$resposta = 0;
		}
		
		// Verifica a resposta correta da pergunta
		$consulta3 = mysql_query("select * from questionario where id='".$value."'");
		$resultado3 = mysql_fetch_array($consulta3);
		$respostaCorreta = $resultado3['respostaCorreta'];

		if($resposta == $respostaCorreta){
			$acerto ++;
		}else{
			$erro ++;
		}


  // Insere os dados no banco 
		$query = <<<QUERY
		INSERT INTO avaliacao(
			usuario_id, 
			questao_id, 
			resposta
			)
VALUES (
	'$usuario_id',
	'$value',
	'$resposta'
	)
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
}
}

$totalQuestoes = $acerto + $erro;
$porcentagemAcerto = (($acerto *(100))/($totalQuestoes));
echo "Acertos: ".$acerto;
echo "<br />";
echo "Erros: ".$erro;
echo "<br />";
echo "Total de Questões: ".$totalQuestoes;;
echo "<br />";
echo "Sua Porcentagem: ".$porcentagemAcerto."%";
echo "<br />";
echo "Média para Aprovação: ".$porcentagemAprovacao."%";
echo "<br />";

echo "<h3> Resultado Final!</h3>";

if($porcentagemAcerto >= $porcentagemAprovacao){
	echo "<h4> Você está aprovado!</h4>";
	echo "<a href='certificado/index.php'>Acesse seu Certificado</a>";

$query = mysql_query ("UPDATE usuario_curso SET certificado=1 WHERE usuario_id='$usuario_id' AND curso_id='$curso_id' ") 
or die(mysql_error());
}else{
	echo "<h4> Você foi reprovado!</h4>";
	echo "<h4> Refaça as aulas e solicite novas avalição.</h4>";
	echo "<a href='index.php'>Voltar</a>";
}

echo "</div>";

include ("../footer.php");
?>