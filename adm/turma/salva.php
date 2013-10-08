<?php 
include("../../config.php"); 
include("../header.php"); 
echo "<div id='conteudo_curso'>";
// Retirando os warning
error_reporting(E_ALL & ~ E_NOTICE);

// Recupera os dados dos campos 
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$ementa = $_POST['ementa'];
$quantidade = $_POST['quantidade'];
$dataInicio = $_POST['dataInicio'];
$valor = $_POST['valor'];
$observacao = $_POST['observacao'];
$nome_pasta = $_POST['nome_pasta'];
$qtd_mod = $_POST['qtd_mod'];
$validade = $_POST['validade'];
$validadeModulo = $_POST['validadeModulo'];
$ativo = $_POST['ativo'];

   // Insere os dados no banco 
    $query = <<<QUERY
    insert into turma(
      nome,
      descricao,
      ementa,
      quantidade,
      dataInicio,
      valor,
      observacao,
      nome_pasta,
      qtd_mod,
      validade,
      validadeModulo,
      ativo
      )
      VALUES (
      '$nome',
      '$descricao',
      '$ementa',
      '$quantidade',
      '$dataInicio',
      '$valor',
      '$observacao',
      '$nome_pasta',
      '$qtd_mod',
      '$validade',
      '$validadeModulo',
      '$ativo'
        )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());

   // Se os dados forem inseridos com sucesso 
    echo "<h3><br /> Turma Cadastrada com sucesso! </h3>". "<br />";
    mkdir($nome_pasta);
  
  for ($i=1; $i <=$qtd_mod ; $i++) { 
      mkdir($nome_pasta."/".$i);
      }    

  
echo "<a href='turma/lista.php'> Lista Geral</a>";
echo "<p align='center'>Instituto Onyx - Todos os direitos reservados.</p>";

echo "</div>";
include("../footer.php"); 
?>
