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
	$tag=$_POST['etiqueta'];
	$ruta=$_POST['ruta'];
	$sentencia = "SELECT t.id_tags,t.nombre_tags FROM tags t WHERE t.nombre_tags='".$tag."'";
	$resultados = mysql_query($sentencia, $conexion) or die("Error en query: ".mysql_error());
	
	
// Check connection

	//SI NO EXISTE LA ETIQUETA LA CREAMOS Y LA AÑADIMOS A IMG_TAGS
	if (mysql_num_rows($resultados)==0){
			$sql = "INSERT INTO tags (nombre_tags)
VALUES ('".$tag."')";
	mysql_query($sql, $conexion) or die("Error en query1: ".mysql_error());

mysql_close($conexion);
	$conexion = mysql_connect($servidor,$user,$pw);
	mysql_select_db($bd, $conexion);
	mysql_set_charset('utf8');

		
		$sentencia = "SELECT i.id,t.id_tags FROM tags t,imagenes i WHERE t.nombre_tags='".$tag."' AND i.ruta='".$ruta."'";
	$resultados = mysql_query($sentencia, $conexion) or die("Error en query2: ".mysql_error());

	while ($fila = mysql_fetch_array($resultados)) {
		$tagid = $fila['id_tags'];
		$imgid = $fila['id'];

	}
		
			$sentencia = "INSERT INTO img_tags (id_img,id_tags) VALUES (".$imgid.",".$tagid.")";

	mysql_query($sentencia, $conexion) or die("Error en query3: ".mysql_error());


			
			
		}
	
	
	//SI NO COMPROBAMOS QUE LA ETIQUETA NO EXISTE EN ESA IMAGEN. SI NO EXISTE LA AÑADIMOS A IMG_TAGS Y SI SI EXISTE MANDAMOS UN JSON
	else{
		$tagid=1;
		$imgid =1;
					while ($fila = mysql_fetch_array($resultados)) {
		$tagid = $fila['id_tags'];
	
	}
$sentencia = "SELECT nombre_tags FROM tags t,imagenes i,img_tags it WHERE t.nombre_tags='".$tag."' AND i.ruta='".$ruta."' AND it.id_img=i.id AND it.id_tags=t.id_tags";
	$resultados = mysql_query($sentencia, $conexion) or die("Error en query2: ".mysql_error());
	if (mysql_num_rows($resultados)==0){


			$sentencia = "INSERT INTO img_tags (id_img,id_tags) 
SELECT i.id, t.id_tags FROM imagenes i,tags t
WHERE i.ruta='".$ruta."' AND t.id_tags='".$tagid."'; ";
mysql_query($sentencia, $conexion) or die("Error en query5: ".mysql_error());

		}
		else{		
			while ($fila = mysql_fetch_array($resultados)) {
		$salida = $fila['nombre_tags'];
	}
		echo $salida;
		
	}
	

	}
}
	


	
	

?>