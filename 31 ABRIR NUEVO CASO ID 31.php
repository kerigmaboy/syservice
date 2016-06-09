{source}

 <?php

 $id_domicilio=$_POST['id_domicilio'];

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

  echo "<br />";

  $sql = "SELECT nombre1,nombre2,apellido1,apellido2,ciudad,comuna,casa,balance,tlf1,tlf2,calle,referencia,rut,id FROM jos_clientes where id =".$id_domicilio;

   $result = $conn->query($sql);

  

     if ($result->num_rows > 0) {

          //output data of each row

              while($row = $result->fetch_assoc()) {

    echo "<table width=100% border=4  bordercolor=#f8fdbb >";

    echo"<caption>Datos del Cliente</caption>";

 

      echo"<tr bgcolor=blue>"; 

     echo"<td nowrap >";

        echo"<strong>"."NOMBRE:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["nombre1"]."&nbsp" .$row["nombre2"]. "&nbsp".$row["apellido1"]."&nbsp" .$row["apellido2"]."</font>";

      echo"</td>";

       echo"<td nowrap>";

       echo"<strong>"."RUT:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["rut"]."</font>";

       echo"</td>";

      echo"<td nowrap>";

       echo"<strong>"."CELULAR:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["tlf2"]."</font>";

       echo"</td>";

     echo"<tr bgcolor=blue>"; 

    echo"<td nowrap>";

      echo"<strong>"."DIRECCIÓN:"."&nbsp"."</strong>"."<font size=2 color=white >".$row["comuna"].".".$row["calle"].".".$row["casa"]."</font>";

    echo"</td>";

 

   echo"<td nowrap>";

      echo"<strong>"."TELÉFONO :"."&nbsp"."</strong>"."<font size=2 color=white >".$row["tlf1"]."</font>";

     echo"</td>";

    echo"<td nowrap>";

       echo"<strong>"."CORREO :"."&nbsp"."</strong>"."<font size=2 color=white >".$row["balance"]."</font>";

      echo"</td>";

      echo"</tr>"; 

      echo"</td>";

 

  echo "</table>";

    }

   }

   ?>

   {/source}

 {source}

<!-- You can place html anywhere within the source tags -->

<?php

echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb'>";

echo"<tr>";

 echo"<tr bgcolor=#ffffff>";

 echo"<font size='5' color='BLUE'>ABRIR NUEVO CASO</font>";

 

  echo"</tr>";

echo"<br>";

  echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=32'  method='POST' >";

echo"TÍTULO:"."<input type='text' name='titulo' />";

echo"<br>";

echo"<select name='articulo' METHOD='POST'>";

  echo"<option value='0'>Seleccione un artículo</option>";

 echo" <option value='Encimera_Electrica'>Encimera Electrica</option>";

 echo" <option value='Refrigerador'>Refrigerador</option>";

 echo" <option value='Lavadora'>Lavadora Mabe</option>";

 echo" <option value='Horno'>Horno</option>";

echo" <input type=hidden name='domicilio' value='$id_domicilio' >";

echo"</select>";

echo"<br>";

echo"Descripción de la Falla reportada"."<textarea name='descripcion' rows='5' cols='10'></textarea>";

echo"<br>";

 echo"<input type='submit' value='CREAR EL CASO' >";

 echo"</tr>";

echo"</form>";

echo"</div>";

?>
{/source}

 