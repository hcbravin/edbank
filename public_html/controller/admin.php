<?php

$Admin = new Admin();
if (!$Admin->Logado()) {
    alert('Acesso negado!');
    goto Fim;
}

require_once Views . '/admin/admin_header.php';

if (!$URI[1]) {
    $Estatistica = $Admin->Estatistica();
    require_once Views . '/admin/admin_geral.php';
    goto Fim;
}

if ($URI[1] == 'usuarios') {


    // Listagem de usuários
    if (!$URI[2]) {
        require_once Views . '/admin/admin_usuarios.php';
        goto Fim;
    }

    if ($URI[2] == 'root') {

        // Acessa o usuario passado
        if (is_numeric($URI[3])) {
            if (!$Admin->rootAcess($URI[3])) {
                alert('Ocorreu um erro ao tentar acessar o usuário informado.');
                shdr('admin/usuarios', 3);
            } else {
                alert('Root acessado com sucesso!', 'success');
                shdr('dashboard', 3);
            }

            goto Fim;
        }
    }

    // Retorna ao usuário antigo
    if ($URI[2] == 'reset') {
        $Admin->rootReset();
        alert('Root resetado com sucesso!', 'success');
        shdr('admin', 3);
        goto Fim;
    }
    
}


Fim: