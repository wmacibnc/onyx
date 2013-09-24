
<div id="conteudo">
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
				echo "Erro: ".$novaMensagem."<br />";
			}?>
			<label for="txUsuario">Usuário</label>
			<input type="text" name="usuario" id="txUsuario" maxlength="25" />
			<label for="txSenha">Senha</label>
			<input type="password" name="senha" id="txSenha" />

			<input type="submit" value="Entrar" />
		</fieldset>
	</div>
