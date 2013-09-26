<?php 
include("header.php");
/* FORMULÁRIO DE CONTATO CRIADO POR Wesley Martins
EMAIL: wmacibnc@hotmail.com*/


$nome = "$_POST[nome]"; //pega o nome do remetente
$email = "$_POST[email]"; //pega o email do remetente
$receptor = "wmacibnc@gmail.com"; //seu email
$mensagem = "$_POST[mensagem]"; //mensagem
$assunto = "$_POST[assunto]"; //assunto
$telefone = "$_POST[telefone]"; //assunto

#Pega o nome e o email e mostra no cabeÃ§alho do email receptor
$header = "From: ". $nome . " <" . $email . ">"; 

#condiÃ§Ãµes de envio. Se os campos nome, email, assunto e 
#mensagem nÃ£o forem preenchido serÃ¡ mostrado uma mensagem de erro.
if (($nome == "") || ($email == "") || ($assunto == "") || ($telefone == "")  || ($mensagem == "")) 
{
  echo "Atencao! Todos os campos do formulario devem ser preenchidos.";
}
else #caso todos os campos sejam preenchido, o envio sera realizado.
{
  if(mail($receptor, $assunto, $mensagem, $header))
    echo "$nome, seu emai foi enviado com sucesso!";
  else
    echo "O email falhou ao enviar";
}
?>

<br />
<a href="index.php">Voltar</a>
<?php include("footer.php");  ?>
