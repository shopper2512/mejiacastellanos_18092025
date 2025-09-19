<?php
require("classes/estudiante.class.php");
$Estudiante = new Estudiante();

$resultado = $Estudiante->obtenerEstudiantes();

header("Contect-Type: Application/json");
echo(json_encode($resultado));
?>