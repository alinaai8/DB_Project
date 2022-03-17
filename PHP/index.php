<!-- Pagina de LOGIN se conectează la baza de date și extrage datele din tabela de useri-->

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<form action="login.php" method="post">
		
		<h2>Login</h2>

		<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>

		<label> Username</label>
		<input type="text" name="uname" placeholder="Username"><br>

		<label> Password </label>
		<input type="password" name="password" placeholder="Password">

		<button type="submit">Login</button>

		<a href="signup.php" class="ca">Create an account</a>

	</form>
	</div>
</body>
</html>