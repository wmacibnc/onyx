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

/* Crio a SQL que ir� ser alterado no banco de dados   */

$editar = "UPDATE `grupo_curso` SET `nome` = '".$nome."',
`observacao` = '".$observacao."'  
WHERE (`id` = ".$id.")";

/* Fa�o a inser��o no banco de dados e caso haja algum erro na inser��o, ser� retornado atrav�s da fun��o mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());

/* Caso n�o haja erros exibi a mensagem de sucesso.  */
echo 'Dados Alterados com sucesso ';


?>
<a href="grupocurso/lista.php"> Lista Geral </a>
<?php include("../footer.php"); ?>