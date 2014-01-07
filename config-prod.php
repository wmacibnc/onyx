<?php
$servidor = "localhost";
$login = "institu2_admin";
$senha = "onyx2013";
$base = "institu2_onyx";
mysql_connect($servidor,$login, $senha) or die("MySql Error!");
mysql_select_db($base) or die("Database Error!"); 
?>