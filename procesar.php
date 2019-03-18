<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_factura";

$conexion = mysqli_connect($host, $user, $pass, $db);
$query = "select * from sys_factura_template";
$db = mysqli_query($conexion, $query )or die(mysqli_error());

$dataas = array(array('descripcion'=>'TV Sony', 'precioU'=>780.50, 'totalU'=>780.50,'x'=>780.50,'Ingreso'=>780.50), 
				array('descripcion'=>'DVD Sony', 'precioU'=>89 ,'totalU'=>89,'x'=>89,'Ingreso'=>89) );

foreach ($db as $value) {
	$data = $value['factura_template'];	
	eval($data);
}

?>


