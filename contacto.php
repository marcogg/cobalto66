<?php

if(isset($_POST['email'])) {
  
   //ini_set( 'display_errors', 1 );
   //error_reporting( E_ALL );
  
      // EDIT THE 2 LINES BELOW AS REQUIRED
      $email_to = "ivan.vazquez@metropolis.mx";
      $email_subject = "Prospecto de venta - Cobalto 66 ";
  
      function died($error) {
          // your error code can go here
          echo "We are very sorry, but there were error(s) found with the form you submitted. ";
          echo "These errors appear below.<br /><br />";
          echo $error."<br /><br />";
          echo "Please go back and fix these errors.<br /><br />";
          die();
      }
  
  
      // validation expected data exists
      if(!isset($_POST['name']) ||
          !isset($_POST['email']) ||
          !isset($_POST['telephone'])) {
          died('Lo sentimos, pero parece que hay un error con la forma.');       
      }
  
      
  
      $name = $_POST['name']; // required
      $email = $_POST['email']; // required
      $telephone = $_POST['telephone']; // not required
      $comment = $_POST['comment']; // required
  
      $error_message = "";
      $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  
      if(!preg_match($email_exp,$email)) {
          $error_message .= 'El correo no es válido.<br />';
      }
      
      $string_exp = "/^[A-Za-z .'-]+$/";
      
      if(!preg_match($string_exp,$name)) {
          $error_message .= 'El nombre no es válido.<br />';
      }
      
  //   if(strlen($cita) < 2) {
  //     $error_message .= 'La cita no es válida.<br />';
  //   }
  
    if(strlen($error_message) > 0) {
      died($error_message);
    }
  
      $email_message = "Enviado desde PÁGINA WEB:\n\n ";
  
      
      function clean_string($string) {
        //return $string;
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
      }
  
      
  
      $email_message .= "Nombre: ".clean_string($name)."\n ";
      $email_message .= "Correo: ".clean_string($email)."\n" ;
      $email_message .= "Teléfono: ".clean_string($telephone)."\n ";
      $email_message .= "Mensaje: ".clean_string($comment)."\n ";
  
  /* create email headers* /
  $headers = "MIME-Version: 1.0   " ;
 $headers .= "Content-type:text/plain;charset=UTF-8 ; " ;

 // More headers
 $headers .= 'From: '.$email ."  ";
 $headers .= 'Cc: myboss@example.com'." "  ;
  //$headers = 'From: '.$email;
  /*'Reply-To: '.$email."\r\n" ., $headers
  'X-Mailer: PHP/' . phpversion();*/
  //echo $email_message;
  $headers = array(
    'From: Cobalto 66 <ventas@metropolis.com.mx>',
    'Content-Type:text/plain;charset=UTF-8',
    'CC:info@cobalto66.mx'
);
$headers = implode("\n", $headers);
  $res=mail($email_to, $email_subject, $email_message,$headers); 
  if (!$res) {
    $errorMessage = error_get_last()['message'];
    echo $errorMessage;
  }else{
    echo "Gracias por contactarnos, espera una respuesta pronto";
  }
}
else{
  echo "Error";
}
?>