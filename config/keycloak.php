<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Controller Class
    |--------------------------------------------------------------------------
    | Specify the controller class to use for Keycloak authentication routes.
    | You can override this with your own controller that extends
    | the default KeycloakController.
    |
    | Default: \Znu\Keycloak\Http\Controllers\KeycloakController::class
    |
    | Example of custom controller:
    | 'controller' => \App\Http\Controllers\Auth\CustomKeycloakController::class,
    */
    'controller' => \Znu\Keycloak\Http\Controllers\KeycloakController::class,

    /*|------------------------------------------------------------------------
    | Default Role
    |--------------------------------------------------------------------------
    | Specify the default role to assign to users authenticated via Keycloak
    | if no roles are provided by Keycloak.
    |*/
    'default_role' => env('KEYCLOAK_DEFAULT_ROLE'),

    /*|------------------------------------------------------------------------
    | User Model Configuration
    |--------------------------------------------------------------------------
    | Specify the user model and table name to be used for storing Keycloak
    | authenticated users.
    |*/
    'user' => [
        'model' => env('KEYCLOAK_USER_MODEL', \App\Models\User::class),
        'table_name' => env('KEYCLOAK_USER_TABLE', 'users'),
    ],
];
