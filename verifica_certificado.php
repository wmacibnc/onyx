<?php include("header.php");  ?>
<div id="conteudo">
	
	<h1>Válida Certificado</h1>

	<?php 
	if(isset($_POST['certificado'])){
	$certificado = $_POST['certificado'];	
	$consulta =  mysql_query("select * from usuario_curso where numero_certificado like '".$certificado."'");

	if(mysql_num_rows($consulta) >0){
		echo "Certificado Válidado";
	}else{
		echo "Certificado não encontrado, entre em contato conosco.";
	}
	}else{
		echo "Informe argumentos para a pesquisa.";
	}
	?>
</div>
<?php include("footer.php") ?>