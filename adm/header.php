<?php 
    
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
<div id="logo"><a href="index.php"><img src="../imagens/logo.png" class="logo"></a></div>

<div id="titulo_principal">
  <table>
    <tr>
      <td><a href="curso/detalhe.php"><img src="../imagens/icone/curso.png" class="btn-curso"></a></td>
      <td><a href="certificado/index.php"><img src="../imagens/icone/certificado.png" class="btn-certificado"></a></td>
      <td><a href="#"><img src="../imagens/icone/secretaria.png" class="btn-secretaria"></a></td>
      <td><a href="#"><img src="../imagens/icone/matricula.png" class="btn-novo-curso"></a></td>
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
<div id="dados_usuario">
  <?php include("dados_usuario.php"); ?>
</div>
<div id="banner_usuario">
  
  <img src="../imagens/testebanner.png" height='250px' width='auto'>
</div>
<div id="menu">
    <a href='javascript:history.back()'><img src="../imagens/icone/voltar.png" align="left"/></a>
    <a href="javascript:history.forward()"><img src="../imagens/icone/avancar.png" align="right"/></a>
  </div>
<div id="menu"align="center">
  <nav id="menu">
  <ul>
    <li><a href="curso/index.php">Cursos</a></li>
    <li><a href="turma/lista.php">Turmas</a></li>
    <li><a href="grupo/">Grupos</a></li>
    <li><a href="forum/">Fórum</a></li>
    <li><a href="usuario/lista_usuario_turma.php">Usuários</a></li>
  </ul>
</nav>
  </div>