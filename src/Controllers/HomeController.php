<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller\AbstractController;

class HomeController extends AbstractController {
    public function index(): string {
        return $this->render('home');
    }
}
