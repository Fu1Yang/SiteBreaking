<?php
namespace app\SiteBreaking\model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class MailService {
    protected $mailer;

    public function __construct() {
        $config = require __DIR__ . '/../../config/email_config.php';

        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = $config['host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $config['username'];
        $this->mailer->Password = $config['password'];
        $this->mailer->SMTPSecure = $config['encryption'];
        $this->mailer->Port = $config['port'];
    }
  
    public function sendEmail($to, $subject, $token, $email) {
      
        try {
            $this->mailer->setFrom('yang.fu@live.fr', 'SiteBreaking');
            $this->mailer->addAddress($to);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = 'Afin de valider votre inscription, merci de cliquer sur le lien suivant: <a href="http://localhost/inscriptionVerif?token='.urlencode($token).'&email='.$email.'">Confirmation de votre email</a>';
            $this->mailer->isHTML(true);

            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
?>
