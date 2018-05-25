<?php
$clave = $_POST['clave3'];
//echo $clave;

$url = "http://localhost/php/rest/tareas/";
 

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

echo " <h1>Todas las Tareas</h1>";

if($data['estado']=="OK"){
echo "<table border='1px' >";
echo "<tr>";
echo "  <th> IdTarea </th>";
echo "  <th> Titulo  </th>";
echo "  <th> Descripcion </th>";
echo "  <th> Fecha de Entrega  </th>";
echo "  <th> Unidad </th>";
echo "  <th> IdAlumno </th>";


for ($i = 0; $i < count($data['mensaje']); $i++) {
    echo "<tr>";
    echo "<td>" . ($data['mensaje'][$i]['idTarea']);
    echo "<td>" . ($data['mensaje'][$i]['titulo']);
    echo "<td>" . ($data['mensaje'][$i]['descripcion']);
    echo "<td>" . ($data['mensaje'][$i]['fecha_entrega']);
    echo "<td>" . ($data['mensaje'][$i]['unidad']);
    echo "<td>" . ($data['mensaje'][$i]['idAlumno']);
    echo "</tr>";
}
echo "</tr>";
echo "</table>";

}else{
    echo "<table border='1px' >";
    echo "<tr>";
    echo "  <th> IdTarea </th>";
    echo "  <th> Titulo  </th>";
    echo "  <th> Descripcion </th>";
    echo "  <th> Fecha de Entrega  </th>";
    echo "  <th> Unidad </th>";
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
    <title>Tareas</title>
</head>
<body>

<h2>Opciones Tareas</h2>
    <br>
    <h3>Registrar nueva Tarea</h3>
<form action="t_registrar.php" method="post">
Autorization:<input type="text_area"  size= "35"  name="clave" value="<?php echo $clave; ?>" readonly> <br>   
IdTarea:<input type="number"  size= "5"  name="id" > <br>
Titulo:<input type="text_area"  size= "35"  name="titulo" > <br> 
Descripcion:<input type="text_area"  size= "35"  name="descripcion" > <br> 
Fecha:<input type="text_area"  size= "35"  name="fecha" value="2018-02-03 00:00:00" > <br> 
Unidad:<input type="text_area"  size= "35"  name="unidad" > <br> 
<input type="submit" value="Registrar">
    </form>
    <br>
<h3>Buscar</h3>
<form action="t_buscar.php" method="post">
 Autorization:<input type="text_area"  size= "35"  name="clave" value="<?php echo $clave; ?>" readonly> <br>
 ID a Buscar: <input type="number" size="5" name="id" required>
 <input type="submit" value="Buscar">
    </form>
    <br><br>

<h3>Modificar</h3>
<form action="t_modificar.php" method="post">
 Autorization:<input type="text_area"  size= "35" read_only="read_only" name="clave" value="<?php echo $clave; ?>" readonly> <br>
 ID a Modificar: <input type="number" size="5" name="id" required>
 <p>Datos a modificar</p>
 Titulo:<input type="text_area"  size= "35"  name="titulo" > <br> 
Descripcion:<input type="text_area"  size= "35"  name="descripcion" > <br> 
Fecha:<input type="text_area"  size= "35"  name="fecha" value="2018-02-03 00:00:00" > <br> 
Unidad:<input type="text_area"  size= "35"  name="unidad" > <br> 
 <input type="submit" value="Modificar">
    </form>
<br><br>
<h3>Eliminar</h3>
<form action="t_eliminar.php" method="post">
 Autorization:<input type="text_area"  size= "35" read_only="read_only" name="clave" value="<?php echo $clave; ?>" readonly> <br>
 ID a Eliminar: <input type="number" size="5" name="id" required>
 <input type="submit" value="Eliminar">
    </form>    
    

</body>
</html>

