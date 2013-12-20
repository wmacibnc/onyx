<?php
session_start();
include("../../config.php");
include("../header.php");
?>

<div id="conteudo_curso">
  
 Alterando ...

 <?php
 $id = $_POST['id'];
 $nome = $_POST['nome'];
 $desconto = $_POST['desconto'];
 $data_vencimento = $_POST['data_vencimento'];

/* Crio a SQL que irá ser alterado no banco de dados   */

$editar = "UPDATE `cupom` SET `nome` = '".$nome."',
`desconto` = '".$desconto."',  
`data_vencimento` = '".$data_vencimento."'
WHERE (`id` = ".$id.")";

/* Faço a inserção no banco de dados e caso haja algum erro na inserção, será retornado através da função mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());

/* Caso não haja erros exibi a mensagem de sucesso.  */
echo 'Dados Alterados com sucesso ';


?>
<a href="cupom/lista.php"> Lista Geral </a>
<?php include("../footer.php"); ?>