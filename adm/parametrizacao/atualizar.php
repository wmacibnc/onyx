<?php
session_start();
include("../../config.php");
include("../header.php");
?>

<div id="conteudo_curso">
  
 Alterando ...

 <?php
 $id = $_POST['id'];
 $valor = $_POST['valor'];

/* Crio a SQL que irá ser alterado no banco de dados   */

$editar = "UPDATE `parametrizacao` SET `valor` = '".$valor."'  
WHERE (`id` = ".$id.")";

/* Faço a inserção no banco de dados e caso haja algum erro na inserção, será retornado através da função mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());

/* Caso não haja erros exibi a mensagem de sucesso.  */
echo 'Dados Alterados com sucesso ';


?>
<a href="parametrizacao/lista.php"> Lista Geral </a>
<?php include("../footer.php"); ?>