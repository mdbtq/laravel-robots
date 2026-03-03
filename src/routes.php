<?php

use Illuminate\Support\Facades\Route;
use Mdbtq\Robots\RobotsController;

Route::get('/robots.txt', RobotsController::class);
