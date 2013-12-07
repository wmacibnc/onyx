<?php
session_start();
include("../../config.php");  
include("../header.php");  

$curso_id = $_GET['curso_id'];
$usuario_id = $_GET['usuario_id'];

$sql = "select * from usuario_curso WHERE curso_id=$curso_id and usuario_id=$usuario_id";
$res = mysql_query($sql); 

$consulta1 = mysql_query("select * from usuario where id=$usuario_id");
$consulta2 = mysql_query("select * from curso where id=$curso_id");

$usuario = mysql_fetch_array($consulta1);
$curso = mysql_fetch_array($consulta2);

$usuario_curso=mysql_fetch_array($res);
?>


<div id="conteudo_curso">

<h3>Atualiza&ccedil;&atilde;o  de Usu&aacute;rio - Curso</h3>

  <form method="post" action="usuariocurso/atualizar.php" enctype="multipart/form-dat">

  <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>" />
  <input type="hidden" name="curso_id" value="<?php echo $curso_id; ?>" />

  <h4> Usu&aacute;rio: <?php echo $usuario['nome']; ?> </h4> 
  
  <h4> Curso: <?php echo $curso['nome']; ?> </h4>
  
  <label> Matricula: </label>   <br />
  <input type="text" name="matricula" id="matricula" value="<?php echo $usuario_curso['matricula']; ?>"/><br/>

  <label>C&oacute;digo PagSeguro: </label>   <br />
  <input type="text" name="pagseguro" id="pagseguro" value="<?php echo $usuario_curso['codigoPagseguro']; ?>" /><br/>

  <label>N&uacute;mero Certificado: </label>   <br />
  <input type="text" name="numero_certificado" id="numero_certificado" value="<?php echo $usuario_curso['numero_certificado']; ?>" /><br/>

  <label>Data Vinculo: </label>   <br />
  <input type="text" name="dataVinculo" id="dataVinculo" value="<?php echo $usuario_curso['dataVinculo']; ?>" /><br/>

  <label>Situa&ccedil;&atilde;o: </label>    <br />
  
  <?php

  if($usuario_curso['situacao'] == 1){ ?>
    <input type="checkbox" name="situacao" value="1" checked/> situacao <br /><br />
    <?php } ?>      

    <?php 
    if($usuario_curso['situacao'] == 0){ 
      ?>
      <input type="checkbox" name="situacao" value="0"/> situacao <br /><br />
      <?php } ?>

      <input name="Editar" type="submit" value="Editar" />
     
</form>

</div>
<?php include("../footer.php");  ?>