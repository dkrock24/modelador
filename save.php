<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_factura";
$html = addslashes($_POST['template_html']);

$conexion = mysqli_connect($host, $user, $pass, $db);
$query = "INSERT INTO `db_factura`.`sys_factura_template` (`factura_name`, `factura_description`, `factura_tipe_documento`, `factura_cliente`, `factura_template`, `factura_lineas`, `factura_estatus`) VALUES ('Ticket', 'Demo', 'F', 'Telus', '".$html."', '10', '1')";
mysqli_query($conexion, $query )or die(mysqli_error());

?>