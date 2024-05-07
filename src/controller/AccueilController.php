<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;

class AccueilController extends BaseController {
    public function index():void {
        $this->view("accueil/index");
    }
}


