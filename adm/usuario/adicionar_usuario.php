<?php 
include ("../header.php"); 
include ("../../config.php");
?>

<div id="conteudo_curso">
  <?php 

// Recebe os dados do POST
  $nome = $_POST['nome'];
  $email = $_POST['email'];
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

echo "<h3>Dados cadastrados com sucesso!". "</h3>"; 

$resultado = mysql_query("select * from usuario where id=".$aluno_id);
$aluno = mysql_fetch_array($resultado);

echo "<h4>Usuário: ".$aluno['nome']."</h4>";
?>

</div>
<?php include("../footer.php"); ?>