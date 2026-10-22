<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;

// Static route
$router->get('/', [HomeController::class, 'index']);

// Dynamic route: {id} is captured from the URL and passed to show()
$router->get('/users/{id}', [UserController::class, 'show']);
