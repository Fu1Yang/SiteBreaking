<?php
declare(strict_types=1);
namespace app\SiteBreaking\controller;
use app\SiteBreaking\model\Utilisateur;

class ApiController extends BaseController
{
    public function index()
    {
        $this->addParam('message',"Salut bienvenue sur le site de breaking Vierzon");
        $this->view('api/index');
    }

    public function utilisateur(){
        $this->addParam("liste",Utilisateur::List());
        $this->view('api/liste_utilisateur');
    }
}

