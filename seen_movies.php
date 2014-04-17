<HTML>
<BODY>
<table style="width:300px">
<?php
include('header.php');

//Access form variables
//$id=$_POST['id'];
$id=938;
//$password=$_POST['password'];

$query="select rating.movieid, movie.name,rating.rating from movie inner join rating on movie.id=rating.movieid where rating.uid=$id";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	$mname = $row['name'];
	$mrating = $row['rating'];
	echo "<tr>";
	echo "<td>";
	echo $mname;
	echo "</td>";
	echo "<td>";
	echo $mrating;
	echo "</td>";
	echo "</tr>";
}
//return $result;
?>
</table>
</BODY>
</HTML>
