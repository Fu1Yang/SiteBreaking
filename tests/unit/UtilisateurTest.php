<?php

use PHPUnit\Framework\TestCase;
use app\SiteBreaking\model\Utilisateur;
use DateTime;

class UtilisateurTest extends TestCase
{
    public function test1()
    {
        // Setup
        $date_inscription = new DateTime(); // Provide a date
        $utilisateur = new Utilisateur(1, "tom", "password", "tom@gmail.com", $date_inscription);
        
        // Assertion
        $this->assertSame(1, $utilisateur->getId());
    }

    public function test2()
    {
        // Setup
        $date_inscription = new DateTime(); // Provide a date
        $utilisateur = new Utilisateur(2, "jane", "password123", "jane@example.com", $date_inscription);

        // Assertions to check if all attributes are set correctly
        $this->assertSame(2, $utilisateur->getId());
        $this->assertSame("jane", $utilisateur->getNomUtilisateur());
        $this->assertSame("password123", $utilisateur->getMotDePasse());
        $this->assertSame("jane@example.com", $utilisateur->getEmail());
        $this->assertEquals($date_inscription, $utilisateur->getDateInscription());
    }
}
