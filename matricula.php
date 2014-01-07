<?php 
include("header.php");  
include("config.php");
?>

<script type="text/javascript">  
function mostrar(){
if(document.getElementById('visivel').checked == true){  
  document.getElementById('cadastros').style.display='block';
}if(document.getElementById('visivel').checked == false){
  document.getElementById('cadastros').style.display = 'none';
}
}
</script>  

<div id="conteudo">  
  
  <h2>Matricula</h2>

  <?php 
  if(!empty($_GET['curso_id'])){
    $curso_id = $_GET['curso_id'];
    $_SESSION['curso_id'] = $curso_id;
  }
  if(empty($_GET['curso_id'])){
    $curso_id = $_SESSION['curso_id'];
  }

  $resultado = mysql_query("select * from curso where id=".$curso_id);
  $curso = mysql_fetch_array($resultado);

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
        <td><input type="text"name="usuario" value="login" onfocus="this.value = ''" size="8"/></td>
      </tr>

      <tr>
        <td><label>Senha: </label></td>
        <td><input type="password"name="senha" value="senha" onfocus="this.value = ''" size="8"/></td>
      </tr>

    </table>

<h4> Possui cupom? Informe-o: </h4>

<table>
  <tr>
    <td>Cupom: </td>
    <td><input type="text" name="cupom" size="8"/></td>
  </tr>
</table>
<br />
<input type="submit" value="Entrar" />

  </form>   
  
  <h4>Não tem Login?</h4>
  
  <h3> <input type="checkbox" id="visivel" onclick='mostrar()' /> Cadastre-se e rápido.</h3>
  
  <div id="cadastros" style="display:none;">
  <h3>Formulário de Cadastro</h3>

  <form id="cadastro" action="salva_aluno.php" name="matricula" method="post" enctype="multipart/form-data">
    <ul id="countrytabs" class="shadetabs">
      <li><a href="#" rel="country1" class="selected">Identificação</a></li>
      <li><a href="#" rel="country2">Dados Pessoais</a></li>
      <li><a href="#" rel="country3">Dados do Endereço</a></li>
      <li><a href="#" rel="country4">Dados de Contato</a></li>
    </ul>

    <div style="border:1px solid #00006C; width:450px; margin-bottom: 1em; padding: 10px">

      <div id="country1" class="tabcontent">
        <label>Nome Completo: </label><br />
        <input type="text" name="nome" id="nome" maxlength="200" /><br />

        <label>Foto: </label><br />
        <input type="file" name="imagem" id="imagem"/><br />

        <label>E-mail: </label><br />
        <input type="text" name="email" maxlength="200" /><br />

        <label>Senha: </label><br />
        <input type="password" name="senha" maxlength="50" /><br />
      </div>

      <div id="country2" class="tabcontent">
        <label>C.P.F: </label><br />
        <input type="text" name="cpf" maxlength="11" onkeypress='return SomenteNumero(event)'/><br />

        <label>RG: </label><br />
        <input type="text" name="rg" maxlength="20" onkeypress='return SomenteNumero(event)'/><br />

        <label>Nome do Pai: </label><br />
        <input type="text" name="pai" maxlength="200" /><br />

        <label>Nome da Mãe:</label><br />
        <input type="text" name="mae" maxlength="200" /><br />

        <label>Sexo:</label><br />
        <select name="sexo">
         <option value="Feminino">Feminino</option>
         <option value="Masculino">Masculino</option>
       </select><br />
     </div>

     <div id="country3" class="tabcontent">
      <label>CEP: </label><br />
      <input type="text" name="cep" maxlength="8" id="cep" onblur="atualizacep(this.value)" onkeypress='return SomenteNumero(event)'/><br />

      <label>Endereço: </label><br />
      <input type="text" name="endereco" maxlength="200" id="endereco" /><br />
      <label>Número: </label><br />
      <input type="text" name="numero" maxlength="20" id="numero" onkeypress='return SomenteNumero(event)' /><br />

      <label>Complemento: </label><br />
      <input type="text" name="complemento" maxlength="200" id="complemento" /><br />

      <label>Bairro: </label><br />
      <input type="text" name="bairro" maxlength="100" id="bairro"/><br />

      <label>Cidade: </label><br />
      <input type="text" name="cidade" maxlength="100" id="cidade" /><br />

      <label>UF:</label><br />
      <input type="text" name="uf" maxlength="2" id="uf" /><br />
    </div>

    <div id="country4" class="tabcontent">
      <label>DD: </label><br />
      <input type="text" name="dd" maxlength="2" onkeypress='return SomenteNumero(event)' /><br />

      <label>Telefone: </label><br />
      <input type="text" name="telefone" maxlength="8" onkeypress='return SomenteNumero(event)' /><br />

      <label>DD: </label><br />
      <input type="text" name="dd2" maxlength="2" onkeypress='return SomenteNumero(event)' /><br />

      <label>Celular: </label><br />
      <input type="text" name="celular" maxlength="8" onkeypress='return SomenteNumero(event)'/><br />

      <input type="submit" name="salvar" value="Salvar Dados">
      <input type="reset" name="limpar" value="Limpar Dados">
    </div>

    <script type="text/javascript">
      var countries=new ddtabcontent("countrytabs")
      countries.setpersist(true)
      countries.setselectedClassTarget("link") //"link" or "linkparent"
      countries.init()
</script>

<p>
  <a href="javascript:countries.cycleit('next')" style="margin-left: 25px; text-decoration:none;">Próximo</a>
</p>

</div>
</form>


</div>
<?php


?>

</div>
<?php include("footer.php");  ?>