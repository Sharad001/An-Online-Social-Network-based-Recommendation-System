<?php
include('header.php');
session_start();
?>

<html>
<head>
	<link rel="stylesheet" href="./pure-min.css">	
	<link rel="stylesheet" href="./1.7.7.css">
	<script async="" src="./Pure_files/analytics.js"></script><script src="./Pure_files/gis6vng.js"></script><style type="text/css"></style>	
	<script src="http://use.typekit.net/gis6vng.js"></script>
	<script>
	try { Typekit.load(); } catch (e) {}
	</script>
		<style type="text/css">.header h1,.hero h1,.hero h2,.tk-omnes-pro{font-family:"omnes-pro",sans-serif;}</style>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-41480445-1', 'purecss.io');
	ga('send', 'pageview');
	<?php
	$var=$_GET['uid'];
	if($var>943){
		echo "var x=$var;";
		echo "alert('Welcome ! Your Login ID is ' + ' ' + x);";
	}
	?>
	</script>
	<style>
	.myclass{
		margin-top: 10px;
	}
	</style>
</head>

<body>
	<div class="pure-u-1" id="main" style="position:absolute;width:100%;left:0%;top:0%">
		<div class="hero" id="default">
			<div class="hero-titles">
				<h2>Online Movie Recommendation Engine</h2>
			</div>
			<div class="hero-titles">
				<h1>Login</h1>
			</div>
			<form class="pure-form" method="post" action="loginProcess.php">
				<input placeholder="User Id" name="id" type="text" />
				<input placeholder="Password" type="password" name="password"/>
				<input name="login" type="submit" class="pure-button pure-button-primary" value="Login" />
			</form>
			<form class="pure-form myclass" method="post" action="register.php">
				<input name="login" type="submit" class="pure-button pure-button-primary" value="New User !" />
			</form>
		</div>
	</div>
</body>
</html>
