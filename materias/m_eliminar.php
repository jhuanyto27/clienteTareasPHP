<?php
$clave = $_POST['clave'];


$id = $_POST['id'];

$url = "http://localhost/php/rest/materias/". $id;

$header = array(
    'Authorization:' . "'". $clave . "'"
); 
 
$conexion = curl_init();
 
 
 
curl_setopt($conexion, CURLOPT_URL,$url);
 
// --- Cabecera
 
curl_setopt($conexion, CURLOPT_HTTPHEADER,$header);
 
// --- Petición DELETE.
 
curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, "DELETE");
 
curl_setopt($conexion, CURLOPT_RETURNTRANSFER, 1);
 
 
 
 
$respuesta=curl_exec($conexion);
//print_r ($respuesta);
$data = json_decode($respuesta,true);
 
?>

Estado:<input type="text_area"  size= "35"  name="clave" value="<?php echo $data['estado']; ?>" readonly> <br>
Mensaje:<input type="text_area"  size= "35"  name="clave" value="<?php echo $data['mensaje']; ?>" readonly> <br>