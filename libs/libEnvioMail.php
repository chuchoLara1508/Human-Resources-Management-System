<?php 

    require_once('modelo/PHPMailer/src/PHPMailer.php');
    require_once('modelo/PHPMailer/src/SMTP.php');
    require_once('modelo/PHPMailer/src/Exception.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function envio($corEnv,$usuEnv,$corEnt,$usuEnt,$sub,$msg){
        $bandera=false;
        $mail= new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host='smtp.office365.com';
        $mail->SMTPAuth=true;
        $mail->Username='jesusantoniolaral19.ce15@dgeti.sems.gob.mx';
        $mail->Password='Zbjc9818';
        $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port=587;
        $mail->setFrom($corEnv,$usuEnv);
        $mail->addAddress($corEnt,$usuEnt);
        $mail->isHTML(true);
        $mail->Subject=$sub;
        $mail->Body=$msg;
        if($mail->send()){
            $bandera=true;
        }
        return $bandera;
    }

?>