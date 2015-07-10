<!DOCTYPE html>
<html>
	<head>
		<title>Compra en línea</title>
		<link href="css/v1.css" rel="stylesheet">
	</head>
	<body>
		<div class="contenedor">
			<h1 class="header-title">Compras en línea</h1>
			<p class="header-subtitle">El sitio donde comprar es más fácil.</p>
		</div>
		
		<div class="contenedor white-box">
			<p class="login-title">Iniciar sesión</p>
			<p>Para poder acceder al sitio, deberás crear una cuenta o iniciar sesión si ya tienes una.</p>
			<form class="login-form" method="post" action="security_check.php">
				<label class="login-label" for="username">Nombre de usuario:</label>
				<input type="text" name="username" class="login-input" placeholder="usuario..." required><br>
				<label class="login-label" for="password">Contraseña:</label>
				<input type="text" name="password" class="login-input" placeholder="contraseña" required><br>
				<input type="submit" value="Iniciar sesión" class="login-input">
			</form>
		</div>
	</body>
</html>