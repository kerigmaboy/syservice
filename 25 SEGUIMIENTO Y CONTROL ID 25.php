{source}

<?php

  $servername = "localhost";
  $username = "ingboyer_jos1";
  $password = "U[kSjG]k]qU*IUV3dO^47*.9";

 
  $dbname = "ingboyer_jos1";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $acceso = JFactory::getUser()->get('id');
 
   $tecnico = JFactory::getUser()->get('name');
   $fecha = date('Y/m/d');

   if ($conn->connect_error) {
  die("Conexión fallida: ". $conn->connect_error);
echo" a ver si queda aqui";
   }


    echo "<br />";
$sql = "SELECT accesos FROM jos_accesos where id_users =".$acceso;
$sql2 = "SELECT group_id FROM jos_user_usergroup_map where user_id =".$acceso;


 $result = $conn->query($sql);
 $result2 = $conn->query($sql2);

  if ($result2->num_rows > 0){

 while($res = $result2->fetch_assoc()){

if($res['group_id']==11) ///CONDICION DE SER TECNICO

{

    echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
    echo"<tr bgcolor=#ffffff>";
    echo"<br>";
    echo"<font size='5' color='BLUE'> RUTA DE HOY</font>";
    echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=37' method='POST' >";
    echo "<input type='hidden' name='tecnico' value='$acceso'>";
    echo "<input type='hidden' name='fecha' value='$fecha'>";
    echo" <input type='submit' value='VER LA RUTA DE HOY' >";
    echo"</form >";
    echo"</div>";

    echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
    echo"<font size='5' color='BLUE'> TODOS LOS CASOS ASOCIADOS</font>";
    echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=50' method='POST' >";
    echo "<input type='hidden' name='tecnico' value='$acceso'>";
    echo" <input type='submit' value='VER TODO LOS CASOS' >";
    echo"</form >";


    echo"</div>";

 

 }

if(($res['group_id']==13)||($res['group_id']==12)||($res['group_id']==14)) ///CONDICION DE SER supervisor o jefe o ventas

 

{
    echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
    echo"<tr bgcolor=#ffffff>";
    echo"<font size='5' color='BLUE'>BUSCANDO POR CLIENTE </font>";
    echo"</tr>";
//VA A SELECCIONA USUARIO

  echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=29' method='POST' >";
  echo"RUT del cliente:  "."<input type='text' name='rut-destino' />";
  echo" <input type='submit' value='PROCESA EL RUT' >";
  echo"</form >";
  echo"</div>";
  echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
  echo"<tr bgcolor=#ffffff>";
  echo"<font size='5' color='BLUE'>BUSCANDO POR CASO ASOCIADO</font>";
  echo"</tr>";
  echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=29' method='POST' >";
  echo" Orden de Servicio N°:  "."<input type='text' name='orden_servicio' />";
    echo"<input type='submit' value='Buscar por OS' >";
  echo"</form >";
  echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=29' method='POST' >";
  echo" RUT DEL CLIENTE SOLICITANTE N°:  "."<input type='text' name='rut_cliente' />";
  echo"<input type='submit' value='Buscar por RUT de cliente' >";
  echo"</form >";
  echo"</div>";
 
            echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
             echo"<font size='5' color='BLUE'>VER LA RUTA</font>";
             echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=38' method='POST' >";
             echo "<input type='hidden' name='user' value='$acceso'>";
             echo"Selecciona la fecha de la ruta: "."<input type='date' name='fecha_ruta'>"." Ejemplo:(2016/03/21)" ;
             echo" <input type='submit' value='VER LA RUTA DE ESE DIA' >";
              echo"</form >";
            echo"</div>";
                         
                         
      echo"<div style='padding: 5px; margin: 10px 0; border: 1px solid #ccc; background-color: #f8fdbb;'>";
      // SELECCIONA POR TECNICO
      echo"<tr bgcolor=#ffffff>";
      echo"<font size='5' color='BLUE'>BUSCANDO POR TECNICO </font>";
      echo"</tr>";
    
      $sql = "SELECT name,id FROM jos_users";
      $result = $conn->query($sql);
        echo"<form action='http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=29' method='POST' >";
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

 

 

 

 

}

 

}

 

         else{

                 echo "<script language='JavaScript'>";

                 echo "alert ('NO ES UN USUARIO CON ACCESO A ESTOS MÓDULOS !',200)";

                 echo"</script>";

 

                 echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.kerigmaservice.com/home'>";

             }

 

 

 

///comienza el script propio del artículo

 

?>

 {/source}