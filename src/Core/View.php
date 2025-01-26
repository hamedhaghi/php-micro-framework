<?php

declare(strict_types=1);

namespace App\Core;

class View {
    public function render(string $view, array $data = []): string {
        extract($data);
        ob_start();
        include __DIR__ . '/../../views/' . $view . '.php';
        return ob_get_clean();
    }
}