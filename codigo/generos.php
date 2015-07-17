<?php
//Llamo al archivo global que carga ciertas constantes y librerias básicas
require_once 'global.php';

//Ahora llamo a la librería controlador de mi entidad
require_once CONTROLLERS . 'genero.controller.php';

//Finalmente, inicializo la clase controlador, y empiezo a usar sus métodos!
$genero = new generoController($sql->getInstance());

//Por ejemplo, guardo en una variable la cantidad de géneros que hay
$total_generos = $genero->countGeneros();

//Me fijo si está seteado "newSubmit", que es el botón que se toca para agregar un género
if(isset($_POST['newSubmit'])) {
	if(isset($_POST['inNombre'])) {
		$resultado = $genero->addGeneroToDB($_POST['inNombre']);		
	}else{
		$resultado = "ERROR_CAMPO";
	}
}

//Me fijo si se presionó el botón de eliminar
if(isset($_POST['delSubmit'])) {
	$resultado = $genero->borrarGenero($_POST['delSelect']);
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Compra en línea</title>
		<link href="css/v1.css" rel="stylesheet">
		<meta charset="utf-8">
	</head>
	<body>
		<div class="contenedor">
			<h1 class="header-title">Compras en línea</h1>
			<p class="header-subtitle">El sitio donde comprar es más fácil.</p>
		</div>
		
		<div class="contenedor white-box">
			<p class="title">Géneros</p>
			<p>Actualmente hay <?php echo $total_generos; ?> géneros cargados en la base de datos.</p>
		</div>
		
		<div class="contenedor white-box">
			<p class="title">Listado de géneros</p>
			<p>En la tabla se muestran los géneros que se encuentran cargados en la base de datos. Realiza un alta, baja o modificación para ver cambios.</p>
			<table>
				<tr>
					<th><b>Identificador</b></th>
					<th><b>Nombre del género</b></th>
				</tr>
				<?php
				foreach($genero->getAllGeneros() as $gen) {
					echo '<tr><td>' . $gen->__get('id_genero') . '</td><td>' . $gen->__get('nombre') . '</td></tr>';
				}
				?>
			</table>
		</div>
		
		<div class="contenedor white-box">
			<p class="title">Dar de alta un género</p>
			<p>Rellena los campos solicitados a continuación para dar de alta un nuevo género.</p>
			<?php
			if(isset($resultado)) {
				switch($resultado) {
					case 'SUCCESS':
						echo '<p>Género agregado con éxito!</p>';
					break;
					
					case 'ERROR_CAMPO':
						echo '<p>El campo de género no puede estar vacío...</p>';
					break;
					
					case 'ERROR_EXISTENTE':
						echo '<p>El género que intentas agregar ya existe...</p>';
					break;
					
					default:
						echo '<p>Error desconocido, intenta de nuevo</p>';
					break;
				}
			}
			?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<label for="inNombre">Nombre del género: </label><br><input type="text" name="inNombre" placeholder="Nombre del género" required><br>
				<input type="submit" name="newSubmit" value="Agregar">
			</form>
		</div>
		
		<div class="contenedor white-box">
			<p class="title">Eliminar un género</p>
			<p>Si hay algún género que ya no quieras tener, ¡Bórralo desde aquí! <br><b>NOTA: Por el momento, borrar un género puede generar problemas en las bandas
			que lo tengan asignado.</b></p>
						<?php
			if(isset($resultado)) {
				switch($resultado) {
					case 'SUCCESS':
						echo '<p>Género eliminado!</p>';
					break;

					case 'ERROR_INEXISTENTE':
						echo '<p>El género que intentas eliminar no existe...</p>';
					break;
					
					default:
						echo '<p>Error desconocido, intenta de nuevo</p>';
					break;
				}
			}
			?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<select name="delSelect">
					<?php
					foreach($genero->getAllGeneros() as $gen) {
						echo '<option value="' . $gen->__get('id_genero') . '">' . $gen->__get('nombre') . '</option>';			}
					?>
				</select>
				<input type="submit" name="delSubmit" value="Eliminar">
			</form>
		</div>
	</body>
</html>