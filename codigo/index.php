<!DOCTYPE html>
<html>
	<head>
		<title>Compra en l�nea</title>
		<link href="css/v1.css" rel="stylesheet">
	</head>
	<body>
		<div class="contenedor">
			<h1 class="header-title">Compras en l�nea</h1>
			<p class="header-subtitle">El sitio donde comprar es m�s f�cil.</p>
		</div>
		
		<div class="contenedor white-box">
			<p class="login-title">Iniciar sesi�n</p>
			<p>Para poder acceder al sitio, deber�s crear una cuenta o iniciar sesi�n si ya tienes una.</p>
			<form class="login-form" method="post" action="security_check.php">
				<label class="login-label" for="username">Nombre de usuario:</label>
				<input type="text" name="username" class="login-input" placeholder="usuario..." required><br>
				<label class="login-label" for="password">Contrase�a:</label>
				<input type="text" name="password" class="login-input" placeholder="contrase�a" required><br>
				<input type="submit" value="Iniciar sesi�n" class="login-input">
			</form>
		</div>
	</body>
</html>