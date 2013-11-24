<?php 
include("../../config.php"); 
include("../header.php"); 
?>
<div id="conteudo_curso">
<?php

// Retirando os warning
error_reporting(E_ALL & ~ E_NOTICE);

// Recupera os dados dos campos 
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$datavencimento = $_POST['datavencimento'];
$datapagamento = $_POST['datapagamento'];
$observacao = $_POST['observacao'];


   // Insere os dados no banco 
    $query = <<<QUERY
    INSERT INTO contapagar(
      nome,
      valor,
      datavencimento,
      datapagamento,
      observacao)
      VALUES (
        '$nome',
        '$valor',
        '$datavencimento',
        '$datapagamento',
        '$observacao'
        )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
   if ($nao_continuar == 0){ 
    echo "Dados cadastrados com sucesso!". "<br />"; 
    } 
   
   // Se houver mensagens de erro, exibe-as 
   if (count($error) != 0) { 
   	foreach ($error as $erro) { 
   		echo $erro . ""; 
   	} 
   } 

echo "<a href='contapagar/lista.php'> Lista Geral</a>";
?>
</div>
<?php
include("../footer.php"); 
?>
