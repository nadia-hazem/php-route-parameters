<?php

namespace App\Core;

class Controller
{
    protected function render(string $view, array $data = []): void
    {
        extract($data);

        require __DIR__ . '/../Views/partials/header.php';
        require __DIR__ . '/../Views/pages/' . $view . '.php';
        require __DIR__ . '/../Views/partials/footer.php';
    }
}