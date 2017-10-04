<?php 
$DEPURACION = false;
if ($DEPURACION) echo "<html><head></head><body>";
if(isset($_GET['nombre_tag'])) {
	//Consulta a BD para extraer los titulos que contengan 'patron'
	$servidor = 'localhost';
	$bd = 'cliente';
	$user = 'root';
	$pw = '';
	$conexion = mysql_connect($servidor,$user,$pw);
	mysql_select_db($bd, $conexion);
	mysql_set_charset('utf8');
	$tag=$_GET['nombre_tag'];
	$sentencia = "SELECT i.ruta FROM imagenes i,tags t,img_tags it WHERE t.nombre_tags='".$tag."' AND t.id_tags=it.id_tags AND it.id_img=i.id";
	$resultados = mysql_query($sentencia, $conexion) or die("Error en query: ".mysql_error());
}
	//Devolver al cliente los resultados de la sentencia
	
	//
	//VERSIÓN JSON "elegante"
	//
	while ($fila = mysql_fetch_array($resultados)) {
		$salida[] = $fila['ruta'];
	}
	if ($DEPURACION) echo "Resultados en JSON: ";
	echo json_encode($salida);
	
	//
	//VERSIÓN XML
	//
	/*
	$xml = new DOMDocument('1.0', 'UTF-8');
	$root = $xml->appendChild($xml->createElement("listado"));
	if (!$DEPURACION) header('Content-type: text/xml');

	while($fila = mysql_fetch_array($resultados)){
		$node = $xml->createElement("municipio",$fila['nombreMun']);
		$fila = $root->appendChild($node);
	}
	if ($DEPURACION) echo "<h1>Resultados de la consulta</h1>";
	if ($DEPURACION) echo $sentencia;
	if ($DEPURACION) echo "<h1>XML generado</h1>";
	echo $xml->saveXML();*/
/*
	}
else {
	echo "No has pasado el parámetro 'mensaje'";
}
*/
if ($DEPURACION) echo "</body></html>";
?>


