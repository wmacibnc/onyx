<?php include ("../header.php"); include ("../../config.php");?>
<div id="conteudo_curso">
<?php 
// Recebe os dados do POST
echo $aluno_id = $_POST['aluno_id'];
echo $curso_id = $_POST['curso_id'];
echo $dataVinculo = $_POST['dataVinculo'];


$query = <<<QUERY
INSERT INTO modulo_usuario_curso(
  usuario_id, 
  curso_id, 
  dataVinculo, 
  aula_atual
  )
VALUES (
  '$aluno_id',
  '$curso_id',
  '$dataVinculo',
  '0'
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