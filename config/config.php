<?php
// Configuração do SMTP
$SMTPConfig = [
    'host' => 'SEU_HOST_SMTP',
    'port' => 587,
    'encryption' => 'tls',
    'username' => 'SEU_EMAIL_SMTP',
    'password' => 'SUA_SENHA_SMTP'
]; 

// Configuração do Hybridauth
$baseUrl = 'SEU_GOOGLE_BASE_URL';

$config = [
    'callback' => $baseUrl,
    'providers' => [
        'Google' => [
            'enabled' => true,
            'keys'    => [
                'id'     => 'SEU_GOOGLE_ID',
                'secret' => 'SEU_GOOGLE_SECRET',
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