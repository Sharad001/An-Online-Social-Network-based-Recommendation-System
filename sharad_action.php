<?php
include('header.php');
session_start();

$movies=$_POST['movies'];
$h=$_POST['rating'];
$id=$_SESSION['uid'];

echo $movies;
echo $h;

$query="select * from rating where uid=$id and movieid=$movies";
$res=mysql_query($query);

$flag=0;
while($row = mysql_fetch_array($res)){
	//echo "hi";
	$flag=1;
	
}
if($flag==0){

	$id=$_SESSION['uid'];
	$query="select rated from user where id=$id";
	$res=mysql_query($query);
	$flag=0;
	while($row = mysql_fetch_array($res)){
		$flag=$row['rated'];
	}
	$flag=$flag+1;
	$query="update user set rated = $flag where id=$id";
	$res=mysql_query($query);

	$query="insert into rating values('$id','$movies','$h')";
	mysql_query($query);
	$app = "$id\t$movies\t$h\t9798798\n";
	echo $app;
	$myFile = "./input/u.data";
	$fh = fopen($myFile, 'a');
	fwrite($fh, $app);
	fclose($fh);
	header("Location: sharad.php");
}
else
{
	header("Location: sharad.php");
	echo "<script> alert('You have already rated this') </script>";
}
?>