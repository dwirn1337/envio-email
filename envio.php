<?php

/*
  * Coded By: Dwirn1337
  * Twitter: @dwirn1337
  * Telegram: @dwirn1337
  * GitHub: github.com/dwirn1337
  * WhatsApp: +55 11 94380-9900
  *
  * ATENÇÃO:
  * Faça as configurações abaixo!
  *
  */

require_once("class.phpmailer.php");
require_once("class.smtp.php");

$login = "seuemail@gmail.com";
$senha = "suasenha";

$nome = "Dwirn1337";
$from = "mail@gmail.com";
$assunto = "Assunto aqui";
$email_destino = "email-destino@mail.com";

$conteudo = "
Aqui vai o conteudo
em html <font color=blue>Dwirn</font>
ou em plano mesmo, normal
";

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPSecure = "tls";
$mail->Username = $login;
$mail->Password = $senha;
$mail->From = $login;
$mail->FromName = $nome;
$mail->addAddress($email_destino);
$mail->Subject = $assunto;
$mail->IsHTML(true);
$mail->CharSet = "UTF-8";
$mail->Body = $conteudo;

if ($mail->Send()){

   echo "E-mail enviado";

} else {

   $h = implode("\n",array( "From:  $nome <$from>","Return-Path: $from","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8","X-Mailer: PHP/".phpversion()));

   if (mail ($email_destino, $assunto, nl2br($conteudo), $h)){

      echo "E-mail enviado";

   } else {

      echo "Erro ao enviar e-mail";

   }

}

?>
