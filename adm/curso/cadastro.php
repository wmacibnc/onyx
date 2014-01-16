<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">
	<form method="post" action="curso/salva.php" enctype="multipart/form-data">

		<label> <h3 align="center">Cadastro de Curso</h3></label>
				<table>
					<tr>
						<td width="60%"><label>Grupo Curso</label><br />
							<select name="grupo_id">
								<?php 
								$resultado = mysql_query("select * from grupo_curso");
								while($grupo_curso=mysql_fetch_array($resultado)){
									echo "<option value='".$grupo_curso['id'] ."'>".$grupo_curso['nome'] ."</option>";
								}
								?>			
							</select></td>
							</tr>
						</table>


						<br />
						<label>Nome do Curso: </label> <br />		
						<input type="text" name="nome" id="nome" size="100" maxlength="255"/><br/><br />

						<label>Pasta: </label> <br />		
						<input type="text" name="nome_pasta" id="nome_pasta" size="100" maxlength="255"/><br/><br />

						<label>Investimento: </label> <br />		
						<input type="text" name="valor" id="valor" size="100" maxlength="10" /> <br /><br />

						<label>Validade Curso em dias: </label> <br />		
						<input type="text" name="validade" id="validade" size="100"/><br /><br />

						<label>Carga horária: </label> <br />		
						<input type="text" name="carga_horaria" id="carga_horaria" size="100"/><br /><br />

						<input type="checkbox" name="ativo" value="1" checked/> Ativo <br /><br />

						<label>Conteúdo Programático: </label> <br /><br />
						<textarea name="descricao" id="descricao">
						</textarea>	<br /><br />

						<label>Objetivos do Curso: </label> <br />		<br />
						<textarea name="ementa" id="ementa">
						</textarea><br /><br />


						<label>Observação: </label> <br /><br />
						<textarea name="observacao" id="observacao">
						</textarea>		<br /><br />

						<input type="submit" value="Salvar" />
						<input type="reset" value="Limpar" />
					</form>
					<p align="center">Instituto Onyx - Todos os direitos reservados.</p>
				</div>
				<?php include("../footer.php"); ?>