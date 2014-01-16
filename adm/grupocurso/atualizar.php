<?php
include("../../config.php");
include("../header.php");
?>

<div id="conteudo_curso">
  
 Alterando ...

 <?php
 $id = $_POST['id'];
 $nome = $_POST['nome'];
 $observacao = $_POST['observacao'];

/* Crio a SQL que irá ser alterado no banco de dados   */

$editar = "UPDATE `grupo_curso` SET `nome` = '".$nome."',
`observacao` = '".$observacao."'  
WHERE (`id` = ".$id.")";

/* Faço a inserção no banco de dados e caso haja algum erro na inserção, será retornado através da função mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());

/* Caso não haja erros exibi a mensagem de sucesso.  */
echo 'Dados Alterados com sucesso ';


?>
<a href="grupocurso/lista.php"> Lista Geral </a>
<?php include("../footer.php"); ?>