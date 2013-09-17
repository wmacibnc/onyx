<?php
include("../../config.php");
include("../header.php");
?>

<div id="conteudo">
  
 Alterando ...

 <?php
 $id = $_POST['id'];
 $nome = $_POST['nome'];
 $datavencimento = $_POST['datavencimento'];
 $datapagamento = $_POST['datapagamento'];
 $valor = $_POST['valor'];
 $observacao = $_POST['observacao'];
 

/* Crio a SQL que irá ser alterado no banco de dados   */
$editar = "UPDATE `contapagar` SET `nome` = '".$nome."',
`datavencimento` = '".$datavencimento."',
`datapagamento` = '".$datapagamento."',
`valor` = '".$valor."',
`observacao` = '".$observacao."'  
WHERE (`id` = ".$id.")";

/* Faço a alteração no banco de dados e caso haja algum erro na inserção, será retornado através da função mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());

/* Caso não haja erros exibi a mensagem de sucesso.  */
echo 'Dados Alterados com sucesso ';


?>
<a href="lista.php"> Lista Geral </a>
<?php include("../footer.php"); ?>