{source}
<?php
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

   $fecha_ruta=$_POST['fecha_ruta'];
   $fecha_ruta2=str_replace("-","/",$fecha_ruta);
   $rut_cliente="87654321";
$numCaract="10";
$id_comparacion="0";

  $sql = "SELECT *  FROM jos_ruta ";
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {

         //output data of each row
        while($row = $result->fetch_assoc()) {

               if(!strncasecmp ($fecha_ruta2, $row["fecha_agendamiento"], $numCaract))

                    {

                         //ARMAR CONSULTA CORRECTA
  $sql2 = "SELECT name  FROM jos_users WHERE id=".$row['tecnico'];
  $result2 = $conn->query($sql2);
  $row2 = $result2->fetch_assoc();
 
  $id_caso=$row["id_caso"];
 
 
                          $id_comparacion++;
      

         
                 echo "<table width=100% border=4  bordercolor=#f8fdbb >";
                 echo"<tr bgcolor=blue>";
                 echo"<td >";
                 echo"<strong>"."id:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["id_caso"]."</font>";
                 echo"</td>";


                 echo"<td >";
                 echo"<strong>"."Tecnico: "."&nbsp"."</strong>"."<font size=2 color=white >".$row2["name"]."</font>";
                 echo"</td>";

                 echo "<td>";

     $id_ruta=$row['id'];

  echo"<form action=http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=40 method=POST >";

  echo"<input type=hidden name='id-os' value=$nombre >";

  $ip_actualizante=$_SERVER['REMOTE_ADDR'];

  echo"<input type=hidden name='ip_actualiza' value=$ip_actualizante >";

  echo"<input type=hidden name='id_caso' value=$id_caso>";

  echo"<input type=hidden name='id_ruta' value=$id_ruta>";

  $user=  JFactory::getUser()->get('name');

  echo"<input type=hidden name='responsable' value=$user >";

  echo"<input type=submit value='CARGAR REPUESTO A LA ORDEN'>";

  echo"</form >";


 

    
                 echo"</td>";
                 echo "</table>";

       }




                }

           }

if (!$id_comparacion)

{

                echo "¡VUELVE A INTENTARLO!";
                echo "<script language='JavaScript'>";
                echo "alert ('NO HAY RUTA ASIGNADA PARA LA FECHA SELECCIONADA!',200)";
                echo"</script>";
                echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.kerigmaservice.com/home/es-ES/operaciones/seguimiento-y-control'>";

}





?>
{/source}