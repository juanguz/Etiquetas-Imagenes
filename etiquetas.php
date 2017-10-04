<?php 
$DEPURACION = false;
if ($DEPURACION) echo "<html><head></head><body>";
if(isset($_GET['ruta'])) {
	//Consulta a BD para extraer los titulos que contengan 'patron'
	$servidor = 'localhost';
	$bd = 'cliente';
	$user = 'root';
	$pw = '';
	$conexion = mysql_connect($servidor,$user,$pw);
	mysql_select_db($bd, $conexion);
	mysql_set_charset('utf8');
	$img=$_GET['ruta'];
	$sentencia = "SELECT t.nombre_tags FROM imagenes i,tags t,img_tags it WHERE i.ruta='".$img."' AND i.id=it.id_img AND it.id_tags=t.id_tags";
	$resultados = mysql_query($sentencia, $conexion) or die("Error en query: ".mysql_error());

	//Devolver al cliente los resultados de la sentencia
	
	//
	//VERSIÓN JSON "elegante"
	//
	while ($fila = mysql_fetch_array($resultados)) {
		$salida[] = $fila['nombre_tags'];
	}
	if ($DEPURACION) echo "Resultados en JSON: ";
	echo json_encode($salida);
}	
	
if ($DEPURACION) echo "</body></html>";
?>










