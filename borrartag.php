<?php 
$DEPURACION = false;
if ($DEPURACION) echo "<html><head></head><body>";
if(isset($_GET['etiqueta']) && isset($_GET['ruta']) ) {
	//Consulta a BD para extraer los titulos que contengan 'patron'
	$servidor = 'localhost';
	$bd = 'cliente';
	$user = 'root';
	$pw = '';
	$conexion = mysql_connect($servidor,$user,$pw);
	mysql_select_db($bd, $conexion);
	mysql_set_charset('utf8');
	$tag=$_GET['etiqueta'];
	$ruta=$_GET['ruta'];
	$sentencia = "SELECT i.id,t.id_tags FROM imagenes i,tags t WHERE t.nombre_tags='".$tag."' AND i.ruta='".$ruta."'";
	$resultados = mysql_query($sentencia, $conexion) or die("Error en query: ".mysql_error());
		while ($fila = mysql_fetch_array($resultados)) {
		$idim = $fila['id'];
		$idtag = $fila['id_tags'];
		}
			$sentencia = "DELETE FROM img_tags WHERE id_tags='".$idtag."' AND id_img='".$idim."'";
	$resultados = mysql_query($sentencia, $conexion) or die("Error en query: ".mysql_error());
	}
