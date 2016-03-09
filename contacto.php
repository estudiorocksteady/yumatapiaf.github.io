<form action="enviar.php" method="post">
  Nombre:
  <input type="text" name="nombre" value="" />
  Email:
  <input type="text" name="email" value="" />
  Teléfono:
  <input type="text" name="telefono" value="" />
  Mensaje:
  <input type="text" name="mensaje" value="" />
  <input type="submit" value="Enviar" />
</form>
<!-- Notificación al usuario (El div se encuentra oculto hasta recibir la variable envio con valor ok) -->
<?php if($_GET[‘envio’] == ’ok’){ ?>
<div id="mensaje_para_usuario">El mensaje ha sido enviado correctamente. </div>
<?php } ?>
