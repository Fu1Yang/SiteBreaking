<?php
declare(strict_types=1);
namespace app\SiteBreaking\controller;
use app\SiteBreaking\model\Utilisateur;
use app\SiteBreaking\router\HttpRequest;

class ConnexionController extends BaseController {

    public function __construct(HttpRequest $httpRequest)
    {
        parent::__construct($httpRequest);
    }

    public function index():void {
        $this->view("connexion/index");
    }

    public function connecter($email, $mot_de_passe) {
        
        try {
            $utilisateur = Utilisateur::verifConnexion($email, $mot_de_passe);
            
            if ($utilisateur != null) {
                
               $csrf  = $_POST['csrf'] ?? null;
                $sessionCSRF = $_SESSION['csrf']  ?? "";
                // echo "Le POST Token = ". $csrf."<br>";
                // echo "La SESSION Token = ".$sessionCSRF;
                if ($csrf != $sessionCSRF) {
                    $error = "Token CSRF invalide";
                }
                $_SESSION["id"] = $utilisateur->getId();  
                // le rôle de l'utilisateur à la session
                if ($utilisateur->getRoles()!= "administrateur") {
                    $this->redirectTo("./");
                } elseif ($utilisateur->getValidationEmail() == 1) {
                    $this->redirectTo("./compteAdmin");
                }
                 else {
                    echo "Accès refusé attendre la validation de votre email.";
                }
            } else {
                // Rediriger vers la page de connexion si l'utilisateur n'existe pas ou les informations sont incorrectes
                $this->redirectTo("./connexion");
            }
        } catch (\Throwable $th) {
            // En cas d'erreur, rediriger vers la page de connexion et afficher un message
            $this->redirectTo("./connexion");
            $message = "Valider votre email";
            echo $message;
        }
    }
    

    public function deconnexion(){
        $message = "Vous êtes déconnecté";
        session_unset();
        session_destroy();

        $this->view('connexion/index');

    }
}