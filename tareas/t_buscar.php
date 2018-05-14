<?php


$clave = $_POST['clave'];


$id = $_POST['id'];


$url = "http://localhost/php/rest/tareas/". $id;

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
    echo"IdTarea:";
    echo "<input type=\"text\" name=\"idmateria\" value=\"".$data['mensaje'][0]['idTarea']."\">";
    echo "<br>";
    echo"Titulo:";
    echo "<input type=\"text\" name=\"nombre\" value=\"".$data['mensaje'][0]['titulo']."\">";
    echo "<br>";
    echo"Descripcion:";
    echo "<input type=\"text\" name=\"idmateria\" value=\"".$data['mensaje'][0]['descripcion']."\">";
    echo "<br>";
    echo"Fecha:";
    echo "<input type=\"text\" name=\"nombre\" value=\"".$data['mensaje'][0]['fecha_entrega']."\">";
    echo "<br>";
    echo"Unidad:";
    echo "<input type=\"text\" name=\"nombre\" value=\"".$data['mensaje'][0]['unidad']."\">";
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
