<?php
include("../../config.php");
include("../header.php");

$usuario_id = $_SESSION['UsuarioID'];  
?>
<div id="conteudo_curso">
	<?php 

	$resultado = mysql_query("select * from usuario_curso uc left join curso c on uc.curso_id = c.id where uc.usuario_id=".$usuario_id."");
	if(!mysql_num_rows($resultado) == 0){
		echo "<h3>Cursos em Andamento</h3>";
		while($curso=mysql_fetch_array($resultado)){
			$dataVinculo = date('d/m/Y');
			$dataVinculo = $curso['dataVinculo'];
			$dias = $curso['validade'];
			$inicio = strftime("%d/%m/%Y", strtotime($dataVinculo));
			$validade = date('d/m/Y', strtotime("+".$dias." days",strtotime($dataVinculo)));
			
			echo "<p class='texto_curso'> 
			<a href='curso/exibe.php?curso=".$curso['id']."'>Curso: ".$curso['nome']."</a> Validade: ".$curso['validade']." dias.</p>";
			
			echo "Início: ". $inicio ." Valido até ".$validade."";
		}
	}

	$resultado2 = mysql_query("select * from turma_usuario tu left join turma t on tu.turma_id = t.id where usuario_id=".$usuario_id."");
	if(!mysql_num_rows($resultado2) == 0){
		echo "<h3>Turmas em Andamento</h3>";
		while($turma= mysql_fetch_array($resultado2)){

			$aula_atual = $turma['aula_atual'];
			$aula_total = $turma['qtd_mod'];
			$porcetagem = 100;	
			$dias = $turma['validade'];
			$dataVinculo = date('d/m/Y');	
			$dataVinculo = $turma['dataInicio'];	
			$inicio = strftime("%d/%m/%Y", strtotime($dataVinculo));
			$validade = date('d/m/Y', strtotime("+".$dias." days",strtotime($dataVinculo)));
			if($aula_atual!= 0){
			$aula = ($aula_atual*($porcetagem)) / ($aula_total);
			}else{
				$aula = 0;
			}

			echo "<p class='texto_curso'> <a href='turma/exibe.php?turma=".$turma['id']."'>Curso: ".$turma['nome']."</a> Validade: ".$dias." dias.</p>";
			echo "<div id='progressbar_box'> ";
			echo "&nbsp;".number_format($aula, 2, ',', '')." % concluído. Início: ". $inicio ." Valido até ".$validade."";
			echo "<div id='progressbar100' style='width=100%'> ";
			echo "<div id='progressbar' style='width:".$aula."%;'>&nbsp; 
			</div>";
			echo "</div>";
			echo "</div>";
		}
	}
	
	?>
	<p align='center'>Todos os direitos reservados - Instituto Onyx 2013</p>
</div>

<?php include("../footer.php") ?>