{source}
<?php

//CONEXION A BASES DE DATOS
  $servername = "localhost";
  $username = "ingboyer_jos1";
  $password = "U[kSjG]k]qU*IUV3dO^47*.9";
  $dbname = "ingboyer_jos1";
  $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
                             die("Conexión fallida: ". $conn->connect_error);
                            }
 
 
  echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
        echo"<font size='5' color='BLUE' >CRITERIOS PARA LA ASIGNACIÓN DE REPUESTOS </font>";
  echo"</div>";
 


 echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
// SELECCIONA POR TECNICO
      echo"<tr bgcolor=#ffffff>";
      echo"<font size='5' color='BLUE'>BUSCANDO POR TECNICO </font>";
      echo"</tr>";
    
      $sql = "SELECT name,id FROM jos_users";
      $result = $conn->query($sql);
        echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=49' method='POST' >";
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
                        echo "<option value=$row[id]>";
                        echo "$row[name]";
                        echo "</option>";
                        }

                      }
                    }
                 }
        echo" <input type='submit' value='PROCESAR' >";
        echo"</select>";
        echo"</form >";
  
 echo"</div>";
     
 echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
// SELECCIONA POR ESTATUS
      echo"<tr bgcolor=#ffffff>";
      echo"<font size='5' color='BLUE'>BUSCANDO POR ESTATUS </font>";
      echo"</tr>";
    
      $sql = "SELECT estatus,id_os FROM jos_actualizacion";
      $result = $conn->query($sql);
        echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=49' method='POST' >";
        echo"<select name='por_repuesto'>";
            while($row=$result->fetch_assoc())
                 {
                 if ($row[estatus]=="Pendiente por repuesto")
                    {
                    echo "<option>";
                    echo "$row[id_os]";
                    echo "</option>";
                    }
                 }
        echo" <input type='submit' value='VER POR ESTATUS' >";
        echo"</select>";
        echo"</form >";
   
 echo"</div>";      
     
// SELECCIONA POR RUTA
    echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
    echo"<tr bgcolor=#ffffff>";
    echo"<font size='5' color='BLUE'>BUSCANDO POR RUTA</font>";
    echo"</tr>";
    echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=29' method='POST' >";
    echo" Orden de Servicio N°:  "."<input type='text' name='orden_servicio' />";
    echo"</form >";
    echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=29' method='POST' >";
    echo" RUT DEL CLIENTE SOLICITANTE N°:  "."<input type='text' name='rut_cliente' />";
    echo"<input type='submit' value='Buscar por OS' >";
    echo"</form >";
    echo"</div>";
 
// SELECCIONA POR RUTA
    echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
    echo"<font size='5' color='BLUE'>VER LA RUTA</font>";
    echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=38' method='POST' >";
    echo "<input type='hidden' name='user' value='$acceso'>";
    echo"Selecciona la fecha de la ruta: "."<input type='date' name='fecha_ruta'>"." Ejemplo:(2016/03/21)" ;
    echo" <input type='submit' value='VER LA RUTA DE ESE DIA' >";
    echo"</div>";

                        
?>
{/source}