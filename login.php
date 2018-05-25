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
 


// --- Respuesta.
 
$respuesta=curl_exec($conexion);
//print_r($respuesta);
$data = json_decode($respuesta,true);
//print_r($data);

if($data['estado']=="1"){
    echo"<h2>Datos de ingreso </h2>";
    echo"Nombre:";
    echo "<input type=\"text\" name=\"estado\" value=\"".$data['alumno']['nombre']."\">";
    echo "<br>";
    echo"Apellido:";
    echo "<input type=\"text\" size=\"25\" name=\"mensaje\" value=\"".$data['alumno']['apellido']."\">";
    echo "<br>";
    echo"Carrera:";
    echo "<input type=\"text\" name=\"estado\" value=\"".$data['alumno']['carrera']."\">";
    echo "<br>";
    echo"Password:";
    echo "<input type=\"text\" size=\"70\" name=\"mensaje\" value=\"".$data['alumno']['password']."\">";
    echo "<br>";
    echo"Clave Api:";
    echo "<input type=\"text\"  size=\"35\" name=\"estado\" value=\"".$data['alumno']['claveApi']."\">";
    echo "<br>";
    echo "<br>";
    echo"<h3>Recursos</h3>";
    echo "<br>";
    echo "<br>";
    echo"<form action ='materias/materias.php' method='post'>";
    echo"Authorization:";
    echo "<input type=\"text\" size=\"35\" name=\"clave1\" value=\"".$data['alumno']['claveApi']."\">";
    echo "<input type=\"submit\" value=\"Materias\">";
    echo "</form>";
    echo "<br>";
    echo "<br>";
    echo"<form action ='profesores/profesores.php' method='post'>";
    echo"Authorization:";
    echo "<input type=\"text\" size=\"35\" name=\"clave2\" value=\"".$data['alumno']['claveApi']."\">";
    echo "<input type=\"submit\" value=\"Profesores\">";
    echo "</form>";
    echo "<br>";
    echo "<br>";
    echo"<form action ='tareas/tareas.php' method='post'>";
    echo"Authorization:";
    echo "<input type=\"text\" size=\"35\" name=\"clave3\" value=\"".$data['alumno']['claveApi']."\">";
    echo "<input type=\"submit\" value=\"Tareas\">";
    echo "</form>";
}else{
    
    echo"Estado:";
    echo "<input type=\"text\" name=\"estado\" value=\"".$data['estado']."\">";
    echo "<br>";
    echo"Mensaje:";
    echo "<input type=\"text\" size=\"30\" name=\"mensaje\" value=\"".$data['mensaje']."\">";
}

curl_close($conexion);


?>





       
