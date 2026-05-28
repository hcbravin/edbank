<?php

// Define os caminhos principais do projeto
define('ROOT', __DIR__ . '/../../');
define('PublicHTML', __DIR__ . '/../');
define('Vendor', __DIR__ . '/../../vendor');
define('Controller', __DIR__ . '/../controller');
define('Views', __DIR__ . '/../view');
define('Src', __DIR__);
define('Modal', __DIR__ . '/../view/modals');
define('Error', __DIR__ . '/../view/error');

// Carrega as dependências do projeto
require_once Vendor . '/autoload.php';

// Inicializa o dotEnv apontando para pasta raiz do arquivo .env
$dotenv = Dotenv\Dotenv::createImmutable(ROOT . 'config/');
$dotenv->load();

// Carrega as configurações do projeto
require_once ROOT . 'config/config.php';
require_once ROOT . 'config/database.php';
require_once Src . '/functions.php';
require_once Src . '/class.php';

use Detection\MobileDetect;
$Mobile = new MobileDetect() -> isMobile();

$URI = explode('/', substr(parse_url(@$_SERVER['REQUEST_URI'], PHP_URL_PATH), 1));
URINull(5); // Garante que existam 5 índices na array URI
TokenGetVerificar(); // Verifica se o token foi passado na URL

$MS = $_SESSION; // Variável global de sessão do sistema
$AnoAtual = date('Y'); // Ano atual
$Logado = Logado(); // Verifica se o usuário está logado