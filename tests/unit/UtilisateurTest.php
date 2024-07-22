<?php

use PHPUnit\Framework\TestCase;
use app\SiteBreaking\model\Utilisateur;
use DateTime;

class UtilisateurTest extends TestCase
{
    public function test1()
    {
        // Setup
        $utilisateur = new Utilisateur(1, "tom","john", "password", "tom@gmail.com", "user");
        
        // Assertion
        $this->assertSame(1, $utilisateur->getId());
    }

    public function test2()
    {
        // Setup
        // $date_inscription = new DateTime(); 
        $utilisateur = new Utilisateur(2, "jane", "password", "password123", "jane@example.com", "administrateur");

        // Assertions to check if all attributes are set correctly
        $this->assertSame(2, $utilisateur->getId());
        $this->assertSame("jane", $utilisateur->getNomUtilisateur());
        $this->assertSame("password123", $utilisateur->getMotDePasse());
        $this->assertSame("jane@example.com", $utilisateur->getEmail());
        // $this->assertEquals($date_inscription, $utilisateur->getDateInscription());
    }
}
