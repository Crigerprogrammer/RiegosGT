<?php
  session_start();

  //Mantener Sesión abierta!
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Tienes que iniciar sesión antes!";
  	header('location: views/login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: views/login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Monitoreo</title>
  
  <?php include('navbar.php') ?>
  <?php require('../php/insertar_periodo.php')?>
  <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>


</body>
  <div class="header">
  <center><h2>PROGRAMAR PERIODO</h2> </center>
</div>
  <form method="post" action="">
    <div class="input-group">
      <label>Fecha</label>
      <input type="date" name="fecha" >
    </div>
    <div class="input-group">
      <label>Hora</label>
      <input type="time" name="hora" step="2">
    </div>
    <div class="input-group">
      <label>Duración</label>
      <input type="number" name="duracion">
    </div>
    <div class="input-group">
      <label>Periodo</label>
      <select name="periodo">
        <option value="periodo1">Periodo 1</option>
        <option value="periodo2">Periodo 2</option>
        <option value="periodo3">Periodo 3</option>
      </select>
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Guardar</button>
    </div>
  </form>
    </div>

  </div>

</div>

</html>