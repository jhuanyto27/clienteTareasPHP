<?php


$clave = $_POST['clave'];


$id = $_POST['id'];


$url = "http://localhost/php/rest/profesores/". $id;

$header = array(
    'Authorization:' . "'". $clave . "'"
); 
 
$conexion = curl_init();
 
 
 
// --- Url
 
curl_setopt($conexion, CURLOPT_URL,$url);
 
// --- Petición GET.
 
curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
 
// --- Cabecera HTTP.
 
curl_setopt($conexion, CURLOPT_HTTPHEADER,$header);
 
// --- Para recibir respuesta de la conexión.
 
curl_setopt($conexion, CURLOPT_RETURNTRANSFER, 1);
 
 
 
// --- Respuesta
 
$respuesta=curl_exec($conexion);
//print_r ($respuesta);

$data = json_decode($respuesta,true);
//print_r($data['mensaje']);
//print_r($data);
if($data['estado']=="OK"){
    echo"IdProfesor:";
    echo "<input type=\"text\" name=\"idmateria\" value=\"".$data['mensaje'][0]['idProfesor']."\">";
    echo "<br>";
    echo"Nombre:";
    echo "<input type=\"text\" name=\"nombre\" value=\"".$data['mensaje'][0]['nombre']."\">";
    echo "<br>";
    echo"Apellido:";
    echo "<input type=\"text\" name=\"idmateria\" value=\"".$data['mensaje'][0]['apellido']."\">";
    echo "<br>";
    echo"Correo:";
    echo "<input type=\"text\" name=\"nombre\" value=\"".$data['mensaje'][0]['correo']."\">";
    echo "<br>";
    echo"IdAlumno:";
    echo "<input type=\"text\" name=\"idalumno\" value=\"".$data['mensaje'][0]['idAlumno']."\">";
    echo "<br>";
}else{
    echo"Estado:";
    echo "<input type=\"text\" name=\"estado\" value=\"".$data['estado']."\">";
    echo "<br>";
    echo"Mensaje:";
    echo "<input type=\"text\" size=\"25\" name=\"mensaje\" value=\"".$data['mensaje']."\">";
}


?>
