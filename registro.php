<?php
//registro.php
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $password = $_POST['pass'];
    $carrera = $_POST['carrera'];


$alumno = array('nombre' => $nombre, 'apellido' => $apellido,
     'carrera' => $carrera , 'password' => $password ,
      'correo' => $correo);
      $json = json_encode($alumno);

      $url = "http://localhost/php/rest/alumnos/registro";
 
      $conexion = curl_init();
       
      
       
       
       
      curl_setopt($conexion, CURLOPT_URL,$url);
       
      // --- Datos que se van a enviar por POST.
       
      curl_setopt($conexion, CURLOPT_POSTFIELDS,$json);
       
      // --- Cabecera incluyendo la longitud de los datos de envio.
       
      curl_setopt($conexion, CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
       
      // --- Petición POST.
       
      curl_setopt($conexion, CURLOPT_POST, 1);
       
      curl_setopt($conexion, CURLOPT_RETURNTRANSFER, 1);

      // --- Respuesta.
       
      $respuesta=curl_exec($conexion);
     // print_r ($respuesta);
       
      $data = json_decode($respuesta,true);
       


?>

Estado:<input type="text_area"  size= "35"  name="clave" value="<?php echo $data['estado']; ?>" readonly> <br>
Mensaje:<input type="text_area"  size= "35"  name="clave" value="<?php echo $data['mensaje']; ?>" readonly> <br>


