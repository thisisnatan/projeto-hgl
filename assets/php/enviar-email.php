<?php
header('Content-Type: text/html; charset=UTF-8');
$nomeCompleto =  ($_POST['name']);
$email =  ($_POST['email']);
$tel =  ($_POST['tel']);
$interesse =  ($_POST['interesse']);
$mensagem = ($_POST['mensagem']);


               require 'PHPMailerAutoload.php';


$mail = new PHPMailer;
$mail->setLanguage('pt_br');
$mail->CharSet = 'UTF-8';

                      
//$mail->SMTPDebug = 3;                 // Habilita modo debug na saída
$mail->isSMTP();                        // Setar o uso do SMTP
$mail->Host = 'seu servidor smtp aqui';      // Servidor smtp
$mail->SMTPAuth = true;                 // Habilita a autenticação do form
$mail->Username = 'seu email aqui';       // Conta de e-mail que realizará o envio
$mail->Password = 'senha do email aqui';       // Senha da conta de e-mail
//$mail->SMTPSecure = 'tls';            // Habilitar uso do TLS (plesk 11.5 ou utilizando contas do Gmail)
$mail->Port = 587;                       // Porta de conexão
$mail->From = 'seu email aqui';             // e-mail From deve ser o mesmo de "username" (contadeEmail)
$mail->FromName = 'LEAD SITE HGL';                 // Nome que será exibido ao receber a mensagem.
$mail->addAddress('seu email aqui', 'distinatario'); // Destinatário


$conteudo_mail = "Você recebeu uma mensagem de $nomeCompleto ($email) ($tel) ($interesse):
<br><br>
Mensagem:<br>
$mensagem";


$mail->isHTML(true);   // Set email format to HTML



$mail->Subject = 'FALE CONOSCO';  //Assunto da Mensagem
$mail->Body    = $conteudo_mail; // Corpo da mensagem




if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Mensagem enviada com sucesso !';
}



?>