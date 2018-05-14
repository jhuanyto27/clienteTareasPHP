<?php
    $correo = $_POST['email'];
    $password = $_POST['pass'];
    
    $docente = array('correo' => $correo, 'password' => $password);

    $url = "http://localhost/php/rest/alumnos/login";
 
$conexion = curl_init();
 
$envio = json_encode($docente);
 
 
 
curl_setopt($conexion, CURLOPT_URL,$url);
 
// --- Datos que se van a enviar por POST.
 
curl_setopt($conexion, CURLOPT_POSTFIELDS,$envio);
 
// --- Cabecera incluyendo la longitud de los datos de envio.
 
curl_setopt($conexion, CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
 
curl_setopt($conexion, CURLOPT_RETURNTRANSFER,true);

// --- Petición POST.
 
curl_setopt($conexion, CURLOPT_POST, 1);
 
// --- HTTPGET a false porque no se trata de una petición GET.
 
curl_setopt($conexion, CURLOPT_HTTPGET, FALSE);
 
// -- HEADER a false.
 
curl_setopt($conexion, CURLOPT_HEADER, FALSE);
 
$respuesta=curl_exec($conexion);

// --- Respuesta.
 
$respuesta=curl_exec($conexion);
//print_r($respuesta);
$data = json_decode($respuesta,true);
//print_r($data);




curl_close($conexion);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente</title>
</head>
<body>
<h1>Los datos del ingreso son:</h1>
Nombre:<input type="text_area"  size= "15" read_only="read_only" name="nombre" value="<?php echo $data['alumno']['nombre'] ?>" readonly><br>
Apellido:<input type="text_area"  size= "15" read_only="read_only" name="apellido" value="<?php echo $data['alumno']['apellido'] ?>" readonly><br>
Carrera:<input type="text_area"  size= "15" read_only="read_only" name="carrera" value="<?php echo $data['alumno']['carrera'] ?>" readonly><br>
Password:<input type="text_area"  size= "70" read_only="read_only" size= "70" name="passwprd" value="<?php echo $data['alumno']['password'] ?>" readonly><br>
Clave Api:<input type="text_area"  size= "35" read_only="read_only" size= "35" name="clave" value="<?php echo $data['alumno']['claveApi'] ?>" readonly><br>


<h3>Recursos</h3>

<input type="button" value="Materias" onclick="location.href = 'materias/materias.php?clave=<?php echo $data['alumno']['claveApi'] ?>'"><br>
        <input type="button" value="Profesores" onclick="location.href = 'profesores/profesores.php?clave=<?php echo $data['alumno']['claveApi'] ?>'"><br>
        <input type="button" value="Tareas" onclick="location.href = 'tareas/tareas.php?clave=<?php echo $data['alumno']['claveApi'] ?>'"><br>

    </body>
</html>