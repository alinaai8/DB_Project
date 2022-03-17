<!-- Cod sursă pentru butoanele de salvat, șters, editat și update ale tabelei de evenimente-->
<?php

	// Conectarea la baza de date
	$mysqli = new mysqli('localhost', 'root', '', 'ballroom');
	if($mysqli->connect_error) {
		die("Inregistrare esuata: " . $mysqli->connect_error);
	}

	//Butonul de ștergere

	if(isset($_GET['delete'])) {
		$idBallroom= $_GET['delete'];
		$sqli = "DELETE FROM eveniment WHERE idBallroom=$idBallroom "; //Se șterg datele selectate din tabelă
		if ($mysqli->query($sqli) == TRUE) {
 			echo "Record deleted successfully";
		} else {
  			echo "Error deleting record: " . $conn->error;
			}

		header("location: evenimente.php");
	}

	//Variabile pentru butonul de editare

	$idBallroom = 0;
	$update = false;
	$Nume_Eveniment = '';

	 //Butonul de editare

	if(isset($_GET['edit'])) {
		$idBallroom = $_GET['edit'];
		$update = true;
		$sqle = "SELECT * FROM eveniment WHERE idBallroom=$idBallroom "; //Se selectează din tabelă datele ce urmează să fie editate și se rețin in variabilele alese
		$result = $mysqli->query($sqle); 
		if ($result->num_rows){
        	$row = $result->fetch_array();
        	$Nume_Eveniment = $row['Nume_Eveniment'];
        }
	}

	//După ce se modifică datele se va apăsa pe butonul de update
	//Butonul de update reține datele nou introduse

	if(isset($_POST['update'])) {
		$idBallroom = $_POST['idBallroom'];
		$Nume_Eveniment = $_POST['Nume_Eveniment'];
		$idC =  "SELECT idC FROM contact";

		$sqlu = "UPDATE eveniment SET Nume_Eveniment='$Nume_Eveniment' WHERE idBallroom=$idBallroom"; //Înserează datele în tabelă
		if($mysqli->query($sqlu) == TRUE) { 
			echo "Ați înregistrat un nou eveniment";
		} else {
			echo "Eroare" . $sqlu . "<br" . $mysqli->error;
		}

		header("location: evenimente.php");
	}

	$mysqli->close();

	?>