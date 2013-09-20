<?php
include("../../config.php");
include("../header.php");
?>
<form method="post" action="salva.php" enctype="multipart/form-data">

	<label>Cadastro de Curso: </label>
	<br />
	<select name="grupo_id">
		<?php 
		$resultado = mysql_query("select * from grupo_curso");
		while($grupo_curso=mysql_fetch_array($resultado)){
			echo "<option value='".$grupo_curso['id'] ."'>".$grupo_curso['nome'] ."</option>";
		}
		?>			
	</select>
	<br />
	<label>Nome: </label> <br />		
	<input type="text" name="nome" id="nome"/><br/>

	<label>Descrição: </label> <br />		
	<input type="text" name="descricao" id="descricao"/><br/>

	<label>Ementa: </label> <br />		
	<input type="text" name="ementa" id="ementa"/><br/>

	<label>Valor: </label> <br />		
	<input type="text" name="valor" id="valor"/><br/>

	<label>Observação: </label> <br />		
	<input type="text" name="observacao" id="observacao"/><br />

	<label>Quantidade de Aula: </label> <br />		
	<input type="text" name="qtd_aula" id="qtd_aula"/><br/>

	<input type="submit" value="Enviar" />
</form>
<?php include("../footer.php"); ?>