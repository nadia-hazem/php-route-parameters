<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class UserController extends Controller
{
    /**
     * Display a user profile.
     *
     * @param string $id Captured from the route /users/{id}
     */
    public function show(string $id): void
    {
        $this->render('user', [
            'title' => 'User profile',
            'id'    => $id
        ]);
    }
}
