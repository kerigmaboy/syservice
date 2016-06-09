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


 
if(isset($_POST['tecnico']))

{

$tecnico=$_POST['tecnico'];


$sql7 = "SELECT id_caso,fecha_agendamiento,id_domicilio FROM jos_ruta WHERE tecnico=$tecnico ";
$result7 = $conn->query($sql7);
echo "<table width=100% border=4  bordercolor=#f8fdbb >";
echo "<tr>";
echo "<td align='center'>". "<b>CASO</b>"."</td>";
echo "<td align='center'>"."<b>FECHA</b>"."</td>";
echo "<td align='center'>"."<b>ESTATUS</b>";
echo "<td align='center'>"." ";
echo "</td>";


 

while($row7=$result7->fetch_assoc())
    {
    $ang=$row7['id_caso'];
    $ang4=$row7['fecha_agendamiento'];
    $sqlVER="SELECT estatus,MAX(id) AS id FROM jos_actualizacion WHERE id_os=$ang";
    $resultVER = $conn->query($sqlVER);
       while ($rowVER=$resultVER->fetch_assoc())
             {
              $ang2=$rowVER['id'];
              $ang3=$rowVER['estatus'];

              //Busqueda que ve el último estatus o estatus actual
              $sqlVER2="SELECT estatus,fecha,id_os  FROM jos_actualizacion WHERE id=$ang2 and (estatus='Pendiente por repuesto' OR estatus='Pendiente por datos del repuesto')";
              $resultVER2 = $conn->query($sqlVER2);

            while ($rowVER2=$resultVER2 ->fetch_assoc() )
                 {
                  echo "<tr>";
                  echo "<td align='center'>";
                  echo $rowVER2[id_os];
                  echo "</td>";
                  echo "<td align='center'>";
                  echo $ang4;
                  echo "</td>";
                  echo "<td align='center'>";
                  echo  $rowVER2[estatus];
                  echo "</td>";
                  $orden_servicio=$rowVER2[id_os];
                  echo "<td align='center'>";
                  if ($rowVER2[estatus]=='Pendiente por repuesto') {
                    echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=48' method='POST' >";
                    echo" <input type='submit' value='ASIGNAR REPUESTO' >";
                    echo"<input type=hidden name=orden_servicio value=$orden_servicio >";
                    echo"</form >";
                  
                  }
                  if ($rowVER2[estatus]=='Pendiente por datos del repuesto')
                  {
                  echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=48' method='POST' >";
                  echo" <input type='submit' value='VER DETALLE' >";
                  echo"<input type=hidden name=orden_servicio value=$orden_servicio >";
                  echo"</form >";
                  }
            
                  echo "</td>";

                  }
                
              }
      }
echo"</table>";
 }

  ?>

{/source}