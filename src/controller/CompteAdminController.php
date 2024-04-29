<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;

class CompteAdminController extends BaseController {
    public function index():void {
        $this->view("CompteAdmin/index");
    }
}