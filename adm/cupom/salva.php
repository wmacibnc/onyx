<?php 
include("../../config.php"); 
include("../header.php"); 
?>
<div id="conteudo_curso">
<?php

// Recupera os dados dos campos 
$nome = $_POST['nome'];
$desconto = $_POST['desconto'];
$data_vencimento = $_POST['data_vencimento'];

   // Insere os dados no banco 
    $query = <<<QUERY
    INSERT INTO cupom(
      nome,
      desconto,
      data_vencimento
      )
      VALUES (
      '$nome',
      '$desconto',
      '$data_vencimento'
      )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
   if ($nao_continuar == 0){ 
    echo "Dados cadastrados com sucesso!". "<br />"; 
    } 
    

echo "<a href='cupom/lista.php'> Lista Geral</a>";
?>
</div>
<?php
include("../footer.php"); 
?>
