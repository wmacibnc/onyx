<?php
include("../../config.php");
include("../header.php");
?>

<div id="conteudo_curso">
  
 Alterando ...

 <?php

$id = $_POST['id'];
$pergunta = $_POST['pergunta'];
$resposta1 = $_POST['resposta1'];
$resposta2 = $_POST['resposta2'];
$resposta3 = $_POST['resposta3'];
$resposta4 = $_POST['resposta4'];
$respostaCorreta = $_POST['respostaCorreta'];

$curso_id = $_POST['curso_id'];

/* Crio a SQL que irá ser alterado no banco de dados   */
$editar = "UPDATE `questionario` SET `pergunta` = '".$pergunta."',
`resposta1` = '".$resposta1."',
`resposta2` = '".$resposta2."',
`resposta3` = '".$resposta3."',
`resposta4` = '".$resposta4."',
`respostaCorreta` = '".$respostaCorreta."'
WHERE (`id` = ".$id.")";

mysql_query($editar) or die ('ERRO: '.mysql_error());

/* Caso não haja erros exibi a mensagem de sucesso.  */
echo '<h3>Dados Alterados com sucesso</h3> ';

echo "<a href='curso/lista_avaliacao.php?curso_id=".$curso_id."'> Lista Questões </a>";
?>


<p align="center">Instituto Onyx - Todos os direitos reservados.</p>
</div>
<?php include("../footer.php"); ?>