{source}

 <?php

 //Entradas:id del domicilio, título del caso, descripción del caso, articulo//

 //RECIBO LAS ENTRADAS//

 

echo"<br>";

$nueva=$_POST['domicilio'];
$articulo=$_POST['articulo'];
$id_caso=$_POST['id_caso'];
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
 $domicilio=$_POST['domicilio'];
 $empleado=$_POST['user'];
 $ip_solicitante=$_SERVER['REMOTE_ADDR'];
  $empleado= JFactory::getUser()->get('name');

echo"<br>";

 // Establecer la zona horaria predeterminada a usar

 date_default_timezone_set('America/Santiago');

  echo"<br>";

   $servername = "localhost";
  $username = "ingboyer_jos1";
  $password = "U[kSjG]k]qU*IUV3dO^47*.9";
  $dbname = "ingboyer_jos1";

 // Create connection

 

  $conn = new mysqli($servername, $username, $password, $dbname);
 

  if ($conn->connect_error) {
  die("Conexión fallida: ". $conn->connect_error);
   }

   echo "<br />";

   $sql = "SELECT nombre1,nombre2,apellido1,apellido2,ciudad,id,comuna,casa,balance,tlf1,tlf2,calle,referencia,rut,id FROM jos_clientes where id =".$nueva;
   $sql2="INSERT INTO jos_ordenes_servicio(titulo,fecha_apertura,cliente,articulo,estatus,retrabajo,descripcion,huella_responsable,ip_responsable) VALUES ('$titulo','$fecha_apertura','$nueva','$articulo','Creada','0','$descripcion','$empleado','$ip_solicitante')";
   
 $result2 = $conn->query($sql2);

 

  $sql3="SELECT MAX(id) AS id FROM jos_ordenes_servicio";

$result3 = $conn->query($sql3);

