<?php
$name       = $_POST['name'];
$phone      = $_POST['phone'];
$qty        = $_POST['qty'];
if (!empty($name) && !empty($phone) && !empty($qty)) {
    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "";
    $mail->Password = "";
    $mail->setFrom('damianijr@gmail.com', 'José Antonio Damiani Júnior');
    $mail->addAddress('damianijr@gmail.com');
    $mail->Subject = "[Confirmação casamento] $name";
    $mail->msgHTML("O convidado $name confirmou a presença de $qty pessoa(s), telefone de contato: $phone.");
    if ($mail->send()) {
        header("HTTP/1.1 200 OK");
        exit();
    }
}
header("HTTP/1.1 500 Internal Server Error");
?>
