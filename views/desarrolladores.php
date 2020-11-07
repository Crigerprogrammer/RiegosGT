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
  <?php include('navbar.php') ?>
</head>


</body>
  <h2><center><b>Desarrolladores</b></center></h2>

  <h4><center>Francisco Javier Alfaro Moreno</center></h4>
  <h5><center>0900-17-14346</center></h5>

  <h4><center>Denis Eduardo Bances Luna</center></h4>
  <h5><center>0900-17-1073</center></h5>

  <h4><center>Cristian Gerardo Hernandez Barrios</center></h4>
  <h5><center>0900-15-549</center></h5>

  <h4><center>Pablo Javier Ruiz Cabrera</center></h4>
  <h5><center>0900-16-12759</center></h5>

    </div>

  </div>

</div>

</html>