while($rowy = $result3->fetch_assoc())
{
$num_caso=$rowy[id];
}

      $result = $conn->query($sql);

      $sql7="INSERT INTO jos_actualizacion(id_os,estatus,actualizacion,responsable,ip_actualiza) VALUES ('$num_caso','Creada','Se abre el caso en el sistema','$empleado','$ip_solicitante')";
      $result7 = $conn->query($sql7);

 if(isset($_POST['bandera']))
 {
 echo "<script language='JavaScript'>";
 echo "alert ('El CASO HA SIDO REGISTRADO CON ÉXITO CON EL NUMERO=$num_caso!',200)";
 echo"</script>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.kerigmaservice.com/home/es-ES/operaciones'>";

 }

        //output data of each row

               while($row = $result->fetch_assoc()){

 

  $nombre_cli=$row["nombre1"]."&nbsp" .$row["nombre2"]. "&nbsp".$row["apellido1"]."&nbsp" .$row["apellido2"];
 $rut_cli=$row["rut"];
 $celular_cli=$row["tlf2"];
 $direccion_cli=$row["comuna"].".".$row["calle"].".".$row["casa"];
 $tlf_cli=$row["tlf1"];
 $comuna=$row["comuna"];
 $balance_cli=$row["balance"];

 

     

    }

 

 echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb'>";

 

 //tabla formato usa service//

  echo "<table cellspacing=2  width=100% border=4 >";

      echo"<tr>";

                           echo"<th colspan='4'>";

                                   echo"<font size='5' color='BLUE'>"." NÚMERO DE CASO:  $num_caso "."</font>";

                    echo"</th>";

      echo"</tr>";

 

          echo"<tr bgcolor=blue>";

       

        echo"<th colspan='4'>";

 echo"<font size='3' color='white'> Av. Las condes 13950. Local 11 - Las Brumas 40 Lo Barnechea/Fnos 2 22156982 - 227863792 - 2 28330347 </font>";

        echo"</th>";

        echo"</tr>";

 

    echo"<tr>";

                    echo"<td>";

                                   echo"<font size='3' color='BLACK'>"." NOMBRE "."</font>";

                    echo"</td>";

                    echo"<td>";

                                   echo"<font size='4' color='BLUE'>"."$nombre_cli "."</font>";

                    echo"</td>";

                    echo"<td>";

                                   echo"<font size='3' color='BLACK'>"." RUT:  "."</font>";

                    echo"</td>";

                    echo"<td>";

                                   echo"<font size='4' color='BLUE'>"."$rut_cli "."</font>";

                    echo"</td>";

 echo"</tr>";

          echo"<tr >";

                    echo"<td>";

                                   echo"<font size='3' color='BLACK'>"."DIRECCIÓN:  "."</font>";

                    echo"</td>";

 

                   echo"<td>";

                   echo"<font size='4' color='BLUE'>$direccion_cli </font>";

                   echo"</td>";

 

                    echo"<td>";

                                   echo"<font size='3' color='BLACK'>"."COMUNA:  "."</font>";

 

                    echo"</td>";

 

                   echo"<td>";

                   echo"<font size='4' color='BLUE'> $comuna </font>";

                    echo"</td>";

 

        echo"</tr>";

 

          echo"<tr >";

                    echo"<td>";
                                   echo"<font size='3' color='BLACK'>"."TELÉFONO:    "."</font>";
                    echo"</td>";


                   echo"<td>";
                   echo"<a href='tel://$tlf_cli'>$tlf_cli</a>";
                  echo"</td>";

 

                    echo"<td>";

                                   echo"<font size='3' color='BLACK'>"."REFERENCIA:  "."</font>";

 

                    echo"</td>";

 

                   echo"<td>";

                   echo"<font size='4' color='BLUE'>  </font>";

 

                   echo"</td>";

 

        echo"</tr>";

 

          echo"<tr >";

                    echo"<td>";

                                   echo"<font size='3' color='BLACK'>"."FALLA DESCRITA POR CLIENTE:    "."</font>";

                    echo"</td>";

 

                   echo"<td>";

                   echo"<font size='4' color='BLUE'>$titulo</font>";

                   echo"</td>";

 

                    echo"<td>";

                                   echo"<font size='3' color='BLACK'>"."ARTÍCULO:  "."</font>";

 

                    echo"</td>";
                   echo"<td>";
                   echo"<font size='4' color='BLUE'> $articulo  </font>";
                   echo"</td>";
        echo"</tr>";

          echo"<tr >";
                    echo"<td>";
                                   echo"<font size='3' color='BLACK'>"."NOTA PARA EL CASO:    "."</font>";
                    echo"</td>";

                   echo"<th colspan='3'>";
                   echo"<font size='4' color='BLUE'>$descripcion</font>";
                   echo"</th>";
        echo"</tr>";
   echo "</table>";

//fin talba formato usa service//
 echo"</div>";
echo"<br>";
          echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=34'   method='post' >";
         echo"NOTA DEL AGENDAMIENTO"."<textarea name='nota' rows='2' cols='10'></textarea>";
         ECHO "<BR>";
           echo" SELECCIONA EL TÉCNICO : "."<select name='tecnico' METHOD='POST'>";
             echo"<option value='0'>Seleccione un técnico</option>";
             echo" <option value='34351'>Fabian</option>";
             echo" <option value='34350'>Juan</option>";
             echo"</select>";
             
             echo" <input type=hidden name='id_caso' value='$num_caso' >";
             echo" <input type=hidden name='id_domicilio' value='$nueva' >";
            echo" <input type=hidden name='responsable' value='$empleado' >";
            echo" <input type=hidden name='estatus' value='Programada' >";
           echo"</select>";
ECHO "<BR>";
echo"fecha"."<input type='date' name='fecha_agendamiento'>"." Ejemplo:(2016-03-21)" ;
ECHO "<BR>";
 echo"<input type='submit' value='PROGRAMAR'/>";
       echo"</form>";
 ?>

{/source}