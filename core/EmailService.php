<?php
namespace app\core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class EmailService {
    protected $mailer;

    public function __construct() {
        $config = require __DIR__ . '/../config/email_config.php';

        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = $config['host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $config['username'];
        $this->mailer->Password = $config['password'];
        $this->mailer->SMTPSecure = $config['encryption'];
        $this->mailer->Port = $config['port'];
    }

    public function sendEmail($to, $subject, $body) {
        try {
            $this->mailer->setFrom('votre_email@example.com', 'Votre Nom');
            $this->mailer->addAddress($to);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;
            $this->mailer->isHTML(true);

            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
?>
