  {source}
<?php
//RECIBE LAS VARIABLES
$id_caso=$_POST['orden_servicio'];
 date_default_timezone_set('America/Santiago');
 $fecha=date('Y/m/d  H:i:s ');

 //CONEXIÓN A BASE DE DATOS
  $servername = "localhost";
  $username = "ingboyer_jos1";
  $password = "U[kSjG]k]qU*IUV3dO^47*.9";
  $dbname = "ingboyer_jos1";
  $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
 if ($conn->connect_error) {
 die("Connection failed: ". $conn->connect_error);
 }


if(empty($id_caso))  //DEBE AÑADIRSELE LA VALIDACIÓN DE FORMATO, SOLO VE SI ESTÁ VACÍA
{
echo "<script language='JavaScript'>";
echo "alert ('INTRODUZCA UNA OS VÁLIDA!',200)";
echo"</script>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.kerigmaservice.com/home/es-ES/operaciones'>";
}
else{
    $sql = "SELECT id_repuesto,fecha FROM jos_repuestos_asignados where id_caso =$id_caso";
    if($result = $conn->query($sql))
     {
     echo "<table width=100% border=4  bordercolor=#f8fdbb >";
     echo"<tr bgcolor=blue>";
     echo"<td >";
     echo"<strong>"."REPUESTO"."</strong>";
     echo"</td>";
     echo"<td >";
     echo"<strong>"."COSTO"."</strong>";
     echo"</td>";

     while ($row = $result->fetch_assoc())
         {
         echo"<tr bgcolor=blue>";   
         echo"<td >";
         echo"<strong>".$row[id_repuesto]."</strong>";
         echo"</td>";
         echo"<td >";
         $sql2 = "SELECT codigo_externo FROM jos_repuestos where id=".$row[id_repuesto];
         $result2 = $conn->query($sql2);




    while ($row2 = $result2->fetch_assoc()) {
        $costo_repuesto= str_replace('.', '', $row2[codigo_externo]);
        $precio_subtotal=$precio_subtotal+$costo_repuesto;

        echo"<strong>".$row2[codigo_externo]."</strong>";
        }
        echo"</td>";
         }

     echo"</table>";

     }
     echo "<table width=100% border=4  bordercolor=#f8fdbb >";
     echo"<tr>";
     echo "<td >";
     echo "SUBTOTAL: ";
     echo "</td>";
     echo "<td>";
     echo $precio_subtotal;
     echo "</td>";

     
     echo"<tr>";
     echo "<td >";
     echo "IVA (19%): ";
     echo "</td>";
     echo "<td>";
     $IVA=$precio_subtotal*0.19;
     echo $IVA;
     echo "</td>";

     echo"<tr>";
     echo "<td >";
     echo "TOTAL: ";
     echo "</td>";
     echo "<td>";
     $total= $precio_subtotal+$IVA;
     echo $total;
     echo "</td>";



     echo"</table>";
     }


?>
{/source}