<?php 
include("../../config.php"); 
include("../header.php"); 
echo "<div id='conteudo_curso'>";
// Retirando os warning
error_reporting(E_ALL & ~ E_NOTICE);

// Recupera os dados dos campos 
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$curso_id = $_POST['curso_id'];
$dataInicio = $_POST['dataInicio'];

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
    echo "<h3><br /> Turma Cadastrada com sucesso! </h3>". "<br />"; 
    } 
  
// Fazendo o vinculo da turma ao curso
// Incluindo a data de inicio da turma

  $res=mysql_query("SELECT * FROM turma ORDER BY id ASC");
    while($nl=mysql_fetch_array($res)){
      @$id_turma = $nLoop.$nl['id'];
    }

  // Insere os dados no banco 
   $query = <<<QUERY
    INSERT INTO turma_curso(
      turma_id, 
      curso_id,
      dataInicio
      )
      VALUES (
        '$id_turma',
        '$curso_id',
        '$dataInicio'
        )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
   if ($nao_continuar == 0){ 
    echo "<h3><br /> Vinculo Efetuado com sucesso! </h3>". "<br />"; 
    } 


echo "<a href='turma/lista.php'> Lista Geral</a>";

echo "<p align='center'>Instituto Onyx - Todos os direitos reservados.</p>";

echo "</div>";
include("../footer.php"); 
?>
