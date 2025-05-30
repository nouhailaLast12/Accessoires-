<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Définition des valeurs par défaut pour l'authentification.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => 'users', // Pas besoin d'utiliser env() ici
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Configuration des différents guards d'authentification.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'sanctum', // ✅ Ajout de Sanctum pour l'authentification API
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Définition de la source des utilisateurs pour l'authentification.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // ✅ Suppression de env() inutile ici
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Configuration des options de réinitialisation des mots de passe.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens', // ✅ Suppression de env() inutile
            'expire' => 60, // Durée de validité du token en minutes
            'throttle' => 60, // Temps d'attente avant une nouvelle demande
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Durée avant expiration d'une confirmation de mot de passe (en secondes).
    |
    */

    'password_timeout' => 10800, // 3 heures

];
