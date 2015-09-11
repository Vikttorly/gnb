<?php
	$con = mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('gnb',$con)or die(mysql_error());

$ci = $_POST['ci'];
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

if(isset($_POST['enviar_editar_persona'])){

	if ($_POST['cedula']) {
		$sql = "UPDATE personas SET cedula='$cedula' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['nombres']) {
		$sql = "UPDATE personas SET nombres='$nombres' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['apellidos']) {
		$sql = "UPDATE personas SET apellidos='$apellidos' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['fecha_nacimiento']) {
		$sql = "UPDATE personas SET fecha_nacimiento='$fecha_nacimiento' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['lugar_nacimiento']) {
		$sql = "UPDATE personas SET lugar_nacimiento='$lugar_nacimiento' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['sexo']) {
		$sql = "UPDATE personas SET sexo='$sexo' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['alias']) {
		$sql = "UPDATE personas SET alias='$alias' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['ocupacion']) {
		$sql = "UPDATE personas SET ocupacion='$ocupacion' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['nacionalidad']) {
		$sql = "UPDATE personas SET nacionalidad='$nacionalidad' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['estado_civil']) {
		$sql = "UPDATE personas SET estado_civil='$estado_civil' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['descripcion']) {
		$sql = "UPDATE personas SET descripcion='$descripcion' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['direcciones']) {
		$sql = "UPDATE personas SET direcciones='$direcciones' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['antecedentes']) {
		$sql = "UPDATE personas SET antecedentes='$antecedentes' WHERE cedula='$ci'";
		mysql_query($sql) or die(mysql_error());
	}

	if ($_POST['foto']){

	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 10000;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){

			$extension = end(explode('.', $_FILES["imagen"]["name"]));
			$nombrefichero = time();
			$foto = $nombrefichero . '.'.$extension;
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], "C:/xampp/htdocs/gnb/agregar/imagenes/" . $foto);	 
			$sql = "UPDATE personas SET foto='$foto' WHERE cedula='$ci'";
			mysql_query($sql) or die(mysql_error());
			} 
		}
	}



?>