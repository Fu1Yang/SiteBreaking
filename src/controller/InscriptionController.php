<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\MailService;



class InscriptionController extends BaseController {
    public function index(): void {
        $this->view("inscription/index");
    }

    public function inscription(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_utilisateur = $_POST['nom_utilisateur'] ?? null;
            $prenom = $_POST['prenom_utilisateur'] ?? null;
            $password = $_POST['password'] ?? null;
            $confirmePassword = $_POST['confirmePassword'] ?? null;
            $email = $_POST['email'] ?? null;
 
            // Vérifications
            if (empty($prenom) || !ctype_alpha($prenom)) {
                $message = "Votre prénom doit être une chaîne de caractères alphabétiques !";
            } elseif (empty($nom_utilisateur) || !ctype_alpha($nom_utilisateur)) {
                $message = "Votre nom doit être une chaîne de caractères alphabétiques !";
            } elseif (empty($password) || $password !== $confirmePassword) {
                $message = "Entrez un mot de passe valide !";
            }  elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "Entrez une adresse email valide";
            } else {
                // Connexion à la base de données
                $db = Database::getInstance()->getConnexion();

                // Vérifiez si l'utilisateur existe déjà
                $req1 = $db->prepare("SELECT * FROM SiteBreaking.Utilisateur WHERE email = :email");
                $req1->bindValue(":email", $email);
                $req1->execute();
                $result = $req1->fetch();
               
                if ($result) {
                    $message = "Un compte existe déjà avec cet email";
                } else {
                    require_once(__DIR__ . '/../../public/token.php');

                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $requete = $db->prepare('INSERT INTO SiteBreaking.Utilisateur (nom_utilisateur, prenom_utilisateur, email, role, mot_de_passe, token) VALUES (:nom, :prenom, :email, :role, :mot_de_passe, :token)');
                    $requete->bindValue(':nom', $nom_utilisateur);
                    $requete->bindValue(':prenom', $prenom);
                    $requete->bindValue(':email', $email);
                    $requete->bindValue(':role', 'utilisateur');
                    $requete->bindValue(':mot_de_passe', $passwordHash);
                    $requete->bindValue(':token', $token);

                    $requete->execute();
                    $monEmail = 'yang.fu@live.fr';
                    // Envoi de l'email de bienvenue
                    $emailService = new MailService();
                    $emailService->sendEmail($monEmail, "Bienvenue sur notre site", $token, $email);
                    // Redirection vers la page de connexion
                    $this->redirectTo("/connexion");
                    return;
                }
            }

            if (isset($message)) {
                echo $message;
            }
            $this->view("inscription/index");
        }
    }

    public function inscriptionVerification() 
    {   
        $message = "Une erreur est apparue";
        try {
   
        if (isset($_GET["email"]) && !empty($_GET["email"]) && isset($_GET["token"]) && !empty($_GET["token"])) {
    
            $email = $_GET["email"];
            $token = $_GET["token"];
            $db = Database::getInstance()->getConnexion();
    
            // Vérification de l'utilisateur avec l'email et le token
            $requete = $db->prepare('SELECT * FROM SiteBreaking.Utilisateur WHERE email=:email AND token=:token');
            $requete->bindValue(":email", $email);
            $requete->bindValue(":token", $token);
            $requete->execute();
    
            $nombre = $requete->rowCount();
            if ($nombre == 1) {
                // Mise à jour de l'utilisateur pour valider l'email
                $update = $db->prepare("UPDATE SiteBreaking.Utilisateur SET validation_email=:validation, token=:newToken WHERE email=:email");
                $update->bindValue(":email", $email);
                $update->bindValue(":newToken", "EmailValide");
                $update->bindValue(":validation", 1);
    
                $resultUpdate = $update->execute();
    
                if ($resultUpdate) {
                    // Redirection après la mise à jour réussie
                    header("Location: /connexion");
                    exit(); // terminer le script après la redirection
                } else {
                    echo "La mise à jour a échoué.";
                }
            } else {
                echo "Utilisateur non trouvé ou token incorrect.";
            }
        } else {
            echo "Email ou token manquant.";
        }
           
    } catch (\Throwable $message) {
        echo $message;
    }
    }
    

}

?>



ALTER TABLE Contact
ADD numbPhone VARCHAR(15);
