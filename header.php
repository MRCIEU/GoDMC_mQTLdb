<!DOCTYPE HTML>
<?php 
$dirname = dirname($_SERVER['PHP_SELF']);
if ($dirname != '/') {
	$hosturi =  '//'.$_SERVER['HTTP_HOST'].$dirname;
} else {
	$hosturi =  '//'.$_SERVER['HTTP_HOST'];
}
?>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>GoDMC Database</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="index.php">GoDMC</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index">Home</a></li>
						<li><a href="search">Search</a></li>
						<li><a href="cohorts">Cohorts</a></li>
						<li><a href="downloads">Downloads</a></li>
						<li><a href="about">About</a></li>
					</ul>
				</nav>
			</header>

