<?php
// Se incluye el archivo donde esta la funcion
include "conexiondb.php";


// Se guardan los datos de los inputs de form nuevo.php en una variable por cada input para poder 
// usarlos despues
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];

// Se estable la conexion y se la guarda en una variable para poder usarla
$mysqli = conexiondb();

// Se ejecuta el insert en la tabla usuarios y se guarda el resultado en la variable guardar.
$guardar = $mysqli->query("INSERT INTO usuarios (nombre,apellido,dni) VALUES ('$nombre','$apellido','$dni')");

// Esta funcion sirve para hacer una redireccion hacia una pagina, en este caso queres que luego de guardar
// sea redireccionado el usuario al index para ver el nuevo registro
header('Location: index.php');