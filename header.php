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
  </head>
<body>
<div id="centro">
    <!-- centro -->

    <div id="topo">
      <div id="logo"><a href="index.php"><img src="imagens/logo.png" class="imagens_logo"></a></div>
      <div id="matricula"><a href="matricula.php"><img src="imagens/icone/icone_caderneta.png" class="imagens_icone_caderneta"> Faça sua Matricula</a></div>
      <div id="box_login">
        <h2>Área Administrativa</h2>
        <form action="validacao.php" method="post">
          <table>
            <tr>
              <td><label>Login: </label></td>
              <td><label>Senha: </label></td>
            </tr>
            <tr>
              <td><input type="text"name="usuario" value="login" onfocus="this.value = ''"/></td>
              <td><input type="password"name="senha" value="senha" onfocus="this.value = ''"/>
              </td>
            </tr>
            <tr>
              <td><input type="submit" value="Entrar" /></td>
            </tr>
          </table>
        </form>
        <form>
          <input name="curso" value="curso"/>
          <input type="button" name="pesquisar" value="Localize seu Curso">
        </form>
      </div>
    </div>

    <div id="menu">
      <div id='cssmenu'>
<ul align="center">
   <li class='active'><a href='index.php'><span>Home</span></a></li>
   <li><a href='institucional.php'><span>Institucional</span></a></li>
   <li><a href='consultoria.php'><span>Consultoria</span></a>
    <ul>
      <li><a href='consultoria_escola.php'><span>Consultorias Para Escolas</span></a></li>
      <li><a href='consultoria_empresa.php'><span>Consultorias Para Empresas</span></a></li>
    </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Cursos</span></a>
      <ul>
         <li><a href='#'><span>Pós-Graduação</span></a></li>
         <li><a href='#'><span>Profissionalizantes</span></a></li>
         <li class='last'><a href='#'><span>Graduação</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='bibiloteca.php'><span>Biblioteca</span></a></li>
   <li class='has-sub'><a href='parceiros.php'><span>Parceiros</span></a></li>
   <li class='last'><a href='contato.php'><span>Contato</span></a></li>
</ul>
</div>
    </div>

    <div id="sub_centro">
      <!-- centro -->

      <div id="banner" align="center">
        <img src="imagens/banner/banner1.png" class="imagens_banner1">
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