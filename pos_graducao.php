<?php 
include("header.php");
?>
<div id="conteudo">
	<?php 
	$consulta = mysql_query("select * from paginas where nomePagina='POS_GRADUACAO'");
	$resultado = mysql_fetch_array($consulta);
	echo $resultado['conteudo'];
	 ?>
</div>
<?php include('footer.php'); ?>