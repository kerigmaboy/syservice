{source}
<?php

//RECIBE LAS VARIABLES

$id_caso=$_POST['id_caso'];
$id_ruta=$_POST['id_ruta'];
$empleado=JFactory::getUser()->get('name');
$ip_actualiza=$_SERVER['REMOTE_ADDR'];

 date_default_timezone_set('America/Santiago');
 $fecha=date('Y/m/d  H:i:s ');

$repuesto1=$_POST['repuesto1'];
$repuesto2=$_POST['repuesto2'];
$repuesto3=$_POST['repuesto3'];
$repuesto4=$_POST['repuesto4'];
$repuesto5=$_POST['repuesto5'];
$repuesto6=$_POST['repuesto6'];
$repuesto7=$_POST['repuesto7'];
$repuesto8=$_POST['repuesto8'];
$repuesto9=$_POST['repuesto9'];
$repuesto10=$_POST['repuesto10'];

//Contador en cero
 $i=0;
 
 //CONEXIÓN A BASE DE DATOS
  $servername = "localhost";
  $username = "ingboyer_jos1";
  $password = "U[kSjG]k]qU*IUV3dO^47*.9";
  $dbname = "ingboyer_jos1";
  $conn = new mysqli($servername, $username, $password, $dbname);
 
 

 

 //INGRESA DATA A BASE DE DATOS

if(!empty($repuesto1))
{

$sql="INSERT INTO jos_repuestos_asignados  (id_repuesto,id_caso,id_ruta,id_asignador,fecha) VALUES ('$repuesto1','$id_caso','$id_ruta','$empleado','$fecha')";
 $conn->query($sql);
}

if(!empty($repuesto2))
{
$sql="INSERT INTO jos_repuestos_asignados  (id_repuesto,id_caso,id_ruta,id_asignador,fecha) VALUES ('$repuesto2','$id_caso','$id_ruta','$empleado','$fecha')";
 $conn->query($sql);
}
if(!empty($repuesto3))
{

$sql="INSERT INTO jos_repuestos_asignados  (id_repuesto,id_caso,id_ruta,id_asignador,fecha) VALUES ('$repuesto3','$id_caso','$id_ruta','$empleado','$fecha')";
 $conn->query($sql);
}

if(!empty($repuesto4))
{

$sql="INSERT INTO jos_repuestos_asignados  (id_repuesto,id_caso,id_ruta,id_asignador,fecha) VALUES ('$respuesto4','$id_caso','$id_ruta','$empleado','$fecha')";
 $conn->query($sql);
}
if(!empty($repuesto5))
{

$sql="INSERT INTO jos_repuestos_asignados  (id_repuesto,id_caso,id_ruta,id_asignador,fecha) VALUES ('$respuesto5','$id_caso','$id_ruta','$empleado','$fecha')";
 $conn->query($sql);
}

if(!empty($repuesto6))
{

$sql="INSERT INTO jos_repuestos_asignados  (id_repuesto,id_caso,id_ruta,id_asignador,fecha) VALUES ('$respuesto6','$id_caso','$id_ruta','$empleado','$fecha')";
 $conn->query($sql);
}
if(!empty($repuesto7))
{

$sql="INSERT INTO jos_repuestos_asignados  (id_repuesto,id_caso,id_ruta,id_asignador,fecha) VALUES ('$respuesto7','$id_caso','$id_ruta','$empleado','$fecha')";
 $conn->query($sql);
}

if(!empty($repuesto8))
{
 

$sql="INSERT INTO jos_repuestos_asignados  (id_repuesto,id_caso,id_ruta,id_asignador,fecha) VALUES ('$respuesto8','$id_caso','$id_ruta','$empleado','$fecha')";
 $conn->query($sql);
}
if(!empty($repuesto9))
{
$repuesto=$respuesto9;

$sql="INSERT INTO jos_repuestos_asignados  (id_repuesto,id_caso,id_ruta,id_asignador,fecha) VALUES ('$respuesto9','$id_caso','$id_ruta','$empleado','$fecha')";
 $conn->query($sql);
}

if(!empty($repuesto10))
{

$sql="INSERT INTO jos_repuestos_asignados  (id_repuesto,id_caso,id_ruta,id_asignador,fecha) VALUES ('$respuesto10','$id_caso','$id_ruta','$empleado','$fecha')";
 $conn->query($sql);
}
 
$sql2="INSERT INTO jos_actualizacion  (id_os,estatus,actualizacion,responsable,ip_actualiza) VALUES ('$id_caso','Pendiente por programar','$Se cargaron los repuestos a nivel de sistema','$empleado','$ip_actualiza')";  
$conn->query($sql2);   


echo "El contador i =".$i;
echo "<br>";

echo "RUTA:  ".$id_ruta;

echo "<br>";

echo "CASO".$id_caso;

echo "<br>";

echo "repuesto:  ".$repuesto1;



?>
{/source}