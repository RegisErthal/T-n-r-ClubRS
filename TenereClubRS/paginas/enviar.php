<?php
//Variáveis

require("mailer/PHPMailer.php");
require("mailer/SMTP.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'regis.erthal.93@gmail.com';
$mail->Password = 'capitao93';
$mail->Port = 587;
$mail->setFrom('regis.erthal.93@gmail.com');
$mail->addReplyTo('regis.erthal.93@gmail.com');
$mail->addAddress('regis.erthal.93@gmail.com', $_POST['nome']);
$mail->isHTML(true);
$mail->Subject = "Contato pelo Site";
$mail->Body    = $_POST['msg']." <br><br>Enviada por ".$_POST['nome']." - E-mail: ".$_POST['email'];
if(!$mail->send()) {
  echo 'Não foi possível enviar a mensagem.<br>';
  echo 'Erro: ' . $mail->ErrorInfo;
} else {
  echo 'Mensagem enviada.';
}

?>