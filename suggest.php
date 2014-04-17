<html>
<head>
	<title>Movie Time</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">
	<link rel="stylesheet" href="css/layouts/side-menu.css">
	<style>
	img {
		width: 120px;
		height: 120px;
	}
	table{
		margin-top: 20px;
		margin-left: 80px;
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
				<!-- <a class="pure-menu-heading" href="#">Company</a> -->

				<ul>
					<li><a href="./dashboard.php">Home</a></li>
					<li><a href="./displayMovies.php">Movies</a></li>
					<li><a href="#">Watched Movies</a></li>
					<li><a href="./sharad.php">Rate Movies</a></li>
					<li class="menu-item-divided pure-menu-selected"><a href="#">Suggest Me !</a></li>
					<li><a href="./logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="content">
			<table class="pure-table pure-table-horizontal">
				<thead>
					<tr>
						<th align:'center'>Image</th>
						<th align:'center'>Name</th>
					</tr>
				</thead>

				<tbody>
					<?php
					session_start();

					$id=$_SESSION['uid'];
					$users=$_SESSION['users'];

//echo $id.' '.$users;

					system('g++ main.cpp');
					exec("./a.out $id $users 1682",$result);

					$ct=0;
					foreach($result as $i)
					{
						$res=explode(" ",$i);
						if($ct%2==0)
						{
							echo '<tr class="pure-table-odd">';
						}	
					//echo $res[0].' , '.$res[1].' , '.$res[2]."<br/>";
						echo "<td><img src=./image/$res[0].jpg /></td>";
						$var=end($res);
						$name='';
						$ct1=0;
						foreach ($res as $key) {
						# code...
							if($ct1!=0 && $ct1!=count($res)-1)
							{
								$name=$name.' '.$key;
							}
							$ct1=$ct1+1;
						}

						echo "<td><a href='$var' >$name</a><br/></td></tr>";
						$ct=$ct+1;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
