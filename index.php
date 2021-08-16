<?php
// Conecto mi form con el server a traves de los name
$nombre = $_POST['nombre'];
$mail = $_POST['email'];
$consulta = $_POST['consulta'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

// Como funciona con el server
$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

// Como me a llegar el cuerpo del mail a mi, o sea lo que la gente escribió en el form
$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "El asunto es: " . $asunto . " \r\n";
$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'victoria.pbatista@gmail.com'; // El mail a donde van a llegar los mensajes
$asunto = 'Mensaje de mi sitio web';

mail($para, $asunto, utf8_decode($mensaje), $header);

// Mensaje de verificación
$msjCorreo = "Nombre: $nombre\n E-Mail: $mail\n Mensaje:\n $mensaje";
 
if ($_POST['submit']) {
if (mail ($para, $asunto, $msjCorreo)) {
echo 'El mensaje se ha enviado';
} else {
echo 'Falló el envio';
}
}

header('Location:index.html');

?>