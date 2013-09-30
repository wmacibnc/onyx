<?php

include('../../config.php');
include("../header.php");

$tbl_name="forum_question"; // Table name 

// get data that sent from form 
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];


$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$result=mysql_query($sql);

if($result){
echo "Salvo com sucesso!<br />";
echo "<a href='forum/index.php'>Lista de Tópicos</a>";
}
else {
 echo mysql_error();
echo "ERROR";
}
mysql_close();
include("../footer.php");
?>