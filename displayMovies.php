<?php
include_once 'header.php';
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
	<link rel="stylesheet" href="./pure-layout-side-menu/css/layouts/side-menu.css">
	<script src="js/ui.js"></script>
	<style>
	img {
		width: 80px;
		height: 80px;
	}
	table {
		margin-top: 20px;
	}
	</style>
</head>
<body>
	<div id="layout">
		<a href="#menu" id="menuLink" class="menu-link">
			<span></span>
		</a>
		<div id="menu">
			<div class="pure-menu pure-menu-open">
				

				<ul>
					<li><a href="./dashboard.php">Home</a></li>
					<li class="menu-item-divided pure-menu-selected"><a href="#">Movies</a></li>
					<li><a href="./watchedmovies.php">Watched Movies</a></li>

					<?php
					    $id=$_SESSION['uid'];
					    $query="select rated from user where id=$id";
					    $res=mysql_query($query);
					    $flag=0;
					    while($row = mysql_fetch_array($res)){
					        if($row['rated']>=20){
					            $flag=1;
					        }
					    }
					    if($flag==1)
					    {
					        echo "<li><a href='./suggest.php'>Suggest Me !</a></li>";
					    }
					?>
					<li><a href="./logout.php">Logout</a></li>
					<li><a href="./fb/connect.php">Facebook !</a></li>
				</ul>
			</div>
		</div>
		<div class="content">
			<table class="pure-table pure-table-horizontal">
				<thead>
					<tr>
						<!-- <th>Id</th> -->
						<th>Image</th>
						<th align:'center'>Name</th>
						<th>Genres</th>
					</tr>
				</thead>

				<tbody>

					<?php
					$query = 'select * from movie';
					$result = mysql_query($query);
					$ct=0;

					while($row = mysql_fetch_array($result)){
						$id = $row['id'];
						$name = $row['name'];
						$url = $row['url'];
						$unknown = $row['unknown'];
						$Action = $row['Action'];
						$Adventure = $row['Adventure'];
						$Animation = $row['Animation'];
						$Childrens = $row['Childrens'];
						$Comedy = $row['Comedy'];
						$Crime = $row['Crime'];
						$Documentary = $row['Documentary'];
						$Drama = $row['Drama'];
						$Fantasy = $row['Fantasy'];
						$FilmNoir = $row['FilmNoir'];
						$Horror = $row['Horror'];
						$Musical = $row['Musical'];
						$Mystery = $row['Mystery'];
						$Romance = $row['Romance'];
						$SciFi = $row['SciFi'];
						$Thriller = $row['Thriller'];
						$War = $row['War'];
						$Western = $row['Western'];

						$genre='';
						if ($unknown==1) {
							$genre=$genre.'Unknown,';
							# code...
						}
						if ($Action==1) {
							$genre=$genre.' Action,';
							# code...
						}
						if ($Adventure==1) {
							$genre=$genre.' Adventure,';
							# code...
						}
						if ($Animation==1) {
							$genre=$genre.' Animation,';
							# code...
						}
						if($Childrens==1){
							$genre=$genre.' Childrens,';
						}
						if ($Comedy==1) {
							$genre=$genre.' Comedy,';
							# code...
						}
						if ($Crime==1) {
							$genre=$genre.' Crime,';
							# code...
						}
						if ($Documentary==1) {
							$genre=$genre.' Documentary,';
							# code...
						}
						if ($Drama==1) {
							$genre=$genre.' Drama,';
							# code...
						}
						if ($Fantasy==1) {
							$genre=$genre.' Fantasy,';
							# code...
						}
						if ($FilmNoir==1) {
							$genre=$genre.' Film-Noir,';
							# code...
						}
						if ($Horror==1) {
							$genre=$genre.' Horror,';
							# code...
						}
						if ($Musical==1) {
							$genre=$genre.' Musical,';
							# code...
						}
						if ($Mystery==1) {
							$genre=$genre.' Mystery,';
							# code...
						}
						if ($Romance==1) {
							$genre=$genre.' Romance,';
							# code...
						}
						if ($SciFi==1) {
							$genre=$genre.' Sci-Fi,';
							# code...
						}
						if ($Thriller==1) {
							$genre=$genre.' Thriller,';
							# code...
						}
						if ($War==1) {
							$genre=$genre.' War,';
							# code...
						}
						if ($Western==1) {
							$genre=$genre.' Western,';
							# code...
						}
						if(substr($genre,-1)==','){
							$genre=substr($genre,0,-1);
						}

						if ($ct%2 ==0) {
							# code...
							echo '<tr class="pure-table-odd">';
							/*echo '<td>'.$id.'</td>';*/
							echo '<td><img src="image/'.$id.'.jpg" />';
							echo '<td><a href="'.$url.'">'.$name.'</a>'.'</td>';
							echo '<td>'.$genre.'</td>';
							echo '</tr>';
						}
						else{
							echo '<tr>';
							/*echo '<td>'.$id.'</td>';*/
							echo '<td><img src="image/'.$id.'.jpg" />';
							echo '<td><a href="'.$url.'">'.$name.'</a>'.'</td>';
							echo '<td>'.$genre.'</td>';
							echo '</tr>';	
						}
						$ct=$ct+1;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
<!--  -->