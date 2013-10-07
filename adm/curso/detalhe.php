<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">

	<h3>Cursos em Andamento</h3>

	<?php 
	 $usuario_id = $_SESSION['UsuarioID'];    
     
	 	

		$turma_id = 1;//$turma_usuario['turma_id'];

		

		//$dataVinculo = $turma_curso['dataInicio'];	

		$resultado3 = mysql_query("select * from turma_usuario where usuario_id=".$usuario_id."");
		while($turma_usuario= mysql_fetch_array($resultado3)){
		$resultado4 = mysql_query("select * from turma_curso where turma_id=".$turma_id."");
		$turma_curso = mysql_fetch_array($resultado4);
		$resultado5 = mysql_query("select * from curso where id=".$turma_curso['curso_id']);

		$dados_curso2 = mysql_fetch_array($resultado5);
    	$aula_atual = $turma_usuario['aula_atual'];
		$aula_total = $dados_curso2['qtd_aula'];
		$porcetagem = 100;	
		$dias = $dados_curso2['validade'];
		$dataVinculo = date('d/m/Y');	
		$dataVinculo = $turma_curso['dataInicio'];	
		$inicio = strftime("%d/%m/%Y", strtotime($dataVinculo));
		$validade = date('d/m/Y', strtotime("+".$dias." days",strtotime($dataVinculo)));
    	$aula = ($aula_atual*($porcetagem)) / ($aula_total);
		
    	echo "<p class='texto_curso'> <a href='curso/exibe.php?curso=".$dados_curso2['id']."'>Curso: ".$dados_curso2['nome']."</a> Validade: ".$dias." dias.</p>";
		echo "<div id='progressbar_box'> ";
		echo "&nbsp;".number_format($aula, 2, ',', '')." % concluído. Início: ". $inicio ." Valido até ".$validade."";
		echo "<div id='progressbar100' style='width=100%'> ";
		echo "<div id='progressbar' style='width:".$aula."%;'>&nbsp; 
		</div>";
		echo "</div>";
		echo "</div>";
		}










		$resultado = mysql_query("select * from modulo_usuario_curso where usuario_id=".$usuario_id."");
		while($curso=mysql_fetch_array($resultado)){
		$resultado2 = mysql_query("select * from curso where id=".$curso['curso_id']."");
		$dados_curso = mysql_fetch_array($resultado2);
    	$aula_atual = $curso['aula_atual'];
		$aula_total = $dados_curso['qtd_aula'];
		$porcetagem = 100;	
		$dias = $dados_curso['validade'];
		$dataVinculo = date('d/m/Y');	
		$dataVinculo = $curso['dataVinculo'];	
		$inicio = strftime("%d/%m/%Y", strtotime($dataVinculo));
		$validade = date('d/m/Y', strtotime("+".$dias." days",strtotime($dataVinculo)));
    	$aula = ($aula_atual*($porcetagem)) / ($aula_total);
		
    	echo "<p class='texto_curso'> <a href='curso/exibe.php?curso=".$dados_curso['id']."'>Curso: ".$dados_curso['nome']."</a> Validade: ".$dados_curso['validade']." dias.</p>";
		echo "<div id='progressbar_box'> ";
		echo "&nbsp;".number_format($aula, 2, ',', '')." % concluído. Início: ". $inicio ." Valido até ".$validade."";
		echo "<div id='progressbar100' style='width=100%'> ";
		echo "<div id='progressbar' style='width:".$aula."%;'>&nbsp; 
		</div>";
		echo "</div>";
		echo "</div>";
		}
	 ?>
<p align='center'>Todos os direitos reservados - Instituto Onyx 2013</p>
</div>

<?php include("../footer.php") ?>