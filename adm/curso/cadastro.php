<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">
	<form method="post" action="curso/salva.php" enctype="multipart/form-data">

		<label> <h3 align="center">Cadastro de Curso</h3></label>
		<table>
			<tr>
				<td width="70%"><input type="checkbox" name="tipo" value="1"/> Curso por Módulos<td>
					<td width="20%"><input type="checkbox" name="ativo" value="1"/> Ativo<td>
					</tr>
				</table>
				<br />
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
						<input type="text" name="observacao" id="observacao" size="75px" maxlength="255"/><br />

						<table>
							<tr>
								<td><label>Valor: </label> <br />		
									<input type="text" name="valor" id="valor" size="10px" maxlength="10" /></td>
								<td><label>Quant. Aulas: </label> <br />		
									<input type="text" name="qtd_aula" id="qtd_aula" size="10px" maxlength="3" /></td>
								<td><label>Validade: </label> <br />		
										<input type="text" name="validade" id="qtd_aula" size="30px"/></td>
							</tr>
						</table>

						<input type="submit" value="Enviar" />
					</form>
				</div>
				<?php include("../footer.php"); ?>