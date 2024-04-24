<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;

class EvenementController extends BaseController {
    public function index():void {
        $this->view("Evenement/index");
    }
}
