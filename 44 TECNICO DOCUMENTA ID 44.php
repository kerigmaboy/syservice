{source}

<?php
$id_os=$_POST['id-os'];
$ip_actualiza=$_POST['ip_actualiza'];
$responsable=$_POST['responsable'];

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


 $sql = "SELECT titulo,fecha,cliente,articulo,estatus,descripcion,huella_responsable FROM jos_ordenes_servicio where id =$id_os";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
      //output data of each row
       while($row = $result->fetch_assoc())
       {
        echo "<table width=100% border=4  bordercolor=#f8fdbb >";
               echo"<tr bgcolor='#D0A9F5'>";
               echo"<td colspan='3'  >";
               echo"<strong>"."TÍTULO "."&nbsp"."</strong>"."<font size=4 color=white >".$row["titulo"]."</font>";
               echo"</td>";
               echo"<td  >";
               echo"<strong>"."NÚMERO DE CASO "."&nbsp"."</strong>"."<font size=4 color=white >".$id_os."</font>";
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

///parte de arriba DE LA SECCION DE DATOS DEL CLIENTE
                  echo"<tr bgcolor='642EFE'>";
                  echo"<td colspan='3' >";
                  echo"<strong>"."DIRECCIÓN:"."&nbsp"."</strong>"."<font size=2 color=white >".$comuna.".".$row2["calle"].".".$row2["casa"]."</font>";
                  echo"</td>";
                  echo"<td >";
                  echo"<strong>"."Email :"."&nbsp"."</strong>"."<font size=2 color=white >".$row2["tlf2"]."</font>";
                  echo"</td>";
                  echo"</tr >";
///parte de abajo
////parte de arriba de la seccion de ACTUALIZACION

 
   $sql3 = "SELECT actualizacion,fecha,estatus,responsable FROM jos_actualizacion where id_os =$id_os ORDER BY fecha ASC";
   $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {

       /// indices de la tabla de ACTUALIZACION

        echo"<tr bgcolor='#2EFE2E'>";
        echo"<td style='text-align:center;'>";
        echo"<strong>"."&nbsp"."</strong>"."<font size=2 color=black >"."<strong>"."DOCUMENTACIÓN"."</strong>"."</font>";
        echo"</td>";
        echo"<td style='text-align:center;'>";
        echo"<strong>"."&nbsp"."</strong>"."<font size=2 color=black >"."<strong>"."FECHA REALIZADA"."</strong>"."</font>";
        echo"</td >";
        echo"<td >";
        echo"<strong>"."&nbsp"."</strong>"."<font size=2 color=black >"."<strong>"."ESTATUS"."</strong>"."</font>";
        echo"</td>";
        echo"<td >";
        echo"<strong>"."&nbsp"."</strong>"."<font size=2 color=black >"."<strong>"."RESPONSABLE"."</strong>"."</font>";
        echo"</td>";
        echo"</tr >";


/// FIN DE LOS INDICES DE LA TABLA

       while($row3 = $result3->fetch_assoc())
            {
            echo"<tr bgcolor='#C8FE2E'>";
            echo"<td >";
            echo"<strong>"."</strong>"."<font size=2 color=black >".$row3["actualizacion"]."</font>";
            echo"</td>";
            echo"<td >";
            echo"<strong>"."&nbsp"."</strong>"."<font size=2 color=BLACK >".$row3["fecha"]."</font>";
            echo"</td>";
            echo"<td >";
             $elESTATUS=$row3["estatus"];
            echo"<strong>"."&nbsp"."</strong>"."<font size=2 color=BLACK >".$row3["estatus"]."</font>";
            echo"</td>";
            echo"<td >";
            echo"<strong>"."&nbsp"."</strong>"."<font size=2 color=BLACK >".$row3["responsable"]."</font>";
            echo"</td>";
            echo"</tr >";
            }


              }
              echo"<tr bgcolor='#2EFE2E'>";
              echo"<td>";
              echo"<form action=http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=35 method=POST >";
              echo"<input type='text' name='actualizacion'>";
              echo"<input type=hidden name='id-os' value=$id_os >";
              $ip_actualizante=$_SERVER['REMOTE_ADDR'];
              echo"<input type=hidden name='ip_actualiza' value=$ip_actualizante >";
              $user=  JFactory::getUser()->get('name');
              echo"<input type=hidden name='responsable' value=$user >";
              echo"<input type=hidden name='estatus' value='Pendiente por repuesto' >";
 
  echo"</td>";
  echo"<td>";
    echo"<input type=submit value='ENVIAR ACTUALIZACION' />";
    echo"</form>";
    echo"</td>";

    echo"<td  align='center'>";
    echo" <form action=http://www.kerigmaservice.com/home/es-ES/operaciones/seguimiento-y-control>";
    echo"<input type=submit value='SEGUIR EN LA RUTA' />";
    echo"</form>";
    echo"</td>";

    echo"<td align='center'>";
        echo" <form action=http://www.kerigmaservice.com/home/es-ES/operaciones>";
        echo"<input type=submit value='HOME' />";
        echo"</form>";
    echo "</td>";

          echo "</table>";
              }
            }
?>
{/source}