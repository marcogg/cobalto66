<?php

if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias</bold>
$email_to = "ivan.vazquez@metropolis.mx, ventas@metropolis.com.mx, info@cobalto66.mx";
$email_subject = "Descarga Ficha Cobalto66.mx";

// Aquí se deberían validar los datos ingresados por el usuario</bold>
if(!isset($_POST['name']) ||

!isset($_POST['email']) ||
!isset($_POST['phone'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Descarga Ficha Cobalto66.mx:\n\n";
$email_message .= "Nombre: " . $_POST['name'] . "\n";

$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Teléfono: " . $_POST['phone'] . "\n";



// Ahora se envía el e-mail usando la función mail() de PHP</bold>
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "¡El formulario se ha enviado con éxito!";
}
?>
 
<!-- include your own success html here -->

<script type="text/javascript">
  window.location.href = "https://www.cobalto66.mx/ficha.pdf";
</script>


