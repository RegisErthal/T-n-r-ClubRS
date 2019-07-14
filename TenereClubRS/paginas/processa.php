<?php
//Variáveis

require 'mailer/PHPMailer.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'regis.erthal.93@gmail.com';
$mail->Password = 'capitao93';
$mail->Port = 587;
$mail->setFrom('regis.erthal.93@gmail.com');
$mail->addReplyTo('regis.erthal.93@gmail.com');
$mail->addAddress($_POST['email'], $_POST['nome']);
$mail->isHTML(true);
$mail->Subject = "Contato pelo Site";
$mail->Body    = $_POST['msg'];
if(!$mail->send()) {
  echo 'Não foi possível enviar a mensagem.<br>';
  echo 'Erro: ' . $mail->ErrorInfo;
} else {
  echo 'Mensagem enviada.';
}
 /*
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$opcoes = $_POST['escolhas'];
$mensagem = $_POST['msg'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');
//enviar
   
  // emails para quem será enviado o formulário
  $emailenviar = "seuemail@seudominio.com.br";
  $destino = $emailenviar;
  $assunto = "Contato pelo Site";
 
  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From: $nome <$email>';
  //$headers .= "Bcc: $EmailPadrao\r\n";
   
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
  $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "";
  }
?>