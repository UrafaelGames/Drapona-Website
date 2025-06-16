<?php
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$carrito = json_decode($_POST['carrito'], true);

// Conexión a la base de datos
$conn = new mysqli('localhost', 'admin', 'nouy', 'drapona');

if ($conn->connect_error) {
  die("❌ Conexión fallida: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO pedidos (nombre, correo, direccion, telefono, productos) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nombre, $correo, $direccion, $telefono, json_encode($carrito));

if ($stmt->execute()) {
  echo "✅ Compra registrada correctamente.";
} else {
  echo "❌ Error al registrar la compra.";
}

$stmt->close();
$conn->close();
?>
