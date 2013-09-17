<?php 
include("../../config.php"); 
include("../header.php"); 
?>
<?php ini_set('upload_max_filesize','30M'); ini_set('post_max_size','30M'); ini_set('max_input_time',300); ini_set('max_execution_time',300); ?>

<?php

// Retirando os warning
error_reporting(E_ALL & ~ E_NOTICE);

// Recupera os dados dos campos 
$categoria_id = $_POST['categoria_id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$resumo = $_POST['resumo'];
$slogan = $_POST['slogan'];
$desconto = $_POST['desconto'];
$servico = $_POST['servico'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$observacao = $_POST['observacao'];

// Imagem Logo
$logo = $_FILES["logo"];

// Se a imagem estiver sido selecionada 
if (!empty($logo["name"])) {   

// Largura máxima em pixels 
$largura = 30000; 
// Altura máxima em pixels 
$altura = 30000; 
// Tamanho máximo do arquivo em bytes 
$tamanho = 500000000; 

$error;
// Verifica se o arquivo é uma imagem 
if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $logo["type"])){ 
$error[1] = "Isso não é uma imagem."; 
}   
// Pega as dimensões da imagem 
$dimensoes = getimagesize($logo["tmp_name"]);   
// Verifica se a largura da imagem é maior que a largura permitida 
if($dimensoes[0] > $largura) { 
$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
 }   
 // Verifica se a altura da imagem é maior que a altura permitida 
 if($dimensoes[1] > $altura) { 
 $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
  }   
  // Verifica se o tamanho da imagem é maior que o tamanho permitido 
  if($logo["size"] > $tamanho) { $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
   }   
   // Se não houver nenhum erro 
   if (count($error) == 0) {   
   // Pega extensão da imagem 
   preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $logo["name"], $ext);   
   // Gera um nome único para a imagem 
   $nome_imagem = md5(uniqid(time())) . "." . $ext[1];   
   // Caminho de onde ficará a imagem 
   $caminho_imagem = "../uploads/convenio/" . $nome_imagem;   
   // Faz o upload da imagem para seu respectivo caminho 
   move_uploaded_file($logo["tmp_name"], $caminho_imagem);  

   // Insere os dados no banco 
    $query = <<<QUERY
    INSERT INTO convenio(categoria_id, nome, telefone, email, resumo, logo, slogan, desconto, servico, cep, endereco, bairro, cidade, uf, observacao)
      VALUES ('$categoria_id','$nome','$telefone','$email','$resumo','$nome_imagem','$slogan','$desconto','$servico','$cep','$endereco','$bairro','$cidade','$uf','$observacao')
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
   if ($nao_continuar == 0){ 
    echo "Dados cadastrados com sucesso!". "<br />"; 
    } 
   }   

   // Se houver mensagens de erro, exibe-as 
   if (count($error) != 0) { 
   	foreach ($error as $erro) { 
   		echo $erro . ""; 
   	} 
   } 
} 
echo "<a href='lista.php'> Lista Geral</a>";
include("../footer.php"); 
?>
