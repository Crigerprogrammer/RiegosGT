<?php
session_start();

// Inicializa las variables
$username = "root";
$email    = "";
$errors = array();

// connexion a la base de datos
$db = mysqli_connect('localhost', 'root', '', 'riegogt');

// REGISTRO NUEVO USUARIO
if (isset($_POST['reg_user'])) {
  // Nuevos valores del form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // Valida que el formulario haya sido llenado
  if (empty($username)) { array_push($errors, "se necesita usuario"); }
  if (empty($email)) { array_push($errors, "se necesita correo"); }
  if (empty($password_1)) { array_push($errors, "se necesita contraseña"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Las dos contraseñas no son iguales");
  }

  // Valida que no exista en la base de datos el nuevo usuario
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // Si el usuario existe
    if ($user['username'] === $username) {
      array_push($errors, "Usuario ya existe");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Correo ya existe");
    }
  }

  // Registro 
  if (count($errors) == 0) {
  	$password = md5($password_1);//Se utiliza md5 para encriptar contraseña

  	$query = "INSERT INTO users (username, email, password)
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Inicio sesión correctamente";
  	header('location: ./views/index.php');
  }
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Usuario requerido");
  }
  if (empty($password)) {
  	array_push($errors, "Contraseña requerida");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Loggeado!";
  	  header('location: ../views/index.php');
  	}else {
  		array_push($errors, "Invalido usuario y/o contraseña");
  	}
  }
}

?>
