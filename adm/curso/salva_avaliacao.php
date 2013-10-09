<?php 

include("../../config.php"); 
include("../header.php"); 
?>

<div id="conteudo_curso">
  
<?php

// Retirando os warning
  error_reporting(E_ALL & ~ E_NOTICE);

// Recupera os dados dos campos 
  $pergunta = $_POST['pergunta'];
  $resposta1 = $_POST['resposta1'];
  $resposta2 = $_POST['resposta2'];
  $resposta3 = $_POST['resposta3'];
  $resposta4 = $_POST['resposta4'];
  $respostaCorreta = $_POST['respostaCorreta'];
  $curso_id = $_POST['curso_id'];
  
   // Insere os dados no banco 
  $query = <<<QUERY
  INSERT INTO questionario(
    pergunta, 
    resposta1, 
    resposta2, 
    resposta3,
    resposta4,
    respostaCorreta,
    curso_id
    )
VALUES (
  '$pergunta',
  '$resposta1',
  '$resposta2',
  '$resposta3',
  '$resposta4',
  '$respostaCorreta',
  '$curso_id'
  )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
if ($nao_continuar == 0){ 
  echo "<h3>Dados cadastrados com sucesso!". "</h3>"; 
}

echo "<a href='curso/lista_avaliacao.php?curso_id=$curso_id'> Lista Questão</a>";
echo "</div>";
include("../footer.php"); 
?>