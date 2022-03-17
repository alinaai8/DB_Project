<!-- Cod sursă pentru butoanele de salvat, șters, editat și update ale tabelei de mâncare -->
<?php

	// Conectarea la baza de date
	$mysqli = new mysqli('localhost', 'root', '', 'ballroom');
	if($mysqli->connect_error) {
		die("Inregistrare esuata: " . $mysqli->connect_error);
	}

	// Butonul de save

	if(isset($_POST['save'])){ //dacă se apasă pe butonul de save

		//Se salvează datele introduse în variabilă

		$denumire_mancare = $_POST['denumire_mancare'];

		//Se introduc variabilele în tabelă

		$sql= "INSERT INTO mancare(denumire_mancare) VALUES('$denumire_mancare')"; //Se șterg datele selectate din tabelă

		$_SESSION['message'] = "Tipul de mâncare a fost înregistrat!";
		$_SESSION['msg_type'] = "succes";

		if($mysqli->query($sql) == TRUE) {
			echo "Ați înregistrat un nou tip de mâncare";
		} else {
			echo "Eroare" . $sql . "<br" . $mysqli->error;
		}

		header("location: mancare.php");
	}

	//Butonul de ștergere

	if(isset($_GET['delete'])) {
		$idMancare= $_GET['delete'];
		$sqli = "DELETE FROM mancare WHERE idMancare=$idMancare ";
		if ($mysqli->query($sqli) == TRUE) {
 			echo "Record deleted successfully";
		} else {
  			echo "Error deleting record: " . $conn->error;
			}

		header("location: mancare.php");
	}

	//Variabile pentru butonul de editare

	$idMancare = 0;
	$update = false;
	$denumire_mancare = '';

	 //Butonul de editare

	if(isset($_GET['edit'])) {
		$idMancare = $_GET['edit'];
		$update = true;
		$sqle = "SELECT * FROM mancare WHERE idMancare=$idMancare"; //Se selectează din tabelă datele ce urmează să fie editate și se rețin in variabilele alese
		$result = $mysqli->query($sqle); 
		if ($result->num_rows){
        	$row = $result->fetch_array();
        	$denumire_mancare = $row['denumire_mancare'];
        }
	}

	//După ce se modifică datele se va apăsa pe butonul de update
	//Butonul de update reține datele nou introduse

	if(isset($_POST['update'])) {
		$idMancare = $_POST['idMancare'];
		$denumire_mancare = $_POST['denumire_mancare'];

		$sqlu = "UPDATE mancare SET denumire_mancare='$denumire_mancare' WHERE idMancare=$idMancare"; //Înserează datele în tabelă
		if($mysqli->query($sqlu) == TRUE) {
			echo "Ați înregistrat un nou tip de mâncare";
		} else {
			echo "Eroare" . $sqlu . "<br" . $mysqli->error;
		}

		header("location: mancare.php");
	}

	$mysqli->close();

	?>