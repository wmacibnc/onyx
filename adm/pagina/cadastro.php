<?php
session_start();
include("../../config.php");
include("../header.php");
?>
<form method="post" action="salva_convenio.php" enctype="multipart/form-data">

	<label>Categoria: </label>
	<br />
	<select name="categoria_id">
		<?php 
		$resultado = mysql_query("select * from categoria");
		while($categoria=mysql_fetch_array($resultado)){
			echo "<option value='".$categoria['id'] ."'>".$categoria['nome'] ."</option>";
		}
		?>			
	</select>
	<br />
	<label>Nome: </label> <br />		
	<input type="text" name="nome" id="nome"/><br/>

	<label>Telefone: </label> <br />		
	<input type="text" name="telefone" id="telefone"/><br/>

	<label>E-mail: </label> <br />		
	<input type="text" name="email" id="email"/><br/>

	<label>Resumo: </label> <br />		
	<input type="text" name="resumo" id="resumo"/><br/>

	<label>Logo: </label> <br />		
	<input type="file" name="logo" id="logo"/><br />

	<label>Slogan: </label> <br />		
	<input type="text" name="slogan" id="slogan"/><br/>

	<label>Descontos: </label> <br />		
	<input type="text" name="desconto" id="desconto"/><br/>

	<label>Serviços: </label> <br />		
	<input type="text" name="servico" id="servico"/><br/>

	<label>CEP: </label> <br />		
	<input type="text" name="cep" id="cep"/><br/>

	<label>Endereço: </label> <br />		
	<input type="text" name="endereco" id="endereco"/><br/>

	<label>Bairro: </label> <br />		
	<input type="text" name="bairro" id="bairro"/><br/>

	<label>Cidade: </label> <br />		
	<input type="text" name="cidade" id="cidade"/><br/>

	<label>UF: </label> <br />		
	<input type="text" name="uf" id="uf"/><br/>			

	<label>Observacao: </label> <br />		
	<input type="text" name="observacao" id="observacao"/><br/>						

	<input type="submit" value="Enviar" />
</form>
<?php include("../footer.php"); ?>