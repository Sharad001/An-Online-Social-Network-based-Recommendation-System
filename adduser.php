<?php
include('header.php');

$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$profession=$_POST['profession'];
$age=$_POST['age'];
$gender=$_POST['gender'];

$query="insert into user(name,password,email,profession,age,gender,rated) values('$name','$password','$email','$profession','$age','$gender',0)";
//echo $query.'<br />';
mysql_query($query);
$id=mysql_insert_id();

$app = "$id|$age|$gender|$profession|5656\n";

$myFile = "./input/u.user";
$fh = fopen($myFile, 'a');
fwrite($fh, $app);
fclose($fh);

header("Location: index.php?uid=$id");
//echo($id);
?>