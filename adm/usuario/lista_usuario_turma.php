<?php 
	include("../header.php");
	include("../../config.php");
 ?>
<div id="conteudo_curso">
	<h3>Lista de Usuários</h3>
	<table class='display' id='example'>
		<thead>
			<tr>
				<td align="center"><strong>S</strong></td>
				<td align="center"><strong>Nome</strong></td>
				<td align="center"><strong>Login</strong></td>
				<td align="center"><strong>Cursos</strong></td>
				<td align="center"><strong>Turmas</strong></td>
				<td align="center"><strong>Vincular</strong></td>
				<td align="center"><strong>Ação</strong></td>
			</tr>
		</thead>
		<tbody>
			<?php
			$result=mysql_query("select * from usuario order by nome asc;");
			while($rows=mysql_fetch_array($result)){

			$aluno_id = $rows['id'];
				?>
				<tr>
					<td align="center">
						<?php 
							if($rows['ativo'] ==1){
								echo "A";
							}else{
								echo "I";
							} 
						?>
					</td>
					<td align="center"><?php echo $rows['nome']; ?></td>
					<td align="center"><?php echo $rows['login']; ?></td>
					<td align="center"> 
						<?php
							$resulta2=mysql_query("select * from curso c left join modulo_usuario_curso mode on c.id = mode.curso_id where mode.usuario_id=".$aluno_id."");
								while($cursos=mysql_fetch_array($resulta2)){
									echo $cursos['nome']."<br />";
								} 
						?>
					</td>
					<td align="center">
						<?php
							$resulta3=mysql_query("select * from turma t LEFT JOIN turma_usuario tu ON t.id = tu.turma_id WHERE tu.usuario_id =".$aluno_id."");
								while($turma=mysql_fetch_array($resulta3)){
									echo $turma['nome']."<br />";
								} 
						?>
					</td>
					<td align="center">
						<form name="vinculo" action="usuario/vinculo.php" method="post">
							<input type="hidden" name="aluno_id" value="<?php echo $aluno_id; ?>" />
							<input type="submit" name="vinculo" value="Vinculo" />
						</form>
					</td>
					<td align="center"></td>
				</tr>
				<?php
			}
			mysql_close();
			?>

		</tbody>
	</table>

</div>
<?php include("../footer.php"); ?>