{source}

<?php
 $servername = "localhost";
 $username = "ingboyer_jos1";
 $password = "tener222";
 $dbname = "ingboyer_jos1";
 


 $conn = new mysqli($servername, $username, $password, $dbname);  // Create connection

 if ($conn->connect_error) {
 die("Connection failed: ". $conn->connect_error);   // Check connection
 }
$cadena="Pendienteporprogramar";
$flag=0;
 

if(isset($_POST['rut-destino']))
 {
  $rutUsuario = $_POST['rut-destino'];
  $sql = "SELECT nombre1,nombre2,apellido1,apellido2,ciudad,comuna,casa,balance,tlf1,tlf2,calle,referencia,rut,id FROM jos_clientes where rut =".$rutUsuario;

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $id_domicilio=$row["tlf1"]; //output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<table width=100% border=4  bordercolor=#f8fdbb >";
      echo"<caption>Datos del Cliente</caption>";
      echo"<tr bgcolor=blue>";
      echo"<td >";
      echo"<strong>"."NOMBRE:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["nombre1"]."&nbsp" .$row["nombre2"]. "&nbsp".$row["apellido1"]."&nbsp" .$row["apellido2"]."</font>";
      echo"</td>";
      echo"<td >";
      echo"<strong>"."RUT:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["rut"]."</font>";
      echo"</td>";
      echo"<td >";
      echo"<strong>"."CELULAR:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["tlf2"]."</font>";
      echo"</td>";
      echo"<tr bgcolor=blue>";
      echo"<td >";
      echo"<strong>"."DIRECCIÓN:"."&nbsp"."</strong>"."<font size=2 color=white >".$comuna.".".$row["calle"].".".$row["casa"]."</font>";
      echo"</td>";
      echo"<td >";
      echo"<strong>"."TELÉFONO :"."&nbsp"."</strong>"."<font size=2 color=white >".$row["tlf1"]."</font>";
      echo"</td>";
      echo"<td >";
      echo"<strong>"."CORREO  :"."&nbsp"."</strong>"."<font size=2 color=white >".$row["balance"]."</font>";
      echo"</td>";
      echo"</tr>";
      echo"</td>";
      echo"<td>";
      $auxiliar=$row["id"];
      echo"<form action=http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=31 method=POST >";
       echo"<input type=hidden name=id_domicilio value=$auxiliar >";
       echo"<input type=submit value='ABRIR UN CASO A ESTE DOMICILIO'>";
       echo"</form >";
       echo"</td>";
       echo"<td bgcolor=#CE9AF8>";
       echo" <form action=http://www.kerigmaservice.com/home method=POST>";
       echo"<input type=submit value=' ACCION POR DEFINIR' />";

       echo"</form>";
       echo"</td>";
       echo"<td bgcolor=#CE9AF8>";
       echo" <form action=http://www.kerigmaservice.com/home/es-ES/operaciones>";
       echo"<input type=submit value='HOME' />";
       echo"</form>";
       echo"</td>";
       echo"</tr>";
        echo "</table>";
         }
       }

             else {

                echo "¡VUELVE A INTENTARLO!";
                echo "<script language='JavaScript'>";
                echo "alert ('EL RUT INTRODUCIDO NO EXITE EN LA BASE DE DATOS... SIGA INTENTANDO!',200)";
                echo"</script>";
                echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.kerigmaservice.com/home/es-ES/operaciones/seguimiento-y-control'>";

             }

           }

 

      

 if(isset($_POST['rut_cliente']))

 {
   $rut_cliente=$_POST['rut_cliente'];
  $sql = "SELECT nombre1,nombre2,apellido1,apellido2,ciudad,comuna,casa,balance,tlf1,tlf2,calle,referencia,rut,id FROM jos_clientes where rut =".$rut_cliente;
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $id_domicilio=$row["tlf1"];
         //output data of each row
        while($row = $result->fetch_assoc()) {
      
                echo "<table width=100% border=4  bordercolor=#f8fdbb >";
                echo"DATOS DEL DOMICILIO";
                echo"<tr bgcolor=blue>";
                echo"<td >";
                echo"<strong>"."NOMBRE:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["nombre1"]."&nbsp". "&nbsp".$row["apellido1"]."</font>";
                echo"</td>";
                echo"<td >";
                echo"<strong>"."RUT:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["rut"]."</font>";
                echo"</td>";
                echo"<td >";
                echo"<strong>"."CELULAR:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["tlf2"]."</font>";
                echo"</td>";
                echo"<tr bgcolor=blue>";
                echo"<td >";
                echo"<strong>"."DIRECCIÓN:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["comuna"].".".$row["calle"].".".$row["casa"]."</font>";
                echo"</td>";
                echo"<td >";
                echo"<strong>"."TELÉFONO :"."&nbsp"."</strong>"."<font size=2 color=white >".$row["tlf1"]."</font>";
                echo"</td>";
                echo"<td >";
                echo"<strong>"."BALANCE :"."&nbsp"."</strong>"."<font size=2 color=white >".$row["balance"]."</font>";
                echo"</td>";
                echo"</tr>";
                echo"</td>";
                echo"<td>";
                echo "</table>";
           
                ///Segunda parte , datos de los casos abiertos
           
             $sql2= "SELECT id,titulo,fecha,cliente,articulo,estatus,descripcion,huella_responsable FROM jos_ordenes_servicio where cliente=".$row["id"];
             $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    $id_domicilio=$row["tlf1"];
                    //output data of each row
                    while($row2 = $result2->fetch_assoc()) {
                 echo "<table width=100% border=4  bordercolor=#f8fdbb >";
                 echo"<tr >";
                 echo"<td >";
                 echo"<strong>"."FALLA REPORTADA"."</strong>"."<font size=2 color=blue >".$row2["titulo"]."</font>";
                 echo"</td>";
                 echo"<td >";
                $var2=$row2["id"];
                 echo"<strong>"."N° DE CASO:"."&nbsp"."</strong>"."<font size=2 color=blue >".$row2["id"]."</font>";
                echo"</td>";
                 echo"<td >";
                 echo"<strong>"."Fecha:"."&nbsp"."</strong>"."<font size=2 color=blue >".$row2["fecha"]."</font>";
                 echo"</td>";
                 echo"<tr >";
                 echo"<td >";
                 echo"<strong>"."ABIERTO POR:"."&nbsp"."</strong>"."<font size=2 color=blue >".$row2["huella_responsable"]."</font>";
                 echo"</td>";
                 echo"<td >";
                 echo"<strong>"."ESTATUS:"."&nbsp"."</strong>"."<font size=2 color=blue >".$row2["estatus"]."</font>";
                 echo"</td>";
                 echo"<td>";
                echo"<form action=http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=48 method=POST >";
                echo"<input type=hidden name=orden_servicio value=$var2 >";
                echo"<input type=submit value='VER EL DETALLE DEL CASO'>";
                echo"</form >";
                echo"</td>";
                 echo "</table>";
                 }
                 }
 
             
 
              }
 }
                else {
                echo "¡VUELVE A INTENTARLO!";
                echo "<script language='JavaScript'>";
                echo "alert ('EL CLIENTE NO REGISTRA ORDEN DE SERVICIO!',200)";
                echo"</script>";
                echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.kerigmaservice.com/home/es-ES/operaciones/seguimiento-y-control'>";
                    }
 
 }

