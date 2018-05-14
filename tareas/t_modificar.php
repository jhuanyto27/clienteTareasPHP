<?php
$clave = $_POST['clave'];

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$unidad = $_POST['unidad'];


//echo $fecha;

$tarea = array('titulo' => $titulo,'idTarea' => $id,
'descripcion' => $descripcion,'fecha' => $fecha,'unidad' => $unidad);
      $json = json_encode($tarea);

      $url = "http://localhost/php/rest/tareas/".$id;
 
      $conexion = curl_init();
       
      $header = array(
        'Authorization:' . "'". $clave . "'",
        'Content-Type: application/json'
    );       
       
       
       
      curl_setopt($conexion, CURLOPT_URL,$url);
       
      // --- Datos que se van a enviar por POST.
       
      curl_setopt($conexion, CURLOPT_POSTFIELDS,$json);
       
      // --- Cabecera incluyendo la longitud de los datos de envio.
       
      curl_setopt($conexion, CURLOPT_HTTPHEADER,$header);
       
      // --- Petición POST.
       
      curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, "PUT");
       
      curl_setopt($conexion, CURLOPT_RETURNTRANSFER, 1);

      // --- Respuesta.
       
      $respuesta=curl_exec($conexion);
     //print_r ($respuesta);
       
      $data = json_decode($respuesta,true);
       


?>
Estado:<input type="text_area"  size= "35"  name="clave" value="<?php echo $data['estado']; ?>" readonly> <br>
Mensaje:<input type="text_area"  size= "35"  name="clave" value="<?php echo $data['mensaje']; ?>" readonly> <br>
