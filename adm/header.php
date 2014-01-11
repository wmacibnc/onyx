<?php 
    
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 0;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: /onyx/login.php?mensagem=4"); exit;
}


?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Onyx ADM</title>
    <base href="/onyx/adm/" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/chat.js"></script>

	<link rel="stylesheet" href="css/table_jui.css" />
  <link rel="stylesheet" href="css/style-adm.css" />
  <link rel="stylesheet" href="css/jquery-ui-1.8.4.custom.css" />
  <script type="text/javascript" src="js/jquery.mim.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    oTable = $('#example').dataTable({
      "bPaginate": true,
      "bJQueryUI": true,
      "sPaginationType": "full_numbers"
    });
  });
  </script>


<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>


<script type="text/javascript" src="../js/lightbox.js"></script>
<link href="../css/ligthbox.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="site"><a href="../index.php"><img src="../imagens/site.jpg" width="60px" heigth="auto" /></a></div>
<div id="geral">
<div id="centro">
<div id="logo"><a href="index.php"><img src="../imagens/logo.png" class="logo"></a></div>

<div id="titulo_principal">
  <table>
    <tr>
      <td><a href="curso/detalhe.php"><img src="../imagens/icone/curso.png" class="btn-curso"></a></td>
      <td><a href="certificado/index.php"><img src="../imagens/icone/certificado.png" class="btn-certificado"></a></td>
      <td><a href="#"><img src="../imagens/icone/secretaria.png" class="btn-secretaria"></a></td>
      <td><a href="../curso.php"><img src="../imagens/icone/matricula.png" class="btn-novo-curso"></a></td>
      <td><a href="forum/index.php"><img src="../imagens/icone/forum.png" class="btn-forum"></a></td>
      <td><a href="../logoff.php"><img src="../imagens/icone/sair.png" class="btn-sair"></a></td>
    </tr>
  </table>
<ul>
  <?php
    /*$id = $_SESSION['id_user'];
    $resultado = mysql_query("select * from usuario where id != ".$id."");
    while ($selecionar_usuarios=mysql_fetch_array($resultado)){
      if(mysql_num_rows($resultado)==0){
        echo "Não existe usuários";
      }else{
        ?>
         <p class="btn-institucional"><a href="javascript:void(0);" nome="<?php echo $selecionar_usuarios['nome'];?>" id="<?php echo $selecionar_usuarios['id']; ?>" class="comecar"><?php echo $selecionar_usuarios['nome'];?></a></p>

         <?php
      }
  
    }*/
?>   
  </ul> 
</div>  
<div id="menu">
    <a href='javascript:history.back()'><img src="../imagens/icone/voltar.png" align="left"/></a>
    <a href="javascript:history.forward()"><img src="../imagens/icone/avancar.png" align="right"/></a>
  </div>
  <?php if($_SESSION['UsuarioNivel'] == 1){ ?>
<div id="menu"align="center">
  <nav id="menu">
  <ul>
    <li><a href="comentario/lista.php">Coment&aacute;rio</a></li>
    <li><a href="curso/index.php">Cursos</a></li>
    <li><a href="cupom/lista.php">Cupom</a></li>
    <li><a href="turma/lista.php">Turmas</a></li>
    <li><a href="grupocurso/lista.php">Grupos</a></li>
    <li><a href="forum/">Fórum</a></li>
    <li><a href="../lista_pagina.php">Páginas</a></li>
    <li><a href="usuario/lista_usuario_turma.php">Usuários</a></li>
  </ul>
</nav>
  </div>
  <?php } ?>