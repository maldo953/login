<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'test';
$conn = mysqli_connect($host, $user,$pass,$db);
if (!$conn){
	die("Connection failed: " . mysqli_connect_error());
}
//echo "Conexion exitosa!";
//variables
$alerta = '';
//////////////////

if (!empty($_POST)){
	if(empty($_POST['user']) || empty($_POST['clave'])){
		$alerta = "<p class='advertencia'>Llene todos los campos</p>";
	}else{
		$usuario  = $_POST['user'];
		$clave    = sha1($_POST['clave']);

		$query = mysqli_query($conn, "SELECT * FROM usuario u WHERE '$usuario' = u.ususuario AND '$clave' = u.usclave;");
		$res = mysqli_fetch_array($query);
		if($res > 0){
			$alerta = "<p class='success'>Datos correctos</p>";
		}else{
			$alerta = "<p class='error'>Datos incorrectos</p>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio Sesion</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="">
	<p><?php echo $alerta; ?></p>
</div>
<div class="form">
	<h1>LOGIN</h1>
	<form action="" method="post" autocomplete="off">
		<div class="div">
			<input autofocus type="text" name="user" class="input" placeholder="Usuario">
		</div>
		<div class="div">
			<input type="password" name="clave" class="input" placeholder="Clave de acceso">
		</div>
		<div class="div">
			<input type="submit" value="Ingresar" class="btn">
		</div>
	</form>
</div>
</body>
</html>