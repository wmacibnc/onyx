<?php
include("../../config.php");
include("../header.php");
?>

<div id="conteudo_curso">
  
 Alterando ...

 <?php
 
 $id = $_POST['id'];
 $nome = $_POST['nome'];
 $grupo_id = $_POST['grupo_id'];
 $valor = $_POST['valor'];
 $validade = $_POST['validade'];
 $carga_horaria = $_POST['carga_horaria'];
 $ativo = $_POST['ativo'];
 $descricao = $_POST['descricao'];
 $ementa = $_POST['ementa'];
 $observacao = $_POST['observacao'];

/* Crio a SQL que irá ser alterado no banco de dados   */

$editar = "UPDATE `curso` SET 
`grupo_id` = '".$grupo_id."',
`nome` = '".$nome."',
`valor` = '".$valor."',
`validade` = '".$validade."',
`carga_horaria` = '".$carga_horaria."',
`ativo` = '".$ativo."',
`descricao` = '".$descricao."',
`ementa` = '".$ementa."',
`observacao` = '".$observacao."'  
WHERE (`id` = ".$id.")";

/* Faço a inserção no banco de dados e caso haja algum erro na inserção, será retornado através da função mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());

/* Caso não haja erros exibi a mensagem de sucesso.  */
echo 'Dados Alterados com sucesso ';


?>
<a href="curso/index.php"> Lista Geral </a>
<?php include("../footer.php"); ?>