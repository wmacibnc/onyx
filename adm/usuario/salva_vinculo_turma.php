<?php include ("../header.php"); include ("../../config.php");?>
<div id="conteudo_curso">
<?php 
// Recebe os dados do POST
$aluno_id = $_POST['aluno_id'];
$turma_id = $_POST['turma_id'];

$query = <<<QUERY
INSERT INTO turma_usuario(
  usuario_id, 
  turma_id,
  aula_atual
  )
VALUES (
  '$aluno_id',
  '$turma_id',
  '0'
  )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
if ($nao_continuar == 0){ 
  echo "<h3>Dados cadastrados com sucesso!". "</h3>"; 

  $resultado = mysql_query("select * from usuario where id=".$aluno_id);
  $aluno = mysql_fetch_array($resultado);

  $resultado2 = mysql_query("select * from turma where id=".$turma_id);
  $turma = mysql_fetch_array($resultado2);

  echo "<h4>Usuário: ".$aluno['nome']."</h4>";
  echo "<h4>Turma: ".$turma['nome']."</h4>";

}
 ?>

</div>
<?php include("../footer.php"); ?>