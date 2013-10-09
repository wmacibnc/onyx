<?php 
if (!isset($_SESSION)) session_start();
include("config.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br" >
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="keywords" content="Instituto Onyx" />
  <meta name="description" content="Cursos Online" />
  <meta name="generator" content="Mister W Informática" />
  <title>Instituto Onyx</title>
  <link href="css/estilo.css" rel="stylesheet" type="text/css" />
<!-- Banner -->
 <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.jDiaporama.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  <!-- Banner -->

</head>
<body>
  <div id="centro">

    <div id="logo"><a href="index.php"><img src="imagens/logo.png" class="imagens_logo"></a></div>
    <div id="matricula"><a href="matricula.php"><img src="imagens/icone/faca-matricula.png" class="imagens_icone_caderneta"></a>
    </div>
    <div id="box_login">
      <h2>Área Administrativa</h2>
      <form action="validacao.php" method="post">
        <table>
          <tr>
            <td><label>Login: </label></td>
            <td><label>Senha: </label></td>
          </tr>
          <tr>
            <td><input type="text"name="usuario" value="login" onfocus="this.value = ''" size="8"/></td>
            <td><input type="password"name="senha" value="senha" onfocus="this.value = ''" size="8"/></td>
            <td><input type="submit" value="Entrar" /></td>
          </tr>
        </table>
      </form>
    </div>
    
    <div id="menu" align='center'>
      <nav align="center"> 
      <ul class="menu">
       <li><a href='index.php'>Home</a></li>
       <li><a href='institucional.php'>Institucional</a></li>
       <li><a href='consultoria.php'>Consultoria</a>
        <ul>
          <li><a href='consultoria_escola.php'>Consultorias Para Escolas</a></li>
          <li><a href='consultoria_empresa.php'>Consultorias Para Empresas</a></li>
        </ul>
      </li>
      <li><a href='#'>Cursos</a>
        <ul>
         <li><a href='#'>Pós-Graduação</a></li>
         <li><a href='#'>Profissionalizantes</a></li>
         <li><a href='#'>Graduação</a></li>
       </ul>
     </li>
     <li><a href='bibiloteca.php'>Biblioteca</a></li>
     <li><a href='parceiros.php'>Parceiros</a></li>
     <li><a href='contato.php'>Contato</a></li>
   </ul>
   </nav>
 </div> 
  <div id="banner" align="center">
   <ul class="diaporama1">
      <li><img src="imagens/banner/banner1.png" alt="Instituto Onyx" title="Instituto Onyx" width="768px" heigth="auto"/></li>
      <li><img src="imagens/banner/banner2.png" alt="Instituto Onyx" title="Instituto Onyx" width="768px" heigth="auto" /></li>
      <li><img src="imagens/banner/banner3.png" alt="Instituto Onyx" title="Instituto Onyx" width="768px" heigth="auto" /></li>
      <li><img src="imagens/banner/banner4.png" alt="Instituto Onyx" title="Instituto Onyx" width="768px" heigth="auto" /></li>
      <li><img src="imagens/banner/banner5.png" alt="Instituto Onyx" title="Instituto Onyx" width="768px" heigth="auto" /></li>
    </ul>  
</div>

<div id="destaque">
  <div id="destaque_titulo">
    <h2 class="titulo_destaque">Faça agora um curso Online Grátis<h2>
    </div>
    <div id="destaque_banner1">
      <a href="#"><img src="imagens/curso/curso1.png" class="imagens_box_destaque"></a>
    </div>
    <div id="destaque_banner2">
      <a href="#"><img src="imagens/curso/curso2.png" class="imagens_box_destaque"></a>
    </div>
    <div id="destaque_banner3">
      <a href="#"><img src="imagens/curso/curso3.png" class="imagens_box_destaque"></a>
    </div>
    <div id="destaque_banner4">
      <a href="#"><img src="imagens/curso/curso4.png" class="imagens_box_destaque"></a>
    </div>
    <div id="destaque_banner5">
      <a href="#"><img src="imagens/curso/curso5.png" class="imagens_box_destaque"></a>
    </div>

  </div>