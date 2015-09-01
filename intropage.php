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
  <div class="test1"><i class="fa fa-user fa-2x"></i></div>
  <div class="test2"><i class="fa fa-graduation-cap fa-2x"></i></div>
  <div class="test3"><i class="fa fa-code fa-2x"></i></div>
  <div class="test4"><i class="fa fa-envelope-o fa-2x"></i></div>
  <div class="mask2"><i class="fa fa-home fa-3x"></i></div>
</div>

<script type="text/javascript">
$(document).ready(function() {

  var active1 = false;
  var active2 = false;
  var active3 = false;
  var active4 = false;

    $('.parent2').on('mousedown touchstart', function() {
    
    if (!active1) $(this).find('.test1').css({'background-color': 'gray', 'transform': 'translate(0px,125px)'});
    else $(this).find('.test1').css({'background-color': 'dimGray', 'transform': 'none'}); 
     if (!active2) $(this).find('.test2').css({'background-color': 'gray', 'transform': 'translate(60px,105px)'});
    else $(this).find('.test2').css({'background-color': 'darkGray', 'transform': 'none'});
      if (!active3) $(this).find('.test3').css({'background-color': 'gray', 'transform': 'translate(105px,60px)'});
    else $(this).find('.test3').css({'background-color': 'silver', 'transform': 'none'});
      if (!active4) $(this).find('.test4').css({'background-color': 'gray', 'transform': 'translate(125px,0px)'});
    else $(this).find('.test4').css({'background-color': 'silver', 'transform': 'none'});
    active1 = !active1;
    active2 = !active2;
    active3 = !active3;
    active4 = !active4;
      
    });
});
</script>
</html>