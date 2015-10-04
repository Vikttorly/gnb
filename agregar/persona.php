<html>
	<head>
		<title>Introducir persona</title>
		<meta charset='utf-8'>
		<link href="/gnb/css/estilo.css" rel="stylesheet" type="text/css">
		<link href="/gnb/css/menu.css" rel="stylesheet" type="text/css">
	</head>
<body>

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


//SUBIR IMAGEN





$con = mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('gnb',$con)or die(mysql_error());

if (isset($_POST['Enviar'])){

	if ($_FILES["imagen"]["error"] > 0){
	echo "ha ocurrido un error";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 10000;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "imagenes/" . $_FILES['imagen']['name'];
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$extension = end(explode('.', $_FILES["imagen"]["name"]));
			$nombrefichero = time();
			$foto = $nombrefichero . '.'.$extension;
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], "imagenes/" . $foto);	 
	} 
}



	$result = mysql_query("SELECT * FROM personas WHERE cedula='$cedula'");
	$row = mysql_fetch_row($result);
	if($row[0] > 1){
	echo "
	<center><font color='white' size='16'>El usuario ya existe</font></center>

	";
	}else{
		$sql=("INSERT INTO personas(cedula,nombres,apellidos,alias,nacionalidad,fecha_nacimiento,lugar_nacimiento,sexo,foto,ocupacion,estado_civil,descripcion,direcciones,antecedentes,fecha_adicion) VALUES ('$cedula','$nombres','$apellidos','$alias','$nacionalidad','$fecha_nacimiento','$lugar_nacimiento','$sexo','$foto','$ocupacion','$estado_civil','$descripcion','$direcciones','$antecedentes',NOW())");
		mysql_query($sql)or die(mysql_error());
		echo "Se han introducido los valores";
	}
}
?>

</body>
</html>