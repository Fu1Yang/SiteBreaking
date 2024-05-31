<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Utilisateur;
use DateTime;
use app\core\EmailService;

class InscriptionController extends BaseController {
    public function index(): void {
        $this->view("inscription/index");
    }

    public function inscription(): void {
        $monEmail = 'yang.fu@live.fr';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom_utilisateur'];
            $prenom = $_POST['prenom_utilisateur'];
            $password = $_POST['password'];
            $confirmePassword = $_POST['confirmePassword'];
            $email = $monEmail;

            // Vérifications
            if (empty($prenom) || !ctype_alpha($prenom)) {
                $message = "Votre prénom doit être une chaîne de caractères alphabétiques !";
            } elseif (empty($nom) || !ctype_alpha($nom)) {
                $message = "Votre nom doit être une chaîne de caractères alphabétiques !";
            } elseif (empty($password) || $password !== $confirmePassword) {
                $message = "Entrez un mot de passe valide !";
            }  elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "Entrez une adresse email valide";
            } else {
                // Connexion à la base de données
                $db = Database::getInstance()->getConnexion();

                // Vérifiez si l'utilisateur existe déjà
                $req1 = $db->prepare("SELECT * FROM SiteBreaking.Utilisateur WHERE email_utilisateur = :email");
                $req1->bindValue(":email", $email);
                $req1->execute();
                $result = $req1->fetch();

                if ($result) {
                    $message = "Un compte existe déjà avec cet email";
                } else {
                    $token = token_random_string(25);

                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                    $requete = $db->prepare('INSERT INTO SiteBreaking.Utilisateur(nom_utilisateur, prenom_utilisateur, email_utilisateur, password_utilisateur, token_utilisateur) VALUES (:nom, :prenom, :email, :password, :token)');
                    $requete->bindValue(':nom', $nom);
                    $requete->bindValue(':prenom', $prenom);
                    $requete->bindValue(':email', $email);
                    $requete->bindValue(':password', $passwordHash);
                    $requete->bindValue(':token', $token);

             

                    $requete->execute();
                    $emailService = new EmailService();
                    $emailService->sendEmail($email, "Bienvenue sur notre site", "Merci de vous être inscrit sur notre site.");

                    $this->redirectTo("/connexion");
                }
            }

            if (isset($message)) {
                echo $message;
                $this->view("inscription/index");
            }
        }
    }
}
?>
