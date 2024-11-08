<!DOCTYPE html>
<html lang="ro">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="font-awesome.min.css">
		<title>DezeerTeam-Movie Page</title>
	</head>
	<body>
	<header>
		<div class="menu">
			<img src="images\logo2.png" alt="SM_movies" class="ImageLogo" style="width:200px;height:200px;padding:7px;"></li>
			<img src="images\digital.png" alt="SM_movies" class="ImageLogo" style="width:191px;height:100px;padding:7px;"></li>
			<h3 class="logo_alt">DezeerTeam-Movie Page</h3>
			<ul>
			  <li class="active"><a href="index.php">Home</a></li>
			  <li><a href="archive.php">Movies</a></li>
			  <li><a href="genres.php">Genres</a></li>
			  <li style="float:right;" id="Contact"><a  href="contact.php">Contact</a></li>
				<li id="search">
					<form class="search-bar" action="search-results.php">
					  <input type="text" placeholder="Search..." name="s">
					  <button type="submit"><i class="fa fa-search"></i></button>
					</form>
				</li>
			</ul>
		</div>
	</header>
	<?php include 'functions.php';
	$movies = json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->movies;
	$genres = json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->genres;
	$max_runtime = longest_movie($movies);
	?>
