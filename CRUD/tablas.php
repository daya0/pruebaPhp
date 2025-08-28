<?php 

$host = "localhost";
$user = "root";
$pass = "root";
$db = "factura"

$conn = new mysqli($host, $user, $pass );

    if ($conn->connect_error){
        die("Error al conectar: ". $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $db";
    if ($conn->query($sql) === TRUE) {
        echo " BD '$db' creada" ;        
    } else {
        echo "Error:". $conn->error;
    }

$sql = 
    "CREATE TABLE cliente (
    id INT (2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (50) NOT NULL,
    apellido VARCHAR (50) NOT NULL,
    correo VARCHAR (50) NOT NULL,
)";

    //$conn->select_db($db);

$sql = 
    "CREATE TABLE producto (
    id INT (2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (50) NOT NULL,
    precio DECIMAL (5,2) NOT NULL,
)";
$sql =
    "CREATE TABLE factura_cabecera (
    id INT (2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    fecha DATE NOT NULL,

    FOREING KEY (id_cliente) REFERENCES cliente(id)
)";

$sql =

    "CREATE TABLE factura_detalle (
    id INT (2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_factura INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,

    FOREING KEY (id_factura) REFERENCES factura_cabecera(id),
    FOREING KEY (id_producto) REFERENCES producto(id), 
)";
?>

