<?php
require("classes/estudiante.class.php");
$Estudiante = new Estudiante();

$resultado = $Estudiante->obtenerEstudiante();

header("contect - type : Application/json");
echo(json_encode($resultado));
?>