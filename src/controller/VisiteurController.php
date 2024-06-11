<?php

namespace app\SiteBreaking\controller;

use app\SiteBreaking\model\Visiteur;

class VisiteurController {
    public function cookie() {
        // Appel de la méthode statique cookie() de la classe Visiteur
        Visiteur::cookie();
      
    }
}
