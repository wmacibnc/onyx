<?php include ("../header.php"); include ("../../config.php");?>
<div id="conteudo_curso">
	<h3>Vincular Aluno ao Curso ou Turma</h3>
	<?php $aluno_id = $_POST['aluno_id']; ?>
	<form name="vinculo" action="usuario/salva_vinculo_curso.php" method="POST">
		<?php

		$resulta=mysql_query("select * from usuario where id =".$aluno_id."");
		$usuario=mysql_fetch_array($resulta);
		?>

		<h4>Vinculo de Curso</h4><br />
		<label>Aluno: <?php echo $usuario['nome']; ?> </label><br /><br />
		<input type="hidden" name="aluno_id" value="<?php echo $aluno_id ?>" />
		<label>Data de Vinculo:</label>
		<input type="text" name="dataVinculo"/><br /><br />
		<label>Curso: </label>
		<select name="curso_id">
		<?php 
		$resultado = mysql_query("select * from curso");
		while($curso=mysql_fetch_array($resultado)){
			echo "<option value='".$curso['id'] ."'>".$curso['nome'] ."</option>";
		}
		?>		
		</select>
		<br /><br />

		<input type="submit" value="Vincular Aluno - Curso" />
	</form>
<form name="vinculo" action="usuario/salva_vinculo_turma.php" method="POST">
		<h4>Vinculo de Turma</h4><br />
		<label>Aluno: <?php echo $usuario['nome']; ?></label><br /><br />
		<input type="hidden" name="aluno_id" value="<?php echo $aluno_id ?>" />
		<label>Turma: </label>
		<select name="turma_id">
		<?php 
		$resultado2 = mysql_query("select * from turma");
		while($turma=mysql_fetch_array($resultado2)){
			echo "<option value='".$turma['id'] ."'>".$turma['nome'] ."</option2>";
		}
		?>		
		</select><br /><br />
		<label>Data de Vinculo: Data da turma. </label>
		<br /><br />
		<input type="submit" value="Vincular Aluno - Turma" />
	</form>
</div>

<?php include ("../footer.php"); ?>