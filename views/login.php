<?php include('../php/server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <!-- Bootstrap-->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Hoja de estilos propia -->
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body class="container">
  <div class="header">
  	<h2>Riego GT</h2>
  </div>

  <form method="post" action="login.php">
  	<?php include('../php/errors.php'); ?>
  	<div class="input-group">
  		<label>Usuario</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Iniciar Sesión</button>
  	</div>
  	<p>
  		Crear una cuenta  <a href="../php/register.php">Registrar</a>
  	</p>
  </form>
</body>
</html>
