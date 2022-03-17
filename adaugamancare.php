<!-- Pagină de adăugat un nou tip de mâncare -->

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Clienți</title>
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
		background-image: url('4.png');
		background-repeat: no-repeat;
		background-attachment: fixed;
  		background-size: 100px 100px;
  		background-position: left bottom;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		flex-direction: column;
	}
	ul.a {
  		list-style-type: none;
 		margin: 0;
  		padding: 0;
  		overflow: hidden;
 		background-color: #555;
 		position: fixed;
 		top: 0;
 		width: 100%;
	}

	ul.b {
 		 list-style-type: none;
  		margin: 0;
  		padding: 0;
  		width: 25%;
  		background-color: #f1f1f1;
  		position: fixed;
  		height: 100%;
  		overflow: auto;
	}		

	li.a {
  		float: left;
  		border-right: 1px solid #bbb;
	}

	li.a:last-child{
		border-right: none;
	}

	li.a a, .dropbtn {
 		display: inline-block;
  		color: white;
  		text-align: center;
  		padding: 15px 20px;
  		text-decoration: none;
	}

	li.a a:hover, .dropdown:hover .dropbtn {
  		background-color: green;
  		width: 200px;
  		height: 50px;
  		transition: width 2s;
	}

	li.a.dropdown {
  		display: inline-block;
	}

	li.a a:hover:not(.active) {
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

	input[type=text], select {
  		width: 100%;
  		padding: 12px 20px;
  		margin: 8px 0;
  		display: inline-block;
 		border: 1px solid #ccc;
  		border-radius: 4px;
  		box-sizing: border-box;
	}

	input[type=number], select {
  		width: 100%;
  		padding: 12px 20px;
  		margin: 8px 0;
  		display: inline-block;
 		border: 1px solid #ccc;
  		border-radius: 4px;
  		box-sizing: border-box;
	}

	button[type=submit] {
  		width: 100%;
 		background-color: #4CAF50;
  		color: white;
  		padding: 14px 20px;
  		margin: 8px 0;
  		border: none;
  		border-radius: 4px;
  		cursor: pointer;
	}

	button[type=submit]:hover {
  		background-color: #45a049;
	}


	div {
  		border-radius: 5px;
  		background-color: #f2f2f2;
  		padding: 20px;
	}

	img {
		position: absolute;
		right: 0px;
		bottom: 0px;
	}

	</style>
</head>
<body>

	<?php require_once 'procesaremancare.php';?>

	<?php 

	if(isset($_SESSION['message'])): ?>

	<div class="alert alert-<?=$_SESSION['msg_type']?>">
		
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?> 
	</div>
	<?php endif ?>

	<ul class="a">
  		<li class="a"><a href="home.php">Acasă</a></li>
  		<li class="a"><a href="clienti.php">Clienți</a></li>
  		<li class="a"><a href="organizatori.php">Organizatori</a></li>
  		<li class="a"><a class ="active" href="mancare.php">Tipuri de mâncare</a></li>
  		<li class="a"><a href="#">Meniuri</a></li>
  		<li class="a"><a href="#">Rezervări</a></li>
  		<li class="a"><a href="#">Săli</a></li>
  		<li class="a"><a href="#">Evenimente</a></li>
	</ul>

	<!-- Formular de adăugare a unui nou tip de mâncare -->

	<div class = "row justify-content-center">
		<form action = "procesaremancare.php" method="POST">
			<div class="form-group">
				<label>Denumire mâncare</label>
				<input type="text" name="denumire_mancare" class="form-control" placeholder="Denumirea mâncării">
			</div>
			<div class="form-group">
				<button type="submit" name="save" class="btn btn-primary">Salvați</button> 
			</div>
		</form>
	</div>
</body>
</html>



