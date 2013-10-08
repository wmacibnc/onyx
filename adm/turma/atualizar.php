<?php
include("../../config.php");
include("../header.php");
?>

<div id="conteudo_curso">
  
 Alterando ...

 <?php
 $id = $_POST['id'];
 $nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$ementa = $_POST['ementa'];
$quantidade = $_POST['quantidade'];
$dataInicio = $_POST['dataInicio'];
$valor = $_POST['valor'];
$observacao = $_POST['observacao'];
$nome_pasta = $_POST['nome_pasta'];
$qtd_mod = $_POST['qtd_mod'];
$validade = $_POST['validade'];
$validadeModulo = $_POST['validadeModulo'];
$ativo = $_POST['ativo'];

/* Crio a SQL que irá ser alterado no banco de dados   */
$editar = "UPDATE `turma` SET `nome` = '".$nome."',
`descricao` = '".$descricao."',
`ementa` = '".$ementa."',
`quantidade` = '".$quantidade."',
`dataInicio` = '".$dataInicio."',
`valor` = '".$valor."',
`observacao` = '".$observacao."',
`nome_pasta` = '".$nome_pasta."',
`qtd_mod` = '".$qtd_mod."',
`validade` = '".$validade."',
`validadeModulo` = '".$validadeModulo."',
`ativo` = '".$ativo."'
WHERE (`id` = ".$id.")";

/* Faço a alteração no banco de dados e caso haja algum erro na inserção, será retornado através da função mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());

/* Caso não haja erros exibi a mensagem de sucesso.  */
echo '<h3>Dados Alterados com sucesso</h3> ';


?>
<a href="turma/lista.php"> Lista Geral </a>

<p align="center">Instituto Onyx - Todos os direitos reservados.</p>
</div>
<?php include("../footer.php"); ?>