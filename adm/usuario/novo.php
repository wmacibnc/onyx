<?php 
include('../header.php');
include('../../config.php');
?>
<div id="conteudo_curso">
	<h3> Adicionar Usuário </h3>

	<form name="adicionar_vinculo_usuario" action="usuario/salva_usuario_turma.php" method="POST">
		<h4> Criar Usuário com Vínculo em turma</h4>

		<table>
			<tr>
				<td><label>Aluno:</label></td>
				<td><input type="text" name="nome"  size='40'/></td>
			</tr>
			<tr>
				<td><label>E-mail:</label></td>
				<td><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td><label>Turma:</label></td>
				<td>		<select name="turma_id">
					<?php 
					$resultado = mysql_query("select * from turma");
					while($turma=mysql_fetch_array($resultado)){
						echo "<option value='".$turma['id'] ."'>".$turma['nome'] ."</option2>";
					}
					?>		
				</select></td>
			</tr>
		</table>
		<input type="checkbox" name="sim" value="1" checked/> Enviar E-mail com dados de acesso? <br />
		<br />
		<label>Data de Vínculo: Data de ínicio da turma. </label>
		<br /><br />
		<input type="submit" value="Criar Aluno com Vínculo em Turma" />
	</form>

<form name="adicionar_usuario" action="usuario/adicionar_usuario.php" method="POST">
	<h4> Somente Criar Usuário </h4>

	<table>
			<tr>
				<td><label>Aluno:</label></td>
				<td><input type="text" name="nome"  size='40'/></td>
			</tr>
			<tr>
				<td><label>E-mail:</label></td>
				<td><input type="text" name="email" /></td>
			</tr>
		</table>
		<input type="checkbox" name="sim" value="1" checked/> Enviar E-mail com dados de acesso? <br />
		<br />
		<input type="submit" value="Criar Aluno" />
	</form>
</div>

<?php include('../footer.php'); ?>