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

  
  <h2>Información Hardware</h2>
  <h3>Servidor</h3>
  <ul>
    <li>Procesador Intel iCore5</li>
    <li>120GB ROM</li>
    <li>12GB RAM</li>
    <li>Windows Server 2012</li>
  </ul>
  
  <h3>Métodos de respaldo</h3>
  <p>Como método de respaldo se optó por utilizar para el disco duro la configuración RAID 1 que permite tener como espejo un disco duro en dado caso de pérdida de data en un disco y así no perder la data de los sensores y de los períodos de riego</p>

  <h3>Plan Contingencia</h3>
  <p>Por cualquier catastrofe nuestro grupo optó por almacenar en un hosting de pago de 5$ mensuales en godaddy.com la base de datos y aplicación web en suspensión para poder consumir los servicios en dado caso el servidor principal (local), dejé de funcionar o sea secuestrado, para que la aplicación siempre este disponible 24/7 </p>


    </div>

  </div>

</div>

</html>