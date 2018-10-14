<?php 

require 'mailer/PHPMailerAutoload.php';

//configuração do servidor
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'inscricoes.fccr.sjc@gmail.com'; //conta do servidor de emails
$mail->Password = 'fccrsjc2017'; //senha dessa conta
$mail->Port = 587;

//configuração das contas 
$mail->setFrom('inscricoes.fccr.sjc@gmail.com.br'); //conta que vai receber os emails
$mail->addReplyTo('no-reply@gmail.com.br');
$mail->addAddress('deniel_16@live.com'); //conta que vai receber os emails

//mensagem a ser enviada
$mail->isHTML(true);
$mail->Subject = 'Mensagem de teste';
$mail->Body    = 'Este é o conteúdo da mensagem em <b>HTML!</b>';

/* ================= Opcionais como anexo e corpo alternativo ===================
$mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';
$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');
*/

//envia os emails
if(!$mail->send()) {
  header('Location: /views/failedmail.php?'. $mail->ErrorInfo);
} else {
  echo 'Mensagem enviada.';
}

//debugger
$mail->SMTPDebug = 3;
$mail->Debugoutput = 'html';
$mail->setLanguage('pt');
