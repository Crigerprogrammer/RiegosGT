<?php 
require ("sql.php");

if(isset($_POST['fecha'])){
    $hor = $_POST['hora'];
    $dur = $_POST['duracion'];
    $per = $_POST['periodo'];
    $fec = $_POST['fecha'];

    $sql = "INSERT INTO valvula(id_duracion, fecha_apertura, hora_apertura, duracion, periodo)
            VALUES('.NULL.', '".$fec."','".$hor."','".$dur."','".$per."')";
    $statement = $conn->prepare($sql);

    if($statement->execute()){
        $mensaje = " Agregado Correctamente";
        echo $mensaje;
    } else{
    	echo "Error";
    }
}

?>