{source}
<?php
$id_caso=$_POST['id_caso'];



 $servername = "localhost";
 $username = "ingboyer_jos1";
 $password = "U[kSjG]k]qU*IUV3dO^47*.9";
 $dbname = "ingboyer_jos1";
 

 $conn = new mysqli($servername, $username, $password, $dbname); // Create connection
 if ($conn->connect_error) {  // Check connection
     die("Connection failed: ". $conn->connect_error);
    }


  $sql2 = "SELECT id  FROM jos_ruta WHERE id_caso=$id_caso"; // Busca la ruta por el id_caso en BD
  $result2 = $conn->query($sql2);
  $row2 = $result2->fetch_assoc();
  $id_ruta=$row2['id'];


    $user=  JFactory::getUser()->get('name');  // Ver quien es el responsable de la carga de repuesto.
    
    echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=41' method='POST' >";
    echo"<br>";
    echo"Repuesto1:<input type='text' name='repuesto1' />";
    echo"<br>";
    echo"Repuesto2:<input type='text' name='repuesto2' />";
    echo"<br>";
    echo"Repuesto3:<input type='text' name='repuesto3' />";
    echo"<br>";

 echo"<input type=hidden name='id_ruta' value=$id_ruta >";
 echo"<input type=hidden name='id_caso' value=$id_caso >";

 echo"<input type='submit' value='CARGAR REPUESTO' >";
 echo"</form >";
   echo"<br>";
   echo $id_ruta;

?>
{/source}