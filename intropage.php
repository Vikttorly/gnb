<?php
$con = mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('gnb',$con)or die(mysql_error());

session_start();
if(!isset($_SESSION["session_username"])) {
 header("location:login.php");

} 
?>
<html>
<head>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link href="css/menu.css" rel="stylesheet" type="text/css">
		<meta charset='utf-8'>
		<title>Minerva</title>	
		
		 <script src="/gnb/js/jquery-1.11.3.js"></script>
	</head>
	<body>

<!--Menú Nº 1 y su contenido-->

<div class="parent1">
  <div class="test1" id="test1"></div>
  <div class="test2"></div>
  <div class="test3"></div>
  <div class="test4" id="test4"></div>
  <div class="test5" id="test5"></div>
  <div class="mask1"></div>
</div>

<script type="text/javascript">
$(document).ready(function() {

  var active1 = false;
  var active2 = false;
  var active3 = false;
  var active4 = false;
  var active5 = false;

    $('.parent1').on('mousedown touchstart', function() {
    
    if (!active1) $(this).find('.test1').css({'background-color': 'gray', 'transform': 'translate(-30px,125px)'});
    else $(this).find('.test1').css({'background-color': 'dimGray', 'transform': 'none'}); 
     if (!active2) $(this).find('.test2').css({'background-color': 'gray', 'transform': 'translate(30px,115px)'});
    else $(this).find('.test2').css({'background-color': 'darkGray', 'transform': 'none'});
      if (!active3) $(this).find('.test3').css({'background-color': 'gray', 'transform': 'translate(80px,80px)'});
    else $(this).find('.test3').css({'background-color': 'silver', 'transform': 'none'});
      if (!active4) $(this).find('.test4').css({'background-color': 'gray', 'transform': 'translate(120px,30px)'});
    else $(this).find('.test4').css({'background-color': 'silver', 'transform': 'none'});
   	  if (!active5) $(this).find('.test5').css({'background-color': 'gray', 'transform': 'translate(120px,-35px)'});
    else $(this).find('.test5').css({'background-color': 'silver', 'transform': 'none'});
    active1 = !active1;
    active2 = !active2;
    active3 = !active3;
    active4 = !active4;
    active5 = !active5;
      
    });
});
</script>

<!--Añadir fecha expediente-->
<!--Añadir serial motor-->

<!--Formulario para añadir personas-->


<br><br>
<div id="addpersonas" align="center">
<center><font color='white' size='16'>Añadir nueva persona</font></center>
<br><br><br>
	<form action="agregar/persona.php" method="post" autocomplete="off" enctype="multipart/form-data">

		<table class="formulario">
			<tr><td>Cedula</td><td><input type="text" name="cedula" onkeypress="return justNumbers(event);" maxlength="8" required="required"></td></tr>
			<tr><td>Nombres</td><td><input type="text" name="nombres" required="required"></td></tr>
			<tr><td>Apellidos</td><td><input type="text" name="apellidos" required="required"></td></tr>
			<tr><td>Alias</td><td><input type="text" name="alias"></td></tr>
			<tr><td>Nacionalidad</td><td><input type="text" name="nacionalidad"></td></tr>
			<tr><td>Fecha de Nacimiento</td><td><input type="date" name="fecha_nacimiento"></td></tr>
			<tr><td>Lugar de Nacimiento</td><td><input type="text" name="lugar_nacimiento"></td></tr>
			<tr><td>Sexo</td><td><select name="sexo" required="required">
					<option >Seleccione</option>
					<option value="M">Masculino</option>
					<option value="F">Femenino</option>
			</select></td></tr>
			<tr><td>Ocupacion</td><td><input type="text" name="ocupacion"></td></tr>
			<tr><td>Estado civil</td><td><select name="estado_civil">
					<option >Seleccione</option>
					<option value="SOLTERO">Soltero</option>
					<option value="CASADO">Casado</option>
					<option value="DIVORCIADO">Divorciado</option>
					<option value="VIUDO">Viudo</option>
					</select></td></tr>
			<tr><td>Descripcion</td><td><textarea name="descripcion"></textarea></td></tr>
			<tr><td>Direcciones</td><td><textarea name="direcciones"></textarea></td></tr>
			<tr><td>Antecedentes</td><td><textarea name="antecedentes"></textarea></td></tr>
			<tr><td>Foto</td><td><input type="file" name="imagen"></td></tr>
		</table>
		<input type="submit" name="Enviar">
	</form>
	<input type="submit" id="ocultaraddpersonas" value="Ocultar">
</div>

<!--Script para que el campo cédula solo acepte números-->

<script type="text/javascript">
	function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        }
</script>

<!--Ocultar div por boton OCULTAR addpersonas-->


<script type="text/javascript">

  $(document).ready(function(){
   $("#ocultaraddpersonas").click(function () {
      $("#addpersonas").each(function() {
        displaying = $(this).css("display");
        if(displaying == "block") {
          $(this).fadeOut('slow',function() {
           $(this).css("display","none");
          });
        } 
      });
    });
  });
  </script>


<!--Efecto para mostrar/ocultar formulario Añadir personas-->

