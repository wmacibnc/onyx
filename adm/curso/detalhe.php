<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">

	<h3>Cursos em Andamento</h3>

	<?php 
	 $usuario_id = 1;    

    $resultado = mysql_query("select * from modulo_usuario_curso where usuario_id=".$usuario_id."");
		while($curso=mysql_fetch_array($resultado)){
$resultado2 = mysql_query("select * from curso where id=".$curso['curso_id']."");
		

    	$dados_curso = mysql_fetch_array($resultado2);
    	$aula_atual = $curso['aula_atual'];
		$aula_total = $dados_curso['qtd_aula'];
		$porcetagem = 100;	

    	$aula = ($aula_atual*($porcetagem)) / ($aula_total);
		
    	echo "<p class='texto_curso'> <a href='curso/exibe.php?curso=".$dados_curso['id']."'>Curso: ".$dados_curso['nome']."</a></p>";
    	
		echo "<div id='progressbar_box'> ";
		echo "&nbsp;".number_format($aula, 2, ',', '')." % concluído.";
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