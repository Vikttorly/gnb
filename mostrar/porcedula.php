<?php 
	$cedula = $_POST['cedula'];

	$con = mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('gnb',$con)or die(mysql_error());

	$result = mysql_query("SELECT * FROM personas WHERE cedula='$cedula'");
	$row = mysql_fetch_row($result);

?>
<br>
<form action="mostrar/actualizar.php" method="post" enctype="multipart/form-data" autocomplete="off"> 
	<table class="formulario">
		
			<input type="hidden" name="ci" value="<?php echo $row[0]; ?>">
			<tr><td>Cedula</td><td class="f1"><?php echo $row[0];?></td><td><input type="text" name="cedula" placeholder="Nueva Cédula" id="editar_cedula"></td></tr>
			<tr><td>Nombres</td><td class="f1"><?php echo $row[1];?></td><td><input type="text" name="nombres" placeholder="Nuevos Nombre" id="editar_nombres"></td></tr>
			<tr><td>Apellidos</td><td class="f1"><?php echo $row[2];?></td><td><input type="text" name="apellidos" placeholder="Nuevos Apellidos" id="editar_apellidos"></td></tr>
			<tr><td>Alias</td><td class="f1"><?php echo $row[6];?></td><td><input type="text" name="alias" placeholder="Nuevo Alias" id="editar_alias"></td></tr>
			<tr><td>Nacionalidad</td><td class="f1"><?php echo $row[8];?></td><td><input type="text" name="nacionalidad" placeholder="Nueva Nacionalidad" id="editar_nacionalidad"></td></tr>
			<tr><td>Fecha de Nacimiento</td><td class="f1"><?php echo $row[3];?></td><td><input type="date" name="fecha_nacimiento" placeholder="Nueva Fecha Nacimiento" id="editar_fecha_nacimiento"></td></tr>
			<tr><td>Lugar de Nacimiento</td><td class="f1"><?php echo $row[9];?></td><td><input type="text" name="lugar_nacimiento" placeholder="Nuevo Lugar Nacimiento" id="editar_lugar_nacimiento"></td></tr>
			<tr><td>Sexo</td><td class="f1"><?php echo $row[4];?></td><td><select name="sexo" id="editar_sexo">
					<option >Seleccione</option>
					<option value="M">Masculino</option>
					<option value="F">Femenino</option>
			</select></tr>
			<tr><td>Ocupacion</td><td class="f1"><?php echo $row[7];?></td><td><input type="text" name="ocupacion" placeholder="Nueva Ocupacion" id="editar_ocupacion"></td></tr>
			<tr><td>Estado civil</td><td class="f1"><?php echo $row[10];?></td><td><select name="estado_civil" id="editar_estado_civil">
					<option >Seleccione</option>
					<option value="SOLTERO">Soltero</option>
					<option value="CASADO">Casado</option>
					<option value="DIVORCIADO">Divorciado</option>
					<option value="VIUDO">Viudo</option>
					</select></td></tr>
			<tr><td>Descripcion</td><td class="f1"><?php echo $row[11];?></td><td><textarea name="descripcion" id="editar_descripcion"></textarea></td></tr>
			<tr><td>Direcciones</td><td class="f1"><?php echo $row[12];?></td><td><textarea name="direcciones" id="editar_direcciones"></textarea></td></tr>
			<tr><td>Antecedentes</td><td class="f1"><?php echo $row[13];?></td><td><textarea name="antecedentes" id="editar_antecedentes"></textarea></td></tr>
			<tr><td>Foto</td><td class="f1"><img src='http://localhost/gnb/agregar/imagenes/<?php echo $row[5]?>' width='150' height='150'></td><td><input type="file" name="imagen" id="editar_foto"></td></tr>
			<tr><td>Esta persona se añadió el día: </td><td class="f1"><?php echo $row[14];?></td></tr>
			<input type="button" id="editar_persona" value="Editar Persona"><input type="button" id="cancelar_editar_persona" value="Cancelar Edicion"><input type="submit" name="enviar_editar_persona" id="enviar_editar_persona" value="Enviar Edicion">
			</form>
			</table>

<!--Boton para activar ediccion-->

<script>

$("#cancelar_editar_persona").hide();
$("#enviar_editar_persona").hide();
$("#editar_cedula").hide();
$("#editar_nombres").hide();
$("#editar_apellidos").hide();
$("#editar_alias").hide();
$("#editar_nacionalidad").hide();
$("#editar_fecha_nacimiento").hide();
$("#editar_lugar_nacimiento").hide();
$("#editar_sexo").hide();
$("#editar_ocupacion").hide();
$("#editar_estado_civil").hide();
$("#editar_descripcion").hide();
$("#editar_direcciones").hide();
$("#editar_antecedentes").hide();
$("#editar_foto").hide();



$(document).ready(function(){
    $("#editar_persona").click(function(){
        $("#cancelar_editar_persona").fadeToggle("slow");
        $("#enviar_editar_persona").fadeToggle("slow");
        $("#editar_persona").fadeToggle(0);
        $("#editar_cedula").fadeToggle("slow");
        $("#editar_nombres").fadeToggle("slow");
        $("#editar_apellidos").fadeToggle("slow");
        $("#editar_alias").fadeToggle("slow");
        $("#editar_nacionalidad").fadeToggle("slow");
        $("#editar_fecha_nacimiento").fadeToggle("slow");
        $("#editar_lugar_nacimiento").fadeToggle("slow");
        $("#editar_sexo").fadeToggle("slow");
        $("#editar_ocupacion").fadeToggle("slow");
        $("#editar_estado_civil").fadeToggle("slow");
        $("#editar_descripcion").fadeToggle("slow");
        $("#editar_direcciones").fadeToggle("slow");
        $("#editar_antecedentes").fadeToggle("slow");
        $("#editar_foto").fadeToggle("slow");   
    });
});
</script>

<!--Boton para cancelar ediccion-->

<script>

$(document).ready(function(){
    $("#cancelar_editar_persona").click(function(){
        $("#cancelar_editar_persona").fadeToggle(0);
        $("#enviar_editar_persona").fadeToggle(0);
        $("#editar_persona").fadeToggle("slow");
        $("#editar_cedula").fadeToggle("slow");
        $("#editar_nombres").fadeToggle("slow");
        $("#editar_apellidos").fadeToggle("slow");
        $("#editar_alias").fadeToggle("slow");
        $("#editar_nacionalidad").fadeToggle("slow");
        $("#editar_fecha_nacimiento").fadeToggle("slow");
        $("#editar_lugar_nacimiento").fadeToggle("slow");
        $("#editar_sexo").fadeToggle("slow");
        $("#editar_ocupacion").fadeToggle("slow");
        $("#editar_estado_civil").fadeToggle("slow");
        $("#editar_descripcion").fadeToggle("slow");
        $("#editar_direcciones").fadeToggle("slow");
        $("#editar_antecedentes").fadeToggle("slow");
        $("#editar_foto").fadeToggle("slow");  
    });
});
</script>




