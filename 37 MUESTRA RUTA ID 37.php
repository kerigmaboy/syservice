{source}

  <?php
  //*******///////////////////////////////////////*****
  //******  TABLA PARA LA RUTA DE LOS TECNICOS    *****
  //*******///////////////////////////////////////*****

    $tecnico=  JFactory::getUser()->get('id');
    $user=  JFactory::getUser()->get('nombre');
  date_default_timezone_set('America/Santiago');
  

   $fecha=$_POST['fecha'];

  $servername = "localhost";
  $username = "ingboyer_jos1";
  $password = "U[kSjG]k]qU*IUV3dO^47*.9";
  $dbname = "ingboyer_jos1";
      $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
          die("Conexión fallida: ". $conn->connect_error);
                            }
  
     $sql3 = "SELECT fecha_agendamiento,id_caso,id_domicilio FROM jos_ruta where tecnico =".$tecnico;
     $result3 = $conn->query($sql3);

  if ($result3->num_rows > 0) {
  echo "<table>";
   echo"<tr bgcolor=blue>";
              echo"<th colspan='4'>";
              echo"<font size='5' color='BLACK'> RUTA ASIGNADA PARA DE HOY  </font>";
              echo"</th>";
            echo"</tr>";
  echo "</table>";
  
  while($row3 = $result3->fetch_assoc()) {
   if ($row3[fecha_agendamiento]== date('Y/m/d') )
  {
     $sqlESTATUS = "SELECT MAX(id) AS id FROM jos_actualizacion WHERE id_os=$row3[id_caso]";
     $resultESTATUS = $conn->query($sqlESTATUS);
     $rowESTATUS = $resultESTATUS->fetch_assoc();

     $sqlACTUAL = "SELECT estatus FROM jos_actualizacion WHERE id=$rowESTATUS[id]";
     $resultACTUAL = $conn->query($sqlACTUAL);
     $rowACTUAL = $resultACTUAL->fetch_assoc();

     if ($rowACTUAL[estatus]=='Pendiente por visita' || $rowACTUAL[estatus]=='Programada') {
        echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb'>";
        echo "<table cellspacing=2  width=100% border=4 >";
      echo"<tr>";
      echo"<td>";
      echo"<font size='3' color='BLUE'>"." CASO: "."<font size='3' color='BLACK'>".$row3[id_caso]."</font>";
      echo"</td>";
      echo"<td colspan='2'>";
      $sql = "SELECT nombre1,nombre2,apellido1,apellido2,ciudad,id,comuna,casa,balance,tlf1,tlf2,calle,referencia,rut FROM jos_clientes where id =".$row3[id_domicilio];
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      echo"<font size='3' color='blue'>"."DIRECCION: "."</font>"."<font size='3' color='black'>".$row[comuna]. ".  ".$row[calle]."   N°  ".$row[casa]."</font>";
      echo"</td>";
      echo"<td>";
      echo"<font size='3' color='BLUE'>".$row3[fecha_agendamiento]."</font>";
      echo"</td>";
  echo"</tr>";


  echo"<tr>";
  echo"<td>";
  echo"<font size='3' color='blue'>"."NOMBRE: "."</font>"."<font size='3' color='black'>".$row[nombre1]. ".  ".$row[apellido1]."</font>";
  echo"</td>";

  echo"<td>";
  echo"<font size='3' color='blue'>"."RUT: "."</font>"."<font size='3' color='BLACK'>".$row[rut]."</font>";
  echo"</td>";

  

   echo"<td>";
   $telef=$row['tlf1'];
  

   echo"<font size='3' color='blue'>"."TELEFONO: "."</font>";
   echo"<a href='tel://$telef'>".$telef."</a>";
   echo"</td>";
   echo"<td>";
      echo"<font size='3' color='blue'>"."OTRO TELEFONO: "."</font>"."<font size='3' color='BLACK'>".$row[tlf2]."</font>";
   echo"</td>";


  
   echo"</tr>";
            echo"<tr bgcolor='#ECF6CE'>";
                      echo"<td>";
  ///query orden_servicio

  

     $sql2 = "SELECT titulo,numero_guia,fecha,fecha_apertura,articulo,descripcion,huella_responsable FROM jos_ordenes_servicio where id =".$row3[id_caso];
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
              echo"<font size='3' color='blue'>"."ARTÍCULO: "."</font>"."<font size='3' color='BLACK'>".$row2[articulo]."</font>";;
              echo"</td>";
      echo"<td>";
      echo"<font size='3' color='blue'>"."FALLA REPORTADA: "."</font>"."<font size='3' color='BLACK'>".$row2[titulo]."</font>";
      echo"</td>";

  

      echo"<td coldspan='4'>";
      echo"<font size='3' color='blue'>"."DESCRIPCIÓN: "."</font>"."<font size='3' color='BLACK'>".$row2[descripcion]."</font>";

      echo"</td>";

      echo"<td coldspan='4'>";
     
    echo"<form action=http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=44 method=POST >";
    echo"<input type=hidden name='id-os' value=$row3[id_caso] >";
    $ip_actualizante=$_SERVER['REMOTE_ADDR'];
    echo"<input type=hidden name='ip_actualiza' value=$ip_actualizante >";
    $user=  JFactory::getUser()->get('id');
    echo"<input type=hidden name='responsable' value=$user >";
     echo"<input type='submit' value='ACTUALIZAR' >";
    echo"</form >";
  
      echo"</td>";

            echo"</tr>";
           
     echo "</table>";

     echo"</div>";

  
  }

  }

  }

  

  }

  

  else {
    echo" No encontramos ruta para el día de hoy";
}

  ?>
  {/source}