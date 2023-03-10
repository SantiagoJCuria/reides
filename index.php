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
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
</head>
  <body data-spy="scroll" data-offset="0" data-target="#navigation">

  	<div class="contenedor">
		<form action="" method="POST" class="login-email">
		<p>Iniciar Sesión</p>
			<div class="input-group">
				<label for="email">Usuario</label>
				<input type="email" placeholder="Email" name="email" value="<?php echo $_POST['email']; ?>" class='anadir' required>
			</div>
			<div class="input-group">
				<label for="password">Contraseña</label>
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" class='anadir'  required>
			</div>
			<div class="input-group">
				<button name="submit" class="submit">Iniciar Sesión</button>
			</div>
		</form>
	</div>
    </body>
</html>

