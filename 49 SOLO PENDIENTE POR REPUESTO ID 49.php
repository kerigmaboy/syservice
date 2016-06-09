{source}

<?php
  $servername = "localhost";
  $username = "ingboyer_jos1";
  $password = "U[kSjG]k]qU*IUV3dO^47*.9";

 
  $dbname = "ingboyer_jos1";
  $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
  die("Conexión fallida: ". $conn->connect_error);
echo" a ver si queda aqui";
   }

if(isset($_POST['tecnico']))

{

$nombre=$_POST['tecnico'];
$sql7 = "SELECT id_caso,fecha_agendamiento,id_domicilio FROM jos_ruta WHERE tecnico=$nombre ";
$result7 = $conn->query($sql7);

 
      echo "<table width=100% border=4  bordercolor=#f8fdbb >";
      echo "<tr>";
      echo "<td align='center'>";
      echo "CASO";
      echo "</td>";
      echo "<td align='center'>";
      echo "FECHA";
      echo "</td>";
      echo "<td align='center'>";
      echo "ESTATUS";
      echo "</td>";


 

while($row7=$result7->fetch_assoc())
    {
    $ang=$row7['id_caso'];
    $sqlVER="SELECT id,estatus,MAX(fecha) AS fecha FROM jos_actualizacion WHERE id_os=$ang";
    $resultVER = $conn->query($sqlVER);
       while ($rowVER=$resultVER->fetch_assoc())
             {
              $ang2=$rowVER['id'];
              $sqlVER2="SELECT estatus,fecha,id_os  FROM jos_actualizacion WHERE id=$ang2";
              $resultVER2 = $conn->query($sqlVER2);

            $rowVER2=$resultVER2 ->fetch_assoc();
            
                  echo "<tr>";
                  echo "<td td align='center'>";
                  echo $rowVER2[id_os];
                  echo "</td>";
                  echo "<td td align='center'>";
                  echo $rowVER2[fecha];
                  echo "</td>";
                  echo "<td td align='center'>";
                  echo  $rowVER['estatus'];
                  echo "</td>";
                  $orden_servicio=$rowVER2[id_os];
                  echo "<td td align='center'>";
                  // botón para mandar os vía post a id=48
                  echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=48' method='POST' >";
                  echo" <input type='submit' value='VER DETALLE' >";
                  echo"<input type=hidden name=orden_servicio value=$orden_servicio >";
                  echo"</form >";
                  echo "</td>";

                  
                 
              }
      }
echo"</table>";
 }


if(isset($_POST['por_repuesto']))

{

 $nombre = $_POST['por_repuesto'];
   $sql = "SELECT titulo,fecha,cliente,articulo,estatus,descripcion,huella_responsable FROM jos_ordenes_servicio where id =".$nombre;
   $result = $conn->query($sql);
    if ($result->num_rows > 0) {

       while($row = $result->fetch_assoc())
       {
        echo "<table width=100% border=4  bordercolor=#f8fdbb >";
               echo"<tr bgcolor='#D0A9F5'>";
               echo"<td colspan='3'  >";
               echo"<strong>"."TÍTULO "."&nbsp"."</strong>"."<font size=4 color=white >".$row["titulo"]."</font>";
               echo"</td>";
               echo"<td  >";
               echo"<strong>"."NÚMERO DE CASO "."&nbsp"."</strong>"."<font size=4 color=white >".$nombre."</font>";
               echo"</td>";
               echo"<tr bgcolor='#D0A9F5'>";
               echo"<td >";
               echo"<strong>"."ABIERTO EL:"."&nbsp"."&nbsp"."</strong>"."<font size=2 color=white >".$row["fecha"]."</font>";
               echo"</td>";
               echo"<td colspan='2'>";
               echo"<strong>"."DESCRIPCIÓN :"."&nbsp"."</strong>"."<font size=2 color=white >".$row["descripcion"]."</font>";
               echo"</td>";
               echo"<td >";
               echo"<strong>"."ABIERTO POR :"."&nbsp"."</strong>"."<font size=2 color=white >".$row["huella_responsable"]."</font>";
               echo"</td>";
               echo"</tr>";
               echo"<tr bgcolor='#642EFE'>";
               echo"<td  >";
               $valor1=$row["cliente"];
               $sql2 = "SELECT nombre1,nombre2,apellido1,apellido2,comuna,rut,calle,tlf1,tlf2,casa FROM jos_clientes where id =".$row["cliente"];

               $result2 = $conn->query($sql2);

               $row2 = $result2->fetch_assoc();

               echo"<strong>"."NOMBRE DEL CLIENTE:"."&nbsp"."</strong>"."<font size=2 color=white >".$row2["nombre1"]."&nbsp". $row2["nombre2"]."</font>";

               echo"</td>";

               echo"<td  >";

               echo"<strong>"."RUT:"."&nbsp"."</strong>"."<font size=2 color=white >".$row2["rut"]."</font>";

               echo"</td>";

               echo"<td  >";

               echo"<strong>"."COMUNA:"."&nbsp"."</strong>"."<font size=2 color=white >".$row2["comuna"]."</font>";

               echo"</td>";

               echo"<td >";

               echo"<strong>"."TELÉFONO :"."&nbsp"."</strong>"."<font size=2 color=white >".$row2["tlf1"]."</font>";
               echo"</td>";
               echo"</td>";
               echo"</tr>";

                  echo"<tr bgcolor='642EFE'>";

                  echo"<td colspan='3' >";
                  echo"<strong>"."DIRECCIÓN:"."&nbsp"."</strong>"."<font size=2 color=white >".$comuna.".".$row2["calle"].".".$row2["casa"]."</font>";
                  echo"</td>";

                  echo"<td >";
                  echo"<strong>"."Email :"."&nbsp"."</strong>"."<font size=2 color=white >".$row2["tlf2"]."</font>";
                  echo"</td>";

                  echo"</tr >";

  echo "</table>";


      }
    }
  }



?>
{/source}