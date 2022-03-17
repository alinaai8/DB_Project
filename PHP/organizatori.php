<!-- Pagina de afișare a tabelei de origanizatori -->

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Organizatori</title>
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

	</style>
</head>
<body>

	<?php require_once 'procesareorganizatori.php';?>

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
  		<li ><a href="clienti.php">Clienți</a></li>
  		<li class="dropdown"><a class="active" href="organizatori.php" class="dropbtn">Organizatori</a>
  			<div class="dropdown-content">
      			<a href="adaugaorganizatori.php">Adaugă Organizator</a>
      		</div>
  		<li><a href="mancare.php">Tipuri de mâncare</a></li>
  		<li><a href="#">Meniuri</a></li>
  		<li><a href="#">Rezervări</a></li>
  		<li><a href="#">Săli</a></li>
  		<li><a href="evenimente.php">Evenimente</a></li>
	</ul>

	<br>
	<br>
	<h1>Lista organizatorilor</h1>
	<p>

	<!-- Conectarea la baza de date -->
	<?php
		$mysqli = new mysqli('localhost', 'root', '', 'ballroom');
		if($mysqli->connect_error) {
			die("Inregistrare esuata: " . $mysqli->connect_error);
		}

		$sql= "SELECT * FROM contact"; //Salvarea informațiilor din tabela de contact

		$result = $mysqli->query($sql);

	?>

	<!-- Afișarea informațiilor din tabela de contact -->

	<div class="row justify-content-center">
		<table class ="table">
			<thead>
				<tr>
					<th>Nume</th>
					<th>Prenume</th>
					<th>Telefon</th>
					<th>E-mail</th>
					<th colspan="2">Acțiune</th>
				</tr>
			</thead>
			<?php 
				while ($row = $result->fetch_assoc()): ?> 
					<tr>
						<td><?php echo $row['numec']; ?></td>
						<td><?php echo $row['prenumec']; ?></td>
						<td><?php echo $row['telefonc']; ?></td>
						<td><?php echo $row['emailc']; ?></td>
						<td>
							<!-- Butoanele de ștergere și editare -->
							<a href="procesareorganizatori.php?delete=<?php echo $row['idC'];?>" class="btnd btn delete">Șterge</a>
							<a href="organizatori.php?edit=<?php echo $row['idC'];?>" class="btn">Editează</a>
						</td>
					</tr>
			<?php endwhile; ?>
		</table>
	</div>
		<!-- Dacă se apasă pe butonul de editare va apărea formularul de editare -->
		<?php
			if($update == true):
		?>

		<div class = "row justify-content-center">
			<form action = "procesareorganizatori.php" method="POST">
				<input type="hidden" name="idC" value="<?php echo $idC?>">
				<div class="form-group">
					<label>Nume</label>
					<input type="text" name="numec" value="<?php echo $numec;?>" placeholder = "Introduceți un nume nou">
				</div>
				<div class="form-group">
					<label>Prenume</label>
					<input type="text" name="prenumec" value="<?php echo $prenumec;?>" placeholder = "Introduceți un prenume nou">
				</div>
				<div class="form-group">
					<label>Număr de telefon</label>
					<input type="number" name="telefonc" value="<?php echo $telefonc;?>" placeholder = "Introduceți un număr de telefon nou">
				</div>
				<div class="form-group">
					<label>E-mail</label>
					<input type="text" name="emailc" value="<?php echo $emailc;?>" placeholder = "Introduceți un email nou">
				</div>
				<div class="form-group">
					<button type="submit" name="update" class="btn btn-info">Update</button> 
				</div>
			</form>
		</div>
			<?php endif; ?>
	</p>
	
</body>
</html>