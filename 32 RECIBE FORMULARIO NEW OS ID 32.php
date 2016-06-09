{source}

 <?php

 //Entradas:id del domicilio, título del caso, descripción del caso, articulo//

 //RECIBO LAS ENTRADAS//

 

echo"<br>";

$nueva=$_POST['domicilio'];
$articulo=$_POST['articulo'];
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$bandera=1;

  $empleado= JFactory::getUser()->get('name');
$ip_solicitante="192.180.1.1" ;

echo"<br>";

 
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1

 
date_default_timezone_set('America/Santiago');

 
 echo"<br>";
   $servername = "localhost";
  $username = "ingboyer_jos1";
  $password = "U[kSjG]k]qU*IUV3dO^47*.9";
  $dbname = "ingboyer_jos1";

 

 // Create connection
 
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
  die("Conexión fallida: ". $conn->connect_error);
  }

  echo "<br />";
  $sql = "SELECT nombre1,nombre2,apellido1,apellido2,ciudad,id,comuna,casa,balance,tlf1,tlf2,calle,referencia,rut,id FROM jos_clientes where id =".$nueva;
 

   $result = $conn->query($sql);

 
 

 

     if ($result->num_rows > 0) {

        //output data of each row

 

              while($row = $result->fetch_assoc()) {

 

if($row["comuna"]=="value2")

   {

   $comuna="Santiago Centro";

    }

   else

  {

   $comuna="Otro valor";

    }

 

 

 $nombre_cli=$row["nombre1"]."&nbsp" .$row["nombre2"]. "&nbsp".$row["apellido1"]."&nbsp" .$row["apellido2"];

 $rut_cli=$row["rut"];

  $celular_cli=$row["tlf2"];

 $direccion_cli=$comuna.".".$row["calle"].".".$row["casa"];

$tlf_cli=$row["tlf1"];

 $balance_cli=$row["balance"];

 

     }

    }

echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb'>";

 

 

 echo"<tr bgcolor=#ffffff>";

  echo" <font size='5' color='BLUE'> ABRIRÁS EL SIGUIENTE CASO</font>";

 

$fecha_apertura=date("d/m/Y h:i:s A");

 echo"<br>";

 echo "SOLICITANTE"."$nbsp"." $nbsp" . "<font size='3' color='BLUE'>$empleado</font>" ;

 echo"<br>";

 echo "FECHA DE APERTURA"."$nbsp"." $nbsp" . "<font size='3' color='BLUE'>$fecha_apertura</font>" ;

 echo"<br>";

echo"ARTICULO ". "<font size='3' color='BLUE'>$articulo</font>";

 

echo"<br>";

 echo"TÍTULO:   ". "<font size='3' color='BLUE'>$titulo</font>" ;

 echo"<br>";

echo"DESCRIPCIÓN DE LA FALLA REPORTADA ". "<font size='3' color='BLUE'>$descripcion</font>";

echo"<br>";

 

  echo"</tr>";

 

 

    echo "<table width=100% border=4  bordercolor=#f8fdbb >";

 

    echo"<caption>AL SIGUIENTE DOMICILIO</caption>";

 

 

 

if($row["comuna"]=="value2")

 

  {

 

   $comuna="Santiago Centro";

 

   }

 

  else

 

 {

 

  $comuna="Otro valor";

 

   }

 

      echo"<tr bgcolor=blue>";

 

     echo"<td nowrap >";

 

        echo"<strong>"."NOMBRE:"."&nbsp"."</strong>"."<font size=2 color=white >".$nombre_cli."&nbsp" .$row["apellido2"]."</font>";

 

      echo"</td>";

 

       echo"<td nowrap>";

 

       echo"<strong>"."RUT:"."&nbsp"."</strong>"."<font size=2 color=white >".$rut_cli."</font>";

 

       echo"</td>";

 

      echo"<td nowrap>";

 

       echo"<strong>"."CELULAR:"."&nbsp"."</strong>"."<font size=2 color=white >".$celular_cli."</font>";

 

       echo"</td>";

 

     echo"<tr bgcolor=blue>";

 

    echo"<td nowrap>";

 

      echo"<strong>"."DIRECCIÓN:"."&nbsp"."</strong>"."<font size=2 color=white >".$direccion_cli."</font>";

 

    echo"</td>";

 

 

 

   echo"<td nowrap>";

 

      echo"<strong>"."TELÉFONO :"."&nbsp"."</strong>"."<font size=2 color=white >".$tlf_cli."</font>";

 

     echo"</td>";

 

    echo"<td nowrap>";

 

       echo"<strong>"."BALANCE :"."&nbsp"."</strong>"."<font size=2 color=white >".$balance_cli."</font>";

 

      echo"</td>";

 

      echo"</tr>";

       echo"</td>";

   echo "</table>";

 

 echo"</div>";

     echo "<table width=100% border=4  bordercolor=#f8fdbb >";

 echo"<tr>";

 echo"<td>";

       echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=33'  method='POST' >";

             echo "<input type='hidden' name='articulo' value='$articulo'>";

             echo "<input type='hidden' name='titulo' value='$titulo'>";

             echo "<input type='hidden' name='domicilio' value='$nueva'>";

             echo "<input type='hidden' name='descripcion' value='$descripcion'>";

             echo "<input type='hidden' name='user' value='$empleado'>";

             echo "<input type='hidden' name='ip_user' value='$ip_solicitante'>";

             echo"<input type='submit' value='Registrar y programar' >";

 

       echo"</form>";

 echo"</td>";

 

 echo"<td>";

        echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=33'  method='POST' >";

       echo"<input type='submit' value='Solo registrar' >";
             echo "<input type='hidden' name='articulo' value='$articulo'>";
             echo "<input type='hidden' name='titulo' value='$titulo'>";
             echo "<input type='hidden' name='domicilio' value='$nueva'>";
             echo "<input type='hidden' name='descripcion' value='$descripcion'>";
             echo "<input type='hidden' name='user' value='$empleado'>";
             echo "<input type='hidden' name='ip_user' value='$ip_solicitante'>";
             echo "<input type='hidden' name='bandera' value='$bandera'>";
            
       echo"</form>";

 echo"</td>";

 

 echo"<td>";

       echo"<form action='http://www.kerigmaservice.com/home'  method='POST' >";

       echo"<input type='submit' value='Ir al inicio' >";

       echo"</form>";

 echo"</td>";

 

    echo "</table >";

?>

{/source}