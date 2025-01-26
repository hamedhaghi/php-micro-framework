<?php

declare(strict_types=1);

namespace App\Core;

class Kernel
{
    public function run(): void
    {
        $this->registerRoutes();
    }

    protected function registerRoutes(): void
    {
        require_once __DIR__ . '/../../routes/web.php';
    }
}
