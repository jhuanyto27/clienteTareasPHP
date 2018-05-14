<?php
//m_registrar
$clave = $_POST['clave'];

$id = $_POST['id'];
$nombre = $_POST['nombre'];

//echo $id;

$materia = array('nombre' => $nombre,'clave' => $id);
      $json = json_encode($materia);

      $url = "http://localhost/php/rest/materias/registro";
 
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
       
      curl_setopt($conexion, CURLOPT_POST, 1);
       
      curl_setopt($conexion, CURLOPT_RETURNTRANSFER, 1);

      // --- Respuesta.
       
      $respuesta=curl_exec($conexion);
     //print_r ($respuesta);
       
      $data = json_decode($respuesta,true);
       


?>

Estado:<input type="text_area"  size= "35"  name="clave" value="<?php echo $data['estado']; ?>" readonly> <br>
Mensaje:<input type="text_area"  size= "35"  name="clave" value="<?php echo $data['mensaje']; ?>" readonly> <br>
Clave:<input type="text_area"  size= "35"  name="clave" value="<?php echo $data['Clave']; ?>" readonly> <br>
