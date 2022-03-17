<!-- Cod sursă pentru butoanele de salvat, șters, editat și update ale tabelei de clienți -->

<?php

	// Conectarea la baza de date
	$mysqli = new mysqli('localhost', 'root', '', 'ballroom');
	if($mysqli->connect_error) {
		die("Inregistrare esuata: " . $mysqli->connect_error);
	}

	// Butonul de save
	if(isset($_POST['save'])){ //dacă se apasă pe butonul de save

		//Se salvează datele introduse în variabile
		$nume = $_POST['nume']; 
		$prenume = $_POST['prenume'];
		$telefon = $_POST['telefon'];
		$email = $_POST['email'];
		$adresa = $_POST['adresa'];

		//Se introduc variabilele în tabela de contact
		$sql= "INSERT INTO clienti(nume, prenume, telefon, email, adresa) VALUES('$nume', '$prenume', '$telefon', '$email', '$adresa')";

		$_SESSION['message'] = "Clientul a fost înregistrat!";
		$_SESSION['msg_type'] = "succes";

		if($mysqli->query($sql) == TRUE) {
			echo "Ați înregistrat un nou client";
		} else {
			echo "Eroare" . $sql . "<br" . $mysqli->error;
		}

		header("location: clienti.php");
	}

	//Butonul de ștergere
	if(isset($_GET['delete'])) {
		$id= $_GET['delete'];
		$sqli = "DELETE FROM clienti WHERE id=$id "; //Se șterg datele selectate din tabelă
		if ($mysqli->query($sqli) == TRUE) {
 			echo "Record deleted successfully";
		} else {
  			echo "Error deleting record: " . $conn->error;
			}

		header("location: clienti.php");
	}

	//Variabile pentru butonul de editare
	$id = 0;
	$update = false;
	$nume = '';
    $prenume = '';
    $telefon = '';
    $email = '';
    $adresa = '';

    //Butonul de editare

	if(isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$sqle = "SELECT * FROM clienti WHERE id=$id"; //Se selectează din tabelă datele ce urmează să fie editate și se rețin in variabilele alese
		$result = $mysqli->query($sqle); 
		if ($result->num_rows){
        	$row = $result->fetch_array();
        	$nume = $row['nume'];
        	$prenume = $row['prenume'];
        	$telefon = $row['telefon'];
        	$email = $row['email'];
        	$adresa = $row['adresa'];
        }
	}

	//După ce se modifică datele se va apăsa pe butonul de update
	//Butonul de update reține datele nou introduse

	if(isset($_POST['update'])) {
		$id = $_POST['id'];
		$nume = $_POST['nume'];
		$prenume = $_POST['prenume'];
		$telefon = $_POST['telefon'];
		$email = $_POST['email'];
		$adresa = $_POST['adresa'];

		$sqlu = "UPDATE clienti SET nume='$nume', prenume='$prenume', telefon='$telefon', email='$email', adresa='$adresa' WHERE id=$id"; //Înserează datele în tabelă
		if($mysqli->query($sqlu) == TRUE) {
			echo "Ați înregistrat noile date ale unui client";
		} else {
			echo "Eroare" . $sqlu . "<br" . $mysqli->error;
		}

		header("location: clienti.php");
	}	

	$mysqli->close();

	?>