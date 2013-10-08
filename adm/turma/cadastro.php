<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">
	<form method="post" action="turma/salva.php" enctype="multipart/form-data">

		<h3>Cadastro de Turma: </h3>

		<br />
		<label>Nome da Turma </label> <br />		
		<input type="text" name="nome" id="nome" maxlength="200" size="100"/>

		<br />
		<label>Descrição da Turma</label><br />
		<input type="text" name="descricao" id="descricao" size="100" />

		<br />
		<label>Ementa da Turma</label><br />
		<input type="text" name="ementa" id="ementa" size="100" /><br/>	
		<br />

		<table>
			<tr>
				<td width="30%"><label>Capacidade de Alunos </label> <br />		
					<input type="text" name="quantidade" id="quantidade" maxlength="10"/></td>
					<td width="30%"><label>Data de Inicio da Turma</label><br />
						<input type="text" name="dataInicio" id="dataInicio" maxlength="10"/></td>
						<td width="30%"><label>Valor R$</label><br />
							<input type="text" name="valor" id="valor" /></td>
						</tr>
					</table>

					<br />
					<label>Observação</label><br />
					<textarea name="observacao" cols="75">
					</textarea>
					<br/>	

					<table>
						<tr>
							<td width="30%"><label>Nome da Pasta</label><br />
								<input type="text" name="nome_pasta" id="nome_pasta" maxlength="200"/></td>
								<td width="30%"><label>Quant. Módulos</label><br />
									<input type="text" name="qtd_mod" id="qtd_mod" maxlength="10"/></td>
									<td width="30%"><label>Validade da Turma</label><br />
										<input type="text" name="validade" id="validade" maxlength="10"/></td>
									</tr>
								</table>
								<br />

								<label>Validade de cada Módulo da Turma</label><br />
								<input type="text" name="validadeModulo" id="validadeModulo" maxlength="10"/><br/>	

								<br />

								<input type="checkbox" name="ativo" value="1" checked/> Ativo

								<br /><br />

								<input type="submit" value="Salvar" />
								<input type="reset" value="Limpar" />
							</form>
							<p align="center">Instituto Onyx - Todos os direitos reservados.</p>
						</div>
						<?php include("../footer.php"); ?>