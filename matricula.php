<?php 
include("header.php");  
include("config.php");
include("lib/PagSeguroLibrary.php");
?>

<div id="conteudo">

	<h1>Matricula</h1>
	<?php

if (!empty($_GET['mensagem'])){
    $mensagem = $_GET['mensagem'];
  $curso_id = $_SESSION['curso_id'];
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
      $novaMensagem = 'Usuário Cadastrado com sucesso! Faça Login.';
      break;

      default:
      $novaMensagem = 'Entre novamente com os dados!';
      break;
    }
  }
  if(!empty($_GET['curso_id'])){
  $curso_id = $_GET['curso_id'];
  $_SESSION['curso_id'] = $curso_id;
  }

  $resultado = mysql_query("select * from curso where id=".$curso_id);
  $curso = mysql_fetch_array($resultado);

  if(!empty($novaMensagem)){
    echo "<div id='erro'>".$novaMensagem."</div><br />";
  }

  echo "<h4>Curso: ".$curso['nome']."</h4>";
  echo "<h4>Investimento: ".$curso['valor'].",00</h4>";

	 ?>
	<h4>Identifique-se</h4>
	<form action="validacao2.php" method="post">
        <table>
          <tr>
            <td><label>Login: </label></td>
            <td><label>Senha: </label></td>
          </tr>
          <tr>
            <td><input type="text"name="usuario" value="login" onfocus="this.value = ''" size="8"/></td>
            <td><input type="password"name="senha" value="senha" onfocus="this.value = ''" size="8"/></td>
            <td><input type="submit" value="Entrar" /></td>
          </tr>
        </table>
      </form>
      <h4>Não tem Login?</h4>
      <a href="cadastro.php">Cadastre-se</a>
      <div id="cadastro" style="display:">
        <h3>Formulário de Cadastro</h3>
          <form id="cadastro" action="salva_aluno.php" method="post" enctype="multipart/form-data">
            <label>Foto: </label>
            <input type="file" name="imagem" id="imagem"/><br />

        <label>Nome Completo: </label><br />
        <input type="text" name="nome" maxlength="200" /><br />

        <label>E-mail: </label><br />
        <input type="text" name="email" maxlength="200" /><br />

        <label>Senha: </label><br />
        <input type="password" name="senha" maxlength="50" /><br />

        <label>C.P.F: </label><br />
        <input type="text" name="cpf" maxlength="11" /><br />

        <label>RG: </label><br />
        <input type="text" name="rg" maxlength="20" /><br />

        <label>Nome do Pai: </label><br />
        <input type="text" name="pai" maxlength="200" /><br />

        <label>Nome da Mãe:</label><br />
        <input type="text" name="mae" maxlength="200" /><br />

         <label>Sexo:</label><br />
        <select name="sexo">
         <option value="Feminino">Feminino</option>
         <option value="Masculino">Masculino</option>
       </select><br />

        <label>CEP: </label><br />
        <input type="text" name="cep" maxlength="8" id="cep" onblur="atualizacep(this.value)" /><br />

        <label>Endereço: </label><br />
        <input type="text" name="endereco" maxlength="200" id="endereco" /><br />

        <label>Bairro: </label><br />
        <input type="text" name="bairro" maxlength="100" id="bairro"/><br />

        <label>Cidade: </label><br />
        <input type="text" name="cidade" maxlength="100" id="cidade" /><br />

        <label>UF:</label><br />
        <input type="text" name="uf" maxlength="2" id="uf" /><br />

        <label>DD: </label><br />
        <input type="text" name="dd" maxlength="2" /><br />

        <label>Telefone: </label><br />
        <input type="text" name="telefone" maxlength="8" /><br />

        <label>DD: </label><br />
        <input type="text" name="dd2" maxlength="2" /><br />

        <label>Celular: </label><br />
        <input type="text" name="celular" maxlength="8" /><br />

        <input type="submit" name="salvar" value="Salvar Dados">
        <input type="reset" name="limpar" value="Limpar Dados">
      </form>
      </div>
	</div>
<?php include("footer.php");  ?>