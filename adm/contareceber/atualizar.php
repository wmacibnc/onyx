<?php
session_start();
include("../../config.php");
include("../header.php");
?>

<div id="conteudo">
  
 Alterando ...

 <?php
 $id = $_POST['id'];
 $categoria_id = $_POST['categoria_id'];
 $nome = $_POST['nome'];
 $logo = $_FILES["logo"];
 $resumo = $_POST['resumo'];
 $slogan = $_POST['slogan'];
 $desconto = $_POST['desconto'];
 $servico = $_POST['servico'];
 $endereco = $_POST['endereco'];
 $cep = $_POST['cep'];
 $bairro = $_POST['bairro'];
 $cidade = $_POST['cidade'];
 $uf = $_POST['uf'];
 $email = $_POST['email'];
 $telefone = $_POST['telefone'];
 $observacao = $_POST['observacao'];
 

// Se a logo estiver sido selecionada 
 if (!empty($logo["name"])) {   

// Largura máxima em pixels 
  $largura = 1000; 
// Altura máxima em pixels 
  $altura = 1000; 
// Tamanho máximo do arquivo em bytes 
  $tamanho = 5000000; 

// Verifica se o arquivo é uma logo 
  if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $logo["type"])){ 
    $error[1] = "Isso não é uma logo."; 
  }   
// Pega as dimensões da logo 
  $dimensoes = getimagesize($logo["tmp_name"]);   
// Verifica se a largura da logo é maior que a largura permitida 
  if($dimensoes[0] > $largura) { 
    $error[2] = "A largura da logo não deve ultrapassar ".$largura." pixels";
  }   
 // Verifica se a altura da logo é maior que a altura permitida 
  if($dimensoes[1] > $altura) { 
   $error[3] = "Altura da logo não deve ultrapassar ".$altura." pixels";
 }   
  // Verifica se o tamanho da logo é maior que o tamanho permitido 
 if($logo["size"] > $tamanho) { $error[4] = "A logo deve ter no máximo ".$tamanho." bytes";
}   
   // Se não houver nenhum erro 
if (count(@$error) == 0) {   
   // Pega extensão da logo 
 preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $logo["name"], $ext);   
   // Gera um nome único para a logo 
 $nome_logo = md5(uniqid(time())) . "." . $ext[1];   
   // Caminho de onde ficará a logo 
 $caminho_logo = "../uploads/convenio/" . $nome_logo;   
   // Faz o upload da logo para seu respectivo caminho 
 move_uploaded_file($logo["tmp_name"], $caminho_logo);   
}
}
if (empty($logo["name"])) { 
  $nome_logo = $_POST['logo_old'];
}
/* Crio a SQL que irá ser alterado no banco de dados   */
$editar = "UPDATE `convenio` SET `nome` = '".$nome."',
`logo` = '".$nome_logo."',
`resumo` = '".$resumo."',
`categoria_id` = '".$categoria_id."',
`slogan` = '".$slogan."',
`desconto` = '".$desconto."',
`servico` = '".$servico."',
`endereco` = '".$endereco."',
`cep` = '".$cep."',
`bairro` = '".$bairro."',
`cidade` = '".$cidade."',
`uf` = '".$logo."',
`email` = '".$email."',
`telefone` = '".$telefone."',
`observacao` = '".$observacao."'  
WHERE (`id` = ".$id.")";

/* Faço a inserção no banco de dados e caso haja algum erro na inserção, será retornado através da função mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());

/* Caso não haja erros exibi a mensagem de sucesso.  */
echo 'Dados Alterados com sucesso ';


?>
<a href="lista.php"> Lista Geral </a>
<?php include("../footer.php"); ?>