<?php

namespace Acme\Email;

class SendEmail
{
    public static function sendEmail($to, $subject, $message, $from = "")
    {

        //dd($to);

        if (strlen($from) == 0) {
            $from = getenv('SMTP_FROM');
        }

        // Create the Transport
        $transport = (
            new \Swift_SmtpTransport(
                getenv('SMTP_HOST'),
                getenv('SMTP_PORT')
            )
        )
        ->setUsername( getenv('SMTP_USER') )
        ->setPassword( getenv('SMTP_PASS') );

        /*
        You could alternatively use a different transport such as Sendmail:

        // Sendmail
        $transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');
        */

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message('Wonderful Subject'))
        ->setSubject($subject)
        ->setFrom($from)
        ->setTo($to)
        ->setBody($message, 'text/html');

        // Send the message
        $result = $mailer->send($message);

        echo "email sent!";
    }
}