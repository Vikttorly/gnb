<?php
    $page = $_POST['page'];  // Almacena el numero de pagina actual
    $limit = $_POST['rows']; // Almacena el numero de filas que se van a mostrar por pagina
    $sidx = $_POST['sidx'];  // Almacena el indice por el cual se hará la ordenación de los datos
    $sord = $_POST['sord'];  // Almacena el modo de ordenación

    if(!$sidx) $sidx =1;

    // Se crea la conexión a la base de datos
    $conexion = new mysqli("localhost","root","","gnb");

    // Se hace una consulta para saber cuantos registros se van a mostrar
    $result = $conexion->query("SELECT COUNT(*) AS count FROM personas");

    // Se obtiene el resultado de la consulta
    $fila = $result->fetch_array();
    $count = $fila['count'];

    //En base al numero de registros se obtiene el numero de paginas
    if( $count >0 ) {
	$total_pages = ceil($count/$limit);
    } else {
	$total_pages = 0;
    }
    if ($page > $total_pages)
        $page=$total_pages;

    //Almacena numero de registro donde se va a empezar a recuperar los registros para la pagina
    $start = $limit*$page - $limit; 

    //Consulta que devuelve los registros de una sola pagina
    $consulta = "SELECT cedula, nombres, apellidos, alias, nacionalidad, fecha_nacimiento, lugar_nacimiento, sexo, foto, ocupacion, estado_civil, descripcion, direcciones, antecedentes FROM personas ORDER BY $sidx $sord LIMIT $start , $limit;";

    $result = $conexion->query($consulta);

    // Se agregan los datos de la respuesta del servidor
    $respuesta->page = $page;
    $respuesta->total = $total_pages;
    $respuesta->records = $count;
    $i=0;
    while( $fila = $result->fetch_assoc() ) {
        $respuesta->rows[$i]['id']=$fila["cedula"];
        $respuesta->rows[$i]['cell']=array($fila["cedula"],$fila["nombres"],$fila["apellidos"],$fila["alias"],$fila["nacionalidad"],$fila["fecha_nacimiento"],$fila["lugar_nacimiento"],$fila["sexo"],$fila["foto"],$fila["ocupacion"],$fila["estado_civil"],$fila["descripcion"],$fila["direcciones"],$fila["antecedentes"]);
        $i++;
    }

    // La respuesta se regresa como json
    echo json_encode($respuesta);
?>