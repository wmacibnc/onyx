<?php 
session_start();
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
        <form>
          <table>
            <tr>
              <td><label>Login: </label></td>
              <td><label>Senha: </label></td>
            </tr>
            <tr>
              <td><input type="text"name="login" value="login"/></td>
              <td><input type="password"name="senha" value="senha"/>
              </td>
            </tr>
            <tr>
              <td><input type="button" name="entrar" value="Entrar"></td>
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
      menu
    </div>

    <div id="sub_centro">
      <!-- centro -->

      <div id="banner">
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