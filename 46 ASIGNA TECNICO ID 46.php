{source}
<?php
$nueva=$_POST['domicilio'];
$articulo=$_POST['articulo'];
$id_caso=$_POST['id_caso'];
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$domicilio=$_POST['domicilio'];
$empleado=$_POST['user'];


echo"<form action=http://www.kerigmaservice.com/home/index.php?option=com_content&view=article&layout=edit&id=34 method=POST >";
echo"NOTA DEL AGENDAMIENTO"."<textarea name='nota' rows='2' cols='10'></textarea>";
ECHO "<BR>";
echo" SELECCIONA EL TÉCNICO : "."<select name='tecnico' METHOD='POST'>";
echo"<option value='0'>Seleccione un técnico</option>";
echo" <option value='34351'>Fabian</option>";
echo" <option value='34350'>Juan</option>";
echo"</select>";

echo" <input type=hidden name='id_caso' value='$id_caso' >";
echo" <input type=hidden name='id_domicilio' value='$domicilio' >";
echo" <input type=hidden name='responsable' value='$empleado' >";
echo" <input type=hidden name='estatus' value='Programada' >";
echo"</select>";
ECHO "<BR>";
echo"fecha"."<input type='date' name='fecha_agendamiento'>"." Ejemplo:(2016/03/21)" ;
ECHO "<BR>";
echo"<input type='submit' value='PROGRAMAR'/>";
echo"</form>";

?>
{/source}

 