if(isset($_POST['nombre-destino']))
 {
 echo "<br>";
 echo " Aquí comenzamos con la búsqueda para el caso de haber ingresado nombre";
 }

 

if(isset($_POST['orden_servicio'])) //  POR NUMERO DE CASO

 {
   $nombre = $_POST['orden_servicio'];
   $sql = "SELECT titulo,fecha,cliente,articulo,estatus,descripcion,huella_responsable FROM jos_ordenes_servicio where id =$nombre ";
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
             echo"</tr>";///parte de arriba DE LA SECCION DE DATOS DEL CLIENTE



                  echo"<tr bgcolor='642EFE'>";
                  echo"<td colspan='3' >";
                  echo"<strong>"."DIRECCIÓN:"."&nbsp"."</strong>"."<font size=2 color=white >".$comuna.".".$row2["calle"].".".$row2["casa"]."</font>";
                  echo"</td>";
                  echo"<td >";
                  echo"<strong>"."Email :"."&nbsp"."</strong>"."<font size=2 color=white >".$row2["tlf2"]."</font>";
                  echo"</td>";
                  echo"</tr >"; ///parte de abajo
          
   $sql3 = "SELECT actualizacion,fecha,estatus,responsable FROM jos_actualizacion where id_os =$nombre order by fecha "; ////parte de arriba de la seccion de ACTUALIZACION
   $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
        echo"<tr bgcolor='#2EFE2E'>";     /// indices de la tabla de ACTUALIZACION
        echo"<td style='text-align:center;'>";
        echo"<strong>"."&nbsp"."</strong>"."<font size=2 color=black >"."<strong>"."DOCUMENTACIÓN"."</strong>"."</font>";
        echo"</td>";

        echo"<td style='text-align:center;'>";
        echo"<strong>"."&nbsp"."</strong>"."<font size=2 color=black >"."<strong>"."FECHA REALIZADA"."</strong>"."</font>";
        echo"</td >";

        echo"<td >";
        echo"<strong>"."&nbsp"."</strong>"."<font size=2 color=black >"."<strong>"."ESTATUS"."</strong>"."</font>";
        echo"</ td>";

        echo"<td >";
        echo"<strong>"."&nbsp"."</strong>"."<font size=2 color=black >"."<strong>"."RESPONSABLE"."</strong>"."</font>";
        echo"</td>";

        echo"</tr >"; /// FIN DE LOS INDICES DE LA TABLA

 



       while($row3 = $result3->fetch_assoc()) {

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
          echo "</table>";   ///parte de abajode la seccion de actualizacion DEBE CORREGIRSE, ES SOLO CON EL ÚLTIMO ESTATUS, NO CADA VEZ QUE


    echo "<table>";//ESTA ES LA PARTE DONDE SE AÑADEN FUNCIONES DE ACUERDO AL ÚLTIMO ESTATUS
    echo "<tr>";

      echo "<td>";
      echo" <form action=http://www.kerigmaservice.com/home/es-ES/operaciones>";
      echo"<input type=submit value='HOME' />";
      echo"</form>";
      echo "</td>";

    $sqlULT="SELECT MAX(id) AS id FROM jos_actualizacion WHERE id_os=$nombre";
    $resultULT= $conn->query($sqlULT);
       while ($rowULT=$resultULT->fetch_assoc())
       {
        $INDICE=$rowULT['id'];

      $sqlULT2="SELECT estatus FROM jos_actualizacion WHERE id=$INDICE";
      $resultULT2= $conn->query($sqlULT2);
      $rowULT2=$resultULT2->fetch_assoc();

        
        if ($rowULT2['estatus']=='Creada') // ESTATUS CREADA
        {
      echo"<td>";
      echo"<form action=http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=46 method=POST >";
      echo" <input type=hidden name='domicilio' value='$valor1' >";
      echo" <input type=hidden name='id_caso' value='$nombre' >";
      echo" <input type=hidden name='titulo' value='$num_caso' >";
      echo" <input type=hidden name='descripcion' value='$num_caso' >";
      echo" <input type=hidden name='responsable' value='$num_caso' >";
      echo"<input type=submit value='ASIGNAR TECNICO' />";
      echo"</form>";
      echo"</td>";
      $flag=1;
        }


        $cadena2=str_replace(" ","",$rowULT2[estatus]);


         if (!strcasecmp ($cadena2,$cadena))//ESTATUS PENDIENTE POR PROGRAMAR
        {
          $flag=1; // bandera para evitar el menu por defecto
          echo"<td>";

          echo"<form action=http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=40 method=POST >";
          echo" <input type=hidden name='id_caso' value='$nombre' >";
          echo"<input type=submit value='PROGRAMAR OS' />";
          echo"</form>";

          $url = htmlspecialchars($_SERVER['HTTP_REFERER']);

          echo "<a href='$url'>ATRAS</a>";

          echo"</td>";
        }


        if ($rowULT2['estatus']==' Pendiente por repuesto')
        {
          $flag=1;
          
      echo"<td>";
      echo"<form action=http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=40 method=POST >";
      echo" <input type=hidden name='id_caso' value='$nombre' >";
      echo"<input type=submit value='Cargar repuesto' />";
           echo"</form>";
          
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<a href='$url'>ATRAS</a>";
          
     
      echo"</td>";
        }
        if ($flag==0)
        {
          
  echo"<tr bgcolor='#2EFE2E'>";

    echo"<td colspan='2'>";
    echo"<form action=http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=35 method=POST >";
    echo"<input type='text' name='actualizacion'>";
    echo"<input type=hidden name='id-os' value=$nombre >";
    $ip_actualizante=$_SERVER['REMOTE_ADDR'];
    echo"<input type=hidden name='ip_actualiza' value=$ip_actualizante >";
    $user=  JFactory::getUser()->get('name');
    echo"<input type=hidden name='responsable' value=$user >";
    echo"</td>";

  echo"<td>";
  echo"<select name='estatus'>";
  echo "<option select value='Pendiente por visita'>Pendiente por visita</option>";
  echo "<option select value='Terminada'>Terminada</option>";
  echo "<option select value='Pendiente por reprogramacion'>Pendiente por reprogramación</option>";
  echo "<option select value='Pendiente por pago'>Pendiente por pago</option>";
  echo "<option select value='Cerrada'>Cerrada</option>";
  echo"</select>";
  echo"</td>";

  echo"<td>";
  echo"<input type='submit' value='ACTUALIZAR' >";
  
  echo"</form >";
  echo"</td>";
  echo "<td>";

  echo "</td>";
  echo"</tr>";
        }


       }


      echo "</table>";


  }

  }

                  else {

                echo "¡VUELVE A INTENTARLO!";
                echo "<script language='JavaScript'>";
                echo "alert ('LA ORDEN DE SERVICIO NO SE ENCUENTRA EN BASE DE DATOS ... SIGA INTENTANDO!',200)";
                echo"</script>";
                echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.kerigmaservice.com/home/es-ES/operaciones/seguimiento-y-control'>";

                    }

 

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

      echo "<td align='center'>"." ACCION ";
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
              echo "$ang3";
              $sqlVER2="SELECT estatus,fecha,id_os  FROM jos_actualizacion WHERE id=$ang2";
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
                  echo "<td align='center'>";// botón para mandar os vía post a id=48
                  echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=48' method='POST' >";
                  echo" <input type='submit' value='VER DETALLE' >";
                  echo"<input type=hidden name=orden_servicio value=$orden_servicio >";
                  echo"</form >";
                  echo "</td>";

                  }
                 
              }
      }
echo"</table>";
 }

  ?>

{/source}
