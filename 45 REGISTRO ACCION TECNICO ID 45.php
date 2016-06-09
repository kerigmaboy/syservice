{source}

<?php
$id_os=$_POST['id_os'];
$ip_actualiza=$_POST['ip_actualiza'];
$responsable=$_POST['responsable'];
$actualizacion=$_POST['actualizacion'];
$estatus=$_POST['estatus'];

  $servername = "localhost";
  $username = "ingboyer_jos1";
  $password = "U[kSjG]k]qU*IUV3dO^47*.9";

 
  $dbname = "ingboyer_jos1";
  $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
  die("Conexión fallida: ". $conn->connect_error);
echo" a ver si queda aqui";
   }
   
      $sql2="SELECT name FROM jos_users WHERE id=".$responsable;
       $result2 = $conn->query($sql2);
       $row = $result2->fetch_assoc();
     
     
   $sql="INSERT INTO jos_actualizacion  (id_os,estatus,actualizacion,responsable,ip_actualiza) VALUES ('$id_os','$estatus','$actualizacion','$row[name]','$ip_actualiza')";


    $result = $conn->query($sql);

 
 $row = $result2->fetch_assoc();
 
 
   
   
   //PENDIENTE  PARA PONER EL MENSAJE DE REGISTRO EXITOSO
                   echo "<script language='JavaScript'>";

                 echo "alert ('REGISTRO EXITOSO !',200)";

                 echo"</script>";

 

                 echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.kerigmaservice.com/home'>";
   






?>
{/source}