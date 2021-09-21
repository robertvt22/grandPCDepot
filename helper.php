<?php

session_start();

function isLoggedIn() {
	return isset($_SESSION['autentificare']) && isset($_SESSION['autentificare']['email']) ;
}

function loginUser($email, $parola){
    include "mysql.php";
    $result = $db->query("SELECT * FROM utilizatori WHERE email='$email' AND parola='$parola'");
    if($result && $row = $result->fetch_assoc()) {
        $_SESSION['autentificare'] = $row;
        $_SESSION['id_user'] = $row['id_utilizator'];
        header("Location: index.php");
        return true;
    }
    unset($_SESSION['autentificare']);
	return false;
}

function loginAdmin($email, $parola) {
    include "mysql.php";
	$result = $db->query("SELECT * FROM admin WHERE email = '$email' AND parola = '$parola'");
	if ($result && $row = $result->fetch_assoc()) {
		$_SESSION['autentificare'] = $row;
        header("Location: admin.php");
        return true;
	}
	unset($_SESSION['autentificare']);
	return false;
}

function send_mail($email,$message,$subject)
	{
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug  = 0;
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = "tls";
		$mail->Host       = "smtp.gmail.com";
		$mail->Port       = 587;
		$mail->AddAddress($email);
		$mail->Username="pc.parts.licenta@gmail.com";
		$mail->Password="Licenta1";
		$mail->SetFrom('pc.parts.licenta@gmail.com','Piese pc');
		$mail->AddReplyTo("pc.parts.licenta@gmail.com","Piese pc");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}
?>
