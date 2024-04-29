<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;

class InscriptionController extends BaseController {
    public function index():void {
        $this->view("Inscription/index"); 
    }
 
    
    
}