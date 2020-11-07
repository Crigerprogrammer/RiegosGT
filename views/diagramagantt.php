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
<script src="https://venngage.net/js/embed/v1/embed.js" data-vg-id="NsvfXDV0zM" data-title="Desarrollo web" data-w="1056" data-h="816" data-multipage="true" data-b="true"></script>

    </div>

  </div>

</div>

</html>