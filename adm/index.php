<?php 
include('header.php');
include('../config.php');
$id = $_SESSION['UsuarioID'];
$usuario_id = $_SESSION['UsuarioID'];
$consulta = mysql_query("select * from usuario where id=".$id);
$resultado = mysql_fetch_array($consulta);
$foto = $resultado['imagem'];
?>

<div id="dados_usuario">
<br />
<?php 
if($foto==''){
	echo "<img src='../imagens/usuario.png' align='left'/>";
}else{ ?>
<img src='../uploads/<?php echo $foto; ?>' align='left'  width="auto" height="150px"/>

<?php } ?>
<h3 class='titulo_dados_usuario'>Bem Vindo!</h3>
<?php
echo $resultado['nome']."<br />";
echo $resultado['endereco']. " Bairro: ".$resultado['bairro']." Cidade: ".$resultado['cidade'] ." - ".$resultado['uf']."<br />";
echo $resultado['ddtelefone']." ".$resultado['telefone']." - ".$resultado['ddcelular']." ".$resultado['celular']."<br />";
?>
</div>

<div id='conteudo_curso'>
<br />
	<?php 

	$resultado = mysql_query("select * from usuario_curso uc left join curso c on uc.curso_id = c.id where uc.usuario_id=".$usuario_id." AND situacao=1");
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
			echo "<br />";
			if($curso['certificado']!=1){
			echo "<a href='curso/avaliacao.php?curso_id=".$curso['id']."'><img src='../imagens/icone/avaliacao.png'/></a>";
			}else{
			echo "<a href='certificado/index.php'><img src='../imagens/icone/certificado.png'/></a>";
			}
		}
	}else{
		echo "<h3> Não existe cursos ativos.</h3>";
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

<?php include("footer.php") ?>