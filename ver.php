<?php 
	$cedula = $_POST['cedula'];

	$con = mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('gnb',$con)or die(mysql_error());

	$result = mysql_query("SELECT * FROM personas WHERE cedula='$cedula'");
	$row = mysql_fetch_row($result);

	

	echo "
	<table border='1'>
	<tr>
		<td>$row[0]</td>
		<td>$row[1]</td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		<td>$row[4]</td>
		<td>$row[5]</td>
		<td>$row[6]</td>
		<td>$row[7]</td>
		<td><img src='imagenes/$row[8]' width='150' height='150'></td>
		<td>$row[9]</td>
		<td>$row[10]</td>
		<td>$row[11]</td>
		<td>$row[12]</td>
		<td>$row[13]</td>
	</tr>
	</table>
	";
?>