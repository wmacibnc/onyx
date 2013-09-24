<?php 
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: ../login.php?mensagem=4"); exit;
}

?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Onyx ADM</title>
	<link rel="stylesheet" href="../css/table_jui.css" />
  <link rel="stylesheet" href="../css/style-adm.css" />
  <link rel="stylesheet" href="../css/jquery-ui-1.8.4.custom.css" />
  <script type="text/javascript" src="../js/jquery.mim.js"></script>
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
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
<div id="logo"><a href="index.php"><img src="../../imagens/logo.png" class="logo"></a></div>
<div id="titulo_principal">
  <p class="titulo_principal" align="center">Área Administrativa</p>
  <a href="../../logoff.php"><img src="../../imagens/icone/logoff.png" class="imagem_logoff"></a>
</div>
</div>

<div id="conteudo">
  <div id="menu">
      <p class="btn"><a href="#">Home</a></p>
      <p class="btn"><a href="detalhe.php">Meus Cursos</a></p>
      <p class="btn"><a href="#">Certificados</a></p>
      <p class="btn"><a href="#">Chat</a></p>
      <p class="btn"><a href="#">Fórum</a></p>
      <p class="btn"><a href="#">Promoções</a></p>
      <p class="btn"><a href="#">Inscrições</a></p>
      <p class="btn"><a href="#">Contato</a></p>
      <p class="btn"><a href="cadastro.php">Novo Curso</a></p>
      <p class="btn"><a href="lista_curso.php">Adm Cursos</a></p>
    <div id="banner_institucional">
      <img src="../../imagens/banner/institucional.png">
    </div>
  </div>
  

</body>
</html>
