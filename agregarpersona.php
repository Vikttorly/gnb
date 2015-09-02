<?php

$cedula = $_POST['cedula'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$lugar_nacimiento = $_POST['lugar_nacimiento'];
$sexo = $_POST['sexo'];
$alias = $_POST['alias'];
$ocupacion = $_POST['ocupacion'];
$nacionalidad = $_POST['nacionalidad'];
$estado_civil = $_POST['estado_civil'];
$descripcion = $_POST['descripcion'];
$direcciones = $_POST['direcciones'];
$antecedentes = $_POST['antecedentes'];


/*
echo $cedula.'<br>';
echo $nombres.'<br>';
echo $apellidos.'<br>';
echo $fecha_nacimiento.'<br>';
echo $lugar_nacimiento.'<br>';
echo $sexo.'<br>';
echo $alias.'<br>';
echo $ocupacion.'<br>';
echo $nacionalidad.'<br>';
echo $estado_civil.'<br>';
echo $descripcion.'<br>';
echo $direcciones.'<br>';
echo $antecedentes.'<br>';
*/



//Ingresando datos a la Base de Datos.

if (isset($_POST['Enviar'])){
$con = mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('gnb',$con)or die(mysql_error());
$sql=("INSERT INTO personas(cedula,nombres,apellidos,alias,nacionalidad,fecha_nacimiento,lugar_nacimiento,sexo,foto,ocupacion,estado_civil,descripcion,direcciones,antecedentes) VALUES ('$cedula','$nombres','$apellidos','$alias','$nacionalidad','$fecha_nacimiento','$lugar_nacimiento','$sexo','$foto','$ocupacion','$estado_civil','$descripcion','$direcciones','$antecedentes')");
mysql_query($sql)or die(mysql_error());
echo "Se han introducido los valores";
}
?>