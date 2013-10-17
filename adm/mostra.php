<?php 
include '../config.php';
$id = $_SESSION['UsuarioID'];
$resultado = mysql_query("select * from usuario where id=".$id."");
$row2 = mysql_fetch_array($resultado);
$foto = $row2['imagem'];
?>
<img src="../uploads/<?php echo $foto; ?>" height='250px' width='auto'>