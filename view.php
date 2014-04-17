<HTML>
	<BODY>
		<table style="width:300px">
			<?php
			include('header.php');


			function imagelink($Url){
				$str = file_get_contents($Url);
	/*if(strlen($str)>0){
		preg_match("/\<link rel='image_src' href='(.+)'>/",$str,$title);
		return $title;
	}*/
	return $str;
}
function getTitle($Url){
	$str = file_get_contents($Url);
	if(strlen($str)>0){
		preg_match("/\<title\>(.*)\<\/title\>/",$str,$title);
		return $title[1];
	}
}
//Access form variables
//$id=$_POST['id'];
$id=938;
$count=0;
//$password=$_POST['password'];

$query="select rating.movieid, movie.name,rating.rating,movie.url from movie inner join rating on movie.id=rating.movieid where rating.uid=$id";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	$mname = $row['name'];
	$mrating = $row['rating'];
	$url=$row['url'];
	echo "<tr>";
	/*if($count<=1)
	{
		$html =file_get_contents($url);
		echo "<th>";
		echo $html;
		echo "</th>";
		
		$dom = new DOMDocument();
		$dom->loadHTML($html);
		$dom = $dom->getElementsByTagName('td'); //find td
		$dom = $dom->item(0);                    //traverse the first td
		$dom = $dom->getElementsByTagName('b');  //find b
		$dom = $dom->item(0);                    //traverse the first b
		$dom = $dom->textContent;                //get text

		var_dump($dom);           
//		$ans=getTitle($url);
		$count=$count+1;
	}*/
	echo "<th>";
	echo $mname;
	echo "</th>";
	echo "<th>";
	echo $url;
	echo "</th>";
	echo "<th>";
	echo $mrating;
	echo "</th>";
	echo "</tr>";
}
//return $result;
?>
</table>
</BODY>
</HTML>
