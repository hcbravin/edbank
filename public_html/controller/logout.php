<?php

    use Hybridauth\Hybridauth;

    try {
        // 1. Inicializamos o Hybridauth para poder desconectar os provedores
        $hybridauth = new Hybridauth($config);

        // 2. Desconecta todos os adaptadores (Google, Apple, etc.)
        // Isso limpa os tokens armazenados pelo Hybridauth na sessão
        $hybridauth->disconnectAllAdapters();

        // 3. Limpa as variáveis da sua sessão personalizada
        $_SESSION = array();

        // 4. Destrói a sessão fisicamente no servidor
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            // Tenta apagar o cookie, mas silencia erro se headers já foram enviados
            @setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();

        // 5. Redireciona para a home ou tela de login
        hdr();
        exit;
        
    } catch (\Exception $e) {
        // Se der erro ao tentar desconectar, apenas destruímos a sessão local
        session_destroy();
        hdr();
        exit;
    }
