{source}

<?php
$usuario = JFactory::getUser()->get('id');
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
// Superusuario      -->8
 //Jefatura         --> 12
 // Supervisores    --> 13
//Tecnicos            --> 11
 // Ventas            --> 14

$sql = "SELECT group_id FROM jos_user_usergroup_map where     user_id =".$usuario;
$result = $conn->query($sql);
 $row = $result->fetch_assoc();


if ($row[group_id]=='12'|| $row[group_id]=='13'||$row[group_id]=='8' || $row[group_id]=='2')
{
echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
echo"<tr bgcolor=#ffffff>";
echo"<font size='5' color='BLUE'>VER REPUESTOS ASIGNADOS</font>";
 echo"</tr>";
//VA A SELECCIONA USUARIO
 echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=47' method='POST' >";
 echo"<br>";
echo"INGRESE LA OS:<input type='text' name='orden_servicio' />";
echo"<input type='submit' value='VER REPUESTOS ASIGNADOS' >";
echo"</form >";
echo"</div>";
echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
echo"<tr bgcolor=#ffffff>";
echo"<font size='5' color='BLUE'>VER REPUESTOS CON REPUESTOS ASIGNADOS</font>";
 echo"</tr>";
       $sql = "SELECT name,id FROM jos_users";
      $result = $conn->query($sql);
        echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=51' method='POST' >";
        echo"<select name='tecnico'>";
            while($row=$result->fetch_assoc())
                 {
                 $sql2 = "SELECT * FROM jos_user_usergroup_map";
                 $result2 = $conn->query($sql2);
               
                 while($row2=$result2->fetch_assoc() )
                    {
                    if($row[id]==$row2[user_id])
                      {
                        if($row2[group_id]=="11")
                        {
                        echo "<option select value='$row[id]'>";
                        echo "$row[name]";
                        echo "</option>";
                        }
                      }
                    }
                 }
        echo" <input type='submit' value='BUSCAR POR TECNICO' >";
        echo"</select>";
        echo"</form >";

echo"</div>";
}
else {
echo "<script language='JavaScript'>";
echo "alert ('USTED NO ES UN USUARIO AUTORIZADO PARA EL MÓDULO!',200)";
echo"</script>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.kerigmaservice.com/home'>";
}



?>
 {/source}