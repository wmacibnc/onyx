<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">
	<form method="post" action="curso/salva_avaliacao.php" enctype="multipart/form-data">

		<label> <h3 align="center">Cadastro de Questão</h3></label>
		<table>
			<tr>
				<td width="60%"><label>Curso: </label><br />
					<select name="curso_id">
						<?php 
						$resultado = mysql_query("select * from curso");
						while($curso=mysql_fetch_array($resultado)){
							echo "<option value='".$curso['id'] ."'>".$curso['nome'] ."</option>";
						}
						?>			
					</select></td>
				</tr>
			</table>


			<br />
			<label>Pergunta: </label> <br />		
			<input type="text" name="pergunta" id="pergunta" size="75px" maxlength="255"/><br/>

			<label>Resposta - 01: </label> <br />		
			<input type="text" name="resposta1" id="resposta1" size="75px" maxlength="255"/><br/>

			<label>Resposta - 02: </label> <br />		
			<input type="text" name="resposta2" id="resposta2" size="75px" maxlength="255"/><br/>

			<label>Resposta - 03: </label> <br />		
			<input type="text" name="resposta3" id="resposta3" size="75px" maxlength="255"/><br/>

			<label>Resposta - 04: </label> <br />		
			<input type="text" name="resposta4" id="resposta4" size="75px" maxlength="255"/><br/>

			<label>Resposta Correta</label><br />
			<select name="respostaCorreta">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>

			
			<br /><br />
			<input type="submit" value="Salvar" />
			<input type="reset" value="Limpar" />
		</form>
		<p align="center">Instituto Onyx - Todos os direitos reservados.</p>
	</div>
	<?php include("../footer.php"); ?>
