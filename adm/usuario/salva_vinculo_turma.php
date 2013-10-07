<?php include ("../header.php"); include ("../../config.php");?>
<div id="conteudo_curso">
<?php 
// Recebe os dados do POST
echo $aluno_id = $_POST['aluno_id'];
echo $turma_id = $_POST['turma_id'];

$query = <<<QUERY
INSERT INTO turma_usuario(
  usuario_id, 
  turma_id
  )
VALUES (
  '$aluno_id',
  '$turma_id'
  )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
if ($nao_continuar == 0){ 
  echo "Dados cadastrados com sucesso!". "<br />"; 
}
 ?>

</div>
<?php include("../footer.php"); ?>