<?php
header('Content-Type: application/json');

require_once('sql.php');

$sqlQuery = "SELECT id_registro,temperatura_relativa,humedad_relativa FROM sensores ";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>