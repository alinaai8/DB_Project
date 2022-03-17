<!-- Pagina de afișare a rezervărilor -->
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Rezervări</title>
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
		justify-content: top;
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
  		padding: 14px 16px;
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
  		padding: 12px 16px;
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
		width: 100px;
  		height: 50px;
  		transition: width 2s;
	}

	a.btn{
		background-color: #87CEFA;
  		border: none;
  		color: white;
  		padding: 15px 32px;
  		text-align: center;
  		text-decoration: none;
  		display: inline-block;
  		font-size: 16px;
	}

	a.btnd{
		background-color: red; 
  		border: none;
  		color: white;
  		padding: 15px 32px;
  		text-align: center;
  		text-decoration: none;
  		display: inline-block;
  		font-size: 16px;
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

	table {
 		border-collapse: collapse;
  		width: 100%;
	}

	th, td {
  		text-align: left;
  		padding: 10px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
  		background-color: #4CAF50;
  		color: white;
	}

	.row:after {
  		content: "";
  		display: table;
  		clear: both;
	}
	.column {
  		float: left;
  		width: 50%;
  		padding: 10px;
	}


	</style>
</head>
<body>

	<?php require_once 'procesareevenimente.php';?>

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
  		<li class="a"><a href="clienti.php">Clienți</a>
  		<li class="a"><a href="organizatori.php">Organizatori</a></li>
  		<li class="a"><a href="mancare.php">Tipuri de mâncare</a></li>
  		<li class="a"><a href="meniuri.php ">Meniuri</a></li>
  		<li class="a"><a class ="active" href="rezervari.php">Rezervări</a></li>
  		<li class="a"><a href="sali.php">Săli</a></li>
  		<li class="a"><a href="evenimente.php">Evenimente</a></li>
	</ul>

	<br>
	<br>
	<h1>Lista rezervărilor</h1>
	<p>
	<?php
		$conn = new mysqli('localhost', 'root', '', 'ballroom'); //Conectarea la baza de date
		//Legăturile dintre tabela de rezervări și cele de săli, meniuri și clienți
		$sql = "SELECT * from sala INNER JOIN rezervari ON sala.idSala = rezervari.idSala ";
		$sql1 = "SELECT * from meniu INNER JOIN rezervari ON meniu.idMeniu = rezervari.idMeniu";
		$sql2 = "SELECT * from clienti INNER JOIN rezervari ON clienti.id = rezervari.id";
		$result = mysqli_query($conn, $sql);
		$result1 =  mysqli_query($conn, $sql1);
		$result2 = mysqli_query($conn, $sql2);

	?>

	<!-- Afișarea legăturilor -->
	<div class="row">
	<div class="column">
		<table class ="table">
			<thead>
				<tr>
					<th>Nume Client</th>
					<th>Prenume Client</th>
					<th>Sala</th>
					<th>Data</th>
					<th>Ora</th>
					<th>Numărul de persoane</th>
					<th>Meniul</th>
				</tr>
			</thead>
			<?php 
				while ($row = $result->fetch_assoc() AND $row1 = $result1->fetch_assoc() AND $row2 = $result2->fetch_assoc()): ?> 
					<tr>
						<td><?php echo $row2['nume']; ?></td>
						<td><?php echo $row2['prenume']; ?></td>
						<td><?php echo $row['denumire_sala']; ?></td>
						<td><?php echo $row['data']; ?></td>
						<td><?php echo $row['ora']; ?></td>
						<td><?php echo $row['nr_pers']; ?></td>
						<td><?php echo $row1['denumire_meniu']; ?></td>
					</tr>
			<?php endwhile; ?>
		</table>
	</div>

		<!-- Afișarea clienților care au evenimentul pe o anumită dată  -->
		<div class="column">
			<table class ="table">
				<thead>
					<tr>
						<th>Nume Client</th>
						<th>Prenume Client</th>
					</tr>
				</thead>
			<?php 

				$sql = "SELECT nume, prenume FROM clienti WHERE id = (SELECT id from rezervari WHERE data  = '2021-01-29') ";
					$result = mysqli_query($conn, $sql);
				while ($row = $result->fetch_assoc()): ?> 
					<tr>
						<td><?php echo $row['nume']; ?></td>
						<td><?php echo $row['prenume']; ?></; ?></td>
					</tr>
			<?php endwhile; ?>
		</table>
	</div>

	</div>
	</p>


</body>
</html>