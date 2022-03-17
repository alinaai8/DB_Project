<!-- Cod sursă pentru butoanele de salvat, șters, editat și update ale tabelei de organizatori -->
<?php

	// Conectarea la baza de date
	$mysqli = new mysqli('localhost', 'root', '', 'ballroom');
	if($mysqli->connect_error) {
		die("Inregistrare esuata: " . $mysqli->connect_error);
	}

	// Butonul de save

	if(isset($_POST['save'])){ //dacă se apasă pe butonul de save

		//Se salvează datele introduse în variabile

		$numec = $_POST['numec'];
		$prenumec = $_POST['prenumec'];
		$telefonc = $_POST['telefonc'];
		$emailc = $_POST['emailc'];

		//Se introduc variabilele în tabelă

		$sql= "INSERT INTO contact(numec, prenumec, telefonc, emailc) VALUES('$numec', '$prenumec', '$telefonc', '$emailc')"; //Se șterg datele selectate din tabelă

		$_SESSION['message'] = "Organizatorul a fost înregistrat!";
		$_SESSION['msg_type'] = "succes";

		if($mysqli->query($sql) == TRUE) {
			echo "Ați înregistrat un nou organizator";
		} else {
			echo "Eroare" . $sql . "<br" . $mysqli->error;
		}

		header("location: organizatori.php");
	}

	//Butonul de ștergere

	if(isset($_GET['delete'])) {
		$idC= $_GET['delete'];
		$sqli = "DELETE FROM contact WHERE idC=$idC ";
		if ($mysqli->query($sqli) == TRUE) {
 			echo "Record deleted successfully";
		} else {
  			echo "Error deleting record: " . $conn->error;
			}

		header("location: organizatori.php");
	}

	//Variabile pentru butonul de editare

	$idC = 0;
	$update = false;
	$numec = '';
    $prenumec = '';
    $telefonc = '';
    $emailc = '';

     //Butonul de editare

	if(isset($_GET['edit'])) {
		$idC = $_GET['edit'];
		$update = true;
		$sqle = "SELECT * FROM contact WHERE idC=$idC"; //Se selectează din tabelă datele ce urmează să fie editate și se rețin in variabilele alese
		$result = $mysqli->query($sqle); 
		if ($result->num_rows){
        	$row = $result->fetch_array();
        	$numec = $row['numec'];
        	$prenumec = $row['prenumec'];
        	$telefonc = $row['telefonc'];
        	$emailc = $row['emailc'];
        }
	}

	//După ce se modifică datele se va apăsa pe butonul de update
	//Butonul de update reține datele nou introduse

	if(isset($_POST['update'])) {
		$idC = $_POST['idC'];
		$numec = $_POST['numec'];
		$prenumec = $_POST['prenumec'];
		$telefonc = $_POST['telefonc'];
		$emailc = $_POST['emailc'];

		$sqlu = "UPDATE contact SET numec='$numec', prenumec='$prenumec', telefonc='$telefonc', emailc='$emailc' WHERE idC=$idC"; //Înserează datele în tabelă
		if($mysqli->query($sqlu) == TRUE) {
			echo "Ați înregistrat un nou organizator";
		} else {
			echo "Eroare" . $sqlu . "<br" . $mysqli->error;
		}

		header("location: organizatori.php");
	}

	$mysqli->close();

	?>