<?php
session_start();
if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
} else {
?>
Bienvenido <?php echo $_SESSION['session_username'];?>!
 
<?php
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

<div class="parent2">
  <div class="test1"></div>
  <div class="test2"></div>
  <div class="test3"></div>
  <div class="test4" id="test4"></div>
  <div class="test5" id="test5"></div>
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

<br><br><br><br><br><br>
<div id="contenido4" align="center">
	<form action="agregarpersona.php" method="post">
		<h3>Cedula <input type="text" name="cedula" class="tb10"></h3>
		<h3>Nombres <input type="text" name="nombres"></h3>
		<h3>Apellidos <input type="text" name="apellidos"></h3>
		<h3>Fecha de Nacimiento <input type="text" name="fecha_nacimiento"></h3><br><br>
		<h3>Lugar de Nacimiento <input type="text" name="lugar_nacimiento"></h3>
		<h3>Sexo <select name="sexo">
					<option value="m">Masculino</option>
					<option value="f">Femenino</option>
			</select></h3>
		<h3>Foto <input type="text" name="foto"></h3>
		<h3>Alias <input type="text" name="alias"></h3>
		<h3>Ocupacion <input type="text" name="ocupacion"></h3><br><br>
		<h3>Nacionalidad <input type="text" name="nacionalidad"></h3>
		<h3>Estado civil <select name="estado_civil">
					<option value="Soltero">Soltero</option>
					<option value="Casado">Casado</option>
					<option value="Divorciado">Divorciado</option>
					<option value="Viudo">Viudo</option>
					</select></h3>
		<h3>Descripcion <textarea name="descripcion"></textarea></h3>
		<h3>Direcciones <textarea name="direcciones"></textarea></h3>
		<h3>Antecedentes <textarea name="antecedentes"></textarea></h3>
		<input type="submit" name="Enviar">
	</form>
</div>


<script type="text/javascript">

$("#contenido4").hide();

  $(document).ready(function(){
   $("#test5").click(function () {
      $("#contenido4").each(function() {
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
</html