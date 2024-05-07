<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;

class AproposController extends BaseController {
    public function index():void {
        $this->view("apropos/index");
    }
}
