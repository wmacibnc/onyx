<?php 
include("../../config.php"); 
include("../header.php"); 
?>

<?php

// Retirando os warning
error_reporting(E_ALL & ~ E_NOTICE);

// Recupera os dados dos campos 
$nome = $_POST['nome'];
$observacao = $_POST['observacao'];

   // Insere os dados no banco 
    $query = <<<QUERY
    INSERT INTO grupo_curso(
      nome,
      observacao)
      VALUES (
        '$nome',
        '$observacao')
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

echo "<a href='lista.php'> Lista Geral</a>";
include("../footer.php"); 
?>
