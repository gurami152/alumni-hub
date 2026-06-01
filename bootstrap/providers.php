<?php

use App\Providers\AppServiceProvider;
use App\Providers\FortifyServiceProvider;
use Znu\Keycloak\KeycloakServiceProvider;

return [
    AppServiceProvider::class,
    FortifyServiceProvider::class,
    KeycloakServiceProvider::class,
];