<script type="text/javascript">

$("#addpersonas").hide();

  $(document).ready(function(){
   $("#test5").click(function () {
      $("#addpersonas").each(function() {
        displaying = $(this).css("display");
        if(displaying == "block") {
          $(this).fadeOut('slow',function() {
           $(this).css("display","none");
          });
        } else {
          $(this).fadeIn('slow',function() {
            $(this).css("display","block");
          });
        }
      });
    });
  });
  </script>

<!--Formulario para añadir Expediente-->

<div id="añadirexpediente" align="center">
	<form action="agregar/expediente.php" method="post" autocomplete="off" enctype="multipart/form-data">
			<?php
			setlocale(LC_ALL,"es_ES");
			$funcionario = $_SESSION["session_username"];
			$d = date('d');
			$dia = $d -1;
			$mes = date('m');
			$anio = date('Y');
			$fecha = ' hoy es: '.$dia.'/'.$mes.'/'.$anio;
			echo $funcionario;
			echo $fecha;
			?>
		<input type="submit" name="enviar">
	</form>
</div>

<!--Efecto para mostrar/ocultar formulario Añadir Expediente-->

<script type="text/javascript">

$("#añadirexpediente").hide();

  $(document).ready(function(){
   $("#test1").click(function () {
      $("#añadirexpediente").each(function() {
        displaying = $(this).css("display");
        if(displaying == "block") {
          $(this).fadeOut('slow',function() {
           $(this).css("display","none");
          });
        } else {
          $(this).fadeIn('slow',function() {
            $(this).css("display","block");
          });
        }
      });
    });
  });
  </script>


<!--Efectos para mostrar letras cuando el mouse esté ensima de menús y submenús-->


<!--Efecto para el menú add-->

<script>
$(document).ready(function(){
   $(".mask1").mouseenter(function(e){
       $("#tip1").fadeIn(500);
   });
   $(".mask1").mouseleave(function(e){
      $("#tip1").css("display", "none");
   });
})
</script>

<div class="tip" id="tip1">Abrir menú para añadir elementos</div>



<!--Menú nº 2 y su contenido-->



<div class="parent2">
  <div class="test6"></div>
  <div class="test7"></div>
  <div class="test8"></div>
  <div class="test9"></div>
  <div class="test10" id="test10"></div>
  <div class="mask2"></div>
</div>

<script type="text/javascript">
$(document).ready(function() {

  var active1 = false;
  var active2 = false;
  var active3 = false;
  var active4 = false;
  var active5 = false;

    $('.parent2').on('mousedown touchstart', function() {
    
    if (!active1) $(this).find('.test6').css({'background-color': 'gray', 'transform': 'translate(30px,125px)'});
    else $(this).find('.test6').css({'background-color': 'dimGray', 'transform': 'none'}); 
     if (!active2) $(this).find('.test7').css({'background-color': 'gray', 'transform': 'translate(-30px,115px)'});
    else $(this).find('.test7').css({'background-color': 'darkGray', 'transform': 'none'});
      if (!active3) $(this).find('.test8').css({'background-color': 'gray', 'transform': 'translate(-80px,80px)'});
    else $(this).find('.test8').css({'background-color': 'silver', 'transform': 'none'});
      if (!active4) $(this).find('.test9').css({'background-color': 'gray', 'transform': 'translate(-120px,30px)'});
    else $(this).find('.test9').css({'background-color': 'silver', 'transform': 'none'});
   	  if (!active5) $(this).find('.test10').css({'background-color': 'gray', 'transform': 'translate(-120px,-35px)'});
    else $(this).find('.test10').css({'background-color': 'silver', 'transform': 'none'});
    active1 = !active1;
    active2 = !active2;
    active3 = !active3;
    active4 = !active4;
    active5 = !active5;
      
    });
});
</script>


<!--Mostrando las personas agregadas-->

<script>
function realizaProceso(cedula){
        var parametros = {
                "cedula" : cedula
        };
        $.ajax({
                data:  parametros,
                url:   'mostrar/porcedula.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}
</script>

<div id="verpersonas" align="center">
<center><font color='white' size='16'>Buscar persona</font></center>
<br><br>
<input type="text" name="caja_texto" id="valor1" placeholder='Cédula' maxlength="8" onkeypress="return justNumbers(event);"> 
 
<input type="button" href="javascript:;" onclick="realizaProceso($('#valor1').val());return false;" value="Buscar" name="porcedula" >
 
<br/>
 
<span id="resultado"></span> 
</div>

 <!--Efecto para mostrar formulario Ver personas-->

<script type="text/javascript">

$("#verpersonas").hide();

  $(document).ready(function(){
   $("#test10").click(function () {
      $("#verpersonas").each(function() {
        displaying = $(this).css("display");
        if(displaying == "block") {
          $(this).fadeOut('slow',function() {
           $(this).css("display","none");
          });
        } else {
          $(this).fadeIn('slow',function() {
            $(this).css("display","block");
          });
        }
      });
    });
  });
  </script>

<script type="text/javascript">
	function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        }
</script>

</body>
</html