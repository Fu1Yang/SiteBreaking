<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;

class ContactController extends BaseController {
    public function index():void {
        $this->view("contact/index");
    }
}
