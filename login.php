<!--Codul pentru pagina de LOGIN se conectează la baza de date și se verifică conexiunea, se extrag datele din tabelul de useri -->

<?php

session_start();
include "db_conn.php";

//Se verifică dacă există nume și parolă în tabel și dacă acestea există se rețin valorile

if (isset($_POST['uname']) && isset($_POST['password'])) {
	function validate($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);


	// Condiții dacă un câmp este gol să anunțe că trebuie completat

	if (empty($uname)) {
		header("Location: index.php?error=Username is required");
		exit();
	}else if (empty($pass)) {
		header("Location: index.php?error=Password is required");
		exit();
	} else{
		 $sql = "SELECT * FROM users WHERE username='$uname' AND password = '$pass'"; // Se selectează din tabel numele și parola

		 $result = mysqli_query($conn, $sql);


		 //Dacă acestea sunt bune utilizatorul se va loga, altfel va anunța că nu sunt introduse datele bune
		 if ( mysqli_num_rows($result) === 1) { 
		 	$row = mysqli_fetch_assoc($result);
		 	if($row['username'] === $uname && $row['password'] === $pass){
		 		$_SESSION['username'] = $row['username'];
		 		$_SESSION['nume'] = $row['nume'];
		 		$_SESSION['id'] = $row['id'];
		 		header("Location: home.php");
		 		exit();
		 	}else {
		 	header("Location: index.php?error=Incorect Username or password");
			exit();
		 	}
		}else {
		 	header("Location: index.php?error=Incorect Username or password");
			exit();
		 }
	}
}else {
	header("Location: index.php");
	exit();
}