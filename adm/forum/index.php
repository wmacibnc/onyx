<?php
include('../../config.php');
include('../header.php');

$tbl_name="forum_question"; // Table name 


$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
// OREDER BY id DESC is order result by descending

$result=mysql_query($sql);
?>

<div id="conteudo_curso">
<a href="forum/create_topic.php"><strong><img src='../imagens/icone/curso_adiciona-icone.png'>
<table class='display' id='example'>
<thead>
<tr>
<td align="center"><strong>Id</strong></td>
<td align="center"><strong>Tópico</strong></td>
<td align="center"><strong>Visitas</strong></td>
<td align="center"><strong>Respostas</strong></td>
<td align="center"><strong>Data</strong></td>
</tr>
</thead>
<tbody>
<?php
 
// Start looping table row

while($rows=mysql_fetch_array($result)){
?>
<tr>
<td align="center"><?php echo $rows['id']; ?></td>
<td align="center"><a href="forum/view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><br></td>
<td align="center"><?php echo $rows['view']; ?></td>
<td align="center"><?php echo $rows['reply']; ?></td>
<td align="center"><?php echo $rows['datetime']; ?></td>
</tr>

<?php
// Exit looping and close connection 
}
mysql_close();
?>

</tbody>
</table>
</div>
<?php include('../footer.php'); ?>