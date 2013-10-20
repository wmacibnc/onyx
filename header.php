<?php 
if (!isset($_SESSION)) session_start();
include("config.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br" >
<head>
  <base href="/onyx/" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="keywords" content="Instituto Onyx" />
  <meta name="description" content="Cursos Online" />
  <meta name="generator" content="Mister W Informática" />
  <title>Instituto Onyx</title>
  <link href="css/estilo.css" rel="stylesheet" type="text/css" />
  <!-- Banner -->
  <link rel="stylesheet" href="css/liquid-slider.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <!-- Banner -->

  <!--  CEP -->

  <!-- API de consulta de CEP - correio control -->
  <script>
  function atualizacep(cep){
    cep = cep.replace(/\D/g,"")
    url="http://cep.correiocontrol.com.br/"+cep+".js"
    s=document.createElement('script')
    s.setAttribute('charset','utf-8')
    s.src=url
    document.querySelector('head').appendChild(s)
  }

  function correiocontrolcep(valor){
    if (valor.erro) {
      alert('Cep não encontrado');
      return;
    };
    document.getElementById('endereco').value=valor.logradouro
    document.getElementById('bairro').value=valor.bairro
    document.getElementById('cidade').value=valor.localidade
    document.getElementById('uf').value=valor.uf
    $('#cidade-bairro').html(valor.bairro + "-" + valor.uf);
    $('#UF_SEPARADA').attr('value', valor.uf);
  }
  </script>
  <!-- API de consulta de CEP - correio control CEP -->


<!--
  jCarousel library
-->
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
<!--
  jCarousel skin stylesheet
-->
<link rel="stylesheet" type="text/css" href="css/skin.css" />

<script type="text/javascript">

jQuery(document).ready(function() {
  jQuery('#mycarousel').jcarousel();
});

</script>

</head>
<body>
  <div id="centro">
    <div id="logo"><a href="index.php"><img src="imagens/logo.png" class="imagens_logo"></a>
      <form method="post" action="curso.php">
        <input type="text" name="curso" value="O que você quer aprender ?" onfocus="this.value = ''" onblur="this.value='O que você quer aprender ?'" size="30px" class="btn-pesquisa-curso" />
        <input type="image" src="imagens/icone/pesquisar.jpg" alt="Buscar curso" class="btn-curso" align="botton" />
      </form>
    </div>
    <div id="box_login">
      <form action="validacao.php" method="post">
        <table>
          <tr>
            <td> </td>
            <td><label>E-mail </label></td>
            <td><label>Senha </label></td>
            
          </tr>
          <tr>
            <td><label style="margin: 0 0 0 -24px;color:#333333;">Área do Aluno</label></td>
            <td><input type="text"name="usuario" value="E-mail" onfocus="this.value = ''" size="8" onblur="this.value='E-mail'"/></td>
            <td><input type="password"name="senhasenha" value="senha" onfocus="this.value = ''" size="8" onblur="this.value='senhasenha'"/></td>
            <td><input type="submit" value="ok" /></td>
            <td><a href="curso.php" class="matricule"><label>Matricule-se</label></a></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><label><a href="#" class="esqueci">esqueci a senha</a></label></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div id="menu" align='center'>
    <nav id="menu"> 
      <ul>
       <li><a href='index.php'>Home</a></li>
       <li><a href='institucional.php'>Institucional</a></li>
       <li><a href='consultoria.php'>Consultoria</a></li>
       <li><a href='curso.php'>Cursos</a></li>
       <li><a href='bibiloteca.php'>Biblioteca</a></li>
       <li><a href='parceiros.php'>Parceiros</a></li>
       <li><a href='contato.php'>Contato</a></li>
     </ul>
   </nav>
 </div> 
 <div id="centro">
   <div id="banner" align="center">
    <div class="liquid-slider"  id="main-slider">
      <div>
        <img src="imagens/banner/banner1.png">
      </div>
      <div>
        <img src="imagens/banner/banner2.png">
      </div>
      <div>
        <img src="imagens/banner/banner3.png">
      </div>          
      <div>
        <img src="imagens/banner/banner4.png">
      </div>
      <div>
        <img src="imagens/banner/banner5.png">
      </div>
    </div>
  </div>
  
  
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.touchSwipe.min.js"></script>
<script src="js/jquery.liquid-slider.min.js"></script> 
<script> $('#main-slider').liquidSlider();</script>