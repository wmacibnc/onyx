<?php
include("../../config.php");
include("../header.php");
?>

<div id="conteudo_curso">
  
 Alterando ...

 <?php
 $id = $_POST['id'];
 $nome = $_POST['nome'];
 $quantidade = $_POST['quantidade'];

/* Crio a SQL que ir� ser alterado no banco de dados   */
$editar = "UPDATE `turma` SET `nome` = '".$nome."',
`quantidade` = '".$quantidade."'
WHERE (`id` = ".$id.")";

/* Fa�o a altera��o no banco de dados e caso haja algum erro na inser��o, ser� retornado atrav�s da fun��o mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());

/* Caso n�o haja erros exibi a mensagem de sucesso.  */
echo '<h3>Dados Alterados com sucesso</h3> ';


?>
<a href="turma/lista.php"> Lista Geral </a>

<p align="center">Instituto Onyx - Todos os direitos reservados.</p>
</div>
<?php include("../footer.php"); ?>