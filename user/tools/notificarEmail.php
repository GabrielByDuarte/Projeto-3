
<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
$mail = new PHPMailer(true);
 
try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp-relay.sendinblue.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'gabrielfonsecaduarte53@gmail.com';
	$mail->Password = 'OM63WZCanhJqGIXy';
	$mail->Port = 587;
 
	$mail->setFrom('gabrielfonsecaduarte53@gmail.com');
	$mail->addAddress($email); 
 
	$mail->isHTML(true);
	$mail->Subject = 'Produto comprado!';
	$mail->Body = "<br>".$nomeEmail."<br><br>".$quantidadeEmail." ".$produtoEmail." comprado com sucesso!<br>Valor: R$".$valorEmail."";
	$mail->AltBody = "<br>".$nomeEmail."<br><br>".$quantidadeEmail." ".$produtoEmail." comprado com sucesso!<br>Valor: R$".$valorEmail."";
 
	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}