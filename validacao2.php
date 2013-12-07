<?php include('config.php');

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
	header("Location: matricula.php?mensagem=1");
	exit;
}

$usuario = mysql_real_escape_string($_POST['usuario']);
$senha = mysql_real_escape_string($_POST['senha']);

$sql = "SELECT `id`, `nome`,`nivel`,`ativo` FROM `usuario` WHERE (`login` = '". $usuario ."') AND (`senha` = '". $senha ."') AND (`ativo` = 1) LIMIT 1";

$query = mysql_query($sql);
if (mysql_num_rows($query) != 1) {
	// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
	header("Location: matricula.php?mensagem=2"); 
	exit;
} else {
		
	// Salva os dados encontados na variável $resultado
	$resultado = mysql_fetch_assoc($query);

	// Se a sessão não existir, inicia uma
	if (!isset($_SESSION)) session_start();

	// Salva os dados encontrados na sessão
	$_SESSION['UsuarioID'] = $resultado['id'];
	$_SESSION['UsuarioNome'] = $resultado['nome'];
	$_SESSION['id_user'] = $resultado['id'];
	$_SESSION['UsuarioNivel'] = $resultado['nivel'];

	// Redireciona o visitante
	header("Location: pagamento/pagamento.php"); 
	exit;
}