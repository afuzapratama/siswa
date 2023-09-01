<?php


use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

function sendmail($to, $subject, $message) {
    $transport = Transport::fromDsn('smtp://' . $_ENV['USER_MAILER'] . ':' . $_ENV['PASSWORD_MAILER'] . '@' . $_ENV['HOST_MAILER'] . ':' . $_ENV['PORT_MAILER'] . '?encryption=&auth_mode=&verify_peer=0');

    $mailer = new Mailer($transport);
    $email = (new Email());
    $email->from(new Address('no-reply@i.nemail.site', 'Bapak Afuza Pratama,S.Kom'));
    $email->to($to);
    $email->subject($subject);
    $email->priority('1');
    $email->text($message);

    $header = $email->getHeaders();
    $header->addTextHeader('X-Mailer', 'Symfony Mailer');
    $header->addTextHeader('X-Transport', 'Symfony Mailer');
    $header->addTextHeader('MIME-Version', '1.0');
    $header->addTextHeader('Content-Type', 'text/html; charset=utf-8');
    $header->addTextHeader('Content-Transfer-Encoding', '8bit');
    $header->addTextHeader('X-Content-Type-Options', 'nosniff');

    try {
        $mailer->send($email);
       return true;
    } catch (TransportExceptionInterface $e) {
       return false;
    }

}