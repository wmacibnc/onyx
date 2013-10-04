<?php 
include("../../config.php"); 
include("../header.php"); 
echo "<div id='conteudo_curso'>";
// Retirando os warning
error_reporting(E_ALL & ~ E_NOTICE);

// Recupera os dados dos campos 
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];

   // Insere os dados no banco 
    $query = <<<QUERY
    INSERT INTO turma(
      nome, 
      quantidade
      )
      VALUES (
        '$nome',
        '$quantidade'
        )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
   if ($nao_continuar == 0){ 
    echo "<h3><br /> Dados cadastrados com sucesso! </h3>". "<br />"; 
    } 
      

   // Se houver mensagens de erro, exibe-as 
   if (count($error) != 0) { 
   	foreach ($error as $erro) { 
   		echo $erro . ""; 
   	} 
   } 

echo "<a href='turma/lista.php'> Lista Geral</a>";

echo "<p align='center'>Instituto Onyx - Todos os direitos reservados.</p>";

echo "</div>";
include("../footer.php"); 
?>
