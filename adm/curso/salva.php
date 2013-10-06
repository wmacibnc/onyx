<?php 
include("../../config.php"); 
include("../header.php"); 
?>

<?php

// Retirando os warning
error_reporting(E_ALL & ~ E_NOTICE);

// Recupera os dados dos campos 
$grupo_id = $_POST['grupo_id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$ementa = $_POST['ementa'];
$valor = $_POST['valor'];
$nome_pasta = $_POST['nome_pasta'];
$observacao = $_POST['observacao'];
$qtd_aula = $_POST['qtd_aula'];

$ativo = $_POST['ativo'];
$tipo = $_POST['tipo'];
$validade = $_POST['validade'];
$valideAula = $_POST['validadeAula'];

   // Insere os dados no banco 
$query = <<<QUERY
INSERT INTO curso(
  grupo_id, 
  nome, 
  descricao, 
  ementa, 
  valor,
  nome_pasta,
  observacao, 
  qtd_aula,
  validade,
  tipo,
  ativo,
  validadeAula
  )
VALUES (
  '$grupo_id',
  '$nome',
  '$descricao',
  '$ementa',
  '$valor',
  '$nome_pasta',
  '$observacao',
  '$qtd_aula',
  '$validade',
  '$tipo',
  '$ativo',
  '$validadeAula'
  )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
if ($nao_continuar == 0){ 
  echo "Dados cadastrados com sucesso!". "<br />"; 
    // Cria a pasta do curso
  mkdir($nome_pasta);

    // Cria as pastas das aulas
    // Se curso por módulo
    if(isset($tipo))  {
    for ($i=1; $i <= $qtd_aula; $i++) { 
    $diretorio = $nome_pasta."/".$i;
    mkdir($diretorio);
    }
    }else{
      $diretorio = $nome_pasta."/1";
      mkdir($diretorio);
    }
  }

echo "<a href='curso/lista_curso.php'> Lista Geral</a>";
include("../footer.php"); 
?>
