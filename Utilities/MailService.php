<?php

// Pre configuration: (for the mail service to work in "localhost" environment)
//
//  1.In PHP.INI :
//      A. Uncomment this line : 'sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t" '.
//      B. Comment this line : 'sendmail_path="C:\xampp\mailtodisk\mailtodisk.exe"'.
//
//  2.In SendMail.INI:
//      A. The line "smtp_server=" should be "smtp_server=smtp.gmail.com".
//      B. The line "smtp_port=" should be "smtp_port=587".
//      C. Enter credentials in the lines : "auth_username=" and "auth_password=".
//
//  3.Credentials:
//      Account:  "BGU.NET.Service@gmail.com".
//      Password: "bguforever".

class MailService
{


	// Simple mail sender function.
	public static function Send($address, $subject, $message)
	{
		$headers = 'From: BGU.NET.Service@gmail.com' . "\r\n" .
			'Reply-To: BGU.NET.Service@gmail.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($address, $subject, $message, $headers);
	}

	// Invitations sender function that will iterate over addresses array and send
	// to each address an invite.
	public static function SendInvitations($addresses)
	{
		$_subject = "Subject Test";
		$_message = "Message Test";

		foreach ($addresses as $address) {
			self::Send($address, $_subject, $_message);
		}

	}
}


?>