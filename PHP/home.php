<!-- Pagina de Acasă -->

<?php
session_start();

// Conectarea la baza de date și afișarea contului de utilizator

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>
<head>

	<!-- Realizarea interfeței -->

	<title>Acasă</title>
	<link rel="stylesheet" type="text/css">
	<meta charset = "utf-8">
	<meta name ="viewport" content="width=device-width, initial-scale=1">
	<style>
	*{
		box-sizing: border-box;
		font-family: sans-serif;
		-webkit-font-smoothing: antialiased;
  		-moz-osx-font-smoothing: grayscale;
	}
	body{
		margin: 0;
		background-repeat: no-repeat;
		background-attachment: fixed;
  		background-size: auto;
  		background-position: left bottom;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		flex-direction: column;
	}
	ul {
  		list-style-type: none;
 		margin: 0;
  		padding: 0;
  		overflow: hidden;
 		background-color: #555;
 		position: fixed;
 		top: 0;
 		width: 100%;
	}		

	li {
  		float: left;
  		border-right: 1px solid #bbb;
	}

	li:last-child{
		border-right: none;
	}

	li a, .dropbtn {
 		display: inline-block;
  		color: white;
  		text-align: center;
  		padding: 15px 20px;
  		text-decoration: none;
	}

	li a:hover, .dropdown:hover .dropbtn {
  		background-color: green;
  		width: 200px;
  		height: 50px;
  		transition: width 2s;
	}

	li.dropdown {
  		display: inline-block;
	}

	li a:hover:not(.active) {
		background-color: #555;
	}

	.active{
		background-color: #4CAF50;
	}

	.dropdown-content {
  		display: none;
  		position: absolute;
  		background-color: #555;
  		min-width: 160px;
  		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  		z-index: 1;
	}

	.dropdown-content a {
  		color: white;
  		padding: 15px 20px;
  		text-decoration: none;
  		display: block;
  		text-align: left;
	}

	.dropdown-content a:hover {background-color: green;}

	.dropdown:hover .dropdown-content {
  		display: block;
	}

	a {
		float:right;
		background: #555;
		padding: 10px 15px;
		color: #fff;
		border-radius: 5px;
		margin-right: 10px;
		border: none;
		text-decoration: none;
	}

	a:hover {
		opacity: .7;
		width: 70px;
  		height: 50px;
  		background: red;
  		transition: width 2s;
	}

	h1 {
		text-align: center;
		color: #555;
	}
	* {
  		box-sizing: border-box;
	}	

	body {
  		font-family: Arial;
  		padding: 10px;
  		background: #f1f1f1;
	}

	.header {
  		padding: 30px;
  		text-align: center;
  		background: #f1f1f1;
	}

	.header h1 {
  		font-size: 50px;
	}

	</style>
</head>

<body>

	<!-- Meniul -->

	<div class="header">
  		<h1>Planificator evenimente pentru Ballroom</h1>
	</div>

	<ul>
  		<li class="a"><a class ="active" href="home.php">Acasă</a></li>
  		<li><a href="clienti.php">Clienți</a></li>
  		<li><a href="organizatori.php">Organizatori</a></li>
  		<li><a href="mancare.php">Tipuri de mâncare</a></li>
  		<li class="a"><a href="meniuri.php">Meniuri</a></li>
  		<li class="a"><a href="rezervari.php">Rezervări</a></li>
  		<li class="a"><a href="sali.php">Săli</a></li>
  		<li class="a"><a href="evenimente.php">Evenimente</a></li>
	</ul>

	<h1>Bine ai venit, <?php echo $_SESSION['nume']; ?></h1><br>
	<a href="logout.php">Ieșire</a>

	
</body>
</html>

<?php
}else{
	header("Location: index.php");
	exit();
}

?>