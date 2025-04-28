<?php
$host = '';
$usuario = '';
$contraseña = '';
$base_de_datos = '';

$conn = new mysqli($host, $usuario, $contraseña, $base_de_datos);

if ($conn->connect_error) {
    die("<div class='error'>Conexión fallida: " . $conn->connect_error . "</div>");
}

$nombre_cliente = $_POST['nombre_cliente'];
$email_cliente = $_POST['email_cliente'];
$productos = $_POST['productos'];
$total = $_POST['total'];

$sql = "INSERT INTO compras (nombre_cliente, email_cliente, productos, total) 
        VALUES ('$nombre_cliente', '$email_cliente', '$productos', '$total')";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesando Compra</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
        }
        .mensaje {
            background-color: #fff;
            padding: 30px;
            margin: auto;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        .exito {
            color: green;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .detalles {
            font-size: 18px;
            color: #333;
        }
    </style>
    <meta http-equiv="refresh" content="5;url=index.php">
</head>
<body>
    <div class="mensaje">
        <?php
        if ($conn->query($sql) === TRUE) {
            echo "<div class='exito'>¡Compra registrada con éxito!</div>";

            $to = $email_cliente;
            $subject = "Confirmación de Compra - Drapona";
            
            $message = "
            <html>
            <head>
              <style>
                body {
                  font-family: Arial, sans-serif;
                  background-color: #f9f9f9;
                  color: #333;
                }
                .container {
                  background-color: #ffffff;
                  padding: 20px;
                  border-radius: 8px;
                  width: 90%;
                  max-width: 600px;
                  margin: 0 auto;
                  box-shadow: 0 0 10px rgba(0,0,0,0.15);
                }
                h1 {
                  color: #ff6600;
                }
                .detalle {
                  margin-top: 20px;
                  font-size: 16px;
                }
                .footer {
                  margin-top: 30px;
                  font-size: 12px;
                  color: #888;
                }
              </style>
            </head>
            <body>
              <div class='container'>
                <h1>¡Gracias por tu compra, $nombre_cliente!</h1>
                <p class='detalle'>
                  <strong>Detalles de tu compra:</strong><br><br>
                  <b>Productos:</b> $productos<br>
                  <b>Total:</b> $$total
                </p>
                <div class='footer'>
                  Drapona - ¡Que disfrutes tu compra!
                </div>
              </div>
            </body>
            </html>
            ";
            
            $headers  = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: Drapona <no-reply@drapona.com>\r\n";
            if (@mail($to, $subject, $message, $headers)) {
                echo "<div class='detalles'>Correo de confirmación enviado a tu correo electrónico.</div>";
            } else {
                echo "<div class='detalles'>Compra registrada, pero no se pudo enviar el correo de confirmación.</div>";
            }

            echo "<div class='detalles'>Serás redirigido a la página principal en unos segundos...</div>";

        } else {
            echo "<div class='error'>Error al registrar la compra: " . $conn->error . "</div>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
