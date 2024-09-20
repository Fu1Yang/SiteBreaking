<?php
// la commande a faire pour teste le code ./vendor/bin/phpunit tests
declare(strict_types=1);
namespace tests\SiteBreaking\model;

use app\SiteBreaking\model\Utilisateur;
use DateTime;
use PHPUnit\Framework\TestCase;
use Mockery;

class UtilisateurTest extends TestCase {
    // tearDown méthode spéciale qui nettoye aprés chaque test  éviter des interférences entre les tests et garantir que les tests sont isolés les uns des autres.
    protected function tearDown(): void {  
        Mockery::close();
    }

    public function testGetId() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        $this->assertSame(0, $utilisateur->getId());
    }

    public function testGetNomUtilisateur() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        $this->assertSame('nom', $utilisateur->getNomUtilisateur());
    }

    public function testGetPrenomUtilisateur() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        $this->assertSame('prenom', $utilisateur->getPrenomUtilisateur());
    }

    public function testGetMotDePasse() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        $this->assertSame('motDePasse', $utilisateur->getMotDePasse());
    }

    public function testGetEmail() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        $this->assertSame('yang@gmail.com', $utilisateur->getEmail());
    }

    public function testGetRoles() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        $this->assertSame('utilisateur', $utilisateur->getRoles());
    }

    public function testGetToken() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        $this->assertSame('token', $utilisateur->getToken());
    }

    public function testGetValidationEmail() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        $this->assertSame(1, $utilisateur->getValidationEmail());
    }

    public function testGetDateInscription() {
        $date = new DateTime();
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com', 'utilisateur', $date);
        $this->assertSame($date, $utilisateur->getDateInscription());
    }

    public function testSetMotDePasse() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        $utilisateur->setMotDePasse('new_password');
        $this->assertTrue(password_verify('new_password', $utilisateur->getMotDePasse()));
    }

    public function testSetNomUtilisateur() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        $utilisateur->setNomUtilisateur('new_nom');
        $this->assertSame('new_nom', $utilisateur->getNomUtilisateur());
    }

    public function testSetRoles() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        $utilisateur->setRoles('admin');
        $this->assertSame('admin', $utilisateur->getRoles());
    }

    // Tests pour les méthodes statiques avec Mockery
    public function testCreate() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        
        $mockDb = Mockery::mock('overload:app\SiteBreaking\model\Database');
        $mockDb->shouldReceive('getInstance->getConnexion->prepare->execute')
               ->once()
               ->andReturn(true);
        $mockDb->shouldReceive('getInstance->getConnexion->lastInsertId')
               ->once()
               ->andReturn(1);
        
        $this->assertIsInt(Utilisateur::create($utilisateur));
    }

    public function testRead() {
        $mockDb = Mockery::mock('overload:app\SiteBreaking\model\Database');
        $mockDb->shouldReceive('getInstance->getConnexion->prepare->execute')
               ->once()
               ->andReturn(true);
        $mockDb->shouldReceive('getInstance->getConnexion->prepare->fetch')
               ->once()
               ->andReturn([
                   "id" => 1,
                   "nom_utilisateur" => "nom",
                   "prenom_utilisateur" => "prenom",
                   "mot_de_passe" => "motDePasse",
                   "email" => "yang@gmail.com",
                   "role" => "utilisateur",
                   "date_inscription" => "2024-05-02 14:20:00",
                   "token" => "token",
                   "validation_email" => 1
               ]);

        $utilisateur = Utilisateur::read(1);
        $this->assertInstanceOf(Utilisateur::class, $utilisateur);
    }

    public function testUpdate() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        
        $mockDb = Mockery::mock('overload:app\SiteBreaking\model\Database');
        $mockDb->shouldReceive('getInstance->getConnexion->prepare->execute')
               ->once()
               ->andReturn(true);

        Utilisateur::update($utilisateur);
        $this->assertTrue(true); // Si aucun exception n'est levée, le test est réussi
    }

    public function testDelete() {
        $utilisateur = new Utilisateur('nom', 'prenom', 'motDePasse', 1, 'token', 'yang@gmail.com');
        
        $mockDb = Mockery::mock('overload:app\SiteBreaking\model\Database');
        $mockDb->shouldReceive('getInstance->getConnexion->prepare->execute')
               ->once()
               ->andReturn(true);

        Utilisateur::delete($utilisateur);
        $this->assertTrue(true); // Si aucun exception n'est levée, le test est réussi
    }

    public function testVerifConnexion() {
         // Création d'un mock pour la classe Database
        $mockDb = Mockery::mock('overload:app\SiteBreaking\model\Database');
        $mockDb->shouldReceive('getInstance->getConnexion->prepare->execute')
               ->once()
               ->andReturn(true);
        // Définition du comportement attendu pour l'appel de la méthode prepare->execute sur la connexion       
        $mockDb->shouldReceive('getInstance->getConnexion->prepare->fetch')
               ->once()
               ->andReturn([
                   "id" => 1,
                   "nom_utilisateur" => "nom",
                   "prenom_utilisateur" => "prenom",
                   "mot_de_passe" => password_hash("motDePasse", PASSWORD_DEFAULT),
                   "email" => "yang@gmail.com",
                   "role" => "utilisateur",
                   "date_inscription" => "2024-05-02 14:20:00",
                   "token" => "token",
                   "validation_email" => 1
               ]);

        $utilisateur = Utilisateur::verifConnexion('yang@gmail.com', 'motDePasse');
        $this->assertInstanceOf(Utilisateur::class, $utilisateur);
    }

}
