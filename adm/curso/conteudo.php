<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">

<?php   

	$curso_id =$_GET['curso'];
	$usuario_id=$_SESSION['UsuarioID'];;
	$aula_id = $_GET['aula'];

  // Verifica se a aula atual é maior 
  $consulta = mysql_query("select * from modulo_usuario_curso where usuario_id=".$usuario_id." and curso_id=".$curso_id."");
  $row=mysql_fetch_array($consulta);
  $aula_atual = $row['aula_atual'];
  $id = $row['id'];

if($aula_atual<$aula_id){
      $editar = "UPDATE `modulo_usuario_curso` SET 
      `aula_atual` = '".$aula_id."'
      WHERE (`id` = ".$id.")";

/* Faço a inserção no banco de dados e caso haja algum erro na inserção, será retornado através da função mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());
}


	$resultado = mysql_query("select * from curso where id=".$curso_id."");
    $row = mysql_fetch_array($resultado);
    $path = $row['nome_pasta']."/".$aula_id."/";

    echo "<h3>Curso: ".$row['nome']."</h3>";
    echo "<h4>Aula: ".$aula_id."</h4>";
    echo "<h4>Conteúdo </h4>";

    $diretorio = dir($path);

		while($arquivo = $diretorio -> read()){
   			if($arquivo != '.' && $arquivo !='..'){
      			echo "<a href='curso/".$path.$arquivo."'target='_blank'>".$arquivo."</a><br />";
  			}
  		}

   $diretorio -> close(); ?>
   <p align="center">Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include("../footer.php"); ?>