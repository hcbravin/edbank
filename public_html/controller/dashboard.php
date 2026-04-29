<?php

    if($URI[0] == 'dashboard'){

        // Verifica a quantidade de contas e gerencias existem
        $Contas = count($MS['contas']);
        $Gerencias = count($MS['gerente']);

        // Se houver apenas uma gerencia e nenhuma conta, redireciona para ela
        if($Gerencias == 1 AND $Contas == 0){
            shdr('gerencia/' . reset($MS['gerente'])['ag_id']);
            goto Fim;
        }

        // Se houver apenas uma conta e nenhuma gerencia, redireciona para ela
        if($Gerencias == 0 AND $Contas == 1){
            shdr('conta/' . reset($MS['contas'])['ct_id']);
            goto Fim;
        }

        // Se houver mais de uma gerencia ou mais de uma conta, mostra o dashboard
        require_once Views . '/main/dashboard.php';
    }

    Fim: