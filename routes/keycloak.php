<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

$controller = Config::get('keycloak.controller');

Route::middleware('web')->group(function () use ($controller) {
    Route::prefix('auth')->group(function () use ($controller) {
        Route::get('/login', [$controller, 'login'])->name('keycloak.login');
        Route::post('/logout', [$controller, 'logout'])
            ->middleware('auth')
            ->name('keycloak.logout');

        Route::get('/callback', [$controller, 'handleKeycloakLoginCallback']);
        Route::get('/logout/callback', [$controller, 'handleKeycloakLogoutCallback']);
        Route::get('/frontchannel-logout', [$controller, 'handleFrontChannelLogout']);
    });

    Route::get('/profile', [$controller, 'profile'])
        ->middleware('auth')
        ->name('keycloak.profile');
});
