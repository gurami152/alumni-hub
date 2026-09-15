<?php

use App\Providers\AppServiceProvider;
use Znu\Keycloak\KeycloakServiceProvider;

return [
    AppServiceProvider::class,
    KeycloakServiceProvider::class,
    Znu\ModuleAlumni\Providers\AlumniServiceProvider::class,
];
