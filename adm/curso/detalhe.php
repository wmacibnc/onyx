<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">

	<h3>Cursos em Andamento</h3>

	<?php 
	 $usuario_id = $_SESSION['UsuarioID'];    

    	$resultado = mysql_query("select * from modulo_usuario_curso where usuario_id=".$usuario_id."");
		while($curso=mysql_fetch_array($resultado)){
		$resultado2 = mysql_query("select * from curso where id=".$curso['curso_id']."");
		$resultado3 = mysql_query("select * from turma_usuario where usuario_id=".$usuario_id."");


		$dados_curso = mysql_fetch_array($resultado2);
    	$aula_atual = $curso['aula_atual'];
		$aula_total = $dados_curso['qtd_aula'];
		$porcetagem = 100;	
		$dias = $dados_curso['validade'];
		// Se tipo
		// 1 - Por módulos - Data de vinculo = DataInicio Turma
		// 0 - Por Aula - Data de Vinculo = DataVinculo no curso
		$turma_usuario = mysql_fetch_array($resultado3);
		$turma_id = 1;//$turma_usuario['turma_id'];
		$resultado4 = mysql_query("select * from turma_curso where turma_id=".$turma_id."");

		$turma_curso = mysql_fetch_array($resultado4);

		$tipo = $dados_curso['tipo'];
		$dataVinculo = date('d/m/Y');	

		if($tipo==1){
		$dataVinculo = $turma_curso['dataInicio'];	
		}else{
		$dataVinculo = $curso['dataVinculo'];	
		}
		
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