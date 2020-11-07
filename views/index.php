<?php
  session_start();

  //Mantener Sesión abierta!
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Tienes que iniciar sesión antes!";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<?php
  require_once('../php/sql.php');
?>
<!DOCTYPE html>
<html>
<head>
  <?php include('navbar.php') ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/chart.css">
</head>
    <!-- Primer canvas de la aplicacion -->
    <div class="chart-container">
       <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    <!-- Fin de canvas -->
    <div class="chart-container position">
    <canvas id="myChart3" width="400" height="400"></canvas>
    </div>
      <script>
      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: ["Seco", "Templado", "Mojado"],
              datasets: [{
                  labels: ["Seco", "Templado", "Mojado"],
                  data: [
                  <?php 
                    //Consulta del primer Query
                  $sql = "SELECT COUNT(estado) seco, 
                (SELECT COUNT(estado) FROM sensores WHERE estado = 'templado') templado,
                (SELECT COUNT(estado) FROM sensores WHERE estado = 'mojado') mojado
                FROM sensores WHERE estado = 'seco'";
                  $result = mysqli_query($conn,$sql);
                  $data=mysqli_fetch_assoc($result);
                ?>  
                  '<?php echo $data["seco"] ?>',
                  '<?php echo $data["templado"] ?>',
                  '<?php echo $data["mojado"] ?>',
                <?php
                ?>
                  ],
                  backgroundColor: [
                    'rgba( 203, 68, 68 )',
                      'rgba(19, 158, 3)',
                      'rgba(  27, 132, 153  )'
                  ],
                  borderColor: [
                      'rgba(255,255,255,255)',
                      'rgba(255,255,255,255)',
                      'rgba(255,255,255,255)'
                  ],
                  borderWidth: 1.5
              }]
          },
          options: {
          title: {
              display: true,
              text: 'Estado del invernadero por periodos'
            },
          }
      });
      </script>
     
      <script>
      var ctx = document.getElementById("myChart3").getContext('2d');
      var myChart3 = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: ["Periodo 1", "Periodo 2", "Periodo 3"],
              datasets: [{
                  labels: ["Periodo 1", "Periodo 2", "Periodo 3"],
                  data: [
                  <?php 
                    //Consulta del primer Query
                  $sql3 = "SELECT COUNT(periodo) periodo1, 
                (SELECT COUNT(periodo) FROM valvula WHERE periodo = 'periodo2') periodo2,
                (SELECT COUNT(periodo) FROM valvula WHERE periodo = 'periodo3') periodo3
                FROM valvula WHERE periodo = 'periodo1'";
                  $result3 = mysqli_query($conn,$sql3);
                  $data3=mysqli_fetch_assoc($result3);
              
                ?>  

                  '<?php echo $data3["periodo1"] ?>',
                  '<?php echo $data3["periodo2"] ?>',
                  '<?php echo $data3["periodo3"] ?>',

                <?php
                  
                ?>
                  ],
                  backgroundColor: [
                    'rgba( 70, 59, 64)',
                      'rgba( 14, 57, 2)',
                      'rgba( 15, 76, 74 )'
                  ],
                  borderColor: [
                      'rgba(255,255,255,255)',
                      'rgba(255,255,255,255)',
                      'rgba(255,255,255,255)'
                  ],
                  borderWidth: 1.0
              }]
          },
          options: {
            
          legend: { display: false },
          title: {
              display: true,
              text: 'Periodos programados'
            },
             

          }
      });
      </script>
      
    </div>

  </div>

</div>


</html>
