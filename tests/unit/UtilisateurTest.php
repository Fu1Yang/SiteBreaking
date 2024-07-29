<?php


use PHPUnit\Framework\TestCase;
use app\SiteBreaking\model\Contact;
use app\SiteBreaking\model\Utilisateur;
use DateTime;

class UtilisateurTest extends TestCase
{
    public function test1()
    {
        // Setup
        $utilisateur = new Utilisateur("tom", "john", "password", 1, "some_token", "tom@gmail.com", "utilisateur", new DateTime(), 1);
        
        // Assertions
        $this->assertSame(1, $utilisateur->getId());
        $this->assertSame("tom", $utilisateur->getNomUtilisateur());
        $this->assertSame("john", $utilisateur->getPrenomUtilisateur());
        $this->assertSame("password", $utilisateur->getMotDePasse());
        $this->assertSame(1, $utilisateur->getValidationEmail());
        $this->assertSame("tom@gmail.com", $utilisateur->getEmail());
        $this->assertSame("utilisateur", $utilisateur->getRoles());
        $this->assertInstanceOf(DateTime::class, $utilisateur->getDateInscription());
    }

    public function test2()
    {
        // Setup
        $utilisateur = new Utilisateur("jane", "emule", "password123", 0, "another_token", "jane@example.com", "utilisateur", new DateTime('2024-05-12'), 2);

        // Assertions
        $this->assertSame(2, $utilisateur->getId());
        $this->assertSame("jane", $utilisateur->getNomUtilisateur());
        $this->assertSame("emule", $utilisateur->getPrenomUtilisateur());
        $this->assertSame("password123", $utilisateur->getMotDePasse());
        $this->assertSame(0, $utilisateur->getValidationEmail());
        $this->assertSame("jane@example.com", $utilisateur->getEmail());
        $this->assertSame("utilisateur", $utilisateur->getRoles());

        // Assuming getDateInscription returns a DateTime object
        $expectedDate = new DateTime("2024-05-12");
        $this->assertEquals($expectedDate, $utilisateur->getDateInscription());
    }

    public function test3()
    {
        $contact = new Contact('28000 Marboue',"05060408", 'azerty@live.fr' ,"dejdjedjejdej", "Mardi"," Professionnel", 1);

        $this->assertSame(1, $contact->getId());
        $this->assertSame("28000 Marboue", $contact->getAdresse());
        $this->assertSame("05060408", $contact->getNumeroDetel());
        $this->assertSame("azerty@live.fr", $contact->getEmail());
        $this->assertSame("dejdjedjejdej", $contact->getDescription());
        $this->assertSame("Mardi", $contact->getJour());
        $this->assertSame("Professionnel", $contact->getNiveauEtStyle());
    }


}



