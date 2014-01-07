<?php
session_start();
include("../../config.php");  
include("../header.php");  

$turma_id = $_GET['turma_id'];
$usuario_id = $_GET['usuario_id'];

$sql = "select * from turma_usuario WHERE turma_id=$turma_id and usuario_id=$usuario_id";
$res = mysql_query($sql); 

$consulta1 = mysql_query("select * from usuario where id=$usuario_id");
$consulta2 = mysql_query("select * from turma where id=$turma_id");

$usuario = mysql_fetch_array($consulta1);
$turma = mysql_fetch_array($consulta2);

$turma_usuario=mysql_fetch_array($res);
?>


<div id="conteudo_curso">

<h3>Dados do Usu&aacute;rio na Turma</h3>

  <h4> Usu&aacute;rio: <?php echo $usuario['nome']; ?> </h4> 
  
  <h4> Turma: <?php echo $turma['nome']; ?> </h4>

  <h4> Aula: <?php echo $turma_usuario['aula_atual']; ?> </h4>

    <form action="usuarioturma/deletar.php" method="post">
      <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>" />
      <input type="hidden" name="turma_id" value="<?php echo $turma_id; ?>" />
      <input type="submit" name="Excluir" value="Excluir" />
    </form>

<p aling="center"> Instituto Onyx - Todos os Direitos Reservados.</p>
</div>
<?php include("../footer.php");  ?>