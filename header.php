<?php
$host="localhost"; //replace with database hostname 
$username="root"; //replace with database username 
$password="Itsanew1"; //replace with database password 
$db_name="RecommendationEngine"; //replace with database name

$con=mysql_connect("$host", "$username", "$password"); 
mysql_select_db("$db_name");
?>
