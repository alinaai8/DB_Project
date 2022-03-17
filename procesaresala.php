<!-- Cod sursă pentru butoanele de salvat, șters, editat și update ale tabelei de săli -->
<?php

	// Conectarea la baza de date
	$mysqli = new mysqli('localhost', 'root', '', 'ballroom');
	if($mysqli->connect_error) {
		die("Inregistrare esuata: " . $mysqli->connect_error);
	}

	//Butonul de ștergere

	if(isset($_GET['delete'])) {
		$idSala= $_GET['delete'];
		$sqli = "DELETE FROM sala WHERE idSala=$idSala "; //Se șterg datele selectate din tabelă
		if ($mysqli->query($sqli) == TRUE) {
 			echo "Record deleted successfully";
		} else {
  			echo "Error deleting record: " . $conn->error;
			}

		header("location: sali.php");
	}

	//Variabile pentru butonul de editare

	$idSala = 0;
	$update = false;
	$denumire_sala = '';
	$marime_sala = '';
	$capacitate_sala = '';
	$pret_inchiriere = '';

	 //Butonul de editare

	if(isset($_GET['edit'])) {
		$idSala = $_GET['edit'];
		$update = true;
		$sqle = "SELECT * FROM sala WHERE idSala=$idSala "; //Se selectează din tabelă datele ce urmează să fie editate și se rețin in variabilele alese
		$result = $mysqli->query($sqle); 
		if ($result->num_rows){
        	$row = $result->fetch_array();
        	$denumire_sala = $row['denumire_sala'];
        	$marime_sala = $row['marime_sala'];
        	$capacitate_sala = $row['capacitate_sala'];
        	$pret_inchiriere = $row['pret_inchiriere'];
        }
	}

	//După ce se modifică datele se va apăsa pe butonul de update
	//Butonul de update reține datele nou introduse

	if(isset($_POST['update'])) {
		$idSala = $_POST['idSala'];
		$denumire_sala = $_POST['denumire_sala'];
        $marime_sala = $_POST['marime_sala'];
        $capacitate_sala = $_POST['capacitate_sala'];
        $pret_inchiriere = $_POST['pret_inchiriere'];		
        $idBallroom =  "SELECT idBallroom FROM eveniment";

		$sqlu = "UPDATE sala SET denumire_sala='$denumire_sala', marime_sala='$marime_sala', capacitate_sala='$capacitate_sala', pret_inchiriere='$pret_inchiriere'  WHERE idSala=$idSala"; //Înserează datele în tabelă
		if($mysqli->query($sqlu) == TRUE) {
			echo "";
		} else {
			echo "Eroare" . $sqlu . "<br" . $mysqli->error;
		}

		header("location: sali.php");
	}

	$mysqli->close();

	?>