{source}

 Este es el rut que está pasando por parámetro:

<?php

$rutUsuario = $_GET['rut-destino'];

echo $rutUsuario;

$servername = "localhost";

$username = "ingboyer_jos1";
$password = "U[kSjG]k]qU*IUV3dO^47*.9";
$dbname = "ingboyer_jos1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<br />";

$sql = "SELECT id, titulo, numero_guia FROM jos_ordenes_servicio where id =".$rutUsuario;

echo $sql;

echo "<br />";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row

    while($row = $result->fetch_assoc()) {

        echo "id: " . $row["id"]. " - titulo: " . $row["titulo"]. " -numero_guia  : " . $row["numero_guia"]. "<br>";

    }  

} else {

    echo "0 results";

}

$conn->close();

?>

 <?php $usuario = $_POST['usuario']; $clave = $_POST['clave']; echo "Usuario " . $usuario . " y clave ". $clave; ?>

{/source}