<?php 

include './db.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: main.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = ($_POST['password']);

	$sql = "SELECT * FROM usuarios WHERE usuario='$email' AND contra='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['usuario'];
		header("Location: main.php");
	} else {
		echo "<script>alert('Hubo un error')</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Programa</title>
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
</head>
  <body class="fondo">
  	<div class="contenedor">
		<form action="" method="POST" class="login-email">
			<h1 class="titulo-principal">Iniciar Sesión</h1>
			<div class="inputs">
				<label for="email">Usuario</label>
				<input type="email" placeholder="Email" name="email" value="<?php echo $_POST['email']; ?>" class='anad	ir' required>
			</div>
			<div class="inputs">
				<label for="password">Contraseña</label>
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" class='anadir'  required>
			</div>
			<div class="inputs">
				<button name="submit" class="submit btn btn-primary btn-sm">Iniciar <span>Sesión</span></button>
			</div>
		</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    </body>
</html>

