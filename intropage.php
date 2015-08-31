<?php
session_start();
if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
} else {
?>
 <header><meta charset='utf-8'></header>
<div id="welcome">
 <h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
</div>
 
<?php
}
?>
