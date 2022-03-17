<!-- Codul sursă a sing-up-ului -->

<?php

session_start();
include "db_conn.php"; //Se conectează la baza de date

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['re_password'])) {
	function validate($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname. '&name='. $name;

	//Dacă se vor lăsa câmpuri goale, utilizatorul va fi atenționat

	if (empty($uname)) {
		header("Location: signup.php?error=Username is required&$user_data");
		exit();
	}

	else if (empty($pass)) {
		header("Location: signup.php?error=Password is required&$user_data");
		exit();
	}

	else if (empty($re_pass)) {
		header("Location: signup.php?error=Re Password is required&$user_data");
		exit();
	}

	else if (empty($name)) {
		header("Location: signup.php?error=Name is required&$user_data");
		exit();
	} 

	else if ($pass !== $re_pass ) {
		header("Location: signup.php?error=The confirmation password does not match&$user_data");
		exit();
	} 

	else{

		//Se verifică dacă username-ul este deja luat, altfel se vor insera datele în tabela de useri

		$pass = md5($pass);
		 $sql = "SELECT * FROM users WHERE username='$uname'";
		 $result = mysqli_query($conn, $sql);

		 if ( mysqli_num_rows($result) > 0) {
		 	header("Location: signup.php?error=This username is already taken&$user_data");
			exit();
		 }else{
		 	$sql2 = "INSERT INTO users(username, password, nume) VALUES('$uname', '$pass', '$name')";
			$result2 = mysqli_query($conn, $sql2);
			if($result2) {
				header("Location: signup.php?success=Your account has been created successfully");
				exit();
		}else {
			header("Location: signup.php?error=unknown error occured&$user_data");
			exit();
		 	}
		}

	}
}else {
	header("Location: signup.php");
	exit();
}

