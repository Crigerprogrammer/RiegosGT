$host='localhost';
$username='root';
$password='';
$dbase='riegogt';

$conn = mysqli_connect($host,$username,$password,$dbase);

if($conn){
    echo "Conectado!";
}
else{
    echo "Error!";
}
