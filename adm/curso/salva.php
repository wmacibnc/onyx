<?php 

include("../../config.php"); 
include("../header.php"); 
?>

<div id="conteudo_curso">
  
<?php

// Retirando os warning
  error_reporting(E_ALL & ~ E_NOTICE);

// Recupera os dados dos campos 
  $grupo_id = $_POST['grupo_id'];
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $ementa = $_POST['ementa'];
  $nome_pasta = $_POST['nome_pasta'];
  $observacao = $_POST['observacao'];
  $valor = $_POST['valor'];
  $validade = $_POST['validade'];
  $ativo = $_POST['ativo'];

   // Insere os dados no banco 
  $query = <<<QUERY
  INSERT INTO curso(
    grupo_id, 
    nome, 
    descricao, 
    ementa,
    nome_pasta,
    observacao,
    valor,
    validade,
    ativo
    )
VALUES (
  '$grupo_id',
  '$nome',
  '$descricao',
  '$ementa',
  '$nome_pasta',
  '$observacao',
  '$valor',
  '$validade',
  '$ativo'
  )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
if ($nao_continuar == 0){ 
  echo "Dados cadastrados com sucesso!". "<br />"; 
    // Cria a pasta do curso
  mkdir($nome_pasta);
}

echo "<a href='curso/lista_curso.php'> Lista Geral</a>";
echo "</div>";
include("../footer.php"); 
?>