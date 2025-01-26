<?php

declare(strict_types=1);

namespace App\Core\Traits;

use App\Core\View;

trait Renderable
{
    public function render(string $view, array $data = []): string
    {
        return (new View())->render($view, $data);
    }
}