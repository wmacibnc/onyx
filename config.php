<?php
$servidor = "localhost";
$login = "root";
$senha = "";
$base = "onyx";
mysql_connect($servidor,$login, $senha) or die("MySql Error!");
mysql_select_db($base) or die("Database Error!"); 
?>