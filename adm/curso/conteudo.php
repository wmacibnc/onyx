<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">

<?php   

	$curso_id =$_GET['curso'];
	$usuario_id=1;
	$aula_id = $_GET['aula'];

	$resultado = mysql_query("select * from curso where id=".$curso_id."");
    $row = mysql_fetch_array($resultado);
    $path = $row['nome_pasta']."/".$aula_id."/";

    echo "<h3>Curso: ".$row['nome']."</h3>";
    echo "<h4>Aula: ".$aula_id."</h4>";
    echo "<h4>Conteúdo </h4>";

    $diretorio = dir($path);

		while($arquivo = $diretorio -> read()){
   			if($arquivo != '.' && $arquivo !='..'){
      			echo "<a href='".$path.$arquivo."'target='_blank'>".$arquivo."</a><br />";
  			}
  		}

   $diretorio -> close(); ?>
   <p align="center">Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include("../footer.php"); ?>