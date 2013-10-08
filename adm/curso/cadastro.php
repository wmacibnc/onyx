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
						<label>Nome: </label> <br />		
						<input type="text" name="nome" id="nome" size="75px" maxlength="255"/><br/>

						<label>Descrição: </label> <br />		
						<input type="text" name="descricao" id="descricao" size="75px" maxlength="255"/><br/>

						<label>Ementa: </label> <br />		
						<input type="text" name="ementa" id="ementa" size="75px" maxlength="255"/><br/>

						<label>Pasta: </label> <br />		
						<input type="text" name="nome_pasta" id="nome_pasta" size="75px" maxlength="255"/><br/>

						<label>Observação: </label> <br />
						<textarea name="observacao" cols="58"></textarea>		

						<table>
							<tr>
								<td width="60%"><label>Valor: </label> <br />		
									<input type="text" name="valor" id="valor" size="12px" maxlength="10" /></td>
								<td ><label>Validade Curso: </label> <br />		
										<input type="text" name="validade" id="validade" size="15px"/></td>
							</tr>
						</table>
						<br />
						<input type="checkbox" name="ativo" value="1" checked/> Ativo
						<br /><br />
						<input type="submit" value="Salvar" />
						<input type="reset" value="Limpar" />
					</form>
					<p align="center">Instituto Onyx - Todos os direitos reservados.</p>
				</div>
				<?php include("../footer.php"); ?>