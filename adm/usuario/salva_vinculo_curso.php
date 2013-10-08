<?php include ("../header.php"); include ("../../config.php");?>
<div id="conteudo_curso">
<?php 
// Recebe os dados do POST
$aluno_id = $_POST['aluno_id'];
$curso_id = $_POST['curso_id'];
$dataVinculo = $_POST['dataVinculo'];
$matricula1 = str_pad( $aluno_id, 4, '0', STR_PAD_LEFT );
$matricula2 = rand(1,10000);
$matricula = $matricula1 . $matricula2;


$query = <<<QUERY
INSERT INTO usuario_curso(
  usuario_id, 
  curso_id, 
  dataVinculo, 
  aula_atual,
  matricula
  )
VALUES (
  '$aluno_id',
  '$curso_id',
  '$dataVinculo',
  '0',
  '$matricula'
  )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
if ($nao_continuar == 0){ 
  echo "<h3>Dados cadastrados com sucesso!". "</h3>"; 
  $resultado = mysql_query("select * from usuario where id=".$aluno_id);
  $aluno = mysql_fetch_array($resultado);

  $resultado2 = mysql_query("select * from curso where id=".$curso_id);
  $curso = mysql_fetch_array($resultado2);

  echo "<h4>Usuário: ".$aluno['nome']."</h4>";
  echo "<h4>Curso: ".$curso['nome']."</h4>";
  echo "<h4>Matricula: ".$matricula."</h4>";
}
 ?>

</div>
<?php include("../footer.php"); ?>