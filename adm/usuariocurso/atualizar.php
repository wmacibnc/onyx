<?php
include("../../config.php");
include("../header.php");
?>

<div id="conteudo_curso">
  
 Alterando ...

 <?php
 $usuario_id = $_POST['usuario_id'];
 $curso_id = $_POST['curso_id'];
 $matricula = $_POST['matricula'];
 $pagseguro = $_POST['pagseguro'];
 $numero_certificado = $_POST['numero_certificado'];
 $dataVinculo = $_POST['dataVinculo'];

 if(isset($_POST['situacao'])){
  $situacao = 1;
  }else{
  $situacao=0;
  }

/* Crio a SQL que ir� ser alterado no banco de dados   */

$editar = "UPDATE usuario_curso SET 
matricula = '".$matricula."',
codigoPagseguro = '".$pagseguro."',
numero_certificado = '".$numero_certificado."',
dataVinculo = '".$dataVinculo."',
situacao = '".$situacao."'  
WHERE usuario_id = ".$usuario_id." AND curso_id=".$curso_id."";

/* Fa�o a inser��o no banco de dados e caso haja algum erro na inser��o, ser� retornado atrav�s da fun��o mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());


echo 'Dados Alterados com sucesso </br >';


?>
<a href="usuario/lista_usuario_turma.php"> Lista de Usu&aacute;rios por turma. </a>

<?php include("../footer.php"); ?>