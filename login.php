<html>
<head>
	<title>Área Restrita</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

</head>
<body>

<div id="login" align="center">
	<?php $mensagem='';
	if (!empty($_GET['mensagem'])){
		$mensagem = $_GET['mensagem'];
		switch ($mensagem) {
			case '1':
			$novaMensagem = 'Preencha todos os campos.';
			break;

			case '2':
			$novaMensagem = 'Login e/ou senha inválidos.';
			break;

			case '3':
			$novaMensagem = 'Você efetou Logoff.';
			break;

			case '4':
			$novaMensagem = 'Para acessar essa página. Efetue Login.';
			break;

			default:
			$novaMensagem = 'Entre novamente com os dados!';
			break;
		}
	}
	?>
	<form action="validacao.php" method="post">
		<fieldset>
			<legend>Login</legend>
			<?php if(!empty($novaMensagem)){
				echo "<div id='erro'>".$novaMensagem."</div><br />";
			}?>
			<input type="text" value="Login" onfocus="this.value = ''" name="usuario" id="txUsuario" maxlength="255" /></br />
			<input type="password" value="Senha" onfocus="this.value = ''" name="senha" id="txSenha" /></br />
</br />
			<input type="submit" value="Entrar" />
		</fieldset>
	</div>
</body>
</html>
