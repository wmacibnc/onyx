<?php 
if (!isset($_SESSION)) session_start();
include("config.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br" >
<head>
  <script type="text/javascript">
  function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
      if (tecla==8 || tecla==0) return true;
      else  return false;
    }
  } 
  </script>
  <script>
  function changeDisplay(id) {
// Se estiver visivel inverte ou vice-versa
var div = document.getElementById(id);

if (div.className=='invisivel')
  div.className='visivel';
else
  div.className='invisivel';
}
</script>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow" />
<meta name="keywords" content="Instituto Onyx" />
<meta name="description" content="Cursos Online" />
<meta name="generator" content="Mister W Informática" />

<title>Instituto Onyx</title>

<link href="css/estilo.css" rel="stylesheet" type="text/css" />

<!-- Banner -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Banner -->

  <!-- tabs -->
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
  
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="js/jquery.ui.css.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />


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


<!-- validação -->
<script type="text/javascript" src="js/jquery.validate.js"></script>
<!-- / validação -->

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

<link rel="stylesheet" type="text/css" href="css/tabcontent.css" />
<script type="text/javascript" src="js/tabcontent.js"> </script>

      <!-- jQuery library (served from Google) -->
      <script src="js/jquery.min.js"></script>

      <script src="js/jquery.bxslider.min.js"></script>
      <script src="js/jquery.bxslider.js"></script>

      <!-- bxSlider CSS file -->
      <link href="css/jquery.bxslider.css" rel="stylesheet" />

      <script type="text/javascript">
        $(document).ready(function(){
        $('.bxslider').bxSlider({
        auto: true,
        autoControls: true
        });
        });
      </script>


</head>
<body>
  <div id="matricula"><a href="curso.php"><img src="imagens/matriculas.png"></a></div>
  <div id="centro">
    <div id="logo"><a href="index.php"><img src="imagens/logo.png" class="imagens_logo"></a>
      <form method="GET" action="curso.php" enctype="multipart/form-data">
        <input type="text" name="curso" value="O que você quer aprender ?" onfocus="this.value = ''" size="30px" class="pesquisar_input" />
        <input type="image" name="imagem" src="imagens/icone/pesquisar.png" alt="Buscar curso" class="btn-curso" />
      </form>
    </div>
    <div id="box_login" align="right">
      <form action="validacao.php" method="post">

        <?php if(!isset($_SESSION['UsuarioID'])){ ?>

        <div id="login_box">
            <label style="margin: 0 0 0 -24px;color:#464637;font-weight:bold;">Área do Aluno</label>
              <input type="text"name="usuario" value="E-mail" size="25" onfocus="this.value = ''" class="login_input" />
              <input type="password"name="senha" value="senha" size="25" onfocus="this.value = ''" class="login_input" />
              <input type="submit" value="OK" class="btn-azul" />
        </div>

        <div id="esqueci_senha_box" align="right">
            <label>
              <a href="#" class="esqueci">esqueci a senha</a>
            </label>
        </div>

        <div id="matricula_box" align="right">
            <a href="curso.php" class="matricule">
              <img src="imagens/matricula.png" />
            </a>
        </div>

        <div id="contato_box">
            <a href="contato.php">
              <img src="imagens/icone/fundo_contato.png" />
            </a>
        </div>


        <?php }else{
          echo "Olá, ".$_SESSION['UsuarioNome'];
          echo "<br />";
          echo "<a href='adm/index.php'><img src='imagens/icone/adm-login.png' /> </a>  ";
          echo "<a href='logoff.php'><img src='imagens/icone/logoff.png' /></a> <br />";
        } ?>
      </form>

      <div id="facebook_box">
        <div data-href="https://www.facebook.com/institutoonyx" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-show-faces="false" data-send="true" class="fb-like fb_edge_widget_with_comment fb_iframe_widget" fb-xfbml-state="rendered"><span style="height: 24px; width: 450px;"><iframe id="f171c13634" name="f14d813348" scrolling="no" title="Like this content on Facebook." class="fb_ltr" src="https://www.facebook.com/plugins/like.php?api_key=113869198637480&amp;channel_url=https%3A%2F%2Fs-static.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D27%23cb%3Df51e52608%26domain%3Ddevelopers.facebook.com%26origin%3Dhttps%253A%252F%252Fdevelopers.facebook.com%252Ff3f6004914%26relation%3Dparent.parent&amp;colorscheme=light&amp;extended_social_context=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Finstitutoonyx&amp;layout=standard&amp;locale=pt_BR&amp;node_type=link&amp;sdk=joey&amp;send=true&amp;show_faces=false&amp;width=450" style="border: none; overflow: hidden; height: 24px; width: 450px;"></iframe></span></div>
      </div>

    </div>
  </div>
  <div id="menu">
    <div id="centro_menu">
      <nav class="menu"> 
        <ul>
         <li><a href='index.php'>Home</a></li>
         <li><a href='institucional.php'>Institucional</a></li>
         <li><a href='consultoria.php'>Consultoria</a></li>
         <li><a href='#'>Cursos</a>
          <ul>
            <li><a href='curso.php'>Profissionalizantes</a></li>
            <li><a href='extensao_universitaria.php'>Extensão Universitária</a></li>
            <li><a href='pos_graducao.php'>Pós-Graduação</a></li>
          </ul>
        </li>
        <li><a href='bibiloteca.php'>Biblioteca</a></li>
        <li><a href='parceiros.php'>Parceiros</a></li>
        <li><a href='contato.php'>Contato</a></li>
      </ul>
    </nav>
  </div>
</div>

<div id="centro">