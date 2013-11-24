<?php 
include ("../header.php"); 
include ("../../config.php");
?>

<div id="conteudo_curso">
  <?php 

// Recebe os dados do POST
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $turma_id = $_POST['turma_id'];
  $ativo = 0;
  $senha = 'onyx';

  $query_usuario = <<<QUERY
  insert into usuario(
    nome,
    login,
    email,
    ativo,
    senha)
VALUES(
  '$nome',
  '$email',
  '$email',
  '$ativo',
  '$senha')
QUERY;

mysql_query($query_usuario) or die ('ERRO: '.mysql_error());

// Pega o último usuário cadastrado, e faz o vinculo com a turma
$res=mysql_query("SELECT * FROM usuario ORDER BY id ASC");
while($nl=mysql_fetch_array($res)){
  @$aluno_id = $nLoop.$nl['id'];
}

$query_turma_usuario = <<<QUERY
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
mysql_query($query_turma_usuario) or die ('ERRO: '.mysql_error());

echo "<h3>Dados cadastrados com sucesso!". "</h3>"; 

$resultado = mysql_query("select * from usuario where id=".$aluno_id);
$aluno = mysql_fetch_array($resultado);

$resultado2 = mysql_query("select * from turma where id=".$turma_id);
$turma = mysql_fetch_array($resultado2);

echo "<h4>Usuário: ".$aluno['nome']."</h4>";
echo "<h4>Turma: ".$turma['nome']."</h4>";

?>

</div>
<?php include("../footer.php"); ?>