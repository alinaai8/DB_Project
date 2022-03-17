<!-- Pagina de afișare a legăturii dintre tabelele contact și evenimente -->

<?php


	$conn = new mysqli('localhost', 'root', '', 'ballroom');

?>

<!DOCTYPE html>
<html>
<head>
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

	<ul class="a">
  		<li><a href="home.php">Acasă</a></li>
  		<li><a href="clienti.php">Clienți</a></li>
  		<li><a href="organizatori.php">Organizatori</a></li>
  		<li><a href="mancare.php">Tipuri de mâncare</a></li>
  		<li class="a"><a href="meniuri.php">Meniuri</a></li>
  		<li class="a"><a href="rezervari.php">Rezervări</a></li>
  		<li class="a"><a href="sali.php">Săli</a></li>
  		<li class="a"><a class ="active" href="evenimente.php">Evenimente</a></li>
	</ul>

	<br>
	<br>
	<h1>Lista evenimentelor și a Organizatorilor aferenți</h1>

	<p>

	<br><br><br>
	<div class="row">
		<div class="column">
		<table class ="table">
			<thead>
				<tr>
					<th>Evenimente</th>
					<th>Nume Organizator</th>
					<th>Prenume Organizator</th>
					<th>Număr de telefon Organizator</th>
					<th>E-mail Organizator Organizator</th>
				</tr>
			</thead>

	<!-- Interogare simplă pentru a accesa datele din contact și eveniment și a afișa numele evenimentului și datele organizatorului său -->

	<?php
		$sql = "SELECT * from contact INNER JOiN eveniment ON contact.idC = eveniment.idC"; //Se rețin datele
		$result = mysqli_query($conn, $sql);
		// Cât timp se pot extrage date, acestea se vor afișa
		while($row= mysqli_fetch_assoc($result)):?> 
				<tr>
					<td><?php echo $row['Nume_Eveniment'] ?></td>
					<td><?php echo $row['numec']; ?></td>
					<td><?php echo $row['prenumec']; ?></td>
					<td><?php echo $row['telefonc']; ?></td>
					<td><?php echo $row['emailc']; ?> </td>
				</tr>
		<?php endwhile; ?>
		</table>

	<!-- Tabelul care afișează de câte evenimente se ocupă fiecare organizator -->
	</div>
		<div class = "column">
		<table class ="table">
			<thead>
				<tr>
					<th>Număr de Evenimente</th>
					<th>Nume Organizator</th>
					<th>Prenume Organizator</th>
				</tr>
			</thead>

	<?php
		$sql = "SELECT * ,(SELECT COUNT(*) FROM eveniment WHERE eveniment.idC=contact.idC) as nr_e FROM contact"; //Am folosit funcția count pentru a număra și cu ajutorul unei interogări complexe am reținut datele necesare pentru afișarea lucrurilor dorite
		$result = mysqli_query($conn, $sql);

		while($row= mysqli_fetch_assoc($result)):?>
				<tr>
					<td><?php echo $row['nr_e']; ?></td>
					<td><?php echo $row['numec']; ?></td>
					<td><?php echo $row['prenumec']; ?></td>
				</tr>
		<?php endwhile; ?>
		</table>
	</div>
	</div>
</p>


	
</body>
</html>
