<?php 

// Recepción de info del formulario html
$nombre = htmlentities($_POST['nombre']);
$mensaje = htmlentities($_POST['mensaje']);
$telefono = $_POST['telefono'];
$email_usuario = strtolower($_POST['email']);

/* --> NOTA
        $_POST['nombre'] hace referencia al elemento html <input name="nombre" ...>
        htmlentities(); codifica los carateres para que no se generen errores de caracteres especiales
        strtolower convierte el texto en minúsculas
*/

// Se incluye clase phpmailer
require('class.phpmailer.php');

// Dirección donde debe llegar la consulta
$email_destino = 'destinatario@gmail.com'; 
$name = 'Formulario de Consulta';
$subject = 'Consulta desde sitio web';

/* --> NOTA
        Ésta es la parte del código que debe ser editada con los datos de nuestro cliente
*/

// Creación de objeto PHPMailer
$email = new PHPMailer();

// Configuración
$email->From         = $email_usuario;
$email->FromName     = $name;
$email->AddAddress($email_destino); 
$email->Subject     = $subject;
$email->AddReplyTo($email_destino,$subject);
$email->IsHTML(true); 

// Diseño HTML que llegará a la casilla del destinatario
$contenido = '<html><body>';
$contenido .= '<p><strong>Nombre: </strong>'.$nombre.'</p>';
$contenido .= '<p><strong>Email: </strong>'.$email_usuario.'</p>';
$contenido .= '<p><strong>Telefono: </strong>'.$telefono.'</p>';
$contenido .= '<p><strong>Consulta: </strong>'.nl2br($mensaje).'</p>';
$contenido .= '</body></html>';

/* --> NOTA
        Se puede ver el codigo con formato html.
        Se recomienda maquetar un diseño en tablas, no divs, ya que estos no son renderizados
        por la casillas de correo convencionales
*/

$email->Body = $contenido;

$email->Send();

echo '<meta http-equiv="refresh" content="0;url=contacto.php?envio=ok">';

/* --> NOTA
        Se redirige a la pagina donde está ubicado el formulario, con el agregado de una variable con valor ok
        Esto se recibe en el html para indicarle al usuario la efectividad del envío. Ej:

*/

?>
