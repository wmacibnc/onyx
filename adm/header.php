<?php 
  include_once "../config.php";

  
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;

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
</head>
<body>
<div id="geral">
<div id="centro">
  <div id="topo">
<div id="logo"><a href="index.php"><img src="../imagens/logo.png" class="logo"></a></div>
<div id="titulo_principal">
  <p class="titulo_principal" align="center">Área Administrativa</p>
  <a href="../logoff.php"><img src="../imagens/icone/logoff.png" class="imagem_logoff"></a>
</div>
</div>

<div id="conteudo">
  <div id="menu">
      <p class="btn"><a href="#">Home</a></p>
      <p class="btn"><a href="curso/detalhe.php">Meus Cursos</a></p>
      <p class="btn"><a href="#">Certificados</a></p>
      <p class="btn"><a href="#">Chat</a></p>
      <p class="btn"><a href="#">Fórum</a></p>
      <p class="btn"><a href="#">Promoções</a></p>
      <p class="btn"><a href="#">Inscrições</a></p>
      <p class="btn"><a href="#">Contato</a></p>
      <p class="btn"><a href="curso/cadastro.php">Novo Curso</a></p>
      <p class="btn"><a href="curso/lista_curso.php">Adm Cursos</a></p>
    <div id="banner_institucional">
      <h4 align='center'>Bate-Papo</h4>
      <ul>
  <?php
    $id = $_SESSION['id_user'];
    $resultado = mysql_query("select * from usuario where id != ".$id."");
    while ($selecionar_usuarios=mysql_fetch_array($resultado)){
      if(mysql_num_rows($resultado)==0){
        echo "Não existe usuários";
      }else{
        ?>
         <p class="btn-institucional"><a href="javascript:void(0);" nome="<?php echo $selecionar_usuarios['nome'];?>" id="<?php echo $selecionar_usuarios['id']; ?>" class="comecar"><?php echo $selecionar_usuarios['nome'];?></a></p>
         <?php
      }
  
    }
?>   
  </ul>
 </div></div>


  
 

