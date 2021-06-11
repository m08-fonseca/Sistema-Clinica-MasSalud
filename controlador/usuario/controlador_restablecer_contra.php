<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    // $contraactual = htmlspecialchars($_POST['contrasena'],ENT_QUOTES,'UTF-8');
    $contraactual=hash('sha256', $_POST["random"]);
    $contra = password_hash($_POST['contrasena'],PASSWORD_DEFAULT,['cost'=>10]);
    $consulta = $MU->Restablecer_Contra($email,$contra);
    if($consulta == "1"){
       
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {

            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );

            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'mj.fonsecach@gmail.com';                     //SMTP username
            $mail->Password   = 'APRIL0801';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients cambiar mi correo por el de la clinica
            $mail->setFrom('mj.fonsecach@gmail.com', 'Mas Salud Slim');
            $mail->addAddress($email);     //Add a recipient
            // Indica para quien va dirigido   

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Restablecer Password';
            $mail->Body    = 'Su contraseña fue restablecida<br>Nueva contraseña: <b>'.$contraactual.'</b>';
           
            $mail->send();
            echo '1';
        } catch (Exception $e) {
            echo "0";
        }
    }else{
        echo '2';
    }
    
    
    
?>