<?php 
include('header.php');
include('../config.php');
$id = $_SESSION['UsuarioID'];
$consulta = mysql_query("select * from usuario where id=".$id);
$resultado = mysql_fetch_array($consulta);
$foto = $resultado['imagem'];
?>

<div id="dados_usuario">
<br />
<?php if(!isset($foto)){
	echo "<img src='../imagens/usuario.png' align='left'/>";
}else{ ?>
<img src='../uploads/<?php echo $foto; ?>' align='left'  width="auto" height="150px"/>
<?php } ?>
<h3>Bem Vindo!</h3>
<p>Administrador do sistema.</p>
<p>QC 01 Conj. C Lote 10 - Santa Maria DF</p>
<p>9999-9999 / 3333-3333</p>
</div>

<div id='conteudo_curso'>
Página Restrita <br />
Definir Página Inicial
</div>

<?php include('footer.php'); ?>