{source}

<?php



   $actualizacion=$_POST['actualizacion'];
   $id_os=$_POST['id-os'];
   $ip_actualiza=$_POST['ip_actualiza'];
   $responsable=$_POST['responsable'];
   $estatus=$_POST['estatus'];

 

 echo "RECIBO LOS DATOS:";
 echo"<br>";
 echo "actualizacion :". $actualizacion;
 echo "id_os :". $id_os;
 echo "ip_actualiza :". $ip_actualiza;
 echo "responsable :". $responsable;
 echo "estatus :". $estatus;



 

///comienza el script del otro articulo

 

   $servername = "localhost";

  $username = "ingboyer_jos1";

  $password = "U[kSjG]k]qU*IUV3dO^47*.9";

 

  $dbname = "ingboyer_jos1";

 // Create connection

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection

  if ($conn->connect_error) {

  die("Connection failed: ". $conn->connect_error);

  }

$sql="INSERT INTO jos_actualizacion  (id_os,estatus,actualizacion,responsable,ip_actualiza) VALUES ('$id_os','$estatus','$actualizacion','$responsable',' $ip_actualiza')";

 

   $result = $conn->query($sql);

 

    // if ($result->num_rows > 0) {

 

           //output data of each row

      //        while($row = $result->fetch_assoc()) {

//}

//}

echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.kerigmaservice.com/home/es-ES/operaciones'>";


?>

 {/source}