<?php
include('header.php');
session_start();

//Access form variables
$id=$_POST['id'];
$password=$_POST['password'];

if($id>943)
$password=md5($_POST['password']);

$query="select * from user";
$result = mysql_query($query);
$temp=mysql_num_rows($result);
$_SESSION['users']=$temp;

$query="select * from user where id = '$id' and password = '$password'";
$result = mysql_query($query);

if(mysql_num_rows($result) == 1)
{
	$_SESSION['uid']=$id;
	session_write_close();
	header('Location: dashboard.php');
}
else
	header('Location: false.php');
?>
