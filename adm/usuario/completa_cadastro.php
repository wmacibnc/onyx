<?php 
	include("../header.php");
	include("../../config.php");
 ?>
<div id="conteudo_curso">
	<h3>Atualização de Dados</h3>

	 <textarea name="content">
	 	teste asdf
	 </textarea>


	<div id="myTabs">
  <ul>
    <li><a href="#tab1">Identifcação</a></li>
    <li><a href="#tab2">Dados Pessoais</a></li>
    <li><a href="#tab3">Dados do Endereço</a></li>
    <li><a href="#tab4">Dados de Contato</a></li>
  </ul>
  <div id="tabs1">
       <label>Nome Completo: </label><br />
        <input type="text" name="nome" maxlength="200" /><br />

        <label>Foto: </label>
        <input type="file" name="imagem" id="imagem"/><br />

        <label>E-mail: </label><br />
        <input type="text" name="email" maxlength="200" /><br />

        <label>Senha: </label><br />
        <input type="password" name="senha" maxlength="50" /><br />

  </div>
  <div id="tabs2">
    
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

  </div>
  <div id="tabs3">
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

  </div>
  <div id="tabs4">
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
      <button class="previous-product">Previous Tab</button>
<button class="next-product">Next Tab</button>
</div>
<?php include ("../footer.php") ?>