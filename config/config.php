<?php
// Configuração do SMTP
$SMTPConfig = [
    'host' => $_ENV['SMTP_HOST'],
    'port' => $_ENV['SMTP_PORT'],
    'encryption' => 'tls',
    'username' => $_ENV['SMTP_USER'],
    'password' => $_ENV['SMTP_PASS']
]; 

// Configuração do Hybridauth
$baseUrl = 
    $_SERVER['SERVER_NAME'] == 'meubanco.com' ?
    'https://meubanco.com/login/google' : 
    'https://edbank.meusigma.com/login/google';

$config = [
    'callback' => $baseUrl,
    'providers' => [
        'Google' => [
            'enabled' => true,
            'keys'    => [
                'id'     => $_ENV['GOOGLE_ID'],
                'secret' => $_ENV['GOOGLE_SECRET'],
            ],
            'scope' => 'openid email profile',
            'authorize_url_parameters' => [
                'access_type' => 'online',
                'prompt' => 'select_account',
            ],
        ],
        // No futuro, bastará adicionar 'Apple' aqui
    ],
];