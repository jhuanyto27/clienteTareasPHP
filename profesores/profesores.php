<?php
$clave = $_POST['clave2'];
//echo $clave;

$url = "http://localhost/php/rest/profesores/";
 

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

//print_r($respuesta);
$data = json_decode($respuesta,true);

//print_r ($data['mensaje'][0]['idMateria']);
//print_r ($data['mensaje']);
//echo count($data['mensaje']);

if($data['estado']=="OK"){
echo " <h1>Todos los profesores</h1>";

echo "<table border='1px' >";
echo "<tr>";
echo "  <th> IdProfesor </th>";
echo "  <th> Nombre  </th>";
echo "  <th> Apellido </th>";
echo "  <th> Correo  </th>";
echo "  <th> IdAlumno </th>";


for ($i = 0; $i < count($data['mensaje']); $i++) {
    echo "<tr>";
    echo "<td>" . ($data['mensaje'][$i]['idProfesor']);
    echo "<td>" . ($data['mensaje'][$i]['nombre']);
    echo "<td>" . ($data['mensaje'][$i]['apellido']);
    echo "<td>" . ($data['mensaje'][$i]['correo']);
    echo "<td>" . ($data['mensaje'][$i]['idAlumno']);
    echo "</tr>";
}
echo "</tr>";
echo "</table>";

}else{
    echo " <h1>Todos los profesores</h1>";

    echo "<table border='1px' >";
    echo "<tr>";
    echo "  <th> IdProfesor </th>";
    echo "  <th> Nombre  </th>";
    echo "  <th> Apellido </th>";
    echo "  <th> Correo  </th>";
    echo "  <th> IdAlumno </th>";  
    echo "</tr>";
echo "</table>";
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profesores</title>
</head>
<body>

<h2>Opciones Profesores</h2>
    <br>
    <h3>Registrar nuevo Profesor</h3>
<form action="p_registrar.php" method="post">
Autorization:<input type="text_area"  size= "35"  name="clave" value="<?php echo $clave; ?>" readonly> <br>   
IdProfesor:<input type="number"  size= "5"  name="id" > <br>
Nombre:<input type="text_area"  size= "35"  name="nombre" > <br> 
Apellido:<input type="text_area"  size= "35"  name="apellido" > <br> 
Correo:<input type="email"  size= "35"  name="correo" > <br> 
<input type="submit" value="Registrar">
    </form>
    <br>
<h3>Buscar</h3>
<form action="p_buscar.php" method="post">
 Autorization:<input type="text_area"  size= "35"  name="clave" value="<?php echo $clave; ?>" readonly> <br>
 ID a Buscar: <input type="number" size="5" name="id" required>
 <input type="submit" value="Buscar">
    </form>
<br><br>
<h3>Modificar</h3>
<form action="p_modificar.php" method="post">
 Autorization:<input type="text_area"  size= "35" read_only="read_only" name="clave" value="<?php echo $clave; ?>" readonly> <br>
 ID a Modificar: <input type="number" size="5" name="id" required><br>
 <p>Datos a modificar</p>
 Nombre:<input type="text_area"  size= "35"  name="nombre" > <br> 
 Apellido:<input type="text_area"  size= "35"  name="apellido" > <br> 
Correo:<input type="email"  size= "35"  name="correo" > <br> 
 <input type="submit" value="Modificar">
    </form>

<h3>Eliminar</h3>
<form action="p_eliminar.php" method="post">
 Autorization:<input type="text_area"  size= "35" read_only="read_only" name="clave" value="<?php echo $clave; ?>" readonly> <br>
 ID a Eliminar: <input type="number" size="5" name="id" required>
 <input type="submit" value="Eliminar">
    </form>    
    

</body>
</html>

